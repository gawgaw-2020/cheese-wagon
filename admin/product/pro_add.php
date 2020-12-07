<?php
header('X-FRAME-OPTIONS:DENY');

session_start();
session_regenerate_id(true);

define('TITLE', '商品新規登録');

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
      <h1 class="level1-heading">商品新規登録</h1>
      <p class="login-name login-name__border_bottom"><?= $login_staff_name; ?>さん ログイン中</p>
      <form class="staff-add-form" method="post" action="pro_add_check.php" enctype="multipart/form-data">

        <div class="text-box">
          <label class="text-box__label" for="name">商品名</label>
          <input id="name" class="text-box__input" type="text" name="name">
        </div>

        <div class="text-box">
          <label  class="text-box__label" for="price">価格</label>
          <input id="price" class="text-box__input" type="text" name="price">
        </div>

        <div class="text-box">
          <label  class="text-box__label" for="memo">説明</label>
          <input id="memo" class="text-box__input" type="text" name="memo">
        </div>

        <dl class="staff-data-list">
          <dt class="staff-data-list__title">商品画像</dt>
          <dd class="staff-data-list__data"><input id="gazou" type="file" name="gazou">
          </dd>
        </dl>

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
