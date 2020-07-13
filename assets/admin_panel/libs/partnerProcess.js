let partnerData="";
function get_partner_list()
{
    let formData = new FormData();
	let url = baseUrl+"api/services/get_partner_detail";
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
             partnerData = obj.data;           
             let partner_list = '';

             console.log(partnerData);

            //  for (var i = 0; i < partnerData.length; i++) {
            //     partner_list = partner_list+  	
            //     '<tr>'+
            //     '    <td><img src='+baseUrl+partnerData[i].service_image+' style="height:60px;width:60px"/></td>'+
            //     '    <td>'+partnerData[i].service_name+'</td>'+
            //     '    <td>'+partnerData[i].service_heading+'</td>'+
            //     '    <td>'+partnerData[i].name+'</td>'+
            //     '    <td>'+
            //             '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Service" onclick="editServiceModal('+i+')">'+
            //             '    <i class="fa fa-edit"></i>'+
            //             '</button>'+
            //     '    </td>'+
            //     '    <td>'+
            //     '       <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" onclick="deleteServiceAlert('+partnerData[i].id+')">'+
            //     '           <i class="fa fa-times"></i>'+
            //     '       </button>'+
            //     '    </td>'+
            //     '    <td>'+
            //             '<a href="'+baseUrl+'category_list/'+partnerData[i].id+'"><button class="btn btn-outline-primary btn-round ml-auto btn-xs">'+
            //             '    <i class="fa fa-eye"></i> View Category'+
            //             '</button></a>'+
            //     '    </td>'+
            //     '</tr>'
            //  }

            // $("#serviceList").html(partner_list);	
            // $('#basic-datatables').DataTable({
			// });	
           		
        }	
	};
}