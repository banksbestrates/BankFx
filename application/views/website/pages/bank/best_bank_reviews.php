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
<div class="container  card_row">
        <div class="col-md-12 row card_view pt-5">
            <div class="col-md-3 mb-3">
                <div class="card">
                 <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Best-Large-Banks.png" style="width:100px; height:100px;">
                  </div>
                  <h6>Best Large Banks</h6>
                </div>
            </div>
            <div class="col-md-3 mb-3">
            <div class="card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Best-Online_Banks.png" style="width:100px; height:100px;">
                    </div>
                  <h6>Best Online Banks</h6>
                </div>
            </div>
            <div class="col-md-3 mb-3">
              <div class="card">
                <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Best-Credit_Unions.png" style="width:100px; height:100px;">
                  </div>
                  <h6>Best Credit Unions</h6>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Best-Regional-Banks.png" style="width:100px; height:100px;">
                    </div>    
                  <h6>Best Regional Banks</h6>
                </div>
            </div>
        </div>
</div> 

<div class="container py-4">
    <h3 class="font-weight-900">Best Financial Center Reviews</h3>
    <div class="container py-2">  
        <div class="row">
            <?php foreach($data['Returned'] as $index=> $list){ ?>
                <div class="col-md-12 px-0 mb-3 box_round_border">
                    <div class="row  px-4 pt-2">
                            <div class="col-md-4 text-center credit_left_div pt-2">
                                <img src="<?php echo $list['ImagePath']?>" style="max-width:100%;height:140px"/> 
                                <div class="py-3"></div> 
                               <a href="<?php echo base_url()?>bank_full_review/<?php echo $list['BankName']?>"> 
                               <button class="btn button_blue btn-sm  mt-2 px-5" style="position:absolute;bottom:20%;left:10%"> FULL REVIEW </button>
                                </a>  
                            </div>
                            <div class="col-md-8 credit_starts">
                                <div class="row">
                                    <div class="col-md-8 py-2">
                                        <h5 class="mb-2"><?php echo $list['BankName']?></h5>
                                    </div>
                                    <div class="col-md-4 text-right">
                                    <div >                        
                                        <?php if($list['RatingNum'] == 1){?>
                                            <span class="fa fa-star  checked"></span>
                                            <span class="fa fa-star "></span>
                                            <span class="fa fa-star "></span>
                                            <span class="fa fa-star "></span>
                                            <span class="fa fa-star "></span>
                                            <span class="fa fa-star "></span>
                                        <?php } else if($list['RatingNum'] == 2){?>
                                            <span class="fa fa-star  checked"></span>
                                            <span class="fa fa-star  checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        <?php } else if($list['RatingNum'] == 3){?>
                                            <span class="fa fa-star  checked"></span>
                                            <span class="fa fa-star  checked"></span>
                                            <span class="fa fa-star  checked"></span>
                                            <span class="fa fa-star "></span>
                                            <span class="fa fa-star "></span>
                                            <span class="fa fa-star "></span>
                                        <?php } else if($list['RatingNum'] == 4){?>
                                                <span class="fa fa-star  checked"></span>
                                                <span class="fa fa-star  checked"></span>
                                                <span class="fa fa-star  checked"></span>
                                                <span class="fa fa-star  checked"></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                        <?php } else if($list['RatingNum'] == 5){?>     
                                                <span class="fa fa-star  checked"></span>
                                                <span class="fa fa-star  checked"></span>
                                                <span class="fa fa-star  checked"></span>
                                                <span class="fa fa-star  checked"></span>
                                                <span class="fa fa-star  checked"></span>
                                                <span class="fa fa-star "></span>
                                        <?php } else if($list['RatingNum'] == 6){?> 
                                                <span class="fa fa-star  checked"></span>
                                                <span class="fa fa-star  checked"></span>
                                                <span class="fa fa-star  checked"></span>
                                                <span class="fa fa-star  checked"></span>
                                                <span class="fa fa-star  checked"></span>       
                                                <span class="fa fa-star  checked"></span>
                                        <?php }?>       
                                    </div>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <table class="table credit_card_small_row">
                                        <tbody>
                                            <tr>
                                                <td>
                                                <img src="<?php echo base_url()?>assets/images/website/banking/card_icon/Member-FDIC.png" height="40px"/>
                                                <small><b>Bank Class:</b> 
                                                <?php foreach($list['ClassArray'] as $credit_union){?>
                                                    <?php echo $credit_union?> ,
                                                <?php }?>
                                                </small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                <img src="<?php echo base_url()?>assets/images/website/banking/card_icon/Online-Banking.png" height="40px"/>
                                                <small><b>Website: </b> <?php echo $list['mainURL']?></small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                <img src="<?php echo base_url()?>assets/images/website/banking/card_icon/Headquarters.png" height="40px"/>
                                                <small><b>Branch Count:</b> <?php echo $list['OfficeCount']?> Offices in <?php echo $list['StatesServed']?> States</small></td>
                                            </tr>
                                            <tr>
                                            <td style="border-bottom:none">
                                            <img src="<?php echo base_url()?>assets/images/website/loan/card_icon/Debt-Consolidation.png" height="40px"/>
                                            <small class="font-weight-bold">The bottom line:</small>
                                            <small> <?php echo $list['Overview'] ?> </small></td>
                                            </tr>
                                        </tbody>         
                                    </table>
                                </div>
                            </div> 
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>

   

 



