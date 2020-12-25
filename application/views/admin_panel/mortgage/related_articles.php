<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title">MORTGAGE-Related Articles</h5>                              
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12 px-5">
                                <lable>Article Heading</lable>
                                <input type="text" class="form-control" id="heading" placeholder="Article Heading Here"/><br/>
                                <lable>Article Introduction</lable>
                                <textarea class="form-control" id="introduction" rows="5" placeholder="Enter Introduction here"></textarea><br/>
                                <label>Articel Content</label>
                                <textarea name="editor" id="data"></textarea><br/>
                                <label>Article Image</label>
                                <input type="file" class="form-control" /><br/>
                                <button class="btn btn-block btn-primary" id="update_button" onclick="addAirtcle()">Add Article</button>
                            </div>
                            <br/>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Datatables -->
<script src="<?php echo base_url()?>assets/admin_panel/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/admin_panel/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/admin_panel/libs/pageProcess.js"></script>
<script>
 CKEDITOR.replace( 'editor' );
let formData = new FormData();
let url = baseUrl + "api/admin/get_contact_detail";
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
        let data = obj.data;
        $("#phone").val(data.phone);
        $("#email").val(data.email);
        $("#address").text(data.address);  
    }
}

function updateContactUs()
{
    var phone   = $("#phone").val();
    var email   = $("#email").val();
    var address = $("#address").val();

    let formData = new FormData();
    formData.append('phone', phone);
    formData.append('email', email);
    formData.append('address', address);
    let url = baseUrl + "api/admin/update_contaact_detail";
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
                location.reload();
            }
        }
    };
}

</script>