var mySwiper = new Swiper('.swiper-container', {

  speed: 1000,

  slidesPerView: 1.5,
  centeredSlides:true,
  breakpoints: {
    // 768px以上の場合
    768: {
      speed: 2000,
      slidesPerView: 2,
    },
    // 980px以上の場合
    980: {
      slidesPerView: 3,
    },
    // 1200px以上の場合
    1200: {
      slidesPerView: 4,
    }
  },

  autoplay: {
    delay: 500,
  },
  loop: true,


  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },


})