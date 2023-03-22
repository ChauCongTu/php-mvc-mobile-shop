<?php
class CartModel extends Model{
    private $_table = 'cart';
    private $_tableDetail = 'cart_detail';
    function tableFill(){
        return $this->_table;
    }
    function fieldFill(){
        return '*';
    }
    function primaryKey()
    {
        return 'users_id';
    }
    public function getList($idUser){
        $data = $this->db->table($this->_table)->select('*')->where('users_id', '=', $idUser)->get();
        return $data;
    }
    public function getCart($idCart) {
        return $this->db->table($this->_table)->select('*')->where('cart_id', '=', $idCart)->first();
    }
    public function getDetail($idCart) {
        return $this->db->table($this->_tableDetail)->select('*')->where('cart_id', '=', $idCart)->get();
    }
    public function getUser($idUser) {
        return $this->db->table('users')->select('*')->where('users_id', '=', $idUser)->first();
    }
    public function getProduct($idProduct) {
        $data = $this->db->table('product')->select('*')->where('product_id', '=', $idProduct)->first();
        $data['thumb'] = $this->db->table('product_img')->select("*")->where('product_id', '=', $idProduct)->first();
        if($this->db->table('product_discount')->select("*")->where('product_id', '=', $idProduct)->first() != false)
            $data['discount'] = $this->db->table('product_discount')->select("*")->where('product_id', '=', $idProduct)->first();
        return $data;
    }
}
?>