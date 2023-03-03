<?php
abstract class Model extends Database{
    public $db, $tableName;
    function __construct()
    {
        $this->db = new Database();
    }
    abstract function tableFill();
    abstract function fieldFill();
    abstract function primaryKey();
    function all(){
        $tableName = $this->tableFill();
        $fieldSelect = $this->fieldFill();
        if(empty($fieldSelect)){
            $fieldSelect = '*';
        }
        $sql = "SELECT $fieldSelect FROM $tableName";
        $query = $this->db->query($sql);
        if(isset($query)){
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }
    function find($id){
        $tableName = $this->tableFill();
        $key = $this->primaryKey();
        $fieldSelect = $this->fieldFill();
        if(empty($fieldSelect)){
            $fieldSelect = '*';
        }
        $sql = "SELECT $fieldSelect FROM $tableName WHERE $key = '$id'";
        $query = $this->db->query($sql);
        if(isset($query)){
            return $query->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }
}