<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title">INVESTMENT- Best Brokers for Beginners</h5>                              
                            </div>
                            <small>Web Page Link:<a href="<?php echo base_url();?>best_beginner_brokerage" target="_blank"><?php echo base_url();?>best_beginner_brokerage<a>                                        
                        </div>  
                        <div class="card-body">             
                            <div class="col-md-12">
                                <div class="row" id="normal_articles">
                                                                   
                                </div>
                            </div>
                            <br/>                        
                        </div>
                        <h2 class="px-5 text-dark font-weight-bold">Related Articles</h2><hr/>
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
<script src="<?php echo base_url()?>assets/admin_panel/libs/brokerageProcess.js"></script>
<script>
    get_broker_data('best_beginner_broker');
</script>