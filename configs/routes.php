<?php
$routes['default_controller'] = 'home';
$routes['default_actions'] = 'index';

/*
 * Đường dẫn ảo => đường dẫn thật
 * 
 */
$routes['danh-muc-san-pham'] = 'product/index';
$routes['(.+)-category'] = 'product/categories/$1';
$routes['(.+)/.+.(\d+).html'] = 'product/detail/$1/$2';
?>