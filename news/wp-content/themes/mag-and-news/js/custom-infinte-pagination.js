/* Custom JS File */

(function($) {

	"use strict";

	jQuery(document).ready(function() {
        if ($('.ajax-pagination').length > 0) {


            //infinite pagination
            /*new pagination style*/
            var paged = parseInt(mag_and_news_ajax.paged) + 1;
            var max_num_pages = parseInt(mag_and_news_ajax.max_num_pages);
            var next_posts = mag_and_news_ajax.next_posts;

            $(document).on('click', '.show-more', function (event) {
                event.preventDefault();
                var show_more = $(this);
                var click = show_more.attr('data-click');
                if ((paged - 1) >= max_num_pages) {
                    show_more.html(mag_and_news_ajax.no_more_posts)
                }
                if (click == 0 || (paged - 1) >= max_num_pages) {
                    return false;
                }
                show_more.html('<i class="fa fa-spinner fa-spin fa-fw"></i>');
                show_more.attr("data-click", 0);
                var page = parseInt(show_more.attr('data-number'));

                $('#free-temp-post').load(next_posts + ' .mag-and-news-article-wrapper article.post, .ct-post-list article.post ', function () {
                    /*http://stackoverflow.com/questions/17780515/append-ajax-items-to-masonry-with-infinite-scroll*/
                    paged++;/*next page number*/
                    next_posts = next_posts.replace(/(\/?)page(\/|d=)[0-9]+/, '$1page$2' + paged);
                    var html = $('#free-temp-post').html();
                    $('#free-temp-post').html('');

                    // Make jQuery object from HTML string
                    var $moreBlocks = $(html).filter('article.post');
                    // Append new blocks to container
                    $('.mag-and-news-article-wrapper, .ct-post-list').append($moreBlocks).imagesLoaded(function () {
                        // Have Masonry position new blocks
                        $('.mag-and-news-article-wrapper, .ct-post-list').masonry('appended', $moreBlocks);
                    });

                    show_more.attr("data-number", page + 1);
                    show_more.attr("data-click", 1);
                    show_more.html("<i class='fa fa-refresh'></i>" + mag_and_news_ajax.show_more)
                });
                return false;
            });

            var maxHeight = 0;
            jQuery('.two-column article.two-column').each(function () {
                if (jQuery(this).height() > maxHeight) {
                    maxHeight = jQuery(this).height();
                }
            });
            jQuery('.two-column article.two-column').height(maxHeight);
            //end pagination
        }
	});
})(jQuery);

