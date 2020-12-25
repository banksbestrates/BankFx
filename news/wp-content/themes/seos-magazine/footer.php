<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Seos__Magazine
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
		    <?php _e('All rights reserved', 'seos-magazine'); ?>  &copy; <?php bloginfo('name'); ?>	
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'seos-magazine' ) ); ?>"><?php printf( __( 'Powered by %s', 'seos-magazine' ), 'WordPress' ); ?></a>			
			<a title="<?php _e('Seos free wordpress themes', 'seos-magazine'); ?>" href="<?php echo esc_url(__('http://seosthemes.com/', 'seos-magazine')); ?>" rel="designer" target="_blank"><?php _e('Theme by SEOS', 'seos-magazine'); ?></a>	
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
			<?php if (get_theme_mod( 'seos_magazine_phone_number' )) { ?>
			<div class="mcn-footer">
				<a href="tel:[<?php echo esc_html(get_theme_mod('seos_magazine_phone_number')); ?>]">
					<img src="<?php echo esc_url(get_template_directory_uri()) . '/images/phone9.png'; ?>">
				</a>
			</div>
		    <?php } ?>
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
