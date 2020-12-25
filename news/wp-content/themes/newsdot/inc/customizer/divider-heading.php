<?php

class Newsdot_Divider_Heading_Control extends WP_Customize_Control {

	public $type = 'divider-heading';

	protected function render_content() {
		?><div class="newsdot-divider-heading"><label><?php

		if ( ! empty( $this->label ) ) :
			?><span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><?php
		endif;

		if ( ! empty( $this->description ) ) :
			?><span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span><?php
		endif;

		?></label></div><?php

	}
}
