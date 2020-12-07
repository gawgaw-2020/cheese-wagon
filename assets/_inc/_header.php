<body>
  <header class="header">
    <div class="header-inner">
      <div class="product-logo">
        <a class="logo" href="/" target="_self"><img src="/assets/image/common/logo.png" alt=""></a>
        <p><a href="/" target="_self">Cheese Wagon</a></p>
      </div>
      <!-- Navigation toggle button for Smartphone-->
      <div class="ham" id="ham">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <nav id="menu" class="header__nav-top">
        <div class="balloon">
          <div class="faceicon">
            <h1  class="product-logo-sp">
              <a href="/" target="_self">
                <img alt="お店のロゴ" src="/assets/image/common/logo.png">
              </a>
            </h1>
          </div>
          <div class="chatting">
            <div class="says">
              <p>
                2020.10.30 オープン
                <br>
                オープン記念 送料無料
              </p>
            </div>
          </div>
        </div>
        <ul class="gb-menu">
          <li><a class="js-gb-menu-item" href="/products/" target="_self">Items<span>-商品一覧-</span></a></li>
          <li><a class="js-gb-menu-item" href="/index.php#introduce" target="_self">Concept<span>-こだわり-</span></a></li>
          <li><a class="js-gb-menu-item" href="/cart/" target="_self">Cart<span>-ショッピングカート-</span></a></li>
        <?php if (isset($_SESSION['user_login']) === true): ?>
          <li><a class="js-gb-menu-item" href="/user-login/logout.php">Logout<span>-ログアウト-</span></a></li>
        <?php else: ?>
          <li><a class="js-gb-menu-item" href="/user-login/">Login<span>-会員ログイン-</span></a></li>
        <?php endif; ?>
        </ul>
      </nav>
    </div>
  </header>