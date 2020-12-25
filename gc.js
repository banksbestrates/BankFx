// ********************************************************************************
// *** Global Variables
// ********************************************************************************
   var HelloWorld;
   
   
// ********************************************************************************
// *** Determine if a number should be pluralized
// ********************************************************************************
   function plural(value, label) {
      return value + " " + label + (value == 1 ? "" : "s");
   }
   
   
// ********************************************************************************
// *** Determine if a number should be pluralized
// ********************************************************************************
   function fmtDate(dateValue) {
      return ("0" + (1 + dateValue.getMonth())).slice(-2) + "/"
           + ("0" + dateValue.getDate()).slice(-2)  + "/"
           +  dateValue.getFullYear();
   }
   
   
// ********************************************************************************
// *** 
// ********************************************************************************
   function initialize() {
        var selected = 0;
        var objArray = document.body.getElementsByTagName("*");
        var objIndex;
            
            for (objIndex = 0; objIndex < objArray.length; objIndex++) {
                 if (objArray[objIndex].id.indexOf("_bar") > 0) {
                     objArray[objIndex].tabIndex = -1;
                 } else if (selected == 0) {
                            if (objArray[objIndex].id.indexOf("_txt") > 0) {
                                selected  = 1;
                                objArray[objIndex].focus();
                            }
                 }
            }
            
            obj("amortizationData").classList.add("hideMe");
   }
   
   
// ********************************************************************************
// *** Fetch object by id
// ********************************************************************************
   function obj(id, lookFor, replace) {
      if (lookFor) {
          return document.getElementById(id.replace(lookFor, replace));
      } else {
          return document.getElementById(id);
      }
   }
   
   
// ********************************************************************************
// *** Remove irrelevant characters
// ********************************************************************************
   function numberOnly(value) {
      return value.replace(/[^\d.-]/g, "");
   }
   
   
// ********************************************************************************
// *** Format Percent
// ********************************************************************************
   function fmtPcnt(value) {
      return USD(value).replace("$", "") + "%";
   }
   
   
// ********************************************************************************
// *** Format Percent
// ********************************************************************************
   function fmtNumb(value) {
      return USD(value).replace("$", "").replace(".00", "");
   }
   
   
// ********************************************************************************
// *** Format USD Currency
// ********************************************************************************
   function USD(value) {
      return new Intl.NumberFormat('en-US', { style: 'currency'
                                            , currency: 'USD'
                                            , currencyDisplay: 'narrowSymbol'}).format(value);
   }
   
   
// ********************************************************************************
// *** 
// ********************************************************************************
   setTimeout("initialize()", 500);
