<?php
$routes['default_controller'] = 'home';
$routes['default_actions'] = 'index';

/*
 * Đường dẫn ảo => đường dẫn thật
 * 
 */
// Trang chủ
$routes['trang-chu'] = 'home/index';

// Bản tin
$routes['ban-tin-cong-nghe'] = 'news/category';
$routes['(.+)_id(\d+)'] = 'news/post/$1/$2';

// Giỏ hàng
$routes['gio-hang'] = 'cart/index';
$routes['gio-hang/them/(\d+)'] = 'cart/addToCart/$1';

// Sản phẩm
$routes['(.+)_(\d+)'] = 'product/item/$1/$2';
$routes['(.+)-(\d+)-category'] = 'product/category/$1/$2';
$routes['(.+)-(\d+)-category/(\d+)/(\d+)'] = 'product/category/$1/$2/$3/$4';
// Danh mục điện thoại
$routes['dien-thoai.html'] = 'product/ProductCategory/1';
$routes['samsung.html'] = 'product/ProductCategory/1/a/1'; // Samsung
$routes['iphone.html'] = 'product/ProductCategory/1/a/2'; // Iphone
$routes['xiaomi.html'] = 'product/ProductCategory/1/a/3'; // Xiaomi
$routes['vivo.html'] = 'product/ProductCategory/1/a/4'; // Vivo
$routes['oppo.html'] = 'product/ProductCategory/1/a/5'; // Oppo
$routes['huawei.html'] = 'product/ProductCategory/1/a/6'; // Huawei
$routes['lg.html'] = 'product/ProductCategory/1/a/7'; // LG
$routes['realme.html'] = 'product/ProductCategory/1/a/8'; // Realme
$routes['ipad.html'] = 'product/ProductCategory/2/a/18'; // Ipad
$routes['imac.html'] = 'product/ProductCategory/2/a/19'; // Imac
$routes['macbook.html'] = 'product/ProductCategory/2/a/20'; // Macbook
$routes['airpods.html'] = 'product/ProductCategory/3/a/21'; // AirPods
$routes['vertu'] = 'product/ProductCategory/1/a/22'; // Vertu
// Danh mục phụ kiện
$routes['phu-kien.html'] = 'product/ProductCategory/3';
$routes['phu-kien/(.+)-(\d+)'] = 'product/ProductCategory/3/$1/$2';
// Danh mục máy tính bảng
$routes['may-tinh-bang.html'] = 'product/ProductCategory/2';
$routes['may-tinh-bang/(.+)-(\d+)'] = 'product/ProductCategory/2/$1/$2';

// Tìm kiếm
$routes['tim-kiem'] = 'home/search';
?>