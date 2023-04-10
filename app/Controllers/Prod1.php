<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Prod1 extends BaseController {

    public function index() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $data['componente_1'] = $this->prod1Model->findAll();

            $data['title']='MYRP - DYA';
            $data['main_content']='componente1/prod1_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function frm_edit($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            
            $data['datos'] = $this->prod1Model->find($id);

            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente1/prod1_edit_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            $id = $this->request->getPostGet('id');
            $producto_1 = array(
                'nombres' => strtoupper($this->request->getPostGet('nombres')),
                'apellidos' => strtoupper($this->request->getPostGet('apellidos')),
                'documento' => strtoupper($this->request->getPostGet('documento')),
                'nacionalidad' => strtoupper($this->request->getPostGet('nacionalidad')),
                'etnia' => strtoupper($this->request->getPostGet('etnia')),
                'fecha_nac' => $this->request->getPostGet('fecha_nac'),
                'edad' => strtoupper($this->request->getPostGet('edad')),
                'genero' => strtoupper($this->request->getPostGet('genero')),
                'discapacidad' => strtoupper($this->request->getPostGet('discapacidad')),
                'tipo_discapacidad' => strtoupper($this->request->getPostGet('tipo_discapacidad')),
                'anio_egb' => $this->request->getPostGet('anio_egb'),
                'tutor_apoyo' => strtoupper($this->request->getPostGet('tutor_apoyo')),
                'docente_tutor' => strtoupper($this->request->getPostGet('docente_tutor')),
                'representante' => strtoupper($this->request->getPostGet('representante')),
                'documento_rep' => strtoupper($this->request->getPostGet('documento_rep')),
                'parentesto_rep' => strtoupper($this->request->getPostGet('parentesto_rep')),
                'nacionalidad_rep' => strtoupper($this->request->getPostGet('nacionalidad_rep')),
                'direccion_rep' => strtoupper($this->request->getPostGet('direccion_rep')),
                'contacto_telf' => $this->request->getPostGet('contacto_telf'),
                'email' => $this->request->getPostGet('email'),
            );

            $this->prod1Model->update($id, $producto_1);

            return redirect()->to('prod_1');
        }else{

            $this->logout();
        }
    }

    public function logout(){
        //destruyo la session  y salgo
        $data['idusuario'] = $this->session->idusuario;
        $this->session->destroy();

        $user = [
            'is_logged' => 1
        ];
        
        $this->usuarioModel->update($usuario->id, $user);
        
        return redirect()->to('/');
    }
}
