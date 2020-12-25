// ********************************************************************************
// *** Global Variables
// ********************************************************************************
   var previousGridValue;
   var lastPaymentSelected;
   var roundingPercent;
   var roundingCeiling;
   
   
// ********************************************************************************
// *** Synchronize Object Sets
// ********************************************************************************
   function synchMoney(object, magicNumber = 1000, newAction) {
        var control_bar = obj(object.id.substring(0, object.id.length - 4) + "_bar");
        var control_txt = obj(object.id.substring(0, object.id.length - 4) + "_txt");
        var control_lbl = obj(object.id.substring(0, object.id.length - 4) + "_lbl");
        var sender_type = object.id.substring(object.id.length - 3);
        var numberValue;
        var formatValue;
            
            if (sender_type == "txt") {
                numberValue = numberOnly(object.value);
                formatValue = USD(numberValue).replace(".00", "");
                
                if (control_bar.max < (numberValue / magicNumber)) {
                    control_bar.max = (numberValue / magicNumber);
                }
                
                if (control_bar.min > (numberValue / magicNumber)) {
                    control_bar.min = (numberValue / magicNumber);
                }
                
                control_bar.value = numberValue / magicNumber;
                control_txt.value = (numberValue == 0 ? "" : formatValue);
            } else {
                numberValue = object.value * magicNumber;
                control_txt.value = USD(numberValue).replace(".00", "");
            }
            
            
            if (control_lbl) {
                if (control_txt.value == "") {
                    control_lbl.style.color = "transparent";
                } else {
                    control_lbl.innerText = control_txt.placeholder;
                    control_lbl.style.color = "black";
                }
            }
            
            
         // ***********************************************************************
         // *** In your <head> section, be sure to link to another javascript
         // *** file that will handle all calculator specific processing
         // ***********************************************************************
            if (newAction) { action(newAction); } else { action(); }
   }
   
   
// ********************************************************************************
// *** Synchronize Object Sets
// ********************************************************************************
   function synchPercent(object, newAction) {
        var control_bar = obj(object.id.substring(0, object.id.length - 4) + "_bar");
        var control_txt = obj(object.id.substring(0, object.id.length - 4) + "_txt");
        var control_lbl = obj(object.id.substring(0, object.id.length - 4) + "_lbl");
        var sender_type = object.id.substring(object.id.length - 3);
        var numberValue;
        var formatValue;
            
            if (sender_type == "txt") {
                numberValue = numberOnly(object.value);
                formatValue = Number(numberValue).toFixed(2) + "%";
                
                if (control_bar.max < (numberValue * 1000)) {
                    control_bar.max = (numberValue * 1000);
                }
                
                if (control_bar.min > (numberValue * 1000)) {
                    control_bar.min = (numberValue * 1000);
                }
                
                control_bar.value = numberValue * 1000;
                control_txt.value = (numberValue == 0 ? "" : formatValue);
            } else {
                numberValue = object.value / 1000;
                formatValue = Number(numberValue).toFixed(2) + "%";
                control_txt.value = formatValue;
            }
            
            
            if (control_lbl) {
                if (control_txt.value == "") {
                    control_lbl.style.color = "transparent";
                } else {
                    control_lbl.innerText = control_txt.placeholder;
                    control_lbl.style.color = "black";
                }
            }
            
            
         // ***********************************************************************
         // *** In your <head> section, be sure to link to another javascript
         // *** file that will handle all calculator specific processing
         // ***********************************************************************
            if (newAction) { action(newAction); } else { action(); }
   }   
   
