<?php
/**
* Social profiles options
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function textwp_header_social_profiles($wp_customize) {

    $wp_customize->add_section( 'textwp_section_social_header', array( 'title' => esc_html__( 'Social Buttons', 'textwp' ), 'panel' => 'textwp_main_options_panel', 'priority' => 240, ));

    $wp_customize->add_setting( 'textwp_options[hide_header_social_buttons]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_header_social_buttons_control', array( 'label' => esc_html__( 'Hide Header Social + Search + Login/Logout + Random Article Buttons', 'textwp' ), 'description' => esc_html__('If you checked this option, all buttons will disappear from header. There is no any effect from "Hide Search Button from Header" and "Show Login/Logout Button in Header" options.', 'textwp'), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[hide_header_social_buttons]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[hide_header_search_button]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_hide_header_search_button_control', array( 'label' => esc_html__( 'Hide Search Button from Header', 'textwp' ), 'description' => esc_html__('This option has no effect if you checked the option: "Hide Header Social + Search + Login/Logout + Random Article Buttons"', 'textwp'), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[hide_header_search_button]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[show_header_login_button]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'textwp_show_header_login_button_control', array( 'label' => esc_html__( 'Show Login/Logout Button in Header', 'textwp' ), 'description' => esc_html__('This option has no effect if you checked the option: "Hide Header Social + Search + Login/Logout + Random Article Buttons"', 'textwp'), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[show_header_login_button]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'textwp_options[twitter_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_twitter_button_control', array( 'label' => esc_html__( 'Twitter URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[twitter_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[facebook_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_facebook_button_control', array( 'label' => esc_html__( 'Facebook URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[facebook_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[gplus_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) ); 

    $wp_customize->add_control( 'textwp_gplus_button_control', array( 'label' => esc_html__( 'Google Plus URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[gplus_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[pinterest_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_pinterest_button_control', array( 'label' => esc_html__( 'Pinterest URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[pinterest_button]', 'type' => 'text' ) );
    
    $wp_customize->add_setting( 'textwp_options[linkedin_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_linkedin_button_control', array( 'label' => esc_html__( 'Linkedin Link', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[linkedin_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[instagram_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_instagram_button_control', array( 'label' => esc_html__( 'Instagram Link', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[instagram_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[vk_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_vk_button_control', array( 'label' => esc_html__( 'VK Link', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[vk_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[flickr_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_flickr_button_control', array( 'label' => esc_html__( 'Flickr Link', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[flickr_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[youtube_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_youtube_button_control', array( 'label' => esc_html__( 'Youtube URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[youtube_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[vimeo_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_vimeo_button_control', array( 'label' => esc_html__( 'Vimeo URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[vimeo_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[soundcloud_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_soundcloud_button_control', array( 'label' => esc_html__( 'Soundcloud URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[soundcloud_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[messenger_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_messenger_button_control', array( 'label' => esc_html__( 'Messenger URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[messenger_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[lastfm_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_lastfm_button_control', array( 'label' => esc_html__( 'Lastfm URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[lastfm_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[medium_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_medium_button_control', array( 'label' => esc_html__( 'Medium URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[medium_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[github_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_github_button_control', array( 'label' => esc_html__( 'Github URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[github_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[bitbucket_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_bitbucket_button_control', array( 'label' => esc_html__( 'Bitbucket URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[bitbucket_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[tumblr_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_tumblr_button_control', array( 'label' => esc_html__( 'Tumblr URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[tumblr_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[digg_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_digg_button_control', array( 'label' => esc_html__( 'Digg URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[digg_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[delicious_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_delicious_button_control', array( 'label' => esc_html__( 'Delicious URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[delicious_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[stumble_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_stumble_button_control', array( 'label' => esc_html__( 'Stumbleupon URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[stumble_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[mix_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_mix_button_control', array( 'label' => esc_html__( 'Mix URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[mix_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[reddit_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_reddit_button_control', array( 'label' => esc_html__( 'Reddit URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[reddit_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[dribbble_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_dribbble_button_control', array( 'label' => esc_html__( 'Dribbble URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[dribbble_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[flipboard_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_flipboard_button_control', array( 'label' => esc_html__( 'Flipboard URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[flipboard_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[blogger_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_blogger_button_control', array( 'label' => esc_html__( 'Blogger URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[blogger_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[etsy_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_etsy_button_control', array( 'label' => esc_html__( 'Etsy URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[etsy_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[behance_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_behance_button_control', array( 'label' => esc_html__( 'Behance URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[behance_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[amazon_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_amazon_button_control', array( 'label' => esc_html__( 'Amazon URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[amazon_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[meetup_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_meetup_button_control', array( 'label' => esc_html__( 'Meetup URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[meetup_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[mixcloud_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_mixcloud_button_control', array( 'label' => esc_html__( 'Mixcloud URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[mixcloud_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[slack_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_slack_button_control', array( 'label' => esc_html__( 'Slack URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[slack_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[snapchat_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_snapchat_button_control', array( 'label' => esc_html__( 'Snapchat URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[snapchat_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[spotify_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_spotify_button_control', array( 'label' => esc_html__( 'Spotify URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[spotify_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[yelp_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_yelp_button_control', array( 'label' => esc_html__( 'Yelp URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[yelp_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[wordpress_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_wordpress_button_control', array( 'label' => esc_html__( 'WordPress URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[wordpress_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[twitch_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_twitch_button_control', array( 'label' => esc_html__( 'Twitch URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[twitch_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[telegram_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_telegram_button_control', array( 'label' => esc_html__( 'Telegram URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[telegram_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[bandcamp_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_bandcamp_button_control', array( 'label' => esc_html__( 'Bandcamp URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[bandcamp_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[quora_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_quora_button_control', array( 'label' => esc_html__( 'Quora URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[quora_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[foursquare_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_foursquare_button_control', array( 'label' => esc_html__( 'Foursquare URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[foursquare_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[deviantart_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_deviantart_button_control', array( 'label' => esc_html__( 'DeviantArt URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[deviantart_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[imdb_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_imdb_button_control', array( 'label' => esc_html__( 'IMDB URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[imdb_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[codepen_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_codepen_button_control', array( 'label' => esc_html__( 'Codepen URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[codepen_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[jsfiddle_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_jsfiddle_button_control', array( 'label' => esc_html__( 'JSFiddle URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[jsfiddle_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[stackoverflow_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_stackoverflow_button_control', array( 'label' => esc_html__( 'Stack Overflow URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[stackoverflow_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[stackexchange_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_stackexchange_button_control', array( 'label' => esc_html__( 'Stack Exchange URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[stackexchange_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[bsa_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_bsa_button_control', array( 'label' => esc_html__( 'BuySellAds URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[bsa_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[web500px_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_web500px_button_control', array( 'label' => esc_html__( '500px URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[web500px_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[ello_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_ello_button_control', array( 'label' => esc_html__( 'Ello URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[ello_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[goodreads_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_goodreads_button_control', array( 'label' => esc_html__( 'Goodreads URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[goodreads_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[odnoklassniki_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_odnoklassniki_button_control', array( 'label' => esc_html__( 'Odnoklassniki URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[odnoklassniki_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[houzz_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_houzz_button_control', array( 'label' => esc_html__( 'Houzz URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[houzz_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[pocket_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_pocket_button_control', array( 'label' => esc_html__( 'Pocket URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[pocket_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[xing_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_xing_button_control', array( 'label' => esc_html__( 'XING URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[xing_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[googleplay_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_googleplay_button_control', array( 'label' => esc_html__( 'Google Play URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[googleplay_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[slideshare_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_slideshare_button_control', array( 'label' => esc_html__( 'SlideShare URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[slideshare_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[dropbox_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_dropbox_button_control', array( 'label' => esc_html__( 'Dropbox URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[dropbox_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[paypal_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_paypal_button_control', array( 'label' => esc_html__( 'PayPal URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[paypal_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[viadeo_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_viadeo_button_control', array( 'label' => esc_html__( 'Viadeo URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[viadeo_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[wikipedia_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_wikipedia_button_control', array( 'label' => esc_html__( 'Wikipedia URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[wikipedia_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[skype_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ) );

    $wp_customize->add_control( 'textwp_skype_button_control', array( 'label' => esc_html__( 'Skype Username', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[skype_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[email_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'textwp_sanitize_email' ) );

    $wp_customize->add_control( 'textwp_email_button_control', array( 'label' => esc_html__( 'Email Address', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[email_button]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'textwp_options[rss_button]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'textwp_rss_button_control', array( 'label' => esc_html__( 'RSS Feed URL', 'textwp' ), 'section' => 'textwp_section_social_header', 'settings' => 'textwp_options[rss_button]', 'type' => 'text' ) );

}