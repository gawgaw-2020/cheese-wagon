<?php

session_start();
session_regenerate_id(true);
require_once(dirname(__FILE__) . '/../assets/functions/common.php');


define("title", "会員ログイン | チーズワゴン 自家製モッツァレラチーズと世界の厳選チーズ");


?>

<?php include(dirname(__FILE__).'/../assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/../assets/_inc/_header.php'); ?>

  <main class="login-background">
    <section class="login">
      <div class="section-inner">
        <form class="login-form">
          <p class="login-form__title">ログイン</p>
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_email">メールアドレス</label>
            <input id="js-input-user_email" class="input-box__input" type="email" name="user_email" value="" autofocus >
          </div>
          
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_password">パスワード</label>
            <input class="field js-password input-box__input" id="js-input-user_password" type="password" name="user_password" value="" autocomplete="off" required="required">
            <div class="show-btn">
              <input class="btn-input js-password-toggle" id="eye" type="checkbox">
              <label class="btn-label js-password-label" for="eye"><i class="far fa-eye"></i></label>
            </div>
          </div>

          <p class="login-form__text text-c">パスワードをお忘れの方は<a href="#" style="color:blue;">こちら</a></p>

          <div class="submit">
            <input class="btn btn--ok" type="submit" value="ログイン">
          </div>

        </form>
        
      </div>
    </section>
  </main>

<?php include(dirname(__FILE__).'/../assets/_inc/_footer.php'); ?>
