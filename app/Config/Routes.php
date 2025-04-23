<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/connect', 'Login::connect');
$routes->get('/login', 'Login::index');
$routes->get('/logout', 'Logout::index');
$routes->post('/login/auth', 'Login::auth');


$routes->get('/register', 'Register::index');
$routes->post('/register/create', 'Register::create');

$routes->get('/userlist', 'UserController::index');

$routes->get('/account', 'Client::update');
$routes->post('/account/updateData', 'Client::updateData');
$routes->post('/account/updatePassword', 'Client::updatePassword');






