<?php
/**
 * App Landing Page Widgets
 *
 * @package magazine_edge
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function magazine_edge_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Main Sidebar', 'magazine-edge'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets for main sidebar.', 'magazine-edge'),
        'before_widget' => '<div id="%1$s" class="widget magazine-edge-widgets %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar-title"><h2 class="magazine-edge-widget-sidebar-title uppercase text-white mb-30 widget-title widget-title-1"><span>',
        'after_title' => '</span></h2></div>',
    ));


    register_sidebar(array(
        'name' => esc_html__('Footer Section', 'magazine-edge'),
        'id' => 'magazine-edge-footer-widget-area',
        'description' => esc_html__('Displays items on footer first column.', 'magazine-edge'),
        'before_widget' => '<div id="%1$s" class="%2$s footer-widget col-md-4 col-sm-6 col-xs-12">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="np-footer-widget-title uppercase text-white mb-30 widget-title widget-title-1"><span class="header-after">',
        'after_title' => '</span></h2>',
    ));


}

add_action('widgets_init', 'magazine_edge_widgets_init');

/**
 * Load widget featured post.
 */
require get_template_directory() . '/lib/widgets/widget-featured-post.php';

/**
 * Load widget Listed post.
 */
require get_template_directory() . '/lib/widgets/widget-listed-post.php';

/**
 * Load widget Listed post 2.
 */
require get_template_directory() . '/lib/widgets/widget-listed-post-2.php';

/**
 * Load widget Category post.
 */
require get_template_directory() . '/lib/widgets/widget-category-post.php';

/**
 * Load widget social link.
 */
require get_template_directory() . '/lib/widgets/widget-social-links.php';