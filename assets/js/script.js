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
    // ============================
    // page-forcat 用（おまけページ）: 1キーでも押されたら即出力
    // ============================
    (function initForCatPage(){
      try {
        // 判定はbodyクラスではなく、要素の存在で行う（確実に動かすため）
        const outputEl = document.getElementById('output');
        const messageEl = document.getElementById('message');
        if (!outputEl || !messageEl) return; // 対象ページでなければ終了

        const catMessages = [
          'いつまでやってるの？',
          'あったかいね。ここ。',
          'どしたん？話聞こか？',
          '何見てる？',
          'チュールを要求します。',
          '今日はご機嫌♪',
          'ひゃくえーん',
          'なでろー！',
          'ここ押すと消える？',
          'ごはんだして？役目でしょ？',
          '今日のミーティング代わろうか？',
          'ここは俺に任せて先に行け！',
        ];

        function randomMsg(){
          return catMessages[Math.floor(Math.random() * catMessages.length)];
        }

        // 最初のキーから即表示。以降のキーでも都度更新。
        document.addEventListener('keydown', (e) => {
          // 押されたキーの表示（装飾用、不要なら消せます）
          outputEl.textContent = e.key === ' ' ? 'space' : e.key;
          messageEl.textContent = randomMsg();
        });
      } catch (err) {
        console.warn('ForCat init failed:', err);
      }
    })();

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

    // タブボタンのクリックイベント（フェード切り替え対応）
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const FADE_MS = 300;

    function getVisibleSection() {
      for (const sec of sections) {
        const disp = window.getComputedStyle(sec).display;
        if (disp !== 'none') return sec;
      }
      return null;
    }

    tabButtons.forEach(button => {
      button.addEventListener('click', () => {
        const targetId = button.getAttribute('data-target');
        const targetSection = document.getElementById(targetId);
        if (!targetSection) return;

        // すでに表示中なら何もしない
        const current = getVisibleSection();
        if (current === targetSection) return;

        // ボタンのアクティブ状態
        tabButtons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        if (reduceMotion) {
          // 即時切り替え
          sections.forEach(section => { section.style.display = 'none'; });
          targetSection.style.display = 'block';
          return;
        }

        // フェードアウト → 非表示
        if (current) {
          current.style.transition = 'opacity 0.3s ease';
          current.style.opacity = '1';
          requestAnimationFrame(() => { current.style.opacity = '0'; });
        }

        // フェードイン準備
        targetSection.style.display = 'block';
        targetSection.style.transition = 'opacity 0.3s ease';
        targetSection.style.opacity = '0';

        // 先に他のセクションはdisplay:noneにする（対象とcurrentを除く）
        sections.forEach(section => {
          if (section !== targetSection && section !== current) {
            section.style.display = 'none';
            section.style.opacity = '';
            section.style.transition = '';
          }
        });

        // フェードイン実行
        requestAnimationFrame(() => { targetSection.style.opacity = '1'; });

        // 後処理（トランジション解除とcurrentを非表示）
        setTimeout(() => {
          if (current) {
            current.style.display = 'none';
            current.style.opacity = '';
            current.style.transition = '';
          }
          targetSection.style.opacity = '';
          targetSection.style.transition = '';
        }, FADE_MS);
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
    let lastSection = 0;
    function updateScrollProgress() {
      const scrollTop = window.pageYOffset || document.documentElement.scrollTop || 0;
      const docEl = document.documentElement;
      const body = document.body;
      const fullHeight = Math.max(docEl.scrollHeight, body.scrollHeight);
      const documentHeight = Math.max(0, fullHeight - window.innerHeight);

      let currentSection = 1;
      if (documentHeight > 0) {
        const progress = scrollTop / documentHeight; // 0.0 - 1.0
        // 0-1 を 4分割にマッピング。末尾は必ず4にクランプ
        currentSection = Math.min(4, Math.floor(progress * 4) + 1);
      }

      if (currentSection === lastSection) return; // 変更ない場合は何もしない
      lastSection = currentSection;

      // すべてのインジケーターからactiveクラスを削除
      indicators.forEach(indicator => indicator.classList.remove('active'));

      // 現在のセクションのインジケーターにactiveクラスを追加
      const activeIndicator = scrollProgress.querySelector(`[data-section="${currentSection}"]`);
      if (activeIndicator) activeIndicator.classList.add('active');
    }

    // スクロールイベントリスナー（デバウンス）
    let progressTimeout;
    window.addEventListener('scroll', () => {
      clearTimeout(progressTimeout);
      progressTimeout = setTimeout(updateScrollProgress, 10);
    }, { passive: true });

    // 初期化時に実行
    updateScrollProgress();

    // インジケータークリック（重ね表示領域全体を4分割）
    function scrollToSection(targetSection) {
      const docEl = document.documentElement;
      const body = document.body;
      const fullHeight = Math.max(docEl.scrollHeight, body.scrollHeight);
      const documentHeight = Math.max(0, fullHeight - window.innerHeight);
      const sectionHeight = documentHeight / 4;
      const clampedSection = Math.max(1, Math.min(4, targetSection));
      const targetScrollTop = Math.max(0, Math.min(documentHeight, (clampedSection - 1) * sectionHeight));

      // 先にUI更新（アクティブ切替）
      indicators.forEach(ind => ind.classList.remove('active'));
      const activeIndicator = scrollProgress.querySelector(`[data-section="${clampedSection}"]`);
      if (activeIndicator) activeIndicator.classList.add('active');
      lastSection = clampedSection;

      window.scrollTo({
        top: targetScrollTop,
        behavior: 'smooth'
      });
    }

    // 重ねられたコンテナ全体のクリックで分割判定
    scrollProgress.addEventListener('click', (e) => {
      const rect = scrollProgress.getBoundingClientRect();
      const y = e.clientY - rect.top; // 0 ～ height
      const zone = Math.floor((y / rect.height) * 4) + 1; // 1 ～ 4
      scrollToSection(zone);
    });

    // 既存の個別インジケータークリックも維持（キーボード操作等に備えて）
    indicators.forEach((indicator, index) => {
      indicator.addEventListener('click', (ev) => {
        ev.stopPropagation(); // コンテナのクリック処理と競合しないように
        scrollToSection(index + 1);
      });
    });
  }

  // ============================
  // マウスカーソル追従（トレースキャット）
  // ============================
  (function initCursorFollower(){
    try {
      const isMobile = window.matchMedia('(max-width: 767px)').matches;
      if (isMobile) return; // モバイルでは無効

      const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

      // 既に要素が存在する場合は再生成しない
      if (document.querySelector('.pf-c-cursorFollower')) return;

      const follower = document.createElement('div');
      follower.className = 'pf-c-cursorFollower';
      // Fallback inline styles in case CSS isn't compiled yet
      try {
        const style = follower.style;
        style.position = 'fixed';
        style.left = '0';
        style.top = '0';
        style.width = '40px';
        style.height = '40px';
        // Resolve theme URL dynamically from header logo to support subdirectory installs
        let themeImgBase = '';
        const headerLogo = document.querySelector('header.pf-l-header img[src*="/assets/img/logo"]');
        if (headerLogo && headerLogo.src) {
          // Get directory like xxx/wp-content/themes/PF-theme/assets/img/
          const src = headerLogo.src;
          const idx = src.lastIndexOf('/assets/img/');
          if (idx !== -1) {
            themeImgBase = src.substring(0, idx + '/assets/img/'.length);
          }
        }
        const traceCatUrl = themeImgBase
          ? themeImgBase + 'tracecat.png'
          : (window.location.origin + '/wp-content/themes/PF-theme/assets/img/tracecat.png');
        style.backgroundImage = `url('${traceCatUrl}')`;
        style.backgroundRepeat = 'no-repeat';
        style.backgroundPosition = 'center center';
        style.backgroundSize = 'contain';
        style.pointerEvents = 'none';
        style.zIndex = '2000';
        style.transform = 'translate3d(-100px, -100px, 0)';
        style.opacity = '0';
        style.transition = 'opacity .2s ease';
      } catch(_) {}
      document.body.appendChild(follower);

      // スムーズフォロー用の状態
      let targetX = -100, targetY = -100; // 目標位置（初期は画面外）
      let currentX = targetX, currentY = targetY; // 実際の描画位置
      let rafId = null;
      let isPointerInside = false;

      const size = 40; // CSSの幅高さと揃える
      // 右下に配置するためのオフセット（カーソル位置からのずらし量）
      const offsetX = 10;
      const offsetY = 10;
      const ease = 0.18; // 追従速度（0-1）

      // アニメーションループ
      function animate() {
        // 緩やかに追従
        currentX += (targetX - currentX) * ease;
        currentY += (targetY - currentY) * ease;
        // カーソルの右下に配置
        follower.style.transform = `translate3d(${currentX + offsetX}px, ${currentY + offsetY}px, 0)`;
        rafId = requestAnimationFrame(animate);
      }

      // 直接追従（低モーション時）
      function jumpToTarget(x, y) {
        // カーソルの右下に即時配置
        follower.style.transform = `translate3d(${x + offsetX}px, ${y + offsetY}px, 0)`;
      }

      // 初期起動
      if (!reduceMotion) {
        rafId = requestAnimationFrame(animate);
      }

      // イベント
      window.addEventListener('mousemove', (e) => {
        targetX = e.clientX;
        targetY = e.clientY;
        if (reduceMotion) {
          jumpToTarget(targetX, targetY);
        }
        if (!isPointerInside) {
          isPointerInside = true;
          follower.style.opacity = '0.5';
        }
      }, { passive: true });

      window.addEventListener('mouseenter', () => {
        isPointerInside = true;
        follower.style.opacity = '0.5';
      });

      window.addEventListener('mouseleave', () => {
        isPointerInside = false;
        follower.style.opacity = '0';
      });

      // ビューポートサイズ変化でモバイルになったら停止・隠す
      const mq = window.matchMedia('(max-width: 767px)');
      mq.addEventListener('change', (ev) => {
        if (ev.matches) {
          // モバイルになった
          follower.style.display = 'none';
          if (rafId) cancelAnimationFrame(rafId);
          rafId = null;
        } else {
          // PCに戻った
          follower.style.display = '';
          if (!reduceMotion && !rafId) rafId = requestAnimationFrame(animate);
        }
      });

  } catch (err) {
    console.warn('Cursor follower init failed:', err);
  }
})();

// ============================
// 背景ネズミ（デスクトップのみ）
// ============================
(function initBackgroundMice(){
  try {
    const isMobile = window.matchMedia('(max-width: 767px)').matches;
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (isMobile || reduceMotion) return;

    const NUM = 2; // 2匹
    const mice = [];
    const viewport = { w: window.innerWidth, h: window.innerHeight };
    const headerHeight = 80; // ヘッダー固定高さ相当（8rem）

    function createMouse(i){
      const el = document.createElement('div');
      el.className = 'pf-c-mouse';
      // 画像指定がない場合は丸で代用（必要なら画像に差し替え）
      Object.assign(el.style, {
        borderRadius: '50%'
      });
      el.setAttribute('aria-label', 'mouse');
      document.body.appendChild(el);
      const speed = 1.2 + Math.random()*0.8; // 1.2~2.0 px/frame 基準
      const angle = Math.random()*Math.PI*2;
      return {
        el,
        x: Math.random()*(viewport.w-64)+32,
        y: Math.random()*(viewport.h-headerHeight-64)+headerHeight+32,
        vx: Math.cos(angle)*speed,
        vy: Math.sin(angle)*speed,
        baseSpeed: speed,
        dashUntil: 0
      };
    }

    // マウス座標は使用しない（自律移動のみ）

    // 生成
    for(let i=0;i<NUM;i++) mice.push(createMouse(i));

    // クリック等のインタラクションは不要

    // リサイズ対応
    window.addEventListener('resize', ()=>{
      viewport.w = window.innerWidth;
      viewport.h = window.innerHeight;
    });

    // 更新ループ
    const EASE = 0.98; // 慣性の減衰
    const TURN = 0.04; // ランダムに向きを少し変える

    function step(now){
      mice.forEach(m => {
        // ランダムに少し進路変更（自律移動）
        m.vx += (Math.random()-0.5) * TURN;
        m.vy += (Math.random()-0.5) * TURN;
        // 速度を基準付近にクランプ
        const speed = Math.hypot(m.vx, m.vy) || 1;
        const target = m.baseSpeed;
        m.vx = (m.vx/speed) * target;
        m.vy = (m.vy/speed) * target;

        // 壁でバウンド（ヘッダー下から）
        m.x += m.vx;
        m.y += m.vy;
        m.vx *= EASE;
        m.vy *= EASE;

        if (m.x < 16){ m.x = 16; m.vx = Math.abs(m.vx); }
        if (m.x > viewport.w - 16){ m.x = viewport.w - 16; m.vx = -Math.abs(m.vx); }
        if (m.y < headerHeight + 16){ m.y = headerHeight + 16; m.vy = Math.abs(m.vy); }
        if (m.y > viewport.h - 16){ m.y = viewport.h - 16; m.vy = -Math.abs(m.vy); }

        // 反映
        m.el.style.transform = `translate3d(${Math.round(m.x-16)}px, ${Math.round(m.y-16)}px, 0)`;
      });
      requestAnimationFrame(step);
    }

    requestAnimationFrame(step);
  } catch (err) {
    console.warn('Background mice init failed:', err);
  }
})();

} catch (error) {
  console.error('JavaScript error:', error);
}

// ページ読み込み時にアニメーションを開始（複数回試行）
setTimeout(() => {
  initHandwritingAnimation();
}, 500); // ページ読み込み後0.5秒後に開始
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
