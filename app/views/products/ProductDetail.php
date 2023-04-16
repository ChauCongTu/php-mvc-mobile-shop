<div class="container">
    <div class="item-root">
        <a href="/">Trang chủ</a>
        <?php echo (isset($dir1['name'])) ? '<b> > </b><a href="/' . $dir1['link'] . '">' . $dir1['name'] . '</a>' : false; ?>
        <?php echo (isset($dir2['name'])) ? '<b> > </b><a href="">' . $dir2['name'] . '</a>' : false; ?>
        <?php echo (isset($dir3['name'])) ? '<b> > </b><a href="">' . $dir3['name'] . '</a>' : false; ?>
    </div>

    <div class="product-detail">
        <div class="product-detail-main">
            <div class="product-img">
                <div class="product-detail-img" id="img">
                    <?php
                    foreach ($img as $value) {
                        echo '<div class="product-detail-img-item">
                                    <img src="' . $value['img'] . '"/>
                                </div>';
                    }
                    ?>
                </div>
                <div class="product-detail-thumb" id="thumbs">
                    <?php
                    foreach ($img as $value) {
                        echo '<div>
                                    <img src="' . $value['img'] . '"/>
                                </div>';
                    }
                    ?>
                </div>
            </div>
            <div class="product-detail-info">
                <span class="product-detail-info-name"><?php echo $product['name']; ?></span>
                <p class="product-detail-info-id">No: <?php echo $product['product_id']; ?></p>
                <div class="product-detail-info-state">
                    <?php
                    if ($product['state'] == 0)
                        echo '<span class="text-success">Hàng có sẵn</span>';
                    else
                        echo '<span class="text-danger">Ngừng kinh doanh</span>';
                    ?>

                </div>
                <div class="product-detail-info-price">
                    <?php
                    if ($product['discount_price'] > 0) {
                        echo '<span class="sale-price">' . currency_format($product['discount_price']) . '</span><br>
                                <span class="origin-price">' . currency_format($product['origin_price']) . '</span> <span class="percent-descrease">' . $product['tmp_price'] . '%</span>';
                    } else {
                        echo '<span class="sale-price">' . currency_format($product['origin_price']) . '</span><br>';
                    }
                    ?>
                </div>
                <div class="product-detail-info-promotion">
                    <span class="pro-title text-danger"><i class="fa-solid fa-gift"></i> Khuyến mãi</span>
                    <div class="pro-content">
                        <?php echo $product['gift']; ?>
                    </div>
                </div>
                <div class="product-detail-info-button">
                    <a href="/gio-hang/them/<?php echo $product['product_id']; ?>" class="btn-addToCart">
                        <div>ĐẶT NGAY</div>
                    </a>
                    <a href="" class="btn-action">
                        <div>TRẢ GÓP 0%</div>
                    </a>
                </div>
            </div>
        </div>
        <div class="product-detail-aside">
            <div class="product-detail-aside-title">Thông tin sản phẩm</div>
            <div class="product-detail-aside-content">
                <p>- Máy mới nguyên seal 100%, chính hãng Xiaomi Việt Nam</p>
                <p>- Bộ sản phẩm gồm: Hộp, Thân máy, Cáp sạc, Dụng cụ lấy SIM, Sách hướng dẫn, túi giấy cao cấp DDV</p>
                <div class="product-detail-aside-title">Chính sách bảo hành</div>
                <div class="product-detail-aside-content">
                    <p>Bảo hành 1 Đổi 1 trong vòng 33 ngày độc quyền tại Di Động Việt. Bảo hành chính hãng 12 tháng </p>
                </div>
            </div>
        </div>
    </div>
    <div class="product-info">
        <div class="row">
            <div class="col-md-8">
                <div class="product-info-main">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#info">Thông Tin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#detail">Chi Tiết</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#rating">Đánh Giá</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="info" class="container tab-pane active"><br>
                            <?php echo $product['info']; ?>
                        </div>
                        <div id="detail" class="container tab-pane fade"><br>
                            <?php echo $product['detail']; ?>
                        </div>
                        <div id="rating" class="container tab-pane fade"><br>
                            <h3 class="text-center">Tính năng đang được cập nhật, hãy quay lại sau!</h3>
                            <img src="/images/banner/26691.jpg" alt="back again" width="100%">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-info-aside">
                    <div class="product-info-aside-title">
                        <span><i class="fa-solid fa-gear"></i> Thông số | Cấu hình</span>
                    </div>
                    <div class="product-info-aside-body">
                        <?php
                        foreach ($config as $value) {
                            echo '<div class="product-info-aside-body-item">
                                        <div class="config-key">' . $value['conf_key'] . '</div>
                                        <div class="config-value">' . $value['conf_value'] . '</div>
                                    </div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sản phẩm cùng thương hiệu -->
    <div class="product-same panel">
        <div class="slick">
            <div class="slick-header">
                <div class="slick-header-title">Sản phẩm cùng thương hiệu</div>
                <div class="slick-arrow"></div>
            </div>
            <div class="slick-body">
                <?php
                foreach ($productSameBrand as $value) {
                    if ($value['discount_price'] > 0) {
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
</div>