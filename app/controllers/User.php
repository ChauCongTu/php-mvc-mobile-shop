<?php
class User extends Controller{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('HomeModel');
    }
    public function index(){
        $this->data["content"] = "home/index";
        $this->render("layouts/client-layout", $this->data);
    }
    public function logout(){
        var_dump(Session::delete('user'));
    }
}
?>