<?php
session_start();
session_regenerate_id(true);

define('TITLE', 'スタッフ選択エラー');

if (isset($_SESSION['login']) === false) {
  header('Location: /admin/login/staff_login.php');
  exit();
} else {
  $staff_name = $_SESSION['staff_name'];
}

require_once (dirname(__FILE__) . '/../assets/_inc/head.php');
require_once (dirname(__FILE__) . '/../assets/_inc/header.php');

?>
<main class="main">
  <div class="section-container">
    <section class="staff-select-error">
      <h1 class="level1-heading level1-heading--margin-top_none">スタッフ選択エラー</h1>
      <p class="login-name login-name__border_bottom"><?= $staff_name; ?>さん ログイン中</p>
      <p class="result-icon result-icon--error"><i class="fas fa-times"></i></p>
      <p class="result-message">スタッフが選択されていません</p>
      <div class="result-btn"><a class="btn btn--small btn--transparent btn--link_transparent" href="/admin/staff/staff_list.php">戻る</a></div>
    </section>
  </div>
</main>
</body>
</html>