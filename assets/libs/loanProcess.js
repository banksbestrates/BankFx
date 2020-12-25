
function get_loan_overview_posts() {
    let formData = new FormData();
    let url = "https://www.banksbestrates.com/news/wp-json/wp/v2/posts?categories=38&_embed";
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
                post_list=  post_list+
                '<h2 class="text-center font-weight-bolder">'+pageData[i].title.rendered+'</h2>'+
                '<div class="border_bottom_golden mb-4">'+pageData[i].content.rendered+'</div>'
                //  '<div class="col-md-12 mx-auto row px-0 pt-5">'+
                // '    <div class="col-md-6 blog_image" style="background-image:url('+pageData[i]._embedded['wp:featuredmedia'][0].source_url+')">'+
                // '    </div>'+
                // '    <div class="col-md-6 related_content">'+
           
                // '   <a href="'+baseUrl+'news/'+pageData[i].slug+'"><h4 class="blog_heading font-weight-bolder">'+pageData[i].title.rendered+'</h4> </a>'+
                // '       <div class="text-justify pt-2">'+pageData[i].excerpt.rendered+'</div>'+
               
                // '    </div>'+
                '</div>'
            }
            $("#related_articles").html(post_list);
          

        }
    };
}


function get_personal_loan_posts() {
    let formData = new FormData();
    let url = "https://www.banksbestrates.com/news/wp-json/wp/v2/posts?categories=44&_embed";
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
                '   <a href="'+baseUrl+'news/'+pageData[i].slug+'" ><h4 class="blog_heading font-weight-bolder">'+pageData[i].title.rendered+'</h4> </a>'+
                '       <div class="text-justify pt-2">'+pageData[i].excerpt.rendered+'</div>'+
                // '        <div class="row">'+
                // '              <div class="col-md-12">'+
                // '                 <a href="'+baseUrl+'news/'+pageData[i].slug+'" ><i class="fa fa-arrow-circle-right"  aria-hidden="true"></i></a>'+
                // '              </div>'+
                // '        </div>'+
                '    </div>'+
                '</div>'
            }
            $("#related_articles").html(post_list);
          

        }
    };
}
function get_auto_loan_posts() {
    let formData = new FormData();
    let url = "https://www.banksbestrates.com/news/wp-json/wp/v2/posts?categories=3&_embed";
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
                post_list=  post_list+
                '<h2 class="text-center font-weight-bolder">'+pageData[i].title.rendered+'</h2>'+
                '<div class="border_bottom_golden mb-4">'+pageData[i].content.rendered+'</div>'
                //  '<div class="col-md-12 mx-auto row px-0 pt-5">'+
                // '    <div class="col-md-6 blog_image" style="background-image:url('+pageData[i]._embedded['wp:featuredmedia'][0].source_url+')">'+
                // '    </div>'+
                // '    <div class="col-md-6 related_content">'+
           
                // '   <a href="'+baseUrl+'news/'+pageData[i].slug+'"><h4 class="blog_heading font-weight-bolder">'+pageData[i].title.rendered+'</h4> </a>'+
                // '       <div class="text-justify pt-2">'+pageData[i].excerpt.rendered+'</div>'+
               
                // '    </div>'+
                '</div>'
            }
            $("#related_articles").html(post_list);
          

        }
    };
}
function get_student_loan_posts() {
    let formData = new FormData();
    // let url = "https://bankfax.today/wp-json/wp/v2/posts?categories=279&_embed";
    let url = "https://www.banksbestrates.com/news/wp-json/wp/v2/posts?categories=49&_embed";
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
                '       <a href="'+baseUrl+'news/'+pageData[i].slug+'"><h4 class="blog_heading font-weight-bolder">'+pageData[i].title.rendered+'</h4> </a>'+
                '       <div class="text-justify pt-2">'+pageData[i].excerpt.rendered+'</div>'+
                // '        <div class="row">'+
                // '              <div class="col-md-12">'+
                // '                 <a href="'+baseUrl+'post_detail/'+pageData[i].id+'/'+pageData[i].slug+'" ><i class="fa fa-arrow-circle-right"  aria-hidden="true"></i></a>'+
                // '              </div>'+
                // '        </div>'+
                '    </div>'+
                '</div>'
            }
            $("#related_articles").html(post_list);
          

        }
    };
}

//advices  section
function get_loan_advice_data() {
    let formData = new FormData();
    let url = "https://www.banksbestrates.com/news/wp-json/wp/v2/posts?categories=37&_embed";
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
            for(var i=0;i<3;i++)
            {
                post_list=  post_list+ 
                '<div class="col-lg-4 col-md-6 portfolio-item">'+
                '   <a href="'+baseUrl+'news/'+pageData[i].slug+'">'+
                '    <div class="portfolio-wrap">'+
                '      <figure style="background-image:url('+pageData[i]._embedded['wp:featuredmedia'][0].source_url+');" class="figure_image">'+
                '      </figure>'+
                '      <div class="portfolio-info">'+
                '        <h4>'+pageData[i].title.rendered+'</h4>'+
                '        <div class="text-dark text-justify">'+pageData[i].excerpt.rendered+'</div>  '+
                '      </div>'+
                // '      <div class="portfolio_read_more pt-2">More <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></div>  '+
                '    </div>'+
                '</a>'+
                '</div>'
            }

            $("#advice_data").html(post_list);
          

        }
    };
}
