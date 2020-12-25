<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MagazineBook
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} else {
	do_action( 'wp_body_open' );
}
?>

<?php do_action( 'magazinebook_before_page' ); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'magazinebook' ); ?></a>

	<?php do_action( 'magazinebook_before_header' ); ?>

		<?php
		if ( get_theme_mod( 'magazinebook_main_header_design', 'design1' ) === 'design1' ) {
			magazinebook_display_main_header_design_1();
		} elseif ( get_theme_mod( 'magazinebook_main_header_design', 'design1' ) === 'design2' ) {
			magazinebook_display_main_header_design_2();
		}
		?>

	<?php do_action( 'magazinebook_after_header' ); ?>

	<?php
	if ( ( ! is_front_page() ) && function_exists( 'yoast_breadcrumb' ) && ( get_theme_mod( 'magazinebook_show_breadcrumbs', false ) ) ) :
		?>
		<div class="theme-breadcrumb-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php
						if ( function_exists( 'yoast_breadcrumb' ) ) {
							yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
	endif;
	?>
	<div id="content" class="site-content">
