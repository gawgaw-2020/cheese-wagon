<?php
session_start();
session_regenerate_id(true);

define('TITLE', '商品情報修正-確認画面-');

if (isset($_SESSION['login']) === false) {
  header('Location: /admin/login/staff_login.php');
  exit();
} else {
  $login_staff_name = $_SESSION['staff_name'];
}

    require_once (dirname(__FILE__) . '/../../assets/functions/common.php');


$post = sanitize($_POST);

$pro_code = $post['code'];
$pro_name = $post['name'];
$pro_price = $post['price'];
$pro_gazou_name_old = $post['gazou_name_old'];
$pro_gazou = $_FILES['gazou'];


if ($pro_name === '') {
  $error[] = '商品名が入力されていません。';
}

if (preg_match('/\A[0-9]+\z/', $pro_price) == 0) {
  $error[] = '価格をきちんと入力してください。';
}

$dis_gazou = '<img src="/assets/image/item_img/' . $pro_gazou_name_old . '">';
// var_dump($pro_gazou['size']);
if ($pro_gazou['size'] > 0) {
  if ($pro_gazou['size'] > 10000000) {
    $error[] = '画像が大きすぎます';
  } else {
    move_uploaded_file($pro_gazou['tmp_name'], '../../assets/image/item_img/' . $pro_gazou['name']);
    $dis_gazou = '<img src="/assets/image/item_img/' . $pro_gazou['name'] . '">';
  }
}
// var_dump($error);

require_once (dirname(__FILE__) . '/../assets/_inc/head.php');
require_once (dirname(__FILE__) . '/../assets/_inc/header.php');


?>
<main class="main">
  <div class="section-container">
    <section class="staff-edit-check">
      <h1 class="level1-heading">商品情報修正</h1>
      <p class="login-name login-name__border_bottom"><?= $login_staff_name; ?>さん ログイン中</p>
<?php
if($pro_name === '' || preg_match('/\A[0-9]+\z/', $pro_price) == 0 || $pro_gazou['size'] > 10000000): ?>
  <?php for ($i = 0; $i < count($error); $i++): ?>
    <p class="input-error-message"><?= $error[$i]; ?></p>
  <?php endfor; ?>
  <form>
    <div class="page-transition-from-edit-check">
      <input class="btn btn--small btn--transparent btn--link_transparent" type="button" onclick="history.back()" value="戻る">
    </div>
  </form>
<?php else: ?>
  <dl class="staff-data-list">
    <dt class="staff-data-list__title">商品名</dt>
    <dd class="staff-data-list__data"><?php print $pro_name; ?></dd>
    <dt class="staff-data-list__title">価格</dt>
    <dd class="staff-data-list__data"><?php print $pro_price; ?></dd>
    <dt class="staff-data-list__title">商品画像</dt>
    <dd class="staff-data-list__data"><?php print $dis_gazou; ?></dd>
  </dl>
  <form method="post" action="pro_edit_done.php">
    <div class="page-transition-btns">
    <input type="hidden" name="code" value="<?= $pro_code; ?>">
    <input type="hidden" name="name" value="<?= $pro_name; ?>">
    <input type="hidden" name="price" value="<?= $pro_price; ?>">
    <input type="hidden" name="gazou_name_old" value="<?= $pro_gazou_name_old; ?>">
    <input type="hidden" name="gazou_name" value="<?= $pro_gazou['name']; ?>">
    <input class="btn btn--medium btn--green btn--link_green" type="submit" value="商品情報を修正する">
    <input class="btn btn--small btn--transparent btn--link_transparent" type="button" onclick="history.back()" value="戻る">
    </div>
  </form>
<?php endif; ?>

    </section>
  </div>
</main>
</body>
</html>
