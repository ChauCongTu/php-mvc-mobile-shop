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
$(document).ready(function() {
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
          slidesToShow: 4,
          slidesToScroll: 3,
          infinite: true,
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }
    ]
  });