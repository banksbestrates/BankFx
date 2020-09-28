

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title">MORTGAGE-Mortgage Overview Page</h5>                              
                            </div>
                            <small>Web Page Link: <a href="<?php echo base_url();?>/mortgage_overview" target="_blank"><?php echo base_url();?>mortgage_overview<a>                                        
                        </div>
                        <div class="card-body">
                            <h2 class="text-center text-dark font-weight-bold">TOP BANNER TEXT EDIT</h2><hr/>
                            <div class="col-md-12 px-5">
                               <div class="row" id="top_banner_text">
                                  
                               </div>
                            </div><br/><hr/>
                            <!-- <h2 class="text-center text-dark font-weight-bold">WHAT IS TRENDING IN HOUSE BUYING</h2>
                            <div class="col-md-12 px-5">
                                <div class="row" id="trending_articles">                          
                                </div>
                            </div>
                            <br/>                         -->
                            </div>
                            <br/><br/>
                            <!-- <h2 class="text-center text-dark font-weight-bold">RELATED ARTICLES</h2><hr/>
                            <div class="col-md-12 px-5">
                                <div class="row" id="related_articles">                           
                                </div>
                            </div>
                            <br/>                         -->
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
get_mortgage_overview();

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