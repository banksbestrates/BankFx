<?php
/**
 * Template part for displaying posts
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

</article><!-- #post-<?php the_ID(); ?> -->
