<?php
 /**
 * Register widget area.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_widget
 * @package timesnews
 */

 class TimesNews_list_category_posts extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */

	function __construct() {
		$widget_ops = array( 'classname' => 'widget_list_category_posts', 'description' => esc_html__( 'Display Latest Posts/ Category. It display Two Column widgets with first image big and the rest are small.', 'timesnews') );
		$control_ops = array('width' => 200, 'height' => 250);
		parent::__construct( false, $name=esc_html__('T-Spiral: List Category Posts','timesnews'), $widget_ops, $control_ops );
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 */
	public function form( $instance ) {
		$no_of_posts = ! empty( $instance['no_of_posts'] ) ? absint( $instance['no_of_posts'] ) : 4;
		$posts_title = ! empty( $instance['posts_title'] ) ? esc_attr( $instance['posts_title'] ) : '';
		$latest_posts = ! empty( $instance['latest_posts'] ) ? esc_attr( $instance['latest_posts'] ) : 'latest';
		$category = ! empty( $instance['category'] ) ? esc_attr( $instance['category'] ) : 'category';
		$posts_title_1 = ! empty( $instance['posts_title_1'] ) ? esc_attr( $instance['posts_title_1'] ) : '';
		$latest_posts_1 = ! empty( $instance['latest_posts_1'] ) ? esc_attr( $instance['latest_posts_1'] ) : 'latest_1';
		$category_1 = ! empty( $instance['category_1'] ) ? esc_attr( $instance['category_1'] ) : 'category_1';
	?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'no_of_posts' )); ?>"><?php esc_html_e( 'Number of posts:', 'timesnews' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'no_of_posts' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'no_of_posts' )); ?>" type="text" value="<?php echo absint( $no_of_posts ); ?>">
		</p>

		<hr>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'posts_title' )); ?>"><?php esc_html_e( 'Title:', 'timesnews' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'posts_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'posts_title' )); ?>" type="text" value="<?php echo esc_attr( $posts_title ); ?>">
		</p>
		<p><input type="radio" <?php checked(esc_attr($latest_posts), 'latest'); ?> id="<?php echo $this->get_field_id( 'latest_posts' ); ?>" name="<?php echo esc_attr($this->get_field_name( 'latest_posts' )); ?>" value="latest"/><?php esc_html_e( 'Latest Posts', 'timesnews' );?>
			<br>
		 <input type="radio" <?php checked(esc_attr($latest_posts), 'category'); ?> id="<?php echo esc_attr($this->get_field_id( 'latest_posts' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'latest_posts' )); ?>" value="category"/><?php esc_html_e( 'Show Category posts', 'timesnews' );?>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'category' )); ?>"><?php esc_html_e( 'Select Category', 'timesnews' ); ?>:</label>
			<?php wp_dropdown_categories( array( 'show_option_none' =>__('-- Select -- ','timesnews'),'name' => esc_attr($this->get_field_name( 'category' )), 'selected' => esc_attr($category) ) ); ?>
		</p>

		<hr>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'posts_title_1' )); ?>"><?php esc_html_e( 'Title:', 'timesnews' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'posts_title_1' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'posts_title_1' )); ?>" type="text" value="<?php echo esc_attr( $posts_title_1 ); ?>">
		</p>
		<p><input type="radio" <?php checked(esc_attr($latest_posts_1), 'latest_1'); ?> id="<?php echo $this->get_field_id( 'latest_posts_1' ); ?>" name="<?php echo esc_attr($this->get_field_name( 'latest_posts_1' )); ?>" value="latest_1"/><?php esc_html_e( 'Latest Posts', 'timesnews' );?>
			<br>
		 <input type="radio" <?php checked(esc_attr($latest_posts_1), 'category_1'); ?> id="<?php echo esc_attr($this->get_field_id( 'latest_posts_1' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'latest_posts_1' )); ?>" value="category_1"/><?php esc_html_e( 'Show Category posts', 'timesnews' );?>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'category_1' )); ?>"><?php esc_html_e( 'Select Category', 'timesnews' ); ?>:</label>
			<?php wp_dropdown_categories( array( 'show_option_none' => esc_html__('-- Select -- ','timesnews'),'name' => esc_attr($this->get_field_name( 'category_1' )), 'selected' => esc_attr($category_1) ) ); ?>
		</p>


		
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['no_of_posts'] = ( ! empty( $new_instance['no_of_posts'] ) ) ? absint( $new_instance['no_of_posts'] ) : '';
		$instance[ 'posts_title' ] = sanitize_text_field($new_instance[ 'posts_title' ]);
		$instance[ 'posts_title_1' ] = sanitize_text_field($new_instance[ 'posts_title_1' ]);
		$instance[ 'latest_posts' ] = sanitize_text_field($new_instance[ 'latest_posts' ]);
		$instance[ 'latest_posts_1' ] = sanitize_text_field($new_instance[ 'latest_posts_1' ]);
		$instance[ 'category' ] = sanitize_text_field($new_instance[ 'category' ]);
		$instance[ 'category_1' ] = sanitize_text_field($new_instance[ 'category_1' ]);

		return $instance;
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 */
	public function widget( $args, $instance ) {
		extract($args);
		$no_of_posts = ( ! empty( $instance['no_of_posts'] ) ) ? absint( $instance['no_of_posts'] ) : 4;
		$posts_title = ! empty( $instance['posts_title'] ) ? esc_attr( $instance['posts_title'] ) : '';
		$posts_title_1 = ! empty( $instance['posts_title_1'] ) ? esc_attr( $instance['posts_title_1'] ) : '';
		$latest_posts = ! empty( $instance['latest_posts'] ) ? esc_attr( $instance['latest_posts'] ) : 'latest';
		$latest_posts_1 = ! empty( $instance['latest_posts_1'] ) ? esc_attr( $instance['latest_posts_1'] ) : 'latest_1';
		$category = ! empty( $instance['category'] ) ? esc_attr( $instance['category'] ) : 'category';
		$category_1 = ! empty( $instance['category_1'] ) ? esc_attr( $instance['category_1'] ) : 'category_1';

		echo $before_widget; ?>

		<div class="list-category-posts-half lcp-left">
		<?php if(!empty($posts_title) ){ ?>
			<h2 class="widget-title"><?php echo esc_attr($posts_title); ?></h2>
		<?php } ?>
			<div class="list-category-posts-wrap">
		
				<?php
				if( $latest_posts == 'latest' ) {
					$get_posts = new WP_Query( array(
						'posts_per_page' 			=> absint($no_of_posts),
						'post_type'					=> 'post',
						'ignore_sticky_posts' 	=> true
					) );
				}
				else {
					$get_posts = new WP_Query( array(
						'posts_per_page' 			=> absint($no_of_posts),
						'post_type'					=> 'post',
						'category__in'				=> absint($category)
					) );
				}

				while( $get_posts-> have_posts() ) : $get_posts->the_post(); ?>
				<div class="list-category-post">
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="list-category-post-thumbnail">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('timesnews-blog'); ?></a>
						 </div><!-- .list-category-post-thumbnail -->
					<?php } ?>
					<div class="list-category-post-content">
						<div class="list-category-post-meta">
							<?php timesnews_cat_lists (); ?>
						</div><!-- .list-category-post-meta -->
						<h2 class="list-category-post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<div class="list-category-post-meta">
							<?php

								timesnews_posted_by();

								timesnews_posted_on();

							?>
						</div><!-- .list-category-post-meta -->
					</div><!-- .list-category-post-content -->
				</div><!-- .list-category-post -->
				<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div><!-- .list-category-posts-wrap -->
		</div><!-- .list-category-posts-half -->

		<div class="list-category-posts-half lcp-right">
			<?php if(!empty($posts_title_1) ){ ?>
			<h2 class="widget-title"><?php echo esc_attr($posts_title_1); ?></h2>
		<?php } ?>
			<div class="list-category-posts-wrap">
		
				<?php
				if( $latest_posts_1 == 'latest_1' ) {
					$get_posts = new WP_Query( array(
						'posts_per_page' 			=> absint($no_of_posts),
						'post_type'					=> 'post',
						'ignore_sticky_posts' 	=> true
					) );
				}
				else {
					$get_posts = new WP_Query( array(
						'posts_per_page' 			=> absint($no_of_posts),
						'post_type'					=> 'post',
						'category__in'				=> absint($category_1)
					) );
				}

				while( $get_posts-> have_posts() ) : $get_posts->the_post(); ?>
				<div class="list-category-post">
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="list-category-post-thumbnail">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('timesnews-blog'); ?></a>
						 </div><!-- .list-category-post-thumbnail -->
					<?php } ?>
					<div class="list-category-post-content">
						<div class="list-category-post-meta">
							<?php timesnews_cat_lists (); ?>
						</div><!-- .list-category-post-meta -->
						<h2 class="list-category-post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<div class="list-category-post-meta">
							<?php

								timesnews_posted_by();

								timesnews_posted_on();

							?>
						</div><!-- .list-category-post-meta -->
					</div><!-- .list-category-post-content -->
				</div><!-- .list-category-post -->
				<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div><!-- .list-category-posts-wrap -->
		</div><!-- .list-category-posts-half -->

		<?php echo $after_widget . '<!-- .widget_list_category_posts -->';
	}

}