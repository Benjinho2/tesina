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

// Funcionamiento Login y Register
$routes->post('autenticacion/registro', 'CAutenticacion::registro');
$routes->post('autenticacion/logueo', 'CAutenticacion::logueo');
$routes->get('loggedOut', 'CAutenticacion::loggedOut');

// Admin
$routes->get('admin/index', 'CAdmin::index');
// $routes->post('admin/crearAdmin', 'CAdmin::crearAdmin');
// $routes->get('admin/nuevoadmin', 'CAdmin::nuevoAdmin');