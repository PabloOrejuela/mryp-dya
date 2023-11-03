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
$routes->setAutoRoute(false);

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
$routes->post('reportes/ciudades_select', 'Reportes::ciudades_select');
$routes->post('reportes/centros_ciudades_select', 'Reportes::centros_ciudades_select');
$routes->get('sessions-close/(:num)', 'Inicio::cerrar_sesiones/$1');
$routes->get('corrije-regimen', 'Inicio::corrije_regimen_centro');

$routes->get('cargar_info_view', 'CargarInformacion::index');
$routes->get('cargar_info_extra_view', 'CargarInformacion::carga_extra');
$routes->post('cargar-centro-educativo', 'CargarInformacion::cargar_centro_educativo');
$routes->get('subirExcel_view/(:num)', 'CargarInformacion::frm_subir_excel/$1');
$routes->get('logout', 'Inicio::logout');

//Administración
$routes->get('form-nuevo-anio', 'Inicio::form_nuevo_anio');
$routes->post('anio-lectivo-insert', 'Inicio::anio_lectivo_insert');
$routes->get('form-nueva-cohorte', 'Inicio::form_nueva_cohorte');
$routes->post('cohorte-insert', 'Inicio::cohorte_insert');

//Producto 1
$routes->get('prod_1', 'Prod1::index');
$routes->get('prod-1-create', 'Prod1::prod_1_create');
$routes->post('prod-1-new', 'Prod1::prod_1_new');
$routes->get('prod_1_process', 'Prod1::frm_procesos');
$routes->get('prod_1_edit/(:num)', 'Prod1::frm_edit/$1');
$routes->post('prod1_update', 'Prod1::update');
$routes->post('prod1-asistencia-centro-update', 'Prod1::prod1_asistencia_centro_update');
$routes->get('prod-1-asistencia', 'Prod1::prod_1_asistencia');
$routes->post('prod-1-asistencia', 'Prod1::prod_1_asistencia');
$routes->post('prod-1-asistencia-form', 'Prod1::prod_1_asistencia_form');
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
$routes->get('prod-1-descargar-registros', 'Prod1::prod_1_descargar_registros');

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
$routes->get('prod-3-arte/(:num)', 'Prod3::prod_3_arte/$1');
$routes->get('prod-3-lenguaje/(:num)', 'Prod3::prod_3_lenguaje/$1');
$routes->get('prod-3-ciudadania/(:num)', 'Prod3::prod_3_ciudadania/$1');
$routes->get('prod-3-otros/(:num)', 'Prod3::prod_3_otros/$1');
$routes->post('prod3-otros-update', 'Prod3::prod3_otros_update');
$routes->post('prod3-arte-update', 'Prod3::prod3_arte_update');
$routes->post('prod3-lengua-update', 'Prod3::prod3_lengua_update');
$routes->post('prod3-ciudad-update', 'Prod3::prod3_ciudad_update');
$routes->get('prod-3-otros-procesos', 'Prod3::prod_3_otros_procesos');
$routes->get('prod3-form-biblioteca/(:any)', 'Prod3::prod3_form_biblioteca/$1');
$routes->post('prod3-biblioteca-update', 'Prod3::prod3_biblioteca_update');
$routes->get('prod-3-descargar-registros', 'Prod3::prod_3_descargar_registros');

//Reportes Prod 3
$routes->get('prod3-reporte-certificados', 'ReportesProd3::prod3_reporte_certificados');

//NAP
$routes->post('cargar-nap2', 'CargarInformacion::cargar_nap2');
$routes->post('cargar-nap3', 'CargarInformacion::cargar_nap3');
$routes->post('cargar-nap4', 'CargarInformacion::cargar_nap4');
$routes->post('cargar-nap5', 'CargarInformacion::cargar_nap5');
$routes->post('cargar-nap6', 'CargarInformacion::cargar_nap6');
$routes->post('cargar-nap7', 'CargarInformacion::cargar_nap7');

$routes->get('corrije_cedulas', 'Prod2::corrijeCedulas');

//NAP2
$routes->get('prod-2-menu', 'Prod2::index');
$routes->get('prod2-nap2-menu', 'Prod2::nap2_procesos_grid');
$routes->get('prod2-nap2-frm-edit/(:num)', 'Prod2::prod2_nap2_frm_edit/$1');
$routes->get('nap2-reg-procesos-form/(:num)', 'Prod2::nap2_reg_procesos_form/$1');
$routes->post('nap2-process-update', 'Prod2::nap2_process_update');
$routes->post('prod2-nap2-update', 'Prod2::prod2_nap2_update');

//NAP3
$routes->get('prod2-nap3-menu', 'Prod2::nap3_procesos_grid');
$routes->post('prod3_update', 'Prod3::update');
$routes->get('nap3-reg-procesos-form/(:num)', 'Prod2::nap3_reg_procesos_form/$1');
$routes->post('nap3-process-update', 'Prod2::nap3_process_update');

//NAP4
$routes->get('prod2-nap4-menu', 'Prod2::nap4_procesos_grid');
$routes->get('nap4-reg-procesos-form/(:num)', 'Prod2::nap4_reg_procesos_form/$1');
$routes->post('nap4-process-update', 'Prod2::nap4_process_update');
$routes->get('prod2-nap4-frm-edit/(:num)', 'Prod2::prod2_nap4_frm_edit/$1');
$routes->post('prod2-nap4-update', 'Prod2::prod2_nap4_update');

