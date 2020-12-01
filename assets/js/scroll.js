$(function() {

  $('.test').on('inview', function(event, isInView) {
    $('test').each(function() {
      if (isInView) {
        $(this).addClass('animated rollIn');
      } else {
        $(this).removeClass('animated rollIn');
      }
    });
  });



  // 各要素がInViewしたら各要素にanimateCSSを適用

  // ロゴ
  $('.logo02').on('inview', function(event, isInView) {
    if (isInView) {
      $('.logo02').addClass('animated rollIn');
    } else {
      $('.logo02').removeClass('animated rollIn');
    }
  });
  // ロゴ
  $('.logo').on('inview', function(event, isInView) {
    if (isInView) {
      $('.logo').addClass('animated rollIn');
    } else {
      $('.logo').removeClass('animated rollIn');
    }
  });

  // 各セクション
  
  $('#js-introduce__heading').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('animated fadeInUp');
    } else {
      $(this).removeClass('animated fadeInUp');
    }
  });
  $('#js-part-of-item__heading').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('animated fadeInUp');
    } else {
      $(this).removeClass('animated fadeInUp');
    }
  });
  $('#js-member__heading').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('animated fadeInUp');
    } else {
      $(this).removeClass('animated fadeInUp');
    }
  });
  $('#js-strength__heading').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('animated fadeInUp');
    } else {
      $(this).removeClass('animated fadeInUp');
    }
  });
  $('#js-new__heading').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('animated fadeInUp');
    } else {
      $(this).removeClass('animated fadeInUp');
    }
  });
  $('#js-products__heading').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('animated fadeInUp');
    } else {
      $(this).removeClass('animated fadeInUp');
    }
  });
  $('#js-detail__heading').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('animated fadeInUp');
    } else {
      $(this).removeClass('animated fadeInUp');
    }
  });
  $('#js-strength__heading02').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('animated fadeInUp');
    } else {
      $(this).removeClass('animated fadeInUp');
    }
  });
  $('#js-detail-more__heading').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('animated fadeInUp');
    } else {
      $(this).removeClass('animated fadeInUp');
    }
  });
  $('#js-carousel__heading').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('animated fadeInUp');
    } else {
      $(this).removeClass('animated fadeInUp');
    }
  });


  // 商品ページの中間イメージ
  $('.js-pulse').on('inview', function(event, isInView) {
    if (isInView) {
      $('.js-pulse').addClass('animated pulse');
    } else {
      $('.js-pulse').removeClass('animated pulse');
    }
  });

  // トップページの最初の画像その1
  $('#intro-box01').on('inview', function(event, isInView) {
    if (isInView) {
      $('#intro-box01').addClass('animated fadeIn');
    } else {
      $('#intro-box01').removeClass('animated fadeIn');
    }
  });

  // トップページの最初の画像その2
  $('#intro-box02').on('inview', function(event, isInView) {
    if (isInView) {
      $('#intro-box02').addClass('animated fadeIn');
    } else {
      $('#intro-box02').removeClass('animated fadeIn');
    }
  });
  
  // メンバープロフィールのテキストその1
  $('#profile-card__text01').on('inview', function(event, isInView) {
    if (isInView) {
      $('#profile-card__text01').addClass('animated fadeInLeft');
    } else {
      $('#profile-card__text01').removeClass('animated fadeInLeft');
    }
  });

  // メンバープロフィールのテキストその2
  $('#profile-card__text02').on('inview', function(event, isInView) {
    if (isInView) {
      $('#profile-card__text02').addClass('animated fadeInLeft');
    } else {
      $('#profile-card__text02').removeClass('animated fadeInLeft');
    }
  });

});