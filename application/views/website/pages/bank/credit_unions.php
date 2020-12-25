
<!-- Bank locator -->

<div class="container pt-5">
    <div class="row">
        <div class="col-md-8">
            <span><a href="<?php echo base_url()?>bank_overview">Banking Overview</a> > <a href="<?php echo base_url()?>branch_locator">Bank Branch Locator</a> > </span><span class="text_yellow">
            <?php echo $data['ParamLst']['City']?>,  <?php echo $data['ParamLst']['State']?></span>
            <h2 class="font-weight-900 pt-2 mb-2 text-uppercase">CREDIT UNIONS IN <?php echo $data['ParamLst']['City']?>, <?php echo $data['ParamLst']['State']?></h2>
            <!-- <span>Published by <?php echo date('M Y')?> Do we need to have this information?</span> -->
        </div>
        <div class="col-md-4 text-right pt-4">
            <!-- <button class="btn button_blue btn-sm">DOWNLOAD OUR APP</button> -->
        </div>
    </div>
</div>

<div class="container py-4">
    <!-- <h3 class="font-weight-900">Credit </h3> -->
    <div class="container py-2">  
        <div class="row">
            <?php if($data['RowCount']>0){?>        
                <?php foreach($data['Returned'] as $index=> $list){ ?>
                    <div class="col-md-12 px-0 mb-3 box_round_border">
                        <div class="row  px-4 pt-2">
                                <div class="col-md-4 text-center credit_left_div pt-2">
                                <?php if($list['ImagePath']==""){?>
                                    <img src="<?php echo base_url()?>assets/img/overview/image_not_available.jpg" style="max-width:100%;height:140px"/> 
                                <?php } else{?>
                                    <img src="<?php echo $list['ImagePath']?>" style="max-width:100%;height:140px"/> 
                                <?php }?>
                            
                                    <div class="py-3"></div> 
                                    <h4><?php echo $list['BankName']?></h4>
                                <!-- <a href="<?php echo base_url()?>bank_full_review/<?php echo $list['BankName']?>"> 
                                <button class="btn button_blue btn-sm  mt-2 px-5" style="position:absolute;bottom:20%;left:10%"> FULL REVIEW </button>
                                    </a>   -->
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
                                                    <small><b>Website: </b> <a href="https://<?php echo $list['mainURL']?>"><?php echo $list['mainURL']?></a></small>
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
            <?php } else{?>
                <div class="col-md-12 px-0 mb-3 box_round_border">
                        <div class="px-4 py-4 text-center">  
                            <h5 >NO CREDIT UNION AVAILABLE FOR THIS CITY</h5>  
                        </div>
                    </div>
            <?php }?>
        </div>
    </div>
</div>


