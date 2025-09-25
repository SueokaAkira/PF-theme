// 制作物詳細ページの画像スリック機能
(function($) {
  'use strict';

  $(document).ready(function() {
    console.log('detail.jsが読み込まれました');
    
    // 制作物画像スライダーの初期化
    if ($('.pf-p-detail__imgSlider').length > 0) {
      console.log('制作物画像スライダーが見つかりました');
      
      $('.pf-p-detail__imgSlider').slick({
        autoplay: false,
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev">Previous</button>',
        nextArrow: '<button type="button" class="slick-next">Next</button>',
        responsive: [
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              dots: true
            }
          }
        ]
      });
    }
    
    // 画像クリック時のモーダル表示
    $('.pf-p-detail__imgSlider img').on('click', function() {
      const imgSrc = $(this).attr('src');
      const imgAlt = $(this).attr('alt');
      
      // モーダルHTMLを作成
      const modalHtml = `
        <div class="pf-modal-overlay">
          <div class="pf-modal-content">
            <button class="pf-modal-close">&times;</button>
            <img src="${imgSrc}" alt="${imgAlt}" class="pf-modal-image">
          </div>
        </div>
      `;
      
      // モーダルを表示
      $('body').append(modalHtml);
      $('.pf-modal-overlay').fadeIn(300);
      
      // モーダルを閉じる処理
      $('.pf-modal-close, .pf-modal-overlay').on('click', function() {
        $('.pf-modal-overlay').fadeOut(300, function() {
          $(this).remove();
        });
      });
      
      // ESCキーでモーダルを閉じる
      $(document).on('keydown.modal', function(e) {
        if (e.keyCode === 27) { // ESC key
          $('.pf-modal-overlay').fadeOut(300, function() {
            $(this).remove();
          });
          $(document).off('keydown.modal');
        }
      });
    });
  });
})(jQuery);