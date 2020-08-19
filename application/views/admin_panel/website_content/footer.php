

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
                            <h2 class="text-center text-dark font-weight-bold">SMALL ABOUT DESCRIPTION</h2><hr/>
                            <div class="col-md-12 px-5">
                               <div class="row" id="footer_about_desc">
                                  
                               </div>
                            </div><br/><hr/>
                            <h2 class="text-center text-dark font-weight-bold">SOCIAL MEDIA LINK</h2><hr/>
                            <div class="col-md-12 px-5">
                                <div class="row">  
                                    <div class="col-md-6">
                                        <lable>Twitter Link</lable>
                                        <input type="text" class="form-control" id="twitter_link"/>
                                    </div>                      
                                    <div class="col-md-6">
                                        <lable>Facebook Link</lable>
                                        <input type="text" class="form-control" id="facebook_link"/>
                                    </div>
                                </div>   
                                <br/>
                                <div class="row">  
                                    <div class="col-md-6">
                                            <lable>Instagram Link</lable>
                                            <input type="text" class="form-control" id="instagram_link"/>
                                    </div>                      
                                    <div class="col-md-6">
                                            <lable>Google+ Link</lable>
                                            <input type="text" class="form-control" id="google_link"/>
                                    </div>
                                </div>   
                                <div class="text-center pt-3">
                                    <button class="btn btn-primary" onclick=update_footer_data("social_links")>UPDATE LINKS</button>
                                </div> 
                            </div>
                            <br/>
                            <hr/>  
                            <h2 class="text-center text-dark font-weight-bold">SMALL NEWSLETTER DESCRIPTION</h2><hr/>
                            <div class="col-md-12 px-5">
                                <div class="row" id="footer_newsletter_desc">
                                    
                                </div>
                            </div><br/>                        
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
<script src="<?php echo base_url()?>assets/admin_panel/libs/footerProcess.js"></script>
<script>
get_footer_data();
</script>