<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/tabel-mhs', 'Mahasiswa::display');
$routes->get('/tabel-mhs/detail/(:any)', 'Mahasiswa::detail/$1');