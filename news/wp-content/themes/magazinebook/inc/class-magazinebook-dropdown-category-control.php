<?php
/**
 * MagazineBook Category Dropdown Class
 *
 * @package MagazineBook
 */

/**
 * Category dropdown select box for customizer
 */
class Magazinebook_Dropdown_Category_Control extends WP_Customize_Control {

	/**
	 * Control Type.
	 *
	 * @var string
	 */
	public $type = 'dropdown-category';

	/**
	 * Dropdown args.
	 *
	 * @var bool
	 */
	protected $dropdown_args = false;

	/**
	 * Render Content.
	 *
	 * @return void
	 */
	protected function render_content() {
		// Render the control here.
		?>
		<label>
			<?php
			if ( ! empty( $this->label ) ) :
				?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php
			endif;

			if ( ! empty( $this->description ) ) :
				?>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php
			endif;

			$dropdown_args = wp_parse_args(
				$this->dropdown_args,
				array(
					'taxonomy'          => 'category',
					'show_option_none'  => ' ',
					'selected'          => $this->value(),
					'show_option_all'   => '',
					'orderby'           => 'id',
					'order'             => 'ASC',
					'show_count'        => 0,
					'hide_empty'        => 1,
					'child_of'          => 0,
					'exclude'           => '',
					'hierarchical'      => 1,
					'depth'             => 0,
					'tab_index'         => 0,
					'hide_if_empty'     => false,
					'option_none_value' => 0,
					'value_field'       => 'term_id',
				)
			);

			$dropdown_args['echo'] = false;

			$dropdown = wp_dropdown_categories( $dropdown_args );
			$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
			echo $dropdown;

		?>
		</label>
		<?php
	}
}
