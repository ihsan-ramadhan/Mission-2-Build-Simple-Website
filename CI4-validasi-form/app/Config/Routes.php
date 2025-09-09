<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/tabel-mhs', 'Mahasiswa::index');
$routes->get('/tabel-mhs/detail/(:segment)', 'Mahasiswa::detail/$1');
$routes->get('/tabel-mhs/add', 'Mahasiswa::create');
$routes->post('/tabel-mhs/store', 'Mahasiswa::store');
$routes->get('/tabel-mhs/edit/(:segment)', 'Mahasiswa::edit/$1');
$routes->post('/tabel-mhs/update/(:segment)', 'Mahasiswa::update/$1');
$routes->get('/tabel-mhs/delete/(:segment)', 'Mahasiswa::delete/$1');