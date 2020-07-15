
let adminData="";
function login()
{
   
    var email = $("#email").val();
    var password = $("#password").val();
    if(email==""){
        $(".email_form").addClass("has-error");}
    else{ 
        $(".email_form").removeClass("has-error");} 
    if(password=="") {
        $(".password_form").addClass("has-error");}
    else{ 
        $(".password_form").removeClass("has-error");} 
    
    let formData = new FormData();
    formData.append('email',email);
	formData.append('password',password);
	let url = baseUrl+"api/admin/login";
	let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200 ) {
            let obj = JSON.parse(xhr.responseText);  
            let status= obj.Status;          
            let message= obj.Message; 
            if(!status){  
                $(".error_message").html(message);   
                return false;     
             } 
            window.location = baseUrl+"admin/dashboard";
           
        }	
	};
}

function view_profile(admin_id)
{

    let formData = new FormData();
    formData.append('admin_id',admin_id);
	let url = baseUrl+"api/admin/get_profile_detail";
	let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200 ) {
            let obj = JSON.parse(xhr.responseText);  
            let status= obj.Status;          
            let message= obj.Message; 
            if(!status){   
                return false;     
             } 
            adminData = obj.data;
            
            $("#email").val(adminData.email);
            $("#name").val(adminData.name);
            $("#header_admin_name").val(adminData.name);
            $("#header_admin_email").val(adminData.email);
        }	
	};
}

function update_profile(admin_id)
{
    let email = $("#email").val();
    let name = $("#name").val();
    if(email==""){
        $(".email_form").addClass("has-error");}
    else{ 
        $(".email_form").removeClass("has-error");} 
    if(name=="") {
        $(".name_form").addClass("has-error");}
    else{ 
        $(".name_form").removeClass("has-error");} 

        let formData = new FormData();
        formData.append('admin_id',admin_id);
        formData.append('email',email);
        formData.append('name',name);
        let url = baseUrl+"api/admin/update_profile";
        let xhr = new XMLHttpRequest();
        xhr.open('POST', url);
        xhr.send(formData);
        xhr.onload = function() {
            if (xhr.status == 200 ) {
                let obj = JSON.parse(xhr.responseText);  
                let status= obj.Status;          
                let message= obj.Message; 
                if(!status){   
                  
                    return false;     
                 } 
              
				swal("Profile Updated successfully", {
					buttons: false,
                    timer: 2000,   
                });
              location.reload();
             
				
            }	
        };
    
}

function resetPasswordModal(admin_id)
{
    var modal_body= '<div class="form-group current_form">'+
                        '<label for="name">Current Password</label>'+
                        '<input type="text" class="form-control" id="current_password" placeholder="Enter current Password">'+
                    '</div>'+
                    '<div class="form-group new_form">'+
                        '<label for="name">New Password</label>'+
                        '<input type="text" class="form-control" id="new_password" placeholder="Enter New Password" value="">'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<small class="error_message text-danger"></small>'+
                    '</div>';
                            
    $(".modal-header").html('<h5 class="text-primary text-bold">Reset Password</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"data-dismiss="modal">Cancel! Dont save</button><button class="btn btn-sm btn-primary" onclick=resetPassword('+admin_id+')>Reset Password</button>');
    $(".modal").modal('show');
		
}

function resetPassword(admin_id)
{
    var current_password = $("#current_password").val();
    var new_password     = $("#new_password").val();
    if(current_password==""){
        $(".current_form").addClass("has-error");}
    else{ 
        $(".current_form").removeClass("has-error");} 
    if(new_password=="") {
        $(".new_form").addClass("has-error");}
    else{ 
        $(".new_form").removeClass("has-error");} 

    
    let formData = new FormData();
    formData.append('admin_id',admin_id);
    formData.append('current_password',current_password);
    formData.append('new_password',new_password);
    let url = baseUrl+"api/admin/reset_password";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200 ) {
            let obj = JSON.parse(xhr.responseText);  
            let status= obj.Status;          
            let message= obj.Message; 
            if(!status){   
                $(".error_message").html(message);   
             }  
             else{
                $(".modal").modal('hide');  
                swal("Password Updated Successfully", {
                    buttons: false,
                    timer: 2000,
                });
             }
        }	
    };
   
}






