<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MagazineBook
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php magazinebook_post_thumbnail( 'medium' ); ?>

	<?php magazinebook_cats_list(); ?>

	<header class="entry-header">
		<?php

		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

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

</article><!-- #post-<?php the_ID(); ?> -->
