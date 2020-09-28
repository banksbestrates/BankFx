<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

/*===============WEBSITE VIEW======================*/
$route['default_controller'] = 'Home';
$route['page_not_found'] = 'Home/page_not_found';
$route['welcome_templet'] = 'Home/welcome_templet';
$route['signup'] = 'Register';
$route['about_us'] = 'About';
$route['privacy_policy'] = 'About/privacy_policy';
$route['terms_conditions'] = 'About/terms_conditions';
$route['article_detail/(:any)'] = 'About/article_detail/$1';
$route['profile'] = 'Profile';
$route['mortgage_overview'] = 'Mortgage/mortgage_overview';
$route['mortgage_rates'] = 'Mortgage/mortgage_rates';
$route['refinance_rates'] = 'Mortgage/refinance_rates';
$route['mortgage_fha'] = 'Home/mortgage_fha';
$route['mortgage_va_loan'] = 'Home/mortgage_va_loan';
$route['mortgage_jumbo_loan'] = 'Home/mortgage_jumbo_loan';
$route['mortgage_arm_loan'] = 'Home/mortgage_arm_loan';
$route['mortgage_calculator'] = 'Mortgage/mortgage_calculator';
$route['mortgage_calculator_list'] = 'Mortgage/mortgage_calculator_list';
$route['house_afford'] = 'Mortgage/house_afford';
$route['credit_overview'] = 'Credit/credit_overview';
$route['best_credit_cards'] = 'Credit/best_credit_cards';
$route['compare_card'] = 'Credit/compare_card';
$route['card_review'] = 'Credit/card_review';
$route['bank_overview'] = 'Bank/bank_overview';
$route['best_banks'] = 'Bank/best_banks';
$route['best_bank_reviews'] = 'Bank/best_bank_reviews';
$route['bank_review'] = 'Bank/bank_review';
$route['branch_locator'] = 'Bank/branch_locator';
$route['bank_state'] = 'Bank/bank_state';
$route['bank_city/(:any)'] = 'Bank/bank_city/$1';
$route['best_money_market'] = 'Bank/best_money_market';
$route['state/(:any)'] = 'Bank/all_cities/$1';
$route['top-100-banks'] = 'Bank/top_100_banks';
$route['post_detail/(:any)/(:any)'] = 'Posts/post_detail/$1/$2';
$route['calculators'] = 'Home/calculator_view';

// loan module
$route['loan_calculator']       = 'Loan/loan_calculator';
$route['loan_overview']         = 'Loan/loan_overview';
$route['personal_loan']         = 'Loan/personal_loan';
$route['personal_loan_rate']    = 'Loan/personal_loan_rate';
$route['auto_loan']             = 'Loan/auto_loan';
$route['debt_consolidation']    = 'Loan/debt_consolidation';
$route['student_loan']          = 'Loan/student_loan';
$route['top_lenders']           = 'Loan/top_lenders';
$route['leander_loan_review']   = 'Loan/leander_loan_review';
$route['investment_overview']   = 'Investment/investment_overview';
$route['best_investment']       = 'Investment/best_investment';
$route['blog']                  = 'Blog/blog_overview';
$route['retirement_overview']   = 'Retirement/retirement_overview';
$route['insurance_overview']    = 'Insurance/insurance_overview';
$route['brokerage_overview']    = 'Brokerage/brokerage_overview';
$route['best_online_brokerage'] = 'Brokerage/best_online_brokerage';
$route['best_beginner_broker']  = 'Brokerage/best_beginner_broker';
$route['homeowner_insurance']   = 'Insurance/homeowner_insurance';
$route['auto_insurance']        = 'Insurance/auto_insurance';
$route['life_insurance']        = 'Insurance/life_insurance';
$route['health_insurance']      = 'Insurance/health_insurance';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



