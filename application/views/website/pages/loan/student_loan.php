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
                  <a href="<?php echo base_url()?>index.php/mortgage_rates"><h6>Loan Calculator</h6></a>
                </div>
            </div>
            <div class="col-md col-sm-4">
            <div class="card pb-2">
                <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/refinance_rate.png" style="width:100px; height:100px;">
                    </div>
                  <a href="<?php echo base_url()?>index.php/refinance_rates"><h6>Student Loan Rates</h6></a>
                </div>
            </div>
            <div class="col-md col-sm-4">
                <div class="card pb-2">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/student_loan.png" style="width:100px; height:100px;">
                    </div>
                <a href="<?php echo base_url()?>index.php/house_afford"><h6>College Saving Calculator</h6></a>
                </div>
            </div>
            <div class="col-md col-sm-4">
                <div class="card pb-2">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/personal_loan.png" style="width:100px; height:100px;">
                    </div>
                <a href="<?php echo base_url()?>index.php/house_afford"><h6>Lender Review</h6></a>
                </div>
            </div>
        </div>
  </div> 

 <!-- Content Related to Loans -->
 <?php if(count($page_data)>=1){
    foreach($page_data as $d){
    if($d->div_type == "normal_content"){?>
        <div class="container pt-5">
        <h3 class="border_bottom_golden font-weight-900"><?php echo $d->heading?></h3>
            <p class="text-align-justify"><?php echo $d->content?></p>
        </div>
    <?php }
    }
    }?><br/><br/>


