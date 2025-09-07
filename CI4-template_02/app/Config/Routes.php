<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/data_mahasiswa', 'DataMahasiswa::index');
$routes->get('/data_mahasiswa/detail/(:any)', 'DataMahasiswa::detail/$1');