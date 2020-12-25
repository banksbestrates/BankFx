<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
			<?php
			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
			?>
			<main id="main" class="site-main">

			<?php
			if ( have_posts() ) :

				$counter = 1;

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					if ( 1 === $counter ) :
						// Include the template for first post content.
						get_template_part( 'template-parts/content', 'first' );
					else :
						// Include the template for the content for other posts.
						get_template_part( 'template-parts/content', '' );
					endif;

					$counter++;

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
