<?php
trait QueryBuilder{
    public $tableName = '';
    public $condition = '';
    public $operator = '';
    public $selectField = '*';
    public $limit = '';
    public $orderBy = '';
    public $join = '';
    public function table($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }   
    public function where($field, $compare, $values){
        if(empty($this->condition)){
            $this->operator = ' WHERE ';
        }
        else{
            $this->operator = ' AND ';
        }
        $this->condition .= "$this->operator $field $compare '$values'";
        return $this;
    }
    public function select($field = '*'){
        $this->selectField = $field;
        return $this;
    }
    public function limit($number, $offset = 0){
        $this->limit = " LIMIT $offset, $number";
        return $this;
    }
    public function orWhere($field, $compare, $values){
        if(empty($this->condition)){
            $this->operator = ' WHERE ';
        }
        else{
            $this->operator = ' OR ';
        }
        $this->condition .= "$this->operator $field $compare '$values'";
        return $this;
    }
    public function whereLike($field, $values){
        if(empty($this->condition)){
            $this->operator = ' WHERE ';
        }
        else{
            $this->operator = ' AND ';
        }
        $this->condition .= "$this->operator $field LIKE '%$values%'";
        return $this;
    }
    public function orderBy($field, $type = 'ASC'){
        $fieldArr = array_filter(explode(', ', $field));
        if(!empty($fieldArr) && count($fieldArr) >= 2){
            $this->orderBy = 'ORDER BY ' . implode(', ', $fieldArr);
        }
        else{
            $this->orderBy = 'ORDER BY '.$field.' '.$type;
        }
        return $this;
    }
    public function join($tableName, $relationship, $typeJoin = 'INNER'){
        $this->join .= ' '.$typeJoin.' JOIN '. $tableName . ' ON ' . $relationship . '';
        return $this;
    }
    
    public function get(){
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName $this->join $this->condition $this->orderBy $this->limit";
        //echo $sqlQuery;
        $sqlQuery = trim($sqlQuery);
        $query = $this->query($sqlQuery);
        //Reset query builder
        $this->resetQuery();
        if(!empty($query)){
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }
    public function first(){
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName $this->condition $this->limit";
        $query = $this->query($sqlQuery);
        //Reset query builder
        $this->resetQuery();
        if(!empty($query)){
            return $query->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }
    public function insert($data){
        $tableName = $this->tableName;
        $insertStatus = $this->insertData($tableName, $data);
        return $insertStatus;
    }
    public function lastId(){
        return $this->lastInsertId();
    }
    public function update($data){
        $whereUpdate = str_replace('WHERE', '', $this->condition);
        $whereUpdate = trim($whereUpdate);
        return $this->updateData($this->tableName, $data, $whereUpdate);
    }
    public function delete(){
        $whereUpdate = str_replace('WHERE', '', $this->condition);
        $whereUpdate = trim($whereUpdate);
        return $this->deleteData($this->tableName, $whereUpdate);
    }
    public function resetQuery(){
        //Reset query builder
        $this->tableName = '';
        $this->condition = '';
        $this->operator = '';
        $this->selectField = '*';
        $this->limit = '';
        $this->orderBy = '';
        $this->join = '';
    }
}
?>