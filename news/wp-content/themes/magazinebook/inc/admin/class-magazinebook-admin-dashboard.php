<?php
/**
 * Admin dashboard.
 *
 * @package MagazineBook
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Magazinebook_Admin_Dashboard
 */
class Magazinebook_Admin_Dashboard {

	/**
	 * Instance.
	 *
	 * @var string
	 */
	private static $instance;

	/**
	 * Instance.
	 *
	 * @return string
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * __construct
	 *
	 * @return void
	 */
	private function __construct() {
		$this->setup_hooks();
	}

	/**
	 * Setup hooks.
	 *
	 * @return void
	 */
	private function setup_hooks() {
		add_action( 'admin_menu', array( $this, 'create_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Enqueue scripts.
	 *
	 * @return void
	 */
	public function enqueue_scripts() {
		wp_enqueue_style( 'magazinebook-admin-dashboard', get_template_directory_uri() . '/css/admin/dashboard.css', array(), MAGAZINEBOOK_VERSION );
	}

	/**
	 * Create menu.
	 *
	 * @return void
	 */
	public function create_menu() {
		$theme_page_name = esc_html__( 'About MagazineBook', 'magazinebook' );

		$page = add_theme_page(
			$theme_page_name,
			$theme_page_name,
			'edit_theme_options',
			'about-magazinebook',
			array(
				$this,
				'about_page',
			)
		);
		add_action( 'admin_print_styles-' . $page, array( $this, 'enqueue_styles' ) );
	}

	/**
	 * Enqueue styles.
	 *
	 * @return void
	 */
	public function enqueue_styles() {
		wp_enqueue_style( 'magazinebook-dashboard', get_template_directory_uri() . '/css/admin/dashboard.css', array(), MAGAZINEBOOK_VERSION );
	}

	/**
	 * About page
	 *
	 * @return void
	 */
	public function about_page() {
		?>
		<div class="wrap magazinebook-about-wrap">
			<div class="magazinebook-header">
				<h1><?php esc_html_e( 'MagazineBook', 'magazinebook' ); ?><small>(<?php echo esc_html( MAGAZINEBOOK_VERSION ); ?>)</small></h1>
			</div>

			<div class="welcome-panel">
				<div class="welcome-panel-content">
					<h2><?php esc_html_e( 'Welcome to MagazineBook!', 'magazinebook' ); ?></h2>
					<p class="about-description">
						<?php esc_html_e( 'Following are some important links to get you started with MagazineBook.', 'magazinebook' ); ?>
					</p>

					<div class="welcome-panel-column-container">
						<div class="welcome-panel-column">
							<h3><?php esc_html_e( 'Get Started', 'magazinebook' ); ?></h3>
							<a class="button button-primary button-hero"
								href="<?php echo esc_url( 'https://odiethemes.com/docs/magazinebook/' ); ?>"
								target="_blank"><?php esc_html_e( 'Read Documentation', 'magazinebook' ); ?>
								</a>
						</div>
						<div class="welcome-panel-column">
							<h3><?php esc_html_e( 'Important Links', 'magazinebook' ); ?></h3>
							<ul>
								<li>
									<span class="dashicons dashicons-welcome-widgets-menus link-icons"></span>
									<a href="<?php echo esc_url( __( 'https://magazinebook.odiethemes.com/', 'magazinebook' ) ); ?>" target="_blank"><?php esc_html_e( 'View Live Demo', 'magazinebook' ); ?></a>
								</li>
								<li>
									<span class="dashicons dashicons-info link-icons"></span>
									<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/magazinebook/', 'magazinebook' ) ); ?>" target="_blank"><?php esc_html_e( 'Support Forum', 'magazinebook' ); ?></a>
								</li>
								<li>
									<span class="dashicons dashicons-email link-icons"></span>
									<a href="<?php echo esc_url( __( 'https://odiethemes.com/contact/', 'magazinebook' ) ); ?>" target="_blank"><?php esc_html_e( 'Contact Us', 'magazinebook' ); ?></a>
								</li>
							</ul>
						</div>
						<div class="welcome-panel-column">
							<h3><?php esc_html_e( 'Customize Settings', 'magazinebook' ); ?></h3>
							<ul>
								<li>
									<span class="dashicons dashicons-arrow-right-alt2 link-icons"></span>
									<a href="<?php echo esc_url( self_admin_url() ); ?>customize.php"><?php esc_html_e( 'Start Customizing', 'magazinebook' ); ?></a>
								</li>
								<li>
									<span class="dashicons dashicons-arrow-right-alt2 link-icons"></span>
									<a href="<?php echo esc_url( self_admin_url() ); ?>customize.php?autofocus[section]=magazinebook_banner_slider"><?php esc_html_e( 'Frontpage Banner Slider Settings', 'magazinebook' ); ?></a>
								</li>
								<li>
									<span class="dashicons dashicons-arrow-right-alt2 link-icons"></span>
									<a href="<?php echo esc_url( self_admin_url() ); ?>customize.php?autofocus[panel]=magazinebook_header_options"><?php esc_html_e( 'Header Settings', 'magazinebook' ); ?></a>
								</li>
							</ul>
						</div>

						<div class="magazinebook-clearfix"></div>
						<div class="magazinebook-rate-us">
							<h3><?php esc_html_e( 'Spread the Love', 'magazinebook' ); ?></h3>
							<p style="margin-top: 0"><?php esc_html_e( 'We hope you are happy with everything that the theme has to offer. If you can spare a minute, please help us by leaving a 5-star review on WordPress.org.  By spreading the love, we can continue to develop new amazing features in the future, for free!', 'magazinebook' ); ?></p>
							<p style="margin-bottom: 0">
								<a href="https://wordpress.org/support/theme/magazinebook/reviews/?filter=5#new-post" class="btn button-primary" target="_blank">
									<span><?php esc_html_e( 'Sure', 'magazinebook' ); ?></span> <span class="dashicons dashicons-thumbs-up"></span>
								</a>
							</p>
						</div>

						<div class="welcome-panel-column">
							<h3><?php esc_html_e( 'Set up your Frontpage', 'magazinebook' ); ?></h3>
							<ul>
								<li>
									<span class="dashicons dashicons-arrow-right-alt2 link-icons"></span>
									<a href="<?php echo esc_url( self_admin_url() ); ?>customize.php?autofocus[panel]=magazinebook_frontpage_options"><?php esc_html_e( 'Banner Section Settings', 'magazinebook' ); ?></a>
								</li>
								<li>
									<span class="dashicons dashicons-arrow-right-alt2 link-icons"></span>
									<a href="<?php echo esc_url( self_admin_url() ); ?>customize.php?autofocus[section]=sidebar-widgets-magazinebook_frontpage_content_top_section"><?php esc_html_e( 'Customize "Frontpage: Content Top Section"', 'magazinebook' ); ?></a>
								</li>
								<li>
									<span class="dashicons dashicons-arrow-right-alt2 link-icons"></span>
									<a href="<?php echo esc_url( self_admin_url() ); ?>customize.php?autofocus[section]=sidebar-widgets-magazinebook_frontpage_content_middle_section"><?php esc_html_e( 'Customize "Frontpage: Content Middle Section"', 'magazinebook' ); ?></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="welcome-panel mb-second-panel">
				<div class="welcome-panel-content">
					<h2><?php esc_html_e( 'Few More Links', 'magazinebook' ); ?></h2>
					<p class="about-description">
						<?php esc_html_e( 'Some more links which can help you in setting up your magazine website. ', 'magazinebook' ); ?>
					</p>

					<div class="welcome-panel-column-container">
						<div class="welcome-panel-column">
							<h3><?php esc_html_e( 'Demo Links', 'magazinebook' ); ?></h3>
							<ul>
								<li>
									<span class="dashicons dashicons-arrow-right-alt2 link-icons"></span>
									<a href="https://mbclassic.odiethemes.com/" target="_blank"><?php esc_html_e( 'Classic Demo', 'magazinebook' ); ?></a>
								</li>
								<li>
									<span class="dashicons dashicons-arrow-right-alt2 link-icons"></span>
									<a href="https://mbclassic-dark.odiethemes.com/" target="_blank"><?php esc_html_e( 'Classic Dark Demo', 'magazinebook' ); ?></a>
								</li>
								<li>
									<span class="dashicons dashicons-arrow-right-alt2 link-icons"></span>
									<a href="https://mbsimple.odiethemes.com/" target="_blank"><?php esc_html_e( 'Simple Demo (with ads)', 'magazinebook' ); ?></a>
								</li>
							</ul>
						</div>
						<div class="welcome-panel-column">
							<h3><?php esc_html_e( 'MagazineBook Pro', 'magazinebook' ); ?></h3>
							<ul>
								<li>
									<span class="dashicons dashicons-arrow-right-alt2 link-icons"></span>
									<a href="https://mbpro.odiethemes.com/" target="_blank"><?php esc_html_e( 'Pro Demo 1', 'magazinebook' ); ?></a>
								</li>
								<li>
									<span class="dashicons dashicons-arrow-right-alt2 link-icons"></span>
									<a href="https://mbpro-2.odiethemes.com/" target="_blank"><?php esc_html_e( 'Pro Demo 2', 'magazinebook' ); ?></a>
								</li>
								<li>
									<span class="dashicons dashicons-arrow-right-alt2 link-icons"></span>
									<a href="https://odiethemes.com/magazinebook-pro/" target="_blank"><?php esc_html_e( 'Learn More &rarr;', 'magazinebook' ); ?></a>
								</li>
							</ul>
						</div>
						<div class="welcome-panel-column">
							<h3><?php esc_html_e( 'Documentation Links ', 'magazinebook' ); ?></h3>
							<ul>
								<li>
									<span class="dashicons dashicons-arrow-right-alt2 link-icons"></span>
									<a href="https://odiethemes.com/docs/magazinebook/import-demo-content/" target="_blank"><?php esc_html_e( 'How to import Demo Content?', 'magazinebook' ); ?></a>
								</li>
								<li>
									<span class="dashicons dashicons-arrow-right-alt2 link-icons"></span>
									<a href="https://odiethemes.com/docs/magazinebook/how-to-setup-your-front-page-like-the-demo-website/" target="_blank"><?php esc_html_e( 'How to set up your front-page like the demo website?', 'magazinebook' ); ?></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

}

Magazinebook_Admin_Dashboard::instance();
