<br>
<div class="container panel">
    <div class="sanpham">
        <div class="sanpham-header"><?php echo $product['name']; ?></div>
        <div class="sanpham-menu-header">
            <div class="sanpham-slick-img">
                <?php
                foreach ($img as $value) {
                    echo '<div class="sanpham-slick-item">
                            <img src="' . $value['img'] . '">
                        </div>';
                }
                ?>
            </div>
            <div class="sanpham-right-header">
                <div class="sanpham-menu text-center">
                    <div><a href="#img">Hình ảnh</a></div>
                    <div><a href="#info">Thông tin</a></div>
                    <div><a href="#config">Cấu hình</a></div>
                    <div><a href="#detail">Chi tiết</a></div>
                </div>
                <div class="sanpham-price">
                    <div class="sanpham-price-cost">
                        <div class="sanpham-sale-price">
                            <?php echo currency_format($product['discount_price']); ?>
                        </div>
                        <div class="sanpham-origin-price">
                            <del> <?php echo currency_format($product['origin_price']); ?></del>
                        </div>
                    </div>
                    <div class="sanpham-info-decrease">
                        <span>- <?php echo currency_format(round((($product['origin_price'] - $product['discount_price']) / $product['origin_price']) * 100)) ?> %</span>
                    </div>
                </div>
                <div class="sanpham-uudai">
                    <div class="sanpham-uudai-header"><span>Ưu đãi tặng kèm</span></div>
                    <div class="sanpham-uudai-body">
                        <?php echo $product['gift']; ?>
                    </div>
                </div>
                <div class="btn-order">
                    <?php echo '<a href="/gio-hang/them/' . $product['slug_product'] . '_' . $product['product_id'] . '" class="btn-order-btn">'; ?>
                    <div class="btn-order-now">
                        Đặt ngay
                    </div>
                    </a>
                    <div class="btn-order-pre">
                        <a href="/tra-gop" class="btn-order-btn-2">
                            <div class="btn--order">Trả góp (0%)</div>
                        </a>
                        <a href="/tra-gop-qua-the" class="btn-order-btn-2">
                            <div class="btn--order"> Trả góp qua thẻ</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container panel mt-2">
    <div class="sanpham-body">
        <div class="sanpham-body-config">
            <div class="sanpham-info-header" id="config">
                Thông số kỹ thuật
            </div>
            <div class="sanpham-info-body">
                <?php
                for ($i = 0; $i <= 5; $i++) {
                    echo '<div class="row">
                            <div class="col-sm-4">' . $config[$i]['conf_key'] . '</div>
                            <div class="col-sm-8">' . $config[$i]['conf_value'] . '</div>
                        </div>
                        <hr>';
                }
                ?>
                <div class="sanpham-see-more">
                    <div id="sanpham-see-more-btn" onclick="seeConfig()">
                        Xem thêm <i class=" fa-solid fa-caret-right"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="gachngang none-on-desktop"></div>
        <div class="sanpham-body-info">
            <div>
                <div class="sanpham-info-header" id="info">
                    Thông tin sản phẩm
                </div>
                <div class="sanpham-info-body">
                    <?php
                    echo substr($product['info'], 0, 400) .'</strong></b> ...';
                    ?>
                    <div class="sanpham-see-more">
                        <div id="sanpham-see-more-btn" onclick="seeInfo()">
                            Xem thêm <i class=" fa-solid fa-caret-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gachngang none-on-desktop"></div>
            <div>
                <div class="sanpham-info-header" id="detail">
                    Thông tin chi tiết
                </div>
                <div class="sanpham-info-body">
                    <?php
                    echo substr($product['detail'], 0, 400) .'</strong></b> ...';
                    ?>
                    <div class="sanpham-see-more">
                        <div id="sanpham-see-more-btn" onclick="seeDetail()">
                            Xem thêm <i class=" fa-solid fa-caret-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>

</style>
<div class="container panel mt-2">
    <div class="slick">
        <div class="slick-header">
            <div class="slick-header-title">Cùng thương hiệu</div>
            <div class="slick-arrow"></div>
        </div>
        <div class="slick-body">
            <?php
            $now = date('Y-m-d H:i:s');
            foreach($productSameBrand as $value){
                if($now <= $value['end_discount']){
                    $discount = round((($value['origin_price'] - $value['discount_price'])/$value['origin_price']) * 100);
                    echo'<div class="slick-item">
                            <div class="sanpham-thuonghieu-img">
                                <img src="'.$value['img'].'">
                            </div>
                            <div class="sanpham-thuonghieu-name"><a href="/'.$value['slug_product'].'-'.$value['product_id'].'" class="color-black">'.$value['name'].'</a></div>
                            <div class="sanpham-price">
                                <div class="sanpham-price-cost">
                                    <div class="sanpham-sale-price">
                                        '.currency_format($value['discount_price']).'
                                    </div>
                                    <div class="sanpham-origin-price">
                                        <del>'.currency_format($value['origin_price']).'</del>
                                    </div>
                                </div>
                                <div class="sanpham-info-decrease">
                                    <span>-'.$discount.'%</span>
                                </div>
                            </div>
                        </div>';
                }
                else if($value['product_id'] == $product['product_id']){

                }
                else{
                    echo'<div class="slick-item">
                            <div class="sanpham-thuonghieu-img">
                                <img src="'.$value['img'].'">
                            </div>
                            <div class="sanpham-thuonghieu-name"><a href="/'.$value['slug_product'].'-'.$value['product_id'].'" class="color-black">'.$value['name'].'</a></div>
                            <div class="sanpham-price">
                                <div class="sanpham-price-cost">
                                    <div class="sanpham-sale-price">
                                        '.currency_format($value['origin_price']).'
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
            }
            ?>
            
        </div>
    </div>
</div>
<div class="sanpham-detail">
    <div id="sanpham-nenmo" onclick="closeDI()"></div>
    <div id="sanpham-detail-info">
        <div class="sanpham-info-header">Thông tin sản phẩm <span class="sanpham-detail-close" onclick="closeDI()"><i class="fa-solid fa-x"></i></span></div>
        <div class="scroll-pane">
            <?php
            echo $product['info'];
            ?>
        </div>
    </div>


    <div id="sanpham-detail-detail">
        <div class="sanpham-info-header">Thông tin chi tiết <span class="sanpham-detail-close" onclick="closeDI()"><i class="fa-solid fa-x"></i></div>
        <div class="scroll-pane">
            <?php 
            echo $product['detail'];
            ?>
        </div>
    </div>

    <div id="sanpham-detail-config">
        <div class="sanpham-info-header">Thông tin cấu hình <span class="sanpham-detail-close" onclick="closeDI()"><i class="fa-solid fa-x"></i></span></div>
        <div class="scroll-pane">
            <?php
            foreach($config as $value) {
                echo '<div class="row">
                        <div class="col-sm-4">' . $value['conf_key']. '</div>
                        <div class="col-sm-8">' . $value['conf_value'] . '</div>
                    </div>
                    <hr>';
            }
            ?>
        </div>
    </div>
</div>