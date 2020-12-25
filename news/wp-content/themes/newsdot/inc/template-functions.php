<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 */

/**
 * Adds custom classes to the array of body classes.
 */
function newsdot_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'newsdot_body_classes' );


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function newsdot_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'newsdot_pingback_header' );


/**
 * To display the current year.
 */
function newsdot_the_year() {
	return date_i18n( _x( 'Y', 'copyright date format; check date() on php.net', 'newsdot' ) );
}


/**
 * Customize excerpt length
 */
function newsdot_custom_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'newsdot_custom_excerpt_length', 999 );


// Display topbar section
if ( ! function_exists( 'newsdot_topbar_section' ) ) :
	function newsdot_topbar_section() {
		if ( get_theme_mod( 'newsdot_show_topbar', true ) ) :
		?>
		<!--==================== TOP BAR ====================-->
		<section class="nd-topbar">
			<div class="container">
				<div class="row">
					<div class="col-md-9 d-flex">
						<?php if ( get_theme_mod( 'newsdot_show_topbar_date', true ) ) : ?>
							<time class="date-today" datetime="<?php echo esc_attr( date_i18n( _x( 'Y-m-d\TH:i:sP', 'copyright date format; check date() on php.net', 'newsdot' ) ) ); ?>"><?php echo esc_html( date_i18n( _x( 'D, M j, Y', 'copyright date format; check date() on php.net', 'newsdot' ) ) ); ?></time>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'newsdot_show_topbar_search', true ) ) : ?>
							<div class="nd-topbar-search">
								<?php get_search_form(); ?>
							</div>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'newsdot_show_topbar_stories', false ) ) : ?>
							<div class="nd-topbar-stories">
								<?php newsdot_top_stories(); ?>
							</div>
						<?php endif; ?>
					</div>

					<div class="col-md-3 text-right">
						<?php
						if ( get_theme_mod( 'newsdot_show_topbar_social_links', true ) ) :
							$newsdot_social_links = get_theme_mod( 'newsdot_social_links', '' );
							if ( $newsdot_social_links ) {
								$nd_social_array = explode( ',', $newsdot_social_links );
								?>
								<ul class="nd-social-links d-flex flex-row-reverse">
									<?php foreach ( $nd_social_array as $nd_social_link ) : ?>
									<li><a class="far" target="_blank" href="<?php echo esc_url( trim( $nd_social_link ) ); ?>"></a></li>
									<?php endforeach; ?>
								</ul>
								<?php
							}
						endif;
						?>
					</div>
				</div>
			</div>
		</section>
		<?php
		endif;
	}
endif;

// Display top stories
if ( ! function_exists( 'newsdot_top_stories' ) ) :
	function newsdot_top_stories() {
		$nd_top_stories_cat = 0;
		$nd_top_stories_cat = absint( get_theme_mod( 'newsdot_top_stories_cat', 0 ) );

		$nd_top_stories_args = array (
			'numberposts' => 5,
			'category' => $nd_top_stories_cat,
		);
		$nd_top_stories = get_posts( $nd_top_stories_args );

		if ( ! empty( $nd_top_stories ) ) :
			?>
			<h5><?php echo esc_html( get_theme_mod( 'newsdot_top_stories_label', esc_html__( 'Top Stories', 'newsdot' ) ) ) . esc_html__( ': ', 'newsdot' ); ?></h5>
			<div class="owl-carousel" id="nd-top-stories-carousel">
				<?php
				if ( ! empty( $nd_top_stories ) ) {
					foreach ( $nd_top_stories as $nd_top_story ) :
					?>
					<div>
						<a href="<?php echo esc_url( get_permalink( $nd_top_story->ID ) ); ?>"><?php echo esc_html( $nd_top_story->post_title ) ?></a>
					</div>
					<?php
					endforeach;
				}
				?>
			</div>
			<?php
		endif;
		wp_reset_postdata();
	}
endif;



