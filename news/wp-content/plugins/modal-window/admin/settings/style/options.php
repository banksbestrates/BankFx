<?php
/**
 * Style parameters
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

//region General Style
$modal_height = array(
	'label'   => esc_attr__( 'Modal Height', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[modal_height]',
		'id'    => 'modal_height',
		'value' => isset( $param['modal_height'] ) ? $param['modal_height'] : '0',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'name'    => 'param[modal_height_par]',
		'value'   => isset( $param['modal_height_par'] ) ? $param['modal_height_par'] : '',
		'id'      => 'modal_height_par',
		'options' => [
			'auto' => esc_attr__( 'auto', $this->plugin['text'] ),
			'px'   => esc_attr__( 'px', $this->plugin['text'] ),
			'pr'   => esc_attr__( '%', $this->plugin['text'] ),
		],
	],
	'tooltip' => esc_attr__( 'Set Modal Window height.', $this->plugin['text'] ),
);

$modal_width = array(
	'label'   => esc_attr__( 'Modal Width', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[modal_width]',
		'id'    => 'modal_width',
		'value' => isset( $param['modal_width'] ) ? $param['modal_width'] : '662',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'name'    => 'param[modal_width_par]',
		'value'   => isset( $param['modal_width_par'] ) ? $param['modal_width_par'] : 'px',
		'id'      => 'modal_width_par',
		'options' => [
			'px' => esc_attr__( 'px', $this->plugin['text'] ),
			'pr'  => esc_attr__( '%', $this->plugin['text'] ),
		],
	],
	'tooltip' => esc_attr__( 'Set Modal Window width', $this->plugin['text'] ),
);

$modal_zindex = array(
	'label' => esc_attr__( 'Z-index', $this->plugin['text'] ),
	'attr'  => [
		'name'        => 'param[modal_zindex]',
		'id'          => 'modal_zindex',
		'value'       => isset( $param['modal_zindex'] ) ? $param['modal_zindex'] : '999999',
		'placeholder' => esc_attr__( '', $this->plugin['text'] ),
	],
	'tooltip' => esc_attr__('The z-index property specifies the stack order of an element. An element with greater stack order is always in front of an element with a lower stack order.', $this->plugin['text'] ),
	'help'  => esc_attr__( '', $this->plugin['text'] ),
	'icon'  => '',
);

$modal_position = array(
	'label'   => esc_attr__( 'Position', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[modal_position]',
		'id'    => 'modal_position',
		'value' => isset( $param['modal_position'] ) ? $param['modal_position'] : 'fixed',
	],
	'options' => [
		'fixed'    => __( 'Fixed', $this->plugin['text'] ),
		'absolute' => __( 'Absolute', $this->plugin['text'] ),
	],
	'tooltip' => esc_attr__( 'Set the positioning of the popup. Can be: fixed (popup is positioned relative to the browser window) and absolute (the popup is positioned relative to its place)', $this->plugin['text'] ),
	'help'    => esc_attr__( '', $this->plugin['text'] ),
	'icon'    => '',
	'func'    => '',
);


//endregion

//region Location
$modal_top = array(
	'label'    => esc_attr__( 'Top', $this->plugin['text'] ),
	'attr'     => [
		'name'  => 'param[modal_top]',
		'id'    => 'modal_top',
		'value' => isset( $param['modal_top'] ) ? $param['modal_top'] : '10',
	],
	'checkbox' => [
		'name'  => 'param[include_modal_top]',
		'id'    => 'include_modal_top',
		'class' => 'checkLabel',
		'value' => isset( $param['include_modal_top'] ) ? $param['include_modal_top'] : 1,
	],
	'addon'    => [
		'name'    => 'param[modal_top_unit]',
		'value'   => isset( $param['modal_top_unit'] ) ? $param['modal_top_unit'] : '%',
		'id'      => 'modal_top_unit',
		'options' => [
			'%'  => esc_attr__( '%', $this->plugin['text'] ),
			'px' => esc_attr__( 'px', $this->plugin['text'] ),
		],
	],
	'tooltip'  => esc_attr__( 'Distance from the top edge of the screen.', $this->plugin['text'] ),
);


$modal_bottom = array(
	'label'    => esc_attr__( 'Bottom', $this->plugin['text'] ),
	'attr'     => [
		'name'  => 'param[modal_bottom]',
		'id'    => 'modal_bottom',
		'value' => isset( $param['modal_bottom'] ) ? $param['modal_bottom'] : '10',
	],
	'checkbox' => [
		'name'  => 'param[include_modal_bottom]',
		'id'    => 'include_modal_bottom',
		'class' => 'checkLabel',
		'value' => isset( $param['include_modal_bottom'] ) ? $param['include_modal_bottom'] : 0,
	],
	'addon'    => [
		'name'    => 'param[modal_bottom_unit]',
		'value'   => isset( $param['modal_bottom_unit'] ) ? $param['modal_bottom_unit'] : '%',
		'id'      => 'modal_bottom_unit',
		'options' => [
			'%'  => esc_attr__( '%', $this->plugin['text'] ),
			'px' => esc_attr__( 'px', $this->plugin['text'] ),
		],
	],
	'tooltip'  => esc_attr__( 'Distance from the bottom edge of the screen.', $this->plugin['text'] ),
);

$modal_left = array(
	'label'    => esc_attr__( 'Left', $this->plugin['text'] ),
	'attr'     => [
		'name'  => 'param[modal_left]',
		'id'    => 'modal_left',
		'value' => isset( $param['modal_left'] ) ? $param['modal_left'] : '0',
	],
	'checkbox' => [
		'name'  => 'param[include_modal_left]',
		'id'    => 'include_modal_left',
		'class' => 'checkLabel',
		'value' => isset( $param['include_modal_left'] ) ? $param['include_modal_left'] : 1,
	],
	'addon'    => [
		'name'    => 'param[modal_left_unit]',
		'value'   => isset( $param['modal_left_unit'] ) ? $param['modal_left_unit'] : '%',
		'id'      => 'modal_left_unit',
		'options' => [
			'%'  => esc_attr__( '%', $this->plugin['text'] ),
			'px' => esc_attr__( 'px', $this->plugin['text'] ),
		],
	],
	'tooltip'  => esc_attr__( 'Distance from the left edge of the screen.', $this->plugin['text'] ),
);

$modal_right = array(
	'label'    => esc_attr__( 'Right', $this->plugin['text'] ),
	'attr'     => [
		'name'  => 'param[modal_right]',
		'id'    => 'modal_right',
		'value' => isset( $param['modal_right'] ) ? $param['modal_right'] : '0',
	],
	'checkbox' => [
		'name'  => 'param[include_modal_right]',
		'id'    => 'include_modal_right',
		'class' => 'checkLabel',
		'value' => isset( $param['include_modal_right'] ) ? $param['include_modal_right'] : 1,
	],
	'addon'    => [
		'name'    => 'param[modal_right_unit]',
		'value'   => isset( $param['modal_right_unit'] ) ? $param['modal_right_unit'] : '%',
		'id'      => 'modal_right_unit',
		'options' => [
			'%'  => esc_attr__( '%', $this->plugin['text'] ),
			'px' => esc_attr__( 'px', $this->plugin['text'] ),
		],
	],
	'tooltip'  => esc_attr__( 'Distance from the right edge of the screen.', $this->plugin['text'] ),
);
//endregion

//region Background

$overlay_color = array(
	'label' => esc_attr__( 'Overlay', $this->plugin['text'] ),
	'attr'  => [
		'name'        => 'param[overlay_color]',
		'id'          => 'overlay_color',
		'value'       => isset( $param['overlay_color'] ) ? $param['overlay_color'] : 'rgba(0,0,0,.7)',
		'placeholder' => esc_attr__( '', $this->plugin['text'] ),
	],
	'checkbox' => [
		'name'  => 'param[include_overlay]',
		'id'    => 'include_overlay',
		'class' => 'checkLabel',
		'value' => isset( $param['include_overlay'] ) ? $param['include_overlay'] : 1,
	],
	'tooltip' => esc_attr__( 'Specify if overlay should be active or not. If you uncheck, the modal will have no background overlay.', $this->plugin['text'] ),
	'help'  => esc_attr__( '', $this->plugin['text'] ),
	'icon'  => '',
);

$bg_color = array(
	'label' => esc_attr__( 'Background', $this->plugin['text'] ),
	'attr'  => [
		'name'        => 'param[bg_color]',
		'id'          => 'bg_color',
		'value'       => isset( $param['bg_color'] ) ? $param['bg_color'] : '#ffffff',
		'placeholder' => esc_attr__( '', $this->plugin['text'] ),
	],
	'tooltip'  => esc_attr__( 'Specify modal window background color.', $this->plugin['text'] ),
	'icon'  => '',
);

$modal_background_img = array(
	'label' => esc_attr__( 'Background Image', $this->plugin['text'] ),
	'attr'  => [
		'name'        => 'param[modal_background_img]',
		'id'          => 'modal_background_img',
		'value'       => isset( $param['modal_background_img'] ) ? $param['modal_background_img'] : '',
		'placeholder' => esc_attr__( 'Enter image URL', $this->plugin['text'] ),
	],
	'tooltip'  => esc_attr__( 'Specify the modal window background image. Enter the URL of the image which you want to use as a background.', $this->plugin['text'] ),
	'icon'  => '',
);

$bg_img_repeat = array(
	'label'   => esc_attr__( 'Background Image Repeat', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[bg_img_repeat]',
		'id'    => 'bg_img_repeat',
		'value' => isset( $param['bg_img_repeat'] ) ? $param['bg_img_repeat'] : 'no-repeat',
	],
	'options' => [
		'no-repeat' => esc_attr__( 'No Repeat', $this->plugin['text'] ),
		'repeat' => esc_attr__( 'Repeat', $this->plugin['text'] ),
		'repeat-x' => esc_attr__( 'Repeat X', $this->plugin['text'] ),
		'repeat-y' => esc_attr__( 'Repeat Y', $this->plugin['text'] ),
	],
	'help'    => esc_attr__( '', $this->plugin['text'] ),
	'icon'    => '',
	'func'    => '',
);

$bg_img_size = array(
	'label'   => esc_attr__( 'Background Image Size', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[bg_img_size]',
		'id'    => 'bg_img_size',
		'value' => isset( $param['bg_img_size'] ) ? $param['bg_img_size'] : 'auto',
	],
	'options' => [
		'auto' => esc_attr__( 'Auto', $this->plugin['text'] ),
		'cover' => esc_attr__( 'Cover', $this->plugin['text'] ),
		'contain' => esc_attr__( 'Contain', $this->plugin['text'] ),
	],
	'help'    => esc_attr__( '', $this->plugin['text'] ),
	'icon'    => '',
	'func'    => '',
);

//endregion

//region Title
$popup_title = array(
	'label' => esc_attr__( 'Used title as Popup Title.', $this->plugin['text'] ),
	'attr'  => [
		'name'        => 'param[popup_title]',
		'id'          => 'popup_title',
		'value'       => isset( $param['popup_title'] ) ? $param['popup_title'] : '',
	],
	'func'    => 'enableTitle()',
);

$title_size = array(
	'label'   => esc_attr__( 'Font Size', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[title_size]',
		'id'    => 'title_size',
		'value' => isset( $param['title_size'] ) ? $param['title_size'] : '32',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Set the font size for Title', $this->plugin['text'] ),
);

$title_line_height = array(
	'label'   => esc_attr__( 'Line Height', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[title_line_height]',
		'id'    => 'title_line_height',
		'value' => isset( $param['title_line_height'] ) ? $param['title_line_height'] : '36',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'The line-height property defines the amount of space above and below inline elements', $this->plugin['text'] ),
);

$title_font = array(
	'label'   => esc_attr__( 'Font Family', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[title_font]',
		'id'    => 'title_font',
		'value' => isset( $param['title_font'] ) ? $param['title_font'] : 'inherit',
	],
	'options' => [
		'inherit'         => esc_attr__( 'Use Your Themes', $this->plugin['text'] ),
		'Tahoma'          => 'Tahoma',
		'Georgia'         => 'Georgia',
		'Comic Sans MS'   => 'Comic Sans MS',
		'Arial'           => 'Arial',
		'Lucida Grande'   => 'Lucida Grande',
		'Times New Roman' => 'Times New Roman',
	],
	'tooltip' => esc_attr__( 'Select the Font for Title', $this->plugin['text'] ),
	'icon'    => '',
	'func'    => '',
);

$title_font_weight = array(
	'label'   => esc_attr__( 'Font Weight', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[title_font_weight]',
		'id'    => 'title_font_weight',
		'value' => isset( $param['title_font_weight'] ) ? $param['title_font_weight'] : 'normal',
	],
	'options' => [
		'normal' => 'Normal',
		'100'    => '100',
		'200'    => '200',
		'300'    => '300',
		'400'    => '400',
		'500'    => '500',
		'600'    => '600',
		'700'    => '700',
		'800'    => '800',
		'900'    => '900',
	],
	'tooltip' => esc_attr__( 'Set the Font weight for Title.', $this->plugin['text'] ),
	'icon'    => '',
	'func'    => '',
);

$title_font_style = array(
	'label'   => esc_attr__( 'Font Style', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[title_font_style]',
		'id'    => 'title_font_style',
		'value' => isset( $param['title_font_style'] ) ? $param['title_font_style'] : 'normal',
	],
	'options' => [
		'normal' => 'Normal',
		'italic' => 'Italic',
	],

	'icon'    => '',
	'func'    => '',
);

$title_align = array(
	'label'   => esc_attr__( 'Align', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[title_align]',
		'id'    => 'title_align',
		'value' => isset( $param['title_align'] ) ? $param['title_align'] : 'left',
	],
	'options' => [
		'left'   => 'Left',
		'center' => 'Center',
		'right'  => 'Right',
	],

	'icon'    => '',
	'func'    => '',
);

$title_color = array(
	'label'   => esc_attr__( 'Color', $this->plugin['text'] ),
	'attr'    => [
		'name'        => 'param[title_color]',
		'id'          => 'title_color',
		'value'       => isset( $param['title_color'] ) ? $param['title_color'] : '#383838',

	],
	'tooltip' => esc_attr__( 'Set Title color', $this->plugin['text'] ),
	'icon'    => '',
);

$title_bg_color = array(
	'label'   => esc_attr__( 'Background', $this->plugin['text'] ),
	'attr'    => [
		'name'        => 'param[title_bg_color]',
		'id'          => 'title_bg_color',
		'value'       => isset( $param['title_bg_color'] ) ? $param['title_bg_color'] : 'rgba(0,0,0,0)',
	],
	'tooltip' => esc_attr__( 'Set Title Background color', $this->plugin['text'] ),
	'icon'    => '',
);


//endregion

//region Content

$modal_padding = array(
	'label' => esc_attr__( 'Padding', $this->plugin['text'] ),
	'attr'  => [
		'name'        => 'param[modal_padding]',
		'id'          => 'modal_padding',
		'value'       => isset( $param['modal_padding'] ) ? $param['modal_padding'] : '10',
		'placeholder' => esc_attr__( '', $this->plugin['text'] ),
	],
	'addon' => [
		'unit' => 'px',
	],
	'tooltip'  => esc_attr__( 'Specify modal window inner padding.', $this->plugin['text'] ),
	'icon'  => '',
);


$content_size = array(
	'label'   => esc_attr__( 'Font Size', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[content_size]',
		'id'    => 'content_size',
		'value' => isset( $param['content_size'] ) ? $param['content_size'] : '16',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Set the font size for content', $this->plugin['text'] ),
);

$content_font = array(
	'label'   => esc_attr__( 'Font Family', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[content_font]',
		'id'    => 'content_font',
		'value' => isset( $param['content_font'] ) ? $param['content_font'] : 'inherit',
	],
	'options' => [
		'inherit'         => esc_attr__( 'Use Your Themes', $this->plugin['text'] ),
		'Sans-Serif'      => 'Sans-Serif',
		'Tahoma'          => 'Tahoma',
		'Georgia'         => 'Georgia',
		'Comic Sans MS'   => 'Comic Sans MS',
		'Arial'           => 'Arial',
		'Lucida Grande'   => 'Lucida Grande',
		'Times New Roman' => 'Times New Roman',
	],
	'tooltip' => esc_attr__( 'Select the Font for Content.', $this->plugin['text'] ),
	'icon'    => '',
	'func'    => '',
);

$content_line_height = array(
	'label'   => esc_attr__( 'Line Height', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[content_line_height]',
		'id'    => 'content_line_height',
		'value' => isset( $param['content_line_height'] ) ? $param['content_line_height'] : '18',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'The line-height property defines the amount of space above and below inline elements', $this->plugin['text'] ),
);

//endregion

//region Close Button
$close_location = array(
	'label'   => esc_attr__( 'Location', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[close_location]',
		'id'    => 'close_location',
		'value' => isset( $param['close_location'] ) ? $param['close_location'] : '',
	],
	'options' => [
		'topRight'      => __('Top Right location on the popup', $this->plugin['text']),
	],
	'tooltip'    => esc_attr__( 'Specify close button location.', $this->plugin['text'] ),
	'icon'    => '',
	'func'    => 'closeLocation()',
);

$close_top_position = array(
	'label' => esc_attr__( 'Top', $this->plugin['text'] ),
	'attr' => [
		'name'   => 'param[close_top_position]',
		'id'     => 'close_top_position',
		'value'    => isset( $param['close_top_position'] ) ? $param['close_top_position'] : '0',
		'step'        => '1',
	],
	'addon' => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Distance from the top edge of the popup.', $this->plugin['text'] ),
);

$close_bottom_position = array(
	'label' => esc_attr__( 'Bottom', $this->plugin['text'] ),
	'attr' => [
		'name'   => 'param[close_bottom_position]',
		'id'     => 'close_bottom_position',
		'value'    => isset( $param['close_bottom_position'] ) ? $param['close_bottom_position'] : '0',
		'step'        => '1',
	],
	'addon' => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Distance from the bottom edge of the popup.', $this->plugin['text'] ),
);

$close_left_position = array(
	'label' => esc_attr__( 'Left', $this->plugin['text'] ),
	'attr' => [
		'name'   => 'param[close_left_position]',
		'id'     => 'close_left_position',
		'value'    => isset( $param['close_left_position'] ) ? $param['close_left_position'] : '0',
		'step'        => '1',
	],
	'addon' => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Distance from the left edge of the popup.', $this->plugin['text'] ),
);

$close_right_position = array(
	'label' => esc_attr__( 'Right', $this->plugin['text'] ),
	'attr' => [
		'name'   => 'param[close_right_position]',
		'id'     => 'close_right_position',
		'value'    => isset( $param['close_right_position'] ) ? $param['close_right_position'] : '0',
		'step'        => '1',
	],
	'addon' => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Distance from the right edge of the popup.', $this->plugin['text'] ),
);

$close_type = array(
	'label'   => esc_attr__( 'Button type', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[close_type]',
		'id'    => 'close_type',
		'value' => isset( $param['close_type'] ) ? $param['close_type'] : 'text',
	],
	'options' => [
		'image'      => __('Icon', $this->plugin['text']),
		'text'      => __('Text', $this->plugin['text']),
	],
	'func'    => 'closeType()',
);

$close_content = array(
	'label' => esc_attr__( 'Text', $this->plugin['text'] ),
	'attr'  => [
		'name'        => 'param[close_content]',
		'id'          => 'close_content',
		'value'       => isset( $param['close_content'] ) ? $param['close_content'] : 'Close',
		'placeholder' => esc_attr__( 'Close', $this->plugin['text'] ),
	],
	'tooltip'  => esc_attr__( 'Enter the close button text.', $this->plugin['text'] ),
	'icon'  => '',
);

$close_padding = array(
	'label' => esc_attr__( 'Padding ', $this->plugin['text'] ),
	'attr'  => [
		'name'        => 'param[close_padding]',
		'id'          => 'close_padding',
		'value'       => isset( $param['close_padding'] ) ? $param['close_padding'] : '6px 12px',
		'placeholder' => esc_attr__( '', $this->plugin['text'] ),
	],
	'tooltip'  => esc_attr__( 'Specify button text inner padding. Can be: any integer value in px (for example: "10px" will set popup inner paddings to 10px); if you enter 0, the popup will have not paddings; when four values are specified, the paddings apply to the top, right, bottom, and left in that order (clockwise).', $this->plugin['text'] ),
	'icon'  => '',
);

$close_box_size = array(
	'label'    => esc_attr__( 'Box Size', $this->plugin['text'] ),
	'attr'     => [
		'name'  => 'param[close_box_size]',
		'id'    => 'close_box_size',
		'value' => isset( $param['close_box_size'] ) ? $param['close_box_size'] : '24',
		'min'   => '0',
		'step'  => '0.01',
	],
	'addon'    => [
		 'unit' => 'px',
	],
	'tooltip'     => esc_attr__( 'Specify box size for close button icon.', $this->plugin['text'] ),
);

$close_size = array(
	'label'    => esc_attr__( 'Font Size', $this->plugin['text'] ),
	'attr'     => [
		'name'  => 'param[close_size]',
		'id'    => 'close_size',
		'value' => isset( $param['close_size'] ) ? $param['close_size'] : '12',
		'min'   => '0',
		'step'  => '1',
	],	
	'addon'    => [		
		 'unit' => 'px',
	],
	'tooltip'     => esc_attr__( 'Set the font size for close button content', $this->plugin['text'] ),
);

$close_font = array(
	'label'   => esc_attr__( 'Font Family', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[close_font]',
		'id'    => 'close_font',
		'value' => isset( $param['close_font'] ) ? $param['close_font'] : 'inherit',
	],
	'options' => [
		'inherit' => __('Use Your Themes', $this->plugin['text']),
		'Tahoma' => 'Tahoma',
		'Georgia' => 'Georgia',
		'Comic Sans MS' => 'Comic Sans MS',
		'Arial' => 'Arial',
		'Lucida Grande' => 'Lucida Grande',
		'Times New Roman' => 'Times New Roman',
	],
);

$close_weight = array(
	'label'   => esc_attr__( 'Font Weight', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[close_weight]',
		'id'    => 'close_weight',
		'value' => isset( $param['close_weight'] ) ? $param['close_weight'] : 'normal',
	],
	'options' => [
		'normal' => 'Normal',
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900',
	],
);

$close_font_style = array(
	'label'   => esc_attr__( 'Font Style', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[close_font_style]',
		'id'    => 'close_font_style',
		'value' => isset( $param['close_font_style'] ) ? $param['close_font_style'] : 'normal',
	],
	'options' => [
		'normal' => 'Normal',
		'italic' => 'Italic',
	],
);

$close_border_radius = array(
	'label' => esc_attr__( 'Border Radius', $this->plugin['text'] ),
	'attr' => [
		'name'   => 'param[close_border_radius]',
		'id'     => 'close_border_radius',
		'value'    => isset( $param['close_border_radius'] ) ? $param['close_border_radius'] : '0',
		'min'         => '0',
		'step'        => '1',
	],
	'addon' => [
		'unit' => 'px',
	]
);

$close_content_color = array(
	'label' => esc_attr__( 'Color', $this->plugin['text'] ),
	'attr' => [
		'name'   => 'param[close_content_color]',
		'id'     => 'close_content_color',
		'value'    => isset( $param['close_content_color'] ) ? $param['close_content_color'] : '#ffffff',
	],
	'tooltip' => esc_attr__('Specify popup close button color.', $this->plugin['text']),
);

$close_content_color_hover = array(
	'label' => esc_attr__( 'Hover Color', $this->plugin['text'] ),
	'attr' => [
		'name'   => 'param[close_content_color_hover]',
		'id'     => 'close_content_color_hover',
		'value'    => isset( $param['close_content_color_hover'] ) ? $param['close_content_color_hover'] : '#000000',
	],
	'tooltip' => esc_attr__( 'Specify popup close button hover text color.', $this->plugin['text'] ),
);

$close_background_color = array(
	'label' => esc_attr__( 'Background', $this->plugin['text'] ),
	'attr' => [
		'name'   => 'param[close_background_color]',
		'id'     => 'close_background_color',
		'value'    => isset( $param['close_background_color'] ) ? $param['close_background_color'] : '#000000',
	],
	'tooltip' => esc_attr__( 'Specify popup close button background color.', $this->plugin['text'] ),
);

$close_background_hover = array(
	'label' => esc_attr__( 'Hover Background', $this->plugin['text'] ),
	'attr' => [
		'name'   => 'param[close_background_hover]',
		'id'     => 'close_background_hover',
		'value'    => isset( $param['close_background_hover'] ) ? $param['close_background_hover'] : '#ffffff',
	],
	'tooltip' => esc_attr__('Specify popup close button hover background color.', $this->plugin['text']),
);

//endregion

//region Border
$border_radius = array(
	'label'   => esc_attr__( 'Radius', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[border_radius]',
		'id'    => 'border_radius',
		'value' => isset( $param['border_radius'] ) ? $param['border_radius'] : '5',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Specify border radius.', $this->plugin['text'] ),
);

$border_style = array(
	'label'   => esc_attr__( 'Style', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[border_style]',
		'id'    => 'border_style',
		'value' => isset( $param['border_style'] ) ? $param['border_style'] : 'none',
	],
	'options' => [
		'none'   => esc_attr__( 'None', $this->plugin['text'] ),
		'solid'  => esc_attr__( 'Solid', $this->plugin['text'] ),
		'dotted' => esc_attr__( 'Dotted', $this->plugin['text'] ),
		'dashed' => esc_attr__( 'Dashed', $this->plugin['text'] ),
		'double' => esc_attr__( 'Double', $this->plugin['text'] ),
		'groove' => esc_attr__( 'Groove', $this->plugin['text'] ),
		'inset'  => esc_attr__( 'Inset', $this->plugin['text'] ),
		'outset' => esc_attr__( 'Outset', $this->plugin['text'] ),
		'ridge'  => esc_attr__( 'Ridge', $this->plugin['text'] ),
	],
	'tooltip' => esc_attr__( 'Choose a border style.', $this->plugin['text'] ),
);

$border_width = array(
	'label'   => esc_attr__( 'Thickness', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[border_width]',
		'id'    => 'border_width',
		'value' => isset( $param['border_width'] ) ? $param['border_width'] : '0',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Specify border width.', $this->plugin['text'] ),
);

$border_color = array(
	'label' => esc_attr__( 'Color', $this->plugin['text'] ),
	'attr'  => [
		'name'        => 'param[border_color]',
		'id'          => 'border_color',
		'value'       => isset( $param['border_color'] ) ? $param['border_color'] : '#ffffff',

	],
	'help'  => '',
	'icon'  => '',
);

$border_margin = array(
	'label' => esc_attr__( 'Margin', $this->plugin['text'] ),
	'attr'  => [
		'name'  => 'param[border_margin]',
		'id'    => 'border_margin',
		'value' => isset( $param['border_margin'] ) ? $param['border_margin'] : '0',
		'step'  => '1',
	],
	'help'  => esc_attr__( 'Margin for border. Can be a negative value.', $this->plugin['text'] ),
);

//endregion

//region Shadow
$shadow = array(
	'label'   => esc_attr__( 'Shadow', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[shadow]',
		'id'    => 'shadow',
		'value' => isset( $param['shadow'] ) ? $param['shadow'] : 'none',
	],
	'options' => [
		'none'   => esc_attr__( 'None', $this->plugin['text'] ),
		'outset' => esc_attr__( 'Yes', $this->plugin['text'] ),
		'inset'  => esc_attr__( 'Inset', $this->plugin['text'] ),
	],
	'tooltip' => esc_attr__( 'Set the box shadow.', $this->plugin['text'] ),
	'icon'    => '',
	'func'    => 'shadowEnabled()',
);

$shadow_h_offset = array(
	'label'   => esc_attr__( 'Horizontal Position', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[shadow_h_offset]',
		'id'    => 'shadow_h_offset',
		'value' => isset( $param['shadow_h_offset'] ) ? $param['shadow_h_offset'] : '0',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'The horizontal offset of the shadow. A positive value puts the shadow on the right side of the box, a negative value puts the shadow on the left side of the box.', $this->plugin['text'] ),
);

$shadow_v_offset = array(
	'label'   => esc_attr__( 'Vertical Position', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[shadow_v_offset]',
		'id'    => 'shadow_v_offset',
		'value' => isset( $param['shadow_v_offset'] ) ? $param['shadow_v_offset'] : '0',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'The vertical offset of the shadow. A positive value puts the shadow below the box, a negative value puts the shadow above the box.', $this->plugin['text'] ),
);

$shadow_blur = array(
	'label'   => esc_attr__( 'Blur', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[shadow_blur]',
		'id'    => 'shadow_blur',
		'value' => isset( $param['shadow_blur'] ) ? $param['shadow_blur'] : '3',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'The blur radius. The higher the number, the more blurred the shadow will be.', $this->plugin['text'] ),
);

$shadow_spread = array(
	'label'   => esc_attr__( 'Spread', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[shadow_spread]',
		'id'    => 'shadow_spread',
		'value' => isset( $param['shadow_spread'] ) ? $param['shadow_spread'] : '0',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'The spread radius. A positive value increases the size of the shadow, a negative value decreases the size of the shadow.', $this->plugin['text'] ),
);

$shadow_color = array(
	'label'   => esc_attr__( 'Color', $this->plugin['text'] ),
	'attr'    => [
		'name'        => 'param[shadow_color]',
		'id'          => 'shadow_color',
		'value'       => isset( $param['shadow_color'] ) ? $param['shadow_color'] : '#020202',

	],
	'tooltip' => esc_attr__( 'The color of the shadow.', $this->plugin['text'] ),
	'icon'    => '',
);
//endregion

//region Mobile Rules
$screen_size = array(
	'label' => esc_attr__( 'Mobile screen', $this->plugin['text'] ),
	'attr' => [
		'name'   => 'param[screen_size]',
		'id'     => 'screen_size',
		'value'    => isset( $param['screen_size'] ) ? $param['screen_size'] : '480',
		'min'         => '0',
		'step'        => '1',
	],
	'addon' => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Set the screen size in px of mobile devices for which the this option of the modal window size will be applied.', $this->plugin['text'] ),
);

$mobile_width = array(
	'label'    => esc_attr__( 'Modal Width', $this->plugin['text'] ),
	'attr'     => [
		'name'  => 'param[mobile_width]',
		'id'    => 'mobile_width',
		'value' => isset( $param['mobile_width'] ) ? $param['mobile_width'] : '85',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'    => [
		'name'    => 'param[mobile_width_par]',
		'value'   => isset( $param['mobile_width_par'] ) ? $param['mobile_width_par'] : 'pr',
		'options' => [
			'px' => esc_attr__( 'px', $this->plugin['text'] ),
			'pr' => esc_attr__( '%', $this->plugin['text'] ),
		],
		// 'unit' => 'px',
	],
	'tooltip'     => esc_attr__( 'Set the width of the modal window for mobile devices.', $this->plugin['text'] ),
);
//endregion