<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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





$route['default_controller'] = 'Vcard_front';
$route['404_override'] = 'Admin/pagenotfound';
$route['translate_uri_dashes'] = FALSE;


require_once( BASEPATH .'database/DB.php');
$db=&DB();
$query=$db->query("select user_id,slug from tbl_users");
$result=$query->result_array();
$res=array();
$res['result']=$result;
foreach($res['result'] as $row)
{
    $route[$row['slug']]='Vcard_front/index1/'.$row['user_id'];
}
foreach($res['result'] as $row)
{
    $route['forgetPasswordForm/'.$row['slug']]='Admin/forgetPasswordForm/'.$row['user_id'];
}


// $route['IcedInfotech']='Vcard_front/index1/26';
// $route['dummy']='vcard_front/dummy';
// $route['product/(:num)']='admin/product/$1';   

