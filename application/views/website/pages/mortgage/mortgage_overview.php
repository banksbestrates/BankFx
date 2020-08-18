
  <!--==========================
    over view banner
  ============================-->
  <div class="overview_banner">
    <div class="banner_heading w-75">
        <?php if(count($page_data)>=1){
              foreach($page_data as $d){
                if($d->div_type == "overview_heading"){?>
                  <h1><?php echo $d->heading ?></h1>
                  <p><?php echo $d->content ?></p>
          <?php } 
          }
        }?>
    </div>
  </div>
 
  <!-- Card view -->
  <div class="container card_row pb-4">   
        <div class="pt-5 col-md-12  row card_view ">
              <div class="col-md-3">
                  <div class="card pb-3">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/mortgage/card_icon/mortgage_rates.png" style="width:100px; height:100px;">
                    </div>
                    <a href="<?php echo base_url()?>index.php/mortgage_rates"><h6> Mortgage Rates</h6></a>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="card pb-3">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/mortgage/card_icon/refinance_rate.png" style="width:100px; height:100px;">
                    </div>
                    <a href="<?php echo base_url()?>index.php/refinance_rates"><h6>Refinance Rates</h6></a>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="card pb-3">
                  <div style="width:100%; text-align:center">
                    <img src="<?php echo base_url();?>assets/images/website/mortgage/card_icon/mortgage_calculator.png" style="width:100px; height:100px;">
                  </div>
                  <a href="<?php echo base_url()?>index.php/mortgage_calculator_list"><h6>Mortgage Calculators</h6></a>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/mortgage/card_icon/house_afford.png" style="width:100px; height:100px;">
                    </div>
                  <a href="<?php echo base_url()?>index.php/house_afford"><h6>How much house you can afford ?</h6></a>
                  </div>
              </div>
        </div>
      </div>
  </div> 
  <!-- TRENDING IN BANKSSS -->
  <section id="portfolio" class="">
    <div class="container">
        <header class="section-header pb-4">
          <h3 class="section-title">WHAT IS TRENDING IN HOUSE BUYING</h3>
        </header>
        <div class="row portfolio-container">
            <?php if(count($page_data)>=1){
                foreach($page_data as $d){
                  if($d->div_type == "trending_article"){?>
                      <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                          <div class="portfolio-wrap">
                            <figure style="background-image:url('<?php echo base_url() . $d->image ?>');
                                background-size:cover;background-position:center">
                            </figure>
                            <div class="portfolio-info">
                              <h4><?php echo $d->heading?></h4>
                              <div class="article_content"><?php echo $d->content?></div>
                              
                            </div>
                          </div>
                        </div>
                <?php }
                }
            }?>
        </div>
    </div>
  </section>

  <!-- TRENDING IN BANKSSS -->
  <div class="container py-5">
        <h3 class="border_bottom_golden font-weight-900">LATEST FROM BANKS BEST RATES</h3>
        <div id="related_articles">

        </div>     
  </div> 
  
<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/libs/mortgageProcess.js"></script>
<script>
  get_mortgage_posts();
</script>