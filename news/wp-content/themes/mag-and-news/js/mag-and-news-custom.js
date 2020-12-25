jQuery(document).ready(function ($) {
//Post Carousel
    if ($('.ct-header-carousel').length > 0) {
        $(".ct-header-carousel").slick({
            slidesToShow: 3,
            accessibility: true,
            slidesToScroll: 1,
            dots: false,
            infinite: true,
            centerMode: false,
            autoplay: true,
            lazyLoad: 'ondemand',
            speed: 400,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        slidesToShow: 1
                    }
                }
            ]
        });
    }

    //Open Search form on search icon click
    if ($('.search-icon-box').length > 0) {
        $('.search-icon-box').on('click', function (e) {
            e.preventDefault();
            $('.slick-slider').hide();

        });
    }

    //Open Search form on search icon click
    if ($('.top-bar-search .close').length > 0) {
        $('.top-bar-search .close').on('click', function (e) {
            e.preventDefault();
            $('.slick-slider').show();

        });
    }


});
jQuery(window).load(function($) {
    if ( jQuery('.mag-and-news-article-wrapper .two-columns, .ct-post-list .two-columns').length > 0 ) {
        var $container = jQuery('.mag-and-news-article-wrapper, .ct-post-list');
        // initialize
        $container.masonry({
            itemSelector: '.two-columns',
            columnWidth: '.two-columns',
            percentPosition: true
        });
    }
});