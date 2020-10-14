// get blog data
function get_blog_overview_post() {
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
            for(var i=0;i<pageData.length;i++)
            {
                var date = moment(pageData[i].date).format('MMMM Do, YYYY');
                post_list=  post_list+ 
                '<div class="col-md-12 mx-auto row px-0 pt-5">'+
                '    <div class="col-md-6 blog_image" style="background-image:url('+pageData[i]._embedded['wp:featuredmedia'][0].source_url+')">'+
                '    </div>'+
                '    <div class="col-md-6 related_content pt-0">'+
                '           <a href="'+baseUrl+'post_detail/'+pageData[i].id+'/'+pageData[i].slug+'" > <h3 class="blog_heading  border_bottom_golden font-weight-bolder mb-2">'+pageData[i].title.rendered+'</h3> </a>'+
                '          <small> <i class="fa fa-clock-o pr-2" aria-hidden="true" style="font-size:15px"></i>'+date+' </small>'+ 
                '          <small class="pl-5"><i class="fa fa-user-circle-o pr-2" aria-hidden="true" style="font-size:15px"></i>'+pageData[i]._embedded.author[0].name+'</small>'+
                '        <div class="text-justify pt-2" style="height: 133px;overflow: hidden;">'+pageData[i].excerpt.rendered+'</div>'+
                '        <div class="row">'+
                '          <div class="col-md-12">'+
                '               <a href="'+baseUrl+'post_detail/'+pageData[i].id+'/'+pageData[i].slug+'" ><i class="fa fa-arrow-circle-right"  aria-hidden="true"></i></a>'+
                '          </div>'+
                '        </div>'+
                '    </div>'+
                '</div>'
            }

            $("#blog_data").html(post_list);
          

        }
    };
}

