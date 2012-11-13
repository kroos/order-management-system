<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'coms';
$route['coms/orderdetail/(:num)'] = 'coms/orderdetail';
$route['coms/details/(:num)'] = 'coms/details';
$route['coms/item/(:num)'] = 'coms/item';
$route['coms/payment/(:num)'] = 'coms/payment';
$route['coms/delivery/(:num)'] = 'coms/delivery';
$route['coms/delivery_add/(:num)/(:num)'] = 'coms/delivery_add';
$route['coms/exchange/(:num)/(:num)'] = 'coms/exchange';
$route['coms/feedback/(:num)'] = 'coms/feedback';
$route['coms/acknowledgeable/(:num)'] = 'coms/acknowledgeable';
$route['coms/orderu/(:num)/(:num)'] = 'coms/orderu';
$route['coms/clientu/(:num)'] = 'coms/clientu';
$route['coms/itemr/(:num)'] = 'coms/itemr';
$route['coms/paymentr/(:num)'] = 'coms/paymentr';
$route['coms/deliveryr/(:num)'] = 'coms/deliveryr';
$route['coms/delivery_addr/(:num)'] = 'coms/delivery_addr';
$route['coms/exchanger/(:num)/(:num)/(:num)'] = 'coms/exchanger';
$route['coms/newitemr/(:num)'] = 'coms/newitemr';
$route['coms/feedbackr/(:num)'] = 'coms/feedbackr';
$route['404_override'] = 'error/404';


/* End of file routes.php */
/* Location: ./application/config/routes.php */