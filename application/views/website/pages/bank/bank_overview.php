
  
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
   
 
  <div class="">
        <div class="col-md-12 row px-0 mx-0">
            <div class="col-md-6 best_bank">
              <a href="<?php echo base_url()?>best_banks">
               <h2>Bank 100 Banks</h2>
              </a>
            </div>
            <div class="col-md-6 bank_review">
              <!-- <a href="<?php echo base_url()?>/best_bank_reviews"> -->
              <h2>Best Bank Reviews</h2>
            <!-- </a> -->
            </div>
        </div>
  </div>

  <!-- Card view -->

  <div class="container card_row">
        <div class=" pt-5 col-md-12 mx-auto row card_view">
            <div class="col-md-3">
                <div class="card">
                  <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Best-CD-Rates.png" style="width:100px; height:100px;">
                  </div>
                  <h6>Best CD<br/> Rates</h6>
                </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Best-Savings-Account-Rates.png" style="width:100px; height:100px;">
                  </div>
                  <h6>Best Saving<br/>Account Rates</h6>
                </div>
            </div>
            <div class="col-md-3">
              <div class="card">
                <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Best-Money-Market-Rates.png" style="width:100px; height:100px;">
                  </div>
                <!-- <a href="<?php echo base_url()?>best_money_market">  -->
                 <h6>Best Money Market <br/>Account Rates</h6>
                <!-- </a> -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                  <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Best-Checking-Rates.png" style="width:100px; height:100px;">
                  </div>
                  <h6>Best Checking<br/>Account Rates</h6>
                </div>
            </div>
        </div>
  </div> 

    <!--==========================
      About Us Section
    ============================-->
    <!-- <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>CHECK NEARBY BANKS</h3>
        </header>

        <div class="pt-3 col-md-12 mx-auto">

          <iframe src="https://createaclickablemap.com/map.php?&id=93525&maplocation=false&online=true" width="100%" height="525" style="border: none;"></iframe>
            <script>if (window.addEventListener){ window.addEventListener("message", function(event) { if(event.data.length >= 22) { if( event.data.substr(0, 22) == "__MM-LOCATION.REDIRECT") location = event.data.substr(22); } }, false); } else if (window.attachEvent){ window.attachEvent("message", function(event) { if( event.data.length >= 22) { if ( event.data.substr(0, 22) == "__MM-LOCATION.REDIRECT") location = event.data.substr(22); } }, false); } </script>

        </div>

      </div> 
    </section> -->
    <!-- <section id="">
      <div class="container">
        <header class="section-header  wow fadeInUp">
          <h3>Search Bank By State</h3>
          <p class="pb-0">
          <input type="text" class="col-md-6 mx-auto form-control" placeholder="Search by state name"/></p>
        </header>
      </div>
    </section> -->
    <!-- #about -->

<!-- TRENDING IN BANKSSS -->
<section id="portfolio">
      <header class="section-header pb-4">
          <h3 class="section-title">OUR BEST ADVICE</h3>
      </header>
      <div class="container">    
        <div class="row" id="advice_data">
        <!-- <?php if(count($page_data)>=1){
              foreach($page_data as $d){
                if($d->div_type == "trending_article"){?>
                     <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
                        <div class="portfolio-wrap">
                          <figure style="background-image:url('<?php echo base_url() . $d->image ?>');
                              background-size:cover;background-position:center">
                          </figure>
                          <a href="<?php echo base_url()?>bank/article_detail/<?php echo $d->id?>" >
                            <div class="portfolio-info">
                              <h4><?php echo $d->heading?></h4>
                              <div class="article_content"><?php echo $d->content?></div> 
                            </div>
                          </a>
                        </div>
                      </div>
               <?php }
              }
          }?> -->

        </div>
      </div>
</section>

  <!-- TRENDING IN BANKSSS -->
  <div class="container py-5">
        <h3 class="border_bottom_golden">LATEST FROM BANKS BEST RATES</h3>
        <div id="related_articles">
        </div>     
  </div> 

<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/libs/bankProcess.js"></script>
<script>
  get_banking_advice_data();
  get_banking_posts();
</script>

 