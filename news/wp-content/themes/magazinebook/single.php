<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package MagazineBook
 */

get_header();

$magazinebook_sidebar_class = '';
$magazinebook_content_class = '';
if ( get_theme_mod( 'magazinebook_single_sidebar_position', 'right' ) === 'left' ) {
	$magazinebook_content_class = 'order-md-2';
	$magazinebook_sidebar_class = 'order-md-1';
}
?>

<div class="container">
	<div class="row justify-content-center">
		<div id="primary" class="content-area col-md-9 px-lg-3 <?php echo esc_html( $magazinebook_content_class ); ?>">
			<main id="main" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'single' );

				get_template_part( 'template-parts/navigation', 'none' );

				if ( ! get_theme_mod( 'magazinebook_hide_similar_posts_single', false ) ) {
					get_template_part( 'template-parts/similar-posts', 'none' );
				}

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php if ( get_theme_mod( 'magazinebook_single_sidebar_position', 'right' ) !== 'hide' ) : ?>
		<div class="col-md-3 px-lg-3 <?php echo esc_html( $magazinebook_sidebar_class ); ?>">
			<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>
	</div>
</div>

<?php
get_footer();
