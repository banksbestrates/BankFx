<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Seos__Magazine
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses seos_magazine_header_style()
 */
function seos_magazine_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'seos_magazine_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'A80000',
		'width'                  => 1000,
		'height'                 => 120,
		'flex-height'            => true,
		'wp-head-callback'       => 'seos_magazine_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'seos_magazine_custom_header_setup' );

if ( ! function_exists( 'seos_magazine_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see seos_magazine_custom_header_setup().
 */
function seos_magazine_header_style() {
	$header_text_color = get_header_textcolor();

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
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
	?>
		header .site-branding .site-title a,
		header .site-branding .site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // seos_magazine_header_style


