function get_admin_data(admin_id)
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
            console.log(adminData);
            $(".header_admin_name").text(adminData.name);
            $(".header_admin_email").text(adminData.email);
        }	
    };
    

}