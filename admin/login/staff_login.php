<?php
define('TITLE', 'ログイン画面');

require_once (dirname(__FILE__) . '/../assets/_inc/head.php');
?>
<main class="main">
  <div class="section-container">
    <section class="login">
      <h1><img src="/admin/assets/img/logo.png" alt=""></h1>
      <form class="login-form" method="post" action="/admin/login/staff_login_check.php">

        <div class="text-box">
          <label class="text-box__label" for="code">スタッフコード</label>
          <input id="code" class="text-box__input" type="text" name="code">
        </div>

        <div class="text-box">
          <label  class="text-box__label" for="pass">パスワード</label>
          <input id="pass" class="text-box__input" type="password" name="pass">
        </div>

        <div class="submit">
          <input class="btn btn--large btn--orange btn--link_orange" type="submit" value="ログイン">
        </div>
      </form>
    </section>
  </div>
</main>

</body>
</html>