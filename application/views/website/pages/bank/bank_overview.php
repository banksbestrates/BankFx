
  
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
  <div class="container card_row">
        <div class=" pt-5 col-md-12 mx-auto row card_view">
            <div class="col-md mb-3">
              <a href="<?php echo base_url()?>best_banks">  
                <div class="card">
                  <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Bank-Name.png" style="width:100px; height:100px;">
                  </div>                       
                    <h6>Top Financial<br/>Centers</h6>
                </div>
              </a>
            </div>
            <div class="col-md mb-3">
              <a href="<?php echo base_url()?>best_banks">  
                <div class="card">
                  <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Address-Location.png" style="width:100px; height:100px;">
                  </div>
                  <h6>Bank Branch<br/>Locator</h6>
                </div>
              </a>
            </div>
            <div class="col-md mb-3">
              <a href="<?php echo base_url()?>best_bank_reviews">   
                  <div class="card">
                    <div style="width:100%; text-align:center">
                        <img src="<?php echo base_url();?>assets/images/website/loan/card_icon/lender_review.png" style="width:100px; height:100px;">
                    </div>              
                    <h6>Financial Center<br/>Reviews</h6>     
                  </div>
                </a>
            </div>
            <div class="col-md mb-3">
              <a href="<?php echo base_url()?>best_cd_rates"> 
                <div class="card">
                  <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Best-CD-Rates.png" style="width:100px; height:100px;">
                  </div>                  
                  <h6>Best CD<br/>Rates</h6>
                </div>
              </a>

            </div>
            <div class="col-md mb-3">
                <div class="card">
                  <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Best-Savings-Account-Rates.png" style="width:100px; height:100px;">
                  </div>                
                  <h6>Best Savings<br/>Account Rates</h6>
                </div>
            </div>
            <div class="col-md mb-3">
                <div class="card">
                  <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Best-Money-Market-Rates.png" style="width:100px; height:100px;">
                  </div>                 
                  <h6>Best Money<br/>Market Rates</h6>
                </div>
            </div>
        </div>
  </div> 

    <!-- map view -->
    <div class="container">
          <div class="col-md-12 px-0 us_map_view">
          <div class=" py-3 map_search_bar px-3" style="background-color:black;color:white"> 
            <div class="row">
                <div class="col-md-9 pt-2">CHOOSE YOUR STATE  TO FIND BANKS NEAR YOU</div>
            </div>
          </div>
            <iframe src="https://createaclickablemap.com/map.php?&id=96221&maplocation=false&online=true" width="100%" height="650" style="border: none;"></iframe>
            <script>if (window.addEventListener){ window.addEventListener("message", function(event) { if(event.data.length >= 22) { if( event.data.substr(0, 22) == "__MM-LOCATION.REDIRECT") location = event.data.substr(22); } }, false); } else if (window.attachEvent){ window.attachEvent("message", function(event) { if( event.data.length >= 22) { if ( event.data.substr(0, 22) == "__MM-LOCATION.REDIRECT") location = event.data.substr(22); } }, false); } </script>
          </div>
      </div> 

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


  <!-- TRENDING IN BANKSSS -->
  <div class="container pt-5">
        <div class="row">
          <div class="col-md-9">
                <a href="https://track.flexlinkspro.com/a.ashx?foid=1188831.141693140.I4669355&foc=16&fot=9999&fos=1" rel="nofollow" target="_blank" alt="Leaderboard" title="CIT is proud to announce a new Money Market Account with .60% APY!  With this account, customers can earn a higher rate than at traditional banks and access their money easily. With a low-minimum opening deposit of $100, it's an ideal online account for building an emergency fund or saving for a large purchase. (728x90)" ><img border="0" src="https://content.flexlinks.com/sharedimages/products/141693140/4669355.jpg" style="max-width: 100%;" /></a>
                <img src="https://track.flexlinkspro.com/i.ashx?foid=1188831.141693140&fot=9999&foc=16&fos=1" border="0" width="0" height="0" style="opacity: 0;"/>
          </div>
          <div class="col-md-3">
              <a href="https://track.flexlinkspro.com/a.ashx?foid=1188831.139191768.I3284153&foc=16&fot=9999&fos=1" rel="nofollow" target="_blank" alt="Medium Rectangle" title="Emergency No Cash banner 300x250 (300x250)" ><img border="0" src="https://content.flexlinks.com/sharedimages/products/139191768/3284153.jpg" style="max-width: 300px;" /></a>
              <img src="https://track.flexlinkspro.com/i.ashx?foid=1188831.139191768&fot=9999&foc=16&fos=1" border="0" width="0" height="0" style="opacity: 0;"/>
          </div>       
        </div>   
  </div> 

  <div class="container" id="related_articles">
  </div>

<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/libs/bankProcess.js"></script>
<script>
  get_banking_advice_data();
  get_banking_posts();
</script>

 