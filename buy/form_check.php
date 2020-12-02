<?php

session_start();
session_regenerate_id(true);
require_once(dirname(__FILE__) . '/../assets/functions/common.php');


define("title", "入力内容確認 | チーズワゴン 自家製モッツァレラチーズと世界の厳選チーズ");


?>

<?php include(dirname(__FILE__).'/../assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/../assets/_inc/_header.php'); ?>

  <main>
    <section class="form-check">
      <div class="section-inner">
        <div class="registration-steps">
          <div class="registration-steps_step">
            <div class="num">1</div>
            <div class="text">ユーザー情報入力</div>
          </div>
          <div class="registration-steps_line"></div>
          <div class="registration-steps_step -active">
            <div class="num">2</div>
            <div class="text">ご注文内容確認</div>
          </div>
          <div class="registration-steps_line"></div>
          <div class="registration-steps_step">
            <div class="num">3</div>
            <div class="text">ユーザー登録完了</div>
          </div>
        </div>
        <dl class="user-check-list">
          <dt class="user-check-list__title">お名前</dt>
          <dd class="user-check-list__data">橋本浩二</dd>
          <dt class="user-check-list__title">メールアドレス</dt>
          <dd class="user-check-list__data">apple@apple.jp</dd>
          <dt class="user-check-list__title">郵便番号</dt>
          <dd class="user-check-list__data">345-6367</dd>
          <dt class="user-check-list__title">住所</dt>
          <dd class="user-check-list__data">千葉県千葉市佐伯区美鈴が丘西2-54-6</dd>
          <dt class="user-check-list__title">電話番号</dt>
          <dd class="user-check-list__data">080-6854-5678</dd>
        </dl>
        <ul class="cart__list">
          <li class="cart-item">
            <p class="cart-item__image"><img src="/assets/image/product-picture/item-sample01@2x.jpg" alt=""></p>
            <p class="cart-item__title">モッツァレラと厳選チーズのセット</p>
            <div class="cart-item__kazu">2個</div>
            <p class="cart-item__price">¥ 3,600</p>
          </li>
          <li class="cart-item">
            <p class="cart-item__image"><img src="/assets/image/product-picture/item-sample04@2x.jpg" alt=""></p>
            <p class="cart-item__title">モッツァレラと厳選チーズのセット</p>
            <div class="cart-item__kazu">3個</div>
            <p class="cart-item__price">¥ 3,600</p>
          </li>
        </ul>
        <div class="cart__footer">
          <p class="cart__sum">合計 5,500円</p>
        </div>
        <form action="" method="post">
          <div class="form__btns">
            <button class="btn btn--ok">次へ/支払い情報の入力</button>
            <a class="btn btn--back" href="/buy/form.php">戻る/入力内容を訂正する</a>
          </div>
        </form>
      </div>
    </section>
  </main>

<?php include(dirname(__FILE__).'/../assets/_inc/_footer.php'); ?>
