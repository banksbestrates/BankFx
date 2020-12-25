<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MagazineBook
 */

if ( ! is_active_sidebar( 'magazinebook_sidebar_1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'magazinebook_sidebar_1' ); ?>
</aside><!-- #secondary -->
