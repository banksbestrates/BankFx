    <!-- CSS Global Icons -->
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
                    <h1 class="font-weight-900 mb-2">Income Required for Mortgage Calculator</h1>
                </div>
            </div>
        </div>
        <!-- Icon Blocks -->
        <section class="container g-mt-20 g-mb-20">
            <div class="container">
                <div class="row">
                    <!-- Left Pane -->
                    <div class="col-sm-12 col-lg-6 m-0 p-0">
                        <div class="g-brd-around g-brd-yellow g-pa-15 ">
                            <h3 class="g-color-blue g-font-weight-800">Gross monthly income </h3>
                            <div class="d-flex justify-content-between">
                                <div class="flex-fill p-2">

                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="wages">Wages</label>
                                        <input id="wages" name="wages" class="form-control form-control-md rounded-0" type="text" placeholder="$100,000" value="100000" onkeyup="$(this).digits();">
										<span id="wagestest" style="display: none;"></span>
                                        <div id="wagesSlider1" class="u-slider-v1-3" data-result-container="wagestest" data-default="100000" data-min="0" data-max="1000000"></div>
                                    </div>
                                    <!-- End Progress Bars -->

                                    <!-- Regular Slider Option Two -->
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="alimonyReceived">Alimony Received</label>
                                        <input id="alimonyReceived" name="alimonyReceived" class="form-control form-control-md rounded-0" type="text" placeholder="$20" value="20" onkeyup="$(this).digits();">
										<span id="alimonyReceivedtest" style="display: none;"></span>
                                        <div id="alimonyReceivedSlider1" class="u-slider-v1-3" data-result-container="alimonyReceivedtest" data-default="20" data-min="0" data-max="10000"></div>
                                    </div>
                                    <!-- End Regular Slider Option Two -->

                                </div>
                                <div class="flex-fill p-2">

                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="investmentDivident">Investments/ Dividents</label>
                                        <input id="investmentDivident" name="investmentDivident" class="form-control form-control-md rounded-0" type="text" placeholder="$0" value="0" onkeyup="$(this).digits();">
										<span id="investmentDividenttest" style="display: none;"></span>
                                        <div id="investmentDividentSlider1" class="u-slider-v1-3" data-result-container="investmentDividenttest" data-default="0" data-min="0" data-max="10000"></div>
                                    </div>
                                    <!-- End Progress Bars -->

                                    <!-- Regular Slider Option Two -->
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="other">Other</label>
                                        <input id="other" name="other" class="form-control form-control-md rounded-0" type="text" placeholder="$0" value="0" onkeyup="$(this).digits();">
										<span id="othertest" style="display: none;"></span>
                                        <div id="otherSlider1" class="u-slider-v1-3" data-result-container="othertest" data-default="0" data-min="0" data-max="10000"></div>
                                    </div>
                                    <!-- End Regular Slider Option Two -->

                                </div>
                            </div>

							<span>Total monthly income:</span>
                            <h6 class="g-color-blue g-font-weight-800 totalMonthlyIncome">$0</h6>
                            
                            <!-- End Regular Slider Option Two -->
                        </div>
                        <div class="g-brd-around g-brd-yellow g-pa-15 ">
                            <h3 class="g-color-blue g-font-weight-800">How much will it cost you? </h3>
                            <div class="d-flex justify-content-between">
                                <div class="flex-fill p-2">

                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="downPayment">Down payment</label>
                                        <input id="downPayment" name="downPayment" class="form-control form-control-md rounded-0" type="text" placeholder="$14" value="14" onkeyup="$(this).digits();">
										<span id="downPaymenttest" style="display: none;"></span>
                                        <div id="downPaymentSlider1" class="u-slider-v1-3" data-result-container="downPaymenttest" data-default="14" data-min="0" data-max="100000"></div>
                                    </div>
                                    <!-- End Progress Bars -->

                                    <!-- Regular Slider Option Two -->
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="yearlyTaxes">Yearly real estate taxes</label>
                                        <input id="yearlyTaxes" name="yearlyTaxes" class="form-control form-control-md rounded-0" type="text" placeholder="$14" value="14" onkeyup="$(this).digits();">
										<span id="yearlyTaxestest" style="display: none;"></span>
                                        <div id="yearlyTaxesSlider1" class="u-slider-v1-3" data-result-container="yearlyTaxestest" data-default="14" data-min="0" data-max="10000"></div>
                                    </div>
                                    <!-- End Regular Slider Option Two -->

                                </div>
                                <div class="flex-fill p-2">

                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="loanTerm">Loan term</label>
                                        <input id="loanTerm" name="loanTerm" class="form-control form-control-md rounded-0" type="text" placeholder="30" value="30" >
										<span id="loanTermtest" style="display: none;"></span>
                                        <div id="loanTermSlider1" class="u-slider-v1-3" data-result-container="loanTermtest" data-default="30" data-min="0" data-max="1000"></div>
                                    </div>
                                    <!-- End Progress Bars -->

                                    <!-- Regular Slider Option Two -->
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="yearlyInsurance">Yearly homeowner`s Insurance</label>
                                        <input id="yearlyInsurance" name="yearlyInsurance" class="form-control form-control-md rounded-0" type="text" placeholder="$12,324" value="12324" onkeyup="$(this).digits();">
										<span id="yearlyInsurancetest" style="display: none;"></span>
                                        <div id="yearlyInsuranceSlider1" class="u-slider-v1-3" data-result-container="yearlyInsurancetest" data-default="12324" data-min="0" data-max="100000"></div>
                                    </div>
                                    <!-- End Regular Slider Option Two -->

                                </div>
                            </div>

                            <div class="d-flex">
                                <div class="p-2">
                                    <label class="g-mb-10" for="interestRate">Interest rate</label>
                                    <input id="interestRate" name="interestRate" class="form-control form-control-md rounded-0" type="text" placeholder="0" value="4" onkeyup="$(this).percent();">
                                </div>
                                <div class=" p-2 g-pt-40">
                                    <a class="btn btn-block u-btn-outline-blue g-rounded-5" href="#">
                                        TODAY'S RATES
                                    </a>
                                </div>
                            </div>

                            <!-- End Regular Slider Option Two -->
                        </div>
                        <div class="g-brd-around g-brd-yellow g-pa-15 ">
                            <h3 class="g-color-blue g-font-weight-800">Mostly Expense </h3>
                            <div class="d-flex justify-content-between">
                                <div class="flex-fill p-2">

                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="carPayment">Car payment</label>
                                        <input id="carPayment" name="carPayment" class="form-control form-control-md rounded-0" type="text" placeholder="$14" value="14" onkeyup="$(this).digits();">
										<span id="carPaymenttest" style="display: none;"></span>
                                        <div id="carPaymentSlider1" class="u-slider-v1-3" data-result-container="carPaymenttest" data-default="14" data-min="0" data-max="100000"></div>
                                    </div>
                                    <!-- End Progress Bars -->

                                    <!-- Regular Slider Option Two -->
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="creditCardPayment">Credit card payment</label>
                                        <input id="creditCardPayment" name="creditCardPayment" class="form-control form-control-md rounded-0" type="text" placeholder="$30" value="30" onkeyup="$(this).digits();">
										<span id="creditCardPaymenttest" style="display: none;"></span>
                                        <div id="creditCardPaymentSlider1" class="u-slider-v1-3" data-result-container="creditCardPaymenttest" data-default="30" data-min="0" data-max="100000"></div>
                                    </div>
                                    <!-- End Regular Slider Option Two -->

                                </div>
                                <div class="flex-fill p-2">

                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="alimonyPaid">Alimony paid</label>
                                        <input id="alimonyPaid" name="alimonyPaid" class="form-control form-control-md rounded-0" type="text" placeholder="$14" value="14" onkeyup="$(this).digits();">
										<span id="alimonyPaidtest" style="display: none;"></span>
                                        <div id="alimonyPaidSlider1" class="u-slider-v1-3" data-result-container="alimonyPaidtest" data-default="14" data-min="0" data-max="100000"></div>
                                    </div>
                                    <!-- End Progress Bars -->

                                    <!-- Regular Slider Option Two -->
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="otherDebts">Other debts</label>
                                        <input id="otherDebts" name="otherDebts" class="form-control form-control-md rounded-0" type="text" placeholder="$12,324" value="12324" onkeyup="$(this).digits();">
										<span id="otherDebtstest" style="display: none;"></span>
                                        <div id="otherDebtsSlider1" class="u-slider-v1-3" data-result-container="otherDebtstest" data-default="12324" data-min="0" data-max="100000"></div>
                                    </div>
                                    <!-- End Regular Slider Option Two -->

                                </div>
                            </div>

							<span>Total monthly expenses (including insurance and real estate tax payments):</span>
                            <h6 class="g-color-blue g-font-weight-800 totalMonthlyExpenses">$0</h6>
                            <a href="#" class="btn btn-md btn-block u-btn-yellow rounded-0 g-mr-10 g-mb-18" onclick="setMortgageIncomeCalculation();">CALCULATE</a>

                            <!-- End Regular Slider Option Two -->
                        </div>
                    </div>
                    <!-- Center Pane -->
                    <div class="col-sm-12 col-lg-6 m-0 p-0">
                        <div class="g-brd-around g-brd-yellow g-brd-left-0 g-height-100vh">
                            <div class="d-flex justify-content-center g-brd-bottom g-brd-yellow g-py-40 g-px-15">

                                <div>
                                    <span class="text-nowrap g-mr-10">Available Mortgage Limits</span>

                                </div>
                            </div>
                            <div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
                                <div>
                                    <span class="text-nowrap g-mr-10">Avaiable Mortgage payment</span>
                                </div>
                                <div>
                                    <span class="text-nowrap g-mr-10 availableMortgagePayment">$0</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
                                <div>
                                    <span class="text-nowrap g-mr-10">Affordable home amount</span>
                                </div>
                                <div>
                                    <span class="text-nowrap g-mr-10 affordableHomeAmount">$0</span>
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
	<script src="assets/mortgage_calculator/assets/js/scripts/mortgage_income_calculator.js"></script>
