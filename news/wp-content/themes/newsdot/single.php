<?php
/**
 * The template for displaying all single posts
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

					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content-single', get_post_type() );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
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

<section class="nd-single-post-nav">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<?php
				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle"><i class="far fa-arrow-alt-circle-left"></i></span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-title">%title</span> <span class="nav-subtitle"><i class="far fa-arrow-alt-circle-right"></i></span>',
					)
				);
			?>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
