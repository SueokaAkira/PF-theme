// 手書き風アニメーション初期化関数（グローバルスコープ）
function initHandwritingAnimation() {
  console.log('手書き風アニメーション初期化を開始');
  
  // 現在のページがフロントページかどうかを確認
  const isFrontPage = document.querySelector('main#home') !== null;
  const currentUrl = window.location.href;
  const isHomePage = currentUrl.includes('/') && !currentUrl.includes('/wp-admin') && !currentUrl.includes('/about') && !currentUrl.includes('/works');
  
  console.log('ページ情報:');
  console.log('- main#home要素:', isFrontPage ? '見つかりました' : '見つかりません');
  console.log('- 現在のURL:', currentUrl);
  console.log('- フロントページ判定:', isHomePage);
  console.log('- bodyクラス:', document.body.className);
  
  // main#homeの内容を確認
  if (isFrontPage) {
    const mainHome = document.querySelector('main#home');
    console.log('main#homeのHTML内容（最初の500文字）:', mainHome.innerHTML.substring(0, 500));
  }
  
  // フロントページでない場合は実行しない
  if (!isFrontPage) {
    console.log('フロントページではないため、アニメーションをスキップします');
    console.log('フロントページにアクセスしてください: ' + window.location.origin);
    return;
  }
  
  // より広範囲で要素を検索
  const handwritingElements = document.querySelectorAll('.handwriting-text');
  const heroTitle = document.querySelector('.pf-l-hero__title');
  const heroSection = document.querySelector('.pf-l-hero');
  
  console.log('検索結果:');
  console.log('- .handwriting-text:', handwritingElements.length + '個');
  console.log('- .pf-l-hero__title:', heroTitle ? '見つかりました' : '見つかりません');
  console.log('- .pf-l-hero:', heroSection ? '見つかりました' : '見つかりません');
  
  if (handwritingElements.length === 0) {
    console.log('手書き風アニメーション要素が見つかりません');
    console.log('ページ内のすべてのspan要素:', document.querySelectorAll('span').length + '個');
    
    // より詳細なデバッグ情報
    const allSpans = document.querySelectorAll('span');
    console.log('すべてのspan要素のクラス名:');
    allSpans.forEach((span, index) => {
      if (span.className && (span.className.includes('handwriting') || span.className.includes('hero') || span.className.includes('title'))) {
        console.log(`関連 span[${index}]:`, span.className);
      }
    });
    
    // main#home内の要素を確認
    const mainHome = document.querySelector('main#home');
    if (mainHome) {
      console.log('main#home内の要素:');
      console.log('- section要素:', mainHome.querySelectorAll('section').length + '個');
      console.log('- h1要素:', mainHome.querySelectorAll('h1').length + '個');
      console.log('- span要素:', mainHome.querySelectorAll('span').length + '個');
      
      // 各sectionのクラス名を確認
      const sections = mainHome.querySelectorAll('section');
      sections.forEach((section, index) => {
        console.log(`section[${index}]:`, section.className);
      });
    }
    
    // ヒーローセクション内の要素を確認
    const heroSection = document.querySelector('.pf-l-hero');
    if (heroSection) {
      console.log('ヒーローセクション内の要素:');
      console.log('- h1要素:', heroSection.querySelectorAll('h1').length + '個');
      console.log('- span要素:', heroSection.querySelectorAll('span').length + '個');
    } else {
      console.log('ヒーローセクション(.pf-l-hero)が見つかりません');
    }
    
    return;
  }
  
  console.log('手書き風アニメーションを開始します', handwritingElements.length + '個の要素');
  
  handwritingElements.forEach((element, index) => {
    const delay = index * 2000; // 2秒間隔で順次実行
    
    setTimeout(() => {
      const text = element.getAttribute('data-text');
      console.log(`アニメーション開始: ${text}`);
      
      // アニメーションクラスを追加
      element.classList.add('animate');
      
      // テキストを表示（色はCSSで制御）
      element.style.opacity = '1';
    }, delay);
  });
}

