<?php

session_start();
define("title", "お客様情報入力 | チーズワゴン 自家製モッツァレラチーズと世界の厳選チーズ");


?>

<?php include(dirname(__FILE__).'/../assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/../assets/_inc/_header.php'); ?>

  <main>
    <section class="form">
      <div class="section-inner">
        <div class="registration-steps">
          <div class="registration-steps_step -active">
            <div class="num">1</div>
            <div class="text">ユーザー情報入力</div>
          </div>
          <div class="registration-steps_line"></div>
          <div class="registration-steps_step">
            <div class="num">2</div>
            <div class="text">ご注文内容確認</div>
          </div>
          <div class="registration-steps_line"></div>
          <div class="registration-steps_step">
            <div class="num">3</div>
            <div class="text">ユーザー登録完了</div>
          </div>
        </div>
        <form action="/buy/form_check.php" method="post">
          <p class="form-title label label--price">お客様情報の入力</p>
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_name">お名前<span class="required">※必須</span></label>
            <input id="js-input-user_name" class="input-box__input" type="text" name="user_name" value="" autofocus >
          </div>
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_email">メールアドレス<span class="required">※必須</span></label>
            <input id="js-input-user_email" class="input-box__input" type="email" name="user_email" value="">
          </div>
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_postal">郵便番号<span class="required">※必須</span></label>
            <input id="js-input-user_postal" class="postal1 input-box__input" type="text" name="postal1" value="">-
            <input class="postal2 input-box__input" type="text" name="postal2" value="">
          </div>
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_address">住所<span class="required">※必須</span></label>
            <input id="js-input-user_address" class="input-box__input" type="text" name="user_address" value="">
          </div>
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_tel">電話番号<span class="required">※必須</span></label>
            <input id="js-input-user_tel" class="input-box__input" type="text" name="user_tel" value="">
          </div>
          <div class="radio-box">
            <p class="radio-box__label">注文区分<span class="required">※必須</span></p>
            <div class="radio-box__item">
              <input class="radio-box__radio" type="radio" id="wifi1" name="wifi" value="有り">
              <label for="wifi1">今回だけの注文</label>
            </div>
            <div class="radio-box__item">
              <input class="radio-box__radio" type="radio" id="wifi2" name="wifi" value="無し">
              <label for="wifi2">会員登録して注文</label>
            </div>
            <p>会員登録して注文すると、次回からお客様情報の入力を省く事ができます</p>
          </div>
          <p class="form-title label label--price">会員登録する方はパスワードを設定してください</p>
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_password">パスワード</label>
            <input class="input-box__input" id="js-input-user_password" type="password" name="user_password" value="" autocomplete="off">
          </div>
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_password2">パスワード【確認用】</label>
            <input class="input-box__input" id="js-input-user_password2" type="password" name="user_password2" value="" autocomplete="off">
          </div>
          <div class="form__btns">
            <button class="btn btn--ok">入力内容を確認する</button>
            <a class="btn btn--back" href="/cart/">カートへ戻る</a>
          </div>
        </form>
      </div>
    </section>
  </main>

<?php include(dirname(__FILE__).'/../assets/_inc/_footer.php'); ?>
