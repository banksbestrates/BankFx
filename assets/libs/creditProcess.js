
function get_credit_overview_post() {
    let formData = new FormData();
    let url = "https://www.banksbestrates.com/news/wp-json/wp/v2/posts?categories=20&_embed";
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
                post_list=  post_list+               
                '<h2 class="text-center font-weight-bolder">'+pageData[i].title.rendered+'</h2>'+
                '<div class="border_bottom_golden mb-4">'+pageData[i].content.rendered+'</div>'
                // '<div class="col-md-12 mx-auto row px-0 pt-5">'+
                // '<div class="col-md-12 mx-auto row px-0 pt-5">'+
                // '    <div class="col-md-6 blog_image" style="background-image:url('+pageData[i]._embedded['wp:featuredmedia'][0].source_url+')">'+
                // '    </div>'+
                // '    <div class="col-md-6 related_content">'+
                // '   <a href="'+baseUrl+'news/'+pageData[i].slug+'"> <h3 class="blog_heading font-weight-bolder">'+pageData[i].title.rendered+'</h3> </a>'+
                // '        <small></small>'+
                // '        <p class="text-justify">'+pageData[i].excerpt.rendered+'</p>'+
                // '    </div>'+
                // '</div>'
            }
            $("#related_articles").html(post_list);
        }
    };
}
function get_credit_sub_page(page_name) {
    var base_url="";
    if(page_name=="best_credit_cards")
    {
        base_url ="https://www.banksbestrates.com/news/wp-json/wp/v2/posts?categories=289&_embed";
    }
    
    else if(page_name=="balance_transfer"){
        base_url ="https://www.banksbestrates.com/news/wp-json/wp/v2/posts?categories=290&_embed";
    }
    else if(page_name=="cash_back"){
        base_url ="https://www.banksbestrates.com/news/wp-json/wp/v2/posts?categories=291&_embed";
    }
    else if(page_name=="bad_credits"){
        base_url ="https://www.banksbestrates.com/news/wp-json/wp/v2/posts?categories=292&_embed";
    }
    else if(page_name=="low_interest"){
        base_url ="https://www.banksbestrates.com/news/wp-json/wp/v2/posts?categories=293&_embed";
    }
    else if(page_name=="no_annual_fee"){
        base_url ="https://www.banksbestrates.com/news/wp-json/wp/v2/posts?categories=294&_embed";
    }
    let formData = new FormData();
    let url = base_url;
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
                // alert(pageData[i]._embedded['wp:featuredmedia'][0].source_url);
                post_list=  post_list+
                '<div class="col-md-12 px-0 box_round_border mb-4 py-3">'+  
                '<div class="row  px-4 pt-2">'+
                '   <div class="col-md-4 text-center credit_left_div">'+
                '       <img src="'+pageData[i]._embedded['wp:featuredmedia'][0].source_url+'" class="w-100"/> '+
                '       <div class="py-4"></div>'+
                // '      <a href="'+baseUrl+'news/'+pageData[i].slug+'">'+
                // '           <button class="btn button_blue btn-sm  mt-2"> VIEW DETAIL </button>'+
                // '       </a>'+
                '   </div>'+
                '   <div class="col-md-8 credit_starts">'+
                '       <h4 class="font-weight-900 mb-2">'+pageData[i].title.rendered+'</h4><br/>'+
                '      <div>'+pageData[i].content.rendered+'</div>'+
                '   </div> '+
                '</div>'+
                '</div>'
                // '<div class="col-md-12 mx-auto row px-0 pt-5">'+
                // '    <div class="col-md-6 blog_image" style="background-image:url('+pageData[i]._embedded['wp:featuredmedia'][0].source_url+')">'+
                // '    </div>'+
                // '    <div class="col-md-6 related_content">'+
                // '   <a href="'+baseUrl+'news/'+pageData[i].slug+'"> <h3 class="blog_heading font-weight-bolder">'+pageData[i].title.rendered+'</h3> </a>'+
                // '        <small></small>'+
                // '        <p class="text-justify">'+pageData[i].content.rendered+'</p>'+
                // '        <div class="row">'+
                // '              <div class="col-md-12">'+
                // '                   <a href="'+baseUrl+'news/'+pageData[i].slug+'"><i class="fa fa-arrow-circle-right"  aria-hidden="true"></i></a>'+
                // '              </div>'+
                // '        </div>'+
                // '    </div>'+
                // '</div>'
            }
            $("#related_articles").html(post_list);
        }
    };
}

function get_credit_advice_data() {
    let formData = new FormData();
    let url = "https://www.banksbestrates.com/news/wp-json/wp/v2/posts?categories=15&_embed";
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
                post_list = '<div class=" col-md-12 text-center"><img src="https://media2.giphy.com/media/ZaurcZPg0rCOiFslZD/200w.webp?cid=ecf05e47takq5axgtr3llkcvt8r8g5qzjmyvlgphakm1ulms&rid=200w.webp"/></div>';
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
                '        <div class=" text-dark text-justify">'+pageData[i].excerpt.rendered+'</div>  '+
                '      </div>'+
                '    </div>'+
                '   </a>'+
                '</div>'
            }

            $("#advice_data").html(post_list);
        }
    };
}
