<?php
/**
 * Template part for displaying first post in loop
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MagazineBook
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-first-post' ); ?>>

	<?php magazinebook_post_thumbnail( 'regular' ); ?>

	<?php magazinebook_cats_list(); ?>

	<header class="entry-header">
		<?php

		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				magazinebook_posted_on();
				magazinebook_posted_by();
				magazinebook_comments_link();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<a class="more-link mb-read-more" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><span><?php esc_html_e( 'Read more', 'magazinebook' ); ?></span></a>
</article><!-- #post-<?php the_ID(); ?> -->
