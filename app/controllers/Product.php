<?php
    class Product extends Controller{
        public $data = [];
        public $product;
        public function __construct()
        {
            $this->product = $this->model('ProductModel');
        }
        public function index(){
            $dataProduct = $this->product->getCategory();
            $this->data['sub_content']['category'] = $dataProduct;
            $this ->data['page_title'] = 'Danh sách sản phẩm';
            $this->data['content'] = 'products/listCategory';
            $this->render('layouts/client-layout', $this->data);
        }
        public function list(){
            $this->product->deleteShop(1);
            $this->render('products/list', $this->data);
        }
        public function detail($loaisp='', $id=''){
            $product = $this->model('ProductModel');
            $detaill = $product->getDetail($id);
            $this ->data['page_title'] = $detaill['name'];
            $this->data['sub_content']['detail_product'] = $detaill;
            $this->data['content'] = 'products/detail';
            $this->render('layouts/client-layout', $this->data);
        }
        public function categories($slug){
            $product = $this->model('ProductModel');
            $detail = $product->getCategoriesBySlug($slug);
            print_r($detail);
            if(!empty($detail)){
                $this ->data['page_title'] = "Mua sắm online ".$detail['name']." giá tốt";
                $this->data['sub_content']['category'] = $detail;
                $this->data['content'] = 'products/category';
                $this->render('layouts/client-layout', $this->data);
            }
            else{
                App::$app->loadError();
            }
        }
    }
?>