<?php
/**
 * The template for displaying search forms
 *
 * @package nirmala
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<form method="get" id="searchformbig" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label class="sr-only" for="sb"><?php esc_html_e( 'Search form', 'nirmala' ); ?></label>
	<div class="input-group input-group-lg">
		<input class="field form-control" id="sb" name="s" type="text" aria-label="<?php esc_attr_e( 'Search input', 'nirmala' ); ?>" placeholder="<?php esc_attr_e( 'Search &hellip;', 'nirmala' ); ?>" value="<?php the_search_query(); ?>">
		<span class="input-group-append">
			<button class="submit btn btn-primary" id="sbsubmit" type="submit" aria-label="<?php esc_attr_e( 'Search submit', 'nirmala' ); ?>"><i class="fa fa-search" aria-hidden="true"></i></button>
		</span>
	</div>
</form>

