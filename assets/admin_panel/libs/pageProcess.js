let pageData ="";
function get_page_data(page_type) {
    if (page_type == "about_us") {
        $(".card-title").text("About Us")
    } else if (page_type == "terms_conditions") {
        $(".card-title").text("Terms and Conditions")
    } else if (page_type == "privacy_policy") {
        $(".card-title").text("Privacy Policy")
    } else { 
        $(".card-title").text("ERROR! INVALID REQUEST")
        $("#data").text("<p><strong> INVALID PAGE REQUEST</strong></p>");
        $("#update_button").css("display", "none");
    }
    let formData = new FormData();
    formData.append('page_type', page_type);
    let url = baseUrl + "api/admin/page_data";
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
            pageData = obj.data;
            // console.log(policyData);
            var image_data ='<div class="row"><div class="col-md-10">'+
                                '<img src="'+baseUrl+pageData.image+'" style="height:100px"/>'+
                            '</div>'+
                            '<div class="col-md-2">'+
                            '   <button class="btn btn-primary btn-sm" onclick=editBannerModal('+pageData.id+',"'+page_type+'")>Edit </button>'+
                            '</div></div><br/>'

            $(".banner_image").html(image_data);
            $("#data").text(pageData.page_data);
          

        }
    };
}

function updatePageData(page_type) {
    var page_data= CKEDITOR.instances.data.getData();
    // console.log(policy);
    if (page_data == "") {
        alert("Enter Valid Data");
    }

    let formData = new FormData();
    formData.append('page_type', page_type);
    formData.append('page_data', page_data);
    let url = baseUrl + "api/admin/page_data_update";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let status = obj.Status;
            let message = obj.Message;
            if (!status) {
                $(".error_message").html(message);
                return false;
            } else {
                console.log(message);
                swal(message, {
                    buttons: false,
                    timer: 2000,
                });
                get_page_data(page_type)
            }
        }
    };
}

//function edit banner images
function showImage(src,target) {
    var fr=new FileReader();
    // when image is loaded, set the src of the image where you want to display it
    fr.onload = function(e) { target.src = this.result; };
    src.addEventListener("change",function() {
        // fill fr with image data    
        fr.readAsDataURL(src.files[0]);
    });
}	
function editBannerModal(id,page_type)
{
    var modal_body= 
                     '<div class="form-group">'+
                        '<label for="image">Image</label>'+
                            '<div class="row">'+
                                '<input type="file" class="form-control col-md-6 col-sm-4" id="src">'+
                                '<div class="col-md-6 col-sm-4">'+
                                    '<label class="imagecheck mb-4">'+
                                    '	<figure class="imagecheck-figure">'+
                                    '		<img src="'+baseUrl+pageData.image+'" alt=" Image" class="imagecheck-image" id="target">'+
                                    '	</figure>'+
                                    '</label>'+
                                '</div>'+
                            '</div>'
                     '</div>'+
                     '<div class="form-group">'+
                        '<small class="error_message text-danger"></small>'+
                    '</div>'

                                    
    $(".modal-header").html('<h5 class="text-primary text-bold">Edit</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button>'+
    '<button class="btn btn-sm btn-primary" onclick=updateBanner('+id+',"'+page_type+'")>Update</button>');
    $(".modal").modal('show');

    var src = document.getElementById("src");
    var target = document.getElementById("target");
    showImage(src,target);
}
function updateBanner(id,page_type)
{
    
    let image_src       = $("#src").val();
    let base_url = baseUrl+"api/admin/update_page_banner";
    
    let formData = new FormData();
    if (image_src !== "") {
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
    formData.append('id',id);
    formData.append('page_type',page_type);
    let url = base_url
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




//footer content get and update
function getfooter_data()
{
    let formData = new FormData();
    formData.append('page_type', page_type);
    let url = baseUrl + "api/admin/page_data";
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
            let pageData = obj.data;
            // console.log(policyData);
            $("#data").text(pageData.page_data);
          

        }
    };
}
