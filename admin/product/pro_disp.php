<?php
session_start();
session_regenerate_id(true);

define('TITLE', '商品情報参照');

if (isset($_SESSION['login']) === false) {
  header('Location: /admin/login/staff_login.php');
  exit();
} else {
  $staff_name = $_SESSION['staff_name'];
}

try {
      require_once (dirname(__FILE__) . '/../../assets/functions/common.php');


  $get = sanitize($_GET);
  $pro_code = $get['procode'];

    require_once (dirname(__FILE__) . '/../../assets/functions/dbconnect.php');


  $sql = 'SELECT item_name, item_price, item_image_name FROM items WHERE item_id = ?';
  $stmt = $dbh->prepare($sql);
  $data[] = $pro_code;
  $stmt->execute($data);

  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  $pro_name = $rec['item_name'];
  $pro_price = $rec['item_price'];
  $pro_gazou_name = $rec['item_image_name'];

  if ($pro_gazou_name === '') {
    $dis_gazou = '';
  } else {
    $dis_gazou = '<img src="/assets/image/item_img/'.$pro_gazou_name.'">';
  }

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
      <h1 class="level1-heading">商品情報参照</h1>
      <p class="login-name login-name__border_bottom"><?= $staff_name; ?>さん ログイン中</p>
      <dl class="staff-data-list">
        <dt class="staff-data-list__title">商品コード</dt>
        <dd class="staff-data-list__data"><?= $pro_code; ?></dd>
        <dt class="staff-data-list__title">商品名</dt>
        <dd class="staff-data-list__data"><?= $pro_name; ?></dd>
        <dt class="staff-data-list__title">価格</dt>
        <dd class="staff-data-list__data">¥ <?= number_format($pro_price); ?></dd>
        <dt class="staff-data-list__title">商品画像</dt>
        <dd class="staff-data-list__data"><?= $dis_gazou; ?></dd>
      </dl>
      <form>
        <input class="btn btn--small btn--transparent btn--link_transparent" type="button" onclick="history.back()" value="戻る">
      </form>
    </section>
  </div>
</main>
</body>
</html>
