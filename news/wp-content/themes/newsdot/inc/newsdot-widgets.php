<?php
/**
 * NewsDot Widgets
 *
 * @package NewsDot
 */

class newsdot_post_cards extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'newsdot-widget-post-cards',
			'description'                 => __( 'Displays posts with default card style.', 'newsdot' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( false, $name = __( '*Newsdot: Post Cards', 'newsdot' ), $widget_ops );
	}

	public function form( $instance ) {
		$newsdot_defaults['title'] = esc_html__( 'Featured Posts', 'newsdot' );
		$newsdot_defaults['number'] = 6;
		$newsdot_defaults['category'] = '';
		$instance = wp_parse_args( (array) $instance, $newsdot_defaults );
		$title = $instance['title'];
		$number = $instance['number'];
		$category = $instance['category'];
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'newsdot' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of Posts to Display:', 'newsdot' ); ?></label>
			<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" value="<?php echo esc_html( $number ); ?>" size="3" step="1" min="1" max="15" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select Category: ', 'newsdot' ); ?></label>
			<?php
			wp_dropdown_categories(
				array(
					'show_option_none' => esc_html__( 'Select Category', 'newsdot' ),
					'name' => $this->get_field_name( 'category' ),
					'selected' => $category,
				)
			);
			?>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['number'] = absint( $new_instance['number'] );
		$instance['title'] = $new_instance['title'];
		$instance['category'] = $new_instance['category'];

		return $instance;
	}

	public function widget( $args, $instance ) {

		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$number = empty( $instance['number'] ) ? 6 : $instance['number'];
		$category = isset( $instance['category'] ) ? $instance['category'] : 0;

		if ( $category == '-1' || $category == -1 ) {
			$category = 0;
		}

		$query_args = array(
			'posts_per_page' => $number,
			'post_type' => 'post',
			'ignore_sticky_posts' => true,
			'post_status' => 'publish',
			'no_found_rows' => true,
			'cat' => $category,
		);

		$newsdot_card_posts = new WP_Query( $query_args );

		if ( $newsdot_card_posts->have_posts() ) :

			echo wp_kses_post( $args['before_widget'] );
			?>
				<div class="newsdot-post-cards-wrap">
					<?php if ( ! empty( $title ) ) : ?>
					<div class="newsdot-content-widget-title">
						<?php
						echo wp_kses_post( $args['before_title'] );
						echo esc_html( $title );
						echo wp_kses_post( $args['after_title'] );
						?>
					</div>
					<?php endif; ?>

					<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 nd-posts-row">
						<?php
						while ( $newsdot_card_posts->have_posts() ) :
							$newsdot_card_posts->the_post();
							?>
							<div class="col">
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
						wp_reset_postdata();
						?>
					</div>

				</div>
			<?php
			echo wp_kses_post( $args['after_widget'] );
		endif;
	}

}



class newsdot_horizontal_vertical_posts extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'newsdot-widget-horizontal-vertical-posts',
			'description'                 => __( 'Displays Horizontal/Vertical Post Cards.', 'newsdot' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( false, $name = __( '*Newsdot: Horizontal/Vertical Posts', 'newsdot' ), $widget_ops );
	}

	public function form( $instance ) {
		$newsdot_defaults['title'] = esc_html__( 'Featured Posts', 'newsdot' );
		$newsdot_defaults['number'] = 5;
		$newsdot_defaults['category'] = '';
		$newsdot_defaults['style'] = 0;
		$instance = wp_parse_args( (array) $instance, $newsdot_defaults );
		$title = $instance['title'];
		$number = $instance['number'];
		$category = $instance['category'];
		$style = $instance['style'];
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'newsdot' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select Category: ', 'newsdot' ); ?></label>
			<?php
			wp_dropdown_categories(
				array(
					'show_option_none' => esc_html__( 'Select Category', 'newsdot' ),
					'name' => $this->get_field_name( 'category' ),
					'selected' => $category,
				)
			);
			?>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('style') ); ?>"><?php esc_html_e('Horizontal Style: ','newscard'); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('style') ); ?>" name="<?php echo esc_attr( $this->get_field_name('style') ); ?>" type="checkbox" value="1" <?php checked( '1', absint($instance['style']) ); ?>/>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['number'] = absint( $new_instance['number'] );
		$instance['title'] = $new_instance['title'];
		$instance['category'] = $new_instance['category'];
		$instance['style'] = absint($new_instance['style']);

		return $instance;
	}

	public function widget( $args, $instance ) {

		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$number = empty( $instance['number'] ) ? 5 : $instance['number'];
		$style = empty( $instance['style'] ) ? 0 : $instance['style'];
		$category = isset( $instance['category'] ) ? $instance['category'] : 0;

		if ( $category == '-1' || $category == -1 ) {
			$category = 0;
		}

		$query_args = array(
			'posts_per_page' => $number,
			'post_type' => 'post',
			'ignore_sticky_posts' => true,
			'post_status' => 'publish',
			'no_found_rows' => true,
			'cat' => $category,
		);

		$newsdot_card_posts = new WP_Query( $query_args );

		if ( $newsdot_card_posts->have_posts() ) :

			echo wp_kses_post( $args['before_widget'] );
			?>
				<div class="newsdot-post-cards-wrap">
					<?php if ( ! empty( $title ) ) : ?>
					<div class="newsdot-content-widget-title">
						<?php
						echo wp_kses_post( $args['before_title'] );
						echo esc_html( $title );
						echo wp_kses_post( $args['after_title'] );
						?>
					</div>
					<?php endif; ?>

					<?php if ( $style == 1 ) : ?>
						<div class="row row-cols-1 row-cols-sm-2 nd-posts-row">
							<?php
							$post_counter = 1;
							while ( $newsdot_card_posts->have_posts() ) :
								$newsdot_card_posts->the_post();
								?>
								<?php if ( 1 === $post_counter ) : ?>
									<div class="col col-sm-12 col-md-12">
										<article <?php post_class( 'd-flex nd-horizontal-post' ); ?>>
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
												<div class="entry-summary">
													<p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
												</div>
											</div>
										</article>
									</div>
								<?php else : ?>
									<div class="col nd-secondary-col">
										<article <?php post_class( 'd-flex' ); ?>>
											<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
												<?php
													the_post_thumbnail(
														'newsdot-small-image',
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
													<?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
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
								<?php endif; ?>
								<?php
								$post_counter++;
							endwhile;
							wp_reset_postdata(); ?>
						</div>

					<?php else : ?>
						<div class="row row-cols-1 row-cols-sm-2 nd-posts-row">
							<?php
							$post_counter = 1;
							while ( $newsdot_card_posts->have_posts() ) :
								$newsdot_card_posts->the_post();
								?>
								<?php if ( 1 === $post_counter ) : ?>
									<div class="col">
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
												<div class="entry-summary">
													<p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
												</div>
											</div>
										</article>
									</div>
								<?php else : ?>
									<?php if ( $post_counter == 2 ) : ?>
									<div class="col nd-secondary-col">
									<?php endif; ?>
										<article <?php post_class( 'd-flex' ); ?>>
											<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
												<?php
													the_post_thumbnail(
														'newsdot-small-image',
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
													<?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
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
								<?php endif; ?>
								<?php
								$post_counter++;
							endwhile;
							wp_reset_postdata();
							if ( $post_counter > 2 ) :
							?>
							</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<div class="clearfix"></div>
				</div>
			<?php
			echo wp_kses_post( $args['after_widget'] );
		endif;
	}
}
