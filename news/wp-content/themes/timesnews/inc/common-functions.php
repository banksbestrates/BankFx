<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package timesnews
 */

//Excerpt More
function timesnews_excerpt_more( $link ) {
   $excerpt_text = get_theme_mod('excerpt_text',esc_html__('Read More','timesnews'));
    if ( is_admin() ) {
        return $link;
    }

    $link = sprintf(
        '<a href="%1$s" class="more-link">%2$s</a>',
        esc_url( get_permalink( get_the_ID() ) ),
        /* translators: %s: Name of current post */
        sprintf( $excerpt_text, get_the_title( get_the_ID() ) )
    );
    return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'timesnews_excerpt_more' );

//Excerpt length
function timesnews_excerpt_length($length) {
    $excerpt_length = get_theme_mod('excerpt_length','30');
    if( is_admin() ){
        return absint($length);
    }

    $length = $excerpt_length;
    return absint($length);
}
add_filter('excerpt_length', 'timesnews_excerpt_length');

// Site Info
function timesnews_site_info(){ ?>
    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'timesnews' ) ); ?>">
<?php
/* translators: %s: CMS name, i.e. WordPress. */
printf( esc_html__( 'Proudly powered by %s', 'timesnews' ), 'WordPress' );
?>
</a>
<span class="sep"> | </span>
<?php
/* translators: 1: Theme name, 2: Theme author. */
printf( esc_html__( 'Theme: %1$s By %2$s.', 'timesnews' ), __('TimesNews <span class="sep"> | </span> ','timesnews'),'<a href="'.esc_url('https://themespiral.com/') .'">' . esc_html__('ThemeSpiral.com','timesnews').'</a>' );
}

add_action ('timesnews_footer_copyright_frontend','timesnews_site_info');
