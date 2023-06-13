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
            $data['componente_3'] = $this->prod3Model->_getMisRegistros($this->session->idusuario);

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
            $data['centros'] = $this->prod3Model->_getMisAmie($this->session->idusuario);
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

            $data['componente_3'] = $this->prod3Model->_getMisRegistros($this->session->idusuario);

            $data['title']='MYRP - DYA';
            $data['main_content']='componente3/prod3_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod_3_arte($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {
            
            $data['id'] = $id;
            $data['prod3_arte'] = $this->arteProd3Model->_getProd3Arte($id);
            $data['datos'] = $this->prod3Model->find($id);

            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente3/prod3_edit_arte_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    /**
     *
     * Selecciona AMIE e ingresa Información
     *
     * @param Type void
     * @return type void
     * @throws conditon FALSE
     **/
    public function prod_3_otros_procesos() {

        echo 'Otros Procesos';
    }

    public function prod_3_lenguaje($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {
            
            $data['id'] = $id;
            $data['prod3_lenguaje'] = $this->lenguaProd3Model->_getProd3lengua($id);
            $data['datos'] = $this->prod3Model->find($id);

            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente3/prod3_edit_lenguaje_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod_3_ciudadania($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {
            
            $data['id'] = $id;
            $data['prod3_ciudad'] = $this->ciudadProd3Model->_getProd3Ciudad($id);
            $data['datos'] = $this->prod3Model->find($id);

            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente3/prod3_edit_ciudadania_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod_3_otros($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {
            
            $data['id'] = $id;
            $data['prod3_otros'] = $this->otrosProd3Model->_getProd3Otros($id);
            $data['datos'] = $this->prod3Model->find($id);

            $data['title']='MYRP - DYA';
            $data['main_content']='componente3/prod3_edit_otros_view';
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

    public function prod3_lengua_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {

            $proceso = array(
                'enfoque_sociocultural' => $this->request->getPostGet('enfoque_sociocultural'),
                'exp_dialectales' => $this->request->getPostGet('exp_dialectales'),
                'exp_oral' => $this->request->getPostGet('exp_oral'),
                'comp_lectora' => $this->request->getPostGet('comp_lectora'),
                'prod_textos' => $this->request->getPostGet('prod_textos'),
                'extrategia_prod_text' => $this->request->getPostGet('extrategia_prod_text'),
                'zapatos' => $this->request->getPostGet('zapatos'),
                'noticia' => $this->request->getPostGet('noticia'),
                'carta' => $this->request->getPostGet('carta'),
                'ninia_abeja' => $this->request->getPostGet('ninia_abeja'),
                'cuento' => $this->request->getPostGet('cuento'),
                'cuerdas' => $this->request->getPostGet('cuerdas'),
                'refranes' => $this->request->getPostGet('refranes'),
                'juegos' => $this->request->getPostGet('juegos'),
                'derechos_humanos' => $this->request->getPostGet('derechos_humanos'),
                'noticiero' => $this->request->getPostGet('noticiero'),
                'discurso' => $this->request->getPostGet('discurso'),
                'influencers' => $this->request->getPostGet('influencers'),
                'inferencias' => $this->request->getPostGet('inferencias'),
                'elefante' => $this->request->getPostGet('elefante'),
                'pitch' => $this->request->getPostGet('pitch'),
                'id_prod_3' => $this->request->getPostGet('id_prod_3'),
            );

            $hay = $this->lenguaProd3Model->_getProd3lengua($proceso['id_prod_3']);
            //echo '<pre>'.var_export($proceso, true).'</pre>';exit;
            
            if ($hay) {
                //Actualizo
                $this->lenguaProd3Model->_update($proceso);
            }else{
                //Grabo
                $this->lenguaProd3Model->_save($proceso);
            }
            
            return redirect()->to('prod_3_process');
        }else{

            $this->logout();
        }
    }

    public function prod3_arte_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {

            $proceso = array(
                'docente_autoestima' => $this->request->getPostGet('docente_autoestima'),
                'arte_usos' => $this->request->getPostGet('arte_usos'),
                'creatividad' => $this->request->getPostGet('creatividad'),
                'etapas' => $this->request->getPostGet('etapas'),
                'autorretrato_taller' => $this->request->getPostGet('autorretrato_taller'),
                'incluir_clases' => $this->request->getPostGet('incluir_clases'),
                'autorretrato_clase' => $this->request->getPostGet('autorretrato_clase'),
                'emociones' => $this->request->getPostGet('emociones'),
                'familia' => $this->request->getPostGet('familia'),
                'camiseta' => $this->request->getPostGet('camiseta'),
                'id_prod_3' => $this->request->getPostGet('id_prod_3'),
            );

            $hay = $this->arteProd3Model->_getProd3Arte($proceso['id_prod_3']);
            //echo '<pre>'.var_export($proceso, true).'</pre>';exit;
            
            if ($hay) {
                //Actualizo
                $this->arteProd3Model->_update($proceso);
            }else{
                //Grabo
                $this->arteProd3Model->_save($proceso);
            }
            
            return redirect()->to('prod_3_process');
        }else{

            $this->logout();
        }
    }

    public function prod3_ciudad_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {

            $proceso = array(
                'interculturalidad' => $this->request->getPostGet('interculturalidad'),
                'masculinidad' => $this->request->getPostGet('masculinidad'),
                'sexo_genero' => $this->request->getPostGet('sexo_genero'),
                'violencia_genero' => $this->request->getPostGet('violencia_genero'),
                'diversidad_estetica' => $this->request->getPostGet('diversidad_estetica'),
                'diversidad_neuro' => $this->request->getPostGet('diversidad_neuro'),
                'id_prod_3' => $this->request->getPostGet('id_prod_3'),
            );

            $hay = $this->ciudadProd3Model->_getProd3Ciudad($proceso['id_prod_3']);
            //echo '<pre>'.var_export($proceso, true).'</pre>';exit;
            
            if ($hay) {
                //Actualizo
                $this->ciudadProd3Model->_update($proceso);
            }else{
                //Grabo
                $this->ciudadProd3Model->_save($proceso);
            }
            
            return redirect()->to('prod_3_process');
        }else{

            $this->logout();
        }
    }

    public function prod3_otros_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {

            $proceso = array(
                'id_prod_3' => $this->request->getPostGet('id_prod_3'),
                'otros' => $this->request->getPostGet('otros'),
                'total_otros_temas' => $this->request->getPostGet('total_otros_temas'),
                'grupo_interaprendizaje' => $this->request->getPostGet('grupo_interaprendizaje'),
                'encuentro_intercultural' => $this->request->getPostGet('encuentro_intercultural'),
                'fecha_encuentro' => $this->request->getPostGet('fecha_encuentro')
            );

            $hay = $this->otrosProd3Model->_getProd3Otros($proceso['id_prod_3']);
            
            if ($hay) {
                //Actualizo
                $this->otrosProd3Model->_update($proceso);
            }else{
                //Grabo
                $this->otrosProd3Model->_save($proceso);
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
