
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
        <div class="pt-5 col-md-12  row card_view ">
              <div class="col-md">
                  <div class="card pb-3">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/mortgage/card_icon/mortgage_rates.png" style="width:100px; height:100px;">
                    </div>
                    <a href="<?php echo base_url()?>mortgage_rates">
                      <h6> Mortgage Rates</h6>
                    </a>
                  </div>
              </div>
              <div class="col-md">
                  <div class="card pb-3">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/home_equity.png" style="width:100px; height:100px;">
                    </div>
                    <a href="<?php echo base_url()?>home_equity_rates">
                      <h6>Home Equity Rates</h6>
                    </a>
                  </div>
              </div>
              <div class="col-md">
                  <div class="card pb-3">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/mortgage/card_icon/refinance_rate.png" style="width:100px; height:100px;">
                    </div>
                    <a href="<?php echo base_url()?>mortgage_rates">
                     <h6>Refinance Rates</h6>
                    </a>
                  </div>
              </div>
              <div class="col-md">
                <div class="card pb-3">
                  <div style="width:100%; text-align:center">
                    <img src="<?php echo base_url();?>assets/images/website/mortgage/card_icon/mortgage_calculator.png" style="width:100px; height:100px;">
                  </div>
                  <a href="<?php echo base_url()?>mortgage_calculator">
                    <h6>Mortgage Calculator</h6>
                  </a>
                  </div>
              </div>
              <div class="col-md">
                  <div class="card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/mortgage/card_icon/house_afford.png" style="width:100px; height:100px;">
                    </div>
                  <!-- <a href="<?php echo base_url()?>index.php/house_afford"> -->
                  <h6>How much house <br/> you can afford ?</h6>
                <!-- </a> -->
                  </div>
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
            <!-- <?php if(count($page_data)>=1){
                foreach($page_data as $d){
                  if($d->div_type == "trending_article"){?>
                     
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <a href="<?php echo base_url()?>mortgage/article_detail/<?php echo $d->id?>" >
                          <div class="portfolio-wrap">
                            <figure style="background-image:url('<?php echo base_url() . $d->image ?>');
                                background-size:cover;background-position:center">
                            </figure>
                            <div class="portfolio-info">
                              <h4><?php echo $d->heading?></h4>
                              <div class="article_content"><?php echo $d->content?></div>
                              
                            </div>
                          </div>
                          </a>
                        </div>
                <?php }
                }
            }?> -->
        </div>
    </div>
  </section>


  <!-- TRENDING IN BANKSSS -->
  <div class="container py-5">
        <div class="row">
          <div class="col-md-10 pr-0">
            <div class="">
               <a href="https://track.flexlinkspro.com/a.ashx?foid=1188831.142317341.I4976662&foc=16&fot=9999&fos=1" rel="nofollow" target="_blank" alt="Leaderboard" title="SuperMoney - Home Improvement Loans" ><img border="0" src="https://content.flexlinks.com/sharedimages/products/142317341/4976662.jpg" style="max-width: 100%;" /></a><img src="https://track.flexlinkspro.com/i.ashx?foid=1188831.142317341&fot=9999&foc=16&fos=1" border="0" width="0" height="0" style="opacity: 0;"/>
            </div>
            <h3 class="border_bottom_golden pt-5 mb-0">LATEST FROM BANKS BEST RATES</h3>
            <div id="related_articles">
            </div> 
          </div>
          <div class="col-md-2 px-0">
              <a href="https://track.flexlinkspro.com/a.ashx?foid=1188831.138834576.I3114573&foc=16&fot=9999&fos=1" rel="nofollow" target="_blank" alt="Medium Rectangle" title="15% off Sitewide, valid 11/8-11/16" ><img border="0" src="https://content.flexlinks.com/sharedimages/products/138834576/3114573.jpg" style="max-width: 100%;" /></a><img src="https://track.flexlinkspro.com/i.ashx?foid=1188831.138834576&fot=9999&foc=16&fos=1" border="0" width="0" height="0" style="opacity: 0;"/>
          </div>       
        </div>   
  </div> 
  
<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/libs/mortgageProcess.js"></script>
<script>
  get_mortgage_advice_data();
  get_mortgage_posts();
</script>