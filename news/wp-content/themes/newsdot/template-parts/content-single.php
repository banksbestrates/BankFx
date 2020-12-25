<?php
/**
 * Template part for displaying posts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'nd-single-article' ); ?>>

	<div class="nd-post-body">
		<?php if ( get_the_category() ) : ?>
		<span class="cat-links"><?php the_category( '&nbsp;' ); ?></span>
		<?php endif; ?>

		<header class="entry-header mb-4">
			<?php
			the_title( '<h1 class="entry-title">', '</h1>' );

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					newsdot_posted_by();
					newsdot_posted_on_single();
					if ( get_theme_mod( 'newsdot_show_comments_link', false ) ) {
						newsdot_comments_link();
					}
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="row justify-content-center">

			<?php if ( 'post' === get_post_type() && ( get_theme_mod( 'newsdot_show_summary_single', true ) || get_theme_mod( 'newsdot_show_more_content_single', true ) ) ) : ?>
			<div class="col-md-4 order-1 order-md-0">
				<?php if ( get_theme_mod( 'newsdot_show_summary_single', true ) ) : ?>
				<div class="summary-content">
					<h4 class="summary-title"><span>
						<?php echo esc_html( get_theme_mod( 'newsdot_summary_label', __( 'Summary', 'newsdot' ) ) ); ?>
					</span></h4>
					<?php the_excerpt(); ?>
				</div>
				<?php endif; ?>

				<?php if ( get_theme_mod( 'newsdot_show_more_content_single', true ) ) : ?>
				<?php
					if ( get_the_tags() ) :
						$nd_related_cats = get_the_tags();
						$nd_first_related_cat = '';

						foreach ( $nd_related_cats as $nd_related_cat ) {
							$nd_first_related_cat = $nd_related_cat->term_id;
							break;
						}

						$nd_rel_args = array (
							// 'category' => $nd_first_related_cat,
							'exclude'  => array( $post->ID ),
							'tax_query' => array(
								array(
								'taxonomy'         => 'post_tag',
								'field'            => 'term_id',
								'terms'            => $nd_first_related_cat,
								'include_children' => false
								)
							)
						);
						$nd_related_posts = get_posts( $nd_rel_args );

						if ( ! empty( $nd_related_posts ) ) :
							?>
							<div class="nd-similar-posts-in-single">
								<h4 class="nd-similar-posts-title"><span>
									<?php echo esc_html( get_theme_mod( 'newsdot_more_on_label', __( 'More On', 'newsdot' ) ) ); ?>
									<a href="<?php echo esc_url ( get_tag_link( $nd_related_cat->term_id ) ); ?>"> <?php echo esc_html( $nd_related_cat->name ) ?></a>
								</span></h4>
								<?php

									if ( ! empty( $nd_related_posts ) ) {
										?>
										<ul>
											<?php
											foreach ( $nd_related_posts as $nd_related_post ) :
												?>
												<li>
													<a href="<?php echo esc_url( get_permalink( $nd_related_post->ID ) ); ?>"><?php echo esc_html( $nd_related_post->post_title ) ?></a>
												</li>
												<?php
											endforeach;
											?>
										</ul>
										<?php
									}
								?>
							</div>
							<?php
						endif;
						// Reset Post Data
						wp_reset_postdata();
					endif;
				?>
				<?php endif; ?>
			</div>

			<?php endif; ?>

			<div class="col-md-8">
				<?php
				if ( get_theme_mod( 'newsdot_show_thumbnail_single', true ) ) {
					newsdot_post_thumbnail();
				}
				?>
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
			</div>
		</div>

		<div class="clearfix"></div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
