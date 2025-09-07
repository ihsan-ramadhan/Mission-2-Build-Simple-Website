<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dosen', 'Dosen::helloDosen');
$routes->get('/tabel-mhs', 'Mahasiswa::display');