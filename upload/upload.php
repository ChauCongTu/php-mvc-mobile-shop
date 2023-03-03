<?php
// Sử dụng vòng lặp for để lưu từng file trong mảng
foreach($_FILES['img_file']['name'] as $name => $value)
{
	$name_img = stripslashes($_FILES['img_file']['name'][$name]);
	$source_img = $_FILES['img_file']['tmp_name'][$name];
	$token = generateToken().'-'.generateToken().'-';
	$path_img = 'stored/' . $token . $name_img;
	move_uploaded_file($source_img, $path_img);
}
function generateToken() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 10; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>