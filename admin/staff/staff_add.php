<?php
header('X-FRAME-OPTIONS:DENY');

session_start();
session_regenerate_id(true);

define('TITLE', 'スタッフ新規登録');

if (isset($_SESSION['login']) === false) {
  header('Location: /admin/login/staff_login.php');
  exit();
} else {
  $login_staff_name = $_SESSION['staff_name'];
}

require_once (dirname(__FILE__) . '/../assets/_inc/head.php');
require_once (dirname(__FILE__) . '/../assets/_inc/header.php');

?>

<main class="main">
  <div class="section-container">
    <section class="staff-add">
      <h1 class="level1-heading">スタッフ新規登録</h1>
      <p class="login-name login-name__border_bottom"><?= $login_staff_name; ?>さん ログイン中</p>
      <form class="staff-add-form" method="post" action="staff_add_check.php">

        <div class="text-box">
          <label class="text-box__label" for="name">スタッフ名</label>
          <input id="name" class="text-box__input" type="text" name="name">
        </div>

        <div class="text-box">
          <label  class="text-box__label" for="pass">パスワード</label>
          <input id="pass" class="text-box__input" type="password" name="pass">
        </div>

        <div class="text-box">
          <label  class="text-box__label" for="pass2">パスワードを再入力する</label>
          <input id="pass2" class="text-box__input" type="password" name="pass2">
        </div>

        <div class="page-transition-btns">
          <input class="btn btn--medium btn--green btn--link_green" type="submit" value="入力内容を確認する">
          <input class="btn btn--small btn--transparent btn--link_transparent" type="button" onclick="history.back()" value="戻る">
        </div>
      </form>
    </section>
  </div>
</main>
</body>
</html>
