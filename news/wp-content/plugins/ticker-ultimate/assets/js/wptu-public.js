jQuery( document ).ready(function($) {

    // Initialize news ticker
    $( '.wptu-ticker-main' ).each(function( index ) {
        
        var ticker_id   = $(this).attr('id');
        var ticker_conf = $.parseJSON( $(this).find('.wptu-ticker-conf').text() );
        
        if( typeof(ticker_id) != 'undefined' && ticker_id != '' && ticker_conf != 'undefined' ) {
            
            jQuery('#'+ticker_id).wposTicker({
               	effect      : ticker_conf.effect,
                autoplay    : (ticker_conf.autoplay == 'false') ? false : true,
                timer       : parseInt(ticker_conf.timer),
                border      : (ticker_conf.border == 'false') ? false : true,
                fontstyle   : ticker_conf.font_style,
            });
        }
    });

});