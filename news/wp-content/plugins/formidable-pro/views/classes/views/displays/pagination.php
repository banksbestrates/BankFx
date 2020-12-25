<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

if ( $page_count <= 1 ) {
	return; // Only show the pager bar if there is more than 1 page
}
?>
<div class="<?php echo esc_attr( apply_filters( 'frm_pagination_class', 'frm_pagination_cont', $atts ) ); ?>">
<ul class="<?php echo esc_attr( apply_filters( 'frm_ul_pagination_class', 'frm_pagination', $atts ) ); ?>">
<?php
if ( ! is_numeric( $current_page ) ) {
	$current_page = FrmAppHelper::get_param( $page_param, '1', 'get', 'absint' );
}

$page_params = isset( $page_params ) ? $page_params : '';
$s           = FrmAppHelper::get_param( 'frm_search', false, 'get', 'sanitize_text_field' );

if ( $s ) {
	$page_params .= '&frm_search=' . urlencode( $s );
}

// Only show the prev page button if the current page is not the first page
if ( $current_page > 1 ) {
	$prev_page_link = apply_filters(
		'frm_prev_page_link',
		add_query_arg( array( $page_param => $current_page - 1 ) ) . $page_params,
		$atts
	);
	?>
<li class="<?php echo esc_attr( apply_filters( 'frm_prev_page_class', '', $atts ) ); ?>"><a href="<?php echo esc_url( $prev_page_link ); ?>" class="prev"><?php echo apply_filters( 'frm_prev_page_label', '&#171;', $atts ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a></li> 
	<?php
}

// First page is always displayed
$first_page_link = apply_filters(
	'frm_first_page_link',
	add_query_arg( array( $page_param => 1 ) ) . $page_params,
	$atts
);
?>
<li class="<?php echo 1 == $current_page ? 'active' : ''; ?>"><a href="<?php echo esc_url( $first_page_link ); ?>">1</a></li>
	<?php

	// If the current page is more than 2 spaces away from the first page then we put some dots in here
	if ( $current_page >= 5 ) {
		?>
		<li class="<?php echo esc_attr( apply_filters( 'frm_page_dots_class', 'dots disabled', $atts ) ); ?>">...</li> 
		<?php
	}

	// display the current page icon and the 2 pages beneath and above it
	$low_page  = ( $current_page >= 5 ) ? ( $current_page - 2 ) : 2;
	$high_page = ( ( $current_page + 2 ) < ( $page_count - 1 ) ) ? ( $current_page + 2 ) : ( $page_count - 1 );

	for ( $i = $low_page; $i <= $high_page; $i++ ) {
		$page_link = apply_filters(
			'frm_page_link',
			add_query_arg( array( $page_param => $i ) ) . $page_params,
			$atts
		);
		?>
		<li class="<?php echo esc_attr( $current_page == $i ? 'active' : '' ); ?>"><a href="<?php echo esc_url( $page_link ); ?>"><?php echo absint( $i ); ?></a></li> 
		<?php
	}
	unset( $low_page, $high_page, $i );

	// If the current page is more than 2 away from the last page then show ellipsis
	if ( $current_page < ( $page_count - 3 ) ) {
		?>
		<li class="<?php echo esc_attr( apply_filters( 'frm_page_dots_class', 'dots disabled', $atts ) ); ?>">...</li> 
		<?php
	}

	// Display the last page icon
	$last_page_link = apply_filters(
		'frm_last_page_link',
		add_query_arg( array( $page_param => $page_count ) ) . $page_params,
		$atts
	);
	?>
	<li class="<?php echo esc_attr( $current_page == $page_count ? 'active' : '' ); ?>"><a href="<?php echo esc_url( $last_page_link ); ?>"><?php echo absint( $page_count ); ?></a></li>
	<?php

	// Display the next page icon if there is a next page
	if ( $current_page < $page_count ) {
		$next_page_link = apply_filters(
			'frm_next_page_link',
			add_query_arg( array( $page_param => $current_page + 1 ) ) . $page_params,
			$atts
		);
		?>
		<li class="<?php echo esc_attr( apply_filters( 'frm_next_page_class', '', $atts ) ); ?>"><a href="<?php echo esc_url( $next_page_link ); ?>" class="next"><?php echo apply_filters( 'frm_next_page_label', '&#187;', $atts ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a></li>
		<?php
	}
	?>
</ul>
</div>
