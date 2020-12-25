<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Seos__Magazine
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() ); ?>

			<div class="postpagination">
				<span class="prevpost"><?php previous_post_link('%link', __(' <span class="meta-nav">&larr;</span>previous', 'seos-magazine')); ?></span>
				<span class="nextpost"><?php next_post_link('%link', __('next <span class="meta-nav">&rarr;</span>', 'seos-magazine')); ?></span>
			</div>

			<?php // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
