<?php
/**
 * @package CBusiness Investment
 */
require_once get_template_directory() . "/pub/cbusiness-investment-setup-functions.php";
require_once get_template_directory() . "/lib/cbusiness-investment-customization.php";
require_once get_template_directory() . "/pub/cbusiness-investment-style-functions.php";
require_once get_template_directory() . "/pub/cbusiness-investment-widget-functions.php";
require_once get_template_directory() . "/pub/cbusiness-investment-page-functions.php";
 if ( ! function_exists( 'wp_body_open' ) ) {
        function wp_body_open() {
                do_action( 'wp_body_open' );
        }
    }
function cbusiness_investment_embed_html( $html ) {
    return '<div class="video-container">' . $html . '</div>';
} 
add_filter( 'embed_oembed_html', 'cbusiness_investment_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'cbusiness_investment_embed_html' ); 
add_image_size( 'cbusiness-investment-home-box-size', 400, 250,true ); 
function cbusiness_investment_get_excerpt($postid,$post_count_size){
$excerpt = get_post_field('post_content', $postid);;
$excerpt = preg_replace(" ([.*?])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, $post_count_size);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
return $excerpt;
}  
function cbusiness_investment_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}