<title>Add a new User</title>
<?php
$value_username = (!empty($fields) && array_key_exists('username', $fields)) ? $fields['username'] : '';
$value_password = (!empty($fields) && array_key_exists('password', $fields)) ? $fields['password'] : '';
$value_email = (!empty($fields) && array_key_exists('email', $fields)) ? $fields['email'] : '';
$value_phone = (!empty($fields) && array_key_exists('phone', $fields)) ? $fields['phone'] : '';
?>
<form method="post">
    Tên đăng nhập: <input type="text" name="username" value="<?php echo $value_username; ?>">
    <?php
    echo (!empty($errors) && array_key_exists('username', $errors)) ? '<span style = "color:red">'.$errors['username'].'</span>' : false;
    ?>
    <br/>
    Email: <input type="email" name="email" value="<?php echo $value_email; ?>">
    <?php
    echo (!empty($errors) && array_key_exists('email', $errors)) ? '<span style = "color:red">'.$errors['email'].'</span>' : false;
    ?>
    <br/>
    Mật khẩu: <input type="password" name="password">
    <?php
    echo (!empty($errors) && array_key_exists('password', $errors)) ? '<span style = "color:red">'.$errors['password'].'</span>' : false;
    ?>
    <br/>
    Ngày sinh: <input type="date" name="dob">
    <br/>
    Tên đầy đủ: <input type="text" name="name" value="">
    <br/>
    Số điện thoại: <input type="text" name="phone" value="">
    <?php
    echo (!empty($errors) && array_key_exists('phone', $errors)) ? '<span style = "color:red">'.$errors['phone'].'</span>' : false;
    ?>
    <br/>
    <button>Tạo</button>
    <br>
    <?php echo (!empty($msg))?$msg:false; ?>
</form>