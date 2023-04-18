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
$routes->setDefaultController('Inicio');
$routes->setDefaultMethod('login');
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
$routes->get('/', 'Inicio::login');
$routes->post('validate_login', 'Inicio::validate_login');
$routes->get('generate_pdf', 'Inicio::generate_pdf');
$routes->get('inicio', 'Inicio::index');

$routes->get('cargar_info_view', 'CargarInformacion::index');
$routes->get('cargar_info_extra_view', 'CargarInformacion::carga_extra');
$routes->post('cargar-centro-educativo', 'CargarInformacion::cargar_centro_educativo');
$routes->get('subirExcel_view/(:num)', 'CargarInformacion::frm_subir_excel/$1');

$routes->get('prod_1', 'Prod1::index');
$routes->get('prod_1_edit/(:num)', 'Prod1::frm_edit/$1');
$routes->post('prod1_update', 'Prod1::update');

$routes->post('cargar-prod-1', 'CargarInformacion::cargar_prod_1');

$routes->post('cargar-nap2', 'CargarInformacion::cargar_nap2');
$routes->post('cargar-nap3', 'CargarInformacion::cargar_nap3');
$routes->post('cargar-nap4', 'CargarInformacion::cargar_nap4');


$routes->post('getExcelC1', 'CargarInformacion::getExcelC1');
$routes->post('getExcelC2', 'CargarInformacion::getExcelC2');
$routes->post('getExcelC3', 'CargarInformacion::getExcelC3');
$routes->post('getExcelC4', 'CargarInformacion::getExcelC4');

$routes->get('logout', 'Inicio::logout');


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
