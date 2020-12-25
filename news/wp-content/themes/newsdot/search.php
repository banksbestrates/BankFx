<?php
/**
 * The template for displaying search results pages
 */

get_header();
?>

<div id="content" class="site-content">
	<div class="container">
		<div class="row align-content-center justify-content-center">

			<?php if ( get_theme_mod( 'newsdot_site_layout', 'right' ) === 'left' ) : ?>
			<div class="col-lg-3 order-lg-0 order-1">
				<?php get_sidebar(); ?>
			</div>
			<?php endif; ?>

			<?php if ( get_theme_mod( 'newsdot_site_layout', 'right' ) === 'full' ) : ?>
			<div class="col-lg-12">
			<?php else : ?>
			<div class="col-lg-9">
			<?php endif; ?>
				<main id="primary" class="site-main">

					<?php if ( have_posts() ) : ?>

						<header class="page-header">
							<h1 class="page-title"><span>
								<?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Search Results for: %s', 'newsdot' ), '<span>' . get_search_query() . '</span>' );
								?>
							</span></h1>
						</header><!-- .page-header -->

						<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 nd-posts-row">
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								?>
								<div class="col">
									<?php
									get_template_part( 'template-parts/content', 'search' );
									?>
								</div>
								<?php
							endwhile;
							?>

						</div>

						<div class="clearfix"></div>
						<?php

						the_posts_pagination( array(
							'mid_size'  => 2,
							'prev_text' => __( 'Back', 'newsdot' ),
							'next_text' => __( 'Next', 'newsdot' ),
						) );

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>

				</main><!-- #main -->
			</div>

			<?php if ( get_theme_mod( 'newsdot_site_layout', 'right' ) === 'right' ) : ?>
				<div class="col-lg-3">
					<?php get_sidebar(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php
get_footer();
