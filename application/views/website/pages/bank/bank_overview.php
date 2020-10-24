
  
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
   
 
  <div class="">
        <div class="col-md-12 row px-0 mx-0">
            <div class="col-md-6 best_bank">
              <a href="<?php echo base_url()?>best_banks">
               <h2>Best 100 Banks</h2>
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
          <?php if(count($page_data)>=1){
            foreach($page_data as $d){
              if($d->div_type == "advice_heading"){?>
                  <h3 class="section-title"><?php echo $d->heading ?></h3>
            <?php } 
            }
          }?>
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
    <!-- map view -->
    <div class="container mt-5">
          <!-- <header class="section-header pt-5">
            <h3>CHECK NEARBY BANKS</h3>
          </header> -->
          <div class="col-md-12 px-0 us_map_view">
          <div class=" py-3 map_search_bar px-3" style="background-color:black;color:white"> 
            <div class="row">
                <div class="col-md-9 pt-2">CHOOSE YOUR STATE  TO FIND BANKS NEAR YOU</div>
                <!-- <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" id="zipcode" class="form-control bg-white" placeholder="Enter Zip Code" style="font-size:12px">
                        <div class="input-group-append" onclick="serch_by_zip()">                   
                            <button class="btn"> <i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div> -->
            </div>
          </div>
            <iframe src="https://createaclickablemap.com/map.php?&id=96221&maplocation=false&online=true" width="100%" height="650" style="border: none;"></iframe>
            <script>if (window.addEventListener){ window.addEventListener("message", function(event) { if(event.data.length >= 22) { if( event.data.substr(0, 22) == "__MM-LOCATION.REDIRECT") location = event.data.substr(22); } }, false); } else if (window.attachEvent){ window.attachEvent("message", function(event) { if( event.data.length >= 22) { if ( event.data.substr(0, 22) == "__MM-LOCATION.REDIRECT") location = event.data.substr(22); } }, false); } </script>
          </div>
      </div> 

  <!-- TRENDING IN BANKSSS -->
  <div class="container py-5">
        <div class="row">
          <div class="col-md-10 pr-0">
            <div class="">
                <a href="https://track.flexlinkspro.com/a.ashx?foid=1188831.141693140.I4669355&foc=16&fot=9999&fos=1" rel="nofollow" target="_blank" alt="Leaderboard" title="CIT is proud to announce a new Money Market Account with .60% APY!  With this account, customers can earn a higher rate than at traditional banks and access their money easily. With a low-minimum opening deposit of $100, it's an ideal online account for building an emergency fund or saving for a large purchase. (728x90)" ><img border="0" src="https://content.flexlinks.com/sharedimages/products/141693140/4669355.jpg" style="max-width: 100%;" /></a><img src="https://track.flexlinkspro.com/i.ashx?foid=1188831.141693140&fot=9999&foc=16&fos=1" border="0" width="0" height="0" style="opacity: 0;"/>
            </div>
            <h3 class="border_bottom_golden pt-5 mb-0">LATEST FROM BANKS BEST RATES</h3>
              <div id="related_articles">
            </div> 
          </div>
          <div class="col-md-2 px-0">
          <a href="https://track.flexlinkspro.com/a.ashx?foid=1188831.139191768.I3284153&foc=16&fot=9999&fos=1" rel="nofollow" target="_blank" alt="Medium Rectangle" title="Emergency No Cash banner 300x250 (300x250)" ><img border="0" src="https://content.flexlinks.com/sharedimages/products/139191768/3284153.jpg" style="max-width: 100%;" /></a><img src="https://track.flexlinkspro.com/i.ashx?foid=1188831.139191768&fot=9999&foc=16&fos=1" border="0" width="0" height="0" style="opacity: 0;"/>
          </div>       
        </div>   
  </div> 

<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/libs/bankProcess.js"></script>
<script>
  get_banking_advice_data();
  get_banking_posts();
</script>

 