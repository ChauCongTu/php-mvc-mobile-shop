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
    public function getProductById($idProduct){
        $data = $this->db->table($this->_tableMain)->select("*")->where('product_id', '=', $idProduct)->get();
        return $data;
    }
    public function searchProductByName($keyword){
        $data = $this->db->table($this->_tableMain)->select("*")->whereLike('name', $keyword)->get();
        return $data;
    }
    public function getProductByType($type_code, $number = ''){
        if ($number == null){
            $data = $this->db->table($this->_tableMain)->select("*")->where('type', '=', $type_code)->get();
            return $data;
        }
        $data = $this->db->table($this->_tableMain)->select("*")->where('type', '=', $type_code)->limit($number)->get();
        return $data;
    }
    public function addProduct($data){
        if($this->insert($data)) 
            return true;
        else return false;
    }
}