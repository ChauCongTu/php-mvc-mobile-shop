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
        $data = $this->db->table($this->_tableMain)->select("*")->get();
        return $data;
    }
    public function getProductBestDiscount($number = ''){
        $now = date('Y-m-d H:i:s');
        if ($number == null){
            $data = $this->db->query("SELECT * FROM product p JOIN product_discount d ON p.product_id = d.product_id JOIN $this->_tableImg i ON d.product_id = i.product_id WHERE end_discount > '$now' AND product_img_id = (SELECT product_img_id FROM product_img LIMIT 1) ORDER BY (origin_price-discount_price) DESC")->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        $data = $this->db->query("SELECT * FROM product p JOIN product_discount d ON p.product_id = d.product_id JOIN $this->_tableImg i ON d.product_id = i.product_id WHERE end_discount > '$now' AND product_img_id = (SELECT product_img_id FROM product_img LIMIT 1) ORDER BY (origin_price-discount_price) DESC LIMIT $number")->fetchAll(PDO::FETCH_ASSOC);
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
    public function getProductById($idProduct, $type){
        $data = $this->db->table($this->_tableMain)->select('*')->where('product_id', '=', $idProduct)->where('type', '=', $type)->first();
        if($this->getDiscountProduct($data['product_id']) != false){
            $data += $this->getDiscountProduct($data['product_id']);
        }
        $data += $this->getThumbProduct($idProduct);
        return $data;
    }
    public function searchProductByName($keyword, $orderby = 'newfirst'){
        if($orderby == 'newfirst'){
            $data = $this->db->table($this->_tableMain)->select('*')->whereLike('name', $keyword)->orderBy('product_id', 'DESC')->get();
            for($i = 0; $i < count($data); $i++){
                if($this->getDiscountProduct($data[$i]['product_id']) != false){
                    $data[$i] += $this->getDiscountProduct($data[$i]['product_id']);
                }
                $data[$i] += $this->getThumbProduct($data[$i]['product_id']);
            }
            return $data;
        }
        else if($orderby == 'oldfirst'){
            $data = $this->db->table($this->_tableMain)->select('*')->whereLike('name', $keyword)->orderBy('product_id')->get();
            for($i = 0; $i < count($data); $i++){
                if($this->getDiscountProduct($data[$i]['product_id']) != false){
                    $data[$i] += $this->getDiscountProduct($data[$i]['product_id']);
                }
                $data[$i] += $this->getThumbProduct($data[$i]['product_id']);
            }
            return $data;
        }
        else if($orderby == 'cheapfirst'){
            $data = $this->db->table($this->_tableMain)->select('*')->whereLike('name', $keyword)->orderBy('origin_price')->get();
            for($i = 0; $i < count($data); $i++){
                if($this->getDiscountProduct($data[$i]['product_id']) != false){
                    $data[$i] += $this->getDiscountProduct($data[$i]['product_id']);
                }
                $data[$i] += $this->getThumbProduct($data[$i]['product_id']);
            }
            return $data;
        }
        else if($orderby == 'hotfirst'){
            $data = $this->db->table($this->_tableMain)->select('*')->whereLike('name', $keyword)->orderBy('view', 'DESC')->get();
            for($i = 0; $i < count($data); $i++){
                if($this->getDiscountProduct($data[$i]['product_id']) != false){
                    $data[$i] += $this->getDiscountProduct($data[$i]['product_id']);
                }
                $data[$i] += $this->getThumbProduct($data[$i]['product_id']);
            }
            return $data;
        }
        else if($orderby == 'expensivefirst'){
            $data = $this->db->table($this->_tableMain)->select('*')->whereLike('name', $keyword)->orderBy('origin_price', 'DESC')->get();
            for($i = 0; $i < count($data); $i++){
                if($this->getDiscountProduct($data[$i]['product_id']) != false){
                    $data[$i] += $this->getDiscountProduct($data[$i]['product_id']);
                }
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
                if($this->getDiscountProduct($data[$i]['product_id']) != false){
                    $data[$i] += $this->getDiscountProduct($data[$i]['product_id']);
                }
                $data[$i] += $this->getThumbProduct($data[$i]['product_id']);
            }
            return $data;
        }
        $data = $this->db->table($this->_tableMain)->select('*')->where('type', '=', $type_code)->limit($number)->get();
        for($i = 0; $i < count($data); $i++){
            if($this->getDiscountProduct($data[$i]['product_id']) != false){
                $data[$i] += $this->getDiscountProduct($data[$i]['product_id']);
            }
            $data[$i] += $this->getThumbProduct($data[$i]['product_id']);
        }
        return $data;
    }
    public function getProductByBrand($brand_id, $type_code='1', $number = '',){
        if ($number == ''){
            $data = $this->db->table($this->_tableMain)->select('*')->where('brand_id', '=', $brand_id)->where('type', '=', $type_code)->get();
            for($i = 0; $i < count($data); $i++){
                if($this->getDiscountProduct($data[$i]['product_id']) != false){
                    $data[$i] += $this->getDiscountProduct($data[$i]['product_id']);
                }
                $data[$i] += $this->getThumbProduct($data[$i]['product_id']);
            }
            return $data;
        }
        $data = $this->db->table($this->_tableMain)->select('*')->where('brand_id', '=', $brand_id)->limit($number)->get();
        for($i = 0; $i < count($data); $i++){
            if($this->getDiscountProduct($data[$i]['product_id']) != false){
                $data[$i] += $this->getDiscountProduct($data[$i]['product_id']);
            }
            $data[$i] += $this->getThumbProduct($data[$i]['product_id']);
        }
        return $data;
    }
    public function getBrandName($idBrand){
        $name = $this->db->table('brand')->select('name')->where('brand_id', '=', $idBrand)->first();
        extract($name);
        return $name;
    }
    public function filterProduct($data, $condition){

    }
    public function addProduct($data){
        if($this->insert($data)) 
            return true;
        else return false;
    }
}