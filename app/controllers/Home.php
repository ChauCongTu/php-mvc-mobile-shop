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
        $this->data['sub_content']['flashSaleProduct'] = $product->getProductBestDiscount();
        $this->data['sub_content']['iphoneOutstanding'] = $product->getProductByBrand(2, 10);
        $this->data['sub_content']['tablet'] = $product->getProductByType(2, 10);
        $this->data['sub_content']['accessory'] = $product->getProductByType(3, 10);
        $this->data["content"] = "home/index";
        $this->render("layouts/client-layout", $this->data);
    }
    public function logout(){
        var_dump(Session::delete('user'));
    }
}
?>
