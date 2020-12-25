jQuery(document).ready(function($) {

    jQuery('.marquee').marquee({
        //speed of the marquee
        speed: 50,
        //gap in pixels between the tickers
        delayBeforeStart: 0,
        //'left' or 'right'
        direction: 'left',
        //true or false - should the marquee be duplicated to show an effect of continues flow
        duplicated: true,
        pauseOnHover: true,
        startVisible: true

    });
    
});