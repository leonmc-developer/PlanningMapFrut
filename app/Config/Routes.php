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

 $routes->get('/terreno/index', 'Examples::terrenos');
 $routes->get('/sector/index', 'Examples::sectores');
 $routes->get('/planta/index', 'Examples::plantas');
 $routes->get('/hilera/index', 'Examples::hileras');
