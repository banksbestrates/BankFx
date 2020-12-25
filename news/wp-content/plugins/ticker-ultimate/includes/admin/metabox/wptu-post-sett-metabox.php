<?php
/**
 * Handles 'Ticker' post settings metabox HTML
 *
 * @package Ticker Ultimate
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

global $post;

$prefix = WPTU_META_PREFIX; // Metabox prefix

// Getting saved values
$read_more_link = get_post_meta( $post->ID, $prefix.'more_link', true );

?>

<table class="form-table wptu-post-sett-table">
	<tbody>

		<tr valign="top">
			<th scope="row">
				<label for="wptu-more-link"><?php esc_html_e('Read More Link', 'ticker-ultimate'); ?></label>
			</th>
			<td>
				<input type="url" value="<?php echo wptu_esc_attr($read_more_link); ?>" class="large-text wptu-more-link" id="wptu-more-link" name="<?php echo $prefix; ?>more_link" /><br/>
				<span class="description"><?php esc_html_e('Add custom link for the ticker post. eg : http://www.wponlinesupport.com', 'ticker-ultimate'); ?></span>
			</td>
		</tr>

	</tbody>
</table><!-- end .wptu-tstmnl-table -->