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
            $data = $this->db->table($this->_table)->select('*')->orderBy('news_id', 'DESC')->get();
            for($i = 0; $i < count($data); $i++){
                if(isset($data[$i]['news_id'])){
                    $data[$i] += $this->getAuthorPost($data[$i]['users_id']); 
                }
            }
            
            return($data);
        }
        $data = $this->db->table($this->_table)->select('*')->orderBy('news_id', 'DESC')->limit($number)->get();
        for($i = 0; $i < count($data); $i++){
            if(isset($data[$i]['news_id'])){
                $data[$i] += $this->getAuthorPost($data[$i]['users_id']); 
            }
        }
        
        return($data);
    }
    public function searchNewsByName($keyword, $orderby = 'newfirst'){
        if($orderby == 'newfirst'){
            $data = $this->db->table($this->_table)->select('*')->whereLike('name', $keyword)->orderBy('pdate', 'DESC')->get();
            return $data;
        }
        else if($orderby == 'oldfirst'){
            $data = $this->db->table($this->_table)->select('*')->whereLike('name', $keyword)->orderBy('pdate')->get();
            return $data;
        }
        else if($orderby == 'hotfirst'){
            $data = $this->db->table($this->_table)->select('*')->whereLike('name', $keyword)->orderBy('view', 'DESC')->get();
            return $data;
        }
    }
    public function getNewsById($idNews){
        $data = $this->db->table($this->_table)->select('*')->where('news_id', '=', $idNews)->get();
        return $data;
    }
    public function getAuthorPost($idUser){
        $data = $this->db->table('users')->select('*')->where('users_id', '=', $idUser)->first();
        return $data;
    }
    public function splitProduct($data, $current_page = '1', $total_page, $limit = '10'){
        $dataAfterSplit = [];
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
        $start = ($current_page - 1) * $limit;
        $checkStart = 0;
        $key = 0;
        foreach($data as $value){
            if($checkStart < $start)
                $checkStart ++;
            else{
                if($key <= $limit-1){
                    $dataAfterSplit[$key] = $value;
                    $key ++;
                }
            }
        }
        return $dataAfterSplit;
    }
}