<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;

class Prod2 extends BaseController {

    /**
     * Muestra el menú para elegir el NAP  
     */
    public function index() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
            return redirect()->to('/');
        }
        
    }

    public function nap2_frm_edit($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {
            
            $data['centros'] = $this->nap2Model->_getCentrosEducativos();
            $data['id'] = $id;
            $data['datos'] = $this->nap2Model->find($id);
            $data['anios_lectivos'] = $this->anioLectivoModel->findAll();
            $data['nacionalidad'] = $this->nacionalidad;
            $data['etnia'] = $this->etnia;

            //echo '<pre>'.var_export($data['centros'], true).'</pre>';exit;

            $data['title']='MYRP - NAP2 | Estudiantes DYA ';
            $data['main_content']='componente2/nap2/nap2_edit_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap3_frm_edit($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {
            
            $data['centros'] = $this->centroEducativoModel->_getCentrosList();
            $data['id'] = $id;
            $data['datos'] = $this->nap3Model->find($id);
            $data['anios_lectivos'] = $this->anioLectivoModel->findAll();
            $data['nacionalidad'] = $this->nacionalidad;
            $data['etnia'] = $this->etnia;

            //echo '<pre>'.var_export($data['etnia'], true).'</pre>';exit;

            $data['title']='MYRP - NAP3 | Docentes DYA ';
            $data['main_content']='componente2/nap3/nap3_edit_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap2_create() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {
            
            $data['centros'] = $this->centroEducativoModel->_getCentrosList();
            $data['anios_lectivos'] = $this->anioLectivoModel->findAll();
            $data['cohortes'] = $this->cohorteModel->findAll();
            $data['nacionalidad'] = $this->nacionalidad;
            $data['etnia'] = $this->etnia;
            //echo '<pre>'.var_export($data['centros'], true).'</pre>';exit;

            $data['title']='MYRP - NAP3 | Docentes DYA ';
            $data['main_content']='componente2/nap2/nap2_create_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap3_create() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {
            
            $data['centros'] = $this->centroEducativoModel->_getCentrosList();
            $data['anios_lectivos'] = $this->anioLectivoModel->findAll();
            $data['cohortes'] = $this->cohorteModel->findAll();
            $data['nacionalidad'] = $this->nacionalidad;
            $data['etnia'] = $this->etnia;
            //echo '<pre>'.var_export($data['centros'], true).'</pre>';exit;

            $data['title']='MYRP - NAP3 | Docentes DYA ';
            $data['main_content']='componente2/nap3/nap3_create_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap4_create() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {
            
            $data['centros'] = $this->centroEducativoModel->_getCentrosList();
            $data['anios_lectivos'] = $this->anioLectivoModel->findAll();
            $data['cohortes'] = $this->cohorteModel->findAll();
            $data['nacionalidad'] = $this->nacionalidad;
            $data['etnia'] = $this->etnia;
            //echo '<pre>'.var_export($data['centros'], true).'</pre>';exit;

            $data['title']='MYRP - NAP 4 Estudiantes MINEDUC Presencial';
            $data['main_content']='componente2/nap4/nap4_create_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap4_insert() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $process = array(
                'nombres' => strtoupper($this->request->getPostGet('nombres')),
                'apellidos' => strtoupper($this->request->getPostGet('apellidos')),
                'documento' => strtoupper($this->request->getPostGet('documento')),
                'nacionalidad' => $this->request->getPostGet('nacionalidad'),
                'etnia' => $this->request->getPostGet('etnia'),
                'fecha_nac' => $this->request->getPostGet('fecha_nac'),
                'edad' => strtoupper($this->request->getPostGet('edad')),
                'genero' => $this->request->getPostGet('genero'),
                'discapacidad' => $this->request->getPostGet('discapacidad'),
                'tipo_discapacidad' => $this->request->getPostGet('tipo_discapacidad'),
                'ingresado_sistema' => $this->request->getPostGet('ingresado_sistema'),
                'anio_lectivo' => $this->request->getPostGet('anio_lectivo'),
                'amie' => $this->request->getPostGet('amie'),

                //Tutor

                'representante' => strtoupper($this->request->getPostGet('representante')),
                'documento_rep' => $this->request->getPostGet('documento_rep'),
                'parentesto_rep' => strtoupper($this->request->getPostGet('parentesto_rep')),
                'nacionalidad_rep' => $this->request->getPostGet('nacionalidad_rep'),
                'direccion_rep' => strtoupper($this->request->getPostGet('direccion_rep')),
                'contacto_telf' => strtoupper($this->request->getPostGet('contacto_telf')),
                'email' => $this->request->getPostGet('email'),

                //Representante
                'representante' => strtoupper($this->request->getPostGet('representante')),
                'documento_rep' => $this->request->getPostGet('documento_rep'),
                'parentesto_rep' => strtoupper($this->request->getPostGet('parentesto_rep')),
                'nacionalidad_rep' => $this->request->getPostGet('nacionalidad_rep'),
                'direccion_rep' => strtoupper($this->request->getPostGet('direccion_rep')),
                'contacto_telf' => strtoupper($this->request->getPostGet('contacto_telf')),
                'email' => $this->request->getPostGet('email'),

                'observaciones' => strtoupper($this->request->getPostGet('observaciones')),
                
            );
            echo '<pre>'.var_export($process, true).'</pre>';exit;
            //VALIDACIONES
            $this->validation->setRuleGroup('nap2Create');

            if (!$this->validation->withRequest($this->request)->run()) {
                //Depuración
                //dd($validation->getErrors());
                return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
            }else{

                $this->nap2Model->_save($process);

                return redirect()->to('prod2-nap2-menu');
            }
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap3_insert() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $process = array(
                'anio_lectivo' => $this->request->getPostGet('anio_lectivo'),
                'num_est' => $this->request->getPostGet('num_est'),
                'documento' => strtoupper($this->request->getPostGet('documento')),
                'apellidos' => strtoupper($this->request->getPostGet('apellidos')),
                'nombres' => strtoupper($this->request->getPostGet('nombres')),
                'edad' => strtoupper($this->request->getPostGet('edad')),
                'email' => $this->request->getPostGet('email'),
                'celular' => strtoupper($this->request->getPostGet('celular')), 
                'autoidentificacion' => $this->request->getPostGet('etnia'), 
                'titulo_pro' => strtoupper($this->request->getPostGet('titulo_pro')),
                'genero' => $this->request->getPostGet('genero'),
                'discapacidad' => strtoupper($this->request->getPostGet('discapacidad')),
                'tipo' => strtoupper($this->request->getPostGet('tipo_discapacidad')),
                'amie' => $this->request->getPostGet('amie'),
            );
            
            //VALIDACIONES
            $this->validation->setRuleGroup('nap3Create');

            if (!$this->validation->withRequest($this->request)->run()) {
                //Depuración
                //dd($validation->getErrors());
                return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
            }else{
                //echo '<pre>'.var_export($process, true).'</pre>';exit;
                $this->nap3Model->_save($process);

                return redirect()->to('prod2-nap3-menu');
            }
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap3_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $process = array(
                'idnap3' => $this->request->getPostGet('id'),
                'anio_lectivo' => $this->request->getPostGet('anio_lectivo'),
                'num_est' => $this->request->getPostGet('num_est'),
                'documento' => strtoupper($this->request->getPostGet('documento')),
                'apellidos' => strtoupper($this->request->getPostGet('apellidos')),
                'nombres' => strtoupper($this->request->getPostGet('nombres')),
                'edad' => strtoupper($this->request->getPostGet('edad')),
                'email' => $this->request->getPostGet('email'),
                'celular' => strtoupper($this->request->getPostGet('celular')), 
                'autoidentificacion' => $this->request->getPostGet('etnia'), 
                'titulo_pro' => strtoupper($this->request->getPostGet('titulo_pro')),
                'genero' => $this->request->getPostGet('genero'),
                'discapacidad' => strtoupper($this->request->getPostGet('discapacidad')),
                'tipo' => strtoupper($this->request->getPostGet('tipo_discapacidad')),
                'amie' => $this->request->getPostGet('amie'),
            );
            
            //VALIDACIONES
            $this->validation->setRuleGroup('nap3Create');

            if (!$this->validation->withRequest($this->request)->run()) {
                //Depuración
                //dd($validation->getErrors());
                return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
            }else{
                //echo '<pre>'.var_export($process, true).'</pre>';exit;
                $hay = $this->nap3Model->find($process['idnap3']);
                if ($hay) {
                    //Actualizo
                    $this->nap3Model->_update($process);
                }else{
                    //Grabo
                    $this->nap3Model->_save($process);
                }

                return redirect()->to('prod2-nap3-menu');
            }
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap2_insert() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $process = array(
                'nombres' => strtoupper($this->request->getPostGet('nombres')),
                'apellidos' => strtoupper($this->request->getPostGet('apellidos')),
                'documento' => strtoupper($this->request->getPostGet('documento')),
                'nacionalidad' => $this->request->getPostGet('nacionalidad'),
                'etnia' => $this->request->getPostGet('etnia'),
                'fecha_nac' => $this->request->getPostGet('fecha_nac'),
                'edad' => strtoupper($this->request->getPostGet('edad')),
                'genero' => $this->request->getPostGet('genero'),
                'discapacidad' => $this->request->getPostGet('discapacidad'),
                'tipo_discapacidad' => $this->request->getPostGet('tipo_discapacidad'),
                'ingresado_sistema' => $this->request->getPostGet('ingresado_sistema'),
                'anio_lectivo' => $this->request->getPostGet('anio_lectivo'),
                'amie' => $this->request->getPostGet('amie'),

                //Representante
                'representante' => strtoupper($this->request->getPostGet('representante')),
                'documento_rep' => $this->request->getPostGet('documento_rep'),
                'parentesto_rep' => strtoupper($this->request->getPostGet('parentesto_rep')),
                'nacionalidad_rep' => $this->request->getPostGet('nacionalidad_rep'),
                'direccion_rep' => strtoupper($this->request->getPostGet('direccion_rep')),
                'contacto_telf' => strtoupper($this->request->getPostGet('contacto_telf')),
                'email' => $this->request->getPostGet('email'),
                
            );
            
            //VALIDACIONES
            $this->validation->setRuleGroup('nap2Create');

            if (!$this->validation->withRequest($this->request)->run()) {
                //Depuración
                //dd($validation->getErrors());
                return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
            }else{

                $this->nap2Model->_save($process);

                return redirect()->to('prod2-nap2-menu');
            }
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap2_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $process = array(
                'id' => $this->request->getPostGet('id'),
                'nombres' => strtoupper($this->request->getPostGet('nombres')),
                'apellidos' => strtoupper($this->request->getPostGet('apellidos')),
                'documento' => strtoupper($this->request->getPostGet('documento')),
                'nacionalidad' => $this->request->getPostGet('nacionalidad'),
                'etnia' => $this->request->getPostGet('etnia'),
                'fecha_nac' => $this->request->getPostGet('fecha_nac'),
                'edad' => strtoupper($this->request->getPostGet('edad')),
                'genero' => $this->request->getPostGet('genero'),
                'discapacidad' => $this->request->getPostGet('discapacidad'),
                'tipo_discapacidad' => $this->request->getPostGet('tipo_discapacidad'),
                'ingresado_sistema' => $this->request->getPostGet('ingresado_sistema'),
                'anio_lectivo' => $this->request->getPostGet('anio_lectivo'),
                'amie' => $this->request->getPostGet('amie'),

                //Representante
                'representante' => strtoupper($this->request->getPostGet('representante')),
                'documento_rep' => $this->request->getPostGet('documento_rep'),
                'parentesto_rep' => strtoupper($this->request->getPostGet('parentesto_rep')),
                'nacionalidad_rep' => $this->request->getPostGet('nacionalidad_rep'),
                'direccion_rep' => strtoupper($this->request->getPostGet('direccion_rep')),
                'contacto_telf' => strtoupper($this->request->getPostGet('contacto_telf')),
                'email' => $this->request->getPostGet('email'),
                
            );
            
            //VALIDACIONES
            $this->validation->setRuleGroup('nap2Create');

            if (!$this->validation->withRequest($this->request)->run()) {
                //Depuración
                //dd($validation->getErrors());
                return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
            }else{

                //echo '<pre>'.var_export($process, true).'</pre>';exit;
                $hay = $this->nap2Model->find($process['id']);
                if ($hay) {
                    //Actualizo
                    $this->nap2Model->_update($process);
                }else{
                    //Grabo
                    $this->nap2Model->_save($process);
                }

                return redirect()->to('prod2-nap2-menu');
            }
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap2_procesos_grid() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {

            if ($this->session->idrol == 6) {
                //PABLO hacer el filtro por Profesor del NAP
                $data['nap2'] = $this->nap2Model->_getMisRegistrosNap2($data['nombre']);
            }else{
                $data['nap2'] = $this->nap2Model->_getRegistrosNap2();
            }
            
            $data['title']='MYRP - DYA';
            $data['main_content']='componente2/nap2/nap2_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    // public function prod2_nap2_update() {
    //     $data['idrol'] = $this->session->idrol;
    //     $data['id'] = $this->session->idusuario;
    //     $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
    //     $data['nombre'] = $this->session->nombre;
    //     $data['componente_2'] = $this->session->componente_2;

    //     if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {

    //         $process = array(
    //             'id' => $this->request->getPostGet('id'),
    //             'nombres' => strtoupper($this->request->getPostGet('nombres')),
    //             'apellidos' => strtoupper($this->request->getPostGet('apellidos')),
    //             'documento' => strtoupper($this->request->getPostGet('documento')),
    //             'nacionalidad' => strtoupper($this->request->getPostGet('nacionalidad')),
    //             'etnia' => strtoupper($this->request->getPostGet('etnia')),
    //             'fecha_nac' => strtoupper($this->request->getPostGet('fecha_nac')),
    //             'edad' => strtoupper($this->request->getPostGet('edad')),
    //             'genero' => strtoupper($this->request->getPostGet('genero')),
    //             'discapacidad' => strtoupper($this->request->getPostGet('discapacidad')),
    //             'tipo_discapacidad' => strtoupper($this->request->getPostGet('tipo_discapacidad')),
    //             'representante' => strtoupper($this->request->getPostGet('representante')),
    //             'documento_rep' => strtoupper($this->request->getPostGet('documento_rep')),
    //             'parentesto_rep' => strtoupper($this->request->getPostGet('parentesto_rep')),
    //             'nacionalidad_rep' => strtoupper($this->request->getPostGet('nacionalidad_rep')),
    //             'direccion_rep' => strtoupper($this->request->getPostGet('direccion_rep')),
    //             'contacto_telf' => strtoupper($this->request->getPostGet('contacto_telf')),
    //             'email' => $this->request->getPostGet('email'),

    //         );

    //         $hay = $this->nap2Model->find($process['id']);
    //         if ($hay) {
    //             //Actualizo
    //             $this->nap2Model->_update($process);
    //         }else{
    //             //Grabo
    //             $this->nap2Model->_save($process);
    //         }

    //         return redirect()->to('prod2-nap2-menu');
    //     }else{

    //         $this->logout();
    //         return redirect()->to('/');
    //     }
    // }

    public function nap2_reg_procesos_form($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            
            $data['id'] = $id;
            $data['datos'] = $this->nap2ProcessResult->_getNap2Process($id);
            $data['est'] = $this->nap2Model->find($id);
            $data['centro_educativo'] = $this->centroEducativoModel->find($data['est']->amie);
            $data['cursos'] = $this->cursoModel->findAll();
            $data['region'] = json_encode($data['centro_educativo']->regimen);
    

            $data['title']='MYRP - DYA';
            $data['main_content']='componente2/nap2/edit_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap2_process_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
            return redirect()->to('/');
        }
    }

    public function nap3_procesos_grid() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {

            if ($this->session->idrol == 6) {
                //PABLO hacer el filtro por Profesor del NAP
                $data['nap3'] = $this->nap3Model->_getRegistrosNap3();
            }else{
                $data['nap3'] = $this->nap3Model->_getRegistrosNap3();
            }
            //echo '<pre>'.var_export($data['nap3'], true).'</pre>';exit;
            $data['title']='MYRP - DYA';
            $data['main_content']='componente2/nap3/nap3_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap3_reg_procesos_form($idest) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
            return redirect()->to('/');
        }
    }

    public function nap3_process_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
            return redirect()->to('/');
        }
    }

    public function prod2_nap4_frm_edit($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {
            
            if ($this->session->idrol == 2) {
                $data['centros'] = $this->nap2Model->_getMisAmie($this->session->nombre);
            }else{
                $data['centros'] = $this->nap2Model->_getCentrosEducativos();
            }
            
            $data['datos'] = $this->nap4Model->find($id);

            //echo '<pre>'.var_export($data['centros'], true).'</pre>';exit;

            $data['title']='MYRP - NAP4 | Estudiantes MINEDUC Presencial ';
            $data['main_content']='componente2/nap4/prod2_nap4_edit_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function prod2_nap4_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {

            $process = array(
                'id' => $this->request->getPostGet('id'),
                'nombres' => strtoupper($this->request->getPostGet('nombres')),
                'apellidos' => strtoupper($this->request->getPostGet('apellidos')),
                'documento' => strtoupper($this->request->getPostGet('documento')),
                'nacionalidad' => strtoupper($this->request->getPostGet('nacionalidad')),
                'etnia' => strtoupper($this->request->getPostGet('etnia')),
                'fecha_nac' => strtoupper($this->request->getPostGet('fecha_nac')),
                'edad' => strtoupper($this->request->getPostGet('edad')),
                'genero' => strtoupper($this->request->getPostGet('genero')),
                'discapacidad' => strtoupper($this->request->getPostGet('discapacidad')),
                'tipo_discapacidad' => strtoupper($this->request->getPostGet('tipo_discapacidad')),
                'representante' => strtoupper($this->request->getPostGet('representante')),
                'documento_rep' => strtoupper($this->request->getPostGet('documento_rep')),
                'parentesto_rep' => strtoupper($this->request->getPostGet('parentesto_rep')),
                'nacionalidad_rep' => strtoupper($this->request->getPostGet('nacionalidad_rep')),
                'direccion_rep' => strtoupper($this->request->getPostGet('direccion_rep')),
                'contacto_telf' => strtoupper($this->request->getPostGet('contacto_telf')),
                'email' => $this->request->getPostGet('email'),

            );

            $hay = $this->nap4Model->find($process['id']);
            if ($hay) {
                //Actualizo
                $this->nap4Model->_update($process);
            }else{
                //Grabo
                $this->nap4Model->_save($process);
            }

            return redirect()->to('prod2-nap4-menu');
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap4_procesos_grid() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {

            if ($this->session->idrol == 6) {
                //PABLO hacer el filtro por Profesor del NAP
                $data['nap4'] = $this->nap4Model->_getRegistrosNap4();
            }else{
                $data['nap4'] = $this->nap4Model->_getRegistrosNap4();
            }
            //echo '<pre>'.var_export($data['nap4'], true).'</pre>';exit;
            $data['title']='MYRP';
            $data['main_content']='componente2/nap4/nap4_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap4_reg_procesos_form($idest) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            
            $data['idest'] = $idest;
            $data['datos'] = $this->nap4ProcessResult->_getNap4Process($idest);
            $data['est'] = $this->nap4Model->find($idest);
            $data['cursos'] = $this->cursoModel->findAll();


            $data['title']='MYRP - NAP4 ';
            $data['main_content']='componente2/nap4/edit_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap4_process_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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
            return redirect()->to('/');
        }
    }

    public function nap5_procesos_grid() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {

            if ($this->session->idrol == 6) {
                //PABLO hacer el filtro por Profesor del NAP
                $data['nap5'] = $this->nap5Model->_getRegistrosNap5();
            }else{
                $data['nap5'] = $this->nap5Model->_getRegistrosNap5();
            }
            //echo '<pre>'.var_export($data['nap5'], true).'</pre>';exit;
            $data['title']='MYRP';
            $data['main_content']='componente2/nap5/nap5_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap5_reg_procesos_form($id, $regimen) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            
            $data['id'] = $id;
            $data['est'] = $this->nap5Model->find($id);
            $data['cursos'] = $this->cursoModel->findAll();

            $data['title']='MYRP - NAP5 ';

            if ($regimen == 'COSTA') {
                $data['datos'] = $this->nap5ProcessResult->_getNap5Process($id);
                $data['main_content']='componente2/nap5/edit_process_view';
            }else if($regimen == 'SIERRA'){
                $data['datos'] = $this->nap5ProcessResultSierra->_getNap5Process($id);
                $data['main_content']='componente2/nap5/edit_process_sierra_view';
            }
            return view('includes/template', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap5_process_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
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

                'tic_tecno_digital' => strtoupper($this->request->getPostGet('tic_tecno_digital')),
                'competencia_digital_docente' => strtoupper($this->request->getPostGet('competencia_digital_docente')),
                'competencias_informacionales' => strtoupper($this->request->getPostGet('competencias_informacionales')),
                'gestion_datos' => strtoupper($this->request->getPostGet('gestion_datos')),
                'educomunicacion' => strtoupper($this->request->getPostGet('educomunicacion')),
                'herramientas_compartir' => strtoupper($this->request->getPostGet('herramientas_compartir')),
                'plataformas_web' => strtoupper($this->request->getPostGet('plataformas_web')),
                'rea_licencias' => strtoupper($this->request->getPostGet('rea_licencias')),
                'contenido_interactivo' => strtoupper($this->request->getPostGet('contenido_interactivo')),
                'contenido_audiovisual' => strtoupper($this->request->getPostGet('contenido_audiovisual')),
                'resultado_curso_2' => strtoupper($this->request->getPostGet('resultado_curso_2')),
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
            return redirect()->to('/');
        }
    }

    public function prod2_nap6_frm_edit($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {
            
            if ($this->session->idrol == 2) {
                $data['centros'] = $this->nap2Model->_getMisAmie($this->session->nombre);
            }else{
                $data['centros'] = $this->nap2Model->_getCentrosEducativos();
            }
            
            $data['datos'] = $this->nap6Model->find($id);

            //echo '<pre>'.var_export($data['datos'], true).'</pre>';exit;

            $data['title']='MYRP - NAP6 Estudiantes MINEDUC Virtual';
            $data['main_content']='componente2/nap6/prod2_nap6_edit_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function prod2_nap6_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {

            $process = array(
                'id' => $this->request->getPostGet('id'),
                'nombres_est' => strtoupper($this->request->getPostGet('nombres_est')),
                'apellidos_est' => strtoupper($this->request->getPostGet('apellidos_est')),
                'documento' => strtoupper($this->request->getPostGet('documento')),
                'nacionalidad' => strtoupper($this->request->getPostGet('nacionalidad')),
                'etnia' => strtoupper($this->request->getPostGet('etnia')),
                'fecha_nac' => strtoupper($this->request->getPostGet('fecha_nac')),
                'edad' => strtoupper($this->request->getPostGet('edad')),
                'genero' => strtoupper($this->request->getPostGet('genero')),
                'discapacidad' => strtoupper($this->request->getPostGet('discapacidad')),
                'tipo_discapacidad' => strtoupper($this->request->getPostGet('tipo_discapacidad')),
                'representante' => strtoupper($this->request->getPostGet('representante')),
                'documento_rep' => strtoupper($this->request->getPostGet('documento_rep')),
                'parentesto_rep' => strtoupper($this->request->getPostGet('parentesto_rep')),
                'nacionalidad_rep' => strtoupper($this->request->getPostGet('nacionalidad_rep')),
                'direccion_rep' => strtoupper($this->request->getPostGet('direccion_rep')),
                'contacto_telf' => strtoupper($this->request->getPostGet('contacto_telf')),
                'email' => $this->request->getPostGet('email'),

            );

            $hay = $this->nap6Model->find($process['id']);
            if ($hay) {
                //Actualizo
                $this->nap6Model->_update($process);
            }else{
                //Grabo
                $this->nap6Model->_save($process);
            }

            return redirect()->to('prod2-nap6-menu');
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap6_procesos_grid() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {

            if ($this->session->idrol == 6) {
                //PABLO hacer el filtro por Profesor del NAP
                $data['nap6'] = $this->nap6Model->_getRegistrosNap6();
            }else{
                $data['nap6'] = $this->nap6Model->_getRegistrosNap6();
            }
            //echo '<pre>'.var_export($data['nap6'], true).'</pre>';exit;
            $data['title']='MYRP';
            $data['main_content']='componente2/nap6/nap6_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap6_reg_procesos_form($idest) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1) {
            
            $data['idest'] = $idest;
            $data['datos'] = $this->nap6ProcessResult->_getNap6Process($idest);
            $data['est'] = $this->nap6Model->find($idest);
            $data['cursos'] = $this->cursoModel->findAll();


            $data['title']='MYRP - NAP6 ';
            $data['main_content']='componente2/nap6/edit_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap6_process_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

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
            return redirect()->to('/');
        }
    }

    public function prod2_nap6_delete($id) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {
            $id = $id;
            $this->nap6Model->delete($id);

            return redirect()->to('prod2-nap6-menu');
        }else{

            $this->logout();
        }
    }

    public function nap7_procesos_grid() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_2'] = $this->session->componente_2;

        if ($data['is_logged'] == 1 && $data['componente_2'] == 1) {

            if ($this->session->idrol == 2) {
                //PABLO hacer el filtro por Profesor del NAP
                $data['nap7'] = $this->nap7Model->_getRegistrosNap7();
            }else{
                $data['nap7'] = $this->nap7Model->_getRegistrosNap7();
            }
            //echo '<pre>'.var_export($data['nap7'], true).'</pre>';exit;
            $data['title']='MYRP';
            $data['main_content']='componente2/nap7/nap7_process_view';
            return view('includes/template', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap7_reg_procesos_form($id, $regimen) {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            
            $data['id'] = $id;
            $data['docente'] = $this->nap7Model->find($id);
            $data['cursos'] = $this->cursoModel->findAll();

            //echo '<pre>'.var_export($regimen, true).'</pre>';exit;

            $data['title']='MYRP - NAP7 ';
            if ($regimen == 'COSTA') {
                $data['datos'] = $this->nap7ProcessResult->_getNap7Process($id);
                $data['main_content']='componente2/nap7/edit_process_view';
            }else if($regimen == 'SIERRA'){
                $data['datos'] = $this->nap7ProcessResultSierra->_getNap7Process($id);
                $data['main_content']='componente2/nap7/edit_process_sierra_view';
            }
            
            return view('includes/template', $data);
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap7_process_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $process = array(
                'idnap7' => $this->request->getPostGet('id'),
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

                'tic_tecno_digital' => strtoupper($this->request->getPostGet('tic_tecno_digital')),
                'competencia_digital_docente' => strtoupper($this->request->getPostGet('competencia_digital_docente')),
                'competencias_informacionales' => strtoupper($this->request->getPostGet('competencias_informacionales')),
                'gestion_datos' => strtoupper($this->request->getPostGet('gestion_datos')),
                'educomunicacion' => strtoupper($this->request->getPostGet('educomunicacion')),
                'herramientas_compartir' => strtoupper($this->request->getPostGet('herramientas_compartir')),
                'plataformas_web' => strtoupper($this->request->getPostGet('plataformas_web')),
                'rea_licencias' => strtoupper($this->request->getPostGet('rea_licencias')),
                'contenido_interactivo' => strtoupper($this->request->getPostGet('contenido_interactivo')),
                'contenido_audiovisual' => strtoupper($this->request->getPostGet('contenido_audiovisual')),
                'resultado_curso_2' => strtoupper($this->request->getPostGet('resultado_curso_2')),
            );

            $hay = $this->nap7ProcessResult->_getNap7Process($process['idnap7']);
            if ($hay) {
                //Actualizo
                $this->nap7ProcessResult->_update($process);
            }else{
                //Grabo
                $this->nap7ProcessResult->_save($process);
            }

            return redirect()->to('prod2-nap7-menu');
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }

    public function nap7_process_sierra_update() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $process = array(
                'idnap7' => $this->request->getPostGet('id'),
                'lineamiento_rubrica' => strtoupper($this->request->getPostGet('lineamiento_rubrica')),
                'estrategia_didactica' => strtoupper($this->request->getPostGet('estrategia_didactica')),
                'curriculo_competencias' => strtoupper($this->request->getPostGet('curriculo_competencias')),
                'innova_aula' => strtoupper($this->request->getPostGet('innova_aula')),
                'comple_inova_aula' => strtoupper($this->request->getPostGet('comple_inova_aula')),
                'tec_instrument_eval' => strtoupper($this->request->getPostGet('tec_instrument_eval')),
                'pract_instr_eval' => strtoupper($this->request->getPostGet('pract_instr_eval')),
                'valor_arte_educa' => strtoupper($this->request->getPostGet('valor_arte_educa')),
                'disciplina_positiva' => strtoupper($this->request->getPostGet('disciplina_positiva')),
                'retro_lineamiento_instr' => strtoupper($this->request->getPostGet('retro_lineamiento_instr')),
                'eval_prom_final' => strtoupper($this->request->getPostGet('eval_prom_final')),
                'infor_apren_cierre' => strtoupper($this->request->getPostGet('infor_apren_cierre')),
                'tecnico_virtual' => strtoupper($this->request->getPostGet('tecnico_virtual')),
        
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

                'tic_tecno_digital' => strtoupper($this->request->getPostGet('tic_tecno_digital')),
                'competencia_digital_docente' => strtoupper($this->request->getPostGet('competencia_digital_docente')),
                'competencias_informacionales' => strtoupper($this->request->getPostGet('competencias_informacionales')),
                'gestion_datos' => strtoupper($this->request->getPostGet('gestion_datos')),
                'educomunicacion' => strtoupper($this->request->getPostGet('educomunicacion')),
                'herramientas_compartir' => strtoupper($this->request->getPostGet('herramientas_compartir')),
                'plataformas_web' => strtoupper($this->request->getPostGet('plataformas_web')),
                'rea_licencias' => strtoupper($this->request->getPostGet('rea_licencias')),
                'contenido_interactivo' => strtoupper($this->request->getPostGet('contenido_interactivo')),
                'contenido_audiovisual' => strtoupper($this->request->getPostGet('contenido_audiovisual')),
                'resultado_curso_2' => strtoupper($this->request->getPostGet('resultado_curso_2')),
            );

            $hay = $this->nap7ProcessResultSierra->_getNap7Process($process['idnap7']);
            //echo '<pre>'.var_export($hay, true).'</pre>';exit;
            if ($hay) {
                //Actualizo
                $this->nap7ProcessResultSierra->_update($process);
            }else{
                //Grabo
                $this->nap7ProcessResultSierra->_save($process);
            }

            return redirect()->to('prod2-nap7-menu');
        }else{

            $this->logout();
            return redirect()->to('/');
        }
    }


    public function corrijeCedulas() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1 && $this->session->idrol ==1 ) {
            $num = 0;
            $registro = $this->nap2Model->findAll();
            foreach ($registro as $key => $value) {
                
                if (strlen($value->documento) == 9) {
                    $id = $value->id;
                    $obj = [
                        'documento' => '0'.$value->documento,
                    ];
                    
                    //$this->nap7Model->update($id, $obj);
                }
            }
            return redirect()->to('prod2-nap7-menu');
        }
    }

    public function nap2_descargar_registros(){

        $registros = $this->nap2Model->_getAllRegistrosExcel();
        //echo '<pre>'.var_export($registros, true).'</pre>';exit;
        $fila = 2;

        //Creo la hoja
        $phpExcel = new Spreadsheet();
        $phpExcel
            ->getProperties()
            ->setCreator("MYRP")
            ->setLastModifiedBy('Pablo Orejuela') // última vez modificado por
            ->setTitle('NAP 2 - Estudiantes DYA Registros')
            ->setSubject('Reportes MYRP')
            ->setDescription('Reporte con los registros del NAP 2 Estudiantes DYA')
            ->setKeywords('etiquetas o palabras clave separadas por espacios')
            ->setCategory('Registros');

        $nombreDelDocumento = "NAP 2 - Estudiantes DYA Registros.xlsx";

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
        $hoja->setCellValue('C1', "AÑO LECTIVO");
        $hoja->setCellValue('D1', "CIUDAD");
        $hoja->setCellValue('E1', "PROVINCIA");
        $hoja->setCellValue('F1', "NOMBRE");
        $hoja->setCellValue('G1', "DOCUMENTO");
        $hoja->setCellValue('H1', "NACIONALIDAD");
        $hoja->setCellValue('I1', "ETNIA");
        $hoja->setCellValue('J1', "F NACIMIENTO");
        $hoja->setCellValue('K1', "EDAD");
        $hoja->setCellValue('L1', "GÉNERO");
        $hoja->setCellValue('M1', "DISCAPACIDAD");
        $hoja->setCellValue('N1', "TIPO DISCAPACIDAD");
        $hoja->setCellValue('O1', "REPRESENTANTE");
        $hoja->setCellValue('P1', "DOC REPRESENTANTE");
        $hoja->setCellValue('Q1', "PARENTESCO");
        $hoja->setCellValue('R1', "NAC REPRESENTANTE");
        $hoja->setCellValue('S1', "DIR REPRESENTANTE");
        $hoja->setCellValue('T1', "CONTACTO");
        $hoja->setCellValue('U1', "EMAIL");

        foreach ($registros as $key => $value) {
            $phpExcel->getActiveSheet()->getStyle('A'.$fila.':Z'.$fila)->applyFromArray($styleFila);
            $hoja->setCellValue('A'.$fila, $value->amie);
            $hoja->setCellValue('B'.$fila, $value->ce);
            $hoja->setCellValue('C'.$fila, $value->anio_lectivo);
            $hoja->setCellValue('D'.$fila, $value->ciudad);
            $hoja->setCellValue('E'.$fila, $value->provincia);
            $hoja->setCellValue('F'.$fila, $value->nombres.' '.$value->apellidos);
            $hoja->setCellValue('G'.$fila, $value->documento);
            $hoja->setCellValue('H'.$fila, $value->nacionalidad);
            $hoja->setCellValue('I'.$fila, $value->etnia);
            $hoja->setCellValue('J'.$fila, $value->fecha_nac);
            $hoja->setCellValue('K'.$fila, $value->edad);
            $hoja->setCellValue('L'.$fila, $value->genero);
            $hoja->setCellValue('M'.$fila, $value->discapacidad);
            $hoja->setCellValue('N'.$fila, $value->tipo_discapacidad);
            $hoja->setCellValue('O'.$fila, $value->representante);
            $hoja->setCellValue('P'.$fila, $value->documento_rep);
            $hoja->setCellValue('Q'.$fila, $value->parentesto_rep);
            $hoja->setCellValue('R'.$fila, $value->nacionalidad_rep);
            $hoja->setCellValue('S'.$fila, $value->direccion_rep);
            $hoja->setCellValue('T'.$fila, $value->contacto_telf);
            $hoja->setCellValue('U'.$fila, $value->email);
            

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

    public function nap3_descargar_registros(){

        $registros = $this->nap3Model->_getAllRegistrosExcel();
        //echo '<pre>'.var_export($registros, true).'</pre>';exit;
        $fila = 2;

        //Creo la hoja
        $phpExcel = new Spreadsheet();
        $phpExcel
            ->getProperties()
            ->setCreator("MYRP")
            ->setLastModifiedBy('Pablo Orejuela') // última vez modificado por
            ->setTitle('NAP 3 - DOCENTES DYA Registros')
            ->setSubject('Reportes MYRP')
            ->setDescription('Reporte con los registros del NAP 3 DOCENTES DYA')
            ->setKeywords('etiquetas o palabras clave separadas por espacios')
            ->setCategory('Registros');

        $nombreDelDocumento = "NAP 3 - DOCENTES DYA Registros.xlsx";

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
        $hoja->setCellValue('C1', "AÑO LECTIVO");
        $hoja->setCellValue('D1', "CIUDAD");
        $hoja->setCellValue('E1', "PROVINCIA");
        $hoja->setCellValue('F1', "NUM ESTUDIANTES");
        $hoja->setCellValue('G1', "NOMBRE");
        $hoja->setCellValue('H1', "DOCUMENTO");
        $hoja->setCellValue('I1', "TITULO PROFESIONAL");
        $hoja->setCellValue('J1', "EDAD");
        $hoja->setCellValue('K1', "GÉNERO");
        $hoja->setCellValue('L1', "AUTOIDENTIFICACION");
        $hoja->setCellValue('M1', "DISCAPACIDAD");
        $hoja->setCellValue('N1', "TIPO DISCAPACIDAD");
        $hoja->setCellValue('O1', "CONTACTO");
        $hoja->setCellValue('P1', "EMAIL");

        foreach ($registros as $key => $value) {
            $phpExcel->getActiveSheet()->getStyle('A'.$fila.':Z'.$fila)->applyFromArray($styleFila);
            $hoja->setCellValue('A'.$fila, $value->amie);
            $hoja->setCellValue('B'.$fila, $value->ce);
            $hoja->setCellValue('C'.$fila, $value->anio_lectivo);
            $hoja->setCellValue('D'.$fila, $value->ciudad);
            $hoja->setCellValue('E'.$fila, $value->provincia);
            $hoja->setCellValue('F'.$fila, $value->num_est);
            $hoja->setCellValue('G'.$fila, $value->nombres.' '.$value->apellidos);
            $hoja->setCellValue('H'.$fila, $value->documento);
            $hoja->setCellValue('I'.$fila, $value->titulo_pro);
            $hoja->setCellValue('J'.$fila, $value->edad);
            $hoja->setCellValue('K'.$fila, $value->genero);
            $hoja->setCellValue('L'.$fila, $value->autoidentificacion);
            $hoja->setCellValue('M'.$fila, $value->discapacidad);
            $hoja->setCellValue('N'.$fila, $value->tipo);
            $hoja->setCellValue('O'.$fila, $value->celular);
            $hoja->setCellValue('P'.$fila, $value->email);
            

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

    public function nap4_descargar_registros(){

        $registros = $this->nap4Model->_getAllRegistrosExcel();
        //echo '<pre>'.var_export($registros, true).'</pre>';exit;
        $fila = 2;

        //Creo la hoja
        $phpExcel = new Spreadsheet();
        $phpExcel
            ->getProperties()
            ->setCreator("MYRP")
            ->setLastModifiedBy('Pablo Orejuela') // última vez modificado por
            ->setTitle('NAP 4 - Estudiantes MINEDUC Presencial Registros')
            ->setSubject('Reportes MYRP')
            ->setDescription('Reporte con los registros del NAP 4 Estudiantes MINEDUC Presencial')
            ->setKeywords('etiquetas o palabras clave separadas por espacios')
            ->setCategory('Registros');

        $nombreDelDocumento = "NAP 4 - Estudiantes MINEDUC Presencial Registros.xlsx";

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
        $hoja->setCellValue('C1', "AÑO LECTIVO");
        $hoja->setCellValue('D1', "CIUDAD");
        $hoja->setCellValue('E1', "PROVINCIA");
        $hoja->setCellValue('F1', "NOMBRE");
        $hoja->setCellValue('G1', "DOCUMENTO");
        $hoja->setCellValue('H1', "NACIONALIDAD");
        $hoja->setCellValue('I1', "ETNIA");
        $hoja->setCellValue('J1', "F NACIMIENTO");
        $hoja->setCellValue('K1', "EDAD");
        $hoja->setCellValue('L1', "GÉNERO");
        $hoja->setCellValue('M1', "DISCAPACIDAD");
        $hoja->setCellValue('N1', "TIPO DISCAPACIDAD");
        $hoja->setCellValue('O1', "REPRESENTANTE");
        $hoja->setCellValue('P1', "DOC REPRESENTANTE");
        $hoja->setCellValue('Q1', "PARENTESCO");
        $hoja->setCellValue('R1', "NAC REPRESENTANTE");
        $hoja->setCellValue('S1', "DIR REPRESENTANTE");
        $hoja->setCellValue('T1', "CONTACTO");
        $hoja->setCellValue('U1', "EMAIL");
        $hoja->setCellValue('V1', "DOCENTE TUTOR");
        $hoja->setCellValue('W1', "DOCUMENTO TUTOR");
        $hoja->setCellValue('X1', "EMAIL TUTOR");
        $hoja->setCellValue('Y1', "TELF TUTOR");
        $hoja->setCellValue('Z1', "ETNIA TUTOR");

        foreach ($registros as $key => $value) {
            $phpExcel->getActiveSheet()->getStyle('A'.$fila.':Z'.$fila)->applyFromArray($styleFila);
            $hoja->setCellValue('A'.$fila, $value->amie);
            $hoja->setCellValue('B'.$fila, $value->ce);
            $hoja->setCellValue('C'.$fila, $value->anio_lectivo);
            $hoja->setCellValue('D'.$fila, $value->ciudad);
            $hoja->setCellValue('E'.$fila, $value->provincia);
            $hoja->setCellValue('F'.$fila, $value->nombres.' '.$value->apellidos);
            $hoja->setCellValue('G'.$fila, $value->documento);
            $hoja->setCellValue('H'.$fila, $value->nacionalidad);
            $hoja->setCellValue('I'.$fila, $value->etnia);
            $hoja->setCellValue('J'.$fila, $value->fecha_nac);
            $hoja->setCellValue('K'.$fila, $value->edad);
            $hoja->setCellValue('L'.$fila, $value->genero);
            $hoja->setCellValue('M'.$fila, $value->discapacidad);
            $hoja->setCellValue('N'.$fila, $value->tipo_discapacidad);
            $hoja->setCellValue('O'.$fila, $value->representante);
            $hoja->setCellValue('P'.$fila, $value->documento_rep);
            $hoja->setCellValue('Q'.$fila, $value->parentesto_rep);
            $hoja->setCellValue('R'.$fila, $value->nacionalidad_rep);
            $hoja->setCellValue('S'.$fila, $value->direccion_rep);
            $hoja->setCellValue('T'.$fila, $value->contacto_telf);
            $hoja->setCellValue('U'.$fila, $value->email);
            $hoja->setCellValue('V'.$fila, $value->docente_tutor);
            $hoja->setCellValue('W'.$fila, $value->doc_tutor);
            $hoja->setCellValue('X'.$fila, $value->email_tutor);
            $hoja->setCellValue('Y'.$fila, $value->telf_tutor);
            $hoja->setCellValue('Z'.$fila, $value->etnia_tutor);
            

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

    public function nap5_descargar_registros(){

        $registros = $this->nap5Model->_getAllRegistrosExcel();
        //echo '<pre>'.var_export($registros, true).'</pre>';exit;
        $fila = 2;

        //Creo la hoja
        $phpExcel = new Spreadsheet();
        $phpExcel
            ->getProperties()
            ->setCreator("MYRP")
            ->setLastModifiedBy('Pablo Orejuela') // última vez modificado por
            ->setTitle('NAP 5 - Docentes MINEDUC Presencial Registros')
            ->setSubject('Reportes MYRP')
            ->setDescription('Reporte con los registros del NAP 5 Docentes MINEDUC Presencial')
            ->setKeywords('etiquetas o palabras clave separadas por espacios')
            ->setCategory('Registros');

        $nombreDelDocumento = "NAP 5 - Docentes MINEDUC Presencial Registros.xlsx";

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
        $hoja->setCellValue('C1', "AÑO LECTIVO");
        $hoja->setCellValue('D1', "CIUDAD");
        $hoja->setCellValue('E1', "PROVINCIA");
        $hoja->setCellValue('F1', "NUM ESTUDIANTES");
        $hoja->setCellValue('G1', "NOMBRE");
        $hoja->setCellValue('H1', "DOCUMENTO");
        $hoja->setCellValue('I1', "TITULO PROFESIONAL");
        $hoja->setCellValue('J1', "EDAD");
        $hoja->setCellValue('K1', "GÉNERO");
        $hoja->setCellValue('L1', "AUTOIDENTIFICACION");
        $hoja->setCellValue('M1', "DISCAPACIDAD");
        $hoja->setCellValue('N1', "TIPO DISCAPACIDAD");
        $hoja->setCellValue('O1', "CONTACTO");
        $hoja->setCellValue('P1', "EMAIL");

        foreach ($registros as $key => $value) {
            $phpExcel->getActiveSheet()->getStyle('A'.$fila.':Z'.$fila)->applyFromArray($styleFila);
            $hoja->setCellValue('A'.$fila, $value->amie);
            $hoja->setCellValue('B'.$fila, $value->ce);
            $hoja->setCellValue('C'.$fila, $value->anio_lectivo);
            $hoja->setCellValue('D'.$fila, $value->ciudad);
            $hoja->setCellValue('E'.$fila, $value->provincia);
            $hoja->setCellValue('F'.$fila, $value->num_est);
            $hoja->setCellValue('G'.$fila, $value->nombres.' '.$value->apellidos);
            $hoja->setCellValue('H'.$fila, $value->documento);
            $hoja->setCellValue('I'.$fila, $value->titulo_pro);
            $hoja->setCellValue('J'.$fila, $value->edad);
            $hoja->setCellValue('K'.$fila, $value->genero);
            $hoja->setCellValue('L'.$fila, $value->autoidentificacion);
            $hoja->setCellValue('M'.$fila, $value->discapacidad);
            $hoja->setCellValue('N'.$fila, $value->tipo);
            $hoja->setCellValue('O'.$fila, $value->celular);
            $hoja->setCellValue('P'.$fila, $value->email);
            

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

    public function nap6_descargar_registros(){

        $registros = $this->nap6Model->_getAllRegistrosExcel();
        //echo '<pre>'.var_export($registros, true).'</pre>';exit;
        $fila = 2;

        //Creo la hoja
        $phpExcel = new Spreadsheet();
        $phpExcel
            ->getProperties()
            ->setCreator("MYRP")
            ->setLastModifiedBy('Pablo Orejuela') // última vez modificado por
            ->setTitle('NAP 6 - Estudiantes MINEDUC Virtual Registros')
            ->setSubject('Reportes MYRP')
            ->setDescription('Reporte con los registros del NAP 6 Estudiantes MINEDUC Virtual')
            ->setKeywords('etiquetas o palabras clave separadas por espacios')
            ->setCategory('Registros');

        $nombreDelDocumento = "NAP 6 - Estudiantes MINEDUC Virtual Registros.xlsx";

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
        $hoja->setCellValue('C1', "AÑO LECTIVO");
        $hoja->setCellValue('D1', "CIUDAD");
        $hoja->setCellValue('E1', "PROVINCIA");
        $hoja->setCellValue('F1', "NIVEL");
        $hoja->setCellValue('G1', "SUBNIVEL");
        $hoja->setCellValue('H1', "NOMBRE");
        $hoja->setCellValue('I1', "DOCUMENTO");
        $hoja->setCellValue('J1', "NACIONALIDAD");
        $hoja->setCellValue('K1', "ETNIA");
        $hoja->setCellValue('L1', "F NACIMIENTO");
        $hoja->setCellValue('M1', "EDAD");
        $hoja->setCellValue('N1', "GÉNERO");
        $hoja->setCellValue('O1', "DISCAPACIDAD");
        $hoja->setCellValue('P1', "TIPO DISCAPACIDAD");
        $hoja->setCellValue('Q1', "REPRESENTANTE");
        $hoja->setCellValue('R1', "DOC REPRESENTANTE");
        $hoja->setCellValue('S1', "PARENTESCO");
        $hoja->setCellValue('T1', "NAC REPRESENTANTE");
        $hoja->setCellValue('U1', "DIR REPRESENTANTE");
        $hoja->setCellValue('V1', "CONTACTO");
        $hoja->setCellValue('W1', "EMAIL");
        $hoja->setCellValue('X1', "OBSERVACIONES");

        foreach ($registros as $key => $value) {
            $phpExcel->getActiveSheet()->getStyle('A'.$fila.':Z'.$fila)->applyFromArray($styleFila);
            $hoja->setCellValue('A'.$fila, $value->amie);
            $hoja->setCellValue('B'.$fila, $value->ce);
            $hoja->setCellValue('C'.$fila, $value->anio_lectivo);
            $hoja->setCellValue('D'.$fila, $value->ciudad);
            $hoja->setCellValue('E'.$fila, $value->provincia);
            $hoja->setCellValue('F'.$fila, $value->nivel);
            $hoja->setCellValue('G'.$fila, $value->subnivel);
            $hoja->setCellValue('H'.$fila, $value->nombres.' '.$value->apellidos);
            $hoja->setCellValue('I'.$fila, $value->documento);
            $hoja->setCellValue('J'.$fila, $value->nacionalidad);
            $hoja->setCellValue('K'.$fila, $value->etnia);
            $hoja->setCellValue('L'.$fila, $value->fecha_nac);
            $hoja->setCellValue('M'.$fila, $value->edad);
            $hoja->setCellValue('N'.$fila, $value->genero);
            $hoja->setCellValue('O'.$fila, $value->discapacidad);
            $hoja->setCellValue('P'.$fila, $value->tipo_discapacidad);
            $hoja->setCellValue('Q'.$fila, $value->representante);
            $hoja->setCellValue('R'.$fila, $value->documento_rep);
            $hoja->setCellValue('S'.$fila, $value->parentesto_rep);
            $hoja->setCellValue('T'.$fila, $value->nacionalidad_rep);
            $hoja->setCellValue('U'.$fila, $value->direccion_rep);
            $hoja->setCellValue('V'.$fila, $value->contacto_telf);
            $hoja->setCellValue('W'.$fila, $value->email);
            $hoja->setCellValue('X'.$fila, $value->observaciones);
            

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

    public function nap7_descargar_registros(){

        $registros = $this->nap7Model->_getAllRegistrosExcel();
        //echo '<pre>'.var_export($registros, true).'</pre>';exit;
        $fila = 2;

        //Creo la hoja
        $phpExcel = new Spreadsheet();
        $phpExcel
            ->getProperties()
            ->setCreator("MYRP")
            ->setLastModifiedBy('Pablo Orejuela') // última vez modificado por
            ->setTitle('NAP 7 - Docentes MINEDUC Virtual Registros')
            ->setSubject('Reportes MYRP')
            ->setDescription('Reporte con los registros del NAP 7 Docentes MINEDUC Virtual')
            ->setKeywords('etiquetas o palabras clave separadas por espacios')
            ->setCategory('Registros');

        $nombreDelDocumento = "NAP 7 - Docentes MINEDUC Virtual Registros.xlsx";

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
        $hoja->setCellValue('C1', "AÑO LECTIVO");
        $hoja->setCellValue('D1', "CIUDAD");
        $hoja->setCellValue('E1', "PROVINCIA");
        $hoja->setCellValue('G1', "NOMBRE");
        $hoja->setCellValue('H1', "DOCUMENTO");
        $hoja->setCellValue('I1', "TITULO PROFESIONAL");
        $hoja->setCellValue('J1', "EDAD");
        $hoja->setCellValue('K1', "GÉNERO");
        $hoja->setCellValue('L1', "AUTOIDENTIFICACION");
        $hoja->setCellValue('O1', "CONTACTO");
        $hoja->setCellValue('P1', "EMAIL");

        foreach ($registros as $key => $value) {
            $phpExcel->getActiveSheet()->getStyle('A'.$fila.':Z'.$fila)->applyFromArray($styleFila);
            $hoja->setCellValue('A'.$fila, $value->amie);
            $hoja->setCellValue('B'.$fila, $value->ce);
            $hoja->setCellValue('C'.$fila, $value->anio_lectivo);
            $hoja->setCellValue('D'.$fila, $value->ciudad);
            $hoja->setCellValue('E'.$fila, $value->provincia);
            $hoja->setCellValue('G'.$fila, $value->nombres.' '.$value->apellidos);
            $hoja->setCellValue('H'.$fila, $value->documento);
            $hoja->setCellValue('I'.$fila, $value->titulo_pro);
            $hoja->setCellValue('J'.$fila, $value->edad);
            $hoja->setCellValue('K'.$fila, $value->genero);
            $hoja->setCellValue('L'.$fila, $value->autoidentificacion);
            $hoja->setCellValue('O'.$fila, $value->celular);
            $hoja->setCellValue('P'.$fila, $value->email);
            

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
