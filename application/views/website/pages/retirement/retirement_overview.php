
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
<div class="container mx-auto card_row pb-4">    
  <div class="pt-5 col-md-12 row card_view">
            <div class="col-md col-sm-4">
                <div class="card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/retirement/card_icon/Retirement-Income-Calculator.png" style="width:100px; height:100px;">
                    </div>
                  <!-- <a href="<?php echo base_url()?>index.php/personal_loan"> -->
                  <h6>Retirement Income Calculator</h6>
                <!-- </a> -->
                </div>
            </div>
            <div class="col-md col-sm-4">
            <div class="card">
                <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/retirement/card_icon/Best-Savings-Account-Rates.png" style="width:100px; height:100px;">
                  </div>
                  <!-- <a href="<?php echo base_url()?>index.php/personal_loan"> -->
                  <h6>Best Savings Account Rates</h6>
                <!-- </a> -->
                </div>
            </div>
            <div class="col-md col-sm-4">
              <div class="card pb-3">
                <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/retirement/card_icon/401K-Calculator.png" style="width:100px; height:100px;">
                  </div>
              <!-- <a href="<?php echo base_url()?>index.php/auto_loan"> -->
              <h6>401k Calculator</h6>
            <!-- </a> -->
                </div>
            </div>
            <div class="col-md col-sm-4">
                <div class="card">
                  <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/retirement/card_icon/Social-Security-Calculator.png" style="width:100px; height:100px;">
                    </div>
                <!-- <a href="<?php echo base_url()?>index.php/student_loan"> -->
                <h6>Social Security Calculator</h6>
              <!-- </a> -->
                </div>
            </div>
            <div class="col-md col-sm-4">
                <div class="card pb-3">
                  <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/retirement/card_icon/Best-Retirement-Plans.png" style="width:100px; height:100px;">
                    </div>
                <!-- <a href="<?php echo base_url()?>index.php/student_loan"> -->
                <h6>Best Retirement Plans</h6>
              <!-- </a> -->
                </div>
            </div>
  </div>
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

<!-- Content Related to Loans -->
<div class="container py-5">
        <div class="row">
          <div class="col-md-10 pr-0">
            <div class="">
            <a href="https://track.flexlinkspro.com/a.ashx?foid=1188831.139606676.I3558593&foc=16&fot=9999&fos=1" rel="nofollow" target="_blank" alt="600x120" title="Blue Trust Loans (Seasonal Temp) 600X120" ><img border="0" src="https://content.flexlinks.com/sharedimages/products/139606676/3558593.jpg" style="max-width: 100%;" /></a><img src="https://track.flexlinkspro.com/i.ashx?foid=1188831.139606676&fot=9999&foc=16&fos=1" border="0" width="0" height="0" style="opacity: 0;"/>
            </div>
            <h3 class="border_bottom_golden pt-5 mb-0">LATEST FROM BANKS BEST RATES</h3>
            <div id="related_articles">
            </div> 
          </div>
          <div class="col-md-2 px-0">
          <a href="https://track.flexlinkspro.com/a.ashx?foid=1188831.139608160.I3560077&foc=16&fot=9999&fos=1" rel="nofollow" target="_blank" alt="Medium Rectangle" title="BlueTrust 300x250" ><img border="0" src="https://content.flexlinks.com/sharedimages/products/139608160/3560077.jpg" style="max-width: 100%;" /></a><img src="https://track.flexlinkspro.com/i.ashx?foid=1188831.139608160&fot=9999&foc=16&fos=1" border="0" width="0" height="0" style="opacity: 0;"/>
          </div>       
        </div>   
  </div> 

<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/libs/retirementProcess.js"></script>
<script>
  get_retirement_advice_data();
  get_retirement_posts();
</script>