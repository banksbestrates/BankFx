<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MagazineBook
 */

?>

	</div><!-- #content -->

	<?php do_action( 'magazinebook_before_footer' ); ?>
	<footer id="colophon" class="site-footer">

		<?php get_sidebar( 'footer' ); ?>

		<?php
		if ( get_theme_mod( 'magazinebook_main_footer_design', 'design1' ) === 'design1' ) {
			magazinebook_display_main_footer_design_1();
		} elseif ( get_theme_mod( 'magazinebook_main_footer_design', 'design1' ) === 'design2' ) {
			magazinebook_display_main_footer_design_2();
		}
		?>

	</footer><!-- #colophon -->
	<?php do_action( 'magazinebook_after_footer' ); ?>

</div><!-- #page -->

<?php do_action( 'magazinebook_after_page' ); ?>

<?php wp_footer(); ?>

</body>
</html>
