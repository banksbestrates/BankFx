<?php
/**
 * MagazineBook Category Dropdown Class
 *
 * @package MagazineBook
 */

/**
 * MagazineBook_Customize_MagazineBook_Support
 */
class MagazineBook_Customize_MagazineBook_Support extends WP_Customize_Control {
	/**
	 * Render content.
	 *
	 * @return void
	 */
	public function render_content() {
		?>
		<div class="mb-theme-info">
			<a href="<?php echo esc_url( 'https://wordpress.org/support/theme/magazinebook/' ); ?>" target="_blank">
			<?php esc_html_e( 'Support Forum &rarr;', 'magazinebook' ); ?>
			</a>
			<a href="<?php echo esc_url( 'https://odiethemes.com/docs/magazinebook/' ); ?>" target="_blank">
			<?php esc_html_e( 'Theme Docs &rarr;', 'magazinebook' ); ?>
			</a>
			<a href="<?php echo esc_url( 'https://magazinebook.odiethemes.com/' ); ?>" target="_blank">
			<?php esc_html_e( 'View Demo &rarr;', 'magazinebook' ); ?>
			</a>
		</div>

		<div class="mb-customizer-review-wrap">
			<h3><?php esc_html_e( 'Upgrade to Pro', 'magazinebook' ); ?></h3>
			<p>
				<?php
					esc_html_e( '‘MagazineBook Pro’ lets you have better control over the theme as it comes with more customization options.', 'magazinebook' );
				?>
			</p>
			<p>
				<?php
					esc_html_e( 'You get more font options, more header options, more banner designs to choose from.', 'magazinebook' );
				?>
			</p>
			<p>
				<a href="https://odiethemes.com/magazinebook-pro/" target="_blank"><?php esc_html_e( 'Learn More &rarr;', 'magazinebook' ); ?></a>
			</p>
		</div>

		<div class="mb-customizer-review-wrap">
			<h3><?php esc_html_e( 'Rate us 5-Star ', 'magazinebook' ); ?></h3>
			<p>
				<?php
					esc_html_e( 'If you can spare a minute, please help us by leaving a 5-star review on WordPress.org. By spreading the love, we can continue to develop new amazing features in the future, for free!', 'magazinebook' );
				?>
			</p>
			<p>
				<a href="https://wordpress.org/support/theme/magazinebook/reviews/?filter=5" target="_blank"><?php esc_html_e( 'Rate Us Now &rarr;', 'magazinebook' ); ?></a>
			</p>
		</div>
		<?php
	}
}