// ********************************************************************************
// *** Synchronize Object Sets
// ********************************************************************************
   function synchTerm(object, newAction) {
        var control_bar = obj(object.id.substring(0, object.id.length - 4) + "_bar");
        var control_txt = obj(object.id.substring(0, object.id.length - 4) + "_txt");
        var control_lbl = obj(object.id.substring(0, object.id.length - 4) + "_lbl");
        var sender_type = object.id.substring(object.id.length - 3);
        var comparisons = object.value.toLowerCase();
        var numberValue;
        var formatValue;
            
            if (sender_type == "txt") {
                numberValue = numberOnly(object.value);
                if (comparisons.indexOf("year") >= 0 || comparisons.indexOf("yr") >= 0) {
                    numberValue = Number(numberValue) * 12;
                }
                formatValue = plural(fmtNumb(numberValue), "month");
                
                if (control_bar.max < Number(numberValue)) {
                    control_bar.max = Number(numberValue);
                }
                
                if (control_bar.min > Number(numberValue)) {
                    control_bar.min = Number(numberValue);
                }
                
                control_bar.value = numberValue;
                control_txt.value = (numberValue == 0 ? "" : formatValue);
            } else {
                numberValue = object.value;
                formatValue = USD(numberValue).replace(".00", "").replace("$", "")
                            + (numberValue == 0 ? " month" : " months");
                control_txt.value = formatValue;
            }
            
            
            if (control_lbl) {
                if (control_txt.value == "") {
                    control_lbl.style.color = "transparent";
                } else {
                    control_lbl.innerText = control_txt.placeholder;
                    control_lbl.style.color = "black";
                }
            }
            
            
         // ***********************************************************************
         // *** In your <head> section, be sure to link to another javascript
         // *** file that will handle all calculator specific processing
         // ***********************************************************************
            if (newAction) { action(newAction); } else { action(); }
   }
   
   
// ********************************************************************************
// *** 
// ********************************************************************************
   function getNewPayment(pmtAmount) {
        var pmtValue = parseFloat(pmtAmount);
        var rounding = [parseFloat("0" + numberOnly(obj("percent_txt").value))
                       ,parseFloat("0" + numberOnly(obj("roundValue_txt").value))
                       ];
            rounding[0] = parseFloat(rounding[0] / 100);
            rounding[1] = parseFloat(rounding[1]);
            
         // ***********************************************************************
         // *** Determine adjusted payment amount
         // ***********************************************************************
            if (rounding[0] > parseFloat("0.00")) {
                pmtValue = (pmtValue * (1 + rounding[0])).toFixed(2);
            }
            
            if (rounding[1] > parseFloat("0.00")) {
                pmtValue = rounding[1] * Math.ceil(pmtValue / rounding[1]);
            }
            
            if (pmtValue < pmtAmount) {
                pmtValue = pmtAmount;
            }
            
            return pmtValue;
   }
   
   
// ********************************************************************************
// *** 
// ********************************************************************************
   function calculateSavings(pmt, term, rate, loan, interestTotal) {
        var accrued = parseFloat("0.0");
        var rateVal = parseFloat(rate) / 1200;
        var loanAmt = parseFloat(loan);
        var intText;
        var message;
            
            for (var i = 1; i <= parseInt(term); i++) {
                 intText  = (loanAmt * rateVal).toFixed(2);
                 accrued  = parseFloat(accrued) + parseFloat(intText);
                 loanAmt -= (parseFloat(pmt) - intText);
                 if (loanAmt <= 0.00) { break; }
            }
            
            message = [parseInt(term) - i, parseFloat(interestTotal) - parseFloat(accrued)];
            message[0] = (message[0] = 0 ? "" : plural(message[0], "month"));
            message[1] = (message[1] = 0 ? "" : USD(message[1]));
            message[0] = (message[0] != "" && message[1] != "" ? message[0] + " and " : "");
            
            return message.join("");
   }
   
   
