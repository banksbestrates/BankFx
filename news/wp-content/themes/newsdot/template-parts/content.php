<?php
/**
 * Template part for displaying posts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php newsdot_post_thumbnail(); ?>

	<div class="nd-post-body">
		<?php if ( 'post' === get_post_type() && get_the_category() ) : ?>
		<span class="cat-links"><?php the_category( '&nbsp;' ); ?></span>
		<?php endif; ?>

		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					newsdot_posted_by();
					newsdot_posted_on();
					if ( get_theme_mod( 'newsdot_show_comments_link', false ) ) {
						newsdot_comments_link();
					}
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php if ( is_singular() ) : ?>
		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'newsdot' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'newsdot' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
		<?php else : ?>
		<div class="entry-summary">
			<p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
		</div>
		<?php endif; ?>

		<div class="clearfix"></div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
