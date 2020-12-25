<!DOCTYPE html>
  
  

  <html>
  
 
  <head>
     <link rel='stylesheet' type='text/css' href='gc.css'>
     <script type='text/javascript' src='gc.js'></script>
     <script type='text/javascript' src='AmortizationSchedule.js'></script>
  </head>
  

  <body>
    <div id="calculatorCanvas" class="calculator">
        <h1 id="calculatorCanvas_Header" class="titleBar">Amortization Schedule</h1>
        <div id="calculatorValues" class="parameters">
            <div id="loanAmount" class="inputElement">
                <label id="amt_tag" for="amt_txt" class="fieldLabel" style="color: black;">Loan Amount</label><br>
                <input id="amt_txt" title="Loan Amount" placeholder="Loan Amount" type="text" class="fieldWidth" onkeyup="synchMoney(this)"><br>
                <input id="amt_bar" title="Loan Amount" min="25" max="1000" value="25" onchange="synchMoney(this)" type="range" class="fieldWidth">
            </div>
            
            <label id="int_lbl" for="int1_txt" class="fieldLabel" style="color: black;">Interest Rate Range</label><br>
            <table id="interest" style="width: 100%;">
                <tr><td id="intRateLow" class="threeAcross">
                       <input id="int1_txt" title="Minimum Interest Rate" placeholder="Min" type="text" class="fieldWidth" onblur="synchPercent(this)"><br>
                       <input id="int1_bar" title="Minimum Interest Rate" min="0" max="50000" value="0" onchange="synchPercent(this)" type="range" class="fieldWidth">
                    </td>
                    <td id="intRateTop" class="threeAcross">
                       <input id="int2_txt" title="Maximum Interest Rate" placeholder="Max" type="text" class="fieldWidth" onblur="synchPercent(this)"><br>
                       <input id="int2_bar" title="Maximum Interest Rate" min="0" max="50000" value="0" onchange="synchPercent(this)" type="range" class="fieldWidth">
                    </td>
                    <td id="intRateInc" class="threeAcross">
                       <input id="int3_txt" title="Interest Rate Step Value" placeholder="Step" type="text" class="fieldWidth" onblur="synchPercent(this)"><br>
                       <input id="int3_bar" title="Interest Rate Step Value" min="0" max="5000" value="0" onchange="synchPercent(this)" type="range" class="fieldWidth">
                    </td>
                </tr>
            </table>
            
            <label id="term_lbl" for="term1_txt" class="fieldLabel" style="color: black;">Term Range</label><br>
            <table id="term" style="width: 100%;">
                <tr><td id="termLow" class="threeAcross">
                       <input id="term1_txt" title="Minimum Term" placeholder="Min" type="text" class="fieldWidth" onblur="synchTerm(this)"><br>
                       <input id="term1_bar" title="Minimum Term" min="0" max="1200" value="0" onchange="synchTerm(this)" type="range" class="fieldWidth">
                    </td>
                    <td id="termTop" class="threeAcross">
                       <input id="term2_txt" title="Maximum Term" placeholder="Max" type="text" class="fieldWidth" onblur="synchTerm(this)"><br>
                       <input id="term2_bar" title="Maximum Term" min="0" max="1200" value="0" onchange="synchTerm(this)" type="range" class="fieldWidth">
                    </td>
                    <td id="termInc" class="threeAcross">
                       <input id="term3_txt" title="Term Step Value" placeholder="Step" type="text" class="fieldWidth" onblur="synchTerm(this)"><br>
                       <input id="term3_bar" title="Term Step Value" min="0" max="1200" value="0" onchange="synchTerm(this)" type="range" class="fieldWidth">
                    </td>
                </tr>
            </table>
            
            <label id="percent_tag" for="percent_txt" class="fieldLabel" style="color: black;">Increase Payment for Early Payoff</label><br>
            <table id="term" style="width: 100%;">
                <tr><td id="extraPcnt" class="threeAcross">
                       <input id="percent_txt" title="Increase my payment by a percentage" placeholder="% Increase" value="10%" type="text" class="fieldWidth" onblur="synchPercent(this, 'amortize')"><br>
                       <input id="percent_bar" title="Increase my payment by a percentage" min="0" max="25000" value="10000" onchange="synchPercent(this, 'amortize')" type="range" class="fieldWidth">
                    </td>
                    <td id="roundValue" class="threeAcross">
                       <input id="roundValue_txt" title="Round my payment up to the nearest..." placeholder="Round up to..." value="$50" type="text" class="fieldWidth" onkeyup="synchMoney(this, 25, 'amortize')"><br>
                       <input id="roundValue_bar" title="Round my payment up to the nearest..." min="0" max="20" value="2" onchange="synchMoney(this, 25, 'amortize')" type="range" class="fieldWidth">
                    </td>
                </tr>
            </table>
            <span id="save_month" class="savings"></span><br>
            <span id="save_money" class="savings"></span>
            
        </div>
        <div class="spacer"></div>
        <div id="calculatorDetail" class="scrollable">
            <table class="detail">
                <tr><th class="tableHeader">Term</th>
                <th class="tableHeader">Rate</th>
                <th class="tableHeader">Payment</th>
                <th class="tableHeader">Tot Interest</th>
                </tr>
            </table>
        </div>
        <div id="amortizationData" class="amortizationTable">
            <table class="detail">
              <tr><th style="text-align: right;">Pmt #</th>
                  <th style="text-align:  left;">Payment Date</th>
                  <th style="text-align: right;">Payment</th>
                  <th style="text-align: right;">Principal</th>
                  <th style="text-align: right;">Interest</th>
                  <th style="text-align: right;">New Balance</th>
                  </tr>
            </table>
        </div>
    </div>
    
    <script>
     obj("calculatorDetail").style.height = obj("calculatorValues").offsetHeight + "px";
    </script>
  </body>

  </html>
