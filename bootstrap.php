<?php

use Connection as GlobalConnection;
use FTP\Connection;

define('_DIR_ROOT', __DIR__);

/*
 *  Config HTTP root
 * 
 * */
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'){
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
}
else{
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}
/*
 *  Auto load config
 * 
 * */
$config_dir = scandir('configs');
if(isset($config_dir)){
    foreach($config_dir as $item){
        if($item != '.' && $item != '..' && file_exists('configs/'.$item)){
            require_once 'configs/'.$item;
        }
    }
}
require_once 'core/Route.php';      //Load Route class
require_once 'core/Session.php'; //Load Session
require_once 'app/App.php';         //Load app
if(!empty($config['database'])){
    $db_config = array_filter($config['database']);
    if(!empty($db_config)){
        require_once 'core/Connection.php';
        require_once 'core/QueryBuilder.php';
        require_once 'core/Database.php';
        require_once 'core/DB.php';
        $db = new Database();
    }
}
require_once 'core/Model.php';
require_once 'core/Controller.php'; //Load controller
require_once 'core/Request.php'; //Load Request
require_once 'core/Response.php'; //Load Response
?>