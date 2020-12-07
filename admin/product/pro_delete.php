<?php
session_start();
session_regenerate_id(true);

define('TITLE', '商品情報削除-確認画面-');

if (isset($_SESSION['login']) === false) {
  header('Location: /admin/login/staff_login.php');
  exit();
} else {
  $login_staff_name = $_SESSION['staff_name'];

  if (!isset($_SESSION['csrfToken'])) {
    $csrfToken =  bin2hex(random_bytes(32));
    $_SESSION['csrfToken'] = $csrfToken;
  }
  $token = $_SESSION['csrfToken'];
  
}

try {
  require_once (dirname(__FILE__) . '/../../assets/functions/common.php');

  $get = sanitize($_GET);
  $pro_code = $_GET['procode'];

  require_once (dirname(__FILE__) . '/../../assets/functions/dbconnect.php');
  $sql = 'SELECT * FROM items WHERE item_id = ?';
  $stmt = $dbh->prepare($sql);
  $data[] = $pro_code;
  $stmt->execute($data);

  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  $pro_name = $rec['item_name'];
  $pro_price = $rec['item_price'];
  $pro_gazou_name = $rec['item_image_name'];

  $dbh = null;

  if ($pro_gazou_name === '') {
    $dis_gazou = '';
  } else {
    $dis_gazou = '<img src="/assets/image/item_img/'.$pro_gazou_name.'">';
  }

} catch(PDOException $e) {
  print 'データベース接続エラー';
  exit();
}

require_once (dirname(__FILE__) . '/../assets/_inc/head.php');
require_once (dirname(__FILE__) . '/../assets/_inc/header.php');

?>

<main class="main">
  <div class="section-container">
    <section class="staff-edit-check">
      <h1 class="level1-heading">スタッフ情報削除</h1>
      <p class="login-name login-name__border_bottom"><?= $login_staff_name; ?>さん ログイン中</p>
      <dl class="staff-data-list">
        <dt class="staff-data-list__title">商品コード</dt>
        <dd class="staff-data-list__data"><?= $pro_code; ?></dd>
        <dt class="staff-data-list__title">商品名</dt>
        <dd class="staff-data-list__data"><?= $pro_name; ?></dd>
        <dt class="staff-data-list__title">商品価格</dt>
        <dd class="staff-data-list__data">¥ <?= number_format($pro_price); ?></dd>
        <dt class="staff-data-list__title">商品画像</dt>
        <dd class="staff-data-list__data"><?= $dis_gazou; ?></dd>
      </dl>
      <p class="alert-message">この商品を削除してよろしいですか？</p>
      <form method="post" action="pro_delete_done.php">
        <div class="page-transition-btns">
          <input type="hidden" name="code" value="<?= $pro_code; ?>">
          <input type="hidden" name="csrf" value="<?= $token; ?>">
          <input type="hidden" name="gazou_name" value="<?= $pro_gazou_name; ?>">
          <input class="btn btn--medium btn--red btn--link_red" type="submit" value="商品情報を削除する">
          <input class="btn btn--small btn--transparent btn--link_transparent" type="button" onclick="history.back()" value="戻る">
        </div>
      </form>
    </section>
  </div>
</main>
</form>
</body>
</html>
