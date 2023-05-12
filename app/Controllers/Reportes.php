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

    public function reportes_prod_1() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;
        $data['reportes'] = $this->session->reportes;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1 && $data['reportes'] == 1) {

            $data['centros'] = $this->prod1Model->_getCentrosEducativos();
            $data['cursos'] = $this->cursoModel->findAll();
            $data['nacionalidades'] = $this->prod1Model->_getNacionalidades();
            $data['genero'] = $this->prod1Model->_getGeneros();

            $data['centro'] = '';
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

    public function recibe_asistencia_tab() {

        if ($this->request->getPostGet('amie') == NULL) {
            return redirect()->to('reportes-p1');
        }

        $data['amie'] = $this->request->getPostGet('amie');
        $data['cohorte'] = $this->request->getPostGet('cohorte');
        $data['dias_atencion'] = $this->request->getPostGet('dias_atencion');
        $data['horas_planificadas'] = $this->request->getPostGet('horas_planificadas');
        $data['horas_efectivas'] = $this->request->getPostGet('horas_efectivas');
        $data['horas_perdidas'] = $this->request->getPostGet('horas_perdidas');

        if ($this->request->getPostGet('dias_atencion') != NUll) {
            $data['dias_atencion'] = $this->asistenciaP1->_getDiasatencionReporte($data);
        }

        if ($this->request->getPostGet('horas_planificadas') != NUll) {
            $data['horas_planificadas'] = $this->asistenciaP1->_getHorasPlanificadasReporte($data);
        }

        if ($this->request->getPostGet('horas_efectivas') != NUll) {
            $data['horas_efectivas'] = $this->asistenciaP1->_getHorasEfectivasReporte($data);
        }

        if ($this->request->getPostGet('horas_perdidas') != NUll) {
            $data['horas_perdidas'] = $this->asistenciaP1->_getHorasPerdidasReporte($data);
        }

        $data['centro'] = $this->centroEducativoModel->find($data['amie']);

        //$data['result'] = $this->asistenciaP1->_getAsistenciaReporte($data);

        //echo '<pre>'.var_export($data['horas_planificadas'], true).'</pre>';exit;
        $data['centro'] = '';
        $data['centros'] = $this->prod1Model->_getCentrosEducativos();
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
    
    public function recibe_diagnostico_tab() {
        
        // Ahora las imprimimos como JSON para pasarlas a AJAX, pero las agrupamos
        if ($this->request->getPostGet('amie') == NULL||  $this->request->getPostGet('amie') == 'NULL') {
            return redirect()->to('reportes-p1');
        }else{
            $data['amie'] = $this->request->getPostGet('amie');
            $data['diagnostico'] = $this->request->getPostGet('diagnostico');
        
            $data['centro'] = '';
            $data['dias_atencion'] = 0;
            $data['horas_planificadas'] = 0;
            $data['horas_efectivas'] = 0;
            $data['horas_perdidas'] = 0;
            $data['registros'] = $this->prod1Model->_getIdsAmie($data['amie']);
            if ($data['diagnostico'] != NULL && $data['diagnostico'] == 'dif_docentes') {
                //Traigo la información
                
                $data['lectura'] = $this->diagDocenteP1->_getDiagDocenteLectura($data['registros']);
                $data['escritura'] = $this->diagDocenteP1->_getDiagDocenteEscritura($data['registros']);
                $data['matematica'] = $this->diagDocenteP1->_getDiagDocenteMate($data['registros']);
    
    
                $total = count($data['registros']);
                $sin_dato = $total - (count($data['lectura']) + count($data['matematica']) + count($data['escritura'] ));
                $datosVentas[0] = number_format((count($data['lectura'] ) * 100)/$total, 2);
                $datosVentas[1] = number_format((count($data['matematica'] ) * 100)/$total,2);
                $datosVentas[2] = number_format((count($data['escritura'] ) * 100)/$total,2);
                $datosVentas[3] = number_format(($sin_dato * 100)/$total,2);
    
            }else if($data['diagnostico'] != NULL && $data['diagnostico'] == 'dif_diag_aplicado'){

            }else {
                $datosVentas[0] = 0;
                $datosVentas[1] = 0;
                $datosVentas[2] = 0;
                $datosVentas[3] = 0;
            }
            //echo '<pre>'.var_export($this->request->getPostGet('diagnostico'), true).'</pre>';exit;
            $etiquetas = ["Lectura", "Escritura", "Matemática", "No registra información"];
            
            $respuesta = [
                "etiquetas" => $etiquetas,
                "datos" => $datosVentas,
            ];
            //echo '<pre>'.var_export($respuesta, true).'</pre>';
            $data['centros'] = $this->prod1Model->_getCentrosEducativos();
            $data['chart_data'] =  json_encode($respuesta);
            $data['title']='MYRP - DYA';
            $data['main_content']='reportes/prod1_reportes_diagnostico_view';
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
}
