<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>BankFx</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link href="<?php echo base_url()?>assets/img/logo/main_logo_image.png" rel="icon">
  <link href="<?php echo base_url()?>asssets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url()?>/assets/lib/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url()?>/assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>/assets/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>/assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>/assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url()?>/assets/css/style.css" rel="stylesheet">
  <script src="<?php echo base_url()?>/assets/lib/jquery/jquery.min.js"></script>

</head>

<body>
<style>
  
/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width:100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
}


/* Add an active class to the active dropdown button */
.dropdown-btn .active {
  background-color: green;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}
/* The side navigation menu */
.sidenav {
  height: 100%; /* 100% Full-height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 800; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 60px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
  bottom: 0;
  background: rgba(0, 0, 0, 0.96);
  box-shadow: 0px 10px 10px black;
  overflow-y: auto;
  transition: 0.4spadding-left:20px;
}

/* The navigation menu links */
.sidenav a {

    font-size: 13px;
    text-transform: uppercase;
    overflow: hidden;
    padding: 10px 22px 10px 15px;
    position: relative;
    text-decoration: none;
    width: 100%;
    display: block;
    outline: none;
    font-weight: 700;
    font-family: "Montserrat", sans-serif;
}

/* When you mouse over the navigation links, change their color
.sidenav a:hover {
  color: #f1f1f1;
} */

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
  position: absolute;
  top: 0;
  /* right: 25px; */
  font-size: 36px;
  /* margin-left: 50px; */
  padding: 20px 0px 30px 0px;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
/* #main {
  transition: margin-left .5s;
  padding: 20px;
} */

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.sidenav ul li.active > a {
    background: transparent;
    color: #96871a;
    background-color: white;
}
.sidenav ul li {
  border: 1px solid;
}
.sidenav ul li ul li a  {
    text-transform:capitalize;
    /* font-size: 15px;
    font-weight: lighter; */
   
}
.sidenav ul li ul  {
  color:white;
    /* padding-left:10px; */
}
.sidenav ul li ul li {
    border:none;
}
.dropdown-toggle::after{
    display: inline-block;
    width: 0;
    height: 0;
    float: right;
    vertical-align: .255em;
    content: "";
    border-top: .3em solid;
    border-right: .3em solid transparent;
    border-bottom: 0;
    border-left: .3em solid transparent;
}

</style>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
      <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
              <img src="<?php echo base_url()?>assets/img/logo/main_logo.png">
              &times;</a><br/><br/>
           
            <ul class="list-unstyled components mb-5 px-4">
            <li class="" hidden>
                <a href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                  Main Menu</a>         
              </li>
              <!-- menu 1 -->
              <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-home fa-2x pr-3"></i> Mortgages</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                  <li class="pt-3">
                      <a href="<?php echo base_url()?>index.php/mortgage_overview">Mortgages Overview</a>
                  </li>
                  <br/>
                  <h5 class="text-white px-3">Get the best rates</h5>
                  <li>
                      <a href="<?php echo base_url()?>index.php/mortgage_rates">Mortgage Rates</a>
                  </li>
                  <li>
                      <a href="#">30 -years Mortgage rates</a>
                  </li>
                  <li>
                      <a href="#">20 -years Mortgage rates</a>
                  </li>
                  <li>
                      <a href="#">15 -years Mortgage rates</a>
                  </li>
                  <li>
                      <a href="#">10 -years Mortgage rates</a>
                  </li>
                  <li>
                      <a href="<?php echo base_url()?>index.php/mortgage_fha">FHA Loan Rates</a>
                  </li>
                  <li>
                      <a href="<?php echo base_url() ?>index.php/mortgage_va_loan">VA Loan Rates</a>
                  </li>
                  <li>
                      <a href="<?php echo base_url() ?>index.php/mortgage_jumbo_loan">Jumbo Loan Rates</a>
                  </li>
                  <li>
                      <a href="#">ARM Loan Rates</a>
                  </li>                 
                  <br/>
                  <h5 class="text-white px-3">Refinance your mortgage</h5>
                  <li>
                      <a href="#">Refinance Rates</a>
                  </li>
                  <li>
                      <a href="#">30 -years Refinance rates</a>
                  </li>
                  <li>
                      <a href="#">20 -years Refinance rates</a>
                  </li>
                  <li>
                      <a href="#">15 -years Refinance rates</a>
                  </li>
                  <li>
                      <a href="#">10 -years Refinance rates</a>
                  </li>
                  <li>
                      <a href="#">FHA Refinance Rates</a>
                  </li>
                  <li>
                      <a href="#">VA Refinance Rates</a>
                  </li>
                  <li>
                      <a href="#">Jumbo Refinance Rates</a>
                  </li>
                  <br/>
                  <h5 class="text-white px-3">Use calculators</h5>
                  <li>
                      <a href="#">Mortgage Calculator</a>
                  </li>
                  <li>
                      <a href="#">Mortgage Refinance Calculator</a>
                  </li>
                  <li>
                      <a href="#">How much house you can afford?</a>
                  </li>
                  <li>
                      <a href="#">Amortization Calculator</a>
                  </li>
                  <li>
                      <a href="#">Mortgage Payment Calculator</a>
                  </li>
                  <li>
                      <a href="#">Interest only mortgage calculator</a>
                  </li>
                  <li>
                      <a href="#">Mortgage tax deduction calculator</a>
                  </li>
                  <li>
                      <a href="#">Mortgage tax deduction calculator</a>
                  </li>
                  <li>
                      <a href="#">All mortgage calculators</a>
                  </li>
                  <br/>
                  <h5 class="text-white px-3">Learn & get advice</h5>
                  <li>
                      <a href="#">Understanding current interest rates</a>
                  </li>
                  <li>
                      <a href="#">Where rates are trending</a>
                  </li>
                  <li>
                      <a href="#">How to get the best mortgage rate</a>
                  </li>
                  <li>
                      <a href="#">APR vs. Interest rat</a>
                  </li>
                  <li>
                      <a href="#">First time homebuyer loans and programs</a>
                  </li>
                  <li>
                      <a href="#">When to pay off your mortgage early</a>
                  </li>
                  <li>
                      <a href="#">Mortgage tax deduction calculator</a>
                  </li>
                  <li>
                      <a href="#">How to refinance your mortgage</a>
                  </li>
                  <li>
                      <a href="#">Mortgage lender review</a>
                  </li>
                  <br/>
                </ul>
              </li>
              <hr/>
              <!-- Menu 2 -->
              <li>
                <a href="#bankingSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-university fa-2x pr-3" aria-hidden="true"></i>Banking</a>
                <ul class="collapse list-unstyled" id="bankingSubmenu">
                <li class="pt-3">
                      <a href="<?php echo base_url()?>index.php/mortgage_overview">Banking Overview</a>
                  </li>
                  <br/>
                  <h5 class="text-white px-3">Compare accounts</h5>
                  <li>
                      <a href="#">CD rates</a>
                  </li>
                  <li>
                      <a href="#">Savings accounts</a>
                  </li>
                  <li>
                      <a href="#">Money market accoun</a>
                  </li>
                  <li>
                      <a href="#">3-year CD rate</a>
                  </li>
                  <li>
                      <a href="#">5-year CD rate</a>
                  </li>
                  <li>
                      <a href="#">Checking accounts</a>
                  </li>
                  <li>
                      <a href="#">Best bank</a>
                  </li> 
                  <br/>
                  <h5 class="text-white px-3">Use calculators</h5>
                  <li>
                      <a href="#">Savings calculator</a>
                  </li>
                  <li>
                      <a href="#">CD calculator</a>
                  </li>
                  <li>
                      <a href="#">Compound savings calculators</a>
                  </li>
                  <li>
                      <a href="#">All banking calculators</a>
                  </li>
                  <br>
                  <h5 class="text-white px-3">Get advice</h3>
                  <li>
                      <a href="#">How to save money</a>
                  </li>
                  <li>
                      <a href="#">Federal Reserve news</a>
                  </li>
                  <li>
                      <a href="#">What is a savings accounts ?</a>
                  </li>
                  <li>
                      <a href="#">What is a money market account?</a>
                  </li>
                  <li>
                      <a href="#">Which certificate of deposit account is best?</a>
                  </li>
                  <li>
                      <a href="#">How to open a savings account?</a>
                  </li>
                  <li>
                      <a href="#">Tax advice</a>
                  </li> 
                </ul>
              </li>
              <hr/>
              <!-- menu 3 -->
              <li>
              <a href="#creditSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
              <i class="fa fa-credit-card fa-2x pr-3" aria-hidden="true"></i>Credit Card</a>
                <ul class="collapse list-unstyled" id="creditSubmenu">
                  <li class="pt-3">
                      <a href="<?php echo base_url()?>index.php/credit_overview">Credit Card Overview</a>
                  </li>
                  <br/>
                  <h5 class="text-white px-3">Compare by category</h5>
                  <li>
                      <a href="#">Best credit cards of 2020</a>
                  </li>
                  <li>
                      <a href="#">Rewards</a>
                  </li>
                  <li>
                      <a href="#">Travel</a>
                  </li>
                  <li>
                      <a href="#">Airline</a>
                  </li>
                  <li>
                      <a href="#">Cash back</a>
                  </li>
                  <li>
                      <a href="#">No annual fee</a>
                  </li>
                  <li>
                      <a href="#">Balance transfer</a>
                  </li> 
                  <li>
                      <a href="#">0% APR</a>
                  </li> 
                  <li>
                      <a href="#">Student</a>
                  </li> 
                  <br/>
                  <h5 class="text-white px-3">Compare by credit needed</h5>
                  <li>
                      <a href="#">Excellent credit</a>
                  </li>
                  <li>
                      <a href="#">Good credit</a>
                  </li>
                  <li>
                      <a href="#">Fair credit</a>
                  </li>
                  <li>
                      <a href="#">Bad credit</a>
                  </li>
                  <li>
                      <a href="#">No credit history</a>
                  </li>
                  <li>
                      <a href="#">Secured credit cards</a>
                  </li>
                  <br/>
                  <h5 class="text-white px-3">Compare by credit needed</h5>
                  <li>
                      <a href="#">Credit card reviews</a>
                  </li>
                  <li>
                      <a href="#">Credit card payoff calculator</a>
                  </li>
                  <li>
                      <a href="#">Balance transfer calculator</a>
                  </li>
                  <li>
                      <a href="#">All credit card calculators</a>
                  </li>
                  <li>
                      <a href="#">Improving your credit</a>
                  </li>
                  <li>
                      <a href="#">Secured credit cards</a>
                  </li>
                  <br/>



                  <hr/>
              
	              </ul>
              </li>
              <hr/>
              <!-- menu 4 -->
              <li>
                <a href="#loanSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-money fa-2x pr-3" aria-hidden="true"></i> LOANS</a>
                <ul class="collapse list-unstyled" id="loanSubmenu">
                  <li class="pt-3"><a href="<?php echo base_url()?>index.php/mortgage_overview">Loan Overview</a>
                  </li>
                  <br/>
                  <h5 class="text-white px-3">Get the best rates</h5>
                  <li><a href="#">Best personal loan rates</a></li>
                  <li><a href="#">Low-interest personal loans</a></li>
                  <li><a href="#">Personal loans for bad credit</a></li>
                  <li><a href="#">Personal loans for good credit</a></li>
                  <li><a href="#">Personal loans for excellent credit</a></li>
                  <li><a href="#">Best home improvement loan rates</a></li>
                  <li><a href="#">Best debt consolidation loan rates</a></li>
                  <li><a href="#">Student loan rates</a></li>
                  <li><a href="#">Student loan refinance rates</a></li>
                  <li><a href="#">Student loan interest rates</a></li>
                  <li><a href="#">Auto loan rates</a></li>
                  <br/>
                  <h5 class="text-white px-3">Use Calculators</h5>
                  <li><a href="<?php echo base_url()?>index.php/loan_calculator">Loan calculator</a></li>
                  <li><a href="#">Personal loan calculator</a></li>
                  <li><a href="#">Loan payment calculator</a></li>
                  <li><a href="#">Student loan calculator</a></li>
                  <li><a href="#">Auto loan calculator</a></li>
                  <li><a href="#">Auto refinance calculator</a></li>
                  <li><a href="#">All calculators</a></li>
                  <br/>
                  <h5 class="text-white px-3">Use calculators</h5>
                  <li><a href="#">Personal loans</a></li>
                  <li><a href="#">Student loans</a></li>
                  <li><a href="#">Debt consolidation loans</a></li>
                  <li><a href="#">Home improvement loans</a></li>
                  <li><a href="#">Medical loans</a></li>
                  <li><a href="#">Debt management</a></li>
                  <li><a href="#">Auto loans</a></li>
                </ul>
              </li>
              <hr/>
              <!-- menu 5 -->
              <li>
                <a href="#investmentSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-money fa-2x pr-3" aria-hidden="true"></i>Investments</a>
                <ul class="collapse list-unstyled" id="investmentSubmenu">
                  <li class="pt-3"><a href="<?php echo base_url()?>index.php/mortgage_overview">Invertment Overview</a>
                  </li>
                  <br/>
                  <h5 class="text-white px-3">Best Of</h5>
                  <li><a href="#">Best investments</a></li>
                  <li><a href="#">Best online brokers for stocks</a></li>
                  <li><a href="#">Best online brokers for beginners</a></li>
                  <li><a href="#">Best online brokers for mutual funds</a></li>
                  <br/>
                  <h5 class="text-white px-3">Use Calculators</h5>
                  <li><a href="#">Investment earnings calculator</a></li>
                  <li><a href="#">Annuity calculator</a></li>
                  <li><a href="#">All investing & CD calculators</a></li>
                  <br/>
                  <h5 class="text-white px-3">Get advice</h5>
                  <li><a href="#">What is the long-term capital gains tax?</a></li>
                  <li><a href="#">Passive income: What it is and 5 ideas for 2019</a></li>
                  <li><a href="#">How to buy stocks</a></li>
                </ul>
              </li>
              <hr/>
              <!-- menu 6 -->
              <li>
                <a href="#home_Submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-home fa-2x pr-3" aria-hidden="true"></i>Home Equity</a>
                <ul class="collapse list-unstyled" id="home_Submenu">
                  <li class="pt-3"><a href="<?php echo base_url()?>index.php/mortgage_overview">Home Equity Overview</a></li>
                  <br/>
                  <h5 class="text-white px-3">Use calculators</h5>
                  <li><a href="#">Home equity calculator</a></li>
                  <li><a href="#">Loan vs. line of credit calculator</a></li>
                  <li><a href="#">Debt consolidation calculator</a></li>
                  <li><a href="#">HELOC payoff calculator</a></li>
                  <li><a href="#">All home equity calculators</a></li>
                  <br/>
                  <h5 class="text-white px-3">Compare lenders</h5>
                  <li><a href="#">Home equity loan rates</a></li>
                  <li><a href="#">Home equity line of credit rates</a></li>
                  <li><a href="#">Home equity lender reviews</a></li>   
                  <br/>
                  <h5 class="text-white px-3">Get advice</h5>
                  <li><a href="#">What is a home equity loan?</a></li>
                  <li><a href="#">HELOC vs. Home equity loan</a></li>
                  <li><a href="#">Consolidate your debt using home equity</a></li>
                  <li><a href="#">Home equity loans with bad credit</a></li>                 
                </ul>
              </li>
              <hr/>
              <!-- menu 7 -->
              <li>
                <a href="#insuranceSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-file fa-2x pr-3" aria-hidden="true"></i> Insurance</a>
                <ul class="collapse list-unstyled" id="insuranceSubmenu">
                  <li class="pt-3"><a href="<?php echo base_url()?>index.php/mortgage_overview">Insurance Overview</a></li>
                  <br/>
                  <h5 class="text-white px-3">Insurance types</h5>
                  <li><a href="#">Car insurance</a></li>
                  <li><a href="#">Homeowner's insurance</a></li>
                  <li><a href="#">Health insurance</a></li>
                  <li><a href="#">Life insurance</a></li>
                  <br/>
                  <h5 class="text-white px-3">Best Of</h5>
                  <li><a href="#">Best car insurance companies</a></li>
                  <li><a href="#">Best home insurance companies</a></li>
                  <li><a href="#">Best life insurance companies</a></li>
                  <li><a href="#">Best cheap car insurance</a></li>
                  <li><a href="#">Top car insurance comparison</a></li>
                  <br/>
                  <h5 class="text-white px-3">Get advice</h5>
                  <li><a href="#">Best Roth IRA accounts</a></li>
                  <li><a href="#">Best retirement plans</a></li>
                  <li><a href="#">How to open a Roth IRA</a></li>
                  <li><a href="#">401(k) rollover guide</a></li>
                  <li><a href="#">Roth IRA vs. Roth 401(k)</a></li>
                  <br/>
                  <h5 class="text-white px-3">Use calculators</h5>
                  <li><a href="#">401(k) retirement calculator</a></li>
                  <li><a href="#">Retirement savings calculator</a></li>
                  <li><a href="#">Roth IRA calculator</a></li>
                  <li><a href="#">IRA minimum distribution calculator</a></li>
                  <li><a href="#">Social security benefits calculator</a></li>
                  <li><a href="#">All retirement calculators</a></li>
                  <br/>
                  <h5 class="text-white px-3">More information</h5>
                  <li><a href="#">What is an IRA?</a></li>
                  <li><a href="#">What is a Roth 401(k)?</a></li>
                  <li><a href="#">401(k) contribution limits</a></li>
                  <li><a href="#">Contributing to IRA during retirement</a></li>
                  <li><a href="#">Best age for Social Security retirement benefits</a></li>
                  <li><a href="#">Roth IRA 5 year rule</a></li>
                  <br/>               
                </ul>
              </li>
              <hr/>
              <!-- menu 8 -->
              <li>
                <a href="#checkingSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-home fa-2x pr-3" aria-hidden="true"></i>Checking</a>
                <ul class="collapse list-unstyled" id="checkingSubmenu">
                  <!-- <li class="pt-3"><a href="<?php echo base_url()?>index.php/mortgage_overview">Insurance Overview</a></li> -->
                  <br/>
                  <h5 class="text-white px-3">Best Products</h5>
                  <li><a href="#">Best Checking Accounts</a></li>
                  <li><a href="#">Best Free Checking  Accounts</a></li>
                  <li><a href="#">Best High-Yield Checking Accounts</a></li>
                  <li><a href="#">Best Student Checking Accounts</a></li>
                  <li><a href="#">Best Business Checking Accounts</a></li>
                  <br/>
                  <h5 class="text-white px-3">Compare and Calculate</h5>
                  <li><a href="#">Compare Checking Accounts</a></li>
                  <li><a href="#">Checking Interest Calculator</a></li>
                  <br/>
                </ul>
              </li>
              <hr/>

          </div>
       
        <i class="fa fa-bars fa-2x" aria-hidden="true" id="icon_bar" onclick="openNav()" style="color:#96871a;cursor:pointer;"></i>
        <a href="<?php echo base_url()?>" class="scrollto">
          <img src="<?php echo base_url()?>assets/img/logo/main_logo.png">
        </a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="<?php echo base_url()?>assets/img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="<?php echo base_url()?>">Home</a></li>
          <li><a href="<?php echo base_url()?>">Best 100 Banks</a></li>
          <li><a href="<?php echo base_url()?>">Ratings</a></li>
          <!-- <li class="menu-has-children"><a href="">Ratings</a>
            <ul>
              <li><a href="#">Banks Star Rating</a></li>
              <li><a href="#">Start Rating Defination</a></li>
              <li><a href="#">Drop Down </a></li>
            </ul>
          </li> -->
          <li><a href="<?php echo base_url()?>">Blog</a></li>
          <li><a href="<?php echo base_url()?>index.php/about_us">About us</a></li>
          <li><a href="<?php echo base_url()?>index.php/profile">Profile</a></li>
          <li><a href="<?php echo base_url()?>index.php/signup">Register/Login</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header>
  <!-- #header -->
  <script>
 
function openNav() {
  document.getElementById("mySidenav").style.width = "360px";

}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
  </script>