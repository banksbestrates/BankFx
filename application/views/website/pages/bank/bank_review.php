
<!-- Bank detail  -->
<div class="container py-4">
    <div class="row">
        <div class="col-md-8">
            <span> Banking > Top 5 Financial Centers ></span><span class="text_yellow">Bank of America</span>
            <h2 class="font-weight-900 pt-2 mb-2">Bank of America Review</h2>
        </div>
        <div class="col-md-4 text-right pt-4">
        </div>
    </div>
</div>
<div class="container pb-5">  
    <div class="row">
        <div class="col-md-10 box_round_border">
                <div class="row">
                    <div class="col-md-12 px-0 pt-2">
                        <div class="row px-4">
                            <div class="col-md-4 px-4 text-center">
                                <img src="<?php echo base_url()?>assets/img/bank_images/allay_large.png" class="w-100 pt-4" />                                 
                            </div>
                            <div class="col-md-8 pt-2">
                                <span class="fa fa-star checked pr-2" style="font-size:20px"></span>
                                <span class="fa fa-star checked pr-2" style="font-size:20px"></span>
                                <span class="fa fa-star checked pr-2" style="font-size:20px"></span>
                                <span class="fa fa-star checked pr-2" style="font-size:20px"></span>
                                <span class="fa fa-star checked pr-2" style="font-size:20px"></span>
                                <span class="fa fa-star checked pr-2" style="font-size:20px"></span>
                                <span style="font-size:24px" class="font-weight-900 pl-3">5.0</span>
                                <small class="pl-2 text_skyblue font-weight-bold" style="font-size: 14px;">Banks Best Rating</small>
                                <div class="pt-2">
                                    <table class="table credit_card_small_row">
                                        <tbody>
                                            <tr>
                                                <td>
                                                <img src="<?php echo base_url()?>assets/images/website/banking/card_icon/Bank-Name.png" height="40px"/>
                                                <small class="font-weight-bold">Branch Name: </small><small>Bank of America</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                <img src="<?php echo base_url()?>assets/images/website/banking/card_icon/Branch-Count.png" height="40px"/>
                                                <small class="font-weight-bold">Bank Class: </small><small> National</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                <img src="<?php echo base_url()?>assets/images/website/banking/card_icon/Branch-Count.png" height="40px"/>
                                                <small class="font-weight-bold">Branch Count: </small><small>707-556-5936</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom:none">
                                                <img src="<?php echo base_url()?>assets/images/website/banking/card_icon/Online-Banking.png" height="40px"/>
                                                <small class="font-weight-bold">Website:</small><small> Full Service Office</small>
                                                </td>
                                            </tr>
                                        </tbody>     
                                    </table>
                                </div>
                            </div> 
                        </div>
                    </div> 
                </div>
            </div>
        <div class="col-md-2">   
        </div>
    </div>   
</div>

<!-- row 1 -->
<div class="container pb-5">
    <div class="row">
            <div class="col-md-6 what_to_like">
                <i class="fa fa-check-circle"></i> <span >WHAT TO LIKE </span>
                <div class="pt-3" id="what_to_like"></div>
            </div>
            <div class="col-md-6 what_to_like ">
            <i class="fa fa-times-circle"></i> <span >WHAT TO BE CAUTION ABOUT </span>
                <div class="pt-3" id="what_to_caution"></div>
            </div>
        </div>
</div>

<div class="container pb-5">
        <h5 class="text-uppercase pl-2 font-weight-900 border_bottom_golden">FULL REVIEW</h5> 
        <div id="full_review">
        </div>
</div>

<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/libs/bankProcess.js"></script>
<script>
  get_bank_full_review("bank of america");
</script>



 



