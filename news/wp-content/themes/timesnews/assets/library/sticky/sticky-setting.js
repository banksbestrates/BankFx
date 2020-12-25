/*
 * Settings of the sticky menu
 */

jQuery(document).ready(function($){
    if ($(window).width() > 768) {
        jQuery("#nav-sticker").sticky({topSpacing:0});
    }
});