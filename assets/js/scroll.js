$(function() {

  $('.test').on('inview', function(event, isInView) {
    $('test').each(function() {
      if (isInView) {
        $(this).addClass('animate__animated animate__rollIn');
      } else {
        $(this).removeClass('animate__animated animate__rollIn');
      }
    });
  });



  // 各要素がInViewしたら各要素にanimateCSSを適用

  // ロゴ
  $('.logo02').on('inview', function(event, isInView) {
    if (isInView) {
      $('.logo02').addClass('animate__animated animate__rollIn');
    } else {
      $('.logo02').removeClass('animate__animated animate__rollIn');
    }
  });
  // ロゴ
  $('.logo').on('inview', function(event, isInView) {
    if (isInView) {
      $('.logo').addClass('animate__animated animate__rollIn');
    } else {
      $('.logo').removeClass('animate__animated animate__rollIn');
    }
  });

  // 各セクション
  
  $('#js-introduce__heading').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('animate__animated animate__fadeInUp');
    } else {
      $(this).removeClass('animate__animated animate__fadeInUp');
    }
  });
  $('#js-part-of-item__heading').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('animate__animated animate__fadeInUp');
    } else {
      $(this).removeClass('animate__animated animate__fadeInUp');
    }
  });
  $('#js-member__heading').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('animate__animated animate__fadeInUp');
    } else {
      $(this).removeClass('animate__animated animate__fadeInUp');
    }
  });
  $('#js-strength__heading').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('animate__animated animate__fadeInUp');
    } else {
      $(this).removeClass('animate__animated animate__fadeInUp');
    }
  });
  $('#js-new__heading').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('animate__animated animate__fadeInUp');
    } else {
      $(this).removeClass('animate__animated animate__fadeInUp');
    }
  });
  $('#js-products__heading').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('animate__animated animate__fadeInUp');
    } else {
      $(this).removeClass('animate__animated animate__fadeInUp');
    }
  });
  $('#js-detail__heading').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('animate__animated animate__fadeInUp');
    } else {
      $(this).removeClass('animate__animated animate__fadeInUp');
    }
  });
  $('#js-strength__heading02').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('animate__animated animate__fadeInUp');
    } else {
      $(this).removeClass('animate__animated animate__fadeInUp');
    }
  });
  $('#js-detail-more__heading').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('animate__animated animate__fadeInUp');
    } else {
      $(this).removeClass('animate__animated animate__fadeInUp');
    }
  });
  $('#js-carousel__heading').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('animate__animated animate__fadeInUp');
    } else {
      $(this).removeClass('animate__animated animate__fadeInUp');
    }
  });


  // 商品ページの中間イメージ
  $('.js-pulse').on('inview', function(event, isInView) {
    if (isInView) {
      $('.js-pulse').addClass('animate__animated animate__pulse');
    } else {
      $('.js-pulse').removeClass('animate__animated animate__pulse');
    }
  });

  // トップページの最初の画像その1
  $('#intro-box01').on('inview', function(event, isInView) {
    if (isInView) {
      $('#intro-box01').addClass('animate__animated animate__fadeIn');
    } else {
      $('#intro-box01').removeClass('animate__animated animate__fadeIn');
    }
  });

  // トップページの最初の画像その2
  $('#intro-box02').on('inview', function(event, isInView) {
    if (isInView) {
      $('#intro-box02').addClass('animate__animated animate__fadeIn');
    } else {
      $('#intro-box02').removeClass('animate__animated animate__fadeIn');
    }
  });
  
  // メンバープロフィールのテキストその1
  $('#profile-card__text01').on('inview', function(event, isInView) {
    if (isInView) {
      $('#profile-card__text01').addClass('animate__animated animate__fadeInLeft');
    } else {
      $('#profile-card__text01').removeClass('animate__animated animate__fadeInLeft');
    }
  });

  // メンバープロフィールのテキストその2
  $('#profile-card__text02').on('inview', function(event, isInView) {
    if (isInView) {
      $('#profile-card__text02').addClass('animate__animated animate__fadeInLeft');
    } else {
      $('#profile-card__text02').removeClass('animate__animated animate__fadeInLeft');
    }
  });

});