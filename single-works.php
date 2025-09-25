<?= get_header(); ?>

    <main id="detail">
        <section class="pf-l-detail__KV">
            <!-- タイトル -->
            <div class="pf-c-pageTitle">
                <h2 class="pf-c-pageTitlejp">
                    -詳細-
                </h2>
                <span class="pf-c-pageTitleen"></span>
                    detail
                </span>
            </div>
            <div class="pf-p-detailKVimg-container">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/detailKV.webp" alt="おもちゃと猫">
            </div>
        </section>
        <!-- 各作品詳細内容 -->
        <!-- ワードプレスループ　p75 -->
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
        <section id="post-<?php the_ID(); ?>" <?php post_class('pf-p-detailContainer post'); ?>>
                <!-- 制作物名 -->
                <div class="pf-p-detailTitle detail-itembox">
                    <!-- 項目名：制作物名 -->
                    <div class="pf-c-detailItem__title">
                        <h3 class="pf-c-detailItem__titleJp">
                            制作物名
                        </h3>
                        <span class="pf-c-detailItem__titleEn">
                            title
                        </span>
                    </div>
                    <!-- ここに作品名を記述 -->
                    <strong>
                        <?php the_field('title'); ?>
                    </strong>
                </div>
                <!-- 作品画像 ３枚 -->
                <div class="pf-p-detailImg detail-itembox">
                    <div class="pf-p-detail__imgSlider">
                        <?php
                        $img1 = get_field('img1');
                        $img2 = get_field('img2');
                        $img3 = get_field('img3');
                        ?>
                        <?php if($img1): ?>
                            <div>
                                <?php if(is_array($img1)): ?>
                                    <img src="<?php echo esc_url($img1['url']); ?>" alt="<?php echo esc_attr($img1['alt']); ?>">
                                <?php else: ?>
                                    <img src="<?php echo esc_url($img1); ?>" alt="作品画像1">
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if($img2): ?>
                            <div>
                                <?php if(is_array($img2)): ?>
                                    <img src="<?php echo esc_url($img2['url']); ?>" alt="<?php echo esc_attr($img2['alt']); ?>">
                                <?php else: ?>
                                    <img src="<?php echo esc_url($img2); ?>" alt="作品画像2">
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if($img3): ?>
                            <div>
                                <?php if(is_array($img3)): ?>
                                    <img src="<?php echo esc_url($img3['url']); ?>" alt="<?php echo esc_attr($img3['alt']); ?>">
                                <?php else: ?>
                                    <img src="<?php echo esc_url($img3); ?>" alt="作品画像3">
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- 制作期間 -->
                <div class="pf-p-detailTerm detail-itembox">
                    <!-- 項目名:制作期間-->
                    <div class="pf-c-detailItem__title">
                        <h3 class="pf-c-detailItem__titleJp">
                            制作期間
                        </h3>
                        <span class="pf-c-detailItem__titleEn">
                            term
                        </span>
                    </div>
                    <!-- ここに制作期間を記述 -->
                    <div>
                        <p>デザイン：
                            <span><?php the_field('term-design'); ?></span>
                        </p>
                        <p>コーディング:
                            <span><?php the_field('term-code'); ?></span>
                        </p>
                    </div>
                </div>
                <!-- ツール -->
                <div class="pf-p-detailTool detail-itembox">
                    <!-- 項目名:ツール-->
                    <div class="pf-c-detailItem__title">
                        <h3 class="pf-c-detailItem__titleJp">
                            使用ツール
                        </h3>
                        <span class="pf-c-detailItem__titleEn">
                            tool
                        </span>
                    </div>
                    <!-- ここにツールを記述 カスタムフィールド-->
                    <?php
                    $tools = get_field('tools'); // 制作物ACF関係フィールドに値が入っている場合個々を＄toolsに格納し＄toolとして出力後、IDを使ってアイキャッチを取得、アイキャッチがあれば出力　ループ
                    if( $tools ): ?>
                    <div class="pf-p-detail__iconBox">
                        <?php foreach( $tools as $tool ): ?>
                        <?php
                            // アイキャッチを取得
                            $thumbnail = get_the_post_thumbnail( $tool->ID, 'thumbnail' );
                            if( $thumbnail ) echo $thumbnail;
                        ?>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <!-- 目的 カスタムフィールド-->
                <div class="pf-p-detailPurpose detail-itembox">
                    <!-- 項目名:目的-->
                    <div class="pf-c-detailItem__title">
                        <h3 class="pf-c-detailItem__titleJp">
                            目的
                        </h3>
                        <span class="pf-c-detailItem__titleEn">
                            purpose
                        </span>
                    </div>
                    <!-- 目的カスタムフィールドの内容を挿入 -->
                    <p><?php the_field('purpose'); ?></p>
                </div>
                <!-- 対象 -->
                <div class="pf-p-detailTarget detail-itembox">
                    <!-- 項目名:対象-->
                    <div class="pf-c-detailItem__title">
                        <h3 class="pf-c-detailItem__titleJp">
                            対象
                        </h3>
                        <span class="pf-c-detailItem__titleEn">
                            terget
                        </span>
                    </div>
                    <!-- ターゲットカスタムフィールド-->
                    <p><?php the_field('target'); ?></p>
                </div>
                <!-- 設計意図 -->
                <div class="pf-p-detailDesignIntent detail-itembox">
                    <!-- 項目名:設計意図-->
                    <div class="pf-c-detailItem__title">
                        <h3 class="pf-c-detailItem__titleJp">
                            設計意図
                        </h3>
                        <span class="pf-c-detailItem__titleEn">
                            design intent
                        </span>
                    </div>
                    <!-- 設計意図 カスタムフィールド-->
                    <p><?php the_field('design-intent'); ?></p>
                </div>
                <!-- 投稿ページのフッター（カテゴリ設定用） -->
                <footer class="post_footer">
                    <?php
                    $categories = get_the_category();
                    if ($categories):
                    ?>
                    <div class="category">
                        <div class="category_list">
                            <?php foreach ($categories as $category): ?>
                                <div class="category_item">
                                    <a href="<?= get_category_link($category); ?>" class="btn btn-sm is-active">
                                        <?php echo $category->name; ?>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </footer>
                <!-- ページネーション -->
                <div class="pf-p-detailPagination">
                    <!-- 前の作品へ、次の作品へのリンクを表示 -->
                    <?php $previous_post = get_previous_post();
                    if ($previous_post):
                    ?>
                    <div class="pf-p-detailPagination__prev">
                        <a href="<?php the_permalink($previous_post); ?>">
                            <p class="pf-p-detailPagination__prevText">
                                前の作品へ
                            </p>
                        </a>
                    </div>
                    <?php endif; ?>

                    <?php $next_post = get_next_post();
                    if ($next_post):
                    ?>
                    <div class="pf-p-detailPagination__next">
                        <a href="<?php the_permalink($next_post); ?>">
                            <p class="pf-p-detailPagination__nextText">
                                次の作品へ
                            </p>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
        </section>
        <?php endwhile; ?>
        <?php endif; ?>
    </main>

<?= get_footer(); ?>