<?php
/**
 * Template part for displaying results in search pages
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php newsdot_post_thumbnail(); ?>

	<div class="nd-post-body">

		<?php if ( 'post' === get_post_type() && get_the_category() ) : ?>
		<span class="cat-links"><?php the_category( '&nbsp;' ); ?></span>
		<?php endif; ?>

		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
				newsdot_posted_on();
				newsdot_posted_by();
				if ( get_theme_mod( 'newsdot_show_comments_link', false ) ) {
					newsdot_comments_link();
				}
				?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
		<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 30 ) ); ?></p>
		</div><!-- .entry-summary -->

		<div class="clearfix"></div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
