jQuery(document).ready(function(jQuery) {

  "use strict";

  jQuery('.top-ticker-wrap').easyTicker({
    height: 'auto',
    visible: 1,
    interval: 3000,
    mousePause: true,
  });

  if ( jQuery( '.theme-banner-slider' ).length ) {
    new Splide( '.theme-banner-slider' ).mount();
  }

  jQuery('body').on('blur', '.main-navigation > div > ul > li:last-child', function(){
    jQuery('.main-navigation').removeClass('toggled');
  });

});
