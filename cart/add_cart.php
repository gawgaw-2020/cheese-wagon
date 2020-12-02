<?php
session_start();
session_regenerate_id(true);

try {
  $item_id = $_GET['item_id'];

  // カートに1件でも入っていたら
  if (isset($_SESSION['cart']) == true) {
    $cart = $_SESSION['cart'];
    $kazu = $_SESSION['kazu'];
    // その商品が既にカートに入っていたら
    if (in_array($item_id, $cart) === true) {
      print 'その商品はすでにカートに入っています<br>';
      print '<a href="shop_list.php">商品一覧に戻る</a>';
      exit();
    }
  
  }

  // 配列に要素を追加していく
  $cart[] = $item_id;
  $kazu[] = 1;
  $_SESSION['cart'] = $cart;
  $_SESSION['kazu'] = $kazu;

  header('Location: /cart/');
  exit();

} catch(PDOException $e) {
  print 'カート追加エラー';
  exit();
}


?>