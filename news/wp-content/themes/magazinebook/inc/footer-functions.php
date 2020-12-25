<?php
/**
 * Functions which enhance the theme foter
 *
 * @package MagazineBook
 */

/**
 * Display footer design 1.
 *
 * @return void
 */
function magazinebook_display_main_footer_design_1() {
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="site-info">
					<span>
						<?php esc_html_e( 'Powered By: ', 'magazinebook' ); ?>
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'magazinebook' ) ); ?>" target="_blank"><?php esc_html_e( 'WordPress', 'magazinebook' ); ?></a>
					</span>
					<span class="sep"> | </span>
					<span>
						<?php esc_html_e( 'Theme: ', 'magazinebook' ); ?>
						<a href="<?php echo esc_url( __( 'https://odiethemes.com/themes/magazinebook/', 'magazinebook' ) ); ?>" target="_blank"><?php esc_html_e( 'MagazineBook', 'magazinebook' ); ?></a>
						<?php esc_html_e( ' By OdieThemes', 'magazinebook' ); ?>
					</span>
				</div><!-- .site-info -->
			</div>
		</div>
	</div>
	<?php
}

/**
 * Display footer design 2.
 *
 * @return void
 */
function magazinebook_display_main_footer_design_2() {
	?>
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 px-lg-3">
				<div class="site-info">
					<span>
						<?php esc_html_e( 'Powered By: ', 'magazinebook' ); ?>
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'magazinebook' ) ); ?>" target="_blank"><?php esc_html_e( 'WordPress', 'magazinebook' ); ?></a>
					</span>
					<span class="sep"> | </span>
					<span>
						<?php esc_html_e( 'Theme: ', 'magazinebook' ); ?>
						<a href="<?php echo esc_url( __( 'https://odiethemes.com/themes/magazinebook/', 'magazinebook' ) ); ?>" target="_blank"><?php esc_html_e( 'MagazineBook', 'magazinebook' ); ?></a>
						<?php esc_html_e( ' By OdieThemes', 'magazinebook' ); ?>
					</span>
				</div><!-- .site-info -->
			</div>

			<div class="col-md-6 px-lg-3">
				<div class="text-right">
					<?php
					if ( get_theme_mod( 'magazinebook_main_footer_right', 'social' ) === 'social' ) :
						magazinebook_display_social_links();
					else :
						echo esc_html( get_theme_mod( 'magazinebook_main_footer_right_text' ) );
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
	<?php
}
