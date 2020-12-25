<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class magazine_edge_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_template_directory() ) . '/lib/more-customizer/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'magazine_edge_Customize_Section_Pro' );

		// doc sections.
		$manager->add_section(
			new magazine_edge_Customize_Section_Pro(
				$manager,
				'magazine-edge',
				array(
					'title'    => esc_html__( 'Documentation', 'magazine-edge' ),
					'pro_text' => esc_html__( 'Click Here', 'magazine-edge' ),
					'pro_url'  => 'http://ratinatemplates.com/magazine-edge-doc/',
					'priority'  => 1
				)
			)
		);
		// upgrade sections.
		$manager->add_section(
			new magazine_edge_Customize_Section_Pro(
				$manager,
				'upgrade-pro',
				array(
					'title'    => esc_html__( 'Free theme Demo', 'magazine-edge'),
					'pro_text' => esc_html__( 'Click Here', 'magazine-edge' ),
					'pro_url'  => 'http://ratinatemplates.com/demo/magazine-edge/',
					'priority'  => 2
				)
			)
		);
	}
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'magazine-edge-customize-controls', trailingslashit( get_template_directory_uri() ) . '/lib/more-customizer/customize-controls.js', array( 'customize-controls' ) );
		wp_enqueue_style( 'magazine-edge-customize-controls', trailingslashit( get_template_directory_uri() ) . '/lib/more-customizer/customize-controls.css' );
	}
}
magazine_edge_Customize::get_instance();