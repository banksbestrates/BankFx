let reviewData = "";

function get_review_list() {
    let formData = new FormData();
    let url = baseUrl + "api/admin/get_review_list";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let status = obj.Status;
            let message = obj.Message;
            if (!status) {}
            reviewData = obj.data;
            let review_list = '';
            for (var i = 0; i < reviewData.length; i++) {
                if(reviewData[i].review_status == "pending")
                {
                   var  aprrove_btn = '<button class="btn btn-sm btn-warning" onclick=updateReviewStatusModel('+reviewData[i].id+',"approved")>Pending</button>';
                }
                else if(reviewData[i].review_status == "approved")
                {
                    var  aprrove_btn = '<button class="btn btn-sm btn-success">Approved</button>';
                }
                review_list = review_list +
                    '<tr>' +
                    '    <td>' + (i+1) + '</td>' +
                    '    <td>' + reviewData[i].review + '</td>' +
                    '    <td>'+ aprrove_btn+
                    '       <button class="btn btn-sm btn-danger" onclick=updateReviewStatusModel('+reviewData[i].id+',"delete")>Delete</button>'+
                    '   </td>' +
                    '</tr>'
            }
            $("#reviewList").html(review_list);
            $('#basic-datatables').DataTable();
        }
    };
}
function updateReviewStatusModel(id,status)
{
    if(status=="approved")
    {
        var message =  '<h3>Are you sure you want to approve this review ?</h3><p>Approved review will be displayed on the website.</p>'
    }
    else if(status=="delete")
    {
        var message =  '<h3>Are you sure you want to delete this review ?</h3><p>Review once deleted cannot be retrived</p>'
    }
    var modal_body= '<div class="text-center">'+message+
                    '<div class="text-center pt-4">'+
                        '<button class="btn btn-sm btn-success" onclick=updateReviewStatus('+id+',"'+status+'")>Yes Sure</button> &nbsp;&nbsp;'+
                        '<button class="btn btn-sm btn-danger" data-dismiss="modal">No, Close</button></div>'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<small class="error_message text-danger"></small>'+
                    '</div>'
                
    $(".modal-header").html('<h5 class="text-primary text-bold">Edit</h5>');
    $(".modal-body").html(modal_body);
    $(".modal").modal('show');
}

function updateReviewStatus(id,status)
{
    let formData = new FormData();
    formData.append("id",id);
    formData.append("status",status);
    let url = baseUrl + "api/admin/update_review_status";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let status = obj.Status;
            let message = obj.Message;
            if(status){
                $(".modal").modal('hide');
                swal({
                    text: message,
                    icon: "success",
                    timer: 1500,
                    showConfirmButton: false
                });
            }else{
                swal({
                    text: message,
                    icon: "warning",
                    timer: 1500,
                    showConfirmButton: false
                    });
            }
            get_review_list();
        }
    };
}