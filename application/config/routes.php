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


$route['bank_overview'] = 'Bank/bank_overview';
$route['best_banks'] = 'Bank/best_banks';
$route['bank_review'] = 'Bank/bank_review';
// loan module
$route['loan_calculator'] = 'Loan/loan_calculator';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
