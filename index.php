<?php

session_start();
define("title", "Cheese Wagon | チーズワゴン 自家製モッツァレラチーズと世界の厳選チーズ");

try {

  require_once(dirname(__FILE__) . '/assets/functions/dbconnect.php');

  $sql = 'SELECT * FROM items WHERE item_recommend = 1 LIMIT 6';
  $allRec = $dbh->query($sql);
  $allRec->execute();

  $recommendCheese = "";
  while( $rec = $allRec->fetch(PDO::FETCH_ASSOC)){ 
    $recommendCheese .= '<li class="topitem-card">';
    $recommendCheese .= '<p class="topitem-card__image"><img src="/assets/image/item_img/'. $rec['item_image_name'] .'" alt="" width="544" height="544"></p>';
    $recommendCheese .= '<h3 class="topitem-card__title">'. $rec['item_name'] .'</h3>';
    $recommendCheese .= '<p class="topitem-card__price label label--price">'. number_format($rec['item_price']) .' yen</p>';
    $recommendCheese .= '<a class="topitem-card__btn btn btn--detail" href="/products/product/index.php?item_id='. $rec['item_id'] .'">詳細</a>';
    $recommendCheese .= '</li>';
  }

  $sql = 'SELECT * FROM items WHERE item_new = 1 ORDER BY item_date LIMIT 3';
  $allRec = $dbh->query($sql);
  $allRec->execute();

  $newCheese = "";
  while( $rec = $allRec->fetch(PDO::FETCH_ASSOC)){ 
    $newCheese .= '<li class="new-item">';
    $newCheese .= '<a href="/products/product/index.php?item_id='. $rec['item_id'] .'">';
    $newCheese .= '<p class="new-item__image"><img src="/assets/image/item_img/'. $rec['item_image_name'] .'" alt="" width="320" height="320"></p>';
    $newCheese .= '<p class="new-item__label label label--price">'. $rec['item_name'] .'<br>'. number_format($rec['item_price']) .' yen</p>';
    $newCheese .= '</a>';
    $newCheese .= '</li>';
  }
  
  $dbh = null;
} catch (PDOException $e) {
  print 'データベース接続エラー';
  exit();
}



?>

