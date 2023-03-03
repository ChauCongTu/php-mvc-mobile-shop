<?php
class Database{
    
    use QueryBuilder;
    private $__conn;
    function __construct()
    {
        global $db_config;
        $this->__conn = SingleTon::getInstance($db_config);
    }
    function insertData($table, $data){
        //$table: name of the table to add data
        //$data: array[key => values]
        if(!empty($data)){
            $str_col = '';
            $str_val = '';
            //Add columns and values ​​to string
            foreach($data as $key=>$values){
                $str_col .= $key . ', ';
                $str_val .= "'". $values . "', ";
            }
            //Delete two "," in last string
            $str_col = rtrim($str_col, ', ');
            $str_val = rtrim($str_val, ', ');
            $sql = "INSERT INTO $table ($str_col) VALUES ($str_val)";
            $status = $this->query($sql);
            if($status){
                return true;
            }
        }
        return false;
    }
    function updateData($table, $data, $condition){
        //$table: name of the table to update
        //$data: array[key => values] new values
        if(isset($data)){
            $str_update = '';
            foreach($data as $key=>$values){
                $str_update .= $key ." = '".$values."', ";
            }
            $str_update = rtrim($str_update, ', ');
            if(!empty($condition)){
                $sql = "UPDATE $table SET $str_update WHERE $condition";
            }
            else{
                $sql = "UPDATE $table SET $str_update";
            }
            $status = $this->query($sql);
            if($status){
                return true;
            }
            return false;
        }
    }
    function deleteData($table, $condition='')
    {
        if(isset($condition)){
            $sql = "DELETE FROM $table WHERE $condition";
        }
        else{
            $sql = "DELETE FROM $table";
        }
        $status = $this->query($sql);
        if($status){
            return true;
        }
        return false;
    }
    function query($sql){
        try{
            $statement = $this->__conn->prepare($sql);
            $statement->execute();
            return $statement;
        }
        catch(Exception $e){
            $mess = $e->getMessage();
            $data['mess'] = $mess;
            App::$app->loadError('database', $mess);
            die();
        }
    }
    function lastInsertId(){
        return $this->__conn->lastInsertId();
    }
}
?>