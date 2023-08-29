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

            $data['componente_4'] = $this->prod4Model->_getAllRegistros();

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
            $data['centros'] = $this->centroProd4Model->_getAmiesUsuarioProd3($this->session->idusuario);
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

    public function frm_procesos() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {

            $data['componente_4'] = $this->prod4Model->_getAllRegistros();
            $data['title']='MYRP - DYA';
            $data['main_content']='componente4/prod4_process_view';
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
                'amie' => $this->request->getPostGet('amie'),
                'anio_egb' => $this->request->getPostGet('anio_egb'),
                'estado' => $this->request->getPostGet('estado'),
                'modalidad' => $this->request->getPostGet('modalidad'),

            );

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
