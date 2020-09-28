  <!--==========================
    over view banner
  ============================-->
  <?php if(count($page_data)>=1){
            foreach($page_data as $d){
              if($d->div_type == "overview_heading"){?>
                    <div class="overview_banner" style="background-image:linear-gradient(to left, rgba(245, 246, 252, 0.02), rgba(13, 13, 13, 0.73)),url('<?php echo base_url().$d->image ?>">
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
        <!-- row 1  -->
        <div class="pt-5 col-md-12 mx-auto row card_view">
            <div class="col-md">
                <div class="card small_card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/best_credit.png" style="width:100px; height:100px;">
                    </div>
                    <!-- <a href="<?php echo base_url()?>/best_credit_cards"> -->
                      <span>Best Credit Cards</span>
                    <!-- </a> -->
                </div>
            </div>
            <div class="col-md">
                <div class="card small_card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/balance_transfer.png" style="width:100px; height:100px;">
                    </div>
                  <!-- <a href="#"> -->
                    <span>Balance Transfer</span>
                  <!-- </a> -->
                </div>
            </div>
            <div class="col-md">
                <div class="card small_card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/zero.png" style="width:100px; height:100px;">
                    </div>
                  <!-- <a href="#"> -->
                    <span>Zero ARP</span>
                  <!-- </a> -->
                </div>
            </div>
            <div class="col-md">
                <div class="card small_card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/no_annual_fee.png" style="width:100px; height:100px;">
                    </div>
                  <!-- <a href="#"> -->
                    <span>No Annual Fee</span>
                  <!-- </a> -->
                </div>
            </div>
            <div class="col-md">
                <div class="card small_card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/rewards.png" style="width:100px; height:100px;">
                    </div>
                  <!-- <a href="#"> -->
                    <span>Rewards</span>
                  <!-- </a> -->
                </div>
            </div>
            <div class="col-md">
                <div class="card small_card">
                   <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/CashBack.png" style="width:100px; height:100px;">
                    </div>
                  <!-- <a href="#"> -->
                    <span>Cash Back</span>
                  <!-- </a> -->
                </div>
            </div>   
        </div>
        <!-- row 2  -->
        <div class="pt-5 col-md-12 mx-auto row card_view">
            <div class="col-md">
                <div class="card small_card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/Travel.png" style="width:100px; height:100px;">
                    </div>
                  <!-- <a href="#"> -->
                    <span>Travel</span>
                  <!-- </a> -->
                </div>
            </div>
            <div class="col-md">
                <div class="card small_card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/Business.png" style="width:100px; height:100px;">
                    </div>
                  <!-- <a href="#"> -->
                    <span>Business</span>
                  <!-- </a> -->
                </div>
            </div>
            <div class="col-md">
                <div class="card small_card">
                  <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/Student.png" style="width:100px; height:100px;">
                    </div>
                  <!-- <a href="#"> -->
                    <span>Student</span>
                  <!-- </a> -->
                </div>
            </div>
            <div class="col-md">
                <div class="card small_card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/Low_Interest.png" style="width:100px; height:100px;">
                    </div>
                  <!-- <a href="#"> -->
                    <span>Low Intrest</span>
                  <!-- </a> -->
                </div>
            </div>
            <div class="col-md">
                <div class="card small_card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/Secured.png" style="width:100px; height:100px;">
                    </div>
                  <!-- <a href="#"> -->
                    <span>Secured</span>
                  <!-- </a> -->
                </div>
            </div>
            <div class="col-md">
                <div class="card small_card">
                <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/PoorCredit.png" style="width:100px; height:100px;">
                    </div>
                  <!-- <a href="#"> -->
                    <span>Bad Credit</span>
                  <!-- </a> -->
                </div>
            </div>
                
        </div>
  </div> 

  <!-- TRENDING IN BANKSSS -->
  <section id="portfolio" class="">
      <div class="container">
          <header class="section-header pb-4">
            <h3 class="section-title font-weight-900">OUR BEST ADVICE</h3>
          </header>
          <div class="row" id="advice_data">

          </div>
      </div>
  </section>
  <!-- Thinking about creatir cards -->
  <div class="container py-5">
        <h3 class="border_bottom_golden">LATEST FROM BANKS BEST RATES</h3>
        <div id="related_articles">

        </div>     
  </div> 

<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/libs/creditProcess.js"></script>
<!-- <script src="<?php echo base_url()?>assets/libs/headerProcess.js"></script> -->
<script>
//  get_header_metadata("credit_overview");
 get_credit_advice_data();
 get_credit_overview_post();
</script>


        
  
