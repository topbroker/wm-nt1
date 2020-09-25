import 'alpinejs'

$(document).ready(() => {

  new Swiper('.swiper-container-logos', {
    slidesPerView: 'auto',
    spaceBetween: 20,
    freeMode: true,
    breakpoints: {
      768: {
        freeMode: false,
        slidesPerView: 6,
        spaceBetween: 30,
      },
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  new Swiper('.swiper-container-testimonials', {
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });

});
