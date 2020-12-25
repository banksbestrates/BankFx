jQuery(document).ready(function(jQuery) {

  if( jQuery('#nd-top-stories-carousel').length ) {
    jQuery("#nd-top-stories-carousel").owlCarousel({
      items: 1,
      loop: true,
      nav: true,
      dots: false,
      autoplay: true,
      autoplayHoverPause: true
    });
  }

  if( jQuery('#nd-banner-slider-carousel').length ) {
    var ndAutoPlay = jQuery("#nd-banner-slider-carousel").attr("data-ndAutoPlay");
    if(ndAutoPlay) {
      ndAutoPlay = true;
    }
    else {
      ndAutoPlay = false;
    }
    jQuery("#nd-banner-slider-carousel").owlCarousel({
      items: 1,
      loop: true,
      nav: true,
      dots: false,
      autoplay: ndAutoPlay,
      autoplayTimeout: 5000,
      autoplayHoverPause: true
    });
  }

});
