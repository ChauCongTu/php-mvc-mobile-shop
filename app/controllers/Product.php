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
            $this->data['sub_content']['productSameBrand'] = $this->_product->getProductByBrand($product['brand_id'], 1, 10);
            $this->data["content"] = "products/item";
            $this->render("layouts/client-layout", $this->data);
        }
        else{
            App::$app->loadError('404');
        }
    }

    public function ProductCategory($type = 1, $name = '',$idBrand = ''){
        $type = addslashes($type);
        $idBrand = addslashes($idBrand);
        $limit = 20;
        if($idBrand == null){
            $product = $this->_product->getProductByType($type);
        }
        else {
            $product = $this->_product->getProductByBrand($idBrand, $type);
        }
        $total_product = count($product);
        $total_page = ceil($total_product/$limit);
        $current_page = (isset($_GET['page']))?$_GET['page']:1;

        if($current_page > $total_page || $current_page <= 0){
            App::$app->loadError("404");
            die();
        }
        // Filter Product
        $startPrice = (isset($_GET['startPrice']))?filter_var($_GET['startPrice'], FILTER_SANITIZE_NUMBER_FLOAT):"";
        $endPrice = (isset($_GET['endPrice']))?filter_var($_GET['endPrice'], FILTER_SANITIZE_NUMBER_FLOAT):"";
        if ($startPrice != "" && $endPrice != ""){
            $product = $this->_product->filterProduct($product, $startPrice, $endPrice);
        }
        // Split Page
        $total_product = count($product);
        $product = $this->_product->splitProduct($product, $current_page, $total_page, $limit);
        // Set Page Title
        if ($type == 1)
            $this->data["page_title"] = "Điện thoại " .$idBrand." - Smartphone chính hãng thế hệ mới, ưu đãi, trả góp 0 lãi suất | MobileStore";
        else if ($type == 2)
            $this->data["page_title"] = "Máy tính bảng " .$idBrand." - Tablet chính hãng thế hệ mới, ưu đãi, trả góp 0 lãi suất | MobileStore";
        else if ($type == 3)
            $this->data["page_title"] = "Phụ kiện " .$idBrand." - Phụ kiện chính hãng thế hệ mới, ưu đãi, trả góp 0 lãi suất | MobileStore";
        // Send data to View
        $this->data["sub_content"]["product"] = $product;
        $this->data['sub_content']['total_page'] = $total_page;
        $this->data['sub_content']['current_page'] = $current_page;
        $this->data["content"] = "products/ProductCategory";
        $this->render("layouts/client-layout", $this->data);
    }

    public function category($name, $idBrand, $type = 1){
        $limit = 10;
        $total_product = count($this->_product->getProductByBrand($idBrand, $type));
        $total_page = ceil($total_product/$limit);
        $current_page = (isset($_GET['page']))?$_GET['page']:1;
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
        $total_product = count($product);
        $product = $this->_product->splitProduct($product, $current_page, $total_page, $limit);
        $total_page = ceil($total_product/$limit);
        $this->data['sub_content']['product'] = $product;
        $this->data['sub_content']['total_page'] = $total_page;
        $this->data['sub_content']['current_page'] = $current_page;
        $this->data["content"] = "products/category";
        $this->render("layouts/client-layout", $this->data);
    }

    
    public function logout(){
        var_dump(Session::delete('user'));
    }
}
