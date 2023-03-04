<?php
class NewsModel extends Model{
    private $_table = 'news';
    function tableFill(){
        return $this->_table;
    }
    function fieldFill(){
        return '*';
    }
    function primaryKey()
    {
        return 'news_id';
    }
    public function getNews($number = ''){
        if($number==''){
            $data = $this->db->table($this->_table)->select('*')->get();
            return $data;
        }
        $data = $this->db->table($this->_table)->select('*')->limit($number)->get();
        return $data;
    }
    public function searchNewsByName($keyword, $orderby = 'newfirst'){
        if($orderby = 'newfirst'){
            $data = $this->db->table($this->_table)->select('*')->whereLike('name', $keyword)->orderBy('pdate', 'DESC')->get();
            return $data;
        }
        else if($orderby = 'oldfirst'){
            $data = $this->db->table($this->_table)->select('*')->whereLike('name', $keyword)->orderBy('pdate')->get();
            return $data;
        }
        else if($orderby = 'hotfirst'){
            $data = $this->db->table($this->_table)->select('*')->whereLike('name', $keyword)->orderBy('view', 'DESC')->get();
            return $data;
        }
    }
    public function getNewsById($idNews){
        $data = $this->db->table($this->_table)->select('*')->where('news_id', '=', $idNews)->get();
        return $data;
    }
}