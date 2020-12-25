
<style>
  .card img{
    height:100px;
    width:100px;
  }
  .border_bottom_golden_thin{
   border-bottom: 1px solid #CB9D24;
  }
  .border_bottom_grey_thin{
   border-bottom: 1px solid #000000;
  }
</style>
  <!--==========================
    Intro Section
  ============================-->

<section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

      <div class="carousel-inner" role="listbox">
          <?php if(count($page_data)>=1){
                foreach($page_data as $d){
                  if($d->div_type=="div_1")
                  {?>
                    <!-- <div class="carousel-item <?php echo $d->default_class?>" style="background-image: url('<?php echo base_url() . $d->image?>')"> -->
                    <div class="carousel-item <?php echo $d->default_class?>" style="background-color:#7baec7;background-image:url('<?php echo base_url() . $d->image?>')">
                      <!-- <img src="<?php echo base_url() . $d->image?>" style="height:auto; width:100%" /> -->
                      <!-- <div class="carousel-item <?php echo $d->default_class?>" style="background-image: url('<?php echo base_url() . $d->image?>');"> -->
                        <div class="carousel-container">
                          <div class="container">
                            <div class="col-md-8 px-1">
                              <h2><?php echo $d->heading?></h2>
                              <p><?php echo $d->content?></p>
                              <a href="<?php echo base_url(). $d->designation ?>" class="btn-get-started "><?php echo $d->name;?></a>
                            </div>
                            </div>
                        </div>
                    </div>
                <?php  }
                }
            }?>
      </div>
      <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
      </div>
    </div>
</section><!-- #intro -->

