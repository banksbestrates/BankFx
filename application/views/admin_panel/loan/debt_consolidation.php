<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title">LOAN - Debt Consolidation Guide</h5>                              
                            </div>
                            <small>Web Page Link:<a href="<?php echo base_url();?>debt_consolidation" target="_blank"><?php echo base_url();?>debt_consolidation<a>                                        
                        </div>  
                        <div class="card-body">             
                            <div class="col-md-12">
                                <h2>TOP DIV EDIT</h2>
                                <div class="row py-2" style="border:1px solid #CB9D24;border-radius:10px" >                                    
                                     <div class="col-md-8" id="top_box_content">
                                       
                                     </div> 

                                     <div class="col-md-4" id="top_box_image">
                                    
                                     </div>
                                </div>
                            </div>
                            <div class="col-md-12 pt-4">
                                <div class="row" id="normal_articles">
                                                                   
                                </div>
                            </div>
                            <br/>                        
                        </div><hr/>
                        <h2 class="px-5 text-dark font-weight-bold">Related Articles</h2>
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
<script src="<?php echo base_url()?>assets/admin_panel/libs/loanProcess.js"></script>
<script>
    get_debt_consolidation_data('debt');
</script>