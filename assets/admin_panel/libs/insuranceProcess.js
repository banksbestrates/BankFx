//mortgage module 
let insuranceData="";
function get_insurance_overview() {
    let formData = new FormData();
    let url = baseUrl + "api/admin/get_insurance_overview";
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
            insuranceData = obj.data;
            let trending_list = "";
            let related_list = "";
            let overview_data = "";
               for (var i = 0; i < insuranceData.length; i++) {
                if(insuranceData[i].div_type=="trending_article")
                {
                        trending_list = trending_list+ 
                        '   <div class="col-md-4">'+
                        '    <div class="card">'+
                        '        <div class="card-header px-0 py-0">'+
                        '            <img src="'+baseUrl+insuranceData[i].image+'" alt="" width="100%" >'+
                        '        </div>'+
                        '        <div class="card-block  text-center px-2 ">'+
                        '            <h4 class=" font-weight-bold pt-2">'+insuranceData[i].heading+'</h4>'+
                        '            <p class="card-text">'+insuranceData[i].content+'</p>'+
                        '        </div>'+
                        '        <div class="w-100"></div>'+
                        '        <div class="card-footer text-center ">'+
                        '            <button class="btn btn-primary btn-sm" onclick="editOverviewModel('+i+')">Edit </button>'+
                        '        </div>'+
                        '    </div>'+
                        '</div>'
                }
                else if(insuranceData[i].div_type=="related_article")
                {
                        related_list = related_list+ 
                        '   <div class="col-md-12">'+
                        '       <div class="row">'+
                        '           <div class="col-md-5">'+
                        '             <img src="'+baseUrl+insuranceData[i].image+'" alt="" width="100%" >'+
                        '           </div>'+
                        '           <div class="col-md-5 py-4">'+
                        '               <h3 class="text-dark">'+insuranceData[i].heading+'</h3>'+
                        '               <p>'+insuranceData[i].content+'</p>'+
                        '           </div>'+
                        '           <div class="col-md-2">'+
                        '               <button class="btn btn-sm btn-primary" onclick="editOverviewModel('+i+')">Edit</button>'+
                        '           </div>'+
                        '       </div>'+
                        '   </div>'
                } 
                else if(insuranceData[i].div_type=="overview_heading")
                {
                    overview_data = '<div class="col-md-10">'+
                    '<h1>'+insuranceData[i].heading+'</h1>'+
                    '<p>'+insuranceData[i].content+'</p>'+
                    '</div>'+
                    '<div class="col-md-2">'+
                    '   <button class="btn btn-primary btn-sm" onclick=contentModel('+i+')>Edit </button>'+
                    '</div>'
                } 
             }
            $("#trending_articles").html(trending_list);	
            $("#related_articles").html(related_list);	
            $("#top_banner_text").html(overview_data);		
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
function editOverviewModel(i,type="")
{
    let mortgage_data = insuranceData[i];
    var modal_body= '<div class="form-group">'+
                        '<label for="name">Heading</label>'+
                        '<input type="text" class="form-control" id="edit_heading" placeholder="Enter Heading" value="'+mortgage_data.heading+'">'+
                     '</div>'+
                     '<div class="form-group ">'+
                        '<label for="name">Content</label>'+
                        '<textarea class="form-control" placeholder="Add Content" id="edit_content">'+mortgage_data.content+'</textarea>'+
                     '</div>'+

                     '<div class="form-group">'+
                        '<label for="image">Image</label>'+
                            '<div class="row">'+
                                '<input type="file" class="form-control col-md-6 col-sm-4" id="src">'+
                                '<div class="col-md-6 col-sm-4">'+
                                    '<label class="imagecheck mb-4">'+
                                    '	<figure class="imagecheck-figure">'+
                                    '		<img src="'+baseUrl+mortgage_data.image+'" alt=" Image" class="imagecheck-image" id="target">'+
                                    '	</figure>'+
                                    '</label>'+
                                '</div>'+
                            '</div>'
                     '</div>'+
                     '<div class="form-group">'+
                        '<small class="error_message text-danger"></small>'+
                    '</div>'+
                                    
    $(".modal-header").html('<h5 class="text-primary text-bold">Edit</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save</button>'+
    '<button class="btn btn-sm btn-primary" onclick=updateOverview('+mortgage_data.id+',"'+type+'")>Update</button>');
    $(".modal").modal('show');

    var src = document.getElementById("src");
    var target = document.getElementById("target");
    showImage(src,target);
}

function updateOverview(id, type="")
{
    let heading         = $("#edit_heading").val();
    let image_src       = $("#src").val();
    let content         = $("#edit_content").val();
    let base_url = baseUrl+"api/admin/update_insurance_overview";
    if(type=="homeowner")
    {
        base_url=  baseUrl + "api/admin/update_homeowner_insurance";
    }
    else if(type=="auto")
    {
        base_url=  baseUrl + "api/admin/update_auto_insurance";
    }
    else if(type=="life")
    {
        base_url=  baseUrl + "api/admin/update_life_insurance";
    }
    else if(type=="health")
    {
        base_url=  baseUrl + "api/admin/update_health_insurance";
    }
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

    formData.append('heading',heading);
    formData.append('content',content);
    formData.append('id',id);
    let url = base_url ;
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


//=======home insurance======//
function get_insurance(type) {
    let base_url = "";
    if(type=="homeowner")
    {
        base_url=  baseUrl + "api/admin/get_homeowner_insurance";
    }
    else if(type=="auto")
    {
        base_url=  baseUrl + "api/admin/get_auto_insurance";
    }
    else if(type=="life")
    {
        base_url=  baseUrl + "api/admin/get_life_insurance";
    }
    else if(type=="health")
    {
        base_url=  baseUrl + "api/admin/get_health_insurance";
    }
    let formData = new FormData();
    let url = base_url;
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
            insuranceData = obj.data;
            let data_list = "";
            let related_list = "";
               for (var i = 0; i < insuranceData.length; i++) {
                if(insuranceData[i].div_type=="normal_content")
                {
                    data_list = data_list+ 
                        '<div class="col-md-12">'+
                        '    <h2 class="text-dark font-weight-bold">'+insuranceData[i].heading+'</h2> '+
                        '    <span style="float:right"><button class="btn btn-sm btn-primary" onclick=insuranceDataModel('+i+',"'+type+'")>EDIT</button></span>  '+
                        '  <p>'+insuranceData[i].content+'</p>'+
                        '</div><hr/>'
                }   
                else if(insuranceData[i].div_type=="related_article")
                {
                     related_list = related_list+ 
                     '   <div class="col-md-12 pb-3">'+
                     '       <div class="row">'+
                     '           <div class="col-md-5">'+
                     '             <img src="'+baseUrl+insuranceData[i].image+'" alt="" width="100%" >'+
                     '           </div>'+
                     '           <div class="col-md-5 py-4">'+
                     '               <h3 class="text-dark">'+insuranceData[i].heading+'</h3>'+
                     '               <p>'+insuranceData[i].content+'</p>'+
                     '           </div>'+
                     '           <div class="col-md-2">'+
                     '               <button class="btn btn-sm btn-primary" onclick=editOverviewModel('+i+',"'+type+'")>Edit</button>'+
                     '           </div>'+
                     '       </div>'+
                     '   </div>'
                } 
             }
            $("#normal_articles").html(data_list);	
            $("#related_articles").html(related_list);


        }
    };
}

