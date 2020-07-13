
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Bulk Emails</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="<?php echo base_url()?>dashboard">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Details</a>
							</li>											
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
                                    <div class="d-flex align-items-center">
										<h5 class="card-title">Sent Emails</h5>
									</div>
								</div>
								<div class="card-body">
									<div class="email_detail">
                                        <h4> Sent to : <span class="text-primary sent_to"></h4>
                                        <h4> Sent on : <span class="text-primary sent_on"></h4>
                                        <h4> Subject : <span class="text-primary subject"></h4>
                                        <h4> Content: <span class="text-primary body"></h4><br/>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
		<!-- Datatables -->
		<script src="<?php echo base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
		<script src="<?php echo base_url()?>assets/libs/common.js"></script>
		<script src="<?php echo base_url()?>assets/js/plugin/datatables/datatables.min.js"></script>
		<script src="<?php echo base_url()?>assets/libs/emailProcess.js"></script>
		<script>
			get_email_detail("<?php echo $admin_data['email_id']?>");
		</script>