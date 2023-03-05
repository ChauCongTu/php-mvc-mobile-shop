<?php
class Product extends Controller{
    public $data = [];
    public $product;
    public function __construct()
    {
        $this->product = $this->model('ProductModel');
    }
    public function item($slug_product, $idProduct){
        $product = $this->product->getProductById($idProduct);
        if($product != false){
            $this->data['page_title'] = $product['name'] . ' | MobileStore';
            $this->data['sub_content']['product'] = $product;
            $this->data['sub_content']['img'] = $this->product->getImageProduct($product['product_id']);
            $this->data['sub_content']['config'] = $this->product->getConfigProduct($product['product_id']);
            $this->data['sub_content']['productSameBrand'] = $this->product->getProductByBrand($product['brand_id'], 10);
            $this->data["content"] = "products/item";
            $this->render("layouts/client-layout", $this->data);
        }
        else{
            App::$app->loadError('404');
        }
    }
    public function category($name, $idBrand, $type='1'){
        $product = $this->product->getProductByBrand($idBrand, $type);
        $this->data['page_title'] = 'Danh mục điện thoại '.$this->product->getBrandName($idBrand) . ' | MobileStore';
        $this->data['sub_content']['brandName'] = $this->product->getBrandName($idBrand);
        $this->data['sub_content']['product'] = $product;
        $this->data["content"] = "products/category";
        $this->render("layouts/client-layout", $this->data);

    }
    public function logout(){
        var_dump(Session::delete('user'));
    }
}
?>