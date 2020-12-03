<?php
session_start();
session_regenerate_id(true);
require_once(dirname(__FILE__) . '/../assets/functions/common.php');

echo '<pre>';
var_dump($_SESSION['user_input']);
echo '</pre>';
echo '<pre>';
var_dump($_SESSION['cart']);
echo '</pre>';
echo '<pre>';
var_dump($_SESSION['kazu']);
echo '</pre>';

require_once(dirname(__FILE__) . '/../vendor/autoload.php');

// ご自身のAPIキーを入力
$secretKey = 'sk_test_51Htj55FdjvdBVD7vPeqBlUwwEJquDSWefBNOgbB07nl4Un5dVkzNUH15wT0y6tVIgkP5Av1zeChAETCzpeIErIUw00kVXfFp67';

$stripe = new \Stripe\StripeClient($secretKey);

$session = $stripe->checkout->sessions->retrieve($_GET['session_id'], []);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>完了ページ</title>
<script src="https://js.stripe.com/v3/"></script>
</head>

<body>
<?php
if ($session->payment_status === 'paid') {
  echo '<p>DBに注文データの保存</p>';
  echo '<p>新規ならユーザーデータの保存</p>';
  echo '<p>カートと数のセッション空にする</p>';
  echo '<p>支払いが完了しましたの表示</p>';
  echo '<p>トップページなどへのリンクへの表示</p>';
}
if ($session->payment_status === 'unpaid') {
    echo '<p>支払いが完了していません</p>';
}
?>
</body>
</html>