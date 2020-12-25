<?php
if ( ! function_exists( 'salient_customizer_sanitize_image' ) ) :
    /**
     * Image sanitization callback example.
     *
     * Checks the image's file extension and mime type against a whitelist. If they're allowed,
     * send back the filename, otherwise, return the setting default.
     *
     * - Sanitization: image file extension
     * - Control: text, WP_Customize_Image_Control
     *
     * @see wp_check_filetype() https://developer.wordpress.org/reference/functions/wp_check_filetype/
     *
     * @param string               $image   Image filename.
     * @param WP_Customize_Setting $setting Setting instance.
     * @return string The image filename if the extension is allowed; otherwise, the setting default.
     */
    function salient_customizer_sanitize_image( $image, $setting ) {
        /*
         * Array of valid image file types.
         *
         * The array includes image mime types that are included in wp_get_mime_types()
         */
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'          => 'image/x-icon'
        );
        // Return an array with file extension and mime_type.
        $file = wp_check_filetype( $image, $mimes );
        // If $image has a valid mime_type, return it; otherwise, return the default.
        return ( $file['ext'] ? $image : $setting->default );
    }
endif;