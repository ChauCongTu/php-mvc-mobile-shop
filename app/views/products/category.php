<br>
<div class="container panel">
    <div class="danhmuc">
        <div class="danhmuc-header">Điện thoại <?php echo $brandName; ?></div>
        <div class="danhmuc-nav pb-3">
            <div class="danhmuc-nav-filter">Mức giá</div>
            <div class="danhmuc-nav-tieuchi">
                <a class="color-black to-pointer" onclick="addGetRequest('filter', '1')">Dưới 2 triệu</a>
                <a class="color-black to-pointer" onclick="addGetRequest('filter', '2')">2-6 triệu</a>
                <a class="color-black to-pointer" onclick="addGetRequest('filter', '3')">6-10 triệu</a>
                <a class="color-black to-pointer" onclick="addGetRequest('filter', '4')">Trên 10 triệu</a>
            </div>
            <div class="danhmuc-nav-filter">Sắp xếp theo</div>
            <div class="danhmuc-nav-tieuchi">
                <a class="color-black to-pointer" onclick="addGetRequest('sort', '1')">Mới nhất</a>
                <a class="color-black to-pointer" onclick="addGetRequest('sort', '2')">Ưu đãi</a>
                <a class="color-black to-pointer" onclick="addGetRequest('sort', '3')">Đắt nhất</a>
                <a class="color-black to-pointer" onclick="addGetRequest('sort', '4')">Rẻ nhất</a>
            </div>
        </div>
    </div>
</div>
<div class="container panel mt-2">
    <div class="danhmuc pt-3">
        <div class="danhmuc-body">
            <?php
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
                                        <div class="slick-origin-price"> <del>' . currency_format($value['discount_price']) . '</del></div>
                                    </div>
                                </div>
                            </div>';
                } else {
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
<script>
    // Thêm request vào GET hiện tại
function addGetRequest($name, $value) {
    var url = new URL(window.location.href);
    if (url.searchParams.has($name)) {
        url.searchParams.delete($name);
    }
    url.searchParams.append($name, $value);
    window.location.href = url.href;
}
function getPageRequest($value) {
    var url = new URL(window.location.href);
    if (url.searchParams.has('page')) {
        url.searchParams.delete('page');
    }
    url.searchParams.append('page', $value);
    window.location.href = url.href;
}
</script>