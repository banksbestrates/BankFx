<?php
/**
* Header Functions
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function textwp_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'textwp_pingback_header' );

// Get custom-logo URL
function textwp_custom_logo() {
    if ( ! has_custom_logo() ) {return;}
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $logo_attributes = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    $logo_src = $logo_attributes[0];
    return apply_filters( 'textwp_custom_logo', $logo_src );
}

// Site Title
function textwp_site_title() {
    if ( is_front_page() && is_home() ) { ?>
            <h1 class="textwp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php if ( !(textwp_get_option('hide_tagline')) ) { ?><p class="textwp-site-description"><span><?php bloginfo( 'description' ); ?></span></p><?php } ?>
    <?php } elseif ( is_home() ) { ?>
            <h1 class="textwp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php if ( !(textwp_get_option('hide_tagline')) ) { ?><p class="textwp-site-description"><span><?php bloginfo( 'description' ); ?></span></p><?php } ?>
    <?php } elseif ( is_singular() ) { ?>
            <p class="textwp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(textwp_get_option('hide_tagline')) ) { ?><p class="textwp-site-description"><span><?php bloginfo( 'description' ); ?></span></p><?php } ?>
    <?php } elseif ( is_category() ) { ?>
            <p class="textwp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(textwp_get_option('hide_tagline')) ) { ?><p class="textwp-site-description"><span><?php bloginfo( 'description' ); ?></span></p><?php } ?>
    <?php } elseif ( is_tag() ) { ?>
            <p class="textwp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(textwp_get_option('hide_tagline')) ) { ?><p class="textwp-site-description"><span><?php bloginfo( 'description' ); ?></span></p><?php } ?>
    <?php } elseif ( is_author() ) { ?>
            <p class="textwp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(textwp_get_option('hide_tagline')) ) { ?><p class="textwp-site-description"><span><?php bloginfo( 'description' ); ?></span></p><?php } ?>
    <?php } elseif ( is_archive() && !is_category() && !is_tag() && !is_author() ) { ?>
            <p class="textwp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(textwp_get_option('hide_tagline')) ) { ?><p class="textwp-site-description"><span><?php bloginfo( 'description' ); ?></span></p><?php } ?>
    <?php } elseif ( is_search() ) { ?>
            <p class="textwp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(textwp_get_option('hide_tagline')) ) { ?><p class="textwp-site-description"><span><?php bloginfo( 'description' ); ?></span></p><?php } ?>
    <?php } elseif ( is_404() ) { ?>
            <p class="textwp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(textwp_get_option('hide_tagline')) ) { ?><p class="textwp-site-description"><span><?php bloginfo( 'description' ); ?></span></p><?php } ?>
    <?php } else { ?>
            <h1 class="textwp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php if ( !(textwp_get_option('hide_tagline')) ) { ?><p class="textwp-site-description"><span><?php bloginfo( 'description' ); ?></span></p><?php } ?>
    <?php }
}

function textwp_header_image_destination() {
    $url = home_url( '/' );

    if ( textwp_get_option('header_image_destination') ) {
        $url = textwp_get_option('header_image_destination');
    }

    return apply_filters( 'textwp_header_image_destination', $url );
}

function textwp_header_image_markup() {
    if ( get_header_image() ) {
        if ( textwp_get_option('remove_header_image_link') ) {
            the_header_image_tag( array( 'class' => 'textwp-header-img', 'alt' => '' ) );
        } else { ?>
            <a href="<?php echo esc_url( textwp_header_image_destination() ); ?>" rel="home" class="textwp-header-img-link"><?php the_header_image_tag( array( 'class' => 'textwp-header-img', 'alt' => '' ) ); ?></a>
        <?php }
    }
}

function textwp_header_image_details() {
    $header_image_custom_title = '';
    if ( textwp_get_option('header_image_custom_title') ) {
        $header_image_custom_title = textwp_get_option('header_image_custom_title');
    }

    $header_image_custom_description = '';
    if ( textwp_get_option('header_image_custom_description') ) {
        $header_image_custom_description = textwp_get_option('header_image_custom_description');
    }

    if ( !(textwp_get_option('hide_header_image_details')) ) { ?>
    <div class="textwp-header-image-info">
    <div class="textwp-header-image-info-inside">
    <?php if ( $header_image_custom_title ) { ?>
        <p class="textwp-header-image-site-title textwp-header-image-block"><?php echo wp_kses_post( force_balance_tags( do_shortcode($header_image_custom_title) ) ); ?></p>
    <?php } else { ?>
        <p class="textwp-header-image-site-title textwp-header-image-block"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
    <?php } ?>

    <?php if ( $header_image_custom_description ) { ?>
        <?php if ( !(textwp_get_option('hide_header_image_description')) ) { ?><?php if ( $header_image_custom_description ) { ?><p class="textwp-header-image-site-description textwp-header-image-block"><?php echo wp_kses_post( force_balance_tags( do_shortcode($header_image_custom_description) ) ); ?></p><?php } ?><?php } ?>
    <?php } else { ?>
        <?php if ( !(textwp_get_option('hide_header_image_description')) ) { ?><p class="textwp-header-image-site-description textwp-header-image-block"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } ?>
    </div>
    </div>
    <?php }
}

function textwp_header_image_wrapper() {
    ?>
    <div class="textwp-header-image textwp-clearfix">
    <?php textwp_header_image_markup(); ?>
    <?php textwp_header_image_details(); ?>
    </div>
    <?php
}

function textwp_header_image() {
    if ( textwp_get_option('hide_header_image') ) { return; }
    if ( get_header_image() ) {
        textwp_header_image_wrapper();
    }
}