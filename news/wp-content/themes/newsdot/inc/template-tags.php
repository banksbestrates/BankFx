<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package NewsDot
 */

if ( ! function_exists( 'newsdot_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function newsdot_posted_on() {
		if ( get_theme_mod( 'newsdot_show_post_date', true ) ) :
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

			?>

			<span class="posted-on">
				<i class="far fa-calendar"></i>
				<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo $time_string; ?></a>
			</span>

			<?php
		endif;
	}
endif;

if ( ! function_exists( 'newsdot_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function newsdot_posted_by() {
		if ( get_theme_mod( 'newsdot_show_post_author', true ) ) :
			?>
			<span class="byline">
				<i class="far fa-user-circle"></i>
				<span class="author vcard"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span>
			</span>
			<?php
		endif;
	}
endif;

if ( ! function_exists( 'newsdot_posted_on_single' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function newsdot_posted_on_single() {
		if ( get_theme_mod( 'newsdot_show_post_date', true ) ) :
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string_updated = '<time class="updated single-updated" datetime="%3$s">%4$s</time>';
			}

			$time_string = sprintf(
				$time_string,
				esc_attr( get_the_date( DATE_W3C ) ),
				esc_html( get_the_date() ),
				esc_attr( get_the_modified_date( DATE_W3C ) ),
				esc_html( get_the_modified_date() )
			);

			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string_updated = sprintf(
					$time_string_updated,
					esc_attr( get_the_date( DATE_W3C ) ),
					esc_html( get_the_date() ),
					esc_attr( get_the_modified_date( DATE_W3C ) ),
					esc_html( get_the_modified_date() )
				);
			}

			?>

			<span class="posted-on">
				<span><?php esc_html_e( 'Published On: ', 'newsdot' ); ?></span>
				<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo $time_string; ?></a>
				<?php if ( get_theme_mod( 'newsdot_show_updated_date_single', true ) && ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) ) : ?>
					<span class="ml-12"><?php esc_html_e( 'Last Updated On: ', 'newsdot' ); ?></span>
					<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo $time_string_updated; ?></a>
				<?php endif; ?>
			</span>

			<?php
		endif;
	}
endif;

if ( ! function_exists( 'newsdot_comments_link' ) ) :
	/**
	 * Prints HTML comments link.
	 */
	function newsdot_comments_link() {
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			echo '<i class="far fa-comments mr-1"></i>';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'newsdot' ),
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
endif;

if ( ! function_exists( 'newsdot_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function newsdot_entry_footer() {
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'newsdot' ),
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
					__( 'Edit <span class="screen-reader-text">%s</span>', 'newsdot' ),
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

if ( ! function_exists( 'newsdot_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function newsdot_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail mb-4">
				<figure>
					<?php
					the_post_thumbnail();
					if ( get_the_post_thumbnail_caption() ) {
						?>
						<figcaption><?php the_post_thumbnail_caption(); ?></figcaption>
						<?php
					}
					?>
				</figure>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'newsdot-wide-image',
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
