<?php
/**
 * Displays the searchform of the theme.
 *
 * @package MagazineBook
 */

?>
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form searchform clearfix" method="get">
	<div class="search-wrap">
		<input type="text" placeholder="<?php esc_attr_e( 'Search', 'magazinebook' ); ?>" class="s field" name="s"><button class="search-icon" type="submit"><i class="fas fa-search"></i></button>
	</div>
</form><!-- .searchform -->
