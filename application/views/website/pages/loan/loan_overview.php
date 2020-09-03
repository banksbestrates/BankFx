 <!--==========================
    over view banner
  ============================-->
  <?php if(count($page_data)>=1){
            foreach($page_data as $d){
              if($d->div_type == "overview_heading"){?>
                   <div class="overview_banner" style="background-image:linear-gradient(to left, rgba(245, 246, 252, 0.02), rgba(13, 13, 13, 0.73)),url('<?php echo base_url().$d->image ?>">
                  <div class="banner_heading">
                  <h1 class="display-4"><?php echo $d->heading ?></h1>
                  <div class="text-white"><?php echo $d->content ?></div>
                  </div>
                </div>
        <?php } 
        }
    }?>
 
  <!-- Card view -->

  <div class="container card_row pb-4">    
        <div class="pt-5 col-md-12 row card_view">
            <div class="col-md col-sm-4">
                <div class="card pb-2">
                  <div style="width:100%; text-align:center">
                    <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/personal_loan.png" style="width:100px; height:100px;">
                  </div>
                <!-- <i class="fa fa-bar-chart" aria-hidden="true"></i> -->
                  <!-- <a href="<?php echo base_url()?>index.php/personal_loan"> -->
                  <h6>Personal Loans </h6>
                <!-- </a> -->
                </div>
            </div>
            <div class="col-md col-sm-4">
            <div class="card pb-2">
                  <div style="width:100%; text-align:center">
                    <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/home_equity.png" style="width:100px; height:100px;">
                  </div>
                  <!-- <i class="fa fa-bar-chart" aria-hidden="true"></i> -->
                  <!-- <a href="<?php echo base_url()?>index.php/personal_loan"> -->
                  <h6>Home Equity Loans</h6>
                <!-- </a> -->
                </div>
            </div>
            <div class="col-md col-sm-4">
              <div class="card pb-2">
                  <div style="width:100%; text-align:center">
                    <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/auto_loan.png" style="width:100px; height:100px;">
                  </div>
              <!-- <i class="fa fa-bar-chart" aria-hidden="true"></i> -->
              <!-- <a href="<?php echo base_url()?>index.php/auto_loan"> -->
              <h6>Auto Loans </h6>
            <!-- </a> -->
                </div>
            </div>
            <div class="col-md col-sm-4">
                <div class="card pb-2">
                  <div style="width:100%; text-align:center">
                    <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/student_loan.png" style="width:100px; height:100px;">
                  </div>
           
                <!-- <a href="<?php echo base_url()?>index.php/student_loan"> -->
                <h6>Student Loan</h6>
              <!-- </a> -->
                </div>
            </div>
            <div class="col-md col-sm-4">
                <div class="card pb-2">
                  <div style="width:100%; text-align:center">
                    <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/lender_review.png" style="width:100px; height:100px;">
                  </div>
             
                <!-- <a href="<?php echo base_url()?>leander_loan_review"> -->
                <h6>Lender Review</h6>
              <!-- </a> -->
                </div>
            </div>
        </div>
  </div> 

<!-- TRENDING IN BANKSSS -->
<section id="portfolio" class="">
    <div class="container">
        <header class="section-header pb-4">
          <h3 class="section-title">OUR BEST ADVICE</h3>
        </header>
        <div class="row" id="advice_data">

        </div>
    </div>
</section>
 <!-- Content Related to Loans -->
 <div class="container py-5">
        <h3 class="border_bottom_golden">LATEST FROM BANKS BEST RATES</h3>
        <div id="related_articles">

        </div>     
  </div> 


<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/libs/loanProcess.js"></script>
<script>
  get_loan_advice_data();
  get_loan_overview_posts();
</script>
