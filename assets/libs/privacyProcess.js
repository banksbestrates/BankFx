//Category module 
function get_page_data(page_type) {

    // if (page_type == "privacy_policy") {
       
    // } else if (page_type == "refund_policy") {
    //     $(".card-title").text("Refund Policy")
    // } else if (page_type == "advert_policy") {
    //     $(".card-title").text("Advert Policy")
    // } else { 
    //     $(".card-title").text("ERROR! INVALID REQUEST")
    //     $("#data").text("<p><strong> INVALID PAGE REQUEST</strong></p>");
    //     $("#update_button").css("display", "none");
    // }
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
            $("#page_data").html(pageData.page_data);
          

        }
    };
}


