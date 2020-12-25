<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title">ADD SCRIPT FOR GOOGLE ANALYTICS </h5>                              
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd" id="v-pills-tab-without-border" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active show" id="v-pills-messages-tab-nobd" data-toggle="pill" href="#profileTab" role="tab" aria-controls="profileTab" aria-selected="true">HEADER SCRIPT</a>
                                        <a class="nav-link" id="v-pills-home-tab-nobd" data-toggle="pill" href="#partnerService" role="tab" aria-controls="partnerService" aria-selected="false">FOOTER SCRIPT</a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="tab-content" id="v-pills-without-border-tabContent">
                                        <!-- Tab 1 -->
                                        <div class="tab-pane fade active show" id="profileTab" role="tabpanel" aria-labelledby="v-pills-messages-tab-nobd">                                                
                                            <textarea class="mb-4 form-control" style="border:2px solid blue" name="header_editor" id="header_data" rows="10"></textarea>
                                            <button class="btn btn-block btn-primary" id="update_button" onclick=update_script_data('header')>Update Header Script</button>
                                        </div>
                                        <!-- tab 2 -->                                                                       
                                        <div class="tab-pane fade" id="partnerService" role="tabpanel" aria-labelledby="v-pills-home-tab-nobd">
                                            <textarea class="mb-4 form-control" style="border:2px solid blue"  name="footer_editor" id="footer_data" rows="10"></textarea>
                                            <button class=" btn btn-block btn-primary" id="update_button" onclick=update_script_data('footer')>Update Footeer Script</button>                     
                                        </div>                  
                                     </div>                     
                                </div>
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
<script src="<?php echo base_url()?>assets/admin_panel/libs/analyticsProcess.js"></script>
<script>
    CKEDITOR.replace( 'header_editor' );
    CKEDITOR.replace( 'footer_editor' );

    get_script_data();
</script>