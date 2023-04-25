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

    public function asistencia_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            $id = $this->request->getPostGet('id');
            $asistencia = array(
                'dias_atencion' => strtoupper($this->request->getPostGet('dias_atencion')),
                'horas_planificadas' => strtoupper($this->request->getPostGet('horas_planificadas')),
                'horas_efectivas' => strtoupper($this->request->getPostGet('horas_efectivas')),
                'horas_perdidas' => strtoupper($this->request->getPostGet('horas_perdidas')),
                'kit' => strtoupper($this->request->getPostGet('kit')),
                'retirado' => strtoupper($this->request->getPostGet('retirado')),
                'idtipo' => 2,
                'idprod' =>  $id,
            );
            //echo '<pre>'.var_export($asistencia, true).'</pre>';exit;
            if ($this->request->getPostGet('cohorte') != '') {
                $prod['cohorte'] = $this->request->getPostGet('cohorte');
            }
            if ($this->request->getPostGet('fecha_inicio') != '') {
                $prod['fecha_inicio'] = $this->request->getPostGet('fecha_inicio');
            }
            if ($this->request->getPostGet('fecha_fin') != '') {
                $prod['fecha_fin'] = $this->request->getPostGet('fecha_fin');
            }
            $hay = $this->asistenciaP1->_getAsistencia($asistencia['idprod']);
            //echo '<pre>'.var_export($prod, true).'</pre>';exit;
            if ($hay) {
                //Actualizo
                $this->asistenciaP1->_update($asistencia);
            }else{
                //Grabo
                $this->asistenciaP1->_save($asistencia);
            }

            $this->prod1Model->update($id, $prod);

            return redirect()->to('prod_1_process');
        }else{

            $this->logout();
        }
    }

    public function diagnostico_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $p1_diagnostico_docente = array(
                'idtipo' => $this->request->getPostGet('idtipo'),
                'idprod' => $this->request->getPostGet('id'),
                'escritura' => strtoupper($this->request->getPostGet('escritura')),
                'lectura' => strtoupper($this->request->getPostGet('lectura')),
                'matematica' => strtoupper($this->request->getPostGet('matematica')),
            );

            $p1_diagnostico_myrp = array(
                'idtipo' => $this->request->getPostGet('idtipo'),
                'idprod' => $this->request->getPostGet('id'),
                'necesito_apoyo' => $this->request->getPostGet('necesito_apoyo'),
                'observacion' => $this->request->getPostGet('observacion'),
                'p1_comprension_lectora' => $this->request->getPostGet('p1_comprension_lectora'),
                'p1_inteligibilidad' => $this->request->getPostGet('p1_inteligibilidad'),
                'p2_comprension_lectora' => $this->request->getPostGet('p2_comprension_lectora'),
                'p2_descripcion_dibujo' => $this->request->getPostGet('p2_descripcion_dibujo'),
                'p3_comprension_lectora' => $this->request->getPostGet('p3_comprension_lectora'),
                'p3_inteligibilidad' => $this->request->getPostGet('p3_inteligibilidad'),
                'p3_coherencia' => $this->request->getPostGet('p3_coherencia'),
                'p3_sintaxis' => $this->request->getPostGet('p3_sintaxis'),
                'p3_estandares_egb_sub2y3' => $this->request->getPostGet('p3_estandares_egb_sub2y3'),
                'p4_comprension_lectora' => $this->request->getPostGet('p4_comprension_lectora'),
                'p4_inteligibilidad' => $this->request->getPostGet('p4_inteligibilidad'),
                'p4_coherencia' => $this->request->getPostGet('p4_coherencia'),
                'p4_sintaxis' => $this->request->getPostGet('p4_sintaxis'),
                'p4_estandares_egb_sub2y3' => $this->request->getPostGet('p4_estandares_egb_sub2y3'),
            );

            $hay = $this->diagDocenteP1->_getDiagDocente($p1_diagnostico_docente['idprod']);
            if ($hay) {
                //Actualizo
                $this->diagDocenteP1->_update($p1_diagnostico_docente);
            }else{
                //Grabo
                $this->diagDocenteP1->_save($p1_diagnostico_docente);
            }

            $hay_diagnostico_myrp = $this->diagMyrpP1->_getDiagMyrpP1($p1_diagnostico_myrp['idprod']);
            //echo '<pre>'.var_export($hay_diagnostico_myrp, true).'</pre>';exit;
            if ($hay_diagnostico_myrp) {
                //Actualizo
                $this->diagMyrpP1->_update($p1_diagnostico_myrp);
            }else{
                //Grabo
                $this->diagMyrpP1->_save($p1_diagnostico_myrp);
            }
            
        
            return redirect()->to('prod_1_process');
        }else{

            $this->logout();
        }
    }

    public function eval_final_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $evaluacion = array(
                'idtipo' => 3,
                'idprod' => $this->request->getPostGet('id'),
                'necesito_apoyo' => $this->request->getPostGet('necesito_apoyo'),
                'observacion' => $this->request->getPostGet('observacion'),
                'p1_comprension_lectora' => $this->request->getPostGet('p1_comprension_lectora'),
                'p1_inteligibilidad' => $this->request->getPostGet('p1_inteligibilidad'),
                'p2_comprension_lectora' => $this->request->getPostGet('p2_comprension_lectora'),
                'p2_descripcion_dibujo' => $this->request->getPostGet('p2_descripcion_dibujo'),
                'p3_comprension_lectora' => $this->request->getPostGet('p3_comprension_lectora'),
                'p3_inteligibilidad' => $this->request->getPostGet('p3_inteligibilidad'),
                'p3_coherencia' => $this->request->getPostGet('p3_coherencia'),
                'p3_sintaxis' => $this->request->getPostGet('p3_sintaxis'),
                'p3_estandares_egb_sub2y3' => $this->request->getPostGet('p3_estandares_egb_sub2y3'),
                'p4_comprension_lectora' => $this->request->getPostGet('p4_comprension_lectora'),
                'p4_inteligibilidad' => $this->request->getPostGet('p4_inteligibilidad'),
                'p4_coherencia' => $this->request->getPostGet('p4_coherencia'),
                'p4_sintaxis' => $this->request->getPostGet('p4_sintaxis'),
                'p4_estandares_egb_sub2y3' => $this->request->getPostGet('p4_estandares_egb_sub2y3'),
            );

            $hay = $this->evalFinalP1->_getEvalFinal($evaluacion['idprod']);
            //echo '<pre>'.var_export($hay, true).'</pre>';exit;
            if ($hay) {
                //Actualizo
                $this->evalFinalP1->_update($evaluacion);
            }else{
                //Grabo
                $this->evalFinalP1->_save($evaluacion);
            }
            
            return redirect()->to('prod_1_process');
        }else{

            $this->logout();
        }
    }

    public function prod_1_reg_proceso($idprod) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            
            $data['idprod'] = $idprod;
            $data['asistencia'] = $this->asistenciaP1->_getAsistencia($idprod);
            $data['eval_final'] = $this->evalFinalP1->_getEvalFinal($idprod);
            $data['datos'] = $this->prod1Model->find($idprod);

            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente1/prod1_edit_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod_1_reg_eval_final($idprod) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            
            $data['idprod'] = $idprod;
            $data['eval_final'] = $this->evalFinalP1->_getEvalFinal($idprod);
            $data['datos'] = $this->prod1Model->find($idprod);

            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente1/prod1_edit_eval_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod_1_reg_diagnostico($idprod) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            
            $data['idprod'] = $idprod;
            $data['datos'] = $this->diagDocenteP1->_getDiagDocente($idprod);
            $data['datos_diag_myrp'] = $this->diagMyrpP1->_getDiagMyrpP1($idprod);
            $data['prod'] = $this->prod1Model->find($idprod);

            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente1/prod1_edit_diagnostico_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function frm_procesos() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $data['componente_1'] = $this->prod1Model->findAll();

            $data['title']='MYRP - DYA';
            $data['main_content']='componente1/prod1_process_view';
            return view('includes/template', $data);
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
