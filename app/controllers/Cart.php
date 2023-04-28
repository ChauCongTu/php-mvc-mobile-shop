<?php
class Cart extends Controller{
    public $data = [];
    public $model;

    /*
    Cart: 
        - List<cartItem>
        - Total
    cartItem: 
        - Product_id
        - Product_name
        - Amount
        - Photo
        - Price
        - Total
    */

    public function __construct()
    {
        $this->model= $this->model('CartModel');
    }
    // Index Action
    public function index(){
        $cart = Session::data('cart');
        $this->data["page_title"] = "Giỏ hàng của tôi";
        $this->data["sub_content"]["cart"] = $cart;
        // echo'<pre>';
        // print_r($cart);
        // echo'</pre>';
        $this->data["content"] = "cart/index";
        $this->render("layouts/client-layout", $this->data);
    }
    public function addToCart($idProduct){
        $cartItemList = Session::data('cart');
        if ($cartItemList == null){
            $cartItemList = [];
        }
        if (array_key_exists($idProduct, $cartItemList)){
            $cartItemList[$idProduct]['amount'] ++;
            $cartItemList[$idProduct]['total'] = $cartItemList[$idProduct]['amount'] * $cartItemList[$idProduct]['price'];
        }
        else {
            $now = date('Y-m-d H:i:s');
            $product = $this->model('ProductModel')->getProductById($idProduct);
            $name = $product['name'];
            $amount = 1;
            $photo = $product['img'];
            if($product['discount_price'] > 0){
                $price = $product['discount_price'];
            }
            else {
                $price = $product['origin_price'];
            }

            $total = $price * $amount;
            $cartItem = [
                'product_id' => $idProduct,
                'name' => $name,
                'amount' => $amount,
                'photo' => $photo,
                'price' => $price,
                'total' => $total  
            ];
            $cartItemList += [
                $idProduct => $cartItem
            ];
        }
        Session::data('cart', $cartItemList);
        header('Location: /gio-hang');
        exit();
    }
    public function RemoveItem($idProduct){
        $cartItemList = Session::data('cart');
        if (array_key_exists($idProduct, $cartItemList)){
            if (count($cartItemList) == 1) {
                Session::delete('cart');
                header('Location: /gio-hang');
                exit();
            }
            else{
                unset($cartItemList[$idProduct]);
            }
        }
        else{
            echo 'Sản phẩm không tồn tại!';
        }
        Session::data('cart', $cartItemList);
        header('Location: /gio-hang');
        exit();
    }
    public function IncreaseAmount($idProduct){
        $cartItemList = Session::data('cart');
        $cartItemList[$idProduct]['amount']++;
        $cartItemList[$idProduct]['total'] = $cartItemList[$idProduct]['amount'] * $cartItemList[$idProduct]['price'];
        Session::data('cart', $cartItemList);
        header('Location: /gio-hang');
        exit();
    }
    public function DecreaseAmount($idProduct){
        $cartItemList = Session::data('cart');
        if ($cartItemList[$idProduct]['amount'] <= 1) {
            // It will not Decrease Amount
        }
        else {
            $cartItemList[$idProduct]['amount']--;
            $cartItemList[$idProduct]['total'] = $cartItemList[$idProduct]['amount'] * $cartItemList[$idProduct]['price'];
        }
        Session::data('cart', $cartItemList);
        header('Location: /gio-hang');
        exit();
    }
    public function CheckoutConfirm($cart, $user){
        
    }

}
?>