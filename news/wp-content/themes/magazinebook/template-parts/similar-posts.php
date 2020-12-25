<?php
/**
 * Template part for displaying similar posts on single post
 *
 * @package MagazineBook
 */

?>
<div class="clearfix"></div>

<?php
	$related_post_args = array(
		'no_found_rows'          => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
		'ignore_sticky_posts'    => 1,
		'orderby'                => 'rand',
		'post__not_in'           => array( $post->ID ),
		'posts_per_page'         => 3,
	);

	$current_cats                      = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );
	$related_post_args['category__in'] = $current_cats;

	$related_post_query = new WP_Query( $related_post_args );

	if ( $related_post_query->have_posts() ) :
		?>
		<h3 class='comment-reply-title'><?php esc_html_e( 'Similar Posts', 'magazinebook' ); ?></h3>
			<div class="mb-related-posts mb-simple-featured-posts mb-simple-featured-posts-wrap row">
				<?php
				while ( $related_post_query->have_posts() ) :
					$related_post_query->the_post();
					?>
					<article class="mb-featured-article col-md-4 px-lg-3 post">
						<?php
						if ( has_post_thumbnail() ) {
							?>
							<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
								<?php the_post_thumbnail( 'magazinebook-featured-image-medium' ); ?>
							</a>
							<?php
						}
						magazinebook_cats_list();
						?>
						<header class="entry-header">
							<?php
							the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
							?>
							<div class="entry-meta">
								<?php
								magazinebook_posted_on();
								magazinebook_posted_by();
								?>
							</div><!-- .entry-meta -->
						</header><!-- .entry-header -->
					</article>
				<?php endwhile; ?>
			</div>
		<?php
	endif;
	wp_reset_postdata();
