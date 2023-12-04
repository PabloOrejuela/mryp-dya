<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;

class Prod1 extends BaseController {

    public function index() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1) {
            $this->session->set('form_error', "");
            
            //$data['mis_amie'] = $this->prod1Model->_getMisAmie($data['nombre']);

            //$data['componente_1'] = $this->prod1Model->findAll();
            if ($this->session->idrol == 2) {
                $data['componente_1'] = $this->prod1Model->_getMisRegistros($data['nombre']);
            }else{
                $data['componente_1'] = $this->prod1Model->findAll();
            }
            
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            
            if ($this->session->idrol == 2) {
                $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
            }else{
                $data['centros'] = $this->prod1Model->_getCentrosEducativos();
            }
            
            $data['datos'] = $this->prod1Model->find($id);

            //echo '<pre>'.var_export($data['centros'], true).'</pre>';exit;

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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            //$this->session->set('form_error', "Los campos con asterisco son obligatorios");

            if ($this->session->idrol == 2) {
                $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
            }else{
                $data['centros'] = $this->prod1Model->_getCentrosEducativos();
            }
 
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
                'tutor_apoyo' => $this->session->nombre,
            );
            
            if (
                    $producto_1['anio_egb'] == 'NULL' || 
                    $producto_1['tutor_apoyo'] == 'NULL' || 
                    $producto_1['cohorte'] == 'NULL' || 
                    $producto_1['amie'] == 'NULL'
                ) {
                
                $this->session->set('form_error', "Falta llenar campos obligatorios");
                return redirect()->to('prod-1-create');
            }else{
                $this->session->set('form_error', "");
                $this->prod1Model->save($producto_1);
            }

            return redirect()->to('prod_1');
        }else{

            $this->logout();
        }
    }

    public function update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            $id = $id;
            $this->prod1Model->delete($id);

            return redirect()->to('prod_1');
        }else{

            $this->logout();
        }
    }

    public function prod1_asistencia_centro_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            
            $amie = $this->request->getPostGet('amie');
            $cohorte = $this->request->getPostGet('cohorte');

            $data = array(
                'amie' => $amie,
                'horas_atencion_total' => strtoupper($this->request->getPostGet('horas_atencion_total')),
                'horas_planificadas' => strtoupper($this->request->getPostGet('horas_planificadas')),
                'horas_efectivas' => strtoupper($this->request->getPostGet('horas_efectivas')),
                'horas_perdidas' => strtoupper($this->request->getPostGet('horas_perdidas')),
                'cohorte' => $cohorte
            );
            
            if ($amie  != NULL && isset($amie) && $cohorte  != NULL && isset($cohorte) && $cohorte != 'NULL') {
                $hay = $this->asistenciaP1->_getAsistencia($amie, $cohorte);
            }else{
                if ($this->session->idrol == 2) {
                    $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
                }else{
                    $data['centros'] = $this->prod1Model->_getCentrosEducativos();
                }

                $data['title']='MYRP - DYA';
                $data['main_content']='componente1/prod1_asistencia_view';
                return view('includes/template', $data);
            }
            //echo '<pre>'.var_export($amie, true).'</pre>';exit;
            if ($hay) {
                //Actualizo
                $this->asistenciaP1->_update($data);
            }else{
                //Grabo
                $this->asistenciaP1->_save($data);
            }

            if ($this->session->idrol == 2) {
                $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
            }else{
                $data['centros'] = $this->prod1Model->_getCentrosEducativos();
            }

            $data['title']='MYRP - DYA';
            $data['main_content']='componente1/prod1_asistencia_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function diagnostico_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1) {

            if ($this->session->idrol == 2) {
                $data['componente_1'] = $this->prod1Model->_getMisRegistros($data['nombre']);
            }else{
                $data['componente_1'] = $this->prod1Model->findAll();
            }

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
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1) {

            $data = array(
                'amie' => null,
                'horas_atencion_total' => 0,
                'horas_planificadas' => 0,
                'horas_efectivas' => 0,
                'horas_perdidas' => 0,
                'cohorte' => null
            );

            $data['amie'] = $this->request->getPostGet('amie');
            $data['cohorte'] = $this->request->getPostGet('cohorte');
            
            
            if ($this->session->idrol == 2) {
                $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
            }else{
                $data['centros'] = $this->prod1Model->_getCentrosEducativos();
            }
            
            if ($data['amie']  != NULL && isset($data['amie']) && $data['cohorte']  != NULL && isset($data['cohorte']) && $data['cohorte'] != 'NULL') {
                $data['asistencia'] = $this->asistenciaP1->_getAsistencia($data['amie'], $data['cohorte']);
                //echo '<pre>'.var_export($data['asistencia'], true).'</pre>';exit;
            }else{
                $data['cohorte'] = 'NULL';
                $data['amie'] = 'NULL';
                $data['asistencia'] = NULL;
            }

            $data['title']='MYRP - DYA';
            $data['main_content']='componente1/prod1_asistencia_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
    }

    public function prod_1_asistencia_form() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_1'] = $this->session->componente_1;

        if ($data['is_logged'] == 1 && $data['componente_1'] == 1) {

            $data = array(
                'amie' => null,
                'horas_atencion_total' => 0,
                'horas_planificadas' => 0,
                'horas_efectivas' => 0,
                'horas_perdidas' => 0,
                'cohorte' => null
            );

            $data['amie'] = $this->request->getPostGet('amie');
            $data['cohorte'] = $this->request->getPostGet('cohorte');

            if ($data['amie'] == 'NULL' || $data['cohorte'] == 'NULL') {
                return redirect()->to('prod-1-asistencia');
            }else{
                if ($this->session->idrol == 2) {
                    $data['centros'] = $this->prod1Model->_getMisAmie($this->session->nombre);
                }else{
                    $data['centros'] = $this->prod1Model->_getCentrosEducativos();
                }
                
                if ($data['amie']  != NULL && isset($data['amie']) && $data['cohorte']  != NULL && isset($data['cohorte']) && $data['cohorte'] != 'NULL') {
                    $data['asistencia'] = $this->asistenciaP1->_getAsistencia($data['amie'], $data['cohorte']);
                    //echo '<pre>'.var_export($data['asistencia'], true).'</pre>';exit;
                }else{
                    $data['cohorte'] = 'NULL';
                    $data['amie'] = 'NULL';
                    $data['asistencia'] = NULL;
                }
                //echo '<pre>'.var_export($data['centros'], true).'</pre>';exit;
                $data['title']='MYRP - DYA';
                $data['main_content']='componente1/prod1_asistencia_form_view';
                return view('includes/template', $data);
            }
            
        }else{

            $this->logout();
        }
    }

    public function prod_1_descargar_registros(){

        $registros = $this->prod1Model->_getAllRegistrosExcel();
        //echo '<pre>'.var_export($registros, true).'</pre>';exit;
        $fila = 2;

        //Creo la hoja
        $phpExcel = new Spreadsheet();
        $phpExcel
            ->getProperties()
            ->setCreator("Aquí va el creador, como cadena")
            ->setLastModifiedBy('Parzibyte') // última vez modificado por
            ->setTitle('Prod 1 - Registros')
            ->setSubject('Reportes MYRP')
            ->setDescription('Reporte con los registros del Prod 1')
            ->setKeywords('etiquetas o palabras clave separadas por espacios')
            ->setCategory('Registros');

        $nombreDelDocumento = "Prod 1 - Registros.xlsx";

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

        $phpExcel->getActiveSheet()->getStyle('A1:Z1')->applyFromArray($styleCabecera);

        //Edito la info que va a ir en el archivo excel
        $hoja->setCellValue('A1', "AMIE");
        $hoja->setCellValue('B1', "CENTRO EDUCATIVO");
        $hoja->setCellValue('C1', "CIUDAD");
        $hoja->setCellValue('D1', "PROVINCIA");
        $hoja->setCellValue('E1', "COHORTE");
        $hoja->setCellValue('F1', "FECHA INICIO");
        $hoja->setCellValue('G1', "FECHA FIN");
        $hoja->setCellValue('H1', "AÑO LECTIVO");
        $hoja->setCellValue('I1', "NOMBRES");
        $hoja->setCellValue('J1', "APELLIDOS");
        $hoja->setCellValue('K1', "DOCUMENTO");
        $hoja->setCellValue('L1', "NACIONALIDAD");
        $hoja->setCellValue('M1', "ETNIA");
        $hoja->setCellValue('N1', "FECHA NACIMIENTO");
        $hoja->setCellValue('P1', "EDAD");
        $hoja->setCellValue('P1', "GÉNERO");
        $hoja->setCellValue('Q1', "DISCAPACIDAD");
        $hoja->setCellValue('R1', "TIPO DISCAPACIDAD");
        $hoja->setCellValue('S1', "AÑO EGB");
        $hoja->setCellValue('T1', "TUTOR APOYO");
        $hoja->setCellValue('U1', "DOCENTE");
        $hoja->setCellValue('V1', "REPRESENTANTE");
        $hoja->setCellValue('W1', "PARENTESTO");
        $hoja->setCellValue('X1', "NACIONALIDAD");
        $hoja->setCellValue('V1', "DIRECCION");
        $hoja->setCellValue('Z1', "CONTACTO");
        $hoja->setCellValue('AA1', "EMAIL");

        foreach ($registros as $key => $value) {
            $phpExcel->getActiveSheet()->getStyle('A'.$fila.':Z'.$fila)->applyFromArray($styleFila);
            $hoja->setCellValue('A'.$fila, $value->amie);
            $hoja->setCellValue('B'.$fila, $value->nombre);
            $hoja->setCellValue('C'.$fila, $value->ciudad);
            $hoja->setCellValue('D'.$fila, $value->provincia);
            $hoja->setCellValue('E'.$fila, $value->cohorte);
            $hoja->setCellValue('F'.$fila, $value->fecha_inicio);
            $hoja->setCellValue('G'.$fila, $value->fecha_fin);
            $hoja->setCellValue('H'.$fila, $value->anio_lectivo);
            $hoja->setCellValue('I'.$fila, $value->nombres);
            $hoja->setCellValue('J'.$fila, $value->apellidos);
            $hoja->setCellValue('K'.$fila, $value->documento);
            $hoja->setCellValue('L'.$fila, $value->nacionalidad);
            $hoja->setCellValue('M'.$fila, $value->etnia);
            $hoja->setCellValue('N'.$fila, $value->fecha_nac);
            $hoja->setCellValue('O'.$fila, $value->edad);
            $hoja->setCellValue('P'.$fila, $value->genero);
            $hoja->setCellValue('Q'.$fila, $value->discapacidad);
            $hoja->setCellValue('R'.$fila, $value->tipo_discapacidad);
            $hoja->setCellValue('S'.$fila, $value->anio_egb);
            $hoja->setCellValue('T'.$fila, $value->tutor_apoyo);
            $hoja->setCellValue('U'.$fila, $value->docente_tutor);
            $hoja->setCellValue('V'.$fila, $value->representante);
            $hoja->setCellValue('W'.$fila, $value->parentesto_rep);
            $hoja->setCellValue('X'.$fila, $value->nacionalidad_rep);
            $hoja->setCellValue('Y'.$fila, $value->direccion_rep);
            $hoja->setCellValue('Z'.$fila, $value->contacto_telf);
            $hoja->setCellValue('AA'.$fila, $value->email);


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

    public function descargaRegistrosProcesos(){
        ini_set('memory_limit', '256M');

        $registros = $this->prod1Model->_getAllRegistrosExcel();
        //echo '<pre>'.var_export($registros, true).'</pre>';exit;
        $fila = 1;

        //Creo la hoja
        $phpExcel = new Spreadsheet();
        $phpExcel
            ->getProperties()
            ->setCreator("Aquí va el creador, como cadena")
            ->setLastModifiedBy('Parzibyte') // última vez modificado por
            ->setTitle('Prod 1 - Registros')
            ->setSubject('Reportes MYRP')
            ->setDescription('Reporte con los registros del Prod 1')
            ->setKeywords('etiquetas o palabras clave separadas por espacios')
            ->setCategory('Registros');

        $nombreDelDocumento = "Prod 1 - Registros y procesos.xlsx";

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
        $phpExcel->getActiveSheet()->mergeCells('A'.$fila.':AA'.$fila);
        $phpExcel->getActiveSheet()->getStyle('A'.$fila.':AA'.$fila)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('a1ccd4');

        $hoja->setCellValue('AB'.$fila, "DIAGNOSTICO LECTURA Y ESCRITURA");
        $phpExcel->getActiveSheet()->mergeCells('AB'.$fila.':AQ'.$fila);
        $phpExcel->getActiveSheet()->getStyle('AB'.$fila.':AQ'.$fila)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('afd6a7');

        $hoja->setCellValue('AR'.$fila, "EVALUACION FINAL LECTURA Y ESCRITURA");
        $phpExcel->getActiveSheet()->mergeCells('AR'.$fila.':BG'.$fila);
        $phpExcel->getActiveSheet()->getStyle('AR'.$fila.':BG'.$fila)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('b7a2da');

        $hoja->setCellValue('BH'.$fila, "EVALUACION MATEMÁTICA ELEMENTAL");
        $phpExcel->getActiveSheet()->mergeCells('BH'.$fila.':CA'.$fila);
        $phpExcel->getActiveSheet()->getStyle('BH'.$fila.':CA'.$fila)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('C7B2da');

        $hoja->setCellValue('CB'.$fila, "EVALUACION FINAL MATEMÁTICA ELEMENTAL");
        $phpExcel->getActiveSheet()->mergeCells('CB'.$fila.':CU'.$fila);
        $phpExcel->getActiveSheet()->getStyle('CB'.$fila.':CU'.$fila)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('A2B6dC');

        $hoja->setCellValue('CV'.$fila, "EVALUACION MATEMÁTICA MEDIA/SUPERIOR");
        $phpExcel->getActiveSheet()->mergeCells('CV'.$fila.':DO'.$fila);
        $phpExcel->getActiveSheet()->getStyle('CV'.$fila.':DO'.$fila)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f2f1b1');

        $hoja->setCellValue('DP'.$fila, "EVALUACION FINAL MATEMÁTICA MEDIA/SUPERIOR");
        $phpExcel->getActiveSheet()->mergeCells('DP'.$fila.':EI'.$fila);
        $phpExcel->getActiveSheet()->getStyle('DP'.$fila.':EI'.$fila)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ebea7a');


        $fila = 2;
        $phpExcel->getActiveSheet()->getStyle('A'.$fila.':CZ'.$fila)->applyFromArray($styleCabecera);
        //Edito la info que va a ir en el archivo excel
        $hoja->setCellValue('A'.$fila, "AMIE");
        $hoja->setCellValue('B'.$fila, "CENTRO EDUCATIVO");
        $hoja->setCellValue('C'.$fila, "CIUDAD");
        $hoja->setCellValue('D'.$fila, "PROVINCIA");
        $hoja->setCellValue('E'.$fila, "COHORTE");
        $hoja->setCellValue('F'.$fila, "FECHA INICIO");
        $hoja->setCellValue('G'.$fila, "FECHA FIN");
        $hoja->setCellValue('H'.$fila, "AÑO LECTIVO");
        $hoja->setCellValue('I'.$fila, "NOMBRES");
        $hoja->setCellValue('J'.$fila, "APELLIDOS");
        $hoja->setCellValue('K'.$fila, "DOCUMENTO");
        $hoja->setCellValue('L'.$fila, "NACIONALIDAD");
        $hoja->setCellValue('M'.$fila, "ETNIA");
        $hoja->setCellValue('N'.$fila, "FECHA NACIMIENTO");
        $hoja->setCellValue('P'.$fila, "EDAD");
        $hoja->setCellValue('P'.$fila, "GÉNERO");
        $hoja->setCellValue('Q'.$fila, "DISCAPACIDAD");
        $hoja->setCellValue('R'.$fila, "TIPO DISCAPACIDAD");
        $hoja->setCellValue('S'.$fila, "AÑO EGB");
        $hoja->setCellValue('T'.$fila, "TUTOR APOYO");
        $hoja->setCellValue('U'.$fila, "DOCENTE");
        $hoja->setCellValue('V'.$fila, "REPRESENTANTE");
        $hoja->setCellValue('W'.$fila, "PARENTESTO");
        $hoja->setCellValue('X'.$fila, "NACIONALIDAD");
        $hoja->setCellValue('V'.$fila, "DIRECCION");
        $hoja->setCellValue('Z'.$fila, "CONTACTO");
        $hoja->setCellValue('AA'.$fila, "EMAIL");
        //diagnostico lye
        $hoja->setCellValue('AB'.$fila, "Necesitó apoyo consigna lectora (S,N)");
        $hoja->setCellValue('AC'.$fila, "Observación durante la aplicación");
        $hoja->setCellValue('AD'.$fila, "P1 - Comprensión consigna lectora");
        $hoja->setCellValue('AE'.$fila, "P1 - Significado de la escritura y la Inteligibilidad (A,B)");
        $hoja->setCellValue('AF'.$fila, "P2 - Comprensión consigna lectora (A,B)");
        $hoja->setCellValue('AG'.$fila, "P2 - Descripción del dibujo");
        $hoja->setCellValue('AH'.$fila, "P3 - Comprensión consigna lectora (A,B,C)");
        $hoja->setCellValue('AI'.$fila, "P3 - Inteligibilidad (A, B, C)");
        $hoja->setCellValue('AJ'.$fila, "P3 - Coherencia (A,B,C,D)");
        $hoja->setCellValue('AK'.$fila, "P3 - Sintáxis (A,B,C,D)");
        $hoja->setCellValue('AL'.$fila, "P3 - Estándares EGB Subnivel 2 y 3 (A,B)");
        $hoja->setCellValue('AM'.$fila, "P4 - Comprensión consigna lectora (A,B,C)");
        $hoja->setCellValue('AN'.$fila, "P4 - Inteligibilidad (A, B, C)");
        $hoja->setCellValue('AO'.$fila, "P4 - Coherencia (A,B,C,D)");
        $hoja->setCellValue('AP'.$fila, "P4 - Sintáxis (A,B,C,D)");
        $hoja->setCellValue('AQ'.$fila, "P4 - Estándares EGB Subnivel 2 y 3 (A,B)");

        //Eval final lye
        $hoja->setCellValue('AR'.$fila, "Necesitó apoyo consigna lectora (S,N)");
        $hoja->setCellValue('AS'.$fila, "Observación durante la aplicación");
        $hoja->setCellValue('AT'.$fila, "P1 - Comprensión consigna lectora");
        $hoja->setCellValue('AU'.$fila, "P1 - Significado de la escritura y la Inteligibilidad (A,B)");
        $hoja->setCellValue('AV'.$fila, "P2 - Comprensión consigna lectora (A,B)");
        $hoja->setCellValue('AW'.$fila, "P2 - Descripción del dibujo");
        $hoja->setCellValue('AX'.$fila, "P3 - Comprensión consigna lectora (A,B,C)");
        $hoja->setCellValue('AY'.$fila, "P3 - Inteligibilidad (A, B, C)");
        $hoja->setCellValue('AZ'.$fila, "P3 - Coherencia (A,B,C,D)");
        $hoja->setCellValue('BA'.$fila, "P3 - Sintáxis (A,B,C,D)");
        $hoja->setCellValue('BB'.$fila, "P3 - Estándares EGB Subnivel 2 y 3 (A,B)");
        $hoja->setCellValue('BC'.$fila, "P4 - Comprensión consigna lectora (A,B,C)");
        $hoja->setCellValue('BD'.$fila, "P4 - Inteligibilidad (A, B, C)");
        $hoja->setCellValue('BE'.$fila, "P4 - Coherencia (A,B,C,D)");
        $hoja->setCellValue('BF'.$fila, "P4 - Sintáxis (A,B,C,D)");
        $hoja->setCellValue('BG'.$fila, "P4 - Estándares EGB Subnivel 2 y 3 (A,B)");

        //Mate elemental
        $hoja->setCellValue('BH'.$fila, "P1 - Relación Figuras Geométricas");
        $hoja->setCellValue('BI'.$fila, "P2 - Relación Figuras Geométricas");
        $hoja->setCellValue('BJ'.$fila, "2 - Seriación 2");
        $hoja->setCellValue('BK'.$fila, "2.1 - Seriación 2");
        $hoja->setCellValue('BL'.$fila, "2.2 - Seriación 2");
        $hoja->setCellValue('BM'.$fila, "3 - Orientación Espacial");
        $hoja->setCellValue('BN'.$fila, "3.1 - Seriación 2");
        $hoja->setCellValue('BO'.$fila, "3.2 - Seriación 2");
        $hoja->setCellValue('BP'.$fila, "3.3 - Esquema Corporal");
        $hoja->setCellValue('BQ'.$fila, "4 - Esquema Corporal");
        $hoja->setCellValue('BR'.$fila, "4.1 - Esquema Corporal");
        $hoja->setCellValue('BS'.$fila, "5 - Esquema Corporal");
        $hoja->setCellValue('BT'.$fila, "6 - Suma");
        $hoja->setCellValue('BU'.$fila, "7 - Suma");
        $hoja->setCellValue('BV'.$fila, "8 - Resta");
        $hoja->setCellValue('BW'.$fila, "9 - Resta");
        $hoja->setCellValue('BX'.$fila, "10 - Multiplicación");
        $hoja->setCellValue('BY'.$fila, "11 - Multiplicación");
        $hoja->setCellValue('BZ'.$fila, "12 - División");
        $hoja->setCellValue('CA'.$fila, "13 - División");

        //Mate elemental Final
        $hoja->setCellValue('CB'.$fila, "P1 - Relación Figuras Geométricas");
        $hoja->setCellValue('CC'.$fila, "P2 - Relación Figuras Geométricas");
        $hoja->setCellValue('CD'.$fila, "2 - Seriación 2");
        $hoja->setCellValue('CE'.$fila, "2.1 - Seriación 2");
        $hoja->setCellValue('CF'.$fila, "2.2 - Seriación 2");
        $hoja->setCellValue('CG'.$fila, "3 - Orientación Espacial");
        $hoja->setCellValue('CH'.$fila, "3.1 - Seriación 2");
        $hoja->setCellValue('CI'.$fila, "3.2 - Seriación 2");
        $hoja->setCellValue('CJ'.$fila, "3.3 - Esquema Corporal");
        $hoja->setCellValue('CK'.$fila, "4 - Esquema Corporal");
        $hoja->setCellValue('CL'.$fila, "4.1 - Esquema Corporal");
        $hoja->setCellValue('CM'.$fila, "5 - Esquema Corporal");
        $hoja->setCellValue('CN'.$fila, "6 - Suma");
        $hoja->setCellValue('CO'.$fila, "7 - Suma");
        $hoja->setCellValue('CP'.$fila, "8 - Resta");
        $hoja->setCellValue('CQ'.$fila, "9 - Resta");
        $hoja->setCellValue('CR'.$fila, "10 - Multiplicación");
        $hoja->setCellValue('CS'.$fila, "11 - Multiplicación");
        $hoja->setCellValue('CT'.$fila, "12 - División");
        $hoja->setCellValue('CU'.$fila, "13 - División");

        //Mate MEDIA SUPERIOR
        $hoja->setCellValue('CV'.$fila, "P1 - Orientación espacial");
        $hoja->setCellValue('CW'.$fila, "P2 - Orientación espacial");
        $hoja->setCellValue('CX'.$fila, "P3 - Orientación espacial");
        $hoja->setCellValue('CY'.$fila, "P4 - Orientación espacial");
        $hoja->setCellValue('CZ'.$fila, "P5 - Clasificación");
        $hoja->setCellValue('DA'.$fila, "P6 - Clasificación");
        $hoja->setCellValue('DB'.$fila, "P7 - Seriación");
        $hoja->setCellValue('DC'.$fila, "P8 - Seriación");
        $hoja->setCellValue('DD'.$fila, "P9 - Seriación");
        $hoja->setCellValue('DE'.$fila, "P10 - Esquema Corporal");
        $hoja->setCellValue('DF'.$fila, "P11 - Esquema Corporal");
        $hoja->setCellValue('DG'.$fila, "P12 - Suma de dos cifras");
        $hoja->setCellValue('DH'.$fila, "P13 - Suma de cuatro cifras");
        $hoja->setCellValue('DI'.$fila, "P14 - Suma de cinco o mas cifras");
        $hoja->setCellValue('DJ'.$fila, "P15 - Resta de tres cifras");
        $hoja->setCellValue('DK'.$fila, "P16 - Resta de cuatro cifras");
        $hoja->setCellValue('DL'.$fila, "P17 - Multiplicación una cifra");
        $hoja->setCellValue('DM'.$fila, "P18 - Multiplicación dos cifras");
        $hoja->setCellValue('DN'.$fila, "P19 - División una cifra");
        $hoja->setCellValue('DO'.$fila, "P20 - División dos cifras");

        //Mate FINAL MEDIA SUPERIOR
        $hoja->setCellValue('DP'.$fila, "P1 - Orientación espacial");
        $hoja->setCellValue('DQ'.$fila, "P2 - Orientación espacial");
        $hoja->setCellValue('DR'.$fila, "P3 - Orientación espacial");
        $hoja->setCellValue('DS'.$fila, "P4 - Orientación espacial");
        $hoja->setCellValue('DT'.$fila, "P5 - Clasificación");
        $hoja->setCellValue('DU'.$fila, "P6 - Clasificación");
        $hoja->setCellValue('DV'.$fila, "P7 - Seriación");
        $hoja->setCellValue('DW'.$fila, "P8 - Seriación");
        $hoja->setCellValue('DX'.$fila, "P9 - Seriación");
        $hoja->setCellValue('DY'.$fila, "P10 - Esquema Corporal");
        $hoja->setCellValue('DZ'.$fila, "P11 - Esquema Corporal");
        $hoja->setCellValue('EA'.$fila, "P12 - Suma de dos cifras");
        $hoja->setCellValue('EB'.$fila, "P13 - Suma de cuatro cifras");
        $hoja->setCellValue('EC'.$fila, "P14 - Suma de cinco o mas cifras");
        $hoja->setCellValue('ED'.$fila, "P15 - Resta de tres cifras");
        $hoja->setCellValue('EE'.$fila, "P16 - Resta de cuatro cifras");
        $hoja->setCellValue('EF'.$fila, "P17 - Multiplicación una cifra");
        $hoja->setCellValue('EG'.$fila, "P18 - Multiplicación dos cifras");
        $hoja->setCellValue('EH'.$fila, "P19 - División una cifra");
        $hoja->setCellValue('EI'.$fila, "P20 - División dos cifras");

        $fila = 3;

        foreach ($registros as $key => $value) {
            //echo $value->id.'<br>';
            $diagnostico = $this->diagMyrpP1->_getDiagMyrpP1($value->id);
            $diagLectEscrFinal = $this->evalFinalP1->_getEvalFinal($value->id);
            $mateElemental = $this->evalMateElemP1->_getEvalMateElem($value->id);
            $mateElementalFinal = $this->evalMateFinalElemP1->_getEvalMateFinalElem($value->id);
            $mateAvanzada = $this->evalMateP1->_getEvalMate($value->id);
            $mateAvanzadaFinal = $this->evalMateFinalP1->_getEvalMateFinal($value->id);
            //echo '<pre>'.var_export($diagnostico, true).'</pre>';
            $phpExcel->getActiveSheet()->getStyle('A'.$fila.':AZ'.$fila)->applyFromArray($styleFila);
            $phpExcel->getActiveSheet()->getStyle('AB'.$fila.':EI'.$fila)->applyFromArray($styleFilaProcess);
            $hoja->setCellValue('A'.$fila, $value->amie);
            $hoja->setCellValue('B'.$fila, $value->nombre);
            $hoja->setCellValue('C'.$fila, $value->ciudad);
            $hoja->setCellValue('D'.$fila, $value->provincia);
            $hoja->setCellValue('E'.$fila, $value->cohorte);
            $hoja->setCellValue('F'.$fila, $value->fecha_inicio);
            $hoja->setCellValue('G'.$fila, $value->fecha_fin);
            $hoja->setCellValue('H'.$fila, $value->anio_lectivo);
            $hoja->setCellValue('I'.$fila, $value->nombres);
            $hoja->setCellValue('J'.$fila, $value->apellidos);
            $hoja->setCellValue('K'.$fila, $value->documento);
            $hoja->setCellValue('L'.$fila, $value->nacionalidad);
            $hoja->setCellValue('M'.$fila, $value->etnia);
            $hoja->setCellValue('N'.$fila, $value->fecha_nac);
            $hoja->setCellValue('O'.$fila, $value->edad);
            $hoja->setCellValue('P'.$fila, $value->genero);
            $hoja->setCellValue('Q'.$fila, $value->discapacidad);
            $hoja->setCellValue('R'.$fila, $value->tipo_discapacidad);
            $hoja->setCellValue('S'.$fila, $value->anio_egb);
            $hoja->setCellValue('T'.$fila, $value->tutor_apoyo);
            $hoja->setCellValue('U'.$fila, $value->docente_tutor);
            $hoja->setCellValue('V'.$fila, $value->representante);
            $hoja->setCellValue('W'.$fila, $value->parentesto_rep);
            $hoja->setCellValue('X'.$fila, $value->nacionalidad_rep);
            $hoja->setCellValue('Y'.$fila, $value->direccion_rep);
            $hoja->setCellValue('Z'.$fila, $value->contacto_telf);
            $hoja->setCellValue('AA'.$fila, $value->email);

            //Diagnóstico MYRP
            if ($diagnostico) {
                $hoja->setCellValue('AB'.$fila, $diagnostico->necesito_apoyo);
                $hoja->setCellValue('AC'.$fila, $diagnostico->observacion);
                $hoja->setCellValue('AD'.$fila, $diagnostico->p1_comprension_lectora);
                $hoja->setCellValue('AE'.$fila, $diagnostico->p1_inteligibilidad);
                $hoja->setCellValue('AF'.$fila, $diagnostico->p2_comprension_lectora);
                $hoja->setCellValue('AG'.$fila, $diagnostico->p2_descripcion_dibujo);
                $hoja->setCellValue('AH'.$fila, $diagnostico->p3_comprension_lectora);
                $hoja->setCellValue('AI'.$fila, $diagnostico->p3_inteligibilidad);
                $hoja->setCellValue('AJ'.$fila, $diagnostico->p3_coherencia);
                $hoja->setCellValue('AK'.$fila, $diagnostico->p3_sintaxis);
                $hoja->setCellValue('AL'.$fila, $diagnostico->p3_estandares_egb_sub2y3);
                $hoja->setCellValue('AM'.$fila, $diagnostico->p4_comprension_lectora);
                $hoja->setCellValue('AN'.$fila, $diagnostico->p4_inteligibilidad);
                $hoja->setCellValue('AO'.$fila, $diagnostico->p4_coherencia);
                $hoja->setCellValue('AP'.$fila, $diagnostico->p4_sintaxis);
                $hoja->setCellValue('AQ'.$fila, $diagnostico->p4_estandares_egb_sub2y3);
            }
            
            if ($diagLectEscrFinal) {
                //Evaluación final lect y escritura
                $hoja->setCellValue('AR'.$fila, $diagLectEscrFinal->necesito_apoyo);
                $hoja->setCellValue('AS'.$fila, $diagLectEscrFinal->observacion);
                $hoja->setCellValue('AT'.$fila, $diagLectEscrFinal->p1_comprension_lectora);
                $hoja->setCellValue('AU'.$fila, $diagLectEscrFinal->p1_inteligibilidad);
                $hoja->setCellValue('AV'.$fila, $diagLectEscrFinal->p2_comprension_lectora);
                $hoja->setCellValue('AW'.$fila, $diagLectEscrFinal->p2_descripcion_dibujo);
                $hoja->setCellValue('AX'.$fila, $diagLectEscrFinal->p3_comprension_lectora);
                $hoja->setCellValue('AY'.$fila, $diagLectEscrFinal->p3_inteligibilidad);
                $hoja->setCellValue('AZ'.$fila, $diagLectEscrFinal->p3_coherencia);
                $hoja->setCellValue('BA'.$fila, $diagLectEscrFinal->p3_sintaxis);
                $hoja->setCellValue('BB'.$fila, $diagLectEscrFinal->p3_estandares_egb_sub2y3);
                $hoja->setCellValue('BC'.$fila, $diagLectEscrFinal->p4_comprension_lectora);
                $hoja->setCellValue('BD'.$fila, $diagLectEscrFinal->p4_inteligibilidad);
                $hoja->setCellValue('BE'.$fila, $diagLectEscrFinal->p4_coherencia);
                $hoja->setCellValue('BF'.$fila, $diagLectEscrFinal->p4_sintaxis);
                $hoja->setCellValue('BG'.$fila, $diagLectEscrFinal->p4_estandares_egb_sub2y3);
            }
            
            if ($mateElemental) {
                $hoja->setCellValue('BH'.$fila, $mateElemental->relacion_figuras_geo_1);
                $hoja->setCellValue('BI'.$fila, $mateElemental->relacion_figuras_geo_1_1);
                $hoja->setCellValue('BJ'.$fila, $mateElemental->seriacion_2);
                $hoja->setCellValue('BK'.$fila, $mateElemental->conjuntos_2_1);
                $hoja->setCellValue('BL'.$fila, $mateElemental->seriacion_2_2);
                $hoja->setCellValue('BM'.$fila, $mateElemental->orientacion_3);
                $hoja->setCellValue('BN'.$fila, $mateElemental->orientacion_3_1);
                $hoja->setCellValue('BO'.$fila, $mateElemental->orientacion_3_2);
                $hoja->setCellValue('BP'.$fila, $mateElemental->esquema_corporal_3_3);
                $hoja->setCellValue('BQ'.$fila, $mateElemental->esquema_corporal_4);
                $hoja->setCellValue('BR'.$fila, $mateElemental->esquema_corporal_4_1);
                $hoja->setCellValue('BS'.$fila, $mateElemental->seriacion_5);
                $hoja->setCellValue('BT'.$fila, $mateElemental->suma_6);
                $hoja->setCellValue('BU'.$fila, $mateElemental->suma_7);
                $hoja->setCellValue('BV'.$fila, $mateElemental->resta_8);
                $hoja->setCellValue('BW'.$fila, $mateElemental->resta_9);
                $hoja->setCellValue('BX'.$fila, $mateElemental->multiplica_10);
                $hoja->setCellValue('BY'.$fila, $mateElemental->multiplica_11);
                $hoja->setCellValue('BZ'.$fila, $mateElemental->divide_12);
                $hoja->setCellValue('CA'.$fila, $mateElemental->divide_13);
            }

            if ($mateElementalFinal) {
                $hoja->setCellValue('CB'.$fila, $mateElementalFinal->relacion_figuras_geo_1);
                $hoja->setCellValue('CC'.$fila, $mateElementalFinal->relacion_figuras_geo_1_1);
                $hoja->setCellValue('CD'.$fila, $mateElementalFinal->seriacion_2);
                $hoja->setCellValue('CE'.$fila, $mateElementalFinal->conjuntos_2_1);
                $hoja->setCellValue('CF'.$fila, $mateElementalFinal->seriacion_2_2);
                $hoja->setCellValue('CG'.$fila, $mateElementalFinal->orientacion_3);
                $hoja->setCellValue('CH'.$fila, $mateElementalFinal->orientacion_3_1);
                $hoja->setCellValue('CI'.$fila, $mateElementalFinal->orientacion_3_2);
                $hoja->setCellValue('CJ'.$fila, $mateElementalFinal->esquema_corporal_3_3);
                $hoja->setCellValue('CK'.$fila, $mateElementalFinal->esquema_corporal_4);
                $hoja->setCellValue('CL'.$fila, $mateElementalFinal->esquema_corporal_4_1);
                $hoja->setCellValue('CM'.$fila, $mateElementalFinal->seriacion_5);
                $hoja->setCellValue('CN'.$fila, $mateElementalFinal->suma_6);
                $hoja->setCellValue('CO'.$fila, $mateElementalFinal->suma_7);
                $hoja->setCellValue('CP'.$fila, $mateElementalFinal->resta_8);
                $hoja->setCellValue('CQ'.$fila, $mateElementalFinal->resta_9);
                $hoja->setCellValue('CR'.$fila, $mateElementalFinal->multiplica_10);
                $hoja->setCellValue('CS'.$fila, $mateElementalFinal->multiplica_11);
                $hoja->setCellValue('CT'.$fila, $mateElementalFinal->divide_12);
                $hoja->setCellValue('CU'.$fila, $mateElementalFinal->divide_13);
            }

            if ($mateAvanzada) {
                $hoja->setCellValue('CV'.$fila, $mateAvanzada->orientacion_espacial_1);
                $hoja->setCellValue('CW'.$fila, $mateAvanzada->orientacion_espacial_2);
                $hoja->setCellValue('CX'.$fila, $mateAvanzada->orientacion_espacial_3);
                $hoja->setCellValue('CY'.$fila, $mateAvanzada->orientacion_espacial_4);
                $hoja->setCellValue('CZ'.$fila, $mateAvanzada->clasificacion_5);
                $hoja->setCellValue('DA'.$fila, $mateAvanzada->clasificacion_6);
                $hoja->setCellValue('DB'.$fila, $mateAvanzada->seriacion_7);
                $hoja->setCellValue('DC'.$fila, $mateAvanzada->seriacion_8);
                $hoja->setCellValue('DD'.$fila, $mateAvanzada->seriacion_9);
                $hoja->setCellValue('DE'.$fila, $mateAvanzada->esquema_corporal_10);
                $hoja->setCellValue('DF'.$fila, $mateAvanzada->esquema_corporal_11);
                $hoja->setCellValue('DG'.$fila, $mateAvanzada->suma_dos_cifras);
                $hoja->setCellValue('DH'.$fila, $mateAvanzada->suma_cuatro_cifras);
                $hoja->setCellValue('DI'.$fila, $mateAvanzada->suma_cinco_mas);
                $hoja->setCellValue('DJ'.$fila, $mateAvanzada->resta_tres_cifras);
                $hoja->setCellValue('DK'.$fila, $mateAvanzada->resta_cuatro_cifras);
                $hoja->setCellValue('DL'.$fila, $mateAvanzada->multiplicacion_una_cifra);
                $hoja->setCellValue('DM'.$fila, $mateAvanzada->multiplicacion_dos_cifras);
                $hoja->setCellValue('DN'.$fila, $mateAvanzada->division_una_cifra);
                $hoja->setCellValue('DO'.$fila, $mateAvanzada->division_dos_cifras);
            }

            if ($mateAvanzadaFinal) {
                $hoja->setCellValue('DP'.$fila, $mateAvanzadaFinal->orientacion_espacial_1);
                $hoja->setCellValue('DQ'.$fila, $mateAvanzadaFinal->orientacion_espacial_2);
                $hoja->setCellValue('DR'.$fila, $mateAvanzadaFinal->orientacion_espacial_3);
                $hoja->setCellValue('DS'.$fila, $mateAvanzadaFinal->orientacion_espacial_4);
                $hoja->setCellValue('DT'.$fila, $mateAvanzadaFinal->clasificacion_5);
                $hoja->setCellValue('DU'.$fila, $mateAvanzadaFinal->clasificacion_6);
                $hoja->setCellValue('DV'.$fila, $mateAvanzadaFinal->seriacion_7);
                $hoja->setCellValue('DW'.$fila, $mateAvanzadaFinal->seriacion_8);
                $hoja->setCellValue('DX'.$fila, $mateAvanzadaFinal->seriacion_9);
                $hoja->setCellValue('DY'.$fila, $mateAvanzadaFinal->esquema_corporal_10);
                $hoja->setCellValue('DZ'.$fila, $mateAvanzadaFinal->esquema_corporal_11);
                $hoja->setCellValue('EA'.$fila, $mateAvanzadaFinal->suma_dos_cifras);
                $hoja->setCellValue('EB'.$fila, $mateAvanzadaFinal->suma_cuatro_cifras);
                $hoja->setCellValue('EC'.$fila, $mateAvanzadaFinal->suma_cinco_mas);
                $hoja->setCellValue('ED'.$fila, $mateAvanzadaFinal->resta_tres_cifras);
                $hoja->setCellValue('EE'.$fila, $mateAvanzadaFinal->resta_cuatro_cifras);
                $hoja->setCellValue('EF'.$fila, $mateAvanzadaFinal->multiplicacion_una_cifra);
                $hoja->setCellValue('EG'.$fila, $mateAvanzadaFinal->multiplicacion_dos_cifras);
                $hoja->setCellValue('EH'.$fila, $mateAvanzadaFinal->division_una_cifra);
                $hoja->setCellValue('EI'.$fila, $mateAvanzadaFinal->division_dos_cifras);
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
