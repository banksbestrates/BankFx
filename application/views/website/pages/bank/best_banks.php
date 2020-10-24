  <!--==========================
    over view banner
  ============================-->
  <style>
  .stars-outer {
  display: inline-block;
  position: relative;
  font-family: FontAwesome;
}

.stars-outer::before {
  content: "\f006 \f006 \f006 \f006 \f006";
}

.stars-inner {
  position: absolute;
  top: 0;
  left: 0;
  white-space: nowrap;
  overflow: hidden;
  width: 0;
}

.stars-inner::before {
  content: "\f005 \f005 \f005 \f005 \f005";
  color: #f8ce0b;
}
  </style>
  <!-- <?php print_r($data['Returned']);?> -->
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
              <a href="<?php echo base_url()?>best_banks"><h2>Best 100 Banks</h2></a>
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
                  <h6>Best Large Banks</h6>
                </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Best-Online_Banks.png" style="width:100px; height:100px;">
                  </div>
                  <h6>Best Online Banks</h6>
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
            <div class="col-md-12 table-responsive">
                <h3 class="border_bottom_golden mb-0">Best 100 Banks</h3>
                <table class="table text-center" style="font-size:14px">
                    <thead>
                            <tr class="background_light_grey">
                                <th>Image</th>
                                <th class="text-left"> Financial Institutions</th>
                                <th>Rating</th>             
                                <th>Website</th>             
                                <th>Branches</th>
                                <th>States Served</th>
                                <th>Institution Class</th>
                                <th></th>
                                <th></th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['Returned'] as $index=> $list){ ?>
                            <tr>
                                <td class="text-left"><div><img src="<?php echo $list['ImagePath']?>" class="img-thumbnail"></div></td>
                                <td class="text-left"><div><?php echo $list['BankName']?></div></td>
                                <td class="px-0" style="width:14%">
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
                                </td>
                                <td><span><?php echo $list['mainURL']?></span></td>
                                <td><span><?php echo $list['OfficeCount']?></span></td>
                                <td><span><?php echo $list['StatesServed']?></span></td>
                                <td>
                                    <span id="single_credit_union<?php echo $index?>"><?php echo $list['ClassArray'][0]?></span>                               
                                    <div id="more_credit_union<?php echo $index?>" style="display:none">
                                        <?php foreach($list['ClassArray'] as $credit_union){?>
                                            <span><?php echo $credit_union?></span><hr/>
                                        <?php }?>
                                    </div>
                                </td>
                                <td>
                                    <?php if(count($list['ClassArray']) > 1){?>
                                        <span style="float:right;cursor:pointer" class="pr-0" id="add_button<?php echo $index?>"><i class="fa fa-plus text_yellow" aria-hidden="true" 
                                            onclick="show_all_credit_union(<?php echo $index?>)"></i></span>
                                        <span style="float:right;display:none;cursor:pointer" class="pr-0" id="del_button<?php echo $index?>"><i class="fa fa-minus text_yellow" aria-hidden="true" 
                                            onclick="close_all_credit_union(<?php echo $index?>)"></i></span>
                                    <?php }?>
                                </td>
                                
                                <td><a href="https://<?php echo $list['mainURL']?>" target="_blank"><button class="btn button_blue btn-sm"><small>Visit Site</small></button></a></td> 
                            </tr>   
                        <?php  } ?>
                    </tbody>  
                </table>   
                <!-- <p>This line can  be used to  as a desclaimer fo the user ,so that user will be upto date dummy data etc </p>    -->
            </div>
            <div class="col-md-2"></div>
        </div>
</div>
<script>

    function show_all_credit_union(id)
    {   
        $("#single_credit_union"+id).css('display','none');
        $("#more_credit_union"+id).css('display','block');
        $("#add_button"+id).css('display','none');
        $("#del_button"+id).css('display','block');
    }
    function close_all_credit_union(id)
    {   
        $("#single_credit_union"+id).css('display','block');
        $("#more_credit_union"+id).css('display','none');
        $("#add_button"+id).css('display','block');
        $("#del_button"+id).css('display','none');
    }
</script>



 

   

 



