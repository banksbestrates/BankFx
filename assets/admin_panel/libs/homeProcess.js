//mortgage module 
function get_slider_data() {
    let formData = new FormData();
    let url = baseUrl + "api/admin/get_homepage_slider";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let status = obj.Status;
            let message = obj.Message;
            if (!status) {
            }
            sliderData = obj.data;
            let slider_list = "";
            let div2_list = "";
            let div3_list = "";
            let portfolio_list = "";
            let testimonial_list = "";
               for (var i = 0; i < sliderData.length; i++) {
                if(sliderData[i].div_type=="div_1")
                {
                        slider_list = slider_list+ 
                        '   <div class="col-md-4">'+
                        '    <div class="card">'+
                        '        <div class="card-header px-0 py-0">'+
                        '            <img src="'+baseUrl+sliderData[i].image+'" alt="" width="100%" >'+
                        '        </div>'+
                        '        <div class="card-block  text-center px-2 ">'+
                        '            <h4 class=" font-weight-bold pt-2">'+sliderData[i].heading+'</h4>'+
                        '            <p class="card-text">'+sliderData[i].content+'</p>'+
                        '        </div>'+
                        '        <div class="w-100"></div>'+
                        '        <div class="card-footer text-center ">'+
                        '            <button class="btn btn-primary btn-sm" onclick="editOverviewModel('+i+')">Edit </button>'+
                        '        </div>'+
                        '    </div>'+
                        '</div>'
                }
                else if(sliderData[i].div_type=="div_2")
                {
                    div2_list = div2_list+ 
                    '   <div class="col-md-4">'+
                    '    <div class="card">'+
         
                    '        <div class="card-block  text-center px-2 ">'+
                    '            <h4 class=" font-weight-bold pt-2">'+sliderData[i].heading+'</h4>'+
                    '            <p class="card-text">'+sliderData[i].content+'</p>'+
                    '        </div>'+
                    '        <div class="w-100"></div>'+
                    '        <div class="card-footer text-center ">'+
                    '            <button class="btn btn-primary btn-sm" onclick="editContentModel('+i+')">Edit </button>'+
                    '        </div>'+
                    '    </div>'+
                    '</div>'
                } 
                else if(sliderData[i].div_type=="div_3")
                {
                    div3_list = div3_list+ 
                        '<div class="col-md-12">'+
                        '    <h2 class="text-dark font-weight-bold">'+sliderData[i].heading+'</h2> '+
                        '    <span style="float:right"><button class="btn btn-sm btn-primary" onclick="editContentModel('+i+')">EDIT</button></span>  '+
                        '       <p>'+sliderData[i].content+'</p>'
                        '</div>'
                        // '<h3 class="font-weight-bold text-dark text-center">'+sliderData[i].heading+'</h3>'+
                        // '<p>'+sliderData[i].content+'</p>'
                } 
                else if(sliderData[i].div_type=="portfolio_div")
                {
                        portfolio_list = portfolio_list+ 
                        '   <div class="col-md-4">'+
                        '    <div class="card">'+
                        '        <div class="card-header px-0 py-0">'+
                        '            <img src="'+baseUrl+sliderData[i].image+'" alt="" width="100%" >'+
                        '        </div>'+
                        '        <div class="card-block  text-center px-2 ">'+
                        '            <h4 class=" font-weight-bold pt-2">'+sliderData[i].heading+'</h4>'+
                        '            <p class="card-text">'+sliderData[i].content+'</p>'+
                        '        </div>'+
                        '        <div class="w-100"></div>'+
                        '        <div class="card-footer text-center ">'+
                        '            <button class="btn btn-primary btn-sm" onclick="editOverviewModel('+i+')">Edit </button>'+
                        '        </div>'+
                        '    </div>'+
                        '</div>'
                }
                else if(sliderData[i].div_type=="portfolio_div")
                {
                        portfolio_list = portfolio_list+ 
                        '   <div class="col-md-4">'+
                        '    <div class="card">'+
                        '        <div class="card-header px-0 py-0">'+
                        '            <img src="'+baseUrl+sliderData[i].image+'" alt="" width="100%" >'+
                        '        </div>'+
                        '        <div class="card-block  text-center px-2 ">'+
                        '            <h4 class=" font-weight-bold pt-2">'+sliderData[i].heading+'</h4>'+
                        '            <p class="card-text">'+sliderData[i].content+'</p>'+
                        '        </div>'+
                        '        <div class="w-100"></div>'+
                        '        <div class="card-footer text-center ">'+
                        '            <button class="btn btn-primary btn-sm" onclick="editOverviewModel('+i+')">Edit </button>'+
                        '        </div>'+
                        '    </div>'+
                        '</div>'
                }
                else if(sliderData[i].div_type=="testimonial")
                {
                        testimonial_list = testimonial_list+ 
                        '   <div class="col-md-4">'+
                        '    <div class="card">'+
                        '        <div class="card-header px-0 py-0">'+
                        '            <img src="'+baseUrl+sliderData[i].image+'" alt="" width="100%" >'+
                        '        </div>'+
                        '        <div class="card-block  text-center px-2 ">'+
                        '            <h4 class=" font-weight-bold pt-2">'+sliderData[i].name+'</h4>'+
                        '            <h6 class=" font-weight-bold pt-2">'+sliderData[i].designation+'</h6>'+
                        '            <p class="card-text">'+sliderData[i].review+'</p>'+
                        '        </div>'+
                        '        <div class="w-100"></div>'+
                        '        <div class="card-footer text-center ">'+
                        '            <button class="btn btn-primary btn-sm" onclick="editTestimonialModel('+i+')">Edit </button>'+
                        '        </div>'+
                        '    </div>'+
                        '</div>'
                }
             }
            $("#slider_div").html(slider_list);	
            $("#div2").html(div2_list);	
            $("#div3").html(div3_list);	
            $("#portfolio_div").html(portfolio_list);	
            $("#testimonial_div").html(testimonial_list);	

        }
    };
}
function showImage(src,target) {
    var fr=new FileReader();
    // when image is loaded, set the src of the image where you want to display it
    fr.onload = function(e) { target.src = this.result; };
    src.addEventListener("change",function() {
        // fill fr with image data    
        fr.readAsDataURL(src.files[0]);
    });
}	
function editOverviewModel(i)
{
    let home_data = sliderData[i];
    
    var modal_body= '<div class="form-group">'+
                        '<label for="name">Heading</label>'+
                        '<input type="text" class="form-control" id="edit_heading" placeholder="Enter Heading" value="'+home_data.heading+'">'+
                     '</div>'+
                     '<div class="form-group ">'+
                        '<label for="name">Content</label>'+
                        '<textarea class="form-control" placeholder="Add Content" id="edit_content">'+home_data.content+'</textarea>'+
                     '</div>'+
                     '<div class="form-group">'+
                        '<label for="image">Image</label>'+
                            '<div class="row">'+
                                '<input type="file" class="form-control col-md-6 col-sm-4" id="src">'+
                                '<div class="col-md-6 col-sm-4">'+
                                    '<label class="imagecheck mb-4">'+
                                    '	<figure class="imagecheck-figure">'+
                                    '		<img src="'+baseUrl+home_data.image+'" alt=" Image" class="imagecheck-image" id="target">'+
                                    '	</figure>'+
                                    '</label>'+
                                '</div>'+
                            '</div>'
                    '</div>'
                     '<div class="form-group">'+
                        '<small class="error_message text-danger"></small>'+
                    '</div>'+
                                    
    $(".modal-header").html('<h5 class="text-primary text-bold">Edit</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button><button class="btn btn-sm btn-primary" onclick=updateOverview('+home_data.id+')>Update</button>');
    $(".modal").modal('show');

    var src = document.getElementById("src");
    var target = document.getElementById("target");
    showImage(src,target);
}

