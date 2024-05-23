<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Vista Login y Register
$routes->get('/autenticacion/login', 'CAutenticacion::login');
$routes->get('/autenticacion/register', 'CAutenticacion::register');

// Funcionamiento 
$routes->post('/autenticacion/registro', 'CAutenticacion::registro');

$routes->post('/autenticacion/logueo', 'CAutenticacion::logueo');
$routes->get('/CAutenticacion/loggedOut', 'CAutenticacion::loggedOut');
