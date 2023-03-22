<?php
class UserModel extends Model{
    private $_table = 'users';
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
    public function getList($num = 0){
        if($num == 0)
            return $this->db->table($this->_table)->select('*')->get();
        return $this->db->table($this->_table)->select('*')->limit($num)->get();
    }
    public function getUser($idUser) {
        return $this->db->table($this->_table)->select('*')->where('users_id', '=', $idUser)->first();
    }
}
?>