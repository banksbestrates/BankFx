
<style>
  .small_card{
    text-align: center;
    border: 1px solid #CB9D24;
    padding: 10px 10px 10px 10px!important;
    border-radius: 10px;
  }
  .small_card span{
    color:black;
    font-size:0.9rem;
    font-weight:bold;
  }
  </style>
  <!--==========================
    over view banner
  ============================-->
  <div class="overview_banner">
    <div class="banner_heading">
    <h1 class="display-4">Credit Card Overview</h1>
    <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum dolorem hic<br/>
    Its just a dummy text to show the design only  dummy textx dummy</h6>
    </div>
  </div>
 
  <!-- Card view -->

  <div class="col-md-11 mx-auto card_row pb-4">   
        <!-- row 1  -->
        <div class="pt-5 col-md-12 mx-auto row card_view">
            <div class="col-md">
                <div class="card small_card">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <a href="<?php echo base_url()?>index.php/best_credit_cards"><span>The Best Credit Cards</span></a>
                </div>
            </div>
            <div class="col-md">
                <div class="card small_card">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <a href="<?php echo base_url()?>index.php/compare_card"><span>Balance Transfer</span></a>
                </div>
            </div>
            <div class="col-md">
                <div class="card small_card">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <a href="<?php echo base_url()?>index.php/best_credit_cards"><span>Zero ARP</span></a>
                </div>
            </div>
            <div class="col-md">
                <div class="card small_card">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <a href="<?php echo base_url()?>index.php/best_credit_cards"><span>No Annual Fee</span></a>
                </div>
            </div>
            <div class="col-md">
                <div class="card small_card">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <a href="<?php echo base_url()?>index.php/best_credit_cards"><span>Rewards</span></a>
                </div>
            </div>
            <div class="col-md">
                <div class="card small_card">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <a href="<?php echo base_url()?>index.php/best_credit_cards"><span>Cash Back</span></a>
                </div>
            </div>   
        </div>
        <!-- row 2  -->
        <div class="pt-5 col-md-12 mx-auto row card_view">
            <div class="col-md">
                <div class="card small_card">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <a href="<?php echo base_url()?>index.php/best_credit_cards"><span>Travel</span></a>
                </div>
            </div>
            <div class="col-md">
                <div class="card small_card">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <a href="<?php echo base_url()?>index.php/best_credit_cards"><span>Business</span></a>
                </div>
            </div>
            <div class="col-md">
                <div class="card small_card">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <a href="<?php echo base_url()?>index.php/best_credit_cards"><span>Student</span></a>
                </div>
            </div>
            <div class="col-md">
                <div class="card small_card">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <a href="<?php echo base_url()?>index.php/best_credit_cards"><span>Low Intrest</span></a>
                </div>
            </div>
            <div class="col-md">
                <div class="card small_card">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <a href="<?php echo base_url()?>index.php/best_credit_cards"><span>Secured</span></a>
                </div>
            </div>
            <div class="col-md">
                <div class="card small_card">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <a href="<?php echo base_url()?>index.php/best_credit_cards"><span>Bad Credit</span></a>
                </div>
            </div>
                
        </div>
  </div> 

  <!-- TRENDING IN BANKSSS -->
<section id="portfolio" class="">
    <div class="container">
        <header class="section-header pb-4">
          <h3 class="section-title font-weight-900">READING ABOUT CREDIT CARDS</h3>
        </header>
        <div class="row portfolio-container" style="position: relative; height: 1080px;">
          <?php if(count($page_data)>=1){
              foreach($page_data as $d){
                if($d->div_type == "trending_article"){?>
                     <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" style="position: absolute; left: 0px; top: 0px; visibility: visible; animation-name: fadeInUp;">
                        <div class="portfolio-wrap">
                          <figure style="background-image:url('<?php echo base_url() . $d->image ?>');
                              background-size:100% 100%;background-position:center">
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
  <!-- Thinking about creatir cards -->
<div class="col-md-10 mx-auto px-0 py-5 ">
      <h3 class="border_bottom_golden font-weight-900">Thinking About Credit Cards</h3>
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


        
  
