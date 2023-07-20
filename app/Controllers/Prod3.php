<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class Prod3 extends BaseController {
    

    public function index() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {
            //$this->session->set('form_error', "Los campos con asterisco son obligatorios");
            $data['centros'] = $this->usuariosCentrosProd3Model->_getAmiesUsuarioProd3($this->session->idusuario);
            $data['cursos'] = $this->cursoModel->findAll();
            $data['mensaje'] = $this->session->form_error;
            
            //echo '<pre>'.var_export($data['centros'], true).'</pre>';exit;

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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {
            $id = $id;
            //PABLO está deshabilitado por seguridad
            //$this->prod3Model->delete($id);

            return redirect()->to('prod_3');
        }else{

            $this->logout();
        }
    }

    public function frm_procesos_prod_3() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {
            
            $data['id'] = $id;
            $data['prod3_arte'] = $this->arteProd3Model->_getProd3Arte($id);
            $data['datos'] = $this->prod3Model->find($id);
            $data['meses'] = MESES;

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

        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {
            
            //$data['centros'] = $this->prod3Model->_getCentrosEducativosProd3();
            if ($this->session->idusuario == 1 && $this->session->componente_3 == 1) {
                $data['centros'] = $this->prod3Model->_getCentrosEducativosProd3All();
            }else{
                $data['centros'] = $this->usuariosCentrosProd3Model->_getAmiesUsuarioProd3($this->session->idusuario);
            }
            
            //$data['prod3_otros'] = $this->prod3BibliotecaEncuentroModel->findAll();
            //$data['datos'] = $this->prod3Model->find($id);
            $data['meses'] = MESES;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente3/prod3_otros_process_view';
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
    public function prod3_form_biblioteca($amie) {

        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {
            
            $data['centro'] = $this->centroEducativoModel->find($amie);
            $data['meses'] = MESES;
            $data['datos'] = $this->prod3BibliotecaEncuentroModel->_getProd3BibliotecaEncuentro($amie);

            $data['title']='MYRP - DYA';
            $data['main_content']='componente3/prod3_edit_otros_procesos_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod_3_lenguaje($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {
            
            $data['id'] = $id;
            $data['prod3_lenguaje'] = $this->lenguaProd3Model->_getProd3lengua($id);
            $data['datos'] = $this->prod3Model->find($id);
            $data['meses'] = MESES;

            //echo '<pre>'.var_export($data['meses'], true).'</pre>';exit;

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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {
            
            $data['id'] = $id;
            $data['prod3_ciudad'] = $this->ciudadProd3Model->_getProd3Ciudad($id);
            $data['datos'] = $this->prod3Model->find($id);
            $data['meses'] = MESES;

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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {
            
            $data['id'] = $id;
            $data['prod3_otros'] = $this->otrosProd3Model->_getProd3Otros($id);
            $data['datos'] = $this->prod3Model->find($id);
            $data['meses'] = MESES;

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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
                'etnia' => strtoupper($this->request->getPostGet('etnia')),
                'edad' => strtoupper($this->request->getPostGet('edad')),
                'discapacidad' => strtoupper($this->request->getPostGet('discapacidad')),
                'tipo' => strtoupper($this->request->getPostGet('tipo')),
                'email' => $this->request->getPostGet('email'),
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
            
            $this->prod3Model->update($id, $producto_3);

            return redirect()->to('prod_3');
        }else{

            $this->logout();
        }
    }

    public function prod3_lengua_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {

            $proceso = array(
                'enfoque_sociocultural' => $this->request->getPostGet('enfoque_sociocultural'),
                'enfoque_sociocultural_mes' => $this->request->getPostGet('enfoque_sociocultural_mes'),
                'exp_dialectales' => $this->request->getPostGet('exp_dialectales'),
                'exp_dialectales_mes' => $this->request->getPostGet('exp_dialectales_mes'),
                'exp_oral' => $this->request->getPostGet('exp_oral'),
                'exp_oral_mes' => $this->request->getPostGet('exp_oral_mes'),
                'comp_lectora' => $this->request->getPostGet('comp_lectora'),
                'comp_lectora_mes' => $this->request->getPostGet('comp_lectora_mes'),
                'prod_textos' => $this->request->getPostGet('prod_textos'),
                'prod_textos_mes' => $this->request->getPostGet('prod_textos_mes'),
                'extrategia_prod_text' => $this->request->getPostGet('extrategia_prod_text'),
                'extrategia_prod_text_mes' => $this->request->getPostGet('extrategia_prod_text_mes'),
                'zapatos' => $this->request->getPostGet('zapatos'),
                'zapatos_mes' => $this->request->getPostGet('zapatos_mes'),
                'noticia' => $this->request->getPostGet('noticia'),
                'noticia_mes' => $this->request->getPostGet('noticia_mes'),
                'carta' => $this->request->getPostGet('carta'),
                'carta_mes' => $this->request->getPostGet('carta_mes'),
                'ninia_abeja' => $this->request->getPostGet('ninia_abeja'),
                'ninia_abeja_mes' => $this->request->getPostGet('ninia_abeja_mes'),
                'cuento' => $this->request->getPostGet('cuento'),
                'cuento_mes' => $this->request->getPostGet('cuento_mes'),
                'cuerdas' => $this->request->getPostGet('cuerdas'),
                'cuerdas_mes' => $this->request->getPostGet('cuerdas_mes'),
                'refranes' => $this->request->getPostGet('refranes'),
                'refranes_mes' => $this->request->getPostGet('refranes_mes'),
                'juegos' => $this->request->getPostGet('juegos'),
                'juegos_mes' => $this->request->getPostGet('juegos_mes'),
                'derechos_humanos' => $this->request->getPostGet('derechos_humanos'),
                'derechos_humanos_mes' => $this->request->getPostGet('derechos_humanos_mes'),
                'noticiero' => $this->request->getPostGet('noticiero'),
                'noticiero_mes' => $this->request->getPostGet('noticiero_mes'),
                'discurso' => $this->request->getPostGet('discurso'),
                'discurso_mes' => $this->request->getPostGet('discurso_mes'),
                'influencers' => $this->request->getPostGet('influencers'),
                'influencers_mes' => $this->request->getPostGet('influencers_mes'),
                'inferencias' => $this->request->getPostGet('inferencias'),
                'inferencias_mes' => $this->request->getPostGet('inferencias_mes'),
                'elefante' => $this->request->getPostGet('elefante'),
                'elefante_mes' => $this->request->getPostGet('elefante_mes'),
                'pitch' => $this->request->getPostGet('pitch'),
                'pitch_mes' => $this->request->getPostGet('pitch_mes'),
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {

            $proceso = array(
                'docente_autoestima' => $this->request->getPostGet('docente_autoestima'),
                'docente_autoestima_mes' => $this->request->getPostGet('docente_autoestima_mes'),
                'arte_usos' => $this->request->getPostGet('arte_usos'),
                'arte_usos_mes' => $this->request->getPostGet('arte_usos_mes'),
                'creatividad' => $this->request->getPostGet('creatividad'),
                'creatividad_mes' => $this->request->getPostGet('creatividad_mes'),
                'etapas' => $this->request->getPostGet('etapas'),
                'etapas_mes' => $this->request->getPostGet('etapas_mes'),
                'autorretrato_taller' => $this->request->getPostGet('autorretrato_taller'),
                'autorretrato_taller_mes' => $this->request->getPostGet('autorretrato_taller_mes'),
                'incluir_clases' => $this->request->getPostGet('incluir_clases'),
                'incluir_clases_mes' => $this->request->getPostGet('incluir_clases_mes'),
                'autorretrato_clase' => $this->request->getPostGet('autorretrato_clase'),
                'autorretrato_clase_mes' => $this->request->getPostGet('autorretrato_clase_mes'),
                'emociones' => $this->request->getPostGet('emociones'),
                'emociones_mes' => $this->request->getPostGet('emociones_mes'),
                'familia' => $this->request->getPostGet('familia'),
                'familia_mes' => $this->request->getPostGet('familia_mes'),
                'camiseta' => $this->request->getPostGet('camiseta'),
                'camiseta_mes' => $this->request->getPostGet('camiseta_mes'),
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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

                'interculturalidad_mes' => $this->request->getPostGet('interculturalidad_mes'),
                'masculinidad_mes' => $this->request->getPostGet('masculinidad_mes'),
                'sexo_genero_mes' => $this->request->getPostGet('sexo_genero_mes'),
                'violencia_genero_mes' => $this->request->getPostGet('violencia_genero_mes'),
                'diversidad_estetica_mes' => $this->request->getPostGet('diversidad_estetica_mes'),
                'diversidad_neuro_mes' => $this->request->getPostGet('diversidad_neuro_mes'),
                
                'racismo_clase_ciu' => $this->request->getPostGet('racismo_clase_ciu'),
                'rechazo_clase_ciu' => $this->request->getPostGet('rechazo_clase_ciu'),

                'racismo_clase_ciu_mes' => $this->request->getPostGet('racismo_clase_ciu_mes'),
                'rechazo_clase_ciu_mes' => $this->request->getPostGet('rechazo_clase_ciu_mes'),

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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {

            $proceso = array(
                'id_prod_3' => $this->request->getPostGet('id_prod_3'),
                'grupo_interaprendizaje' => $this->request->getPostGet('grupo_interaprendizaje'),
                'tema_grupo_inter' => $this->request->getPostGet('tema_grupo_inter'),
                'fecha_grupo_inter' => $this->request->getPostGet('fecha_grupo_inter'),
                
                'tema_1' => $this->request->getPostGet('tema_1'),
                'tema_2' => $this->request->getPostGet('tema_2'),
                'tema_3' => $this->request->getPostGet('tema_3'),
                'tema_4' => $this->request->getPostGet('tema_4'),
                'tema_5' => $this->request->getPostGet('tema_5'),
                'tema_6' => $this->request->getPostGet('tema_6'),

                'fecha_tema_1' => $this->request->getPostGet('fecha_tema_1'),
                'fecha_tema_2' => $this->request->getPostGet('fecha_tema_2'),
                'fecha_tema_3' => $this->request->getPostGet('fecha_tema_3'),
                'fecha_tema_4' => $this->request->getPostGet('fecha_tema_4'),
                'fecha_tema_5' => $this->request->getPostGet('fecha_tema_5'),
                'fecha_tema_6' => $this->request->getPostGet('fecha_tema_6'),

                
                'visita_biblioteca_viajera' => $this->request->getPostGet('visita_biblioteca_viajera'),
                'fecha_visita_biblioteca_viajera' => $this->request->getPostGet('fecha_visita_biblioteca_viajera')
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

    public function prod3_biblioteca_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {

            //Creo la ruta
            $amie = $this->request->getPostGet('amie');
            $ruta = './public/images/evidencias/'.$amie.'/';

            //Recibo el archivo primera_visita_evidencia
            $primera_visita_evidencia_file = $this->request->getFile('primera_visita_evidencia');
            $primera_visita_evidenciaName = '';
            if (!$primera_visita_evidencia_file->isValid()) {
                //SI NO ES VÁLIDO PASO VACÍO AL NOMBRE
                $$primera_visita_evidenciaName = '';

            }else{
                //AQUI DEBERÍA CORRER LA VALIDACION de tipo, verificar si ya hay una imagen borrarla y cargar la nueva, etc
                
                //Muevo el archjivo del temporal a la carpeta
                $primera_visita_evidenciaName = $amie."_primera_visita.jpg";
                $primera_visita_evidencia_file->move($ruta, $primera_visita_evidenciaName, true);
                

                $this->image->withFile($ruta.$primera_visita_evidenciaName)
                    ->convert(IMAGETYPE_JPEG)
                    ->save($ruta.$primera_visita_evidenciaName);

                if ($primera_visita_evidencia_file->hasMoved()) {
                    //Si se copió al server obtengo el nombre del archivo, lo renombro y mando el nombre para que sea guardado
                    $primera_visita_evidenciaName = $primera_visita_evidenciaName;
                }else{
                    //Si NO se copió le asigno vacío al nombre
                    $primera_visita_evidenciaName = '';
                }
            }


            //Recibo el archivo segunda_visita_evidencia
            $segunda_visita_evidencia_file = $this->request->getFile('segunda_visita_evidencia');
            $segunda_visita_evidenciaName = '';
            if (!$segunda_visita_evidencia_file->isValid()) {
                //SI NO ES VÁLIDO PASO VACÍO AL NOMBRE
                $$segunda_visita_evidenciaName = '';

            }else{
                //AQUI DEBERÍA CORRER LA VALIDACION de tipo, verificar si ya hay una imagen borrarla y cargar la nueva, etc
                
                //Muevo el archjivo del temporal a la carpeta
                $segunda_visita_evidenciaName = $amie."_segunda_visita.jpg";
                $segunda_visita_evidencia_file->move($ruta, $segunda_visita_evidenciaName, true);
                

                $this->image->withFile($ruta.$segunda_visita_evidenciaName)
                    ->convert(IMAGETYPE_JPEG)
                    ->save($ruta.$segunda_visita_evidenciaName);

                if ($segunda_visita_evidencia_file->hasMoved()) {
                    //Si se copió al server obtengo el nombre del archivo, lo renombro y mando el nombre para que sea guardado
                    $segunda_visita_evidenciaName = $segunda_visita_evidenciaName;
                }else{
                    //Si NO se copió le asigno vacío al nombre
                    $segunda_visita_evidenciaName = '';
                }
            }

            //Recibo el archivo tercera_visita_evidencia
            $tercera_visita_evidencia_file = $this->request->getFile('tercera_visita_evidencia');
            $tercera_visita_evidenciaName = '';
            if (!$tercera_visita_evidencia_file->isValid()) {
                //SI NO ES VÁLIDO PASO VACÍO AL NOMBRE
                $$tercera_visita_evidenciaName = '';

            }else{
                //AQUI DEBERÍA CORRER LA VALIDACION de tipo, verificar si ya hay una imagen borrarla y cargar la nueva, etc
                
                //Muevo el archjivo del temporal a la carpeta
                $tercera_visita_evidenciaName = $amie."_tercera_visita.jpg";
                $tercera_visita_evidencia_file->move($ruta, $tercera_visita_evidenciaName, true);
                

                $this->image->withFile($ruta.$tercera_visita_evidenciaName)
                    ->convert(IMAGETYPE_JPEG)
                    ->save($ruta.$tercera_visita_evidenciaName);

                if ($tercera_visita_evidencia_file->hasMoved()) {
                    //Si se copió al server obtengo el nombre del archivo, lo renombro y mando el nombre para que sea guardado
                    $tercera_visita_evidenciaName = $tercera_visita_evidenciaName;
                }else{
                    //Si NO se copió le asigno vacío al nombre
                    $tercera_visita_evidenciaName = '';
                }
            }
            
            //Recibo el archivo expo_trabajos_evidencia
            $expo_trabajos_evidencia_file = $this->request->getFile('expo_trabajos_evidencia');
            $expoTrabajoName = '';

             //Verifico que sea válido
            if (!$expo_trabajos_evidencia_file->isValid()) {
                //SI NO ES VÁLIDO PASO VACÍO AL NOMBRE
                $expoTrabajoName = '';

            }else{
                //AQUI DEBERÍA CORRER LA VALIDACION de tipo, verificar si ya hay una imagen borrarla y cargar la nueva, etc

                //Muevo el archjivo del temporal a la carpeta
                $expoTrabajoName = $amie."_expo_trabajo.jpg";
                $expo_trabajos_evidencia_file->move($ruta, $expoTrabajoName, true);

                $this->image->withFile($ruta.$expoTrabajoName)
                    ->convert(IMAGETYPE_JPEG)
                    ->save($ruta.$expoTrabajoName);

                if ($expo_trabajos_evidencia_file->hasMoved()) {

                    //Si se copió al server obtengo el nombre del archivo, lo renombro y mando el nombre para que sea guardado
                    $expoTrabajoName = $expoTrabajoName;
                }else{
                    //Si NO se copió le asigno vacío al nombre
                    $expoTrabajoName = '';
                }
            }

            //Recibo el archivo exp_oral_evidencia
            $exp_oral_evidencia_file = $this->request->getFile('exp_oral_evidencia');
            $exp_oral_evidenciaName = '';
            if (!$exp_oral_evidencia_file->isValid()) {
                //SI NO ES VÁLIDO PASO VACÍO AL NOMBRE
                $$exp_oral_evidenciaName = '';

            }else{
                //AQUI DEBERÍA CORRER LA VALIDACION de tipo, verificar si ya hay una imagen borrarla y cargar la nueva, etc
                
                //Muevo el archjivo del temporal a la carpeta
                $exp_oral_evidenciaName = $amie."_expo_oral.jpg";
                $exp_oral_evidencia_file->move($ruta, $exp_oral_evidenciaName, true);
                

                $this->image->withFile($ruta.$exp_oral_evidenciaName)
                    ->convert(IMAGETYPE_JPEG)
                    ->save($ruta.$exp_oral_evidenciaName);

                if ($exp_oral_evidencia_file->hasMoved()) {
                    //Si se copió al server obtengo el nombre del archivo, lo renombro y mando el nombre para que sea guardado
                    $exp_oral_evidenciaName = $exp_oral_evidenciaName;
                }else{
                    //Si NO se copió le asigno vacío al nombre
                    $exp_oral_evidenciaName = '';
                }
            }

            //Recibo el archivo exp_escr_grafica_evidencia
            $exp_escr_grafica_evidencia_file = $this->request->getFile('exp_escr_grafica_evidencia');
            if (!$exp_escr_grafica_evidencia_file->isValid()) {

                //SI NO ES VÁLIDO PASO VACÍO AL NOMBRE
                $exp_escr_grafica_evidenciaName = '';

            }else{
                //AQUI DEBERÍA CORRER LA VALIDACION de tipo, verificar si ya hay una imagen borrarla y cargar la nueva, etc

                $exp_escr_grafica_evidenciaName = $amie."_exp_escr_grafica.jpg";
                $exp_escr_grafica_evidencia_file->move($ruta, $exp_escr_grafica_evidenciaName, true);
                

                $this->image->withFile($ruta.$exp_escr_grafica_evidenciaName)
                    ->convert(IMAGETYPE_JPEG)
                    ->save($ruta.$exp_escr_grafica_evidenciaName);

                if ($exp_escr_grafica_evidencia_file->hasMoved()) {
                    //Si se copió al server obtengo el nombre del archivo, lo renombro y mando el nombre para que sea guardado
                    $exp_escr_grafica_evidenciaName = $exp_escr_grafica_evidenciaName;
                }else{
                    //Si NO se copió le asigno vacío al nombre
                    $exp_escr_grafica_evidenciaName = '';
                }
            }

            //Recibo el archivo part_docentes_evidencia
            $part_docentes_evidencia_file = $this->request->getFile('part_docentes_evidencia');
            if (!$part_docentes_evidencia_file->isValid()) {

                //SI NO ES VÁLIDO PASO VACÍO AL NOMBRE
                $part_docentes_evidenciaName = '';

            }else{
                //AQUI DEBERÍA CORRER LA VALIDACION de tipo, verificar si ya hay una imagen borrarla y cargar la nueva, etc

                //Muevo el archjivo del temporal a la carpeta
                $part_docentes_evidenciaName = $amie."_part_docentes_evidencia.jpg";
                $part_docentes_evidencia_file->move($ruta, $part_docentes_evidenciaName, true);
                

                $this->image->withFile($ruta.$part_docentes_evidenciaName)
                    ->convert(IMAGETYPE_JPEG)
                    ->save($ruta.$part_docentes_evidenciaName);

                if ($part_docentes_evidencia_file->hasMoved()) {
                    //Si se copió al server obtengo el nombre del archivo, lo renombro y mando el nombre para que sea guardado
                    $part_docentes_evidenciaName = $part_docentes_evidenciaName;
                }else{
                    //Si NO se copió le asigno vacío al nombre
                    $part_docentes_evidenciaName = '';
                }
            }

            //Recibo el archivo part_docentes_evidencia
            $part_padres_evidencia_file = $this->request->getFile('part_padres_evidencia');
            if (!$part_padres_evidencia_file->isValid()) {

                //SI NO ES VÁLIDO PASO VACÍO AL NOMBRE
                $part_padres_evidenciaName = '';

            }else{
                //AQUI DEBERÍA CORRER LA VALIDACION de tipo, verificar si ya hay una imagen borrarla y cargar la nueva, etc

                //Muevo el archjivo del temporal a la carpeta
                $part_padres_evidenciaName = $amie."_part_padres_evidencia.jpg";
                $part_padres_evidencia_file->move($ruta, $part_padres_evidenciaName, true);

                $this->image->withFile($ruta.$part_padres_evidenciaName)
                    ->convert(IMAGETYPE_JPEG)
                    ->save($ruta.$part_padres_evidenciaName);

                if ($part_padres_evidencia_file->hasMoved()) {
                    //Si se copió al server obtengo el nombre del archivo, lo renombro y mando el nombre para que sea guardado
                    $part_padres_evidenciaName = $part_padres_evidenciaName;
                }else{
                    //Si NO se copió le asigno vacío al nombre
                    $part_padres_evidenciaName = '';
                }
            }

            $proceso = array(
                'amie' => $this->request->getPostGet('amie'),
                'primera_visita' => $this->request->getPostGet('primera_visita'),
                'fecha_primera_visita' => $this->request->getPostGet('fecha_primera_visita'),
                'primera_visita_evidencia' => $primera_visita_evidenciaName,
                'segunda_visita' => $this->request->getPostGet('segunda_visita'),
                'fecha_segunda_visita' => $this->request->getPostGet('fecha_segunda_visita'),
                'segunda_visita_evidencia' => $segunda_visita_evidenciaName,
                'tercera_visita' => $this->request->getPostGet('tercera_visita'),
                'fecha_tercera_visita' => $this->request->getPostGet('fecha_tercera_visita'),
                'tercera_visita_evidencia' => $tercera_visita_evidenciaName,

                'encuentro_intercultural' => $this->request->getPostGet('encuentro_intercultural'),
                'fecha_encuentro' => $this->request->getPostGet('fecha_encuentro'),
                'expo_trabajos' => $this->request->getPostGet('expo_trabajos'),
                'expo_trabajos_evidencia' => $expoTrabajoName,
                'exp_oral' => $this->request->getPostGet('exp_oral'),
                'exp_oral_evidencia' => $exp_oral_evidenciaName,
                'exp_escr_grafica' => $this->request->getPostGet('exp_escr_grafica'),
                'exp_escr_grafica_evidencia' => $exp_escr_grafica_evidenciaName,
                'part_docentes' => $this->request->getPostGet('part_docentes'),
                'part_docentes_evidencia' => $part_docentes_evidenciaName,
                'part_padres' => $this->request->getPostGet('part_padres'),
                'part_padres_evidencia' => $part_padres_evidenciaName,
            );

            $hay = $this->prod3BibliotecaEncuentroModel->_getProd3BibliotecaEncuentro($proceso['amie']);

            if ($hay) {
                //Actualizo
                $this->prod3BibliotecaEncuentroModel->_update($proceso);
            }else{
                //Grabo
                $this->prod3BibliotecaEncuentroModel->_save($proceso);
            }
            
            return redirect()->to('prod-3-otros-procesos');
        }else{

            $this->logout();
        }
    }

    public function logout(){
        //destruyo la session  y salgo

        $user = [
            'id' => $this->session->idusuario,
            'is_logged' => 0
        ];
        
        $this->usuarioModel->save($user);
        $this->session->destroy();
        return redirect()->to('/');
    }
}
