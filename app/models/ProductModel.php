<?php
class ProductModel extends Model{
    private $_tableMain = 'product';
    private $_tableConfig= 'product_config';
    private $_tableImg = 'product_img';
    private $_tableDiscount = 'product_discount';
    function tableFill(){
        return $this->_tableMain;
    }
    function fieldFill(){
        return '*';
    }
    function primaryKey()
    {
        return 'product_id';
    }
    public function getAllProduct(){
        $data = $this->db->table($this->_tableMain)->select('*')->get();
        if($this->getThumbProduct($data['product_id']) != false){
            $data += $this->getThumbProduct($data['product_id']);
        }
        return $data;
    }
    public function getProductBestDiscount($number = ''){
        $data = $this->db->table($this->_tableMain)->select('*')->where('discount_price', '>', 0)->orderBy('tmp_price', 'DESC')->get();
        for($i = 0; $i < count($data); $i++){
            if($this->getThumbProduct($data[$i]['product_id']) != false){
                $data[$i] += $this->getThumbProduct($data[$i]['product_id']);
            }
        }
        return $data;
    }
    public function getConfigProduct($idProduct){
        $data = $this->db->table($this->_tableConfig)->select("*")->where('product_id', '=', $idProduct)->get();
        return $data;
    }
    public function getImageProduct($idProduct){
        $data = $this->db->table($this->_tableImg)->select("*")->where('product_id', '=', $idProduct)->get();
        return $data;
    }
    public function getThumbProduct($idProduct){
        $data = $this->db->table($this->_tableImg)->select("*")->where('product_id', '=', $idProduct)->first();
        return $data;
    }
    public function getDiscountProduct($idProduct){
        $data = $this->db->table($this->_tableDiscount)->select("*")->where('product_id', '=', $idProduct)->first();
        return $data;
    }
    public function getProductById($idProduct){
        $data = $this->db->table($this->_tableMain)->select('*')->where('product_id', '=', $idProduct)->first();
        $data += $this->getThumbProduct($idProduct);
        return $data;
    }
    public function searchProductByName($keyword, $orderby = 'newfirst'){
        $keyword = filter_var($keyword, FILTER_SANITIZE_SPECIAL_CHARS);
        if($orderby == 'newfirst'){
            $data = $this->db->table($this->_tableMain)->select('*')->whereLike('name', $keyword)->orderBy('product_id', 'DESC')->get();
            for($i = 0; $i < count($data); $i++){
                $data[$i] += $this->getThumbProduct($data[$i]['product_id']);
            }
            return $data;
        }
        else if($orderby == 'oldfirst'){
            $data = $this->db->table($this->_tableMain)->select('*')->whereLike('name', $keyword)->orderBy('product_id')->get();
            for($i = 0; $i < count($data); $i++){
                $data[$i] += $this->getThumbProduct($data[$i]['product_id']);
            }
            return $data;
        }
        else if($orderby == 'cheapfirst'){
            $data = $this->db->table($this->_tableMain)->select('*')->whereLike('name', $keyword)->orderBy('origin_price')->get();
            for($i = 0; $i < count($data); $i++){
                $data[$i] += $this->getThumbProduct($data[$i]['product_id']);
            }
            return $data;
        }
        else if($orderby == 'hotfirst'){
            $data = $this->db->table($this->_tableMain)->select('*')->whereLike('name', $keyword)->orderBy('view', 'DESC')->get();
            for($i = 0; $i < count($data); $i++){
                $data[$i] += $this->getThumbProduct($data[$i]['product_id']);
            }
            return $data;
        }
        else if($orderby == 'expensivefirst'){
            $data = $this->db->table($this->_tableMain)->select('*')->whereLike('name', $keyword)->orderBy('origin_price', 'DESC')->get();
            for($i = 0; $i < count($data); $i++){
                $data[$i] += $this->getThumbProduct($data[$i]['product_id']);
            }
            return $data;
        }
        else if($orderby == 'discountfirst'){
            $data = $this->db->table($this->_tableMain)->join($this->_tableDiscount, 'product.product_id = product_discount.product_id')->select('*')->whereLike('name', $keyword)->orderBy('(orgin_price - discount_price)', 'DESC')->get();
            for($i = 0; $i < count($data); $i++){
                $data[$i] += $this->getThumbProduct($data[$i]['product_id']);
            }
            return $data;
        }
    }
    public function getProductByType($type_code, $number = ''){
        if ($number == null){
            $data = $this->db->table($this->_tableMain)->select('*')->where('type', '=', $type_code)->get();
            for($i = 0; $i < count($data); $i++){
                $data[$i] += $this->getThumbProduct($data[$i]['product_id']);
            }
            return $data;
        }
        $data = $this->db->table($this->_tableMain)->select('*')->where('type', '=', $type_code)->limit($number)->get();
        for($i = 0; $i < count($data); $i++){
            $data[$i] += $this->getThumbProduct($data[$i]['product_id']);
        }
        return $data;
    }
    public function getProductByBrand($brand_id, $type_code='1', $number = '',){
        if ($number == ''){
            $data = $this->db->table($this->_tableMain)->select('*')->where('brand_id', '=', $brand_id)->where('type', '=', $type_code)->get();
            for($i = 0; $i < count($data); $i++){
                $data[$i] += $this->getThumbProduct($data[$i]['product_id']);
            }
            return $data;
        }
        $data = $this->db->table($this->_tableMain)->select('*')->where('brand_id', '=', $brand_id)->where('type', '=', $type_code)->limit($number)->get();
        for($i = 0; $i < count($data); $i++){
            $data[$i] += $this->getThumbProduct($data[$i]['product_id']);
        }
        return $data;
    }
    public function getBrandName($idBrand){
        $name = $this->db->table('brand')->select('name')->where('brand_id', '=', $idBrand)->first();
        extract($name);
        return $name;
    }
    public function filterProduct($data, $startPrice, $endPrice){
        $n = count($data);
        echo $endPrice;
        for($i = 0; $i < $n; $i++){
            $price = $data[$i]['origin_price'] - $data[$i]['discount_price'];
            if ($price > $endPrice || $price < $startPrice){
                unset($data[$i]);
            }
        }
        return array_values($data);
    }
    public function sortProduct($data, $condition){
        if($condition == 1){
            usort($data, function($a, $b) {
                return $b['product_id'] - $a['product_id'];
            });

            return $data;
        }
        else if($condition == 4){
            usort($data, function($a, $b) {
                return $b['product_id'] - $a['product_id'];
            });

            return $data;
        }
        else if($condition == 3){
            usort($data, function($a, $b) {
                $price_a = $a['origin_price'] - $a['discount_price'];
                $price_b = $b['origin_price'] - $b['discount_price'];
                return $price_a - $price_b;
            });

            return $data;
        }
        else if($condition == 2){
            usort($data, function($a, $b) {
                return $b['tmp_price'] - $a['tmp_price'];
            });

            return $data;
        }
    }

    public function splitProduct($data, $current_page = '1', $total_page, $limit = '10'){
        $dataAfterSplit = [];
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
        $start = ($current_page - 1) * $limit;
        $checkStart = 0;
        $key = 0;
        foreach($data as $value){
            if($checkStart < $start)
                $checkStart ++;
            else{
                if($key <= $limit-1){
                    $dataAfterSplit[$key] = $value;
                    $key ++;
                }
            }
        }
        return $dataAfterSplit;
    }
    public function updateDiscount(){
        $data = $this->db->table($this->_tableMain)->select('*')->get();
        foreach ($data as $value){
            $now = date('Y-m-d H:i:s');
            if ($value['startDiscount'] >= $now){
                $value['discount_price'] = $value['origin_price'] - ($value['origin_price'] * $value['tmp_price']) / 100;
                $this->db->table($this->_tableMain)->where('product_id', '=', $value['product_id'])->update($value);
            }
            if ($value['endDiscount'] < getTimeNow()){
                $value['discount_price'] = 0;
                $this->db->table($this->_tableMain)->where('product_id', '=', $value['product_id'])->update($value);
            }
        }
    }
    public function addProduct($data){
        if($this->insert($data)) 
            return true;
        else return false;
    }
}