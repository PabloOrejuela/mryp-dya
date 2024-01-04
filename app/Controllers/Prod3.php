<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;


class Prod3 extends BaseController {
    

    public function index() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {
            $this->session->set('form_error', "");

            //echo '<pre>'.var_export($data, true).'</pre>';exit;
            if ($data['idrol'] == 1 || $data['idrol'] == 3 || $data['idrol'] == 10) {
                $data['componente_3'] = $this->prod3Model->_getAllRegistros();
            }else if($data['idrol'] == 7){
                $data['componente_3'] = $this->prod3Model->_getMisRegistros($this->session->idusuario);
            }
            //Corrijo las cédulas de todos los registros
            //$this->corrijeCedulas();
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
            
            if ($data['idrol'] == 1 || $data['idrol'] == 3 || $data['idrol'] == 10) {
                $data['centros'] = $this->usuariosCentrosProd3Model->_getAmiesProd3();
            }else if($data['idrol'] == 7){
                $data['centros'] = $this->usuariosCentrosProd3Model->_getAmiesUsuarioProd3($this->session->idusuario);
            }

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
            
            if ($data['idrol'] == 1 || $data['idrol'] == 3 || $data['idrol'] == 10) {
                $data['componente_3'] = $this->prod3Model->_getAllRegistros();
            }else if($data['idrol'] == 7){
                $data['componente_3'] = $this->prod3Model->_getMisRegistros($this->session->idusuario);
            }

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

    public function prod_3_descargar_registros(){

        $registros = $this->prod3Model->_getAllRegistrosExcel();
        //echo '<pre>'.var_export($registros, true).'</pre>';exit;
        $fila = 2;

        //Creo la hoja
        $phpExcel = new Spreadsheet();
        $phpExcel
            ->getProperties()
            ->setCreator("MYRP")
            ->setLastModifiedBy('Pablo Orejuela') // última vez modificado por
            ->setTitle('Prod 3 - Registros')
            ->setSubject('Reportes MYRP')
            ->setDescription('Reporte con los registros del Producto 3')
            ->setKeywords('etiquetas o palabras clave separadas por espacios')
            ->setCategory('Registros');

        $nombreDelDocumento = "Prod 3 - Registros.xlsx";

        //Selecciono la pestaña
        $hoja = $phpExcel->getActiveSheet();

        $styleCabecera = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ]
        ];

        $styleFila = [
            'font' => [
                'bold' => false,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ]
        ];

        $phpExcel->getActiveSheet()->getStyle('A1:N1')->applyFromArray($styleCabecera);

        //Edito la info que va a ir en el archivo excel
        $hoja->setCellValue('A1', "AMIE");
        $hoja->setCellValue('B1', "CENTRO EDUCATIVO");
        $hoja->setCellValue('C1', "CIUDAD");
        $hoja->setCellValue('D1', "PROVINCIA");
        $hoja->setCellValue('E1', "NOMBRE");
        $hoja->setCellValue('F1', "DOCUMENTO");
        $hoja->setCellValue('G1', "NACIONALIDAD");
        $hoja->setCellValue('H1', "ETNIA");
        $hoja->setCellValue('I1', "EDAD");
        $hoja->setCellValue('J1', "GÉNERO");
        $hoja->setCellValue('K1', "DISCAPACIDAD");
        $hoja->setCellValue('L1', "TIPO DISCAPACIDAD");
        $hoja->setCellValue('M1', "TELEFONO");
        $hoja->setCellValue('N1', "EMAIL");

        foreach ($registros as $key => $value) {
            $phpExcel->getActiveSheet()->getStyle('A'.$fila.':Z'.$fila)->applyFromArray($styleFila);
            $hoja->setCellValue('A'.$fila, $value->amie);
            $hoja->setCellValue('B'.$fila, $value->ce);
            $hoja->setCellValue('C'.$fila, $value->ciudad);
            $hoja->setCellValue('D'.$fila, $value->provincia);
            $hoja->setCellValue('E'.$fila, $value->nombre);
            $hoja->setCellValue('F'.$fila, $value->documento);
            $hoja->setCellValue('G'.$fila, $value->nacionalidad);
            $hoja->setCellValue('H'.$fila, $value->etnia);
            $hoja->setCellValue('I'.$fila, $value->edad);
            $hoja->setCellValue('J'.$fila, $value->genero);
            $hoja->setCellValue('K'.$fila, $value->discapacidad);
            $hoja->setCellValue('L'.$fila, $value->tipo);
            $hoja->setCellValue('M'.$fila, $value->celular);
            $hoja->setCellValue('N'.$fila, $value->email);


            $fila++;
        }

