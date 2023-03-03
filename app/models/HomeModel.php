<?php
class HomeModel extends Model{
    private $_table = 'product_type';
    function tableFill(){
        return $this->_table;
    }
    function fieldFill(){
        return '*';
    }
    function primaryKey()
    {
        return 'home';
    }
    public function getList(){
        $data = $this->db->query("SELECT * FROM $this->_table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>