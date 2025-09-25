    <!-- フッターセクション -->
    <footer class="pf-l-footer">
        <nav class="pf-l-footer__nav">
            <ul class="pf-l-footer__navList">
                <li class="pf-l-footer__navLItem">
                    <a href="<?php echo home_url(); ?>#home">
                        <span class="pf-l-footer__navItemJp">トップページ</span>
                        <span class="pf-l-footer__navItemEn">home</span>
                    </a>
                </li>
                <li class="pf-l-footer__navLItem">
                    <a href="<?= get_post_type_archive_link('works'); ?>">
                        <span class="pf-l-footer__navItemJp">制作物</span>
                        <span class="pf-l-footer__navItemEn">works</span>
                    </a>
                </li>
                <li class="pf-l-footer__navLItem">
                    <a href="<?= get_permalink(get_page_by_path('about')); ?>">
                        <span class="pf-l-footer__navItemJp">私について</span>
                        <span class="pf-l-footer__navItemEn">about</span>
                    </a>
                </li>
                <li class="pf-l-footer__navLItem">
                    <a href="<?= home_url(); ?>#contact">
                        <span class="pf-l-footer__navItemJp">ご連絡先</span>
                        <span class="pf-l-footer__navItemEn">contact</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- ロゴ部分 -->
        <div class="pf-l-footer__brand">
            <div class="pf-l-footer__brandLogo">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/logo.webp" alt="Sueoka Akira">
                <span>Sueoka Akira</span>
            </div>
            <small>
                Copyright © Sueoka Akira All Rights Reserved.
            </small>
        </div>
    </footer>

    <!-- TOPに戻るボタン -->
    <button id="scrollToTop" class="pf-c-scrollToTop" aria-label="ページトップに戻る">
        <span class="pf-c-scrollToTop__arrow">↑</span>
    </button>


    <!-- WPではボディ閉じタグ前に必ず必要 -->
    <?php wp_footer(); ?>
</body>
</html>