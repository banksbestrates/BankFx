  <!--==========================
    over view banner
  ============================-->
  <style>
    .star-rating {
        text-indent: -10000px; /* hide the text (because we're progressively enhancing) */
        height: 16px; /* because this is how tall the star image is */
        background: url("http://www.pmob.co.uk/temp/images/star-matrix.gif") left bottom; /* Paul O'B's star sprite */
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


<!-- Card view -->
<div class="container pl-0 mx-auto">
        <div class="pt-5 col-md-12 mx-auto row card_view">
            <div class="col-md-3 mb-3">
                <a href="<?php echo base_url()?>best_large_banks">
                <div class="card">
                  <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Best-Large-Banks.png" style="width:100px; height:100px;">
                  </div>
                 <h6>Best Large Banks</h6> 
                </div>
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="<?php echo base_url()?>best_online_banks">
                    <div class="card">
                        <div style="width:100%; text-align:center">
                            <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Best-Online_Banks.png" style="width:100px; height:100px;">
                        </div>
                        <h6>Best Online Banks</h6>
                    </div>
                <a>
            </div> 
            <div class="col-md-3 mb-3">
                <a href="<?php echo base_url()?>best_credit_unions">
                <div class="card">
                    <div style="width:100%; text-align:center">
                        <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Best-Credit_Unions.png" style="width:100px; height:100px;">
                    </div>
                    <h6>Best Credit Unions</h6>
                </div>
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="<?php echo base_url()?>best_regional_banks">
                    <div class="card">
                    <div style="width:100%; text-align:center">
                        <img src="<?php echo base_url();?>assets/images/website/banking/card_icon/Best-Regional-Banks.png" style="width:100px; height:100px;">
                    </div>
                    <h6>Best Regional Banks</h6>
                    </div>
                </a>
            </div>
        </div>
</div> 

<div class="container py-5 ">
        <div class="row mx-2">
            <div class="col-md-12 table-responsive">
                <h3 class="border_bottom_golden mb-0">Top Financial Centers</h3>
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
                                <td class="text-left"><div><img src="<?php echo $list['ImagePath']?>" class=""></div></td>
                                <td class="text-left"><div><?php echo $list['BankName']?></div></td>
                                <td class="px-0 text-center" >
                                 <?php $roundedAvgRating = round($list['RatingNum'] / 0.5) * 0.5 ?>
                                    <div class="star-rating" style="width: <?php echo htmlspecialchars(80 * ($roundedAvgRating/ 5)) ?>px">
                                        <?php echo htmlspecialchars($roundedAvgRating) ?>
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



 

   

 



