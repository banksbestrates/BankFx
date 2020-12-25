
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

    <main>
    <!-- Icon Blocks -->
        <section class="container g-pt-30">
            <div class="container">
                <div class="row">
                    <!-- Left Pane -->
                    <div class="col-sm-12 col-lg-9 m-0 p-0">
                        <div class="g-brd-around g-brd-yellow g-pa-15 ">
                            <div class="d-flex justify-content-center g-py-40">
                                <div>
                                    <h2 class="text-center g-color-blue g-font-weight-800">Mortgage repayment shortened by <span class="mortgageShortenedBy">0 months</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 m-0 p-0">
                        
                    </div>

                    <div class="col-sm-6 col-lg-3 m-0 p-0">
						<div class="g-brd-around g-brd-yellow g-pa-15 ">
							<div class="mb-1">
								<h5 class="g-color-blue g-font-weight-800">Mortgage Payoff Inputs:</h5>
							</div>
							<div class="form-group g-mb-20">
								<label class="g-mb-10" for="yearsRemaining">Years remaining</label>
                                <input id="yearsRemaining" name="yearsRemaining" class="form-control form-control-md rounded-0" type="text" placeholder="25 years" value="25" />
                                <span id="yearsRemainingtest" style="display:none;"></span>
								<div id="yearsRemainingSlider1" class="u-slider-v1-3" data-result-container="yearsRemainingtest" data-default="25" data-min="0" data-max="100"></div>
							</div>
							<!-- End Progress Bars -->
                            <div class="form-group g-mb-20">
								<label class="g-mb-10" for="mortgageTerm">Original mortgage term</label>
                                <input id="mortgageTerm" name="mortgageTerm" class="form-control form-control-md rounded-0" type="text" placeholder="30 years" value="30" />
                                <span id="mortgageTermtest" style="display:none;"></span>
								<div id="mortgageTermSlider1" class="u-slider-v1-3" data-result-container="mortgageTermtest" data-default="30" data-min="0" data-max="100"></div>
							</div>
							<!-- End Progress Bars -->

                            <div class="form-group g-mb-20">
								<label class="g-mb-10" for="mortgageAmount">Original mortgage amount</label>
                                <input id="mortgageAmount" name="mortgageAmount" class="form-control form-control-md rounded-0" type="text" placeholder="$200,000" value="200000" onkeyup="$(this).digits();">
                                <span id="mortgageAmounttest" style="display:none;"></span>
								<div id="mortgageAmountSlider1" class="u-slider-v1-3" data-result-container="mortgageAmounttest" data-default="200000" data-min="0" data-max="1000000"></div>
							</div>
							<!-- End Progress Bars -->
                            <div class="form-group g-mb-20">
								<label class="g-mb-10" for="principalPayment">Additonal principal payment</label>
                                <input id="principalPayment" name="principalPayment" class="form-control form-control-md rounded-0" type="text" placeholder="$100" value="100" onkeyup="$(this).digits();">
                                <span id="principalPaymenttest" style="display:none;"></span>
								<div id="principalPaymentSlider1" class="u-slider-v1-3" data-result-container="principalPaymenttest" data-default="100" data-min="0" data-max="100000"></div>
							</div>
							<!-- End Progress Bars -->
	<!-- End Progress Bars -->
                             <div class="form-group g-mb-20">
								<label class="g-mb-10" for="interestRate">Annual interest rate</label>
                                <input id="interestRate" name="interestRate" class="form-control form-control-md rounded-0" type="text" placeholder="7%" value="7" onkeyup="$(this).percent();">
                                <span id="interestRatetest" style="display:none;"></span>
								<div id="interestRateSlider1" class="u-slider-v1-3" data-result-container="interestRatetest" data-default="7" data-min="0" data-max="100"></div>
							</div>
                            <!-- End Progress Bars -->
                            <div>
								<h4 class="g-font-weight-800">Total savings: <span class="totalExpenses">$0</span></h4>
							</div>

                        </div>
                        <div class="g-brd-around g-brd-yellow g-pa-15 ">
							<div class="mb-3">
								<h5 class="g-color-blue g-font-weight-800">Mortgage payoff result summary</h5>
                            </div>
                            
                            <p class="mb-0">Current Payment</p>
                            <h5 class="g-font-weight-800 mb-4 currentPayment">$0</h5>

                            <p class="mb-0">Accelerated Payment</p>
                            <h5 class="g-font-weight-800 mb-4 currentAcceleratedPayment">$0</h5>
                            
                            <p class="mb-0">Scheduled Payment</p>
                            <h5 class="g-font-weight-800 mb-4 scheduledPayment">$0</h5>
							
                            <p class="mb-0">Accelerated Payment</p>
                            <h5 class="g-font-weight-800 mb-4 scheduledAcceleratedPayment">$0</h5>
							
                            <!-- End Progress Bars -->
                            <a href="#" class="btn btn-md btn-block u-btn-yellow rounded-0 g-mr-10 g-mb-18" onclick="setPayoffCalculation();">Calculate</a>
						</div>
					</div>
					<!-- Center Pane -->
					<div class="col-sm-6 col-lg-6 m-0 p-0">

						<div class="g-brd-around g-brd-yellow g-brd-left-0">
						

							<div id="nav-1-1-primary-hor-center" class="tab-content">
								<div class="tab-pane fade show active" id="payment-breakdown" role="tabpanel">
                           
									<div id="overviewTab">
										<div class="g-pl-25 g-pb-20 g-pr-25">
											<div class="d-flex justify-content-center g-pa-25">
												<figure class="highcharts-figure" style="width:500px;">
													<div id="splineChart"></div>
												</figure>
											</div>
											<div class="g-brd-around g-pt-55 text-center">
												<a href="#" class="btn btn-md u-btn-darkgray g-rounded-50 g-width-170">Overveiw</a>
												<a href="#" class="btn btn-md u-btn-outline-darkgray g-rounded-50 g-width-170" onclick="$('#detailsTab').show();$('#overviewTab').hide();">Detail</a>
											</div>
										</div>
									</div>
									
									<div id="detailsTab" style="display: none;">
										<div class="d-flex justify-content-center g-bg-gray-light-v4 g-brb-bottom g-brd g-py-10 g-px-15">
											<div>
											<h4>Mortgage Payoff Summary</h4>	
											</div>
										
										</div>
										<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
											<div>
												<span class="text-nowrap g-mr-10">Original term</span>
											</div>
											<div>
												<span class="text-nowrap g-mr-10 originalTerm">$0</span>
											</div>
										</div>
										<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
											<div>
												<span class="text-nowrap g-mr-10">Remaining</span>
											</div>
											<div>
												<span class="text-nowrap g-mr-10 remaining">$0</span>
											</div>
										</div>
										<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
											<div>
												<span class="text-nowrap g-mr-10">Annual interest rate</span>
											</div>
											<div>
												<span class="text-nowrap g-mr-10 annualInterestRate">$0</span>
											</div>
										</div>
										<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
											<div>
												<span class="text-nowrap g-mr-10">Additional principal payment</span>
											</div>
											<div>
												<span class="text-nowrap g-mr-10 additionalPrincipalPayment">$0</span>
											</div>
										</div>
										<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
											<div>
												<span class="text-nowrap g-mr-10">Normal payment (PI)</span>
											</div>
											<div>
												<span class="text-nowrap g-mr-10 normalPayment">$0</span>
											</div>
										</div>
										<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
											<div>
												<span class="text-nowrap g-mr-10">Accelerated Payment (PI)</span>
											</div>
											<div>
												<span class="text-nowrap g-mr-10 acceleratedPayment">$0</span>
											</div>
										</div>
										<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
											<div>
												<span class="text-nowrap g-mr-10">Total scheduled payments</span>
											</div>
											<div>
												<span class="text-nowrap g-mr-10 totalScheduledPayment">$0</span>
											</div>
										</div>
										<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
											<div>
												<span class="text-nowrap g-mr-10">Total accelerated payments</span>
											</div>
											<div>
												<span class="text-nowrap g-mr-10 totalAcceleratedPayment">$0</span>
											</div>
										</div>
										<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
											<div>
												<span class="text-nowrap g-mr-10">Savings</span>
											</div>
											<div>
												<span class="text-nowrap g-mr-10 savings">$0</span>
											</div>
										</div>
										<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
											<div>
												<span class="text-nowrap g-mr-10">Mortgage shortened by</span>
											</div>
											<div>
												<span class="text-nowrap g-mr-10 mortgageShortenedBy">0 months</span>
											</div>
										</div>
										<div class="d-flex justify-content-center">
											<div class="g-brd-around">
												<a href="#" class="btn btn-md u-btn-outline-darkgray g-rounded-50 g-width-170 g-mb-15" onclick="$('#overviewTab').show();$('#detailsTab').hide();">Overveiw</a>
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
		<section class="container viewAmortizaion" style="display: none;">
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
									<th>Total Payment</th>
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
        <button type="button" class="close" onclick="Custombox.modal.close();">
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
	<script src="assets/mortgage_calculator/assets/js/scripts/mortgage_payoff_calculator.js"></script>
