//Category module 
function get_banking_posts() {
    let formData = new FormData();
    let url = "https://www.banksbestrates.com/news/wp-json/wp/v2/posts?categories=8&_embed";
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
                '<h2 class="text-center font-weight-bolder">'+pageData[i].title.rendered+'</h2>'+
                '<div class="border_bottom_golden mb-4">'+pageData[i].content.rendered+'</div>'
                //  '<div class="col-md-12 mx-auto row px-0 pt-5">'+
                // '    <div class="col-md-6 blog_image" style="background-image:url('+pageData[i]._embedded['wp:featuredmedia'][0].source_url+')">'+
                // '    </div>'+
                // '    <div class="col-md-6 related_content">'+
                // '   <a href="'+baseUrl+'news/'+pageData[i].slug+'"><h4 class="blog_heading font-weight-bolder">'+pageData[i].title.rendered+'</h4> </a>'+
                // '       <div class="text-justify pt-2">'+pageData[i].excerpt.rendered+'</div>'+
              
                // '    </div>'+
                // '</div>'
            }
            $("#related_articles").html(post_list);
          

        }
    };
}

function get_fun_fact() {
    let formData = new FormData();
    let url = "https://www.banksbestrates.com/news/wp-json/wp/v2/posts?categories=9";
    let xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let pageData = obj
            let fun_fact ="";
            if(pageData.length<1)
            {
                post_list = "Opps! No Post Found";
            }
            for(var i=0;i<pageData.length;i++)
            {
               fun_fact = '<div>'+pageData[i].content.rendered+'</div>';
            }
            $("#fun_facts").html(fun_fact);
          

        }
    };
}


function get_banking_advice_data() {
    let formData = new FormData();
    let url = "https://www.banksbestrates.com/news/wp-json/wp/v2/posts?categories=5&_embed";
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
                post_list = '<div class=" col-md-12 text-center"><img src="https://media2.giphy.com/media/ZaurcZPg0rCOiFslZD/200w.webp?cid=ecf05e47takq5axgtr3llkcvt8r8g5qzjmyvlgphakm1ulms&rid=200w.webp"/></div>';
            }
            for(var i=0;i<3;i++)
            {
                post_list=  post_list+ 
                '<div class="col-lg-4 col-md-6 portfolio-item">'+
                '   <a href="'+baseUrl+'news/'+pageData[i].slug+'" >'+
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

function get_best_bank_posts()
{
    let formData = new FormData();
    let url = "https://www.banksbestrates.com/news/wp-json/wp/v2/posts?categories=328&_embed";
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
                post_list=  post_list+ '<div class="col-md-12 mx-auto row px-0 pt-5">'+
                '    <div class="col-md-6 blog_image" style="background-image:url('+pageData[i]._embedded['wp:featuredmedia'][0].source_url+')">'+
                '    </div>'+
                '    <div class="col-md-6 related_content">'+
                '   <a href="'+baseUrl+'post_detail/'+pageData[i].id+'/'+pageData[i].slug+'" > <h3 class="blog_heading font-weight-bolder">'+pageData[i].title.rendered+'</h3> </a>'+
                '          <small></small>'+
                '        <p class="text-justify">'+pageData[i].excerpt.rendered+'</p>'+
                '        <div class="row">'+
                '              <div class="col-md-12">'+
                '   <a href="'+baseUrl+'post_detail/'+pageData[i].id+'/'+pageData[i].slug+'" ><i class="fa fa-arrow-circle-right"  aria-hidden="true"></i></a>'+
                '              </div>'+
                '        </div>'+
                '    </div>'+
                '</div>'
            }
            $("#related_articles").html(post_list);
        }
    };
}

function get_bank_full_review(bank_name)
{
    let formData = new FormData();
    formData.append("bank_name", bank_name)
    let url = baseUrl + "api/get_bank_full_review";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let status = obj.Status;
            if(status)
            {
                let bankReview = obj.data;
                $("#what_to_like").html(bankReview['what_to_like']);
                $("#what_to_caution").html(bankReview['what_to_caution']);
                $("#full_review").html(bankReview['full_review']);
            }
          
        }
    };
}


