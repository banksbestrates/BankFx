

  <style>
      input {
          border:2px solid black;
      }
  </style>
    <!-- <link href="gc.css" type="stylesheet"></link> -->
    <link rel='stylesheet' type='text/css' href='gc.css'>
     <script type='text/javascript' src='gc.js'></script>
     <script type='text/javascript' src='help.js'></script>
     <script type='text/javascript' src='AmortizationSchedule.js'></script>
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="font-weight-900 mb-2">Loan Calculator</h1>
                <!-- <p>Published on <?php echo date('M d')?>. Do you want to get more information ?</p> -->
            </div>
        </div>
    </div>

    <!-- Loan calculator top content -->
    <div class="container pb-5">
        <?php if(count($page_data)>=1){
                foreach($page_data as $d){
                if($d->div_type == "top"){?>
                    <h5 class="mb-2"><?php echo $d->heading;?></h5>
                   <div class="text-justify"><?php echo $d->content;?></div>
            <?php } 
            }
        }?>
    </div>

    <div class="container">
            <!-- <div class="col-md-11 mx-auto"> -->
                <div class="row  mx-1">
                    <div class="col-md-9  mortgage_calculator calculator_form_div">  
                        <div class="row">
                            <div class="col-md-5 pt-2">
                                <!-- <p class="text-justify"> Enter your details below to estimate your loan rates</p> -->
                                <div id="calculatorValues" class="parameters">
                                    <div id="loanAmount" class="inputElement">
                                        <label id="amt_tag" for="amt_txt" class="fieldLabel" style="color: black;">Loan Amount</label><br>
                                        <input id="amt_txt" title="Loan Amount" placeholder="Loan Amount" type="text" class="fieldWidth form-control" onkeyup="synchMoney(this)">
                                        <input id="amt_bar" title="Loan Amount" min="25" max="1000" value="25" onchange="synchMoney(this)" type="range" class="fieldWidth form-control"><br/>
                                    </div>                       
                                    <label id="int_lbl" for="int1_txt" class="fieldLabel" style="color: black;">Interest Rate Range</label><br>
                                    <table id="interest" style="width: 100%;">
                                        <tr><td id="intRateLow" class="threeAcross">
                                            <input id="int1_txt" title="Minimum Interest Rate" placeholder="Min" type="text" class="fieldWidth form-control" onblur="synchPercent(this)">
                                            <input id="int1_bar" title="Minimum Interest Rate" min="0" max="50000" value="0" onchange="synchPercent(this)" type="range" class="fieldWidth form-control"><br/>
                                            </td>
                                            <td id="intRateTop" class="threeAcross">
                                            <input id="int2_txt" title="Maximum Interest Rate" placeholder="Max" type="text" class="fieldWidth form-control" onblur="synchPercent(this)">
                                            <input id="int2_bar" title="Maximum Interest Rate" min="0" max="50000" value="0" onchange="synchPercent(this)" type="range" class="fieldWidth form-control"><br/>
                                            </td>
                                            <td id="intRateInc" class="threeAcross">
                                            <input id="int3_txt" title="Interest Rate Step Value" placeholder="Step" type="text" class="fieldWidth form-control" onblur="synchPercent(this)">
                                            <input id="int3_bar" title="Interest Rate Step Value" min="0" max="5000" value="0" onchange="synchPercent(this)" type="range" class="fieldWidth form-control"><br/>
                                            </td>
                                        </tr>
                                    </table>
                                    
                                    <label id="term_lbl" for="term1_txt" class="fieldLabel" style="color: black;">Term Range</label><br>
                                    <table id="term" style="width: 100%;">
                                        <tr><td id="termLow" class="threeAcross">
                                            <input id="term1_txt" title="Minimum Term" placeholder="Min" type="text" class="fieldWidth form-control" onblur="synchTerm(this)">
                                            <input id="term1_bar" title="Minimum Term" min="0" max="1200" value="0" onchange="synchTerm(this)" type="range" class="fieldWidth form-control"><br/>
                                            </td>
                                            <td id="termTop" class="threeAcross">
                                            <input id="term2_txt" title="Maximum Term" placeholder="Max" type="text" class="fieldWidth form-control" onblur="synchTerm(this)">
                                            <input id="term2_bar" title="Maximum Term" min="0" max="1200" value="0" onchange="synchTerm(this)" type="range" class="fieldWidth form-control"><br/>
                                            </td>
                                            <td id="termInc" class="threeAcross">
                                            <input id="term3_txt" title="Term Step Value" placeholder="Step" type="text" class="fieldWidth form-control" onblur="synchTerm(this)">
                                            <input id="term3_bar" title="Term Step Value" min="0" max="1200" value="0" onchange="synchTerm(this)" type="range" class="fieldWidth form-control"><br/>
                                            </td>
                                        </tr>
                                    </table>
                                    
                                    <label id="percent_tag" for="percent_txt" class="fieldLabel" style="color: black;">Increase Payment for Early Payoff</label><br>
                                    <table id="term" style="width: 100%;">
                                        <tr><td id="extraPcnt" class="threeAcross">
                                            <input id="percent_txt" title="Increase my payment by a percentage" placeholder="% Increase" value="10%" type="text" class="fieldWidth form-control" onblur="synchPercent(this, 'amortize')">
                                            <input id="percent_bar" title="Increase my payment by a percentage" min="0" max="25000" value="10000" onchange="synchPercent(this, 'amortize')" type="range" class="fieldWidth form-control"><br/>
                                            </td>
                                            <td id="roundValue" class="threeAcross">
                                            <input id="roundValue_txt" title="Round my payment up to the nearest..." placeholder="Round up to..." value="$50" type="text" class="fieldWidth form-control" onkeyup="synchMoney(this, 25, 'amortize')">
                                            <input id="roundValue_bar" title="Round my payment up to the nearest..." min="0" max="20" value="2" onchange="synchMoney(this, 25, 'amortize')" type="range" class="fieldWidth form-control"><br/>
                                            </td>
                                        </tr>
                                    </table>
                                    <span id="save_month" class="savings"></span><br>
                                    <span id="save_money" class="savings"></span>               
                                </div>
                            </div>
                            <div class="col-md-7 py-4 px-0 pie_chart_div">
                                <div id="calculatorDetail" class="scrollable">
                                    <table class="detail table">
                                    <tr>
                                        <th class="tableHeader">Term</th>
                                        <th class="tableHeader">Rate</th>
                                        <th class="tableHeader">Payment</th>
                                        <th class="tableHeader">Tot Interest</th>
                                        <th class="tableHeader">Adv Payment</th>
                                        <th class="tableHeader">Savings</th>
                                    </tr>
                                    </table>
                                </div>             
                            </div><br/>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div id="getHelp" class="helpImage" onClick="help()"></div>
                        <div id="gotHelp" class="helpHeader">
                            <div id="helpDetail" class="helpDetail"></div>
                            <div style="position: absolute; bottom: 45px; width: 100%;">
                                <img id="hlpBack" src="btnBack.png" onclick="helpClick(this);" style="cursor: pointer; float: left;">
                                <img id="hlpExit" src="btnExit.png" onclick="helpClick(this);" style="cursor: pointer; position: absolute; left: 140px;">
                                <img id="hlpNext" src="btnNext.png" onclick="helpClick(this);" style="cursor: pointer; position: absolute; left: 260px;">
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
    </div>
    <div class="container pt-3">
        <div id="amortizationData" class="amortizationTable" style="border: 1px solid black;">
            <table class="detail table">
                <tr>
                <th>Pmt #</th>
                <th>Payment Date</th>
                <th>Payment</th>
                <th>Principal</th>
                <th>Interest</th>
                <th>New Balance</th>
                </tr>
            </table>
        </div>
    </div>

    <!-- Loan calculator bottom content -->
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
    <script>
     obj("calculatorDetail").style.height = obj("calculatorValues").offsetHeight + "px";
    </script>





