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
|	example.com/class/method/id/
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
$route['signup'] = 'Register';
$route['about_us'] = 'About';
$route['privacy_policy'] = 'About/privacy_policy';
$route['terms_conditions'] = 'About/terms_conditions';
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
$route['credit_overview'] = 'Mortgage/credit_overview';
$route['best_credit_cards'] = 'Mortgage/best_credit_cards';
$route['compare_card'] = 'Mortgage/compare_card';
$route['bank_overview'] = 'Bank/bank_overview';
$route['best_banks'] = 'Bank/best_banks';
$route['best_bank_reviews'] = 'Bank/best_bank_reviews';
$route['bank_review'] = 'Bank/bank_review';
$route['branch_locator'] = 'Bank/branch_locator';
$route['bank_state'] = 'Bank/bank_state';
$route['best_money_market'] = 'Bank/best_money_market';

// loan module
$route['loan_calculator']       = 'Loan/loan_calculator';
$route['loan_overview']         = 'Loan/loan_overview';
$route['personal_loan']         = 'Loan/personal_loan';
$route['personal_loan_rate']    = 'Loan/personal_loan_rate';
$route['auto_loan']             = 'Loan/auto_loan';
$route['student_loan']          = 'Loan/student_loan';
$route['top_lenders']           = 'Loan/top_lenders';
$route['leander_loan_review']   = 'Loan/leander_loan_review';
$route['investment_overview']   = 'Loan/investment_overview';
$route['best_investment']       = 'Loan/best_investment';
$route['blog']                  = 'Blog/blog_overview';
$route['retirement_overview']   = 'Retirement/retirement_overview';
$route['insurance_overview']    = 'Insurance/insurance_overview';
$route['brokerage_overview']    = 'Brokerage/brokerage_overview';
$route['best_online_brokerage'] = 'Brokerage/best_online_brokerage';
$route['homeowner_insurance']   = 'Insurance/homeowner_insurance';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/*===============ADMIN VIEW======================*/
$route['admin/login']                       = 'ADMIN/AdminController/login';
$route['admin/dashboard']                   = 'ADMIN/AdminController/dashboard';
$route['admin/user_list']                   = 'ADMIN/AdminController/user_list';
$route['admin/profile']                     = 'ADMIN/AdminController/profile';
$route['admin/website_page/(:any)']         = 'ADMIN/AdminController/page_content/$1';
$route['admin/contact_us']                  = 'ADMIN/AdminController/contact_us';
$route['admin/mortgage/related_articles']   = 'ADMIN/AdminController/mortgage_articles';
$route['admin/mortgage/mortgage_overview']  = 'ADMIN/MortgageController/mortgage_overview';
$route['admin/mortgage/best_mortgage_rates']= 'ADMIN/MortgageController/best_mortgage_rates';
$route['admin/mortgage/best_refinance_rates']= 'ADMIN/MortgageController/best_refinance_rates';
$route['admin/mortgage/house_afford']        = 'ADMIN/MortgageController/house_afford';


/*=================================ADMIN API========================================*/
$route['api/admin/login']                           = 'API/Admin/login';
$route['admin/logout']                              = 'API/Admin/logout';
$route['api/admin/get_profile_detail']              = 'API/Admin/get_admin_detail';
$route['api/admin/update_profile']                  = 'API/Admin/update_profile';
$route['api/admin/reset_password']                  = 'API/Admin/reset_password';
$route['api/admin/page_data']                       = 'API/Pages/get_page_data';
$route['api/admin/page_data_update']                = 'API/Pages/page_data_update';
$route['api/admin/get_contact_detail']              = 'API/Pages/get_contact_detail';
$route['api/admin/update_contact_detail']           = 'API/Pages/update_contact_detail';
$route['api/admin/get_mortgage_rate_content']       = 'API/Mortgage/get_mortgage_rate_content';
$route['api/admin/update_mortgage_rate_content']    = 'API/Mortgage/update_mortgage_rate_content';
$route['api/admin/get_refinance_rate_content']      = 'API/Mortgage/get_refinance_rate_content';
$route['api/admin/update_refinance_rate_content']   = 'API/Mortgage/update_refinance_rate_content';
$route['api/admin/get_house_afford_content']        = 'API/Mortgage/get_house_afford_content';
$route['api/admin/update_house_afford_content']     = 'API/Mortgage/update_house_afford_content';

/*==============================WEB APIS===========================================*/
$route['api/get_page_data']    =    'API/Pages/get_page_data';
