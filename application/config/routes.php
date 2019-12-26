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
$route['default_controller'] = 'user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['index'] 	= 'user/main';
$route['login'] 	= 'user/authentication';
$route['dashboard'] = 'user/dashboard';

/*
| -------------------------------------------------------------------------
| ACCOUNT MANAGEMENT URI ROUTING
| -------------------------------------------------------------------------
*/
$route['account'] 						= 'user/account';
// $route['account/(:num)'] 				= 'user/account/$1';
$route['account/add'] 					= 'user/account_update/';
$route['account/update/(:num)'] 		= 'user/account_update/$1';
$route['account/view/(:num)'] 			= 'user/account_view/$1';
$route['account/delete/(:num)'] 		= 'user/account_delete/$1';
$route['account/page'] 					= 'user/account';
$route['account/page/(:num)'] 			= 'user/account/$1';

/*
| -------------------------------------------------------------------------
*/

/*
| -------------------------------------------------------------------------
| USER PROFILE MANAGEMENT URI ROUTING
| -------------------------------------------------------------------------
*/
$route['profile'] 	= 'user/profile';
/*
| -------------------------------------------------------------------------
*/

/*
| -------------------------------------------------------------------------
| POST/BLOG/PAGE MANAGEMENT URI ROUTING
| -------------------------------------------------------------------------
*/
$route['post'] 						= 'user/post';
$route['post/update/(:num)'] 		= 'user/post_update/$1';
$route['post/view/(:num)'] 			= 'user/post_view/$1';
$route['post/delete/(:num)'] 		= 'user/post_delete/$1';
/*
| -------------------------------------------------------------------------
*/

/*
| -------------------------------------------------------------------------
| PROJECT MANAGEMENT URI ROUTING
| -------------------------------------------------------------------------
*/
$route['project'] 						= 'user/project';
$route['project/update/(:num)'] 		= 'user/post_update/$1';
$route['project/view/(:num)'] 			= 'user/post_view/$1';
$route['project/delete/(:num)'] 		= 'user/post_delete/$1';
/*
| -------------------------------------------------------------------------
*/



