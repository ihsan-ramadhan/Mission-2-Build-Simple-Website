<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/belajar-routes', 'Home::belajarRoutes');
$routes->get('/tes-db', 'Home::tesDb'); 
$routes->get('/tabel-html', 'MahasiswaController::tabelHtml');
$routes->get('/tabel-loop', 'MahasiswaController::tabelLoop');
$routes->get('/helloworld', 'Latihan4aController::helloWorld');