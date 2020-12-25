<?php
/**
 * Widget Featured Post
 *
 * @package magazine_edge
 */
 
// register magazine_edge_Featured_Post widget
function magazine_edge_register_featured_post_widget() {
    register_widget( 'magazine_edge_Featured_Post' );
}
add_action( 'widgets_init', 'magazine_edge_register_featured_post_widget' );
 
 /**
 * Adds magazine_edge_Featured_Post widget.
 */
class magazine_edge_Featured_Post extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'magazine_edge_featured_post', // Base ID
			__( 'Magazine-Edge: Featured Post', 'magazine-edge' ), // Name
			array( 'description' => __( 'A Featured Post Widget', 'magazine-edge' ), ) // Args
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
        $read_more      = !empty( $instance['readmore'] ) ? $instance['readmore'] : '';		     
        $show_thumbnail = !empty( $instance['show_thumbnail'] ) ? $instance['show_thumbnail'] : 1 ;        
        $post_id        = !empty( $instance['post_list'] ) ? $instance['post_list'] : 1 ;
        
        if( get_post_type( $post_id ) == 'post' ){
            $qry = new WP_Query( "p=$post_id" );
        }else{
            $qry = new WP_Query( "page_id=$post_id" );
        }
        if( $qry->have_posts() ){
            echo $args['before_widget'];
            while( $qry->have_posts() ){
                $qry->the_post();
                $title = get_the_title();
                if( isset( $title ) && $title != "" ) { echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title']; } 
            
                if( has_post_thumbnail() && $show_thumbnail ){ ?>                    
                <div class="img-holder">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail( 'magazine-edge-featured-post' ); ?>
                    </a>
                </div>    				
                <?php } ?>
                <div class="text-holder">
                    <?php the_excerpt();?>
                    <a href="<?php the_permalink();?>" class="readmore"><?php echo esc_html( $read_more );?></a>
                </div>        
            <?php    
            }
            wp_reset_postdata();
            echo $args['after_widget'];   
        }
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$postlist[0] = array(
    		'value' => 0,
    		'label' => __('--Choose--', 'magazine-edge'),
    	);
    	$arg = array( 'posts_per_page' => -1, 'post_type' => array( 'post', 'page' ) );
    	$posts = get_posts($arg); 
    	
        foreach( $posts as $p ){ 
    		$postlist[$p->ID] = array(
    			'value' => $p->ID,
    			'label' => $p->post_title
    		);
    	}
        
        $read_more      = !empty( $instance['readmore'] ) ? $instance['readmore'] : __( 'Read More', 'magazine-edge' );	      
        $show_thumbnail = !empty( $instance['show_thumbnail'] ) ? $instance['show_thumbnail'] : 1;        
        $post_list      = !empty( $instance['post_list'] ) ? $instance['post_list'] : 1 ;
        ?>
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'post_list' ) ); ?>"><?php esc_html_e( 'Posts', 'magazine-edge' ); ?></label>
            <select name="<?php echo esc_attr( $this->get_field_name( 'post_list' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'post_list' ) ); ?>" class="widefat">
				<?php
				foreach ( $postlist as $single_post ) { ?>
					<option value="<?php echo esc_attr( $single_post['value'] ); ?>" id="<?php echo esc_attr( $this->get_field_id( $single_post['label'] ) ); ?>" <?php selected( $single_post['value'], $post_list ); ?>><?php echo esc_html( $single_post['label'] ); ?></option>
				<?php } ?>
			</select>
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'readmore' ) ); ?>"><?php esc_html_e( 'Read More Text', 'magazine-edge' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'readmore' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'readmore' ) ); ?>" type="text" value="<?php echo esc_attr( $read_more ); ?>" />
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
		
        $instance['readmore']       = !empty( $new_instance['readmore'] ) ? sanitize_text_field( $new_instance['readmore'] ) : __( 'Read More', 'magazine-edge' );
        $instance['post_list']      = !empty( $new_instance['post_list'] ) ? absint( $new_instance['post_list'] ) : 1;
		return $instance;
	}

} // class magazine_edge_Featured_Post