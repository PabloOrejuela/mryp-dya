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

//Producto 1
$routes->get('prod_1', 'Prod1::index');
$routes->get('prod-1-create', 'Prod1::prod_1_create');
$routes->post('prod-1-new', 'Prod1::prod_1_new');
$routes->get('prod_1_process', 'Prod1::frm_procesos');
$routes->get('prod_1_edit/(:num)', 'Prod1::frm_edit/$1');
$routes->post('prod1_update', 'Prod1::update');
$routes->post('prod1-asistencia-update', 'Prod1::asistencia_update');
$routes->post('prod1-diagnostico-update', 'Prod1::diagnostico_update');
$routes->post('prod1-eval-update', 'Prod1::eval_final_update');
$routes->post('prod1-evalMate-update', 'Prod1::eval_mate_update');
$routes->post('prod1-evalMateFinal-update', 'Prod1::eval_mateFinal_update');
$routes->post('prod1-evalMateElem-update', 'Prod1::eval_mateElem_update');
$routes->post('prod1-evalMateFinalElem-update', 'Prod1::eval_mateFinalElem_update');
$routes->get('prod-1-reg-diagnostico/(:num)', 'Prod1::prod_1_reg_diagnostico/$1');
$routes->get('prod-1-reg-proceso/(:num)', 'Prod1::prod_1_reg_proceso/$1');
$routes->get('prod-1-reg-eval-final/(:num)', 'Prod1::prod_1_reg_eval_final/$1');
$routes->get('prod-1-form-tipo-eval-mate/(:num)', 'Prod1::prod_1_form_elije_eval_mate/$1');
$routes->get('prod-1-form-tipo-eval-mate-final/(:num)', 'Prod1::prod_1_form_elije_eval_mate_final/$1');
$routes->post('prod1-elije-evalMate', 'Prod1::prod1_elije_evalMate');
$routes->post('prod1-elije-evalMateFinal', 'Prod1::prod1_elije_evalMateFinal');

$routes->get('prod-1-reg-eval-mate', 'Prod1::prod_1_reg_eval_mate');
$routes->get('prod-1-reg-eval-mate-final/(:num)', 'Prod1::prod_1_reg_eval_mate_final/$1');
$routes->get('prod-1-delete/(:num)', 'Prod1::prod_1_delete/$1');

$routes->post('cargar-prod-1', 'CargarInformacion::cargar_prod_1');

//Producto 3
$routes->get('prod-3-create', 'Prod3::prod_3_create');
$routes->post('prod-3-new', 'Prod3::prod_3_new');
$routes->get('prod-3-delete/(:num)', 'Prod3::prod_3_delete/$1');
$routes->post('cargar-prod-3', 'CargarInformacion::cargar_prod_3');
$routes->get('prod_3', 'Prod3::index');
$routes->get('prod_3_process', 'Prod3::frm_procesos_prod_3');
$routes->get('prod_3_edit/(:num)', 'Prod3::frm_edit/$1');
$routes->post('prod3_update', 'Prod3::update');
$routes->get('prod-3-variables/(:num)', 'Prod3::prod_3_variables/$1');
$routes->post('prod3-process-update', 'Prod3::prod3_process_update');

//NAP
$routes->post('cargar-nap2', 'CargarInformacion::cargar_nap2');
$routes->post('cargar-nap3', 'CargarInformacion::cargar_nap3');
$routes->post('cargar-nap4', 'CargarInformacion::cargar_nap4');
$routes->post('cargar-nap5', 'CargarInformacion::cargar_nap5');
$routes->post('cargar-nap6', 'CargarInformacion::cargar_nap6');


$routes->post('getExcelC1', 'CargarInformacion::getExcelC1');
$routes->post('getExcelC2', 'CargarInformacion::getExcelC2');
$routes->post('getExcelC3', 'CargarInformacion::getExcelC3');
$routes->post('getExcelC4', 'CargarInformacion::getExcelC4');

$routes->get('logout', 'Inicio::logout');

//REPORTES
$routes->get('reportes-view', 'Reportes::index');
$routes->get('reportes-p1', 'Reportes::reportes_prod_1');
$routes->post('recibe-asistencia-tab', 'Reportes::recibe_asistencia_tab');
$routes->post('recibe-diagnostico-tab', 'Reportes::recibe_diagnostico_tab');

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
