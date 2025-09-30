<?php
/**
 * Template Name: Cat Keyboard Page
 */
get_header();
?>

<main id="primary" class="site-main">
  <!-- ページタイトル（背景画像は .pf-c-pageTitle に適用済み） -->
  <div class="pf-c-pageTitle">
    <h2 class="pf-c-pageTitlejp">おまけ</h2>
    <span class="pf-c-pageTitleen">Omake</span>
  </div>

  <section class="l-container">
    <h3>🐾 あなたの愛猫が何かを伝えています…</h3>
    <p>お猫様の足跡がメッセージに変換されます。</p>

    <div class="output" id="output"></div>
    <div class="message" id="message"></div>
  </section>
</main>

<?php get_footer(); ?>