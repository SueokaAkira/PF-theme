
// アバウトページ KV
(function($) {
  'use strict';

  $(document).ready(function() {
    // KVスライダーの初期化
    if ($(".KV_slick-slider").length > 0) {
      $(".KV_slick-slider").slick({
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev">Previous</button>',
        nextArrow: '<button type="button" class="slick-next">Next</button>'
      });
    }

    // アバウトページ　自己紹介　好き画像
    if ($(".like_slick-slider").length > 0) {
      $(".like_slick-slider").slick({
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        adaptiveHeight: false,
        variableWidth: false,
        centerMode: false,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev">Previous</button>',
        nextArrow: '<button type="button" class="slick-next">Next</button>',
        responsive: [
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              variableWidth: false,
              adaptiveHeight: false,
              arrows: true,
              dots: true,
              autoplay: true,
              autoplaySpeed: 3000
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              variableWidth: false,
              adaptiveHeight: false,
              arrows: true,
              dots: true,
              autoplay: true,
              autoplaySpeed: 3000,
              fade: true
            }
          }
        ]
      });
    }
  });

  // ウィンドウリサイズ時の処理
  $(window).on('resize', function() {
    if ($(".like_slick-slider").length > 0 && $(".like_slick-slider").hasClass('slick-initialized')) {
      $(".like_slick-slider").slick('refresh');
    }
  });

})(jQuery);
