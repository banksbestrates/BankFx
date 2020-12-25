
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/bootstrap/bootstrap.min.css">
    <!-- CSS Global Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/icon-line/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/icon-etlinefont/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/icon-line-pro/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/icon-hs/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/animate.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/dzsparallaxer/dzsparallaxer.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/dzsparallaxer/dzsscroller/scroller.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/dzsparallaxer/advancedscroller/plugin.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/hs-megamenu/src/hs.megamenu.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/hamburgers/hamburgers.min.css">


    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/jquery-ui/base/jquery-ui.min.css">

    <!-- CSS Unify -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/css/unify-core.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/css/unify-components.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/css/unify-globals.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/css/custom.css">

    <main>
    <section class="g-brd-top g-brd-gray-light-v4 g-py-10">
        <div class="container">
            <div class="d-sm-flex">
                <div class="align-self-center">
                    <h2 class="u-heading-v2__title g-mb-10 g-font-weight-800 g-color-black">
                    Interest Paid On Life Of Loan Calculator</h2>

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
                                <label class="g-mb-10" for="beginningBalance">Beginning balance of loan</label>
                                <input id="beginningBalance" name="beginningBalance" class="form-control form-control-md rounded-0" type="text" placeholder="$10,000" value="10000">
								<span id="beginningBalancetest" style="display:none;"></span>
                                <div id="beginningBalanceSlider1" class="u-slider-v1-3" data-result-container="beginningBalancetest" data-default="10000" data-min="0" data-max="1000000"></div>
                            </div>
                            <!-- End Progress Bars -->

                            <!-- Regular Slider Option Two -->
                            <div class="form-group g-mb-20">
                                <label class="g-mb-10" for="minMonthlyPayment">Minimum monthly payment</label>
                                <input id="minMonthlyPayment" name="minMonthlyPayment" class="form-control form-control-md rounded-0" type="text" placeholder="$800" value="800">
								<span id="minMonthlyPaymenttest" style="display:none;"></span>
                                <div id="minMonthlyPaymentSlider1" class="u-slider-v1-3" data-result-container="minMonthlyPaymenttest" data-default="800" data-min="0" data-max="10000"></div>
                            </div>
                            <!-- End Regular Slider Option Two -->

                            <!-- Regular Slider Option Three -->
                            <div class="form-group g-mb-20">
                                <label class="g-mb-10" for="maxMonthlyPayment">Maximum monthly payment</label>
                                <input id="maxMonthlyPayment" name="maxMonthlyPayment" class="form-control form-control-md rounded-0" type="text" placeholder="$1,200" value="1200">
								<span id="maxMonthlyPaymenttest" style="display:none;"></span>
                                <div id="maxMonthlyPaymentSlider1" class="u-slider-v1-3" data-result-container="maxMonthlyPaymenttest" data-default="1200" data-min="0" data-max="10000"></div>
                            </div>
                            <!-- End Regular Slider Option Three -->

                            <!-- Regular Slider Option Four -->
                            <div class="form-group g-mb-20">
                                <label class="g-mb-10" for="annualPercentage">Annual percentage rate (fixed loan)</label>
                                <input id="annualPercentage" name="annualPercentage" class="form-control form-control-md rounded-0" type="text" placeholder="7.5%" value="7.5">
								<span id="annualPercentagetest" style="display:none;"></span>
                                <div id="annualPercentageSlider1" class="u-slider-v1-3" data-result-container="annualPercentagetest" data-default="7.5" data-step="0.1" data-min="0" data-max="100"></div>
                            </div>
                            <!-- End Regular Slider Option Four -->
                            <a href="#" class="btn btn-md btn-block u-btn-yellow rounded-0 g-mr-10 g-mb-10" onclick="setLifeCalculation();">Calculator</a>
                            

                            <!-- End Regular Slider Option Two -->
                        </div>
                    </div>
                    <!-- Center Pane -->
                    <div class="col-sm-6 col-lg-6 m-0 p-0">
                        <div class="g-brd-around g-brd-yellow g-brd-left-0">
                            <div class="d-flex justify-content-center g-brd-yellow g-pa-40 g-height-250">

                                <div>
                                    <div class="text-nowrap text-center">Total interest on your loan:</div>
									<div class="text-nowrap text-center">Using the minimum payment, you'll pay:</div>
                                    <h1 class="text-center g-color-blue g-font-weight-800 totalMinInterest">$0</h1>
									<div class="text-nowrap text-center">(<span class="monthlyMinInterest">$0</span> average per month)</div>
									<div class="text-nowrap text-center">in total interest</div>
                                </div>
                            </div>
                        </div>
						
						<div class="g-brd-around g-brd-yellow g-brd-left-0">
                            <div class="d-flex justify-content-center g-brd-yellow g-pa-40 g-height-250">

                                <div>
									<div class="text-nowrap text-center">Using the maximum payment, you'll pay:</div>
                                    <h1 class="text-center g-color-blue g-font-weight-800 totalMaxInterest">$0</h1>
									<div class="text-nowrap text-center">(<span class="monthlyMaxInterest">$0</span> average per month)</div>
									<div class="text-nowrap text-center">in total interest</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- End Icon Blocks -->
        <!-- Icon Blocks -->

    </main>

    

    <style>
        .table-bordered td,
        .table-bordered th {
            border: 1px solid #ebc71d !important;
        }
    </style>

    <!-- JS Global Compulsory -->
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/popper.js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/bootstrap/bootstrap.min.js"></script>


    <!-- JS Implementing Plugins -->
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/dzsparallaxer/dzsparallaxer.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/dzsparallaxer/dzsscroller/scroller.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/dzsparallaxer/advancedscroller/plugin.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/appear.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/slick-carousel/slick/slick.js"></script>

    <!-- JS Unify -->
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/js/hs.core.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/js/components/hs.header.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/js/helpers/hs.hamburgers.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/js/components/hs.tabs.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/js/components/hs.progress-bar.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/js/components/hs.rating.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/js/components/hs.counter.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/js/components/hs.carousel.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/js/components/hs.go-to.js"></script>

    <!-- High Charts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <!-- JS Customization -->
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/js/custom.js"></script>

    <!-- Style Switcher -->

    <div id="resolutionCaution" class="text-left g-max-width-600 g-bg-white g-pa-20" style="display: none;">
        <button type="button" class="close" onclick="Custombox.modal.close();">
            <i class="hs-icon hs-icon-close"></i>
        </button>
        <h4 class="g-mb-20">Screen resolution less than 1400px</h4>
    </div>

    <div id="copyModal" class="text-left modal-demo g-bg-white g-color-black g-pa-20" style="display: none;"></div>

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/chosen/chosen.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/prism/themes/prism.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/custombox/custombox.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/style-switcher/vendor/spectrum/spectrum.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/style-switcher/vendor/spectrum/themes/sp-dark.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/mortgage_calculator/assets/style-switcher/style-switcher.css">
    <!-- End CSS -->

    <!-- Scripts -->
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/chosen/chosen.jquery.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/image-select/src/ImageSelect.jquery.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/custombox/custombox.min.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/clipboard/dist/clipboard.min.js"></script>

    <!-- Prism -->
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/prism/prism.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/prism/components/prism-markup.min.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/prism/components/prism-css.min.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/prism/components/prism-clike.min.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/prism/components/prism-javascript.min.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/prism/plugins/toolbar/prism-toolbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/prism/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
    <!-- End Prism -->

    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/js/components/hs.scrollbar.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/js/components/hs.select.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/js/components/hs.modal-window.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/js/components/hs.markup-copy.js"></script>

    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/style-switcher/vendor/cookiejs/jquery.cookie.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/style-switcher/vendor/spectrum/spectrum.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/style-switcher/style-switcher.js"></script>
    <!-- End Scripts -->
    <!-- End Style Switcher -->

    <!-- jQuery UI Core -->
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/jquery-ui/widget.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/jquery-ui/version.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/jquery-ui/keycode.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/jquery-ui/position.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/jquery-ui/unique-id.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/jquery-ui/safe-active-element.js"></script>


    <!-- jQuery UI Helpers -->
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/jquery-ui/menu.js"></script>
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/jquery-ui/mouse.js"></script>

    <!-- jQuery UI Widgets -->
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/vendor/jquery-ui/slider.js"></script>

    <!-- JS Unify -->
    <script src="<?php echo base_url();?>assets/mortgage_calculator/assets/js/components/hs.slider.js"></script>
	
	<!-- CORE FILES -->
	<script src="<?php echo base_url();?>assets/mortgage_calculator/assets/js/scripts/common.js"></script>
	<script src="<?php echo base_url();?>assets/mortgage_calculator/assets/js/scripts/interest_paid_life_calculator.js"></script>

