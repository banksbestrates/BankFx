<?php
/**
 * Repeated value handling overrite
 * @param  array $reset_options
 * @return void
 *
 * @since st-blog 1.0.2
 */
if ( ! function_exists( 'salient_customizer_get_repeated_all_value' ) ) :
    function salient_customizer_get_repeated_all_value ( $repeated, $repeated_saved_values_name ) {

        $salient_customizer_get_all_values = salient_customizer_get_all_values( );
        $get_repeated_all_value = array();
        for ( $i = 1; $i <= $repeated; $i++ ){
            foreach( $repeated_saved_values_name as $salient_repeated_saved_value_name ){
                if( isset($salient_customizer_get_all_values[$salient_repeated_saved_value_name.'_'.$i]) ){
                    $get_repeated_all_value[$i][$salient_repeated_saved_value_name] = $salient_customizer_get_all_values[$salient_repeated_saved_value_name.'_'.$i];
                }
            }
        }
        return $get_repeated_all_value;
    }
endif;