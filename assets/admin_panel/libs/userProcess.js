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

                user_list = user_list +
                    '<tr>' +
                    '    <td>' + (i+1) + '</td>' +
                    '    <td>' + userData[i].user_email + '</td>' +
                    '</tr>'
            }
            $("#userList").html(user_list);
            $('#basic-datatables').DataTable();

        }
    };
}
