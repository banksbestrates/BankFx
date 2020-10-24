
<style>
.form-control{
    line-height: 1.5!important;
}
</style>
<!-- TOP NAME DIV -->
    <div class="container pt-5 pb-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="font-weight-900 mb-2">Best Mortgage Rates for <?php echo date('F Y')?></h1>
                <!-- <p>Published on <?php echo date('M d')?>. Do you want to get more information ?</p> -->
            </div>
            <!-- <div class="col-md-3 text-right pt-3"> -->
                <!-- <button class="btn button_blue btn-sm">DOWNLOAD OUR APP</button> -->
            <!-- </div> -->
        </div>
    </div>

<!-- Mortgage rate top -->
    <div class="container">
        <?php if(count($page_data)>=1){
                foreach($page_data as $d){
                if($d->div_type == "top"){?>
                    <h5 class="mb-2"><?php echo $d->heading;?></h5>
                   <div class="text-justify"><?php echo $d->content;?></div>
            <?php } 
            }
        }?>
    </div>

<!-- Iframe brown bag -->
    <div class="container pb-3" >
        <iframe  id="Ifrmae" style="height:210vh;width:100%;border:2px solid #d79f01" src="https://widgets.icanbuy.com/c/standard/us/en/mortgage/tables/Mortgage.aspx?siteid=6958e75ba6b00b8b&include_text_results=1&redirect_no_results=1&listingbtnbgcolor=D79F01&searchbtnbgcolor=000000"></iframe>
    </div>

