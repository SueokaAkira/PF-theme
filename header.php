<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- タイトルタグはfunction.phpで設定して削除した -->
    <?php wp_head(); ?>
</head>
<body <?= body_class(); ?>>
    <!-- ボディ開始タグの直後に入れるWPの関数（推奨） -->
     <?php wp_body_open(); ?>
    <header class="pf-l-header">
        <h1 class="pf-l-header__logo">
            <!-- トップページのURLを返すテンプレタグ -->
            <a href="<?= home_url(); ?>" class="pf-c-logo" aria-label="ホームページへ戻る(イニシャルロゴ)">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/logo.webp" alt="イニシャルロゴ">
                <span>SueokaAkira</span>
            </a>
        </h1>
        <button type="button" class="pf-l-header__navBtn">
            <span></span>
        </button>

        <!-- スクロールプログレスインジケーター　ページの現在位置 -->
        <div class="pf-c-scrollProgress">
            <div class="pf-c-scrollProgress__indicator" data-section="1">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/スクロール用1:4.webp" alt="スクロール1" class="pf-c-scrollProgress__img">
            </div>
            <div class="pf-c-scrollProgress__indicator" data-section="2">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/スクロール用2:4.webp" alt="スクロール2" class="pf-c-scrollProgress__img">
            </div>
            <div class="pf-c-scrollProgress__indicator" data-section="3">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/スクロール用3:4.webp" alt="スクロール3" class="pf-c-scrollProgress__img">
            </div>
            <div class="pf-c-scrollProgress__indicator" data-section="4">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/スクロール用4:4.webp" alt="スクロール4" class="pf-c-scrollProgress__img">
            </div>
        </div>
        <nav class="pf-l-header__nav">
            <!-- 閉じるボタン（SPのみ） -->
            <button type="button" class="pf-l-header__navClose">
            </button>
            <!-- ナブメニュー用ロゴ -->
            <p class="pf-l-header__navLogo">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/logo.webp" alt="末岡哲のイニシャルロゴ">
            </p>
            <!-- ナブメニュー項目一覧 -->
            <ul class="pf-l-header__navList">
                <li class="pf-l-header__navLItem">
                    <a href="<?php echo home_url(); ?>#home">
                        <span class="pf-l-header__navItemJp">トップページ</span>
                        <span class="pf-l-header__navItemEn">home</span>
                    </a>
                </li>
                <li class="pf-l-header__navLItem">
                    <a href="<?= get_post_type_archive_link('works'); ?>">
                        <span class="pf-l-header__navItemJp">制作物</span>
                        <span class="pf-l-header__navItemEn">works</span>
                    </a>
                </li>
                <li class="pf-l-header__navLItem">
                    <a href="<?= get_permalink(get_page_by_path('about')); ?>">
                        <span class="pf-l-header__navItemJp">私について</span>
                        <span class="pf-l-header__navItemEn">about</span>
                    </a>
                </li>
                <li class="pf-l-header__navLItem">
                    <a href="<?= home_url(); ?>#contact">
                        <span class="pf-l-header__navItemJp">ご連絡先</span>
                        <span class="pf-l-header__navItemEn">contact</span>
                    </a>
                </li>
            </ul>
        </nav>
    </header>