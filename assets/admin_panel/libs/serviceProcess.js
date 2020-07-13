let serviceData="";
function get_service_list()
{
    let formData = new FormData();
	let url = baseUrl+"api/services/get_all_services";
	let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200 ) {
            let obj = JSON.parse(xhr.responseText);  
            let status= obj.Status;          
            let message= obj.Message; 
            if(!status){             
             } 
             serviceData = obj.data;           
             let service_list = '';
             for (var i = 0; i < serviceData.length; i++) {
                service_list = service_list+  	
                '<tr>'+
                '    <td><img src='+baseUrl+serviceData[i].service_image+' style="height:60px;width:60px"/></td>'+
                '    <td>'+serviceData[i].service_name+'</td>'+
                '    <td>'+serviceData[i].service_heading+'</td>'+
                '    <td>'+serviceData[i].name+'</td>'+
                '    <td>'+
                        '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Service" onclick="editServiceModal('+i+')">'+
                        '    <i class="fa fa-edit"></i>'+
                        '</button>'+
                '    </td>'+
                '    <td>'+
                '       <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" onclick="deleteServiceAlert('+serviceData[i].id+')">'+
                '           <i class="fa fa-times"></i>'+
                '       </button>'+
                '    </td>'+
                '    <td>'+
                        '<a href="'+baseUrl+'category_list/'+serviceData[i].id+'"><button class="btn btn-outline-primary btn-round ml-auto btn-xs">'+
                        '    <i class="fa fa-eye"></i> View Category'+
                        '</button></a>'+
                '    </td>'+
                '</tr>'
             }

            $("#serviceList").html(service_list);	
            $('#basic-datatables').DataTable({
			});	
           		
        }	
	};
}
//add services
function addServiceModal()
{
    var modal_body= '<div class="form-group service_name">'+
                        '<label for="name">Enter Service Name</label>'+
                        '<input type="text" class="form-control" id="service_name" placeholder="Enter Service Name">'+
                     '</div>'+
                     '<div class="form-group ">'+
                        '<label for="name">Enter Service Review</label>'+
                        '<textarea class="form-control" placeholder="Add Review" id="service_review"></textarea>'+
                     '</div>'+
                    '<div class="form-group ">'+
                        '<label for="name">Enter Reviewer Name</label>'+
                        '<input type="text" class="form-control" id="review_by" placeholder="Enter Reviewer Name">'+
                     '</div>'+
                     '<div class="form-group service_image">'+
                        '<label for="image">Select Service Image</label>'+
                            '<div class="row">'+
                                '<input type="file" class="form-control col-md-6 col-sm-4" id="src" >'+
                                '<div class="col-md-6 col-sm-4">'+
                                    '<label class="imagecheck mb-4">'+
                                    '	<figure class="imagecheck-figure">'+
                                    '		<img src="" alt="Service Image" class="imagecheck-image" id="target">'+
                                    '	</figure>'+
                                    '</label>'+
                                '</div>'+
                            '</div>'
                     '</div>'+
                     '<div class="form-group">'+
                        '<small class="error_message text-danger"></small>'+
                     '</div>'+
                                    
    $(".modal-header").html('<h5 class="text-primary text-bold">Add New Service</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button><button class="btn btn-sm btn-primary" onclick="saveService()">Save Service</button>');
    $(".modal").modal('show');


    var src = document.getElementById("src");
    var target = document.getElementById("target");
    showImage(src,target);
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

function saveService()
{
    let service_name    = $("#service_name").val();
    let image_src       = $("#src").val();
    let service_review  = $("#service_review").val();
    let review_by       = $("#review_by").val();
   
    if(service_name==""){
        $(".service_name").addClass("has-error");}
    else{ 
        $(".service_name").removeClass("has-error");} 
    if(image_src==""){
        $(".service_image").addClass("has-error");}
    else{ 
        $(".service_image").removeClass("has-error");} 

    let formData = new FormData();
    if (image_src !== "") {
            var service_image = document.getElementById('src');
            var service_image_ext = image_src.split(".");
            service_image_ext = service_image_ext[service_image_ext.length - 1];
            service_image_ext = service_image_ext.toLowerCase();	
             
            if(service_image_ext ==="png" || service_image_ext ==="jpg" || service_image_ext==="jpeg" || service_image_ext==="svg")
            {
                formData.append('service_image', service_image.files[0]);
            }
            else {
                $(".error_message").html("Image should be png/jpg/jpeg/svg format");
                return false;
            }
    }
    formData.append('service_name',service_name);
    formData.append('service_review',service_review);
    formData.append('review_by',review_by);
    let url = baseUrl+"api/services/add_service";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
            if (xhr.status == 200 ) {
                let obj = JSON.parse(xhr.responseText);  
                let status= obj.Status;          
                let message= obj.Message; 
                if(!status){   
                    conosle.log(message);
                    $(".error_message").html(message);
                    return false;     
                 } else{
                    swal(message, {
                        buttons: false,
                        timer: 2000,   
                    });
                  location.reload();
                 }
            }	
    };
}

