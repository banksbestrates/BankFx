

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
                                    <div class="d-flex align-items-center">
										<h5 class="card-title"> </h5>
										
									</div>
								</div>
								<div class="card-body">
									<div class="">
										<textarea name="editor" id="data"></textarea>
									</div>
									<br/>
									<button class="btn btn-block btn-primary" id="update_button" onclick="updatePolicy('<?php echo $admin_data['policy_type']?>')">Update</button>
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
		<script src="<?php echo base_url()?>assets/libs/policyProcess.js"></script>
		<script>
			CKEDITOR.replace( 'editor' );
			get_user_policy("<?php echo $admin_data['policy_type']?>");
        </script>