
<!--==========================
  over view banner
============================-->
<?php if(count($page_data)>=1){
            foreach($page_data as $d){
              if($d->div_type == "overview_heading"){?>
                <div class="overview_banner" style="background-image:linear-gradient(to left, rgba(245, 246, 252, 0.02), rgba(153, 153, 153, 0.73)),url('<?php echo base_url().$d->image ?>">
                  <div class="banner_heading">
                  <h1 class="display-4"><?php echo $d->heading ?></h1>
                  <div class="text-white" id="heading_content_text"><?php echo $d->content ?></div>
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
                <img src="<?php echo base_url();?>assets/images/website/investing/card_icon/best_invest.png" style="width:100px; height:100px;">
            </div>
            <!-- <a href="<?php echo base_url()?>best_investment"> -->
            <h6>Best Investments</h6>
          <!-- </a> -->
          </div>
      </div>
      <div class="col-md col-sm-4">
        <div class="card pb-2">
          <div style="width:100%; text-align:center">
              <img src="<?php echo base_url();?>assets/images/website/investing/card_icon/Reviews.png" style="width:100px; height:100px;">
          </div>
          <!-- <a href="<?php echo base_url()?>brokerage_overview"> -->
          <h6>Brokerage Reviews</h6>
        <!-- </a> -->
          </div>
      </div>
      <div class="col-md col-sm-4">
              <div class="card pb-2">
              <div style="width:100%; text-align:center">
                <img src="<?php echo base_url();?>assets/images/website/investing/card_icon/Calculator.png" style="width:100px; height:100px;">
              </div>
              <!-- <a href="#"> -->
                <h6>Annuity Calculator</h6>
              <!-- </a> -->
            </div>
      </div>
      <div class="col-md col-sm-4">
        <div class="card pb-2">
          <div style="width:100%; text-align:center">
            <img src="<?php echo base_url();?>assets/images/website/investing/card_icon/Best-Online-Brokers.png" style="width:100px; height:100px;">
          </div>
          <!-- <a href="<?php echo base_url()?>best_online_brokerage"> -->
          <h6>Best Brokers</h6>
        <!-- </a> -->
        </div>
      </div>
      <!-- <div class="col-md col-sm-4">
          <div class="card">
          <div style="width:100%; text-align:center">
            <img src="<?php echo base_url();?>assets/images/website/investing/card_icon/Brokers-for-Beginners.png" style="width:100px; height:100px;">
          </div>
          <a href="<?php echo base_url()?>best_beginner_broker"><h6 class="mb-2">Best Brokers For Beginners</h6></a>
      </div> -->
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
<script src="<?php echo base_url()?>assets/libs/investingProcess.js"></script>
<script>
  get_investing_advice_data();
  get_investing_posts();
</script>