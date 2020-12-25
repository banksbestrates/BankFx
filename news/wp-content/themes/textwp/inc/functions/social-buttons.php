<?php
/**
* Social buttons
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function textwp_footer_social_buttons() { ?>

<div class="textwp-header-social-icons textwp-clearfix">
    <?php if ( textwp_get_option('twitter_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('twitter_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-twitter" aria-label="<?php esc_attr_e('Twitter Button','textwp'); ?>"><i class="fab fa-twitter" aria-hidden="true" title="<?php esc_attr_e('Twitter','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('facebook_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('facebook_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-facebook" aria-label="<?php esc_attr_e('Facebook Button','textwp'); ?>"><i class="fab fa-facebook-f" aria-hidden="true" title="<?php esc_attr_e('Facebook','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('gplus_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('gplus_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-google-plus" aria-label="<?php esc_attr_e('Google Plus Button','textwp'); ?>"><i class="fab fa-google-plus-g" aria-hidden="true" title="<?php esc_attr_e('Google Plus','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('pinterest_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('pinterest_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-pinterest" aria-label="<?php esc_attr_e('Pinterest Button','textwp'); ?>"><i class="fab fa-pinterest" aria-hidden="true" title="<?php esc_attr_e('Pinterest','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('linkedin_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('linkedin_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-linkedin" aria-label="<?php esc_attr_e('Linkedin Button','textwp'); ?>"><i class="fab fa-linkedin-in" aria-hidden="true" title="<?php esc_attr_e('Linkedin','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('instagram_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('instagram_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-instagram" aria-label="<?php esc_attr_e('Instagram Button','textwp'); ?>"><i class="fab fa-instagram" aria-hidden="true" title="<?php esc_attr_e('Instagram','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('flickr_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('flickr_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-flickr" aria-label="<?php esc_attr_e('Flickr Button','textwp'); ?>"><i class="fab fa-flickr" aria-hidden="true" title="<?php esc_attr_e('Flickr','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('youtube_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('youtube_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-youtube" aria-label="<?php esc_attr_e('Youtube Button','textwp'); ?>"><i class="fab fa-youtube" aria-hidden="true" title="<?php esc_attr_e('Youtube','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('vimeo_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('vimeo_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-vimeo" aria-label="<?php esc_attr_e('Vimeo Button','textwp'); ?>"><i class="fab fa-vimeo-v" aria-hidden="true" title="<?php esc_attr_e('Vimeo','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('soundcloud_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('soundcloud_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-soundcloud" aria-label="<?php esc_attr_e('SoundCloud Button','textwp'); ?>"><i class="fab fa-soundcloud" aria-hidden="true" title="<?php esc_attr_e('SoundCloud','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('messenger_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('messenger_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-messenger" aria-label="<?php esc_attr_e('Messenger Button','textwp'); ?>"><i class="fab fa-facebook-messenger" aria-hidden="true" title="<?php esc_attr_e('Messenger','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('lastfm_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('lastfm_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-lastfm" aria-label="<?php esc_attr_e('Lastfm Button','textwp'); ?>"><i class="fab fa-lastfm" aria-hidden="true" title="<?php esc_attr_e('Lastfm','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('medium_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('medium_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-medium" aria-label="<?php esc_attr_e('Medium Button','textwp'); ?>"><i class="fab fa-medium-m" aria-hidden="true" title="<?php esc_attr_e('Medium','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('github_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('github_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-github" aria-label="<?php esc_attr_e('Github Button','textwp'); ?>"><i class="fab fa-github" aria-hidden="true" title="<?php esc_attr_e('Github','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('bitbucket_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('bitbucket_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-bitbucket" aria-label="<?php esc_attr_e('Bitbucket Button','textwp'); ?>"><i class="fab fa-bitbucket" aria-hidden="true" title="<?php esc_attr_e('Bitbucket','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('tumblr_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('tumblr_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-tumblr" aria-label="<?php esc_attr_e('Tumblr Button','textwp'); ?>"><i class="fab fa-tumblr" aria-hidden="true" title="<?php esc_attr_e('Tumblr','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('digg_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('digg_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-digg" aria-label="<?php esc_attr_e('Digg Button','textwp'); ?>"><i class="fab fa-digg" aria-hidden="true" title="<?php esc_attr_e('Digg','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('delicious_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('delicious_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-delicious" aria-label="<?php esc_attr_e('Delicious Button','textwp'); ?>"><i class="fab fa-delicious" aria-hidden="true" title="<?php esc_attr_e('Delicious','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('stumble_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('stumble_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-stumbleupon" aria-label="<?php esc_attr_e('Stumbleupon Button','textwp'); ?>"><i class="fab fa-stumbleupon" aria-hidden="true" title="<?php esc_attr_e('Stumbleupon','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('mix_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('mix_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-mix" aria-label="<?php esc_attr_e('Mix Button','textwp'); ?>"><i class="fab fa-mix" aria-hidden="true" title="<?php esc_attr_e('Mix','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('reddit_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('reddit_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-reddit" aria-label="<?php esc_attr_e('Reddit Button','textwp'); ?>"><i class="fab fa-reddit" aria-hidden="true" title="<?php esc_attr_e('Reddit','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('dribbble_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('dribbble_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-dribbble" aria-label="<?php esc_attr_e('Dribbble Button','textwp'); ?>"><i class="fab fa-dribbble" aria-hidden="true" title="<?php esc_attr_e('Dribbble','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('flipboard_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('flipboard_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-flipboard" aria-label="<?php esc_attr_e('Flipboard Button','textwp'); ?>"><i class="fab fa-flipboard" aria-hidden="true" title="<?php esc_attr_e('Flipboard','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('blogger_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('blogger_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-blogger" aria-label="<?php esc_attr_e('Blogger Button','textwp'); ?>"><i class="fab fa-blogger" aria-hidden="true" title="<?php esc_attr_e('Blogger','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('etsy_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('etsy_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-etsy" aria-label="<?php esc_attr_e('Etsy Button','textwp'); ?>"><i class="fab fa-etsy" aria-hidden="true" title="<?php esc_attr_e('Etsy','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('behance_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('behance_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-behance" aria-label="<?php esc_attr_e('Behance Button','textwp'); ?>"><i class="fab fa-behance" aria-hidden="true" title="<?php esc_attr_e('Behance','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('amazon_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('amazon_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-amazon" aria-label="<?php esc_attr_e('Amazon Button','textwp'); ?>"><i class="fab fa-amazon" aria-hidden="true" title="<?php esc_attr_e('Amazon','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('meetup_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('meetup_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-meetup" aria-label="<?php esc_attr_e('Meetup Button','textwp'); ?>"><i class="fab fa-meetup" aria-hidden="true" title="<?php esc_attr_e('Meetup','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('mixcloud_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('mixcloud_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-mixcloud" aria-label="<?php esc_attr_e('Mixcloud Button','textwp'); ?>"><i class="fab fa-mixcloud" aria-hidden="true" title="<?php esc_attr_e('Mixcloud','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('slack_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('slack_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-slack" aria-label="<?php esc_attr_e('Slack Button','textwp'); ?>"><i class="fab fa-slack" aria-hidden="true" title="<?php esc_attr_e('Slack','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('snapchat_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('snapchat_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-snapchat" aria-label="<?php esc_attr_e('Snapchat Button','textwp'); ?>"><i class="fab fa-snapchat" aria-hidden="true" title="<?php esc_attr_e('Snapchat','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('spotify_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('spotify_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-spotify" aria-label="<?php esc_attr_e('Spotify Button','textwp'); ?>"><i class="fab fa-spotify" aria-hidden="true" title="<?php esc_attr_e('Spotify','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('yelp_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('yelp_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-yelp" aria-label="<?php esc_attr_e('Yelp Button','textwp'); ?>"><i class="fab fa-yelp" aria-hidden="true" title="<?php esc_attr_e('Yelp','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('wordpress_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('wordpress_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-wordpress" aria-label="<?php esc_attr_e('WordPress Button','textwp'); ?>"><i class="fab fa-wordpress" aria-hidden="true" title="<?php esc_attr_e('WordPress','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('twitch_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('twitch_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-twitch" aria-label="<?php esc_attr_e('Twitch Button','textwp'); ?>"><i class="fab fa-twitch" aria-hidden="true" title="<?php esc_attr_e('Twitch','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('telegram_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('telegram_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-telegram" aria-label="<?php esc_attr_e('Telegram Button','textwp'); ?>"><i class="fab fa-telegram" aria-hidden="true" title="<?php esc_attr_e('Telegram','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('bandcamp_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('bandcamp_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-bandcamp" aria-label="<?php esc_attr_e('Bandcamp Button','textwp'); ?>"><i class="fab fa-bandcamp" aria-hidden="true" title="<?php esc_attr_e('Bandcamp','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('quora_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('quora_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-quora" aria-label="<?php esc_attr_e('Quora Button','textwp'); ?>"><i class="fab fa-quora" aria-hidden="true" title="<?php esc_attr_e('Quora','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('foursquare_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('foursquare_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-foursquare" aria-label="<?php esc_attr_e('Foursquare Button','textwp'); ?>"><i class="fab fa-foursquare" aria-hidden="true" title="<?php esc_attr_e('Foursquare','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('deviantart_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('deviantart_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-deviantart" aria-label="<?php esc_attr_e('DeviantArt Button','textwp'); ?>"><i class="fab fa-deviantart" aria-hidden="true" title="<?php esc_attr_e('DeviantArt','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('imdb_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('imdb_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-imdb" aria-label="<?php esc_attr_e('IMDB Button','textwp'); ?>"><i class="fab fa-imdb" aria-hidden="true" title="<?php esc_attr_e('IMDB','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('vk_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('vk_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-vk" aria-label="<?php esc_attr_e('VK Button','textwp'); ?>"><i class="fab fa-vk" aria-hidden="true" title="<?php esc_attr_e('VK','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('codepen_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('codepen_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-codepen" aria-label="<?php esc_attr_e('Codepen Button','textwp'); ?>"><i class="fab fa-codepen" aria-hidden="true" title="<?php esc_attr_e('Codepen','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('jsfiddle_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('jsfiddle_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-jsfiddle" aria-label="<?php esc_attr_e('JSFiddle Button','textwp'); ?>"><i class="fab fa-jsfiddle" aria-hidden="true" title="<?php esc_attr_e('JSFiddle','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('stackoverflow_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('stackoverflow_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-stackoverflow" aria-label="<?php esc_attr_e('Stack Overflow Button','textwp'); ?>"><i class="fab fa-stack-overflow" aria-hidden="true" title="<?php esc_attr_e('Stack Overflow','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('stackexchange_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('stackexchange_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-stackexchange" aria-label="<?php esc_attr_e('Stack Exchange Button','textwp'); ?>"><i class="fab fa-stack-exchange" aria-hidden="true" title="<?php esc_attr_e('Stack Exchange','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('bsa_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('bsa_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-buysellads" aria-label="<?php esc_attr_e('BuySellAds Button','textwp'); ?>"><i class="fab fa-buysellads" aria-hidden="true" title="<?php esc_attr_e('BuySellAds','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('web500px_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('web500px_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-web500px" aria-label="<?php esc_attr_e('500px Button','textwp'); ?>"><i class="fab fa-500px" aria-hidden="true" title="<?php esc_attr_e('500px','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('ello_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('ello_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-ello" aria-label="<?php esc_attr_e('Ello Button','textwp'); ?>"><i class="fab fa-ello" aria-hidden="true" title="<?php esc_attr_e('Ello','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('goodreads_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('goodreads_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-goodreads" aria-label="<?php esc_attr_e('Goodreads Button','textwp'); ?>"><i class="fab fa-goodreads" aria-hidden="true" title="<?php esc_attr_e('Goodreads','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('odnoklassniki_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('odnoklassniki_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-odnoklassniki" aria-label="<?php esc_attr_e('Odnoklassniki Button','textwp'); ?>"><i class="fab fa-odnoklassniki" aria-hidden="true" title="<?php esc_attr_e('Odnoklassniki','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('houzz_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('houzz_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-houzz" aria-label="<?php esc_attr_e('Houzz Button','textwp'); ?>"><i class="fab fa-houzz" aria-hidden="true" title="<?php esc_attr_e('Houzz','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('pocket_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('pocket_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-pocket" aria-label="<?php esc_attr_e('Pocket Button','textwp'); ?>"><i class="fab fa-get-pocket" aria-hidden="true" title="<?php esc_attr_e('Pocket','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('xing_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('xing_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-xing" aria-label="<?php esc_attr_e('XING Button','textwp'); ?>"><i class="fab fa-xing" aria-hidden="true" title="<?php esc_attr_e('XING','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('googleplay_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('googleplay_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-googleplay" aria-label="<?php esc_attr_e('Google Play Button','textwp'); ?>"><i class="fab fa-google-play" aria-hidden="true" title="<?php esc_attr_e('Google Play','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('slideshare_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('slideshare_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-slideshare" aria-label="<?php esc_attr_e('SlideShare Button','textwp'); ?>"><i class="fab fa-slideshare" aria-hidden="true" title="<?php esc_attr_e('SlideShare','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('dropbox_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('dropbox_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-dropbox" aria-label="<?php esc_attr_e('Dropbox Button','textwp'); ?>"><i class="fab fa-dropbox" aria-hidden="true" title="<?php esc_attr_e('Dropbox','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('paypal_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('paypal_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-paypal" aria-label="<?php esc_attr_e('PayPal Button','textwp'); ?>"><i class="fab fa-paypal" aria-hidden="true" title="<?php esc_attr_e('PayPal','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('viadeo_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('viadeo_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-viadeo" aria-label="<?php esc_attr_e('Viadeo Button','textwp'); ?>"><i class="fab fa-viadeo" aria-hidden="true" title="<?php esc_attr_e('Viadeo','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('wikipedia_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('wikipedia_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-wikipedia" aria-label="<?php esc_attr_e('Wikipedia Button','textwp'); ?>"><i class="fab fa-wikipedia-w" aria-hidden="true" title="<?php esc_attr_e('Wikipedia','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('skype_button') ) : ?>
            <a href="skype:<?php echo esc_html( textwp_get_option('skype_button') ); ?>?chat" class="textwp-social-icon-skype" aria-label="<?php esc_attr_e('Skype Button','textwp'); ?>"><i class="fab fa-skype" aria-hidden="true" title="<?php esc_attr_e('Skype','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('email_button') ) : ?>
            <a href="mailto:<?php echo esc_html( textwp_get_option('email_button') ); ?>" class="textwp-social-icon-email" aria-label="<?php esc_attr_e('Email Us Button','textwp'); ?>"><i class="far fa-envelope" aria-hidden="true" title="<?php esc_attr_e('Email Us','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('rss_button') ) : ?>
            <a href="<?php echo esc_url( textwp_get_option('rss_button') ); ?>" target="_blank" rel="nofollow" class="textwp-social-icon-rss" aria-label="<?php esc_attr_e('RSS Button','textwp'); ?>"><i class="fas fa-rss" aria-hidden="true" title="<?php esc_attr_e('RSS','textwp'); ?>"></i></a><?php endif; ?>
    <?php if ( textwp_get_option('show_header_login_button') ) { ?><?php if (is_user_logged_in()) : ?><a href="<?php echo esc_url( wp_logout_url( get_permalink() ) ); ?>" aria-label="<?php esc_attr_e( 'Logout Button', 'textwp' ); ?>" class="textwp-social-icon-login"><i class="fas fa-sign-out-alt" aria-hidden="true" title="<?php esc_attr_e('Logout','textwp'); ?>"></i></a><?php else : ?><a href="<?php echo esc_url( wp_login_url( get_permalink() ) ); ?>" aria-label="<?php esc_attr_e( 'Login / Register Button', 'textwp' ); ?>" class="textwp-social-icon-login"><i class="fas fa-sign-in-alt" aria-hidden="true" title="<?php esc_attr_e('Login / Register','textwp'); ?>"></i></a><?php endif;?><?php } ?>
    <?php if ( !(textwp_get_option('hide_header_search_button')) ) { ?><a href="<?php echo esc_url( '#' ); ?>" aria-label="<?php esc_attr_e('Search Button','textwp'); ?>" class="textwp-social-icon-search"><i class="fas fa-search" aria-hidden="true" title="<?php esc_attr_e('Search','textwp'); ?>"></i></a><?php } ?>
</div>

<?php }