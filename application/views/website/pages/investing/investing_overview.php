
<!--==========================
  over view banner
============================-->
<div class="overview_banner">
    <div class="banner_heading w-75 text-justify">
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
                <img src="<?php echo base_url();?>assets/images/website/investing/card_icon/best_invest.png" style="width:100px; height:100px;">
            </div>
            <a href="<?php echo base_url()?>best_investment"><h6>Best Investments</h6></a>
          </div>
      </div>
      <div class="col-md col-sm-4">
        <div class="card pb-2">
          <div style="width:100%; text-align:center">
              <img src="<?php echo base_url();?>assets/images/website/investing/card_icon/Reviews.png" style="width:100px; height:100px;">
          </div>
          <a href="<?php echo base_url()?>brokerage_overview"><h6>Brokerage Reviews</h6></a>
          </div>
      </div>
      <div class="col-md col-sm-4">
              <div class="card pb-2">
              <div style="width:100%; text-align:center">
                <img src="<?php echo base_url();?>assets/images/website/investing/card_icon/Calculator.png" style="width:100px; height:100px;">
              </div>
              <a href="#"><h6>Annuity Calculator</h6></a>
            </div>
      </div>
      <div class="col-md col-sm-4">
        <div class="card pb-2">
          <div style="width:100%; text-align:center">
            <img src="<?php echo base_url();?>assets/images/website/investing/card_icon/Best-Online-Brokers.png" style="width:100px; height:100px;">
          </div>
          <a href="<?php echo base_url()?>best_online_brokerage"><h6>Best Online Brokers </h6></a>
        </div>
      </div>
      <div class="col-md col-sm-4">
          <div class="card">
          <div style="width:100%; text-align:center">
            <img src="<?php echo base_url();?>assets/images/website/investing/card_icon/Brokers-for-Beginners.png" style="width:100px; height:100px;">
          </div>
          <a href="<?php echo base_url()?>best_beginner_broker"><h6 class="mb-2">Best Brokers For Beginners</h6></a>
      </div>
      </div>
  </div>
</div> 

<!-- TRENDING IN BANKSSS -->
<section id="portfolio" class="">
    <div class="container">
        <header class="section-header pb-4">
          <h3 class="section-title">INVESTING 101</h3>
        </header>
        <div class="row portfolio-container" style="position: relative; height: 1080px;">
            <?php if(count($page_data)>=1){
                  foreach($page_data as $d){
                    if($d->div_type == "trending_article"){?>
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" style="position: absolute; left: 0px; top: 0px; visibility: visible; animation-name: fadeInUp;">
                            <div class="portfolio-wrap">
                              <figure style="background-image:url('<?php echo base_url() . $d->image ?>');
                                  " class="figure_image">
                              </figure>
                              <div class="portfolio-info">
                                <h4><?php echo $d->heading?></h4>
                                <p><?php echo $d->content?> 
                                </p>
                              </div>
                            </div>
                          </div>
                  <?php }
                  }
              }?>
        </div>
    </div>
</section>

<!-- Content Related to Loans -->
<div class="container px-0 py-5 ">
       <h3 class="border_bottom_golden font-weight-900">Content Related to Investment</h3>
        <?php if(count($page_data)>=1){
          foreach($page_data as $d){
            if($d->div_type == "related_article"){?>
                <div class="col-md-12 mx-auto row px-0">
                  <div class="col-md-6 related_image" style="background-image:url('<?php echo base_url() . $d->image ?>')">
                  </div>
                  <div class="col-md-6 related_content">
                      <p class="mb-2">EDITOR'S PICK </p>
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

