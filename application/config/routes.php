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
$route['default_controller'] = 'home';


$route['login']      = 'auth/index';
$route['blocked']    = 'auth/blocked';

//Route Landing pages
$route['detail']                               = 'home/detail_product';
$route['product']                              = 'home/product';
$route['profile-perusahaan']                   = 'home/profile';
$route['struktur-perusahaan']                  = 'home/struktur_perusahaan';
$route['info']                                 = 'home/info';


//Routes Kategori
$route['listkategori']                         = 'kategori/listkategori';
$route['tambahdatakategori']                   = 'kategori/createkategori';
$route['editdatakategori/(:any)']              = 'kategori/editkategori/$1';

//Routes Sales
$route['listsales']                            = 'sales/listsales';
$route['tambahdatasales']                      = 'sales/createsales';
$route['editdatasales/(:any)']                 = 'sales/editsales/$1';

//Routes Profile
$route['profile']                              = 'profile/profile';
$route['editprofile']                          = 'profile/edit';
$route['ubahpassword']                         = 'profile/changepassword';

//Routes Menu Pengaturan
$route['pengaturan']                           = 'pengaturan';
$route['tambahreference']                      = 'pengaturan/createreference';
$route['diagram']                              = 'diagram/index';
$route['maps']                                 = 'maps/index';
$route['exportexcel']                          = 'exportexcel/export';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
