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

/*ROLES*/
$route['panelroles'] = 'Roles/panel';
$route['altarol'] = 'Roles/alta';
$route['altarolbd'] = 'Roles/altabd';
$route['bajarol/(:num)'] = 'Roles/baja/$1';
$route['bajarolbd'] = 'Roles/bajabd';
$route['editarol/(:num)'] = 'Roles/edita/$1';
$route['editarolbd'] = 'Roles/editabd';
/*ESTADOS*/
$route['panelestado'] = 'Estadost/panel';
$route['altaestado'] = 'Estadost/alta';
$route['altaestadobd'] = 'Estadost/altabd';
$route['bajaestado/(:num)'] = 'EstadosT/baja/$1';
$route['bajaestadobd'] = 'EstadosT/bajabd';
$route['editaestado/(:num)'] = 'EstadosT/modificarEstado/$1';
$route['editaestadobd'] = 'EstadosT/modificarEstadobd';
/*ESPECIALIDADES*/
$route['panelespecialidad'] = 'EspecialidadesE/panel';
$route['altaespecialidad'] = 'EspecialidadesE/alta';
$route['altaespecialidadbd'] = 'EspecialidadesE/altabd';
$route['bajaespecialidad/(:num)'] = 'EspecialidadesE/baja/$1';
$route['bajaespecialidadbd'] = 'EspecialidadesE/bajabd';
$route['editaespecialidad/(:num)'] = 'EspecialidadesE/modificarespecialidad/$1';
$route['editaespecialidadbd'] = 'EspecialidadesE/modificarespecialidadbd';