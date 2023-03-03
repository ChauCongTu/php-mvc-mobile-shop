<html>
    <head>
        <title>Tạo thư mục mới</title>
    </head>
    <body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="input" name="_dir_name" value="" placeholder="Nhập tên thư mục">
        <input type="submit" name="new" value="Tạo">
    </form>
    <?php
    if (isset($_POST['new']) && isset($_POST['_dir_name'])) {
        $username = 'admin';
        echo 'Tạo thành công: '. $username.'/'.$_POST['_dir_name'];
    }
    ?>
    </body>
</html>