//Category module 
function get_page_data(page_type) {

    let formData = new FormData();
    formData.append('page_type', page_type);
    let url = baseUrl + "api/admin/page_data";
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
            let pageData = obj.data;
            $(".back_image").css("background-image","url("+baseUrl+pageData.image+")");
            $("#page_data").html(pageData.page_data);
        }
    };
}




