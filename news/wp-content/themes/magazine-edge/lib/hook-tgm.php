<?php
/**
 * Recommended plugins
 *
 * @package magazine_edge
 */

if ( ! function_exists( 'magazine_edge_recommended_plugins' ) ) :

    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function magazine_edge_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => esc_html__( 'One Click Demo Import', 'magazine-edge' ),
                'slug'     => 'one-click-demo-import',
                'required' => false,
            ),
            array(
                'name'     => esc_html__('ProfileGrid User Profiles and Communities', 'magazine-edge' ),
                'slug'     => 'profilegrid-user-profiles-groups-and-communities',
                'required' => false,
            ),
			   
            array(
                'name'     => esc_html__('Price Table', 'magazine-edge' ),
                'slug'     => 'pricetable-wp',
                'required' => false,
            ),
          
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'magazine_edge_recommended_plugins' );
