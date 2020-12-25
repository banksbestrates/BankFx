<?php
/**
 * Admin Notice.
 *
 * @package MagazineBook
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Magazinebook Admin Notice
 */
class Magazinebook_Admin_Welcome_Notice {

	/**
	 * __construct
	 */
	public function __construct() {
		$this->setup_hooks();
		add_action( 'wp_loaded', array( $this, 'welcome_notice' ), 20 );
		add_action( 'wp_loaded', array( $this, 'hide_notices' ), 15 );
	}

	/**
	 * Setup hooks.
	 *
	 * @return void
	 */
	private function setup_hooks() {
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
	 * Welcome notice.
	 *
	 * @return void
	 */
	public function welcome_notice() {
		if ( ! get_option( 'magazinebook_admin_notice_welcome' ) ) {
			add_action( 'admin_notices', array( $this, 'welcome_notice_markup' ) );
		}
	}

	/**
	 * Welcome notice markup.
	 */
	public function welcome_notice_markup() {
		$mb_dismiss_url = wp_nonce_url(
			remove_query_arg( array( 'activated' ), add_query_arg( 'magazinebook-hide-notice', 'welcome' ) ),
			'magazinebook_hide_notices_nonce',
			'_magazinebook_notice_nonce'
		);
		?>
		<div id="message" class="notice notice-success magazinebook-notice">
			<a class="magazinebook-message-close notice-dismiss" href="<?php echo esc_url( $mb_dismiss_url ); ?>"><?php esc_html_e( 'Don\'t display this again.', 'magazinebook' ); ?></a>

			<div class="magazinebook-notice-header">
				<h3><?php esc_html_e( 'Congratulations!', 'magazinebook' ); ?></h3>
				<p class="notice-desc"><?php esc_html_e( 'MagazineBook is now installed and ready to use. We\'ve assembled some links to get you started.', 'magazinebook' ); ?></p>
				<hr>
			</div>

			<div class="magazinebook-notice-content-wrap">
				<div class="magazinebook-notice-image">
					<img class="magazinebook-screenshot" src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png" alt="<?php echo esc_attr( 'MagazineBook', 'magazinebook' ); ?>" />
				</div>

				<div class="magazinebook-notice-content">
					<div class="mb-notice-content-col">
						<h3>
							<span class="dashicons dashicons-welcome-widgets-menus"></span>
							<?php esc_html_e( 'Welcome Page', 'magazinebook' ); ?>
						</h3>
						<p><?php esc_html_e( 'To know more about the theme, visit our welcome page. You can check this page anytime to find all important links.', 'magazinebook' ); ?></p>
						<a href="<?php echo esc_url( admin_url( 'themes.php?page=about-magazinebook' ) ); ?>" class="button"><?php esc_html_e( 'Visit Welcome Page', 'magazinebook' ); ?></a>
					</div>
					<div class="mb-notice-content-col">
						<h3>
							<span class="dashicons dashicons-format-aside"></span>
							<?php esc_html_e( 'Documentation', 'magazinebook' ); ?>
						</h3>
						<p><?php esc_html_e( 'Need more details? Please check our full documentation for detailed information on how to use MagazineBook.', 'magazinebook' ); ?></p>
						<a href="<?php echo esc_url( 'https://odiethemes.com/docs/magazinebook/installation/' ); ?>" class="button" target="_blank"><?php esc_html_e( 'Read Documentation', 'magazinebook' ); ?></a>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Hide a notice if the GET variable is set.
	 */
	public function hide_notices() {
		if ( isset( $_GET['magazinebook-hide-notice'] ) && isset( $_GET['_magazinebook_notice_nonce'] ) ) { // WPCS: input var ok.
			if ( ! wp_verify_nonce( sanitize_key( $_GET['_magazinebook_notice_nonce'] ), 'magazinebook_hide_notices_nonce' ) ) {
				wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'magazinebook' ) );
			}

			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( esc_html__( 'Cheating is not allowed.', 'magazinebook' ) );
			}

			$hide_notice = sanitize_text_field( wp_unslash( $_GET['magazinebook-hide-notice'] ) );

			// Hide.
			if ( 'welcome' === $_GET['magazinebook-hide-notice'] ) {
				update_option( 'magazinebook_admin_notice_' . $hide_notice, 1 );
			} else { // Show.
				delete_option( 'magazinebook_admin_notice_' . $hide_notice );
			}
		}
	}
}

new Magazinebook_Admin_Welcome_Notice();
