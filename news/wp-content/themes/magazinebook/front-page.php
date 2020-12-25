<?php
/**
 * Template to show the front page.
 *
 * @package MagazineBook
 */

get_header();
?>

<?php

$magazinebook_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

if ( get_theme_mod( 'magazinebook_show_banner_section', true ) && 1 === $magazinebook_paged ) {
	magazinebook_display_banner_section();
}

if ( is_active_sidebar( 'magazinebook_frontpage_content_top_section' ) && 1 === $magazinebook_paged ) :
	?>
	<div id="content-top-section" class="theme-content-top-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<?php dynamic_sidebar( 'magazinebook_frontpage_content_top_section' ); ?>
				</div>
			</div>
		</div>
	</div>
	<?php
endif;
?>

<?php
$magazinebook_sidebar_class = '';
$magazinebook_content_class = '';
if ( get_theme_mod( 'magazinebook_frontpage_sidebar_position', 'right' ) === 'left' ) {
	$magazinebook_content_class = 'order-md-2';
	$magazinebook_sidebar_class = 'order-md-1';
}
?>

<div class="container">
	<div class="row justify-content-center">
		<div id="primary" class="content-area col-md-9 px-lg-3 <?php echo esc_html( $magazinebook_content_class ); ?> ">

			<?php
			if ( is_active_sidebar( 'magazinebook_frontpage_content_middle_section' ) && 1 === $magazinebook_paged ) :
				?>
				<div id="content-middle-section" class="theme-content-middle-area">
					<?php dynamic_sidebar( 'magazinebook_frontpage_content_middle_section' ); ?>
				</div>
				<?php
			endif;
			?>

			<main id="main" class="site-main">

			<?php
			if ( ! get_theme_mod( 'magazinebook_hide_frontpage_posts_page', false ) ) :
				if ( have_posts() ) :

					if ( is_page() ) :
						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					else :

						$counter = 1;

						if ( is_home() && ! is_front_page() ) :
							?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
							<?php
						endif;

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
					endif;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
			endif;
			?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php if ( get_theme_mod( 'magazinebook_frontpage_sidebar_position', 'right' ) !== 'hide' ) : ?>
		<div class="col-md-3 px-lg-3 <?php echo esc_html( $magazinebook_sidebar_class ); ?> ">
			<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>
	</div>
</div>

<?php
get_footer();
