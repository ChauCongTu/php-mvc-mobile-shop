THÔNG TIN DANH MỤC
<?php
if(!empty($category)){
    extract($category);
}
else{
    App::$app->loadError();
}
echo '<br>Mã danh mục: ' . $type_id;
echo '<br>Tên danh mục: ' . $name;
?>