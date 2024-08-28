<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Vistas generales de la página
$routes->get('/', 'Home::index');
$routes->get('perfil', 'Home::perfil');
$routes->get('contacto', 'Home::contacto');
$routes->get('sobrenosotros', 'Home::sobrenosotros');
$routes->get('configuracion', 'CConfiguracion::configuracion');
$routes->get('como-funciona', 'Home::funcionamiento');
$routes->get('consejo-truco', 'Home::consejo');

// Vista Login ,Register 
$routes->get('autenticacion/login', 'CAutenticacion::login');
$routes->get('autenticacion/register', 'CAutenticacion::register');

// Vista para Restablecer la contraseña
$routes->get('autenticacion/correo', 'CCorreo::index');
$routes->get('autenticacion/nueva-contrasena', 'CNuevacontrasena::index');

// Funcionamiento Login, Register y Sesión afuera
$routes->post('registrarse', 'CAutenticacion::registrarse');
$routes->post('iniciarSesion', 'CAutenticacion::iniciarSesion');
$routes->get('cerrarSesion', 'CAutenticacion::cerrarSesion');
    
// Funcionamiento Formulario de contacto
$routes->post('enviar', 'CContacto::enviar');

// Funcionamiento para el Restablecer
$routes->post('correo', 'CCorreo::correo');
$routes->post('actualizar', 'CNuevacontrasena::actualizar');

// Funcionamiento Guardar
$routes->post('guardar', 'CConfiguracion::guardar');

