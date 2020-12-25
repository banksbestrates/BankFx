
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
                    <h1 class="font-weight-900 mb-2">Calculate: Your Savings vs National Average</h1>
                </div>
            </div>
        </div>
		<!-- Icon Blocks -->
		<section class="container g-pt-2">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-lg-9 m-0 p-0">
						<div class="g-brd-around g-brd-yellow g-brd-left-0">
							<div class="g-brd-bottom g-brd-left g-brd-yellow">
								<h4 class="g-color-blue g-font-weight-600 text-center">At retirement, your IRA balance could be worth <span class="iraBalance">$2,409,310</span>.</h4>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- Left Pane -->
					<div class="col-sm-6 col-lg-3 m-0 p-0">
						<div class="g-brd-around g-brd-yellow g-pa-15 g-brd-top-0">
							<div class="form-group g-mb-20">
								<label class="g-mb-10 g-font-weight-600" for="startingBalance">Starting balance</label>
								<input id="startingBalance" name="startingBalance" class="form-control form-control-md rounded-20" type="text" placeholder="Starting balance" value="43000" onChange="$(this).digits();">
								<span id="startingBalancetest" style="display:none;"></span>
							</div>
							<!-- End Progress Bars -->


							<!-- Regular Slider Option Two -->
							<div class="form-group g-mb-20">
								<div id="startingBalanceSlider1" class="u-slider-v1-3 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-result-container="startingBalancetest" data-default="43000" data-min="0" data-max="100000"></div>
							</div>
							<!-- End Regular Slider Option Two -->

							<div class="form-group g-mb-25">
								<label class="g-pl-20" for="annualContribution">Annual contribution</label>
								<input type="text" id="annualContribution" name="annualContribution" class="form-control rounded-20 form-control-md" placeholder="Annual contribution" value="3890" onChange="$(this).digits();" />
								<span id="annualContributiontest" style="display:none;"></span>
							</div>
							<!-- Regular Slider Option Two -->
							<div class="form-group g-mb-20">
								<div id="annualContributionSlider1" class="u-slider-v1-3 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-result-container="annualContributiontest" data-default="3890" data-min="0" data-max="100000"></div>
							</div>
							<!-- End Regular Slider Option Two -->

							<div class="form-group g-mb-25">
								<label class="g-mb-10" for="currentAge">Current age</label>
								<input id="currentAge" name="currentAge" class="form-control form-control-md rounded-20" type="float" value="31">
								<span id="currentAgetest" style="display:none;"></span>
							</div>

							<!-- Regular Slider Option Two -->
							<div class="form-group g-mb-20">
								<div id="currentAgeSlider1" class="u-slider-v1-3" data-result-container="currentAgetest" data-default="31" data-min="0" data-max="100"></div>
							</div>
							<!-- End Regular Slider Option Two -->
							
							<div class="form-group g-mb-25">
								<label class="g-pl-20" for="ageOfRetirement">Age of retirement</label>
								<input id="ageOfRetirement" name="ageOfRetirement" class="form-control rounded-20 form-control-md" type="text" value="81">
								<span id="ageOfRetirementtest" style="display:none;"></span>
							</div>

							<!-- Regular Slider Option Two -->
							<div class="form-group g-mb-20">
								<div id="ageOfRetirementSlider1" class="u-slider-v1-3" data-result-container="ageOfRetirementtest" data-default="81" data-min="0" data-max="100"></div>
							</div>
							<!-- End Regular Slider Option Two -->

							<div class="form-group g-mb-25">
								<label class="g-pl-10" for="rateOfReturn">Expected rate of return</label>
								<input id="rateOfReturn" name="rateOfReturn" class="form-control form-control-md rounded-20" type="text" value="6.5" onChange="$(this).percent();">
								<span id="rateOfReturntest" style="display:none;"></span>
							</div>

							<!-- Regular Slider Option Two -->
							<div class="form-group g-mb-20">
								<div id="rateOfReturnSlider1" class="u-slider-v1-3" data-result-container="rateOfReturntest" data-default="6.5" data-step="0.1" data-min="0" data-max="10"></div>
							</div>
							<!-- End Regular Slider Option Two -->

							<div class="form-group g-mb-25">
								<label for="marginalTaxRate">Marginal tax rate</label>
								<input id="marginalTaxRate" name="marginalTaxRate" class="form-control form-control-md rounded-20" type="text" value="30.7" onChange="$(this).percent();">
								<span id="marginalTaxRatetest" style="display:none;"></span>
							</div>

							<!-- Regular Slider Option Two -->
							<div class="form-group g-mb-20">
								<div id="marginalTaxRateSlider1" class="u-slider-v1-3" data-result-container="marginalTaxRatetest" data-default="30.7" data-step="0.1" data-min="0" data-max="100"></div>
							</div>
							<!-- End Regular Slider Option Two -->
							
							<div class="form-group g-mb-25">
								<label for="marginalTaxRate">Total contributions</label>
								<div id="totalContributions" class="g-color-blue g-font-size-24 g-font-weight-600">$0</div>
							</div>
							
							<div class="form-group g-mb-25">
								<label for="marginalTaxRate">Maximize contributions</label>
								 <!-- Checkboxes Option 2 -->
								  <label class="form-check-inline u-check g-pl-25">
									<input name="setMaxContribution" class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" onchange="setIraCalculation();">
									<div class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
									  <i class="fa" data-check-icon=""></i>
									</div>
									<span class="g-font-size-12 g-font-weight-100">Increase future contributions to the maximum allowed</span>
								  </label>
								  <!-- End Checkboxes Option 2 -->
							</div>
							
							<div class="input-group">
								<div class="input-group-append">
									<button class="btn btn-md btn-block u-btn-yellow rounded-0" type="button" onclick="setIraCalculation();">Calculate</button>
								</div>
							</div>
							
						</div>
					</div>

					<!-- Center Pane -->
					<div class="col-sm-6 col-lg-6 m-0 p-0">

						<div class="g-brd-around g-brd-yellow g-brd-left-0 g-brd-top-0 g-height-100x">
							<div id="nav-1-1-primary-hor-center" class="tab-content">
								<div class="tab-pane fade show active" id="payment-breakdown" role="tabpanel">
									<div id="overviewTab">
										<div class="g-pl-25 g-pb-25 g-pr-25">
											<figure class="highcharts-figure" style="width:500px;">
												<div id="splineChart"></div>
											</figure>
										</div>
									</div>
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

		<!-- Icon Blocks -->
		<section class="container">
			<div class="container">

				<div class="row">

					<div class="col-sm-6 col-lg-3 m-0 p-0"></div>
					<div class="col-sm-6 col-lg-6 m-0 p-0"></div>
					<div class="col-sm-6 col-lg-3 g-mb-60"></div>

					<div class="u-heading-v8-1 g-mb-30 resultsSummaryTable" style="display: none;">
						<h2 class="h3 text-uppercase u-heading-v8__title g-font-weight-700 mb-0">Report</h2>
					</div>
					<!-- Table Bordered -->
					<div class="table-responsive resultsSummaryTable" style="display: none;">
						<table class="table table-bordered g-brd-yellow">
							<thead>
								<tr>
									<th colspan='2'>Results Summary</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Starting Balance</td>
									<td class="startingBalanceDisp"></td>
								</tr>
								<tr>
									<td>Maximum Contribution for 2017*</td>
									<td class="maxContributionDisp"></td>
								</tr>
								<tr>
									<td>Actual Contribution for 2017*</td>
									<td class="actualContributionDisp"></td>
								</tr>
								<tr>
									<td>Total Contributions</td>
									<td class="totalContributionDisp"></td>
								</tr>
								<tr>
									<td>IRA Total at Retirement</td>
									<td class="iraTotalDisp"></td>
								</tr>
								<tr>
									<td>Taxable savings account</td>
									<td class="taxableSavingsDisp"></td>
								</tr>
								<tr>
									<td>Difference</td>
									<td class="differenceDisp"></td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- End Table Bordered -->
				</div>
				<div class="mb-1">
					<p>*The annual maximum contribution for 2017 is <span class="annualContribution">$0</span>. If you are age 50 or over, a "catch-up" provision
					allows you to contribute even more to your IRA. The "catch-up" for individuals age 50 or over is $1000 for 2017. The maximum contributions and "catch-up"
					 provisions are automatically included in your results.</p>
				</div>
				<div class="mb-1">
					<p>In 2017, for sinle filers, Roth IRA contributions are phased out for incomes between $118,000 to $133,000. For married couples filing jointly.
					IRA Contributions are phased out for incomes between $186,000 to $196,000. For the purposes of this calculator, we assume you are not Married filing separately, 
					which has a phase-out range of $0-$10,000.</p>
				</div>
				
				<!-- Table Bordered -->
				<div class="table-responsive inputSummaryTable">
					<table class="table table-bordered g-brd-yellow">
						<thead>
							<tr>
								<th colspan='2'>Input Summary</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Annual contribution</td>
								<td class="annualContributionDisp"></td>
							</tr>
							<tr>
								<td>Starting balance</td>
								<td class="startingBalanceDisp"></td>
							</tr>
							<tr>
								<td>Current age</td>
								<td class="currentAgeDisp"></td>
							</tr>
							<tr>
								<td>Age of retirement</td>
								<td class="ageOfRetirementDisp"></td>
							</tr>
							<tr>
								<td>Years until retirement</td>
								<td class="yearsRetirementDisp"></td>
							</tr>
							<tr>
								<td>Expected rate of return</td>
								<td class="expectedRateDisp"></td>
							</tr>
							<tr>
								<td>Marginal tax rate</td>
								<td class="marginalRateDisp"></td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- End Table Bordered -->
				
				<div class="u-heading-v8-1 g-mb-30">
					<h2 class="h3 text-uppercase u-heading-v8__title g-font-weight-700 mb-0">Roth IRA balance by year</h2>
				</div>
				<!-- Table Bordered -->
				<div class="table-responsive">
					<table class="table table-bordered g-brd-yellow">
						<thead>
							<tr>
								<th>Age</th>
								<th>IRA Contribution</th>
								<th>Roth IRA Balance</th>
								<th>Taxable Account</th>
							</tr>
						</thead>
						<tbody class="rothIraTable">
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr><tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr><tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- End Table Bordered -->
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
	<script src="assets/mortgage_calculator/assets/js/scripts/roth_ira_calculator.js"></script>
