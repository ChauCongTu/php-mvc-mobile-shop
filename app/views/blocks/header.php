
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="/public/home/home.css" />
    <link rel="stylesheet" type="text/css" href="/public/home/cart.css" />
</head>
<div class="bg-flash-white">

    <body>
        <div id="menu">
            <div class="pb-3 pt-3 border-bottom border-dark text-end" style="font-size:20px">
                <span class="border border-dark p-2 rounded-3 to-pointer me-3" onclick="hideMenu()">
                    <i class="fa-solid fa-xmark"></i> <span class="mt-1">ĐÓNG</span>
                </span>
            </div>
            <div class="p-2 mt-2 border-bottom border-dark">
                <div class="row pb-3">
                    <div class="col">
                        <a href="/iphone-2-category" class="none-underline text-body text-center">
                            <div class="border border-dark p-2 rounded-3 to-pointer">
                                Iphone
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="/samsung-1-category" class="none-underline text-body text-center">
                            <div class="border border-dark p-2 rounded-3 to-pointer">
                                Samsung
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col">
                        <a href="/xiaomi-3-category" class="none-underline text-body text-center">
                            <div class="border border-dark p-2 rounded-3 to-pointer">
                                Xiaomi
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="/vivo-4-category" class="none-underline text-body text-center">
                            <div class="border border-dark p-2 rounded-3 to-pointer">
                                Vivo
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col">
                        <a href="/oppo-5-category" class="none-underline text-body text-center">
                            <div class="border border-dark p-2 rounded-3 to-pointer">
                                Oppo
                            </div>
                        </a>
                    </div>
                    <div class="col" class="none-underline text-body text-center">
                        <a href="/huawei-6-category" class="none-underline text-body text-center">
                            <div class="border border-dark p-2 rounded-3 to-pointer">
                                Huawei
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col">
                        <a href="/other-9-category" class="none-underline text-body text-center">
                            <div class="border border-dark p-2 rounded-3 to-pointer">Thương hiệu khác</div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="/phu-kien-10-category" class="none-underline text-body text-center">
                            <div class="border border-dark p-2 rounded-3 to-pointer">Phụ kiện</div>
                        </a>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col">
                        <a href="/may-tinh-bang-11-category" class="none-underline text-body text-center">
                            <div class="border border-dark p-2 rounded-3 to-pointer">Máy tính bảng</div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="/hang-cu-11-category" class="none-underline text-body text-center">
                            <div class="border border-dark p-2 rounded-3 to-pointer">Hàng đã qua sử dụng</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="pb-3 pt-3 border-bottom border-dark text-end" style="font-size:20px">
                <p class="h2 text-center text-muted">- TÌM KIẾM -</p>
                <form action="/tim-kiem" method="GET">
                    <div class="input-text p-2 form-search">
                        <input type="text" name="_k" class="form-control border border-dark" placeholder="Bạn muốn tìm gì...">
                        <span><button class="btn btn-light border border-dark btn-search"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button></span>
                    </div>
                </form>
            </div>
            <div class="p-3">
                <p><a href="" class="color-black"><small>&#9679;</small> Xu hướng mua sắm</a></p>
                <p><a href="" class="color-black"><small>&#9679;</small> Blog công nghệ</a></p>
                <p><a href="#faq" class="color-black"><small>&#9679;</small> Chính sách</a></p>
                <p><a href="#support" class="color-black"><small>&#9679;</small> Liên hệ hỗ trợ</a></p>
            </div>
        </div>
        <div class="bg-home pt-4 pb-2">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <a href=" /" class="text-white none-underline">
                            <h1 class="container">CQNSTORE<span class="text-primary none-on-mobile">.COM</span></h1>
                        </a>
                    </div>
                    <div class="col text-end mt-1">
                        <a href="/gio-hang" class="none-underline color-white"><i class="fa-solid fa-cart-shopping"></i> </a> <span class="text-white">|</span>
                        <a href="#support" class="none-underline color-white"> <i class="fa-solid fa-question"></i> </a><span class="text-white"> |</span>
                        <a href="" class="none-underline color-white"> <i class="fa-solid fa-user"></i> </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-home none-on-desktop">
            <div class="container">
                <div class="show-menu" onclick="showMenu()">
                    <div class="text-white text-center">
                        <i class="fa-solid fa-bars"></i> MENU
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-menu none-on-mobile">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="nav-main">
                            <div class="nav-main-item">
                                <a href="/danh-muc/dien-thoai" class="nav-link-item"><img src="/images/img/mobile.png"> Điện thoại</a>
                                <div class="nav-main-item-dropdown">
                                    <div>
                                        <a href="/samsung-1-category" class="color-black">Samsung</a>
                                    </div>
                                    <div>
                                        <a href="/iphone-2-category" class="color-black">Iphone</a>
                                    </div>
                                    <div>
                                        <a href="/xiaomi-3-category" class="color-black">Xiaomi</a>
                                    </div>
                                    <div>
                                        <a href="/realme-8-category" class="color-black">Realme</a>
                                    </div>
                                    <div>
                                        <a href="/huawei-6-category" class="color-black">Huawei</a>
                                    </div>
                                    <div>
                                        <a href="/lg-7-category" class="color-black">LG</a>
                                    </div>
                                    <div>
                                        <a href="/vivo-4-category" class="color-black">Vivo</a>
                                    </div>
                                    <div>
                                        <a href="/oppo-5-category" class="color-black">Oppo</a>
                                    </div>
                                </div>
                            </div>
                            <div class="nav-main-item">
                                <a href="/danh-muc/apple" class="nav-link-item"><img src="/images/img/iphone.png"> Apple</a>
                                <div class="nav-main-item-dropdown">
                                    <div>
                                        <a href="/vivo-4-category" class="color-black">Iphone</a>
                                    </div>
                                    <div>
                                        <a href="/oppo-5-category" class="color-black">Ipad</a>
                                    </div>
                                    <div>
                                        <a href="/vivo-4-category" class="color-black">iMac</a>
                                    </div>
                                    <div>
                                        <a href="/oppo-5-category" class="color-black">Macbook</a>
                                    </div>
                                    <div>
                                        <a href="/vivo-4-category" class="color-black">AirPods</a>
                                    </div>
                                    <div>
                                        <a href="/oppo-5-category" class="color-black">Phụ kiện Apple</a>
                                    </div>
                                </div>
                            </div>
                            <div class="nav-main-item">
                                <a href="/danh-muc/table" class="nav-link-item"><img src="/images/img/mac.png"> Tablet</a>
                                <div class="nav-main-item-dropdown">
                                    <div>
                                        <a href="/tim-kiem?_k=imac" class="color-black">IMac</a>
                                    </div>
                                    <div>
                                        <a href="/tim-kiem?_k=macbook+pro" class="color-black">Macbook Pro</a>
                                    </div>
                                    <div>
                                        <a href="/tim-kiem?_k=macbook+mini" class="color-black">Macbook Mini</a>
                                    </div>
                                    <div>
                                        <a href="/tim-kiem?_k=macbook+air" class="color-black">Macbook Air</a>
                                    </div>
                                    <div>
                                        <a href="/tim-kiem?_k=galaxy+tab" class="color-black">Galaxy Tab</a>
                                    </div>
                                    <div>
                                        <a href="/tim-kiem?_k=xiaomi+pad" class="color-black">Xiaomi Pad</a>
                                    </div>
                                </div>
                            </div>
                            <div class="nav-main-item">
                                <a href="/danh-muc/am-thanh" class="nav-link-item"><img src="/images/img/icon-am-thanha.png"> Âm thanh</a>
                            </div>
                            <div class="nav-main-item">
                                <a href="/danh-muc/phu-kien" class="nav-link-item"><img src="/images/img/accessories.png"> Phụ kiện</a>
                                <div class="nav-main-item-dropdown">
                                    <div>
                                        <a href="/danh-muc/phu-kien/apple" class="color-black">Phụ kiện Apple</a>
                                    </div>
                                    <div>
                                        <a href="/danh-muc/phu-kien/iphone" class="color-black">Phụ kiện Samsung</a>
                                    </div>
                                    <div>
                                        <a href="/danh-muc/phu-kien/iphone" class="color-black">Phụ kiện Anker</a>
                                    </div>
                                    <div>
                                        <a href="/danh-muc/phu-kien/iphone" class="color-black">Phụ kiện Energizer</a>
                                    </div>
                                    <div>
                                        <a href="/danh-muc/phu-kien/iphone" class="color-black">Ốp lưng, bao da</a>
                                    </div>
                                    <div>
                                        <a href="/danh-muc/phu-kien/iphone" class="color-black">Dán màn hình</a>
                                    </div>
                                    <div>
                                        <a href="/danh-muc/phu-kien/iphone" class="color-black">Cáp sạc</a>
                                    </div>
                                    <div>
                                        <a href="/danh-muc/phu-kien/iphone" class="color-black">Adapter, củ sạc</a>
                                    </div>
                                    <div>
                                        <a href="/danh-muc/phu-kien/iphone" class="color-black">Pin sạc dự phòng</a>
                                    </div>
                                </div>
                            </div>
                            <div class="nav-main-item">
                                <a href="/may-cu" class="nav-link-item"><img src="/images/img/icon-may-cu.png"> Máy cũ giá rẻ</a>
                                <div class="nav-main-item-dropdown">
                                    <div>
                                        <a href="/may-cu/iphone" class="color-black">IPhone cũ</a>
                                    </div>
                                    <div>
                                        <a href="/may-cu/android" class="color-black">Android cũ</a>
                                    </div>
                                    <div>
                                        <a href="/may-cu/tablet" class="color-black">Tablet cũ</a>
                                    </div>
                                    <div>
                                        <a href="/may-cu/ipad" class="color-black">iPad cũ</a>
                                    </div>
                                    <div>
                                        <a href="/may-cu/laptop" class="color-black">Laptop cũ</a>
                                    </div>
                                    <div>
                                        <a href="/may-cu/macbook" class="color-black">Macbook cũ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form">
                            <form action="/tim-kiem" method="GET">
                                <div class="input-text p-2 form-search">
                                    <input type="text" name="_k" class="form-control border border-dark" placeholder="Tìm kiếm sản phẩm">
                                    <button class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="contact-mess">
            <div class="contact-mess-icon">
                <a href="https://m.me/xoxvp" target="_blank"><i class="fa-brands fa-facebook-messenger"></i></a>
            </div>
        </div> -->
        <div class="quangcaodacbiet">
            <div id="nen-mo" onclick="closeads()"></div>
            <div id="quangcao" onclick="closeads()">
                <div id="close"><i class="fa-solid fa-x"></i></div>
                <img src="/img/iphone-sale.png">
            </div>
        </div>