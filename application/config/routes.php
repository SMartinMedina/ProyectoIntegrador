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
$route['panelestado'] = 'EstadosTurnos/panel';
$route['altaestado'] = 'EstadosTurnos/alta';
$route['altaestadobd'] = 'EstadosTurnos/altabd';
$route['bajaestado/(:num)'] = 'EstadosTurnos/baja/$1';
$route['bajaestadobd'] = 'EstadosTurnos/bajabd';
$route['editaestado/(:num)'] = 'EstadosTurnos/modificarEstado/$1';
$route['editaestadobd'] = 'EstadosTurnos/modificarEstadobd';
/*ESPECIALIDADES*/
$route['panelespecialidad'] = 'EspecialidadesEmpleados/panel';
$route['altaespecialidad'] = 'EspecialidadesEmpleados/alta';
$route['altaespecialidadbd'] = 'EspecialidadesEmpleados/altabd';
$route['bajaespecialidad/(:num)'] = 'EspecialidadesEmpleados/baja/$1';
$route['bajaespecialidadbd'] = 'EspecialidadesEmpleados/bajabd';
$route['editaespecialidad/(:num)'] = 'EspecialidadesEmpleados/modificarespecialidad/$1';
$route['editaespecialidadbd'] = 'EspecialidadesEmpleados/modificarespecialidadbd';

/* */

/*USUARIOS*/
$route['panelusuarios'] = 'Usuarios/panel';
$route['altausuario'] = 'Usuarios/alta';
$route['altausuariobd'] = 'Usuarios/altabd';
$route['bajausuario/(:num)'] = 'Usuarios/baja/$1';
$route['bajausuariobd'] = 'Usuarios/bajabd';
$route['editausuario/(:num)'] = 'Usuarios/edita/$1';
$route['editausuariobd'] = 'Usuarios/editabd';
/*TURNOS*/
$route['panelturno'] = 'Turnos/panel';
$route['altaturno'] = 'Turnos/alta';
$route['altaturnobd'] = 'Turnos/altabd';
$route['bajaturno/(:num)'] = 'Turnos/baja/$1';
$route['bajaturnobd'] = 'Turnos/bajabd';
$route['editaturno/(:num)'] = 'Turnos/modificarEstado/$1';
$route['editaturnobd'] = 'Turnos/modificarEstadobd';
/*USUARIOS ESPECIALIDADES*/
$route['panelusuarioespecialidad'] = 'UsuariosEspecialidades/panel';
$route['altausuarioespecialidad'] = 'UsuariosEspecialidades/alta';
$route['altausuarioespecialidad'] = 'UsuariosEspecialidades/altabd';
$route['bajausuarioespecialidad/(:num)'] = 'UsuariosEspecialidades/baja/$1';
$route['bajausuarioespecialidad'] = 'UsuarioEspUsuariosEspecialidadesecialidad/bajabd';
$route['editausuarioespecialidad/(:num)'] = 'UsuariosEspecialidades/modificarespecialidad/$1';
$route['editausuarioespecialidadbd'] = 'UsuariosEspecialidades/modificarespecialidadbd';