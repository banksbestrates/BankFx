
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


        <!-- Icon Blocks -->
        <section class="container g-pt-40 g-pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3 m-0 p-0">
                        <div class="g-brd-around g-brd-yellow g-pa-15 ">

                            <div class="form-group g-mb-20">
                                <label class="g-mb-10" for="purchaseAmount">Deposit Amount</label>
                                <input id="purchaseAmount" name="purchaseAmount" class="form-control form-control-md rounded-0" type="text" placeholder="$250,000" value="250000" onchange="setCalculation();">
                                <div id="regularSlider3" class="u-slider-v1-3" data-result-container="purchaseAmount" data-default="250000" data-min="0" data-max="1000000"></div>
                            </div>
                            <div class="form-group g-mb-20">
                                <label for="paymentYears">Accont Type</label>
                                <select class="form-control rounded-0" id="paymentYears" name="paymentYears" onchange="setCalculation();">
                                    <option value="30" selected="selected">30-Year Fixed</option>
                                    <option value="20">20-Year Fixed</option>
                                    <option value="15">15-Year Fixed</option>
                                    <option value="10">10-Year Fixed</option>
                                </select>
                            </div>
                            <!-- End Progress Bars -->
                            <div class="form-group g-mb-20">
                                <label class="g-mb-10" for="purchaseAmount">Zip Code</label>
                                <input id="purchaseAmount" name="purchaseAmount" class="form-control form-control-md rounded-0" type="text" placeholder="$250,000" value="250000" onchange="setCalculation();">

                            </div>
                            <!-- End Progress Bars -->
                            <div class="form-group g-mb-20">
                                <label for="paymentYears">Sort by</label>
                                <select class="form-control rounded-0" id="paymentYears" name="paymentYears" onchange="setCalculation();">
                                    <option value="30" selected="selected">30-Year Fixed</option>
                                    <option value="20">20-Year Fixed</option>
                                    <option value="15">15-Year Fixed</option>
                                    <option value="10">10-Year Fixed</option>
                                </select>
                            </div>


                        </div>

                    </div>
                    <!-- Center Pane -->
                    <div class="col-sm-12 col-lg-9 m-0 p-0">

                        <div class="g-brd-around g-brd-yellow">

                            <div class="d-flex justify-content-around g-py-10 g-px-15">
                                <div>
                                    <h6>All Product (0)</h6>
                                </div>
                                <div>
                                    <h6>Featured (0)</h6>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center g-bg-gray-light-v4 g-brb-around g-brb-yellow g-py-10 g-px-15">
                                <div class="flex-fill">
                                    <h6>BANK/INSTITUTION <span><i class="fa fa-angle-down"></i></span></h6>
                                </div>
                                <div class="flex-fill">
                                    <h6>ApY <span><i class="fa fa-angle-down"></i></span></h6>
                                </div>
                                <div class="flex-fill">
                                    <h6>MIN BAL. FOR AsY <span><i class="fa fa-angle-down"></i></span></h6>
                                </div>
                                <div class="flex-fill">
                                    <h6>EST.EARNINGS <span><i class="fa fa-angle-down"></i></span></h6>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center align-items-center g-py-10 g-px-15">
                                <div class="flex-fill">

                                    <h4>PNC Bank</h4>
                                    <span>Member FDIC</span><br>
                                    <span>Savings Account</span>
                                    <div>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star-o g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                    </div>
                                    <a href="#" class="btn btn-xs u-btn-blue g-mr-10 g-mb-15">Read Review</a>
                                </div>
                                <div class="flex-fill">
                                <h4 class="g-color-blue g-font-weight-800 mb-0">1.00%</h4>
                                <span>As of: Sept.1 Tue</span>
                                </div>
                                <div class="flex-fill">
                                <h4 class="g-color-blue g-font-weight-800 mb-0">$1</h4>
                                </div>
                                <div class="flex-fill">
                                <h4 class="g-color-blue g-font-weight-800 mb-0">$250</h4>
                                <span>Over 1 Year</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center g-py-10 g-px-15">
                                <div class="flex-fill">

                                    <h4>PNC Bank</h4>
                                    <span>Member FDIC</span><br>
                                    <span>Savings Account</span>
                                    <div>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star-o g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                    </div>
                                    <a href="#" class="btn btn-xs u-btn-blue g-mr-10 g-mb-15">Read Review</a>
                                </div>
                                <div class="flex-fill">
                                <h4 class="g-color-blue g-font-weight-800 mb-0">1.00%</h4>
                                <span>As of: Sept.1 Tue</span>
                                </div>
                                <div class="flex-fill">
                                <h4 class="g-color-blue g-font-weight-800 mb-0">$1</h4>
                                </div>
                                <div class="flex-fill">
                                <h4 class="g-color-blue g-font-weight-800 mb-0">$250</h4>
                                <span>Over 1 Year</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center g-py-10 g-px-15">
                                <div class="flex-fill">

                                    <h4>PNC Bank</h4>
                                    <span>Member FDIC</span><br>
                                    <span>Savings Account</span>
                                    <div>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star-o g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                    </div>
                                    <a href="#" class="btn btn-xs u-btn-blue g-mr-10 g-mb-15">Read Review</a>
                                </div>
                                <div class="flex-fill">
                                <h4 class="g-color-blue g-font-weight-800 mb-0">1.00%</h4>
                                <span>As of: Sept.1 Tue</span>
                                </div>
                                <div class="flex-fill">
                                <h4 class="g-color-blue g-font-weight-800 mb-0">$1</h4>
                                </div>
                                <div class="flex-fill">
                                <h4 class="g-color-blue g-font-weight-800 mb-0">$250</h4>
                                <span>Over 1 Year</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center g-py-10 g-px-15">
                                <div class="flex-fill">

                                    <h4>PNC Bank</h4>
                                    <span>Member FDIC</span><br>
                                    <span>Savings Account</span>
                                    <div>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star-o g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                    </div>
                                    <a href="#" class="btn btn-xs u-btn-blue g-mr-10 g-mb-15">Read Review</a>
                                </div>
                                <div class="flex-fill">
                                <h4 class="g-color-blue g-font-weight-800 mb-0">1.00%</h4>
                                <span>As of: Sept.1 Tue</span>
                                </div>
                                <div class="flex-fill">
                                <h4 class="g-color-blue g-font-weight-800 mb-0">$1</h4>
                                </div>
                                <div class="flex-fill">
                                <h4 class="g-color-blue g-font-weight-800 mb-0">$250</h4>
                                <span>Over 1 Year</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center g-py-10 g-px-15">
                                <div class="flex-fill">

                                    <h4>PNC Bank</h4>
                                    <span>Member FDIC</span><br>
                                    <span>Savings Account</span>
                                    <div>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                        <i class="fa fa-star-o g-color-yellow g-font-size-8" aria-hidden="true"></i>
                                    </div>
                                    <a href="#" class="btn btn-xs u-btn-blue g-mr-10 g-mb-15">Read Review</a>
                                </div>
                                <div class="flex-fill">
                                <h4 class="g-color-blue g-font-weight-800 mb-0">1.00%</h4>
                                <span>As of: Sept.1 Tue</span>
                                </div>
                                <div class="flex-fill">
                                <h4 class="g-color-blue g-font-weight-800 mb-0">$1</h4>
                                </div>
                                <div class="flex-fill">
                                <h4 class="g-color-blue g-font-weight-800 mb-0">$250</h4>
                                <span>Over 1 Year</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center g-brd-top g-brd-yellow g-py-10 g-px-15">
                                <div>
                                <h6>Show 10 More Results <span><i class="fa fa-angle-down"></i></span></h6>
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

    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
            // initialization of carousel
            $.HSCore.components.HSCarousel.init('.js-carousel');

            // initialization of tabs
            $.HSCore.components.HSTabs.init('[role="tablist"]');

            // initialization of rating
            $.HSCore.components.HSRating.init($('.js-rating'), {
                spacing: 4
            });

            // initialization of counters
            var counters = $.HSCore.components.HSCounter.init('[class*="js-counter"]');

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');

        });

        $(window).on('load', function() {
            // initialization of header
            $.HSCore.components.HSHeader.init($('#js-header'));
            $.HSCore.helpers.HSHamburgers.init('.hamburger');

            // initialization of HSMegaMenu component
            $('.js-mega-menu').HSMegaMenu({
                event: 'hover',
                pageContainer: $('.container'),
                breakpoint: 991
            });

            // initialization of horizontal progress bars
            setTimeout(function() { // important in this case
                var horizontalProgressBars = $.HSCore.components.HSProgressBar.init('.js-hr-progress-bar', {
                    direction: 'horizontal',
                    indicatorSelector: '.js-hr-progress-bar-indicator'
                });
            }, 1);
        });

        $(window).on('resize', function() {
            setTimeout(function() {
                $.HSCore.components.HSTabs.init('[role="tablist"]');
            }, 200);
        });
    </script>






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

    <!-- JS Plugins Init. -->
    <script type="text/javascript">
        $(document).on('ready', function() {
            setCalculation();
            // initialization of forms
            $.HSCore.components.HSSlider.init(
                '#regularSlider, #regularSlider2, #regularSlider3, #rangeSlider, #rangeSlider2, #rangeSlider3, #stepSlider, #stepSlider2, #stepSlider3, #mortgageSlider, #homeInsuranceSlider, #taxesSlider'
            );
        });

        function getDownpayment(value, type) {
            var totalAmount = $('#purchaseAmount').val();
            if (totalAmount > 0) {
                if (type == 'amount' && value > 0) {
                    var percentage = (value / totalAmount) * 100;
                    $('#downPayment_percentage').val(percentage);
                } else if (type == 'percentage' && value > 0) {
                    var amount = (value / 100) * totalAmount;
                    $('#downPayment_amount').val(amount);
                }
            } else {
                $('#downPayment_percentage').val(0);
                $('#downPayment_amount').val(0);
            }
        }

        function setCalculation() {
            var loanAmount = $('#purchaseAmount').val();
            var downPayment = $('#downPayment_amount').val();
            var interestRate = $('#interestRate').val();
            var paymentYears = $('#paymentYears').val();
            var annualPropertyTax = $('#annualPropertyTax').val();
            var monthlyHOADues = $('#monthlyHOADues').val();
            var annualHomeInsurance = $('#annualHomeInsurance').val();
            if ((loanAmount > 0 && downPayment > 0) && (interestRate > 0 && paymentYears > 0)) {
                var paymentInstallments = calcPay(loanAmount, paymentYears, interestRate, downPayment, annualPropertyTax, monthlyHOADues, annualHomeInsurance);
                if (paymentInstallments['principal_and_interest']) {
                    var monthlyInstallment = paymentInstallments['principal_and_interest'];
                    var homeOwnerInsurance = paymentInstallments['insurance'];
                    var pmiInsurance = 250;
                    var homeInsurance = homeOwnerInsurance + pmiInsurance;
                    var hoaFees = paymentInstallments['HOA_fees'];
                    var propertyTaxes = paymentInstallments['property_taxes'];
                    var taxFees = hoaFees + propertyTaxes;
                    // - Setting Values
                    $('.mortgage_payment').text('$' + monthlyInstallment.toLocaleString());
                    $('.home_insurance').text('$' + homeInsurance.toLocaleString());
                    $('.homeowner_insurance').text('$' + homeOwnerInsurance.toLocaleString());
                    $('.pmi_insurance').text('$' + pmiInsurance.toLocaleString());
                    $('.tax_fees').text('$' + taxFees.toLocaleString());
                    $('.property_tax').text('$' + propertyTaxes.toLocaleString());
                    $('.hoa_tax').text('$' + hoaFees.toLocaleString());

                    // - display donutChart
                    showDonutChart(monthlyInstallment, homeInsurance, taxFees);

                    // - Range Slider
                    /* Mortgage Slider */
                    let mortgage_slider = $("#mortgageSlider");
                    $(function() {
                        mortgage_slider.slider({
                            value: monthlyInstallment,
                            // setup the rest ...
                        });
                        $('#mortgagePayment2').text(monthlyInstallment.toLocaleString());
                    });
                    /* Home Insurance */
                    let homeIns_slider = $("#homeInsuranceSlider");
                    $(function() {
                        homeIns_slider.slider({
                            value: homeInsurance,
                            // setup the rest ...
                        });
                        $('#homeInsurance2').text(homeInsurance.toLocaleString());
                    });
                    /* Taxes & Fees */
                    let taxes_slider = $("#taxesSlider");
                    $(function() {
                        taxes_slider.slider({
                            value: taxFees,
                            // setup the rest ...
                        });
                        $('#taxes2').text(taxFees.toLocaleString());
                    });

                    // - Ammortization
                    var ammortization = calcAmmort(loanAmount, downPayment, interestRate, paymentYears, monthlyInstallment);
                    $('.ammortizationTable').html('');
                    var appendContent = '';
                    $.each(ammortization, function(key, value) {
                        if (key > 0) {
                            appendContent += '<tr>\
							<td>' + value.installment_year + '</td>\
							<td>$' + value.current_balance.toLocaleString() + '</td>\
							<td>$' + value.principal_paid.toLocaleString() + '</td>\
							<td>$' + value.interest_paid.toLocaleString() + '</td>\
							<td>$' + value.remaining_balance.toLocaleString() + '</td>\
						  </tr>';
                        }
                    });
                    $('.ammortizationTable').append(appendContent);
                }
            }
        }

        function calcPay(loanAmount, paymentYears, interestRate, downPayment, annualPropertyTax, monthlyHOADues, annualHomeInsurance) {
            var value = [];
            var monthlyInstallment = 0;
            var monthlyHomeInsurance = 0;
            var principalAmount = loanAmount - downPayment;
            var interestRate = interestRate / 100;
            var interestPerMonth = interestRate / 12;
            var paymentTerms = paymentYears * 12;
            monthlyInstallment = (principalAmount * interestPerMonth * (Math.pow((1.0 + interestPerMonth), paymentTerms))) / ((Math.pow((1.0 + interestPerMonth), paymentTerms)) - 1.0);
            monthlyInstallment = Math.round(monthlyInstallment, 2);
            value['principal_and_interest'] = monthlyInstallment;
            if (annualPropertyTax > 0) {
                monthlyPropertyTax = annualPropertyTax / 12;
                value['property_taxes'] = Math.round(monthlyPropertyTax, 2);
            }
            var monthlyHOADues = (monthlyHOADues > 0 ? monthlyHOADues : 0);
            value['HOA_fees'] = parseInt(monthlyHOADues);
            if (annualHomeInsurance > 0) {
                monthlyHomeInsurance = annualHomeInsurance / 12;
                value['insurance'] = Math.round(monthlyHomeInsurance, 2);
            }
            var totalPayment = parseFloat(monthlyInstallment) + parseFloat(monthlyPropertyTax) + parseFloat(monthlyHOADues) + parseFloat(monthlyHomeInsurance);
            value['total_payment'] = Math.round(totalPayment, 2);
            return value;
        }

        function calcAmmort(loanAmount, downPayment, interestRate, paymentYears, monthlyInstallment) {
            var value = [];
            var remBalArr = [];
            var prnPaidArr = [];
            var intPaidArr = [];
            var principalAmount = loanAmount - downPayment;
            var totalInterest = 0;
            var totalPrincipal = 0;
            interestRate = interestRate / 100;
            // Yearly Calculation
            var yearlyInstallment = monthlyInstallment * 12;
            var interestPerAnnum = calcAmountPayable(principalAmount, interestRate);
            var principalPaidPerAnnum = yearlyInstallment - interestPerAnnum;
            var principalRemaining = principalAmount - principalPaidPerAnnum;
            value[1] = {
                'installment_year': 1,
                'interest_paid': Math.round(interestPerAnnum, 2),
                'principal_paid': Math.round(principalPaidPerAnnum, 2),
                'current_balance': Math.round(principalAmount, 2),
                'remaining_balance': Math.round(principalRemaining, 2)
            };
            totalInterest += interestPerAnnum;
            totalPrincipal += totalPrincipal;
            remBalArr.push(Math.round(principalRemaining));
            prnPaidArr.push(Math.round(totalPrincipal));
            intPaidArr.push(Math.round(totalInterest));

            for (i = 1; i < paymentYears; i++) {
                interestPerAnnum = calcAmountPayable(principalRemaining, interestRate);
                principalPaidPerAnnum = yearlyInstallment - interestPerAnnum;
                var principalCurrent = principalRemaining;
                principalRemaining = principalCurrent - principalPaidPerAnnum;
                value[i + 1] = {
                    'installment_year': (i + 1),
                    'interest_paid': Math.round(interestPerAnnum, 2),
                    'principal_paid': Math.round(principalPaidPerAnnum, 2),
                    'current_balance': Math.round(principalCurrent, 2),
                    'remaining_balance': Math.round(principalRemaining, 2)
                };
                totalInterest += interestPerAnnum;
                totalPrincipal += principalPaidPerAnnum;
                remBalArr.push(Math.round(principalRemaining));
                prnPaidArr.push(Math.round(totalPrincipal));
                intPaidArr.push(Math.round(totalInterest));
            }
            showSplineChart(remBalArr, prnPaidArr, intPaidArr);
            return value;
        }

        function calcAmountPayable(principalAmount, interestRate) {
            var interestPerAnnum = principalAmount * interestRate;
            return interestPerAnnum;
        }

        // - Highcharts
        function showSplineChart(remBalance, prnPaid, intPaid) {
            Highcharts.chart('splineChart', {
                title: {
                    text: ''
                },
                legend: {
                    layout: 'vertical',
                    align: 'center',
                    verticalAlign: 'top',
                    x: 0,
                    y: 0
                },
                exporting: {
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        label: {
                            connectorAllowed: false
                        },
                        pointStart: 2020
                    }
                },
                series: [{
                    name: 'Remaining Balance',
                    color: '#72c02c',
                    data: remBalance
                }, {
                    name: 'Principal Paid',
                    color: '#3398dc',
                    data: prnPaid
                }, {
                    name: 'Interest Paid',
                    color: '#ebc71d',
                    data: intPaid
                }],
                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }
            });
        }

        function showDonutChart(mortgagePayment, homeInsurance, taxFees) {
            var colors = Highcharts.getOptions().colors,
                categories = [
                    'Mortgage Payment',
                    'Home Insurance',
                    'Taxes & Other Fees'
                ],
                data = [{
                        color: '#72c02c',
                        drilldown: {
                            name: 'Mortgage Payment',
                            categories: [
                                'Mortgage Payment'
                            ],
                            data: [
                                mortgagePayment
                            ]
                        }
                    },
                    {
                        color: '#3398dc',
                        drilldown: {
                            name: 'Home Insurance',
                            categories: [
                                'Home Insurance'
                            ],
                            data: [
                                homeInsurance
                            ]
                        }
                    },
                    {
                        color: '#ebc71d',
                        drilldown: {
                            name: 'Taxes & Other Fees',
                            categories: [
                                'Taxes & Other Fees'
                            ],
                            data: [
                                taxFees
                            ]
                        }
                    },
                ],
                versionsData = [],
                i,
                j,
                dataLen = data.length,
                drillDataLen,
                brightness;


            // Build the data arrays
            for (i = 0; i < dataLen; i += 1) {

                // add version data
                drillDataLen = data[i].drilldown.data.length;
                for (j = 0; j < drillDataLen; j += 1) {
                    brightness = 0.2 - (j / drillDataLen) / 5;
                    versionsData.push({
                        name: data[i].drilldown.categories[j],
                        y: data[i].drilldown.data[j],
                        color: Highcharts.color(data[i].color).brighten(brightness).get()
                    });
                }
            }

            // Create the chart
            Highcharts.chart('donutChart', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: ''
                },
                legend: {
                    align: 'center',
                    verticalAlign: 'bottom',
                    x: 0,
                    y: 0,
                    labelFormatter: function() {
                        return this.name + '<br><span style="font-size:14px;">$' + this.y + '</span>';
                    }
                },
                exporting: {
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Dollars',
                    data: versionsData,
                    size: '80%',
                    innerSize: '60%',
                    dataLabels: {
                        formatter: function() {
                            // display only if larger than 1
                            return this.y > 1 ? '<b>' + this.point.name + ':</b> ' +
                                '$' + this.y : null;
                        }
                    },
                    id: 'versions'
                }],
                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 250
                        }
                    }]
                }
            });

        }
    </script>

