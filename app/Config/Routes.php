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

// Vista Login ,Register y Reseteo de contraseña
$routes->get('autenticacion/login', 'CAutenticacion::login', ['filter' => 'autenticacion']);
$routes->get('autenticacion/register', 'CAutenticacion::register', ['filter' => 'autenticacion']);
$routes->get('autenticacion/correo', 'CCorreo::index');
$routes->get('autenticacion/nueva-contrasena', 'CNuevacontrasena::index');
$routes->get('autenticacion/info', 'CCorreo::info');

// Funcionamiento Login, Register y Sesión afuera
$routes->post('registrarse', 'CAutenticacion::registrarse');
$routes->post('iniciarSesion', 'CAutenticacion::iniciarSesion');
$routes->post('correo', 'CCorreo::correo');
$routes->post('actualizar', 'CNuevacontrasena::actualizar');
$routes->get('cerrarSesion', 'CAutenticacion::cerrarSesion');
    
//Funcionamiento Formulario de contacto
$routes->post('enviar', 'CContacto::enviar');

//Funcionamiento Guardar
$routes->post('guardar', 'CConfiguracion::guardar');

