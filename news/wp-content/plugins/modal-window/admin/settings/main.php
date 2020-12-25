<?php
/**
 * Tabs menu for Settings
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tab_elements = array(
	'content'  => esc_attr__( 'Popup Content', $this->plugin['text'] ),
	'style'    => esc_attr__( 'Style', $this->plugin['text'] ),
	'settings' => esc_attr__( 'Settings', $this->plugin['text'] ),
	'display'  => esc_attr__( 'Display Rules', $this->plugin['text'] ),
	'button'   => esc_attr__( 'Button', $this->plugin['text'] ),
);

$tab_li      = '';
$tab_content = '';
$i           = '1';
foreach ( $tab_elements as $key => $val ) {
	$active      = ( $i == 1 ) ? 'is-active' : '';
	$tab_li      .= '<li class="' . $active . ' is-marginless" data-tab="' . $i . '"><a>' . $val . '</a></li>';
	$tab_content .= '<div class="' . $active . ' tab-content" data-content="' . $i . '">';
	ob_start();
	include( $key . '/main.php' );
	$tab_content .= ob_get_contents();
	ob_end_clean();
	$tab_content .= '</div>';
	$i ++;
}
?>

<div class="tabs is-centered" id="tab">
    <ul><?php echo $tab_li; ?></ul>
</div>
<div id="tab-content" class="inside">
	<?php echo $tab_content; ?>
</div>