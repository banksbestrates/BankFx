
	<!-- CSS Global Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/vendor/icon-line/css/simple-line-icons.css">
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/vendor/icon-etlinefont/style.css">
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/vendor/icon-line-pro/style.css">
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/vendor/icon-hs/style.css">
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/vendor/animate.css">
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/vendor/dzsparallaxer/dzsparallaxer.css">
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/vendor/dzsparallaxer/dzsscroller/scroller.css">
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/vendor/dzsparallaxer/advancedscroller/plugin.css">
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/vendor/slick-carousel/slick/slick.css">
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/vendor/hs-megamenu/src/hs.megamenu.css">
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/vendor/hamburgers/hamburgers.min.css">


	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/vendor/jquery-ui/base/jquery-ui.min.css">

	<!-- CSS Unify -->
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/css/unify-core.css">
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/css/unify-components.css">
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/css/unify-globals.css">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/css/custom.css">
</head>

<body>
	<main>
    <div class="container pt-5 pb-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="font-weight-900 mb-2">Mortgage Calculator</h1>
            </div>
        </div>
    </div>
		<!-- Icon Blocks -->
		<section class="container g-pt-30">
			<div class="container">
				<div class="row">
					<!-- Left Pane -->
					<div class="col-sm-6 col-lg-3 m-0 p-0">
						<div class="g-brd-around g-brd-yellow g-pa-15 ">
							<div class="mb-1">
								<p>Enter your details below to estimate your monthly mortgage payment with taxes, fees and insurance.</p>
							</div>
							<div class="form-group g-mb-20">
								<label class="g-mb-10" for="purchaseAmount">Purchase Price</label>
								<input id="purchaseAmount" name="purchaseAmount" class="form-control form-control-md rounded-0" type="text" placeholder="$250,000" value="250000" onChange="$(this).digits();setCalculation();">
								<span id="purchaseAmounttest" style="display:none;"></span>
							</div>
							<!-- End Progress Bars -->


							<!-- Regular Slider Option Two -->
							<div class="form-group g-mb-20">
								<div id="purchaseAmountSlider1" class="u-slider-v1-3 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-result-container="purchaseAmounttest" data-default="250000" data-min="0" data-max="1000000"></div>
							</div>
							<!-- End Regular Slider Option Two -->

							<div class="form-group row">
								<label class="g-pl-20" for="downPayment_amount">Down Payment</label>
								<div class="col-md-8">
									<input type="text" id="downPayment_amount" name="downPayment_amount" class="form-control rounded-0 form-control-md" onKeyUp="getDownpayment(this.value, 'amount');" value="50000" onChange="$(this).digits();setCalculation();" />
								</div>
								<div class="col-md-4 g-pl-0">
									<input type="text" id="downPayment_percentage" name="downPayment_percentage" class="form-control rounded-0 form-control-md" onKeyUp="getDownpayment(this.value, 'percentage');" value="20" onChange="setCalculation();" />
								</div>
							</div>

							<div class="form-group g-mb-20">
								<label class="g-mb-10" for="interestRate">Interest Rate</label>
								<input id="interestRate" name="interestRate" class="form-control form-control-md rounded-0" type="float" value="4.9" onChange="setCalculation();">
								<span id="interestRatetest" style="display:none;"></span>
							</div>

							<!-- Regular Slider Option Two -->
							<div class="form-group g-mb-20">
								<div id="interestRateSlider1" class="u-slider-v1-3" data-result-container="interestRatetest" data-default="4.9" step="0.5" data-min="0" data-max="100"></div>
							</div>
							<!-- End Regular Slider Option Two -->

							<div class="form-group g-mb-25">
								<label for="paymentYears">Loan Type</label>
								<select class="form-control rounded-0" id="paymentYears" name="paymentYears" onChange="setCalculation();">
									<option value="30" selected="selected">30-Year Fixed</option>
									<option value="20">20-Year Fixed</option>
									<option value="15">15-Year Fixed</option>
									<option value="10">10-Year Fixed</option>
								</select>
							</div>
							<div style="margin-bottom: 18px;">
								<p>HOA Fees, Insurance & Taxes
									<a href="#hoatab" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down fa-2x"></i></a>
								</p>
							</div>
							<div id="hoatab" class="collapse">
								<div class="form-group g-mb-20">
									<label class="g-mb-10" for="locationName">Location</label>
									<input id="locationName" class="form-control form-control-md rounded-0" type="text" placeholder="$240,000">
								</div>

								<div class="form-group row">
									<label class="g-pl-20" for="annualPropertyTax">Annual Property Tax</label>
									<input id="annualPropertyTax" name="annualPropertyTax" class="form-control rounded-0 form-control-md" type="text" value="3200" onChange="$(this).digits();setCalculation();">
									<span id="annualTaxtest" style="display:none;"></span>
								</div>

								<!-- Regular Slider Option Two -->
								<div class="form-group g-mb-20">
									<div id="annualTaxSlider1" class="u-slider-v1-3" data-result-container="annualTaxtest" data-default="3200" data-min="0" data-max="10000"></div>
								</div>
								<!-- End Regular Slider Option Two -->

								<div class="form-group row">
									<label class="g-pl-10" for="annualHomeInsurance">Annual Homeowners Insurance</label>
									<input id="annualHomeInsurance" name="annualHomeInsurance" class="form-control form-control-md rounded-0" type="text" value="750" onChange="$(this).digits();setCalculation();">
									<span id="annualInsurancetest" style="display:none;"></span>
								</div>

								<!-- Regular Slider Option Two -->
								<div class="form-group g-mb-20">
									<div id="annualInsuranceSlider1" class="u-slider-v1-3" data-result-container="annualInsurancetest" data-default="750" data-min="0" data-max="10000"></div>
								</div>
								<!-- End Regular Slider Option Two -->

								<div class="form-group g-mb-25">
									<label for="monthlyHOADues">Monthly HOA/ Condo Fees</label>
									<input id="monthlyHOADues" name="monthlyHOADues" class="form-control form-control-md rounded-0" type="text" value="150" onChange="$(this).digits();setCalculation();">
									<span id="monthlyDuestest" style="display:none;"></span>
								</div>

								<!-- Regular Slider Option Two -->
								<div class="form-group g-mb-20">
									<div id="monthlyDuesSlider1" class="u-slider-v1-3" data-result-container="monthlyDuestest" data-default="150" data-min="0" data-max="1000"></div>
								</div>
								<!-- End Regular Slider Option Two -->
							</div>
						</div>
					</div>

					<!-- Center Pane -->
					<div class="col-sm-6 col-lg-6 m-0 p-0">

						<div class="g-brd-around g-brd-yellow g-brd-left-0">
							<div class="g-brd-bottom g-brd-yellow">
								<ul class="nav nav-justified u-nav-v2-2" role="tablist" data-target="nav-1-1-primary-hor-center" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block u-btn-outline-lightgray g-mb-10">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#payment-breakdown" role="tab">Payment Breakdown</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#payment-overtime" role="tab">Payment Over Time</a>
									</li>
								</ul>
							</div>

							<div id="nav-1-1-primary-hor-center" class="tab-content">
								<div class="tab-pane fade show active" id="payment-breakdown" role="tabpanel">
									<div id="overviewTab">
										<div class="g-pl-25 g-pb-25 g-pr-25">
											<figure class="highcharts-figure" style="width:500px;">
												<div id="donutChart"></div>
											</figure>
											<div class="g-brd-around g-pa-20 text-center">
												<a href="#" class="btn btn-md u-btn-darkgray g-rounded-50 g-width-170 g-mb-15">Overveiw</a>
												<a href="#" class="btn btn-md u-btn-outline-darkgray g-rounded-50 g-width-170 g-mb-15" onClick="$('#detailsTab').show();$('#overviewTab').hide();">Detail</a>
											</div>
										</div>

									</div>

									<div id="detailsTab" style="display: none;">
										<div class="g-pl-25 g-pb-25 g-pr-25">
											<!-- Green -->
											<div class="form-group g-mb-40 g-pt-10 text-center">
												<label class="g-mb-10">
													<span class="g-color-primary" style="font-size: 24px; color: #72c02c;">$<span id="mortgagePayment2">0</span><br />Mortgage Payment</span>
												</label>
												<div id="mortgageSlider" class="u-slider-v1-3  ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-result-container="mortgagePayment2" data-default="0" data-min="0" data-max="10000">
													<div class="ui-slider-range ui-corner-all ui-widget-header ui-slider-range-min" style="width: 0%;"></div>
													<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span>
												</div>
											</div>

											<!-- Turquoise -->
											<div class="form-group g-mb-40 text-center">
												<label class="g-mb-10">
													<span class="g-color-default" style="font-size: 24px; color: #3398dc;">$<span id="homeInsurance2">0</span><br />Home Insurance</span>
												</label>
												<div id="homeInsuranceSlider" class="u-slider-v1-3 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-result-container="homeInsurance2" data-default="0" data-min="0" data-max="10000">
													<div class="ui-slider-range ui-corner-all ui-widget-header ui-slider-range-min" style="width: 0%;"></div>
													<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span>
												</div>
											</div>

											<!-- Orange -->
											<div class="form-group g-mb-40 text-center">
												<label class="g-mb-10">
													<span class="g-color-warning" style="font-size: 24px; color: #ebc71d;">$<span id="taxes2">0</span><br />Taxes & Other Fees</span>
												</label>
												<div id="taxesSlider" class="u-slider-v1-3 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-result-container="taxes2" data-default="0" data-min="0" data-max="10000">
													<div class="ui-slider-range ui-corner-all ui-widget-header ui-slider-range-min" style="width: 0%;"></div>
													<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span>
												</div>
											</div>
										</div>
										<div class="d-flex justify-content-center">
											<div class="g-brd-around">
												<a href="#" class="btn btn-md u-btn-outline-darkgray g-rounded-50 g-width-170 g-mb-15" onClick="$('#overviewTab').show();$('#detailsTab').hide();">Overveiw</a>
												<a href="#" class="btn btn-md u-btn-darkgray g-rounded-50 g-width-170 g-mb-15">Detail</a>
											</div>
										</div>
									</div>
								</div>

								<div class="tab-pane fade" id="payment-overtime" role="tabpanel">
									<div id="overviewTab2">
										<div class="d-flex justify-content-center g-pa-25">
											<figure class="highcharts-figure" style="width:500px;">
												<div id="splineChart"></div>
											</figure>
										</div>
										<div class="d-flex justify-content-center g-pa-25">
											<div class="g-brd-around">
												<a href="#" class="btn btn-md u-btn-darkgray g-rounded-50 g-width-170 g-mb-15">Overveiw</a>
												<a href="#" class="btn btn-md u-btn-outline-darkgray g-rounded-50 g-width-170 g-mb-15" onClick="$('#detailsTab2').show();$('#overviewTab2').hide();">Detail</a>
											</div>
										</div>
									</div>
									<div id="detailsTab2" style="display:none;">
										<div class="text-center g-pa-25">
										
												<div class="media g-brd-around g-brd-left-3 rounded">
													<div class="d-flex g-mr-15">
														<span class="g-width-20 g-height-20 rounded-circle g-bg-green"></span>
													</div>
													<div class="media-body">
														<div class="d-flex justify-content-between">
															<h5 class="h6 g-font-weight-600 g-color-black">Mortgage Payment</h5>
														</div>
													</div>
												</div>
											<div class="text-right g-line-height-1">
												<h4 class="g-font-weight-600 g-color-green mortgage_payment">$0</h4>
											</div>
											<div class="media g-brd-around g-brd-left-3 rounded">
													<div class="d-flex g-mr-15">
														<span class="g-width-20 g-height-20 rounded-circle g-bg-blue"></span>
													</div>
													<div class="media-body">
														<div class="d-flex justify-content-between">
															<h5 class="g-font-weight-600 g-color-black">Home Insurance</h5>

														</div>
														<p class="g-mb-0">Homeowners Insurance</p>
														<p>Private Mortgage Insurance (PMI)</p>
													</div>
												</div>

												<div class="text-right g-line-height-1">
												<h4 class="g-font-weight-600 g-color-blue home_insurance">$0</h4>
												<p class="g-mb-0 homeowner_insurance">$0</p>
												<p class="pmi_insurance">$0</p>
											</div>

												<div class="media g-brd-around g-brd-left-3 rounded">
													<div class="d-flex g-mr-15">
														<span class="g-width-20 g-height-20 rounded-circle g-bg-yellow"></span>
													</div>
													<div class="media-body">
														<div class="d-flex justify-content-between">
															<h5 class="g-font-weight-600 g-color-black">Taxes & Other Fees</h5>

														</div>
														<p class="g-mb-0">Property Taxes</p>
														<p>HOA/Condo Fees</p>
													</div>
												</div>

										</div>
									
										<div class="d-flex justify-content-between g-pa-25">
											<div>
											
											</div>

											<div class="text-right g-line-height-1">
												<h4 class="g-font-weight-600 g-color-yellow tax_fees">$0</h4>
												<p class="g-mb-0 property_tax">$0</p>
												<p class="hoa_tax">$0</p>
											</div>
										</div>
										<div class="d-flex justify-content-center ">
											<div>
												<p class="g-mb-25">Disclaimer can go her should we need one</p>
											</div>
										</div>
										<div class="d-flex justify-content-center g-pa-25">
											<div class="g-brd-around">
												<a href="#" class="btn btn-md u-btn-outline-darkgray g-rounded-50 g-width-170 g-mb-15" onClick="$('#overviewTab2').show();$('#detailsTab2').hide();">Overveiw</a>
												<a href="#" class="btn btn-md u-btn-darkgray g-rounded-50 g-width-170 g-mb-15">Detail</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Right Pane -->
					<!-- <div class="col-sm-6 col-lg-3 g-mb-60">
						<div class="g-brd-around g-brd-gray-dark-v4 rounded g-pa-25 g-bg-gray-light-v4" style="height:550px">
							<div class="mb-5">
								<h2 class="h4 g-color-red g-font-weight-800 text-uppercase">NOTES FOR TEAM</h2>
								<p class="g-color-red">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								<p class="g-color-red">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
									Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
									galley of type and scrambled it to make a type specimen book.</p>
							</div>
						</div>

					</div> -->
				</div>
		</section>
		<!-- End Icon Blocks -->

		<!-- Icon Blocks -->
		<section class="container">
			<div class="container">

				<div class="row">

					<div class="col-sm-6 col-lg-3 m-0 p-0"></div>
					<div class="col-sm-6 col-lg-6 m-0 p-0"></div>
					<div class="col-sm-6 col-lg-3 g-mb-60"></div>

					<div class="u-heading-v8-1 g-mb-30">
						<h2 class="h3 text-uppercase u-heading-v8__title g-font-weight-700 mb-0">Amortization Schedule</h2>
					</div>
					<!-- Table Bordered -->
					<div class="table-responsive">
						<table class="table table-bordered g-brd-yellow">
							<thead>
								<tr>
									<th>Payment</th>
									<th>Balance</th>
									<th>Princple</th>
									<th>Interest</th>
									<th>New Balance</th>
								</tr>
							</thead>
							<tbody class="ammortizationTable"></tbody>
						</table>
					</div>
					<!-- End Table Bordered -->
				</div>
		</section>
		<!-- End Icon Blocks -->
	</main>

	<div class="u-outer-spaces-helper"></div>

	<style>
		.table-bordered td,
		.table-bordered th {
			border: 1px solid #ebc71d !important;
		}
	</style>

	<!-- JS Global Compulsory -->
	<script src="assets/mortgage_calculator/assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/popper.js/popper.min.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/bootstrap/bootstrap.min.js"></script>


	<!-- JS Implementing Plugins -->
	<script src="assets/mortgage_calculator/assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/dzsparallaxer/dzsparallaxer.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/dzsparallaxer/dzsscroller/scroller.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/dzsparallaxer/advancedscroller/plugin.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/appear.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/slick-carousel/slick/slick.js"></script>

	<!-- JS Unify -->
	<script src="assets/mortgage_calculator/assets/js/hs.core.js"></script>
	<script src="assets/mortgage_calculator/assets/js/components/hs.header.js"></script>
	<script src="assets/mortgage_calculator/assets/js/helpers/hs.hamburgers.js"></script>
	<script src="assets/mortgage_calculator/assets/js/components/hs.tabs.js"></script>
	<script src="assets/mortgage_calculator/assets/js/components/hs.progress-bar.js"></script>
	<script src="assets/mortgage_calculator/assets/js/components/hs.rating.js"></script>
	<script src="assets/mortgage_calculator/assets/js/components/hs.counter.js"></script>
	<script src="assets/mortgage_calculator/assets/js/components/hs.carousel.js"></script>
	<script src="assets/mortgage_calculator/assets/js/components/hs.go-to.js"></script>

	<!-- High Charts -->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/series-label.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>

	<!-- JS Customization -->
	<script src="assets/mortgage_calculator/assets/js/custom.js"></script>

	<!-- Style Switcher -->

	<div id="resolutionCaution" class="text-left g-max-width-600 g-bg-white g-pa-20" style="display: none;">
		<button type="button" class="close" onClick="Custombox.modal.close();">
			<i class="hs-icon hs-icon-close"></i>
		</button>
		<h4 class="g-mb-20">Screen resolution less than 1400px</h4>
	</div>

	<div id="copyModal" class="text-left modal-demo g-bg-white g-color-black g-pa-20" style="display: none;"></div>

	<!-- CSS -->
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/vendor/chosen/chosen.css">
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/vendor/prism/themes/prism.css">
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/vendor/custombox/custombox.min.css">
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/style-switcher/vendor/spectrum/spectrum.css">
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/style-switcher/vendor/spectrum/themes/sp-dark.css">
	<link rel="stylesheet" href="assets/mortgage_calculator/assets/style-switcher/style-switcher.css">
	<!-- End CSS -->

	<!-- Scripts -->
	<script src="assets/mortgage_calculator/assets/vendor/chosen/chosen.jquery.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/image-select/src/ImageSelect.jquery.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/custombox/custombox.min.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/clipboard/dist/clipboard.min.js"></script>

	<!-- Prism -->
	<script src="assets/mortgage_calculator/assets/vendor/prism/prism.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/prism/components/prism-markup.min.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/prism/components/prism-css.min.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/prism/components/prism-clike.min.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/prism/components/prism-javascript.min.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/prism/plugins/toolbar/prism-toolbar.min.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/prism/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
	<!-- End Prism -->

	<script src="assets/mortgage_calculator/assets/js/components/hs.scrollbar.js"></script>
	<script src="assets/mortgage_calculator/assets/js/components/hs.select.js"></script>
	<script src="assets/mortgage_calculator/assets/js/components/hs.modal-window.js"></script>
	<script src="assets/mortgage_calculator/assets/js/components/hs.markup-copy.js"></script>

	<script src="assets/mortgage_calculator/assets/style-switcher/vendor/cookiejs/jquery.cookie.js"></script>
	<script src="assets/mortgage_calculator/assets/style-switcher/vendor/spectrum/spectrum.js"></script>
	<script src="assets/mortgage_calculator/assets/style-switcher/style-switcher.js"></script>
	<!-- End Scripts -->
	<!-- End Style Switcher -->

	<!-- jQuery UI Core -->
	<script src="assets/mortgage_calculator/assets/vendor/jquery-ui/widget.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/jquery-ui/version.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/jquery-ui/keycode.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/jquery-ui/position.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/jquery-ui/unique-id.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/jquery-ui/safe-active-element.js"></script>


	<!-- jQuery UI Helpers -->
	<script src="assets/mortgage_calculator/assets/vendor/jquery-ui/menu.js"></script>
	<script src="assets/mortgage_calculator/assets/vendor/jquery-ui/mouse.js"></script>

	<!-- jQuery UI Widgets -->
	<script src="assets/mortgage_calculator/assets/vendor/jquery-ui/slider.js"></script>

	<!-- JS Unify -->
	<script src="assets/mortgage_calculator/assets/js/components/hs.slider.js"></script>
	
	<!-- CORE FILES -->
	<script src="assets/mortgage_calculator/assets/js/scripts/common.js"></script>
	<script src="assets/mortgage_calculator/assets/js/scripts/mortgage_calculator.js"></script>

