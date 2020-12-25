<?php
/**
 * Sample implementation of the Custom Header feature
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses newsdot_header_style()
 */
function newsdot_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'newsdot_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => '4A5568',
				'width'              => 1600,
				'height'             => 200,
				'flex-height'        => true,
				'flex-width'         => true,
				'wp-head-callback'   => 'newsdot_header_style',
			)
		)
	);
}
// add_action( 'after_setup_theme', 'newsdot_custom_header_setup' );

if ( ! function_exists( 'newsdot_header_style' ) ) :
	function newsdot_header_style() {
		$header_text_color = get_header_textcolor();

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		if ( newsdot_is_header_bg_img() && has_header_image() ) :
		?>
			.site-header .nd-header-wrapper {
				background-image: url('<?php echo esc_url( get_header_image() ) ?>');
			}
		<?php
		endif;

		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
				}
			<?php
			// If the user has set a custom color for the text use that.
		else :
			if ( get_theme_support( 'custom-header', 'default-text-color' ) != $header_text_color ) {
			?>
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php } endif; ?>
		</style>
		<?php
	}
endif;
