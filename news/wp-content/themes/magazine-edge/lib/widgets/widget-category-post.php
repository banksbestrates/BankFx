<?php
/**
 * Widget Category Post
 *
 * @package magazine_edge
 */
 
// register magazine_edge_Category_Post widget
function magazine_edge_register_category_post_widget() {
    register_widget( 'magazine_edge_Category_Post' );
}
add_action( 'widgets_init', 'magazine_edge_register_category_post_widget' );
 
 /**
 * Adds magazine_edge_Category_Post widget.
 */
class magazine_edge_Category_Post extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'magazine_edge_Category_post', // Base ID
			esc_html__( 'Magazine-Edge: Category Post', 'magazine-edge' ), // Name
			array( 'description' => esc_html__( 'A Category Post Widget', 'magazine-edge' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */




	public function widget( $args, $instance ) {
	   
        $title          = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $num_post       = ! empty( $instance['num_post'] ) ? $instance['num_post'] : 3 ;
        $show_thumb     = ! empty( $instance['show_thumbnail'] ) ? $instance['show_thumbnail'] : 1;
        $show_date      = ! empty( $instance['show_postdate'] ) ? $instance['show_postdate'] : 1;
        $category       = ! empty( $instance['cat'] ) ? $instance['cat'] : '';
        $category_type  = ! empty( $instance['category_type'] ) ? $instance['category_type'] : '';

        $post_args = array(
            'post_type'           => 'post',
            'post_status'         => 'publish',
            'posts_per_page'      => $num_post,
            'ignore_sticky_posts' => true,
        );   

        if( $category ) $post_args['cat'] = $category;
        
        $qry = new WP_Query( $post_args );
        
        if( $qry->have_posts() ){
            echo $args['before_widget'];
            if( isset($title) && $title != "" ) { echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title']; }
            ?>
            <div class="content"> 
                <?php 
                    while( $qry->have_posts() ){
                    $qry->the_post();
                ?>         
                <!--Widget Post-->
                <article class="widget-post">
                    <figure class="post-thumb">
                        <?php if( has_post_thumbnail() && $show_thumb ){ ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php 
                                    if(has_post_thumbnail()):
                                        the_post_thumbnail('magazine-edge-post'); 
                                    else:
                                    ?>
                                        <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/img/391x383.jpg"> 
                                    <?php
                                    endif;
                                ?>
                            </a>
                        <?php }?>
                        <div class="overlay"><span class="icon qb-play-arrow"></span></div>
                    </figure>
                    <div class="text">
                        <?php if( $show_date  ){?>
                            <a href="<?php the_permalink();?>">
                                 <?php the_title(); ?>
                            </a>
                        <?php }?>
                    </div>
                    <div class="post-meta">
                        <?php magazine_edge_posted_on(); ?>
                    </div>
                </article>
                <?php } ?>
            </div>
            <?php
            echo $args['after_widget'];   
        }
        wp_reset_postdata();  
    }

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        
        $title          = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $num_post       = ! empty( $instance['num_post'] ) ? $instance['num_post'] : 3 ;
        $show_thumbnail = ! empty( $instance['show_thumbnail'] ) ? $instance['show_thumbnail'] : 1;
        $show_postdate  = ! empty( $instance['show_postdate'] ) ? $instance['show_postdate'] : 1;
        $category       = ! empty( $instance['cat'] ) ? $instance['cat'] : '';
        $category_type  = ! empty( $instance['category_type'] ) ? $instance['category_type'] : '';
        
        ?>
		
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'magazine-edge' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) );  ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'cat' ) ); ?>"><?php esc_html_e( 'Category:', 'magazine-edge' ); ?></label> 
            <?php wp_dropdown_categories( Array(
                        'orderby'            => 'ID', 
                        'order'              => 'ASC',
                        'show_count'         => 1,
                        'hide_empty'         => 1,
                        'hide_if_empty'      => true,
                        'echo'               => 1,
                        'selected'           => $category,
                        'hierarchical'       => 1, 
                        'name'               => $this->get_field_name( 'cat' ),
                        'id'                 => $this->get_field_id( 'cat' ),
                        'taxonomy'           => 'category',
                    ) ); ?>
        </p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'num_post' ) ); ?>"><?php esc_html_e( 'Number of Posts', 'magazine-edge' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'num_post' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'num_post' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $num_post ); ?>" />
		</p>

		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		
        $instance = array();
		
        $instance['title']          = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['num_post']       = ! empty( $new_instance['num_post'] ) ? absint( $new_instance['num_post'] ) : 3 ;        
        $instance['cat']  = ! empty( $new_instance['cat'] ) ? sanitize_text_field( $new_instance['cat'] ) : '';
        $instance['category_type']  = ! empty( $new_instance['category_type'] ) ? sanitize_text_field( $new_instance['category_type'] ) : '';
		
        return $instance;
                
	}

} // class magazine_edge_Category_Post 