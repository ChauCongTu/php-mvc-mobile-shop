<br>
<!-- Begin header index: Trending product, banner square, flash sale weekend -->
<div class="container">
    <div class="row">
        <div class="col-sm-2 rounded-3 none-on-mobile">
            <div class="hot-header-main">
                <div class="hot-header">
                    <span><i class="fa-solid fa-arrow-trend-up"></i> Xu hướng mua sắm</span>
                </div>
            </div>
            <div class="hot-content">
                <a href="" class="none-underline color-black"><b>#1 Iphone 14 Pro Max</b>
                    <small>
                        <pre>Đặt hàng ngay</pre>
                    </small>
                </a>
            </div>
            <div class="hot-content">
                <a href="" class="none-underline color-black"><b>#2 Galaxy S23 series</b>
                    <small>
                        <pre>Đặt hàng ngay</pre>
                    </small>
                </a>
            </div>
            <div class="hot-content">
                <a href="" class="none-underline color-black"><b>#3 Iphone 13</b>
                    <small>
                        <pre>Đặt hàng ngay</pre>
                    </small>
                </a>
            </div>
            <div class="hot-content">
                <a href="" class="none-underline color-black"><b>#4 Galaxy S23 Plus 5G</b>
                    <small>
                        <pre>Đặt hàng ngay</pre>
                    </small>
                </a>
            </div>
            <div class="hot-content">
                <a href="" class="none-underline color-black"><b>#5 Oppo Reno 8T 5G</b>
                    <small>
                        <pre>Đặt hàng ngay</pre>
                    </small>
                </a>
            </div>
        </div>

        <div class="col-md-7 mt-2">
            <div class="slick">

                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php
                        if(count($centerBanner) > 1){
                            echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>';
                            for($i = 1; $i < count($centerBanner); $i++){
                                echo'<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$i.'" aria-label="Slide '.$i.'"></button>';
                            }
                        }
                        ?>                        
                    </div>
                    <div class="carousel-inner">
                        <?php
                        foreach ($centerBanner as $value) {
                            echo '<div class="carousel-item active">
                                    <a href="' . $value['link_product'] . '">
                                        <img src="' . $value['img'] . '" class="d-block w-100 border-radius-img">
                                    </a>
                                 </div>';
                        }
                        ?>
                    </div>
                    <?php
                        if(count($centerBanner) > 1){
                            echo'<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>';
                        }
                    ?>
                </div>

            </div>
        </div>

        <div class="col-md-3 pt-2 rounded-3">
            <div class="flex-on-mobile">
                <?php
                if (count($hotBanner) == 0) {
                    echo 'Hiện tại chưa có chương trình khuyến mãi nào hot!';
                } else {
                    foreach ($hotBanner as $value) {
                        echo '<div>
                                <a href="' . $value['link_product'] . '">
                                    <img src="' . $value['img'] . '" alt="" width="100%" class="border-banner border-radius-img panel">
                                </a>
                            </div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Begin banner long -->
<div class="container">
    <div class="slick-banner-long">
        <?php
        foreach ($longBanner as $value) {
            echo '
            <div class="slick-item">
                <a href="' . $value['link_product'] . '">
                    <img src="' . $value['img'] . '" width="100%" class="border-banner border-radius-img panel">
                </a>
            </div>';
        }
        ?>
    </div>
</div>
<!-- Các sản phẩm giảm giá nhiều nhất -->
<?php
if (count($flashSaleProduct) == 0) {
} else {
?>
    <div class="container">
        <div class="list-product">
            <div class="flash-sale-header"><img src="/images/img/—Pngtree—flash sale yellow red 3d_5535040.png" class="img-flash-sale none-on-mobile" width="108px"> SĂN SALE LIỀN TAY - RINH NGAY QUÀ HOT</div>
        </div>
        <div class="list-product-body bg-danger">
            <div class="slick-without-dots">
                <?php
                foreach ($flashSaleProduct as $value) {
                    $discount = round((($value['origin_price'] - $value['discount_price']) / $value['origin_price']) * 100);
                    echo '<div class="slick-item">
                        <div class="slick-product-slider">
                            <div class="slick-sale-info"><span> Giảm ' . $discount . '%</span></div>
                            <div class="slick-img-product-sale">
                                <img src="' . $value['img'] . '">
                            </div>
                            <div class="slick-name-product">' . $value['name'] . '</div>
                            <div class="slick-price">
                                <div class="slick-sale-price">' . currency_format($value['discount_price']) . '</div>
                                <div class="slick-origin-price"> <del>' . currency_format($value['origin_price']) . '</del></div>
                            </div>
                            <a href="/' . $value['slug_product'] . '_' . $value['product_id'] . '" class="none-underline">
                                <div class="slick-order-button"> Xem chi tiết</div>
                            </a>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
<?php
}
?>
<!-- Các thương hiệu nổi tiếng -->
<div class="container">
    <div class="list-product">
        <div class="list-product-header">Chuyên trang thương hiệu</div>
    </div>
    <div class="list-product-body">
        <div class="slick-thuong-hieu">
            <?php
            foreach ($brandBanner as $value) {
                echo '<div class="slick-item">
                        <a href="' . $value['link_product'] . '">
                            <img src="' . $value['img'] . '">
                        </a>
                    </div>';
            }
            ?>
        </div>
    </div>
</div>
<!-- Các sản phẩm Iphone giảm nhiều nhất -->
<div class="container">
    <div class="list-product">
        <div class="list-product-header">Iphone chính hãng nổi bật</div>
    </div>
    <div class="list-product-body">
        <div class="slick-without-dots">
            <?php
            $now = date('Y-m-d H:i:s');
            foreach ($iphoneOutstanding as $value) {
                if (isset($value['end_discount'])) {
                    if ($now <= $value['end_discount']) {
                        $discount = round((($value['origin_price'] - $value['discount_price']) / $value['origin_price']) * 100);
                        echo '<div class="slick-item">
                                <div class="slick-product-slider">
                                    <div class="slick-sale-info"><span> Giảm ' . $discount . '%</span></div>
                                    <div class="slick-img-product-sale">
                                        <img src="' . $value['img'] . '">
                                    </div>
                                    <div class="slick-name-product">' . $value['name'] . '</div>
                                    <div class="slick-price">
                                        <div class="slick-sale-price">' . currency_format($value['discount_price']) . '</div>
                                        <div class="slick-origin-price"> <del>' . currency_format($value['origin_price']) . '</del></div>
                                    </div>
                                    <a href="/' . $value['slug_product'] . '_' . $value['product_id'] . '" class="none-underline">
                                        <div class="slick-order-button"> Xem chi tiết</div>
                                    </a>
                                </div>
                            </div>';
                    } else {
                        echo '<div class="slick-item">
                                <div class="slick-product-slider">
                                    <div class="slick-img-product-sale">
                                        <img src="' . $value['img'] . '">
                                    </div>
                                    <div class="slick-name-product">' . $value['name'] . '</div>
                                    <div class="slick-price">
                                        <div class="slick-sale-price">' . currency_format($value['origin_price']) . '</div>
                                    </div>
                                    <a href="/' . $value['slug_product'] . '_' . $value['product_id'] . '" class="none-underline">
                                        <div class="slick-order-button"> Xem chi tiết</div>
                                    </a>
                                </div>
                            </div>';
                    }
                } else {
                    echo '<div class="slick-item">
                            <div class="slick-product-slider">
                                <div class="slick-img-product-sale">
                                    <img src="' . $value['img'] . '">
                                </div>
                                <div class="slick-name-product">' . $value['name'] . '</div>
                                <div class="slick-price">
                                    <div class="slick-sale-price">' . currency_format($value['origin_price']) . '</div>
                                </div>
                                <a href="/' . $value['slug_product'] . '_' . $value['product_id'] . '" class="none-underline">
                                    <div class="slick-order-button"> Xem chi tiết</div>
                                </a>
                            </div>
                        </div>';
                }
            }
            ?>
        </div>
    </div>
</div>
<!-- Các sản phẩm Iphone giảm nhiều nhất -->
<div class="container">
    <div class="list-product">
        <div class="list-product-header">Phụ kiện nổi bật</div>
    </div>
    <div class="list-product-menu none-on-mobile bg-white">
        <div class="row">
            <div class="col"><a href="/tim-kiem?_k=i&type=product" class="color-black">Phụ kiện Apple</a></div>
            <div class="col"><a href="/tim-kiem?_k=phu+kien+samsung&type=product" class="color-black">Phụ kiện Samsung</a></div>
            <div class="col"><a href="/tim-kiem?_k=sạc+dự+phòng&type=product" class="color-black">Sạc dự phòng</a></div>
            <div class="col"><a href="/tim-kiem?_k=củ+sạc&type=product" class="color-black">Adapter/Củ sạc</a></div>
            <div class="col"><a href="/tim-kiem?_k=cáp+sạc&type=product" class="color-black">Dây sạc/Cáp sạc</a></div>
            <div class="col"><a href="/tim-kiem?_k=tai+nghe&type=product" class="color-black">Tai nghe</a></div>
            <div class="col"><a href="/tim-kiem?_k=tai+nghe+bluetooth&type=product" class="color-black">Tai nghe bluetooth</a></div>
            <div class="col"><a href="/tim-kiem?_k=loa+bluetooth&type=product" class="color-black">Loa bluetooth</a></div>
            <div class="col"><a href="/tim-kiem?_k=ốp+lưng&type=product" class="color-black">Ốp lưng/Bao da</a></div>
            <div class="col"><a href="/tim-kiem?_k=kính+cường+lực&type=product" class="color-black">Kính cường lực</a></div>
        </div>
    </div>
    <div class="list-product-body">
        <div class="slick-without-dots">
            <?php
            $now = date('Y-m-d H:i:s');
            foreach ($accessory as $value) {
                if (isset($value['end_discount']) && $now <= $value['end_discount']) {
                    $discount = round((($value['origin_price'] - $value['discount_price']) / $value['origin_price']) * 100);
                    echo '<div class="slick-item">
                                <div class="slick-product-slider">
                                    <div class="slick-sale-info"><span> Giảm ' . $discount . '%</span></div>
                                    <div class="slick-img-product-sale">
                                        <img src="' . $value['img'] . '">
                                    </div>
                                    <div class="slick-name-product">' . $value['name'] . '</div>
                                    <div class="slick-price">
                                        <div class="slick-sale-price">' . currency_format($value['discount_price']) . '</div>
                                        <div class="slick-origin-price"> <del>' . currency_format($value['origin_price']) . '</del></div>
                                    </div>
                                    <a href="/' . $value['slug_product'] . '_' . $value['product_id'] . '" class="none-underline">
                                        <div class="slick-order-button"> Xem chi tiết</div>
                                    </a>
                                </div>
                            </div>';
                } else {
                    echo '<div class="slick-item">
                                <div class="slick-product-slider">
                                    <div class="slick-img-product-sale">
                                        <img src="' . $value['img'] . '">
                                    </div>
                                    <div class="slick-name-product">' . $value['name'] . '</div>
                                    <div class="slick-price">
                                        <div class="slick-sale-price">' . currency_format($value['origin_price']) . '</div>
                                    </div>
                                    <a href="/' . $value['slug_product'] . '_' . $value['product_id'] . '" class="none-underline">
                                        <div class="slick-order-button"> Xem chi tiết</div>
                                    </a>
                                </div>
                            </div>';
                }
            }
            ?>
        </div>
    </div>
</div>
<!-- Các sản phẩm Iphone giảm nhiều nhất -->
<div class="container">
    <div class="list-product">
        <div class="list-product-header">Máy tính bảng nổi bật <span class="hot-key"><a href="">Ipad pro</a><a href="">Galaxy Tab</a></span></div>
    </div>
    <div class="list-product-body">
        <div class="slick-without-dots">
            <?php
            $now = date('Y-m-d H:i:s');
            foreach ($tablet as $value) {
                if (isset($value['end_discount']) && $now <= $value['end_discount']) {
                    $discount = round((($value['origin_price'] - $value['discount_price']) / $value['origin_price']) * 100);
                    echo '<div class="slick-item">
                                <div class="slick-product-slider">
                                    <div class="slick-sale-info"><span> Giảm ' . $discount . '%</span></div>
                                    <div class="slick-img-product-sale">
                                        <img src="' . $value['img'] . '">
                                    </div>
                                    <div class="slick-name-product">' . $value['name'] . '</div>
                                    <div class="slick-price">
                                        <div class="slick-sale-price">' . currency_format($value['discount_price']) . '</div>
                                        <div class="slick-origin-price"> <del>' . currency_format($value['origin_price']) . '</del></div>
                                    </div>
                                    <a href="/' . $value['slug_product'] . '_' . $value['product_id'] . '" class="none-underline">
                                        <div class="slick-order-button"> Xem chi tiết</div>
                                    </a>
                                </div>
                            </div>';
                } else {
                    echo '<div class="slick-item">
                                <div class="slick-product-slider">
                                    <div class="slick-img-product-sale">
                                        <img src="' . $value['img'] . '">
                                    </div>
                                    <div class="slick-name-product">' . $value['name'] . '</div>
                                    <div class="slick-price">
                                        <div class="slick-sale-price">' . currency_format($value['origin_price']) . '</div>
                                    </div>
                                    <a href="/' . $value['slug_product'] . '_' . $value['product_id'] . '" class="none-underline">
                                        <div class="slick-order-button"> Xem chi tiết</div>
                                    </a>
                                </div>
                            </div>';
                }
            }
            ?>
        </div>
    </div>
</div>
<!--  -->
<div class="container none-on-mobile">
    <div class="list-product">
        <div class="list-product-header">Bản tin công nghệ</div>
        <div class="bg-white">
            <div class="row the-news">
                <?php
                foreach ($news as $value) {
                    echo '<div class="news">
                            <a href="/bai-viet/' . $value['slug'] . '" class="color-black">
                                <div class="news-img"><img src="' . $value['thumb'] . '" class="border-radius-img-header"></div>
                                <div class="news-name">' . $value['name'] . '</div>
                            </a>
                        </div>';
                }
                ?>
                <div class="col-sm-3">

                </div>
                <div class="btn-see-more">
                    <a href="" class="btn btn-danger">Xem toàn bộ <i class="fa-solid fa-angles-right"></i></a>
                </div>
            </div>
        </div>
    </div>