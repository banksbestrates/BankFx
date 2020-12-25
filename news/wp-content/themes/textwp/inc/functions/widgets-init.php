<?php
/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function textwp_widgets_init() {

register_sidebar(array(
    'id' => 'textwp-sidebar',
    'name' => esc_html__( 'Sidebar Widgets (Everywhere)', 'textwp' ),
    'description' => esc_html__( 'This widget area is located on the sidebar of your website. Widgets of this widget area are displayed on every page of your website.', 'textwp' ),
    'before_widget' => '<div id="%1$s" class="textwp-side-widget widget textwp-box %2$s"><div class="textwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="textwp-widget-header"><h2 class="textwp-widget-title"><span class="textwp-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'textwp-home-sidebar',
    'name' => esc_html__( 'Sidebar Widgets (Default HomePage)', 'textwp' ),
    'description' => esc_html__( 'This widget area is located on the sidebar of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'textwp' ),
    'before_widget' => '<div id="%1$s" class="textwp-side-widget widget textwp-box %2$s"><div class="textwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="textwp-widget-header"><h2 class="textwp-widget-title"><span class="textwp-widget-title-inside">',
    'after_title' => '</span></h2></div>'));


register_sidebar(array(
    'id' => 'textwp-top-widgets',
    'name' => esc_html__( 'Above Content Widgets (Everywhere)', 'textwp' ),
    'description' => esc_html__( 'This widget area is located at the top of the main content of your website. Widgets of this widget area are displayed on every page of your website.', 'textwp' ),
    'before_widget' => '<div id="%1$s" class="textwp-main-widget widget textwp-box %2$s"><div class="textwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="textwp-widget-header"><h2 class="textwp-widget-title"><span class="textwp-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'textwp-home-top-widgets',
    'name' => esc_html__( 'Above Content Widgets (Default HomePage)', 'textwp' ),
    'description' => esc_html__( 'This widget area is located at the top of the main content of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'textwp' ),
    'before_widget' => '<div id="%1$s" class="textwp-main-widget widget textwp-box %2$s"><div class="textwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="textwp-widget-header"><h2 class="textwp-widget-title"><span class="textwp-widget-title-inside">',
    'after_title' => '</span></h2></div>'));


register_sidebar(array(
    'id' => 'textwp-bottom-widgets',
    'name' => esc_html__( 'Below Content Widgets (Everywhere)', 'textwp' ),
    'description' => esc_html__( 'This widget area is located at the bottom of the main content of your website. Widgets of this widget area are displayed on every page of your website.', 'textwp' ),
    'before_widget' => '<div id="%1$s" class="textwp-main-widget widget textwp-box %2$s"><div class="textwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="textwp-widget-header"><h2 class="textwp-widget-title"><span class="textwp-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'textwp-home-bottom-widgets',
    'name' => esc_html__( 'Below Content Widgets (Default HomePage)', 'textwp' ),
    'description' => esc_html__( 'This widget area is located at the bottom of the main content of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'textwp' ),
    'before_widget' => '<div id="%1$s" class="textwp-main-widget widget textwp-box %2$s"><div class="textwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="textwp-widget-header"><h2 class="textwp-widget-title"><span class="textwp-widget-title-inside">',
    'after_title' => '</span></h2></div>'));


register_sidebar(array(
    'id' => 'textwp-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Everywhere)', 'textwp' ),
    'description' => esc_html__( 'This full-width widget area is located after the primary menu of your website. Widgets of this widget area are displayed on every page of your website.', 'textwp' ),
    'before_widget' => '<div id="%1$s" class="textwp-main-widget textwp-top-fullwidth-widget textwp-box widget %2$s"><div class="textwp-top-fullwidth-widget-inside textwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="textwp-widget-header"><h2 class="textwp-widget-title"><span class="textwp-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'textwp-home-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Default HomePage)', 'textwp' ),
    'description' => esc_html__( 'This full-width widget area is located after the primary menu of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'textwp' ),
    'before_widget' => '<div id="%1$s" class="textwp-main-widget textwp-top-fullwidth-widget textwp-box widget %2$s"><div class="textwp-top-fullwidth-widget-inside textwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="textwp-widget-header"><h2 class="textwp-widget-title"><span class="textwp-widget-title-inside">',
    'after_title' => '</span></h2></div>'));


register_sidebar(array(
    'id' => 'textwp-fullwidth-bottom-widgets',
    'name' => esc_html__( 'Bottom Full Width Widgets (Everywhere)', 'textwp' ),
    'description' => esc_html__( 'This full-width widget area is located before the footer of your website. Widgets of this widget area are displayed on every page of your website.', 'textwp' ),
    'before_widget' => '<div id="%1$s" class="textwp-main-widget textwp-bottom-fullwidth-widget textwp-box widget %2$s"><div class="textwp-bottom-fullwidth-widget-inside textwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="textwp-widget-header"><h2 class="textwp-widget-title"><span class="textwp-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'textwp-home-fullwidth-bottom-widgets',
    'name' => esc_html__( 'Bottom Full Width Widgets (Default HomePage)', 'textwp' ),
    'description' => esc_html__( 'This full-width widget area is located before the footer of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'textwp' ),
    'before_widget' => '<div id="%1$s" class="textwp-main-widget textwp-bottom-fullwidth-widget textwp-box widget %2$s"><div class="textwp-bottom-fullwidth-widget-inside textwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="textwp-widget-header"><h2 class="textwp-widget-title"><span class="textwp-widget-title-inside">',
    'after_title' => '</span></h2></div>'));


register_sidebar(array(
    'id' => 'textwp-single-post-bottom-widgets',
    'name' => esc_html__( 'Single Post Bottom Widgets', 'textwp' ),
    'description' => esc_html__( 'This widget area is located at the bottom of single post of any post type (except attachments and pages).', 'textwp' ),
    'before_widget' => '<div id="%1$s" class="textwp-main-widget widget textwp-box %2$s"><div class="textwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="textwp-widget-header"><h2 class="textwp-widget-title"><span class="textwp-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'textwp-top-footer',
    'name' => esc_html__( 'Footer Top', 'textwp' ),
    'description' => esc_html__( 'This widget area is located on the top of the footer of your website.', 'textwp' ),
    'before_widget' => '<div id="%1$s" class="textwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="textwp-widget-title"><span class="textwp-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'textwp-footer-1',
    'name' => esc_html__( 'Footer 1', 'textwp' ),
    'description' => esc_html__( 'This widget area is the column 1 of the footer of your website.', 'textwp' ),
    'before_widget' => '<div id="%1$s" class="textwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="textwp-widget-title"><span class="textwp-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'textwp-footer-2',
    'name' => esc_html__( 'Footer 2', 'textwp' ),
    'description' => esc_html__( 'This widget area is the column 2 of the footer of your website.', 'textwp' ),
    'before_widget' => '<div id="%1$s" class="textwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="textwp-widget-title"><span class="textwp-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'textwp-footer-3',
    'name' => esc_html__( 'Footer 3', 'textwp' ),
    'description' => esc_html__( 'This widget area is the column 3 of the footer of your website.', 'textwp' ),
    'before_widget' => '<div id="%1$s" class="textwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="textwp-widget-title"><span class="textwp-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'textwp-footer-4',
    'name' => esc_html__( 'Footer 4', 'textwp' ),
    'description' => esc_html__( 'This widget area is the column 4 of the footer of your website.', 'textwp' ),
    'before_widget' => '<div id="%1$s" class="textwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="textwp-widget-title"><span class="textwp-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'textwp-bottom-footer',
    'name' => esc_html__( 'Footer Bottom', 'textwp' ),
    'description' => esc_html__( 'This widget area is located on the bottom of the footer of your website.', 'textwp' ),
    'before_widget' => '<div id="%1$s" class="textwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="textwp-widget-title"><span class="textwp-widget-title-inside">',
    'after_title' => '</span></h2>'));

}
add_action( 'widgets_init', 'textwp_widgets_init' );


function textwp_sidebar_one_widgets() {
    if ( is_front_page() && is_home() && !is_paged() ) {
    dynamic_sidebar( 'textwp-home-sidebar' );
    }

    dynamic_sidebar( 'textwp-sidebar' );
}


function textwp_top_wide_widgets() { ?>

<?php if ( is_active_sidebar( 'textwp-home-fullwidth-widgets' ) || is_active_sidebar( 'textwp-fullwidth-widgets' ) ) : ?>
<div class="textwp-top-wrapper-outer textwp-clearfix">
<div class="textwp-featured-posts-area textwp-top-wrapper textwp-clearfix">
<?php if ( is_front_page() && is_home() && !is_paged() ) { ?>
<?php dynamic_sidebar( 'textwp-home-fullwidth-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'textwp-fullwidth-widgets' ); ?>
</div>
</div>
<?php endif; ?>

<?php }


function textwp_top_widgets() { ?>

<?php if ( is_active_sidebar( 'textwp-home-top-widgets' ) || is_active_sidebar( 'textwp-top-widgets' ) ) : ?>
<div class="textwp-featured-posts-area textwp-featured-posts-area-top textwp-clearfix">
<?php if ( is_front_page() && is_home() && !is_paged() ) { ?>
<?php dynamic_sidebar( 'textwp-home-top-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'textwp-top-widgets' ); ?>
</div>
<?php endif; ?>

<?php }


function textwp_bottom_widgets() { ?>

<?php if ( is_active_sidebar( 'textwp-home-bottom-widgets' ) || is_active_sidebar( 'textwp-bottom-widgets' ) ) : ?>
<div class='textwp-featured-posts-area textwp-featured-posts-area-bottom textwp-clearfix'>
<?php if ( is_front_page() && is_home() && !is_paged() ) { ?>
<?php dynamic_sidebar( 'textwp-home-bottom-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'textwp-bottom-widgets' ); ?>
</div>
<?php endif; ?>

<?php }


function textwp_bottom_wide_widgets() { ?>

<?php if ( is_active_sidebar( 'textwp-home-fullwidth-bottom-widgets' ) || is_active_sidebar( 'textwp-fullwidth-bottom-widgets' ) ) : ?>
<div class="textwp-bottom-wrapper-outer textwp-clearfix">
<div class="textwp-featured-posts-area textwp-bottom-wrapper textwp-clearfix">
<?php if ( is_front_page() && is_home() && !is_paged() ) { ?>
<?php dynamic_sidebar( 'textwp-home-fullwidth-bottom-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'textwp-fullwidth-bottom-widgets' ); ?>
</div>
</div>
<?php endif; ?>

<?php }


function textwp_post_bottom_widgets() {
    if ( is_active_sidebar( 'textwp-single-post-bottom-widgets' ) ) : ?>
        <div class="textwp-featured-posts-area textwp-clearfix">
        <?php dynamic_sidebar( 'textwp-single-post-bottom-widgets' ); ?>
        </div>
    <?php endif;
}