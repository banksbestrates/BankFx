
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title">Investing-Investing Overview Page</h5>                              
                            </div>
                            <small>Web Page Link:<a href="<?php echo base_url();?>/investing_overview" target="_blank"><?php echo base_url();?>investing_overview<a>                                        
                        </div>
                        
                        <div class="card-body">
                        <h2 class="text-center text-dark font-weight-bold">INVESTING</h2><hr/>
                            <div class="col-md-12 px-5">
                                <div class="row" id="trending_articles">
                                                            
                                </div>
                            </div>
                            <br/>                        
                        </div><br/><br/>
                        <h2 class="text-center text-dark font-weight-bold">Related Articles</h2><hr/>
                            <div class="col-md-12 px-5">
                                <div class="row" id="related_articles">
                                                            
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
<script src="<?php echo base_url()?>assets/admin_panel/libs/investingProcess.js"></script>
<script>
    get_investing_overview();
</script>