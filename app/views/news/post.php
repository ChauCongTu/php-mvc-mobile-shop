<div class="bg-post">
<br>
    <div class="bg-container">
        <div class="post-name"><?php echo $news['name'] ?></div>
        <div class="post-author"><?php echo $news['fullname'] . ' &#8226; ' . displayTime($news['pdate']) ?></div>
        <div class="post-content">
            <?php echo $news['content'] ?>
        </div>
        <hr>
        <div class="post-hot-head">Bài viết nổi bật</div>
        <div class="blog-body">
            <?php
            foreach ($hotNews as $value) {
                echo '<div class="blog-post">
                        <div class="blog-img"><img src="' . $value['thumb'] . '"></div>
                        <div class="blog-text">
                            <a href="/' . $value['slug'] . '_id' . $value['news_id'] . '" class="color-black">
                                <div class="blog-name">' . $value['name'] . '</div>
                            </a>
                            <div class="blog-info">
                                <div class="blog-author">' . $value['fullname'] . '</div>
                                <div class="blog-date">' . displayTime($value['pdate']) . '</div>
                            </div>
                        </div>
                    </div>';
            }
            ?>

        </div>
    </div>
</div>