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
$routes['tim-kiem'] = 'home/search';
?>