// ********************************************************************************
// *** 
// ********************************************************************************
   function action(newAction) {
    if (!newAction) {
        var loanStart = parseFloat("0" + numberOnly(obj("amt_txt").value));
        var rateStart = parseFloat("0" + numberOnly(obj("int1_txt").value));
        var rateCease = parseFloat("0" + numberOnly(obj("int2_txt").value));
        var rateSteps = parseFloat("0" + numberOnly(obj("int3_txt").value));
        var termStart = parseFloat("0" + numberOnly(obj("term1_txt").value));
        var termCease = parseFloat("0" + numberOnly(obj("term2_txt").value));
        var termSteps = parseFloat("0" + numberOnly(obj("term3_txt").value));
            
         // ***********************************************************************
         // *** Conditionally flip the "starting" and "ending" values
         // ***********************************************************************
            rateCease = (rateCease < rateStart, rateStart, rateCease);
            if (rateSteps <= 0.00) {
                rateCease  = rateStart;
                rateSteps  = rateStart;
            }
            
            termCease = (termCease < termStart, termStart, termCease);
            if (termSteps <= 0.00) {
                termCease  = termStart;
                termSteps  = termStart;
            }
            
         // ***********************************************************************
         // *** Major container handlers
         // ***********************************************************************
            var parameters        = document.getElementsByClassName("parameters")[0];
            var spacer            = document.getElementsByClassName("spacer")[0];
            var scrollable        = document.getElementsByClassName("scrollable")[0];
            var amortizationTable = document.getElementsByClassName("amortizationTable")[0];

            
         // ***********************************************************************
         // *** Prepare to loop from termStart to termCease increment by termSteps
         // ***********************************************************************
           var termLoop;
           var rateLoop;
           var interest;
           var multiply;
           var newValue;
           var powerIdx;
           var payments;
           var loanCost;
           var incValue;
           var saveText;
           var pymtGrid = "";
           
        // ************************************************************************
        // *** Hide detail displays
        // ************************************************************************
           scrollable.innerHTML = '<table class="detail table">'
                                + '<tr><th>Term</th>'
                                + '<th>Rate</th>'
                                + '<th>Payment</th>'
                                + '<th>Tot Interest</th>'
                                + '<th>Adv Payment</th>'
                                + '<th>Savings</th>'
                                + '</tr>'
                                + '</table>';
           obj("amortizationData").classList.add("hideMe");
           
        // ************************************************************************
        // *** Only process if the loan amount, interest rate, or term are not 0
        // ************************************************************************
           if ((loanStart * rateStart * termStart) != 0) {
                for (termLoop = termStart;
                     termLoop < (termCease * 2);
                     termLoop =  termLoop + termSteps) {
                     
                     termLoop = (termLoop > termCease ? termCease : termLoop);
                     for (rateLoop =  rateStart;
                          rateLoop < (rateCease * 2);
                          rateLoop =  rateLoop + rateSteps) {
                          
                      // **********************************************************
                      // *** If the currently incremented interest rate exceeeds
                      // ***    max interest rate, set rate to max interest rate
                      // **********************************************************
                         rateLoop = (rateLoop > rateCease ? rateCease : rateLoop);
                         
                      // **********************************************************
                      // *** Determine the monthly interest rate
                      // **********************************************************
                         interest = (rateLoop / 100) / 12;
                         
                      // **********************************************************
                      // *** Determine the base multipler used for amortization
                      // **********************************************************
                         multiply = 1 + interest;
                         
                      // **********************************************************
                      // *** Raise the base multiplier exponentially as needed
                      // **********************************************************
                         newValue = multiply;
                         for (powerIdx = 1; powerIdx < termLoop; powerIdx++) {
                              newValue = newValue * multiply;
                         }
                         
                      // **********************************************************
                      // *** Determine calculated payment amount, round to 2 digits
                      // **********************************************************
                         payments = loanStart * ((interest * newValue) / (newValue - 1));
                         loanCost = (payments * termLoop) - loanStart;
                         payments = payments.toFixed(2);
                         
                      // **********************************************************
                      // *** Determine advanced payment and savings
                      // **********************************************************
                         incValue = getNewPayment(payments);
                         saveText = calculateSavings(incValue, termLoop, rateLoop, loanStart, loanCost);
                         
                      // **********************************************************
                      // *** Continue building variable "pymtGrid"
                      // **********************************************************
                         pymtGrid += '<tr id="$' + termLoop + '$' + rateLoop + USD(payments) + USD(loanCost) + '"'
                                  +  ' onMouseDown="amortize(this);">'
                                  +  '<td>' + termLoop + '</td>'
                                  +  '<td>' + fmtPcnt(rateLoop) + '</td>'
                                  +  '<td>' + USD(payments)  + '</td>'
                                  +  '<td>' + USD(loanCost)  + '</td>'
                                  +  '<td>' + USD(incValue)  + '</td>'
                                  +  '<td>' + saveText       + '</td>'
                                  +  '</tr>';
                         
                      // **********************************************************
                      // *** If the uppermost interest rate was calculated, force
                      // ***    the interst rate loop to terminate
                      // **********************************************************
                         if (rateLoop == rateCease) { break; }
                    }
                    
                 // ***************************************************************
                 // *** If the uppermost term was just processed, force the
                 // ***    the loan term loop to terminate
                 // ***************************************************************
                    if (termLoop == termCease) { break; }
               }
            // ********************************************************************
            // *** Populate the "Payment" object
            // ********************************************************************
               pymtGrid = '<table class="detail table">'
                        + '<tr>'
                        + '<th>Term</th>'
                        + '<th>Rate</th>'
                        + '<th>Payment</th>'
                        + '<th>Tot Interest</th>'
                        + '<th>Adv Payment</th>'
                        + '<th>Savings</th>'
                        + '</tr>'
                        +  pymtGrid
                        + '</table>';
               
               if (previousGridValue != pymtGrid) {
                   scrollable.innerHTML = pymtGrid;
               }
          }
    } else {
      switch (newAction) {
         case "amortize": amortize(lastPaymentSelected);
                          break;
      }
    }
   }
   
   
