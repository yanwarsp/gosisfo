<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');
$routes->get('/register', 'Home::register');
$routes->get('/user/admin/(:any)', 'User::admin/$1');
$routes->get('/user/dosen/(:any)', 'User::dosen/$1');
$routes->get('/user/staff/(:any)', 'User::staff/$1');
$routes->get('/user/profile/dosen/(:any)', 'User::dosen_profile/$1');
$routes->get('/user/profile/staff/(:any)', 'User::staff_profile/$1');
$routes->get('/user/list_dosen', 'User::listDosen');
$routes->get('/user/list_staff', 'User::listStaff');
$routes->get('/user/delete_admin/(:num)', 'User::deleteAdmin/$1');
$routes->get('/user/delete_dosen/(:num)', 'User::deleteDosen/$1');
$routes->get('/user/delete_staff/(:num)', 'User::deleteStaff/$1');


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