function updateOverview(id)
{
    let heading         = $("#edit_heading").val();
    let image_src       = $("#src").val();
    let content         = $("#edit_content").val();
  
    let formData = new FormData();
  
            if (image_src !== "" ) {
                var image = document.getElementById('src');
                var image_ext = image_src.split(".");
                image_ext = image_ext[image_ext.length - 1];
                image_ext = image_ext.toLowerCase();	
                
                if(image_ext ==="png" || image_ext ==="jpg" || image_ext==="jpeg" || image_ext==="svg")
                {
                    formData.append('image', image.files[0]);
                }
                else {
                    $(".error_message").html("Image should be png/jpg/jpeg/svg format");
                    return false;
                }
        }
    
 
    formData.append('heading',heading);
    formData.append('content',content);
    formData.append('id',id);
    let url = baseUrl+"api/admin/update_homepage_data";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
            if (xhr.status == 200 ) {
                let obj = JSON.parse(xhr.responseText);  
                let status= obj.Status;          
                let message= obj.Message; 
                if(!status){   
                    console.log(message);
                    $(".error_message").html(message);     
                 } 
				swal(message, {
					buttons: false,
                    timer: 2000,   
                });
               location.reload();
            }	
    };
}


// testimonial
function editTestimonialModel(i)
{
    let home_data = sliderData[i];
    
    var modal_body= '<div class="form-group">'+
                        '<label for="name">Name</label>'+
                        '<input type="text" class="form-control" id="edit_name" placeholder="Enter Name" value="'+home_data.name+'">'+
                     '</div>'+
                     '<div class="form-group">'+
                        '<label for="name">Designation</label>'+
                        '<input type="text" class="form-control" id="edit_designation" placeholder="Enter designation" value="'+home_data.designation+'">'+
                     '</div>'+
                     '<div class="form-group ">'+
                        '<label for="name">Review</label>'+
                        '<textarea class="form-control" placeholder="Add Review" id="edit_review">'+home_data.review+'</textarea>'+
                     '</div>'+
                     '<div class="form-group">'+
                        '<label for="image">Image</label>'+
                            '<div class="row">'+
                                '<input type="file" class="form-control col-md-6 col-sm-4" id="src">'+
                                '<div class="col-md-6 col-sm-4">'+
                                    '<label class="imagecheck mb-4">'+
                                    '	<figure class="imagecheck-figure">'+
                                    '		<img src="'+baseUrl+home_data.image+'" alt=" Image" class="imagecheck-image" id="target">'+
                                    '	</figure>'+
                                    '</label>'+
                                '</div>'+
                            '</div>'
                    '</div>'
                     '<div class="form-group">'+
                        '<small class="error_message text-danger"></small>'+
                    '</div>'+
                                    
    $(".modal-header").html('<h5 class="text-primary text-bold">Edit</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button><button class="btn btn-sm btn-primary" onclick=updateTestimonial('+home_data.id+')>Update</button>');
    $(".modal").modal('show');

    var src = document.getElementById("src");
    var target = document.getElementById("target");
    showImage(src,target);
}

