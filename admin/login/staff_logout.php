<?php
session_start();

define('TITLE', 'ログアウト画面');

$_SESSION = array();
if (isset($_COOKIE[session_name()]) === true) {
  setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();

require_once (dirname(__FILE__) . '/../assets/_inc/head.php');
?>
<main class="main">
  <div class="section-container">
    <section class="result">
      <h1 class="level1-heading">ログアウト</h1>
      <p class="result-icon result-icon--primary"><i class="fas fa-check"></i></p>
      <p class="result-message">ログアウトしました</p>
      <div class="result-btn"><a class="btn btn--medium btn--orange btn--link_orange" href="/admin/login/staff_login.php">ログイン画面へ</a></div>
    </section>
  </div>
</main>

</body>
</html>