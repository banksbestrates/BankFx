
  <!--==========================
    over view banner
  ============================-->
  <div class="overview_banner">
    <div class="banner_heading">
    <h1 class="display-4">Student Loans</h1>
    <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum dolorem hic<br/>
    Its just a dummy text to show the design only  dummy textx dummy</h6>
    </div>
  </div>
 
  <!-- Card view -->
  <div class="col-md-10 mx-auto card_row pb-4">    
        <div class="pt-5 col-md-12 mx-auto row card_view">
            <div class="col-md col-sm-4">
                <div class="card pb-2">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <a href="<?php echo base_url()?>index.php/mortgage_rates"><h6>Loan Calculator</h6></a>
                </div>
            </div>
            <div class="col-md col-sm-4">
            <div class="card pb-2">
                  <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <a href="<?php echo base_url()?>index.php/refinance_rates"><h6>Student Loan Rates</h6></a>
                </div>
            </div>
            <div class="col-md col-sm-4">
              <div class="card">
              <i class="fa fa-bar-chart" aria-hidden="true"></i>
              <a href="<?php echo base_url()?>index.php/mortgage_calculator_list"><h6 class="mb-2">Student Loan Refinancing</h6></a>
                </div>
            </div>
            <div class="col-md col-sm-4">
                <div class="card">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                <a href="<?php echo base_url()?>index.php/house_afford"><h6 class="mb-2">College Saving Calculator</h6></a>
                </div>
            </div>
            <div class="col-md col-sm-4">
                <div class="card pb-2">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                <a href="<?php echo base_url()?>index.php/house_afford"><h6>Lender Review</h6></a>
                </div>
            </div>
        </div>
  </div> 


 <!-- Content Related to Loans -->
 <?php if(count($page_data)>=1){
    foreach($page_data as $d){
    if($d->div_type == "normal_content"){?>
        <div class="col-md-10 mx-auto pt-5">
        <h3 class="border_bottom_golden font-weight-900"><?php echo $d->heading?></h3>
            <p class="text-align-justify"><?php echo $d->content?></p>
        </div>
    <?php }
    }
    }?><br/><br/>