// ********************************************************************************
// *** Prepare for amortization grid
// ********************************************************************************
   function amortize(object) {
    if (object) {
        var rounding = [parseFloat("0" + numberOnly(obj("percent_txt").value))
                       ,parseFloat("0" + numberOnly(obj("roundValue_txt").value))
                       ];
            
        var processObj = "YES";
            if (lastPaymentSelected) {
                if (lastPaymentSelected.id == object.id && roundingPercent == rounding[0]
                                                        && roundingCeiling == rounding[1]) {
                    processObj = "NO";
                }
            }
            
            if (processObj == "YES") {
                roundingPercent = rounding[0];
                roundingCeiling = rounding[1];
                setTimeout("amortizationGrid('" + object.id + "')", 250);
            }
    }
   }
   
   
// ********************************************************************************
// *** Amortize
// ********************************************************************************
   function amortizationGrid(objectId) {
        var rounding = [parseFloat("0" + numberOnly(obj("percent_txt").value))
                       ,parseFloat("0" + numberOnly(obj("roundValue_txt").value))
                       ];
            rounding[0] = parseFloat(1 + (rounding[0] / 100));
            rounding[1] = parseInt(rounding[1]);
            
        var param = objectId.split("$");
            param[1] = parseFloat("0" + param[1].replace(",", "")); // *** term
            param[2] = parseFloat("0" + param[2].replace(",", "")); // *** interest
            param[3] = parseFloat("0" + param[3].replace(",", "")); // *** payment
            param[4] = parseFloat("0" + param[4].replace(",", "")); // *** interest
            
            param[2] = (param[2] / 100) /  12;
            param[0] =  param[3];
            
        var saving = ["", ""];
        var result = '<table class="detail table">'
                   + '<tr>'
                   + '<th>Pmt #</th>'
                   + '<th>Payment Date</th>'
                   + '<th>Payment</th>'
                   + '<th>Principal</th>'
                   + '<th>Interest</th>'
                   + '<th>New Balance</th>'
                   + '</tr>';
            
     // ***************************************************************************
     // *** processArray[0] = Loan Amount
     // *** processArray[1] = Payment Number
     // *** processArray[2] = Payment Date
     // *** processArray[3] = Payment Amount
     // *** processArray[4] = Principal
     // *** processArray[5] = Interest
     // *** processArray[6] = New Balance
     // *** processArray[7] = Accrued Interest
     // ***************************************************************************
        var processArray = [parseFloat("0" + numberOnly(obj("amt_txt").value))
                           ,parseInt("0")
                           ,new Date()
                           ,parseFloat("0.00")
                           ,parseFloat("0.00")
                           ,parseFloat("0.00")
                           ,parseFloat("0" + numberOnly(obj("amt_txt").value))
                           ,parseFloat("0.00")
                           ];
            processArray[2].setDate(1);
            
            
         // ***********************************************************************
         // *** Adjust grid to show selection
         // ***********************************************************************
            if (lastPaymentSelected) {
                lastPaymentSelected.classList.remove("cellSelected");
            }
            
            lastPaymentSelected = obj(objectId);
            lastPaymentSelected.classList.add("cellSelected");
            
            
         // ***********************************************************************
         // *** Determine adjusted payment amount
         // ***********************************************************************
            param[0] = getNewPayment(param[3]);
            
            
         // ***********************************************************************
         // *** Build "pmtDetails"
         // ***        Float.param[0] := payment  (increased)
         // ***        Float.param[1] := term     (in months)
         // ***        Float.param[2] := interest (monthly)
         // ***        Float.param[3] := payment
         // ***        Float.param[4] := interest (total assumed)
         // ***        
         // ***        processArray[0] = Loan Amount (original - unchanging)
         // ***        processArray[1] = Payment Number
         // ***        processArray[2] = Payment Date
         // ***        processArray[3] = Payment Amount
         // ***        processArray[4] = Principal
         // ***        processArray[5] = Interest
         // ***        processArray[6] = New Balance
         // ***        processArray[7] = Accrued Interest
         // ***********************************************************************
            for (payment = 1; payment <= param[1]; payment++) {
                 processArray[5] = (param[2] * processArray[6]).toFixed(2);
                        if (processArray[5] > (param[4] - processArray[7])) {
                            processArray[5] = (param[4] - processArray[7]);
                        }
                 processArray[4] = (param[0] - processArray[5]).toFixed(2);
                 processArray[3] =  param[0];
                        if (processArray[3] > (parseFloat(processArray[5]) + parseFloat(processArray[6]))) {
                            processArray[3] = (parseFloat(processArray[5]) + parseFloat(processArray[6]));
                            processArray[4] = (parseFloat(processArray[3]) - parseFloat(processArray[5]));
                        }
                 processArray[2].setMonth(processArray[2].getMonth() + 1);
                 processArray[1]++;
                 
                 processArray[6] = (payment < param[1] ? (processArray[6] - processArray[4]).toFixed(2) : 0.00);
                 processArray[7] = parseFloat(processArray[7]) + parseFloat(processArray[5]);
                 
                 result += '<tr>'
                        +  '<td>' + fmtNumb(processArray[1]) + '</td>'
                        +  '<td>' + fmtDate(processArray[2]) + '</td>'
                        +  '<td>' +     USD(processArray[3]) + '</td>'
                        +  '<td>' +     USD(processArray[4]) + '</td>'
                        +  '<td>' +     USD(processArray[5]) + '</td>'
                        +  '<td>' +     USD(processArray[6]) + '</td>'
                        +  '</tr>';
                 
                 if (parseFloat(processArray[6]) <= 0) { break; }
            }
            result += '</table>';
            
            saving[0] = ((param[1] - payment) > 0 ? "Projected payoff date is " + plural(fmtNumb(param[1] - payment), "month") + " sooner" : "")
            saving[1] = ((param[4] - processArray[7]) <= 0 ? "" : "Savings in unpaid interest will be " + USD(param[4] - processArray[7]));
            
            obj("amortizationData").innerHTML = result;
            obj("amortizationData").style.maxHeight = obj("calculatorValues").offsetHeight + "px";
            obj("amortizationData").classList.remove("hideMe");
   }


