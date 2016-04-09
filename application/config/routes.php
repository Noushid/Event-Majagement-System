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
/////PUBLIC ROUTES/////////

$route['home'] = 'Home';
$route['index'] = 'Home';
$route['about'] = 'Home/about';
$route['gallery'] = 'Home/gallery';
$route['services'] = 'Home/services';
$route['contacts'] = 'Home/contact';
$route['admin-login'] = 'Home/admin_log';
$route['admin-log'] = 'Home/admin_log';
$route['sign-up'] = 'Home/register';

$route['login'] = 'Client_Controller/login';

$route['login/submit'] = 'Client_Controller/login_verify';

$route['sign-up/submit'] = 'Client_Controller/add_client';


////USER ROUTES//////

$route['(:any)/logout'] = 'client_Controller/logout';
$route['(:any)/home'] = 'client_Controller/home';
$route['(:any)/booking'] = 'client_Controller/book';
$route['(:any)/booking/submit'] = 'client_Controller/book_submit';



$route['dashboard'] = 'Dashboard/dashboard';


$route['default_controller'] = 'home';


//client
$route['add_client']= 'Client_Controller';
$route['dashboard/client/delete/(:any)'] ='Client_Controller/delete/$1';
$route['dashboard/client'] = 'Client_Controller/view';
$route['dashboard/clients'] = 'Client_Controller/view';
//event
$route['event/add']= 'Event_Controller';
$route['dashboard/event/delete/(:any)'] ='Event_Controller/delete/$1';
$route['dashboard/event'] = 'Event_Controller/view';
$route['dashboard/event'] = 'Event_Controller/view';

//...................admin.........
///category

$route['dashboard/category/add']= 'Category_Controller';
$route['dashboard/category/delete/(:any)'] ='Category_Controller/delete/$1';
$route['dashboard/category'] = 'Category_Controller/view';

//venue
$route['dashboard/venues/add'] = 'Venue_Controller';
$route['dashboard/category'] ='Category_Controller/view_cat';
$route['dashboard/venues'] = 'Venue_Controller/view';
$route['dashboard/venue/delete/(:any)'] ='Venue_Controller/delete/$1';

//vehicle
$route['dashboard/vehicles/add'] = 'Vehicle_Controller';
$route['dashboard/vehicle/delete/(:any)'] ='Vehicle_Controller/delete/$1'; 
$route['dashboard/vehicles'] = 'Vehicle_Controller/view';

//entertiment
$route['dashboard/entertinment/add'] = 'Entertiment_Controller';
$route['dashboard/entertinment/delete/(:any)'] ='Entertiment_Controller/delete/$1';
$route['dashboard/entertinment'] = 'Entertiment_Controller/view';

//payment
$route['dashboard/payment/add'] = 'Payment_Controller';
$route['dashboard/payment/delete/(:any)'] ='Payment_Controller/delete/$1'; 
$route['dashboard/payments'] = 'Payment_Controller/view';
//food_item
$route['dashboard/fooditem/add'] = 'Food_ItemController';
$route['dashboard/fooditem/delete/(:any)'] ='Food_ItemController/delete/$1'; 
$route['dashboard/foods'] = 'Food_ItemController/view_item';
//booking
$route['dashboard/booking/add'] = 'Booking_Controller';
$route['dashboard/booking/delete/(:any)'] ='Booking_Controller/delete/$1'; 
$route['dashboard/booking'] = 'Booking_Controller/view_booking';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
