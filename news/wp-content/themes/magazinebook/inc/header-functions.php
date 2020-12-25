<?php
/**
 * Functions which enhance the theme header
 *
 * @package MagazineBook
 */

if ( ! function_exists( 'magazinebook_display_top_header_bar' ) ) :
	/**
	 * Display top header bar.
	 *
	 * @return void
	 */
	function magazinebook_display_top_header_bar() {

		$magazinebook_top_bar_class = '';
		if ( get_theme_mod( 'magazinebook_top_bar_theme', 'dark' ) === 'light' ) {
			$magazinebook_top_bar_class = 'mb-light-top-bar';
		}
		?>
		<div class="top-header-bar <?php echo esc_html( $magazinebook_top_bar_class ); ?>">
			<div class="container top-header-container">
				<div class="row align-items-center">
					<div class="col-md-8 px-lg-3">
						<?php
						if ( get_theme_mod( 'magazinebook_show_date_in_header', true ) ) {
							?>
							<span class="mb-header-date">
							<?php
							if ( get_theme_mod( 'magazinebook_top_date_type', 'theme_date_setting' ) === 'theme_date_setting' ) {
								echo esc_html( date_i18n( 'l, F j, Y' ) );
							} elseif ( get_theme_mod( 'magazinebook_top_date_type', 'theme_date_setting' ) === 'wordpress_date_setting' ) {
								echo esc_html( date_i18n( get_option( 'date_format' ) ) );
							}
							?>
							</span>
							<?php
						}
						// Latest posts.
						if ( get_theme_mod( 'magazinebook_show_latest_news_in_header', true ) ) {
							magazinebook_display_latest_posts();
						}
						?>
					</div>
					<div class="col-md-4 text-right px-lg-3">
						<?php
						// Social Media links.
						if ( get_theme_mod( 'magazinebook_show_social_in_top_bar', true ) ) {
							magazinebook_display_social_links();
						}
						// Premium version displays menu here.
						?>
					</div>
				</div>
			</div><!-- /.container -->
		</div><!-- /.top-header-bar -->
		<?php
	}
endif;

/**
 * Display latest posts
 *
 * @return void
 */
function magazinebook_display_latest_posts() {
	$magazinebook_get_latest_posts = new WP_Query(
		array(
			'posts_per_page'      => 5,
			'post_type'           => 'post',
			'ignore_sticky_posts' => true,
			'post_status'         => 'publish',
		)
	);

	if ( $magazinebook_get_latest_posts->have_posts() ) {
		?>
		<div class="mb-latest-posts">
			<span class="mb-latest-posts-label"><?php esc_html_e( 'Latest: ', 'magazinebook' ); ?></span>
			<div class="top-ticker-wrap">
				<ul class="mb-latest-posts-list">
					<?php
					while ( $magazinebook_get_latest_posts->have_posts() ) :
						$magazinebook_get_latest_posts->the_post();
						?>
						<li>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</li>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
				</ul>
			</div>
		</div>
		<?php
	}
}

/**
 * Display Social links.
 *
 * @return void
 */
function magazinebook_display_social_links() {
	$magazinebook_social_links = array(
		'magazinebook_social_facebook'   => 'facebook-f',
		'magazinebook_social_twitter'    => 'twitter',
		'magazinebook_social_instagram'  => 'instagram',
		'magazinebook_social_linkedin'   => 'linkedin-in',
		'magazinebook_social_youtube'    => 'youtube',
		'magazinebook_social_googleplus' => 'google-plus-g',
		'magazinebook_social_pinterest'  => 'pinterest-p',
	);

	?>
	<div class="mb-social-links">
		<ul>
			<?php
			$magazinebook_links_output = '';
			foreach ( $magazinebook_social_links as $key => $value ) {
				$magazinebook_link = get_theme_mod( $key, '' );
				if ( ! empty( $magazinebook_link ) ) {
					?>
					<li>
						<a href="<?php echo esc_url( $magazinebook_link ); ?>" target="_blank"><i class="fab fa-<?php echo esc_html( $value ); ?>"></i></a>
					</li>
					<?php
				}
			}
			?>
		</ul>
	</div>
	<?php
}

