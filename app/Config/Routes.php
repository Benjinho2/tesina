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
$routes->get('historial', 'CHistorial::historial');
$routes->get('consejo-truco', 'Home::consejo');


// Ruta para recibir mediciones (POST)
$routes->post('recibir-medicion', 'CMedicion::recibirMedicion');

// Ruta para mostrar mediciones específicas según el ID numérico (GET)
$routes->get('mediciones/(:num)', 'CMedicion::mostrarMediciones/$1');

// Ruta para obtener configuración de riego para un usuario específico
$routes->get('configuracion/(:num)', 'CConfiguracion::configuracion/$1');

// Ruta para guardar configuración de riego (POST)
$routes->post('guardarConfiguracion', 'CConfiguracion::guardarConfiguracion');



// Funcionamiento de crear planta
$routes->post('crearPlanta', 'CPlanta::crearPlanta');

// Funcionamiento de crear planta
$routes->get('/eliminar-planta/(:num)', 'CPlanta::eliminarPlanta/$1');
$routes->get('/visualizarDatos/(:num)', 'CLectura::visualizarDatos/$1');
$routes->get('configuracion/(:num)', 'CConfiguracion::configuracion/$1');
$routes->get('historial/(:num)', 'CHistorial::historial/$1');

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

