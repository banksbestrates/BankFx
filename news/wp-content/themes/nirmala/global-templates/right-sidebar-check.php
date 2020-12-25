<?php
/**
 * Right sidebar check
 *
 * @package nirmala
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

</div><!-- #closing the primary container from /global-templates/left-sidebar-check.php -->

<?php
$nirmala_sidebar_pos = get_theme_mod( 'nirmala_sidebar_position' );

if ( 'right' === $nirmala_sidebar_pos || 'both' === $nirmala_sidebar_pos ) {
	get_template_part( 'sidebar-templates/sidebar', 'right' );
}