<main id="main">
  <!-- center boxes view -->
      <div class="container homecard_top_margin">
        <div class="col-md-12 px-0 row card_view">
              <div class="col-md col-sm-4 mb-3">
                <a href="<?php echo base_url()?>mortgage_overview">
                  <div class="card">
                      <div style="width:100%; text-align:center">
                        <img src="<?php echo base_url()?>assets/images/website/loan/card_icon/home_equity.png">
                      </div>
                    <h6>Mortgage</h6>
                  </div>
                </a>
              </div>
              <div class="col-md col-sm-4 mb-3">
                <a href="<?php echo base_url()?>bank_overview">
                  <div class="card">
                    <div style="width:100%; text-align:center">
                        <img src="<?php echo base_url()?>assets/images/website/retirement/card_icon/Best-Savings-Account-Rates.png">
                    </div>
                      <h6>Banking</h6>
                  </div>
                </a>
              </div>
              <div class="col-md col-sm-4 mb-3">
                <a href="<?php echo base_url()?>best_banks">
                  <div class="card">
                    <div style="width:100%; text-align:center">
                        <img src="<?php echo base_url()?>assets/images/website/banking/card_icon/Bank-Name.png">
                    </div>
                      <h6>Best Banks</h6>
                  </div>
                </a>
              </div>
              <div class="col-md col-sm-4 mb-3">
                <a href="<?php echo base_url()?>branch_locator">
                  <div class="card">
                    <div style="width:100%; text-align:center">
                        <img src="<?php echo base_url()?>/assets/images/website/banking/card_icon/Address-Location.png">
                      </div>
                        <h6>Branch Locator</h6>
                  </div>
                </a>
              </div>
              <div class="col-md col-sm-4 mb-3">
                <a href="<?php echo base_url()?>credit_overview">
                  <div class="card">
                    <div style="width:100%; text-align:center">
                        <img src="<?php echo base_url()?>assets/images/website/credit/card_icon/balance_transfer.png">
                    </div>
                    <h6>Credit Cards</h6>
                  </div>
                </a>
              </div>
              <div class="col-md col-sm-4 mb-3">
                <a href="<?php echo base_url()?>loan_overview">
                  <div class="card">
                    <div style="width:100%; text-align:center">
                        <img src="<?php echo base_url()?>assets/images/website/loan/card_icon/personal_loan.png" >
                    </div>
                    <h6> Loans</h6>
                  </div>
                </a>
              </div>
        </div> 
      </div>
  <!-- center boxes view -->
      <div class="container pt-4">
        <div class="col-md-12 px-0 row card_view" id="card_box_data">
        </div> 
      </div>

 <!-- new form banks best rates -->
      <div class="container" style="margin-top:70px">
        <div class="col-md-12 mx-auto">
            <div class="row">
                <div class="col-md-6 pl-1">
                  <h5 class="border_bottom_golden font-weight-bold mb-1">LATEST NEWS FROM BANKS BEST RATES</h5>
                  <div id="latest_top_posts">
                  </div>
                </div>
              <div class="col-md-6 px-4">
              <?php if(count($page_data)>=1){
                foreach($page_data as $d){
                  if($d->div_type=="latest_bbr_image")
                  {?>             
                     <div class="col-md-12" style="background-image:url(<?php echo base_url() . $d->image?>);
                              background-size:cover;background-repeat:no-repeat;height:100%">
                    </div>
                <?php  }
                }
            }?>
              </div>
            </div>
        </div>
      </div>

      <!-- map view -->
      <div class="container mt-5">
          <!-- <header class="section-header pt-5">
            <h3>CHECK NEARBY BANKS</h3>
          </header> -->
          <div class="col-md-12 px-0 us_map_view">
          <div class=" py-3 map_search_bar px-3" style="background-color:black;color:white"> 
            <div class="row">
                <div class="col-md-9 pt-2">CHOOSE YOUR STATE  TO FIND BANKS NEAR YOU</div>
                <!-- <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" id="zipcode" class="form-control bg-white" placeholder="Enter Zip Code" style="font-size:12px">
                        <div class="input-group-append" onclick="serch_by_zip()">                   
                            <button class="btn"> <i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div> -->
            </div>
          </div>
            <iframe src="https://createaclickablemap.com/map.php?&id=96221&maplocation=false&online=true" width="100%" height="650" style="border: none;"></iframe>
            <script>if (window.addEventListener){ window.addEventListener("message", function(event) { if(event.data.length >= 22) { if( event.data.substr(0, 22) == "__MM-LOCATION.REDIRECT") location = event.data.substr(22); } }, false); } else if (window.attachEvent){ window.attachEvent("message", function(event) { if( event.data.length >= 22) { if ( event.data.substr(0, 22) == "__MM-LOCATION.REDIRECT") location = event.data.substr(22); } }, false); } </script>
          </div>
      </div> 

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class=" mt-5 wow fadeIn">
      <div class="container text-center">
        <?php if(count($page_data)>=1){
          foreach($page_data as $d){
            if($d->div_type=="div_3")
            {?>    
              <h3><?php echo $d->heading?></h3>
              <p> <?php echo $d->content?></p>
              <!-- <a class="cta-btn" href="#">Call To Action</a> -->
          <?php }
            }
        }?>

      </div>
    </section>
    <!-- #call-to-action -->


    <!-- <div class="container py-5" >
        <div class="col-md-12 mx-auto">
            <div class="row">
              <div class="col-md-6 px-4 mobile_display_none">
                  <?php if(count($page_data)>=1){
                  foreach($page_data as $d){
                    if($d->div_type=="latest_bbr_image")
                    {?>             
                      <div class="col-md-12" style="background-image:url(<?php echo base_url() . $d->image?>);
                                background-size:cover;background-repeat:no-repeat;height:100%">
                      </div>
                  <?php  }
                  }
                  }?>
              </div>
              <div class="col-md-6 pl-1">
                    <h5 class="border_bottom_golden font-weight-bold mb-1">Set Real Goals with these Popular Calculators</h5>
                    <div class="border_bottom_grey_thin py-2">
                        Loan Comparison
                    </div>
                    <div class="border_bottom_grey_thin py-2">
                        How Much Home Can I Afford?
                    </div>
                    <div class="border_bottom_grey_thin py-2">
                        Amortization Schedule
                    </div>
                    <div class="border_bottom_grey_thin py-2">
                        Cost of Living
                    </div>
                    <div class="border_bottom_grey_thin py-2">
                        Credit Card Payoff
                    </div>
                    <div class="border_bottom_grey_thin py-2">
                      Personal Loan
                    </div>
                    <div class="border_bottom_grey_thin py-2">
                        Simple Savings
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pb-5" >
          <h5 class="border_bottom_golden font-weight-bold mb-1">Copy Here that makes us unique. Something about WHY we rate banks. WEB CONTENT - NOT BLOG CONTENT</h5>
          <p>
          This is all dummy copy. There is no sense reading this. This may have to be assded to WEB CONTENT 
          that is not pulled from a WrordPress Article. Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
          exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
          reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur 
          sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
    </div>
    <div class="container pb-4" >
        <div class="col-md-12 mx-auto">
            <div class="row">
                <div class="col-md-6 pl-1">
                    <h5 class="border_bottom_golden font-weight-bold mb-1">Popular Topics</h5>
                    <div class="row">
                        <div class="col-md-6 py-3">How Banks Stack Up</div>
                        <div class="col-md-6 py-3">Car Insurance</div>
                        <div class="col-md-6 py-3">Refinance Your Home</div>
                        <div class="col-md-6 py-3">Best Credit Cards</div>
                        <div class="col-md-6 py-3">Saving for Retirement</div>
                        <div class="col-md-6 py-3">Student Loans</div>
                        <div class="col-md-6 py-3">Life Insurance</div>
                        <div class="col-md-6 py-3">Cost of Living</div>
                        <div class="col-md-6 py-3">Retirement</div>
                        <div class="col-md-6 py-3">Start Investing</div>
                        <div class="col-md-6 py-3">Retirement</div>
                        <div class="col-md-6 py-3">Start Investing</div>
                    </div>
                </div>
                <div class="col-md-6 px-4 mobile_display_none">
                  <?php if(count($page_data)>=1){
                  foreach($page_data as $d){
                    if($d->div_type=="latest_bbr_image")
                    {?>             
                      <div class="col-md-12" style="background-image:url(<?php echo base_url() . $d->image?>);
                                background-size:cover;background-repeat:no-repeat;height:100%">
                      </div>
                  <?php  }
                  }
                  }?>
                </div>
            </div>
        </div>
    </div> -->

      <section id="contact" class="section-bg wow fadeInUp">
        <div class="container">

          <div class="section-header">
            <h3>Contact Us</h3>
            <br/>
            <!-- <p>For any query or information you can contact us anytime </p> -->
          </div>

          <div class="row contact-info">

            <div class="col-md-4">
              <div class="contact-address">
                <i class="ion-ios-location-outline"></i>
                <h3>Address</h3>
                <address><?php echo $contact_data->address?></address>
              </div>
            </div>

            <div class="col-md-4">
              <div class="contact-phone">
                <i class="ion-ios-telephone-outline"></i>
                <h3>Phone Number</h3>
                <p><?php echo $contact_data->phone?></p>
              </div>
            </div>

            <div class="col-md-4">
              <div class="contact-email">
                <i class="ion-ios-email-outline"></i>
                <h3>Email</h3>
                <p><a href="mailto:info@example.com"><?php echo $contact_data->email?></a></p>
              </div>
            </div>

          </div>

          <div class="form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form role="form" class="contactForm">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group col-md-6">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit" >Send Message</button></div>
            </form>
          </div>

        </div>
      </section>
    <!-- #contact -->
</main>

<script src="<?php echo base_url()?>assets/libs/homeProcess.js"></script>
<script>
 get_box_posts();
 get_top_posts();

</script>


