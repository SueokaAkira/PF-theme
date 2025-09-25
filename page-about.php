<?php get_header(); ?>

    <main>
        <!-- キービジュアル -->
        <section class="pf-l-about__KV">
            <!-- タイトル -->
            <div class="pf-c-pageTitle">
                <h2 class="pf-c-pageTitlejp">
                    -About-
                </h2>
                <span class="pf-c-pageTitleen">
                    <?php the_slug(); ?>
                </span>
            </div>
            <div class="pf-p-about__imgContainer">
                <div class="KV_slick-slider">
                    <div class="pf-p-about_slide">
                        <img src="<?= get_template_directory_uri(); ?>/assets/img/shimonoseki_self.png" alt="自分の画像">
                    </div>
                    <div class="pf-p-about_slide">
                        <img src="<?= get_template_directory_uri(); ?>/assets/img/sup_self.png" alt="サップの画像">
                    </div>
                    <div class="pf-p-about_slide">
                        <img src="<?= get_template_directory_uri(); ?>/assets/img/live_self.png" alt="ライブの画像">
                    </div>
                </div>
            </div>
        </section>
        <!-- 導入文章 -->
        <div class="pf-p-introtext">
            <p>
                こちらでは、私の興味関心や経歴、キャリア志向について、知っていただければ幸いです。
            </p>
            <strong>
                以下のボタンをクリックまたは、セクションをスライドして、各コンテンツをご覧いただけると幸いです！
            </strong>
        </div>
        <!-- ページ内リンクボタンナブ -->
        <nav id ="navMenu" class="pf-p-about__navMenu">
                <!-- ↓CLICK↓ -->
                <div class="pf-clickcontainer-gray">
                    <strong class="pf-clickanounce">
                        ↓下のボタンクリックで各内容をご覧ください!↓
                    </strong>
                </div>
            <ul class="pf-p-about__navMenuList">
                <li class="pf-p-about__navMenuListItem grid1">
                    <button data-target="profile">
                        <p>自己紹介</p>
                        <span>profile</span>
                    </button>
                    <ul class="profile-list">
                        <li>
                            概略<span>-profile-</span>
                        </li>
                        <li>
                            好き<span>-like-</span>
                        </li>
                        <li>
                            趣味<span>-hobby-</span>
                        </li>
                    </ul>
                </li>
                <li class="pf-p-about__navMenuListItem grid2">
                    <button data-target="skill">
                        <p>スキル</p>
                        <span>skill</span>
                    </button>
                    <ul class="skill-list">
                        <li>
                            強み<span>-skill-</span>
                        </li>
                        <li>
                            使用ツール<span>-tools-</span>
                        </li>
                        <li>
                            その他
                            <span>-others-</span>
                        </li>
                    </ul>
                </li>
                <li class="pf-p-about__navMenuListItem grid3">
                    <button data-target="career">
                        <p>キャリア</p>
                        <span>-career-</span>
                    </button>
                    <ul class="career-list">
                        <li>
                            経歴<span>-career-</span>
                        </li>
                        <li>
                            志望理由<span>-reason-</span>
                        </li>
                        <li>
                            展望先<span>-vision-</span>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- セクション内容 -->
        <div class="pf-p-about__content">

            <!-- 自己紹介セクション -->
            <section id="profile" class="pf-p-about__profile">
                <!-- セクションタイトル：自己紹介 -->
                <hgroup class="pf-c-sectTitle pf-c-sectTitle--each">
                    <h2 class="pf-c-sectTitle__jp ">
                        自己紹介
                    </h2>
                    <p class="pf-c-sectTitle__en">
                        profile
                    </p>
                </hgroup>
                <!-- 概略 -->
                <article class="pf-p-subsection-profileProfile">
                    <!-- サブ見出し：概略 -->
                    <hgroup class="pf-c-subsectionTitle">
                        <h3 class="pf-c-subsection_titleJp">概略</h3>
                        <span class="pf-c-subsection_titleEn">-profile-</span>
                    </hgroup>
                    <div class="pf-p-about__subsectionflex">
                        <img src="<?= get_template_directory_uri(); ?>/assets/img/about-tokyo.png" alt="東京駅の画像">
                        <p>
                            1988年生まれ。長崎県出身東京都在住。<br>
                            座右の銘は「行雲流水」と「外柔内剛」。<br>
                            愛媛大学大学院方文学研究科修士課程修了。<br>
                            大学院を卒業後、地元長崎県へと戻り、公務員として勤務。<br>
                            転職を機に上京し、法務職等の経験を経て、現在はWEBデザインについて勉強中。<br>
                            ユーザビリティや業務効率化といった分野に関心があります。
                        </p>
                    </div>
                </article>
                <!-- 好き -->
                <article class="pf-p-subsection-profileLike">
                    <!-- サブ見出し：好き -->
                    <hgroup class="pf-c-subsectionTitle">
                        <h3 class="pf-c-subsection_titleJp">好き</h3>
                        <span class="pf-c-subsection_titleEn">-like-</span>
                    </hgroup>
                    <div class="pf-p-about__subsectionflex">
                        <div class="slider-1col like_slick-slider">
                            <div>
                                <img src="<?= get_template_directory_uri(); ?>/assets/img/about-spa.png" alt="川の画像"></div>
                            <div><img src="<?= get_template_directory_uri(); ?>/assets/img/えいと.png" alt="猫の画像"></div>
                            <div><img src="<?= get_template_directory_uri(); ?>/assets/img/てぃる.png" alt="犬の画像"></div>
                        </div>
                        <dl class="like_textContent">
                            <dt>・犬、猫、動物</dt>
                            <dd>いつかお迎えすることが目標です。</dd>
                            <dt>・音楽</dt>
                            <dd>学生時代にやっていたクラシックやJpopのバンド、PentHouseさんやsumikaさんが好きです。</dd>
                            <dt>・温泉、サウナ</dt>
                            <dd>のんびり過ごすのが好きなので、よりよい「ととのい」を求めて色々なところに足を運んでいます。群馬県の法師温泉に行くのが目標です。</dd>
                        </dl>
                    </div>
                </article>
                <!-- 趣味 -->
                <article class="pf-p-subsection-profileHobby">
                    <!-- サブ見出し：趣味 -->
                    <hgroup class="pf-c-subsectionTitle">
                        <h3 class="pf-c-subsection_titleJp">趣味</h3>
                        <span class="pf-c-subsection_titleEn">-hobby-</span>
                    </hgroup>
                    <dl class="pf-p__about__hobbygrid">
                        <div>
                            <dt>トランペット</dt>
                            <dd>小学校からやっており、たまにカラオケで吹いています。</dd>
                        </div>
                        <div>
                            <dt>グルメ
                            </dt>
                            <dd>都内を中心に美味しいところを探しています。</dd>
                        </div>
                        <div>
                            <dt>温泉</dt>
                            <dd>近隣のスポットを巡っています。</dd>
                        </div>
                        <div>
                            <dt>カラオケ</dt>
                            <dd>ストレス発散に利用しています。</dd>
                        </div>
                        <div>
                            <dt>ゲーム</dt>
                            <dd>運動不足解消を兼ねて歩くゲームにハマっています。</dd>
                        </div>
                        <div>
                            <dt>脱出ゲーム</dt>
                            <dd>謎解きや周りの人と考えることが好きです。</dd>
                        </div>
                        <div>
                            <dt>SUP</dt>
                            <dd>ゆったりできるアクティビティなので好きです。
                        </div>
                        </dd>
                        <div>
                            <dt>釣り</dt>
                            <dd>電車で行けるところを探しています。</dd>
                        </div>
                    </dl>
                </article>
            </section>

            <!-- スキルセクション -->
            <section id="skill" class="pf-p-about__skill">
                <!-- セクションタイトル：スキル -->
                <hgroup class="pf-c-sectTitle pf-c-sectTitle--each">
                    <h2 class="pf-c-sectTitle__jp ">
                        スキル
                    </h2>
                    <p class="pf-c-sectTitle__en">
                        skill
                    </p>
                </hgroup>
                <!-- 強み -->
                <article class="pf-p-subsection-profileStrength">
                    <!-- サブ見出し：強み -->
                    <hgroup class="pf-c-subsectionTitle">
                        <h3 class="pf-c-subsection_titleJp">強み</h3>
                        <span class="pf-c-subsection_titleEn">-strength-</span>
                    </hgroup>

                    <div class="strength_3col">
                        <dl>
                            <dt>共感と傾聴</dt>
                            <dd>
                                お話をする方の心理的安全性を担保できるよう穏やかで笑顔でいることをモットーにしています。<br>
                                業務にあたっても、お相手の言葉にしたい部分、言葉にならない部分から、お気持ちを汲み取って共通認識を作り上げていきたいと考えます。
                            </dd>
                        </dl>
                        <dl>
                            <dt>探究心と誠実さ</dt>
                            <dd>
                                Webデザインの学習を通して、この分野そのものへの関心は勿論のこと、学習する楽しさを再発見することができたと感じています。<br>
                                経験の少ない分野ではありますが、直向きに業務に取り組み新しい知識を経て精進したいと考えております。
                            </dd>
                        </dl>
                        <dl>
                            <dt>経験と想像</dt>
                            <dd>
                                Webデザインという分野との向き合い方について、これまで経験してきた職種や業種といった視点と実際に利用する方、実装に関わる色々な方の利便性や効率性を想像する視点の両方を心がけて、デザインすることを大事にしたいと考えております。
                            </dd>
                        </dl>
                    </div>
                </article>
                <!-- 使用ツール -->
                <article class="pf-p-subsection-profileTools">
                    <!-- サブ見出し：使用ツール -->
                    <hgroup class="pf-c-subsectionTitle">
                        <h3 class="pf-c-subsection_titleJp">ツール</h3>
                        <span class="pf-c-subsection_titleEn">-tools-</span>
                    </hgroup>
                    <div class="iconbox">
                        <ul>
                            <li><img src="<?= get_template_directory_uri(); ?>/assets/img/figma.png" alt="figma"></li>
                            <li><img src="<?= get_template_directory_uri(); ?>/assets/img/illustrator.png" alt="illustrator"></li>
                            <li><img src="<?= get_template_directory_uri(); ?>/assets/img/photoshop.png" alt="photoshop"></li>
                            <li><img src="<?= get_template_directory_uri(); ?>/assets/img/vscode.png" alt="vscode"></li>
                            <li><img src="<?= get_template_directory_uri(); ?>/assets/img/php.png" alt="php"></li>
                            <li><img src="<?= get_template_directory_uri(); ?>/assets/img/javascript.png" alt="javascript"></li>
                            <li><img src="<?= get_template_directory_uri(); ?>/assets/img/wordpress.png" alt="wordpress"></li>
                        </ul>
                    </div>
                </article>
                <!-- その他 -->
                <article class="pf-p-subsection-profileOthers">
                    <!-- サブ見出し：その他 -->
                    <hgroup class="pf-c-subsectionTitle">
                        <h3 class="pf-c-subsection_titleJp">その他</h3>
                        <span class="pf-c-subsection_titleEn">-others-</span>
                    </hgroup>
                    <div class="iconbox">
                        <ul>
                            <li><img src="<?= get_template_directory_uri(); ?>/assets/img/ITパスポート.png" alt="ITパスポート"></li>
                            <li><img src="<?= get_template_directory_uri(); ?>/assets/img/ビジネスコンプライアンス®検定　上級　(2024年度)_image 1.png" alt="ビジネスコンプライアンス検定上級"></li>
                            <li><img src="<?= get_template_directory_uri(); ?>/assets/img/TOEIC.png" alt="TOEIC570点"></li>
                        </ul>
                    </div>
                </article>
            </section>

            <!-- キャリアセクション -->
            <section id="career" class="pf-p-about__career">
                <!-- セクションタイトル：キャリア -->
                <hgroup class="pf-c-sectTitle pf-c-sectTitle--each">
                    <h2 class="pf-c-sectTitle__jp ">
                        キャリア
                    </h2>
                    <p class="pf-c-sectTitle__en">
                        career
                    </p>
                </hgroup>
                <article class="pf-p-subsection-profileHistory">
                    <!-- サブ見出し：経歴 -->
                    <hgroup class="pf-c-subsectionTitle">
                        <h3 class="pf-c-subsection_titleJp">経歴</h3>
                        <span class="pf-c-subsection_titleEn">-history-</span>
                    </hgroup>

                    <div class="history_2col">
                        <dl>
                            <dt>2011.4~</dt>
                            <dd>愛媛大学大学院法文学研究科にて、日本法制史についての研究。</dd>
                            <dt>2014.4~</dt>
                            <dd>長崎県市町村総合事務組合へ入局し、総務職を経て職員研修や地域振興施策に関わる業務に従事。</dd>
                            <dt>2018.9~</dt>
                            <dd>
                                上京。株式会社マリアージュフレールにて、接客業を経験しコミュニケーション力の向上を図り、その後事務職への転職を経て総務・法務職に従事。
                            </dd>
                            <dt>2025.4~</dt>
                            <dd>
                                インタープランITスクール新宿校 入校
                                WEBデザイン・マーケティング科にて関連知識について
                                鋭意、学習中。10月修了予定。
                            </dd>
                        </dl>
                        <img src="<?= get_template_directory_uri(); ?>/assets/img/経歴用KV.webp" alt="猫の足跡画像">
                    </div>
                </article>
                <!-- 志望理由 -->
                <article class="pf-p-subsection-profileReason">
                    <!-- サブ見出し：志望理由 -->
                    <hgroup class="pf-c-subsectionTitle">
                        <h3 class="pf-c-subsection_titleJp">志望理由</h3>
                        <span class="pf-c-subsection_titleEn">-reason-</span>
                    </hgroup>
                    <div class="reason_textcontent">
                        <p>まず、眼に見える形でのスキルを身につけていきたいと考えました。</p>
                        <p>また、自身の適正として、瞬発力が求められる意思決定よりも、熟考して道筋を定めていく業務に携わりたいと思うようになり、これまでの業務を通じて、利便性や業務効率の向上にIT・WEB分野から携わってみたいと考えるようになりました。</p>
                        <p>現在は自分の描いた抽象イメージを論理やコードを用いて具体に昇華する過程に面白さを感じています。</p>
                        <p>コードやデザインを通して、人の意思を形にできること、学んだ知識が業務に直結するところに面白さがあると感じており、自分や誰かのやりたいを叶えることのできる業務ができたらと考えております。</p>
                    </div>
                </article>
                <!-- 展望 -->
                <article class="pf-p-subsection-profileVision">
                    <!-- サブ見出し：展望 -->
                    <hgroup class="pf-c-subsectionTitle">
                        <h3 class="pf-c-subsection_titleJp">展望</h3>
                        <span class="pf-c-subsection_titleEn">-vision-</span>
                    </hgroup>
                    <div class="vision_textcontent">
                        <p>未経験の分野ではありますが、やりたいことを実現できる知識習得のための学習に励み、日々精進していきたいと考えています。</p>
                        <p>また、人との関わりという点においては、職場でもクライアントとの関係でも、お相手に寄り添ったコミュニケーションを心がけ、お互いが意思表示を円滑に行うことのできる関係を構築することが、より良い成果の実現につながると考えますので、温和と誠実を心がけていきたいと考えております。</p>
                        <p>
                            まずは担当する業務について実直に取り組み、現場に慣れることを目指します。<br>
                            将来的には工程の全体を俯瞰して実作業とマネジメントを行えるような人材になること、業務効率化やUI,UXデザインに携わることができる業務に従事することを目指します。
                        </p>
                        <strong>
                            お忙しい中、ここまでご一読いただき、誠にありがとうございます。<br>
                            ご興味を持っていただけましたら、ぜひご一考のほどよろしく願いいたします！
                        </strong>
                    </div>
                </article>
            </section>
        </div>
    </main>

<?= get_footer(); ?>