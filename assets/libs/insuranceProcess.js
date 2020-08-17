//Category module 
function get_insurance_posts() {
    let formData = new FormData();
    let url = "https://bankfax.today/wp-json/wp/v2/posts?categories=266";
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
                post_list=  post_list+ '<div class="pt-4 col-md-12 mx-auto row">'+
                            '<div class="col-md-6 related_image" style="background-image:url();background-color:black">'+
                            '</div>'+
                            '<div class="col-md-6 related_content">'+
                            '    <p class="mb-2">EDITOR`S PICK </p>'+
                            '    <h4>'+pageData[i].title.rendered+'</h4>'+
                            '    <div style="height:80px;overflow:hidden" class="content">'+pageData[i].content.rendered+'</div>'+
                            '      <div class="row mt-2">'+
                            '            <div class="col-md-1">'+
                            '              <i class="fa fa-arrow-circle-right"  aria-hidden="true"></i>'+
                            '            </div>'+
                            '            <div class="col-md-8 pt-2"> 6 MIN </div>'+
                            '            </div>'+
                            '        </div>'+
                            '</div>'
            }
            $("#related_articles").html(post_list);
        }
    };
}

