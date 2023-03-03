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
        return 'banner_id';
    }
    public function getAllProduct(){
        $data = $this->db->table($this->_tableMain)->select("*")->get();
        return $data;
    }
    public function getProductBestDiscount(){
        $now = date('Y-m-d H:i:s');
        $data = $this->db->query("SELECT * FROM product p JOIN product_discount d ON p.product_id = d.product_id JOIN $this->_tableImg i ON d.product_id = i.product_id WHERE end_discount > '$now' AND product_img_id = (SELECT product_img_id FROM product_img LIMIT 1) ORDER BY (origin_price-discount_price) DESC")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getConfigProduct($idProduct){

    }
}