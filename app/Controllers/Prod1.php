<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Prod1 extends BaseController {

    public function index() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1) {
            $this->session->set('form_error', "");
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
            
            $data['centros'] = $this->centroEducativoModel->_getCentros();
            $data['datos'] = $this->prod1Model->find($id);

            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente1/prod1_edit_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod_1_create() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            //$this->session->set('form_error', "Los campos con asterisco son obligatorios");
            $data['centros'] = $this->centroEducativoModel->findAll();
            $data['cursos'] = $this->cursoModel->findAll();
            $data['mensaje'] = $this->session->form_error;
            
            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente1/prod1_create_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod_1_new() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            $id = $this->request->getPostGet('id');
            $producto_1 = array(
                'amie' => strtoupper($this->request->getPostGet('amie')),
                'nombres' => strtoupper($this->request->getPostGet('nombres')),
                'apellidos' => strtoupper($this->request->getPostGet('apellidos')),
                'documento' => strtoupper($this->request->getPostGet('documento')),
                'fecha_nac' => $this->request->getPostGet('fecha_nac'),
                'anio_egb' => $this->request->getPostGet('anio_egb'),
                'cohorte' => $this->request->getPostGet('cohorte'),
                'tutor_apoyo' => strtoupper($this->request->getPostGet('tutor_apoyo')),
            );
            
            if ($producto_1['anio_egb'] == 'NULL' || $producto_1['tutor_apoyo'] == 'NULL' || $producto_1['cohorte'] == 'NULL') {
                
                $this->session->set('form_error', "Falta llenar campos obligatorios");
                return redirect()->to('prod-1-create');
            }else{
                $this->session->set('form_error', "");
                $this->prod1Model->save($producto_1);
            }
            //echo '<pre>'.var_export($this->session->form_error, true).'</pre>';exit;

            return redirect()->to('prod_1');
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
                'amie' => strtoupper($this->request->getPostGet('amie')),
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
    
    public function prod_1_delete($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            $id = $id;
            $this->prod1Model->delete($id);

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

            $prod['anio_egb'] = $this->request->getPostGet('anio_egb');
            $this->prod1Model->update($p1_diagnostico_docente['idprod'], $prod);

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

    public function eval_Mate_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $evaluacion = array(
                'idtipo' => 4,
                'idprod' => $this->request->getPostGet('id'),
                'orientacion_espacial_1' => $this->request->getPostGet('orientacion_espacial_1'),
                'orientacion_espacial_2' => $this->request->getPostGet('orientacion_espacial_2'),
                'orientacion_espacial_3' => $this->request->getPostGet('orientacion_espacial_3'),
                'orientacion_espacial_4' => $this->request->getPostGet('orientacion_espacial_4'),
                'clasificacion_5' => $this->request->getPostGet('clasificacion_5'),
                'clasificacion_6' => $this->request->getPostGet('clasificacion_6'),
                'seriacion_7' => $this->request->getPostGet('seriacion_7'),
                'seriacion_8' => $this->request->getPostGet('seriacion_8'),
                'seriacion_9' => $this->request->getPostGet('seriacion_9'),
                'esquema_corporal_10' => $this->request->getPostGet('esquema_corporal_10'),
                'esquema_corporal_11' => $this->request->getPostGet('esquema_corporal_11'),
                'suma_dos_cifras' => $this->request->getPostGet('suma_dos_cifras'),
                'suma_cuatro_cifras' => $this->request->getPostGet('suma_cuatro_cifras'),
                'suma_cinco_mas' => $this->request->getPostGet('suma_cinco_mas'),
                'resta_tres_cifras' => $this->request->getPostGet('resta_tres_cifras'),
                'resta_cuatro_cifras' => $this->request->getPostGet('resta_cuatro_cifras'),
                'multiplicacion_una_cifra' => $this->request->getPostGet('multiplicacion_una_cifra'),
                'multiplicacion_dos_cifras' => $this->request->getPostGet('multiplicacion_dos_cifras'),
                'division_una_cifra' => $this->request->getPostGet('division_una_cifra'),
                'division_dos_cifras' => $this->request->getPostGet('division_dos_cifras'),
            );

            $hay = $this->evalMateP1->_getEvalMate($evaluacion['idprod']);
            //echo '<pre>'.var_export($hay, true).'</pre>';exit;
            if ($hay) {
                //Actualizo
                $this->evalMateP1->_update($evaluacion);
            }else{
                //Grabo
                $this->evalMateP1->_save($evaluacion);
            }
            
            return redirect()->to('prod_1_process');
        }else{

            $this->logout();
        }
    }

    public function eval_mateFinal_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $evaluacion = array(
                'idtipo' => 4,
                'idprod' => $this->request->getPostGet('id'),
                'orientacion_espacial_1' => $this->request->getPostGet('orientacion_espacial_1'),
                'orientacion_espacial_2' => $this->request->getPostGet('orientacion_espacial_2'),
                'orientacion_espacial_3' => $this->request->getPostGet('orientacion_espacial_3'),
                'orientacion_espacial_4' => $this->request->getPostGet('orientacion_espacial_4'),
                'clasificacion_5' => $this->request->getPostGet('clasificacion_5'),
                'clasificacion_6' => $this->request->getPostGet('clasificacion_6'),
                'seriacion_7' => $this->request->getPostGet('seriacion_7'),
                'seriacion_8' => $this->request->getPostGet('seriacion_8'),
                'seriacion_9' => $this->request->getPostGet('seriacion_9'),
                'esquema_corporal_10' => $this->request->getPostGet('esquema_corporal_10'),
                'esquema_corporal_11' => $this->request->getPostGet('esquema_corporal_11'),
                'suma_dos_cifras' => $this->request->getPostGet('suma_dos_cifras'),
                'suma_cuatro_cifras' => $this->request->getPostGet('suma_cuatro_cifras'),
                'suma_cinco_mas' => $this->request->getPostGet('suma_cinco_mas'),
                'resta_tres_cifras' => $this->request->getPostGet('resta_tres_cifras'),
                'resta_cuatro_cifras' => $this->request->getPostGet('resta_cuatro_cifras'),
                'multiplicacion_una_cifra' => $this->request->getPostGet('multiplicacion_una_cifra'),
                'multiplicacion_dos_cifras' => $this->request->getPostGet('multiplicacion_dos_cifras'),
                'division_una_cifra' => $this->request->getPostGet('division_una_cifra'),
                'division_dos_cifras' => $this->request->getPostGet('division_dos_cifras'),
            );

            $hay = $this->evalMateFinalP1->_getEvalMateFinal($evaluacion['idprod']);
            //echo '<pre>'.var_export($hay, true).'</pre>';exit;
            if ($hay) {
                //Actualizo
                $this->evalMateFinalP1->_update($evaluacion);
            }else{
                //Grabo
                $this->evalMateFinalP1->_save($evaluacion);
            }
            
            return redirect()->to('prod_1_process');
        }else{

            $this->logout();
        }
    }

    public function eval_mateElem_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $evaluacion = array(
                'idtipo' => 4,
                'idprod' => $this->request->getPostGet('id'),
                'relacion_figuras_geo_1' => $this->request->getPostGet('relacion_figuras_geo_1'),
                'relacion_figuras_geo_1_1' => $this->request->getPostGet('relacion_figuras_geo_1_1'),
                'seriacion_2' => $this->request->getPostGet('seriacion_2'),
                'conjuntos_2_1' => $this->request->getPostGet('conjuntos_2_1'),
                'seriacion_2_2' => $this->request->getPostGet('seriacion_2_2'),
                'orientacion_3' => $this->request->getPostGet('orientacion_3'),
                'orientacion_3_1' => $this->request->getPostGet('orientacion_3_1'),
                'orientacion_3_2' => $this->request->getPostGet('orientacion_3_2'),
                'esquema_corporal_3_3' => $this->request->getPostGet('esquema_corporal_3_3'),
                'esquema_corporal_4' => $this->request->getPostGet('esquema_corporal_4'),
                'esquema_corporal_4_1' => $this->request->getPostGet('esquema_corporal_4_1'),
                'seriacion_5' => $this->request->getPostGet('seriacion_5'),
                'suma_6' => $this->request->getPostGet('suma_6'),
                'suma_7' => $this->request->getPostGet('suma_7'),
                'resta_8' => $this->request->getPostGet('resta_8'),
                'resta_9' => $this->request->getPostGet('resta_9'),
                'multiplica_10' => $this->request->getPostGet('multiplica_10'),
                'multiplica_11' => $this->request->getPostGet('multiplica_11'),
                'divide_12' => $this->request->getPostGet('divide_12'),
                'divide_13' => $this->request->getPostGet('divide_13')
            );

            $hay = $this->evalMateElemP1->_getEvalMateElem($evaluacion['idprod']);
            //echo '<pre>'.var_export($hay, true).'</pre>';exit;
            if ($hay) {
                //Actualizo
                $this->evalMateElemP1->_update($evaluacion);
            }else{
                //Grabo
                $this->evalMateElemP1->_save($evaluacion);
            }
            
            return redirect()->to('prod_1_process');
        }else{

            $this->logout();
        }
    }

    public function eval_mateFinalElem_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $evaluacion = array(
                'idtipo' => 4,
                'idprod' => $this->request->getPostGet('id'),
                'relacion_figuras_geo_1' => $this->request->getPostGet('relacion_figuras_geo_1'),
                'relacion_figuras_geo_1_1' => $this->request->getPostGet('relacion_figuras_geo_1_1'),
                'seriacion_2' => $this->request->getPostGet('seriacion_2'),
                'conjuntos_2_1' => $this->request->getPostGet('conjuntos_2_1'),
                'seriacion_2_2' => $this->request->getPostGet('seriacion_2_2'),
                'orientacion_3' => $this->request->getPostGet('orientacion_3'),
                'orientacion_3_1' => $this->request->getPostGet('orientacion_3_1'),
                'orientacion_3_2' => $this->request->getPostGet('orientacion_3_2'),
                'esquema_corporal_3_3' => $this->request->getPostGet('esquema_corporal_3_3'),
                'esquema_corporal_4' => $this->request->getPostGet('esquema_corporal_4'),
                'esquema_corporal_4_1' => $this->request->getPostGet('esquema_corporal_4_1'),
                'seriacion_5' => $this->request->getPostGet('seriacion_5'),
                'suma_6' => $this->request->getPostGet('suma_6'),
                'suma_7' => $this->request->getPostGet('suma_7'),
                'resta_8' => $this->request->getPostGet('resta_8'),
                'resta_9' => $this->request->getPostGet('resta_9'),
                'multiplica_10' => $this->request->getPostGet('multiplica_10'),
                'multiplica_11' => $this->request->getPostGet('multiplica_11'),
                'divide_12' => $this->request->getPostGet('divide_12'),
                'divide_13' => $this->request->getPostGet('divide_13')
            );

            $hay = $this->evalMateFinalElemP1->_getEvalMateFinalElem($evaluacion['idprod']);
            //echo '<pre>'.var_export($hay, true).'</pre>';exit;
            if ($hay) {
                //Actualizo
                $this->evalMateFinalElemP1->_update($evaluacion);
            }else{
                //Grabo
                $this->evalMateFinalElemP1->_save($evaluacion);
            }
            
            return redirect()->to('prod_1_process');
        }else{

            $this->logout();
        }
    }

    public function prod_1_reg_proceso($amie) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1) {
            
            $data['amie'] = $amie;
            $data['asistencia'] = $this->asistenciaP1->_getAsistencia($amie);
            $data['eval_final'] = $this->evalFinalP1->_getEvalFinal($amie);

            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente1/prod1_edit_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod_1_form_elije_eval_mate($idprod) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            
            $data['idprod'] = $idprod;
            $data['datos'] = $this->prod1Model->find($idprod);
            $data['mensaje'] = $this->session->form_error;

            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente1/prod1_elije_evalmate_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod_1_form_elije_eval_mate_final($idprod) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            
            $data['idprod'] = $idprod;
            $data['datos'] = $this->prod1Model->find($idprod);
            $data['mensaje'] = $this->session->form_error;

            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente1/prod1_elije_evalmatefinal_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }


    public function prod1_elije_evalMate() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            $data['tipo_prueba'] =  $this->request->getPostGet('tipo_prueba');
            $data['idprod'] =  $this->request->getPostGet('id');

            if ($this->request->getPostGet('tipo_prueba') != '0') {
                
                $this->session->set('form_error', "");
                $data['datos'] = $this->prod1Model->find($data['idprod']);
                if ($this->request->getPostGet('tipo_prueba') == 1) {
                    //Prueba ELEMENTAL
                    
                    $data['eval_mate'] = $this->evalMateElemP1->_getEvalMateElem($data['idprod']);
                    //echo '<pre>'.var_export($data['eval_mate'], true).'</pre>';exit;
                    $data['title']='MYRP - DYA';
                    $data['main_content']='componente1/prod1_edit_evalMateElemental_view';
                    return view('includes/template', $data);
                }else{
                    //Prueba SUPERIOR
                    $data['eval_mate'] = $this->evalMateP1->_getEvalMate($data['idprod']);
                    $data['title']='MYRP - DYA';
                    $data['main_content']='componente1/prod1_edit_evalMate_view';
                    return view('includes/template', $data);
                }
                
                
            }else{
                $this->session->set('form_error', "Es obligatorio elegir un tipo de prueba");
                return redirect()->to('prod-1-form-tipo-eval-mate/'.$data['idprod']);
            }
            //echo '<pre>'.var_export($data['tipo_prueba'], true).'</pre>';exit;

            
        }else{

            $this->logout();
        }
    }

    public function prod1_elije_evalMateFinal() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            $data['tipo_prueba'] =  $this->request->getPostGet('tipo_prueba');
            $data['idprod'] =  $this->request->getPostGet('id');
            //echo '<pre>'.var_export($data['tipo_prueba'], true).'</pre>';exit;
            if ($this->request->getPostGet('tipo_prueba') != '0') {
                
                $this->session->set('form_error', "");
                $data['datos'] = $this->prod1Model->find($data['idprod']);
                if ($this->request->getPostGet('tipo_prueba') == 1) {
                    //Prueba ELEMENTAL
                    
                    $data['eval_mate'] = $this->evalMateFinalElemP1->_getEvalMateFinalElem($data['idprod']);
                    //echo '<pre>'.var_export($data['eval_mate'], true).'</pre>';exit;
                    $data['title']='MYRP - DYA';
                    $data['main_content']='componente1/prod1_edit_evalMateFinalElemental_view';
                    return view('includes/template', $data);
                }else{
                    //Prueba SUPERIOR
                    $data['eval_mate'] = $this->evalMateFinalP1->_getEvalMateFinal($data['idprod']);
                    $data['title']='MYRP - DYA';
                    $data['main_content']='componente1/prod1_edit_evalMateFinal_view';
                    return view('includes/template', $data);
                }
                
                
            }else{
                $this->session->set('form_error', "Es obligatorio elegir un tipo de prueba");
                return redirect()->to('prod-1-form-tipo-eval-mate-final/'.$data['idprod']);
            }
            
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

    public function prod_1_reg_eval_mate() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            
            $data['idprod'] = $idprod;
            $data['datos'] = $this->prod1Model->find($idprod);

            
            if ($data['datos']->anio_egb >= 5) {
                $data['eval_mate'] = $this->evalMateP1->_getEvalMate($idprod);
                $data['title']='MYRP - DYA';
                $data['main_content']='componente1/prod1_edit_evalMate_view';
                return view('includes/template', $data);
            }else{
                $data['eval_mate'] = $this->evalMateElemP1->_getEvalMateElem($idprod);
                //echo '<pre>'.var_export($data['eval_mate'], true).'</pre>';exit;
                $data['title']='MYRP - DYA';
                $data['main_content']='componente1/prod1_edit_evalMateElemental_view';
                return view('includes/template', $data);
            }
            
        }else{

            $this->logout();
        }
    }

    public function prod_1_reg_eval_mate_final($idprod) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            
            $data['idprod'] = $idprod;
            $data['datos'] = $this->prod1Model->find($idprod);

            
            if ($data['datos']->anio_egb >= 5) {
                $data['eval_mate'] = $this->evalMateFinalP1->_getEvalMateFinal($idprod);
                $data['title']='MYRP - DYA';
                $data['main_content']='componente1/prod1_edit_evalMateFinal_view';
                return view('includes/template', $data);
            }else{
                $data['eval_mate'] = $this->evalMateFinalElemP1->_getEvalMateFinalElem($idprod);
                //echo '<pre>'.var_export($data['eval_mate'], true).'</pre>';exit;
                $data['title']='MYRP - DYA';
                $data['main_content']='componente1/prod1_edit_evalMateFinalElemental_view';
                return view('includes/template', $data);
            }
            
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
            $data['cursos'] = $this->cursoModel->findAll();

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

    public function prod_1_asistencia() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1) {

            $data['centros'] = $this->prod1Model->_getCentrosEducativos();
            //echo '<pre>'.var_export($data['centro'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='componente1/prod1_asistencia_view';
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
