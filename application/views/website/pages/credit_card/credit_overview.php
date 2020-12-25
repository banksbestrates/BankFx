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
        <!-- row 1  -->
        <div class="pt-5 col-md-12 mx-auto row card_view">
            <div class="col-md mb-3">
                <div class="card small_card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/best_credit.png" style="width:100px; height:100px;">
                    </div>
                    <a href="<?php echo base_url()?>best_credit_cards">
                      <span>Best Credit Cards</span>
                    </a>
                </div>
            </div>
            <div class="col-md mb-3">
                <div class="card small_card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/balance_transfer.png" style="width:100px; height:100px;">
                    </div>
                  <a href="<?php echo base_url()?>balance_transfer">
                    <span>Balance Transfer</span>
                  </a>
                </div>
            </div>
            <div class="col-md mb-3">
                <div class="card small_card">
                   <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/CashBack.png" style="width:100px; height:100px;">
                    </div>
                    <a href="<?php echo base_url()?>cash_back">
                      <span>Cash Back</span>
                    </a>
                </div>
            </div>  
            <div class="col-md mb-3">
                <div class="card small_card">
                <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/PoorCredit.png" style="width:100px; height:100px;">
                    </div>
                    <a href="<?php echo base_url()?>bad_credit">
                    <span>Bad Credit</span>
                    </a>
                </div>
            </div> 
            <div class="col-md mb-3">
                <div class="card small_card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/Low_Interest.png" style="width:100px; height:100px;">
                    </div>
                    <a href="<?php echo base_url()?>low_interest">
                    <span>Low Interest</span>
                    </a>
                </div>
            </div>
            <div class="col-md mb-3">
                <div class="card small_card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/no_annual_fee.png" style="width:100px; height:100px;">
                    </div>
                    <a href="<?php echo base_url()?>no_annual_fee">
                    <span>No Annual Fee</span>
                    </a>
                </div>
            </div>
            <!-- <div class="col-md mb-3">
                <div class="card small_card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/zero.png" style="width:100px; height:100px;">
                    </div>          
                    <span>Zero ARP</span>   
                </div>
            </div> -->
            <!-- <div class="col-md mb-3">
                <div class="card small_card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/no_annual_fee.png" style="width:100px; height:100px;">
                    </div>
                  <a href="#">
                    <span>No Annual Fee</span>
                  </a>
                </div>
            </div> -->
            <!-- <div class="col-md mb-3">
                <div class="card small_card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/rewards.png" style="width:100px; height:100px;">
                    </div>
                  <a href="#">
                    <span>Rewards</span>
                  </a>
                </div>
            </div>
            -->
        </div>
        <!-- row 2  -->
        <!-- <div class="pt-5 col-md-12 mx-auto row card_view">
            <div class="col-md mb-3">
                <div class="card small_card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/Travel.png" style="width:100px; height:100px;">
                    </div>
                    <span>Travel</span>
                </div>
            </div>
            <div class="col-md  mb-3">
                <div class="card small_card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/Business.png" style="width:100px; height:100px;">
                    </div>
                    <span>Business</span>
                </div>
            </div>
            <div class="col-md mb-3">
                <div class="card small_card">
                  <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/Student.png" style="width:100px; height:100px;">
                    </div>
                    <span>Student</span>
                </div>
            </div>
            <div class="col-md mb-3">
                <div class="card small_card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/Low_Interest.png" style="width:100px; height:100px;">
                    </div>
                    <span>Low Intrest</span>
                </div>
            </div>
            <div class="col-md mb-3">
                <div class="card small_card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/credit/card_icon/Secured.png" style="width:100px; height:100px;">
                    </div>
                    <span>Secured</span>
                </div>
            </div>
            
        </div> -->
  </div> 

  <!-- TRENDING IN BANKSSS -->
  <section id="portfolio" class="">
      <div class="container">
          <header class="section-header pb-4">
            <?php if(count($page_data)>=1){
              foreach($page_data as $d){
                if($d->div_type == "advice_heading"){?>
                    <h3 class="section-title"><?php echo $d->heading ?></h3>
              <?php } 
              }
            }?>
          </header>
          <div class="row" id="advice_data">

          </div>
      </div>
  </section>
  <!-- Thinking about creatir cards -->
  <div class="container pt-5">
        <div class="row">
          <div class="col-md-9">
            <div class="">
            <a href="https://track.flexlinkspro.com/a.ashx?foid=1188831.143797753.I5704804&foc=16&fot=9999&fos=1" rel="nofollow" target="_blank" alt="Leaderboard" title="Logo, Description, CTA 728x90" ><img border="0" src="https://content.flexlinks.com/sharedimages/products/143797753/5704804.png" style="max-width: 100%;" /></a><img src="https://track.flexlinkspro.com/i.ashx?foid=1188831.143797753&fot=9999&foc=16&fos=1" border="0" width="0" height="0" style="opacity: 0;"/>
            </div>
          </div>
          <div class="col-md-3">
          <a href="https://track.flexlinkspro.com/a.ashx?foid=1188831.139608036.I3559953&foc=16&fot=9999&fos=1" rel="nofollow" target="_blank" alt="Medium Rectangle" title="Blue Trust Loans Coupon Style Banner" ><img border="0" src="https://content.flexlinks.com/sharedimages/products/139608036/3559953.jpg" style="max-width: 100%;" /></a><img src="https://track.flexlinkspro.com/i.ashx?foid=1188831.139608036&fot=9999&foc=16&fos=1" border="0" width="0" height="0" style="opacity: 0;"/>
          </div>       
        </div>   
  </div> 

  
  <div class="container" id="related_articles">
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


        
  
