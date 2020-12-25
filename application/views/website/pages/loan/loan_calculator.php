
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
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="font-weight-900">Loan Calculator</h1>
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

                            <div class="form-group g-mb-20">
                                <label class="g-mb-10" for="loanAmount">Loan amount</label>
                                <input id="loanAmount" name="loanAmount" class="form-control form-control-md rounded-0" type="text" placeholder="$100,000" value="100000" onkeyup="$(this).digits();" />
								<span id="loanAmounttest" style="display: none;"></span>
                                <div id="loanAmountSlider1" class="u-slider-v1-3" data-result-container="loanAmounttest" data-default="100000" data-min="0" data-max="1000000"></div>
                            </div>
                            <!-- End Progress Bars -->

                            <!-- Regular Slider Option Two -->
                            <div class="form-group g-mb-20">
                                <label class="g-mb-10" for="loanTermYears">Loan term in years</label>
                                <input id="loanTermYears" name="loanTermYears" class="form-control form-control-md rounded-0" type="text" placeholder="4" value="4" onchange="$('#loanTermMonths').val(this.value * 12);" />
								<span id="loanTermYearstest" style="display: none;"></span>
                                <div id="loanTermYearsSlider1" class="u-slider-v1-3" data-result-container="loanTermYearstest" data-default="4" data-min="0" data-max="100"></div>
                            </div>
                            <!-- End Regular Slider Option Two -->

                            <div class="form-group ">

                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <label class="g-font-size-10 g-font-weight-600" for="loanTermMonths">Loan term in months</label>
                                        <input type="text" id="loanTermMonths" name="loanTermMonths" class="form-control rounded-0 form-control-md " value="48" onchange="$('#loanTermYears').val(this.value / 12);" />
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <label class="g-font-size-10 g-font-weight-600" for="interestRate">Interest rate per year</label>
                                        <input type="text" id="interestRate" name="interestRate" class="form-control rounded-0 form-control-md" onkeyup="$(this).percent();" value="4" />
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="btn btn-md btn-block u-btn-yellow rounded-0 g-mr-10 g-mb-18" onclick="setLoanCalculation();">Calculator</a>

                            <!-- End Regular Slider Option Two -->
                        </div>
                    </div>
                    <!-- Center Pane -->
                    <div class="col-sm-6 col-lg-6 m-0 p-0">
                        <div class="g-brd-around g-brd-yellow g-brd-left-0">
                            <div class="d-flex justify-content-center g-brd-bottom g-brd-yellow g-py-40 g-px-15">

                                <div>
                                    <span class="text-nowrap g-mr-10">Montly Payment</span>
                                    <h1 class="text-center g-color-blue g-font-weight-800 monthlyPayment">$0</h1>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
                                <div>
                                    <span class="text-nowrap g-mr-10">Total Principal Paid</span>
                                </div>
                                <div>
                                    <span class="text-nowrap g-mr-10 totalPrincipalPaid">$0</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
                                <div>
                                    <span class="text-nowrap g-mr-10">Total Interest Paid</span>
                                </div>
                                <div>
                                    <span class="text-nowrap g-mr-10 totalInterestPaid">$0</span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center g-py-40 g-px-15">

                                <div>
                                    <a class="btn btn-block u-btn-outline-blue g-rounded-5 g-py-6 g-mb-10" href="#">
                                        COMPARE RATES
                                    </a>
                                    <span class="text-nowrap g-mr-10"><a href="amortization_schedule_calculator.php" target="_blank">Show Amortization Schedule</a></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 m-0 p-0">
                        <div class="g-brd-around g-brd-yellow g-pa-20">
                            <div id="accordion-10" class="u-accordion u-accordion-color-yellow u-accordion-brd-yellow" role="tablist" aria-multiselectable="true">
                                <!-- Card -->
                                <div class="card rounded-0 g-brd-none">
                                    <div id="accordion-10-heading-01" class="u-accordion__header g-pa-0" role="tab">
                                        <h5 class="mb-0 g-font-weight-600 g-font-size-default">
                                            <a class="d-flex g-color-main g-text-underline--none--hover  g-pa-15-0" href="#accordion-10-body-01" data-toggle="collapse" data-parent="#accordion-10" aria-expanded="true" aria-controls="accordion-10-body-01">
                                                <span class="d-flex g-color-blue g-pr-10">
                                                    SHOW/HIDE EXTRA PAYMENT
                                                </span>
                                                <span class="u-accordion__control-icon">
                                                    <i class="fa fa-angle-down"></i>
                                                    <i class="fa fa-angle-up"></i>
                                                </span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="accordion-10-body-01" class="collapse show" role="tabpanel" aria-labelledby="accordion-10-heading-01" data-parent="#accordion-10">
                                        <div class="u-accordion__body g-color-gray-dark-v5 g-pa-15-0">
                                            This is where we sit down, grab a cup of coffee and dial in the details. Understanding the task at hand and ironing out the wrinkles is key. Now that we've aligned the details, it's time to get things mapped out and organized.

                                            <!-- Select Date Range -->
                                            <div class="form-group g-mt-20">
                                                <div class="row">
                                                    <div class="col-xl-3 g-mb-40 g-mb-0--xl">
                                                        <!-- Datepicker -->
                                                        <div class="input-group g-brd-primary--focus">
                                                            <input name="extraToMonthlyPayment" id="extraToMonthlyPayment" class="form-control form-control-md rounded-0" type="text" placeholder="$0">
                                                        </div>
                                                        <!-- End Datepicker -->
                                                    </div>

                                                    <div class="col-xl-9">
                                                        <p>to your montly payment</p>
                                                    </diV>
                                                </div>


                                            </div>
                                            <!-- Select Date Range -->
                                            <div class="form-group g-mt-20">
                                                <div class="row">
                                                    <div class="col-xl-3 g-mb-40 g-mb-0--xl">
                                                        <!-- Datepicker -->
                                                        <div class="input-group g-brd-primary--focus">
                                                            <input name="extraToYearlyPayment" id="extraToYearlyPayment" class="form-control form-control-md rounded-0" type="text" placeholder="$0">

                                                        </div>
                                                        <!-- End Datepicker -->
                                                    </div>

                                                    <div class="col-xl-5">
                                                        <p>as an extra yearly payment occuring every:</p>
                                                    </diV>
                                                    <div class="col-xl-3 g-mb-40 g-mb-0--xl">
                                                        <!-- Datepicker -->
                                                        <div class="form-group g-mb-20">
                                                            <select class="form-control rounded-0" id="paymentYearlyOn" name="paymentYearlyOn">
                                                                <option value="1">January</option>
                                                                <option value="2">February</option>
                                                                <option value="3">March</option>
                                                                <option value="4">April</option>
                                                                <option value="5">May</option>
                                                                <option value="6">June</option>
                                                                <option value="7">July</option>
                                                                <option value="8" selected="selected">August</option>
                                                                <option value="9">September</option>
                                                                <option value="10">October</option>
                                                                <option value="11">November</option>
                                                                <option value="12">December</option>
                                                            </select>
                                                        </div>
                                                        <!-- End Datepicker -->
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group g-mt-20">
                                                <div class="row">
                                                    <div class="col-xl-3 g-mb-40 g-mb-0--xl">
                                                        <!-- Datepicker -->
                                                        <div class="input-group g-brd-primary--focus">
                                                            <input name="extraOTP" id="extraOTP" class="form-control form-control-md rounded-0" type="text" placeholder="$0">

                                                        </div>
                                                        <!-- End Datepicker -->
                                                    </div>

                                                    <div class="col-xl-3">
                                                        <p>as a one-time payment in:</p>
                                                    </diV>
                                                    <div class="col-xl-3 g-mb-40 g-mb-0--xl">
                                                        <!-- Datepicker -->
                                                        <div class="form-group g-mb-20">

                                                            <select class="form-control rounded-0" id="extraOTPMonth" name="extraOTPMonth">
                                                                <option value="1">January</option>
                                                                <option value="2">February</option>
                                                                <option value="3">March</option>
                                                                <option value="4">April</option>
                                                                <option value="5">May</option>
                                                                <option value="6">June</option>
                                                                <option value="7">July</option>
                                                                <option value="8" selected="selected">August</option>
                                                                <option value="9">September</option>
                                                                <option value="10">October</option>
                                                                <option value="11">November</option>
                                                                <option value="12">December</option>
                                                            </select>
                                                        </div>
                                                        <!-- End Datepicker -->
                                                    </div>
                                                    <div class="col-xl-3 g-mb-40 g-mb-0--xl">
                                                        <!-- Datepicker -->
                                                        <div class="form-group g-mb-20">
                                                            <select class="form-control rounded-0" id="extraOTPYears" name="extraOTPYears">
																<?php for($i=date('Y')+10;$i > date('Y')-2;$i--){ ?>
																	<option value="<?php echo $i; ?>" <?php echo (date('Y') == $i ? "selected='selected'" : ""); ?>><?php echo $i; ?></option>
																<?php } ?>
                                                            </select>
                                                        </div>
                                                        <!-- End Datepicker -->
                                                    </div>

                                                </div>
                                            </div>
        </section>
        <!-- End Icon Blocks -->

		<!-- Icon Blocks -->
		<section class="container ammortizationSection" style="display: none;">
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
									<th>Payment #</th>
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

        <!-- Icon Blocks -->
        <section class="container">
            <div class="container">

                <div class="row">

                    <div class="col-sm-6 col-lg-3 m-0 p-0"></div>
                    <div class="col-sm-6 col-lg-6 m-0 p-0"></div>
                    <div class="col-sm-6 col-lg-3 g-mb-60"></div>


                </div>
        </section>
        <!-- End Icon Blocks -->     
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
	<script src="assets/mortgage_calculator/assets/js/scripts/loan_calculator.js"></script>


