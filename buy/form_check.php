<?php

session_start();
session_regenerate_id(true);
require_once(dirname(__FILE__) . '/../assets/functions/common.php');


define("title", "入力内容確認 | チーズワゴン 自家製モッツァレラチーズと世界の厳選チーズ");

$user_name = $_SESSION['user_input']['user_name'];
$user_email = $_SESSION['user_input']['user_email'];
$user_postal1 = $_SESSION['user_input']['user_postal1'];
$user_postal2 = $_SESSION['user_input']['user_postal2'];
$user_address = $_SESSION['user_input']['user_address'];
$user_tel = $_SESSION['user_input']['user_tel'];
$user_order = $_SESSION['user_input']['user_order'];
$user_password = $_SESSION['user_input']['user_password'];

try {
  if (isset($_SESSION['cart']) === true) {
    $cart = $_SESSION['cart'];
    $kazu = $_SESSION['kazu'];
    $max = count($cart);
  } else {
    $max = 0;
  }
  require_once(dirname(__FILE__) . '/../assets/functions/dbconnect.php');

  foreach ($cart as $key => $val) {
    $sql = 'SELECT item_id, item_name, item_price, item_image_name FROM items WHERE item_id = ?';
    $stmt = $dbh->prepare($sql);
    $data[0] = $val;
    $stmt->execute($data);
  
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    $item_name[] = $rec['item_name'];
    $item_price[] = $rec['item_price'];
    $item_image_name[] = $rec['item_image_name'];
    
  }
  // echo '<pre>';
  // var_dump($_SESSION['user_input']);
  // echo '</pre>';
  // echo '<pre>';
  // var_dump($_SESSION['cart']);
  // echo '</pre>';
  // echo '<pre>';
  // var_dump($_SESSION['kazu']);
  // echo '</pre>';  
  // echo '<pre>';
  // var_dump($item_name);
  // echo '</pre>';
  // echo '<pre>';
  // var_dump($kazu);
  // echo '</pre>';
  // echo '<pre>';
  // var_dump($item_price);
  // echo '</pre>';
  // echo '<pre>';
  // var_dump($max);
  // echo '</pre>';

  $cartData = [];

  for ($i=0; $i < $max; $i++) { 
    array_push($cartData, [
      'price_data' => [
          'currency' => 'JPY',
          'product_data' => [
              'name' => $item_name[$i],
          ],
          'unit_amount' => $item_price[$i],
      ],
      'quantity' => $kazu[$i],
    ]);
  }

  // echo '<pre>';
  // var_dump($cartData);
  // echo '</pre>';


  $dbh = null;

} catch(PDOException $e) {
  print $e->getMessage().'データベース接続エラー';
  exit();
}

// 以下Stripe処理
require_once(dirname(__FILE__) . '/../vendor/autoload.php');

// ご自身のAPIキーを入力
$secretKey = 'sk_test_51Htj55FdjvdBVD7vPeqBlUwwEJquDSWefBNOgbB07nl4Un5dVkzNUH15wT0y6tVIgkP5Av1zeChAETCzpeIErIUw00kVXfFp67';
$publicKey = 'pk_test_51Htj55FdjvdBVD7vaa492NPaq6aU6PtQI8p76qTG8aXPbGQzalPES3DJOcQGn9TaAnhmUjvqkNUeGUphfcHrgPY200a8xu5bjk';

$stripe = new \Stripe\StripeClient($secretKey);

$session = $stripe->checkout->sessions->create([
    'payment_method_types' => ['card'],
    'line_items' => [$cartData],
    'mode' => 'payment',
    // ご自身のサイトURLを入力
    'success_url' => 'http://localhost/buy/result.php?session_id={CHECKOUT_SESSION_ID}',
    'cancel_url' => 'http://localhost/buy/result.php?session_id={CHECKOUT_SESSION_ID}',
]);
?>


