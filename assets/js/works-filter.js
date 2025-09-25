// 制作物カテゴリフィルタリング機能
(function($) {
  'use strict';
  
  $(document).ready(function() {
    console.log('works-filter.jsが読み込まれました');
    console.log('フィルターボタンの数:', $('.filter-btn').length);
    console.log('制作物アイテムの数:', $('.pf-p-works__item').length);
    
    // イベント委譲を使用してフィルターボタンのクリックイベントを捕捉
    $(document).on('click', '.filter-btn', function(e) {
      e.preventDefault();
      console.log('フィルターボタンがクリックされました');
      
      // アクティブクラスの切り替え
      $('.filter-btn').removeClass('active');
      $(this).addClass('active');
      
      // 選択されたカテゴリを取得
      const selectedCategory = $(this).data('category');
      console.log('選択されたカテゴリ:', selectedCategory);
      
      // 制作物アイテムをフィルタリング
      let visibleItemsCount = 0;
      
      $('.pf-p-works__item').each(function() {
        const itemCategories = $(this).data('category');
        console.log('アイテムのカテゴリ:', itemCategories);
        
        if (selectedCategory === 'all' || 
            (itemCategories && itemCategories.includes(selectedCategory))) {
          $(this).fadeIn(300);
          visibleItemsCount++;
          console.log('アイテムを表示:', $(this).find('h3').text());
        } else {
          $(this).fadeOut(300);
          console.log('アイテムを非表示:', $(this).find('h3').text());
        }
      });
      
      // ページネーションの表示/非表示を制御
      setTimeout(function() {
        const pagination = $('.pf-p-pagination');
        if (visibleItemsCount < 9) {
          pagination.hide();
          console.log('表示アイテム数が9個未満のため、ページネーションを非表示にしました');
        } else {
          pagination.show();
          console.log('表示アイテム数が9個以上のため、ページネーションを表示しました');
        }
      }, 300); // フェードアニメーション完了後に実行
    });
  });
  
})(jQuery);