//edit service
function editServiceModal(i)
{
    let service_data = serviceData[i];
    var modal_body= '<div class="form-group service_name">'+
                        '<label for="name">Enter Service Name</label>'+
                        '<input type="text" class="form-control" id="edit_service_name" placeholder="Enter Service Name" value="'+service_data.service_name+'">'+
                     '</div>'+
                     '<div class="form-group ">'+
                        '<label for="name">Enter Service Review</label>'+
                        '<textarea class="form-control" placeholder="Add Review" id="edit_service_review">'+service_data.service_heading+'</textarea>'+
                     '</div>'+
                    '<div class="form-group ">'+
                        '<label for="name">Enter Reviewer Name</label>'+
                        '<input type="text" class="form-control" id="edit_review_by" placeholder="Enter Reviewer Name" value="'+service_data.name+'">'+
                     '</div>'+
                     '<div class="form-group service_image">'+
                        '<label for="image">Select Service Image</label>'+
                            '<div class="row">'+
                                '<input type="file" class="form-control col-md-6 col-sm-4" id="src">'+
                                '<div class="col-md-6 col-sm-4">'+
                                    '<label class="imagecheck mb-4">'+
                                    '	<figure class="imagecheck-figure">'+
                                    '		<img src="'+baseUrl+service_data.service_image+'" alt="Service Image" class="imagecheck-image" id="target">'+
                                    '	</figure>'+
                                    '</label>'+
                                '</div>'+
                            '</div>'
                     '</div>'+
                     '<div class="form-group">'+
                        '<small class="error_message text-danger"></small>'+
                     '</div>'+
                                    
    $(".modal-header").html('<h5 class="text-primary text-bold">Add New Service</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button><button class="btn btn-sm btn-primary" onclick="updateService('+service_data.id+')">Save Service</button>');
    $(".modal").modal('show');


    var src = document.getElementById("src");
    var target = document.getElementById("target");
    showImage(src,target);
}

function updateService(service_id)
{
    let service_name    = $("#edit_service_name").val();
    let image_src       = $("#src").val();
    let service_review  = $("#edit_service_review").val();
    let review_by       = $("#edit_review_by").val();
   
    if(service_name==""){
        $(".service_name").addClass("has-error");}
    else{ 
        $(".service_name").removeClass("has-error");} 
 
    let formData = new FormData();
    if (image_src !== "") {
            var service_image = document.getElementById('src');
            var service_image_ext = image_src.split(".");
            service_image_ext = service_image_ext[service_image_ext.length - 1];
            service_image_ext = service_image_ext.toLowerCase();	
             
            if(service_image_ext ==="png" || service_image_ext ==="jpg" || service_image_ext==="jpeg" || service_image_ext==="svg")
            {
                formData.append('service_image', service_image.files[0]);
            }
            else {
                $(".error_message").html("Image should be png/jpg/jpeg/svg format");
                return false;
            }
    }

    formData.append('service_id',service_id);
    formData.append('service_name',service_name);
    formData.append('service_review',service_review);
    formData.append('review_by',review_by);
    let url = baseUrl+"api/services/update_service";
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
                    return false;     
                 } 
				swal(message, {
					buttons: false,
                    timer: 2000,   
                });
               location.reload();
             
				
            }	
    };
}



 function deleteServiceAlert(service_id)
 {
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        buttons:{
            cancel: {
                visible: true,
                text : 'No, cancel!',
                className: 'btn btn-danger'
            },        			
            confirm: {
                text : 'Yes, delete it!',
                className : 'btn btn-success'
            }
        }
    }).then((willDelete) => {
        if (willDelete) {
            let formData = new FormData();
            formData.append('service_id',service_id);
            let url = baseUrl+"api/services/delete_service";
            let xhr = new XMLHttpRequest();
            xhr.open('POST', url);
            xhr.send(formData);
            xhr.onload = function() {
                    if (xhr.status == 200 ) {
                        let obj = JSON.parse(xhr.responseText);  
                        let status= obj.Status;          
                        let message= obj.Message; 
                        if(!status){   
                            conosle.log(message);
                            return false;     
                         } 
                         else{
                            swal(message, {
                                icon: "success",
                                buttons : {
                                    confirm : {
                                        className: 'btn btn-success'
                                    }
                                }
                            });
                           location.reload();
                         }        
                    }	
                }
            } 
    });
 }



