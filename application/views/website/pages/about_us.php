 <!--==========================
    About section 
  ============================-->

  <style>
    .heading_main{
      padding: 100px 80px 100px 130px;
    }
    .back_image{
      background:linear-gradient( rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6) ),url('<?php echo base_url()?>assets/img/about-plan.jpg');
      background-repeat:no-repeat;
      background-size:cover;
      background-position:center;
    }
    .about_container{
      padding: 40px 80px 20px 80px;
      text-align:justify;
      line-height:2.0rem;
    }
    .bank_best_rates{
      color:#968719;
      font-weight:bold;
    }
    


  </style>
  <div class="bg-dark h-100 back_image">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12 col-md-12">
          <h1 class="display-4 text-white font-weight-bold heading_main">ABOUT US</h1>
        </div>
      </div>
  </div>
  <div class="about_container col-md-11 mx-auto" id="page_data"> 

  </div>
    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container">
        <div class="section-header wow fadeInUp">
          <h3>Team</h3>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="<?php echo base_url()?>assets/img/team-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Walter White</h4>
                  <span>Chief Executive Officer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="member">
              <img src="<?php echo base_url()?>assets/img/team-2.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Sarah Jhonson</h4>
                  <span>Product Manager</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="member">
              <img src="<?php echo base_url()?>assets/img/team-3.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>William Anderson</h4>
                  <span>CTO</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
              <img src="<?php echo base_url()?>assets/img/team-4.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Amanda Jepson</h4>
                  <span>Accountant</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- #team -->

    <script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/common.js"></script>
<script src="<?php echo base_url()?>assets/libs/privacyProcess.js"></script>
<script>
  get_page_data('about_us');
</script>