<?php
class News extends Controller{
    public $data = [];
    public $model_news;
    public function __construct()
    {
        $this->model_news = $this->model('NewsModel');
    }
    public function category(){
        $limit = 12;
        $current_page = (isset($_GET['page']))?$_GET['page']:1;
        $this->data['page_title'] = "Bản tin công nghệ 24h cập nhật những tin tức công nghệ nổi bật nhất - MobileStore";
        $news = $this->model_news->getNews();
        $total_news = count($news);
        $total_page = ceil($total_news/$limit);
        $product = $this->model_news->splitProduct($news, $current_page, $total_page, $limit);
        $total_page = ceil($total_news/$limit);
        $this->data["sub_content"]['news'] = $news;
        $this->data["content"] = "news/category";
        $this->render("layouts/client-layout", $this->data);
    }
}