// DOMが完全に読み込まれてから実行
document.addEventListener('DOMContentLoaded', function() {
  console.log('DOMContentLoaded イベントが発生しました');
  try {
    // グローバルナビゲーション
    const navOpen = document.querySelector('.pf-l-header__navBtn');
    const navClose = document.querySelector('.pf-l-header__navClose');
    const nav = document.querySelector('.pf-l-header__nav');

    // メニューの状態を管理
    let isMenuOpen = false;

  // メニューを開く
  function openMenu() {
    if (window.innerWidth < 768) {
      document.body.classList.add('is-nav-open');
      isMenuOpen = true;
    }
  }

  // メニューを閉じる
  function closeMenu() {
    document.body.classList.remove('is-nav-open');
    isMenuOpen = false;
  }

  // イベントリスナーを設定
  if (navOpen) {
    navOpen.addEventListener('click', openMenu);
  }

  if (navClose) {
    navClose.addEventListener('click', closeMenu);
  }

  // 画面幅変更時の処理
  function handleResize() {
    const isDesktop = window.innerWidth >= 768;
    
    if (isDesktop && isMenuOpen) {
      // PC表示時はメニューを閉じる
      closeMenu();
    }
  }

  // リサイズイベントリスナー（デバウンス処理）
  let resizeTimeout;
  window.addEventListener('resize', () => {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(handleResize, 100);
  });

  // 初期化時に実行
  handleResize();

  // メニュー外をクリックした時の処理（モバイルのみ）
  if (nav) {
    nav.addEventListener('click', (e) => {
      if (e.target === nav && isMenuOpen) {
        closeMenu();
      }
    });
  }

  // ナビゲーションメニューのリンクをクリックした時にメニューを閉じる
  const navLinks = document.querySelectorAll('.pf-l-header__navList a');
  if (navLinks.length > 0) {
    navLinks.forEach(link => {
      link.addEventListener('click', () => {
        if (isMenuOpen) {
          closeMenu();
        }
      });
    });
  }

  // アバウトページのタブナビゲーション
  const navMenu = document.getElementById('navMenu');
  if (navMenu) {
    const tabButtons = navMenu.querySelectorAll('button[data-target]');
    const sections = document.querySelectorAll('section[id]');
    
    if (tabButtons.length === 0 || sections.length === 0) {
      console.warn('Tab navigation elements not found');
      return;
    }
    
    // 初期状態：最初のタブをアクティブにする
    if (tabButtons.length > 0) {
      const firstButton = tabButtons[0];
      const firstTarget = firstButton.getAttribute('data-target');
      
      // すべてのセクションを非表示
      sections.forEach(section => {
        section.style.display = 'none';
      });
      
      // 最初のセクションを表示
      const firstSection = document.getElementById(firstTarget);
      if (firstSection) {
        firstSection.style.display = 'block';
      }
      
      // 最初のボタンをアクティブにする
      firstButton.classList.add('active');
    }
    
    // タブボタンのクリックイベント
    tabButtons.forEach(button => {
      button.addEventListener('click', () => {
        const targetId = button.getAttribute('data-target');
        
        // すべてのボタンからアクティブクラスを削除
        tabButtons.forEach(btn => btn.classList.remove('active'));
        
        // クリックされたボタンにアクティブクラスを追加
        button.classList.add('active');
        
        // すべてのセクションを非表示
        sections.forEach(section => {
          section.style.display = 'none';
        });
        
        // 対象のセクションを表示
        const targetSection = document.getElementById(targetId);
        if (targetSection) {
          targetSection.style.display = 'block';
        }
      });
    });
  }

  // TOPに戻るボタン
  const scrollToTopBtn = document.getElementById('scrollToTop');
  if (scrollToTopBtn) {
    // スクロール位置を監視
    function handleScroll() {
      const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      const viewportHeight = window.innerHeight;
      
      // 100vhを超えた場合にボタンを表示
      if (scrollTop > viewportHeight) {
        scrollToTopBtn.classList.add('show');
      } else {
        scrollToTopBtn.classList.remove('show');
      }
    }
    
    // スクロールイベントリスナー（デバウンス処理）
    let scrollTimeout;
    window.addEventListener('scroll', () => {
      clearTimeout(scrollTimeout);
      scrollTimeout = setTimeout(handleScroll, 10);
    });
    
    // 初期化時に実行
    handleScroll();
    
    // ボタンクリック時の処理
    scrollToTopBtn.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  }

  // スクロールプログレスインジケーター
  const scrollProgress = document.querySelector('.pf-c-scrollProgress');
  if (scrollProgress) {
    const indicators = scrollProgress.querySelectorAll('.pf-c-scrollProgress__indicator');
    
    if (indicators.length === 0) {
      console.warn('Scroll progress indicators not found');
      return;
    }
    
    // スクロール位置に応じてプログレスを更新
    function updateScrollProgress() {
      const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      const documentHeight = document.documentElement.scrollHeight - window.innerHeight;
      const viewportHeight = window.innerHeight;
      
      // ページの高さを4分割
      const sectionHeight = documentHeight / 4;
      
      // 現在のセクションを計算
      let currentSection = Math.floor(scrollTop / sectionHeight) + 1;
      
      // セクション番号を1-4の範囲に制限
      currentSection = Math.max(1, Math.min(4, currentSection));
      
      // すべてのインジケーターからactiveクラスを削除
      indicators.forEach(indicator => {
        indicator.classList.remove('active');
      });
      
      // 現在のセクションのインジケーターにactiveクラスを追加
      const activeIndicator = scrollProgress.querySelector(`[data-section="${currentSection}"]`);
      if (activeIndicator) {
        activeIndicator.classList.add('active');
      }
    }
    
    // スクロールイベントリスナー（デバウンス処理）
    let progressTimeout;
    window.addEventListener('scroll', () => {
      clearTimeout(progressTimeout);
      progressTimeout = setTimeout(updateScrollProgress, 10);
    });
    
    // 初期化時に実行
    updateScrollProgress();
    
    // インジケータークリック時の処理
    indicators.forEach((indicator, index) => {
      indicator.addEventListener('click', () => {
        const targetSection = index + 1;
        const documentHeight = document.documentElement.scrollHeight - window.innerHeight;
        const sectionHeight = documentHeight / 4;
        const targetScrollTop = (targetSection - 1) * sectionHeight;
        
        window.scrollTo({
          top: targetScrollTop,
          behavior: 'smooth'
        });
      });
    });
  }
  } catch (error) {
    console.error('JavaScript error:', error);
  }


  // ページ読み込み時にアニメーションを開始（複数回試行）
  setTimeout(() => {
    initHandwritingAnimation();
  }, 500); // ページ読み込み後0.5秒後に開始
  
  setTimeout(() => {
    initHandwritingAnimation();
  }, 1500); // 1.5秒後にも試行
  
  setTimeout(() => {
    initHandwritingAnimation();
  }, 3000); // 3秒後にも試行

});

// ウィンドウ読み込み完了時にもアニメーションを開始（フォールバック）
window.addEventListener('load', function() {
  console.log('window.onload イベントが発生しました');
  setTimeout(() => {
    initHandwritingAnimation();
  }, 1000);
  
  setTimeout(() => {
    initHandwritingAnimation();
  }, 2000);
});
