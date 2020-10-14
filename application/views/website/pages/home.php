
<style>
  .card img{
    height:100px;
    width:100px;
  }
  .border_bottom_golden_thin{
   border-bottom: 1px solid #CB9D24;
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
                    <div class="carousel-item <?php echo $d->default_class?>" style="background-image: url('<?php echo base_url() . $d->image?>');">
                        <div class="carousel-container">
                          <div class="carousel-content">
                            <h2><?php echo $d->heading?></h2>
                            <p><?php echo $d->content?></p>
                            <!-- <a href="<?php echo base_url()?>bank_overview" class="btn-get-started ">Get Started</a> -->
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
  <div class="container px-0" style="margin-top:-70px">
        <div class="col-md-12 px-0 row card_view">
              <div class="col-md col-sm-4">
                  <div class="card">
                      <div style="width:100%; text-align:center">
                        <img src="<?php echo base_url()?>assets/images/website/loan/card_icon/home_equity.png">
                      </div>
                    <a href="<?php echo base_url()?>mortgage_overview">
                    <h6>Mortgage</h6>
                  </a>
                  </div>
              </div>
              <div class="col-md col-sm-4">
              <div class="card">
                  <div style="width:100%; text-align:center">
                        <img src="<?php echo base_url()?>assets/images/website/retirement/card_icon/Best-Savings-Account-Rates.png">
                    </div>
                    <a href="<?php echo base_url()?>bank_overview">
                      <h6>Banking</h6>
                    </a>
                  </div>
              </div>
              <div class="col-md col-sm-4">
                  <div class="card">
                    <div style="width:100%; text-align:center">
                        <img src="<?php echo base_url()?>assets/images/website/banking/card_icon/Bank-Name.png">
                    </div>
                    <a href="<?php echo base_url()?>best_banks">
                      <h6>Best Banks</h6>
                    </a>
                  </div>
              </div>
              <div class="col-md col-sm-4">
                  <div class="card">
                    <div style="width:100%; text-align:center">
                        <img src="<?php echo base_url()?>/assets/images/website/banking/card_icon/Address-Location.png">
                      </div>
                      <a href="<?php echo base_url()?>branch_locator">
                        <h6>Branch Locator</h6>
                      </a>
                  </div>
              </div>
              <div class="col-md col-sm-4">
                <div class="card">
                    <div style="width:100%; text-align:center">
                        <img src="<?php echo base_url()?>assets/images/website/credit/card_icon/balance_transfer.png">
                    </div>
                    <a href="<?php echo base_url()?>credit_overview">
                    <h6>Credit Cards</h6>
                    </a>
                  </div>
              </div>
              <div class="col-md col-sm-4">
                  <div class="card">
                    <div style="width:100%; text-align:center">
                        <img src="<?php echo base_url()?>assets/images/website/loan/card_icon/personal_loan.png" >
                    </div>
                    <a href="<?php echo base_url()?>loan_overview">
                    <h6> Loans</h6>
                    </a>
                  </div>
              </div>
        </div> 
      </div>
 <!-- new form banks best rates -->
      <div class="container px-0" style="margin-top:70px">
        <div class="col-md-12 mx-auto">
            <div class="row">
                <div class="col-md-6 pl-1">
                  <h5 class="border_bottom_golden mb-1">LATEST NEWS FROM BANKS BEST RATES</h5>
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
          <header class="section-header pt-5">
            <h3>CHECK NEARBY BANKS</h3>
          </header>
          <div class="col-md-12 mx-auto us_map_view">
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


    <!--==========================
      Facts Section
    ============================-->
    <!-- <section id="facts"  class="wow fadeIn">
      <div class="container">

        <header class="section-header">
          <h3>Facts</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </header>

        <div class="row counters">

  				<div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">274</span>
            <p>Clients</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">421</span>
            <p>Projects</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1,364</span>
            <p>Hours Of Support</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">18</span>
            <p>Hard Workers</p>
  				</div>

  			</div>

        <div class="facts-img">
          <img src="<?php echo base_url()?>asssets/img/facts-img.png" alt="" class="img-fluid">
        </div>

      </div>
    </section> -->
    <!-- #facts -->

    <!--==========================
      Portfolio Section
    ============================-->
    <!-- TRENDING IN BANKSSS -->
    <!-- <section id="portfolio" class="">
        <div class="container">
            <header class="section-header pb-4">
              <h3 class="section-title">OUR PORTFOLIO</h3>
            </header>
            <div class="row portfolio-container" style="position: relative; height: 1080px;">
          
              <?php if(count($page_data)>=1){
                  foreach($page_data as $d){
                    if($d->div_type == "portfolio_div"){?>
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" style="position: absolute; left: 0px; top: 0px; visibility: visible; animation-name: fadeInUp;">
                            <div class="portfolio-wrap">
                              <figure style="background-image:url('<?php echo base_url() . $d->image ?>');
                                  background-size:100% 100%;background-position:center">
                              </figure>
                              <div class="portfolio-info">
                                <h4><?php echo $d->heading?></h4>
                                <p><?php echo $d->content?> 
                                </p>
                              </div>
                            </div>
                          </div>
                  <?php }
                  }
              }?>
            </div>
        </div>
    </section> -->
    <!-- #portfolio -->

    <!--==========================
      Clients Section
    ============================-->
    <!-- <section id="clients" class="wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>Our Clients</h3>
        </header>

        <div class="owl-carousel clients-carousel">
            <?php if(count($page_data)>=1){
              foreach($page_data as $d){
                if($d->div_type=="client_div")
                {?>
                   <img src="<?php echo base_url().$d->image?>" alt="">
                <?php }
                }
            }?>
        </div>
      </div>
    </section> -->
    <!-- #clients -->

    <!--==========================
      Clients Section
    ============================-->
    <!-- <section id="testimonials" class="section-bg wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>Testimonials</h3>
        </header>

        <div class="owl-carousel testimonials-carousel">
        <?php if(count($page_data)>=1){
          foreach($page_data as $d){
            if($d->div_type=="testimonial")
            {?>  
                <div class="testimonial-item">
                <img src="<?php echo base_url() . $d->image?>" class="testimonial-img" alt="">
                <h3><?php echo $d->name ?></h3>
                <h4><?php echo $d->designation?></h4>
                <p>
                  <img src="<?php echo base_url()?>assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                  <?php echo $d->review ?>  
                  <img src="<?php echo base_url()?>assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
                </p>
          </div>
            <?php }
            }
          }?>
        </div>
      </div>
    </section> -->
    <!-- #testimonials -->

    <!--==========================
      Team Section
    ============================-->
    <!-- <section id="team">
      <div class="container">
        <div class="section-header wow fadeInUp">
          <h3>Team</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
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
    </section> -->
    <!-- #team -->

    <!--==========================
      Contact Section
    ============================-->
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
 get_top_posts();

 function saveMessage()
{
  $("#name").val();
  $("#email").val();
  $("#subject").val();
  $("#subject").val();
    let formData = new FormData();
    formData.append("city_name",city_name);
    let url = baseUrl + "api/get_all_city_banks";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
           
            let obj = JSON.parse(xhr.responseText);
            let d = obj
            let data = d['Returned'];
            if(data)
            {
                $("#search_bank_data").css("display","none");
            }else{
                alert("No Data Available");
                return false;
            }
            
            let allData = new Array();
            for(var i=0;i<data.length;i++)
            {
               var d1 = data[i];
                    
                for(let a in d1)
                {
                    for (let b in d1[a])
                    {
                        allData.push(d1[a][b])
                    }
                    
                };
                
            }
        var list =""; 
        var bank_1 ={lat: parseFloat(allData[0].latitude), lng: parseFloat(allData[0].longitude)};
            var infoWindow = new google.maps.InfoWindow();
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: bank_1
            });
          
         var latlngbounds = new google.maps.LatLngBounds();
         for(var j=0;j<allData.length;j++)
         {

           list += '<div class=" py-4 px-4" style="border-top:2px solid">'+
                   '                         <h6 class="mb-2">'+allData[j].bankName+'</h6>'+
                   '                         <span>'+allData[j].address+' ,<br>'+ allData[j].stateAbbr + ', '+ allData[j].postalCode+'</span>'+
                   '                               <br/><br/>'+
                //    '                         <span class="mt-4">Phone:(123) 456 - 789</span><br>'+
                   '                       <a href="http://'+allData[j].mainURL+'" target="_blank"><span class="mt-2">'+allData[j].mainURL+'</span></a>'+
                //    '                           <span style="float:right"><i class="fa fa-map-marker" aria-hidden="true" style="font-size:60px"></i><br>0.82 mi</span><br>'+
                //    '                         <br><span>HOURS</span>'+
                   '                     </div>'

      
                // Locations of landmarks
            
                if(allData[j].latitude!="" &&  allData[j].longitude!="")
                {
                    var bankLatLong = {lat: parseFloat(allData[j].latitude), lng: parseFloat(allData[j].longitude)};
                    var mk1 = new google.maps.Marker({position: bankLatLong, map: map,title:allData[j].bankName, description:allData[j].address});   
                    latlngbounds.extend(bankLatLong);
                }
         }
            var bounds = new google.maps.LatLngBounds();
            //Center map and adjust Zoom based on the position of all markers.
            map.setCenter(latlngbounds.getCenter());
            map.fitBounds(latlngbounds);


         $("#bank_data").html(list);
         $("#bank_data").css("display","block");    
 
        }
    };
}

</script>


