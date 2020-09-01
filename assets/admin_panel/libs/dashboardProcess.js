
function get_dashboard_count()
{
    let formData = new FormData();
	let url = baseUrl+"api/admin/dashboard_data";
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
  
             let data = obj.data;           
          
             $("#total_services").text(data.total_services);
             $("#total_partners").text(data.total_partners);		
        }	
	};
}



