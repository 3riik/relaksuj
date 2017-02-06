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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* Custom routes */
$route['admin'] = 'admin/dashboard';
$route['admin/categories'] = 'admin/Picture_categories';
$route['admin/categories/(:any)'] = 'admin/Picture_categories/$1';
$route['admin/categories/(:any)/(:any)'] = 'admin/Picture_categories/$1/$2';
$route['auth'] = 'auth';
$route['backend'] = 'backend';

$route['register'] = 'auth/register';
$route['login'] = 'user/login';
$route['logout'] = 'user/logout';
$route['layouts/(:any)'] = 'layouts/default';

$route['pictures/add'] = 'pictures/add';
$route['pictures/add-comment'] = 'pictures/add_comment';
$route['pictures/delete'] = 'pictures/delete';
$route['pictures/(:any)'] = 'pictures/index/$1';
$route['pictures'] = 'pictures';

$route['verify'] = 'verify';
$route['(:any)'] = 'admin/dashboard';
