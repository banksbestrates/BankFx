
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
								<label class="g-mb-10" for="initialDeposit">Initial Deposit</label>
								<input id="initialDeposit" name="initialDeposit" class="form-control form-control-md rounded-0" type="text" placeholder="Initial Deposit" value="100000" onChange="$(this).digits();setSavingCalculation();">
								<span id="initialDeposittest" style="display:none;"></span>
							</div>

							<!-- Regular Slider Option Two -->
							<div class="form-group g-mb-20">
								<div id="initialDepositSlider1" class="u-slider-v1-3 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-result-container="initialDeposittest" data-default="100000" data-min="0" data-max="1000000"></div>
							</div>
							<!-- End Regular Slider Option Two -->

							<div class="form-group g-mb-35">
								<label class="g-mb-10" for="monthlyContribution">Monthly Contribution</label>
								<input type="text" id="monthlyContribution" name="monthlyContribution" class="form-control rounded-0 form-control-md" value="400" onChange="$(this).digits();setSavingCalculation();" />
								<span id="monthlyContributiontest" style="display:none;"></span>
							</div>


							<!-- Regular Slider Option Two -->
							<div class="form-group g-mb-20">
								<div id="monthlyContributionSlider1" class="u-slider-v1-3 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-result-container="monthlyContributiontest" data-default="400" data-min="0" data-max="1000000"></div>
							</div>
							<!-- End Regular Slider Option Two -->

							<div class="form-group g-mb-35">
								<label for="savingsPeriod">Over a period of</label>
								<select class="form-control rounded-0" id="savingsPeriod" name="savingsPeriod" onChange="setSavingCalculation();">
									<option value="6" selected="selected">6 months</option>
									<option value="12">12 months</option>
									<option value="18">18 months</option>
									<option value="24">24 months</option>
									<option value="30">30 months</option>
									<option value="36">36 months</option>
									<option value="42">42 months</option>
									<option value="48">48 months</option>
									<option value="54">54 months</option>
									<option value="60">60 months</option>
									<option value="66">66 months</option>
									<option value="72">72 months</option>
									<option value="78">78 months</option>
									<option value="84">84 months</option>
									<option value="90">90 months</option>
									<option value="96">96 months</option>
									<option value="102">102 months</option>
									<option value="108">108 months</option>
									<option value="114">114 months</option>
									<option value="120">120 months</option>
								</select>
							</div>
							
							<div class="form-group g-mb-100">
								<label class="g-mb-10" for="apyRate">APY</label>
								<input type="text" id="apyRate" name="apyRate" class="form-control rounded-0 form-control-md" value="4.20" onChange="setSavingCalculation();" />
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
									<div class="g-pl-25 g-pb-25 g-pr-25">
										<!-- Green -->
										<div class="form-group g-mb-40 g-pt-10 text-center">
											<label class="g-mb-10">
												<span class="g-color-primary" style="font-size: 34px; font-weight:bold; color: #72c02c;">$<span id="interestEarned2">0</span></span>
												<p>Interest earned</p>
											</label>
											<div id="interestSlider" class="progress g-height-20 g-rounded-20 u-progress g-mb-20">
											  <div class="progress-bar" role="progressbar" style="width: 0%" data-result-container="interestEarned2" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>

										<!-- Turquoise -->
										<div class="form-group g-mb-40 text-center">
											<label class="g-mb-10">
												<span class="g-color-default" style="font-size: 34px; font-weight:bold; color: #3398dc;">+$<span id="totalContribution2">0</span></span>
												<p>Total contributions</p>
											</label>
											<div id="contributionSlider" class="progress g-height-20 g-rounded-20 u-progress g-mb-20">
											  <div class="progress-bar g-bg-blue" role="progressbar" style="width: 0%" data-result-container="totalContribution2" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>

										<!-- Orange -->
										<div class="form-group g-mb-40 text-center">
											<label class="g-mb-10">
												<span class="g-color-warning" style="font-size: 34px; font-weight:bold; color: #ebc71d;">+$<span id="initialDeposit2">0</span></span>
												<p>Initial deposit</p>
											</label>
											<div id="depositSlider" class="progress g-height-20 g-rounded-20 u-progress g-mb-20">
											  <div class="progress-bar g-bg-orange" role="progressbar" style="width: 0%" data-result-container="initialDeposit2" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
										
										<!-- Total Savings -->
										<div class="form-group g-mb-40 text-center">
											<label class="g-mb-10">
												<p>Your total savings</p>
												<span class="g-color-default" style="font-size: 34px; font-weight:bold;">+$<span id="totalSavings">0</span></span>
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
	<script src="assets/mortgage_calculator/assets/js/scripts/simple_savings_calculator.js"></script>
