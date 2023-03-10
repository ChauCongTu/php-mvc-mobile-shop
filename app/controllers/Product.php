<?php
class Product extends Controller{
    public $data = [];
    public $_product;
    public function __construct()
    {
        $this->_product = $this->model('ProductModel');
    }
    public function item($slug_product, $idProduct){
        $product = $this->_product->getProductById($idProduct);
        if($product != false){
            $this->data['page_title'] = $product['name'] . ' | MobileStore';
            $this->data['sub_content']['product'] = $product;
            $this->data['sub_content']['img'] = $this->_product->getImageProduct($product['product_id']);
            $this->data['sub_content']['config'] = $this->_product->getConfigProduct($product['product_id']);
            $this->data['sub_content']['productSameBrand'] = $this->_product->getProductByBrand($product['brand_id'], 10);
            $this->data["content"] = "products/item";
            $this->render("layouts/client-layout", $this->data);
        }
        else{
            App::$app->loadError('404');
        }
    }
    public function category($name, $idBrand, $type = 1){
        $product = $this->_product->getProductByBrand($idBrand, $type);
        $filter = (isset($_GET['filter']))?$_GET['filter']:false;
        $sort = (isset($_GET['sort']))?$_GET['sort']:false;
        $this->data['page_title'] = 'Danh mục điện thoại '.$this->_product->getBrandName($idBrand) . ' | MobileStore';
        $this->data['sub_content']['brandName'] = $this->_product->getBrandName($idBrand);
        if($filter != false){
            $product = $this->_product->filterProduct($product, $filter);
        }
        if($sort != false){
            $product = $this->_product->sortProduct($product, $sort);
        }
        $this->data['sub_content']['product'] = $product;
        $this->data["content"] = "products/category";
        $this->render("layouts/client-layout", $this->data);

    }
    public function logout(){
        var_dump(Session::delete('user'));
    }
}
?>