  <!--==========================
    over view banner
  ============================-->
  <!-- <?php print_r($data['Returned']);?> -->
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
              <a href="<?php echo base_url()?>best_banks"><h2>Bank 100 Banks</h2></a>
            </div>
            <div class="col-md-6 bank_review">
              <!-- <a href="<?php echo base_url()?>/best_bank_reviews"> -->
              <h2>Best Bank Reviews</h2>
              <!-- </a> -->
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
            <div class="col-md-10 table-responsive">
                <h3 class="border_bottom_golden mb-0">Best 100 Banks</h3>
                <table class="table text-center">
                    <thead>
                            <tr class="background_light_grey">
                                <th class="text-left">Bank Name</th>
                                <th>Rating</th>             
                                <th>AssetSize</th>
                                <!-- <th></th> -->
                            </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['Returned'] as $list){ ?>
                            <tr>
                                <td class="text-left"><div><?php echo $list['BankName']?>  <!-- <img src="<?php echo base_url()?>assets/img/bank_images/bank_of_america.png"> --></div></td>
                                <td class="w-25">
                                    <div class="responsive_inline">
                                            <span class="fa fa-star  checked"></span>
                                            <span class="fa fa-star  checked"></span>
                                            <span class="fa fa-star  checked"></span>
                                            <span class="fa fa-star  checked"></span>
                                            <span class="fa fa-star  checked"></span>
                                            <span class="fa fa-star  checked"></span>
                                        </div>
                                </td>
                                <td class="w-25"><span><?php echo $list['AssetSize']?></span></td>
                                <!-- <td><h4><button class="btn button_blue btn-sm px-3">FULL REVIEW</button></h4></td>  -->
                            </tr>   
                        <?php  } ?>
                    </tbody>  
                </table>   
                <!-- <p>This line can  be used to  as a desclaimer fo the user ,so that user will be upto date dummy data etc </p>    -->
            </div>
            <div class="col-md-2"></div>
        </div>
</div>
 

   

 



