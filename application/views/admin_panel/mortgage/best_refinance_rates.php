<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title">MORTGAGE-Best Mortgage Rates</h5>
                            </div>
                            <small>Web Page Link: <a href="<?php echo base_url();?>/refinance_rates" target="_blank"><?php echo base_url();?>refinance_rates<a>                                        
                        </div>
                        <div class="card-body">
                            <div class="col-md-12 px-5">
                                <lable>Heading</lable>
                                <input type="text" class="form-control font-weight-bold"  id="heading" placeholder="Article Heading Here"/><br/>
                                <label>Content</label>
                                <textarea name="editor" id="data"></textarea><br/>             
                                <button class="btn btn-block btn-primary" id="update_button" onclick="updateRefinanceRate()">UPDATE DATA</button>
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
<script src="<?php echo base_url()?>assets/admin_panel/libs/mortgageProcess.js"></script>
<script>
 CKEDITOR.replace( 'editor' );
let formData = new FormData();
let url = baseUrl + "api/admin/get_refinance_rate_content";
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
        $("#heading").val(data.heading);
        $("#data").val(data.content);
        // $("#address").text(data.address);  
    }
}

function updateRefinanceRate()
{
    var content= CKEDITOR.instances.data.getData();
    if (content == "") {
        alert("Enter Valid Content");
    }
    var heading   = $("#heading").val();

    let formData = new FormData();
    formData.append('content', content);
    formData.append('heading', heading);
    let url = baseUrl + "api/admin/update_refinance_rate_content";
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