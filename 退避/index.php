<!--ゲットヘッダー　現在のテーマディレクトリからheader.phpを読み込む -->
<?= get_header(); ?>

    <main id="home">
        <!-- メインビジュアルセクション -->
        <section id="home" class="pf-p-topKV">
            <div class="pf-p-topKV__inner">
                <h2 class="pf-p-topKV__title">Sueoka Akira Portfolio</h2>
                <p class="pf-p-topKV__copy">
                    like drifting clouds and flowing water,<br>
                    give form to the spirit of them.
                </p>
                <p class="pf-p-topKV__desc">
                    このサイトは、末岡　哲のポートフォリオサイトです。<br>
                    これまでの経験から、DXやUI,UXに興味を持ち、2025年4月からWEBデザインの学習を始めました。<br>
                    シンプルデザインとコーディングに力を入れていますので、ご一閲いただけると幸いです。
                </p>
                <!-- スクロールダウン -->
                <div class="pf-ctacontainer-gray">
                    <strong class="pf-scrollannounce">
                        please scroll down!
                    </strong>
                </div>
            </div>
        </section>

        <!-- 制作実績セクション -->
        <section id="works" class="pf-p-topWorks pf-l-container">
            <!-- セクションタイトル：制作実績 -->
            <hgroup class="pf-c-sectTitle pf-c-sectTitle--each">
                <h2 class="pf-c-sectTitle__jp ">制作実績</h2>
                <p class="pf-c-sectTitle__en">works</p>
            </hgroup>

            <!--　制作物一覧：３枚表示 -->
            <div class="pf-p-works__container">
                <?php
                // 制作物を3つ取得（選択された制作物または最新の3件）
                $featured_works = get_featured_works(3);
                
                if ($featured_works->have_posts()) :
                    while ($featured_works->have_posts()) : $featured_works->the_post();
                ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('pf-p-works__item'); ?>>
                        <!-- 個別投稿ページへのURL（パーマリンク）を表示 -->
                        <a href="<?php the_permalink(); ?>">
                            <!-- サムネ１ -->
                            <div class="pf-p-works__thmbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                <?php else : ?>
                                    <img src="<?= get_template_directory_uri(); ?>/assets/img/サンプル.jpg" alt="サムネなし">
                                <?php endif; ?>
                            </div>
                            <!-- 作品タイトル１ -->
                            <div>
                                <h3 class="pf-p-works__itemTitle"><?php the_title(); ?></h3>
                                <!-- カスタムフィールドの制作物名 -->
                                <?php if (get_field('title')) : ?>
                                    <p class="pf-p-works__customTitle"><?php the_field('title'); ?></p>
                                <?php endif; ?>
                                <!-- 作品概要１ -->
                                <p class="pf-p-works__itemText">制作物の簡単な説明文が入ります。</p>
                            </div>
                        </a>
                    </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <div class="pf-p-works__empty">
                        <p>制作物がありません。</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- もっと見るボタン -->
            <div class="pf-c-ctaContainer">
                <a href="<?= get_post_type_archive_link('works'); ?>" class="pf-c-btn">
                    please see more!
                </a>
            </div>
        </section>
        <!-- 私についてセクション -->
        <section class="pf-p-topAbout l-container">
            <!-- セクションタイトル：私について -->
            <hgroup class="pf-c-sectTitle pf-c-sectTitle--each">
                <h2 class="pf-c-sectTitle__jp">私について</h2>
                <span class="pf-c-sectTitle__en">about</span>
            </hgroup>
            <div class="pf-p-about__container">
                <img class="pf-p-about__img" src="<?= get_template_directory_uri(); ?>/assets/img/shimonoseki_self.png" alt="プロフィール画像">
                <div class="pf-p-about__text">
                    <h3 class="pf-p-about__textName">末岡 哲 <br>
                        (すえおか あきら)<br>
                    Sueoka Akira</h3>
                    <p class="pf-p-about__textDesc">2025年4月から、公共職業訓練校であるインタープランITスクール新宿校へ入校し、WEBデザインに関する包括的な知識の習得に励んでいます。</p>
                </div>
            </div>
            <!-- 詳しく見るボタン -->
            <div class="pf-c-ctaContainer">
                <a href="about.html" class="pf-c-btn">
                    please see more!
                </a>
            </div>
        </section>
        <!-- ご連絡先セクション -->
        <section id="contact" class="pf-p-topContact">
            <!-- セクションタイトル：ご連絡先 -->
            <hgroup class="pf-c-sectTitle pf-c-sectTitle--each">
                <h2 class="pf-c-sectTitle__jp">ご連絡先</h2>
                <span class="pf-c-sectTitle__en">contact</span>
            </hgroup>
            <!-- 閲覧のお礼とご連絡先内容 -->
            <div class="pf-p-contactContainer">
                <p class="pf-p-contact">
                    ここまでご覧いただきありがとうございます。<br>
                    ご質問やお仕事の依頼などがございましたら、以下のメールアドレスまでお気軽にご連絡ください。
                </p>
                <a class="pf-p-contactLink" href="mailto:a.sueoka72@gmail.com">
                    a.sueoka72@gmail.com
                </a>

            </div>
        </section>
    </main>

<!-- フッター呼び出し -->
<?= get_footer(); ?>