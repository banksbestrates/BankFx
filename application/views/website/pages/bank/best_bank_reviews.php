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
    <a href="<?php echo base_url()?>best_banks"><h2>Best 100 Banks</h2></a>
    </div>
   <div class="col-md-6 bank_review">
   <a href="<?php echo base_url()?>best_banks"><h2>Best Bank Reviews</h2></a>
    </div>
  </div>
</div>

<!-- Card view -->
<div class="container  card_row">
        <div class="row card_view">
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

<div class="container py-4">
    <h3 class="font-weight-900">Best Bank Reviews</h3>
    <div class="container py-2">  
        <div class="row">
            <div class="col-md-9 px-0 box_round_border">
                <div class="row  px-4 pt-2">
                            <div class="col-md-4 text-center credit_left_div pt-2">
                                <img src="<?php echo base_url()?>assets/img/bank_images/bank_of_america_flag.png" style="max-width:100%"/> 
                                <div class="py-3"></div> 
                                <button class="btn button_blue btn-sm  mt-2 px-5" style="position:absolute;bottom:20%;left:10%"> FULL REVIEW </button>   
                            </div>
                            <div class="col-md-8 credit_starts">
                                <div class="row">
                                    <div class="col-md-8 py-2">
                                        <h5 class="mb-2">Best Big Bank: Bank of America</h5>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span> 
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <table class="table credit_card_small_row">
                                        <tbody>
                                            <tr>
                                                <td><small><b>Bank Class:</b> National</small></td>
                                            </tr>
                                            <tr>
                                                <td><small><b>Member FDIC: </b> 3510</small></td>
                                            </tr>
                                            <tr>
                                            <td><small><b>Branch Count:</b>  4219 Offices in 37 States</small></td>
                                            </tr>
                                            <tr>
                                            <td style="border-bottom:none"><small class="font-weight-bold">The bottom line:</small>
                                            <small> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus dictum nisl ac ultricies. 
                                                Proin viverra velit rhoncus dignissim luctus. Sed mattis, velit non elementum malesuada, urna turpis mattis
                                                ibero, semper semper leo tortor vel ex.ibero, semper semper leo tortor vel ex </small></td>
                                            </tr>
                                        </tbody>         
                                    </table>
                                </div>
                            </div> 
                </div>
            </div>
            <div class="col-md-3">            
            </div>
        </div>
    </div>
    <div class="container py-2">  
        <div class="row">
            <div class="col-md-9 px-0 box_round_border">
                <div class="row  px-4 pt-2">
                            <div class="col-md-4 text-center credit_left_div pt-2">
                                <img src="<?php echo base_url()?>assets/img/bank_images/bank_of_america_flag.png" style="max-width:100%"/> 
                                <div class="py-3"></div> 
                                <button class="btn button_blue btn-sm  mt-2 px-5" style="position:absolute;bottom:20%;left:10%"> FULL REVIEW </button>   
                            </div>
                            <div class="col-md-8 credit_starts">
                                <div class="row">
                                    <div class="col-md-8 py-2">
                                        <h5 class="mb-2">Best Big Bank: Bank of America</h5>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span> 
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <table class="table credit_card_small_row">
                                        <tbody>
                                            <tr>
                                                <td><small><b>Bank Class:</b> National</small></td>
                                            </tr>
                                            <tr>
                                                <td><small><b>Member FDIC: </b> 3510</small></td>
                                            </tr>
                                            <tr>
                                            <td><small><b>Branch Count:</b>  4219 Offices in 37 States</small></td>
                                            </tr>
                                            <tr>
                                            <td style="border-bottom:none"><small class="font-weight-bold">The bottom line:</small>
                                            <small> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus dictum nisl ac ultricies. 
                                                Proin viverra velit rhoncus dignissim luctus. Sed mattis, velit non elementum malesuada, urna turpis mattis
                                                ibero, semper semper leo tortor vel ex.ibero, semper semper leo tortor vel ex </small></td>
                                            </tr>
                                        </tbody>         
                                    </table>
                                </div>
                            </div> 
                </div>
            </div>
            <div class="col-md-3">            
            </div>
        </div>
    </div>
    <div class="container py-2">  
        <div class="row">
            <div class="col-md-9 px-0 box_round_border">
                <div class="row  px-4 pt-2">
                            <div class="col-md-4 text-center credit_left_div pt-2">
                                <img src="<?php echo base_url()?>assets/img/bank_images/bank_of_america_flag.png" style="max-width:100%"/> 
                                <div class="py-3"></div> 
                                <button class="btn button_blue btn-sm  mt-2 px-5" style="position:absolute;bottom:20%;left:10%"> FULL REVIEW </button>   
                            </div>
                            <div class="col-md-8 credit_starts">
                                <div class="row">
                                    <div class="col-md-8 py-2">
                                        <h5 class="mb-2">Best Big Bank: Bank of America</h5>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span> 
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <table class="table credit_card_small_row">
                                        <tbody>
                                            <tr>
                                                <td><small><b>Bank Class:</b> National</small></td>
                                            </tr>
                                            <tr>
                                                <td><small><b>Member FDIC: </b> 3510</small></td>
                                            </tr>
                                            <tr>
                                            <td><small><b>Branch Count:</b>  4219 Offices in 37 States</small></td>
                                            </tr>
                                            <tr>
                                            <td style="border-bottom:none"><small class="font-weight-bold">The bottom line:</small>
                                            <small> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus dictum nisl ac ultricies. 
                                                Proin viverra velit rhoncus dignissim luctus. Sed mattis, velit non elementum malesuada, urna turpis mattis
                                                ibero, semper semper leo tortor vel ex.ibero, semper semper leo tortor vel ex </small></td>
                                            </tr>
                                        </tbody>         
                                    </table>
                                </div>
                            </div> 
                </div>
            </div>
            <div class="col-md-3">            
            </div>
        </div>
    </div>
    <div class="container py-2">  
        <div class="row">
            <div class="col-md-9 px-0 box_round_border">
                <div class="row  px-4 pt-2">
                            <div class="col-md-4 text-center credit_left_div pt-2">
                                <img src="<?php echo base_url()?>assets/img/bank_images/bank_of_america_flag.png" style="max-width:100%"/> 
                                <div class="py-3"></div> 
                                <button class="btn button_blue btn-sm  mt-2 px-5" style="position:absolute;bottom:20%;left:10%"> FULL REVIEW </button>   
                            </div>
                            <div class="col-md-8 credit_starts">
                                <div class="row">
                                    <div class="col-md-8 py-2">
                                        <h5 class="mb-2">Best Big Bank: Bank of America</h5>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span> 
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <table class="table credit_card_small_row">
                                        <tbody>
                                            <tr>
                                                <td><small><b>Bank Class:</b> National</small></td>
                                            </tr>
                                            <tr>
                                                <td><small><b>Member FDIC: </b> 3510</small></td>
                                            </tr>
                                            <tr>
                                            <td><small><b>Branch Count:</b>  4219 Offices in 37 States</small></td>
                                            </tr>
                                            <tr>
                                            <td style="border-bottom:none"><small class="font-weight-bold">The bottom line:</small>
                                            <small> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus dictum nisl ac ultricies. 
                                                Proin viverra velit rhoncus dignissim luctus. Sed mattis, velit non elementum malesuada, urna turpis mattis
                                                ibero, semper semper leo tortor vel ex.ibero, semper semper leo tortor vel ex </small></td>
                                            </tr>
                                        </tbody>         
                                    </table>
                                </div>
                            </div> 
                </div>
            </div>
            <div class="col-md-3">            
            </div>
        </div>
    </div>
    <div class="container py-2">  
        <div class="row">
            <div class="col-md-9 px-0 box_round_border">
                <div class="row  px-4 pt-2">
                            <div class="col-md-4 text-center credit_left_div pt-2">
                                <img src="<?php echo base_url()?>assets/img/bank_images/bank_of_america_flag.png" style="max-width:100%"/> 
                                <div class="py-3"></div> 
                                <button class="btn button_blue btn-sm  mt-2 px-5" style="position:absolute;bottom:20%;left:10%"> FULL REVIEW </button>   
                            </div>
                            <div class="col-md-8 credit_starts">
                                <div class="row">
                                    <div class="col-md-8 py-2">
                                        <h5 class="mb-2">Best Big Bank: Bank of America</h5>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span> 
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <table class="table credit_card_small_row">
                                        <tbody>
                                            <tr>
                                                <td><small><b>Bank Class:</b> National</small></td>
                                            </tr>
                                            <tr>
                                                <td><small><b>Member FDIC: </b> 3510</small></td>
                                            </tr>
                                            <tr>
                                            <td><small><b>Branch Count:</b>  4219 Offices in 37 States</small></td>
                                            </tr>
                                            <tr>
                                            <td style="border-bottom:none"><small class="font-weight-bold">The bottom line:</small>
                                            <small> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus dictum nisl ac ultricies. 
                                                Proin viverra velit rhoncus dignissim luctus. Sed mattis, velit non elementum malesuada, urna turpis mattis
                                                ibero, semper semper leo tortor vel ex.ibero, semper semper leo tortor vel ex </small></td>
                                            </tr>
                                        </tbody>         
                                    </table>
                                </div>
                            </div> 
                </div>
            </div>
            <div class="col-md-3">            
            </div>
        </div>
    </div>
</div>

   

 



