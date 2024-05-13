<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/autenticacion/login', 'CAutenticacion::login');

$routes->get('/autenticacion/register', 'CAutenticacion::register');

