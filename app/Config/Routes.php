<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('perfil', 'CPerfil::perfil');

// Vista Login y Register
$routes->get('autenticacion/login', 'CAutenticacion::login');
$routes->get('autenticacion/register', 'CAutenticacion::register');

// Funcionamiento Login, Register y Sesión afuera
$routes->post('autenticacion/registro', 'CAutenticacion::registro');
$routes->post('autenticacion/logueo', 'CAutenticacion::logueo');
$routes->get('cerrarSesion', 'CAutenticacion::cerrarSesion');
