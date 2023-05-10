<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Reportes extends BaseController {

    public function index(){
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1) {

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

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1) {
            //$this->session->set('form_error', "Los campos con asterisco son obligatorios");
            // $data['centros'] = $this->centroEducativoModel->findAll();
            // $data['cursos'] = $this->cursoModel->findAll();
            // $data['mensaje'] = $this->session->form_error;
            
            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='reportes/prod1_reportes_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
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
        return view('includes/template', $data);
    }
}
