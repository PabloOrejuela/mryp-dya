<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Prod2 extends BaseController {

    /**
     * Muestra el menú para elegir el NAP  
     */
    public function index() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {
            $this->session->set('form_error', "");
            

            if ($this->session->idrol == 2) {
                $data['componente_2'] = $this->prod1Model->_getMisRegistros($data['nombre']);
            }else{
                $data['componente_2'] = $this->prod1Model->findAll();
            }
            
            $data['title']='MYRP - DYA';
            $data['main_content']='componente2/prod2_menu_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
        
    }

    public function nap2_procesos_grid() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {

            if ($this->session->idrol == 2) {
                //PABLO hacer el filtro por Profesor del NAP
                $data['nap2'] = $this->nap2Model->_getMisRegistrosNap2($data['nombre']);
            }else{
                $data['nap2'] = $this->nap2Model->findAll();
            }
            //echo '<pre>'.var_export($data['nap2'], true).'</pre>';exit;
            $data['title']='MYRP - DYA';
            $data['main_content']='componente2/nap2/nap2_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function nap2_reg_procesos_form($idest) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            
            $data['idest'] = $idest;
            $data['datos'] = $this->nap2ProcessResult->_getNap2Process($idest);
            $data['est'] = $this->nap2Model->find($idest);
            $data['cursos'] = $this->cursoModel->findAll();

            $data['title']='MYRP - DYA';
            $data['main_content']='componente2/nap2/edit_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function nap2_process_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $process = array(
                'idestudiante' => $this->request->getPostGet('id'),
                'kit' => strtoupper($this->request->getPostGet('kit')),
                'guias' => strtoupper($this->request->getPostGet('guias')),
                'asistencia_oct' => strtoupper($this->request->getPostGet('asistencia_oct')),
                'asistencia_nov' => strtoupper($this->request->getPostGet('asistencia_nov')),
                'asistencia_dic' => strtoupper($this->request->getPostGet('asistencia_dic')),
                'asistencia_ene' => strtoupper($this->request->getPostGet('asistencia_ene')),
                'asistencia_feb' => strtoupper($this->request->getPostGet('asistencia_feb')),
                'asistencia_mar' => strtoupper($this->request->getPostGet('asistencia_mar')),
                'asistencia_abr' => strtoupper($this->request->getPostGet('asistencia_abr')),
                'asistencia_may' => strtoupper($this->request->getPostGet('asistencia_may')),
                'asistencia_jun' => strtoupper($this->request->getPostGet('asistencia_jun')),
                'asistencia_total' => strtoupper($this->request->getPostGet('asistencia_total')),
                'rendimiento_quim_1' => strtoupper($this->request->getPostGet('rendimiento_quim_1')),
                'rendimiento_quim_2' => strtoupper($this->request->getPostGet('rendimiento_quim_2')),
                'expediente' => strtoupper($this->request->getPostGet('expediente')),
                'examen_ubicacion' => strtoupper($this->request->getPostGet('examen_ubicacion')),
                'resultado_ubicacion' => strtoupper($this->request->getPostGet('resultado_ubicacion')),
                'reporte_caso' => strtoupper($this->request->getPostGet('reporte_caso')),
                'tipo_caso' => strtoupper($this->request->getPostGet('tipo_caso')),
                'fecha_caso' => strtoupper($this->request->getPostGet('fecha_caso')),
                'seguimiento' => strtoupper($this->request->getPostGet('seguimiento')),
                'remision_caso' => strtoupper($this->request->getPostGet('remision_caso')),
                'remision_caso_complementario' => strtoupper($this->request->getPostGet('remision_caso_complementario')),
                'prom_final' => strtoupper($this->request->getPostGet('prom_final')),
                'edu_regular' => strtoupper($this->request->getPostGet('edu_regular')),
                'nivel' => strtoupper($this->request->getPostGet('nivel')),
                'institucion_destino' => strtoupper($this->request->getPostGet('institucion_destino')),
            );
            //echo '<pre>'.var_export($process, true).'</pre>';exit;

            $hay = $this->nap2ProcessResult->_getNap2Process($process['idestudiante']);
            if ($hay) {
                //Actualizo
                $this->nap2ProcessResult->_update($process);
            }else{
                //Grabo
                $this->nap2ProcessResult->_save($process);
            }

            return redirect()->to('prod2-nap2-menu');
        }else{

            $this->logout();
        }
    }

    public function nap3_procesos_grid() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {

            if ($this->session->idrol == 2) {
                //PABLO hacer el filtro por Profesor del NAP
                $data['nap3'] = $this->nap3Model->_getMisRegistrosNap3($data['nombre']);
            }else{
                $data['nap3'] = $this->nap3Model->findAll();
            }
            //echo '<pre>'.var_export($data['nap2'], true).'</pre>';exit;
            $data['title']='MYRP - DYA';
            $data['main_content']='componente2/nap3/nap3_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function nap3_reg_procesos_form($idest) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            
            $data['idest'] = $idest;
            $data['datos'] = $this->nap3ProcessResult->_getNap3Process($idest);
            $data['est'] = $this->nap3Model->find($idest);
            $data['cursos'] = $this->cursoModel->findAll();

            $data['title']='MYRP - DYA';
            $data['main_content']='componente2/nap3/edit_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function nap3_process_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $process = array(
                'idnap3' => $this->request->getPostGet('id'),
                'kit' => strtoupper($this->request->getPostGet('kit')),
                'guias' => strtoupper($this->request->getPostGet('guias')),
                'lineamiento_nap' => strtoupper($this->request->getPostGet('lineamiento_nap')),
                'protocolo_violencia' => strtoupper($this->request->getPostGet('protocolo_violencia')),
                'avance_curricular' => strtoupper($this->request->getPostGet('avance_curricular')),
                'curriculo_competencias' => strtoupper($this->request->getPostGet('curriculo_competencias')),
                'plan_microcurricular' => strtoupper($this->request->getPostGet('plan_microcurricular')),
                'conciencia_linguistica' => strtoupper($this->request->getPostGet('conciencia_linguistica')),
                'destrezas_desempeño' => strtoupper($this->request->getPostGet('destrezas_desempeño')),
                'planificacion_matematica' => strtoupper($this->request->getPostGet('planificacion_matematica')),
                'planificacion_lengua' => strtoupper($this->request->getPostGet('planificacion_lengua')),
                'planificacion_naturales' => strtoupper($this->request->getPostGet('planificacion_naturales')),
                'eval_promo_est' => strtoupper($this->request->getPostGet('eval_promo_est')),
                'informe_aprendizaje' => strtoupper($this->request->getPostGet('informe_aprendizaje')),
                'eval_metacognitiva' => strtoupper($this->request->getPostGet('eval_metacognitiva')),
                'disciplina_positiva' => strtoupper($this->request->getPostGet('disciplina_positiva')),
                'tec_inst_evaluacion' => strtoupper($this->request->getPostGet('tec_inst_evaluacion')),
                'practica_inst_evaluacion' => strtoupper($this->request->getPostGet('practica_inst_evaluacion')),
                'valor_arte' => strtoupper($this->request->getPostGet('valor_arte')),
                'habil_multiples' => strtoupper($this->request->getPostGet('habil_multiples')),
                'func_ejecutiva' => strtoupper($this->request->getPostGet('func_ejecutiva')),
                'elabora_recursos' => strtoupper($this->request->getPostGet('elabora_recursos')),
                'revista_aula' => strtoupper($this->request->getPostGet('revista_aula')),
                'innova_educativa' => strtoupper($this->request->getPostGet('innova_educativa')),
                'retro_rubrica' => strtoupper($this->request->getPostGet('retro_rubrica')),
                'revisa_inst_rubrica' => strtoupper($this->request->getPostGet('revisa_inst_rubrica')),
                'revisa_inst_lengua_mate' => strtoupper($this->request->getPostGet('revisa_inst_lengua_mate')),
                'extrategias_didacticas' => strtoupper($this->request->getPostGet('extrategias_didacticas')),
                'educomunicacion' => strtoupper($this->request->getPostGet('educomunicacion')),
                'proyecto_vida' => strtoupper($this->request->getPostGet('proyecto_vida')),
                'neuro_educacion' => strtoupper($this->request->getPostGet('neuro_educacion')),
                'tecnico_virtual' => strtoupper($this->request->getPostGet('tecnico_virtual')),
                'reuniones_segui_tec' => strtoupper($this->request->getPostGet('reuniones_segui_tec')),
                'visita_aulica' => strtoupper($this->request->getPostGet('visita_aulica')),
                'visita_domiciliaria' => strtoupper($this->request->getPostGet('visita_domiciliaria')),
                'casos_remitidos' => strtoupper($this->request->getPostGet('casos_remitidos')),
                'seguimiento_caso' => strtoupper($this->request->getPostGet('seguimiento_caso')),
                'rep_legales' => strtoupper($this->request->getPostGet('rep_legales')),
                'refuerzo_academico' => strtoupper($this->request->getPostGet('refuerzo_academico')),
                'tecnico_local' => strtoupper($this->request->getPostGet('tecnico_local')),
                
            );

            $hay = $this->nap3ProcessResult->_getNap3Process($process['idnap3']);
            if ($hay) {
                //Actualizo
                $this->nap3ProcessResult->_update($process);
            }else{
                //Grabo
                $this->nap3ProcessResult->_save($process);
            }

            return redirect()->to('prod2-nap3-menu');
        }else{

            $this->logout();
        }
    }

    public function nap4_procesos_grid() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {

            if ($this->session->idrol == 2) {
                //PABLO hacer el filtro por Profesor del NAP
                $data['nap4'] = $this->nap4Model->_getMisRegistrosNap4($data['nombre']);
            }else{
                $data['nap4'] = $this->nap4Model->findAll();
            }
            //echo '<pre>'.var_export($data['nap2'], true).'</pre>';exit;
            $data['title']='MYRP - DYA';
            $data['main_content']='componente2/nap4/nap4_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function nap4_reg_procesos_form($idest) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            
            $data['idest'] = $idest;
            $data['datos'] = $this->nap4ProcessResult->_getNap4Process($idest);
            $data['est'] = $this->nap4Model->find($idest);
            $data['cursos'] = $this->cursoModel->findAll();


            $data['title']='MYRP - DYA';
            $data['main_content']='componente2/nap4/edit_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function nap4_process_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $process = array(
                'idnap4' => $this->request->getPostGet('id'),
                'kit' => strtoupper($this->request->getPostGet('kit')),
                'reporte_caso' => strtoupper($this->request->getPostGet('reporte_caso')),
                'tipo_caso' => strtoupper($this->request->getPostGet('tipo_caso')),
                'seguimiento_caso' => strtoupper($this->request->getPostGet('seguimiento_caso')),
                'edu_regular' => strtoupper($this->request->getPostGet('edu_regular')),
                'nivel' => strtoupper($this->request->getPostGet('nivel')),
                'institucion' => strtoupper($this->request->getPostGet('institucion')),
                
            );

            $hay = $this->nap4ProcessResult->_getNap4Process($process['idnap4']);
            if ($hay) {
                //Actualizo
                $this->nap4ProcessResult->_update($process);
            }else{
                //Grabo
                $this->nap4ProcessResult->_save($process);
            }

            return redirect()->to('prod2-nap4-menu');
        }else{

            $this->logout();
        }
    }

    public function nap5_procesos_grid() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {

            if ($this->session->idrol == 2) {
                //PABLO hacer el filtro por Profesor del NAP
                $data['nap5'] = $this->nap5Model->_getMisRegistrosNap5($data['nombre']);
            }else{
                $data['nap5'] = $this->nap5Model->findAll();
            }
            //echo '<pre>'.var_export($data['nap2'], true).'</pre>';exit;
            $data['title']='MYRP - DYA';
            $data['main_content']='componente2/nap5/nap5_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function nap5_reg_procesos_form($idest) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            
            $data['idest'] = $idest;
            $data['datos'] = $this->nap5ProcessResult->_getNap5Process($idest);
            $data['est'] = $this->nap5Model->find($idest);
            $data['cursos'] = $this->cursoModel->findAll();


            $data['title']='MYRP - DYA';
            $data['main_content']='componente2/nap5/edit_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function nap5_process_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $process = array(
                'idnap5' => $this->request->getPostGet('id'),
                'lineamiento_nap' => strtoupper($this->request->getPostGet('lineamiento_nap')),
                'avance_curricular' => strtoupper($this->request->getPostGet('avance_curricular')),
                'curriculo_competencias' => strtoupper($this->request->getPostGet('curriculo_competencias')),
                'plan_microcurricular_erca' => strtoupper($this->request->getPostGet('plan_microcurricular_erca')),
                'conciencia_linguistica' => strtoupper($this->request->getPostGet('conciencia_linguistica')),
                'destrezas_desempeño' => strtoupper($this->request->getPostGet('destrezas_desempeño')),
                'produccion_textos' => strtoupper($this->request->getPostGet('produccion_textos')),
                'eval_metacognitiva' => strtoupper($this->request->getPostGet('eval_metacognitiva')),
                'estrategias_didacticas' => strtoupper($this->request->getPostGet('estrategias_didacticas')),
                'plan_microcurricular' => strtoupper($this->request->getPostGet('plan_microcurricular')),
                'eval_promo_est' => strtoupper($this->request->getPostGet('eval_promo_est')),
                'innova_aula' => strtoupper($this->request->getPostGet('innova_aula')),
                'const_infor_aprendizaje' => strtoupper($this->request->getPostGet('const_infor_aprendizaje')),
                'tecnico_virtual' => strtoupper($this->request->getPostGet('tecnico_virtual')),
                'reuniones_seguimiento_tec' => strtoupper($this->request->getPostGet('reuniones_seguimiento_tec')),
                'coordinacion_autoridades' => strtoupper($this->request->getPostGet('coordinacion_autoridades')),
                'visita_aulica' => strtoupper($this->request->getPostGet('visita_aulica')),
                'pres_plan_micro' => strtoupper($this->request->getPostGet('pres_plan_micro')),
                'clase_demostrativa' => strtoupper($this->request->getPostGet('clase_demostrativa')),
                'entrega_reportes' => strtoupper($this->request->getPostGet('entrega_reportes')),
                'tecnico_territorial' => strtoupper($this->request->getPostGet('tecnico_territorial')),
                'induccion' => strtoupper($this->request->getPostGet('induccion')),
                'curriculo_mate' => strtoupper($this->request->getPostGet('curriculo_mate')),
                'congre_curriculo_mate' => strtoupper($this->request->getPostGet('congre_curriculo_mate')),
                'crea_edu_mate_vida' => strtoupper($this->request->getPostGet('crea_edu_mate_vida')),
                'habil_mate_trad_actual' => strtoupper($this->request->getPostGet('habil_mate_trad_actual')),
                'habil_mate_nivel_sup' => strtoupper($this->request->getPostGet('habil_mate_nivel_sup')),
                'aprendizaje_activo' => strtoupper($this->request->getPostGet('aprendizaje_activo')),
                'metodologia_activa' => strtoupper($this->request->getPostGet('metodologia_activa')),
                'didactica_modela' => strtoupper($this->request->getPostGet('didactica_modela')),
                'trabajo_final' => strtoupper($this->request->getPostGet('trabajo_final')),
                'resultado_curso' => strtoupper($this->request->getPostGet('resultado_curso')),
                'observaciones' => strtoupper($this->request->getPostGet('observaciones')),
            );

            $hay = $this->nap5ProcessResult->_getNap5Process($process['idnap5']);
            if ($hay) {
                //Actualizo
                $this->nap5ProcessResult->_update($process);
            }else{
                //Grabo
                $this->nap5ProcessResult->_save($process);
            }

            return redirect()->to('prod2-nap5-menu');
        }else{

            $this->logout();
        }
    }

    public function nap6_procesos_grid() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {

            if ($this->session->idrol == 2) {
                //PABLO hacer el filtro por Profesor del NAP
                $data['nap6'] = $this->nap6Model->_getMisRegistrosNap6($data['nombre']);
            }else{
                $data['nap6'] = $this->nap6Model->findAll();
            }
            //echo '<pre>'.var_export($data['nap2'], true).'</pre>';exit;
            $data['title']='MYRP - DYA';
            $data['main_content']='componente2/nap6/nap6_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function nap6_reg_procesos_form($idest) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            
            $data['idest'] = $idest;
            $data['datos'] = $this->nap6ProcessResult->_getNap6Process($idest);
            $data['est'] = $this->nap6Model->find($idest);
            $data['cursos'] = $this->cursoModel->findAll();


            $data['title']='MYRP - DYA';
            $data['main_content']='componente2/nap6/edit_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function nap6_process_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $process = array(
                'idnap6' => $this->request->getPostGet('id'),
                'edu_regular' => strtoupper($this->request->getPostGet('edu_regular')),
                'nivel' => strtoupper($this->request->getPostGet('nivel')),
                'institucion' => strtoupper($this->request->getPostGet('institucion')),
            );

            $hay = $this->nap6ProcessResult->_getNap6Process($process['idnap6']);
            if ($hay) {
                //Actualizo
                $this->nap6ProcessResult->_update($process);
            }else{
                //Grabo
                $this->nap6ProcessResult->_save($process);
            }

            return redirect()->to('prod2-nap6-menu');
        }else{

            $this->logout();
        }
    }
}
