function quangcaodacbiet() {
    document.getElementById("quangcao").style.top = "20%",
        document.getElementById("nen-mo").style.display = "block"
};

function closeads() {
    document.getElementById("quangcao").style.top = "2000%",
        document.getElementById("nen-mo").style.display = "none"
};
function hideMenu() {
    document.getElementById("menu").style.right = '-150%';
}

function showMenu() {
    document.getElementById("menu").style.right = '0';
}
function quangcaodacbiet() {
    document.getElementById("quangcao").style.top = "20%",
        document.getElementById("nen-mo").style.display = "block"
};

function closeads() {
    document.getElementById("quangcao").style.top = "2000%",
        document.getElementById("nen-mo").style.display = "none"
};
$(document).ready(function () {
    $('.slick-banner-long').slick({
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        prevArrow: "<button type='button' class='slick-prev slick-arrow-banner'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow: "<button type='button' class='slick-next slick-arrow-banner'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",

    });
    $('.slick-without-dots').slick({
        slidesToShow: 5,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        prevArrow: "<button type='button' class='slick-prev slick-arrow'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow: "<button type='button' class='slick-next slick-arrow'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        ]
    });
    $('.slick-thuong-hieu').slick({
        slidesToShow: 4,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        prevArrow: "<button type='button' class='slick-prev slick-arrow'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow: "<button type='button' class='slick-next slick-arrow'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        ]
    });
});

$('.slick-body').slick({
    slidesToShow: 5,
    autoplay: true,
    infinite: true,
    autoplaySpeed: 2000,
    dots: false,
    arrows: true,
    prevArrow: "<button type='button' class='slick-left slick-arrows'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow: "<button type='button' class='slick-right slick-arrows'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
    responsive: [{
        breakpoint: 1024,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
        }
    },
    {
        breakpoint: 600,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 2
        }
    },
    {
        breakpoint: 480,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
    }
    ]
});
$('.sanpham-slick-img').slick({
    infinite: true,
    speed: 300,
    arrows: true,
    slidesToShow: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow: "<button type='button' class='slick-prev slick-arrow-sanpham'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow: "<button type='button' class='slick-next slick-arrow-sanpham'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",

});

$('.product-detail-img').slick({
    asNavFor: "#thumbs",
    infinite: true,
    speed: 300,
    arrows: true,
    slidesToShow: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow: "<button type='button' class='slick-prev slick-product'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow: "<button type='button' class='slick-next slick-product'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
});

$('.product-detail-thumb').slick({
    asNavFor: "#img",
    infinite: true,
    arrows: true,
    slidesToShow: 3,
    prevArrow: "<button type='button' class='slick-prev slick-product'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow: "<button type='button' class='slick-next slick-product'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
});

$("#thumbs .slick-slide").on("click",function(){
    let index=$(this).attr("data-slick-index")
    $("#img").slick("slickGoTo",index)
})

function seeDetail() {
    document.getElementById('sanpham-nenmo').style.display = 'block',
        document.getElementById('sanpham-detail-detail').style.left = '50%'
}

function seeInfo() {
    document.getElementById('sanpham-nenmo').style.display = 'block',
        document.getElementById('sanpham-detail-info').style.left = '50%'
}
function seeConfig() {
    document.getElementById('sanpham-nenmo').style.display = 'block',
        document.getElementById('sanpham-detail-config').style.left = '50%'
}

function closeDI() {
    document.getElementById('sanpham-nenmo').style.display = 'none',
        document.getElementById('sanpham-detail-info').style.left = '500%',
        document.getElementById('sanpham-detail-detail').style.left = '500%'
        document.getElementById('sanpham-detail-config').style.left = '500%'
}
