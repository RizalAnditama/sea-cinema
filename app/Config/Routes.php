<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('test', 'MovieController::test');
$routes->add('seat', 'MovieController::seat', ['filter' => 'auth']);
$routes->post('seat/(:any)', 'MovieController::seat/$1', ['filter' => 'auth']);
$routes->post('book/(:any)', 'MovieController::book/$1', ['filter' => 'auth']);
$routes->get('receipt', 'MovieController::receipt', ['filter' => 'auth']);
$routes->post('pay', 'MovieController::pay', ['filter' => 'auth']);

$routes->get('/', 'HomeController::index');
$routes->add('explore', 'HomeController::explore');
$routes->get('/explore/(:any)', 'HomeController::explore/$1');

$routes->add('register', 'UserController::register', ['filter' => 'noauth']);
$routes->add('login', 'UserController::login', ['filter' => 'noauth']);
$routes->post('logout', 'UserController::logout', ['filter' => 'auth']);
$routes->get('account', 'UserController::account', ['filter' => 'auth']);

$routes->post('topup', 'UserController::topup', ['filter' => 'auth']);
$routes->post('withdraw', 'UserController::withdraw', ['filter' => 'auth']);
$routes->post('cancel/(:any)', 'MovieController::cancel/$1', ['filter' => 'auth']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
