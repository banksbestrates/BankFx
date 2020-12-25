
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
</head>

<body>
	<main>
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="font-weight-900">Savings Goal Calculator</h1>
                </div>
            </div>
        </div>
		<!-- Icon Blocks -->
		<section class="container g-pt-30">
			<div class="container">
				<div class="row">
					<!-- Left Pane -->
					<div class="col-sm-6 col-lg-3 m-0 m-b-10 p-0">
						<div class="g-brd-around g-brd-yellow g-pa-15 ">
							<div class="mb-1">
								<!--<p>Enter your details below to estimate your savings with interest earned, total contibutions and initial deposit.</p>-->
							</div>
							<div class="form-group g-mb-35">
								<label class="g-mb-10" for="savingsGoal">Savings Goal</label>
								<input id="savingsGoal" name="savingsGoal" class="form-control form-control-md rounded-0" type="text" placeholder="Savings Goal" value="6000" onChange="$(this).digits();setGoalBasedCalculation();">
								<span id="savingsGoaltest" style="display:none;"></span>
							</div>

							<!-- Regular Slider Option Two -->
							<div class="form-group g-mb-20">
								<div id="savingsGoalSlider1" class="u-slider-v1-3 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-result-container="savingsGoaltest" data-default="6000" data-min="0" data-max="1000000"></div>
							</div>
							<!-- End Regular Slider Option Two -->

							<div class="form-group g-mb-35">
								<label for="yearsToReach">Years to reach goal</label>
								<select class="form-control rounded-0" id="yearsToReach" name="yearsToReach" onChange="setGoalBasedCalculation();">
									<option value="1">1 Year</option>
									<option value="2" selected="selected">2 Years</option>
									<option value="3">3 Years</option>
									<option value="4">4 Years</option>
									<option value="5">5 Years</option>
									<option value="6">6 Years</option>
									<option value="7">7 Years</option>
									<option value="8">8 Years</option>
									<option value="9">9 Years</option>
									<option value="10">10 Years</option>
									<option value="11">11 Years</option>
									<option value="12">12 Years</option>
									<option value="13">13 Years</option>
									<option value="14">14 Years</option>
									<option value="15">15 Years</option>
									<option value="16">16 Years</option>
									<option value="17">17 Years</option>
									<option value="18">18 Years</option>
									<option value="19">19 Years</option>
									<option value="20">20 Years</option>
								</select>
							</div>
							
							<div class="form-group g-mb-35">
								<label for="compoundMethod">Compounding Method</label>
								<select class="form-control rounded-0" id="compoundMethod" name="compoundMethod" onChange="setGoalBasedCalculation();">
									<option value="daily">Daily</option>
									<option value="monthly" selected="selected">Monthly</option>
									<option value="quarterly">Quarterly</option>
									<option value="yearly">Yearly</option>
								</select>
							</div>
							

							<div class="form-group g-mb-35">
								<label class="g-mb-10" for="firstDepositAmount">Amount of first deposit</label>
								<input type="text" id="firstDepositAmount" name="firstDepositAmount" class="form-control rounded-0 form-control-md" value="100" onChange="$(this).digits();setGoalBasedCalculation();" />
								<span id="firstDepositAmounttest" style="display:none;"></span>
							</div>

							<!-- Regular Slider Option Two -->
							<div class="form-group g-mb-20">
								<div id="firstDepositAmountSlider1" class="u-slider-v1-3 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-result-container="firstDepositAmounttest" data-default="100" data-min="0" data-max="100000"></div>
							</div>
							<!-- End Regular Slider Option Two -->
							
							<div class="form-group g-mb-100">
								<label class="g-mb-10" for="firstDepositDate">Date of first deposit</label>
								<input type="date" id="firstDepositDate" name="firstDepositDate" class="form-control rounded-0 form-control-md" value="<?php echo date('Y-m-d'); ?>" onChange="setGoalBasedCalculation();" />
							</div>
							
							<div class="form-group g-mb-100">&nbsp;</div>
						</div>
					</div>

					<!-- Center Pane -->
					<div class="col-sm-6 col-lg-6 m-0 p-0">

						<div class="g-brd-around g-brd-yellow g-brd-left-0">
							<div class="g-brd-bottom g-brd-yellow">
								<ul class="nav nav-justified u-nav-v2-2" role="tablist" data-target="nav-1-1-primary-hor-center" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block u-btn-outline-lightgray g-mb-10">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#savings-breakdown" role="tab">Total Savings Breakdown</a>
									</li>
								</ul>
							</div>

							<div id="nav-1-1-primary-hor-center" class="tab-content">
								<div class="tab-pane fade show active" id="savings-breakdown" role="tabpanel">
									<div class="g-pl-25 g-pb-25 g-pr-25 g-brd-bottom g-brd-yellow">
										<!-- Turquoise -->
										<div class="form-group g-mb-40 text-center g-mt-40">
											<label class="g-mb-10">
												<p><span id="compoundSelected">Monthly</span> deposit required</p>
												<span class="g-color-default" style="font-size: 34px; font-weight:bold; color: #3398dc;">$<span id="monthlyDeposit2">0</span></span>
											</label>
										</div>
									</div>
									<div class="g-pl-25 g-pb-25 g-pr-25">									
										<!-- Total Savings -->
										<div class="form-group g-mb-40 text-center g-mt-40">
											<label class="g-mb-10">
												<p>To make that monthly deposit, you should set aside:</p>
												<span class="g-color-default" style="font-size: 24px; font-weight:bold;"><span id="depositSummary"></span></span>
											</label>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

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
						<span class="g-font-weight-700 mb-0">The average APY in the U.S. is 0.10%. Some banks pay as low as 0.01% or as high as 1.75% or more. Enter an APY to see how much you can save, or choose an APY from one of our partners.</span>
					</div>
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
	<script src="assets/mortgage_calculator/assets/js/scripts/savings_goal_calculator.js"></script>
