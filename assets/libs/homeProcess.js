// get top posts 
function get_top_posts() {
    let formData = new FormData();
    let url = "https://www.banksbestrates.com/news/wp-json/wp/v2/posts?_embed";
    let xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let pageData = obj
            let post_list ="";
            if(pageData.length<1)
            {
                post_list = "Opps! No Post Found";
            }
            for(var i=0;i<3;i++)
            {
                post_list=  post_list+ 
                        '<div class="border_bottom_golden_thin pt-3">'+
                        '<h6 class="mb-1">'+pageData[i].title.rendered+'</h6>'+
                        '<span class="home_para_bbr">'+pageData[i].excerpt.rendered+'</span>'+
                        '<div class="portfolio_read_more py-2"><a href="'+baseUrl+'post_detail/'+pageData[i].id+'/'+pageData[i].slug+'" >More <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></div>'+  
                        '</div>'
            }

            $("#latest_top_posts").html(post_list);
          

        }
    };
}

