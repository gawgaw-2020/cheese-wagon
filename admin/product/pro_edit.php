<?php
header('X-FRAME-OPTIONS:DENY');

session_start();
session_regenerate_id(true);

define('TITLE', '商品情報修正');

if (isset($_SESSION['login']) === false) {
  header('Location: /admin/login/staff_login.php');
  exit();
} else {
  $login_staff_name = $_SESSION['staff_name'];
}

try {
  $pro_code = $_GET['procode'];

  require_once (dirname(__FILE__) . '/../../assets/functions/dbconnect.php');

  $sql = 'SELECT item_name, item_price, item_image_name FROM items WHERE item_id = ?';
  $stmt = $dbh->prepare($sql);
  $data[] = $pro_code;
  $stmt->execute($data);

  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  $pro_name = $rec['item_name'];
  $pro_price = $rec['item_price'];
  $pro_gazou_name_old = $rec['item_image_name'];

  $dbh = null;

  if ($pro_gazou_name_old === '') {
    $dis_gazou = '';
  } else {
    $dis_gazou = '<img src="/assets/image/item_img/'.$pro_gazou_name_old.'">';
  }

} catch(PDOException $e) {
  echo $e->getMessage();
  print 'ただいま障害により大変ご迷惑をお掛けしております。';
  exit();
}

require_once (dirname(__FILE__) . '/../assets/_inc/head.php');
require_once (dirname(__FILE__) . '/../assets/_inc/header.php');


?>

<main class="main">
  <div class="section-container">
    <section class="staff-edit">
      <h1 class="level1-heading">商品情報修正</h1>
      <p class="login-name login-name__border_bottom"><?= $login_staff_name; ?>さん ログイン中</p>
      <form class="staff-edit-form" method="post" action="pro_edit_check.php" enctype="multipart/form-data">
      <input type="hidden" name="code" value="<?= $pro_code; ?>">
      <input type="hidden" name="gazou_name_old" value="<?= $pro_gazou_name_old; ?>">
        
        <dl class="staff-data-list">
          <dt class="staff-data-list__title">商品コード</dt>
          <dd class="staff-data-list__data"><?= $pro_code; ?></dd>
        </dl>

        <div class="text-box">
          <label class="text-box__label" for="name">商品名</label>
          <input id="name" class="text-box__input" type="text" name="name" value="<?= $pro_name; ?>">
        </div>

        <div class="text-box">
          <label class="text-box__label" for="price">価格</label>
          <input id="price" class="text-box__input" type="text" name="price" value="<?= $pro_price; ?>">
        </div>

        <dl class="staff-data-list">
          <dt class="staff-data-list__title">現在の商品画像</dt>
          <dd class="staff-data-list__data"><?= $dis_gazou; ?></dd>
          <dt class="staff-data-list__title">（変更する場合）商品画像</dt>
          <dd class="staff-data-list__data"><input type="file" name="gazou" style="width:400px"></dd>
        </dl>

        <div class="page-transition-btns">
          <input class="btn btn--medium btn--green btn--link_green" type="submit" value="入力内容を確認する">
          <input class="btn btn--small btn--transparent btn--link_transparent" type="button" onclick="history.back()" value="戻る">
        </div>
      </form>
    </section>
  </div>
</main>
</body>
</html>
