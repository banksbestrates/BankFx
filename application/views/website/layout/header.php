<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>BankFx</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link href="<?php echo base_url()?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url()?>asssets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url()?>/assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
}
.sidenav ul li {
  border: 1px solid;
}
.sidenav ul li ul li a  {
    text-transform:capitalize;
   
}
.sidenav ul li ul  {
    padding-left:20px;
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
              <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                Mortgages</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                  <li>
                      <a href="<?php echo base_url()?>mortgage_overview">Mortgages Overview</a>
                  </li>
                  <li>
                      <a href="<?php echo base_url()?>mortgage_rates"> Mortgages Rates</a>
                  </li>
                  <li>
                      <a href="<?php echo base_url()?>mortgage_fha">FHA Loan rates</a>
                  </li>
                  <li>
                      <a href="<?php echo base_url()?>mortgage_va_loan">VA Loan rates</a>
                  </li>
                  <li>
                      <a href="<?php echo base_url()?>mortgage_jumbo_loan">Jumbo Loan rates</a>
                  </li>
                  <li>
                      <a href="<?php echo base_url()?>mortgage_arm_loan">ARM Loan rates</a>
                  </li>
                </ul>
              </li>
              <hr/>
              <li>
                <a href="#aboutSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                Banking</a>
                <ul class="collapse list-unstyled" id="aboutSubmenu">
                  <li>
                      <a href="#">Home 1</a>
                  </li>
                  <li>
                      <a href="#">Home 2</a>
                  </li>
                  <li>
                      <a href="#">Home 3</a>
                  </li>
                </ul>
              </li>
              <hr/>
              <li>
                <a href="#aboutSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                Credit Card</a>
                <ul class="collapse list-unstyled" id="aboutSubmenu">
                  <li>
                      <a href="#">Home 1</a>
                  </li>
                  <li>
                      <a href="#">Home 2</a>
                  </li>
                  <li>
                      <a href="#">Home 3</a>
                  </li>
                </ul>
              </li>
              <hr/>
              <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                  Loans</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                  <li>
                      <a href="#">Page 1</a>
                  </li>
                  <li>
                      <a href="#">Page 2</a>
                  </li>
                  <li>
                      <a href="#">Page 3</a>
                  </li>
                </ul>
              </li>
              <hr/>
              <li>
                <a href="#investSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                  Investing</a>
                <ul class="collapse list-unstyled" id="investSubmenu">
                  <li>
                      <a href="#">Page 1</a>
                  </li>
                  <li>
                      <a href="#">Page 2</a>
                  </li>
                  <li>
                      <a href="#">Page 3</a>
                  </li>
                </ul>
              </li>
              <hr/>         
              <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                  Home Equity</a>

                  <ul class="collapse list-unstyled" id="homeSubmenu">
                  <li>
                      <a href="#">Page 1</a>
                  </li>
                  <li>
                      <a href="#">Page 2</a>
                  </li>
                  <li>
                      <a href="#">Page 3</a>
                  </li>
                </ul>
              </li>
              <hr/>         
              <li>
                <a href="#insuSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                  Insurance</a>

                  <ul class="collapse list-unstyled" id="insuSubmenu">
                  <li>
                      <a href="#">Page 1</a>
                  </li>
                  <li>
                      <a href="#">Page 2</a>
                  </li>
                  <li>
                      <a href="#">Page 3</a>
                  </li>
                </ul>
              </li>
              <hr/>         
              <li>
                <a href="#retirementSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                  Retirement</a>

                  <ul class="collapse list-unstyled" id="retirementSubmenu">
                  <li>
                      <a href="#">Page 1</a>
                  </li>
                  <li>
                      <a href="#">Page 2</a>
                  </li>
                  <li>
                      <a href="#">Page 3</a>
                  </li>
                </ul>
              </li>
	          </ul>
             
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
          <li><a href="<?php echo base_url()?>about_us">About us</a></li>
          <li><a href="<?php echo base_url()?>profile">Profile</a></li>
          <li><a href="<?php echo base_url()?>signup">Register/Login</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header>
  <!-- #header -->
  <script>
 
function openNav() {
  document.getElementById("mySidenav").style.width = "290px";

}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
  </script>