<!-- Mortgage rate bottom  -->
    <div class="container pb-5">
        <?php if(count($page_data)>=1){
                foreach($page_data as $d){
                if($d->div_type == "bottom"){?>
                    <h5 class="mb-2"><?php echo $d->heading;?></h5>
                   <div class="text-justify"><?php echo $d->content;?></div>
            <?php } 
            }
        }?>
    </div>

    <!-- Calculate form div -->
    <!-- <div class="col-md-12 py-4 mortgag_form_div">
        <div class="container px-0 ">
            <div class="row">
            <div class="col-md-2">
                    <label>Mortgage type</label>
                    <select class="form-control">
                        <option>Refinance</option>
                        <option>Purchase</option>
                    </select>
            </div>
            <div class="col-md-2">
                    <label>ZIP Code</label>
                    <input type="text" class="form-control" value="12345"/>
            </div>
            <div class="col-md-2">
                    <label>Purchase Price</label>
                    <input type="text" class="form-control" value="$410,000"/>
            </div>
            <div class="col-md-2">
                    <label>Down payment</label>
                    <input type="text" class="form-control" value="$82,000">
            </div>
            <div class="col-md-2">
                    <label>Credit score </label>
                    <select class="form-control">
                        <option>740+</option>
                        <option>720-739</option>
                        <option>720-739</option>
                        <option>7420-739</option>
                        <option>720-739</option>
                    </select>
            </div>
            <div class="col-md-2">
                    <label>Loan term</label>
                    <select class="form-control">
                        <option>30 Years</option>
                        <option>20 Years</option>
                        <option>15 Years</option>
                        <option>10 Years</option> 
                    </select>
            </div>
            </div>
            <div class="row pt-4">
                <div class="col-md-4 text-center mx-auto">
                    <button class="btn button_yellow px-3 btn-sm">FIND BEST RATES</button>
                </div>
            </div>
        </div>
    </div>  -->

    <!-- card view -->
    <!-- <div class="container  card_row pb-4 pt-5">  
        <header class="section-header">
            <h3 class="font-weight-900 mb-0">WHAT’S MOST IMPORTANT TO YOU?</h3>
        </header> 
        <div class="pt-5 col-md-12 mx-auto row card_view px-0">
                <div class="col-md-2 px-1">
                    <div class="card px-1">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/mortgage/card_icon/low_upfront.png" style="width:100px; height:100px;">
                    </div>
                    <p>Low Upfront cart</p>
                    </div>
                </div>
                <div class="col-md-2 px-1">
                <div class="card px-1">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/mortgage/card_icon/first_time_home.png" style="width:100px; height:100px;">
                    </div>
                    <p>First time homebuyer</p>
                    </div>
                </div>
                <div class="col-md-2 px-1">
                <div class="card px-1">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/mortgage/card_icon/fha_loan.png" style="width:100px; height:100px;">
                    </div>
                <p>FHA Loan</p>
                    </div>
                </div>
                <div class="col-md-2 px-1">
                    <div class="card px-1">
                    <div style="width:100%; text-align:center">
                      <img src="<?php echo base_url();?>assets/images/website/mortgage/card_icon/quick_clock.png" style="width:100px; height:100px;">
                    </div>
                    <p>Quick Clocking</p>
                    </div>
                </div>
                <div class="col-md-2 px-1">
                    <div class="card px-1">
                        <div style="width:100%; text-align:center">
                        <img src="<?php echo base_url();?>assets/images/website/mortgage/card_icon/Veteran-Military.png" style="width:100px; height:100px;">
                        </div>
                    <p>Veteran Military</p>
                    </div>
                </div>
                <div class="col-md-2 px-1">
                    <div class="card px-1">
                        <div style="width:100%; text-align:center">
                        <img src="<?php echo base_url();?>assets/images/website/mortgage/card_icon/low_monthly_payment.png" style="width:100px; height:100px;">
                        </div>
                    <p>Low Monthly Payment</p>
                    </div>
                </div>
        </div>
    </div>  -->
    <!-- Table div -->
    <!-- <div class="container py-5 ">
        <div class="row">
            <div class="col-md-10">
                    <p> <strong>SHOWING RESULTS FOR:</strong> Single Family home, 30 year fixed mortgages with all points.</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="w-25">BANK</th>
                                    <th class="w-25">APY</th>             
                                    <th class="w-25">TERM</th>
                                    <th class="w-25">DEPOSIT </th>
                                    <th class="w-25">EARNINGS</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="active">
                                    <td>
                                    <img src="<?php echo base_url()?>assets/img/overview/bank1.png"/><br/>
                                    </td>
                                    <td>
                                        <h4>1.15%</h4>
                                    </td>
                                    <td>
                                        <h4>1 yr</h4>
                                    </td>
                                    <td>
                                        <h4>$1000</h4>
                                    </td>
                                    <td>
                                        <h4>$400</h4>
                                    </td>
                                    <td>
                                        <h4><button class="btn button_yellow btn-sm">SEE OFFER DETAILS</button></h4>
                                    </td>              
                                </tr>       
                                <tr>
                                    <td>
                                    BANK NAME<br/>
                                    MLS 123456<br/>
                                    12345678
                                    </td>
                                    <td>
                                        1.15%
                                    </td>
                                    <td>
                                        1 yr
                                    </td>
                                    <td>
                                        $1000
                                    </td>
                                    <td>
                                        $400
                                    </td>
                                    <td>
                                        <h4><button class="btn button_blue btn-sm">SEE OFFER DETAILS</button></h4>
                                    </td>              
                                </tr>       
                                <tr>
                                    <td>
                                    BANK NAME<br/>
                                    MLS 123456<br/>
                                    12345678
                                    </td>
                                    <td>
                                        1.15%
                                    </td>
                                    <td>
                                        1 yr
                                    </td>
                                    <td>
                                        $1000
                                    </td>
                                    <td>
                                        $400
                                    </td>
                                    <td>
                                        <h4><button class="btn button_blue btn-sm">SEE OFFER DETAILS</button></h4>
                                    </td>              
                                </tr>       
                                <tr>
                                    <td>
                                    BANK NAME<br/>
                                    MLS 123456<br/>
                                    12345678
                                    </td>
                                    <td>
                                        1.15%
                                    </td>
                                    <td>
                                        1 yr
                                    </td>
                                    <td>
                                        $1000
                                    </td>
                                    <td>
                                        $400
                                    </td>
                                    <td>
                                        <h4><button class="btn button_blue btn-sm">SEE OFFER DETAILS</button></h4>
                                    </td>              
                                </tr>       
                                <tr>
                                    <td>
                                    BANK NAME<br/>
                                    MLS 123456<br/>
                                    12345678
                                    </td>
                                    <td>
                                        1.15%
                                    </td>
                                    <td>
                                        1 yr
                                    </td>
                                    <td>
                                        $1000
                                    </td>
                                    <td>
                                        $400
                                    </td>
                                    <td>
                                        <h4><button class="btn button_blue btn-sm">SEE OFFER DETAILS</button></h4>
                                    </td>              
                                </tr>       
                                <tr>
                                    <td>
                                    BANK NAME<br/>
                                    MLS 123456<br/>
                                    12345678
                                    </td>
                                    <td>
                                        1.15%
                                    </td>
                                    <td>
                                        1 yr
                                    </td>
                                    <td>
                                        $1000
                                    </td>
                                    <td>
                                        $400
                                    </td>
                                    <td>
                                        <h4><button class="btn button_blue btn-sm">SEE OFFER DETAILS</button></h4>
                                    </td>              
                                </tr>       
                                <tr>
                                    <td>
                                    BANK NAME<br/>
                                    MLS 123456<br/>
                                    12345678
                                    </td>
                                    <td>
                                        1.15%
                                    </td>
                                    <td>
                                        1 yr
                                    </td>
                                    <td>
                                        $1000
                                    </td>
                                    <td>
                                        $400
                                    </td>
                                    <td>
                                        <h4><button class="btn button_blue btn-sm">SEE OFFER DETAILS</button></h4>
                                    </td>              
                                </tr>       
                                <tr>
                                    <td>
                                    BANK NAME<br/>
                                    MLS 123456<br/>
                                    12345678
                                    </td>
                                    <td>
                                        1.15%
                                    </td>
                                    <td>
                                        1 yr
                                    </td>
                                    <td>
                                        $1000
                                    </td>
                                    <td>
                                        $400
                                    </td>
                                    <td>
                                        <h4><button class="btn button_blue btn-sm">SEE OFFER DETAILS</button></h4>
                                    </td>              
                                </tr>       
                                <tr>
                                    <td>
                                    BANK NAME<br/>
                                    MLS 123456<br/>
                                    12345678
                                    </td>
                                    <td>
                                        1.15%
                                    </td>
                                    <td>
                                        1 yr
                                    </td>
                                    <td>
                                        $1000
                                    </td>
                                    <td>
                                        $400
                                    </td>
                                    <td>
                                        <h4><button class="btn button_blue btn-sm">SEE OFFER DETAILS</button></h4>
                                    </td>              
                                </tr>       
                                <tr>
                                    <td>
                                    BANK NAME<br/>
                                    MLS 123456<br/>
                                    12345678
                                    </td>
                                    <td>
                                        1.15%
                                    </td>
                                    <td>
                                        1 yr
                                    </td>
                                    <td>
                                        $1000
                                    </td>
                                    <td>
                                        $400
                                    </td>
                                    <td>
                                        <h4><button class="btn button_blue btn-sm">SEE OFFER DETAILS</button></h4>
                                    </td>              
                                </tr>       
                            </tbody>  
                        </table>  
                    </div> 
                <small class="">This line can  be used to  as a desclaimer fo the user ,so that user will be upto date dummy data etc </small><br/><br/>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div> -->

    <!-- current mortgage and refine rates -->
    <!-- <div class="container py-3 ">
        <div class="row">
            <div class="col-md-10">
                <h3 class="border_bottom_golden font-weight-900"><?php echo $page_data->heading ?></h3>
                <p><?php echo $page_data->content?></p>

                <h3 class="font-weight-900">Current Mortgage and Refinance Rates</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="w-75">PRODUCT</th>
                            <th>Interest Rate</th>             
                            <th>ARP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-75">30 -Years Fixed Rates</td>  
                            <th>1.15%</th>             
                            <th>1.15%</th>       
                        </tr>  
                        <tr>
                            <td class="w-75">30 -Years Fixed Rates</td>  
                            <th>1.15%</th>             
                            <th>1.15%</th>       
                        </tr>  
                        <tr>
                            <td class="w-75">30 -Years Fixed Rates</td>  
                            <th>1.15%</th>             
                            <th>1.15%</th>       
                        </tr>  
                        <tr>
                            <td class="w-75">30 -Years Fixed Rates</td>  
                            <th>1.15%</th>             
                            <th>1.15%</th>       
                        </tr>  
                        <tr>
                            <td class="w-75">30 -Years Fixed Rates</td>  
                            <th>1.15%</th>             
                            <th>1.15%</th>       
                        </tr>  
                        <tr>
                            <td class="w-75">30 -Years Fixed Rates</td>  
                            <th>1.15%</th>             
                            <th>1.15%</th>       
                        </tr>  
                        <tr>
                            <td class="w-75">30 -Years Fixed Rates</td>  
                            <th>1.15%</th>             
                            <th>1.15%</th>       
                        </tr>  
                        <tr>
                            <td class="w-75">30 -Years Fixed Rates</td>  
                            <th>1.15%</th>             
                            <th>1.15%</th>       
                        </tr>                    
                    </tbody>  
                </table>   
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div> -->
    
    <script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/libs/common.js"></script>
    <script>
    // Selecting the iframe element
    var iframe = document.getElementById("Ifrmae");
    // Adjusting the iframe height onload event
    iframe.onload = function(){
        iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
    }
    </script>


 



