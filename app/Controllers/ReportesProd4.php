<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ReportesProd4 extends BaseController {

    protected $listaCampos = [
        'estudia' => 'Estudia',
        'embarazada' => 'Está embarazada',
        'controles' => 'Asiste a controles de embarazo', 
        'motivo_inasistencia' => 'Motivo por el que no asiste a controles', 
        'reinsercion' => 'Reinsercción',
        'estado' => 'Culminación del proceso',
        'anio_egb' => 'Año EGB que reingresa', 
        'motivo' => 'Motivo por el que no se reinserta', 
        'nacionalidad' => 'Nacionalidad', 
        'discapacidad' => 'Discapacidad',
        'modalidad' => 'Modalidad de estudios'
    ];


    public function prod4_reportes_form(){
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {
            $this->session->set('form_error', "");

            $data['componente_4'] = $this->prod4Model->_getAllRegistros();

            //Traigo las ciudades donde se aplica el Prod 4
            $data['ciudades'] = $this->ciudadesModel->_getCiudadesProd4();

            $data['cohortes'] = $this->cohorteModel->find();
            $data['variables'] = $this->listaCampos;
            //echo '<pre>'.var_export($data['variables'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='reportes/prod4_reportes_form';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod4_reporte() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {
            $nombre = strtoupper($this->request->getPostGet('reporte'));
            $filtros = array(
                'idciudades' => $this->request->getPostGet('idciudades'),
                'cohorte' => $this->request->getPostGet('cohorte'),
                'signo' => $this->request->getPostGet('signo'),
                'edad' => $this->request->getPostGet('edad'),
            );

            $variables = array(
                'variable_1' => $this->request->getPostGet('variable_1'),
                'variable_2' => $this->request->getPostGet('variable_2'),
                'variable_3' => $this->request->getPostGet('variable_3'),
                'order_by' => $this->request->getPostGet('order_by'),
            );

            //$hay = $this->prod4LenguaModel->_getProd4lengua($proceso['idProd4']);
            //echo '<pre>'.var_export($filtros, true).'</pre>';exit;
            
            $reporte = $this->prod4Model->_getDatosReporte($filtros, $variables);
            
            //return redirect()->to('prod4_process');
        }else{

            $this->logout();
        }
    }
}