//NAP5
$routes->get('prod2-nap5-menu', 'Prod2::nap5_procesos_grid');
$routes->get('nap5-reg-procesos-form/(:num)/(:any)', 'Prod2::nap5_reg_procesos_form/$1/$2');
$routes->post('nap5-process-update', 'Prod2::nap5_process_update');
$routes->post('nap5-process-sierra-update', 'Prod2::nap5_process_sierra_update');

//NAP6
$routes->get('prod2-nap6-menu', 'Prod2::nap6_procesos_grid');
$routes->get('nap6-reg-procesos-form/(:num)', 'Prod2::nap6_reg_procesos_form/$1');
$routes->post('nap6-process-update', 'Prod2::nap6_process_update');
$routes->get('prod2-nap6-frm-edit/(:num)', 'Prod2::prod2_nap6_frm_edit/$1');
$routes->post('prod2-nap6-update', 'Prod2::prod2_nap6_update');
$routes->get('prod2-nap6-delete/(:num)', 'Prod2::prod2_nap6_delete/$1');

//NAP7
$routes->get('prod2-nap7-menu', 'Prod2::nap7_procesos_grid');
$routes->get('nap7-reg-procesos-form/(:num)/(:any)', 'Prod2::nap7_reg_procesos_form/$1/$2');
$routes->post('nap7-process-update', 'Prod2::nap7_process_update');
$routes->post('nap7-process-sierra-update', 'Prod2::nap7_process_sierra_update');

//PRODUCTO 4
$routes->get('prod-4-create', 'Prod4::prod_4_create');
$routes->post('prod-4-new', 'Prod4::prod_4_new');
$routes->post('cargar-prod-4', 'CargarInformacion::cargar_prod_4');
$routes->get('prod_4', 'Prod4::index');
$routes->get('prod_4_edit/(:num)', 'Prod4::frm_edit/$1');
$routes->post('prod4_update', 'Prod4::update');
$routes->get('prod4_process', 'Prod4::frm_procesos');
$routes->get('prod4-reg-lengua/(:num)', 'Prod4::prod4_reg_lengua/$1');
$routes->post('prod4-lengua-update', 'Prod4::prod4_lengua_update');
$routes->get('prod4-reg-mate/(:num)', 'Prod4::prod4_reg_mate/$1');
$routes->post('prod4-mate-update', 'Prod4::prod4_mate_update');
$routes->get('prod4-reg-psico/(:num)', 'Prod4::prod4_reg_psico/$1');
$routes->post('prod4-psico-update', 'Prod4::prod4_psico_update');
$routes->get('prod4-reg-pedagogica/(:num)', 'Prod4::prod4_reg_pedagogica/$1');
$routes->post('prod4-pedagogica-update', 'Prod4::prod4_pedagogica_update');
$routes->get('prod4-reg-otros/(:num)', 'Prod4::prod4_reg_otros/$1');
$routes->post('prod4-otros-update', 'Prod4::prod4_otros_update');
$routes->get('prod4-reg-atenciones/(:num)', 'Prod4::prod4_reg_atenciones/$1');
$routes->post('prod4-atenciones-update', 'Prod4::prod4_atenciones_update');
$routes->get('prod4-reg-resultados/(:num)', 'Prod4::prod4_reg_resultados/$1');
$routes->post('prod4-resultados-update', 'Prod4::prod4_resultados_update');
$routes->get('prod4-reportes-form', 'ReportesProd4::prod4_reportes_form');
$routes->post('prod4-reporte', 'ReportesProd4::prod4_reporte');
$routes->get('prod4-descargar-registros', 'Prod4::prod4_descargar_registros');


//REPORTES ESTÁTICOS
$routes->get('reportes-view', 'Reportes::index');
$routes->get('reportes-p1', 'Reportes::reporte_asistencia_p1');
$routes->get('reporte-asistencia-p1', 'Reportes::reporte_asistencia_p1');
$routes->post('recibe-asistencia-tab', 'Reportes::recibe_asistencia_tab');
$routes->get('reporte-diagnostico-p1', 'Reportes::reporte_diagnostico_p1');
$routes->post('recibe-diagnostico-tab', 'Reportes::recibe_diagnostico_tab');
$routes->get('reporte-despistaje-mat-p1', 'Reportes::reporte_despistaje_mat_p1');
$routes->post('recibe-despistaje-mat-tab', 'Reportes::recibe_despistaje_mat_tab');
$routes->get('reporte-analisis-pruebafinal-p1', 'Reportes::reporte_analisis_pruebafinal_p1');
$routes->post('recibe-eval-prueba-final-tab', 'Reportes::recibe_eval_prueba_final_tab');
$routes->get('reporte-analisis-pruebadiagnostico-p1', 'Reportes::reporte_analisis_pruebadiagnostico_p1');
$routes->post('recibe-eval-prueba-diagnostico-tab', 'Reportes::recibe_eval_prueba_diagnostico_tab');
$routes->get('reporte-destrezas-p1', 'Reportes::reporte_destrezas_p1');
$routes->post('recibe-reporte-destrezas-p1-tab', 'Reportes::recibe_reporte_destrezas_p1_tab');

//REPORTES DIMANICOS
$routes->get('reporte-diagnostico-dinamico-form', 'Reportes::reporte_diagnostico_dinamico_form');
$routes->post('reporte-diagnostico-dinamico', 'Reportes::reporte_diagnostico_dinamico');
$routes->get('reporte-final-dinamico-form', 'Reportes::reporte_final_dinamico_form');
$routes->post('reporte-final-dinamico', 'Reportes::reporte_final_dinamico');


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
