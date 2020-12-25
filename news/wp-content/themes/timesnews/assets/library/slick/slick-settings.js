jQuery(document).ready(function($) {
  //For RTL
  var RTL = false;
  if( $('html').attr('dir') == 'rtl' ) {
  RTL = true;
  }
  //Slider
  jQuery('.banner-list').slick({
    autoplay: true,
    infinite: true,
    speed: 1000,
    cssEase: 'linear',
    fade: true,
    adaptiveHeight: true,
    rtl: RTL,
    rows: 0,
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1
  });

  jQuery('.highlighted-category-posts').slick({
    autoplay: true,
    vertical: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    Speed: 2000,
    infinite: true,
    rows: 0,
    nextArrow: '<i class="hl-category-nav hl-next fa fa-angle-down"></i>',
    prevArrow: '<i class="hl-category-nav hl-prev fa fa-angle-up"></i>',
    appendArrows: jQuery('.hl-category-navigation'),
    responsive: [
      {
            breakpoint: 1200,
            settings: {
                slidesToShow: 1
            }
      }
    ]
  });

  jQuery(".main-content-area .category-slide, .advertise-area .category-slide").slick({
   
    autoplay: true,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    speed: 2000,
    rtl: RTL,
    rows: 0,
    nextArrow: '<i class="category-slide-nav cs-prev fa fa-angle-right"></i>',
    prevArrow: '<i class="category-slide-nav cs-next fa fa-angle-left"></i>',
    responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },

                    {
                        breakpoint: 500,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
  });

    jQuery("#secondary .category-slide, .left-widget-area .category-slide, .right-widget-area .category-slide, .category-slide-single, #colophon .category-slide").slick({
    autoplay: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    speed: 1000,
    rtl: RTL,
    rows: 0,
    nextArrow: '<i class="category-slide-nav cs-prev fa fa-angle-right"></i>',
    prevArrow: '<i class="category-slide-nav cs-next fa fa-angle-left"></i>',
  });
  
});