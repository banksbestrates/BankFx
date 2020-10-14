
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
            var date = moment(pageData.date).format('MMMM Do, YYYY');

            $("#heading").html(pageData.title.rendered);
            $("#author_detail").html('<small> <i class="fa fa-clock-o pr-2" aria-hidden="true" style="font-size:15px"></i>'+date+' </small>'+ 
                                        '<small class="pl-5"><i class="fa fa-user-circle-o pr-2" aria-hidden="true" style="font-size:15px"></i>'+pageData._embedded.author[0].name+'</small>');


            $("#source_image").html('<div class="col-md-12 px-0 mb-3 " style="height:300px;background-repeat:no-repeat;background-size:contain;background-image:url('+pageData._embedded['wp:featuredmedia'][0].source_url+')">'+
            '</div>');
            $("#content").html(pageData.content.rendered);
           
        //    var meta_tags=
        //     '<title>'+pageData.title.rendered+' - BanksBestRates</title>'+
        //     '<meta content="width=device-width, initial-scale=1.0" name="viewport">'+
        //     '<meta name="description" content="'+pageData.title.rendered+'-'+pageData.excerpt.rendered+'" />'+
        //     '<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />'+
        //     '<link rel="canonical" href="'+baseUrl+'/post_detail/'+post_id+'/'+pageData.slug+'" />'+
        //     '<meta property="og:locale" content="en_US" />'+
        //     '<meta property="og:type" content="article" />'+
        //     '<meta property="og:title" content="'+pageData.title.rendered+' - BanksBestRates"/>'+
        //     '<meta property="og:description" content="'+pageData.title.rendered+'-'+pageData.excerpt.rendered+'" />'+
        //     '<meta property="og:url" content='+baseUrl+'/post_detail/'+post_id+'/'+pageData.slug+'" />'+
        //     '<meta property="og:site_name" content="banksbestrates.com" />'+
        //     '<meta property="article:publisher" content="'+baseUrl+'" />'+
        //     '<meta property="article:published_time" content="2020-09-08T13:13:20+00:00" />'+
        //     '<meta property="article:modified_time" content="2020-09-08T13:13:22+00:00" />'+
        //     '<meta property="og:image" content="'+pageData._embedded['wp:featuredmedia'][0].source_url+'" />'+
        //     '<meta property="og:image:width" content="600" />'+
        //     '<meta property="og:image:height" content="399" />'+
        //     '<meta name="twitter:card" content="summary_large_image" />'+
        //     '<meta name="twitter:creator" content="@bank_fax" />'

        
        //     $('head').append(meta_tags);
        }
    };
}