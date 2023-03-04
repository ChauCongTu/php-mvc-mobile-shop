<div class="container">
    <div class="row">
        <div class="panel2 col-sm-2">
            <div class="filter">
                <div class="form-header">Bộ lọc</div>
                <div class="form-body">
                    <div class="filter-list">
                        <ul class="filter-list-li">
                            <?php
                            echo'
                            <li><a href="/tim-kiem?_k='.$tukhoa.'&type=news&orderby=newfisrt" class="color-black"> &#8226; Mới nhất trước</a></li>
                            <li><a href="/tim-kiem?_k='.$tukhoa.'&type=news&orderby=oldfisrt" class="color-black"> &#8226; Cũ nhất trước</a></li>
                            <li><a href="/tim-kiem?_k='.$tukhoa.'&type=news&orderby=cheapfisrt" class="color-black"> &#8226; Rẻ nhất trước</a></li>
                            <li><a href="/tim-kiem?_k='.$tukhoa.'&type=news&orderby=hotfisrt" class="color-black"> &#8226; Nổi bật nhất</a></li>';
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel2 col-sm-10">
            <div class="result">
                <?php
                echo'<div class="form-header"><strong>Tin Tức</strong> - <a href="/tim-kiem?_k='.$tukhoa.'&type=product" class="none-underline">Sản phẩm</a></div>';
                ?>
                <div class="form-body">
                    <div class="danhmuc-body">
                        <?php 
                        if(count($news) == 0){
                            echo'<h3 class="text-center">Không tìm thấy bài viết liên quan đến: <b>'.$tukhoa.'</b></h3>';
                        }
                        else{
                            echo'<p>Tìm thấy '.count($news).' kết quả</p>';
                            foreach($news as $value){
                                echo'<div class="danhmuc-news">
                                        <div class="danhmuc-img">
                                            <img src="'.$value['thumb'].'" class="none-on-mobile">
                                        </div>
                                        <div class="danhmuc-info">
                                            <a href="" class="color-black">
                                                <div class="news-name">'.$value['name'].'</div>
                                            </a>
                                            <div class="news-info">
                                                <div class="news-author">Châu Quế Nhơn</div>
                                                <div class="news-date">'.$value['pdate'].'</div>
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