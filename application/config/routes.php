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
$route['default_controller'] = 'welcome';
///category
$route['add_category']= 'Category_Controller';
$route['dashboard/category/delete/(:any)'] ='Category_Controller/delete/$1';
$route['dashboard/venue/delete/(:any)'] ='Venue_Controller/delete/$1'; 
//venue
$route['add_venue'] = 'Venue_Controller';
$route['dashboard/category'] ='Category_Controller/view_cat';
$route['dashboard/venue'] = 'Venue_Controller/view';
//vehicle
$route['add_vehicle'] = 'Vehicle_Controller';
$route['dashboard/vehicle/delete/(:any)'] ='Vehicle_Controller/delete/$1'; 
$route['dashboard/vehicle'] = 'Vehicle_Controller/view';
//entertiment
$route['add_entertiment'] = 'Entertiment_Controller';
$route['dashboard/entertiment/delete/(:any)'] ='Entertiment_Controller/delete/$1'; 
$route['dashboard/entrtiment'] = 'Entertiment_Controller/view';
//payment
$route['add_payment'] = 'Payment_Controller';
$route['dashboard/payment/delete/(:any)'] ='Payment_Controller/delete/$1'; 
$route['dashboard/payment'] = 'Payment_Controller/view';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
