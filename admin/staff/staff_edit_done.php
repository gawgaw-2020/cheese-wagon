<?php
session_start();
session_regenerate_id(true);

define('TITLE', 'スタッフ情報修正-完了画面-');

if (isset($_SESSION['login']) === false) {
  header('Location: /admin/login/staff_login.php');
  exit();
} else {
  $login_staff_name = $_SESSION['staff_name'];
}

try {
  require_once (dirname(__FILE__) . '/../../assets/functions/common.php');

$post = sanitize($_POST);

$staff_code = $post['code'];
$staff_name = $post['name'];
$staff_pass = $post['pass'];

require_once (dirname(__FILE__) . '/../../assets/functions/dbconnect.php');

$sql = 'UPDATE mst_staff SET name = :name, password = :password WHERE code = :code';
$stmt = $dbh->prepare($sql);


$stmt->bindValue('name', $staff_name, PDO::PARAM_STR);
$stmt->bindValue('password', $staff_pass, PDO::PARAM_STR);
$stmt->bindValue('code', $staff_code, PDO::PARAM_INT);

$stmt->execute();

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
    <section class="staff-select-error">
      <h1 class="level1-heading level1-heading--margin-top_none">スタッフ情報修正</h1>
      <p class="login-name login-name__border_bottom"><?= $login_staff_name; ?>さん ログイン中</p>
      <p class="result-icon result-icon--primary"><i class="fas fa-check"></i></p>
      <p class="result-message">スタッフの情報を修正しました。</p>
      <div class="result-btn"><a class="btn btn--small btn--orange btn--link_orange" href="/admin/staff/staff_list.php">スタッフ一覧へ</a></div>
    </section>
  </div>
</main>
</body>
</html>