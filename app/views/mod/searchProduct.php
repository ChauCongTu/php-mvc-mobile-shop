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
                            <li><a href="/tim-kiem?_k='.$tukhoa.'&type=product&orderby=newfisrt" class="color-black"> &#8226; Mới nhất trước</a></li>
                            <li><a href="/tim-kiem?_k='.$tukhoa.'&type=product&orderby=oldfisrt" class="color-black"> &#8226; Cũ nhất trước</a></li>
                            <li><a href="/tim-kiem?_k='.$tukhoa.'&type=product&orderby=cheapfisrt" class="color-black"> &#8226; Rẻ nhất trước</a></li>
                            <li><a href="/tim-kiem?_k='.$tukhoa.'&type=product&orderby=hotfisrt" class="color-black"> &#8226; Nổi bật nhất</a></li>';
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel2 col-sm-10">
            <div class="result">
                <?php
                echo'<div class="form-header"><a href="/tim-kiem?_k='.$tukhoa.'&type=news" class="none-underline">Tin tức</a> - <strong>Sản Phẩm</strong></div>';
                ?>
                <div class="form-body">
                    <div class="danhmuc-body">
                        <div class="danhmuc-sanpham">
                            <div class="sale-info"></div>
                            <div class="danhmuc-img">
                                <img src="/img/samsung-galaxy-s23-ultra-1-600x600.jpg">
                            </div>
                            <div class="danhmuc-info">
                                <a href="" class="color-black">
                                    <div class="danhmuc-name">Samsung galaxy s23 Ultra</div>
                                </a>
                                <div class="slick-price">
                                    <div class="slick-sale-price">29.999.000đ</div>
                                    <div class="slick-origin-price"> <del> 31.999.000đ</del></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>