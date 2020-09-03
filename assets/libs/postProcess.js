
function get_post_detail(post_id) {
    let formData = new FormData();
    let url = "https://bankfax.today/wp-json/wp/v2/posts/"+post_id+"?_embed";
    let xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let pageData = obj
            console.log(pageData);
          
            $("#heading").html(pageData.title.rendered);
            $("#source_image").html('<div class="col-md-6 px-0" style="height:300px;background-repeat:no-repeat;background-size:contain;background-position:center;background-image:url('+pageData._embedded['wp:featuredmedia'][0].source_url+')">'+
            '</div>');
            $("#content").html(pageData.content.rendered);
      
          

        }
    };
}