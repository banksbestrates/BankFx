<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

class FrmListEntries extends WP_Widget {

	private $instance;

	public function __construct() {
		$widget_ops = array( 'description' => __( 'Display a list of Formidable entries', 'formidable-views' ) );
		parent::__construct( 'frm_list_items', __( 'Formidable Entries List', 'formidable-views' ), $widget_ops );
	}

	public function widget( $args, $instance ) {
		global $wpdb;

		$display = FrmViewsDisplay::getOne( $instance['display_id'], false, true );

		if ( ! $display ) {
			return;
		}

		$helper = new FrmViewsEntriesWidgetHelper( $instance, $display );
		$title  = apply_filters( 'widget_title', $helper->get_title() );

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo $args['before_widget'];

		if ( $title ) {
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$helper->render_list();

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	public function form( $instance ) {
		$pages          = $this->get_pages();
		$this->instance = $instance;
		$this->adjust_instance();
		$instance = $this->instance;
		?>
	<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'formidable-views' ); ?>:</label>
	<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( stripslashes( $instance['title'] ) ); ?>" /></p>

		<?php $this->render_view_settings(); ?>

	<p class="description"><?php esc_html_e( 'Views with a "Both (Dynamic)" format will show here.', 'formidable-views' ); ?></p>

	<p><label for="<?php echo esc_attr( $this->get_field_id( 'post_id' ) ); ?>"><?php esc_html_e( 'Page', 'formidable-views' ); ?>:</label>
		<select name="<?php echo esc_attr( $this->get_field_name( 'post_id' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'post_id' ) ); ?>" class="widefat">
			<option value=""> </option>
			<?php
			foreach ( $pages as $page ) {
				echo '<option value="' . esc_attr( $page->ID ) . '" ' . selected( $instance['post_id'], $page->ID, false ) . '>' . esc_html( $page->post_title ) . '</option>';
			}
			?>
		</select>
	</p>

	<p><label for="<?php echo esc_attr( $this->get_field_id( 'title_id' ) ); ?>"><?php esc_html_e( 'Title Field', 'formidable-views' ); ?>:</label>
		<select name="<?php echo esc_attr( $this->get_field_name( 'title_id' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'title_id' ) ); ?>" class="widefat frm_list_items_title_id">
			<option value=""> </option>
			<?php
			if ( isset( $title_opts ) && $title_opts ) {
				foreach ( $title_opts as $title_opt ) {
					if ( 'checkbox' !== $title_opt->type ) {
						?>
						<option value="<?php echo absint( $title_opt->id ); ?>" <?php selected( $instance['title_id'], $title_opt->id ); ?>><?php echo esc_html( $title_opt->name ); ?></option>
						<?php
					}
				}
			}
			?>
		</select>
	</p>

	<p><label for="<?php echo esc_attr( $this->get_field_id( 'cat_list' ) ); ?>"><input class="checkbox frm_list_items_cat_list" type="checkbox" <?php checked( $instance['cat_list'], true ); ?> id="<?php echo esc_attr( $this->get_field_id( 'cat_list' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cat_list' ) ); ?>" value="1" />
		<?php esc_html_e( 'List Entries by Category', 'formidable-views' ); ?>
	</label></p>

	<div id="<?php echo esc_attr( $this->get_field_id( 'hide_cat_opts' ) ); ?>" class="frm_list_items_hide_cat_opts <?php echo ( $instance['cat_list'] ) ? '' : 'frm_hidden'; ?>">
	<p><label for="<?php echo esc_attr( $this->get_field_id( 'cat_id' ) ); ?>"><?php esc_html_e( 'Category Field', 'formidable-views' ); ?>:</label>
		<select name="<?php echo esc_attr( $this->get_field_name( 'cat_id' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'cat_id' ) ); ?>" class="widefat frm_list_items_cat_id">
			<option value=""> </option>
			<?php
			if ( isset( $title_opts ) && $title_opts ) {
				foreach ( $title_opts as $title_opt ) {
					if ( in_array( $title_opt->type, array( 'select', 'radio', 'checkbox' ), true ) ) {
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo '<option value="' . esc_attr( $title_opt->id ) . '"' . selected( $instance['cat_id'], $title_opt->id, false ) . '>' . FrmAppHelper::kses( $title_opt->name ) . '</option>';
					}
				}
			}
			?>
		</select>
	</p>

	<p><label for="<?php echo esc_attr( $this->get_field_id( 'cat_count' ) ); ?>"><input class="checkbox" type="checkbox" <?php checked( $instance['cat_count'], true ); ?> id="<?php echo esc_attr( $this->get_field_id( 'cat_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cat_count' ) ); ?>" value="1" />
		<?php esc_html_e( 'Show Entry Counts', 'formidable-views' ); ?>
	</label></p>

	<p><input class="checkbox" type="radio" <?php checked( $instance['cat_name'], 1 ); ?> id="<?php echo esc_attr( $this->get_field_id( 'cat_name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cat_name' ) ); ?>" value="1" />
	<label for="<?php echo esc_attr( $this->get_field_id( 'cat_name' ) ); ?>">
		<?php esc_html_e( 'Show Only Category Name', 'formidable-views' ); ?>
	</label><br/>

	<input class="checkbox" type="radio" <?php checked( $instance['cat_name'], 0 ); ?> id="<?php echo esc_attr( $this->get_field_id( 'cat_name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cat_name' ) ); ?>" value="0" />
	<label for="<?php echo esc_attr( $this->get_field_id( 'cat_name' ) ); ?>">
		<?php esc_html_e( 'Show Entries Beneath Categories', 'formidable-views' ); ?>
	</label>
	</p>
	</div>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>">
			<?php esc_html_e( 'Entry Limit (leave blank to list all)', 'formidable-views' ); ?>:
		</label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'limit' ) ); ?>" value="<?php echo esc_attr( $instance['limit'] ); ?>" />
	</p>

		<?php
	}

	private function get_pages() {
		return get_posts(
			array(
				'post_type'   => 'page',
				'post_status' => 'publish',
				'numberposts' => 999,
				'order_by'    => 'post_title',
				'order'       => 'ASC',
			)
		);
	}

	/**
	 * Define defaults for $instance
	 */
	private function adjust_instance() {
		$this->instance = wp_parse_args(
			(array) $this->instance,
			array(
				'title'      => false,
				'display_id' => false,
				'post_id'    => false,
				'title_id'   => false,
				'cat_list'   => false,
				'cat_name'   => false,
				'cat_count'  => false,
				'cat_id'     => false,
				'limit'      => false,
			)
		);
	}

	private function render_view_settings() {
		if ( is_callable( 'FrmViewsDisplaysController::render_view_settings' ) ) {
			FrmViewsDisplaysController::render_view_settings( $this->instance, $this );
		}
	}
}
