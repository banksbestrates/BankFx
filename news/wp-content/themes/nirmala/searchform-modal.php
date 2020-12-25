<?php
/**
 * The template for displaying search forms
 *
 * @package nirmala
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<form method="get" id="searchmodal" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label class="sr-only" for="sm"><?php esc_html_e( 'Pop up search form', 'nirmala' ); ?></label>
	<div class="input-group">
		<input class="field form-control" id="sm" name="s" type="text" aria-label="<?php esc_attr_e( 'Search input', 'nirmala' ); ?>" placeholder="<?php esc_attr_e( 'Search &hellip;', 'nirmala' ); ?>" value="<?php the_search_query(); ?>">
		<span class="input-group-append">
			<button class="submit btn btn-primary" id="smsubmit" type="submit" aria-label="<?php esc_attr_e( 'Search submit', 'nirmala' ); ?>"><i class="fa fa-search" aria-hidden="true"></i></button>
		</span>
	</div>
</form>
