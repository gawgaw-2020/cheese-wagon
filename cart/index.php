<?php

session_start();
session_regenerate_id(true);
require_once(dirname(__FILE__) . '/../assets/functions/common.php');

define("title", "ショッピングカート | チーズワゴン 自家製モッツァレラチーズと世界の厳選チーズ");

try {
  if (isset($_SESSION['cart']) === true) {
    $cart = $_SESSION['cart'];
    $kazu = $_SESSION['kazu'];
    $max = count($cart);
  } else {
    $max = 0;
  }


  require_once(dirname(__FILE__) . '/../assets/functions/dbconnect.php');

  foreach ($cart as $key => $val) {
    $sql = 'SELECT item_id, item_name, item_price, item_image_name FROM items WHERE item_id = ?';
    $stmt = $dbh->prepare($sql);
    $data[0] = $val;
    $stmt->execute($data);
  
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    $item_id[] = $rec['item_id'];
    $item_name[] = $rec['item_name'];
    $item_price[] = $rec['item_price'];
    $item_image_name[] = $rec['item_image_name'];
    
  }

  $dbh = null;

} catch(PDOException $e) {
  print $e->getMessage().'データベース接続エラー';
  exit();
}

?>

<?php include(dirname(__FILE__).'/../assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/../assets/_inc/_header.php'); ?>

  <main>
    <section class="cart">
      <div class="section-inner">
        <h1 id="js-products__heading" class="products__heading section-heading">ショッピングカート</h1>
        <?php if ($max === 0): ?>
        <p class="cart__error">お客様のカートに商品はありません</p>
        <?php else: ?>
        <form action="operationcart.php" method="post">
          <ul class="cart__list">
          <?php $result = 0; ?>
          <?php for ($i = 0; $i < $max; $i++): ?> 
          <?php $sum = $item_price[$i] * $kazu[$i]; ?>
          <?php $result += $sum; ?>
            <li class="cart-item">
              <p class="cart-item__image"><img src="/assets/image/item_img/<?= h($item_image_name[$i]); ?>" alt=""></p>
              <p class="cart-item__title"><a href="/products/product/index.php?item_id=<?= h($item_id[$i]); ?>"><?= h($item_name[$i]); ?></a></p>
              <div class="cart-item__kazu"><input type="text" name="kazu<?= $i; ?>" value="<?= $kazu[$i]; ?>">個</div>
              <p class="cart-item__price">¥ <?= h($sum); ?><br>（1個 ¥<?= h($item_price[$i]); ?>）</p>
              <div class="cart-item__delete"><label><input type="checkbox" name="sakujo<?= $i; ?>">削除</label></div>
            </li>
          <?php endfor; ?>
          </ul>
          <div class="cart__footer">
            <p class="cart__sum">合計 <?= number_format(h($result)); ?>円</p>
            <input type="hidden" name="max" value="<?= $max; ?>">
            <button type="submit" class="cart__operation btn btn--operationcart">チェックした商品を削除・数量を変更する</button>
          </div>
          <?php if (isset($_SESSION['user_login']) === true): ?>
            <a href="../buy/kantan_check.php" class="label label--price">【ログイン中の方はこちら】かんたん会計へ進む</a>
          <?php endif; ?>
          <div class="cart__btns">
            <a class="btn btn--ok" href="/buy/form.php">お会計へ進む</a>
            <a class="btn btn--back" href="/products/">商品一覧へ</a>
          </div>
        </form>
        <?php endif; ?>
      </div>
    </section>
  </main>

<?php include(dirname(__FILE__).'/../assets/_inc/_footer.php'); ?>
