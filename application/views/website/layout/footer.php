  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <a href="<?php echo base_url()?>">
              <img src="<?php echo base_url()?>assets/img/logo/main_logo.png" style="height: 60px;">
            </a>
            <p id="about_desc" class="pt-3">
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo base_url()?>">Home</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo base_url()?>about_us">About us</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo base_url()?>terms_conditions">Terms of service</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo base_url()?>privacy_policy">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              <span id="contact_address"></span><br/>
              <strong>Phone:</strong> <span id="contact_phone">  </span><br>
              <strong>Email:</strong><span id="contact_email">  </span><br>
            </p>

            <div class="social-links" id="social_link">
            
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p id="newsletter">
            </p>
            <!-- <form action="" method="post">
              <input type="email" name="email"><input type="submit"  value="Subscribe">
            </form> -->
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>BanksBestRates</strong>. All Rights Reserved
      </div>
      <div class="credits">
       
        <!-- Best <a href="">Bootstrap Templates</a>  -->
      </div>
    </div>
  </footer>
  <!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  
  <script src="<?php echo base_url()?>/assets/lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?php echo base_url()?>/assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>/assets/lib/easing/easing.min.js"></script>
  <script src="<?php echo base_url()?>/assets/lib/superfish/hoverIntent.js"></script>
  <script src="<?php echo base_url()?>/assets/lib/superfish/superfish.min.js"></script>
  <script src="<?php echo base_url()?>/assets/lib/wow/wow.min.js"></script>
  <script src="<?php echo base_url()?>/assets/lib/waypoints/waypoints.min.js"></script>
  <script src="<?php echo base_url()?>/assets/lib/counterup/counterup.min.js"></script>
  <script src="<?php echo base_url()?>/assets/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url()?>/assets/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url()?>/assets/lib/lightbox/js/lightbox.min.js"></script>
  <script src="<?php echo base_url()?>/assets/lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="<?php echo base_url()?>/assets/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="<?php echo base_url()?>/assets/js/main.js"></script>
  <script src="<?php echo base_url()?>assets/libs/common.js"></script>
  <script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
  <script src="<?php echo base_url()?>assets/libs/footerProcess.js"></script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171441107-1"></script>
  <script>
    get_footer_data();
    get_contact_data();
    window.dataLayer = window.dataLayer || []; 
    function gtag()
    {
      dataLayer.push(arguments);
    } 
    gtag('js', new Date());
    gtag('config', 'UA-171441107-1');
  
  	var pageURL = window.location.href;
		var lastURLSegment = pageURL.substr(pageURL.lastIndexOf('/') + 1);
		$(".side_nav_item").removeClass("active");
		$("#"+lastURLSegment).addClass("active");

  
  
  </script>
</body>
</html>