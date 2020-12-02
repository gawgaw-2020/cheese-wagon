<?php

session_start();
session_regenerate_id(true);
require_once(dirname(__FILE__) . '/../assets/functions/common.php');


define("title", "商品一覧 | チーズワゴン 自家製モッツァレラチーズと世界の厳選チーズ");

try {

  require_once(dirname(__FILE__) . '/../assets/functions/dbconnect.php');

  $sql = 'SELECT * FROM items';
  $allRec = $dbh->query($sql);
  $allRec->execute();

  $allCheese = "";
  while( $rec = $allRec->fetch(PDO::FETCH_ASSOC)){ 
    $allCheese .= '<li class="product-card">';
    $allCheese .= '<p class="product-card__image"><img src="/assets/image/item_img/'. h($rec['item_image_name']) .'" alt="" width="320" height="320"></p>';
    $allCheese .= '<h2 class="product-card__title">'. h($rec['item_name']) .'</h2>';
    $allCheese .= '<p class="product-card__label label label--price">'. h(number_format($rec['item_price'])) .' yen</p>';
    $allCheese .= '<p class="product-card__text">'. h($rec['item_memo']) .'</p>';
    $allCheese .= '<a class="product-card__btn btn btn--detail" href="/products/product/index.php?item_id='. $rec['item_id'] .'">詳細を見る</a>';
    $allCheese .= '</li>';
  }
  
  $dbh = null;
} catch (PDOException $e) {
  print 'データベース接続エラー';
  exit();
}



?>

<?php include(dirname(__FILE__).'/../assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/../assets/_inc/_header.php'); ?>

  <main>
    <section class="products">
      <div class="section-inner">
        <h1 id="js-products__heading" class="products__heading section-heading">商品一覧</h1>
        <ul class="products__list">
          <?= $allCheese; ?>
        </ul>
      </div>
    </section>
  </main>
  <?php include(dirname(__FILE__).'/../assets/_inc/_footer.php'); ?>
