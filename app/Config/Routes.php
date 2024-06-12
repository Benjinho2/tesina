<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Vistas pantalla incio
$routes->get('/', 'Home::index');
$routes->get('perfil', 'Home::perfil');
$routes->get('contacto', 'Home::contacto');
$routes->get('sobrenosotros', 'Home::sobrenosotros');
$routes->get('configuracion', 'Home::configuracion');
$routes->get('como-funciona', 'Home::funcionamiento');
$routes->get('consejo-truco', 'Home::consejo');

// Vista Login y Register
$routes->get('autenticacion/login', 'CAutenticacion::login', ['filter' => 'autenticacion']);
$routes->get('autenticacion/register', 'CAutenticacion::register', ['filter' => 'autenticacion']);


// Funcionamiento Login, Register y Sesión afuera
$routes->post('registrarse', 'CAutenticacion::registrarse');
$routes->post('iniciarSesion', 'CAutenticacion::iniciarSesion');
$routes->get('cerrarSesion', 'CAutenticacion::cerrarSesion');

//Funcionamiento Formulario de contacto
$routes->post('enviar', 'CContacto::enviar');