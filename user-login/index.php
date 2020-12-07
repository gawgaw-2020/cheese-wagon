<?php

session_start();
session_regenerate_id(true);
require_once(dirname(__FILE__) . '/../assets/functions/common.php');


define("title", "会員ログイン | チーズワゴン 自家製モッツァレラチーズと世界の厳選チーズ");


$email = '';
if (isset($_COOKIE['user_email'])) {
  $email = $_COOKIE['user_email'];
}

$error['name'] = '';

if (!empty($_POST)) {

  if ($_POST['user_email'] !== '' && $_POST['user_password'] !== '') {
    require_once (dirname(__FILE__) . '/../assets/functions/dbconnect.php');

    $login = $dbh->prepare('SELECT * FROM users WHERE user_email=?');
    $login->execute(array(
      $_POST['user_email'],
    ));
    $user = $login->fetch();

    if(password_verify($_POST['user_password'], $user['user_password'])) {
      // セッションを再生成
      session_regenerate_id(true);
      $_SESSION['user_login'] = 1;
      $_SESSION['user_id'] = $user['user_id'];
      $_SESSION['user_name'] = $user['user_name'];
      $_SESSION['user_email'] = $user['user_email'];
      $_SESSION['user_postal1'] = $user['user_postal1'];
      $_SESSION['user_postal2'] = $user['user_postal2'];
      $_SESSION['user_address'] = $user['user_address'];
      $_SESSION['user_tel'] = $user['user_tel'];
      $_SESSION["chk_ssid"]  = session_id();

      setcookie("user_email", $_POST['user_email'], time() + 60*60*24*14, "/");

      header('Location: /index.php');
      exit();

    } else {
      $error['login'] = 'failed';
    }
  } else {
    $error['login'] = 'blank';
  }
}



?>

<?php include(dirname(__FILE__).'/../assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/../assets/_inc/_header.php'); ?>

  <main class="login-background">
    <section class="login">
      <div class="section-inner">
        <form class="login-form" method="post">
          <p class="login-form__title">ログイン</p>
          <?php if ($error['login'] === 'blank'): ?>
            <p class="form-error animate__animated animate__fadeInUp">メールドレスまたはパスワードを入力してください</p>
          <?php endif; ?>
          <?php if ($error['login'] === 'failed'): ?>
            <p class="form-error animate__animated animate__fadeInUp">メールドレスまたはパスワードを正しく入力してください</p>
          <?php endif; ?>

          <div class="input-box">
            <label class="input-box__label" for="js-input-user_email">メールアドレス</label>
            <input id="js-input-user_email" class="input-box__input" type="email" name="user_email" value="" autofocus >
          </div>
          
          <div class="input-box">
            <label class="input-box__label" for="js-input-user_password">パスワード</label>
            <input class="field js-password input-box__input" id="js-input-user_password" type="password" name="user_password" value="" autocomplete="off">
            <div class="show-btn">
              <input class="btn-input js-password-toggle" id="eye" type="checkbox">
              <label class="btn-label js-password-label" for="eye"><i class="far fa-eye"></i></label>
            </div>
          </div>

          <p class="login-form__text text-c">パスワードをお忘れの方は<a href="#" style="color:blue;">こちら</a></p>

          <div class="submit">
            <input class="btn btn--ok" type="submit" value="ログイン">
          </div>

        </form>
        
      </div>
    </section>
  </main>
  
  <script>
  const passwordToggle = document.querySelector('.js-password-toggle');
  passwordToggle.addEventListener('change', function () {
    const password = document.querySelector('.js-password'),
          passwordLabel = document.querySelector('.js-password-label');
    if (password.type === 'password') {
      password.type = 'text';
      passwordLabel.innerHTML = '<i class="far fa-eye-slash"></i>';
    } else {
      password.type = 'password';
      passwordLabel.innerHTML = '<i class="fas fa-eye"></i>';
    }
    password.focus();
  });
</script> 


<?php include(dirname(__FILE__).'/../assets/_inc/_footer.php'); ?>
