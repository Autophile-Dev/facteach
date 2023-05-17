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
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['sign-up']='form-panel/form/signUp';
$route['form/register']='form-panel/form/registerUser';
$route['form/login']='form-panel/form/logInUser';
$route['course/enrollment']='user-panel/user/enrollCourse';
$route['course/rate']='user-panel/user/rateCourse';
$route['form/logout']='form-panel/form/logout';
$route['log-in']='form-panel/form/logIn';
$route['home']='user-panel/user/index';
$route['enrolled']='user-panel/user/enrolled';
$route['view/(:num)']='user-panel/user/view_course/$1';
$route['complete/(:num)']='user-panel/user/view_completed/$1';
$route['admin/admin-dashboard']='admin-panel/admin/index';
$route['admin/add-course']='admin-panel/admin/add';
$route['admin/add']='admin-panel/admin/add_course';
$route['admin/courses']='admin-panel/admin/view';
$route['admin/users']='admin-panel/admin/view_users';
