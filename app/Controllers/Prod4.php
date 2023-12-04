<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;

class Prod4 extends BaseController {

    public function index(){
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {
            $this->session->set('form_error', "");

            $data['componente_4'] = $this->prod4Model->_getAllRegistros();
            //$data['componente_4'] = $this->prod4Model->_getMisRegistros($data['id']);
            //echo '<pre>'.var_export($data['componente_4'], true).'</pre>';exit;

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
            $data['cursos'] = $this->cursoModel->findAll();
            $data['centros'] = $this->centroEducativoModel->_getCentrosList();
            $data['cohortes'] = $this->cohorteModel->findAll();

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
                'documento' => strtoupper($this->request->getPostGet('documento')),
                'nacionalidad' => strtoupper($this->request->getPostGet('nacionalidad')),                
                'genero' => strtoupper($this->request->getPostGet('genero')),
                'cohorte' => strtoupper($this->request->getPostGet('cohorte')),
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
            //echo '<pre>'.var_export($producto_4, true).'</pre>';exit;
            $this->prod4Model->update($id, $producto_4);

            return redirect()->to('prod_4');
        }else{

            $this->logout();
        }
    }

    public function prod_4_create() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {
            //$this->session->set('form_error', "Los campos con asterisco son obligatorios");
            $data['centros'] = $this->centroProd4Model->findAll();
            $data['cursos'] = $this->cursoModel->findAll();
            $data['cohortes'] = $this->cohorteModel->findAll();
            
            //echo '<pre>'.var_export($data['centros'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente4/prod4_create_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod_4_new() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {

            $producto_4 = array(
                'idcentro4' => $this->request->getPostGet('idcentro4'),
                'nombres' => strtoupper($this->request->getPostGet('nombres')),
                'documento' => strtoupper($this->request->getPostGet('documento')),
                'nacionalidad' => strtoupper($this->request->getPostGet('nacionalidad')),                
                'genero' => strtoupper($this->request->getPostGet('genero')),
                'cohorte' => strtoupper($this->request->getPostGet('cohorte')),
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

            //echo '<pre>'.var_export($idcentro4, true).'</pre>';exit;
            $this->validation->setRuleGroup('prod4Create');
            if (!$this->validation->withRequest($this->request)->run()) {
                //Depuración
                return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
            }else{ 

                $this->prod4Model->insert($producto_4);
                return redirect()->to('prod_4');
            }

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

            $data['componente_4'] = $this->prod4Model->_getAllRegistros();

            //echo '<pre>'.var_export($data['componente_4'], true).'</pre>';exit;
            $data['title']='MYRP - DYA';
            $data['main_content']='componente4/prod4_process_view2';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod4_reg_lengua($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {
            
            $data['id'] = $id;
            $data['datos'] = $this->prod4LenguaModel->_getProd4lengua($id);
            $data['est'] = $this->prod4Model->find($id);
            //$data['meses'] = MESES;

            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente4/prod4_edit_lenguaje_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod4_lengua_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {

            $proceso = array(
                'idProd4' => $this->request->getPostGet('idProd4'),
                'conoce_letras' => $this->request->getPostGet('conoce_letras'),
                'escribe_textos' => $this->request->getPostGet('escribe_textos'),
                'compreende_lee' => $this->request->getPostGet('compreende_lee'),
                'uso_formal_escritura' => $this->request->getPostGet('uso_formal_escritura'),
                'expresa_ideas' => $this->request->getPostGet('expresa_ideas'),
            );

            $hay = $this->prod4LenguaModel->_getProd4lengua($proceso['idProd4']);
            //echo '<pre>'.var_export($proceso, true).'</pre>';exit;
            
            if ($hay) {
                //Actualizo
                $this->prod4LenguaModel->_update($proceso);
            }else{
                //Grabo
                $this->prod4LenguaModel->_save($proceso);
            }
            
            return redirect()->to('prod4_process');
        }else{

            $this->logout();
        }
    }

    public function prod4_reg_mate($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {
            
            $data['id'] = $id;
            $data['datos'] = $this->prod4MateModel->_getProd4Mate($id);
            $data['est'] = $this->prod4Model->find($id);
            //$data['meses'] = MESES;

            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente4/prod4_edit_mate_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod4_mate_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {

            $proceso = array(
                'idProd4' => $this->request->getPostGet('idProd4'),
                'reconoce_numeros' => $this->request->getPostGet('reconoce_numeros'),
                'identifica_operaciones' => $this->request->getPostGet('identifica_operaciones'),
                'resuelve_operaciones' => $this->request->getPostGet('resuelve_operaciones'),
                'reconoce_problermas' => $this->request->getPostGet('reconoce_problermas'),
                'resuelve_problemas' => $this->request->getPostGet('resuelve_problemas'),
                'resuelve_operaciones_decimales' => $this->request->getPostGet('resuelve_operaciones_decimales'),
            );

            $hay = $this->prod4MateModel->_getProd4Mate($proceso['idProd4']);
            //echo '<pre>'.var_export($proceso, true).'</pre>';exit;
            
            if ($hay) {
                //Actualizo
                $this->prod4MateModel->_update($proceso);
            }else{
                //Grabo
                $this->prod4MateModel->_save($proceso);
            }
            
            return redirect()->to('prod4_process');
        }else{

            $this->logout();
        }
    }

    public function prod4_reg_psico($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {
            
            $data['id'] = $id;
            $data['datos'] = $this->prod4PsicoModel->_getProd4Psico($id);
            $data['est'] = $this->prod4Model->find($id);
            //$data['meses'] = MESES;

            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente4/prod4_edit_psico_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod4_psico_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {

            $proceso = array(
                'idProd4' => $this->request->getPostGet('idProd4'),
                'reconoce_caract_fisicas' => $this->request->getPostGet('reconoce_caract_fisicas'),
                'reconoce_fortalezas' => $this->request->getPostGet('reconoce_fortalezas'),
                'reconoce_caract_personales' => $this->request->getPostGet('reconoce_caract_personales'),
                'prioriza_aspectos' => $this->request->getPostGet('prioriza_aspectos'),
                'identifica_apoyo' => $this->request->getPostGet('identifica_apoyo'),
                'reconoce_debilidades' => $this->request->getPostGet('reconoce_debilidades'),

                'metas_corto' => $this->request->getPostGet('metas_corto'),
                'metas_largo' => $this->request->getPostGet('metas_largo'),
            );

            $hay = $this->prod4PsicoModel->_getProd4Psico($proceso['idProd4']);
            //echo '<pre>'.var_export($proceso, true).'</pre>';exit;
            
            if ($hay) {
                //Actualizo
                $this->prod4PsicoModel->_update($proceso);
            }else{
                //Grabo
                $this->prod4PsicoModel->_save($proceso);
            }
            
            return redirect()->to('prod4_process');
        }else{

            $this->logout();
        }
    }

    public function prod4_reg_pedagogica($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {
            
            $data['id'] = $id;
            $data['datos'] = $this->prod4PedagogicaModel->_getProd4Pedagogica($id);
            $data['oyente'] = $this->prod4OyenteModel->find($id);
            $data['est'] = $this->prod4Model->find($id);
            //$data['meses'] = MESES;

            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente4/prod4_edit_pedagogica_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod4_pedagogica_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {

            $proceso = array(
                'idProd4' => $this->request->getPostGet('idProd4'),
                'leng_prescencial' => $this->request->getPostGet('leng_prescencial'),
                'leng_prescencial_in' => $this->request->getPostGet('leng_prescencial_in'),
                'leng_prescencial_in_motivo' => $this->request->getPostGet('leng_prescencial_in_motivo'),
                'leng_distancia' => $this->request->getPostGet('leng_distancia'),
                'leng_distancia_in' => $this->request->getPostGet('leng_distancia_in'),
                'leng_distancia_in_motivo' => $this->request->getPostGet('leng_distancia_in_motivo'),
                'mate_prescencial' => $this->request->getPostGet('mate_prescencial'),
                'mate_distancia' => $this->request->getPostGet('mate_distancia'),
                'psicoemocionales' => $this->request->getPostGet('psicoemocionales'),
                'mate_prescencial_in' => $this->request->getPostGet('mate_prescencial_in'),
                'mate_distancia_in' => $this->request->getPostGet('mate_distancia_in'),
                'psicoemocionales_in' => $this->request->getPostGet('psicoemocionales_in'),
                'mate_prescencial_in_motivo' => $this->request->getPostGet('mate_prescencial_in_motivo'),
                'mate_distancia_in_motivo' => $this->request->getPostGet('mate_distancia_in_motivo'),
                'psicoemocionales_in_motivo' => $this->request->getPostGet('psicoemocionales_in_motivo'),
                'resultado' => $this->request->getPostGet('resultado'),

            );

            $oyente = array(
                'idProd4' => $this->request->getPostGet('idProd4'),
                'cohorte_1' => $this->request->getPostGet('cohorte_1'),
                'cohorte_2' => $this->request->getPostGet('cohorte_2'),
                'cohorte_3' => $this->request->getPostGet('cohorte_3'),
                'cohorte_4' => $this->request->getPostGet('cohorte_4'),
                'cohorte_5' => $this->request->getPostGet('cohorte_5'),
                'cohorte_6' => $this->request->getPostGet('cohorte_6'),

            );

            $hay = $this->prod4PedagogicaModel->_getProd4Pedagogica($proceso['idProd4']);
            $hayOyente = $this->prod4OyenteModel->_getProd4Oyente($oyente['idProd4']);
            //echo '<pre>'.var_export($proceso, true).'</pre>';exit;
            
            if ($hay) {
                //Actualizo
                $this->prod4PedagogicaModel->_update($proceso);
            }else{
                //Grabo
                $this->prod4PedagogicaModel->_save($proceso);
            }

            if ($hayOyente) {
                //Actualizo
                $this->prod4OyenteModel->_update($oyente);
            }else{
                //Grabo
                $this->prod4OyenteModel->_save($oyente);
            }
            
            return redirect()->to('prod4_process');
        }else{

            $this->logout();
        }
    }

    public function prod4_reg_otros($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {
            
            $data['id'] = $id;
            $data['datos'] = $this->prod4OtrosModel->_getProd4Otros($id);
            $data['est'] = $this->prod4Model->find($id);
            //$data['meses'] = MESES;

            //echo '<pre>'.var_export($data['est'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente4/prod4_edit_otros_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod4_otros_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {

            $proceso = array(
                'idProd4' => $this->request->getPostGet('idProd4'),
                'kit' => $this->request->getPostGet('kit'),
                'motivo' => strtoupper($this->request->getPostGet('motivo')),
                'dias_asistencia' => $this->request->getPostGet('dias_asistencia'),
                'porcentaje' => $this->request->getPostGet('porcentaje'),

            );

            $hay = $this->prod4OtrosModel->_getProd4Otros($proceso['idProd4']);
            //echo '<pre>'.var_export($proceso, true).'</pre>';exit;
            
            if ($hay) {
                //Actualizo
                $this->prod4OtrosModel->_update($proceso);
            }else{
                //Grabo
                $this->prod4OtrosModel->_save($proceso);
            }
            
            return redirect()->to('prod4_process');
        }else{

            $this->logout();
        }
    }

    public function prod4_reg_atenciones($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {
            
            $data['id'] = $id;
            $data['datos'] = $this->prod4AtencionesModel->_getProd4Atenciones($id);
            $data['est'] = $this->prod4Model->find($id);
            //$data['meses'] = MESES;

            //echo '<pre>'.var_export($data['est'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente4/prod4_edit_atenciones_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod4_atenciones_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {

            $proceso = array(
                'idProd4' => $this->request->getPostGet('idProd4'),
                'motivo_inasistencia' => $this->request->getPostGet('motivo_inasistencia'),
                'encuentros' => $this->request->getPostGet('encuentros'),
                'cuidado_infantil' => $this->request->getPostGet('cuidado_infantil'),
                'anticoncetivo' => $this->request->getPostGet('anticoncetivo'),
                'control_ninio_sano' => $this->request->getPostGet('control_ninio_sano'),
                'atencion_medica' => $this->request->getPostGet('atencion_medica'),
                'derivaciones' => $this->request->getPostGet('derivaciones'),

            );

            $hay = $this->prod4AtencionesModel->_getProd4Atenciones($proceso['idProd4']);
            //echo '<pre>'.var_export($proceso, true).'</pre>';exit;
            
            if ($hay) {
                //Actualizo
                $this->prod4AtencionesModel->_update($proceso);
            }else{
                //Grabo
                $this->prod4AtencionesModel->_save($proceso);
            }
            
            return redirect()->to('prod4_process');
        }else{

            $this->logout();
        }
    }

    public function prod4_reg_resultados($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {
            
            $data['id'] = $id;
            $data['datos'] = $this->prod4ResultadosModel->_getProd4Resultados($id);
            $data['est'] = $this->prod4Model->find($id);
            $data['centros'] = $this->prod4ResultadosModel->_getCentrosList();
            $data['cursos'] = $this->cursoModel->findAll();
            $data['ciudades'] = $this->ciudadesModel->findAll();
            //$data['meses'] = MESES;

            //echo '<pre>'.var_export($data['centros'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente4/prod4_edit_resultados_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod4_resultados_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {

            $proceso = array(
                'idProd4' => $this->request->getPostGet('idProd4'),
                'reinsercion' => $this->request->getPostGet('reinsercion'),
                'motivo' => $this->request->getPostGet('motivo'),
                'observacion' => strtoupper($this->request->getPostGet('observacion')),
                
                'nuevo_amie' => strtoupper($this->request->getPostGet('nuevo_amie')),
                'nuevo_centro_educativo' => strtoupper($this->request->getPostGet('nuevo_centro_educativo')),
                'idciudades' => $this->request->getPostGet('idciudades'),

                'amie' => $this->request->getPostGet('amie'),
                'anio_egb' => $this->request->getPostGet('anio_egb'),
                'estado' => $this->request->getPostGet('estado'),
                'modalidad' => $this->request->getPostGet('modalidad'),

            );
            
            //Verifico si hay ese centro
            if ($proceso['nuevo_amie'] != '') {
                $hay_centro = $this->centroEducativoModel->find($proceso['nuevo_amie']);
                //echo '<pre>'.var_export($proceso, true).'</pre>';exit;
                if (!isset($hay_centro) || $hay_centro == NULL) {
                    $data = [
                        'amie' => $proceso['nuevo_amie'],
                        'nombre'    => $proceso['nuevo_centro_educativo'],
                        'idciudades'    => $proceso['idciudades'],
                    ];
                    $this->centroEducativoModel->insert($data, false);
                    $proceso['amie'] = $this->centroEducativoModel->getInsertID();
                }else{
                    $proceso['amie'] = $proceso['nuevo_amie'];
                }
            }

            $hay = $this->prod4ResultadosModel->_getProd4Resultados($proceso['idProd4']);
            //echo '<pre>'.var_export($proceso, true).'</pre>';exit;
            if ($hay) {
                //Actualizo
                $this->prod4ResultadosModel->_update($proceso);
            }else{
                //Grabo
                $this->prod4ResultadosModel->_save($proceso);
            }
            
            return redirect()->to('prod4_process');
        }else{

            $this->logout();
        }
    }

    public function prod4_descargar_registros(){

        $registros = $this->prod4Model->_getAllRegistrosExcel();
        //echo '<pre>'.var_export($registros, true).'</pre>';exit;
        $fila = 2;

        //Creo la hoja
        $phpExcel = new Spreadsheet();
        $phpExcel
            ->getProperties()
            ->setCreator("MYRP")
            ->setLastModifiedBy('Pablo Orejuela') // última vez modificado por
            ->setTitle('Prod 4 - Registros')
            ->setSubject('Reportes MYRP')
            ->setDescription('Reporte con los registros del Producto 4')
            ->setKeywords('etiquetas o palabras clave separadas por espacios')
            ->setCategory('Registros');

        $nombreDelDocumento = "Prod 4 - Registros.xlsx";

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
        $hoja->setCellValue('A1', "CENTRO");
        $hoja->setCellValue('B1', "CIUDAD");
        $hoja->setCellValue('C1', "PROVINCIA");
        $hoja->setCellValue('D1', "COHORTE");
        $hoja->setCellValue('E1', "NOMBRES");
        $hoja->setCellValue('F1', "DOCUMENTO");
        $hoja->setCellValue('G1', "NACIONALIDAD");
        $hoja->setCellValue('H1', "FECHA NACIMIENTO");
        $hoja->setCellValue('I1', "EDAD");
        $hoja->setCellValue('J1', "GÉNERO");
        $hoja->setCellValue('K1', "DISCAPACIDAD");
        $hoja->setCellValue('L1', "TIPO DISCAPACIDAD");
        $hoja->setCellValue('M1', "BARRIO");
        $hoja->setCellValue('N1', "TELÉFONO");
        $hoja->setCellValue('O1', "EMAIL");
        $hoja->setCellValue('P1', "NUM HIJOS");
        $hoja->setCellValue('Q1', "EDAD HIJO 1");
        $hoja->setCellValue('R1', "EDAD HIJO 2");
        $hoja->setCellValue('S1', "EDAD HIJO 3");
        $hoja->setCellValue('T1', "ESTUDIA");
        $hoja->setCellValue('U1', "TIEMPO SIN ESTUDIAR");
        $hoja->setCellValue('V1', "INSTITUCIÓN");
        $hoja->setCellValue('W1', "AÑO EGB");
        $hoja->setCellValue('X1', "EMBARAZADA");
        $hoja->setCellValue('Y1', "SEMANAS");
        $hoja->setCellValue('Z1', "CONTROLES");


        foreach ($registros as $key => $value) {
            $phpExcel->getActiveSheet()->getStyle('A'.$fila.':Z'.$fila)->applyFromArray($styleFila);
            $hoja->setCellValue('A'.$fila, $value->ce);
            $hoja->setCellValue('B'.$fila, $value->ciudad);
            $hoja->setCellValue('C'.$fila, $value->provincia);
            $hoja->setCellValue('D'.$fila, $value->cohorte);
            $hoja->setCellValue('E'.$fila, $value->nombres);
            $hoja->setCellValue('F'.$fila, $value->documento);
            $hoja->setCellValue('G'.$fila, $value->nacionalidad);
            $hoja->setCellValue('H'.$fila, $value->fecha_nac);
            $hoja->setCellValue('I'.$fila, $value->edad);
            $hoja->setCellValue('J'.$fila, $value->genero);
            $hoja->setCellValue('K'.$fila, $value->discapacidad);
            $hoja->setCellValue('L'.$fila, $value->tipo_discapacidad);
            $hoja->setCellValue('M'.$fila, $value->barrio);
            $hoja->setCellValue('N'.$fila, $value->contacto_telf);
            $hoja->setCellValue('O'.$fila, $value->email);
            $hoja->setCellValue('P'.$fila, $value->num_hijos);
            $hoja->setCellValue('Q'.$fila, $value->edad_hijo_1);
            $hoja->setCellValue('R'.$fila, $value->edad_hijo_2);
            $hoja->setCellValue('S'.$fila, $value->edad_hijo_3);
            $hoja->setCellValue('T'.$fila, $value->estudia);
            $hoja->setCellValue('U'.$fila, $value->tiempo_sin_estudiar);
            $hoja->setCellValue('V'.$fila, $value->institucion);
            $hoja->setCellValue('W'.$fila, $value->anio_egb);
            $hoja->setCellValue('X'.$fila, $value->embarazada);
            $hoja->setCellValue('Y'.$fila, $value->semanas);
            $hoja->setCellValue('Z'.$fila, $value->controles);


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
}
