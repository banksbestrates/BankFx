 <!--==========================
    over view banner
  ============================-->
  <?php if(count($page_data)>=1){
            foreach($page_data as $d){
              if($d->div_type == "overview_heading"){?>
                  <!-- <div class="overview_banner" style="background-image:linear-gradient(to left, rgba(245, 246, 252, 0.02), rgba(13, 13, 13, 0.73)),url('<?php echo base_url().$d->image ?>"> -->
                  <div class="overview_banner" style="background-image:url('<?php echo base_url().$d->image ?>')">
                  <div class="banner_heading">
                    <h1 class="display-4"><?php echo $d->heading ?></h1>
                    <div id="heading_content_text"><?php echo $d->content?></div>
                  </div>
                </div>
        <?php } 
        }
    }?>
 
  <!-- Card view -->
  <div class="container card_row pb-4">    
        <div class="pt-5 col-md-12 mx-auto row card_view">
            <div class="col-md col-sm-4">
                <div class="card pb-2">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/Loans-Calculator.png" style="width:100px; height:100px;">
                    </div>
                  <a href="<?php echo base_url()?>loan_calculator"><h6>Loan Calculator</h6></a>
                </div>
            </div>
            <div class="col-md col-sm-4">
              <div class="card pb-2">
                <div style="width:100%; text-align:center">
                    <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/auto_loan.png" style="width:100px; height:100px;">
                </div>
              <a href="<?php echo base_url()?>auto_loan_rates"><h6>Auto Loan Rates</h6></a>
                </div>
            </div>
            <div class="col-md col-sm-4">
                <div class="card pb-2">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/refinance_rate.png" style="width:100px; height:100px;">
                    </div>
                <!-- <a href="<?php echo base_url()?>index.php/house_afford"> -->
                <h6>Current Intrest Rate</h6>
                <!-- </a> -->
                </div>
            </div>
            <div class="col-md col-sm-4">
                <div class="card pb-2">
                <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/lender_review.png" style="width:100px; height:100px;">
                    </div>
                <!-- <a href="<?php echo base_url()?>index.php/house_afford"> -->
                <h6>Lender Review</h6>
                <!-- </a> -->
                </div>
            </div>
        </div>
  </div> 


<div class="container py-5">
        <div class="row">
          <div class="col-md-10 pr-0">
            <div class="pb-4">
                <a target="_blank" href="https://shareasale.com/r.cfm?b=1464706&amp;u=2564107&amp;m=43951&amp;urllink=&amp;afftrack="><img src="https://static.shareasale.com/image/43951/xmas-2019-728x90-60.png" border="0" alt="SEO-powersuite-anti-crisis-sale-2020-60%" /></a>
            </div>
            <h3 class="border_bottom_golden pt-5 mb-0">LATEST FROM BANKS BEST RATES</h3>
            <div id="related_articles">
            </div> 
          </div>
          <div class="col-md-2 px-0 pl-1">
          <a target="_blank" href="https://shareasale.com/r.cfm?b=717955&amp;u=2564107&amp;m=52235&amp;urllink=&amp;afftrack="><img src="https://static.shareasale.com/image/52235/300x2501.jpg" border="0" alt="Get the Deal of the Week at RefurBees.com"  style="max-width:130%"/></a>
          </div>       
        </div>   
  </div>

<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/libs/loanProcess.js"></script>
<script>
  get_loan_overview_posts();
</script>