<!-- <div class="container text-center">
    <iframe style="width:100%;height:100vh; border:none" src="<?php echo base_url()?>AmortizationSchedule"></iframe>
</div> -->


<!-- <div class="col-md-10 mx-auto pb-5">
    <div class="row mortgage_calculator mx-1">
            <div class="col-md-5 p-4 calculator_form_div">  
                <p class="text-justify"> Enter your details below to estimate your monthly mortgage payment with tases, feeds and insurance</p>
            
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
             
              <lable class="pl-2">Intrest Rate</lable>
                <div class="input-group mt-1"> 
                    <select>  
                        <option>30 Year Fixed</option>
                        <option>20 Year Fixed </option>
                        <option>15 Year Fixed </option>
                        <option>10 Year Fixed</option>                       
                    </select>               
                </div>
          
                <div class="input-group mt-4 no_border"> 
                    <select>  
                        <option>HOA Fees,Insurance & Taxes</option>                    
                    </select>               
                </div>
               
            </div>
            <div class="col-md-7 py-4 px-0 pie_chart_div">
                <div class="col-md-12 px-0 top_div">
                    <div class="row pb-3 px-0">
                        <div class="col-md-6 active">Payment Breakdown</div>
                        <div class="col-md-6">Payment Over Time</div>
                    </div>     
                </div>  
                <div class="col-md-12 px-0 progress_div">
               
                        <div class="text-center pt-5 mx-5 ">
                            <h1 class="display-4 mb-2 font-weight-bold text_green">$1,523</h1>
                                <p class="font-weight-light text-secondary mb-1">Mortgage Rate</p>
                            <div class="progress">
                                <div class="progress-bar button_green" style="width:50%"></div>
                            </div>
                        </div>
                
                        <div class="text-center pt-4 mx-5 ">
                            <h1 class="mb-2 text_blue">$500</h1>
                                <p class="font-weight-light text-secondary mb-1">Home Insurance</p>
                            <div class="progress">
                                <div class="progress-bar button_blue" style="width:50%"></div>
                            </div>
                        </div>

                        <div class="text-center pt-4 mx-5 ">
                            <h1 class="mb-2  text_ligth_yellow">$500</h1>
                                <p class="font-weight-light text-secondary mb-1">Taxes & Other Fees</p>
                            <div class="progress">
                                <div class="progress-bar button_light_yellow" style="width:50%"></div>
                            </div>
                        </div>
                </div>  
                   
                
            </div>
    </div>
</div>  -->
  




