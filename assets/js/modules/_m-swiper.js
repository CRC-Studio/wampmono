/**
* Module : Swiper
*/

// Initialise le module

export let $Swipers;
export const SwiperInit = () => {
  // Sélectionne l'élément conteneur du slider
  $Swipers = document.querySelectorAll('.swiper-container');

  $Swipers.forEach($Swiper => {

    // Initialise les options du Swiper
    const swiperOptions = {
      loop: true,
      preloadImages: false,
      lazy: true,
      autoplay: {
        delay: 4000,
      },
      pagination: {
        el: '.swiper-pagination',
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      }
    };

    // Initialise le slider avec les options définies
    const swiper = new Swiper($Swiper, swiperOptions);
  });
};
SwiperInit();