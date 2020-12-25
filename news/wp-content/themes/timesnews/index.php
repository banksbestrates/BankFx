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
 * @package timesnews
 */

get_header();
$post_pagination = get_theme_mod('post-pagination','numeric');
?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php do_action ('timesnews_frontend_main_banner_after_hook');

		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php endif; ?>
			<div class="posts-holder">

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

				if($post_pagination =='default'){
					the_posts_navigation();
				} else {
					the_posts_pagination();
				} ?>
			</div><!-- .posts-holder -->

			<?php else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
	get_sidebar();
 ?>
</div><!-- .wrap -->
<?php
get_footer();
