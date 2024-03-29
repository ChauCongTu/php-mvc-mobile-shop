<div class="container">
    <div class="item-root">
        <a href="/">Trang chủ</a> 
        <?php echo (isset($dir1['name']))?'<b> > </b><a href="/'.$dir1['link'].'">'.$dir1['name'].'</a>':false; ?>
        <?php echo (isset($dir2['name']))?'<b> > </b><a href="">'.$dir2['name'].'</a>':false; ?>
    </div>
</div>
<div class="container panel">
    <div class="box-group-filter">
        <!-- Danh mục thương hiệu -->
        <div class="box-group-filter-brand">
            <a href="/iphone.html">
                <div class="box-group-filter-brand-item">
                    <img src="/images/product/brand/apple.png" alt="apple">
                </div>
            </a>
            <a href="/samsung.html">
                <div class="box-group-filter-brand-item">
                    <img src="/images/product/brand/samsung42-b_25_1_1.jpg" alt="samsung">
                </div>
            </a>
            <a href="/xiaomi.html">
                <div class="box-group-filter-brand-item">
                    <img src="/images/product/brand/danh-muc-xiaomi.jpg" alt="xiaomi">
                </div>
            </a>
            <a href="/realme.html">
                <div class="box-group-filter-brand-item">
                    <img src="/images/product/brand/realme.png" alt="realme">
                </div>
            </a>
            <a href="/oppo.html">
                <div class="box-group-filter-brand-item">
                    <img src="/images/product/brand/oppo42-b_9.png" alt="oppo">
                </div>
            </a>
            <a href="/vertu">
                <div class="box-group-filter-brand-item">
                    <img src="/images/product/brand/vertu-logo.png" alt="vertu">
                </div>
            </a>
            <a href="/vivo.html">
                <div class="box-group-filter-brand-item">
                    <img src="/images/product/brand/vivo42-b_50.jpg" alt="vivo">
                </div>
            </a>
            <a href="dien-thoai.html">
                <div class="box-group-filter-brand-item">
                    <img src="/images/product/brand/untitled-1_4.jpg" alt="limited">
                </div>
            </a>
        </div>
        <!-- Lọc sản phẩm, sắp xếp -->
        <div class="box-group-filter--filter">
            <div class="danhmuc-nav pb-3">
                <div class="danhmuc-nav-filter">Mức giá</div>
                <div class="danhmuc-nav-tieuchi">
                    <form action="" method="GET">
                        <div class="danhmuc-nav-price">
                            <input type="number" name="startPrice" class="price-input" placeholder="Giá bắt đầu" value="<?php echo (isset($_GET['startPrice']))?$_GET['startPrice']:false; ?>"> -
                            <input type="number" name="endPrice" class="price-input" placeholder="Giá kết thúc" value="<?php echo (isset($_GET['endPrice']))?$_GET['endPrice']:false; ?>">
                            <button class="btn-price"><i class="fa-solid fa-bars-filter"></i> Lọc</button>
                        </div>
                    </form>
                </div>
                <div class="danhmuc-nav-filter">Sắp xếp theo</div>
                <div class="danhmuc-nav-tieuchi">
                    <a class="color-black to-pointer" onclick="addGetRequest('sort', '1')"><i class="fa-regular fa-star"></i> Nổi bật</a>
                    <a class="color-black to-pointer" onclick="addGetRequest('sort', '2')"><i class="fa-regular fa-file-chart-column"></i> Giảm nhiều</a>
                    <a class="color-black to-pointer" onclick="addGetRequest('sort', '3')"><i class="fa-solid fa-0"></i> Trả góp 0%</a>
                    <a class="color-black to-pointer" onclick="addGetRequest('sort', '4')"><i class="fa-solid fa-arrow-up"></i> Rẻ nhất</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container panel mt-2">
    <!-- Danh sách sản phẩm -->
    <div class="danhmuc pt-3">
        <div class="danhmuc-body">
            <?php 
            foreach($product as $value){
                if($value['discount_price'] != 0){
                    echo'
                        <div class="danhmuc-sanpham">
                            <div class="sale-info"></div>
                            <div class="danhmuc-img">
                                <img src="' . $value['img'] . '">
                            </div>
                            <div class="danhmuc-info">
                                <a href="/' . $value['slug_product'] . '_' . $value['product_id'] . '" class="color-black">
                                    <div class="product-name">' . $value['name'] . '</div>
                                </a>
                                <div class="product-price">
                                    <div class="product-sale-price">' . currency_format($value['discount_price']) . '</div>
                                    <div class="product-origin-price"> <del>' . currency_format($value['origin_price']) . '</del></div>
                                </div>
                            </div>
                        </div>
                    ';
                }
                else {
                    echo'
                        <div class="danhmuc-sanpham">
                            <div class="sale-info"></div>
                            <div class="danhmuc-img">
                                <img src="' . $value['img'] . '">
                            </div>
                            <div class="danhmuc-info">
                                <a href="/' . $value['slug_product'] . '_' . $value['product_id'] . '" class="color-black">
                                    <div class="product-name">' . $value['name'] . '</div>
                                </a>
                                <div class="product-price">
                                    <div class="product-sale-price">' . currency_format($value['origin_price']) . '</div>
                                </div>
                            </div>
                        </div>
                    ';
                }
            }
            ?>
            
        </div>
    </div>
    <!-- Phân trang -->
    <div class="text-center p-2">
        <?php
        if ($total_page > 1) {
            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $current_page)
                    echo "<a class='btn btn-danger ms-2' onclick='getPageRequest($i)'>" . $i . "</a>";
                else
                    echo "<a class='btn btn-outline-danger ms-2' onclick='getPageRequest($i)'>" . $i . "</a>";
            }
        }
        ?>
    </div>
</div>