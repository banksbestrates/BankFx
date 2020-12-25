jQuery(document).ready(function($) {
    'use strict';

    if(textwp_ajax_object.primary_menu_active){

            if(textwp_ajax_object.sticky_menu_active){
            // grab the initial top offset of the navigation 
            var textwpstickyNavTop = $('.textwp-primary-menu-container').offset().top;
            
            // our function that decides weather the navigation bar should have "fixed" css position or not.
            var textwpstickyNav = function(){
                var textwpscrollTop = $(window).scrollTop(); // our current vertical position from the top
                     
                // if we've scrolled more than the navigation, change its position to fixed to stick to top,
                // otherwise change it back to relative

                if(textwp_ajax_object.sticky_mobile_menu_active){
                    if (textwpscrollTop > textwpstickyNavTop) {
                        $('.textwp-primary-menu-container').addClass('textwp-fixed');
                    } else {
                        $('.textwp-primary-menu-container').removeClass('textwp-fixed');
                    }
                } else {
                    if(window.innerWidth > 1112) {
                        if (textwpscrollTop > textwpstickyNavTop) {
                            $('.textwp-primary-menu-container').addClass('textwp-fixed');
                        } else {
                            $('.textwp-primary-menu-container').removeClass('textwp-fixed'); 
                        }
                    }
                }
            };

            textwpstickyNav();
            // and run it again every time you scroll
            $(window).scroll(function() {
                textwpstickyNav();
            });
            }

            //$(".textwp-nav-primary .textwp-primary-nav-menu").addClass("textwp-primary-responsive-menu").before('<div class="textwp-primary-responsive-menu-icon"></div>');
            $(".textwp-nav-primary .textwp-primary-nav-menu").addClass("textwp-primary-responsive-menu");

            $(".textwp-primary-responsive-menu-icon").click(function(){
                $(this).next(".textwp-nav-primary .textwp-primary-nav-menu").slideToggle();
            });

            $(window).resize(function(){
                if(window.innerWidth > 1112) {
                    $(".textwp-nav-primary .textwp-primary-nav-menu, nav .sub-menu, nav .children").removeAttr("style");
                    $(".textwp-primary-responsive-menu > li").removeClass("textwp-primary-menu-open");
                }
            });

            $(".textwp-primary-responsive-menu > li").click(function(event){
                if (event.target !== this)
                return;
                $(this).find(".sub-menu:first").toggleClass('textwp-submenu-toggle').parent().toggleClass("textwp-primary-menu-open");
                $(this).find(".children:first").toggleClass('textwp-submenu-toggle').parent().toggleClass("textwp-primary-menu-open");
            });

            $("div.textwp-primary-responsive-menu > ul > li").click(function(event) {
                if (event.target !== this)
                    return;
                $(this).find("ul:first").toggleClass('textwp-submenu-toggle').parent().toggleClass("textwp-primary-menu-open");
            });

    }

    if($(".textwp-social-icon-search").length){
        $(".textwp-social-icon-search").on('click', function (e) {
            e.preventDefault();
            document.getElementById("textwp-search-overlay-wrap").style.display = "block";
            const textwp_focusableelements = 'button, [href], input';
            const textwp_search_modal = document.querySelector('#textwp-search-overlay-wrap');
            const textwp_firstfocusableelement = textwp_search_modal.querySelectorAll(textwp_focusableelements)[0];
            const textwp_focusablecontent = textwp_search_modal.querySelectorAll(textwp_focusableelements);
            const textwp_lastfocusableelement = textwp_focusablecontent[textwp_focusablecontent.length - 1];
            document.addEventListener('keydown', function(e) {
              let isTabPressed = e.key === 'Tab' || e.keyCode === 9;
              if (!isTabPressed) {
                return;
              }
              if (e.shiftKey) {
                if (document.activeElement === textwp_firstfocusableelement) {
                  textwp_lastfocusableelement.focus();
                  e.preventDefault();
                }
              } else {
                if (document.activeElement === textwp_lastfocusableelement) {
                  textwp_firstfocusableelement.focus();
                  e.preventDefault();
                }
              }
            });
            textwp_firstfocusableelement.focus();
        });
    }

    if($(".textwp-search-closebtn").length){
        $(".textwp-search-closebtn").on('click', function (e) {
            e.preventDefault();
            document.getElementById("textwp-search-overlay-wrap").style.display = "none";
        });
    }


    $(".post").fitVids();

    if($(".textwp-scroll-top").length){
        var textwp_scroll_button = $( '.textwp-scroll-top' );
        textwp_scroll_button.hide();

        $( window ).scroll( function () {
            if ( $( window ).scrollTop() < 20 ) {
                $( '.textwp-scroll-top' ).fadeOut();
            } else {
                $( '.textwp-scroll-top' ).fadeIn();
            }
        } );

        textwp_scroll_button.click( function () {
            $( "html, body" ).animate( { scrollTop: 0 }, 300 );
            return false;
        } );
    }

    if(textwp_ajax_object.sticky_sidebar_active){
    $('.textwp-main-wrapper, .textwp-sidebar-wrapper').theiaStickySidebar({
        containerSelector: ".textwp-content-wrapper",
        additionalMarginTop: 0,
        additionalMarginBottom: 0,
        minWidth: 960,
    });

    $(window).resize(function(){
        $('.textwp-main-wrapper, .textwp-sidebar-wrapper').theiaStickySidebar({
            containerSelector: ".textwp-content-wrapper",
            additionalMarginTop: 0,
            additionalMarginBottom: 0,
            minWidth: 960,
        });
    });
    }

});