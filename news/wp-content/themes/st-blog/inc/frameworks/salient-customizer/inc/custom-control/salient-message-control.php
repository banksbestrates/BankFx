<?php
if ( class_exists( 'WP_Customize_Control' ) && !class_exists( 'Salient_Customizer_Message_Control' ) ){
    /**
     * Custom Control for html display
     * @since 0.0.1
     *
     */
    class Salient_Customizer_Message_Control extends WP_Customize_Control {

        /**
         * Declare the control type.
         *
         * @access public
         * @var string
         */
        public $type = 'message';

        /**
         * Function to  render the content on the theme customizer page
         *
         * @access public
         * @since 0.0.1
         *
         * @param null
         * @return void
         *
         */
        public function render_content() {
            if ( empty( $this->description ) ) {
                return;
            }
            ?>
            <div class="salient-customizer-message">
                <?php echo wp_kses_post( $this->description ); ?>
            </div> <!-- .salient-customizer-message-->
            <?php
        }
    }
}

