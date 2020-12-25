function get_footer_data() {
    let formData = new FormData();
    let url = baseUrl+"api/admin/get_footer_data";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let footerData = obj.data;
            console.log(footerData);
            let links = '<a href="'+footerData.twitter_link+'" class="twitter"><i class="fa fa-twitter"></i></a>'+
                        '<a href="'+footerData.facebook_link+'" class="facebook"><i class="fa fa-facebook"></i></a>'+
                        '<a href="'+footerData.instagram_link+'" class="instagram"><i class="fa fa-instagram"></i></a>'+
                        '<a href="'+footerData.google_link+'" class="google-plus"><i class="fa fa-linkedin "></i></a>';
                          
            $("#about_desc").html(footerData.about_desc);
            $("#newsletter").html(footerData.newsletter_desc);
            $("#social_link").html(links);
        }     
    };
}

function get_contact_data(){
    let formData = new FormData();
    let url = baseUrl+"api/admin/get_contact_detail";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let contactData = obj.data;
      
            $("#contact_address").html(contactData.address);
            $("#contact_phone").html(contactData.phone);
            $("#contact_email").html(contactData.email);
            $("#alt_phone").html(contactData.alt_phone);
        }     
    };
}

