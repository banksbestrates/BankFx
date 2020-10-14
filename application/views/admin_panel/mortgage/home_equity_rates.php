<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title">MORTGAGE-Home Equity Rates</h5>
                            </div>
                            <small>Web Page Link: <a href="<?php echo base_url();?>/home_equity_rates" target="_blank"><?php echo base_url();?>home_equity_rates<a>                                        
                        </div>
                        <div class="card-body">
                            <div class="col-md-12 px-5">
                                <h4 class="text-center text-primary">TOP DIV CONTENT</h4>
                                <textarea name="top_editor" id="top_content"></textarea><br/> 
                                <div id="top_button" ></div>
                                
                                <hr/>            
                                <h4 class="text-center text-primary">BOTTOM DIV CONTENT</h4> 
                                <textarea name="bottom_editor" id="bottom_content"></textarea><br/>             
                                <div id="bottom_button" ></div>
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
<script>
    CKEDITOR.replace( 'top_editor' );
    CKEDITOR.replace( 'bottom_editor' );
    let formData = new FormData();
    let url = baseUrl + "api/admin/get_home_equity_rate_content";
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
            for(var i=0;i<data.length;i++)
            {
                if(data[i].div_type=="top")
                {
                    $("#top_content").val(data[i].content); 
                    $("#top_button").html('<button class="btn btn-primary" id="update_button" onclick=updateHomeEquityRate('+data[i].id+',"'+data[i].div_type+'")>SAVE & UPDATE</button><br/>');
                }
                if(data[i].div_type=="bottom")
                {
                    $("#bottom_content").val(data[i].content); 
                    $("#bottom_button").html('<button class="btn btn-primary" id="update_button" onclick=updateHomeEquityRate('+data[i].id+',"'+data[i].div_type+'")>SAVE & UPDATE</button><br/>');
                }
            }
           
        }
    }

    function updateMortgageRate(id,div_type)
    {
        if(div_type=="top")
        {
            var content= CKEDITOR.instances.top_content.getData();
        }else if(div_type=="bottom")
        {
            var content= CKEDITOR.instances.bottom_content.getData();
        }
        let formData = new FormData();
        formData.append('content', content);
        formData.append('id', id);
        let url = baseUrl + "api/admin/update_mortgage_rate_content";
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
    function updateHomeEquityRate(id,div_type)
    {
        if(div_type=="top")
        {
            var content= CKEDITOR.instances.top_content.getData();
        }else if(div_type=="bottom")
        {
            var content= CKEDITOR.instances.bottom_content.getData();
        }
        let formData = new FormData();
        formData.append('content', content);
        formData.append('id', id);
        let url = baseUrl + "api/admin/update_home_equity_rate_content";
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