//Category module 
function get_user_policy(policy_type) {

    if (policy_type == "terms_conditions") {
        $(".card-title").text("USER - Terms and Conditions")
    } else if (policy_type == "refund_policy") {
        $(".card-title").text("USER - Refund Policy")
    } else if (policy_type == "advert_policy") {
        $(".card-title").text("USER - Advert Policy")
    } else if (policy_type == "referral_policy") {
        $(".card-title").text("USER - Referral Policy")
    } else if (policy_type == "warranty_policy") {
        $(".card-title").text("USER - Warranty Policy")
    } else if (policy_type == "contact_us") {
        $(".card-title").text("USER - Contact Us")
    } else if (policy_type == "privacy_policy") {
        $(".card-title").text("USER - Privacy Polciy")
    } else {
        $(".card-title").text("ERROR! INVALID REQUEST")
        $("#data").text("<p><strong> INVALID PAGE REQUEST</strong></p>");
        $("#update_button").css("display", "none");
    }
    let formData = new FormData();
    formData.append('policy_type', policy_type);
    let url = baseUrl + "api/policies";
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
            let policyData = obj.data;
            // console.log(policyData);
            $("#data").text(policyData.policy);
            let partnerData = "";

            function get_partner_list() {
                let formData = new FormData();
                let url = baseUrl + "api/services/get_partner_detail";
                let xhr = new XMLHttpRequest();
                xhr.open('POST', url);
                xhr.send(formData);
                xhr.onload = function() {
                    if (xhr.status == 200) {
                        let obj = JSON.parse(xhr.responseText);
                        let status = obj.Status;
                        let message = obj.Message;
                        if (!status) {}
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

        }
    };
}

function updatePolicy(policy_type) {
    var policy = CKEDITOR.instances.data.getData();
    // console.log(policy);
    if (policy == "") {
        alert("Enter Valid Data");
    }

    let formData = new FormData();
    formData.append('policy_type', policy_type);
    formData.append('policy_data', policy);
    let url = baseUrl + "api/user/policy/update";
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
                get_user_policy(policy_type)
            }
        }
    };
}

//update profile

function get_partner_policy(policy_type) {

    if (policy_type == "terms_conditions") {
        $(".card-title").text("PARTNER - Terms and Conditions")
    } else if (policy_type == "refund_policy") {
        $(".card-title").text("PARTNER - Refund Policy")
    } else if (policy_type == "advert_policy") {
        $(".card-title").text("PARTNER - Advert Policy")
    } else if (policy_type == "referral_policy") {
        $(".card-title").text("PARTNER - Referral Policy")
    } else if (policy_type == "warranty_policy") {
        $(".card-title").text("PARTNER - Warranty Policy")
    } else if (policy_type == "contact_us") {
        $(".card-title").text("PARTNER - Contact Us")
    } else if (policy_type == "insurance_policy") {
        $(".card-title").text("PARTNER - Insurance Policy") 
    } else if (policy_type == "privacy_policy") {
        $(".card-title").text("PARTNER - Privacy Policy")
    }    
    else {
        $(".card-title").text("ERROR! INVALID REQUEST")
        $("#data").text("<p><strong> INVALID PAGE REQUEST</strong></p>");
        $("#update_button").css("display", "none");
    }
    let formData = new FormData();
    formData.append('policy_type', policy_type);
    let url = baseUrl + "api/partner/policies";
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
            let policyData = obj.data;
            $("#data").text(policyData.policy);


        }
    };
}

function updatePartnerPolicy(policy_type) {
    var policy = CKEDITOR.instances.data.getData();
    console.log(policy);
    if (policy == "") {
        alert("Enter Valid Data");
    }

    let formData = new FormData();
    formData.append('policy_type', policy_type);
    formData.append('policy_data', policy);
    let url = baseUrl + "api/partner/policy/update";
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
                get_partner_policy(policy_type)
            }
        }
    };
}