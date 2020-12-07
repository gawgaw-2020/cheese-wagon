<?php
header('X-FRAME-OPTIONS:DENY');

session_start();
session_regenerate_id(true);

define('TITLE', 'スタッフ情報修正');

if (isset($_SESSION['login']) === false) {
  header('Location: /admin/login/staff_login.php');
  exit();
} else {
  $login_staff_name = $_SESSION['staff_name'];
}

try {
  require_once (dirname(__FILE__) . '/../../assets/functions/common.php');

  $get = sanitize($_GET);
  $staff_code = $get['staffcode'];

  require_once (dirname(__FILE__) . '/../../assets/functions/dbconnect.php');

  $sql = 'SELECT name FROM mst_staff WHERE code = ?';
  $stmt = $dbh->prepare($sql);
  $data[] = $staff_code;
  $stmt->execute($data);

  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  $staff_name = $rec['name'];

  $dbh = null;
} catch(PDOException $e) {
  print 'データベース接続エラー';
  exit();
}


require_once (dirname(__FILE__) . '/../assets/_inc/head.php');
require_once (dirname(__FILE__) . '/../assets/_inc/header.php');

?>

<main class="main">
  <div class="section-container">
    <section class="staff-edit">
      <h1 class="level1-heading">スタッフ情報修正</h1>
      <p class="login-name login-name__border_bottom"><?= $login_staff_name; ?>さん ログイン中</p>
      <form class="staff-edit-form" method="post" action="staff_edit_check.php">
        <dl class="staff-data-list">
          <dt class="staff-data-list__title">スタッフコード</dt>
          <dd class="staff-data-list__data"><?= $staff_code; ?></dd>
        </dl>

        <div class="text-box">
          <label class="text-box__label" for="name">スタッフ名</label>
          <input id="name" class="text-box__input" type="text" name="name" value="<?= $staff_name; ?>">
        </div>

        <div class="text-box">
          <label  class="text-box__label" for="pass">新しいパスワード</label>
          <input id="pass" class="text-box__input" type="password" name="pass">
        </div>

        <div class="text-box">
          <label  class="text-box__label" for="pass2">新しいパスワードを再入力する</label>
          <input id="pass2" class="text-box__input" type="password" name="pass2">
        </div>

        <div class="page-transition-btns">
          <input type="hidden" name="code" value="<?= $staff_code; ?>">
          <input class="btn btn--medium btn--green btn--link_green" type="submit" value="入力内容を確認する">
          <input class="btn btn--small btn--transparent btn--link_transparent" type="button" onclick="history.back()" value="戻る">
        </div>
      </form>
    </section>
  </div>
</main>
</body>
</html>