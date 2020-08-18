
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title">Insurance-Insurance Overview Page</h5>                              
                            </div>
                            <small>Web Page Link:<a href="<?php echo base_url();?>/insurance_overview" target="_blank"><?php echo base_url();?>insurance_overview<a>                                        
                        </div>
                        
                        <div class="card-body">
                             <h2 class="text-center text-dark font-weight-bold">TOP BANNER TEXT EDIT</h2><hr/>
                            <div class="col-md-12 px-5">
                               <div class="row" id="top_banner_text">
                                   
                               </div>
                            </div><br/><hr/>

                            <h2 class="text-center text-dark font-weight-bold">INSURANCE</h2><hr/>
                            <div class="col-md-12 px-5">
                                <div class="row" id="trending_articles">
                                                            
                                </div>
                            </div>
                            <br/>                        
                        </div><br/><br/>
                        <!-- <h2 class="text-center text-dark font-weight-bold">Related Content</h2><hr/>
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
<script src="<?php echo base_url()?>assets/admin_panel/libs/insuranceProcess.js"></script>
<script>
    get_insurance_overview();
</script>