<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>BanksBestRates</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="canonical" href="https://www.banksbestrates.com/">
<meta name="description" itemprop="description" content="Reports and ratings on US banks and credit unions">
<meta name="keywords" content="[&quot;investing&quot;,&quot;money&quot;,&quot;finance&quot;bank ratings&quot;credit union ratings&quot;]">
<meta property="og:site_name" content="Banks Best Rates">
<meta property="og:title" content="Bank ratings">
<meta property="og:type">
<meta property="og:url" content="https://www.banksbestrates.com/">
<meta property="og:image" content="" name="image">
<meta property="og:image:type">
<meta property="og:description" content="Bank ratings">
<meta property="https://www.facebook.com/banksbestrates">
<meta property="article:publisher">
<meta name="twitter:card">
<meta name="twitter:site" content="@bank_fax">
<meta name="twitter:image" content="">
<meta name="twitter:title" content="Investing">
<meta name="twitter:description" content="Investing">
<meta name="news_keywords" itemprop="keywords" content="[&quot;bank ratings&quot;&quot;investing&quot;,&quot;ratings&quot;,&quot;finance&quot;]">
  
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
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171441107-1"></script>
  <script> 
    window.dataLayer = window.dataLayer || []; 
    function gtag()
    {
      dataLayer.push(arguments);
    } 
    gtag('js', new Date());
    gtag('config', 'UA-171441107-1');
  </script>

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
    color: #D79F01;
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
  <input type="hidden" id="baseUrl" value="<?php echo base_url()?>"/>
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
      <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
              <img src="<?php echo base_url()?>assets/img/logo/main_logo.png">
              &times;</a><br/><br/>
           
            <ul class="list-unstyled components mb-5 px-4">
              <!-- menu 1 -->
              <li class="active side_nav_item" id="mortgage_overview">
                <a href="<?php echo base_url()?>mortgage_overview">
                <i class="fa fa-home fa-2x pr-3"></i> Mortgages</a>
              </li>
              <hr/>
              <!-- Menu 2 -->
              <li clss="side_nav_item" id="bank_overview">
                <a href="<?php echo base_url()?>bank_overview">
                <i class="fa fa-university fa-2x pr-3" aria-hidden="true"></i>Banking</a>              
              </li>
              <hr/>
              <!-- menu 3 -->
              <li class="side_nav_item" id="credit_overview">
                <a href="<?php echo base_url()?>credit_overview">
                <i class="fa fa-credit-card fa-2x pr-3" aria-hidden="true"></i>Credit Card</a>
               </li>
              <hr/>
              <!-- menu 4 -->
              <li class="side_nav_item" id="loan_overview">
                <a href="<?php echo base_url()?>loan_overview">
                <i class="fa fa-money fa-2x pr-3" aria-hidden="true"></i> LOANS</a> 
              </li>
              <hr/>
              <!-- menu 5 -->
              <li class="side_nav_item" id="investment_overview">
                <a href="<?php echo base_url()?>investment_overview">
                <i class="fa fa-usd fa-2x pr-3" aria-hidden="true"></i>Investments</a>     
              </li>
              <hr/>

              <!-- menu 7 -->
              <li class="side_nav_item" id="retirement_overview"> 
                <a href="<?php echo base_url()?>retirement_overview">
                <i class="fa fa-file fa-2x pr-3" aria-hidden="true"></i>Retirement</a>
              </li>
              <hr/>
          </div>
       
        <i class="fa fa-bars fa-2x" aria-hidden="true" id="icon_bar" onclick="openNav()" style="color:#D79F01;cursor:pointer;"></i>
        <a href="<?php echo base_url()?>" class="scrollto">
          <img src="<?php echo base_url()?>assets/img/logo/main_logo.png">
        </a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="<?php echo base_url()?>assets/img/logo.png" alt="" title="" /></a>-->
      </div>
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="<?php echo base_url()?>">Home</a></li>
          <!-- <li><a href="<?php echo base_url()?>best_banks">Best 100 Banks</a></li> -->
          <li><a href="<?php echo base_url()?>mortgage_overview">Mortgages</a></li>
          <!-- <li><a href="<?php echo base_url()?>best_bank_reviews">Ratings</a></li> -->
          <li><a href="<?php echo base_url()?>bank_overview">Banking</a></li>
          <li><a href="<?php echo base_url()?>credit_overview">Credit Cards</a></li>
          <li><a href="<?php echo base_url()?>loan_overview">Loans</a></li>
          <li><a href="<?php echo base_url()?>investment_overview">Investments</a></li>
          <li><a href="<?php echo base_url()?>retirement_overview">Retirement</a></li>
          <li><a href="<?php echo base_url()?>blog">Blog</a></li>
          <li><a href="<?php echo base_url()?>about_us">About Us</a></li>
          <!-- <li><a href="<?php echo base_url()?>about_us">About us</a></li>
          <li><a href="<?php echo base_url()?>profile">Profile</a></li>
          <li><a href="<?php echo base_url()?>signup">Register/Login</a></li> -->
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header>
  <!-- #header -->
  <script>
 
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";

}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
  </script>