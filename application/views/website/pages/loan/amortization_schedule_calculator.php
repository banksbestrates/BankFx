
    <link rel="stylesheet" href="assets/mortgage_calculator/assets/vendor/bootstrap/bootstrap.min.css">
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
    <main>
        <!-- End Header -->
        <section class="g-brd-top g-brd-gray-light-v4 g-py-10">

            <div class="container pt-4">
           

                <div class="d-sm-flex">
                    <div class="align-self-center">
                    <h2 class="u-heading-v2__title g-mb-10 g-font-weight-800 g-color-black">Amortization Schedule Calculator</h2>
                       
                    </div>
             
                </div>
            </div>
        </section>

        <!-- Icon Blocks -->
        <section class="container g-mb-20 g-mt-20">
            <div class="container">
                <div class="row">
                    <!-- Left Pane -->
                    <div class="col-sm-6 col-lg-3 m-0 p-0">
                        <div class="g-brd-around g-brd-yellow g-pa-15 ">

                            <div class="form-group g-mb-20">
                                <label class="g-mb-10" for="loanAmount">Loan amount</label>
                                <input id="loanAmount" name="loanAmount" class="form-control form-control-md rounded-0" type="text" placeholder="$100,000" value="100000" onkeyup="$(this).digits();" onchange="setAmortizationCalculation();">
								<span id="loanAmounttest" style="display: none;"></span>
                                <div id="loanAmountSlider1" class="u-slider-v1-3" data-result-container="loanAmounttest" data-default="100000" data-min="0" data-max="1000000"></div>
                            </div>
							
							<div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <label class="g-font-size-10 g-font-weight-600" for="interestRateFrom">Interest rate range</label>
                                        <input type="text" id="interestRateFrom" name="interestRateFrom" class="form-control rounded-0 form-control-md" onkeyup="$(this).percent();" value="5" onchange="setAmortizationCalculation();">
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <label class="g-font-size-10 g-font-weight-600" for="interestRateTo">&nbsp;</label>
                                        <input type="text" id="interestRateTo" name="interestRateTo" class="form-control rounded-0 form-control-md" onkeyup="$(this).percent();" value="4" onchange="setAmortizationCalculation();">
                                    </div>
                                </div>
                            </div>

                            <!-- Regular Slider Option Two -->
                            <div class="form-group g-mb-20">
                                <label class="g-mb-10" for="rateStep">Rate step</label>
                                <input id="rateStep" name="rateStep" class="form-control form-control-md rounded-0" type="text" placeholder="10" value="10" onchange="setAmortizationCalculation();">
								<span id="rateSteptest" style="display: none;"></span>
                                <div id="rateStepSlider1" class="u-slider-v1-3" data-result-container="rateSteptest" data-default="10" data-min="0" data-max="100"></div>
                            </div>
							
							
							<div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <label class="g-font-size-10 g-font-weight-600" for="termRangeFrom">Term range</label>
                                        <input type="text" id="termRangeFrom" name="termRangeFrom" class="form-control rounded-0 form-control-md " value="5" onchange="setAmortizationCalculation();">
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <label class="g-font-size-10 g-font-weight-600" for="termRangeTo">&nbsp;</label>
                                        <input type="text" id="termRangeTo" name="termRangeTo" class="form-control rounded-0 form-control-md" value="4" onchange="setAmortizationCalculation();">
                                    </div>
                                </div>
                            </div>

                            <!-- Regular Slider Option Two -->
                            <div class="form-group g-mb-20">
                                <label class="g-mb-10" for="termRangeStep">Term range (step value)</label>
                                <input id="termRangeStep" name="termRangeStep" class="form-control form-control-md rounded-0" type="text" placeholder="10" value="10" onchange="setAmortizationCalculation();">
								<span id="termRangeSteptest" style="display: none;"></span>
                                <div id="termRangeStepSlider1" class="u-slider-v1-3" data-result-container="termRangeSteptest" data-default="10" data-step="1" data-min="0" data-max="100"></div>
                            </div>
                           
                            <!-- End Regular Slider Option Two -->
                        </div>
                    </div>
                    <!-- Center Pane -->
                    <div class="col-sm-6 col-lg-6 g-ml-12 g-pl-2 g-brd-left-0 g-brd-around g-brd-yellow">
						<div class="row">
							<div class="col-sm-4 col-lg-4 m-0 p-0">
								<div class="g-brd-around g-brd-yellow g-brd-left-0">
									<div class="d-flex justify-content-center g-bg-gray-light-v4 g-brb-bottom g-brd g-py-10 g-px-15">
										<div>
											<h4>Term</h4>
										</div>
									
									</div>
									<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
										<div>
											<span class="text-nowrap g-mr-10 termMonthsTo">0</span>
										</div>
									</div>
									<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
										<div>
											<span class="text-nowrap g-mr-10 termMonthsTo">0</span>
										</div>
									</div>
									<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
										<div>
											<span class="text-nowrap g-mr-10 termMonthsFrom">0</span>
										</div>
									</div>
									<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
										<div>
											<span class="text-nowrap g-mr-10 termMonthsFrom">0</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-4 col-lg-4 m-0 p-0">
								<div class="g-brd-around g-brd-yellow g-brd-left-0">
									<div class="d-flex justify-content-center g-bg-gray-light-v4 g-brb-bottom g-brd g-py-10 g-px-15">
										<div>
											<h4>Interest</h4>
										</div>
									
									</div>
									<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
										<div>
											<span class="text-nowrap g-mr-10 termInterestTo">0%</span>
										</div>
									</div>
									<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
										<div>
											<span class="text-nowrap g-mr-10 termInterestFrom">0%</span>
										</div>
									</div>
									<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
										<div>
											<span class="text-nowrap g-mr-10 termInterestTo">0%</span>
										</div>
									</div>
									<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
									<div>
										<span class="text-nowrap g-mr-10 termInterestFrom">0%</span>
									</div>
								</div>
								</div>
							</div>
							<div class="col-sm-4 col-lg-4 m-0 p-0">
								<div class="g-brd-around g-brd-yellow g-brd-left-0">
									<div class="d-flex justify-content-center g-bg-gray-light-v4 g-brb-bottom g-brd g-py-10 g-px-15">
										<div>
											<h4>Payment</h4>
										</div>
									
									</div>
									<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
										<div>
											<span class="text-nowrap g-mr-10 paymentTermOne">$0</span>
										</div>
									</div>
									<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
										<div>
											<span class="text-nowrap g-mr-10 paymentTermTwo">$0</span>
										</div>
									</div>
									<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
										<div>
											<span class="text-nowrap g-mr-10 paymentTermThree">$0</span>
										</div>
									</div>
									<div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
									<div>
										<span class="text-nowrap g-mr-10 paymentTermFour">$0</span>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>

        </section>
    </main>
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
	<script src="assets/mortgage_calculator/assets/js/scripts/amortization_schedule_calculator.js"></script>
