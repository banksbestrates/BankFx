  <!--==========================
    over view banner
  ============================-->
  <div class="overview_banner">
    <div class="banner_heading w-75 text-justify">
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

<div class="col-md-12">
  <div class="row bank_top_view">
    <div class="col-md-6 best_bank">
    <a href="<?php echo base_url()?>index.php/best_banks"><h2>Best 100 Banks</h2></a>
    </div>
   <div class="col-md-6 bank_review">
   <a href="<?php echo base_url()?>best_bank_reviews"><h2>Best Bank Reviews</h2></a>
    </div>
  </div>
</div>

  <!-- Card view -->
  <div class="col-md-10 pl-0 mx-auto">
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

    <div class="col-md-12 py-5 ">
        <div class="col-md-10 mx-auto px-0 ">
        <h3 class="border_bottom_golden">Best 100 Banks</h3>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th class="w-25">Bank</th>
                        <th class="w-25">Rating</th>             
                        <th class="w-25">FDIC</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="table_bank_image">
                        <img src="<?php echo base_url()?>assets/img/bank_images/bank_of_america.png"><br>
                        </td>
                        <td>
                            <span class="fa fa-star  checked"></span>
                            <span class="fa fa-star  checked"></span>
                            <span class="fa fa-star  checked"></span>
                            <span class="fa fa-star  checked"></span>
                            <span class="fa fa-star  checked"></span>
                        </td>
                        <td>
                            <span>#123456</span>
                        </td>
                      
                        <td>
                            <a href="<?php echo base_url()?>branch_locator">
                            <h4><button class="btn button_blue px-5">FULL REVIEW</button></h4></a>
                        </td>              
                    </tr>       
                    <tr>
                        <td class="table_bank_image">
                        <img src="<?php echo base_url()?>assets/img/bank_images/usbank.png"><br>
                        </td>
                        <td>
                                <span class="fa fa-star  checked"></span>
                                <span class="fa fa-star  checked"></span>
                                <span class="fa fa-star  checked"></span>
                                <span class="fa fa-star  checked"></span>
                                <span class="fa fa-star  checked"></span>
                        </td>
                        <td>
                            <span>#123456</span>
                        </td>
                      
                        <td>
                        <a href="<?php echo base_url()?>branch_locator">
                            <h4><button class="btn button_blue px-5">FULL REVIEW</button></h4>
                        </a>
                        </td>              
                    </tr>       
                    <tr>
                    <td class="table_bank_image">
                        <img src="<?php echo base_url()?>assets/img/bank_images/region.png"><br>
                        </td>
                        <td>
                                <span class="fa fa-star  checked"></span>
                                <span class="fa fa-star  checked"></span>
                                <span class="fa fa-star  checked"></span>
                                <span class="fa fa-star  checked"></span>
                                <span class="fa fa-star  checked"></span>
                        </td>
                        <td>
                            <span>#123456</span>
                        </td>
                      
                        <td>
                            <a href="<?php echo base_url()?>branch_locator">
                                <h4><button class="btn button_blue px-5">FULL REVIEW</button></h4>
                            </a>
                        </td>              
                    </tr>       

                </tbody>  
            </table>   
            <p>This line can  be used to  as a desclaimer fo the user ,so that user will be upto date dummy data etc </p>
        </div>
    </div>
  <!-- BANK NAMES AND DETAILS  -->
  <!-- <div class="col-md-10 mx-auto ">
        <div class=" col-md-12 mx-auto">   
           <a href="<?php echo base_url()?>index.php/bank_review"> <h1>ALLIANT</h1></a>
            <h5>CATEGORY &nbsp;&nbsp;<span style="font-weight:400!important;font-size:15px"> # OF STATES | # OF BRANCHES</h5>
            <div class="row">
                <div class="col-md-8">
                <p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus dictum nisl ac ultricies. 
                    Proin viverra velit rhoncus dignissim luctus. Sed mattis, velit non elementum malesuada, 
                    urna turpis mattis libero, semper semper leo tortor vel ex. Vestibulum gravida faucibus vulputate. 
                    Suspendisse placerat mi eget ipsum egestas, vitae consectetur ipsum tincidunt. Sed ligula urna,
                    elementum at metus vitae, elementum malesuada dui. Curabitur sit amet venenatis odio. Ut aliquet 
                    rhoncus feugiat. Nullam iaculis bibendum turpis a laoreet. Praesent elementum accumsan tortor, 
                    et feugiat eros venenatis ac. Ut convallis vestibulum odio, id fringilla lectus bibendum in. 
                    Nullam at sapien pretium, facilisis mauris ac,
                  
                </p>
                </div>
                <div class="col-md-4 ">
                    <div class="col-md-10 px-0 mx-auto bank_card_view">
                        <div class="card">
                            <div class="text-center">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </div>
                           
                            <div class="text-center">
                                    <div style="background-image:url(<?php echo base_url()?>assets/img/overview/bank1.png);
                                    background-size:contain;background-repeat:no-repeat;height:50px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
        <div class="pt-4 col-md-12 mx-auto">   
        <a href="<?php echo base_url()?>index.php/bank_review"><h1>ALLY</h1></a>
            <h5>CATEGORY &nbsp;&nbsp;<span style="font-weight:400!important;font-size:15px"> # OF STATES | # OF BRANCHES</h5>
            <div class="row">
                <div class="col-md-8">
                <p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus dictum nisl ac ultricies. 
                    Proin viverra velit rhoncus dignissim luctus. Sed mattis, velit non elementum malesuada, 
                    urna turpis mattis libero, semper semper leo tortor vel ex. Vestibulum gravida faucibus vulputate. 
                    Suspendisse placerat mi eget ipsum egestas, vitae consectetur ipsum tincidunt. Sed ligula urna,
                    elementum at metus vitae, elementum malesuada dui. Curabitur sit amet venenatis odio. Ut aliquet 
                    rhoncus feugiat. Nullam iaculis bibendum turpis a laoreet. Praesent elementum accumsan tortor, 
                    et feugiat eros venenatis ac. Ut convallis vestibulum odio, id fringilla lectus bibendum in. 
                    Nullam at sapien pretium, facilisis mauris ac,
                
                </p>
                </div>
                <div class="col-md-4 ">
                    <div class="col-md-10 px-0 mx-auto bank_card_view">
                        <div class="card">
                        <div class="text-center">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </div>
                            <div class="text-center ml-5">
                                    <div style="background-image:url(<?php echo base_url()?>assets/img/overview/bank2.png);
                                    background-size:contain;background-repeat:no-repeat;height:50px" class="ml-4"></div>
                            </div>             
                        </div>
                    </div>
                </div>
            </div>     
        </div>
        <div class="pt-4 col-md-12 mx-auto">   
        <a href="<?php echo base_url()?>index.php/bank_review"><h1>BANK OF AMERICA</h1></a>
            <h5>CATEGORY &nbsp;&nbsp;<span style="font-weight:400!important;font-size:15px"> # OF STATES | # OF BRANCHES</h5>
            <div class="row">
                <div class="col-md-8">
                <p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus dictum nisl ac ultricies. 
                    Proin viverra velit rhoncus dignissim luctus. Sed mattis, velit non elementum malesuada, 
                    urna turpis mattis libero, semper semper leo tortor vel ex. Vestibulum gravida faucibus vulputate. 
                    Suspendisse placerat mi eget ipsum egestas, vitae consectetur ipsum tincidunt. Sed ligula urna,
                    elementum at metus vitae, elementum malesuada dui. Curabitur sit amet venenatis odio. Ut aliquet 
                    rhoncus feugiat. Nullam iaculis bibendum turpis a laoreet. Praesent elementum accumsan tortor, 
                    et feugiat eros venenatis ac. Ut convallis vestibulum odio, id fringilla lectus bibendum in. 
                    Nullam at sapien pretium, facilisis mauris ac,
                    malesuada tellus. Aliquam sit amet tortor congue, tincidunt est in, tincidunt leo.
                </p>
                </div>
                <div class="col-md-4 ">
                    <div class="col-md-10 px-0 mx-auto bank_card_view">
                        <div class="card">
                        <div class="text-center">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                            </div>
                            <div class="text-center">
                                    <div style="background-image:url(<?php echo base_url()?>assets/img/overview/bank3.png);
                                    background-size:contain;background-repeat:no-repeat;height:50px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
        <div class="pt-4 col-md-12 mx-auto">   
            <h1>CAPITAL ONE</h1>
            <h5>CATEGORY &nbsp;&nbsp;<span style="font-weight:400!important;font-size:15px"> # OF STATES | # OF BRANCHES</h5>
            <div class="row">
                <div class="col-md-8">
                <p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus dictum nisl ac ultricies. 
                    Proin viverra velit rhoncus dignissim luctus. Sed mattis, velit non elementum malesuada, 
                    urna turpis mattis libero, semper semper leo tortor vel ex. Vestibulum gravida faucibus vulputate. 
                    Suspendisse placerat mi eget ipsum egestas, vitae consectetur ipsum tincidunt. Sed ligula urna,
                    elementum at metus vitae, elementum malesuada dui. Curabitur sit amet venenatis odio. Ut aliquet 
                    rhoncus feugiat. Nullam iaculis bibendum turpis a laoreet. Praesent elementum accumsan tortor, 
                    et feugiat eros venenatis ac. Ut convallis vestibulum odio, id fringilla lectus bibendum in. 
                    Nullam at sapien pretium, facilisis mauris ac,
                
                </p>
                </div>
                <div class="col-md-4 ">
                    <div class="col-md-10 px-0 mx-auto bank_card_view">
                        <div class="card">
                        <div class="text-center">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </div>
                            <div class="text-center ml-5">
                                    <div style="background-image:url(<?php echo base_url()?>assets/img/overview/bank4.png);
                                    background-size:contain;background-repeat:no-repeat;height:50px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
       <div class="pb-5"></div>

  </div>  -->

   

 



