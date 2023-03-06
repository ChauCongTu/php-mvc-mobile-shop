<?php
$routes['default_controller'] = 'home';
$routes['default_actions'] = 'index';

/*
 * Đường dẫn ảo => đường dẫn thật
 * 
 */
$routes['trang-chu'] = 'home/index';
$routes['(.+)-category'] = 'product/categories/$1';
$routes['(.+)_(\d+)'] = 'product/item/$1/$2';
$routes['(.+)-(\d+)-category'] = 'product/category/$1/$2';
$routes['(.+)-(\d+)-category/(\d+)/(\d+)'] = 'product/category/$1/$2/$3/$4';
$routes['tim-kiem'] = 'home/search';
?>