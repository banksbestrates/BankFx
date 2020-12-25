<?php
/**
 * Hero setup
 *
 * @package nirmala
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$nirmala_container = get_theme_mod( 'nirmala_container_type' );

if ( is_active_sidebar( 'statichero' ) || is_active_sidebar( 'herocanvas' ) ) :
	?>

	<div class="wrapper" id="wrapper-hero">

		<?php
		get_template_part( 'sidebar-templates/sidebar', 'herocanvas' );
		get_template_part( 'sidebar-templates/sidebar', 'statichero' );
		?>

		<div class="<?php echo esc_attr( $nirmala_container ); ?>">
			<div class="row">
				<div class="col">
					<div class="border-bottom"></div>
				</div>
			</div>
		</div>

	</div>

	<?php
endif;
