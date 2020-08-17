//mortgage module 

let brokerageData="";
function get_brokerage_overview() {
    let formData = new FormData();
    let url = baseUrl + "api/admin/get_brokerage_overview";
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
            brokerageData = obj.data;
            let trending_list = "";
            let related_list = "";
               for (var i = 0; i < brokerageData.length; i++) {
                if(brokerageData[i].div_type=="trending_article")
                {
                        trending_list = trending_list+ 
                        '   <div class="col-md-4">'+
                        '    <div class="card">'+
                        '        <div class="card-header px-0 py-0">'+
                        '            <img src="'+baseUrl+brokerageData[i].image+'" alt="" width="100%" >'+
                        '        </div>'+
                        '        <div class="card-block  text-center px-2 ">'+
                        '            <h4 class=" font-weight-bold pt-2">'+brokerageData[i].heading+'</h4>'+
                        '            <p class="card-text">'+brokerageData[i].content+'</p>'+
                        '        </div>'+
                        '        <div class="w-100"></div>'+
                        '        <div class="card-footer text-center ">'+
                        '            <button class="btn btn-primary btn-sm" onclick="editOverviewModel('+i+')">Edit </button>'+
                        '        </div>'+
                        '    </div>'+
                        '</div>'
                }
                else if(brokerageData[i].div_type=="related_article")
                {
                        related_list = related_list+ 
                        '   <div class="col-md-12">'+
                        '       <div class="row">'+
                        '           <div class="col-md-5">'+
                        '             <img src="'+baseUrl+brokerageData[i].image+'" alt="" width="100%" >'+
                        '           </div>'+
                        '           <div class="col-md-5 py-4">'+
                        '               <h3 class="text-dark">'+brokerageData[i].heading+'</h3>'+
                        '               <p>'+brokerageData[i].content+'</p>'+
                        '           </div>'+
                        '           <div class="col-md-2">'+
                        '               <button class="btn btn-sm btn-primary" onclick="editOverviewModel('+i+')">Edit</button>'+
                        '           </div>'+
                        '       </div>'+
                        '   </div>'
                } 

             }
            $("#trending_articles").html(trending_list);	
            $("#related_articles").html(related_list);	

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
    let mortgage_data = brokerageData[i];
    var modal_body= '<div class="form-group">'+
                        '<label for="name">Heading</label>'+
                        '<input type="text" class="form-control" id="edit_heading" placeholder="Enter Heading" value="'+mortgage_data.heading+'">'+
                     '</div>'+
                     '<div class="form-group ">'+
                        '<label for="name">Content</label>'+
                        '<textarea rows="5" class="form-control" placeholder="Add Content" id="edit_content">'+mortgage_data.content+'</textarea>'+
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
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button>'+
    '<button class="btn btn-sm btn-primary" onclick=updateOverview('+mortgage_data.id+',"'+type+'")>Update</button>');
    $(".modal").modal('show');

    var src = document.getElementById("src");
    var target = document.getElementById("target");
    showImage(src,target);
}
function updateOverview(id,type)
{
    
    let base_url = baseUrl+"api/admin/update_brokerage_overview";
    if(type=="best_online_broker")
    {
        base_url = baseUrl+"api/admin/update_best_online_broker_data";
    }
    if(type=="best_beginner_broker")
    {
        base_url = baseUrl+"api/admin/update_beginner_broker_data";
    }
    let heading         = $("#edit_heading").val();
    let image_src       = $("#src").val();
    let content     = $("#edit_content").val();
  
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
    let url = base_url;
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

//===============Online /Beginners Brokerage ==================//
function get_broker_data(type)
{
    let base_url="";
    if(type=="best_online_broker")
    {
        base_url = baseUrl + "api/admin/get_best_online_broker_data";
    }
    else if(type=="best_beginner_broker")
    {
        base_url = baseUrl + "api/admin/get_beginner_broker_data";
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
            brokerageData = obj.data;
       
            let normal_list = "";
            let related_list = "";
               for (var i = 0; i < brokerageData.length; i++) {
                   if(brokerageData[i].div_type=="normal_content")
                   {
                    normal_list = normal_list+ 
                    '<div class="col-md-12">'+
                    '    <h2 class="text-dark font-weight-bold">'+brokerageData[i].heading+'</h2> '+
                    '    <span style="float:right"><button class="btn btn-sm btn-primary" onclick=brokerContentModel('+i+',"'+type+'")>EDIT</button></span>  '+
                    '  <p>'+brokerageData[i].content+'</p>'+
                    '</div><hr/>'
                   }
                   else if(brokerageData[i].div_type=="related_article")
                   {
                        related_list = related_list+ 
                        '   <div class="col-md-12">'+
                        '       <div class="row">'+
                        '           <div class="col-md-5">'+
                        '             <img src="'+baseUrl+brokerageData[i].image+'" alt="" width="100%" >'+
                        '           </div>'+
                        '           <div class="col-md-5 py-4">'+
                        '               <h3 class="text-dark">'+brokerageData[i].heading+'</h3>'+
                        '               <p>'+brokerageData[i].content+'</p>'+
                        '           </div>'+
                        '           <div class="col-md-2">'+
                        '               <button class="btn btn-sm btn-primary" onclick=editOverviewModel('+i+',"'+type+'")>Edit</button>'+
                        '           </div>'+
                        '       </div>'+
                        '   </div>'
                   } 
                   else if(brokerageData[i].div_type=="overview_heading")
                   {
                    overview_data = '<div class="col-md-10">'+
                    '<h1>'+brokerageData[i].heading+'</h1>'+
                    '<p>'+brokerageData[i].content+'</p>'+
                    '</div>'+
                    '<div class="col-md-2">'+
                    '   <button class="btn btn-primary btn-sm" onclick=brokerContentModel('+i+',"'+type+'")>Edit </button>'+
                    '</div>'
                   } 
             }
            $("#normal_articles").html(normal_list);	
            $("#related_articles").html(related_list);	
            $("#top_banner_text").html(overview_data);	

        }
    };
}

function brokerContentModel(i,type)
{
    var brokerage_data =brokerageData[i];
    var modal_body= '<div class="form-group">'+
    '<label for="name">Heading</label>'+
    '<input type="text" class="form-control" id="edit_heading" placeholder="Enter Heading" value="'+brokerage_data.heading+'">'+
     '</div>'+
     '<div class="form-group ">'+
        '<label for="name">Content</label>'+
        '<textarea rows="5" class="form-control" placeholder="Add Content" name="editor" id="data">'+brokerage_data.content+'</textarea rows="5">'+
     '</div>'+
     '<div class="form-group">'+
        '<small class="error_message text-danger"></small>'+
    '</div>'

    $(".modal-dialog").addClass("modal-lg");
    $(".modal-header").html('<h5 class="text-primary text-bold">Edit</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save</button>'+
    '<button class="btn btn-sm btn-primary" onclick=updatebrokerageData('+brokerage_data.id+',"'+type+'")>Update</button>');
    $(".modal").modal('show');

    
    CKEDITOR.replace( 'editor' );
}

function updatebrokerageData(id,type)
{
    let base_url =  "";
    if(type=="best_online_broker")
    {
        base_url=  baseUrl + "api/admin/update_best_online_broker_data";
    }
    else if(type=="best_beginner_broker")
    {
        base_url=  baseUrl + "api/admin/update_beginner_broker_data";
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