// Display banner section
if ( ! function_exists( 'newsdot_banner_section' ) ) :
	function newsdot_banner_section() {
		if ( get_theme_mod( 'newsdot_show_banner_section', true ) ) : ?>
			<section id="newsdot-banner">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="nd-banner-part-wrap">
								<?php
								$nd_banner_slider_cat = 0;
								$nd_banner_slider_cat = absint( get_theme_mod( 'newsdot_banner_slider_cat', 0 ) );

								$nd_banner_slider_args = array (
									'posts_per_page'      => 5,
									'post_type'           => 'post',
									'ignore_sticky_posts' => true,
									'post_status'         => 'publish',
									'cat'                 => $nd_banner_slider_cat,
								);
								$nd_banner_slider_posts = new WP_Query( $nd_banner_slider_args );

								if ( $nd_banner_slider_posts->have_posts() ) :
									?>
									<?php if ( get_theme_mod( 'newsdot_banner_slider_label', '' ) ) : ?>
									<h4 class="nd-banner-title">
										<span><?php echo esc_html( get_theme_mod( 'newsdot_banner_slider_label', '' ) ); ?></span>
									</h4>
									<?php endif; ?>
									<div class="owl-carousel" id="nd-banner-slider-carousel" data-ndAutoPlay="<?php echo get_theme_mod( 'newsdot_autoplay_banner_slider', false ) ?>">
										<?php
										if ( $nd_banner_slider_posts->have_posts() ) {
											while ( $nd_banner_slider_posts->have_posts() ) :
												$nd_banner_slider_posts->the_post(); ?>
												<div class="nd-banner-slide">
													<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
													<?php
														if ( has_post_thumbnail() ) :
															the_post_thumbnail( 'newsdot-wide-image' );
														else :
															?>
															<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/default-img.png" alt="<?php the_title_attribute(); ?>">
															<?php
														endif;
													?>
													</a>
													<h3 class="nd-banner-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
													<div class="entry-meta">
														<?php
														newsdot_posted_by();
														newsdot_posted_on();
														if ( get_theme_mod( 'newsdot_show_comments_link', false ) ) {
															newsdot_comments_link();
														}
														?>
													</div>
													<div class="entry-summary">
														<p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
													</div>
												</div>
											<?php
											endwhile;
										}
										?>
									</div>
									<?php
								endif;
								wp_reset_postdata();
								?>
							</div>
						</div>

						<div class="col-md-3">
							<div class="nd-banner-part-wrap">
								<?php
								$nd_banner_part_2_cat = 0;
								$nd_banner_part_2_cat = absint( get_theme_mod( 'newsdot_banner_part_2_cat', 0 ) );

								$nd_banner_part_2_args = array (
									'posts_per_page'      => 3,
									'post_type'           => 'post',
									'ignore_sticky_posts' => true,
									'post_status'         => 'publish',
									'cat'                 => $nd_banner_part_2_cat,
								);
								$nd_banner_part_2_posts = new WP_Query( $nd_banner_part_2_args );

								if ( $nd_banner_part_2_posts->have_posts() ) :
									?>
									<?php if ( get_theme_mod( 'newsdot_banner_part_2_label', '' ) ) : ?>
									<h4 class="nd-banner-title">
										<span><?php echo esc_html( get_theme_mod( 'newsdot_banner_part_2_label', '' ) ); ?></span>
									</h4>
									<?php endif; ?>
									<?php
									$nd_counter_1 = 1;
									if ( $nd_banner_part_2_posts->have_posts() ) {
										while ( $nd_banner_part_2_posts->have_posts() ) :
											$nd_banner_part_2_posts->the_post(); ?>
												<?php if ( $nd_counter_1 == 1 ) : ?>
													<div class="nd-banner-primary-post">
														<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
														<?php
															if ( has_post_thumbnail() ) :
																the_post_thumbnail( 'newsdot-medium-image' );
															else :
																?>
																<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/default-img.png" alt="<?php the_title_attribute(); ?>">
																<?php
															endif;
														?>
														</a>
														<h3 class="nd-banner-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
														<div class="entry-meta">
															<?php
															newsdot_posted_by();
															newsdot_posted_on();
															if ( get_theme_mod( 'newsdot_show_comments_link', false ) ) {
																newsdot_comments_link();
															}
															?>
														</div>
														<div class="entry-summary">
															<p><?php echo wp_trim_words( get_the_excerpt(), 15 ); ?></p>
														</div>
													</div>
												<?php else : ?>
													<div class="nd-banner-secondary-posts">
														<h5 class="nd-banner-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
														<div class="entry-meta">
															<?php
															newsdot_posted_by();
															newsdot_posted_on();
															if ( get_theme_mod( 'newsdot_show_comments_link', false ) ) {
																newsdot_comments_link();
															}
															?>
														</div>
													</div>
												<?php endif; ?>
											<?php
											$nd_counter_1 = $nd_counter_1 + 1;
										endwhile;
									}
									?>
									<?php
								endif;
								wp_reset_postdata();
								?>
							</div>
						</div>

						<div class="col-md-3">
							<div class="nd-banner-part-wrap">
								<?php
								$nd_banner_part_3_cat = 0;
								$nd_banner_part_3_cat = absint( get_theme_mod( 'newsdot_banner_part_3_cat', 0 ) );

								$nd_banner_part_3_args = array (
									'posts_per_page'      => 3,
									'post_type'           => 'post',
									'ignore_sticky_posts' => true,
									'post_status'         => 'publish',
									'cat'                 => $nd_banner_part_3_cat,
								);
								$nd_banner_part_3_posts = new WP_Query( $nd_banner_part_3_args );

								if ( $nd_banner_part_3_posts->have_posts() ) :
									?>
									<?php if ( get_theme_mod( 'newsdot_banner_part_3_label', '' ) ) : ?>
									<h4 class="nd-banner-title">
										<span><?php echo esc_html( get_theme_mod( 'newsdot_banner_part_3_label', '' ) ); ?></span>
									</h4>
									<?php endif; ?>
									<?php
									$nd_counter_2 = 1;
									if ( $nd_banner_part_3_posts->have_posts() ) {
										while ( $nd_banner_part_3_posts->have_posts() ) :
											$nd_banner_part_3_posts->the_post(); ?>
												<?php if ( $nd_counter_2 == 1 ) : ?>
													<div class="nd-banner-primary-post">
														<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
														<?php
															if ( has_post_thumbnail() ) :
																the_post_thumbnail( 'newsdot-medium-image' );
															else :
																?>
																<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/default-img.png" alt="<?php the_title_attribute(); ?>">
																<?php
															endif;
														?>
														</a>
														<h3 class="nd-banner-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
														<div class="entry-meta">
															<?php
															newsdot_posted_by();
															newsdot_posted_on();
															if ( get_theme_mod( 'newsdot_show_comments_link', false ) ) {
																newsdot_comments_link();
															}
															?>
														</div>
														<div class="entry-summary">
															<p><?php echo wp_trim_words( get_the_excerpt(), 15 ); ?></p>
														</div>
													</div>
												<?php else : ?>
													<div class="nd-banner-secondary-posts">
														<h5 class="nd-banner-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
														<div class="entry-meta">
															<?php
															newsdot_posted_by();
															newsdot_posted_on();
															if ( get_theme_mod( 'newsdot_show_comments_link', false ) ) {
																newsdot_comments_link();
															}
															?>
														</div>
													</div>
												<?php endif; ?>
											<?php
											$nd_counter_2 = $nd_counter_2 + 1;
										endwhile;
									}
									?>
									<?php
								endif;
								wp_reset_postdata();
								?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php
		endif;
	}
