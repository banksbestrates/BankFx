
let scriptData="";
function get_script_data() {
    let base_url = baseUrl + "api/admin/get_script_data";
   
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
            scriptData = obj.data;

            console.log(scriptData);
            // alert(scriptData.header_script);
            $("#header_data").text(scriptData.header_script);
            $("#footer_data").text(scriptData.footer_script);
        }
    };
}

function update_script_data(type)
{
    if(type=="header")
    {
        var data= CKEDITOR.instances.header_data.getData();
        if (data == "") {
            alert("Enter Valid Content");
        }
        // var data   = $("#header_data").val();
    }else if(type=="footer")
    {
        var data= CKEDITOR.instances.footer_data.getData();
        if (data == "") {
            alert("Enter Valid Content");
        }
        // var data   = $("#footer_data").val();
    }
    let formData = new FormData();
    formData.append('type', type);
    formData.append('data', data);
    let url = baseUrl + "api/admin/update_script_data";
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