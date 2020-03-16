export default {
  init() {
    // JavaScript to be fired on all pages
    jQuery('header').sticky({ top: 0, zIndex: 1000 });

    jQuery('.mobile-button').on('click', function () {
      jQuery('body').addClass('overflow-hidden');
      jQuery('.mobile-menu').addClass('mobile-menu-open');
    });
    jQuery('.mobile-close').on('click', function () {
      jQuery('body').removeClass('overflow-hidden');
      jQuery('.mobile-menu').removeClass('mobile-menu-open');
    });

    var mySwiper = new Swiper('.bewoner-slider', {
      // Optional parameters
      direction: 'horizontal',
      loop: true,

      // If we need pagination
      pagination: {
        el: '.swiper-pagination',
      },

      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    jQuery(function() {
      jQuery('.newsitem h2').matchHeight();
      jQuery('.newsitem .the_excerpt').matchHeight();
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
