
    <!-- Google Fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik">
    <!-- CSS Global Compulsory -->
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
        <div class="container pt-5 pb-4">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="font-weight-900 mb-2">How much should you put down?</h1>
                </div>
            </div>
        </div>
        <!-- Icon Blocks -->
        <section class="container g-py-30 g-pb-30">
            <div class="container">
                <div class="row">
                    <!-- Left Pane -->
                    <div class="col-sm-6 col-lg-3 m-0 p-0">
                        <div class="g-brd-around g-brd-yellow g-pa-15 ">

                            <div class="form-group g-mb-20">
                                <label class="g-mb-10" for="minDownpayment">Minimum down payment</label>
                                <input id="minDownpayment" name="minDownpayment" class="form-control form-control-md rounded-0" type="text" placeholder="$100,000" value="100000" onkeyup="$(this).digits();">
								<span id="minDownpaymenttest" style="display:none;"></span>
                                <div id="minDownpaymentSlider1" class="u-slider-v1-3" data-result-container="minDownpaymenttest" data-default="100000" data-min="0" data-max="1000000"></div>
                            </div>
                            <!-- End Progress Bars -->

                            <!-- Regular Slider Option Two -->
                            <div class="form-group g-mb-20">
                                <label class="g-mb-10" for="maxDownpayment">Maximum down payment</label>
                                <input id="maxDownpayment" name="maxDownpayment" class="form-control form-control-md rounded-0" type="text" placeholder="$300,000" value="300000" onkeyup="$(this).digits();">
								<span id="maxDownpaymenttest" style="display:none;"></span>
                                <div id="maxDownpaymentSlider1" class="u-slider-v1-3" data-result-container="maxDownpaymenttest" data-default="300000" data-min="0" data-max="1000000"></div>
                            </div>
                            <!-- End Regular Slider Option Two -->
							
							<!-- Regular Slider Option Two -->
                            <div class="form-group g-mb-20">
                                <label class="g-mb-10" for="purchasePrice">Purchase price</label>
                                <input id="purchasePrice" name="purchasePrice" class="form-control form-control-md rounded-0" type="text" placeholder="$1,000,000" value="1000000" onkeyup="$(this).digits();">
								<span id="purchasePricetest" style="display:none;"></span>
                                <div id="purchasePriceSlider1" class="u-slider-v1-3" data-result-container="purchasePricetest" data-default="1000000" data-min="0" data-max="5000000"></div>
                            </div>
                            <!-- End Regular Slider Option Two -->

                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <label class="g-font-size-10 g-font-weight-600" for="loanMonths">Loan term in months</label>
                                        <input type="number" min="1" id="loanMonths" name="loanMonths" class="form-control rounded-0 form-control-md " value="25" />
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <label class="g-font-size-10 g-font-weight-600" for="interestRate">Interest rate per year</label>
                                        <input type="text" id="interestRate" name="interestRate" class="form-control rounded-0 form-control-md" value="4" onkeyup="$(this).percent();" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group g-mb-20">
                                <label class="g-mb-10" for="rateEarn">What rate could your down payment earn if saved/ invested?</label>
                                <input id="rateEarn" name="rateEarn" class="form-control form-control-md rounded-0" type="text" placeholder="3.5%" value="3.5" onkeyup="$(this).percent();">
								<span id="rateEarntest" style="display:none;"></span>
                                <div id="rateEarnSlider1" class="u-slider-v1-3" data-result-container="rateEarntest" data-default="3.5" data-step="0.1" data-min="0" data-max="100"></div>
                            </div>


                            <div class="form-group g-mb-20">
                                <label class="g-mb-10" for="federalTaxRate">Federal + state tax rate</label>
                                <input id="federalTaxRate" name="federalTaxRate" class="form-control form-control-md rounded-0" type="text" placeholder="5%" value="5" onkeyup="$(this).percent();">
								<span id="federalTaxRatetest" style="display:none;"></span>
                                <div id="federalTaxRateSlider1" class="u-slider-v1-3" data-result-container="federalTaxRatetest" data-default="5" data-step="0.1" data-min="0" data-max="100"></div>
                            </div>
                            <a href="#" class="btn btn-md btn-block u-btn-yellow rounded-0 g-mr-10 g-mb-18" onclick="setPutDownCalculation();">Calculator</a>
                            <!-- End Regular Slider Option Two -->
                        </div>
                    </div>
                    <!-- Center Pane -->
                    <div class="col-sm-6 col-lg-6 m-0 p-0">
                        <div class="g-brd-around g-brd-yellow g-brd-left-0 g-py-100">
                            <div class="d-flex justify-content-center g-brd-bottom g-brd-yellow ">

                                <div>
                                    <span class="text-nowrap g-mr-10">More money down with save you</span>
                                    <h1 class="text-center g-color-blue g-font-weight-800 moneyDownWithSave">$0</h1>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center g-brd-bottom g-brd-yellow g-bg-gray-light-v4 g-py-10 g-px-15">
                                <div>
                                    <span class="text-nowrap g-mr-10">Monthly Payment</span>
                                </div>
                              
                            </div>
                            <div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
                                <div>
                                    <span class="text-nowrap g-mr-10">With More money down</span>
                                </div>
                                <div>
                                    <span class="text-nowrap g-mr-10 withMoreMoneyDown">$0</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
                                <div>
                                    <span class="text-nowrap g-mr-10">With less money down</span>
                                </div>
                                <div>
                                    <span class="text-nowrap g-mr-10 withLessMoneyDown">$0</span>
                                </div>
                            </div>

                          
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- End Icon Blocks -->

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
	<script src="assets/mortgage_calculator/assets/js/scripts/mortgage_downpayment_calculator.js"></script>
