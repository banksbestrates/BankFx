<?php
if( !function_exists('magazine_edge_breadcrumbs') ):
    function magazine_edge_breadcrumbs() { ?>
	<?php if('' != magazine_edge_get_option('magazine_edge_enable_header')) : ?>
		<section class="page-title">
			<div class="auto-container">
				<div class="clearfix">
					<div class="top">
						<h2><?php
					if(is_home() || is_front_page()) :
								  single_post_title(); 
							
					elseif ( is_day() ) : 
					
						printf( esc_html__( '%s', 'magazine-edge' ), get_the_date() );
					
					elseif ( is_month() ) :
					
						printf( esc_html__( '%s', 'magazine-edge' ), (get_the_date( 'F Y' ) ));
						
					elseif ( is_year() ) :
					
						printf( esc_html__( '%s', 'magazine-edge' ), (get_the_date( 'Y' ) ) );
						
					elseif ( is_category() ) :
					
						printf( esc_html__( '%s', 'magazine-edge' ), (single_cat_title( '', false ) ));

					elseif ( is_tag() ) :
					
						printf( esc_html__( '%s', 'magazine-edge' ), (single_tag_title( '', false ) ));
						
					elseif ( is_404() ) :

						printf( esc_html__( 'Error 404', 'magazine-edge' ));
						
					elseif ( is_author() ) :
					
						printf( esc_html__( 'Author: %s', 'magazine-edge' ), (get_the_author( '', false ) ));        
						
					else :
							the_title();
					endif;
					?></h2>
					</div>
					<div class="bottom">
						<ul class="page-title-breadcrumb">
							<?php magazine_edge_breadcrumbss(); ?> 
						</ul>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>	
    <?php } 
endif;?>

<?php 
/**
 * Breadcrumbs for ultra seven
 *
 * @package Wpoperation
 * @subpackage Ultra Seven
 * @since 1.0.0
 */
function magazine_edge_breadcrumbss(){
	
   
    wp_reset_postdata();

  /* === OPTIONS === */
    $text['home']     = esc_html__( 'Home', 'magazine-edge' ); // text for the 'Home'  
    $text['category'] = '%s'; // text for a category page
    $text['tax']      = '%s'; // text for a taxonomy page
    $text['search']   = '%s'; // text for a search results page
    $text['tag']      = '%s'; // text for a tag page
    $text['author']   = '%s'; // text for an author page
    $text['404']      = esc_html__( 'Error 404', 'magazine-edge' ); // text for the 404 page
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter   = '<span class="delimiter">'.esc_attr(get_theme_mod('magazine_edge_breadcrumb_delimiter','>')).'</span>'; // delimiter between crumbs
    $before      = '<span class="current">'; // tag before the current crumb
    $after       = '</span>'; // tag after the current crumb
    /* === END OF OPTIONS === */
    global $post;
    $homeLink = esc_url( home_url( '/' ) );
    $linkBefore = '';
    $linkBefore2 = '';
    $linkAfter = '</span></span>';
    $linkAttr = ' itemprop="item"';
    $link = '<a' . $linkAttr . ' href="%1$s">%2$s</a>';
    if (is_home() || is_front_page()) {
        if ($showOnHome == 1) echo '<li>';
    } else {
        echo '<li>' . sprintf($link, $homeLink, $text['home']) . $delimiter;
        
        if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore2 . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo ( $cats );
            }
            echo ( $before . sprintf($text['category'], single_cat_title('', false)) . $after );
        } elseif( is_tax() ){
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore2 . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo ( $cats );
            }
            echo ( $before . sprintf($text['tax'], single_cat_title('', false)) . $after );
        
        }elseif ( is_search() ) {
            echo ( $before . sprintf($text['search'], get_search_query()) . $after );
        } elseif ( is_day() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
            echo ( $before . get_the_time('d') . $after );
        } elseif ( is_month() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo ( $before . get_the_time('F') . $after );
        } elseif ( is_year() ) {
            echo ( $before . get_the_time('Y') . $after );
        } elseif ( is_single() && !is_attachment() ) {
             if( 'product' == get_post_type()){
                $post_type = get_post_type_object(get_post_type());
                $shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
                printf($link,$shop_page_url . '/', $post_type->labels->singular_name);
                if ($showCurrent == 1) echo ( $delimiter . $before . get_the_title() . $after );
             }
            elseif ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($showCurrent == 1) echo ( $delimiter . $before . get_the_title() . $after );
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $linkBefore2 . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo ( $cats );
                if ($showCurrent == 1) echo ( $before . get_the_title() . $after );
            }
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo ( $before . $post_type->labels->singular_name . $after );
        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $delimiter);
            $cats = str_replace('<a', $linkBefore2 . '<a' . $linkAttr, $cats);
            $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
            echo ( $cats );
            printf($link, get_permalink($parent), $parent->post_title);
            if ($showCurrent == 1) echo ( $delimiter . $before . get_the_title() . $after );
        } elseif ( is_page() && !$post->post_parent ) {
            if ($showCurrent == 1) echo ( $before . get_the_title() . $after );
        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_post($parent_id);
                $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo ( $breadcrumbs[$i] );
                if ($i != count($breadcrumbs)-1) echo ( $delimiter );
            }
            if ($showCurrent == 1) echo ( $delimiter . $before . get_the_title() . $after );
        } elseif ( is_tag() ) {
            echo ( $before . sprintf($text['tag'], single_tag_title('', false)) . $after );
        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo ( $before . sprintf($text['author'], $userdata->display_name) . $after );
        } elseif ( is_404() ) {
            echo ( $before . $text['404'] . $after );
        }
        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo esc_html__( 'Page', 'magazine-edge' ) . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
        echo '</li>';
    }
} // end ultra_seven_breadcrumbs()