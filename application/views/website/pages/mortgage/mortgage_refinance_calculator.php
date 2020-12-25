
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

        <section class="g-brd-top g-brd-gray-light-v4 g-py-10">

            <div class="container">
                <div class="d-sm-flex">
                    <div class="align-self-center">
                        <h2 class="u-heading-v2__title g-mb-10 g-font-weight-800 g-color-black">Mortgage Refinance Calculator</h2>
                    </div>
                </div>
            </div>
        </section>

        <!-- Icon Blocks -->
        <section class="container g-mt-20 g-mb-20">
            <div class="container">
                <div class="row">
                    <!-- Left Pane -->
                    <div class="col-sm-12 col-lg-6 m-0 p-0">
                        <div class="g-brd-around g-brd-yellow g-pa-15 ">
                            <h3 class="g-color-blue g-font-weight-800"> </h3>
                            <div class="d-flex justify-content-between">
                                <div class="flex-fill p-2">

                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="currentMonthlyPayment">Current monthly payment</label>
                                        <input id="currentMonthlyPayment" name="currentMonthlyPayment" class="form-control form-control-md rounded-0" type="text" placeholder="$765" value="765" onkeyup="$(this).digits();">
										<span id="currentMonthlyPaymenttest" style="display:none;"></span>
                                        <div id="currentMonthlyPaymentSlider1" class="u-slider-v1-3" data-result-container="currentMonthlyPaymenttest" data-default="765" data-min="0" data-max="1000000"></div>
                                    </div>
                                    <!-- End Progress Bars -->

                                    <!-- Regular Slider Option Two -->
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="balanceLeftMortgage">Balanc left on mortgage</label>
                                        <input id="balanceLeftMortgage" name="balanceLeftMortgage" class="form-control form-control-md rounded-0" type="text" placeholder="100,000" value="100000" onkeyup="$(this).digits();">
										<span id="balanceLeftMortgagetest" style="display:none;"></span>
                                        <div id="balanceLeftMortgageSlider1" class="u-slider-v1-3" data-result-container="balanceLeftMortgagetest" data-default="100000" data-min="0" data-max="1000000"></div>
                                    </div>
                                    <!-- End Regular Slider Option Two -->

                                </div>
                                <div class="flex-fill p-2">

                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="currentInterestRate">Current loan interest rate</label>
                                        <input id="currentInterestRate" name="currentInterestRate" class="form-control form-control-md rounded-0" type="text" placeholder="4.5%" value="4.5" onkeyup="$(this).percent();">
										<span id="currentInterestRatetest" style="display:none;"></span>
                                        <div id="currentInterestRateSlider1" class="u-slider-v1-3" data-result-container="currentInterestRatetest" data-default="4.5" data-step="0.1" data-min="0" data-max="100"></div>
                                    </div>
                                    <!-- End Progress Bars -->

                                    <!-- Regular Slider Option Two -->
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="newInterestRate">New interest rate</label>
                                        <input id="newInterestRate" name="newInterestRate" class="form-control form-control-md rounded-0" type="text" placeholder="3.5%" value="3.5" onkeyup="$(this).percent();">
										<span id="newInterestRatetest" style="display:none;"></span>
                                        <div id="newInterestRateSlider1" class="u-slider-v1-3" data-result-container="newInterestRatetest" data-default="3.5" data-step="0.1" data-min="0" data-max="100"></div>
                                    </div>
                                    <!-- End Regular Slider Option Two -->

                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="flex-fill p-2">
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="remainingLoanTerm">Remaining loan term</label>
                                        <input id="remainingLoanTerm" name="remainingLoanTerm" class="form-control form-control-md rounded-0" type="text" placeholder="15" value="15" >
										<span id="remainingLoanTermtest" style="display:none;"></span>
                                        <div id="remainingLoanTermSlider1" class="u-slider-v1-3" data-result-container="remainingLoanTermtest" data-default="15" data-min="0" data-max="1000"></div>
                                    </div>
                                    <!-- End Progress Bars -->

                                </div>
                                <div class="flex-fill p-2">
                                    <!-- Regular Slider Option Two -->
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="newLoanTerm">New loan term</label>
                                        <input id="newLoanTerm" name="newLoanTerm" class="form-control form-control-md rounded-0" type="text" placeholder="15" value="15" >
										<span id="newLoanTermtest" style="display:none;"></span>
                                        <div id="newLoanTermSlider1" class="u-slider-v1-3" data-result-container="newLoanTermtest" data-default="15" data-min="0" data-max="1000"></div>
                                    </div>
                                    <!-- End Regular Slider Option Two -->
                                </div>
                            </div>
                            <!-- End Regular Slider Option Two -->
                        </div>
                        <div class="g-brd-around g-brd-yellow g-pa-15 ">
                            <h3 class="g-color-blue g-font-weight-800">How much will it cost you? </h3>
                            <div class="d-flex justify-content-between">
                                <div class="flex-fill p-2">
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="points">Points</label>
                                        <input id="points" name="points" class="form-control form-control-md rounded-0" type="text" placeholder="1" value="1" >
                                    </div>
                                    <!-- End Progress Bars -->


                                </div>
                                <div class="flex-fill p-2">
                                    <!-- Regular Slider Option Two -->
                                    <div class="g-mt-40">
                                        <h4>Cost of point: <span class="costOfPoint">$0</span></h4>
                                    </div>
                                    <!-- End Regular Slider Option Two -->
                                </div>

                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="flex-fill p-2">
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="applicationFee">Application fee</label>
                                        <input id="applicationFee" name="applicationFee" class="form-control form-control-md rounded-0" type="text" placeholder="$0" value="0" onkeyup="$(this).digits();">
										<span id="applicaitonFeetest" style="display: none;"></span>
                                        <div id="applicationFeeSlider1" class="u-slider-v1-3" data-result-container="applicationFeetest" data-default="0" data-min="0" data-max="10000"></div>
                                    </div>


                                </div>
                                <div class="flex-fill p-2">
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="creditCheck">Credit Check</label>
                                        <input id="creditCheck" name="creditCheck" class="form-control form-control-md rounded-0" type="text" placeholder="$0" value="0" onkeyup="$(this).digits();">
										<span id="creditChecktest" style="display: none;"></span>
                                        <div id="creditCheckSlider1" class="u-slider-v1-3" data-result-container="creditChecktest" data-default="0" data-min="0" data-max="100000"></div>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="flex-fill p-2">
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="attorneyFee">Attorney`s fee (yours)</label>
                                        <input id="attorneyFee" name="attorneyFee" class="form-control form-control-md rounded-0" type="text" placeholder="$0" value="0" onkeyup="$(this).digits();">
										<span id="attorneyFeetest" style="display: none;"></span>
                                        <div id="attorneyFeeSlider1" class="u-slider-v1-3" data-result-container="attorneyFeetest" data-default="0" data-min="0" data-max="100000"></div>
                                    </div>


                                </div>
                                <div class="flex-fill p-2">
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="attorneyFeeLender">Attorney`s fee (lenders)</label>
                                        <input id="attorneyFeeLender" name="attorneyFeeLender" class="form-control form-control-md rounded-0" type="text" placeholder="$0" value="0" onkeyup="$(this).digits();">
										<span id="attorneyFeeLendertest" style="display: none;"></span>
                                        <div id="attorneyFeeLenderSlider1" class="u-slider-v1-3" data-result-container="attorneyFeeLendertest" data-default="0" data-min="0" data-max="100000"></div>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="flex-fill p-2">
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="titleSearch">Title search</label>
                                        <input id="titleSearch" name="titleSearch" class="form-control form-control-md rounded-0" type="text" placeholder="$0" value="0" onkeyup="$(this).digits();">
										<span id="titleSearchtest" style="display: none;"></span>
                                        <div id="titleSearchSlider1" class="u-slider-v1-3" data-result-container="titleSearchtest" data-default="0" data-min="0" data-max="1000000"></div>
                                    </div>


                                </div>
                                <div class="flex-fill p-2">
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="titleInsurance">Title insurance</label>
                                        <input id="titleInsurance" name="titleInsurance" class="form-control form-control-md rounded-0" type="text" placeholder="$0" value="0" onkeyup="$(this).digits();">
										<span id="titleInsurancetest" style="display: none;"></span>
                                        <div id="titleInsuranceSlider1" class="u-slider-v1-3" data-result-container="titleInsurancetest" data-default="0" data-min="0" data-max="1000000"></div>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="flex-fill p-2">
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="appraisalFee">Appraisal fee</label>
                                        <input id="appraisalFee" name="appraisalFee" class="form-control form-control-md rounded-0" type="text" placeholder="$0" value="0" onkeyup="$(this).digits();">
										<span id="appraisalFeetest" style="display: none;"></span>
                                        <div id="appraisalFeeSlider1" class="u-slider-v1-3" data-result-container="appraisalFeetest" data-default="0" data-min="0" data-max="1000000"></div>
                                    </div>


                                </div>
                                <div class="flex-fill p-2">
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="inspection">Inspections</label>
                                        <input id="inspection" name="inspection" class="form-control form-control-md rounded-0" type="text" placeholder="$0" value="0" onkeyup="$(this).digits();">
										<span id="inspectiontest" style="display: none;"></span>
                                        <div id="inspectionSlider1" class="u-slider-v1-3" data-result-container="inspectiontest" data-default="0" data-min="0" data-max="1000000"></div>
                                    </div>
                                </div>

                            </div>
							<div class="d-flex justify-content-between">
                                <div class="flex-fill p-2">
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="localFee">Local fees (taxes, transfers)</label>
                                        <input id="localFee" name="localFee" class="form-control form-control-md rounded-0" type="text" placeholder="$0" value="0" onkeyup="$(this).digits();">
										<span id="localFeetest" style="display: none;"></span>
                                        <div id="localFeeSlider1" class="u-slider-v1-3" data-result-container="localFeetest" data-default="0" data-min="0" data-max="1000000"></div>
                                    </div>


                                </div>
                                <div class="flex-fill p-2">
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="documentPreparation">Document preparation</label>
                                        <input id="documentPreparation" name="documentPreparation" class="form-control form-control-md rounded-0" type="text" placeholder="$0" value="0" onkeyup="$(this).digits();">
										<span id="documentPreparationtest" style="display: none;"></span>
                                        <div id="documentPreparationSlider1" class="u-slider-v1-3" data-result-container="documentPreparationtest" data-default="0" data-min="0" data-max="1000000"></div>
                                    </div>
                                </div>

                            </div>
							<div class="d-flex justify-content-between">
                                <div class="flex-fill p-2">
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10" for="other">Other</label>
                                        <input id="other" name="other" class="form-control form-control-md rounded-0" type="text" placeholder="$0" value="0" onkeyup="$(this).digits();">
										<span id="othertest" style="display: none;"></span>
                                        <div id="otherSlider1" class="u-slider-v1-3" data-result-container="othertest" data-default="0" data-min="0" data-max="1000000"></div>
                                    </div>
                                </div>
                                <div class="flex-fill p-2">
                                    <div class="form-group g-mb-20">
                                        <label class="g-mb-10">&nbsp;</label>
										<a href="#" class="btn btn-md btn-block u-btn-yellow rounded-0 g-mr-10 g-mb-18" onclick="setRefinanceCalculation();">Calculate</a>
                                    </div>
                                </div>

                            </div>

                            <!-- End Regular Slider Option Two -->
                        </div>

                    </div>
                    <!-- Center Pane -->
                    <div class="col-sm-12 col-lg-6 m-0 p-0">
                        <div class="g-brd-around g-brd-yellow g-brd-left-0 g-height-100vh">
                            <div class="d-flex justify-content-center g-brd-bottom g-brd-yellow  g-py-100">
                                <div>
                                    <span class="text-nowrap g-mr-10">New Monthly Payment</span>
                                    <h1 class="text-center g-color-blue g-font-weight-800 newMonthlyPayment">$0</h1>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
                                <div>
                                    <span class="text-nowrap g-mr-10">Monthly Savings</span>
                                </div>
                                <div>
                                    <span class="text-nowrap g-mr-10 monthlySavings">0</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
                                <div>
                                    <span class="text-nowrap g-mr-10">Difference in Interest</span>
                                </div>
                                <div>
                                    <span class="text-nowrap g-mr-10 diffInInterest">0</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
                                <div>
                                    <span class="text-nowrap g-mr-10">Total cost</span>
                                </div>
                                <div>
                                    <span class="text-nowrap g-mr-10 totalCost">0</span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
                                <div>
                                    <span class="text-nowrap g-mr-10">Months to recoup costs</span>
                                </div>
                                <div>
                                    <span class="text-nowrap g-mr-10 monthsToRecoup">0</span>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>

        </section>









        <!-- End Icon Blocks -->

        <!-- End Icon Blocks -->

      
        <!-- End Copyright Footer -->

    </main>

    <!-- <div class="u-outer-spaces-helper"></div> -->

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
	<script src="assets/mortgage_calculator/assets/js/scripts/mortgage_refinance_calculator.js"></script>
