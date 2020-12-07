<?php
session_start();
session_regenerate_id(true);

define('TITLE', 'スタッフ情報修正-確認画面-');

if (isset($_SESSION['login']) === false) {
  header('Location: /admin/login/staff_login.php');
  exit();
} else {
  $login_staff_name = $_SESSION['staff_name'];
}

require_once (dirname(__FILE__) . '/../../assets/functions/common.php');

$post = sanitize($_POST);

$staff_code = $post['code'];
$staff_name = $post['name'];
$staff_pass = $post['pass'];
$staff_pass2 = $post['pass2'];

if ($staff_name === '') {
  $error[] =  'スタッフ名が入力されていません';
}

if ($staff_pass === '') {
  $error[] = 'パスワードが入力されていません。';
}
if ($staff_pass !== $staff_pass2) {
  $error[] =  'パスワードが一致しません。';
}

require_once (dirname(__FILE__) . '/../assets/_inc/head.php');
require_once (dirname(__FILE__) . '/../assets/_inc/header.php');

?>

<main class="main">
  <div class="section-container">
    <section class="staff-edit-check">
      <h1 class="level1-heading">スタッフ情報修正</h1>
      <p class="login-name login-name__border_bottom"><?= $login_staff_name; ?>さん ログイン中</p>
<?php
if($staff_name === '' || $staff_pass === '' || $staff_pass !== $staff_pass2): ?>
  <?php for ($i = 0; $i < count($error); $i++): ?>
    <p class="input-error-message"><?= $error[$i]; ?></p>
  <?php endfor; ?>
  <form>
    <div class="page-transition-from-edit-check">
      <input class="btn btn--small btn--transparent btn--link_transparent" type="button" onclick="history.back()" value="戻る">
    </div>
  </form>
<?php else: ?>
<?php $staff_pass = md5($staff_pass); ?>
  <dl class="staff-data-list">
    <dt class="staff-data-list__title">スタッフ名</dt>
    <dd class="staff-data-list__data"><?= $staff_name; ?></dd>
    <dt class="staff-data-list__title">パスワード</dt>
    <dd class="staff-data-list__data">＊＊＊＊＊＊＊＊＊＊＊</dd>
  </dl>
  <form method="post" action="staff_edit_done.php">
    <div class="page-transition-btns">
      <input type="hidden" name="code" value="<?= $staff_code; ?>">
      <input type="hidden" name="name" value="<?= $staff_name; ?>">
      <input type="hidden" name="pass" value="<?= $staff_pass; ?>">
      <input class="btn btn--medium btn--green btn--link_green" type="submit" value="スタッフ情報を修正する">
      <input class="btn btn--small btn--transparent btn--link_transparent" type="button" onclick="history.back()" value="戻る">
    </div>
  </form>
<?php endif; ?>

    </section>
  </div>
</main>
</body>
</html>