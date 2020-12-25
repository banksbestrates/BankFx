<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package magazine-edge
 */

if ( ! function_exists( 'magazine_edge_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function magazine_edge_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		
		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html( '%s', 'post date', 'magazine-edge' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><span class="fa fa-clock-o"></span>' . $time_string . '</a>'
		);

		echo '<li class="timers">' . $posted_on . '</li>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'magazine_edge_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function magazine_edge_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html( '%s', 'post author', 'magazine-edge' ),
			'<span class="icon fa fa-user"></span><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
		);

		echo '<li> ' . $byline . '</li>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;



function magazine_edge_custom_header_setup() {
    add_theme_support( 'custom-header', apply_filters( 'magazine_edge_custom_header_args', array(
        'default-image'          => get_template_directory_uri() .'/assets/images/img/header.jpg',
        'default-text-color'     => '#04bffe',
        'width'                  => 1000,
        'height'                 => 250,
        'flex-height'            => true,
        'wp-head-callback'       => 'magazine_edge_header_style',
    ) ) );
}
add_action( 'after_setup_theme', 'magazine_edge_custom_header_setup' );

if ( ! function_exists( 'magazine_edge_header_style' ) ) :
    /**
     * Styles the header image and text displayed on the blog.
     *
     * @see magazine_edge_custom_header_setup().
     */
    function magazine_edge_header_style() {
        $header_text_color = get_header_textcolor();

        /*
         * If no custom options for text are set, let's bail.
         */
        ?>
        <style type="text/css">
            <?php
                //Check if user has defined any header image.
                if ( get_header_image() ) :
            ?>
            .page-title
              {
                background-image:url('<?php header_image(); ?>');
              }

            <?php endif; ?> 
        <?php
        if ( ! display_header_text() ) :
            ?>
            .site-title,
            .site-description {
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
            }
        <?php
        else :
            ?>
            .site-title,
            .site-description {
                color: #<?php echo esc_attr( $header_text_color ); ?>;
            }
        <?php endif; ?>


        </style>
        <?php
    }
endif;


if ( ! function_exists( 'magazine_edge_single_post_navigation' ) ) :
/**
 * Displays an optional single post navigation
 *
 *
 * Create your own magazine_edge_post_navigation() function to override in a child theme.
 *
 * @since Create Magazine 1.0
 */
function magazine_edge_single_post_navigation() {
	
    the_post_navigation( array(
        'prev_text' => '<span class="fa fa-angle-left"></span>'.esc_html__( ' Previous Article','magazine-edge' ),
        'next_text' => esc_html__( 'Next Article','magazine-edge' ).' <span class="fa fa-angle-right"></span>'
    ) );
}
endif;


if ( ! function_exists( 'magazine_edge_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function magazine_edge_entry_footer() {
	
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<li class="icon fa fa-comment">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						esc_html( '0', 'magazine-edge' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</li>';
		}

	}
endif;

if ( ! function_exists( 'magazine_edge_title_subtitle' ) ) :
	/**
	 * Header Title and Description.
	 */
	function magazine_edge_title_subtitle() {
 
		if(has_custom_logo()):
			the_custom_logo();
		else: ?>
			<a class="site-title font-family-1 header-logo-text" href="<?php echo esc_url(home_url('/')); ?>">
			<?php 
			$magazine_edge_site_name= get_bloginfo('name');
			$magazine_edge_site_name_len=strlen($magazine_edge_site_name);
			$magazine_edge_site_firstname=substr($magazine_edge_site_name,0,1);
			$magazine_edge_site_secondname=substr($magazine_edge_site_name,1,$magazine_edge_site_name_len);
			?><span class="letter"><?php echo esc_html($magazine_edge_site_firstname);?></span><?php echo esc_html($magazine_edge_site_secondname);?>
					</a> 
	<?php 
		endif;
    ?>
			<?php
			$magazine_edge_description = get_bloginfo('description', 'display');
			if ($magazine_edge_description || is_customize_preview()) : ?>
				<p class="site-desc site-description">
					<?php echo esc_html($magazine_edge_description);?>
				</p>
	<?php endif;
	}
endif;