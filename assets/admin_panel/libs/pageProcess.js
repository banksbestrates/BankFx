//Category module 
function get_page_data(page_type) {

   
    if (page_type == "about_us") {
        $(".card-title").text("About Us")
    } else if (page_type == "terms_conditions") {
        $(".card-title").text("Terms and Conditions")
    } else if (page_type == "privacy_policy") {
        $(".card-title").text("Privacy Policy")
    } else { 
        $(".card-title").text("ERROR! INVALID REQUEST")
        $("#data").text("<p><strong> INVALID PAGE REQUEST</strong></p>");
        $("#update_button").css("display", "none");
    }
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
            // console.log(policyData);
            $("#data").text(pageData.page_data);
          

        }
    };
}

function updatePageData(page_type) {
    var page_data= CKEDITOR.instances.data.getData();
    // console.log(policy);
    if (page_data == "") {
        alert("Enter Valid Data");
    }

    let formData = new FormData();
    formData.append('page_type', page_type);
    formData.append('page_data', page_data);
    let url = baseUrl + "api/admin/page_data_update";
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
                console.log(message);
                swal(message, {
                    buttons: false,
                    timer: 2000,
                });
                get_page_data(page_type)
            }
        }
    };
}