function insuranceDataModel(i,type)
{
    var insurance_data = insuranceData[i];
    var modal_body= '<div class="form-group">'+
        '<label for="name">Heading</label>'+
        '<input type="text" class="form-control" id="edit_heading" placeholder="Enter Heading" value="'+insurance_data.heading+'">'+
        '</div>'+
        '<div class="form-group ">'+
            '<label for="name">Content</label>'+
            '<textarea rows="5" class="form-control" placeholder="Add Content" name="editor" id="data">'+insurance_data.content+'</textarea>'+
        '</div>'+
        '<div class="form-group">'+
            '<small class="error_message text-danger"></small>'+
        '</div>'

    $(".modal-dialog").addClass("modal-lg");
    $(".modal-header").html('<h5 class="text-primary text-bold">Edit</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save</button>'+
    '<button class="btn btn-sm btn-primary" onclick=updateInsuranceData('+insurance_data.id+',"'+type+'")>Update</button>');
    $(".modal").modal('show');

    
    CKEDITOR.replace( 'editor' );
}

function updateInsuranceData(id,type)
{
    let base_url =  "";
    if(type=="homeowner")
    {
        base_url=  baseUrl + "api/admin/update_homeowner_insurance";
    }
    else if(type=="auto")
    {
        base_url=  baseUrl + "api/admin/update_auto_insurance";
    }
    else if(type=="life")
    {
        base_url=  baseUrl + "api/admin/update_life_insurance";
    }
    else if(type=="health")
    {
        base_url=  baseUrl + "api/admin/update_health_insurance";
    }
    var content= CKEDITOR.instances.data.getData();
    if (content == "") {
        alert("Enter Valid Content");
    }

    var heading   = $("#edit_heading").val();
    let formData = new FormData();
    formData.append('content', content);
    formData.append('heading', heading);
    formData.append('id', id);
    let url = base_url;
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
                swal(message, {
                    buttons: false,
                    timer: 2000,
                });
                location.reload();
            }
        }
    };
}



//=====================CONENT TOP BANNER====================//
function contentModel(i)
{
    let insurance_data = insuranceData[i];
    var modal_body= '<div class="form-group">'+
                        '<label for="name">Heading</label>'+
                        '<input type="text" class="form-control" id="edit_heading" placeholder="Enter Heading" value="'+insurance_data.heading+'">'+
                     '</div>'+
                     '<div class="form-group ">'+
                        '<label for="name">Content</label>'+
                        '<textarea rows="5" class="form-control" placeholder="Add Content" name="editor" id="data">'+insurance_data.content+'</textarea>'+
                     '</div>'+
                     '<div class="form-group">'+
                        '<small class="error_message text-danger"></small>'+
                    '</div>'
                                    
    $(".modal-dialog").addClass("modal-lg");                                   
    $(".modal-header").html('<h5 class="text-primary text-bold">Edit</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button>'+
    '<button class="btn btn-sm btn-primary" onclick="updateContent('+insurance_data.id+')">Update</button>');
    $(".modal").modal('show');
    
    CKEDITOR.replace( 'editor' );
   
}

function updateContent(id)
{
    var content= CKEDITOR.instances.data.getData();
    if (content == "") {
        alert("Enter Valid Content");
    }
    var heading   = $("#edit_heading").val();
    let formData = new FormData();
    formData.append('content', content);
    formData.append('heading', heading);
    formData.append('id', id);
    let url = baseUrl + "api/admin/update_insurance_overview";
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
                swal(message, {
                    buttons: false,
                    timer: 2000,
                });
                location.reload();
            }
        }
    };
}