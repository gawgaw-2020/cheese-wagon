<?php


// エラーを出力する
ini_set('display_errors', 1);	 	 
ini_set('display_startup_errors', 1);	 	 
error_reporting(E_ALL & ~E_NOTICE);


session_start();
session_regenerate_id(true);
require_once(dirname(__FILE__) . '/../assets/functions/common.php');


define("title", "お客様情報入力 | チーズワゴン 自家製モッツァレラチーズと世界の厳選チーズ");


// POSTで送られてきたときの処理
if (!empty($_POST)) {

  // エラーチェック
  if ($_POST['user_name'] === '' || 15 < mb_strlen($_POST['user_name'])) {
    $error['user_name'] = 'blank';
  }
  if (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
    $error['user_email'] = 'failed';
  } 

  if (empty($error)) {
    $_SESSION['user_input'] = $_POST;
    header('Location: /buy/form_check.php');
    exit();
  }

}

if ($_REQUEST['action'] === 'rewrite' && isset($_SESSION['user_input'])) {
	$_POST = $_SESSION['user_input'];
}


?>

<?php include(dirname(__FILE__).'/../assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/../assets/_inc/_header.php'); ?>

  <main>
    <section class="form">
      <div class="section-inner">
        <div class="registration-steps">
          <div class="registration-steps_step -active">
            <div class="num">1</div>
            <div class="text">ユーザー情報入力</div>
          </div>
          <div class="registration-steps_line"></div>
          <div class="registration-steps_step">
            <div class="num">2</div>
            <div class="text">ご注文内容の確認</div>
          </div>
          <div class="registration-steps_line"></div>
          <div class="registration-steps_step">
            <div class="num">3</div>
            <div class="text">ご注文結果の表示</div>
          </div>
        </div>
        <form action="" method="post">
          <p class="form-title label label--price">お客様情報の入力</p>
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_name">お名前<span class="required">※必須</span></label>
            <input id="js-input-user_name" class="input-box__input value-name" type="text" name="user_name" value="" autofocus >
            <?php if ($error['user_name'] === 'blank'): ?>
              <p class="form-error animate__animated animate__fadeInUp">-お名前を入力してください（15文字以内）-</p>
            <?php endif; ?>
          </div>
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_email">メールアドレス<span class="required">※必須</span></label>
            <input id="js-input-user_email" class="input-box__input value-email" type="email" name="user_email" value="">
            <?php if ($error['user_email'] === 'failed'): ?>
              <p class="form-error animate__animated animate__fadeInUp">-メールアドレスを正しく入力してください-</p>
            <?php endif; ?>
          </div>
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_postal">郵便番号<span class="required">※必須</span></label>
            <input id="js-input-user_postal" class="postal1 input-box__input value-postal1" type="text" name="user_postal1" value="">-
            <input class="postal2 input-box__input value-postal2" type="text" name="user_postal2" value="">
          </div>
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_address">住所<span class="required">※必須</span></label>
            <input id="js-input-user_address" class="input-box__input value-address" type="text" name="user_address" value="">
          </div>
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_tel">電話番号<span class="required">※必須</span></label>
            <input id="js-input-user_tel" class="input-box__input value-tel" type="text" name="user_tel" value="">
          </div>
          <div class="radio-box">
            <p class="radio-box__label">注文区分<span class="required">※必須</span></p>
            <div class="radio-box__item">
              <input class="radio-box__radio" type="radio" id="once" name="user_order" value="once">
              <label for="once">今回だけの注文</label>
            </div>
            <div class="radio-box__item">
              <input class="radio-box__radio" type="radio" id="repeat" name="user_order" value="repeat">
              <label for="repeat">会員登録して注文</label>
            </div>
            <p>会員登録して注文すると、次回からお客様情報の入力を省く事ができます</p>
          </div>
          <p class="form-title label label--price">会員登録する方はパスワードを設定してください</p>
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_password">パスワード</label>
            <input class="input-box__input" id="js-input-user_password" type="password" name="user_password" value="" autocomplete="off">
          </div>
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_password2">パスワード【確認用】</label>
            <input class="input-box__input" id="js-input-user_password2" type="password" name="user_password2" value="" autocomplete="off">
          </div>
          <div class="form__btns">
            <button type="submit" class="btn btn--ok save-btn">入力内容を確認する</button>
            <a class="btn btn--back save-btn" href="/cart/">カートへ戻る</a>
          </div>
        </form>
      </div>
    </section>
  </main>
  <script>
    $(function(){
      // ローカルストレージへの書き込み関数
      function setLocalStorage(key, value) {
        localStorage.setItem(key, value);
      }
      
      // ローカルストレージからの読み込み関数
      function getLocalStorage(key) {
        return localStorage.getItem(key);
      }  
    
      // 初期表示時に前回保存された値を読み込んでセット
      $(".value-name").val(getLocalStorage("value-name"));
      $(".value-email").val(getLocalStorage("value-email"));
      $(".value-postal1").val(getLocalStorage("value-postal1"));
      $(".value-postal2").val(getLocalStorage("value-postal2"));
      $(".value-address").val(getLocalStorage("value-address"));
      $(".value-tel").val(getLocalStorage("value-tel"));
    
      // 保存ボタンクリック時の処理
      $(".save-btn").click(function(){
        setLocalStorage("value-name", $(".value-name").val());
        setLocalStorage("value-email", $(".value-email").val());
        setLocalStorage("value-postal1", $(".value-postal1").val());
        setLocalStorage("value-postal2", $(".value-postal2").val());
        setLocalStorage("value-address", $(".value-address").val());
        setLocalStorage("value-tel", $(".value-tel").val());
      });
      
    });
  </script>

<?php include(dirname(__FILE__).'/../assets/_inc/_footer.php'); ?>
