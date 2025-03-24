<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// $routes->get('crud', 'Examples::customers_management');
// $routes->get('terrenos', 'Terrenos::index');
// $routes->get('terrenos/add', 'Terrenos::index');
 $routes->get('/tipo_planta/index', 'TipoPlanta::index');
 $routes->get('/tipo_planta/create', 'TipoPlanta::create');
 //$routes->post('/tipo_planta/store', 'TipoPlanta::store');
 $routes->post('/tipo_planta/store_ajax', 'TipoPlanta::store_ajax');
 $routes->post('/tipo_planta/delete_ajax', 'TipoPlanta::delete_ajax');
 $routes->get('/tipo_planta/edit/(:num)', 'TipoPlanta::edit/$1');
 $routes->post('/tipo_planta/update/(:num)', 'TipoPlanta::update/$1');
 $routes->get('/tipo_planta/delete/(:num)', 'TipoPlanta::delete/$1');
 $routes->get('/terreno', 'Terreno::index');
 $routes->get('/maps', 'Maps::index');
 $routes->get('/terreno/lote', 'Lote::index');
 $routes->get('/inventario', 'Inventario::index');
 $routes->get('/actividades', 'Actividades::index');
 $routes->get('/movimientos', 'Movimiento::index');
 $routes->get('/dashboard', 'Home::dashboard');
 $routes->get('/reportes', 'Reportes::index');

 $routes->get('/terreno/index', 'Examples::terrenos');
 $routes->get('/sector/index', 'Examples::sectores');
 $routes->get('/planta/index', 'Examples::plantas');
 $routes->get('/hilera/index', 'Examples::hileras');

 $routes->group('auths', ['namespace' => 'IonAuth\Controllers'], function ($routes) {
	$routes->add('login', 'Auth::login');
	$routes->get('logout', 'Auth::logout');
	$routes->add('forgot_password', 'Auth::forgot_password');
	// $routes->get('/', 'Auth::index');
	// $routes->add('create_user', 'Auth::create_user');
	// $routes->add('edit_user/(:num)', 'Auth::edit_user/$1');
	// $routes->add('create_group', 'Auth::create_group');
	// $routes->get('activate/(:num)', 'Auth::activate/$1');
	// $routes->get('activate/(:num)/(:hash)', 'Auth::activate/$1/$2');
	// $routes->add('deactivate/(:num)', 'Auth::deactivate/$1');
	// $routes->get('reset_password/(:hash)', 'Auth::reset_password/$1');
	// $routes->post('reset_password/(:hash)', 'Auth::reset_password/$1');
	// ...
});