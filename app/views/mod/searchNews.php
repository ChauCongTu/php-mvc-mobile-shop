<div class="container">
    <div class="row">
        <div class="panel2 col-sm-2">
            <div class="filter">
                <div class="form-body">
                    <div class="filter-list">
                        <div class="form-header"><img src="/images/img/icons8-filter-48.png" alt="icon-filter"> Bộ lọc</div>
                        <div class="list-group list-group-flush">
                            <?php
                            echo '
                                <a href="/tim-kiem?_k=' . $tukhoa . '&type=product&orderby=newfirst" class="list-group-item list-group-item-action">Mới nhất trước</a>
                                <a href="/tim-kiem?_k=' . $tukhoa . '&type=product&orderby=oldfirst" class="list-group-item list-group-item-action">Cũ nhất trước</a>
                                <a href="/tim-kiem?_k=' . $tukhoa . '&type=product&orderby=hotfirst" class="list-group-item list-group-item-action">Nổi bật nhất</a>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel2 col-sm-10">
            <div class="result">
                <?php
                echo '<div class="form-header"><strong>Tin Tức</strong> - <a href="/tim-kiem?_k=' . $tukhoa . '&type=product" class="none-underline">Sản phẩm</a></div>';
                ?>
                <div class="form-body">
                    <div class="danhmuc-body">
                        <?php
                        if (count($news) == 0) {
                            echo '
                            <h2 class="text-danger text-center p-3">Không tìm thấy tin tức liên quan đến: ' . $tukhoa . '!</h2>
                            <img src="/images/img/oops.png" width="100%" alt="Có lỗi xảy ra...">
                            ';
                        } else {
                            foreach ($news as $value) {
                                echo '<div class="danhmuc-news">
                                        <div class="danhmuc-img">
                                            <img src="' . $value['thumb'] . '" class="none-on-mobile">
                                        </div>
                                        <div class="danhmuc-info">
                                            <a href="/'.$value['slug'].'_id'.$value['news_id'].'" class="color-black">
                                                <div class="news-name">' . $value['name'] . '</div>
                                            </a>
                                            <div class="news-info">
                                                <div class="news-author">Châu Quế Nhơn</div>
                                                <div class="news-date">'.displayTime($value['pdate']).'</div>
                                            </div>
                                        </div>
                                    </div>';
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>