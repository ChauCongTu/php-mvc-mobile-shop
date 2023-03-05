<?php
class Home extends Controller{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('HomeModel');
    }
    public function index(){
        $this->data['page_title'] = "MobileStore.Com - Điện thoại di động, máy tính bảng, phụ kiện giá tốt";
        $banner = $this->model('BannerModel');
        $product = $this->model('ProductModel');
        $this->data['sub_content']['centerBanner'] = $banner->getCenterBanner();
        $this->data['sub_content']['headerBanner'] = $banner->getHeaderLongBanner();
        $this->data['sub_content']['longBanner'] = $banner->getLongBanner();
        $this->data['sub_content']['hotBanner'] = $banner->getHotBanner();
        $this->data['sub_content']['brandBanner'] = $banner->getBrandBanner();
        $this->data['sub_content']['flashSaleProduct'] = $product->getProductBestDiscount();
        $this->data['sub_content']['iphoneOutstanding'] = $product->getProductByBrand(2, 10);
        $this->data['sub_content']['tablet'] = $product->getProductByType(2, 10);
        $this->data['sub_content']['accessory'] = $product->getProductByType(3, 10);
        $this->data["content"] = "home/index";
        $this->render("layouts/client-layout", $this->data);
    }
    
    public function search(){
        $product = $this->model('ProductModel');
        $news = $this->model('NewsModel');
        if(!isset($_GET['_k']) || $_GET['_k'] == ''){
            $this->data["content"] = "mod/searchEmpty";
            $this->render("layouts/client-layout", $this->data);
        }
        else{
            if(!isset($_GET['type']) || $_GET['type'] == 'product'){
                $keyword = $_GET['_k'];
                $this->data['sub_content']['tukhoa'] = $keyword;
                $this->data["page_title"] = "Kết quả tìm kiếm cho: ".$keyword .' | MobileStore';
                $this->data['sub_content']['product'] = $product->getProductById($keyword);
                // if(!isset($_GET['orderby'])){
                //     $this->data['sub_content']['product'] = $product->searchProductByName($keyword);
                // }
                // else{
                //     $this->data['sub_content']['product'] = $product->searchProductByName($keyword, $_GET['orderby']);
                // }
                $this->data["content"] = "mod/searchProduct";
                $this->render("layouts/client-layout", $this->data);
            }
            else if($_GET['type'] == 'news'){
                $keyword = $_GET['_k'];
                $this->data['sub_content']['tukhoa'] = $keyword;
                $this->data["page_title"] = "Kết quả tìm kiếm cho: ".$keyword;
                if(!isset($_GET['orderby'])){
                    $this->data['sub_content']['news'] = $news->searchNewsByName($keyword);
                }
                else{
                    $this->data['sub_content']['news'] = $news->searchNewsByName($keyword, $_GET['orderby']);
                }
                $this->data["content"] = "mod/searchNews";
                $this->render("layouts/client-layout", $this->data);
            }
            else{
                App::$app->loadError('404');
            }
        }
        
    }
    public function logout(){
        var_dump(Session::delete('user'));
    }
}
