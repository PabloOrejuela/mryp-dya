<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Prod3 extends BaseController {

    public function index() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {
            $this->session->set('form_error', "");
            $data['componente_3'] = $this->prod3Model->findAll();

            $data['title']='MYRP - DYA';
            $data['main_content']='componente3/prod3_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod_3_create() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {
            //$this->session->set('form_error', "Los campos con asterisco son obligatorios");
            $data['centros'] = $this->centroEducativoModel->findAll();
            $data['cursos'] = $this->cursoModel->findAll();
            $data['mensaje'] = $this->session->form_error;
            
            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente3/prod3_create_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod_3_new() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {

            $producto_3 = array(
                'amie' => strtoupper($this->request->getPostGet('amie')),
                'nombre' => strtoupper($this->request->getPostGet('nombre')),
                'documento' => strtoupper($this->request->getPostGet('documento')),
                'genero' => strtoupper($this->request->getPostGet('genero')),
            );
            
            if ($producto_3['nombre'] == 'NULL' || $producto_3['nombre'] == '') {
                
                $this->session->set('form_error', "Falta llenar campos obligatorios");
                return redirect()->to('prod-3-create');
            }else{
                $this->session->set('form_error', "");
                $this->prod3Model->save($producto_3);
                return redirect()->to('prod_3');
            }
            //echo '<pre>'.var_export($this->session->form_error, true).'</pre>';exit;

            
        }else{

            $this->logout();
        }
    }

    public function prod_3_delete($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {
            $id = $id;
            //echo '<pre>'.var_export($id, true).'</pre>';exit;
            $this->prod3Model->delete($id);

            return redirect()->to('prod_3');
        }else{

            $this->logout();
        }
    }

    public function frm_procesos_prod_3() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {

            $data['componente_3'] = $this->prod3Model->findAll();

            $data['title']='MYRP - DYA';
            $data['main_content']='componente3/prod3_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod_3_variables($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {
            
            $data['id'] = $id;
            $data['var_pro3'] = $this->varProd3Model->find($id);
            $data['datos'] = $this->prod3Model->find($id);

            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente3/prod3_edit_proceso_view';
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
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {
            
            $data['centros'] = $this->centroEducativoModel->_getCentros();
            $data['datos'] = $this->prod3Model->find($id);

            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente3/prod3_edit_view';
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
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {
            $id = $this->request->getPostGet('id');

            $producto_3 = array(
                //'amie' => strtoupper($this->request->getPostGet('amie')),
                'nombre' => strtoupper($this->request->getPostGet('nombre')),
                'documento' => strtoupper($this->request->getPostGet('documento')),
                'nacionalidad' => strtoupper($this->request->getPostGet('nacionalidad')),                
                'genero' => strtoupper($this->request->getPostGet('genero')),
                'discapacidad' => strtoupper($this->request->getPostGet('discapacidad')),
                'tipo' => strtoupper($this->request->getPostGet('tipo')),
                'email' => strtoupper($this->request->getPostGet('email')),
                'celular' => strtoupper($this->request->getPostGet('celular')),
                'inicial_1' => strtoupper($this->request->getPostGet('inicial_1')),
                'inicial_2' => strtoupper($this->request->getPostGet('inicial_2')),
                'pri_egb' => strtoupper($this->request->getPostGet('pri_egb')),
                'seg_egb' => strtoupper($this->request->getPostGet('seg_egb')),
                'ter_egb' => strtoupper($this->request->getPostGet('ter_egb')),
                'cuart_egb' => strtoupper($this->request->getPostGet('cuart_egb')),
                'quin_egb' => strtoupper($this->request->getPostGet('quin_egb')),
                'sex_egb' => strtoupper($this->request->getPostGet('sex_egb')),
                'sept_egb' => strtoupper($this->request->getPostGet('sept_egb')),
                'oct_egb' => strtoupper($this->request->getPostGet('oct_egb')),
                'nov_egb' => strtoupper($this->request->getPostGet('nov_egb')),
                'dec_egb' => strtoupper($this->request->getPostGet('dec_egb')),
                'pri_bach' => strtoupper($this->request->getPostGet('pri_bach')),
                'seg_bach' => strtoupper($this->request->getPostGet('seg_bach')),
                'ter_bach' => strtoupper($this->request->getPostGet('ter_bach')),
                'especialidad' => strtoupper($this->request->getPostGet('especialidad')),
                'funcion' => strtoupper($this->request->getPostGet('funcion'))
            );
            //echo '<pre>'.var_export($producto_3, true).'</pre>';exit;
            $this->prod3Model->update($id, $producto_3);

            return redirect()->to('prod_3');
        }else{

            $this->logout();
        }
    }

    public function prod3_process_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {

            $proceso = array(
                'id' => $this->request->getPostGet('id'),
                'taller_1' => $this->request->getPostGet('taller_1'),
                'taller_2' => $this->request->getPostGet('taller_2'),
                'taller_3' => $this->request->getPostGet('taller_3'),
                'taller_4' => $this->request->getPostGet('taller_4'),
                'taller_5' => $this->request->getPostGet('taller_5'),
                'taller_6' => $this->request->getPostGet('taller_6'),
                'taller_7' => $this->request->getPostGet('taller_7'),
                'clase_1' => $this->request->getPostGet('clase_1'),
                'clase_2' => $this->request->getPostGet('clase_2'),
                'clase_3' => $this->request->getPostGet('clase_3'),
                'clase_4' => $this->request->getPostGet('clase_4'),
                'clase_5' => $this->request->getPostGet('clase_5'),
                'clase_6' => $this->request->getPostGet('clase_6'),
                'otros' => $this->request->getPostGet('otros'),
                'total_otros_temas' => $this->request->getPostGet('total_otros_temas'),
                'grupo_interaprendizaje' => $this->request->getPostGet('grupo_interaprendizaje'),
                'encuentro_intercultural' => $this->request->getPostGet('encuentro_intercultural'),
                'fecha_encuentro' => $this->request->getPostGet('fecha_encuentro')
            );

            $hay = $this->varProd3Model->_getPro3Process($proceso['id']);
            //echo '<pre>'.var_export($hay, true).'</pre>';exit;
            if ($hay) {
                //Actualizo
                $this->varProd3Model->_update($proceso);
            }else{
                //Grabo
                $this->varProd3Model->_save($proceso);
            }
            
            return redirect()->to('prod_3_process');
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
