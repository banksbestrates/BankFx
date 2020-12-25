<?php
/**
 * Magazine edge functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Magazine edge
 */

/**
 * Customizer other settings.
 */
require get_template_directory().'/lib/customizer/customizer.php';

/**
 * Customizer widgets settings.
 */
require get_template_directory().'/lib/widgets/widgets.php';
/**
 * Breadcrumbs setting
 */
require get_template_directory().'/lib/breadcrump.php';
/**
 * Other theme tags
 */
require get_template_directory() . '/lib/theme-tags.php';

/**
 * Other hooks
 */
require get_template_directory() . '/lib/theme-functions.php';
/**
 * plugin Recommendations.
 */
require_once  get_template_directory()  . '/lib/class-tgm-plugin-activation.php';
/**
 * hook recommend plugins.
 */

require get_template_directory(). '/lib/hook-tgm.php';
/**
 *
 * @global int $content_width
 */
function magazine_edge_content_width() {
	$GLOBALS['content_width'] = apply_filters('magazine_edge_content_width', 640);
}
add_action('after_setup_theme', 'magazine_edge_content_width', 0);

/**
 * Customizer More settings added
 */
require_once( trailingslashit( get_template_directory() ) . '/lib/more-customizer/class-customize.php' );
/**
 * Welcome Page.
 */
require get_template_directory() . '/welcome/welcome.php';