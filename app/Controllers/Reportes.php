<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Reportes extends BaseController {

    public function index(){
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['reportes'] = $this->session->reportes;

        if ($data['is_logged'] == 1 && $data['reportes'] == 1) {

            $data['componentes'] = array('1','2','3','4','5');

            // $data['ciudades'] = $this->centrosProvProd1ViewModel->_obtenCiudades(4);
            // echo '<pre>'.var_export($data['ciudades'] , true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='reportes/selecciona_componente';
            return view('includes/template', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }   
    }

    public function prod1_reportes_coordinacion_menu() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;
        $data['reportes'] = $this->session->reportes;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1 && $data['reportes'] == 1) {

            if ($this->session->idrol == 2) {
                $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
            }else{
                $data['centros'] = $this->prod1Model->_getCentrosEducativos();
            }

            $data['cursos'] = $this->cursoModel->findAll();
            $data['nacionalidades'] = $this->prod1Model->_getNacionalidades();
            $data['genero'] = $this->prod1Model->_getGeneros();

            //$data['provincias'] = $this->provinciaModel->_getProvinciasProd1();
            //echo '<pre>'.var_export($data['provincias'], true).'</pre>';exit;

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
            $data['main_content']='reportes/prod1_reportes_coordinacion_view';
            return view('includes/template_reportes', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    function ciudades_select(){
        $provincia = $this->request->getPostGet('idprovincia');
        $data['ciudades'] = $this->centrosProvProd1ViewModel->_obtenCiudades($provincia);
        //$data['ciudades'] = $this->ciudadModel->findAll();
        echo view('ciudades_select', $data);
    }

    function centros_ciudades_select(){
        $ciudad = $this->request->getPostGet('idciudades');
        $data['centros'] = $this->centrosProvProd1ViewModel->_obtenCentrosCiudad($ciudad);
        //$data['ciudades'] = $this->ciudadModel->findAll();
        echo view('centros_ciudades_view', $data);
    }

    public function reporte_asistencia_p1() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;
        $data['reportes'] = $this->session->reportes;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1 && $data['reportes'] == 1) {

            if ($this->session->idrol == 2) {
                $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
            }else{
                $data['centros'] = $this->prod1Model->_getCentrosEducativos();
            }

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
            return redirect()->to('/');
        }
    }

    public function reporte_analisis_pruebafinal_p1() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;
        $data['reportes'] = $this->session->reportes;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1 && $data['reportes'] == 1) {

            if ($this->session->idrol == 2) {
                $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
            }else{
                $data['centros'] = $this->prod1Model->_getCentrosEducativos();
            }
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
            return redirect()->to('/');
        }
    }

    public function reporte_analisis_pruebadiagnostico_p1() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;
        $data['reportes'] = $this->session->reportes;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1 && $data['reportes'] == 1) {

            if ($this->session->idrol == 2) {
                $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
            }else{
                $data['centros'] = $this->prod1Model->_getCentrosEducativos();
            }
            $data['cursos'] = $this->cursoModel->findAll();
            $data['nacionalidades'] = $this->prod1Model->_getNacionalidades();
            $data['genero'] = $this->prod1Model->_getGeneros();
            //echo '<pre>'.var_export($data['centros'], true).'</pre>';exit;


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
            return redirect()->to('/');
        }
    }

    public function reporte_diagnostico_p1() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;
        $data['reportes'] = $this->session->reportes;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1 && $data['reportes'] == 1) {

            if ($this->session->idrol == 2) {
                $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
            }else{
                $data['centros'] = $this->prod1Model->_getCentrosEducativos();
            }
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
            return redirect()->to('/');
        }
    }

    public function reporte_diagnostico_lenguaje_coordinador() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;
        $data['reportes'] = $this->session->reportes;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1 && $data['reportes'] == 1) {

            $data['provincias'] = $this->centrosProvProd1ViewModel->_getProvincias();
            //echo '<pre>'.var_export($data['provincias'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='reportes/prod1_reporte_diagnostico_lenguaje_coordinador_form';
            return view('includes/template_reportes', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function reporte_diagnostico_matematicas_coordinador() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;
        $data['reportes'] = $this->session->reportes;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1 && $data['reportes'] == 1) {

            $data['provincias'] = $this->centrosProvProd1ViewModel->_getProvincias();
            //echo '<pre>'.var_export($data['provincias'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='reportes/prod1_reporte_diagnostico_mate_coordinador_form';
            return view('includes/template_reportes', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function reporte_diagnostico_matematica_elem_coordinador() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;
        $data['reportes'] = $this->session->reportes;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1 && $data['reportes'] == 1) {

            $data['provincias'] = $this->centrosProvProd1ViewModel->_getProvincias();
            //echo '<pre>'.var_export($data['provincias'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='reportes/prod1_reporte_diagnostico_mate_elem_coordinador_form';
            return view('includes/template_reportes', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function reporte_diagnostico_dinamico() {
        // Ahora las imprimimos como JSON para pasarlas a AJAX, pero las agrupamos

        if ($this->session->reportes != NULL && $this->session->reportes == '1') {

            if ($this->request->getPostGet('provincia') == NULL) {

                return redirect()->to('reporte-diagnostico-dinamico-form');

            }else{
                $data['provincia'] = $this->request->getPostGet('provincia');
                $data['ciudad'] = $this->request->getPostGet('ciudad');
                $data['centros'] = $this->request->getPostGet('centros');
                $data['nivel'] = $this->request->getPostGet('nivel');
                $data['cohorte'] = $this->request->getPostGet('cohorte');

                $data['ciudad_obj'] = $this->ciudadesModel->find($data['ciudad']);
    
                //Variables
                $data['masculino'] = 0;
                $data['femenino'] = 0;
                $data['sin_genero'] = 0;
    
                //TRAIGO LOS REGISTROS
                $data['registros'] = $this->prod1Model->_getRegistrosReporte($data);
                
                //Traigo datos por género
                if ($data['registros'] != NULL) {
                    foreach ($data['registros'] as $key => $value) {
                    
                        if ($value->genero == 'MASCULINO') {
                            $data['masculino']++;
                        }elseif ($value->genero == 'FEMENINO') {
                            $data['femenino']++;
                        }else{
                            $data['sin_genero']++;
                        }
                    }

                    $data['total'] = count($data['registros']);
                    $data['edad_max'] = $this->prod1Model->_getEdadMax($data['registros']);
                    
                }else{
                    $data['total'] = 0;
                    $data['edad_max'] = 0;

                    
                    return redirect()->to('reporte-diagnostico-dinamico-form');
                }
                //PABLO revisar por que sale siempre 100% de problemas en escritura
                $data['provincias'] = $this->centrosProvProd1ViewModel->_getProvincias();

                $data['title']='MYRP - DYA';
                $data['main_content']='reportes/prod1_reporte_diagnostico_dinamico';
                return view('includes/template_reportes', $data);

            }
        }
    }

    public function recibe_diagnostico_lenguaje_coordinador() {

        if ($this->session->reportes != NULL && $this->session->reportes == '1') {

            if ($this->request->getPostGet('provincia') == 0) {

                return redirect()->to('reporte-diagnostico-coordinador');

            }else{
                $data['provincia'] = $this->request->getPostGet('provincia');
                $data['provincia_datos'] = $this->provinciaModel->find($data['provincia'] ); 
    
                //Variables
                $data['masculino'] = 0;
                $data['femenino'] = 0;
                $data['sin_genero'] = 0;
    
                //TRAIGO TODOS LOS REGISTROS DE LA PROVINCIA
                $data['centros'] = $this->centrosProvProd1ViewModel->_obtenCentrosProvincia($data['provincia']);
                $data['registros'] = $this->prod1Model->_getRegistrosCentros($data['centros']);

                //echo '<pre>'.var_export($data['provincia_datos'], true).'</pre>';exit;
                
                //Traer Total de estudiantes participantes
                $data['total_registros'] = count($data['registros']);
                //echo $data['total_registros'];

                //Total de estudiantes que participan en la prueba de diagnóstico lectura

                //Datos de Diagnostico Lenguaje
                $data['datos_diagnostico_lenguaje'] = $this->diagMyrpP1->_getDatosDiagLenguajeMyrp($data['registros']);
                $data['datos_evalfinal_lenguaje'] = $this->evalFinalP1->_getDatosEvalLenguajeMyrp($data['registros']);

                //VARIABLES
                //NECESITA APOYO DIAGNOSTICO
                $siNecesitaApoyo = 0;
                $noNecesitaApoyo = 0;
                foreach ($data['datos_diagnostico_lenguaje'] as $key => $value) {
                    if ($value->necesito_apoyo == 'SI') {
                        $siNecesitaApoyo++;
                    }else if($value->necesito_apoyo == 'NO'){
                        $noNecesitaApoyo++;
                    }
                }

                $porcentNecesita = round(($siNecesitaApoyo * 100)/count($data['datos_diagnostico_lenguaje']));
                $porcentNoNecesita = 100 - $porcentNecesita;

                $etiquetas_apoyo = [$porcentNecesita."% SI", $porcentNoNecesita."% NO"];
                $datosGrafica[0] = $porcentNecesita;
                $datosGrafica[1] = $porcentNoNecesita;
                $respuesta_necesita_apoyo = [
                    "etiquetas" => $etiquetas_apoyo,
                    "datos" => $datosGrafica,
                    "color_necesita" => '#ed5c5c',
                    "color_noNecesita" => '#e8f7e1',
                    "total" => count($data['datos_diagnostico_lenguaje']),
                ];
                $data['chart_data_necesita_apoyo'] = json_encode($respuesta_necesita_apoyo);

                //NECESITA APOYO EVAL FINAL
                $siNecesitaApoyo = 0;
                $noNecesitaApoyo = 0;
                foreach ($data['datos_evalfinal_lenguaje'] as $key => $value) {
                    if ($value->necesito_apoyo == 'SI') {
                        $siNecesitaApoyo++;
                    }else if($value->necesito_apoyo == 'NO'){
                        $noNecesitaApoyo++;
                    }
                }

                $porcentNecesita = round(($siNecesitaApoyo * 100)/count($data['datos_evalfinal_lenguaje']));
                $porcentNoNecesita = 100 - $porcentNecesita;

                $etiquetas_apoyo = [$porcentNecesita."% SI", $porcentNoNecesita."% NO"];
                $datosGrafica[0] = $porcentNecesita;
                $datosGrafica[1] = $porcentNoNecesita;
                $respuesta_necesita_apoyo_final = [
                    "etiquetas" => $etiquetas_apoyo,
                    "datos" => $datosGrafica,
                    "color_necesita" => '#ed5c5c',
                    "color_noNecesita" => '#e8f7e1',
                    "total" => count($data['datos_evalfinal_lenguaje']),
                ];
                $data['chart_data_necesita_apoyo_final'] = json_encode($respuesta_necesita_apoyo_final);

                //Pregunta 1 COMPRENSION LECTORA
                $data['myChartP1CompLectora'] = json_encode($this->setDataRespuestaP1CompLectora($data));

                //Pregunta 1 COMPRENSION LECTORA EVAL FINAL
                $data['myChartP1CompLectoraFinal'] = json_encode($this->setDataRespuestaP1CompLectoraFinal($data));

                //Pregunta 1 Inteligibilidad
                $data['myChartP1Inteligibilidad'] = json_encode($this->setDataRespuestaP1Inteligi($data['datos_diagnostico_lenguaje']));

                //Pregunta 1 Inteligibilidad EVAL FINAL
                $data['myChartP1InteligibilidadFinal'] = json_encode($this->setDataRespuestaP1Inteligi($data['datos_evalfinal_lenguaje']));

                //Pregunta 2 COMPRENSION LECTORA
                $data['myChartP2CompLectora'] = json_encode($this->setDataRespuestaP2CompLectora($data['datos_diagnostico_lenguaje']));

                //Pregunta 2 COMPRENSION LECTORA EVAL FINAL
                $data['myChartP2CompLectoraFinal'] = json_encode($this->setDataRespuestaP2CompLectora($data['datos_evalfinal_lenguaje']));
                
                //Pregunta 3 COMPRENSION LECTORA
                $data['myChartP3CompLectora'] = json_encode($this->setDataRespuestaP3CompLectora($data['datos_diagnostico_lenguaje']));

                //Pregunta 3 COMPRENSION LECTORA EVAL FINAL
                $data['myChartP3CompLectoraFinal'] = json_encode($this->setDataRespuestaP3CompLectora($data['datos_evalfinal_lenguaje']));
                
                //Pregunta 3 Inteligibilidad LECTORA
                $data['myChartP3Intel'] = json_encode($this->setDataRespuestaP3Intel($data['datos_diagnostico_lenguaje']));

                //Pregunta 3 Inteligibilidad LECTORA EVAL FINAL
                $data['myChartP3IntelFinal'] = json_encode($this->setDataRespuestaP3Intel($data['datos_evalfinal_lenguaje']));

                //Pregunta 3 COHERENCIA
                $data['myChartP3Coher'] = json_encode($this->setDataRespuestaP3Coher($data['datos_diagnostico_lenguaje']));

                //Pregunta 3 COHERENCIA EVAL FINAL
                $data['myChartP3CoherFinal'] = json_encode($this->setDataRespuestaP3Coher($data['datos_evalfinal_lenguaje']));

                //Pregunta 3 SINTAXIS
                $data['myChartP3Sintax'] = json_encode($this->setDataRespuestaP3Sintax($data['datos_diagnostico_lenguaje']));

                //Pregunta 3 SINTAXIS EVAL FINAL
                $data['myChartP3SintaxFinal'] = json_encode($this->setDataRespuestaP3Sintax($data['datos_evalfinal_lenguaje']));

                //Pregunta 3 Estándares EGB Subnivel 2 y 3 MYRP
                $data['myChartP3Estandares'] = json_encode($this->setDataRespuestaP3Estandares($data['datos_diagnostico_lenguaje']));

                //Pregunta 3 Estándares EGB Subnivel 2 y 3 EVAL FINAL
                $data['myChartP3EstandaresFinal'] = json_encode($this->setDataRespuestaP3Estandares($data['datos_evalfinal_lenguaje']));

                //Pregunta 4 COMPRENSION LECTORA
                $data['myChartP4CompLectora'] = json_encode($this->setDataRespuestaP4CompLectora($data['datos_diagnostico_lenguaje']));

                //Pregunta 4 COMPRENSION LECTORA EVAL FINAL
                $data['myChartP4CompLectoraFinal'] = json_encode($this->setDataRespuestaP4CompLectora($data['datos_evalfinal_lenguaje']));

                //Pregunta 4 Inteligibilidad LECTORA
                $data['myChartP4Intel'] = json_encode($this->setDataRespuestaP4Intel($data['datos_diagnostico_lenguaje']));

                //Pregunta 4 Inteligibilidad LECTORA EVAL FINAL
                $data['myChartP4IntelFinal'] = json_encode($this->setDataRespuestaP4Intel($data['datos_evalfinal_lenguaje']));

                //Pregunta 4 COHERENCIA
                $data['myChartP4Coher'] = json_encode($this->setDataRespuestaP4Coher($data['datos_diagnostico_lenguaje']));

                //Pregunta 4 COHERENCIA EVAL FINAL
                $data['myChartP4CoherFinal'] = json_encode($this->setDataRespuestaP4Coher($data['datos_evalfinal_lenguaje']));

                //Pregunta 4 SINTAXIS
                $data['myChartP4Sintax'] = json_encode($this->setDataRespuestaP4Sintax($data['datos_diagnostico_lenguaje']));

                //Pregunta 4 SINTAXIS EVAL FINAL
                $data['myChartP4SintaxFinal'] = json_encode($this->setDataRespuestaP4Sintax($data['datos_evalfinal_lenguaje']));

                //Pregunta 4 Estándares EGB Subnivel 2 y 3 MYRP
                $data['myChartP4Estandares'] = json_encode($this->setDataRespuestaP4Estandares($data['datos_diagnostico_lenguaje']));

                //Pregunta 4 Estándares EGB Subnivel 2 y 3 EVAL FINAL
                $data['myChartP4EstandaresFinal'] = json_encode($this->setDataRespuestaP4Estandares($data['datos_evalfinal_lenguaje']));
                //echo '<pre>'.var_export($data['myChartP3CompLectora'], true).'</pre>';
                //echo '<pre>'.var_export($data['myChartP3CompLectoraFinal'], true).'</pre>';
                //exit;

                //Total de estudiantes que participan en la prueba final

                //Rango de edades

                
                $data['provincias'] = $this->centrosProvProd1ViewModel->_getProvincias();

                $data['title']='MYRP - DYA';
                $data['main_content']='reportes/prod1_reporte_diagnostico_coordinador';
                return view('includes/template_reportes', $data);

            }
        }
    }

    public function setDataRespuestaP4Estandares($data){
        $respA = 0;
        $respB = 0;
        foreach ($data as $key => $value) {
            if ($value->p4_estandares_egb_sub2y3 == 'A') {
                $respA++;
            }else if($value->p4_estandares_egb_sub2y3 == 'B'){
                $respB++;
            }
        }

        $porcentA = round(($respA * 100)/count($data));
        $porcentB = 100 - $porcentA;

        $etiquetas = [$porcentA."% Adecuado", $porcentB."% Muy por debajo de lo esperado"];
        $datosGrafica[0] = $porcentA;
        $datosGrafica[1] = $porcentB;
        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datosGrafica,
            "color_A" => '#e8f7e1',
            "color_B" => '#F5D5D9',
            "total" => count($data),
        ];
        return $respuesta;
    }

    public function setDataRespuestaP4Sintax($data){
        $respA = 0;
        $respB = 0;
        $respC = 0;
        $respD = 0;
        foreach ($data as $key => $value) {
            if ($value->p4_sintaxis == 'A') {
                $respA++;
            }else if($value->p4_sintaxis == 'B'){
                $respB++;
            }else if($value->p4_sintaxis == 'C'){
                $respC++;
            }else if($value->p4_sintaxis == 'D'){
                $respD++;
            }
        }

        $porcentA = round(($respA * 100)/count($data));
        $porcentB = round(($respB * 100)/count($data));
        $porcentC = round(($respC * 100)/count($data));
        $porcentD = 100 - ($porcentA + $porcentB + $porcentC);

        $etiquetas = [$porcentA."% Adecuado", $porcentB."% En proceso", $porcentC."% Debajo de lo esperado", $porcentD."% Muy por debajo de lo esperado"];
        $datosGrafica[0] = $porcentA;
        $datosGrafica[1] = $porcentB;
        $datosGrafica[2] = $porcentC;
        $datosGrafica[3] = $porcentD;
        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datosGrafica,
            "color_A" => '#e8f7e1',
            "color_B" => '#F1F5D5',
            "color_C" => '#F5D5D9',
            "color_D" => '#FC656D',
            "total" => count($data),
        ];
        return $respuesta;
    }

    public function setDataRespuestaP4Coher($data){
        $respA = 0;
        $respB = 0;
        $respC = 0;
        $respD = 0;
        foreach ($data as $key => $value) {
            if ($value->p4_coherencia == 'A') {
                $respA++;
            }else if($value->p4_coherencia == 'B'){
                $respB++;
            }else if($value->p4_coherencia == 'C'){
                $respC++;
            }else if($value->p4_coherencia == 'D'){
                $respD++;
            }
        }

        $porcentA = round(($respA * 100)/count($data));
        $porcentB = round(($respB * 100)/count($data));
        $porcentC = round(($respC * 100)/count($data));
        $porcentD = 100 - ($porcentA + $porcentB + $porcentC);

        $etiquetas = [$porcentA."% Adecuado", $porcentB."% En proceso", $porcentC."% Debajo de lo esperado", $porcentD."% Muy por debajo de lo esperado"];
        $datosGrafica[0] = $porcentA;
        $datosGrafica[1] = $porcentB;
        $datosGrafica[2] = $porcentC;
        $datosGrafica[3] = $porcentD;
        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datosGrafica,
            "color_A" => '#e8f7e1',
            "color_B" => '#F1F5D5',
            "color_C" => '#F5D5D9',
            "color_D" => '#FC656D',
            "total" => count($data),
        ];
        return $respuesta;
    }

    public function setDataRespuestaP4Intel($data){
        $respA = 0;
        $respB = 0;
        $respC = 0;
        foreach ($data as $key => $value) {
            if ($value->p4_inteligibilidad == 'A') {
                $respA++;
            }else if($value->p4_inteligibilidad == 'B'){
                $respB++;
            }else if($value->p4_inteligibilidad == 'C'){
                $respC++;
            }
        }

        $porcentA = round(($respA * 100)/count($data));
        $porcentB = round(($respB * 100)/count($data));
        $porcentC = 100 - ($porcentA + $porcentB);

        $etiquetas = [$porcentA."% Adecuado", $porcentB."% En proceso", $porcentC."% Muy por debajo de lo esperado"];
        $datosGrafica[0] = $porcentA;
        $datosGrafica[1] = $porcentB;
        $datosGrafica[2] = $porcentC;
        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datosGrafica,
            "color_A" => '#e8f7e1',
            "color_B" => '#F1F5D5',
            "color_C" => '#FC656D',
            "total" => count($data),
        ];
        return $respuesta;
    }

    public function setDataRespuestaP4CompLectora($data){
        $respA = 0;
        $respB = 0;
        $respC = 0;
        foreach ($data as $key => $value) {
            if ($value->p4_comprension_lectora == 'A') {
                $respA++;
            }else if($value->p4_comprension_lectora == 'B'){
                $respB++;
            }else if($value->p4_comprension_lectora == 'C'){
                $respC++;
            }
        }

        $porcentA = round(($respA * 100)/count($data));
        $porcentB = round(($respB * 100)/count($data));
        $porcentC = 100 - ($porcentA + $porcentB);

        $etiquetas = [$porcentA."% Adecuado", $porcentB."% En proceso", $porcentC."% Muy por debajo de lo esperado"];
        $datosGrafica[0] = $porcentA;
        $datosGrafica[1] = $porcentB;
        $datosGrafica[2] = $porcentC;
        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datosGrafica,
            "color_A" => '#e8f7e1',
            "color_B" => '#F1F5D5',
            "color_C" => '#F5D5D9',
            "total" => count($data),
        ];
        return $respuesta;
    }

    public function setDataRespuestaP3Estandares($data){
        $respA = 0;
        $respB = 0;
        foreach ($data as $key => $value) {
            if ($value->p3_estandares_egb_sub2y3 == 'A') {
                $respA++;
            }else if($value->p3_estandares_egb_sub2y3 == 'B'){
                $respB++;
            }
        }

        $porcentA = round(($respA * 100)/count($data));
        $porcentB = 100 - $porcentA;

        $etiquetas = [$porcentA."% Adecuado", $porcentB."% Muy por debajo de lo esperado"];
        $datosGrafica[0] = $porcentA;
        $datosGrafica[1] = $porcentB;
        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datosGrafica,
            "color_A" => '#e8f7e1',
            "color_B" => '#F5D5D9',
            "total" => count($data),
        ];
        return $respuesta;
    }

    public function setDataRespuestaP3Sintax($data){
        $respA = 0;
        $respB = 0;
        $respC = 0;
        $respD = 0;
        foreach ($data as $key => $value) {
            if ($value->p3_sintaxis == 'A') {
                $respA++;
            }else if($value->p3_sintaxis == 'B'){
                $respB++;
            }else if($value->p3_sintaxis == 'C'){
                $respC++;
            }else if($value->p3_sintaxis == 'D'){
                $respD++;
            }
        }

        $porcentA = round(($respA * 100)/count($data));
        $porcentB = round(($respB * 100)/count($data));
        $porcentC = round(($respC * 100)/count($data));
        $porcentD = 100 - ($porcentA + $porcentB + $porcentC);

        $etiquetas = [$porcentA."% Adecuado", $porcentB."% En proceso", $porcentC."% Debajo de lo esperado", $porcentD."% Muy por debajo de lo esperado"];
        $datosGrafica[0] = $porcentA;
        $datosGrafica[1] = $porcentB;
        $datosGrafica[2] = $porcentC;
        $datosGrafica[3] = $porcentD;
        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datosGrafica,
            "color_A" => '#e8f7e1',
            "color_B" => '#F1F5D5',
            "color_C" => '#F5D5D9',
            "color_D" => '#FC656D',
            "total" => count($data),
        ];
        return $respuesta;
    }

    public function setDataRespuestaP3Coher($data){
        $respA = 0;
        $respB = 0;
        $respC = 0;
        $respD = 0;
        foreach ($data as $key => $value) {
            if ($value->p3_coherencia == 'A') {
                $respA++;
            }else if($value->p3_coherencia == 'B'){
                $respB++;
            }else if($value->p3_coherencia == 'C'){
                $respC++;
            }else if($value->p3_coherencia == 'D'){
                $respD++;
            }
        }

        $porcentA = round(($respA * 100)/count($data));
        $porcentB = round(($respB * 100)/count($data));
        $porcentC = round(($respC * 100)/count($data));
        $porcentD = 100 - ($porcentA + $porcentB + $porcentC);

        $etiquetas = [$porcentA."% Adecuado", $porcentB."% En proceso", $porcentC."% Debajo de lo esperado", $porcentD."% Muy por debajo de lo esperado"];
        $datosGrafica[0] = $porcentA;
        $datosGrafica[1] = $porcentB;
        $datosGrafica[2] = $porcentC;
        $datosGrafica[3] = $porcentD;
        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datosGrafica,
            "color_A" => '#e8f7e1',
            "color_B" => '#F1F5D5',
            "color_C" => '#F5D5D9',
            "color_D" => '#FC656D',
            "total" => count($data),
        ];
        return $respuesta;
    }

    public function setDataRespuestaP3Intel($data){
        $respA = 0;
        $respB = 0;
        $respC = 0;
        foreach ($data as $key => $value) {
            if ($value->p3_inteligibilidad == 'A') {
                $respA++;
            }else if($value->p3_inteligibilidad == 'B'){
                $respB++;
            }else if($value->p3_inteligibilidad == 'C'){
                $respC++;
            }
        }
        $porcentA = round(($respA * 100)/count($data));
        $porcentB = round(($respB * 100)/count($data));
        $porcentC = 100 - ($porcentA + $porcentB);

        $etiquetas = [$porcentA."% Adecuado", $porcentB."% En proceso", $porcentC."% Muy por debajo de lo esperado"];
        $datosGrafica[0] = $porcentA;
        $datosGrafica[1] = $porcentB;
        $datosGrafica[2] = $porcentC;

        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datosGrafica,
            "color_A" => '#e8f7e1',
            "color_B" => '#F1F5D5',
            "color_C" => '#FC656D',
            "total" => count($data),
        ];
        return $respuesta;
    }

    public function setDataRespuestaP3CompLectora($data){
        $respA = 0;
        $respB = 0;
        $respC = 0;
        foreach ($data as $key => $value) {
            if ($value->p3_comprension_lectora == 'A') {
                $respA++;
            }else if($value->p3_comprension_lectora == 'B'){
                $respB++;
            }else if($value->p3_comprension_lectora == 'C'){
                $respC++;
            }
        }

        $porcentA = round(($respA * 100)/count($data));
        $porcentB = round(($respB * 100)/count($data));
        $porcentC = 100 - ($porcentA + $porcentB);

        $etiquetas = [$porcentA."% Adecuado", $porcentB."% En proceso", $porcentC."% Muy por debajo de lo esperado"];
        $datosGrafica[0] = $porcentA;
        $datosGrafica[1] = $porcentB;
        $datosGrafica[2] = $porcentC;

        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datosGrafica,
            "color_A" => '#e8f7e1',
            "color_B" => '#F1F5D5',
            "color_C" => '#FC656D',
            "total" => count($data),
        ];
        return $respuesta;
    }

    public function setDataRespuestaP2CompLectora($data){
        $respA = 0;
        $respB = 0;
        foreach ($data as $key => $value) {
            if ($value->p2_comprension_lectora == 'A') {
                $respA++;
            }else if($value->p2_comprension_lectora == 'B'){
                $respB++;
            }
        }
        $porcentA = round(($respA * 100)/count($data));
        $porcentB = 100 - $porcentA;

        $etiquetas = [$porcentA."% Adecuado", $porcentB."% Muy por debajo de lo esperado"];
        $datosGrafica[0] = $porcentA;
        $datosGrafica[1] = $porcentB;

        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datosGrafica,
            "color_A" => '#E8F7E1',
            "color_B" => '#FC656D',
            "total" => count($data),
        ];
        return $respuesta;
    }

    public function setDataRespuestaP1CompLectora($data){
        $respA = 0;
        $respB = 0;
        foreach ($data['datos_diagnostico_lenguaje'] as $key => $value) {
            if ($value->p1_comprension_lectora == 'A') {
                $respA++;
            }else if($value->p1_comprension_lectora == 'B'){
                $respB++;
            }
        }

        $porcentA = round(($respA * 100)/count($data['datos_diagnostico_lenguaje']));
        $porcentB = 100 - $porcentA;

        $etiquetas = [$porcentA."% Adecuado", $porcentB."% Muy por debajo de lo esperado"];
        $datosGrafica[0] = $porcentA;
        $datosGrafica[1] = $porcentB;
        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datosGrafica,
            "color_A" => '#E8F7E1',
            "color_B" => '#FC656D',
            "total" => count($data['datos_diagnostico_lenguaje']),
        ];

        
        return $respuesta;
    }

    public function setDataRespuestaP1CompLectoraFinal($data){
        $respA = 0;
        $respB = 0;
        foreach ($data['datos_evalfinal_lenguaje'] as $key => $value) {
            if ($value->p1_comprension_lectora == 'A') {
                $respA++;
            }else if($value->p1_comprension_lectora == 'B'){
                $respB++;
            }
        }
        $porcentA = round(($respA * 100)/count($data['datos_evalfinal_lenguaje']));
        $porcentB = 100 - $porcentA;

        $etiquetas = [$porcentA."% Adecuado", $porcentB."% Muy por debajo de lo esperado"];
        $datosGrafica[0] = $porcentA;
        $datosGrafica[1] = $porcentB;
        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datosGrafica,
            "color_A" => '#e8f7e1',
            "color_B" => '#FC656D',
            "total" => count($data['datos_evalfinal_lenguaje']),
        ];
        return $respuesta;
    }

    public function setDataRespuestaP1Inteligi($data){
        $respA = 0;
        $respB = 0;
        foreach ($data as $key => $value) {
            if ($value->p1_inteligibilidad == 'A') {
                $respA++;
            }else if($value->p1_inteligibilidad == 'B'){
                $respB++;
            }
        }

        $porcentA = round(($respA * 100)/count($data));
        $porcentB = 100 - $porcentA;

        $etiquetas = [$porcentA."% Adecuado", $porcentB."% Muy por debajo de lo esperado"];
        $datosGrafica[0] = $porcentA;
        $datosGrafica[1] = $porcentB;

        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datosGrafica,
            "color_A" => '#e8f7e1',
            "color_B" => '#FC656D',
            "total" => count($data),
        ];
        return $respuesta;
    }

    public function reporte_final_dinamico_form() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;
        $data['reportes'] = $this->session->reportes;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1 && $data['reportes'] == 1) {

            $data['provincias'] = $this->centrosProvProd1ViewModel->_getProvincias();

            $data['title']='MYRP - DYA';
            $data['main_content']='reportes/prod1_reporte_final_dinamico_form';
            return view('includes/template_reportes', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function recibe_diagnostico_mate_coordinador() {

        if ($this->session->reportes != NULL && $this->session->reportes == '1') {

            if ($this->request->getPostGet('provincia') == 0) {

                return redirect()->to('reporte-diagnostico-coordinador');

            }else{
                $data['provincia'] = $this->request->getPostGet('provincia');
                $data['provincia_datos'] = $this->provinciaModel->find($data['provincia'] ); 
    
                //Variables
                $data['masculino'] = 0;
                $data['femenino'] = 0;
                $data['sin_genero'] = 0;
    
                //TRAIGO TODOS LOS REGISTROS DE LA PROVINCIA
                $data['centros'] = $this->centrosProvProd1ViewModel->_obtenCentrosProvincia($data['provincia']);
                $data['registros'] = $this->prod1Model->_getRegistrosCentros($data['centros']);

                //echo '<pre>'.var_export($data['provincia_datos'], true).'</pre>';exit;
                
                //Traer Total de estudiantes participantes
                $data['total_registros'] = count($data['registros']);

                //Datos de Matemáticas
                $data['datos_mate'] = $this->evalMateP1->_getDatosMate($data['registros']);
                $data['datos_mate_final'] = $this->evalMateFinalP1->_getDatosMate($data['registros']);

                //echo '<pre>'.var_export($data['datos_mate'][0], true).'</pre>';exit;
                //VARIABLES
            
                //Pregunta 1 Orientacion
                $data['myChartP1Orientacion'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'orientacion_espacial_1'));
                $data['myChartP1OrientacionFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'orientacion_espacial_1'));

                //Pregunta 2 Orientacion
                $data['myChartP2Orientacion'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'orientacion_espacial_2'));
                $data['myChartP2OrientacionFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'orientacion_espacial_2'));

                //Pregunta 3 Orientacion
                $data['myChartP3Orientacion'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'orientacion_espacial_3'));
                $data['myChartP3OrientacionFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'orientacion_espacial_3'));

                //Pregunta 4 Orientacion
                $data['myChartP4Orientacion'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'orientacion_espacial_4'));
                $data['myChartP4OrientacionFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'orientacion_espacial_4'));

                //Pregunta 5 Clasificación
                $data['myChartP5Clasificacion'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'clasificacion_5'));
                $data['myChartP5ClasificacionFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'clasificacion_5'));

                //Pregunta 6 Clasificación
                $data['myChartP6Clasificacion'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'clasificacion_6'));
                $data['myChartP6ClasificacionFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'clasificacion_6'));

                //Pregunta 7 Clasificación
                $data['myChartP7Seriacion'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'seriacion_7'));
                $data['myChartP7SeriacionFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'seriacion_7'));

                //Pregunta 8 Clasificación
                $data['myChartP8Seriacion'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'seriacion_8'));
                $data['myChartP8SeriacionFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'seriacion_8'));

                //Pregunta 9 Clasificación
                $data['myChartP9Seriacion'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'seriacion_9'));
                $data['myChartP9SeriacionFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'seriacion_9'));

                //Pregunta 10 Esquema corporal
                $data['myChartP10Esquema'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'esquema_corporal_10'));
                $data['myChartP10EsquemaFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'esquema_corporal_10'));

                //Pregunta 11 Esquema corporal
                $data['myChartP11Esquema'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'esquema_corporal_11'));
                $data['myChartP11EsquemaFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'esquema_corporal_11'));

                //SUMA
                $data['myChartSumaDos'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'suma_dos_cifras'));
                $data['myChartSumaDosFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'suma_dos_cifras'));
                $data['myChartSumaCuatro'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'suma_cuatro_cifras'));
                $data['myChartSumaCuatroFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'suma_cuatro_cifras'));
                $data['myChartSumaCinco'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'suma_cinco_mas'));
                $data['myChartSumaCincoFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'suma_cinco_mas'));

                //Resta
                $data['myChartRestaTres'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'resta_tres_cifras'));
                $data['myChartRestaTresFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'resta_tres_cifras'));
                $data['myChartRestaCuatro'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'resta_cuatro_cifras'));
                $data['myChartRestaCuatroFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'resta_cuatro_cifras'));

                //Multiplicación
                $data['myChartMultiUna'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'multiplicacion_una_cifra'));
                $data['myChartMultiUnaFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'multiplicacion_una_cifra'));
                $data['myChartMultiDos'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'multiplicacion_dos_cifras'));
                $data['myChartMultiDossFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'multiplicacion_dos_cifras'));

                //División
                $data['myChartDiviUna'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'division_una_cifra'));
                $data['myChartDiviUnaFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'division_una_cifra'));
                $data['myChartDiviDos'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'division_dos_cifras'));
                $data['myChartDiviDossFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'division_dos_cifras'));

                // echo '<pre>'.var_export($data['myChartP6Clasificacion'], true).'</pre>';
                // echo '<pre>'.var_export($data['myChartP6ClasificacionFinal'], true).'</pre>';
                // exit;

                //Total de estudiantes que participan en la prueba final

                //Rango de edades

                
                $data['provincias'] = $this->centrosProvProd1ViewModel->_getProvincias();

                $data['title']='MYRP - DYA';
                $data['main_content']='reportes/prod1_reporte_diagnostico_mate_coordinador';
                return view('includes/template_reportes', $data);

            }
        }
    }

    public function setDataRespuesta($data, $campo){
        $resp = 0;
        $acierta = 0;
        $noAcierta = 0;
        foreach ($data as $key => $value) {
            if ($value->$campo == '1' || $value->$campo == 1) {
                $resp++;
            }
        }

        $acierta = round(($resp * 100)/count($data));
        $noAcierta = 100 - $acierta;

        $etiquetas = [$acierta."% Acierta", $noAcierta."% No acierta"];
        if ($acierta == 0 && $noAcierta != 0) {
            $datosGrafica[0] = $noAcierta;
        }else if($acierta != 0 && $noAcierta == 0){
            $datosGrafica[0] = $acierta;
        }else if($acierta != 0 && $noAcierta != 0){
            $datosGrafica[0] = $acierta;
            $datosGrafica[1] = $noAcierta;
        }
        
        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datosGrafica,
            "color_A" => '#e8f7e1',
            "color_B" => '#FC656D',
            "total" => count($data),
        ];
        return $respuesta;
    }

    public function recibe_diagnostico_matelement_coordinador() {

        if ($this->session->reportes != NULL && $this->session->reportes == '1') {

            if ($this->request->getPostGet('provincia') == 0) {

                return redirect()->to('reporte-diagnostico-coordinador');

            }else{
                $data['provincia'] = $this->request->getPostGet('provincia');
                $data['provincia_datos'] = $this->provinciaModel->find($data['provincia'] ); 
    
                //Variables
                $data['masculino'] = 0;
                $data['femenino'] = 0;
                $data['sin_genero'] = 0;
    
                //TRAIGO TODOS LOS REGISTROS DE LA PROVINCIA
                $data['centros'] = $this->centrosProvProd1ViewModel->_obtenCentrosProvincia($data['provincia']);
                $data['registros'] = $this->prod1Model->_getRegistrosCentros($data['centros']);

                //echo '<pre>'.var_export($data['provincia_datos'], true).'</pre>';exit;
                
                //Traer Total de estudiantes participantes
                $data['total_registros'] = count($data['registros']);

                //Datos de Matemáticas
                $data['datos_mate'] = $this->evalMateElemP1->_getDatosMate($data['registros']);
                $data['datos_mate_final'] = $this->evalMateFinalElemP1->_getDatosMate($data['registros']);

                //echo '<pre>'.var_export($data['datos_mate'], true).'</pre>';exit;
                //VARIABLES
            
                //Pregunta 1 Relación Figuras Geométricas
                $data['myChartP1RelacionFiguras'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'relacion_figuras_geo_1'));
                $data['myChartP1RelacionFigurasFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'relacion_figuras_geo_1'));

                //Pregunta 1.1 Relación Figuras Geométricas
                $data['myChartP2RelacionFiguras'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'relacion_figuras_geo_1_1'));
                $data['myChartP2RelacionFigurasFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'relacion_figuras_geo_1_1'));

                //Pregunta 2 Seriación
                $data['myChartP2Seriacion'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'seriacion_2'));
                $data['myChartP2SeriacionFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'seriacion_2'));

                //Conjuntos 2.1
                $data['myChartP2Conjuntos'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'conjuntos_2_1'));
                $data['myChartP2ConjuntosFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'conjuntos_2_1'));

                //Seriación 2.2 
                $data['myChartP22Seriacion'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'seriacion_2_2'));
                $data['myChartP22SeriacionFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'seriacion_2_2'));

                //Orientación Espacial 3 
                $data['myChartP3OrientacionEspacial'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'orientacion_3'));
                $data['myChartP3OrientacionEspacialFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'orientacion_3'));
                $data['myChartP31OrientacionEspacial'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'orientacion_3_1'));
                $data['myChartP31OrientacionEspacialFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'orientacion_3_1'));
                $data['myChartP32OrientacionEspacial'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'orientacion_3_2'));
                $data['myChartP32OrientacionEspacialFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'orientacion_3_2'));

                //Esquema Corporal 
                $data['myChartP33Esquema'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'esquema_corporal_3_3'));
                $data['myChartP33EsquemaFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'esquema_corporal_3_3'));
                $data['myChartP4Esquema'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'esquema_corporal_4'));
                $data['myChartP4EsquemaFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'esquema_corporal_4'));
                $data['myChartP41Esquema'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'esquema_corporal_4_1'));
                $data['myChartP41EsquemaFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'esquema_corporal_4_1'));
                $data['myChartP5Seriacion'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'seriacion_5'));
                $data['myChartP5SeriacionFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'seriacion_5'));

                //Suma 
                $data['myChartP6Suma'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'suma_6'));
                $data['myChartP6SumaFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'suma_6'));
                $data['myChartP7Suma'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'suma_7'));
                $data['myChartP7SumaFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'suma_7'));

                //Resta
                $data['myChartP8Resta'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'resta_8'));
                $data['myChartP8RestaFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'resta_8'));
                $data['myChartP9Resta'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'resta_9'));
                $data['myChartP9RestaFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'resta_9'));

                //Multiplicación
                $data['myChartP10Multi'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'multiplica_10'));
                $data['myChartP10MultiFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'multiplica_10'));
                $data['myChartP11Multi'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'multiplica_11'));
                $data['myChartP11MultiFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'multiplica_11'));

                //División
                $data['myChartP12Division'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'divide_12'));
                $data['myChartP12DivisionFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'divide_12'));
                $data['myChartP13Division'] = json_encode($this->setDataRespuesta($data['datos_mate'], 'divide_13'));
                $data['myChartP13DivisionFinal'] = json_encode($this->setDataRespuesta($data['datos_mate_final'], 'divide_13'));

                // echo '<pre>'.var_export($data['myChartP1Orientacion'], true).'</pre>';
                // echo '<pre>'.var_export($data['myChartP1OrientacionFinal'], true).'</pre>';
                // exit;

                //Total de estudiantes que participan en la prueba final

                //Rango de edades

                
                $data['provincias'] = $this->centrosProvProd1ViewModel->_getProvincias();

                $data['title']='MYRP - DYA';
                $data['main_content']='reportes/prod1_reporte_diagnostico_mate_elem_coordinador';
                return view('includes/template_reportes', $data);

            }
        }
    }

    public function reporte_final_dinamico() {
        // Ahora las imprimimos como JSON para pasarlas a AJAX, pero las agrupamos

        if ($this->session->reportes != NULL && $this->session->reportes == '1') {

            if ($this->request->getPostGet('provincia') == NULL || $this->request->getPostGet('ciudad') == NULL) {

                return redirect()->to('reporte-final-dinamico-form');

            }else{
                $data['provincia'] = $this->request->getPostGet('provincia');
                $data['ciudad'] = $this->request->getPostGet('ciudad');
                $data['centros'] = $this->request->getPostGet('centros');
                $data['nivel'] = $this->request->getPostGet('nivel');
                $data['cohorte'] = $this->request->getPostGet('cohorte');

                $data['ciudad_obj'] = $this->ciudadesModel->find($data['ciudad']);
    
                //Variables
                $data['masculino'] = 0;
                $data['femenino'] = 0;
                $data['sin_genero'] = 0;
    
    
                //TRAIGO LOS REGISTROS
                $data['registros'] = $this->prod1Model->_getRegistrosReporte($data);
                
                //Traigo datos por género
                if ($data['registros'] != NULL) {
                    foreach ($data['registros'] as $key => $value) {
                    
                        if ($value->genero == 'MASCULINO') {
                            $data['masculino']++;
                        }elseif ($value->genero == 'FEMENINO') {
                            $data['femenino']++;
                        }else{
                            $data['sin_genero']++;
                        }
                    }

                    $data['total'] = count($data['registros']);
                    $data['edad_max'] = $this->prod1Model->_getEdadMax($data['registros']);
                    
                }else{
                    $data['total'] = 0;
                    $data['edad_max'] = 0;

                    return redirect()->to('reporte-final-dinamico-form');
                }

                $data['provincias'] = $this->centrosProvProd1ViewModel->_getProvincias();

                $data['title']='MYRP - DYA';
                $data['main_content']='reportes/prod1_reporte_final_dinamico';
                return view('includes/template_reportes', $data);

            }
        }
    }

    public function reporte_destrezas_p1() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;
        $data['reportes'] = $this->session->reportes;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1 && $data['reportes'] == 1) {

            if ($this->session->idrol == 2) {
                $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
            }else{
                $data['centros'] = $this->prod1Model->_getCentrosEducativos();
            }
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
            return redirect()->to('/');
        }
    }

    public function reporte_despistaje_mat_p1() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;
        $data['reportes'] = $this->session->reportes;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1 && $data['reportes'] == 1) {

            if ($this->session->idrol == 2) {
                $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
            }else{
                $data['centros'] = $this->prod1Model->_getCentrosEducativos();
            }
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
            return redirect()->to('/');
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


        if ($this->session->idrol == 2) {
            $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
        }else{
            $data['centros'] = $this->prod1Model->_getCentrosEducativos();
        }

        $data['cursos'] = $this->cursoModel->findAll();
        $data['nacionalidades'] = $this->prod1Model->_getNacionalidades();
        $data['genero'] = $this->prod1Model->_getGeneros();
        //Evito el error de que llegue vacío el objeto
        $data['chart_data'] = '';


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
        
        if ($this->session->idrol == 2) {
            $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
        }else{
            $data['centros'] = $this->prod1Model->_getCentrosEducativos();
        }

        if ($this->session->idrol == 1 || $this->session->idrol == 3 || $this->session->idrol == 11) {
            $data['registros'] = $this->prod1Model->_getRegistrosCoordinador($data['amie'], $data['cohorte']);
        }else{
            $data['registros'] = $this->prod1Model->_getRegistros($data['amie'], $data['cohorte'], $this->session->nombre);
        }
        
        //echo '<pre>'.var_export($data['registros'], true).'</pre>';exit;
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
        //echo '<pre>'.var_export($this->session->idrol, true).'</pre>';exit;
        if ($this->session->idrol == 2) {
            $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
        }else{
            $data['centros'] = $this->prod1Model->_getCentrosEducativos();
        }

        // $data['registros'] = $this->prod1Model->_getRegistros($data['amie'], $data['cohorte'], $this->session->nombre);
        if ($this->session->idrol == 1 || $this->session->idrol == 3 || $this->session->idrol == 11) {
            $data['registros'] = $this->prod1Model->_getRegistrosCoordinador($data['amie'], $data['cohorte']);
        }else{
            $data['registros'] = $this->prod1Model->_getRegistros($data['amie'], $data['cohorte'], $this->session->nombre);
        }

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

            //Trae los registros del amie

            if ($this->session->rol == 2) {
                $data['registros'] = $this->prod1Model->_getRegistrosAmieCohorte($data['amie'], $data['cohorte'], $this->session->nombre);
            } else{
                $data['registros'] = $this->prod1Model->_getRegistrosAmieCohorteAdmin($data['amie'], $data['cohorte']);
            }
            

            //echo '<pre>'.var_export($data['lectura'], true).'</pre>';exit;
            if ($this->session->idrol == 2) {
                $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
            }else{
                $data['centros'] = $this->prod1Model->_getCentrosEducativos();
            }
            
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
            
            if ($this->session->idrol == 2) {
                $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
            }else{
                $data['centros'] = $this->prod1Model->_getCentrosEducativos();
            }
            
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
            if ($this->session->idrol == 1 || $this->session->idrol == 3 || $this->session->idrol == 11) {
                $data['registros'] = $this->prod1Model->_getRegistrosCoordinador($data['amie'], $data['cohorte']);
            }else{
                $data['registros'] = $this->prod1Model->_getRegistros($data['amie'], $data['cohorte'], $this->session->nombre);
            }
            //$data['registros'] = $this->prod1Model->_getRegistrosAmieCohorte($data['amie'], $data['cohorte'], $this->session->nombre);
            
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
                
                if ($this->session->idrol == 2) {
                    $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
                }else{
                    $data['centros'] = $this->prod1Model->_getCentrosEducativos();
                }

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
            if ($this->session->idrol == 2) {
                $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
            }else{
                $data['centros'] = $this->prod1Model->_getCentrosEducativos();
            }
            
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

        $user = [
            'id' => $this->session->idusuario,
            'is_logged' => 0
        ];
        
        $this->usuarioModel->_updateLoggin($user);
        $this->session->destroy();
        return redirect()->to('/');
    }
}
