<?php
/**
 * Functions which enhance the theme front page
 *
 * @package MagazineBook
 */

if ( ! function_exists( 'magazinebook_display_banner_section' ) ) :
	/**
	 * Display banner section.
	 *
	 * @return void
	 */
	function magazinebook_display_banner_section() {
		$magazinebook_slider_posts_cat        = get_theme_mod( 'magazinebook_banner_slider_category', 0 );
		$magazinebook_featured_posts_cat      = get_theme_mod( 'magazinebook_banner_featured_category', 0 );
		$magazinebook_get_banner_slider_posts = new WP_Query(
			array(
				'posts_per_page'      => 5,
				'post_type'           => 'post',
				'ignore_sticky_posts' => true,
				'post_status'         => 'publish',
				'cat'                 => $magazinebook_slider_posts_cat,
			)
		);

		$magazinebook_get_banner_featured_posts = new WP_Query(
			array(
				'posts_per_page'      => 4,
				'post_type'           => 'post',
				'ignore_sticky_posts' => true,
				'post_status'         => 'publish',
				'cat'                 => $magazinebook_featured_posts_cat,
			)
		);

		if ( $magazinebook_get_banner_slider_posts->have_posts() || $magazinebook_get_banner_featured_posts->have_posts() ) {
			?>
			<div class="front-page-banner-section">
				<div class="container">
					<div class="row">
						<div class="col-md-6 px-lg-3">
							<?php if ( $magazinebook_get_banner_slider_posts->have_posts() ) : ?>
							<div class="splide theme-banner-slider" data-splide='{"type":"slide","perPage":1,"cover":true,"height":"500px"}'>
								<div class="splide__track">
									<ul class="splide__list">
										<?php
										while ( $magazinebook_get_banner_slider_posts->have_posts() ) :
											$magazinebook_get_banner_slider_posts->the_post();
											?>
											<li class="splide__slide">
												<?php
												if ( has_post_thumbnail() ) :
													the_post_thumbnail( 'magazinebook-featured-image' );
												else :
													?>
													<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/default-bg-img.png" alt="<?php the_title_attribute(); ?>">
													<?php
												endif;
												?>
												<a class="theme-overlay-link" href="<?php the_permalink(); ?>"></a>
												<div class="theme-banner-content">
													<?php magazinebook_cats_list(); ?>
													<h3 class="theme-banner-title">
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													</h3>
													<div class="theme-banner-meta">
													<?php
														magazinebook_posted_on();
														magazinebook_posted_by();
													?>
													</div>
												</div>
											</li>
											<?php
											endwhile;
											wp_reset_postdata();
										?>
									</ul>
								</div>
							</div>
							<?php endif; ?>
						</div>
						<div class="col-md-6 px-lg-3">
							<div class="row">
								<?php
								if ( $magazinebook_get_banner_featured_posts->have_posts() ) :
									$post_counter = 1;
									while ( $magazinebook_get_banner_featured_posts->have_posts() ) :
										$magazinebook_get_banner_featured_posts->the_post();
										if ( $post_counter < 3 ) :
											?>
											<div class="col-md-6 px-lg-3 mb-3">
												<div class="banner-featured-post">
													<?php
													if ( has_post_thumbnail() ) :
														the_post_thumbnail( 'magazinebook-featured-image-medium' );
													else :
														?>
														<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/default-bg-img.png" alt="<?php the_title_attribute(); ?>">
														<?php
													endif;
													?>
													<a class="theme-overlay-link" href="<?php the_permalink(); ?>"></a>
													<div class="theme-banner-content">
														<h3 class="theme-banner-title">
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</h3>
														<div class="theme-banner-meta">
														<?php
															magazinebook_posted_on();
															magazinebook_posted_by();
														?>
														</div>
													</div>
												</div>
											</div>
											<?php
										else :
											?>
											<div class="col-md-6 px-lg-3 mt-3">
												<div class="banner-featured-post">
													<?php
													if ( has_post_thumbnail() ) :
														the_post_thumbnail( 'magazinebook-featured-image-medium' );
													else :
														?>
														<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/default-bg-img.png" alt="<?php the_title_attribute(); ?>">
														<?php
													endif;
													?>
													<a class="theme-overlay-link" href="<?php the_permalink(); ?>"></a>
													<div class="theme-banner-content">
														<h3 class="theme-banner-title">
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</h3>
														<div class="theme-banner-meta">
														<?php
															magazinebook_posted_on();
															magazinebook_posted_by();
														?>
														</div>
													</div>
												</div>
											</div>
											<?php
										endif;
										$post_counter++;
									endwhile;
									wp_reset_postdata();
								endif;
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	}
endif;
