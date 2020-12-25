<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

class FrmViewsEntriesWidgetHelper {

	protected $instance;
	protected $display;

	public function __construct( $instance, $display ) {
		$this->instance = $instance;
		$this->display  = $display;
	}

	public function get_title() {
		if ( ! empty( $this->instance['title'] ) ) {
			return $this->instance['title'];
		}
		return $this->display->post_title;
	}

	protected function get_ul_id() {
		return 'frm_entry_list' . $this->display->frm_form_id;
	}

	public function render_list() {
		$this->render_list_open();
		$this->render_items();
		$this->render_list_close();
	}

	private function render_list_open() {
		return '<ul id="' . $this->get_ul_id() . '">';
	}

	private function render_list_close() {
		return '</ul>';
	}

	protected function render_items() {
		$instance  = $this->instance;
		$display   = $this->display;
		$limit     = FrmDb::esc_limit( empty( $instance['limit'] ) ? '100' : $instance['limit'] );
		$post_id   = $instance['post_id'];
		$page_url  = get_permalink( $post_id );
		$order_by  = '';
		$cat_field = false;

		if ( is_numeric( $display->frm_form_id ) && ! empty( $display->frm_form_id ) ) {
			// Set up order for Entries List Widget
			if ( ! empty( $display->frm_order_by ) ) {
				// Get only the first order field and order
				$order_field = reset( $display->frm_order_by );
				$order       = reset( $display->frm_order );
				FrmDb::esc_order_by( $order );

				if ( 'rand' === $order_field ) {
					// If random is set, set the order to random
					$order_by = ' RAND()';
				} elseif ( is_numeric( $order_field ) ) {
					// If ordering by a field

					// Get all post IDs for this form
					$posts        = FrmDb::get_results(
						$wpdb->prefix . 'frm_items',
						array(
							'form_id'   => $display->frm_form_id,
							'post_id >' => 1,
							'is_draft'  => 0,
						),
						'id, post_id'
					);
					$linked_posts = array();
					foreach ( $posts as $post_meta ) {
						$linked_posts[ $post_meta->post_id ] = $post_meta->id;
					}

					// Get all field information
					$o_field = FrmField::getOne( $order_field );
					$query   = 'SELECT m.id FROM ' . $wpdb->prefix . 'frm_items m INNER JOIN ';
					$where   = array();

					// create query with ordered values
					// if field is some type of post field
					if ( ! empty( $o_field->field_options['post_field'] ) ) {
						if ( 'post_custom' === $o_field->field_options['post_field'] && ! empty( $linked_posts ) ) {
							// if field is custom field
							$where['pm.post_id'] = array_keys( $linked_posts );
							FrmDb::get_where_clause_and_values( $where );
							array_unshift( $where['values'], $o_field->field_options['custom_field'] );

							$query .= $wpdb->postmeta . ' pm ON pm.post_id=m.post_id AND pm.meta_key=%s ' . $where['where'] . ' ORDER BY CASE when pm.meta_value IS NULL THEN 1 ELSE 0 END, pm.meta_value ' . $order;
						} elseif ( 'post_category' !== $o_field->field_options['post_field'] && ! empty( $linked_posts ) ) {
							// if field is a non-category post field
							$where['p.ID'] = array_keys( $linked_posts );
							FrmDb::get_where_clause_and_values( $where );

							$query .= $wpdb->posts . ' p ON p.ID=m.post_id ' . $where['where'] . ' ORDER BY CASE p.' . sanitize_title( $o_field->field_options['post_field'] ) . ' WHEN "" THEN 1 ELSE 0 END, p.' . sanitize_title( $o_field->field_options['post_field'] ) . ' ' . $order;
						}
					} else {
						// if field is a normal, non-post field
						$where['em.field_id'] = $o_field->id;
						FrmDb::get_where_clause_and_values( $where );

						$query .= $wpdb->prefix . 'frm_item_metas em ON em.item_id=m.id ' . $where['where'] . ' ORDER BY CASE when em.meta_value IS NULL THEN 1 ELSE 0 END, em.meta_value' . ( 'number' === $o_field->type ? ' +0 ' : '' ) . ' ' . $order;
					}

					// Get ordered values
					if ( $where ) {
						// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
						$metas = $wpdb->get_results( $wpdb->prepare( $query, $where['values'] ) );
					} else {
						$metas = false;
					}

					unset( $query, $where );

					if ( $metas ) {
						$order_by_array = array();
						foreach ( $metas as $meta ) {
							$order_by_array[] = $wpdb->prepare( 'it.id=%d DESC', $meta->id );
						}

						$order_by = implode( ', ', $order_by_array );
						unset( $order_by_array );
					} else {
						$order_by .= 'it.created_at ' . $order;
					}
					unset( $metas );
				} elseif ( $order_field ) {
					// If ordering by created_at or updated_at
					$order_by = 'it.' . sanitize_title( $order_field ) . ' ' . $order;
				}

				if ( ! empty( $order_by ) ) {
					$order_by = ' ORDER BY ' . $order_by;
				}
			}

			if ( isset( $instance['cat_list'] ) && 1 === (int) $instance['cat_list'] && is_numeric( $instance['cat_id'] ) ) {
				$cat_field = FrmField::getOne( $instance['cat_id'] );
				if ( $cat_field ) {
					$categories = $cat_field->options;
					FrmProAppHelper::unserialize_or_decode( $categories );
				}
			}
		}

		// if Listing entries by category
		if ( isset( $instance['cat_list'] ) && 1 === (int) $instance['cat_list'] && isset( $categories ) && is_array( $categories ) ) {
			foreach ( $categories as $cat_order => $cat ) {
				if ( ! $cat ) {
					continue;
				}
				echo '<li>';

				if ( isset( $instance['cat_name'] ) && 1 === (int) $instance['cat_name'] && $cat_field ) {
					echo '<a href="' . esc_url(
						add_query_arg(
							array(
								'frm_cat'    => $cat_field->field_key,
								'frm_cat_id' => $cat_order,
							),
							$page_url
						)
					) . '">';
				}

				echo esc_html( $cat );

				if ( isset( $instance['cat_count'] ) && 1 === (int) $instance['cat_count'] ) {
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo ' (' . FrmProStatisticsController::stats_shortcode(
						array(
							'id'    => $instance['cat_id'],
							'type'  => 'count',
							'value' => $cat,
						)
					) . ')';
				}

				if ( isset( $instance['cat_name'] ) && 1 === (int) $instance['cat_name'] ) {
					echo '</a>';
				} else {
					$entry_ids = FrmEntryMeta::getEntryIds(
						array(
							'meta_value like' => $cat,
							'fi.id'           => $instance['cat_id'],
						)
					);
					$items     = false;
					if ( $entry_ids ) {
						$items = FrmEntry::getAll(
							array(
								'it.id'      => $entry_ids,
								'it.form_id' => (int) $display->frm_form_id,
							),
							$order_by,
							$limit
						);
					}

					if ( $items ) {
						echo '<ul>';
						foreach ( $items as $item ) {
							$url_id  = 'id' === $display->frm_type ? $item->id : $item->item_key;
							$current = FrmAppHelper::simple_get( $display->frm_param ) == $url_id ? ' class="current_page"' : '';

							if ( $item->post_id ) {
								$entry_link = get_permalink( $item->post_id );
							} else {
								$entry_link = add_query_arg( array( $display->frm_param => $url_id ), $page_url );
							}

							// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							echo '<li' . $current . '><a href="' . esc_url( $entry_link ) . '">' . FrmAppHelper::kses( $item->name ) . '</a></li>' . "\n";
						}
						echo '</ul>';
					}
				}
				echo '</li>';
			}
		} else { // if not listing entries by category
			$items = FrmEntry::getAll(
				array(
					'it.form_id' => $display->frm_form_id,
					'is_draft'   => '0',
				),
				$order_by,
				$limit
			);

			foreach ( $items as $item ) {
				$url_id  = 'id' === $display->frm_type ? $item->id : $item->item_key;
				$current = FrmAppHelper::simple_get( $display->frm_param ) == $url_id ? ' class="current_page"' : '';
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo '<li' . $current . '><a href="' . esc_url( add_query_arg( array( $display->frm_param => $url_id ), $page_url ) ) . '">' . FrmAppHelper::kses( $item->name ) . '</a></li>' . "\n";
			}
		}
	}
}
