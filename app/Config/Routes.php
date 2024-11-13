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
$routes->get('mi-planta', 'CPlanta::miplanta');
$routes->get('como-funciona', 'Home::funcionamiento');
$routes->get('consejo-truco', 'Home::consejo');


$routes->post('recibir-medicion', 'CMedicion::recibirMedicion');
$routes->get('mediciones/(:num)', 'CMedicion::mostrarMediciones/$1'); //ruta nodemcu
$routes->get('historial-mediciones/(:num)', 'CMedicion::historialMediciones/$1'); //ruta vista

$routes->get('configuracion/(:num)', 'CConfiguracion::configuracion/$1'); //ruta nodemcu
$routes->get('configuracion_usuario/(:num)', 'CConfiguracion::configuracionvista/$1'); //ruta vista
$routes->post('guardarConfiguracion', 'CConfiguracion::guardarConfiguracion');


// Funcionamiento de crear planta
$routes->post('crearPlanta', 'CPlanta::crearPlanta');

// Funcionamiento de crear planta
$routes->get('/eliminar-planta/(:num)', 'CPlanta::eliminarPlanta/$1');
$routes->get('configuracion/(:num)', 'CConfiguracion::configuracion/$1');

// Vista del Login ,Register 
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

