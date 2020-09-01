// get category data
function get_blog_overview_post() {
    let formData = new FormData();
    let url = "https://bankfax.today/wp-json/wp/v2/posts?_embed";
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
            for(var i=0;i<pageData.length;i++)
            {
                post_list=  post_list+ 
                '<div class="col-md-12 mx-auto row px-0 pt-5">'+
                '    <div class="col-md-6 blog_image" style="background-image:url('+pageData[i]._embedded['wp:featuredmedia'][0].source_url+')">'+
                '    </div>'+
                '    <div class="col-md-6 related_content">'+
                // '        <p>EDITOR PICK </p>'+
                '       <a href='+pageData[i].link+' target="_blank"> <h3 class="blog_heading  border_bottom_golden font-weight-bolder">'+pageData[i].title.rendered+'</h3> </a>'+
                '          <small></small>'+
                '        <p class="text-justify">'+pageData[i].excerpt.rendered+'</p>'+
                '        <div class="row">'+
                '              <div class="col-md-12">'+
                '                <a href="'+pageData[i].link+'" target="_blank"><i class="fa fa-arrow-circle-right"  aria-hidden="true"></i></a>'+
                '              </div>'+
                // '              <div class="col-md-8 pt-2">6 MIN </div>'+
                '        </div>'+
                '    </div>'+
                '</div>'
            }


            $("#blog_data").html(post_list);
          

        }
    };
}