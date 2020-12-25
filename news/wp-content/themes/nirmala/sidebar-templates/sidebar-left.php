<?php
/**
 * The sidebar containing the main widget area
 *
 * @package nirmala
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'left-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$nirmala_sidebar_pos = get_theme_mod( 'nirmala_sidebar_position' );
?>

<?php if ( ( is_active_sidebar( 'right-sidebar' ) && 'both' === $nirmala_sidebar_pos ) ) : ?>
<div class="col-sm-6 col-md-3 col-lg-2 widget-area order-2 order-md-1" id="left-sidebar" role="complementary">

<?php else : ?>
<div class="col-md-4 col-lg-3 col-xxl-2 widget-area order-2 order-md-1" id="left-sidebar" role="complementary">

<?php endif; ?>

<?php dynamic_sidebar( 'left-sidebar' ); ?>

</div><!-- #left-sidebar -->
