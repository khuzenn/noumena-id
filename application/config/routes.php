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
$route['default_controller'] = 'home';
$route['home/detail/(:any)'] = 'Home/detail/$1';
$route['home/load_more'] = 'Home/load_more';
$route['misuh-misuh'] = 'Misuh_Misuh';
$route['misuh-misuh/detail/(:any)'] = 'Misuh_Misuh/detail/$1';
$route['misuh-misuh/load_more'] = 'Misuh_Misuh/load_more';
$route['keluh-kasih'] = 'Keluh_Kasih';
$route['keluh-kasih/detail/(:any)'] = 'Keluh_Kasih/detail/$1';
$route['keluh-kasih/load_more'] = 'Keluh_Kasih/load_more';
$route['catatan-sipil'] = 'Catatan_Sipil';
$route['catatan-sipil/detail/(:any)'] = 'Catatan_Sipil/detail/$1';
$route['catatan-sipil/load_more'] = 'Catatan_Sipil/load_more';
$route['ulasan'] = 'Ulasan';
$route['ulasan/detail/(:any)'] = 'Ulasan/detail/$1';
$route['berbagi-pandangan'] = 'Berbagi_Pandangan';
$route['tentang-kami'] = 'Tentang_Kami';
$route['kebijakan-privasi'] = 'Kebijakan_Privasi';
$route['dashboard'] = 'Dashboard';
$route['pangkalan-artikel'] = 'Pangkalan_Artikel';
$route['pangkalan-artikel/detail/(:any)'] = 'Pangkalan_Artikel/detail/$1';
$route['pangkalan-artikel/delete/(:any)'] = 'Pangkalan_Artikel/delete/$1';
$route['pangkalan-artikel/download/(:any)'] = 'Pangkalan_Artikel/download/$1';
$route['pangkalan-artikel/downloadFoto/(:any)'] = 'Pangkalan_Artikel/downloadFoto/$1';
$route['laman-kerja'] = 'Laman_Kerja';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
