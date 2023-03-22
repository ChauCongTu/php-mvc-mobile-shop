<?php
class Cart extends Controller{
    public $data = [];
    public $model;
    public function __construct()
    {
        $this->model= $this->model('CartModel');
    }
    public function order($idCart){
        $cart = $this->model->getCart($idCart);
        $cart['user'] =  $this->model->getUser($cart['users_id']);
        $cart['detail'] =  $this->model->getDetail($cart['cart_id']);
        for($i = 0; $i < count($cart['detail']); $i++){
            $cart['detail'][$i]['product'] =  $this->model->getProduct($cart['detail'][$i]['product_id']);
        }
        // echo '<pre>';
        // print_r($cart);
        // echo '</pre>';
        $this->data['sub_content']['cart'] = $cart;
        $this->data["content"] = "cart/cart";
        $this->data["page_title"] = "Đơn đặt hàng #".$cart['cart_id']." - MobileStore";
        $this->render("layouts/client-layout", $this->data);
    }
    public function list($idUser){
        $cart = $this->model->getList($idUser);
        for($i = 0; $i < count($cart); $i++){
            $cart[$i]['user'] =  $this->model->getUser($cart[$i]['users_id']);
            $cart[$i]['detail'] =  $this->model->getDetail($cart[$i]['cart_id']);
        }
        // echo '<pre>';
        // print_r($cart);
        // echo '</pre>';
        $this->data['sub_content']['cart'] = $cart;
        $this->data["content"] = "cart/list";
        $this->data["page_title"] = "Danh sách đơn đặt hàng của ".$cart[0]['user']['fullname']." - MobileStore";
        $this->render("layouts/client-layout", $this->data);
    }
}
?>