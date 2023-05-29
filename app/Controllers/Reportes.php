<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Reportes extends BaseController {

    public function index(){
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['reportes'] = $this->session->reportes;

        if ($data['is_logged'] == 1 && $data['reportes'] == 1) {

            $data['componentes'] = array('1','2','3','4','5');

            $data['title']='MYRP - DYA';
            $data['main_content']='reportes/selecciona_componente';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }   
    }

    public function reporte_asistencia_p1() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;
        $data['reportes'] = $this->session->reportes;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1 && $data['reportes'] == 1) {

            $data['centros'] = $this->prod1Model->_getMisAmie($data['nombre']);
            $data['cursos'] = $this->cursoModel->findAll();
            $data['nacionalidades'] = $this->prod1Model->_getNacionalidades();
            $data['genero'] = $this->prod1Model->_getGeneros();

            $data['centro'] = '';
            $data['amie'] = '';
            $data['cohorte'] = '';
            $data['dias_atencion'] = 0;
            $data['horas_planificadas'] = 0;
            $data['horas_efectivas'] = 0;
            $data['horas_perdidas'] = 0;
            //Evito el error de que llegue vacío el objeto
            $data['chart_data'] = '';
            //echo '<pre>'.var_export($data['genero'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='reportes/prod1_reportes_view';
            return view('includes/template_reportes', $data);
        }else{

            $this->logout();
        }
    }

    public function reporte_analisis_pruebafinal_p1() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;
        $data['reportes'] = $this->session->reportes;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1 && $data['reportes'] == 1) {

            $data['centros'] = $this->prod1Model->_getMisAmie($data['nombre']);
            $data['cursos'] = $this->cursoModel->findAll();
            $data['nacionalidades'] = $this->prod1Model->_getNacionalidades();
            $data['genero'] = $this->prod1Model->_getGeneros();

            $data['centro'] = '';
            $data['amie'] = '';
            $data['cohorte'] = '';
            $data['etiquetas'] = '';
            $data['etiquetas_1'] = '';
            $data['etiquetas_2'] = '';
            $data['registros'] = NULL;

            //Evito el error de que llegue vacío el objeto
            $data['chart_data'] = '';
            $data['chart_data_1'] = '';
            $data['chart_data_2'] = '';
            //echo '<pre>'.var_export($data['genero'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='reportes/prod1_reportes_analisis_prueba_final_view';
            return view('includes/template_reportes', $data);
        }else{

            $this->logout();
        }
    }

    public function reporte_analisis_pruebadiagnostico_p1() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;
        $data['reportes'] = $this->session->reportes;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1 && $data['reportes'] == 1) {

            $data['centros'] = $this->prod1Model->_getMisAmie($data['nombre']);
            $data['cursos'] = $this->cursoModel->findAll();
            $data['nacionalidades'] = $this->prod1Model->_getNacionalidades();
            $data['genero'] = $this->prod1Model->_getGeneros();

            $data['centro'] = '';
            $data['amie'] = '';
            $data['cohorte'] = '';
            $data['etiquetas'] = '';
            $data['etiquetas_1'] = '';
            $data['etiquetas_2'] = '';
            $data['num'] = 0;
            $data['registros'] = NULL;

            //Evito el error de que llegue vacío el objeto
            $data['chart_data'] = '';
            //echo '<pre>'.var_export($data['genero'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='reportes/prod1_reportes_analisis_prueba_diagnostico_view';
            return view('includes/template_reportes', $data);
        }else{

            $this->logout();
        }
    }

    public function reporte_diagnostico_p1() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;
        $data['reportes'] = $this->session->reportes;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1 && $data['reportes'] == 1) {

            $data['centros'] = $this->prod1Model->_getMisAmie($data['nombre']);
            $data['cursos'] = $this->cursoModel->findAll();
            $data['nacionalidades'] = $this->prod1Model->_getNacionalidades();
            $data['genero'] = $this->prod1Model->_getGeneros();

            $data['centro'] = '';
            $data['amie'] = '';
            $data['cohorte'] = '';
            $data['dias_atencion'] = 0;
            $data['diagnostico'] = 0;
            $data['horas_planificadas'] = 0;
            $data['horas_efectivas'] = 0;
            $data['horas_perdidas'] = 0;
            //Evito el error de que llegue vacío el objeto
            $data['chart_data'] = '';
            $data['chart_data_1'] = '';
            //echo '<pre>'.var_export($data['genero'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='reportes/prod1_reportes_diagnostico_view';
            return view('includes/template_reportes', $data);
        }else{

            $this->logout();
        }
    }

    public function reporte_destrezas_p1() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;
        $data['reportes'] = $this->session->reportes;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1 && $data['reportes'] == 1) {

            $data['centros'] = $this->prod1Model->_getMisAmie($data['nombre']);
            $data['cursos'] = $this->cursoModel->findAll();
            $data['nacionalidades'] = $this->prod1Model->_getNacionalidades();
            $data['genero'] = $this->prod1Model->_getGeneros();

            $data['centro'] = '';
            $data['amie'] = '';
            $data['cohorte'] = '';
            $data['reporte'] = '';

            //Evito el error de que llegue vacío el objeto
            $data['chart_data'] = '';
            //echo '<pre>'.var_export($data['genero'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='reportes/prod1_reportes_destrezas_view';
            return view('includes/template_reportes', $data);
        }else{

            $this->logout();
        }
    }

    public function reporte_despistaje_mat_p1() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;
        $data['reportes'] = $this->session->reportes;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1 && $data['reportes'] == 1) {

            $data['centros'] = $this->prod1Model->_getMisAmie($data['nombre']);
            $data['cursos'] = $this->cursoModel->findAll();
            $data['nacionalidades'] = $this->prod1Model->_getNacionalidades();
            $data['genero'] = $this->prod1Model->_getGeneros();

            $data['centro'] = '';
            $data['amie'] = '';
            $data['cohorte'] = '';
            $data['tipo_prueba'] = '';
            $data['dias_atencion'] = 0;
            $data['horas_planificadas'] = 0;
            $data['horas_efectivas'] = 0;
            $data['horas_perdidas'] = 0;
            //Evito el error de que llegue vacío el objeto
            $data['chart_data'] = '';
            

            $data['title']='MYRP - DYA';
            $data['main_content']='reportes/prod1_reportes_despistaje_mat_view';
            return view('includes/template_reportes', $data);
        }else{

            $this->logout();
        }
    }

    public function recibe_asistencia_tab() {

        if ($this->request->getPostGet('amie') == NULL) {
            return redirect()->to('reportes-p1');
        }

        $data['amie'] = $this->request->getPostGet('amie');
        $data['cohorte'] = $this->request->getPostGet('cohorte');

        $data['centro'] = $this->centroEducativoModel->find($data['amie']);

        $data['asistencia'] = $this->asistenciaP1->_getAsistencia($data['amie'], $data['cohorte']);

        //echo '<pre>'.var_export($data['centro'], true).'</pre>';exit;
        $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
        $data['cursos'] = $this->cursoModel->findAll();
        $data['nacionalidades'] = $this->prod1Model->_getNacionalidades();
        $data['genero'] = $this->prod1Model->_getGeneros();
        //Evito el error de que llegue vacío el objeto
        $data['chart_data'] = '';
        //echo '<pre>'.var_export($data['chart_data'], true).'</pre>';exit;

        $data['title']='MYRP - DYA';
        $data['main_content']='reportes/prod1_reportes_view';
        return view('includes/template_reportes', $data);
        
    }

    public function recibe_eval_prueba_final_tab() {

        if ($this->request->getPostGet('amie') == NULL ||  $this->request->getPostGet('cohorte') == 'NULL') {
            $data['centro'] = '';
            $data['amie'] = '';
            $data['cohorte'] = '';
            $data['etiquetas'] = '';
            $data['registros'] = NULL;
            return redirect()->to('reporte-analisis-pruebafinal-p1');
        }

        $data['amie'] = $this->request->getPostGet('amie');
        $data['cohorte'] = $this->request->getPostGet('cohorte');
        $data['centro'] = $this->centroEducativoModel->find($data['amie']);

        $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
        $data['registros'] = $this->prod1Model->_getRegistros($data['amie'], $data['cohorte'], $this->session->nombre);
        //echo '<pre>'.var_export($this->session->nombre, true).'</pre>';exit;
        if ($data['registros'] != NULL) {
            $total = count($data['registros'])*3;
        }else{
            $total = 0;
        }
        

        //Destrezas muy por debajo de lo esperado
        $etiquetas = ["L", "M", "Mi"];
        $datosGrafica[0] = 10;
        $datosGrafica[1] = 20;
        $datosGrafica[2] = 30;
        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datosGrafica,
            "total" => $total,
        ];
        $data['chart_data'] = json_encode($respuesta);
        //echo '<pre>'.var_export($data['registros'], true).'</pre>';exit;

        //Destrezas en proceso
        $etiquetas_1 = ["L", "M", "Mi"];
        $datosGrafica_1[0] = 13;
        $datosGrafica_1[1] = 24;
        $datosGrafica_1[2] = 31;
        $respuesta_1 = [
            "etiquetas" => $etiquetas_1,
            "datos" => $datosGrafica_1,
            "total" => $total,
        ];
        $data['chart_data_1'] = json_encode($respuesta_1);
        
        //Destrezas adecuadas
        $etiquetas_2 = ["L", "M", "Mi"];
        $datosGrafica_2[0] = 12;
        $datosGrafica_2[1] = 29;
        $datosGrafica_2[2] = 45;
        $respuesta_2 = [
            "etiquetas" => $etiquetas_2,
            "datos" => $datosGrafica_2,
            "total" => $total,
        ];
        $data['chart_data_2'] = json_encode($respuesta_2);
        

        $data['title']='MYRP - DYA';
        $data['main_content']='reportes/prod1_reportes_analisis_prueba_final_view';
        return view('includes/template_reportes', $data);
        
    }

    public function recibe_eval_prueba_diagnostico_tab() {

        if ($this->request->getPostGet('amie') == 'NULL' ||  $this->request->getPostGet('cohorte') == 'NULL') {

            $data['centro'] = '';
            $data['amie'] = '';
            $data['cohorte'] = '';
            $data['registros'] = NULL;
            $data['chart_data'] = '';
            $data['chart_data_1'] = '';
            $data['etiquetas'] = '';
            $data['etiquetas_1'] = '';
            $data['etiquetas_2'] = '';
            $data['num'] = 0;
            return redirect()->to('reporte-analisis-pruebadiagnostico-p1');
        }

        $data['amie'] = $this->request->getPostGet('amie');
        $data['cohorte'] = $this->request->getPostGet('cohorte');
        $data['centro'] = $this->centroEducativoModel->find($data['amie']);
        
        $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
        $data['registros'] = $this->prod1Model->_getRegistros($data['amie'], $data['cohorte'], $this->session->nombre);

        //Evito el error de que llegue vacío el objeto
        $data['chart_data'] = '';
        $data['chart_data_1'] = '';
        $data['etiquetas'] = '';
        $data['etiquetas_1'] = '';
        $data['etiquetas_2'] = '';
        $data['num'] = 0;
        //echo '<pre>'.var_export($data['registros'], true).'</pre>';exit;

        $data['title']='MYRP - DYA';
        $data['main_content']='reportes/prod1_reportes_analisis_prueba_diagnostico_view';
        return view('includes/template_reportes', $data);
        
    }
    
    public function recibe_diagnostico_tab() {
        
        // Ahora las imprimimos como JSON para pasarlas a AJAX, pero las agrupamos
        if (
                $this->request->getPostGet('amie') == NULL ||  
                $this->request->getPostGet('amie') == 'NULL' || 
                $this->request->getPostGet('cohorte')  == 'NULL'
        ) {
            return redirect()->to('reporte-diagnostico-p1');
        }else{
            $data['amie'] = $this->request->getPostGet('amie');
            $data['cohorte'] = $this->request->getPostGet('cohorte');
            $data['tipo_grafico'] = $this->request->getPostGet('tipo_grafico');
        
            $data['centro'] = $this->centroEducativoModel->find($data['amie']);
            $data['dias_atencion'] = 0;
            $data['horas_planificadas'] = 0;
            $data['horas_efectivas'] = 0;
            $data['horas_perdidas'] = 0;
            $data['horas_perdidas'] = 0;
            $data['etiquetas'] = '';
            $data['etiquetas_1'] = '';
            $data['etiquetas_2'] = '';
            $data['chart_data'] = '';
            $data['chart_data_1'] = '';
            $data['registros'] = $this->prod1Model->_getRegistrosAmieCohorte($data['amie'], $data['cohorte'], $this->session->nombre);
    

            //echo '<pre>'.var_export($data['lectura'], true).'</pre>';exit;
            $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
            
            $data['title']='MYRP - DYA';
            $data['main_content']='reportes/prod1_reportes_diagnostico_view';
            return view('includes/template_reportes', $data);
        }
 
        
    }

    public function recibe_reporte_destrezas_p1_tab() {
        
        // Ahora las imprimimos como JSON para pasarlas a AJAX, pero las agrupamos
        if (
                $this->request->getPostGet('amie') == NULL ||  
                $this->request->getPostGet('reporte') == 'NULL' || 
                $this->request->getPostGet('cohorte')  == 'NULL'
        ) {
            return redirect()->to('reporte-destrezas-p1');
        }else{
            $data['amie'] = $this->request->getPostGet('amie');
            $data['cohorte'] = $this->request->getPostGet('cohorte');
            $data['reporte'] = $this->request->getPostGet('reporte');
            $data['tipo_grafico'] = $this->request->getPostGet('tipo_grafico');
        
            $data['centro'] = $this->centroEducativoModel->find($data['amie']);
            $data['registros'] = $this->prod1Model->_getRegistrosAmieCohorte($data['amie'], $data['cohorte'], $this->session->nombre);
            
            if ($data['reporte'] != NULL && $data['reporte'] == '1') {
                
                //Traigo la información de 
                
                $data['lectura'] = $this->evalFinalP1->_getDiagDocenteLectura($data['registros']);
                $data['escritura'] = $this->evalFinalP1->_getDiagDocenteEscritura($data['registros']);
                $data['matematica'] = $this->evalMateFinalP1->_getDiagDocenteMate($data['registros']);
    
                echo '<pre>'.var_export($data['escritura'], true).'</pre>';exit;
                $total = count($data['registros'])*3;

                //Para poder mostrar los que no tienen info hayq ue hacer pasteles por separado
                $sin_dato = 100 - $data['lectura'] - $data['matematica'] - $data['escritura'];
                $datosVentas[0] = $data['lectura'];
                $datosVentas[1] = $data['escritura'];
                $datosVentas[2] = $data['matematica'];
                $datosVentas[3] = number_format($sin_dato, 2);

                $etiquetas = ["Lectura", "Escritura", "Matemática", "Sin datos"];
                
            }else if($data['diagnostico'] != NULL && $data['diagnostico'] == 'dif_diag_aplicado'){
                $data['lectura'] = $this->diagDocenteP1->_getDiagDocenteLectura($data['registros']);
                $data['escritura'] = $this->diagDocenteP1->_getDiagDocenteEscritura($data['registros']);

                $sin_dato = 100 - $data['lectura'] -  $data['escritura'];
                //Traigo los datos de los diagnósticos aplicados
                $datosVentas[0] = $data['lectura'];
                $datosVentas[1] = $data['escritura'];
                $datosVentas[2] = number_format($sin_dato, 2);

                $etiquetas = ["Lectura", "Escritura", "Sin datos"];
            }else {
                $datosVentas[0] = 0;
                $datosVentas[1] = 0;
                $datosVentas[2] = 0;
            }

            
            $respuesta = [
                "etiquetas" => $etiquetas,
                "datos" => $datosVentas,
                "tipoGrafico" => $data['tipo_grafico'],
            ];
            //echo '<pre>'.var_export($respuesta, true).'</pre>';
            $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
            $data['chart_data'] =  json_encode($respuesta);
            $data['title']='MYRP - DYA';
            $data['main_content']='reportes/prod1_reportes_diagnostico_view';
            return view('includes/template_reportes', $data);
        }
 
        
    }

    public function recibe_despistaje_mat_tab() {
        $total = 0;
        // Ahora las imprimimos como JSON para pasarlas a AJAX, pero las agrupamos
        if (
                $this->request->getPostGet('amie') == NULL ||  
                $this->request->getPostGet('amie') == 'NULL' || 
                $this->request->getPostGet('cohorte') == 'NULL' ||
                $this->request->getPostGet('tipo_prueba') == '0') {
            return redirect()->to('reporte-despistaje-mat-p1');
        }else{
            $data['amie'] = $this->request->getPostGet('amie');
            $data['cohorte'] = $this->request->getPostGet('cohorte');
            $data['tipo_prueba'] = $this->request->getPostGet('tipo_prueba');
        
            $data['centro'] = $this->centroEducativoModel->find($data['amie']);
            $data['registros'] = $this->prod1Model->_getRegistrosAmieCohorte($data['amie'], $data['cohorte'], $this->session->nombre);
            
            if ($data['registros'] != NULL && $data['tipo_prueba'] == 1) {
                //Traigo la información
                //Relación Figuras Geométricas
                $data['relacion_figuras_geo_1'] = $this->evalMateElemP1->_getRelacionFiguras($data['registros'], 1);
                $datosGrafica[0] = $data['relacion_figuras_geo_1'];
                $data['relacion_figuras_geo_1_1'] = $this->evalMateElemP1->_getRelacionFiguras($data['registros'], 2);
                $datosGrafica[1] = $data['relacion_figuras_geo_1_1'];
                $data['seriacion_2'] = $this->evalMateElemP1->_getSeriacion($data['registros'], 2);
                $datosGrafica[2] = $data['seriacion_2'];
                $data['conjuntos_2_1'] = $this->evalMateElemP1->_getDato($data['registros'], 'conjuntos_', '2_1');
                $datosGrafica[3] = $data['conjuntos_2_1'];
                $data['seriacion_2_1'] = $this->evalMateElemP1->_getDato($data['registros'], 'seriacion_', '2_2');
                $datosGrafica[4] = $data['seriacion_2_1'];
                $data['orientacion_3'] = $this->evalMateElemP1->_getDato($data['registros'], 'orientacion_', '3');
                $datosGrafica[5] = $data['orientacion_3'];
                $data['orientacion_3_1'] = $this->evalMateElemP1->_getDato($data['registros'], 'orientacion_', '3_1');
                $datosGrafica[6] = $data['orientacion_3_1'];
                $data['orientacion_3_2'] = $this->evalMateElemP1->_getDato($data['registros'], 'orientacion_', '3_2');
                $datosGrafica[7] = $data['orientacion_3_2'];
                $data['esquema_corporal_3_3'] = $this->evalMateElemP1->_getDato($data['registros'], 'esquema_corporal_', '3_3');
                $datosGrafica[8] = $data['esquema_corporal_3_3'];
                $data['esquema_corporal_4'] = $this->evalMateElemP1->_getDato($data['registros'], 'esquema_corporal_', '4');
                $datosGrafica[9] = $data['esquema_corporal_4'];
                $data['esquema_corporal_4_1'] = $this->evalMateElemP1->_getDato($data['registros'], 'esquema_corporal_', '4_1');
                $datosGrafica[10] = $data['esquema_corporal_4_1'];
                $data['seriacion_5'] = $this->evalMateElemP1->_getDato($data['registros'], 'seriacion_', '5');
                $datosGrafica[11] = $data['seriacion_5'];
                $data['suma_6'] = $this->evalMateElemP1->_getDato($data['registros'], 'suma_', '6');
                $datosGrafica[12] = $data['suma_6'];
                $data['suma_7'] = $this->evalMateElemP1->_getDato($data['registros'], 'suma_', '7');
                $datosGrafica[13] = $data['suma_7'];
                $data['resta_8'] = $this->evalMateElemP1->_getDato($data['registros'], 'resta_', '8');
                $datosGrafica[14] = $data['resta_8'];
                $data['resta_9'] = $this->evalMateElemP1->_getDato($data['registros'], 'resta_', '9');
                $datosGrafica[15] = $data['resta_9'];
                $data['multiplica_10'] = $this->evalMateElemP1->_getDato($data['registros'], 'multiplica_', '10');
                $datosGrafica[16] = $data['multiplica_10'];
                $data['multiplica_11'] = $this->evalMateElemP1->_getDato($data['registros'], 'multiplica_', '11');
                $datosGrafica[17] = $data['multiplica_11'];
                $data['divide_12'] = $this->evalMateElemP1->_getDato($data['registros'], 'divide_', '12');
                $datosGrafica[18] = $data['divide_12'];
                $data['divide_13'] = $this->evalMateElemP1->_getDato($data['registros'], 'divide_', '13');
                $datosGrafica[19] = $data['divide_13'];


                $total_registrados = 0;
                for ($i=0; $i <= 19; $i++) { 
                    $total_registrados += $datosGrafica[$i];
                }

                $total = count($data['registros']);
                $sin_dato = $total - $total_registrados;
                $datosGrafica[20] = $sin_dato;

                $etiquetas = ["1", "2", "3", "4", "5", "6","7","8", "9", "10", "11", "12","13","14","15","16","17","18","19","20", "S/R"];
            
                $respuesta = [
                    "etiquetas" => $etiquetas,
                    "datos" => $datosGrafica,
                    "total" => $total,
                ];
                
                $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
                $data['chart_data'] =  json_encode($respuesta);
                $data['title']='MYRP - DYA';
                $data['main_content']='reportes/prod1_reportes_despistaje_mat_elemental_view';
                return view('includes/template_reportes', $data);
    
            }else if ($data['registros'] != NULL && $data['tipo_prueba'] == 2) {
                //Orientación espacial
                $data['orientacion_espacial_1'] = $this->evalMateP1->_getOrientacionEspacial($data['registros'], 1);
                $datosGrafica[0] = number_format($data['orientacion_espacial_1'],2);
                $data['orientacion_espacial_2'] = $this->evalMateP1->_getOrientacionEspacial($data['registros'], 2);
                $datosGrafica[1] = number_format($data['orientacion_espacial_2'], 2);
                $data['orientacion_espacial_3'] = $this->evalMateP1->_getOrientacionEspacial($data['registros'], 3);
                $datosGrafica[2] = number_format($data['orientacion_espacial_3'], 2);
                $data['orientacion_espacial_4'] = $this->evalMateP1->_getOrientacionEspacial($data['registros'], 4);
                $datosGrafica[3] = number_format($data['orientacion_espacial_4'],2);
                
                
                //Clasificación
                $data['clasificacion_5'] = $this->evalMateP1->_getClasificacion($data['registros'], 5);
                $datosGrafica[4] = number_format($data['clasificacion_5'],2);
                $data['clasificacion_6'] = $this->evalMateP1->_getClasificacion($data['registros'], 6);
                $datosGrafica[5] = number_format($data['clasificacion_6'],2);

                //Seriación
                $data['seriacion_7'] = $this->evalMateP1->_getSeriacion($data['registros'], 7);
                $datosGrafica[6] = number_format($data['seriacion_7'],2);
                $data['seriacion_8'] = $this->evalMateP1->_getSeriacion($data['registros'], 8);
                $datosGrafica[7] = number_format($data['seriacion_8'] , 2);
                $data['seriacion_9'] = $this->evalMateP1->_getSeriacion($data['registros'], 9);
                $datosGrafica[8] = number_format($data['seriacion_9'], 2);

                //Esquema Corporal
                $data['esquema_corporal_10'] = $this->evalMateP1->_getEsquema($data['registros'], 10);
                $datosGrafica[9] = number_format($data['esquema_corporal_10'] , 2);
                $data['esquema_corporal_11'] = $this->evalMateP1->_getEsquema($data['registros'], 11);
                $datosGrafica[10] = number_format($data['esquema_corporal_11'] , 2);

                //Suma
                $data['suma_dos_cifras'] = $this->evalMateP1->_getSuma($data['registros'], 2);
                $datosGrafica[11] = number_format($data['suma_dos_cifras'] , 2);
                $data['suma_cuatro_cifras'] = $this->evalMateP1->_getSuma($data['registros'], 4);
                $datosGrafica[12] = number_format($data['suma_cuatro_cifras'] , 2);
                $data['suma_cinco_mas'] = $this->evalMateP1->_getSuma($data['registros'], 5);
                $datosGrafica[13] = number_format($data['suma_cinco_mas'] , 2);

                //Resta
                $data['resta_tres_cifras'] = $this->evalMateP1->_getResta($data['registros'], 3);
                $datosGrafica[14] = number_format($data['resta_tres_cifras'], 2);
                $data['resta_cuatro_cifras'] = $this->evalMateP1->_getResta($data['registros'], 4);
                $datosGrafica[15] = number_format($data['resta_cuatro_cifras'], 2);

                //Multiplicación
                $data['multiplicacion_una_cifra'] = $this->evalMateP1->_getMultiplica($data['registros'], 1);
                $datosGrafica[16] = number_format($data['multiplicacion_una_cifra'], 2);
                $data['multiplicacion_dos_cifras'] = $this->evalMateP1->_getMultiplica($data['registros'], 2);
                $datosGrafica[17] = number_format($data['multiplicacion_dos_cifras'], 2);

                //División
                $data['division_una_cifra'] = $this->evalMateP1->_getDivide($data['registros'], 1);
                $datosGrafica[18] = number_format($data['division_una_cifra'], 2);
                $data['division_dos_cifras'] = $this->evalMateP1->_getDivide($data['registros'], 2);
                $datosGrafica[19] = number_format($data['division_dos_cifras'], 2);

                $total_registrados = 0;
                for ($i=0; $i < 19; $i++) { 
                    $total_registrados += $datosGrafica[$i];
                }

                //echo '<pre>'.var_export($data['division_dos_cifras'], true).'</pre>';exit;
                $total = count($data['registros']);
                $sin_dato = $total - $total_registrados;
                $datosGrafica[20] = $sin_dato;

            }else {
                $datosGrafica[0] = 0;
                $datosGrafica[1] = 0;
                $datosGrafica[2] = 0;
                $datosGrafica[3] = 0;
                $datosGrafica[4] = 0;
                $datosGrafica[5] = 0;
                $datosGrafica[6] = 0;
                $datosGrafica[7] = 0;
                $datosGrafica[8] = 0;
                $datosGrafica[9] = 0;
                $datosGrafica[10] = 0;
                $datosGrafica[11] = 0;
                $datosGrafica[12] = 0;
                $datosGrafica[13] = 0;
                $datosGrafica[14] = 0;
                $datosGrafica[15] = 0;
                $datosGrafica[16] = 0;
                $datosGrafica[17] = 0;
                $datosGrafica[18] = 0;
                $datosGrafica[19] = 0;
                $datosGrafica[20] = 0;
                
            }
            //echo '<pre>'.var_export($this->request->getPostGet('diagnostico'), true).'</pre>';exit;
            $etiquetas = ["1", "2", "3", "4", "5", "6","7","8", "9", "10", "11", "12","13","14","15","16","17","18","19","20", "S/R"];
            
            $respuesta = [
                "etiquetas" => $etiquetas,
                "datos" => $datosGrafica,
                "total" => $total,
            ];
            //echo '<pre>'.var_export($respuesta, true).'</pre>';
            $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
            $data['chart_data'] =  json_encode($respuesta);

            $data['title']='MYRP - DYA';
            $data['main_content']='reportes/prod1_reportes_despistaje_mat_view';
            return view('includes/template_reportes', $data);
        }
 
        
    }

    public function recibe_tab() {
        $etiquetas = ["Dato 1", "Dato 2", "Dato 3"];
        // Ahora las imprimimos como JSON para pasarlas a AJAX, pero las agrupamos
        $dato1 = $this->request->getPostGet('dato1');
        $dato2 = $this->request->getPostGet('dato2');
        $dato3 = $this->request->getPostGet('dato3');
        if ($dato1 != NULL) {
            $datosVentas[0] = 10;
        }else {
            $datosVentas[0] = 0;
        }

        if ($dato2 != NULL) {
            $datosVentas[1] = 50;
        }else {
            $datosVentas[1] = 0;
        }

        if ($dato3 != NULL) {
            $datosVentas[2] = 15;
        }else {
            $datosVentas[2] = 0;
        }


        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datosVentas,
        ];
        //echo '<pre>'.var_export($respuesta, true).'</pre>';
        $data['chart_data'] =  json_encode($respuesta);
        $data['title']='MYRP - DYA';
        $data['main_content']='reportes/prod1_reportes_view';
        return view('includes/template_reportes', $data);
    }

    public function logout(){
        //destruyo la session  y salgo
        $data['idusuario'] = $this->session->idusuario;
        $this->session->destroy();

        $user = [
            'is_logged' => 1
        ];
        
        $this->usuarioModel->update($data['idusuario'], $user);
        
        return redirect()->to('/');
    }
}
