<br>
<div class="container panel">
    <div class="danhmuc">
        <div class="danhmuc-header">Điện thoại <?php echo $brandName; ?></div>
        <div class="danhmuc-nav pb-3">
            <div class="danhmuc-nav-filter">Mức giá</div>
            <div class="danhmuc-nav-tieuchi">
                <?php
                echo'
                <a href="'.App::$app->getUrl().'?filter=1" class="color-black">Dưới 2 triệu</a>
                <a href="'.App::$app->getUrl().'?filter=2" class="color-black">2-6 triệu</a>
                <a href="'.App::$app->getUrl().'?filter=3" class="color-black">6-10 triệu</a>
                <a href="'.App::$app->getUrl().'?filter=4" class="color-black">Trên 10 triệu</a>';
                ?>
            </div>
            <div class="danhmuc-nav-filter">Sắp xếp theo</div>
            <div class="danhmuc-nav-tieuchi">
                <?php 
                echo'
                <a href="'.App::$app->getUrl().'?sort=1" class="color-black">Mới nhất</a>
                <a href="'.App::$app->getUrl().'?sort=2" class="color-black">Ưu đãi</a>
                <a href="'.App::$app->getUrl().'?sort=3" class="color-black">Đắt nhất</a>
                <a href="'.App::$app->getUrl().'?sort=4" class="color-black">Rẻ nhất</a>';
                ?>
            </div>
        </div>
    </div>
</div>
<div class="container panel mt-2">
    <div class="danhmuc">
        <div class="danhmuc-body">
            <?php
            $now = date('Y-m-d H:i:s');
            foreach($product as $value){
                if(isset($value['end_discount']) && $now <= $value['end_discount']){
                    echo'<div class="danhmuc-sanpham">
                            <div class="sale-info"></div>
                            <div class="danhmuc-img">
                                <img src="'.$value['img'].'">
                            </div>
                            <div class="danhmuc-info">
                                <a href="/'.$value['slug_product'].'_'.$value['product_id'].'" class="color-black">
                                    <div class="danhmuc-name">'.$value['name'].'</div>
                                </a>
                                <div class="slick-price">
                                    <div class="slick-sale-price">'.currency_format($value['discount_price']).'</div>
                                    <div class="slick-origin-price"> <del>'.currency_format($value['discount_price']).'</del></div>
                                </div>
                            </div>
                        </div>';
                }
                else{
                    echo'<div class="danhmuc-sanpham">
                            <div class="sale-info"></div>
                            <div class="danhmuc-img">
                                <img src="'.$value['img'].'">
                            </div>
                            <div class="danhmuc-info">
                                <a href="/'.$value['slug_product'].'_'.$value['product_id'].'" class="color-black">
                                    <div class="danhmuc-name">'.$value['name'].'</div>
                                </a>
                                <div class="slick-price">
                                    <div class="slick-sale-price">'.currency_format($value['origin_price']).'</div>
                                </div>
                            </div>
                        </div>';
                }
            }
            ?>
        </div>
    </div>
    <ul class="pagination justify-content-center p-2">
        <li class="page-item"><a class="page-link color-black" href="javascript:void(0);"><i class="fa-solid fa-angles-left"></i></a></li>
        <li class="page-item"><a class="page-link color-black" href="javascript:void(0);">1</a></li>
        <li class="page-item"><a class="page-link color-black" href="javascript:void(0);">2</a></li>
        <li class="page-item"><a class="page-link color-black" href="javascript:void(0);"><i class="fa-solid fa-angles-right"></i></a></li>
    </ul>
</div>