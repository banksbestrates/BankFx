
  
  <style>
  .overview_banner{
        background: 
        linear-gradient(
        rgba(0, 0, 0, 0.6),
        rgba(0, 0, 0, 0.6)
        ),
        url(<?php echo base_url()?>assets/img/plant.jpg);
    background-size: cover;
    width: 100%;
    height: 300px;
    /* margin: 10px 0 0 10px; */
    position: relative;
    float: left;
  }
  .banner_heading{
    margin: 0;
    position: absolute;
    top: 30%;
    left: 10%;
  }
  .banner_heading h1{
    font-weight: 900!important;
    color: black!important;
  }
 
  .best_bank{
    height:130px;
    background: 
        linear-gradient(
        rgba(0, 0, 0, 0.6),
        rgba(0, 0, 0, 0.6)
        ),
        url(<?php echo base_url()?>assets/img/bank_best.jpg);
    background-size: cover;
    width: 130%;
    position: relative;
    float: left;
  }
  .bank_review{
    height:130px;
    background: 
        linear-gradient(
        rgba(0, 0, 0, 0.6),
        rgba(0, 0, 0, 0.6)
        ),
        url(<?php echo base_url()?>assets/img/bank_best.jpg);
    background-size: cover;
    width: 130%;
    position: relative;
    float: left;
  }
  .card_view .card{
    text-align: center;
    border: 1px solid #ecda53;
    padding: 20px 30px 0px 30px;
    border-radius: 10px;
  }
  .card_view .fa{
    font-size:60px;
    color:#ecda53;
    padding-bottom:20px;
  }
  .card_row{
    padding-top:80px;
    
  }
  .portfolio img{
    width:100%;
    height:100%!important;
  }
  #portfolio{
    padding:60px 0 0 0;
  }
  </style>
  <!--==========================
    over view banner
  ============================-->
  <div class="overview_banner">
    <div class="banner_heading">
    <h1 class="display-4">Banking Overview</h1>
    <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum dolorem hic<br/>
    Its just a dummy text to show the design only  dummy textx dummy</h6>
    </div>
  </div>
 
  <div class="row bank_top_view">
    <div class="col-md-6 best_bank"></div>
    <div class="col-md-6 bank_review"></div>
  </div>

  <!-- Card view -->

  <div class="col-md-10 mx-auto card_row">
        <header class="section-header">
          <h3>BEST BANK ACCOUNT RATES</h3>
        </header>
        <div class="pt-3 col-md-12 mx-auto row card_view">
            <div class="col-md-3">
                <div class="card">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <h6>Best CD<br/>Rates</h6>
                </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                  <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <h6>Best Saving<br/>Account Rates</h6>
                </div>
            </div>
            <div class="col-md-3">
              <div class="card">
              <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <h6>Best Money Market <br/>Account Rates</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <h6>Best Checking<br/>Account Rates</h6>
                </div>
            </div>
        </div>
  </div> 

  <!-- TRENDING IN BANKSSS -->
<section id="portfolio" class="section-bg">
    <div class="container">
        <header class="section-header pb-4">
          <h3 class="section-title">WHAT'S TRENDING IN BANKS</h3>
        </header>
        <div class="row portfolio-container" style="position: relative; height: 1080px;">
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" style="position: absolute; left: 0px; top: 0px; visibility: visible; animation-name: fadeInUp;">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo base_url()?>assets/img/portfolio/app1.jpg" class="img-fluid" alt="">
              </figure>

              <div class="portfolio-info">
                <h4>TRAVEL</h4>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate, 
                deserunt maxime commodi numquam nobis consequuntur beatae provident 
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s" style="position: absolute; left: 380px; top: 0px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo base_url()?>assets/img/portfolio/web3.jpg" class="img-fluid" alt="">
              </figure>

              <div class="portfolio-info">
                <h4>SPENDING</h4>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate, 
                deserunt maxime commodi numquam nobis consequuntur beatae provident 
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s" style="position: absolute; left: 760px; top: 0px; visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo base_url()?>assets/img/portfolio/app2.jpg" class="img-fluid" alt="">
              </figure>

              <div class="portfolio-info">
              <h4>LOAN</h4>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate, 
                deserunt maxime commodi numquam nobis consequuntur beatae provident 
                </p>
              </div>
            </div>
            </div>
        </div>
    </div>
</section>
  <!-- TRENDING IN BANKSSS -->
  <div class="col-md-10 mx-auto card_row">
        <header class="section-header">
          <h3>BEST BANK ACCOUNT RATES</h3>
        </header>
        <div class="pt-3 col-md-12 mx-auto row card_view">
            <div class="col-md-3">
                <div class="card">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <h6>Best CD<br/>Rates</h6>
                </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                  <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <h6>Best Saving<br/>Account Rates</h6>
                </div>
            </div>
            <div class="col-md-3">
              <div class="card">
              <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <h6>Best Money Market <br/>Account Rates</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <h6>Best Checking<br/>Account Rates</h6>
                </div>
            </div>
        </div>
  </div> 
   

 



