<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package MagazineBook
 */

if ( ! function_exists( 'magazinebook_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function magazinebook_posted_on() {
		if ( ! get_theme_mod( 'magazinebook_hide_post_date', false ) ) {
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
			}

			$time_string = sprintf(
				$time_string,
				esc_attr( get_the_date( DATE_W3C ) ),
				esc_html( get_the_date() ),
				esc_attr( get_the_modified_date( DATE_W3C ) ),
				esc_html( get_the_modified_date() )
			);

			$posted_on_string = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

			echo '<span class="posted-on">';
			echo '<i class="far fa-calendar-alt"></i>';
			echo wp_kses(
				$posted_on_string,
				array(
					'a'    => array(
						'class' => array(),
						'href'  => array(),
						'rel'   => array(),
					),
					'time' => array(
						'class'    => array(),
						'datetime' => array(),
					),
				)
			);
			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'magazinebook_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function magazinebook_posted_by() {
		if ( ! get_theme_mod( 'magazinebook_hide_post_author', false ) ) {
			echo '<span class="byline">';
			echo '<i class="far fa-user-circle"></i>';
			echo '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';
			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'magazinebook_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function magazinebook_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'magazinebook' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'magazinebook' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'magazinebook' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'magazinebook' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'magazinebook' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'magazinebook' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'magazinebook_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * @param  mixed $magazinebook_thumb_size Size of thumbnail.
	 * @return void
	 */
	function magazinebook_post_thumbnail( $magazinebook_thumb_size = 'regular' ) {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail( 'magazinebook-featured-image' ); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<?php
			if ( 'medium' === $magazinebook_thumb_size ) {
				$magazinebook_size_name = 'magazinebook-featured-image-medium';
			} elseif ( 'small' === $magazinebook_thumb_size ) {
				$magazinebook_size_name = 'magazinebook-featured-image-small';
			} else {
				$magazinebook_size_name = 'magazinebook-featured-image';
			}
			?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						$magazinebook_size_name,
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

if ( ! function_exists( 'magazinebook_cats_list' ) ) :
	/**
	 * Get categories for the post
	 *
	 * @return void
	 */
	function magazinebook_cats_list() {
		if ( ! get_theme_mod( 'magazinebook_hide_post_cats', false ) ) {
			if ( get_the_category() ) {
				echo '<span class="cat-links">';
				$categories_list = the_category( '&nbsp;' );
				echo '</span>';
			} else {
				return;
			}
		}
	}
endif;

if ( ! function_exists( 'magazinebook_comments_link' ) ) :
	/**
	 * Get comments link
	 *
	 * @return void
	 */
	function magazinebook_comments_link() {
		if ( ! get_theme_mod( 'magazinebook_hide_post_comment_link', false ) ) {
			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="comments-link">';
				echo '<i class="far fa-comment-dots"></i>';
				comments_popup_link(
					sprintf(
						wp_kses(
							/* translators: %s: post title */
							__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'magazinebook' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
				echo '</span>';
			}
		}
	}
endif;
