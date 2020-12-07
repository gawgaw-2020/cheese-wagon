<?php
session_start();
session_regenerate_id(true);

define('TITLE', 'スタッフ情報削除-完了画面-');

if (isset($_SESSION['login']) === false) {
  header('Location: /admin/login/staff_login.php');
  exit();
} else {
  $login_staff_name = $_SESSION['staff_name'];
}

try {
  $staff_code = $_POST['code'];
  $csrf = $_POST['csrf'];
  if ($csrf !== $_SESSION['csrfToken']) {
    header('Location: /staff/staff_list.php');
    exit();
  }

  require_once (dirname(__FILE__) . '/../../assets/functions/dbconnect.php');

  $sql = 'DELETE FROM mst_staff WHERE code = ?';
  $stmt = $dbh->prepare($sql);

  $data[] = $staff_code;

  $stmt->execute($data);

  $dbh = null;

  unset($_SESSION['csrfToken']);

} catch(PDOException $e) {
  print 'データベース接続エラー';
  exit();
}

require_once (dirname(__FILE__) . '/../assets/_inc/head.php');
require_once (dirname(__FILE__) . '/../assets/_inc/header.php');

?>

<main class="main">
  <div class="section-container">
    <section class="staff-select-error">
      <h1 class="level1-heading level1-heading--margin-top_none">スタッフ情報削除</h1>
      <p class="login-name login-name__border_bottom"><?= $login_staff_name; ?>さん ログイン中</p>
      <p class="result-icon result-icon--primary"><i class="fas fa-check"></i></p>
      <p class="result-message">スタッフの情報を削除しました。</p>
      <div class="result-btn"><a class="btn btn--small btn--orange btn--link_orange" href="/admin/staff/staff_list.php">スタッフ一覧へ</a></div>
    </section>
  </div>
</main>
</body>
</html>