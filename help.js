// ********************************************************************************
// *** Global Variables
// ********************************************************************************
   var helpScreen = 0;
   
   
// ********************************************************************************
// *** 
// ********************************************************************************
   function help() {
        var caller = obj("getHelp");
        var shower = obj("gotHelp");
        var detail = obj("helpDetail");
            
            helpScreen = 0;
            caller.style.display = "none";
            shower.style.display = "block";
            detail.innerHTML = "Hello... I am Penelope, and I will teach you how "
                             + "to use this calculator. It's very simple really, "
                             + "and teaching you will be my pleasure.";
   }
   
   
// ********************************************************************************
// *** 
// ********************************************************************************
   function helpClick(object) {
        var caller = obj("getHelp");
        var shower = obj("gotHelp");
        var detail = obj("helpDetail");
        var newTxt = "";
        var target = "";
            
            if (object.id == "hlpExit") {
                helpScreen = 0;
                caller.style.display = "block";
                shower.style.display = "none";
            } else {
                helpScreen = helpScreen + (object.id == "hlpBack" ? -1 : +1);
                switch (helpScreen) {
                   case 0: newTxt = "Hello... I am Penelope, and I will teach you how "
                                  + "to use this calculator. It's very simple really, "
                                  + "and teaching you will be my pleasure.";
                           break;
                   case 1: newTxt = "We start by entering a Loan Amount; either by typing "
                                  + "it into the text box or by using the scrollbar. This "
                                  + "is the loan amount you will finance.";
                           target = "amt_txt";
                           break;
                   case 2: newTxt = "Instead of using only one interest rate, I am equipped "
                                  + "to process a range of rates if you want. Enter the rate "
                                  + "you will finance with here.";
                           target = "int1_txt";
                           break;
                   case 3: newTxt = "If you've entered your base interest rate, now's your "
                                  + "chance to enter the 'high end' you are willing to pay "
                                  + "in interest when financing your loan.";
                           target = "int2_txt";
                           break;
                   case 4: newTxt = "You entered a low-end, and high-end, for loan amounts, "
                                  + "now to tell me what 'step value' to use... 1%, 0.5%, "
                                  + "or pretty near any other steo value.";
                           target = "int3_txt";
                           break;
                   case 5: newTxt = "As with interest rate, I'm equipped to process a range "
                                  + "of term lengths. Enter the term for financing in months, "
                                  + "or enter a number followed by 'yr'";
                           target = "term1_txt";
                           break;
                   case 6: newTxt = "Okay... now to enter the 'high end' for financing term.";
                           target = "term2_txt";
                           break;
                   case 7: newTxt = "And, as with the Interest rate, please enter your step "
                                  + "value.";
                           target = "term3_txt";
                           break;
                   case 8: newTxt = "Now is where my power really shines. Giving you all sorts "
                                  + "of options for financing is the start... now to show you "
                                  + "how to save time and money.";
                           target = "percent_txt";
                           break;
                   case 9: newTxt = "Believe it or not, rounding up to an 'even number' is a "
                                  + "psychological trick that will get you to feel better "
                                  + "about the amount you're spending.";
                           target = "roundValue_txt";
                           break;
                   case 10: newTxt = '<img src="amortizationFormula.jpg" style="top: 40px; left: 10px; width: 260px; position: relative;">';
                            break;
                   default:
                        helpScreen = 0;
                        caller.style.display = "block";
                        shower.style.display = "none";
                }
                detail.innerHTML = newTxt;
                if (target != "") { setTimeout("flash('" + target + "', 0)", 2500); }
            }
   }
   
   
// ********************************************************************************
// *** 
// ********************************************************************************
   function flash(objectId, blue = 0) {
      if (blue == 0) { obj(objectId).focus(); }
      obj(objectId).style.backgroundColor = "rgb(255, 255, " + blue + ")";
      blue++;
      if (blue <= 255) { setTimeout("flash('" + objectId + "', " + blue + ")", 10); }
   }
