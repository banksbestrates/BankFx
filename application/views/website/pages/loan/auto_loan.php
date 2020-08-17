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
  <div class="col-md-10 mx-auto card_row pb-4">    
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
                    <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/auto_loan.png" style="width:100px; height:100px;">
                </div>
              <a href="<?php echo base_url()?>index.php/mortgage_calculator_list"><h6>Auto Loan Rates</h6></a>
                </div>
            </div>
            <div class="col-md col-sm-4">
                <div class="card pb-2">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/refinance_rate.png" style="width:100px; height:100px;">
                    </div>
                <a href="<?php echo base_url()?>index.php/house_afford"><h6>Current Intrest Rate</h6></a>
                </div>
            </div>
            <div class="col-md col-sm-4">
                <div class="card pb-2">
                <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/lender_review.png" style="width:100px; height:100px;">
                    </div>
                <a href="<?php echo base_url()?>index.php/house_afford"><h6>Lender Review</h6></a>
                </div>
            </div>
        </div>
  </div> 


  <?php if(count($page_data)>=1){
    foreach($page_data as $d){
    if($d->div_type == "normal_content"){?>
        <div class="col-md-10 mx-auto pt-5">
        <h3 class="border_bottom_golden font-weight-900"><?php echo $d->heading?></h3>
            <p class="text-align-justify"><?php echo $d->content?></p>
        </div>
    <?php }
    }
    }?>
 
 <!-- related articles-->
 <div class="col-md-10 mx-auto  py-5 ">
       <h3 class="border_bottom_golden font-weight-900">Related Articles</h2>
       <?php if(count($page_data)>=1){
        foreach($page_data as $d){
        if($d->div_type == "related_article"){?>
             <div class="col-md-12 mx-auto row px-0">
            <div class="col-md-6 related_image" style="background-image:url(<?php echo base_url().$d->image?>)">
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
       
</div>
