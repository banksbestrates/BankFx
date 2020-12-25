<!-- Bank Review -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-9">
            <h1 class="font-weight-900 mb-2">How Much Home Can I Afford ?</h1>
            <p>Published on <?php echo date('M y')?>. Do you want to get more information ?</p>
        </div>
        <div class="col-md-3 text-right pt-3">
            <button class="btn button_blue btn-sm">DOWNLOAD OUR APP</button>
        </div>
    </div>
</div>


<div class="container">
    <!-- 1st div starts here -->
    <div class="row mortgage_calculator mx-1">
            <div class="col-md-5 p-4 calculator_form_div">  
                <p class="text-justify"> Enter your details below to estimate your monthly mortgage payment with tases, feeds and insurance</p>
              <!-- first input  -->
                <lable class="pl-2">Purchase Price</lable>
                <div class="input-group mt-1">  
                    <span>
                        <i class="fa fa-dollar" aria-hidden="true"></i>
                    </span>
                    <input type="text"  placeholder="24,400"  />                  
                </div>
                <div class="range_slidecontainer">
                    <input type="range" min="1" max="100" value="50" class="slider mt-3 mb-4" id="myRange">
                </div> 
              <!-- second input  -->
                <lable class="pl-2">Dowpayment</lable>
                <div class="input-group mt-1">  
                    <span>
                        <i class="fa fa-dollar" aria-hidden="true"></i>
                    </span>
                    <input type="text"  placeholder="24,400"  />                  
                </div>
                <div class="range_slidecontainer">
                    <input type="range" min="1" max="100" value="35" class="slider mt-3 mb-4" id="myRange">
                </div> 
              <!--third input  -->
              <lable class="pl-2">Intrest Rate</lable>
                <div class="input-group mt-1">  

                    <input type="text"  placeholder="3.69"  />    
                    <span>
                        <i class="fa fa-percent" aria-hidden="true"></i>
                    </span>              
                </div>
                <div class="range_slidecontainer">
                    <input type="range" min="1" max="100" value="30" class="slider mt-3 mb-4" id="myRange">
                </div>
              <!--forth input  -->
              <lable class="pl-2">Intrest Rate</lable>
                <div class="input-group mt-1"> 
                    <select>  
                        <option>30 Year Fixed</option>
                        <option>20 Year Fixed </option>
                        <option>15 Year Fixed </option>
                        <option>10 Year Fixed</option>                       
                    </select>               
                </div>
              <!-- last input      -->
                <div class="input-group mt-4 no_border"> 
                    <select>  
                        <option>HOA Fees,Insurance & Taxes</option>                    
                    </select>               
                </div>
            </div>
            <div class="col-md-7 py-4 px-0 home_gross_income">
               <!-- top row -->
                <div class="col-md-12 px-0 gross_border_bottom">
                    <div class="col-md-10 px-0 mx-auto heading">                    
                        <i class="fa fa-money fa-2x"></i> <span class="px-3">Gross Income</span>                        
                    </div>  
                    <div class="row px-5 pb-3">
                        <div class="col-md-6">
                        <lable class="pl-2">Wages</lable>
                        <div class="input-group mt-1">  
                            <span><i class="fa fa-dollar" aria-hidden="true"></i></span>  
                            <input type="text"  placeholder="240,0000"  />                                         
                        </div>
                        </div>
                        <div class="col-md-6">
                            <lable class="pl-2">Wages</lable>
                            <div class="input-group mt-1">  
                                <span><i class="fa fa-dollar" aria-hidden="true"></i></span>  
                                <input type="text"  placeholder="3.69"  />                                         
                            </div>
                        </div>
                    </div>   
                    <div class="row px-5 pb-3">
                        <div class="col-md-6">
                            <lable class="pl-2">Wages</lable>
                            <div class="input-group mt-1">  
                                <span><i class="fa fa-dollar" aria-hidden="true"></i></span>  
                                <input type="text"  placeholder="3.69"  />                                         
                            </div>                     
                        </div>
                        <div class="col-md-6">
                            <lable class="pl-2">Wages</lable>
                            <div class="input-group mt-1">  
                                <span><i class="fa fa-dollar" aria-hidden="true"></i></span>  
                                <input type="text"  placeholder="3.69"  />                                         
                            </div>
                        </div>
                    </div>          
                </div>  
               <!-- bottm row -->
               <div class="col-md-12 px-0 pt-4">
                    <div class="col-md-10 px-0 mx-auto heading">                    
                        <i class="fa fa-money fa-2x"></i> <span class="px-3">Monthly Expenses</span>                        
                    </div>  
                    <div class="row px-5 pb-3">
                        <div class="col-md-6">
                        <lable class="pl-2">Wages</lable>
                        <div class="input-group mt-1">  
                            <span><i class="fa fa-dollar" aria-hidden="true"></i></span>  
                            <input type="text"  placeholder="3.69"  />                                         
                        </div>
                        </div>
                        <div class="col-md-6">
                            <lable class="pl-2">Wages</lable>
                            <div class="input-group mt-1">  
                                <span><i class="fa fa-dollar" aria-hidden="true"></i></span>  
                                <input type="text"  placeholder="3.69"  />                                         
                            </div>
                        </div>
                    </div>   
                    <div class="row px-5 pb-3">
                        <div class="col-md-6">
                            <lable class="pl-2">Wages</lable>
                            <div class="input-group mt-1">  
                                <span><i class="fa fa-dollar" aria-hidden="true"></i></span>  
                                <input type="text"  placeholder="3.69"  />                                         
                            </div>                     
                        </div>
                        <div class="col-md-6">
                            <lable class="pl-2">Wages</lable>
                            <div class="input-group mt-1">  
                                <span><i class="fa fa-dollar" aria-hidden="true"></i></span>  
                                <input type="text"  placeholder="3.69"  />                                         
                            </div>
                        </div>
                    </div>  
                    <div class="text-center">
                        <button class="btn button_yellow">CALCULATE</button>
                    </div>        
                </div> 

            </div>
        <!-- bottom available -->
        <div class="col-md-12 pt-4 pb-3 px-5 mx-auto result_dropdown" style="border-top:1px solid #626262">
            <p style="font-size:20px">Available Mortgage Limits (this dropdown when once they choose to calculate)</p>
            <span>Available Mortgage Payment</span>
            <span style="float:right">$2,146.00</span>
            <hr/>
            <span>Available Mortgage Payment</span>
            <span style="float:right">$2,1468.00</span>       
        </div> 
    </div>
</div> 


<div class="container py-5">
    <?php if(count($page_data)>=1){
      foreach($page_data as $d){?>
            <h3 class="border_bottom_golden pt-4 font-weight-900"><?php echo $d->heading ?></h3>
            <p><?php echo $d->content ?></p>
        <?php }
    }?>
</div>

 