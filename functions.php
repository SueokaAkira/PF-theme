<?php
/**
 * <title>タグを出力する
 */
add_theme_support('title-tag');

/**
 * フィルターフックを使い、区切り文字を変更する
 * add_filter($tag:フックするフィルター名、$function_to_add:フィルターが適用された時に呼び出される関数、$priority:優先度、$accepted_args:引数の数);
 */
add_filter('document_title_separator', 'my_document_title_separator');
function my_document_title_separator($separator)
{
  $separator = '|';
  return $separator;
}

/**
 * アイキャッチ画像の有効化
 */
add_theme_support('post-thumbnails');

/**
 * the_slugを使用可能にする
 */
function the_slug() {
    echo esc_html( get_post_field( 'post_name', get_the_ID() ) );
}


/**
 * 制作物投稿タイプを追加
 */
function create_post_type_work() {
    register_post_type(
        'works',
        array(
            'labels' => array(
                'name' => '制作物',
                'singular_name' => '制作物'
            ),
            'public' => true,
            'has_archive' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-portfolio',
            'supports' => array( 'title',
            'editor',
            'thumbnail',
            'taxonomies' => array('post_tag'), // ← ここでタグを有効化
            'custom-fields'),
            'show_in_rest' => true,
            'show_in_menu' => true,
        )
    );
}
add_action( 'init', 'create_post_type_work' );

// ツール 投稿タイプを追加
function create_post_type_tools() {
  register_post_type( 'tool',
    array(
      'labels' => array(
        'name' => 'ツール',
        'singular_name' => 'ツール'
      ),
      'public' => true,
      'has_archive' => false,
      'menu_position' => 5,
      'supports' => array(
        'title',
        'custom-fields',
        'thumbnail')
    )
  );
}
add_action( 'init', 'create_post_type_tools' );


/**
 * 制作物カテゴリを追加
 */
function create_taxonomy_works_category() {
    register_taxonomy(
        'works_category',
        'works',
        array(
            'labels' => array(
                'name' => '制作物カテゴリ',
                'singular_name' => '制作物カテゴリ'
            ),
            'hierarchical' => true, // 階層あり（カテゴリ形式）
            'show_in_rest' => true,
        )
    );
}
add_action( 'init', 'create_taxonomy_works_category' );

/**
 * CSSとJSファイルのエンキュー
 */