/*===============================ADMIN VIEW=======================================*/
$route['admin/login']                           = 'ADMIN/AdminController/login';
$route['admin/dashboard']                       = 'ADMIN/AdminController/dashboard';
$route['admin/user_list']                       = 'ADMIN/AdminController/user_list';
$route['admin/profile']                         = 'ADMIN/AdminController/profile';
$route['admin/website_page/(:any)']             = 'ADMIN/AdminController/page_content/$1';
$route['admin/footer']                          = 'ADMIN/AdminController/footer';
$route['admin/contact_us']                      = 'ADMIN/AdminController/contact_us';
$route['admin/mortgage/related_articles']       = 'ADMIN/AdminController/mortgage_articles';
$route['admin/mortgage/mortgage_overview']      = 'ADMIN/MortgageController/mortgage_overview';
$route['admin/mortgage/best_mortgage_rates']    = 'ADMIN/MortgageController/best_mortgage_rates';
$route['admin/mortgage/best_refinance_rates']   = 'ADMIN/MortgageController/best_refinance_rates';
$route['admin/mortgage/house_afford']           = 'ADMIN/MortgageController/house_afford';
$route['admin/credit/credit_overview']          = 'ADMIN/CreditController/credit_overview';
$route['admin/loan/loan_overview']              = 'ADMIN/LoanController/loan_overview';
$route['admin/loan/personal_loan']              = 'ADMIN/LoanController/personal_loan';
$route['admin/loan/auto_loan']                  = 'ADMIN/LoanController/auto_loan';
$route['admin/loan/student_loan']               = 'ADMIN/LoanController/student_loan';
$route['admin/loan/debt_consolidation']         = 'ADMIN/LoanController/debt_consolidation';
$route['admin/brokerage/brokerage_overview']    = 'ADMIN/BrokerageController/brokerage_overview';
$route['admin/brokerage/best_online_brokers']   = 'ADMIN/BrokerageController/best_online_brokers';
$route['admin/brokerage/best_beginner_brokers'] = 'ADMIN/BrokerageController/best_beginner_brokers';
$route['admin/investing/investing_overview']    = 'ADMIN/InvestingController/investing_overview';
$route['admin/investing/best_investment']       = 'ADMIN/InvestingController/best_investment';
$route['admin/retirement/retirement_overview']  = 'ADMIN/RetirementController/retirement_overview';
$route['admin/home/homepage']                   = 'ADMIN/HomePageController/homepage';
$route['admin/bank/bank_overview']              = 'ADMIN/BankController/bank_overview';
$route['admin/bank/best_bank']                  = 'ADMIN/BankController/best_bank';
$route['admin/bank/best_bank_review']           = 'ADMIN/BankController/best_bank_review';
$route['admin/insurance/insurance_overview']    = 'ADMIN/InsuranceController/insurance_overview';
$route['admin/insurance/homeowner_insurance']   = 'ADMIN/InsuranceController/homeowner_insurance';
$route['admin/insurance/auto_insurance']        = 'ADMIN/InsuranceController/auto_insurance';
$route['admin/insurance/life_insurance']        = 'ADMIN/InsuranceController/life_insurance';
$route['admin/insurance/health_insurance']      = 'ADMIN/InsuranceController/health_insurance';
$route['admin/google_analytics']                = 'ADMIN/AdminController/google_analytics';
$route['admin/blog_overview']                   = 'ADMIN/BlogController/blog_overview';

