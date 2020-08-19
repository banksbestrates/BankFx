
let footerData="";
function get_footer_data() {
    let base_url = baseUrl + "api/admin/get_footer_data";
   
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
            footerData = obj.data;

            console.log(footerData);
            let about_desc = '<div class="col-md-10">'+
                            '<p>'+footerData.about_desc+'</p>'+
                            '</div>'+
                            '<div class="col-md-2">'+
                            '   <button class="btn btn-primary btn-sm" onclick=contentModel('+footerData.id+',"about")>Edit </button>'+
                            '</div>';
            let newsletter_desc = '<div class="col-md-10">'+
                            '<p>'+footerData.newsletter_desc+'</p>'+
                            '</div>'+
                            '<div class="col-md-2">'+
                            '   <button class="btn btn-primary btn-sm" onclick=contentModel('+footerData.id+',"newsletter")>Edit </button>'+
                            '</div>';

            $("#twitter_link").val(footerData.twitter_link);
            $("#facebook_link").val(footerData.facebook_link);
            $("#instagram_link").val(footerData.instagram_link);
            $("#google_link").val(footerData.google_link);
            $("#linkdin_link").val(footerData.linkdin_link);
            $("#footer_about_desc").html(about_desc);
            $("#footer_newsletter_desc").html(newsletter_desc);

        }
    };
}

function update_footer_data(type)
{
    var facebook_link   = $("#facebook_link").val();
    var twitter_link    = $("#twitter_link").val();
    var instagram_link  = $("#instagram_link").val();
    var google_link     = $("#google_link").val();

    let formData = new FormData();
    formData.append('facebook_link', facebook_link);
    formData.append('twitter_link', twitter_link);
    formData.append('instagram_link', instagram_link);
    formData.append('google_link', google_link );
    formData.append('type', type);
    formData.append('id', '1');

    let url = baseUrl + "api/admin/update_footer_links";
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

function contentModel(i,type)
{
    let footer_data = footerData;

    if(type=="about")
    {
        var data = footerData.about_desc;
    }
    else if(type=="newsletter")
    {
        var data = footerData.newsletter_desc;
    }
    var modal_body= 
                     '<div class="form-group ">'+
                        '<label for="name">Content</label>'+
                        '<textarea rows="5" class="form-control" placeholder="Add Content" name="editor" id="data">'+data+'</textarea>'+
                     '</div>'+
                     '<div class="form-group">'+
                        '<small class="error_message text-danger"></small>'+
                    '</div>'
    $(".modal-dialog").addClass("modal-lg");                                       
    $(".modal-header").html('<h5 class="text-primary text-bold">Edit</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button><button class="btn btn-sm btn-primary" onclick=updateContent('+footer_data.id+',"'+type+'")>Update</button>');
    $(".modal").modal('show');
    
    CKEDITOR.replace( 'editor' );
}

function updateContent(id,type)
{
    var content= CKEDITOR.instances.data.getData();
    if (content == "") {
        alert("Enter Valid Content");
    }
    var heading   = $("#edit_heading").val();;
    let formData = new FormData();
    formData.append('content', content);
    formData.append('type', type);
    formData.append('id', id);
    let url = baseUrl + "api/admin/update_footer_data";
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