<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title">BANKING-Bank Full Review</h5>                              
                            </div>
                            <!-- <small>Web Page Link:<a href="<?php echo base_url();?>/bank_overview" target="_blank"><?php echo base_url();?>bank_overview<a>                                         -->
                        </div>
                            <div class="card-body">
                               
                                <div class="col-md-6 mx-auto text-center">
                                    <lable>Select Bank </lable><br/><br/>
                                    <select class="form-control" id="bank_name">
                                        <option value=""> Select Bank</option>
                                        <option value="bank of america">Bank of America</option>
                                        <option value="Wells Fargo">Wells Fargo</option>
                                        <option value="JPMorgan Chase Bank">JPMorgan Chase Bank</option>
                                        <option value="BNY Mellon">BNY Mellon</option>
                                        <option value="PNC Bank">PNC Bank</option>
                                        <option value="U.S. Bank">U.S. Bank</option>
                                        <option value="TD Bank">TD Bank</option>
                                        <option value="First">First</option>
                                        <option value="Truist Bank">Truist Bank</option>    
                                    </select><br/><br/>
                                    <button class="btn btn-sm btn-primary" id="bank_name" onclick="search_bank_review()">Search</button>
                                </div><br/>
                                
                                <div id="bank_full_detail" style="display:none">
                                    <h6 id="web_link"></h6>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <h4> WHAT TO LIKE</h4>
                                            <div id="what_to_like"></div><br/>
                                            <h4> WHAT TO CAUTION</h4>
                                            <div id="what_to_caution"></div><br/>
                                            <h4>FULL REVIEW</h4>
                                            <div id="full_review"></div>
                                        </div>
                                        <div class="col-md-2" id="edit_button">
                                            
                                        </div>             
                                    </div>
                                </div>
                            </div>
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
<script src="<?php echo base_url()?>assets/admin_panel/libs/bankProcess.js"></script>