endif;



// Display featured posts at top
if ( ! function_exists( 'newsdot_featured_posts_top' ) ) :
	function newsdot_featured_posts_top() {
		if ( get_theme_mod( 'newsdot_show_featured_posts_top', true ) ) : ?>
			<section id="newsdot-featured-posts-top">
				<div class="container">
					<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 nd-posts-row">
						<?php
							$nd_featured_posts_cat = 0;
							$nd_featured_posts_cat = absint( get_theme_mod( 'newsdot_featured_posts_top_cat', 0 ) );

							$nd_featured_posts_args = array (
								'posts_per_page'      => 4,
								'post_type'           => 'post',
								'ignore_sticky_posts' => true,
								'post_status'         => 'publish',
								'cat'                 => $nd_featured_posts_cat,
							);
							$nd_featured_posts_posts = new WP_Query( $nd_featured_posts_args );

							if ( $nd_featured_posts_posts->have_posts() ) :
								?>
								<?php if ( get_theme_mod( 'newsdot_featured_posts_top_label', '' ) ) : ?>
								<h4 class="nd-featured-posts-title col-sm-12 col-md-12">
									<span><?php echo esc_html( get_theme_mod( 'newsdot_featured_posts_top_label', '' ) ); ?></span>
								</h4>
								<?php endif;
								while ( $nd_featured_posts_posts->have_posts() ) :
									$nd_featured_posts_posts->the_post(); ?>
									<div class="col-md-3">
										<article <?php post_class(); ?>>
											<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
												<?php
													the_post_thumbnail(
														'newsdot-wide-image',
														array(
															'alt' => the_title_attribute(
																array(
																	'echo' => false,
																)
															),
														)
													);
												?>
											</a>
											<div class="nd-post-body">
												<?php if ( 'post' === get_post_type() && get_the_category() ) : ?>
													<span class="cat-links"><?php the_category( '&nbsp;' ); ?></span>
												<?php endif; ?>
												<header class="entry-header">
													<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
													<?php
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
												</header>
											</div>
										</article>
									</div>
									<?php
								endwhile;
							endif;
							wp_reset_postdata();
						?>
					</div>
				</div>
			</section>
		<?php
		endif;
	}
endif;
