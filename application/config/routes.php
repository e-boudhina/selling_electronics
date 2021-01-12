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
//Custom routes

$route['login'] = 'authenticate/login';
$route['register'] = 'authenticate/register';
$route['logout'] = 'authenticate/logout';

$route['products'] = 'products/index';
$route['products/create'] = 'products/create';
$route['products/edit/:(id)'] = 'products/edit/$id';
$route['products/update/:(id)'] = 'products/update/$id';
$route['products/delete/:(id)'] = 'products/delete/$id';

$route['products/store'] = 'products/store';
//$route[''] = 'home/index';

//Custom Cart routes
$route['customer/orders'] = 'cart/index';
$route['customer/orders/add/(:num)/(:num)'] = 'cart/store/$1/$2';
$route['customer/orders/delete/(:num)'] = 'cart/delete/$1';
$route['quantity/add/one/(:num)'] = 'cart/quantity_add_one/$1';
$route['quantity/remove/one/(:num)'] = 'cart/quantity_remove_one/$1';

// Checkout routes:
$route['customer/orders/checkout'] = 'checkout/index';

//Email notification
$route['/new-user/email/send/(:num)/(:any)'] = 'email/send/$1/$2';

//User
$route['user/dashboard'] = 'user/index';
$route['user/profile/(:num)'] = 'user/edit_profile/$1';
$route['user/profile/update'] = 'user/profile_update';




$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


