<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NewsDot
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container">

		<?php
		if ( is_active_sidebar( 'newsdot_footer_widget_1' ) ||
			is_active_sidebar( 'newsdot_footer_widget_2' ) ||
			is_active_sidebar( 'newsdot_footer_widget_3' ) ||
			is_active_sidebar( 'newsdot_footer_widget_4' ) ) {
			?>
			<div class="row mb-2 footer-widgets-row">
				<div class="col-md-3">
				<?php
				if ( is_active_sidebar( 'newsdot_footer_widget_1' ) ) :
					dynamic_sidebar( 'newsdot_footer_widget_1' );
				endif;
				?>
				</div>
				<div class="col-md-3">
				<?php
				if ( is_active_sidebar( 'newsdot_footer_widget_2' ) ) :
					dynamic_sidebar( 'newsdot_footer_widget_2' );
				endif;
				?>
				</div>
				<div class="col-md-3">
				<?php
				if ( is_active_sidebar( 'newsdot_footer_widget_3' ) ) :
					dynamic_sidebar( 'newsdot_footer_widget_3' );
				endif;
				?>
				</div>
				<div class="col-md-3">
				<?php
				if ( is_active_sidebar( 'newsdot_footer_widget_4' ) ) :
					dynamic_sidebar( 'newsdot_footer_widget_4' );
				endif;
				?>
				</div>
			</div>
		<?php }?>

			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="site-info">
						<span><?php echo esc_html__( 'Copyright &copy; ', 'newsdot' ) . esc_html( newsdot_the_year() ) . ' ' . esc_attr( get_bloginfo( 'name', 'display' ) ); ?></span>
						<span class="sep"> | </span>
						<span><?php echo esc_html__( 'Proudly powered by: ', 'newsdot' ); ?><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'newsdot' ) ); ?>" target="_blank"><?php esc_html_e( 'WordPress', 'newsdot' ); ?></a></span>
						<span class="sep"> | </span>
						<span><?php echo esc_html__( 'Theme: ', 'newsdot' ); ?><a href="<?php echo esc_url( __( 'https://wp-points.com/themes/newsdot', 'newsdot' ) ); ?>" target="_blank"><?php esc_html_e( 'NewsDot', 'newsdot' ); ?></a></span>
					</div><!-- .site-info -->
				</div>

				<div class="col-md-6">
				<?php
					if ( get_theme_mod( 'newsdot_show_topbar_social_links', true ) ) :
						$newsdot_social_links = get_theme_mod( 'newsdot_social_links', '' );
						if ( $newsdot_social_links ) {
							$nd_social_array = explode( ',', $newsdot_social_links );
							?>
							<ul class="nd-social-links d-flex flex-row-reverse">
								<?php foreach ( $nd_social_array as $nd_social_link ) : ?>
								<li><a class="far" target="_blank" href="<?php echo esc_url( trim( $nd_social_link ) ); ?>"></a></li>
								<?php endforeach; ?>
							</ul>
							<?php
						}
					endif;
					?>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
