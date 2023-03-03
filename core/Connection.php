<?php
class SingleTon{
    private static $instance = null, $conn = null;
    private function __construct($config){
        /*
         * Define keyword for Config info
         * ChauCongTu 2022 
         */
        if(isset($config['host'])){
            define('_HOST', $config['host']);
        }
        else{
            define('_HOST', '');
        }
        if(isset($config['dbname'])){
            define('_DB', $config['dbname']);
        }
        else{
            define('_DB', '');
        }
        if(isset($config['user'])){
            define('_USER', $config['user']);
        }
        else{
            define('_USER', '');
        }
        if(isset($config['password'])){
            define('_PASS', $config['password']);
        }
        else{
            define('_PASS', '');
        }
        try{
            $con = new PDO("mysql:host="._HOST."; dbname="._DB."; charset=utf8", _USER, _PASS);
            self::$conn = $con;
        }
        catch(Exception $e){
            $mess = $e->getMessage();
            $code = $e->getCode();
            echo '<h1 style="text-align:center">Có lỗi liên quan đến cơ sở dữ liệu, vui lòng kiểm tra lại #'.$code.'</h1></br><p style="text-align:center; border:1px solid #000; padding:10px;"> Chi tiết: '.$mess.'</p>';
            exit;
        }
        
    }
    public static function getInstance($config){
        if (self::$instance == null){
            $connection = new SingleTon($config);
            self::$instance = self::$conn;
        }
        return self::$instance;
    }
}