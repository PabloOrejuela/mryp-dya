<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ReportesProd4 extends BaseController {
    public function prod4_reportes_form(){
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {
            $this->session->set('form_error', "");

            $data['componente_4'] = $this->prod4Model->_getAllRegistros();
            //echo '<pre>'.var_export($data['componente_4'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='reportes/prod4_reportes_form';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }
}
