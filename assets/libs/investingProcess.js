//Category module 
function get_investing_posts() {
    let formData = new FormData();
    let url = "https://bankfax.today/wp-json/wp/v2/posts?categories=271&_embed";
    let xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let pageData = obj
            console.log(pageData);
            let post_list ="";
            if(pageData.length<1)
            {
                post_list = "Opps! No Post Found";
            }
            for(var i=0;i<pageData.length;i++)
            {
                post_list=  post_list+ '<div class="col-md-12 mx-auto row px-0 pt-5">'+
                '    <div class="col-md-6 blog_image" style="background-image:url('+pageData[i]._embedded['wp:featuredmedia'][0].source_url+')">'+
                '    </div>'+
                '    <div class="col-md-6 related_content">'+
                '       <a href='+baseUrl+'post_detail/'+pageData[i].id+'> <h3 class="blog_heading font-weight-bolder">'+pageData[i].title.rendered+'</h3> </a>'+
                '          <small></small>'+
                '        <p class="text-justify">'+pageData[i].excerpt.rendered+'</p>'+
                '        <div class="row">'+
                '              <div class="col-md-12">'+
                '                <a href='+baseUrl+'post_detail/'+pageData[i].id+'><i class="fa fa-arrow-circle-right"  aria-hidden="true"></i></a>'+
                '              </div>'+
                '        </div>'+
                '    </div>'+
                '</div>'
            }
            $("#related_articles").html(post_list);
        }
    };
}

//Get brokerage overview posts  
function get_brokerage_overview_posts() {
    let formData = new FormData();
    let url = "https://bankfax.today/wp-json/wp/v2/posts?categories=280";
    let xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let pageData = obj
            console.log(pageData);
            let post_list ="";
            if(pageData.length<1)
            {
                post_list = "Opps! No Post Found";
            }
            for(var i=0;i<pageData.length;i++)
            {
                post_list=  post_list+ '<div class="col-md-12row">'+
                                    '   <div class="col-md-12  px-0 related_content">'+
                                    // '       <p class="mb-2 pt-2 text_yellow">Latest Credit Tips and Rates</p>'+
                                    '       <h3 class="font-weight-bolder">'+pageData[i].title.rendered+'</h3>'+
                                    '       <div class="content">'+pageData[i].content.rendered+'</div>'+
                                    '         <div class="row mt-2 border_bottom_golden">'+
                                    '               </div>'+
                                    '           </div>'+
                                    '   </div>'
            }
            $("#related_articles").html(post_list);
        }
    };
}

//get investing overview advice data
function get_investing_advice_data() {
    let formData = new FormData();
    let url = "https://bankfax.today/wp-json/wp/v2/posts?categories=343&_embed";
    let xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let pageData = obj;
         
            let post_list ="";
            if(pageData.length<1)
            {
                post_list = '<div class=" col-md-12 text-center"><img src="https://media2.giphy.com/media/ZaurcZPg0rCOiFslZD/200w.webp?cid=ecf05e47takq5axgtr3llkcvt8r8g5qzjmyvlgphakm1ulms&rid=200w.webp"/></div>';
            }
            for(var i=0;i<pageData.length;i++)
            {
                post_list=  post_list+ 
                '<div class="col-lg-4 col-md-6 portfolio-item">'+
                '<a href="'+baseUrl+'post_detail/'+pageData[i].id+'" >'+
                '    <div class="portfolio-wrap">'+
                '      <figure style="background-image:url('+pageData[i]._embedded['wp:featuredmedia'][0].source_url+');" class="figure_image">'+
                '      </figure>'+
                '      <div class="portfolio-info">'+
                '        <h4>'+pageData[i].title.rendered+'</h4>'+
                '        <div class="text-dark text-justify">'+pageData[i].excerpt.rendered+'</div>  '+
                '      </div>'+
                '    </div>'+
                '</a>'+
                '</div>'
            }

            $("#advice_data").html(post_list);
        }
    };
}