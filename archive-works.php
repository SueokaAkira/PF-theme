<?php get_header(); ?>

<main id="page-works">
    <!-- ページタイトル -->
    <section class="pf-l-works__KV">
        <div class="pf-c-pageTitle">
            <h2 class="pf-c-pageTitlejp">
                -制作物-
            </h2>
            <span class="pf-c-pageTitleen">
                works
            </span>
        </div>
    </section>

    <!-- カテゴリフィルター -->
    <section class="pf-p-worksFilter">
        <div class="pf-l-container">
            <h3 class="pf-p-worksFilter__title">カテゴリ-</h3>
            <div class="pf-p-worksFilter__categories">
                <ul class="pf-p-worksFilter_list">
                    <li><a href="#" class="filter-btn active" data-category="all">すべて</a></li>
                    <?php
                    $categories = get_terms(array(
                        'taxonomy' => 'works_category',
                        'hide_empty' => true,
                    ));

                    if (!empty($categories) && !is_wp_error($categories)) :
                        foreach ($categories as $category) :
                    ?>
                        <li><a href="#" class="filter-btn" data-category="<?= esc_attr($category->slug); ?>"><?= esc_html($category->name); ?></a></li>
                    <?php
                        endforeach;
                    else :
                    ?>
                        <li><span>カテゴリがありません</span></li>
                        <?php if (current_user_can('administrator')) : ?>
                        <li><a href="<?= admin_url('edit-tags.php?taxonomy=works_category&post_type=works'); ?>" target="_blank" style="color: #1976d2;">カテゴリを追加</a></li>
                        <?php endif; ?>
                    <?php
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- 制作物一覧 -->
    <section class="pf-p-works">
        <div class="pf-l-container">
            <!-- セクションタイトル：制作実績 -->
            <hgroup class="pf-c-sectTitle pf-c-sectTitle--each">
                <h2 class="pf-c-sectTitle__jp">制作実績</h2>
                <p class="pf-c-sectTitle__en">works</p>
            </hgroup>

            <!-- 制作物一覧：9件表示（1行3件×3行） -->
            <div class="pf-p-works__container">
            <?php
            // メインクエリを使用
            if (have_posts()) :
                while (have_posts()) : the_post();
                    // カテゴリのスラッグを取得
                    $categories = get_the_terms(get_the_ID(), 'works_category');
                    $category_slugs = array();
                    if ($categories && !is_wp_error($categories)) {
                        foreach ($categories as $category) {
                            $category_slugs[] = $category->slug;
                        }
                    }
                    $category_data = !empty($category_slugs) ? implode(' ', $category_slugs) : 'no-category';
            ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('pf-p-works__item'); ?> data-category="<?= esc_attr($category_data); ?>">
                    <!-- 個別投稿ページへのURL（パーマリンク）を表示 -->
                    <a href="<?php the_permalink(); ?>">
                        <!-- サムネ -->
                        <div class="pf-p-works__thmbnail">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('thumbnail'); ?>
                            <?php else : ?>
                                <img src="<?= get_template_directory_uri(); ?>/assets/img/サンプル.jpg" alt="サムネなし">
                            <?php endif; ?>
                        </div>
                        <!-- 作品タイトル -->
                        <div>
                            <h3 class="pf-p-works__itemTitle"><?php the_title(); ?></h3>
                            <!-- 作品概要 -->
                            <p class="pf-p-works__itemText">
                                <?php if (get_field('description')) : ?>
                                    <?php the_field('description'); ?>
                                <?php else : ?>
                                    制作物の簡単な説明文が入ります。
                                <?php endif; ?>
                            </p>
                        </div>
                    </a>
                </article>
            <?php
                endwhile;
            else :
            ?>
                <div class="pf-p-works__empty">
                    <p>制作物が見つかりませんでした。</p>
                    <a href="<?= get_post_type_archive_link('works'); ?>" class="pf-c-btn">すべての制作物を見る</a>
                </div>
            <?php endif; ?>
            </div>

            <!-- ページネーション -->
            <?php
            // 現在のクエリの投稿数を取得
            $current_posts_count = $wp_query->post_count;
            $total_posts = $wp_query->found_posts;

            // 9個以上の投稿がある場合のみページネーションを表示
            if ($total_posts > 9) :
            ?>
            <div class="pf-p-pagination">
                <?php
                the_posts_pagination(array(
                    'prev_text' => '← 前へ',
                    'next_text' => '次へ →',
                    'type' => 'list',
                ));
                ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>