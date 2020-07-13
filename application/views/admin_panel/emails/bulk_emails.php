
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
								<a href="#">All Emails</a>
							</li>											
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
                                    <div class="d-flex align-items-center">
										<h5 class="card-title">Sent Emails</h5>
										<button class="btn btn-primary btn-round ml-auto btn-sm" onclick="addNewMail(<?php echo $admin_data['admin_id']?>)">
											<i class="fa fa-plus"></i>&nbsp;
											Compose New Mail
										</button>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="category-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Email Subject</th>
													<th>Sent To</th>
													<!-- <th>Sent By</th> -->
													<th>Sent On</th>
													<th>Remove</th>
													<th>Remove</th>
												</tr>
											</thead>
											<tbody id="emailList">
											
                                            </tbody>
                                            <thead>
												<tr>
												    <th>Email Subject</th>
													<th>Sent To</th>
													<th>Sent On</th>
													<!-- <th>Sent By</th> -->
													<th>Remove</th>
													<th>Remove</th>
												</tr>
											</thead>
										</table>
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
			get_email_list();
		</script>