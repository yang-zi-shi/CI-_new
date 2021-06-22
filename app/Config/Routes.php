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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/ts', 'News::ts');
$routes->post('/ts1', 'News::toLogin1');
$routes->get('/', 'Home::index');
$routes->get('/query', 'Home::query');
$routes->get('/insert', 'Home::insert');
$routes->get('/querytool', 'Home::querytool');
$routes->get('/userdata/(:num)', 'Home::userdata/$1');
$routes->get('/seedtest', 'Home::seedtest');
$routes->get('/testdb', 'Home::testdb');
$routes->get('/addtable', 'Home::addtable');
$routes->get('/Form', 'Form::index');
//News
$routes->get('/news', 'News::index');
// $routes->get('news/(:segment)', 'News::view/$1');
$routes->match(['get', 'post'], 'news/create', 'News::create');
$routes->get('/news/testcreate', 'News::testcreate');
//register
$routes->post('/register', 'Home::register');
$routes->match(['get', 'post'], '/regi', 'Home::regi');
//login
$routes->post('/logi', 'Home::login');
// $routes->match(['get', 'post'], '/log', 'Home::log');
//logout
$routes->get('/logout', 'Home::logout');
// $routes->match(['get', 'post'], '/logout', 'Home::logout');
//contact
$routes->post('/contact', 'Home::contact');
$routes->get('/cont', 'Home::cont');
// $routes->match(['get', 'post'], '/cont', 'Home::cont');
//test
// $routes->get('/tespas', 'Home::tespas');
// $routes->get('/tesSetion', 'Home::tesSetion');
// $routes->get('/tesSetion1', 'Home::tesSetion1');
//FB
$routes->post('/fblogin', 'Home::login');
// $routes->match(['get', 'post'], '/fblogin', 'FB::login');
$routes->get('/shop', 'Home::shop');
// $routes->match(['get', 'post'], '/shop', 'Home::shop');
$routes->get('/tsshop', 'Home::tsshop');
// $routes->match(['get', 'post'], '/tsshop', 'Home::tsshop');
$routes->get('/buycar', 'Home::buycar');
// $routes->match(['get', 'post'], '/buycar', 'Home::buycar');
$routes->get('/shoplist', 'Home::shoplist');
// $routes->match(['get', 'post'], '/shoplist', 'Home::shoplist');
$routes->get('/clr', 'Home::clr');
$routes->get('/cal', 'Home::cal');
$routes->get('/buycarall', 'Home::buycarall');
$routes->get('/order', 'Home::order');
// $routes->match(['get', 'post'], '/fbcallback', 'FB::callback');
/**
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
