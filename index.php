<?php get_header(); ?>

<main id="home">
    <!-- メインビジュアルセクション -->
    <section class="pf-p-topKV">
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
            <strong class="pf-scrollannounce">scroll</strong>
        </div>
    </section>

    <!-- 制作実績セクション -->
    <section class="pf-p-topWorks" id="works">
        <div class="pf-l-container">
            <h2 class="pf-p-topWorks__title">
                <span class="pf-p-topWorks__titleJp">制作物</span>
                <span class="pf-p-topWorks__titleEn">works</span>
            </h2>
            
            <div class="pf-p-works__container">
                <?php
                // フロントページで表示する制作物を取得
                $featured_works = get_featured_works(3);
                
                if ($featured_works->have_posts()) :
                    while ($featured_works->have_posts()) : $featured_works->the_post();
                ?>
                    <article class="pf-p-works__item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="pf-p-works__thmbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                <?php else : ?>
                                    <img src="<?= get_template_directory_uri(); ?>/assets/img/detailKV.webp" alt="サムネなし">
                                <?php endif; ?>
                            </div>
                            <div>
                                <h3 class="pf-p-works__itemTitle"><?php the_title(); ?></h3>
                                <?php if (get_field('title')) : ?>
                                    <p class="pf-p-works__customTitle"><?php the_field('title'); ?></p>
                                <?php endif; ?>
                                <p class="pf-p-works__itemText">制作物の簡単な説明文が入ります。</p>
                            </div>
                        </a>
                    </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <p>制作物がありません。</p>
                <?php endif; ?>
            </div>
            
            <div class="pf-p-topWorks__more">
                <a href="<?= get_post_type_archive_link('works'); ?>" class="pf-c-btn">もっと見る</a>
            </div>
        </div>
    </section>

    <!-- 私についてセクション -->
    <section class="pf-p-about" id="about">
        <div class="pf-l-container">
            <h2 class="pf-p-about__title">
                <span class="pf-p-about__titleJp">私について</span>
                <span class="pf-p-about__titleEn">about</span>
            </h2>
            <div class="pf-p-about__content">
                <div class="pf-p-about__image">
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/detailKV.webp" alt="プロフィール画像">
                </div>
                <div class="pf-p-about__text">
                    <h3>末岡哲（すえおかあきら）</h3>
                    <p>フロントエンドエンジニアとして、ユーザー体験を重視したWebサイトの制作を行っています。</p>
                    <p>HTML、CSS、JavaScript、React、Vue.jsなどの技術を使用し、レスポンシブデザインやアクセシビリティを考慮した開発を心がけています。</p>
                </div>
            </div>
        </div>
    </section>

    <!-- お問い合わせセクション -->
    <section class="pf-p-contact" id="contact">
        <div class="pf-l-container">
            <h2 class="pf-p-contact__title">
                <span class="pf-p-contact__titleJp">お問い合わせ</span>
                <span class="pf-p-contact__titleEn">contact</span>
            </h2>
            <div class="pf-p-contact__content">
                <p>お仕事のご相談やご質問がございましたら、お気軽にお問い合わせください。</p>
                <div class="pf-p-contact__info">
                    <p>Email: example@example.com</p>
                    <p>Phone: 090-0000-0000</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>