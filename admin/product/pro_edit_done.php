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

  $pro_code = $post['code'];
  $pro_name = $post['name'];
  $pro_price = $post['price'];
  $pro_gazou_name_old = $post['gazou_name_old'];
  $pro_gazou_name = $post['gazou_name'];
  if ($pro_gazou_name === '') {
    $pro_gazou_name = $pro_gazou_name_old;
  }

  require_once (dirname(__FILE__) . '/../../assets/functions/dbconnect.php');

  $sql = 'UPDATE items SET item_name = ?, item_price = ?, item_image_name = ? WHERE item_id = ?';
  $stmt = $dbh->prepare($sql);

  $data[] = $pro_name;
  $data[] = $pro_price;
  $data[] = $pro_gazou_name;
  $data[] = $pro_code;

  $stmt->execute($data);

  $dbh = null;

  if ($pro_gazou_name_old !== $pro_gazou_name) {
    if ($pro_gazou_name_old !== '') {
      unlink (dirname(__FILE__) . '/../../assets/image/item_img/'.$pro_gazou_name_old);
    }
  }

} catch(PDOException $e) {
  print 'ただいま障害により大変ご迷惑をお掛けしております。';
  exit();
}

require_once (dirname(__FILE__) . '/../assets/_inc/head.php');
require_once (dirname(__FILE__) . '/../assets/_inc/header.php');


?>
<main class="main">
  <div class="section-container">
    <section class="staff-select-error">
      <h1 class="level1-heading level1-heading--margin-top_none">商品情報修正</h1>
      <p class="login-name login-name__border_bottom"><?= $login_staff_name; ?>さん ログイン中</p>
      <p class="result-icon result-icon--primary"><i class="fas fa-check"></i></p>
      <p class="result-message">商品の情報を修正しました。</p>
      <div class="result-btn"><a class="btn btn--small btn--orange btn--link_orange" href="/admin/product/pro_list.php">商品一覧へ</a></div>
    </section>
  </div>
</main>
</body>
</html>