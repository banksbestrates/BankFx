<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NewsDot
 */

if ( ! is_active_sidebar( 'newsdot-sidebar-main' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'newsdot-sidebar-main' ); ?>
</aside><!-- #secondary -->
