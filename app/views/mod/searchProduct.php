<div class="container">
    <div class="row">
        <div class="panel2 col-sm-2">
            <div class="filter">
                <div class="form-header"><i class="fa-sharp fa-regular fa-filter"></i> Bộ lọc</div>
                <div class="list-group list-group-flush">
                    <?php
                    echo '
                    <a href="/tim-kiem?_k=' . $tukhoa . '&type=product&orderby=newfirst" class="list-group-item list-group-item-action">Mới nhất trước</a>
                    <a href="/tim-kiem?_k=' . $tukhoa . '&type=product&orderby=oldfirst" class="list-group-item list-group-item-action">Cũ nhất trước</a>
                    <a href="/tim-kiem?_k=' . $tukhoa . '&type=product&orderby=cheapfirst" class="list-group-item list-group-item-action">Giá rẻ nhất</a>
                    <a href="/tim-kiem?_k=' . $tukhoa . '&type=product&orderby=hotfirst" class="list-group-item list-group-item-action">Nổi bật nhất</a>';

                    ?>
                </div>
            </div>
        </div>
        <div class="panel2 col-sm-10">
            <div class="result">
                <?php
                echo '<div class="form-header"><a href="/tim-kiem?_k=' . $tukhoa . '&type=news" class="none-underline">Tin tức</a> - <strong>Sản Phẩm</strong></div>';
                ?>
                <div class="form-body">
                    <div class="danhmuc-body">
                        <?php
                        if (count($product) == 0) {
                            echo '
                            <h2 class="text-danger text-center p-3">Không tìm thấy sản phẩm liên quan đến: ' . $tukhoa . '!</h2>
                            <img src="/images/img/oops.png" width="100%" alt="Có lỗi xảy ra...">
                            ';
                        } else {
                            $now = date('Y-m-d H:i:s');
                            foreach ($product as $value) {
                                if (isset($value['end_discount']) && $now <= $value['end_discount']) {
                                    echo '<div class="danhmuc-sanpham">
                                            <div class="sale-info"></div>
                                            <div class="danhmuc-img">
                                                <img src="' . $value['img'] . '">
                                            </div>
                                            <div class="danhmuc-info">
                                                <a href="/' . $value['slug_product'] . '_' . $value['product_id'] . '" class="color-black">
                                                    <div class="danhmuc-name">' . $value['name'] . '</div>
                                                </a>
                                                <div class="slick-price">
                                                    <div class="slick-sale-price">' . currency_format($value['discount_price']) . '</div>
                                                    <div class="slick-origin-price"> <del>' . currency_format($value['origin_price']) . '</del></div>
                                                </div>
                                            </div>
                                        </div>';
                                }
                                else{
                                    echo '<div class="danhmuc-sanpham">
                                            <div class="sale-info"></div>
                                            <div class="danhmuc-img">
                                                <img src="' . $value['img'] . '">
                                            </div>
                                            <div class="danhmuc-info">
                                                <a href="/' . $value['slug_product'] . '_' . $value['product_id'] . '" class="color-black">
                                                    <div class="danhmuc-name">' . $value['name'] . '</div>
                                                </a>
                                                <div class="slick-price">
                                                    <div class="slick-sale-price">' . currency_format($value['origin_price']) . '</div>
                                                </div>
                                            </div>
                                        </div>';
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>