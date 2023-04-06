<html>
    <head>
        <title><?php echo (isset($page_title))?$page_title:'Trang chưa có tiêu đề | Shopee' ?></title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="/public/assets/client/css/style.css">
    </head>
        <?php
        $this->render('blocks/header');
        if(!empty($sub_content)){
            $this->render($content, $sub_content);
        }
        else{
            $this->render($content);
        }
        $this->render('blocks/footer');
        ?>
    <script type="text/javascript" src="/public/assets/client/js/script.js"></script>
</html>