function pf_theme_scripts() {
    // メインCSSファイル
    wp_enqueue_style('pf-main-style', get_template_directory_uri() . '/assets/css/app.css', array(), pf_file_version('/assets/css/app.css'));

    // Slick CSS
    wp_enqueue_style('pf-slick-style', get_template_directory_uri() . '/assets/css/slick.css', array('pf-main-style'), pf_file_version('/assets/css/slick.css'));
    wp_enqueue_style('pf-slick-theme-style', get_template_directory_uri() . '/assets/css/slick-theme.css', array('pf-slick-style'), pf_file_version('/assets/css/slick-theme.css'));

    // Google Fonts
    wp_enqueue_style('pf-google-fonts', 'https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&family=Patrick+Hand&family=Sawarabi+Gothic&display=swap', array(), null);

    // メインJavaScript
    wp_enqueue_script('jquery');
    wp_enqueue_script('pf-slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), pf_file_version('/assets/js/slick.min.js'), true);
    wp_enqueue_script('pf-main-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), pf_file_version('/assets/js/script.js'), true);

    // WordPressのjQueryを確実に読み込む
    wp_script_add_data('jquery', 'group', 0);
}
add_action('wp_enqueue_scripts', 'pf_theme_scripts');

/**
 * Aboutページ専用のJavaScript読み込み
 */
function pf_about_scripts() {
    if (is_page('about') || is_page_template('page-about.php') || is_page(get_page_by_path('about'))) {
        wp_enqueue_script('pf-about-script', get_template_directory_uri() . '/assets/js/about.js', array('jquery', 'pf-slick'), pf_file_version('/assets/js/about.js'), true);
    }
}
add_action('wp_enqueue_scripts', 'pf_about_scripts');

/**
 * Worksアーカイブページ専用のJavaScript読み込み
 */
function pf_works_archive_scripts() {
    if (is_post_type_archive('works') || is_tax('works_category')) {
        wp_enqueue_script('pf-works-filter', get_template_directory_uri() . '/assets/js/works-filter.js', array('jquery'), pf_file_version('/assets/js/works-filter.js'), true);
    }
}
add_action('wp_enqueue_scripts', 'pf_works_archive_scripts');

/**
 * Single Worksページ専用のJavaScript読み込み
 */
function pf_single_works_scripts() {
    if (is_singular('works')) {
        wp_enqueue_script('pf-detail', get_template_directory_uri() . '/assets/js/detail.js', array('jquery', 'pf-slick'), pf_file_version('/assets/js/detail.js'), true);
    }
}
add_action('wp_enqueue_scripts', 'pf_single_works_scripts');

/**
 * キャッシュバスティング用のバージョン管理
 */
function pf_theme_version() {
    return '1.0.3';
}

/**
 * ファイルの更新時刻をバージョンとして使用
 */
function pf_file_version($file_path) {
    $full_path = get_template_directory() . $file_path;
    if (file_exists($full_path)) {
        return filemtime($full_path);
    }
    return '1.0.0';
}

/**
 * 制作物アーカイブページの設定
 */
function pf_works_archive_query($query) {
    if (!is_admin() && $query->is_main_query()) {
        if (is_post_type_archive('works') || is_tax('works_category')) {
            $query->set('posts_per_page', 9);
        }
    }
}
add_action('pre_get_posts', 'pf_works_archive_query');

/**
 * フロントページで表示する制作物を取得
 */
function get_featured_works($limit = 3) {
    // カスタムフィールドで選択された制作物を取得
    $featured_work_ids = get_option('featured_works', array());

    if (!empty($featured_work_ids)) {
        // 選択された制作物がある場合
        $args = array(
            'post_type' => 'works',
            'post__in' => $featured_work_ids,
            'posts_per_page' => $limit,
            'post_status' => 'publish',
            'orderby' => 'post__in'
        );
    } else {
        // 選択された制作物がない場合は最新の制作物を取得
        $args = array(
            'post_type' => 'works',
            'posts_per_page' => $limit,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC'
        );
    }

    return new WP_Query($args);
}

/**
 * フロントページ設定のメタボックスを追加
 */
function add_front_page_meta_boxes() {
    add_meta_box(
        'front_page_settings',
        'フロントページ設定',
        'front_page_meta_box_callback',
        'page',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_front_page_meta_boxes');

/**
 * フロントページ設定のメタボックスコールバック
 */
function front_page_meta_box_callback($post) {
    // フロントページのみ表示
    if (get_option('page_on_front') != $post->ID) {
        echo '<p>この設定はフロントページでのみ有効です。</p>';
        return;
    }

    wp_nonce_field('front_page_meta_box', 'front_page_meta_box_nonce');

    // 現在選択されている制作物を取得
    $featured_work_ids = get_option('featured_works', array());

    // 全制作物を取得
    $all_works = get_posts(array(
        'post_type' => 'works',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    ));
    ?>
    <table class="form-table">
        <tr>
            <th><label for="featured_works">表示する制作物を選択（最大3つ）</label></th>
            <td>
                <select name="featured_works[]" id="featured_works" multiple size="10" style="width: 100%;">
                    <?php foreach ($all_works as $work) : ?>
                        <option value="<?= $work->ID; ?>" <?= in_array($work->ID, $featured_work_ids) ? 'selected' : ''; ?>>
                            <?= esc_html($work->post_title); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <p class="description">Ctrlキー（MacではCmdキー）を押しながらクリックして複数選択できます。</p>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * フロントページ設定の保存処理
 */
function save_front_page_meta_box($post_id) {
    // フロントページ以外は処理しない
    if (get_option('page_on_front') != $post_id) {
        return;
    }

    // nonceフィールドの検証
    if (!isset($_POST['front_page_meta_box_nonce']) || !wp_verify_nonce($_POST['front_page_meta_box_nonce'], 'front_page_meta_box')) {
        return;
    }

    // 自動保存の場合は処理しない
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // 権限チェック
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // 選択された制作物を保存（最大3つ）
    if (isset($_POST['featured_works'])) {
        $featured_works = array_slice($_POST['featured_works'], 0, 3);
        update_option('featured_works', $featured_works);
    } else {
        delete_option('featured_works');
    }
}
add_action('save_post', 'save_front_page_meta_box');

/**
 * テスト用カテゴリの自動生成
 */
function create_sample_works_categories() {
    // 既存のカテゴリをチェック
    $existing_categories = get_terms(array(
        'taxonomy' => 'works_category',
        'hide_empty' => false,
    ));

    // カテゴリが存在しない場合のみ作成
    if (empty($existing_categories) || is_wp_error($existing_categories)) {
        $sample_categories = array(
            'Webサイト' => 'Webサイト制作に関する作品',
            'アプリ' => 'アプリケーション開発に関する作品',
            'デザイン' => 'グラフィックデザインに関する作品',
        );

        foreach ($sample_categories as $name => $description) {
            wp_insert_term(
                $name,
                'works_category',
                array(
                    'description' => $description,
                    'slug' => sanitize_title($name),
                )
            );
        }
    }
}
add_action('init', 'create_sample_works_categories', 20);

/**
 * カスタムメニュー機能の実装　p105より
 */
add_theme_support('menus');

function add_tags_to_existing_works() {
    register_taxonomy_for_object_type('post_tag', 'works');
}
add_action('init', 'add_tags_to_existing_works');