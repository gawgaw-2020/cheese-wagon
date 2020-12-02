<?php

session_start();
define("title", "ショッピングカート | チーズワゴン 自家製モッツァレラチーズと世界の厳選チーズ");


?>

<?php include(dirname(__FILE__).'/../assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/../assets/_inc/_header.php'); ?>

  <main>
    <section class="cart">
      <div class="section-inner">
        <h1 id="js-products__heading" class="products__heading section-heading">ショッピングカート</h1>
        <ul class="cart__list">
          <li class="cart-item">
            <p class="cart-item__image"><img src="/assets/image/product-picture/item-sample01@2x.jpg" alt=""></p>
            <p class="cart-item__title">モッツァレラと厳選チーズのセット</p>
            <div class="cart-item__kazu"><input type="text" name="kazu" value="">個</div>
            <p class="cart-item__price">¥ 3,600</p>
            <div class="cart-item__delete"><label><input type="checkbox" name="sakujo">削除</label></div>
          </li>
          <li class="cart-item">
            <p class="cart-item__image"><img src="/assets/image/product-picture/item-sample04@2x.jpg" alt=""></p>
            <p class="cart-item__title">モッツァレラと厳選チーズのセット</p>
            <div class="cart-item__kazu"><input type="text" name="kazu" value="">個</div>
            <p class="cart-item__price">¥ 3,600</p>
            <div class="cart-item__delete"><label><input type="checkbox" name="sakujo">削除</label></div>
          </li>
        </ul>
        <div class="cart__footer">
          <p class="cart__sum">合計 5,500円</p>
          <button class="cart__operation btn btn--operationcart">チェックした商品を削除・数量を変更する</button>
        </div>
        <div class="cart__btns">
          <a class="btn btn--ok" href="/buy/form.php">お会計へ進む</a>
          <a class="btn btn--back" href="/products/">商品一覧へ</a>
        </div>
      </div>
    </section>
  </main>

<?php include(dirname(__FILE__).'/../assets/_inc/_footer.php'); ?>
