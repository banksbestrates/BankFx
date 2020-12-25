<?php
/**
 * Left sidebar check
 *
 * @package nirmala
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$nirmala_sidebar_pos = get_theme_mod( 'nirmala_sidebar_position' );

if ( 'left' === $nirmala_sidebar_pos || 'both' === $nirmala_sidebar_pos ) {
	get_template_part( 'sidebar-templates/sidebar', 'left' );
}
?>

<div class="col col-sm-12 col-md order-1 order-md-2 order-lg-1 content-area" id="primary">
