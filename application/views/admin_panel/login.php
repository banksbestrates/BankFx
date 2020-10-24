<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>BankFx:Admin</title>
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
	<link rel="stylesheet" href="<?php echo base_url()?>assets/admin_panel/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/admin_panel/css/atlantis.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/admin_panel/css/demo.css">
	<style>
    .blue_background{
        background-color:#0374A1;
    }
    .bg-logo{
        background: url('assets/img/login/Logo.png');
        background-position: center;
		background-size:contain;
		background-repeat:no-repeat;
    }
    #mydiv {
		top: 10%;
		background-color:#e9ffff;
		box-shadow:2px 3px 5px #1a1818;
    }  
    .login_form{
        padding:40px 20px 40px 20px;
    }
	</style>
</head>
<body class="blue_background">
	<div class="wrapper">
		<input type="hidden" id="baseUrl" value="<?php echo base_url()?>"/>
        <div class="col-md-5 mx-auto my-auto bg-white" id="mydiv">
			<div class=" login_row">		
				<div class="col-md-12 login_form">
					<div class="form-group">
						<img src="<?php echo base_url()?>assets/img/logo/main_logo.png" class="w-100">
					</div>	
                    <div class="form-group email_form">
                        <label for="email2">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email" value="admin@bankfx.com">
				    </div>
                    <div class="form-group password_form">
				        <label for="passsword">Password</label>
				        <input type="password" class="form-control" id="password" placeholder="Enter Passsword">
				    </div>
                    <div class="form-group">
						<button class="btn btn-block blue_background mt-4 text-white" onclick="login()" >Login</button>
				    </div>
                    <div class="form-group text-center">
				     	<h6 class="error_message text-danger"></h6>
				    </div>
                </div>									
			</div>
		</div>	
	</div>
	<!--   Core JS Files   -->
	<script src="<?php echo base_url();?>assets/admin_panel/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php echo base_url();?>assets/admin_panel/js/core/popper.min.js"></script>
	<script src="<?php echo base_url();?>assets/admin_panel/js/core/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/admin_panel/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo base_url();?>assets/admin_panel/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<script src="<?php echo base_url();?>assets/admin_panel/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<script src="<?php echo base_url();?>assets/admin_panel/js/atlantis.min.js"></script>
	<script src="<?php echo base_url();?>assets/admin_panel/js/setting-demo2.js"></script>
	<script src="<?php echo base_url();?>assets/admin_panel/libs/common.js"></script>
	<script src="<?php echo base_url();?>assets/admin_panel/libs/loginProcess.js"></script>
</body>
</html>