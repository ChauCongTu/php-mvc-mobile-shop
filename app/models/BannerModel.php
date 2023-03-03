<?php
class BannerModel extends Model{
    private $_table = 'banner';
    function tableFill(){
        return $this->_table;
    }
    function fieldFill(){
        return '*';
    }
    function primaryKey()
    {
        return 'banner_id';
    }
    public function getCenterBanner(){
        $now = date('Y-m-d H:i:s');
        $data = $this->db->table($this->_table)->select("*")->where('from_date', '<', $now)->where('to_date', '>', $now)->where('type', '=', 2)->get();
        return $data;
    }
    public function getHeaderLongBanner(){
        $now = date('Y-m-d H:i:s');
        $data = $this->db->table($this->_table)->select("*")->where('from_date', '<', $now)->where('to_date', '>', $now)->where('type', '=', 1)->get();
        return $data;
    }
    public function getLongBanner(){
        $now = date('Y-m-d H:i:s');
        $data = $this->db->table($this->_table)->select("*")->where('from_date', '<', $now)->where('to_date', '>', $now)->where('type', '=', 3)->get();
        return $data;
    }
    public function getHotBanner(){
        $now = date('Y-m-d H:i:s');
        $data = $this->db->table($this->_table)->select("*")->where('from_date', '<', $now)->where('to_date', '>', $now)->where('type', '=', 2)->limit(2)->get();
        return $data;
    }
}
?>