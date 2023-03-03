<?php
class App{
    private $__controller, $__actions, $__params, $__routes, $__db;

    public static $app;
    function __construct()
    {
        global $routes, $config;
        self::$app = $this;

        $this->__routes = new Route();
        if(isset($routes['default_controller'])){
            $this->__controller = $routes['default_controller'];
        }
        if(isset($routes['default_actions'])){
            $this->__actions = $routes['default_actions'];   
        }
        $this->__params = [];

        if(class_exists('DB')){
            $dbObject = new DB();
            $this->__db = $dbObject->db;
        }

        $this->handleUrl();
    }
    function getUrl(){
        if(!empty($_SERVER['PATH_INFO'])){
            $url = $_SERVER['PATH_INFO'];
        }
        else{
            $url = "Home";
        }
        return $url;
    }
    public function handleUrl(){
        $url = $this->getUrl();
        $url = $this->__routes->handleRoute($url);

        $urlArr = array_filter(explode('/', $url));
        $urlArr = array_values($urlArr);
        $urlCheck = '';
        if(isset($urlArr)){
            foreach ($urlArr as $key=>$item){
                $urlCheck .= $item . '/';
                $fileCheck = rtrim($urlCheck, '/');
                $fileArr = explode('/', $fileCheck);
                $fileArr[count($fileArr) - 1] = ucfirst($fileArr[count($fileArr) - 1]);
                $fileCheck = implode('/', $fileArr);
                if(isset($urlArr[$key-1])){
                    unset($urlArr[$key-1]);
                }
                if(file_exists('app/controllers/'.($fileCheck).'.php.')){
                    $urlCheck = $fileCheck;
                    break;
                }
            }
            $urlArr = array_values($urlArr);
        }
        //Xử lý controller
        if(isset($urlArr[0])){
            $this->__controller = ucfirst($urlArr[0]);
        }
        else{
            $this->__controller = ucfirst($this->__controller);
        }
        if(file_exists('app/controllers/'.$urlCheck.'.php')){
            require_once 'controllers/'.$urlCheck.'.php';
            if(class_exists($this->__controller)){
                $this->__controller = new $this->__controller();
                unset($urlArr[0]);
                if(!empty($this->__db)){
                    $this->__controller->db = $this->__db;
                }
            }
            else{
                $this->loadError();
            }
        }
        else{
            $this->loadError();
        }
        //Xử lý action
        if(isset($urlArr[1])){
            $this->__actions = $urlArr[1];
            unset($urlArr[1]);
        }
        
        //Xử lý param
        $this->__params = array_values($urlArr);

        //Kiểm tra Method tồn tại
        if(method_exists($this->__controller, $this->__actions)){
            call_user_func_array([$this->__controller, $this->__actions], $this->__params);   
        }
        else{
            $this->loadError();
        }
    }
    public function loadError($name='404', $data = []){
        require_once 'errors/'.$name.'.php';
    }
    public function getCurrentController(){
        return $this->__controller;
    }
}
?>