        //Creo el writter y guardo la hoja
        
        $writter = new XlsxWriter($phpExcel, 'Xlsx');
        
        //Cabeceras para descarga
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
        header('Cache-Control: max-age=0');
        
        $r = $writter->save('php://output');exit;
        if ($r) {
            return redirect()->to('cargar_info_view');
        }else{
            $error = 'Hubo un error u no se pudo descargar';
            return redirect()->to('cargar_info_view');
        }        
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

    public function corrijeCedulas() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1 && $this->session->idrol ==1 ) {
            $num = 0;
            $registro = $this->prod3Model->findAll();
            //echo '<pre>'.var_export($registro, true).'</pre>';exit;
            foreach ($registro as $key => $value) {
                
                if (strlen($value->documento) <= 9) {
                    $id = $value->id;
                    $obj = [
                        'id' => $value->id,
                        'documento' => '0'.$value->documento,
                    ];
                    
                    $this->prod3Model->_updateCedula($obj);
                }
            }
            return redirect()->to('prod_3');
        }
    }

    public function descargaRegistrosProcesos(){
        ini_set('memory_limit', '256M');

        $registros = $this->prod3Model->_getAllRegistrosExcel();
        //echo '<pre>'.var_export($registros, true).'</pre>';exit;
        $fila = 1;

        //Creo la hoja
        $phpExcel = new Spreadsheet();
        $phpExcel
            ->getProperties()
            ->setCreator("Pablo Orejuela")
            ->setLastModifiedBy('Pablo Orejuela') // última vez modificado por
            ->setTitle('Prod 3 - Registros')
            ->setSubject('Reportes MYRP')
            ->setDescription('Reporte con los registros del Prod 3')
            ->setKeywords('etiquetas o palabras clave separadas por espacios')
            ->setCategory('Registros');

        $nombreDelDocumento = "Prod 3 - Registros y procesos.xlsx";

        //Selecciono la pestaña
        $hoja = $phpExcel->getActiveSheet();

        $styleCabecera = [
            'font' => [
                'bold' => true,
                'size' => 10
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ]
        ];

        $styleFila = [
            'font' => [
                'bold' => false,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ]
        ];

        $styleFilaProcess = [
            'font' => [
                'bold' => false,
                'size' => 10
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ]
        ];

        $phpExcel->getActiveSheet()->getStyle('A'.$fila.':EZ'.$fila)->applyFromArray($styleCabecera);
        

        $hoja->setCellValue('A'.$fila, "REGISTROS");
        $phpExcel->getActiveSheet()->mergeCells('A'.$fila.':AF'.$fila);
        $phpExcel->getActiveSheet()->getStyle('A'.$fila.':AF'.$fila)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('a1ccd4');

        $hoja->setCellValue('AG'.$fila, "EXPRESIÓN ARTÍSTICA (TALLERES)");
        $phpExcel->getActiveSheet()->mergeCells('AG'.$fila.':AR'.$fila);
        $phpExcel->getActiveSheet()->getStyle('AG'.$fila.':AR'.$fila)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('afd6a7');

        $hoja->setCellValue('AS'.$fila, "EXPRESIÓN ARTÍSTICA (CLASES)");
        $phpExcel->getActiveSheet()->mergeCells('AS'.$fila.':AZ'.$fila);
        $phpExcel->getActiveSheet()->getStyle('AS'.$fila.':AZ'.$fila)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('b7a2da');

        $hoja->setCellValue('BA'.$fila, "LENGUAJE (TALLERES)");
        $phpExcel->getActiveSheet()->mergeCells('BA'.$fila.':BL'.$fila);
        $phpExcel->getActiveSheet()->getStyle('BA'.$fila.':BL'.$fila)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('fda68c');

        $hoja->setCellValue('BM'.$fila, "LENGUAJE (CLASES)");
        $phpExcel->getActiveSheet()->mergeCells('BM'.$fila.':CP'.$fila);
        $phpExcel->getActiveSheet()->getStyle('BM'.$fila.':CP'.$fila)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f4ca70');

        $hoja->setCellValue('CQ'.$fila, "OTROS");
        $phpExcel->getActiveSheet()->mergeCells('CQ'.$fila.':DK'.$fila);
        $phpExcel->getActiveSheet()->getStyle('CQ'.$fila.':DK'.$fila)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f2f1b1');


        $fila = 2;
        $phpExcel->getActiveSheet()->getStyle('A'.$fila.':DK'.$fila)->applyFromArray($styleCabecera);
        //Edito la info que va a ir en el archivo excel
        $hoja->setCellValue('A'.$fila, "AMIE");
        $hoja->setCellValue('B'.$fila, "CENTRO EDUCATIVO");
        $hoja->setCellValue('C'.$fila, "CIUDAD");
        $hoja->setCellValue('D'.$fila, "PROVINCIA");
        $hoja->setCellValue('E'.$fila, "AÑO LECTIVO");
        $hoja->setCellValue('F'.$fila, "NOMBRES");
        $hoja->setCellValue('G'.$fila, "DOCUMENTO");
        $hoja->setCellValue('H'.$fila, "NACIONALIDAD");
        $hoja->setCellValue('I'.$fila, "GÉNERO");
        $hoja->setCellValue('J'.$fila, "EDAD");
        $hoja->setCellValue('K'.$fila, "ETNIA");
        $hoja->setCellValue('L'.$fila, "DISCAPACIDAD");
        $hoja->setCellValue('M'.$fila, "TIPO DISCAPACIDAD");
        $hoja->setCellValue('N'.$fila, "EMAIL");
        $hoja->setCellValue('O'.$fila, "CELULAR");
        $hoja->setCellValue('P'.$fila, "INICIAL 1");
        $hoja->setCellValue('Q'.$fila, "INICIAL 2");
        $hoja->setCellValue('R'.$fila, "1RO EGB");
        $hoja->setCellValue('S'.$fila, "2do EGB");
        $hoja->setCellValue('T'.$fila, "3ro EGB");
        $hoja->setCellValue('U'.$fila, "4to EGB");
        $hoja->setCellValue('V'.$fila, "5to EGB");
        $hoja->setCellValue('W'.$fila, "6to EGB");
        $hoja->setCellValue('X'.$fila, "7mo EGB");
        $hoja->setCellValue('Y'.$fila, "8vo EGB");
        $hoja->setCellValue('Z'.$fila, "9no EGB");
        $hoja->setCellValue('AA'.$fila, "10mo EGB");
        $hoja->setCellValue('AB'.$fila, "1ro BACH");
        $hoja->setCellValue('AC'.$fila, "2do BACH");
        $hoja->setCellValue('AD'.$fila, "3ro BACH");
        $hoja->setCellValue('AE'.$fila, "ESPECIALIDAD");
        $hoja->setCellValue('AF'.$fila, "FUNCION");
        
        //EXP ARTITICA
        $hoja->setCellValue('AG'.$fila, "Docente y Autoestima");
        $hoja->setCellValue('AH'.$fila, "MES");
        $hoja->setCellValue('AI'.$fila, "Arte y sus usos");
        $hoja->setCellValue('AJ'.$fila, "MES");
        $hoja->setCellValue('AK'.$fila, "Creatiidad");
        $hoja->setCellValue('AL'.$fila, "MES");
        $hoja->setCellValue('AM'.$fila, "Etapas de desarrollo artístico en los niños");
        $hoja->setCellValue('AN'.$fila, "MES");
        $hoja->setCellValue('AO'.$fila, "Clase de arte: Autorretrato");
        $hoja->setCellValue('AP'.$fila, "MES");
        $hoja->setCellValue('AQ'.$fila, "Incluir el arte en nuestras clases");
        $hoja->setCellValue('AR'.$fila, "MES");
        $hoja->setCellValue('AS'.$fila, "Autorretrato");
        $hoja->setCellValue('AT'.$fila, "MES");
        $hoja->setCellValue('AU'.$fila, "Emociones");
        $hoja->setCellValue('AV'.$fila, "MES");
        $hoja->setCellValue('AW'.$fila, "La familia");
        $hoja->setCellValue('AX'.$fila, "MES");
        $hoja->setCellValue('AY'.$fila, "La camiseta");
        $hoja->setCellValue('AZ'.$fila, "MES");

        //LENGUAJE
        $hoja->setCellValue('BA'.$fila, "Enfoque sociocultural para la enseñanza de la lectura y escritura");
        $hoja->setCellValue('BB'.$fila, "MES");
        $hoja->setCellValue('BC'.$fila, "Comunicación Oral: Expresiones Dialectales.");
        $hoja->setCellValue('BD'.$fila, "MES");
        $hoja->setCellValue('BE'.$fila, "Comunicación Oral: Desarrollo de la expresión oral.");
        $hoja->setCellValue('BF'.$fila, "MES");
        $hoja->setCellValue('BG'.$fila, "Comprensión Lectora");
        $hoja->setCellValue('BH'.$fila, "MES");
        $hoja->setCellValue('BI'.$fila, "Producción de textos");
        $hoja->setCellValue('BJ'.$fila, "MES");
        $hoja->setCellValue('BK'.$fila, "Estrategias de producción de textos");
        $hoja->setCellValue('BL'.$fila, "MES");
        $hoja->setCellValue('BM'.$fila, "Los zapatos");
        $hoja->setCellValue('BN'.$fila, "MES");
        $hoja->setCellValue('BO'.$fila, "La noticia");
        $hoja->setCellValue('BP'.$fila, "MES");
        $hoja->setCellValue('BQ'.$fila, "La carta");
        $hoja->setCellValue('BR'.$fila, "MES");
        $hoja->setCellValue('BS'.$fila, "La niña y la abeja");
        $hoja->setCellValue('BT'.$fila, "MES");
        $hoja->setCellValue('BU'.$fila, "El cuento");
        $hoja->setCellValue('BV'.$fila, "MES");
        $hoja->setCellValue('BW'.$fila, "Cuerdas");
        $hoja->setCellValue('BX'.$fila, "MES");
        $hoja->setCellValue('BY'.$fila, "Los refranes");
        $hoja->setCellValue('BZ'.$fila, "MES");
        $hoja->setCellValue('CA'.$fila, "Juegos tradicionales");
        $hoja->setCellValue('CB'.$fila, "MES");
        $hoja->setCellValue('CC'.$fila, "Los derechos humanos");
        $hoja->setCellValue('CD'.$fila, "MES");
        $hoja->setCellValue('CE'.$fila, "El noticiero");
        $hoja->setCellValue('CF'.$fila, "MES");
        $hoja->setCellValue('CG'.$fila, "El discurso");
        $hoja->setCellValue('CH'.$fila, "MES");
        $hoja->setCellValue('CI'.$fila, "Influencers");
        $hoja->setCellValue('CJ'.$fila, "MES");
        $hoja->setCellValue('CK'.$fila, "Inferencias");
        $hoja->setCellValue('CL'.$fila, "MES");
        $hoja->setCellValue('CM'.$fila, "El elefante");
        $hoja->setCellValue('CN'.$fila, "MES");
        $hoja->setCellValue('CO'.$fila, "El pitch");
        $hoja->setCellValue('CP'.$fila, "MES");


        //CIUDADANIA
        $hoja->setCellValue('CQ'.$fila, "Ciudadanía y diversidad 1");
        $hoja->setCellValue('CR'.$fila, "MES");
        $hoja->setCellValue('CS'.$fila, "Ciudadanía y diversidad 2");
        $hoja->setCellValue('CT'.$fila, "MES");
        $hoja->setCellValue('CU'.$fila, "Diversidad de sexo / genéricas");
        $hoja->setCellValue('CV'.$fila, "MES");
        $hoja->setCellValue('CW'.$fila, "Violencias basadas en género y ciudadanía");
        $hoja->setCellValue('CX'.$fila, "MES");
        $hoja->setCellValue('CY'.$fila, "Diversidades estéticas");
        $hoja->setCellValue('CZ'.$fila, "MES");
        $hoja->setCellValue('DA'.$fila, "Diversidades neurodivergentes y ciudadanía");
        $hoja->setCellValue('DB'.$fila, "MES");
        $hoja->setCellValue('DC'.$fila, "El Racismo");
        $hoja->setCellValue('DD'.$fila, "MES");
        $hoja->setCellValue('DE'.$fila, "El rechazo y la discriminación");
        $hoja->setCellValue('DF'.$fila, "MES");

        //OTROS
        $hoja->setCellValue('DG'.$fila, "Grupo Inter - aprendizaje");
        $hoja->setCellValue('DH'.$fila, "Tema");
        $hoja->setCellValue('DI'.$fila, "Fecha del Grupo Inter - aprendizaje");
        $hoja->setCellValue('DJ'.$fila, "Visita a la Biblioteca Viajera");
        $hoja->setCellValue('DK'.$fila, "Fecha de la visita a la Biblioteca Viajera");

        $fila = 3;
        //echo '<pre>'.var_export($registros, true).'</pre>';exit;
        foreach ($registros as $key => $value) {
            $fechaEntero = strtotime($value->fecha);
            $aniolectivo = date("Y", $fechaEntero);
            //echo $value->id.'<br>';
            $expArtistica = $this->arteProd3Model->_getProd3Arte($value->id);
            $lenguaje = $this->lenguaProd3Model->_getProd3lengua($value->id);
            $ciudadania = $this->ciudadProd3Model->_getProd3Ciudad($value->id);
            $otros = $this->otrosProd3Model->_getProd3Otros($value->id);

            //echo '<pre>'.var_export($aniolectivo, true).'</pre>';exit;
            $phpExcel->getActiveSheet()->getStyle('D'.$fila.':AZ'.$fila)->applyFromArray($styleFila);
            $phpExcel->getActiveSheet()->getStyle('AB'.$fila.':EI'.$fila)->applyFromArray($styleFilaProcess);
            $hoja->setCellValue('A'.$fila, $value->amie);
            $hoja->setCellValue('B'.$fila, $value->ce);
            $hoja->setCellValue('C'.$fila, $value->ciudad);
            $hoja->setCellValue('D'.$fila, $value->provincia);
            $hoja->setCellValue('E'.$fila, $aniolectivo);
            $hoja->setCellValue('F'.$fila, $value->nombre);
            $hoja->setCellValue('G'.$fila, $value->documento);
            $hoja->setCellValue('H'.$fila, $value->nacionalidad);
            $hoja->setCellValue('I'.$fila, $value->genero);
            $hoja->setCellValue('J'.$fila, $value->edad);
            $hoja->setCellValue('K'.$fila, $value->etnia);
            $hoja->setCellValue('L'.$fila, $value->discapacidad);
            $hoja->setCellValue('M'.$fila, $value->tipo);
            $hoja->setCellValue('N'.$fila, $value->email);
            $hoja->setCellValue('O'.$fila, $value->celular);
            $hoja->setCellValue('P'.$fila, $value->inicial_1);
            $hoja->setCellValue('Q'.$fila, $value->inicial_2);
            $hoja->setCellValue('R'.$fila, $value->pri_egb);
            $hoja->setCellValue('S'.$fila, $value->seg_egb);
            $hoja->setCellValue('T'.$fila, $value->ter_egb);
            $hoja->setCellValue('U'.$fila, $value->cuart_egb);
            $hoja->setCellValue('V'.$fila, $value->quin_egb);
            $hoja->setCellValue('W'.$fila, $value->sex_egb);
            $hoja->setCellValue('X'.$fila, $value->sept_egb);
            $hoja->setCellValue('Y'.$fila, $value->oct_egb);
            $hoja->setCellValue('Z'.$fila, $value->nov_egb);
            $hoja->setCellValue('AA'.$fila, $value->dec_egb);
            $hoja->setCellValue('AB'.$fila, $value->pri_bach);
            $hoja->setCellValue('AC'.$fila, $value->seg_bach);
            $hoja->setCellValue('AD'.$fila, $value->ter_bach);
            $hoja->setCellValue('AE'.$fila, $value->especialidad);
            $hoja->setCellValue('AF'.$fila, $value->funcion);
            

            //EXP ARTITICA
            if ($expArtistica) {
                $hoja->setCellValue('AG'.$fila, $expArtistica->docente_autoestima);
                $hoja->setCellValue('AH'.$fila, $expArtistica->docente_autoestima_mes);
                $hoja->setCellValue('AI'.$fila, $expArtistica->arte_usos);
                $hoja->setCellValue('AJ'.$fila, $expArtistica->arte_usos_mes);
                $hoja->setCellValue('AK'.$fila, $expArtistica->creatividad);
                $hoja->setCellValue('AL'.$fila, $expArtistica->creatividad_mes);
                $hoja->setCellValue('AM'.$fila, $expArtistica->etapas);
                $hoja->setCellValue('AN'.$fila, $expArtistica->etapas_mes);
                $hoja->setCellValue('AO'.$fila, $expArtistica->autorretrato_taller);
                $hoja->setCellValue('AP'.$fila, $expArtistica->autorretrato_taller_mes);
                $hoja->setCellValue('AQ'.$fila, $expArtistica->incluir_clases);
                $hoja->setCellValue('AR'.$fila, $expArtistica->incluir_clases_mes);
                $hoja->setCellValue('AS'.$fila, $expArtistica->autorretrato_clase);
                $hoja->setCellValue('AT'.$fila, $expArtistica->autorretrato_clase_mes);
                $hoja->setCellValue('AU'.$fila, $expArtistica->emociones);
                $hoja->setCellValue('AV'.$fila, $expArtistica->emociones_mes);
                $hoja->setCellValue('AW'.$fila, $expArtistica->familia);
                $hoja->setCellValue('AX'.$fila, $expArtistica->familia_mes);
                $hoja->setCellValue('AY'.$fila, $expArtistica->camiseta);
                $hoja->setCellValue('AZ'.$fila, $expArtistica->camiseta_mes);
            }

            //LENGUAJE
            if ($lenguaje) {
                $hoja->setCellValue('BA'.$fila, $lenguaje->enfoque_sociocultural);
                $hoja->setCellValue('BB'.$fila, $lenguaje->enfoque_sociocultural_mes);
                $hoja->setCellValue('BC'.$fila, $lenguaje->exp_dialectales);
                $hoja->setCellValue('BD'.$fila, $lenguaje->exp_dialectales_mes);
                $hoja->setCellValue('BE'.$fila, $lenguaje->exp_oral);
                $hoja->setCellValue('BF'.$fila, $lenguaje->exp_oral_mes);
                $hoja->setCellValue('BG'.$fila, $lenguaje->comp_lectora);
                $hoja->setCellValue('BH'.$fila, $lenguaje->comp_lectora_mes);
                $hoja->setCellValue('BI'.$fila, $lenguaje->prod_textos);
                $hoja->setCellValue('BJ'.$fila, $lenguaje->prod_textos_mes);
                $hoja->setCellValue('BK'.$fila, $lenguaje->extrategia_prod_text);
                $hoja->setCellValue('BL'.$fila, $lenguaje->extrategia_prod_text_mes);
                $hoja->setCellValue('BM'.$fila, $lenguaje->zapatos);
                $hoja->setCellValue('BN'.$fila, $lenguaje->zapatos_mes);
                $hoja->setCellValue('BO'.$fila, $lenguaje->noticia);
                $hoja->setCellValue('BP'.$fila, $lenguaje->noticia_mes);
                $hoja->setCellValue('BQ'.$fila, $lenguaje->carta);
                $hoja->setCellValue('BR'.$fila, $lenguaje->carta_mes);
                $hoja->setCellValue('BS'.$fila, $lenguaje->ninia_abeja);
                $hoja->setCellValue('BT'.$fila, $lenguaje->ninia_abeja_mes);
                $hoja->setCellValue('BU'.$fila, $lenguaje->cuento);
                $hoja->setCellValue('BV'.$fila, $lenguaje->cuento_mes);
                $hoja->setCellValue('BW'.$fila, $lenguaje->cuerdas);
                $hoja->setCellValue('BX'.$fila, $lenguaje->cuerdas_mes);
                $hoja->setCellValue('BY'.$fila, $lenguaje->refranes);
                $hoja->setCellValue('BZ'.$fila, $lenguaje->refranes_mes);
                $hoja->setCellValue('CA'.$fila, $lenguaje->juegos);
                $hoja->setCellValue('CB'.$fila, $lenguaje->juegos_mes);
                $hoja->setCellValue('CC'.$fila, $lenguaje->derechos_humanos);
                $hoja->setCellValue('CD'.$fila, $lenguaje->derechos_humanos_mes);
                $hoja->setCellValue('CE'.$fila, $lenguaje->noticiero);
                $hoja->setCellValue('CF'.$fila, $lenguaje->noticiero_mes);
                $hoja->setCellValue('CG'.$fila, $lenguaje->discurso);
                $hoja->setCellValue('CH'.$fila, $lenguaje->discurso_mes);
                $hoja->setCellValue('CI'.$fila, $lenguaje->influencers);
                $hoja->setCellValue('CJ'.$fila, $lenguaje->influencers_mes);
                $hoja->setCellValue('CK'.$fila, $lenguaje->inferencias);
                $hoja->setCellValue('CL'.$fila, $lenguaje->inferencias_mes);
                $hoja->setCellValue('CM'.$fila, $lenguaje->elefante);
                $hoja->setCellValue('CN'.$fila, $lenguaje->elefante_mes);
                $hoja->setCellValue('CO'.$fila, $lenguaje->pitch);
                $hoja->setCellValue('CP'.$fila, $lenguaje->pitch_mes);
            }

            //CIUDADANIA
            if ($ciudadania) {
                $hoja->setCellValue('CQ'.$fila, $ciudadania->interculturalidad);
                $hoja->setCellValue('CR'.$fila, $ciudadania->interculturalidad_mes);
                $hoja->setCellValue('CS'.$fila, $ciudadania->masculinidad);
                $hoja->setCellValue('CT'.$fila, $ciudadania->masculinidad_mes);
                $hoja->setCellValue('CU'.$fila, $ciudadania->sexo_genero);
                $hoja->setCellValue('CV'.$fila, $ciudadania->sexo_genero_mes);
                $hoja->setCellValue('CW'.$fila, $ciudadania->violencia_genero);
                $hoja->setCellValue('CX'.$fila, $ciudadania->violencia_genero_mes);
                $hoja->setCellValue('CY'.$fila, $ciudadania->diversidad_estetica);
                $hoja->setCellValue('CZ'.$fila, $ciudadania->diversidad_estetica_mes);
                $hoja->setCellValue('DA'.$fila, $ciudadania->diversidad_neuro);
                $hoja->setCellValue('DB'.$fila, $ciudadania->diversidad_neuro_mes);
                $hoja->setCellValue('DC'.$fila, $ciudadania->racismo_clase_ciu);
                $hoja->setCellValue('DD'.$fila, $ciudadania->racismo_clase_ciu_mes);
                $hoja->setCellValue('DE'.$fila, $ciudadania->rechazo_clase_ciu);
                $hoja->setCellValue('DF'.$fila, $ciudadania->rechazo_clase_ciu_mes);

            }

            //OTROS
            if ($otros) {
                $hoja->setCellValue('DG'.$fila, $otros->grupo_interaprendizaje);
                $hoja->setCellValue('DH'.$fila, $otros->tema_grupo_inter);
                $hoja->setCellValue('DI'.$fila, $otros->fecha_grupo_inter);
                $hoja->setCellValue('DJ'.$fila, $otros->visita_biblioteca_viajera);
                $hoja->setCellValue('DK'.$fila, $otros->fecha_visita_biblioteca_viajera);
            }
            
            $fila++;
        }

        //Creo el writter y guardo la hoja
        
        $writter = new XlsxWriter($phpExcel, 'Xlsx');
        
        //Cabeceras para descarga
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
        header('Cache-Control: max-age=0');
        
        $r = $writter->save('php://output');exit;
        if ($r) {
            return redirect()->to('cargar_info_view');
        }else{
            $error = 'Hubo un error u no se pudo descargar';
            return redirect()->to('cargar_info_view');
        }        
        
    }
}