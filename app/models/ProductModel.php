<?php
class ProductModel extends Model{
    private $_table = 'product_type';
    function tableFill(){
        return $this->_table;
    }
    function fieldFill(){
        return '*';
    }
    function primaryKey()
    {
        return 'type_id';
    }
    public function getList($data){
        $this->db->table('shop')->insert($data);
    }
    public function deleteShop($id){
        $this->db->table('shop')->where('shop_id', '=', $id)->delete();
    }
    public function getSql(){
        $data = [
            'Item 1',
            'Item 2',
            'Item 3'
        ];
        return $data;
    }
    public function getDetail($id){
        return [ 
            'id' => $id, 
            'name' =>'Tai Nghe Gaming X15 Bluetooth 5.1 Không Dây Giảm Tiếng Ồn Cảm Ứng Điều Khiển Vân Tay Âm Thanh Hifi 9D Cho Android',
            'gia' => 98000
        ];
    } 
    public function getCategoriesBySlug($slug){
        $data = $this->db->query("SELECT * FROM $this->_table WHERE slug_type = '$slug'")->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getCategory(){
        $data = $this->db->query("SELECT * FROM $this->_table")->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>