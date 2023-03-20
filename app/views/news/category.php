<br>
<div class="container panel">
    <div class="blog">
        <div class="blog-header">Blog công nghệ <span class="menu-filter"><a href="" class="color-black">MỚI</a> | <a href="" class="color-black">HOT</a></span></div>
        <div class="blog-body">
            <!-- Các bài viết khác -->
            <?php
            foreach($news as $value){
                echo'<div class="blog-post">
                        <div class="blog-img"><img src="'.$value['thumb'].'"></div>
                        <div class="blog-text">
                            <a href="/'.$value['slug'].'_id'.$value['news_id'].'" class="color-black">
                                <div class="blog-name">'.$value['name'].'</div>
                            </a>
                            <div class="blog-info">
                                <div class="blog-author">'.$value['fullname'].'</div>
                                <div class="blog-date">'.displayTime($value['pdate']).'</div>
                            </div>
                        </div>
                    </div>';
            }
            ?>
        </div>
    </div>
</div>