/**
 * Display header design 2.
 *
 * @return void
 */
function magazinebook_display_main_header_design_2() {
	?>
	<header id="masthead" class="site-header">
		<div class="main-header-bar mb-header-design-2">
			<div class="container">
				<div class="row align-items-center site-header-row">
					<div class="col-md-4 px-lg-3">
						<div class="site-branding">
							<?php
							the_custom_logo();
							if ( is_front_page() && is_home() ) :
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
							else :
								?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
							endif;
							$magazinebook_description = get_bloginfo( 'description', 'display' );
							if ( $magazinebook_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $magazinebook_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
							<?php endif; ?>
						</div><!-- .site-branding -->
					</div>

					<div class="col-md-8 px-lg-3 text-right">
						<?php
						if ( is_active_sidebar( 'magazinebook_header_right' ) ) {
							?>
							<div class="header-right-widgets">
								<?php
								dynamic_sidebar( 'magazinebook_header_right' );
								?>
							</div>
							<?php
						}
						?>
					</div>
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- /.main-header-bar -->
	</header><!-- #masthead -->

	<div class="main-header-nav-bar mb-header-design-2">
		<div class="container">
			<div class="row align-items-center primary-nav-row">
				<div class="col-md-12">
					<nav id="site-navigation" class="main-navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fas fa-bars"></i></button>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
						?>
					</nav><!-- #site-navigation -->
				</div>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- /.main-header-nav-bar -->
	<?php
}

/**
 * Display header design 1.
 *
 * @return void
 */
function magazinebook_display_main_header_design_1() {
	?>
	<header id="masthead" class="site-header">
		<div class="main-header-bar mb-header-design-1">
			<div class="container">
				<div class="row align-items-center site-header-row">
					<div class="col-md-12 text-center">
						<div class="site-branding">
							<?php
							the_custom_logo();
							if ( is_front_page() && is_home() ) :
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
							else :
								?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
							endif;
							$magazinebook_description = get_bloginfo( 'description', 'display' );
							if ( $magazinebook_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $magazinebook_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
							<?php endif; ?>
						</div><!-- .site-branding -->
					</div>
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- /.main-header-bar -->
	</header><!-- #masthead -->

	<div class="main-header-nav-bar mb-header-design-1">
		<div class="container">
			<div class="row align-items-center primary-nav-row">
				<div class="col-md-12 text-center">
					<nav id="site-navigation" class="main-navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fas fa-bars"></i></button>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
						?>
					</nav><!-- #site-navigation -->
				</div>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- /.main-header-nav-bar -->
	<?php
}

/**
 * Display Header Media
 *
 * @return void
 */
function magazinebook_display_header_media() {
	if ( has_header_video() || has_header_image() ) {
		if ( get_theme_mod( 'magazinebook_display_header_media_on', 'home' ) === 'home' ) {
			if ( is_home() ) {
				the_custom_header_markup();
			}
		} else {
			the_custom_header_markup();
		}
	}
}

/**
 * Call to top header bar display function
 *
 * @return void
 */
function magazinebook_call_top_header_bar() {
	if ( get_theme_mod( 'magazinebook_show_top_bar', true ) ) {
		magazinebook_display_top_header_bar();
	}
}

/**
 * Decide header media position
 *
 * @return void
 */
function magazinebook_header_media_position() {
	if ( get_theme_mod( 'magazinebook_header_media_position', 'before' ) === 'middle' ) {
		add_action( 'magazinebook_before_header', 'magazinebook_display_header_media', 12 );
		add_action( 'magazinebook_before_header', 'magazinebook_call_top_header_bar', 11 );
	} elseif ( get_theme_mod( 'magazinebook_header_media_position', 'before' ) === 'after' ) {
		add_action( 'magazinebook_before_header', 'magazinebook_call_top_header_bar', 11 );
		add_action( 'magazinebook_after_header', 'magazinebook_display_header_media', 12 );
	} else {
		add_action( 'magazinebook_before_header', 'magazinebook_display_header_media', 11 );
		add_action( 'magazinebook_before_header', 'magazinebook_call_top_header_bar', 12 );
	}
}
add_action( 'magazinebook_before_header', 'magazinebook_header_media_position' );
