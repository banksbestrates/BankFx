  <!--==========================
    over view banner
  ============================-->
  <div class="overview_banner">
    <div class="banner_heading">
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

  <div class="">
        <div class="col-md-12 row px-0 mx-0">
            <div class="col-md-6 best_bank">
              <a href="<?php echo base_url()?>best_banks"><h2>Bank 100 Banks</h2></a>
            </div>
            <div class="col-md-6 bank_review">
              <a href="<?php echo base_url()?>/best_bank_reviews"><h2>Best Bank Reviews</h2></a>
            </div>
        </div>
  </div>

<!-- Card view -->
<div class="container pl-0 mx-auto">
        <div class="pt-5 col-md-12 mx-auto row card_view">
            <div class="col-md-3">
                <div class="card">
                  <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Best-Large-Banks.png" style="width:100px; height:100px;">
                  </div>
                  <h6>Best Larg Banks</h6>
                </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Best-Online_Banks.png" style="width:100px; height:100px;">
                  </div>
                  <h6>Best Online Bnaks</h6>
                </div>
            </div>
            <div class="col-md-3">
              <div class="card">
              <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Best-Credit_Unions.png" style="width:100px; height:100px;">
                  </div>
                  <h6>Best Credit Unions</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Best-Regional-Banks.png" style="width:100px; height:100px;">
                  </div>
                  <h6>Best Regional Banks</h6>
                </div>
            </div>
        </div>
</div> 

<div class="container py-5 ">
        <div class="row mx-2">
            <div class="col-md-9 table-responsive">
                <h3 class="border_bottom_golden mb-0">Best 100 Banks</h3>
                <table class="table text-center">
                    <thead>
                            <tr class="background_light_grey">
                                <th>Bank</th>
                                <th>Rating</th>             
                                <th>FDIC</th>
                                <th></th>
                            </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>
                                    <div  class="w-75">
                                        <img src="<?php echo base_url()?>assets/img/bank_images/bank_of_america.png">
                                    </div>
                                </td>
                                <td>
                                    <div class="responsive_inline">
                                        <span class="fa fa-star  checked"></span>
                                        <span class="fa fa-star  checked"></span>
                                        <span class="fa fa-star  checked"></span>
                                        <span class="fa fa-star  checked"></span>
                                        <span class="fa fa-star  checked"></span>
                                    </div>
                                </td>
                                <td>
                                    <span>#123456</span>
                                </td>
                                <td>
                                    <a href="<?php echo base_url()?>branch_locator">
                                    <h4><button class="btn button_blue btn-sm px-5">FULL REVIEW</button></h4></a>
                                </td>              
                            </tr>       
                            <tr>
                                <td>
                                    <div  class="w-75">
                                        <img src="<?php echo base_url()?>assets/img/bank_images/bank_of_america.png">
                                    </div>
                                </td>
                                <td>
                                    <div class="responsive_inline">
                                        <span class="fa fa-star  checked"></span>
                                        <span class="fa fa-star  checked"></span>
                                        <span class="fa fa-star  checked"></span>
                                        <span class="fa fa-star  checked"></span>
                                        <span class="fa fa-star  checked"></span>
                                    </div>
                                </td>
                                <td>
                                    <span>#123456</span>
                                </td>
                                <td>
                                    <a href="<?php echo base_url()?>branch_locator">
                                    <h4><button class="btn button_blue btn-sm px-5">FULL REVIEW</button></h4></a>
                                </td>              
                            </tr>       
                            <tr>
                                <td>
                                    <div  class="w-75">
                                        <img src="<?php echo base_url()?>assets/img/bank_images/bank_of_america.png">
                                    </div>
                                </td>
                                <td>
                                    <div class="responsive_inline">
                                        <span class="fa fa-star  checked"></span>
                                        <span class="fa fa-star  checked"></span>
                                        <span class="fa fa-star  checked"></span>
                                        <span class="fa fa-star  checked"></span>
                                        <span class="fa fa-star  checked"></span>
                                    </div>
                                </td>
                                <td>
                                    <span>#123456</span>
                                </td>
                                <td>
                                    <a href="<?php echo base_url()?>branch_locator">
                                    <h4><button class="btn button_blue btn-sm px-5">FULL REVIEW</button></h4></a>
                                </td>              
                            </tr>       
                            <tr>
                                <td>
                                    <div  class="w-75">
                                        <img src="<?php echo base_url()?>assets/img/bank_images/bank_of_america.png">
                                    </div>
                                </td>
                                <td>
                                    <div class="responsive_inline">
                                        <span class="fa fa-star  checked"></span>
                                        <span class="fa fa-star  checked"></span>
                                        <span class="fa fa-star  checked"></span>
                                        <span class="fa fa-star  checked"></span>
                                        <span class="fa fa-star  checked"></span>
                                    </div>
                                </td>
                                <td>
                                    <span>#123456</span>
                                </td>
                                <td>
                                    <a href="<?php echo base_url()?>branch_locator">
                                    <h4><button class="btn button_blue btn-sm px-5">FULL REVIEW</button></h4></a>
                                </td>              
                            </tr>       
                    </tbody>  
                </table>   
                <p>This line can  be used to  as a desclaimer fo the user ,so that user will be upto date dummy data etc </p>   
            </div>
            <div class="col-md-3"></div>
        </div>
</div>
 

   

 



