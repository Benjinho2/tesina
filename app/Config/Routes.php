<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('perfil', 'CPerfil::perfil');
$routes->get('contacto', 'Home::contacto');
$routes->get('sobrenosotros', 'Home::sobrenosotros');
// Vista Login y Register
$routes->get('autenticacion/login', 'CAutenticacion::login');
$routes->get('autenticacion/register', 'CAutenticacion::register');

// Funcionamiento Login, Register y Sesión afuera
$routes->post('registrarse', 'CAutenticacion::registrarse');
$routes->post('iniciarSesion', 'CAutenticacion::iniciarSesion');
$routes->get('cerrarSesion', 'CAutenticacion::cerrarSesion');