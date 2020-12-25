
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

        <!-- End Header -->
        <section class="g-brd-top g-brd-gray-light-v4 g-py-10">
            <div class="container">
                <div class="d-sm-flex">
                    <div class="align-self-center">
                    <h2 class="u-heading-v2__title g-mb-10 g-font-weight-800 g-color-black">
                    College Savings Calculator
                    </h2>
                    
                    </div>
            
                </div>
            </div>
        </section>
        <!-- Icon Blocks -->
        <section class="container g-pt-30">
            <div class="container">
                <div class="row">
                    <!-- Left Pane -->
                    <div class="col-sm-12 col-lg-9 m-0 p-0">
                        <div class="g-brd-around g-brd-yellow g-pa-15 ">
                            <div class="d-flex justify-content-center g-py-40 g-px-15">
                                <div>
                                    <h1 class="text-center g-color-blue g-font-weight-800">You may need to make a few changes</h1>
                                    <h3 class="g-color-blue text-center">You should increase your monthly saving to $1.31</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-3 m-0 p-0">
                    </div>


                    <div class="col-sm-6 col-lg-3 m-0 p-0">
                    <div class="g-brd-around g-brd-yellow g-pa-15 ">
							<div class="mb-1">
								<h5 class="g-color-blue g-font-weight-800">College Savings Plan</h5>
							</div>
							<div class="form-group g-mb-20">
								<label class="g-mb-10" for="educationCostInflation">Education cost inflation</label>
                                <input id="educationCostInflation" name="educationCostInflation" class="form-control form-control-md rounded-0" type="text" placeholder="4.8%" value="4.8" onkeyup="$(this).percent();" />
                                <span id="educationCostInflationtest" style="display: none;"></span>
								<div id="educationCostInflationSlider1" class="u-slider-v1-3" data-result-container="educationCostInflationtest" data-default="4.8" data-step="0.1" data-min="0" data-max="12"></div>
							</div>
							<!-- End Progress Bars -->
                            <div class="form-group g-mb-20">
								<label class="g-mb-10" for="currentSavings">Current savings</label>
                                <input id="currentSavings" name="currentSavings" class="form-control form-control-md rounded-0" type="text" placeholder="$0" value="0" onkeyup="$(this).digits();" />
                                <span id="currentSavingstest" style="display: none;"></span>
								<div id="currentSavingsSlider1" class="u-slider-v1-3" data-result-container="currentSavingstest" data-default="0" data-min="0" data-max="100000"></div>
							</div>
							<!-- End Progress Bars -->

                            <div class="form-group g-mb-20">
								<label class="g-mb-10" for="monthlyContribution">Monthly contributions</label>
                                <input id="monthlyContribution" name="monthlyContribution" class="form-control form-control-md rounded-0" type="text" placeholder="$250" value="250" onkeyup="$(this).digits();">
                                <span id="monthlyContributiontest" style="display: none;"></span>
								<div id="monthlyContributionSlider1" class="u-slider-v1-3" data-result-container="monthlyContributiontest" data-default="250" data-min="0" data-max="100000"></div>
							</div>
							<!-- End Progress Bars -->
                            <div class="form-group g-mb-20">
								<label class="g-mb-10" for="rateOfReturn">Rate of return</label>
                                <input id="rateOfReturn" name="rateOfReturn" class="form-control form-control-md rounded-0" type="text" placeholder="7%" value="7" onkeyup="$(this).percent();">
                                <span id="rateOfReturntest" style="display: none;"></span>
								<div id="rateOfReturnSlider1" class="u-slider-v1-3" data-result-container="rateOfReturntest" data-default="7" data-min="0" data-max="100"></div>
							</div>
							<!-- End Progress Bars -->
	                       
                            <!-- End Progress Bars -->
                            <div>
								<h6 class="g-font-weight-800">Total expenses: <span class="totalExpenses">$27,333</span></h6>
							</div>

                        </div>
                       
						<!-- CHILD ONE -->
                        <div class="g-brd-yellow g-brd-around g-brb-top-0 g-pa-15">
                            <div class="">
                                <p class="mb-0">College expenses child one
                                    <a href="#hoatab" data-toggle="collapse" class="pull-right" aria-expanded="true"><i class="fa fa-angle-down fa-2x"></i></a>
                                </p>
                            </div>
                            <div id="hoatab" class="collapse show">

                                <div class="form-group g-mt-10">
                                    <label for="ageOfChildOne">Age of child one:</label>
                                    <input id="ageOfChildOne" name="ageOfChildOne" class="form-control rounded-0 form-control-md" type="text" value="9" />
                                </div>

                                <div class="form-group">
                                    <label class="g-pl-10" for="educationStartChildOne">Age to start education:</label>
                                    <input id="educationStartChildOne" name="educationStartChildOne" class="form-control form-control-md rounded-0" type="text" value="18" />
                                </div>

                                <div class="form-group g-mb-25">
                                    <label for="tuitionChildOne">Tuition:</label>
                                    <input id="tuitionChildOne" name="tuitionChildOne" class="form-control form-control-md rounded-0" type="text" value="33480" onkeyup="$(this).digits();">
                                </div>

                                <div class="form-group g-mb-25">
                                    <label for="roomBoardChildOne">Room and board:</label>
                                    <input id="roomBoardChildOne" name="roomBoardChildOne" class="form-control form-control-md rounded-0" type="text" value="11890" onkeyup="$(this).digits();">
                                </div>
                            </div>
                        </div>
                        <!-- CHILD TWO -->
						<div class="g-brd-yellow g-brd-around g-brb-top-0 g-pa-15">
                            <div class="">
                                <p class="mb-0">College expenses child two
                                    <a href="#hoatab" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down fa-2x"></i></a>
                                </p>
                            </div>
                            <div id="hoatab" class="collapse">

                                <div class="form-group g-mt-10">
                                    <label for="ageOfChildTwo">Age of child two:</label>
                                    <input id="ageOfChildTwo" name="ageOfChildTwo" class="form-control rounded-0 form-control-md" type="text" value="" />
                                </div>

                                <div class="form-group">
                                    <label class="g-pl-10" for="educationStartChildTwo">Age to start education:</label>
                                    <input id="educationStartChildTwo" name="educationStartChildTwo" class="form-control form-control-md rounded-0" type="text" value="" />
                                </div>

                                <div class="form-group g-mb-25">
                                    <label for="tuitionChildTwo">Tuition:</label>
                                    <input id="tuitionChildTwo" name="tuitionChildTwo" class="form-control form-control-md rounded-0" type="text" value="" onkeyup="$(this).digits();">
                                </div>

                                <div class="form-group g-mb-25">
                                    <label for="roomBoardChildTwo">Room and board:</label>
                                    <input id="roomBoardChildTwo" name="roomBoardChildTwo" class="form-control form-control-md rounded-0" type="text" value="" onkeyup="$(this).digits();">
                                </div>
                            </div>
                        </div>
						<!-- CHILD THREE -->
						<div class="g-brd-yellow g-brd-around g-brb-top-0 g-pa-15">
                            <div class="">
                                <p class="mb-0">College expenses child three
                                    <a href="#hoatab" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down fa-2x"></i></a>
                                </p>
                            </div>
                            <div id="hoatab" class="collapse">

                                <div class="form-group g-mt-10">
                                    <label for="ageOfChildThree">Age of child three:</label>
                                    <input id="ageOfChildThree" name="ageOfChildThree" class="form-control rounded-0 form-control-md" type="text" value="" />
                                </div>

                                <div class="form-group">
                                    <label class="g-pl-10" for="educationStartChildThree">Age to start education:</label>
                                    <input id="educationStartChildThree" name="educationStartChildThree" class="form-control form-control-md rounded-0" type="text" value="" />
                                </div>

                                <div class="form-group g-mb-25">
                                    <label for="tuitionChildThree">Tuition:</label>
                                    <input id="tuitionChildThree" name="tuitionChildThree" class="form-control form-control-md rounded-0" type="text" value="" onkeyup="$(this).digits();">
                                </div>

                                <div class="form-group g-mb-25">
                                    <label for="roomBoardChildThree">Room and board:</label>
                                    <input id="roomBoardChildThree" name="roomBoardChildThree" class="form-control form-control-md rounded-0" type="text" value="" onkeyup="$(this).digits();">
                                </div>
                            </div>
                        </div>
						<!-- CHILD FOUR -->
						<div class="g-brd-yellow g-brd-around g-brb-top-0 g-pa-15">
                            <div class="">
                                <p class="mb-0">College expenses child four
                                    <a href="#hoatab" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down fa-2x"></i></a>
                                </p>
                            </div>
                            <div id="hoatab" class="collapse">

                                <div class="form-group g-mt-10">
                                    <label for="ageOfChildFour">Age of child four:</label>
                                    <input id="ageOfChildFour" name="ageOfChildFour" class="form-control rounded-0 form-control-md" type="text" value="" />
                                </div>

                                <div class="form-group">
                                    <label class="g-pl-10" for="educationStartChildFour">Age to start education:</label>
                                    <input id="educationStartChildFour" name="educationStartChildFour" class="form-control form-control-md rounded-0" type="text" value="" />
                                </div>

                                <div class="form-group g-mb-25">
                                    <label for="tuitionChildFour">Tuition:</label>
                                    <input id="tuitionChildFour" name="tuitionChildFour" class="form-control form-control-md rounded-0" type="text" value="" onkeyup="$(this).digits();">
                                </div>

                                <div class="form-group g-mb-25">
                                    <label for="roomBoardChildFour">Room and board:</label>
                                    <input id="roomBoardChildFour" name="roomBoardChildFour" class="form-control form-control-md rounded-0" type="text" value="" onkeyup="$(this).digits();">
                                </div>
                            </div>
                        </div>
                        <div class="g-brd-yellow g-brd-around g-brb-top-0 g-pa-15">
                         <a href="#" class="btn btn-md btn-block u-btn-yellow rounded-0 g-mt-50 g-mr-10 g-mb-18" onclick="setSavingCalculation();">Calculator</a>
                        </div>
                    </div>
                    <!-- Center Pane -->
                    <div class="col-sm-6 col-lg-6 m-0 p-0">


                        <div class="g-brd-around g-brd-yellow">
						

                        <div id="nav-1-1-primary-hor-center" class="tab-content">
                            <div class="tab-pane fade show active" id="payment-breakdown" role="tabpanel">
                       
                            <div class="d-flex justify-content-center g-bg-gray-light-v4 g-brb-bottom g-brd g-py-10 g-px-15">
                                <div>
                                <h4>Your Current Saving Plan</h4>
                                </div>
                            
                            </div>
                            <div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
                                <div>
                                    <span class="text-nowrap g-mr-10">Education cost inflation</span>
                                </div>
                                <div>
                                    <span class="text-nowrap g-mr-10 educationCostInflation">0%</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
                                <div>
                                    <span class="text-nowrap g-mr-10">Current savings</span>
                                </div>
                                <div>
                                    <span class="text-nowrap g-mr-10 currentSavings">$0</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
                                <div>
                                    <span class="text-nowrap g-mr-10">Monthly contribution</span>
                                </div>
                                <div>
                                    <span class="text-nowrap g-mr-10 monthlyContribution">$0</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
                                <div>
                                    <span class="text-nowrap g-mr-10">Rate of return</span>
                                </div>
                                <div>
                                    <span class="text-nowrap g-mr-10 rateOfReturn">0%</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between g-brd-bottom g-brd-yellow g-py-10 g-px-15">
                                <div>
                                    <span class="text-nowrap g-mr-10">Total expenses</span>
                                </div>
                                <div>
                                    <span class="text-nowrap g-mr-10 totalExpenses">$0</span>
                                </div>
                            </div>
                            <h4 class="text-center g-pa-20">You should increase your monthly saving to <span class="increaseMonthlySaving">$0</span></h4>
                                <div id="overviewTab">
                                    <div class="g-pl-25 g-pb-20 g-pr-25">
                                        
                                        <div class="g-brd-around text-center">
                                            <a href="#" class="btn btn-md u-btn-darkgray g-rounded-50 g-width-170">Overveiw</a>
                                            <a href="#" class="btn btn-md u-btn-outline-darkgray g-rounded-50 g-width-170" onclick="$('#detailsTab').show();$('#overviewTab').hide();">Detail</a>
                                        </div>
                                    </div>


                                </div>
                                <div id="detailsTab" style="display: none;">
                                    <img src="/<?php echo base_url();?>assets/mortgage_calculator/assets/img-temp/graph-chart.png" class="img-fluid" >
                                    <div class="d-flex justify-content-center">
                                        <div class="g-brd-around">
                                            <a href="#" class="btn btn-md u-btn-outline-darkgray g-rounded-50 g-width-170 g-mb-15" onclick="$('#overviewTab').show();$('#detailsTab').hide();">Overveiw</a>
                                            <a href="#" class="btn btn-md u-btn-darkgray g-rounded-50 g-width-170 g-mb-15">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="payment-overtime" role="tabpanel">
                                <div id="overviewTab2">
                                    <div class="d-flex justify-content-center g-pa-25">
                                        <figure class="highcharts-figure" style="width:500px;">
                                            <div id="splineChart"></div>
                                        </figure>
                                    </div>
                                    <div class="d-flex justify-content-center g-pa-5">
                                        <div class="g-brd-around">
                                            <a href="#" class="btn btn-md u-btn-darkgray g-rounded-50 g-width-170 g-mb-15">Overveiw</a>
                                            <a href="#" class="btn btn-md u-btn-outline-darkgray g-rounded-50 g-width-170 g-mb-15" onclick="$('#detailsTab2').show();$('#overviewTab2').hide();">Detail</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="detailsTab2" style="display:none;">
                                    <div class="text-center g-pa-25">

                                        <div class="media g-brd-around g-brd-left-3 rounded">
                                            <div class="d-flex g-mr-15">
                                                <span class="g-width-20 g-height-20 rounded-circle g-bg-green"></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="d-flex justify-content-between">
                                                    <h5 class="h6 g-font-weight-600 g-color-black">Mortgage Payment</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right g-line-height-1">
                                            <h4 class="g-font-weight-600 g-color-green mortgage_payment">$0</h4>
                                        </div>
                                        <div class="media g-brd-around g-brd-left-3 rounded">
                                            <div class="d-flex g-mr-15">
                                                <span class="g-width-20 g-height-20 rounded-circle g-bg-blue"></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="d-flex justify-content-between">
                                                    <h5 class="g-font-weight-600 g-color-black">Home Insurance</h5>

                                                </div>
                                                <p class="g-mb-0">Homeowners Insurance</p>
                                                <p>Private Mortgage Insurance (PMI)</p>
                                            </div>
                                        </div>

                                        <div class="text-right g-line-height-1">
                                            <h4 class="g-font-weight-600 g-color-blue home_insurance">$0</h4>
                                            <p class="g-mb-0 homeowner_insurance">$0</p>
                                            <p class="pmi_insurance">$0</p>
                                        </div>

                                        <div class="media g-brd-around g-brd-left-3 rounded">
                                            <div class="d-flex g-mr-15">
                                                <span class="g-width-20 g-height-20 rounded-circle g-bg-yellow"></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="d-flex justify-content-between">
                                                    <h5 class="g-font-weight-600 g-color-black">Taxes & Other Fees</h5>

                                                </div>
                                                <p class="g-mb-0">Property Taxes</p>
                                                <p>HOA/Condo Fees</p>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-between g-pa-25">
                                        <div>

                                        </div>

                                        <div class="text-right g-line-height-1">
                                            <h4 class="g-font-weight-600 g-color-yellow tax_fees">$0</h4>
                                            <p class="g-mb-0 property_tax">$0</p>
                                            <p class="hoa_tax">$0</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center ">
                                        <div>
                                            <p class="g-mb-25">Dsclaimer can go her should we need one</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center g-pa-20">
                                        <div class="g-brd-around">
                                            <a href="#" class="btn btn-md u-btn-outline-darkgray g-rounded-50 g-width-170 g-mb-15" onclick="$('#overviewTab2').show();$('#detailsTab2').hide();">Overveiw</a>
                                            <a href="#" class="btn btn-md u-btn-darkgray g-rounded-50 g-width-170 g-mb-15">Detail</a>
                                        </div>
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
	<script src="<?php echo base_url();?>assets/mortgage_calculator/assets/js/scripts/college_savings_calculator.js"></script>

