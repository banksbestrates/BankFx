
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
                  <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    <a href="<?php echo base_url()?>index.php/mortgage_rates"><h6> Mortgage Rates</h6></a>
                  </div>
              </div>
              <div class="col-md-3">
              <div class="card pb-3">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    <a href="<?php echo base_url()?>index.php/refinance_rates"><h6>Refinance Rates</h6></a>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="card pb-3">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                <a href="<?php echo base_url()?>index.php/mortgage_calculator_list"><h6>Mortgage Calculators</h6></a>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="card">
                  <i class="fa fa-bar-chart" aria-hidden="true"></i>
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
        <div class="row portfolio-container" style="position: relative; height: 1080px;">
          <?php if(count($page_data)>=1){
              foreach($page_data as $d){
                if($d->div_type == "trending_article"){?>
                     <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" style="position: absolute; left: 0px; top: 0px; visibility: visible; animation-name: fadeInUp;">
                        <div class="portfolio-wrap">
                          <figure  style="background-image:url('<?php echo base_url() . $d->image ?>');" class="figure_image" >
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
  <!-- TRENDING IN BANKSSS -->
  <div class="container card_row">
        <header class="section-header">
          <h3>RELATED ARTICLES</h3>
        </header>
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
       
        <!-- <div class="pt-4 col-md-12 mx-auto row">
            <div class="col-md-6 related_image2">
            </div>
            <div class="col-md-6 related_content">
                <p>EDITOR'S PICK </p>
                <h4>BEST REFINANCE LENDERS</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi culpa atque eius qui 
                ducimus fuga iste necessitatibus voluptate reprehenderit? </p>
                  <div class="row">
                        <div class="col-md-1">
                          <i class="fa fa-arrow-circle-right"  aria-hidden="true"></i>
                        </div>
                        <div class="col-md-8 pt-2">6 MIN  </div>
                    </div>
            </div>
        </div>
        <div class="pt-4 col-md-12 mx-auto row">
            <div class="col-md-6 related_image3">
            </div>
            <div class="col-md-6 related_content">
                <p>EDITOR'S PICK </p>
                <h4>BEST REFINANCE LENDERS</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi culpa atque eius qui 
                ducimus fuga iste necessitatibus voluptate reprehenderit? </p>
                  <div class="row">
                        <div class="col-md-1">
                          <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                        </div>
                        <div class="col-md-8 pt-2">10 MIN  </div>
                    </div>
            </div>
        </div> -->
  </div> 
