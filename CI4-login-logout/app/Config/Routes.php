<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->post('/login', 'Login::attempt');
$routes->get('/home', 'Home::index');
$routes->get('/logout', 'Login::logout');