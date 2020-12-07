<?php
session_start();
session_regenerate_id(true);

define('TITLE', '管理メニュートップ');

if (isset($_SESSION['login']) === false) {
  header('Location: /admin/login/staff_login.php');
  exit();
} else {
  $staff_name = $_SESSION['staff_name'];
}

require_once (dirname(__FILE__) . '/assets/_inc/head.php');
require_once (dirname(__FILE__) . '/assets/_inc/header.php');
?>
<main class="main">
  <div class="section-container">
    <section class="menu">
      <h1 class="level1-heading">管理メニュー</h1>
      <p class="login-name"><?= $staff_name; ?>さん ログイン中</p>
      <ul class="cards cards--col2">
        <li class="cards__item">
          <a class="card__link" href="/admin/staff/staff_list.php">
            <article class="card">
              <figure class="card__imag-wrapper">
                <img class="card__img" src="/admin/assets/img/admin-top-staff.jpg" alt="画像の説明">
              </figure>
              <div class="card__body">
                <h3 class="card__title">スタッフ管理</h3>
                <p class="card__text">「スタッフの新規追加」「スタッフ情報の変更」「スタッフ一覧」など店舗スタッフの管理をします。</p>
              </div>
            </article>
          </a>
        </li>
        <li class="cards__item">
          <a class="card__link" href="/admin/product/pro_list.php">
            <article class="card">
              <figure class="card__imag-wrapper">
                <img class="card__img" src="/admin/assets/img/admin-top-cheese.jpg" alt="画像の説明">
              </figure>
              <div class="card__body">
                <h3 class="card__title">商品管理</h3>
                <p class="card__text">「商品登録」「商品情報の編集」「商品情報の参照」など商品の管理をします。</p>
              </div>
            </article>
          </a>
        </li>
        <li class="cards__item">
          <a class="card__link" href="https://cheese-wagon.crap.jp/" target="_blank">
            <article class="card">
              <figure class="card__imag-wrapper">
                <img class="card__img" src="/admin/assets/img/admin-top-preview.png" alt="画像の説明">
              </figure>
              <div class="card__body">
                <h3 class="card__title">公開中のサイト</h3>
                <p class="card__text">公開中のサイトを確認します</p>
              </div>
            </article>
          </a>
        </li>
        <li class="cards__item">
          <a class="card__link" href="/admin/login/staff_logout.php">
            <article class="card">
              <figure class="card__imag-wrapper">
                <img class="card__img" src="/admin/assets/img/admin-top-logout.jpg" alt="画像の説明">
              </figure>
              <div class="card__body">
                <h3 class="card__title">ログアウト</h3>
                <p class="card__text">管理画面からログアウトします。</p>
              </div>
            </article>
          </a>
        </li>
      </ul>
    </section>
  </div>
</main>
</body>
</html>