function updateTestimonial(id)
{
    let name         = $("#edit_name").val();
    let designation         = $("#edit_designation").val();
    let image_src       = $("#src").val();
    let review         = $("#edit_review").val();
  
    let formData = new FormData();
  
            if (image_src !== "" ) {
                var image = document.getElementById('src');
                var image_ext = image_src.split(".");
                image_ext = image_ext[image_ext.length - 1];
                image_ext = image_ext.toLowerCase();	
                
                if(image_ext ==="png" || image_ext ==="jpg" || image_ext==="jpeg" || image_ext==="svg")
                {
                    formData.append('image', image.files[0]);
                }
                else {
                    $(".error_message").html("Image should be png/jpg/jpeg/svg format");
                    return false;
                }
        }
    
 
    formData.append('name',name);
    formData.append('designation',designation);
    formData.append('review',review);
    formData.append('id',id);
    let url = baseUrl+"api/admin/update_homepage_testimonial";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
            if (xhr.status == 200 ) {
                let obj = JSON.parse(xhr.responseText);  
                let status= obj.Status;          
                let message= obj.Message; 
                if(!status){   
                    console.log(message);
                    $(".error_message").html(message);     
                 } 
				swal(message, {
					buttons: false,
                    timer: 2000,   
                });
               location.reload();
            }	
    };
}

// without image div
function editContentModel(i)
{
    let home_data = sliderData[i];
    
    var modal_body= '<div class="form-group">'+
                        '<label for="name">Heading</label>'+
                        '<input type="text" class="form-control" id="edit_heading" placeholder="Enter Heading" value="'+home_data.heading+'">'+
                     '</div>'+
                     '<div class="form-group ">'+
                        '<label for="name">Content</label>'+
                        '<textarea class="form-control" placeholder="Add Content" id="edit_content">'+home_data.content+'</textarea>'+
                     '</div>'
                  
                    //  '<div class="form-group">'+
                    //     '<small class="error_message text-danger"></small>'+
                    // '</div>'+
                                    
    $(".modal-header").html('<h5 class="text-primary text-bold">Edit</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button><button class="btn btn-sm btn-primary" onclick=updateContent('+home_data.id+')>Update</button>');
    $(".modal").modal('show');
}

function updateContent(id)
{
    let heading         = $("#edit_heading").val();
    let content         = $("#edit_content").val();
  
    let formData = new FormData();
  
    formData.append('heading',heading);
    formData.append('content',content);
    formData.append('id',id);
    let url = baseUrl+"api/admin/update_homepage_data";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
            if (xhr.status == 200 ) {
                let obj = JSON.parse(xhr.responseText);  
                let status= obj.Status;          
                let message= obj.Message; 
                if(!status){   
                    console.log(message);
                    $(".error_message").html(message);     
                 } 
				swal(message, {
					buttons: false,
                    timer: 2000,   
                });
               location.reload();
            }	
    };
}