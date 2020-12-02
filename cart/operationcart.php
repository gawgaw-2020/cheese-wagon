<?php

session_start();
session_regenerate_id(true);

require_once(dirname(__FILE__) . '/../assets/functions/common.php');

$max = $_POST['max'];
for ($i = 0; $i < $max; $i++) { 
  // if (preg_match("/\A[0-9]+\z/", $_POST['kazu' . $i]) == 0) {
  //   print '数量に誤りがあります';
  //   print '<a href="/cart/">カートに戻る</a>';
  //   exit();
  // }
  // if ($_POST['kazu' . $i] < 1 || 10 < $_POST['kazu' . $i]) {
  //   print '数量は必ず1個以上、10個までです';
  //   print '<a href="/cart/">カートに戻る</a>';
  //   exit();
  // }
  $kazu[] = $_POST['kazu' . $i];
}

$cart = $_SESSION['cart'];

for ($i=$max; 0 <= $i ; $i--) {
  if (isset($_POST['sakujo'.$i]) === true) {
    array_splice($cart, $i, 1);
    array_splice($kazu, $i, 1);
  }
}

$_SESSION['cart'] = $cart;
$_SESSION['kazu'] = $kazu;

header('Location: /cart/');
exit();

?>