/*=================================ADMIN API========================================*/
$route['api/admin/login']                           = 'API/Admin/login';
$route['admin/logout']                              = 'API/Admin/logout';
$route['api/get_user_list']                         = 'API/Admin/get_user_list';
$route['api/admin/get_profile_detail']              = 'API/Admin/get_admin_detail';
$route['api/admin/update_profile']                  = 'API/Admin/update_profile';
$route['api/admin/reset_password']                  = 'API/Admin/reset_password';
$route['api/admin/page_data']                       = 'API/Pages/get_page_data';
$route['api/admin/page_data_update']                = 'API/Pages/page_data_update';
$route['api/admin/update_page_banner']              = 'API/Pages/update_page_banner';
$route['api/admin/get_contact_detail']              = 'API/Pages/get_contact_detail';
$route['api/admin/update_contact_detail']           = 'API/Pages/update_contact_detail';
$route['api/admin/get_mortgage_rate_content']       = 'API/Mortgage/get_mortgage_rate_content';
$route['api/admin/update_mortgage_rate_content']    = 'API/Mortgage/update_mortgage_rate_content';
$route['api/admin/get_refinance_rate_content']      = 'API/Mortgage/get_refinance_rate_content';
$route['api/admin/update_refinance_rate_content']   = 'API/Mortgage/update_refinance_rate_content';
$route['api/admin/get_house_afford_content']        = 'API/Mortgage/get_house_afford_content';
$route['api/admin/update_house_afford_content']     = 'API/Mortgage/update_house_afford_content';
$route['api/admin/get_mortgage_overview']           = 'API/Mortgage/get_mortgage_overview';
$route['api/admin/update_mortgage_overview']        = 'API/Mortgage/update_mortgage_overview';
$route['api/admin/get_credit_overview']             = 'API/Credit/get_credit_overview';
$route['api/admin/update_credit_overview']          = 'API/Credit/update_credit_overview';
$route['api/admin/get_loan_overview']               = 'API/Loan/get_loan_overview';
$route['api/admin/update_loan_overview']            = 'API/Loan/update_loan_overview';
$route['api/admin/get_personal_loan']               = 'API/Loan/get_personal_loan';
$route['api/admin/update_personal_loan']            = 'API/Loan/update_personal_loan';
$route['api/admin/get_auto_loan']                   = 'API/Loan/get_auto_loan';
$route['api/admin/update_auto_loan']                = 'API/Loan/update_auto_loan';
$route['api/admin/get_student_loan']                = 'API/Loan/get_student_loan';
$route['api/admin/update_student_loan']             = 'API/Loan/update_student_loan';
$route['api/admin/get_debt_consolidation_data']     = 'API/Loan/get_debt_consolidation_data';
$route['api/admin/update_debt_consolidation']       = 'API/Loan/update_debt_consolidation_data';
$route['api/admin/get_brokerage_overview']          = 'API/Brokerage/get_brokerage_overview';
$route['api/admin/update_brokerage_overview']       = 'API/Brokerage/update_brokerage_overview';
$route['api/admin/get_best_online_broker_data']     = 'API/Brokerage/get_best_online_broker_data';
$route['api/admin/update_best_online_broker_data']  = 'API/Brokerage/update_best_online_broker_data';
$route['api/admin/get_beginner_broker_data']        = 'API/Brokerage/get_beginner_broker_data';
$route['api/admin/update_beginner_broker_data']     = 'API/Brokerage/update_beginner_broker_data';
$route['api/admin/get_investing_overview']          = 'API/Investing/get_investing_overview';
$route['api/admin/update_investing_overview']       = 'API/Investing/update_investing_overview';
$route['api/admin/get_best_investment']             = 'API/Investing/get_best_investment';
$route['api/admin/update_best_investment']          = 'API/Investing/update_best_investment';
$route['api/admin/get_retirement_overview']         = 'API/Retirement/get_retirement_overview';
$route['api/admin/update_retirement_overview']      = 'API/Retirement/update_retirement_overview';
$route['api/admin/get_homepage_slider']             = 'API/Homepage/get_homepage_slider';
$route['api/admin/update_homepage_data']            = 'API/Homepage/update_homepage_data';
$route['api/admin/update_homepage_testimonial']     = 'API/Homepage/update_homepage_testimonial';
$route['api/admin/get_insurance_overview']          = 'API/Insurance/get_insurance_overview';
$route['api/admin/update_insurance_overview']       = 'API/Insurance/update_insurance_overview';
$route['api/admin/get_homeowner_insurance']         = 'API/Insurance/get_homeowner_insurance';
$route['api/admin/update_homeowner_insurance']      = 'API/Insurance/update_homeowner_insurance';
$route['api/admin/get_auto_insurance']              = 'API/Insurance/get_auto_insurance';
$route['api/admin/update_auto_insurance']           = 'API/Insurance/update_auto_insurance';
$route['api/admin/get_life_insurance']              = 'API/Insurance/get_life_insurance';
$route['api/admin/update_life_insurance']           = 'API/Insurance/update_life_insurance';
$route['api/admin/get_health_insurance']            = 'API/Insurance/get_health_insurance';
$route['api/admin/update_health_insurance']         = 'API/Insurance/update_health_insurance';
$route['api/admin/get_bank_overview']               = 'API/Bank/get_bank_overview';
$route['api/admin/update_bank_overview']            = 'API/Bank/update_bank_overview';
$route['api/admin/get_best_bank_overview']          = 'API/Bank/get_best_bank_overview';
$route['api/admin/update_best_bank_overview']       = 'API/Bank/update_best_bank_overview';
$route['api/admin/get_best_bank_review_overview']   = 'API/Bank/get_best_bank_review_overview';
$route['api/admin/update_best_bank_review_overview']= 'API/Bank/update_best_bank_review_overview';
$route['api/admin/get_blog_overview']               = 'API/Blog/get_blog_overview';
$route['api/admin/update_blog_overview']            = 'API/Blog/update_blog_overview';

$route['api/admin/get_script_data']            = 'API/Analytics/get_script_data';
$route['api/admin/update_script_data']         = 'API/Analytics/update_script_data';
$route['api/admin/get_footer_data']            = 'API/Analytics/get_footer_data';
$route['api/admin/update_footer_data']         = 'API/Analytics/update_footer_data';
$route['api/admin/update_footer_links']        = 'API/Analytics/update_footer_links';

$route['api/mortgage/article_detail/(:any)']    = 'Mortgage/article_detail/$1';
$route['api/retirement/article_detail/(:any)']  = 'Retirement/article_detail/$1';
$route['api/bank/article_detail/(:any)']  = 'Bank/article_detail/$1';
$route['api/credit/article_detail/(:any)']  = 'Credit/article_detail/$1';
$route['investing/article_detail/(:any)']  = 'Investment/article_detail/$1';
$route['api/loan/article_detail/(:any)']  = 'Loan/article_detail/$1';

/*==============================WEB APIS===========================================*/
$route['api/get_page_data']      = 'API/Pages/get_page_data';
$route['api/search_bank_by_zip'] = 'API/Bank/search_bank_by_zip';
$route['api/register_user']      = 'API/Register/register_user';
$route['api/get_all_city_banks'] = 'API/Bank/get_all_city_banks';
