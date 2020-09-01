let userData = "";

function get_user_list() {
    let formData = new FormData();
    let url = baseUrl + "api/get_user_list";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let status = obj.Status;
            let message = obj.Message;
            if (!status) {}
            userData = obj.data;
            let user_list = '';
            for (var i = 0; i < userData.length; i++) {
                if(userData[i].row_status=="active")
                {
                    var row_status = '<button class="btn btn-success btn-round ml-auto btn-xs" onclick=updateUserStatus('+userData[i].id+',"inactive")>Active</button>'
                }else{
                    var row_status = '<button class="btn btn-danger btn-round ml-auto btn-xs" onclick=updateUserStatus('+userData[i].id+',"active")>Inactive</button>' 
                }
                var profile = userData[i].profile;
                if(userData[i].profile=="")
                {
                    profile = "assets/img/profile.jpg";
                }
                // alert(profile);
                user_list = user_list +
                    '<tr>' +
                    '    <td><img src=' + baseUrl + profile + ' style="height:60px;width:60px"/></td>' +
                    '    <td>' + userData[i].name + '</td>' +
                    '    <td>' + userData[i].email + '</td>' +
                    '    <td>(' + userData[i].country_code + ') ' + userData[i].phone + '</td>' +
                    '    <td>' + userData[i].gender + '</td>' +
                    '    <td>' +row_status+ '</td>' +
                    '    <td>' +
                    '   <a href="' + baseUrl + 'user_detail/' + userData[i].id + '">' +
                    '   <button class="btn btn-outline-primary btn-round ml-auto btn-xs">' +
                    '       <i class="fa fa-eye"></i> View ' +
                    '   </button></a>' +
                    '    </td>' +
                    '</tr>'
            }
            $("#userList").html(user_list);
            $('#basic-datatables').DataTable();

        }
    };
}
function updateUserStatus(user_id,status)
{
    var user_status = "Inactivate ";
    if(status=="active")
    {
     user_status = "Activate";
    }
   swal({
       title: 'Are you sure?',
       text: "You won't to " +user_status+ " the user account!",
       type: 'warning',
       buttons:{
           cancel: {
               visible: true,
               text : 'No, cancel!',
               className: 'btn btn-danger'
           },        			
           confirm: {
               text : 'Yes!',
               className : 'btn btn-success'
           }
       }
   }).then((willDelete) => {
       if (willDelete) {
           let formData = new FormData();
           formData.append('user_id',user_id);
           formData.append('user_status',status);
           let url = baseUrl+"api/change_user_status";
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
                           get_user_list();
                        }        
                   }	
               }
           } 
   });
}