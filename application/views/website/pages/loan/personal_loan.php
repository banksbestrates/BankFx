
  <!--==========================
    over view banner
  ============================-->
  <div class="overview_banner">
    <div class="banner_heading">
        <?php if(count($page_data)>=1){
              foreach($page_data as $d){
                if($d->div_type == "overview_heading"){?>
                  <h1 class="display-4"><?php echo $d->heading ?></h1>
                  <p><?php echo $d->content ?></p>
          <?php } 
          }
        }?>
    </div>
  </div>
 
  <!-- Card view -->
  <div class="container card_row pb-4">    
        <div class="pt-5 col-md-12 mx-auto row card_view">
            <div class="col-md col-sm-4">
                <div class="card pb-2">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/Loans-Calculator.png" style="width:100px; height:100px;">
                    </div>
                    <a href="#"><h6>Loan Calculator</h6></a>
                </div>
            </div>
            <div class="col-md col-sm-4">
                <div class="card pb-2">
                        <div style="width:100%; text-align:center">
                        <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/personal_loan.png" style="width:100px; height:100px;">
                        </div>
                    <a href="<?php echo base_url()?>personal_loan_rate"><h6>Personal Loan Rates</h6></a>
                    </div>
                </div>
            <div class="col-md col-sm-4">
              <div class="card pb-2">
              <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/Debt-Consolidation.png" style="width:100px; height:100px;">
                    </div>
              <a href="<?php echo base_url()?>index.php/mortgage_calculator_list"><h6>Debt Consolidation</h6></a>
                </div>
            </div>
            <div class="col-md col-sm-4">
                <div class="card pb-2">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/Poor-Credit.png" style="width:100px; height:100px;">
                    </div>
                <a href="<?php echo base_url()?>index.php/house_afford"><h6>Bad Credit</h6></a>
                </div>
            </div>
            <div class="col-md col-sm-4">
                <div class="card pb-2">
                <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/lender_review.png" style="width:100px; height:100px;">
                    </div>
                <a href="<?php echo base_url()?>leander_loan_review"><h6>Lender Review</h6></a>
                </div>
            </div>
        </div>
  </div> 


 <!-- Content Related to Loans -->
  <?php if(count($page_data)>=1){
            foreach($page_data as $d){
            if($d->div_type == "normal_content"){?>
             <div class="container pt-4">
                <h3 class="border_bottom_golden font-weight-900"><?php echo $d->heading?></h3>
                <p><?php echo $d->content?></p>
             </div>
            <?php }
          }
  }?>
    
 <!-- CONTENT related to this page -->
 <!-- <div class="container py-5 ">
       <h3 class="border_bottom_golden font-weight-900">Related Articles</h3> 
        <?php if(count($page_data)>=1){
            foreach($page_data as $d){
            if($d->div_type == "related_article"){?>
                <div class="col-md-12 mx-auto row px-0">
                    <div class="col-md-6 related_image">
                    </div>
                    <div class="col-md-6 related_content">
                            <p class="mb-1">EDITOR'S PICK </p>
                            <h4><?php echo $d->heading?></h4>
                            <p><?php echo $d->content?></p>
                            <div class="row">
                                <div class="col-md-1">
                                <i class="fa fa-arrow-circle-right"  aria-hidden="true"></i>
                                </div>
                                <div class="col-md-8 pt-2">6 MIN </div>
                            </div>
                    </div>
                </div>
            <?php }
            }
        }?>
 </div> -->
 <div class="container py-5">
        <h3 class="border_bottom_golden">LATEST FROM BANKS BEST RATES</h3>
        <div id="related_articles">

        </div>     
  </div> 

<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/libs/loanProcess.js"></script>
<script>
  get_personal_loan_posts();
</script>
