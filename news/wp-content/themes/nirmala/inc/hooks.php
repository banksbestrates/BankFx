<?php
/**
 * Custom hooks
 *
 * @package nirmala
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'nirmala_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function nirmala_site_info() {
		do_action( 'nirmala_site_info' );
	}
}

add_action( 'nirmala_site_info', 'nirmala_add_site_info' );
if ( ! function_exists( 'nirmala_add_site_info' ) ) {
  /**
   * Add site info content.
   */
  function nirmala_add_site_info() {
    $site_info = sprintf(
      '%1$s &copy;%2$s <a href="%3$s" rel="home">%4$s</a> : <a href="%5$s">%6$s</a>. %7$s',
      esc_html__( 'Copyright', 'nirmala' ), date_i18n( __( 'Y' , 'nirmala' ) ), esc_url( home_url( '/' ) ), esc_html( get_bloginfo( 'name', 'display' ) ), esc_url( home_url( '/' ) ), esc_html( get_bloginfo( 'description', 'display' ) ),
      sprintf(
        /* translators:*/
        esc_html__( 'Theme: %1$s by %2$s.', 'nirmala' ), 'Nirmala', '<a href="https://www.indocreativemedia.com/free-wordpress-themes/" target="_blank">IndoCreativeMedia</a>'
      )
    );
    echo apply_filters( 'nirmala_site_info_content', // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
      wp_kses( $site_info, 
        array( 
          'a' => array(
            'class'   => array(),
            'href'    => array(),
            'rel'     => array(),
            'title'   => array(),
            'target'  => array()
          ) 
        ) 
      ) 
    );
  }
}
