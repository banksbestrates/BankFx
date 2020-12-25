
function get_best_brokerage_posts() {
   
    let formData = new FormData();
    let url = "https://www.banksbestrates.com/news/wp-json/wp/v2/posts?categories=282&_embed";
    let xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let pageData = obj
            console.log(pageData);
            let post_list ="";
            for(var i=0;i<pageData.length;i++)
            { 
                post_list =  post_list+ 
                            '<div class="container pt-5 ">'+
                                '<h4 class="border_bottom_golden font-weight-900">'+pageData[i].title.rendered+'</h4>'+
                                '<p>'+pageData[i].excerpt.rendered+'</p>'+
                            '</div>'
            }
            $("#brokerage_posts").html(post_list);
        }
    };
}


