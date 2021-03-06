//mortgage module 
let mortgageData="";
let houseData="";
function get_mortgage_overview() {
    let formData = new FormData();
    let url = baseUrl + "api/admin/get_mortgage_overview";
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
            mortgageData = obj.data;
            let trending_list = "";
            let advice_heading = "";
            let overview_data = "";
               for (var i = 0; i < mortgageData.length; i++) {
                   if(mortgageData[i].div_type=="trending_article")
                   {
                        trending_list = trending_list+ 
                        '   <div class="col-md-4">'+
                        '    <div class="card">'+
                        '        <div class="card-header px-0 py-0">'+
                        '            <img src="'+baseUrl+mortgageData[i].image+'" alt="" width="100%" >'+
                        '        </div>'+
                        '        <div class="card-block  text-center px-2 ">'+
                        '            <h4 class=" font-weight-bold pt-2">'+mortgageData[i].heading+'</h4>'+
                        '            <p class="card-text">'+mortgageData[i].content+'</p>'+
                        '        </div>'+
                        '        <div class="w-100"></div>'+
                        '        <div class="card-footer text-center ">'+
                        '            <button class="btn btn-primary btn-sm" onclick="editOverviewModel('+i+')">Edit </button>'+
                        '        </div>'+
                        '    </div>'+
                        '</div>'
                   }
                   else if(mortgageData[i].div_type=="advice_heading")
                   {
                    advice_heading ='<div class="col-md-12">'+
                        '       <div class="row">'+
                        '           <div class="col-md-10"><input type="text"  class="form-control" value="'+ mortgageData[i].heading+'" id="edit_advice_heading"/></h4></div>'+
                        '           <div class="col-md-2">'+
                        '               <button class="btn btn-sm btn-primary" onclick="editAdviceHeading('+mortgageData[i].id+')">Update</button>'+
                        '           </div>'+
                        '       </div>'+
                        '   </div>'
                   } 
                   else if(mortgageData[i].div_type=="overview_heading")
                   {
                    overview_data = '<div class="col-md-10">'+
                    '<h1>'+mortgageData[i].heading+'</h1>'+
                    '<img src="'+baseUrl+mortgageData[i].image+'" style="height:100px"/>'+
                    '<p>'+mortgageData[i].content+'</p>'+
                    '</div>'+
                    '<div class="col-md-2">'+
                    '   <button class="btn btn-primary btn-sm" onclick="editOverviewModel('+i+')">Edit </button>'+
                    '</div>'
                   } 
             }
            $("#trending_articles").html(trending_list);	
            // $("#related_articles").html(related_list);	
            $("#top_banner_text").html(overview_data);	
            $("#advice_heading").html(advice_heading);	

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
    let mortgage_data = mortgageData[i];
    var modal_body= '<div class="form-group">'+
                        '<label for="name">Heading</label>'+
                        '<input type="text" class="form-control" id="edit_heading" placeholder="Enter Heading" value="'+mortgage_data.heading+'">'+
                     '</div>'+
                     '<div class="form-group ">'+
                        '<label for="name">Content</label>'+
                        '<textarea rows="5" class="form-control" placeholder="Add Content" name="editor" id="data">'+mortgage_data.content+'</textarea>'+
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
    
    $(".modal-dialog").addClass("modal-lg");  
    $(".modal-header").html('<h5 class="text-primary text-bold">Edit</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button><button class="btn btn-sm btn-primary" onclick="updateOverview('+mortgage_data.id+')">Update</button>');
    $(".modal").modal('show');

    CKEDITOR.replace( 'editor' );
    var src = document.getElementById("src");
    var target = document.getElementById("target");
    showImage(src,target);
}
function updateOverview(id)
{
    var content= CKEDITOR.instances.data.getData();
    if (content == "") {
        alert("Enter Valid Content");
    }
    let heading         = $("#edit_heading").val();
    let image_src       = $("#src").val();
    // let content     = $("#edit_content").val();
  
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
    let url = baseUrl+"api/admin/update_mortgage_overview";
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

//house afford 
function get_house_content()
{
    let formData = new FormData();
        let url = baseUrl + "api/admin/get_house_afford_content";
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
                houseData= obj.data;
                let content_list = ""
                for(var i=0 ;i<houseData.length;i++)
                {
                   content_list= content_list+ '<div class="card mx-0 px-4 pt-2">'+
                   '<button class="btn btn-primary col-md-2 btn-sm ml-auto" onclick="updateHouseAfford('+ i +')">Edit </button>'+
                   '<h3 class="font-weight-bold pt-4">'+houseData[i].heading+'</h3>'+
                    '<p>'+houseData[i].content+'</p>'+
                    '</div>'
                }
               
                $("#house_data").html(content_list);
            }
        }
}

// update house affored
function updateHouseAfford(i)
{
    var home_data = houseData[i];
    var modal_body= '<div class="form-group">'+
    '<label for="name">Heading</label>'+
    '<input type="text" class="form-control" id="edit_heading" placeholder="Enter Heading" value="'+home_data.heading+'">'+
     '</div>'+
     '<div class="form-group ">'+
        '<label for="name">Content</label>'+
        '<textarea rows="5" class="form-control" placeholder="Add Content" name="editor" id="data">'+home_data.content+'</textarea rows="5">'+
     '</div>'+
     '<div class="form-group">'+
        '<small class="error_message text-danger"></small>'+
    '</div>'

    $(".modal-dialog").addClass("modal-lg");
    $(".modal-header").html('<h5 class="text-primary text-bold">Edit</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button><button class="btn btn-sm btn-primary" onclick=updateHouseData('+home_data.id+')>Update</button>');
    $(".modal").modal('show');

    
    CKEDITOR.replace( 'editor' );
    
}

function updateHouseData(id)
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
    let url = baseUrl + "api/admin/update_house_afford_content";
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
                location.reload();
            }
        }
    };
}

//function content 
function contentModel(i)
{
    let mortgage_data = mortgageData[i];
    var modal_body= '<div class="form-group">'+
                        '<label for="name">Heading</label>'+
                        '<input type="text" class="form-control" id="edit_heading" placeholder="Enter Heading" value="'+mortgage_data.heading+'">'+
                     '</div>'+
                     '<div class="form-group ">'+
                        '<label for="name">Content</label>'+
                        '<textarea rows="5" class="form-control" placeholder="Add Content" name="editor" id="data">'+mortgage_data.content+'</textarea>'+
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
                         '</div>'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<small class="error_message text-danger"></small>'+
                    '</div>' 

    $(".modal-dialog").addClass("modal-lg");                                
    $(".modal-header").html('<h5 class="text-primary text-bold">Edit</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button><button class="btn btn-sm btn-primary" onclick="updateContent('+mortgage_data.id+')">Update</button>');
    $(".modal").modal('show');
    
    CKEDITOR.replace( 'editor' );
    var src = document.getElementById("src");
    var target = document.getElementById("target");
    showImage(src,target);
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
    let url = baseUrl + "api/admin/update_mortgage_overview";
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

function editAdviceHeading(id)
{
    advice_heading = $("#edit_advice_heading").val();
    let formData = new FormData();
    formData.append('content', "nothing");
    formData.append('heading', advice_heading);
    formData.append('id', id);
    let url = baseUrl + "api/admin/update_mortgage_overview";
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