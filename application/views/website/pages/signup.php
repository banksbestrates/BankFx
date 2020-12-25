
  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url()?>/assets/css/login.css" rel="stylesheet">
    <div class="container">
            <div class="row login-container">
                <!-- <div class="col-md-6 login-form-1">
                    <h3>LOGIN</h3>
                    <hr/>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control py-2" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control py-2" placeholder="Your Password *" value="" />
                        </div>
                        <a href="<?php echo base_url()?>index.php/profile">
                            <div class="form-group">                     
                                <button class="col-md-12 btn py-2 text-white" style="background-color:#d79f01" >Login</button>                            
                            </div>
                        </a>
                        <div class="form-group">
                            <a href="#" class="ForgetPwd">Forget Password?</a>
                        </div>
                    </form>
                </div> -->
                <div class="col-md-6 login-form-2 mx-auto">
                    <h3>REGISTER</h3>
                    <hr/>
                   
                        <div class="form-group">
                            <input type="email" class="form-control py-2" placeholder="Enter Your Email *" value="" id="user_email" />
                            <span class="error_message text-white pt-2"></span>
                        </div>
                        <!-- <div class="form-group">
                            <input type="password" class="form-control py-2"  placeholder=" Enter Your Password *" value="" id="user_password"/>
                        </div> -->
                        <br/>
                        <!-- <a href="<?php echo base_url()?>/index.php/profile"> -->
                            <div class="form-group">                       
                                <button class="col-md-12 btn py-2 text-white" style="background-color:#000000" onclick="registerUser()" >Register</button>                                   
                            </div>
                        <!-- </a>   -->
                    
                </div>
            </div>
    </div>
  <!-- JavaScript Libraries -->
  <script src="<?php echo base_url()?>/assets/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/libs/common.js"></script>
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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="<?php echo base_url()?>/assets/contactform/contactform.js"></script>
  <!-- Template Main Javascript File -->
  <script src="<?php echo base_url()?>/assets/js/main.js"></script>
  <script>

  function registerUser(){
    var user_email     = $("#user_email").val();
    // var user_password =  $("#user_password").val();
    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if(!user_email.match(mailformat))
    {
        $(".error_message").text("Please enter valid email address !");
        return false;
    }

    let formData = new FormData();
    formData.append("user_email",user_email);
    // formData.append("user_password",user_password);
    let url = baseUrl+"api/register_user";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let status = obj.Status;
            let message = obj.Message;
            if(status)
            {
                swal({
                    title: "Congratulations!",
                    text: message,
                    icon: "success",
                    timer: 2500,
                    showConfirmButton: false
                    });

                $("#user_email").val("");              
            }
            else{
                swal({
                    title: "Oops!",
                    text: message,
                    icon: "warning",
                    });

                $("#user_email").val("");
            }
        }
    };

  }
  
  </script>

</body>
</html>
