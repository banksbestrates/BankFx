<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Profile</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Profile</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
								<div class="d-flex align-items-center">
										<h5 class="card-title">My Profile</h5>
										<button class="btn btn-primary btn-round ml-auto btn-sm" onclick="resetPasswordModal(<?php echo $admin_data['admin_id']?>)">
											<i class="fa fa-cogs"></i>
											&nbsp;Reset Password
										</button>
									</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-6 col-lg-6">
											<div class="form-group name_form">
												<label for="email2">Name</label>
												<input type="text" class="form-control" id="name" placeholder="">
											</div>									
										</div>
										<div class="col-md-6 col-lg-6">
                                            <div class="form-group email_form">
												<label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" placeholder="">
                                                <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small>
											</div>									
										</div>
									</div>
								</div>
								<div class="card-action text-center">
                                    <button class="btn btn-primary btn-round ml-auto " onclick="update_profile(<?php echo $admin_data['admin_id']?>)">
											<i class="fas fa-paper-plane"></i>
											&nbsp;Update Profile
										</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="">
									BankFx
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Help
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Licenses
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2020, <a href="">BankFx</a>
					</div>				
				</div>
			</footer>
        </div>
		<script src="<?php echo base_url()?>assets/admin_panel/js/core/jquery.3.2.1.min.js"></script>
        <script src="<?php echo base_url()?>assets/admin_panel/libs/common.js"></script>
	    <script src="<?php echo base_url()?>assets/admin_panel/libs/loginProcess.js"></script>
		<script>
		    view_profile("<?php echo $admin_data['admin_id']?>");
		</script>