<?php include(dirname(__FILE__).'/assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/assets/_inc/_header.php'); ?>

  <main>
    <section class="fv">
      <div class="fv__pic fv__pic--01"></div>
      <div class="fv__content-box">
        <div class="fv-box">
          <h2 class="fv-box__title">CHEESE DELIVERY</h2>
          <p class="fv-box__text">もっと身近に<br>チーズのある生活</p>
          <div class="fv-box__btns">
            <a class="fv-box__btn btn btn--ok" href="/products/">商品一覧</a>
            <a class="fv-box__btn btn btn--back" href="/products/product/">お試しセット</a>
          </div>
        </div>
      </div>
      <div class="fv__pic fv__pic--02"></div>
    </section>
    <section id="introduce" class="introduce">
      <div class="section-inner">
        <h2 id="js-introduce__heading" class="introduce__heading section-heading">チーズ工房から直送</h2>
        <div class="introduce__content">
          <div class="introduce-box">
            <p class="introduce-box__text">
              千葉県の美鈴が丘は穏やかな気候と酪農が盛んな事から「チーズの里」と呼ばれています。
              「出来立てのモッツァレラチーズと
              世界から厳選したチーズを食卓に届けたい。」
              こんな思いからCheese Wagon( チーズワゴン )は
              ２０２０年にスタートしました。</p>
            <p id="intro-box01" class="introduce-box__image" ><img src="/assets/image/common/intro01@2x.jpg" alt="" width="500" height="300"></p>
          </div>
        </div>
        <div class="introduce__content">
          <div class="introduce-box">
            <p class="introduce-box__text">
              モッツァレラチーズは新鮮な生乳を仕入れて毎朝製造。
              世界から厳選したチーズはオーナーが切り方やおすすめのレシピと共にお届けします。
              保存が効くチーズは普段使いに。簡単に提供できるチーズはお友達を呼んでパーティーにもぴったり。<br>
              あなたとチーズをもっと身近に。
            </p>
            <p id="intro-box02" class="introduce-box__image"><img src="/assets/image/common/intro02@2x.jpg" alt="" width="500" height="300"></p>
          </div>
        </div>
      </div>
    </section>
    <section class="part-of-item">
      <div class="section-inner">
        <h2 id="js-part-of-item__heading" class="part-of-item__heading section-heading">人気のチーズ</h2>
        <ul class="part-of-item__list">
          <?= $recommendCheese; ?>
        </ul>
        <a class="part-of-item__btn btn btn--ok" href="/products/">商品一覧を見る</a>
      </div>
    </section>
    <section class="member">
      <div class="section-inner">
        <h2 id="js-member__heading" class="member__heading section-heading">オーナー・チーズ職人</h2>
        <ul class="member__list">
          <li id="member01" class="profile-card anchor-sm">
            <p class="profile-card__tab-image"><img src="/assets/image/common/member01-tab@2x.jpg" alt="" width="316" height="662"></p>
            <p class="profile-card__pc-image"><img src="/assets/image/common/member01-pc@2x.jpg" alt="" width="444" height="662"></p>
            <div class="profile-card__contents">
              <p class="profile-card__position">Buyer / Owner</p>
              <h3 class="profile-card__name">Yui<br>Hashimoto</h3>
              <p class="profile-card__image"><img src="/assets/image/common/member01-sp@2x.jpg" alt="" width="375" height="132"></p>
              <p id="profile-card__text01" class="profile-card__text">
                レストラン勤務時代にチーズの魅力に取り憑かれた後、世界のチーズを求めて旅に出ました。<br>
                世界で出会ったチーズを日本の食卓に届けるためにチーズワゴンを立ち上げ、今日も世界のどこかでチーズを選んでいます。
              </p>
              <a class="profile-card__btn btn btn--detail" href="/products/product/">オーナーおすすめ商品</a>
            </div>
          </li>
          <li id="member02" class="profile-card anchor-sm">
            <p class="profile-card__tab-image"><img src="/assets/image/common/member02-tab@2x.jpg" alt="" width="316" height="662"></p>
            <p class="profile-card__pc-image"><img src="/assets/image/common/member02-pc@2x.jpg" alt="" width="444" height="662"></p>
            <div class="profile-card__contents">
              <p class="profile-card__position">Fromager</p>
              <h3 class="profile-card__name">Takuya<br>Ogawa</h3>
              <p class="profile-card__image"><img src="/assets/image/common/member02-sp@2x.jpg" alt="" width="375" height="132"></p>
              <p id="profile-card__text02" class="profile-card__text">
                チーズ職人養成学校「<a href="/ca/" target="_blank">チーズアカデミー</a>」を卒業後、オーナーと共にチーズ工房を併設するイタリアンレストランにて調理や接客を担当。<br>
                チーズワゴンでもモッツァレラチーズを製造。Webサイトも担当します。<br>
                好きな言葉は <a href="https://gawgaw-2020.github.io/html_css01-01/" target="_blank">”Always Ask “Why me ?”</a>
              </p>
              <a class="profile-card__btn btn btn--detail" href="/products/product/">職人おすすめ商品</a>
            </div>
          </li>
        </ul>
      </div>
    </section>
    <section class="strength">
      <div class="section-inner">
        <h2 id="js-strength__heading" class="strength__heading section-heading">チーズワゴンのこだわり</h2>
        <ul class="strength__list">
          <li class="strength-item">
            <p class="strength-item__image"><img src="/assets/image/common/strength-image01@2x.jpg" alt="" width="280" height="150"></p>
            <p class="test strength-item__text">地元の牧場から搾りたての牛乳を直接搬入して自家製のモッツァレラチーズを作ります。<br>
              シェフのおすすめレシピも同封しておりますので、ぜひお楽しみくださいませ。</p>
          </li>
          <li class="strength-item">
            <p class="strength-item__image"><img src="/assets/image/common/strength-image02@2x.jpg" alt="" width="280" height="150"></p>
            <p class="test strength-item__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus minus ipsum dolor quo ipsam sit at distinctio atque earum alias?</p>
          </li>
          <li class="strength-item">
            <p class="strength-item__image"><img src="/assets/image/common/strength-image03@2x.jpg" alt="" width="280" height="150"></p>
            <p class="test strength-item__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, expedita error, tempora repellat praesentium sapiente similique aut magnam modi odit fuga. Modi dicta consectetur quaerat, eaque voluptate sed tempore vel!</p>
          </li>
        </ul>
      </div>
    </section>
    <div class="parallax-window" data-parallax="scroll" data-image-src="/assets/image/common/kv-sp02@2x.jpg"></div>
    <section class="new">
      <div class="section-inner">
        <h2 id="js-new__heading" class="new__heading section-heading">新作商品</h2>
        <ul class="new__list">
          <?= $newCheese; ?>
          <!-- <li id="new-item01" class="new-item">
            <a href="/products/product/">
              <p class="new-item__image"><img src="/assets/image/product-picture/item-sample07@2x.jpg" alt="" width="320" height="320"></p>
              <p class="new-item__label label label--price">リコッタチーズと自家製いちぢくジャムのセット<br>1,800 yen</p>
            </a>
          </li>
          <li id="new-item03" class="new-item">
            <a href="/products/product/">
              <p class="new-item__image"><img src="/assets/image/product-picture/item-sample09@2x.jpg" alt="" width="320" height="320"></p>
              <p class="new-item__label label label--price">ウェディングチーズケーキ（オーダーメイド）<br>21,800 yen</p>
            </a>
          </li> -->
        </ul>
        <div class="new__btns">
          <a class="btn btn--ok" href="/products/">商品一覧を見る</a>
          <a class="btn btn--back" href="/products/product/">おためしセット</a>
        </div>
      </div>
    </section>
  </main>
  <?php include(dirname(__FILE__).'/assets/_inc/_footer.php'); ?>
