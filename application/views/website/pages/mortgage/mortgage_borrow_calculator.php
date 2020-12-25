
    <!-- CSS Global Icons -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
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
        <div class="container pt-5 pb-4">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="font-weight-900 mb-2">How Much Money Can I Borrow for a Mortgage?</h1>
                </div>
            </div>
        </div>
        <!-- Icon Blocks -->
        <section class="container g-pt-30">
            <div class="container">
                <div class="row">
                    <!-- Left Pane -->
                    <div class="col-sm-12 col-lg-9 m-0 p-0">
                        <div class="g-brd-around g-brd-yellow g-pa-15 ">
                            <div class="d-flex justify-content-center g-py-40 g-px-15">
                                <div>
                                    <h1 class="text-center g-color-blue g-font-weight-800">You can purchase a <span class="totalBorrowAmount">$0</span> home</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-3 m-0 p-0">
                    </div>


                    <div class="col-sm-6 col-lg-3 m-0 p-0">
                        <div class="g-brd-around g-brd-yellow g-pa-15">
                            <div class="mb-4">
                                <h4 class="g-font-weight-800 g-color-blue g-mb-10">Mortgage Information</h4>
                            </div>
                            <div class="form-group g-mb-20">
                                <label for="calculateFor">Calculate for</label>
                                <select class="form-control rounded-0" id="calculateFor" name="calculateFor" onchange="setBorrowCalculation();">
                                    <option value="annual_income" selected="selected">Annual income</option>
                                    <!--<option value="purchase_price">Purchase price</option>
                                    <option value="total_monthly_payment">Total monthly payment</option>-->
                                </select>
                            </div>

                            <div class="form-group g-mb-20">
                                <label class="g-mb-10" for="annualIncome">Annual Income</label>
                                <input type="text" id="annualIncome" name="annualIncome" class="form-control form-control-md rounded-0" placeholder="$80,000" value="80000" onkeyup="$(this).digits();" onchange="setBorrowCalculation();">
								<span id="annualIncometest" style="display: none;"></style>
								<div id="annualIncomeSlider1" class="u-slider-v1-3" data-result-container="annualIncometest" data-default="80000" data-min="0" data-max="1000000"></div>
							</div>
                            <div class="mb-4">
                                <p class="g-font-weight-800 g-mb-10">Purchase Price: <span class="totalBorrowAmount">$0 </span></p>
                                <p class="g-font-weight-800 g-mb-30">Total Monthly Payment: <span class="totalMonthlyPayment">: $0</span></p>
                                <p class="g-font-weight-800 g-mb-30">Loan amount: <span class="loanAmount">$0</span></p>

                                <div class="form-group g-mb-20">
                                    <label for="paymentYears">Term in year</label>
                                    <select class="form-control rounded-0" id="paymentYears" name="paymentYears" onchange="setBorrowCalculation();">
                                        <option value="30" selected="selected">30</option>
                                        <option value="20">20-Year Fixed</option>
                                        <option value="15">15-Year Fixed</option>
                                        <option value="10">10-Year Fixed</option>
                                    </select>
                                </div>
                            </div>
                            <!-- End Progress Bars -->

                            <div class="form-group g-mb-20">
                                <label class="g-mb-10" for="interestRate">Interest rate</label>
                                <input id="interestRate" name="interestRate" class="form-control form-control-md rounded-0" type="float" value="4.5" onkeyup="$(this).percent();" onchange="setBorrowCalculation();">
								<span id="interestRatetest" style="display:none;"></span>
								<div id="interestRateSlider1" class="u-slider-v1-3" data-result-container="interestRatetest" data-default="4.5" data-step="0.1" data-min="0" data-max="100"></div>
							</div>

                            <div class="form-group g-mb-20">
                                <label for="propertyTax">Property tax</label>
                                <input type="float" class="form-control form-control-md rounded-0" id="propertyTax" name="propertyTax" value="1" onkeyup="$(this).percent();" onchange="setBorrowCalculation();" />
								<span id="propertyTaxtest" style="display:none;"></span>
								<div id="propertyTaxSlider1" class="u-slider-v1-3" data-result-container="propertyTaxtest" data-default="1" data-step="0.1" data-min="0" data-max="100"></div>
							</div>
							
							<div class="form-group g-mb-20">
                                <label for="homeInsurance">Home insurance</label>
                                <input type="float" class="form-control form-control-md rounded-0" id="homeInsurance" name="homeInsurance" value="0.5" onkeyup="$(this).percent();" onchange="setBorrowCalculation();" />
								<span id="homeInsurancetest" style="display:none;"></span>
								<div id="homeInsuranceSlider1" class="u-slider-v1-3" data-result-container="homeInsurancetest" data-default="0.5" data-step="0.1" data-min="0" data-max="100"></div>
							</div>

							<div class="form-group g-mb-20">
								<label for="reportAmortization">Report amortization</label>
								<select class="form-control rounded-0" id="reportAmortization" name="reportAmortization" onchange="setBorrowCalculation();">
									<option value="annually" selected="selected">Annually</option>
									<!--<option value="monthly">Monthly</option>-->
								</select>
							</div>

                        </div>
                        <div class="g-brd-yellow g-brd-around g-brb-top-0 g-pa-15">
                            <div class="">
                                <p class="mb-0">Down payment & closing cost
                                    <a href="#hoatab" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down fa-2x"></i></a>
                                </p>
                            </div>
                            <div id="hoatab" class="collapse">

                                <div class="form-group g-mt-10">
                                    <label for="cashOnHand">Cash on hand</label>
                                    <input id="cashOnHand" name="cashOnHand" class="form-control rounded-0 form-control-md" type="text" value="3200" onchange="setBorrowCalculation();">
									<span id="cashOnHandtest" style="display: none;"></style>
									<div id="cashOnHandSlider1" class="u-slider-v1-3" data-result-container="cashOnHandtest" data-default="3200" data-min="0" data-max="10000"></div>
                                </div>

                                <div class="form-group g-mt-10">
                                    <label for="loanOrigination">Loan origination</label>
                                    <input id="loanOrigination" name="loanOrigination" class="form-control form-control-md rounded-0" type="text" value="750" onchange="setBorrowCalculation();">
									<span id="loanOriginationtest" style="display: none;"></style>
									<div id="loanOriginationSlider1" class="u-slider-v1-3" data-result-container="loanOriginationtest" data-default="3200" data-min="0" data-max="10000"></div>
                                </div>

                                <div class="form-group g-mb-25">
                                    <label for="pointsPaid">Points paid</label>
                                    <input id="pointsPaid" name="pointsPaid" class="form-control form-control-md rounded-0" type="text" value="150" onchange="setBorrowCalculation();">
									<span id="pointsPaidtest" style="display: none;"></style>
									<div id="pointsPaidSlider1" class="u-slider-v1-3" data-result-container="pointsPaidtest" data-default="3200" data-min="0" data-max="10000"></div>
                                </div>

                                <div class="form-group g-mb-25">
                                    <label for="otherClosingCost">Other closing costs</label>
                                    <input id="otherClosingCost" name="otherClosingCost" class="form-control form-control-md rounded-0" type="text" value="150" onchange="setBorrowCalculation();">
									<span id="otherClosingCosttest" style="display: none;"></style>
									<div id="otherClosingCostSlider1" class="u-slider-v1-3" data-result-container="otherClosingCosttest" data-default="3200" data-min="0" data-max="10000"></div>
                                </div>

                                <div class="g-mb-20">
                                    <label class="form-check-inline u-check g-pl-25">
                                        <input name="limitDownpayment" id="limitDownpayment" class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" checked="">
                                        <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                                            <i class="fa" data-check-icon=""></i>
                                        </div>
                                        Limit downpayment to 20%
                                    </label>
                                    <h4 class="g-font-weight-800 g-mb-10 downpaymentClosingCost">$0</h4>
                                </div>
                            </div>
                        </div>
                        <div class="g-brd-yellow g-brd-around g-brb-top-0 g-pa-15">
                            <div class="">
                                <p class="mb-0">Total Montly Debt Payment
                                    <a href="#hoatab1" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down fa-2x"></i></a>
                                </p>
                            </div>
                            <div id="hoatab1" class="collapse">
                                <div class="form-group g-mt-10">
                                    <label for="monthlyCarPayment">Montly car payment(s)</label>
                                    <input id="monthlyCarPayment" name="monthlyCarPayment" class="form-control rounded-0 form-control-md" type="text" value="3200" onchange="setBorrowCalculation();">
									<span id="monthlyCarPaymenttest" style="display: none;"></span>
									<div id="monthlyCarPaymentSlider1" class="u-slider-v1-3" data-result-container="monthlyCarPaymenttest" data-default="3200" data-min="0" data-max="10000"></div>
                                </div>

                                <div class="form-group">
                                    <label class="g-pl-10" for="creditCardPayment">Credit card payment(s)</label>
                                    <input id="creditCardPayment" name="creditCardPayment" class="form-control form-control-md rounded-0" type="text" value="750" onchange="setBorrowCalculation();">
									<span id="creditCardPaymenttest" style="display: none;"></span>
									<div id="creditCardPaymentSlider1" class="u-slider-v1-3" data-result-container="creditCardPaymenttest" data-default="3200" data-min="0" data-max="10000"></div>
                                </div>

                                <div class="form-group g-mb-25">
                                    <label for="otherLoanPayment">Other Loan Payment</label>
                                    <input id="otherLoanPayment" name="otherLoanPayment" class="form-control form-control-md rounded-0" type="text" value="150" onchange="setBorrowCalculation();">
									<span id="otherLoanPaymenttest" style="display: none;"></span>
									<div id="otherLoanPaymentSlider1" class="u-slider-v1-3" data-result-container="otherLoanPaymenttest" data-default="3200" data-min="0" data-max="10000"></div>
                                </div>

                                <div class="g-mb-20">
                                    <h4 class="g-font-weight-800 g-mb-10 totalMonthlyDebtPayments">$0</h4>
                                </div>
								
								<div class="g-mb-20">
									<a href="javascript:;" class="btn btn-md btn-block u-btn-yellow rounded-0 g-mt-20 g-mr-10 g-mb-18" onclick="setBorrowCalculation();">Calculate</a>
								</div>
                            </div>
						</div>
                    </div>
                    <!-- Center Pane -->
                    <div class="col-sm-6 col-lg-6 m-0 p-0">

                        <div class="g-brd-around g-brd-yellow text-center g-brd-left-0 g-pa-15">
                            <h3 class="g-font-weight-800">You can purchase a <span class="totalBorrowAmount">$0</span> home</h3>
                            <div class="d-flex justify-content-center g-pa-25">
								<figure class="highcharts-figure" style="width:500px;">
									<div id="pieChart"></div>
								</figure>
							</div>
                        </div>

                        <div class="g-brd-around g-brd-yellow text-center g-pa-15">
                           
                            <div id="accordion-10" class="u-accordion u-accordion-color-primary u-accordion-brd-primary" role="tablist" aria-multiselectable="true">
                                <!-- Card -->
                                <div class="card rounded-0 g-brd-none">
                                    <div id="accordion-10-heading-01" class="u-accordion__header g-pa-0" role="tab">
                                        <h5 class="mb-0 g-font-weight-600 g-font-size-default">
                                            <a class="d-flex justify-content-between g-text-underline--none--hover g-pa-15-0" href="#accordion-10-body-01" data-toggle="collapse" data-parent="#accordion-10" aria-expanded="true" aria-controls="accordion-10-body-01">
                                                <span class="d-flex g-color-black">
                                                
                                                    Total Payment: Interest&nbsp;<span class="totalInterest">$0</span>, Principal&nbsp;<span class="totalPrincipal">$0</span>
                                                </span>
                                                <span class="u-accordion__control-icon g-ml-10">
                                                    <i class="fa fa-angle-right"></i>
                                                    <i class="fa fa-angle-down"></i>
                                                </span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="accordion-10-body-01" class="collapse show" role="tabpanel" aria-labelledby="accordion-10-heading-01" data-parent="#accordion-10">
                                        <div class="d-flex justify-content-center g-pa-25">
											<figure class="highcharts-figure" style="width:500px;">
												<div id="splineChart"></div>
											</figure>
										</div>
                                    </div>
                                </div>
                                <!-- End Card -->

                            </div>
                        </div>
                        <div class="g-brd-around g-brd-yellow text-center g-pa-15">
                           
                            <div id="accordion-10" class="u-accordion u-accordion-color-primary u-accordion-brd-primary" role="tablist" aria-multiselectable="true">
                                <!-- Card -->
                                <div class="card rounded-0 g-brd-none">
                                    <div id="accordion-10-heading-01" class="u-accordion__header g-pa-0" role="tab">
                                        <h5 class="mb-0 g-font-weight-600 g-font-size-default">
                                            <a class="d-flex justify-content-between g-text-underline--none--hover g-pa-15-0" href="#accordion-10-body-01" data-toggle="collapse" data-parent="#accordion-10" aria-expanded="true" aria-controls="accordion-10-body-01">
                                                <span class="d-flex g-color-black">
													Use of&nbsp;<span class="cashOnHand">$0</span> Cash on Hand
                                                </span>
                                                <span class="u-accordion__control-icon g-ml-10">
                                                    <i class="fa fa-angle-right"></i>
                                                    <i class="fa fa-angle-down"></i>
                                                </span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="accordion-10-body-01" class="collapse show" role="tabpanel" aria-labelledby="accordion-10-heading-01" data-parent="#accordion-10">
                                        <div class="d-flex justify-content-center g-pa-25">
											<figure class="highcharts-figure" style="width:500px;">
												<div id="barChart"></div>
											</figure>
										</div>
                                    </div>
                                </div>
                                <!-- End Card -->

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

                    <!-- End Table Bordered -->
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
	<script src="assets/mortgage_calculator/assets/js/scripts/mortgage_borrow_calculator.js"></script>
