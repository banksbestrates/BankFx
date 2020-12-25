<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MagazineBook
 */

get_header();

$magazinebook_sidebar_class = '';
$magazinebook_content_class = '';
if ( get_theme_mod( 'magazinebook_archive_sidebar_position', 'right' ) === 'left' ) {
	$magazinebook_content_class = 'order-md-2';
	$magazinebook_sidebar_class = 'order-md-1';
}
?>

<div class="container">
	<div class="row justify-content-center">
		<div id="primary" class="content-area col-md-9 px-lg-3 <?php echo esc_html( $magazinebook_content_class ); ?>">
			<main id="main" class="site-main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
				<?php
				if ( is_category() ) {
					?>
					<h1 class="page-title cat-title"><?php single_cat_title(); ?></h1>
					<?php
				} elseif ( is_tag() ) {
					?>
					<h1 class="page-title tag-title"><?php single_tag_title(); ?></h1>
					<?php
				} else {
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				}
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;

				get_template_part( 'template-parts/navigation', 'none' );

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php if ( get_theme_mod( 'magazinebook_archive_sidebar_position', 'right' ) !== 'hide' ) : ?>
		<div class="col-md-3 px-lg-3 <?php echo esc_html( $magazinebook_sidebar_class ); ?>">
			<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>
	</div>
</div>

<?php
get_footer();
