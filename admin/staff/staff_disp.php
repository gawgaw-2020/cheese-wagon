<?php
session_start();
session_regenerate_id(true);

define('TITLE', 'スタッフ情報参照');

if (isset($_SESSION['login']) === false) {
  header('Location: /admin/login/staff_login.php');
  exit();
} else {
  $staff_name = $_SESSION['staff_name'];
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
    <section class="staff-disp">
      <h1 class="level1-heading">スタッフ情報参照</h1>
      <p class="login-name login-name__border_bottom"><?= $staff_name; ?>さん ログイン中</p>
      <dl class="staff-data-list">
        <dt class="staff-data-list__title">スタッフコード</dt>
        <dd class="staff-data-list__data"><?= $staff_code; ?></dd>
        <dt class="staff-data-list__title">スタッフ名</dt>
        <dd class="staff-data-list__data"><?= $staff_name; ?></dd>
      </dl>
      <form>
        <input class="btn btn--small btn--transparent btn--link_transparent" type="button" onclick="history.back()" value="戻る">
      </form>
    </section>
  </div>
</main>
</body>
</html>