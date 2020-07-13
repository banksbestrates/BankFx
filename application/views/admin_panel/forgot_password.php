<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>BankFx:Reset Password</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/login/Logo.png"/>
	
	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/atlantis.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/demo.css">
</head>
<body>
    <style>
    body{
        background-color:#1168db;
    }
    .bg-logo{
        background: url('<?php echo base_url()?>assets/img/login/Logo.png');
        background-position: center;
		background-size:contain;
		background-repeat:no-repeat;
    }
    #mydiv {
    top: 18%;
	background-color:#e9ffff;
	box-shadow:2px 3px 5px #1a1818;

    }  
    .login_row{
        padding: 40px 20px 40px 20px;
        height:30em;
    } 
    .login_form{
        padding:20px 20px 20px 20px;
    }
	</style>

	<div class="wrapper">
	<input type="hidden" id="baseUrl" value="<?php echo base_url()?>"/>
        <div class="col-md-8 mx-auto my-auto bg-white" id="mydiv">
			<div class="row login_row">
				<div class="col-md-6 bg-logo px-4" >  
                </div>
				<div class="col-md-6 login_form">
						<h1 class="text-center" style="font-weight:600">RESET PASSWORD </h1>  
                    <div class="form-group email_form">
                        <!-- <label for="password">New Password</label> -->
                        <input type="password" class="form-control" id="n_password" placeholder="New Password">
				    </div>
                    <div class="form-group password_form">
				        <!-- <label for="passsword">Confirm Password</label> -->
				        <input type="password" class="form-control" id="c_password" placeholder="Confirm Passsword">
				    </div>
                    <div class="form-group">
					<button class="btn btn-block btn-primary mt-4" onclick="reset_password()">Reset Password</button>
				    </div>
                    <div class="form-group text-center">
				     <h6 class="error_message text-danger"></h6>
				    </div>
                </div>									
			</div>
		</div>
		<input type="hidden" value="<?php echo $user_id?>" id="user_id"/>
		<input type="hidden" value="<?php echo $user_type?>" id="user_type"/>
	</div>
	<!--   Core JS Files   -->
	<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/core/popper.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="<?php echo base_url()?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<!-- jQuery Scrollbar -->
	<script src="<?php echo base_url()?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Atlantis JS -->
	<script src="<?php echo base_url()?>assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url()?>assets/js/setting-demo2.js"></script>
	<script src="<?php echo base_url()?>assets/libs/common.js"></script>
	<script src="<?php echo base_url();?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<script>
	function reset_password()
	{
		var new_pass = 	$("#n_password").val();
		var confirm_pass = 	$("#c_password").val();
		var user_id = 	$("#user_id").val();
		var user_type = 	$("#user_type").val();
		if(new_pass != confirm_pass)
		{
			$(".error_message").text('Confirm password does not matched');
			return false;
		}
		let api_url = baseUrl+"api/user/reset_password";
		if(user_type=="partner")
		{
			api_url = "api/partner/reset_password";
		}
		let formData = new FormData();
		formData.append('new_password',new_pass);
		formData.append('user_id',user_id);
		let url = baseUrl+ api_url;
		let xhr = new XMLHttpRequest();
		xhr.open('POST', url);
		xhr.send(formData);
		xhr.onload = function() {
			if (xhr.status == 200 ) {
				let obj = JSON.parse(xhr.responseText);  
				let status= obj.Status;          
				let message= obj.Message; 
				if(!status){  
					$(".error_message").html(message);   
					return false;     
				} 
				swal(message, {
                        buttons: false,
                        timer: 3000,   
				});
				location.reload(true);
			}	
		};


	}
	</script>
</body>
</html>