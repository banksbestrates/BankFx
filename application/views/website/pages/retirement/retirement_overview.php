
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
              <h6>41k Calculator</h6>
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
          <h3 class="section-title">RETIREMENT 101</h3>
        </header>
        <div class="row portfolio-container">
          <?php if(count($page_data)>=1){
              foreach($page_data as $d){
                if($d->div_type == "trending_article"){?>
                     <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
                      <a href="<?php echo base_url()?>retirement/article_detail/<?php echo $d->id?>" >
                        <div class="portfolio-wrap">
                          <figure style="background-image:url('<?php echo base_url() . $d->image ?>');" class="figure_image">
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
          }?>
        </div>
    </div>
</section>

 <!-- Content Related to Loans -->
 <!-- <div class="container py-5 ">
       <h3 class="border_bottom_golden font-weight-900">Related Articles</h3>
        <?php if(count($page_data)>=1){
              foreach($page_data as $d){
                if($d->div_type == "related_article"){?>
                    <div class="pt-4 col-md-12 mx-auto row">
                        <div class="col-md-6 related_image" style="background-image:url('<?php echo base_url() . $d->image ?>')">
                        </div>
                        <div class="col-md-6 related_content">
                            <p class="mb-2">EDITOR'S PICK </p>
                            <h4><?php echo $d->heading?> </h4>
                            <p><?php echo $d->content?></p>
                              <div class="row">
                                    <div class="col-md-1">
                                      <i class="fa fa-arrow-circle-right"  aria-hidden="true"></i>
                                    </div>
                                    <div class="col-md-8 pt-2"> 6 MIN </div>
                                </div>
                        </div>
                    </div>
               <?php }
              }
          }?>
      
    
</div> -->

<div class="container py-5">
        <h3 class="border_bottom_golden">LATEST FROM BANKS BEST RATES</h3>
        <div id="related_articles">
        </div>     
</div> 

<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/libs/retirementProcess.js"></script>
<script>
  get_retirement_posts();
</script>
