<?php
/**
 * MagazineBook Add Adv Widget.
 *
 * @package MagazineBook
 */

/**
 * Magazinebook_728x90_Advertisement_Widget
 */
class Magazinebook_728x90_Advertisement_Widget extends WP_Widget {

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'widget_728x90_advertisement',
			'description'                 => __( 'Displays an advertisement with image & a link.', 'magazinebook' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'mb-728-90-adv', $name = __( 'MB: 728x90 Advertisement', 'magazinebook' ), $widget_ops );
	}

	/**
	 * Widget form.
	 *
	 * @param  mixed $instance instance.
	 * @return void
	 */
	public function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title'             => '',
				'728x90_image_url'  => '',
				'728x90_image_link' => '',
			)
		);

		$title      = esc_attr( $instance['title'] );
		$image_link = '728x90_image_link';
		$image_url  = '728x90_image_url';

		$instance[ $image_link ] = esc_url( $instance[ $image_link ] );
		$instance[ $image_url ]  = esc_url( $instance[ $image_url ] );
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'magazinebook' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<label><?php esc_html_e( 'Add your Advertisement 728x90 Images Here', 'magazinebook' ); ?></label>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( $image_link ) ); ?>"> <?php esc_html_e( 'Advertisement Image Link: ', 'magazinebook' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( $image_link ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $image_link ) ); ?>" value="<?php echo esc_url( $instance[ $image_link ] ); ?>" />
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( $image_url ) ); ?>"> <?php esc_html_e( 'Advertisement Image: ', 'magazinebook' ); ?></label>
		<div class="media-uploader" id="<?php echo esc_attr( $this->get_field_id( $image_url ) ); ?>">
			<div class="custom_media_preview">
				<?php if ( '' !== $instance[ $image_url ] ) : ?>
					<img class="custom_media_preview_default" src="<?php echo esc_url( $instance[ $image_url ] ); ?>" style="max-width:100%;" />
				<?php endif; ?>
			</div>
			<input type="text" class="widefat custom_media_input" id="<?php echo esc_attr( $this->get_field_id( $image_url ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $image_url ) ); ?>" value="<?php echo esc_url( $instance[ $image_url ] ); ?>" style="margin-top:5px;" />
			<button class="custom_media_upload button button-secondary button-large" id="<?php echo esc_attr( $this->get_field_id( $image_url ) ); ?>" data-choose="<?php esc_attr_e( 'Choose an image', 'magazinebook' ); ?>" data-update="<?php esc_attr_e( 'Use image', 'magazinebook' ); ?>" style="width:100%;margin-top:6px;margin-right:30px;"><?php esc_html_e( 'Select an Image', 'magazinebook' ); ?></button>
		</div>
		</p>

		<?php
	}

	/**
	 * Update widget form.
	 *
	 * @param  mixed $new_instance New Instance.
	 * @param  mixed $old_instance Old instance.
	 * @return string
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = wp_strip_all_tags( $new_instance['title'] );

		$image_link = '728x90_image_link';
		$image_url  = '728x90_image_url';

		$instance[ $image_link ] = esc_url_raw( $new_instance[ $image_link ] );
		$instance[ $image_url ]  = esc_url_raw( $new_instance[ $image_url ] );

		return $instance;
	}

	/**
	 * Widget.
	 *
	 * @param  mixed $args arguments.
	 * @param  mixed $instance instance.
	 * @return void
	 */
	public function widget( $args, $instance ) {

		$title = isset( $instance['title'] ) ? $instance['title'] : '';

		$image_link = '728x90_image_link';
		$image_url  = '728x90_image_url';

		$image_link = isset( $instance[ $image_link ] ) ? $instance[ $image_link ] : '';
		$image_url  = isset( $instance[ $image_url ] ) ? $instance[ $image_url ] : '';

		echo wp_kses_post( $args['before_widget'] );
		?>

		<div class="mb_advertisement_728x90">
			<?php if ( ! empty( $title ) ) { ?>
				<div class="mb_advertisement-title">
					<?php echo esc_attr( $before_title ) . esc_html( $title ) . esc_attr( $after_title ); ?>
				</div>
				<?php
			}

			$image_id  = attachment_url_to_postid( $image_url );
			$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
			if ( ! empty( $image_url ) ) {
				?>
				<div class="mb_advertisement-content">
				<?php
				if ( ! empty( $image_link ) ) :
					$image_id  = attachment_url_to_postid( $image_url );
					$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
					?>
					<a href="<?php echo esc_url( $image_link ); ?>" class="single_ad_728x90" target="_blank" rel="nofollow">
						<img src="<?php echo esc_url( $image_url ); ?>" width="728" height="90" alt="<?php echo esc_attr( $image_alt ); ?>">
					</a>
					<?php
				else :
					?>
					<img src="<?php echo esc_url( $image_url ); ?>" width="728" height="90" alt="<?php echo esc_attr( $image_alt ); ?>">
					<?php
				endif;
				?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}
}
