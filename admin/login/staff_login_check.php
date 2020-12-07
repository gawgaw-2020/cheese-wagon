<?php

define('TITLE', 'ログインエラー');

try {
  require_once (dirname(__FILE__) . '/../../assets/functions/common.php');

  $post = sanitize($_POST);

  $staff_code = $post['code'];
  $staff_pass = $post['pass'];

  $staff_pass = md5($staff_pass);

  require_once (dirname(__FILE__) . '/../../assets/functions/dbconnect.php');

  $sql = 'SELECT name FROM mst_staff WHERE code = ? AND password = ?';
  $stmt = $dbh->prepare($sql);

  $data[] = $staff_code;
  $data[] = $staff_pass;

  $stmt->execute($data);

  $dbh = null;

  $rec = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($rec === false) {
    $error =  'スタッフコードかパスワードが間違っています';
  } else {
    session_start();
    $_SESSION['login'] = 1;
    $_SESSION['staff_code'] = $staff_code;
    $_SESSION['staff_name'] = $rec['name'];
    header('Location: /admin/index.php');
    exit();
  }

} catch(PDOException $e) {
  print 'データベース接続エラー';
  exit();
}


require_once (dirname(__FILE__) . '/../assets/_inc/head.php');
?>
<main class="main">
  <div class="section-container">
    <section class="result">
      <h1 class="level1-heading">ログインエラー</h1>
      <p class="result-icon result-icon--error"><i class="fas fa-times"></i></p>
      <p class="result-message"><?= $error; ?></p>
      <div class="result-btn"><a class="btn btn--medium btn--orange btn--link_orange" href="/admin/login/staff_login.php">ログイン画面へ</a></div>
    </section>
  </div>
</main>

</body>
</html>