<?php include(dirname(__FILE__).'/../assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/../assets/_inc/_header.php'); ?>

  <main>
    <section class="form-check">
      <div class="section-inner">
        <div class="registration-steps">
          <div class="registration-steps_step">
            <div class="num">1</div>
            <div class="text">ユーザー情報入力</div>
          </div>
          <div class="registration-steps_line"></div>
          <div class="registration-steps_step -active">
            <div class="num">2</div>
            <div class="text">ご注文内容確認</div>
          </div>
          <div class="registration-steps_line"></div>
          <div class="registration-steps_step">
            <div class="num">3</div>
            <div class="text">ユーザー登録完了</div>
          </div>
        </div>
        <dl class="user-check-list">
          <dt class="user-check-list__title">お名前</dt>
          <dd class="user-check-list__data"><?= h($user_name); ?></dd>
          <dt class="user-check-list__title">メールアドレス</dt>
          <dd class="user-check-list__data"><?= h($user_email); ?></dd>
          <dt class="user-check-list__title">郵便番号</dt>
          <dd class="user-check-list__data"><?= h($user_postal1); ?>-<?= h($user_postal2); ?></dd>
          <dt class="user-check-list__title">住所</dt>
          <dd class="user-check-list__data"><?= h($user_address); ?></dd>
          <dt class="user-check-list__title">電話番号</dt>
          <dd class="user-check-list__data"><?= h($user_tel); ?></dd>
        </dl>
        <?php if ($max === 0): ?>
        <p class="cart__error">お客様のカートに商品はありません</p>
        <?php else: ?>
        <ul class="cart__list">
        <?php $result = 0; ?>
        <?php for ($i = 0; $i < $max; $i++): ?> 
        <?php $sum = $item_price[$i] * $kazu[$i]; ?>
        <?php $result += $sum; ?>
          <li class="cart-item">
            <p class="cart-item__image"><img src="/assets/image/item_img/<?= h($item_image_name[$i]); ?>" alt=""></p>
            <p class="cart-item__title"><?= h($item_name[$i]); ?></p>
            <div class="cart-item__kazu"><?= $kazu[$i]; ?>個</div>
            <p class="cart-item__price">¥ <?= h($sum); ?><br>（1個 ¥<?= h($item_price[$i]); ?>）</p>
          </li>
        <?php endfor; ?>
        </ul>
        <div class="cart__footer">
          <p class="cart__sum">合計 <?= number_format(h($result)); ?>円</p>
        </div>
          <div class="form__btns">
            <input type="hidden" name="user_name" value="<?= $user_name; ?>">
            <input type="hidden" name="user_email" value="<?= $user_email; ?>">
            <input type="hidden" name="user_postal1" value="<?= $user_postal1; ?>">
            <input type="hidden" name="user_postal2" value="<?= $user_postal2; ?>">
            <input type="hidden" name="user_address" value="<?= $user_address; ?>">
            <input type="hidden" name="user_tel" value="<?= $user_tel; ?>">
            <input type="hidden" name="user_order" value="<?= $user_order; ?>">
            <input type="hidden" name="user_password" value="<?= $user_password; ?>">
            <input type="hidden" name="order_sum" value="<?= $result; ?>">
            <button id="checkout-button" class="btn btn--ok">次へ/支払い情報の入力</button>
            <a class="btn btn--back" href="/buy/form.php">戻る/入力内容を訂正する</a>
          </div>
        <?php endif; ?>
      </div>
    </section>
  </main>

  <script type="text/javascript">
    var stripe = Stripe('<?php echo $publicKey;?>');

    var checkoutButton = document.getElementById('checkout-button');
    checkoutButton.addEventListener('click', function() {
      stripe.redirectToCheckout({sessionId: "<?php echo $session->id;?>"})
      .then(function (result) {
        if (result.error) {
          // var displayError = document.getElementById('error-message');
          // displayError.textContent = result.error.message;
        }
      });
    });
  </script>

<?php include(dirname(__FILE__).'/../assets/_inc/_footer.php'); ?>
