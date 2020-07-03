
<style>
.card p {
    color:black;
    font-weight:bold;
}
.mortgag_form_div{
  background-color:black;
  border-top:2px solid #CB9D24;
  border-bottom:2px solid #CB9D24;
}
.mortgag_form_div label{
  color:white;
}
.form-control{
  line-height:1.5;
}
.table td , .table th{
    border-bottom:1px solid #CB9D24;
    border-top:none; 
}
.table thead th{
    border-bottom:1px solid #CB9D24;
}

.table > tbody > tr > td {
     vertical-align: middle;
    
}
.table h4 {
    margin-bottom:0px;
}
.active td{
    padding-top:30px;
    padding-bottom:30px;
}
.button_yellow{
    color:white;
    background-color:#CB9D24;
}
.button_grey{
    color:white;
    background-color:#626262;
}
.button_green{
    color:white;
    background-color:#c0ce21;
}
.border_bottom_golden{
    border-bottom:2px solid #CB9D24;
    padding-bottom:10px;
}
</style>
<!-- TOP NAME DIV -->
<div class="col-md-10 mx-auto pt-5 pb-4">
    <div class="row">
        <div class="col-md-8">
            <h1 class=" font-weight-bold mb-2">Best Refinance Rates for July 2020</h1>
            <p>Published on July 30. Do you want to get more information ?</p>
        </div>
        <div class="col-md-4 text-right pt-3">
            <button class="btn button_green">DOWNLOAD OUR APP</button>
        </div>
    </div>
</div>

    <!-- Calculate form div -->
    <div class="col-md-12 py-4 mortgag_form_div">
        <div class="col-md-10 mx-auto px-0 ">
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
        </div>
    </div> 

    <!-- card view -->
    <div class="col-md-10 mx-auto card_row pb-4 pt-5">  
            <header class="section-header">
                <h3 class="mb-0">WHAT ARE YOU LOOKING FOR  ? </h3>
            </header> 
            <div class="pt-5 col-md-12 mx-auto row card_view px-0">
                <div class="col-md-2 px-1">
                    <div class="card px-1">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    <p>Low Upfront cart</p>
                    </div>
                </div>
                <div class="col-md-2 px-1">
                <div class="card px-1">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    <p>First time homebuyer</p>
                    </div>
                </div>
                <div class="col-md-2 px-1">
                <div class="card px-1">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                <p>FHA Loan</p>
                    </div>
                </div>
                <div class="col-md-2 px-1">
                    <div class="card px-1">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    <p>Quick Clocking</p>
                    </div>
                </div>
                <div class="col-md-2 px-1">
                    <div class="card px-1">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    <p>Veteran Military</p>
                    </div>
                </div>
                <div class="col-md-2 px-1">
                    <div class="card px-1">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    <p>Low Monthly Payment</p>
                    </div>
                </div>
            </div>
    </div> 
    <!--  table view  -->
    <div class="col-md-10 mx-auto px-0 py-5 ">
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
                            <h4><button class="btn button_yellow">SEE OFFER DETAILS</button></h4>
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
                            <h4><button class="btn button_grey">SEE OFFER DETAILS</button></h4>
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
                            <h4><button class="btn button_grey">SEE OFFER DETAILS</button></h4>
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
                            <h4><button class="btn button_grey">SEE OFFER DETAILS</button></h4>
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
                            <h4><button class="btn button_grey">SEE OFFER DETAILS</button></h4>
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
                            <h4><button class="btn button_grey">SEE OFFER DETAILS</button></h4>
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
                            <h4><button class="btn button_grey">SEE OFFER DETAILS</button></h4>
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
                            <h4><button class="btn button_grey">SEE OFFER DETAILS</button></h4>
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
                            <h4><button class="btn button_grey">SEE OFFER DETAILS</button></h4>
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
                            <h4><button class="btn button_grey">SEE OFFER DETAILS</button></h4>
                        </td>              
                    </tr>       
                </tbody>  
            </table>   
            <p class="font-weight-bold">This line can  be used to  as a desclaimer fo the user ,so that user will be upto date dummy data etc </p>
    </div>
     
   <!-- How rates are calculated -->
    <div class="col-md-10 mx-auto px-0 py-3 ">
       <h3 class="border_bottom_golden">How Rates are Calculated</h3>
       <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis pariatur earum eligendi laudantium cum, 
        autem at. Cum, dolores rem voluptatem maiores aspernatur consequuntur rerum minima cumque dolor commodi 
        mollitia hic. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, accusamus sint tempora 
        laborum dignissimos iste, nostrum quisquam odit temporibus, 
        voluptates at delectus alias. Aut, molestiae? Nulla illo a molestiae magnam.
       </p>
    </div>

    <!-- current mortgage and refine rates -->
    <div class="col-md-10 mx-auto px-0 py-3 ">
       <h3>Current Mortgage and Refinance Rates</h3>
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
        <p>* This line can  be used to  as a desclaimer fo the user ,so that user will be upto date dummy data etc </p>
     
       </p>
    </div>







 
 
  <!-- Darker Gold #CB9D24
Lighter Gold #E6C245
Grey #626262
Blue #002A75 -->

 



