<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Seos__Magazine
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php if ( is_front_page() && is_home() ) : ?>
			<?php if (get_theme_mod( 'recent_news_img' ) ) : ?>
				<div class="seos-headline">
					<?php if (get_theme_mod( 'recent_news_title' )) : ?><h3><a href="<?php echo esc_url(get_theme_mod( 'recent_news_url' )); ?>"><?php echo esc_html (get_theme_mod( 'recent_news_title' )); ?></a></h3><?php endif; ?>
					<?php if (get_theme_mod( 'recent_news_img' )) : ?><img src="<?php echo esc_url(get_theme_mod( 'recent_news_img' )); ?>" alt="" /><?php endif; ?>	
					<?php if (get_theme_mod( 'recent_news_title' )) : ?><h4><a href="<?php echo esc_url(get_theme_mod( 'recent_news_url' )); ?>"><?php echo esc_html (get_theme_mod( 'recent_news_title' )); ?></a></h4><?php endif; ?>	
					<?php if (get_theme_mod( 'recent_news_text' )) : ?><p><?php echo esc_html (get_theme_mod( 'recent_news_text' )); ?></p><?php endif; ?>
				</div> 
			<?php endif; ?>
		<?php endif; ?>
	
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile; ?>

			<div class="nextpage">
			
				<div class="pagination">
				
					<?php echo paginate_links(); ?>
					
				</div> 
				
			</div> 

		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
