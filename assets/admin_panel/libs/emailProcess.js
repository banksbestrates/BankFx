let emailData = "";

function get_email_list() {
    let formData = new FormData();
    let url = baseUrl + "api/get_bulk_mails";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let status = obj.Status;
            let message = obj.Message;
            if (!status) {}
            emailData = obj.data;
            let email_list = '';
            for (var i = 0; i < emailData.length; i++) {
                email_list = email_list +
                    '<tr>' +
                    '    <td>' + emailData[i].subject + '</td>' +
                    '    <td>' + emailData[i].send_to + '</td>' +
                    // '    <td>' + emailData[i].send_by + '</td>' +
                    '    <td>' + emailData[i].created_on + '</td>' +
                    '    <td>' +
                    '       <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" onclick="deleteMail(' + emailData[i].id + ')">' +
                    '           <i class="fa fa-times"></i>' +
                    '       </button>' +
                    '    </td>' +
                    '    <td>' +
                    '       <a href="' + baseUrl + 'email_details/' + emailData[i].id + '"><button class="btn btn-outline-primary btn-round ml-auto btn-xs">' +
                    '           <i class="fa fa-eye"></i> View Detail' +
                    '       </button></a>' +
                    '    </td>' +
                    '</tr>'
            }

            $("#emailList").html(email_list);
            $('#basic-datatables').DataTable({});

        }
    };
}
//add services
function addNewMail(admin_id) {
    var modal_body = '<div class="form-group user_type">' +
        '<label for="name">Choose Recipient (customer/partner)</label>' +
        '<select id="select_user" class="form-control">' +
        '<option value="">Select Recipient</option>' +
        '<option value="user">Users</option>' +
        '<option value="partner">Partners</option>' +
        // '<option value="all">All</option>' +
        '</select>' +
        '</div>' +
        '<div class="form-group subject">' +
        '<label for="subject">Enter Subject</label>' +
        '<input type="text" class="form-control" id="subject" placeholder="Enter Subject ">' +
        '</div>' +
        '<div class="form-group mail_content">' +
        '<label for="mail">Write Content</label>' +
        '<textarea class="form-control" placeholder="Add message here" name="editor" id="mail"></textarea>' +
        '</div>' +
        '<div class="form-group">' +
        '<small class="error_message text-danger"></small>' +
        '</div>';

    $(".modal-header").html('<h5 class="text-primary text-bold">Compose New Mail</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button><button class="btn btn-sm btn-primary" onclick="sendMail(' + admin_id + ')">Send Mail</button>');
    $(".modal-dialog").addClass('modal-lg');
    $(".modal").modal('show');

    CKEDITOR.replace('editor');

}

function sendMail(admin_id) {
    var mail_content = CKEDITOR.instances.mail.getData();
    let subject = $("#subject").val();
    let user_type = $("#select_user option:selected").val();
    if (subject == "") {
        $(".subject").addClass("has-error");
    } else {
        $(".subject").removeClass("has-error");
    }
    if (mail_content == "") {
        $(".mail_content").addClass("has-error");
    } else {
        $(".mail_content").removeClass("has-error");
    }
    if (user_type == "") {
        $(".user_type").addClass("has-error");
    } else {
        $(".user_type").removeClass("has-error");
    }

    let formData = new FormData();
    formData.append('user_type', user_type);
    formData.append('subject', subject);
    formData.append('send_by', admin_id);
    formData.append('mail_body', mail_content);
    let url = baseUrl + "api/send_bulk_mail";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let status = obj.Status;
            let message = obj.Message;
            if (!status) {
                conosle.log(message);
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

function deleteMail(mail_id) {
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        buttons: {
            cancel: {
                visible: true,
                text: 'No, cancel!',
                className: 'btn btn-danger'
            },
            confirm: {
                text: 'Yes, delete it!',
                className: 'btn btn-success'
            }
        }
    }).then((willDelete) => {
        if (willDelete) {
            let formData = new FormData();
            formData.append('mail_id', mail_id);
            let url = baseUrl + "api/delete_particular_mail";
            let xhr = new XMLHttpRequest();
            xhr.open('POST', url);
            xhr.send(formData);
            xhr.onload = function() {
                if (xhr.status == 200) {
                    let obj = JSON.parse(xhr.responseText);
                    let status = obj.Status;
                    let message = obj.Message;
                    if (!status) {
                        conosle.log(message);
                        return false;
                    } else {
                        swal(message, {
                            icon: "success",
                            buttons: {
                                confirm: {
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

function get_email_detail(email_id) {
    let formData = new FormData();
    formData.append('email_id', email_id);
    let url = baseUrl + "api/get_email_detail";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let status = obj.Status;
            let message = obj.Message;
            if (!status) {}
            var email_detail = obj.data;
            console.log(email_detail);
            $(".sent_to").html(email_detail.send_to);
            $(".sent_on").html(email_detail.created_on);
            $(".subject").html(email_detail.subject);
            $(".body").html(email_detail.mail_body);
        }
    };
}