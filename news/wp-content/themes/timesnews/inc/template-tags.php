<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package timesnews
 */

if ( ! function_exists( 'timesnews_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function timesnews_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);

		$posted_on = sprintf( '%s', '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' );

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'timesnews_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function timesnews_posted_by() {
		$byline = sprintf( '<span class="author vcard"> <a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a> </span>'
		);

		echo $byline ; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'timesnews_comment_links' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function timesnews_comment_links() {

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Comment<span class="screen-reader-text"> on %s</span>', 'timesnews' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'timesnews' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'timesnews_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function timesnews_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail( 'timesnews-blog', array(
						'alt' => the_title_attribute( array(
							'echo' => false,
						) ),
					) );
				?>
			</a>
		</div>

		<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'timesnews_tag_lists' ) ) :
	function timesnews_tag_lists () {
		/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '');
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
			printf( '<span class="tag-links">%1$s</span> ', $tags_list ); // WPCS: XSS OK.
			}
	}

endif;

if ( ! function_exists( 'timesnews_cat_lists' ) ) :
	function timesnews_cat_lists () {
		global $post;
		$post_id = $post->ID;
		$categories_list = get_the_category($post_id);
		?>

		<span class="cat-links">
		<?php
			foreach ( $categories_list as $category_data ) {
				$cat_name = $category_data->name;
				$cat_id = $category_data->term_id;
				$cat_link = get_category_link( $cat_id );
		?>

			<a class="category-color-<?php echo absint( $cat_id ); ?>" href="<?php echo esc_url($cat_link); ?>"><?php echo esc_html( $cat_name ); ?></a>
		<?php } ?>
		</span>
	<?php }

endif;

if ( ! function_exists( 'timesnews_nav_class' ) ) :

	function timesnews_nav_class( $classes, $item ){
		if( 'category' == $item->object ){
			$category = get_category( $item->object_id );
			if(isset($category->term_id)) {
				$classes[] = 'category-color-' . absint($category->term_id);
			}
		}
	return $classes;
	}

	add_filter( 'nav_menu_css_class', 'timesnews_nav_class', 10, 4);

endif;
