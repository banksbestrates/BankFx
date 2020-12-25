<?php
/**
* Author bio box
*
* @package TextWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

// Author bio box
function textwp_add_author_bio_box() {
    $content='';
    if (is_single()) {
        $content .= '
            <div class="textwp-author-bio">
            <div class="textwp-author-bio-inside">
            <div class="textwp-author-bio-top">
            <span class="textwp-author-bio-gravatar">
                '. get_avatar( get_the_author_meta('email') , 80 ) .'
            </span>
            <div class="textwp-author-bio-text">
                <div class="textwp-author-bio-name">'.esc_html__( 'Author: ', 'textwp' ).'<span>'. get_the_author_link() .'</span></div><div class="textwp-author-bio-text-description">'. wp_kses_post( get_the_author_meta('description',get_query_var('author') ) ) .'</div>
            </div>
            </div>
            </div>
            </div>
        ';
    }
    return apply_filters( 'textwp_add_author_bio_box', $content );
}