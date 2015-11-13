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

$route['default_controller'] = "home";
$route['404_override'] = 'error';

$route['actualites/page/(:num)'] = "actualite/actualites";
$route['actualites'] = "actualite/actualites";
$route['actualite/(:num)/(:any)'] = "actualite/oneActualite/$1/$2";


$route['restaurants/ville/(:any)'] = "restaurants/filter_restaurants";
$route['restaurants/ville/(:any)/page/(:num)'] = "restaurants/filter_restaurants";
$route['restaurants/'] = "restaurants/index";
$route['restaurants/page/(:num)'] = "restaurants/index";
$route['restaurant/(:num)/(:any)'] = "restaurants/oneRestaurant/$1";

$route['evenements/ville/(:any)'] = "evenements/filter_evenements";
$route['evenements/ville/(:any)/page/(:num)'] = "evenements/filter_evenements";
$route['evenements/'] = "evenements/index";
$route['evenements/page/(:num)'] = "evenements/index";
$route['evenement/(:num)/(:any)'] = "evenements/oneEvenement/$1";


$route['activites/ville/(:any)'] = "activites/filter_activites";
$route['activites/ville/(:any)/page/(:num)'] = "activites/filter_activites";
$route['activites/type/(:any)'] = "activites/filter_activites";
$route['activites/type/(:any)/page/(:num)'] = "activites/filter_activites";
$route['activites/ville/(:any)/type/(:any)'] = "activites/filter_activites";
$route['activites/ville/(:any)/type/(:any)/page/(:num)'] = "activites/filter_activites";
$route['activites/'] = "activites/index";
$route['activites/page/(:num)'] = "activites/index";
$route['activites/(:num)/(:any)'] = "activites/oneActivite/$1";

$route['espace-professionnel'] = "user/espace_pro/";
$route['mot-de-passe-oublie'] = "user/mdp_oublie/";
$route['inscription.html'] = "user/inscription/";

$route['autocomplete'] = "home/autocomplete";

$route['recherche'] = "home/recherche";
$route['inscription-newsletter'] = "home/inscription_newsletter";

/* End of file routes.php */
/* Location: ./application/config/routes.php */