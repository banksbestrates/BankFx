<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
		<section id="primary" class="content-area col-md-9 px-lg-3 <?php echo esc_html( $magazinebook_content_class ); ?>">
			<main id="main" class="site-main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'magazinebook' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

				endwhile;

				get_template_part( 'template-parts/navigation', 'none' );

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

			</main><!-- #main -->
		</section><!-- #primary -->

		<?php if ( get_theme_mod( 'magazinebook_archive_sidebar_position', 'right' ) !== 'hide' ) : ?>
		<div class="col-md-3 px-lg-3 <?php echo esc_html( $magazinebook_sidebar_class ); ?>">
			<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>
	</div>
</div>

<?php
get_footer();
