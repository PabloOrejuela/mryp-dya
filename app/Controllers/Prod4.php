<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Prod4 extends BaseController {

    public function index(){
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {
            $this->session->set('form_error', "");
            if ($this->session->idrol == 2) {
                $data['componente_4'] = $this->prod4Model->_getMisRegistros($data['nombre']);
            }else{
                $data['componente_4'] = $this->prod4Model->findAll();
            }

            $data['title']='MYRP - DYA';
            $data['main_content']='componente4/prod4_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function frm_edit($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {
            
            $data['datos'] = $this->prod4Model->find($id);

            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente4/prod4_edit_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {
            $id = $this->request->getPostGet('id');

            $producto_4 = array(
                //'amie' => strtoupper($this->request->getPostGet('amie')),
                'id' => strtoupper($this->request->getPostGet('id')),
                'nombres' => strtoupper($this->request->getPostGet('nombres')),
                'apellidos' => strtoupper($this->request->getPostGet('apellidos')),
                'documento' => strtoupper($this->request->getPostGet('documento')),
                'nacionalidad' => strtoupper($this->request->getPostGet('nacionalidad')),                
                'genero' => strtoupper($this->request->getPostGet('genero')),
                'fecha_nac' => strtoupper($this->request->getPostGet('fecha_nac')),
                'edad' => strtoupper($this->request->getPostGet('edad')),
                'discapacidad' => strtoupper($this->request->getPostGet('discapacidad')),
                'tipo_discapacidad' => strtoupper($this->request->getPostGet('tipo_discapacidad')),
                'barrio' => $this->request->getPostGet('barrio'),
                'contacto_telf' => $this->request->getPostGet('contacto_telf'),
                'email' => $this->request->getPostGet('email'),
                'estudia' => strtoupper($this->request->getPostGet('estudia')),
                'tiempo_sin_estudiar' => strtoupper($this->request->getPostGet('tiempo_sin_estudiar')),
                'anio_egb' => strtoupper($this->request->getPostGet('anio_egb')),
                'institucion' => strtoupper($this->request->getPostGet('institucion')),

                'num_hijos' => strtoupper($this->request->getPostGet('num_hijos')),
                'edad_hijo_1' => strtoupper($this->request->getPostGet('edad_hijo_1')),
                'edad_hijo_2' => strtoupper($this->request->getPostGet('edad_hijo_2')),
                'edad_hijo_3' => strtoupper($this->request->getPostGet('edad_hijo_3')),
                'embarazada' => strtoupper($this->request->getPostGet('embarazada')),
                'semanas' => strtoupper($this->request->getPostGet('semanas')),
                'controles' => strtoupper($this->request->getPostGet('controles')),

            );
            echo '<pre>'.var_export($producto_4, true).'</pre>';exit;
            $this->prod4Model->update($id, $producto_4);

            return redirect()->to('prod_4');
        }else{

            $this->logout();
        }
    }

    public function frm_procesos() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {

            if ($this->session->idrol == 2) {
                $data['componente_4'] = $this->prod4Model->_getMisRegistros($data['nombre']);
            }else{
                $data['componente_4'] = $this->prod4Model->findAll();
            }

            $data['title']='MYRP - DYA';
            $data['main_content']='componente4/prod4_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }
}
