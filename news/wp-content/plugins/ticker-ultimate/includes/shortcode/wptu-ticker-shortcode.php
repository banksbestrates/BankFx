<?php
/**
 * `wp_ticker` Shortcode
 * 
 * @package Ticker Ultimate
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

function wptu_ticker( $atts, $content = null ) {
	
	// Shortcode Parameters
	extract(shortcode_atts(array(
		
		'limit' 				=> '-1',
		'category' 				=> '',		
		'ticker_title'			=> __('Latest News','ticker-ultimate'),		
		'posts'					=> array(),
		'width'					=> '100%',
		'color'					=> '#000',
		'background_color'		=> '#2096CD',		
		'effect'				=> 'fade',
		'fontstyle'				=> 'normal',
		'autoplay'				=> 'true',
		'timer'					=> 4000,	
		'title_color'			=> '#000',
		'border'				=> 'true',
		'post_type'				=> '',
		'post_cat'				=> '',
		'link'					=> 'true',
		'link_target'			=> 'self',
	), $atts));
	
    $posts_per_page		= (!empty($limit)) 			  	? $limit 					: '-1';
    $cat    			= (!empty($category))		  	? explode(',',$category) 	: '';
    $color 				= (!empty($color)) 			  	? $color 					: '#000';
	$background_color   = (!empty($background_color)) 	? $background_color 		: '#2096CD';
	$effect 			= (!empty($effect)) 		  	? $effect 					: 'fade';
	$fontstyle 			= (!empty($fontstyle))  	  	? $fontstyle 				: 'normal';
	$autoplay           = (!empty($autoplay)) 		  	? $autoplay 				: 'true';
	$timer				= (!empty($timer)) 	    	  	? $timer 					: '4000';
	$title_color		= (!empty($title_color)) 	  	? $title_color 				: '#000';
	$border				= ($border == 'false') 	  	  	? 'false' 					: 'true';
	$posts 				= !empty($posts)			  	? explode(',', $posts) 		: array();
	$post_type 			= (!empty($post_type)) 		  	? $post_type 				: WPTU_POST_TYPE;
	$post_cat 			= (!empty($post_cat)) 		  	? $post_cat 				: WPTU_CAT;
	$border_class		= ($border == 'false') 			? 'wptu-bordernone' 		: '';
	$link				= ( $link == 'false' ) 		    ? false 					: true;
	$link_target 		= ( $link_target == 'blank' ) 	? '_blank' 					: '_self';
	
	// Enqueue required script
	wp_enqueue_script('wptu-ticker-script');
	wp_enqueue_script('wptu-public-js');
		
	// Taking some globals
	global $post;

	// Taking some defaults
	$unique = wptu_get_unique();
	
	// Ticker Cinfiguration
	$ticker_conf = compact( 'effect' ,'fontstyle', 'autoplay', 'timer');

	// Query Parameter
	$args = array (
		'post_type'     	 	=> $post_type,
		'post_status'			=> array( 'publish' ),
		'posts_per_page' 		=> $posts_per_page,
		'post__in'				=> $posts,		
		'ignore_sticky_posts'	=> true,
	);
	
	// Category Parameter
	if( !empty($cat) ) {

		$args['tax_query'] = array(
								array(
									'taxonomy' 			=> $post_cat,
									'field' 			=> 'term_id',
									'terms' 			=> $cat,
							));
	}
 
	// WP Query
	$query = new WP_Query($args);

	ob_start();

	// If post is there
	if ( $query->have_posts() ) {
	?>

	<style>
	#wptu-ticker-<?php echo $unique; ?> {border-color: <?php echo esc_attr($background_color); ?>;}
	#wptu-ticker-<?php echo $unique; ?> > .wptu-ticker-title {background: <?php echo esc_attr($background_color); ?>;}
	#wptu-ticker-<?php echo $unique; ?> > .wptu-ticker-title > span {border-color: transparent transparent transparent <?php echo esc_attr($background_color); ?>}
	#wptu-ticker-<?php echo $unique; ?> > .wptu-ticker-block > ul > li > a:hover {color: <?php echo esc_attr($background_color); ?>}
	#wptu-ticker-<?php echo $unique; ?> > .wptu-ticker-block > ul > li > a {color: <?php echo esc_attr($color); ?>;font-style: <?php echo esc_attr($fontstyle); ?>}
	#wptu-ticker-<?php echo $unique; ?> > .wptu-ticker-title .wptu-ticker-head {background-color: <?php echo esc_attr($background_color); ?>;color: <?php echo esc_attr($title_color); ?>}
	</style>
	
	<div class="wptu-ticker wptu-ticker-main wptu-clearfix <?php echo $border_class; ?>" id="wptu-ticker-<?php echo $unique; ?>">		
		<div class="wptu-ticker-title"><div class="wptu-ticker-head"><?php echo $ticker_title; ?></div><span></span></div><!-- end .wptu-ticker-title -->
		<div class="wptu-ticker-block">
			<ul>
			<?php while ( $query->have_posts() ) : $query->the_post(); 
				$post_link = wptu_get_post_link( $post->ID ); ?>
				<li>
				<?php if(!empty($post_link) && $link ) { ?>
					<a href="<?php echo $post_link; ?>" target="<?php echo $link_target; ?>"><?php the_title(); ?></a>
				<?php } else { ?>
					<?php the_title(); ?>
				<?php } ?>	
					
				</li>
			<?php endwhile; ?>
			</ul>
		</div><!-- end .wptu-ticker-block -->
		<div class="wptu-ticker-navi">
        	<span></span>
            <span></span>
        </div><!-- end .wptu-ticker-navi -->
        <div class="wptu-ticker-conf"><?php echo json_encode( $ticker_conf ); ?></div><!-- end .wptu-ticker-conf -->

	</div><!-- end .wptu-ticker -->

 
	<?php } // End of have_post()

	wp_reset_postdata(); // Reset WP Query

	$content .= ob_get_clean();
	return $content;
}

// 'wp_ticker' shortcode
add_shortcode('wp_ticker', 'wptu_ticker');