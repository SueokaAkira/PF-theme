<!--ゲットヘッダー　現在のテーマディレクトリからheader.phpを読み込む -->
<?= get_header(); ?>

    <main id="home">
        <!-- メインビジュアルセクション -->
        <section id="home" class="pf-p-topKV">
            <div class="pf-p-topKV__inner">
                <h2 class="pf-p-topKV__title">
                    <span class="handwriting-animation">
                        <span class="handwriting-text" data-text="Sueoka Akira Portfolio">Sueoka Akira Portfolio</span>
                    </span>
                </h2>
                <p class="pf-p-topKV__copy">
                    like drifting clouds and flowing water,<br>
                    give form to the spirit of them.
                </p>
                <p class="pf-p-topKV__desc">
                    このサイトは、末岡　哲のポートフォリオサイトです。<br>
                    これまでの経験から、DXやUI,UXに興味を持ち、2025年4月からWEBデザインの学習を始めました。<br>
                    シンプルデザインとコーディングに力を入れていますので、ご一閲いただけると幸いです。
                </p>
            </div>
            <div class="pf-ctacontainer-gray">
                <strong class="pf-scrollannounce">scroll down!</strong>
            </div>
        </section>

        <!-- 制作実績セクション -->
        <section class="pf-p-topWorks" id="works">
            <div class="pf-l-container">
                <h2 class="pf-p-topWorks__title">
                    <span class="pf-c-sectTitle__jp">制作物</span>
                    <span class="pf-c-sectTitle__en">Works</span>
                </h2>
                <div class="pf-p-works__container">
                    <?php
                    // 'pickup'タグが設定された制作物を3件取得
                    $pickup_tag = get_term_by('name', 'pickup', 'post_tag');
                    
                    if ($pickup_tag) {
                        // 'pickup'タグが存在する場合
                        $args = array(
                            'post_type' => 'works',
                            'posts_per_page' => 3,
                            'tag_id' => $pickup_tag->term_id,
                        );
                    } else {
                        // 'pickup'タグが存在しない場合は最新3件を表示
                        $args = array(
                            'post_type' => 'works',
                            'posts_per_page' => 3,
                        );
                    }
                    
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) :
                        while ($the_query->have_posts()) :
                            $the_query->the_post();
                    ?>
                        <article class="pf-p-works__item">
                            <a href="<?php the_permalink(); ?>">
                                <div class="pf-p-works__thmbnail">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium'); ?>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <h3 class="pf-p-works__itemTitle">
                                        <?php the_title(); ?>
                                    </h3>
                                    <p class="pf-p-works__itemText">
                                        <?php if (get_field('description')) : ?>
                                            <?php the_field('description'); ?>
                                        <?php else : ?>
                                            <?php the_excerpt(); ?>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </a>
                        </article>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
                <div class="pf-c-ctaContainer">
                    <a href="<?= get_post_type_archive_link('works'); ?>" class="pf-c-btn">もっと見る</a>
                </div>
            </div>
        </section>

        <!-- 私についてセクション -->
        <section class="pf-p-topAbout" id="about">
            <div class="pf-l-container">
                <h2 class="pf-p-topAbout__title">
                    <span class="pf-c-sectTitle__jp">私について</span>
                    <span class="pf-c-sectTitle__en">About</span>
                </h2>
                <div class="pf-p-about__container">
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/detailKV.webp" alt="自分の画像" class="pf-p-about__img">
                    <div class="pf-p-about__text">
                        <h3 class="pf-p-about__textName">末岡　哲</h3>
                        <p class="pf-p-about__textDesc">
                            フロントエンドエンジニアとして活動しています。<br>
                            ユーザー体験を重視したデザインと、パフォーマンスを意識したコーディングを心がけています。<br>
                            新しい技術の習得と、より良いユーザー体験の提供を目指して日々学習を続けています。
                        </p>
                    </div>
                </div>
                <div class="pf-c-ctaContainer">
                    <a href="<?= home_url(); ?>/about/" class="pf-c-btn">詳しく見る</a>
                </div>
            </div>
        </section>

        <!-- ご連絡先セクション -->
        <section class="pf-p-topContact" id="contact">
            <div class="pf-l-container">
                <h2 class="pf-p-topContact__title">
                    <span class="pf-c-sectTitle__jp">ご連絡先</span>
                    <span class="pf-c-sectTitle__en">Contact</span>
                </h2>
                <div class="pf-p-contactContainer">
                    <p class="pf-p-contact">
                        お仕事のご相談やご質問がございましたら、<br>
                        お気軽にお問い合わせください。
                    </p>
                    <a href="mailto:example@example.com" class="pf-p-contactLink">Email</a>
                </div>
            </div>
        </section>
    </main>

<!--ゲットフッター　現在のテーマディレクトリからfooter.phpを読み込む -->
<?= get_footer(); ?>
