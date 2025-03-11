<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// $routes->get('crud', 'Examples::customers_management');
// $routes->get('terrenos', 'Terrenos::index');
// $routes->get('terrenos/add', 'Terrenos::index');
 $routes->get('/plantas', 'Planta::index');
 $routes->get('/plantas/create', 'Planta::create');
 $routes->post('/plantas/store', 'Planta::store');
 $routes->get('/plantas/edit/(:num)', 'Planta::edit/$1');
 $routes->post('/plantas/update/(:num)', 'Planta::update/$1');
 $routes->get('/plantas/delete/(:num)', 'Planta::delete/$1');

