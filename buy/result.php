<?php

session_start();
session_regenerate_id(true);
require_once(dirname(__FILE__) . '/../assets/functions/common.php');

define("title", "注文結果画面 | チーズワゴン 自家製モッツァレラチーズと世界の厳選チーズ");

echo '<pre>';
var_dump($_SESSION['user_input']);
echo '</pre>';
echo '<pre>';
var_dump($_SESSION['cart']);
echo '</pre>';
echo '<pre>';
var_dump($_SESSION['kazu']);
echo '</pre>';

$user_name = $_SESSION['user_input']['user_name'];
$user_email = $_SESSION['user_input']['user_email'];
$user_postal1 = $_SESSION['user_input']['user_postal1'];
$user_postal2 = $_SESSION['user_input']['user_postal2'];
$user_address = $_SESSION['user_input']['user_address'];
$user_tel = $_SESSION['user_input']['user_tel'];
$user_order = $_SESSION['user_input']['user_order'];
$user_password = $_SESSION['user_input']['user_password'];


// DB処理














// 以下Stripe処理
require_once(dirname(__FILE__) . '/../vendor/autoload.php');

require_once(dirname(__FILE__) . '/../buy/stripe.php');

$stripe = new \Stripe\StripeClient($secretKey);

$session = $stripe->checkout->sessions->retrieve($_GET['session_id'], []);
?>


<?php include(dirname(__FILE__).'/../assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/../assets/_inc/_header.php'); ?>

  <main>
    <section class="form-check">
      <div class="section-inner">
        <?php if ($session->payment_status === 'paid'): ?>
          <div class="registration-steps">
            <div class="registration-steps_step">
              <div class="num">1</div>
              <div class="text">ユーザー情報入力</div>
            </div>
            <div class="registration-steps_line"></div>
            <div class="registration-steps_step">
              <div class="num">2</div>
              <div class="text">ご注文内容の確認</div>
            </div>
            <div class="registration-steps_line"></div>
            <div class="registration-steps_step -active">
              <div class="num">3</div>
              <div class="text">ご注文結果の表示</div>
            </div>
          </div>
          <p>DBに注文データの保存</p>
          <p>新規ならユーザーデータの保存</p>
          <p>カートと数のセッション空にする</p>
          <p>支払いが完了しましたの表示</p>
          <p>トップページなどへのリンクへの表示</p>
        <?php endif; ?>
        <?php if ($session->payment_status === 'unpaid'): ?>
          <p>支払いが完了していません</p>
        <?php endif; ?>
      </div>
    </section>
  </main>


<?php include(dirname(__FILE__).'/../assets/_inc/_footer.php'); ?>
