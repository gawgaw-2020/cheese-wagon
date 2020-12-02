<?php

session_start();
define("title", "商品詳細 | チーズワゴン 自家製モッツァレラチーズと世界の厳選チーズ");


?>

<?php include(dirname(__FILE__).'/../../assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__).'/../../assets/_inc/_header.php'); ?>

  <main>
    <section class="detail">
      <div class="section-inner">
        <h2 id="js-detail__heading" class="detail__heading section-heading">チーズ3種と有機はちみつのセット</h2>
        <div class="detail__box">
          <p class="detail__image01"><img src="/assets/image/product-picture/item-sample04@2x.jpg" alt="" width="544" height="544"></p>
          <div class="detail__right">
            <p class="detail__text01">Lorem ipsum dolor sit, amet consectetur adipisicing elitLorem ipsum dolor sit, amet consectetur adipisicing elitLorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe, sint.</p>
            <p class="detail__price">3,600 yen</p>
            <a class="detail__btn btn btn--operationcart" href="#">カートに追加する</a>
          </div>
        </div>
        <div class="js-pulse push">
          <p class="detail__text02">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae itaque error modi atque eveniet id cumque et dolore dolorem eos.</p>
          <p class="detail__image02 detail__image02--sp"><img src="/assets/image/product-page/product-page-sp@2x.jpg" alt="" width="166" height="256"></p>
          <p class="detail__image02 detail__image02--pc"><img src="/assets/image/product-page/product-page-pc@2x.jpg" alt="" width="536" height="256"></p>
        </div>
      </div>
    </section>
    <section class="strength">
      <div class="section-inner">
        <h2 id="js-strength__heading02" class="strength__heading section-heading">チーズワゴンのこだわり</h2>
        <ul class="strength__list">
          <li class="strength-item">
            <p class="strength-item__image"><img src="/assets/image/common/strength-image01@2x.jpg" alt="" width="280" height="150"></p>
            <p class="strength-item__text">地元の牧場から搾りたての牛乳を直接搬入して自家製のモッツァレラチーズを作ります。<br>
              シェフのおすすめレシピも同封しておりますので、ぜひお楽しみくださいませ。</p>
          </li>
          <li class="strength-item">
            <p class="strength-item__image"><img src="/assets/image/common/strength-image02@2x.jpg" alt="" width="280" height="150"></p>
            <p class="strength-item__text">地元の牧場から搾りたての牛乳を直接搬入して自家製のモッツァレラチーズを作ります。<br>
              シェフのおすすめレシピも同封しておりますので、ぜひお楽しみくださいませ。</p>
          </li>
          <li class="strength-item">
            <p class="strength-item__image"><img src="/assets/image/common/strength-image03@2x.jpg" alt="" width="280" height="150"></p>
            <p class="strength-item__text">地元の牧場から搾りたての牛乳を直接搬入して自家製のモッツァレラチーズを作ります。<br>
              シェフのおすすめレシピも同封しておりますので、ぜひお楽しみくださいませ。</p>
          </li>
        </ul>
      </div>
    </section>
    <section class="detail-more">
      <div class="section-inner">
        <h2 id="js-detail-more__heading" class="detail-more__heading section-heading">選択中の商品</h2>
        <p class="detail-more__title">熟成違い2種のマンチェゴセット</p>
        <p class="detail-more__label label label--price">2,000 yen</p>
        <p class="detail-more__image"><img src="/assets/image/product-picture/item-sample04@2x.jpg" alt="" width="544" height="544"></p>
        <a class="detail-more__btn btn btn--operationcart" href="">カートに追加する</a>
      </div>
    </section>
    <section class="carousel">
      <div class="section-inner">
        <h2 id="js-carousel__heading" class="carousel__heading section-heading">Cheese Gallery</h2>
        <div class="swiper-custom-parent">
          <div class="swiper-container">
            <div class="swiper-wrapper">
              <div class="swiper-slide"><a href="/products/product/"><img src="/assets/image/product-picture/slide-image01.jpg" alt=""></a></div>
              <div class="swiper-slide"><a href="/products/product/"><img src="/assets/image/product-picture/slide-image02.jpg" alt=""></a></div>
              <div class="swiper-slide"><a href="/products/product/"><img src="/assets/image/product-picture/slide-image03.jpg" alt=""></a></div>
              <div class="swiper-slide"><a href="/products/product/"><img src="/assets/image/product-picture/slide-image04.jpg" alt=""></a></div>
              <div class="swiper-slide"><a href="/products/product/"><img src="/assets/image/product-picture/slide-image05.jpg" alt=""></a></div>
              <div class="swiper-slide"><a href="/products/product/"><img src="/assets/image/product-picture/slide-image06.jpg" alt=""></a></div>
              <div class="swiper-slide"><a href="/products/product/"><img src="/assets/image/product-picture/slide-image07.jpg" alt=""></a></div>
              <div class="swiper-slide"><a href="/products/product/"><img src="/assets/image/product-picture/slide-image08.jpg" alt=""></a></div>
              <div class="swiper-slide"><a href="/products/product/"><img src="/assets/image/product-picture/slide-image09.jpg" alt=""></a></div>
              <div class="swiper-slide"><a href="/products/product/"><img src="/assets/image/product-picture/slide-image10.jpg" alt=""></a></div>
            </div>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
      </div>
    </section>
  </main>
  <?php include(dirname(__FILE__).'/../../assets/_inc/_footer.php'); ?>
