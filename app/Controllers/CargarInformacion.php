<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\RuntimeException;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
use CodeIgniter\I18n\Time;



class CargarInformacion extends BaseController {

    public function index(){
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $data['componentes'] = array('1','2','3','4','5');

            $data['title']='MYRP - DYA';
            $data['main_content']='home/selecciona_componente';
            return view('includes/template', $data);
        }else{

            return redirect()->to('logout');
        }
        
    }

    public function carga_extra(){
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            
            //echo '<pre>'.var_export($mensaje, true).'</pre>';exit;
            $data['title']='MYRP - DYA';
            $data['main_content']='home/frm_cargar_info_extra';
            return view('includes/template', $data);
        }else{

            return redirect()->to('logout');
        }
        
    }

    public function frm_subir_excel($componente = null){
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $data['idproducto'] = $componente;
            //$data['componente'] = $this->productoModel->find($componente);
            //echo '<pre>'.var_export($data['componente'], true).'</pre>';
            $data['title']='MYRP - DYA';
            $data['main_content']='home/frm_subirExcel';
            return view('includes/template', $data);
        }else{
            return redirect()->to('logout');
        }
    }

    public function cargar_centro_educativo(){
        
        //Creo la ruta
        $ruta = './public/excel/';
        
        //Recibo el archivo excel
        $file = $this->request->getFile('hoja');

        //Verifico que sea válido
        if (!$file->isValid()) {
            //throw new RuntimeException($file->getErrorString());
            return redirect()->to('cargar_info_extra_view');
        }else{
            //obtengo el nombre del archivo
            $nameFile = $file->getName();

            //Muevo el archjivo del temporal a la carpeta
            $file->move($ruta);

            //Verifico que se haya movido
            if ($file->hasMoved()) {
                //Creo qel reader
                $reader = new XlsxReader();

                //leo el archivo
                $spreadsheet = $reader->load($ruta.$nameFile);

                //Determino la pestaña 
                $sheet = $spreadsheet->getSheet(0);

                //Accedo a cada fila extrayendo los datos
                foreach ($sheet->getRowIterator(2) as $row) {

                    $centro = array(
                        'amie' => trim($sheet->getCell('A'.$row->getRowIndex())),
                        'intervencion' => trim($sheet->getCell('B'.$row->getRowIndex())),
                        'observacion' => trim($sheet->getCell('C'.$row->getRowIndex())),
                        'clima_escolar' => trim($sheet->getCell('D'.$row->getRowIndex())), 
                        'idparroquia' => trim($sheet->getCell('H'.$row->getRowIndex())),
                        'nombre' => trim($sheet->getCell('I'.$row->getRowIndex())),
                        'escolarizacion' => trim($sheet->getCell('J'.$row->getRowIndex())),
                        'tipo_educacion' => trim($sheet->getCell('K'.$row->getRowIndex())),
                        'nivel_educacion' => trim($sheet->getCell('L'.$row->getRowIndex())),
                        'sostenimiento' => trim($sheet->getCell('M'.$row->getRowIndex())),
                        'num_docentes' => trim($sheet->getCell('N'.$row->getRowIndex())),
                        'num_docentes_evaluados' => trim($sheet->getCell('O'.$row->getRowIndex())),
                        'res_evaluacion_docentes' => trim($sheet->getCell('P'.$row->getRowIndex())),
                        'cant_est' => trim($sheet->getCell('Q'.$row->getRowIndex())),
                        'cant_est_discapacidad' => trim($sheet->getCell('R'.$row->getRowIndex())),
                        'proporcion_ninias_adoles' => trim($sheet->getCell('S'.$row->getRowIndex())),
                        'ecuatoriana' => trim($sheet->getCell('T'.$row->getRowIndex())),
                        'colombiana' => trim($sheet->getCell('U'.$row->getRowIndex())),
                        'peruana' => trim($sheet->getCell('V'.$row->getRowIndex())),
                        'venezolana' => trim($sheet->getCell('W'.$row->getRowIndex())),
                        'otros_paises' => trim($sheet->getCell('X'.$row->getRowIndex())),
                        'porcentaje_extranjeros' => trim($sheet->getCell('Y'.$row->getRowIndex())),
                        'alumnos_docente' => trim($sheet->getCell('Z'.$row->getRowIndex())),
                        'agua' => trim($sheet->getCell('AA'.$row->getRowIndex())),
                        'higiene' =>trim($sheet->getCell('AB'.$row->getRowIndex())),
                        'saneamiento' =>trim($sheet->getCell('AC'.$row->getRowIndex())),
                        'prioridad' =>trim($sheet->getCell('AD'.$row->getRowIndex())),
                        'idciudades' => trim($sheet->getCell('H'.$row->getRowIndex())),

                    );
                    
                    //Verifico si existe
                    $exist = $this->centroEducativoModel->find($centro['amie']);
                    if (!isset($exist) || $exist == NULL) {
                        //muestro los datos o los grabo en base de datos
                        $this->centroEducativoModel->save($centro);
                    } 
                }
                return redirect()->to('cargar_info_extra_view');
            }
        } 
    }

    public function cargar_nap2(){
        
        //Creo la ruta
        $ruta = './public/excel/';
        
        //Recibo el archivo excel
        $file = $this->request->getFile('hoja');

        //Verifico que sea válido
        if (!$file->isValid()) {
            return redirect()->to('cargar_info_extra_view');
        }else{
            //obtengo el nombre del archivo
            $nameFile = $file->getName();

            //Muevo el archjivo del temporal a la carpeta
            $file->move($ruta);

            //Verifico que se haya movido
            if ($file->hasMoved()) {
                //Creo qel reader
                $reader = new XlsxReader();
                //$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                $reader->setReadDataOnly(true);

                //leo el archivo
                $spreadsheet = $reader->load($ruta.$nameFile);

                //Determino la pestaña 
                $sheet = $spreadsheet->getSheet(0);

                //Accedo a cada fila extrayendo los datos
                
                foreach ($sheet->getRowIterator(4) as $row) {
                
                    $amie = trim($sheet->getCell('F'.$row->getRowIndex()));

                    $anio_actual = date('Y');
                    
                     if (trim($sheet->getCell('P'.$row->getRowIndex())) != '') {

                         $fecha_nac = date("Y-m-d", strtotime(trim($sheet->getCell('P'.$row->getRowIndex()))));
                         $anio_nac = date("Y", strtotime(trim($sheet->getCell('P'.$row->getRowIndex()))));
                         //$fecha_nac = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(trim($sheet->getCell('N'.$row->getRowIndex())))->format('Y-m-d');

                         $edad = $anio_actual - $anio_nac;
                     }else{
                         $fecha_nac = '0000-00-00';
                         $edad = 0;
                     }
                     
                    $prod = array(
                         'num'=> trim($sheet->getCell('A'.$row->getRowIndex())),
                         'amie' => trim($sheet->getCell('F'.$row->getRowIndex())),
                         'anio_lectivo' => trim($sheet->getCell('H'.$row->getRowIndex())),
                         'documento' => trim($sheet->getCell('J'.$row->getRowIndex())),
                         'nombres' => trim($sheet->getCell('K'.$row->getRowIndex())),
                         'apellidos' => trim($sheet->getCell('L'.$row->getRowIndex())),
                         'nacionalidad' => trim($sheet->getCell('M'.$row->getRowIndex())),
                         'etnia' => trim($sheet->getCell('N'.$row->getRowIndex())),
                         'genero' => trim($sheet->getCell('O'.$row->getRowIndex())),
                         'fecha_nac' => $fecha_nac,
                         'edad' => $edad,
                         'rezago_edu' => trim($sheet->getCell('R'.$row->getRowIndex())),
                         'ingresado_sistema' => trim($sheet->getCell('S'.$row->getRowIndex())),
                         'nivel' => trim($sheet->getCell('T'.$row->getRowIndex())),
                         'discapacidad' => trim($sheet->getCell('U'.$row->getRowIndex())),
                         'tipo_discapacidad' => trim($sheet->getCell('V'.$row->getRowIndex())),
                         'institucion' => trim($sheet->getCell('W'.$row->getRowIndex())),
                         
                         'representante' => trim($sheet->getCell('AZ'.$row->getRowIndex())),
                         'documento_rep' => trim($sheet->getCell('AY'.$row->getRowIndex())),
                         'parentesto_rep' => trim($sheet->getCell('BA'.$row->getRowIndex())),
                         'nacionalidad_rep' => trim($sheet->getCell('BB'.$row->getRowIndex())),
                         'direccion_rep' => trim($sheet->getCell('BC'.$row->getRowIndex())),
                         'contacto_telf' => trim($sheet->getCell('BD'.$row->getRowIndex())),
                         'email' => '',

                     );
                    //echo '<pre>'.var_export($prod['num'].' - '.$prod['amie'], true).'</pre>';
                    //Verifico si existe
                    if ($amie == 'END') {
                        break;
                    }
                    $exist = $this->nap2Model->find($prod['documento']);
                    if (!isset($exist) || $exist == NULL) {
                        
                        //muestro los datos o los grabo en base de datos
                        $this->nap2Model->save($prod);
                        //echo $this->db->getLastQuery();exit;
                        //echo 'NO existe';
                    }
                    
                    
                }
                return redirect()->to('cargar_info_extra_view');
            }
        } 
    }

    public function cargar_nap3(){
        
        //Creo la ruta
        $ruta = './public/excel/';
        
        //Recibo el archivo excel
        $file = $this->request->getFile('hoja');

        //Verifico que sea válido
        if (!$file->isValid()) {
            //throw new RuntimeException($file->getErrorString());
            return redirect()->to('cargar_info_extra_view');
        }else{
            //obtengo el nombre del archivo
            $nameFile = $file->getName();

            //Muevo el archjivo del temporal a la carpeta
            $file->move($ruta);

            //Verifico que se haya movido
            if ($file->hasMoved()) {
                //Creo qel reader
                $reader = new XlsxReader();

                //leo el archivo
                $spreadsheet = $reader->load($ruta.$nameFile);

                //Determino la pestaña 
                $sheet = $spreadsheet->getSheet(0);

                //Accedo a cada fila extrayendo los datos
                foreach ($sheet->getRowIterator(5) as $row) {
                    $amie = trim($sheet->getCell('F'.$row->getRowIndex()));
                    $docente = array(
                        'anio_lectivo' => trim($sheet->getCell('H'.$row->getRowIndex())),
                        'num_est' => trim($sheet->getCell('J'.$row->getRowIndex())),
                        'documento' => trim($sheet->getCell('K'.$row->getRowIndex())),
                        'apellidos' => trim($sheet->getCell('L'.$row->getRowIndex())),
                        'nombres' => trim($sheet->getCell('M'.$row->getRowIndex())),
                        'edad' => trim($sheet->getCell('N'.$row->getRowIndex())),
                        'genero' => trim($sheet->getCell('O'.$row->getRowIndex())),
                        'autoidentificacion' => trim($sheet->getCell('P'.$row->getRowIndex())),
                        'titulo_pro' => trim($sheet->getCell('Q'.$row->getRowIndex())),
                        'email' => trim($sheet->getCell('R'.$row->getRowIndex())),
                        'celular' => trim($sheet->getCell('S'.$row->getRowIndex())),
                        'amie' => trim($sheet->getCell('F'.$row->getRowIndex())),

                    );
                    
                    if ($amie == 'END') {
                        break;
                    }
                    //Verifico si existe
                    $exist = $this->nap3Model->find($docente['documento']);
                    if (!isset($exist) || $exist == NULL) {
                        //muestro los datos o los grabo en base de datos
                        $this->nap3Model->save($docente);
                    } 
                }
                return redirect()->to('cargar_info_extra_view');
            }
        } 
    }

    public function cargar_prod_1(){
        
        //Creo la ruta
        $ruta = './public/excel/';
        
        //Recibo el archivo excel
        $file = $this->request->getFile('hoja');

        //Verifico que sea válido
        if (!$file->isValid()) {
            return redirect()->to('cargar_info_extra_view');
        }else{
            //obtengo el nombre del archivo
            $nameFile = $file->getName();

            //Muevo el archjivo del temporal a la carpeta
            $file->move($ruta);

            //Verifico que se haya movido
            if ($file->hasMoved()) {
                //Creo qel reader
                $reader = new XlsxReader();
                //$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                $reader->setReadDataOnly(true);

                //leo el archivo
                $spreadsheet = $reader->load($ruta.$nameFile);

                //Determino la pestaña 
                $sheet = $spreadsheet->getSheet(0);

                //Accedo a cada fila extrayendo los datos
                
                foreach ($sheet->getRowIterator(3) as $row) {
                
                    $amie = trim($sheet->getCell('B'.$row->getRowIndex()));
                    
                    $centro = array(
                        'amie' => trim($sheet->getCell('B'.$row->getRowIndex())),
                        'idparroquia' => trim($sheet->getCell('D'.$row->getRowIndex())),
                        'nombre' => trim($sheet->getCell('E'.$row->getRowIndex())),
                    );
                    
                    //Verifico si existe el AMIE
                    // $exist = $this->centroEducativoModel->find($centro['amie']);
                    
                    // if (!isset($exist) || $exist == NULL) {
                    //     //muestro los datos o los grabo en base de datos
                    //     //echo 'No existe';
                    //     $this->centroEducativoModel->save($centro);
                    // }

                    $anio_actual = date('Y');
                    
                     if (trim($sheet->getCell('G'.$row->getRowIndex())) != '') {
                         $fecha_inicio = date("Y-m-d", strtotime(trim($sheet->getCell('G'.$row->getRowIndex()))));
                         //$fecha_inicio = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(trim($sheet->getCell('G'.$row->getRowIndex())))->format('Y-m-d');
                     }else{
                         $fecha_inicio = '0000-00-00';
                     }
                    
                     if (trim($sheet->getCell('H'.$row->getRowIndex())) != '') {

                         $fecha_fin = date("Y-m-d", strtotime(trim($sheet->getCell('H'.$row->getRowIndex()))));
                         //$fecha_fin = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(trim($sheet->getCell('H'.$row->getRowIndex())))->format('Y-m-d');
                     }else{
                         $fecha_fin = '0000-00-00';
                     }

                     if (trim($sheet->getCell('N'.$row->getRowIndex())) != '') {

                         $fecha_nac = date("Y-m-d", strtotime(trim($sheet->getCell('N'.$row->getRowIndex()))));
                         $anio_nac = date("Y", strtotime(trim($sheet->getCell('N'.$row->getRowIndex()))));
                         //$fecha_nac = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(trim($sheet->getCell('N'.$row->getRowIndex())))->format('Y-m-d');

                         $edad = $anio_actual - $anio_nac;
                     }else{
                         $fecha_nac = '0000-00-00';
                         $edad = 0;
                     }
                     
                     //echo '<pre>'.var_export($amie.' - '.$fecha_inicio.' - '.$fecha_fin.' - '.$fecha_nac.' - '.$edad, true).'</pre>';
                    
                
                    //echo '<pre>'.var_export($centro, true).'</pre>';exit;
                    $prod = array(
                         'num'=> trim($sheet->getCell('A'.$row->getRowIndex())),
                         'amie' => trim($sheet->getCell('B'.$row->getRowIndex())),
                         'cohorte' => 'SEGUNDA COHORTE',//trim($sheet->getCell('F'.$row->getRowIndex())),
                         'fecha_inicio' => $fecha_inicio,
                         'fecha_fin' => $fecha_fin,
                         'nombres' => trim($sheet->getCell('I'.$row->getRowIndex())),
                         'apellidos' => trim($sheet->getCell('J'.$row->getRowIndex())),
                         'documento' => trim($sheet->getCell('K'.$row->getRowIndex())),
                         'nacionalidad' => trim($sheet->getCell('L'.$row->getRowIndex())),
                         'etnia' => trim($sheet->getCell('M'.$row->getRowIndex())),
                         'fecha_nac' => $fecha_nac,
                         'edad' => $edad,
                         'genero' => trim($sheet->getCell('P'.$row->getRowIndex())),
                         'discapacidad' => trim($sheet->getCell('Q'.$row->getRowIndex())),
                         'tipo_discapacidad' => trim($sheet->getCell('R'.$row->getRowIndex())),
                         'anio_egb' => trim($sheet->getCell('S'.$row->getRowIndex())),
                         'tutor_apoyo' => trim($sheet->getCell('T'.$row->getRowIndex())),
                         'docente_tutor' => trim($sheet->getCell('U'.$row->getRowIndex())),
                         'representante' => trim($sheet->getCell('V'.$row->getRowIndex())),
                         'documento_rep' => trim($sheet->getCell('W'.$row->getRowIndex())),
                         'parentesto_rep' => trim($sheet->getCell('X'.$row->getRowIndex())),
                         'nacionalidad_rep' => trim($sheet->getCell('Y'.$row->getRowIndex())),
                         'direccion_rep' => trim($sheet->getCell('Z'.$row->getRowIndex())),
                         'contacto_telf' => trim($sheet->getCell('AA'.$row->getRowIndex())),
                         'email' => trim($sheet->getCell('AB'.$row->getRowIndex())),

                     );
                    //echo '<pre>'.var_export($prod['num'].' - '.$prod['amie'], true).'</pre>';
                    //Verifico si existe
                    $exist = $this->prod1Model->find($prod['documento']);
                    if (!isset($exist) || $exist == NULL) {
                        //muestro los datos o los grabo en base de datos
                        $this->prod1Model->save($prod);
                    } 
                    if ($amie == 'END') {
                        break;
                    }
                }
                return redirect()->to('cargar_info_extra_view');
            }
        } 
    }

    public function cargar_nap4(){
        
        //Creo la ruta
        $ruta = './public/excel/';
        
        //Recibo el archivo excel
        $file = $this->request->getFile('hoja');

        //Verifico que sea válido
        if (!$file->isValid()) {
            return redirect()->to('cargar_info_extra_view');
        }else{
            //obtengo el nombre del archivo
            $nameFile = $file->getName();

            //Muevo el archjivo del temporal a la carpeta
            $file->move($ruta);

            //Verifico que se haya movido
            if ($file->hasMoved()) {
                //Creo qel reader
                $reader = new XlsxReader();
                //$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                $reader->setReadDataOnly(true);

                //leo el archivo
                $spreadsheet = $reader->load($ruta.$nameFile);

                //Determino la pestaña 
                $sheet = $spreadsheet->getSheet(0);

                //Accedo a cada fila extrayendo los datos
                
                foreach ($sheet->getRowIterator(4) as $row) {
                
                    $amie = trim($sheet->getCell('F'.$row->getRowIndex()));
                    
                    $anio_actual = date('Y');
                    
                    //Fecha de nacimiento
                     if (trim($sheet->getCell('P'.$row->getRowIndex())) != '') {

                         $fecha_nac = date("Y-m-d", strtotime(trim($sheet->getCell('P'.$row->getRowIndex()))));
                         $anio_nac = date("Y", strtotime(trim($sheet->getCell('P'.$row->getRowIndex()))));
                         //$fecha_nac = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(trim($sheet->getCell('N'.$row->getRowIndex())))->format('Y-m-d');

                         $edad = $anio_actual - $anio_nac;
                     }else{
                         $fecha_nac = '0000-00-00';
                         $edad = 0;
                     }


                    $prod = array(
                         'num'=> trim($sheet->getCell('A'.$row->getRowIndex())),
                         'amie' => trim($sheet->getCell('F'.$row->getRowIndex())),
                         'anio_lectivo' => trim($sheet->getCell('H'.$row->getRowIndex())),
                         'documento' => trim($sheet->getCell('J'.$row->getRowIndex())),
                         'apellidos' => trim($sheet->getCell('K'.$row->getRowIndex())),
                         'nombres' => trim($sheet->getCell('L'.$row->getRowIndex())),
                         'nacionalidad' => trim($sheet->getCell('M'.$row->getRowIndex())),
                         'etnia' => trim($sheet->getCell('N'.$row->getRowIndex())),
                         'genero' => trim($sheet->getCell('O'.$row->getRowIndex())),
                         'fecha_nac' => $fecha_nac,
                         'edad' => $edad,
                         'nivel' => trim($sheet->getCell('R'.$row->getRowIndex())),
                         'discapacidad' => trim($sheet->getCell('S'.$row->getRowIndex())),
                         'tipo_discapacidad' => trim($sheet->getCell('T'.$row->getRowIndex())),
                         'institucion' => trim($sheet->getCell('U'.$row->getRowIndex())),
                         
                         'documento_rep' => trim($sheet->getCell('AC'.$row->getRowIndex())),
                         'representante' => trim($sheet->getCell('AD'.$row->getRowIndex())),
                         'parentesto_rep' => trim($sheet->getCell('AE'.$row->getRowIndex())),
                         'nacionalidad_rep' => trim($sheet->getCell('AF'.$row->getRowIndex())),
                         'direccion_rep' => trim($sheet->getCell('AG'.$row->getRowIndex())),
                         'contacto_telf' => trim($sheet->getCell('AH'.$row->getRowIndex())),
                         'observaciones' => trim($sheet->getCell('AI'.$row->getRowIndex())),
                         'email' => '',

                     );
                    //echo '<pre>'.var_export($prod['num'].' - '.$prod['amie'], true).'</pre>';
                    //Verifico si existe
                    if ($amie == 'END') {
                        break;
                    }
                    $this->nap4Model->save($prod);
                    //$exist = $this->nap4Model->find($prod['documento']);
                    //if (!isset($exist) || $exist == NULL) {
                        
                        //muestro los datos o los grabo en base de datos
                        
                        //echo $this->db->getLastQuery();exit;
                        //echo 'NO existe';
                    //} 
                }
                return redirect()->to('cargar_info_extra_view');
            }
        } 
    }

    public function cargar_nap5(){
        
        //Creo la ruta
        $ruta = './public/excel/';
        
        //Recibo el archivo excel
        $file = $this->request->getFile('hoja');

        //Verifico que sea válido
        if (!$file->isValid()) {
            //throw new RuntimeException($file->getErrorString());
            return redirect()->to('cargar_info_extra_view');
        }else{
            //obtengo el nombre del archivo
            $nameFile = $file->getName();

            //Muevo el archjivo del temporal a la carpeta
            $file->move($ruta);

            //Verifico que se haya movido
            if ($file->hasMoved()) {
                //Creo qel reader
                $reader = new XlsxReader();

                //leo el archivo
                $spreadsheet = $reader->load($ruta.$nameFile);

                //Determino la pestaña 
                $sheet = $spreadsheet->getSheet(0);

                //Accedo a cada fila extrayendo los datos
                foreach ($sheet->getRowIterator(5) as $row) {

                    $amie = trim($sheet->getCell('F'.$row->getRowIndex()));

                    $nap = array(
                        'amie' => trim($sheet->getCell('F'.$row->getRowIndex())),
                        'anio_lectivo' => trim($sheet->getCell('H'.$row->getRowIndex())),
                        'subnivel' => trim($sheet->getCell('I'.$row->getRowIndex())),
                        'num_est' => trim($sheet->getCell('J'.$row->getRowIndex())),
                        'documento' => trim($sheet->getCell('K'.$row->getRowIndex())),
                        'apellidos' => trim($sheet->getCell('L'.$row->getRowIndex())),
                        'nombres' => trim($sheet->getCell('M'.$row->getRowIndex())),
                        'edad' => trim($sheet->getCell('N'.$row->getRowIndex())),
                        'genero' => trim($sheet->getCell('O'.$row->getRowIndex())),
                        'autoidentificacion' => trim($sheet->getCell('P'.$row->getRowIndex())),
                        'titulo_pro' => trim($sheet->getCell('Q'.$row->getRowIndex())),
                        'celular' => trim($sheet->getCell('R'.$row->getRowIndex())),
                        'email' => trim($sheet->getCell('S'.$row->getRowIndex())),
                        'titulo_pro' => trim($sheet->getCell('Q'.$row->getRowIndex())),
                        'discapacidad'=> trim($sheet->getCell('N'.$row->getRowIndex())),
                        'tipo' => trim($sheet->getCell('O'.$row->getRowIndex())),
                    );

                    if ($amie == 'END') {
                        break;
                    }
                    //Verifico si existe
                    $exist_nap = $this->nap5Model->find($nap['documento']);
                    if (!isset($exist_nap) || $exist_nap == NULL) {
                        //muestro los datos o los grabo en base de datos
                        $this->nap5Model->save($nap);
                    } 
                }
                return redirect()->to('cargar_info_extra_view');
            }
        } 
    }
    
    public function cargar_nap6(){
        
        //Creo la ruta
        $ruta = './public/excel/';
        
        //Recibo el archivo excel
        $file = $this->request->getFile('hoja');

        //Verifico que sea válido
        if (!$file->isValid()) {
            return redirect()->to('cargar_info_extra_view');
        }else{
            //obtengo el nombre del archivo
            $nameFile = $file->getName();

            //Muevo el archjivo del temporal a la carpeta
            $file->move($ruta);

            //Verifico que se haya movido
            if ($file->hasMoved()) {
                //Creo qel reader
                $reader = new XlsxReader();
                //$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                $reader->setReadDataOnly(true);

                //leo el archivo
                $spreadsheet = $reader->load($ruta.$nameFile);

                //Determino la pestaña 
                $sheet = $spreadsheet->getSheet(0);

                //Accedo a cada fila extrayendo los datos
                
                foreach ($sheet->getRowIterator(4) as $row) {
                
                    $amie = trim($sheet->getCell('F'.$row->getRowIndex()));
                    $num = trim($sheet->getCell('A'.$row->getRowIndex()));
                               
                    $anio_actual = date('Y');

                    //Fecha de nacimniento
                     if (trim($sheet->getCell('P'.$row->getRowIndex())) != '') {

                         $fecha_nac = date("Y-m-d", strtotime(trim($sheet->getCell('P'.$row->getRowIndex()))));
                         $anio_nac = date("Y", strtotime(trim($sheet->getCell('P'.$row->getRowIndex()))));
                         //$fecha_nac = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(trim($sheet->getCell('N'.$row->getRowIndex())))->format('Y-m-d');

                         $edad = $anio_actual - $anio_nac;
                     }else{
                         $fecha_nac = '0000-00-00';
                         $edad = 0;
                     }
                
                    $nap6 = array(
                        'amie' => trim($sheet->getCell('F'.$row->getRowIndex())),
                        'anio_lectivo' => trim($sheet->getCell('H'.$row->getRowIndex())),
                        'subnivel' => trim($sheet->getCell('I'.$row->getRowIndex())),
                        'documento' => trim($sheet->getCell('J'.$row->getRowIndex())),
                        'apellidos_est' => trim($sheet->getCell('K'.$row->getRowIndex())),
                        'nombres_est' => trim($sheet->getCell('L'.$row->getRowIndex())),
                        'nacionalidad' => trim($sheet->getCell('M'.$row->getRowIndex())),
                        'etnia' => trim($sheet->getCell('N'.$row->getRowIndex())),
                        'genero' => trim($sheet->getCell('O'.$row->getRowIndex())),
                        'fecha_nac' => trim($sheet->getCell('T'.$row->getRowIndex())),
                        'edad' => $edad,
                        'nivel' => trim($sheet->getCell('Q'.$row->getRowIndex())),
                        'discapacidad' => trim($sheet->getCell('S'.$row->getRowIndex())),
                        'tipo_discapacidad' => trim($sheet->getCell('T'.$row->getRowIndex())),
                        'institucion' => trim($sheet->getCell('U'.$row->getRowIndex())),
                        
                        //Representante
                        'documento_rep' => trim($sheet->getCell('Y'.$row->getRowIndex())),
                        'representante' => trim($sheet->getCell('Z'.$row->getRowIndex())),
                        'parentesto_rep' => trim($sheet->getCell('AA'.$row->getRowIndex())),
                        'nacionalidad_rep' => trim($sheet->getCell('AB'.$row->getRowIndex())),
                        'direccion_rep' => trim($sheet->getCell('AC'.$row->getRowIndex())),
                        'contacto_telf' => trim($sheet->getCell('AD'.$row->getRowIndex())),
                        'email' => '',
                        'observaciones' => trim($sheet->getCell('AE'.$row->getRowIndex())),

                    );

                    if ($amie == 'END') {
                        break;
                    }
                    //Verifico si existe
                    $this->nap6Model->insert($nap6);   
                }
                return redirect()->to('cargar_info_extra_view');
            }
        } 
    }

    public function cargar_nap7(){
        
        //Creo la ruta
        $ruta = './public/excel/';
        
        //Recibo el archivo excel
        $file = $this->request->getFile('hoja');

        //Verifico que sea válido
        if (!$file->isValid()) {
            return redirect()->to('cargar_info_extra_view');
        }else{
            //obtengo el nombre del archivo
            $nameFile = $file->getName();

            //Muevo el archjivo del temporal a la carpeta
            $file->move($ruta);

            //Verifico que se haya movido
            if ($file->hasMoved()) {
                //Creo qel reader
                $reader = new XlsxReader();
                //$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                $reader->setReadDataOnly(true);

                //leo el archivo
                $spreadsheet = $reader->load($ruta.$nameFile);

                //Determino la pestaña 
                $sheet = $spreadsheet->getSheet(0);

                //Accedo a cada fila extrayendo los datos
                foreach ($sheet->getRowIterator(5) as $row) {
                
                    $amie = trim($sheet->getCell('F'.$row->getRowIndex()));
                    $num = trim($sheet->getCell('A'.$row->getRowIndex()));
                
                    $nap7 = array(
                        'amie' => trim($sheet->getCell('F'.$row->getRowIndex())),
                        'documento' => trim($sheet->getCell('k'.$row->getRowIndex())),
                        'apellidos' => trim($sheet->getCell('L'.$row->getRowIndex())),
                        'nombres' => trim($sheet->getCell('M'.$row->getRowIndex())),
                        'genero' => trim($sheet->getCell('N'.$row->getRowIndex())),
                        'autoidentificacion' => trim($sheet->getCell('O'.$row->getRowIndex())),
                        'titulo_pro' => trim($sheet->getCell('P'.$row->getRowIndex())),
                        'celular' => trim($sheet->getCell('Q'.$row->getRowIndex())),
                        'email' => trim($sheet->getCell('R'.$row->getRowIndex())),
                    );

                    if ($amie == 'END') {
                        break;
                    }
                    //INSERTO
                    $this->nap7Model->insert($nap7);   
                }
                return redirect()->to('cargar_info_extra_view');
            }
        } 
    }

    public function cargar_prod_3(){
        
        //Creo la ruta
        $ruta = './public/excel/';
        
        //Recibo el archivo excel
        $file = $this->request->getFile('hoja');

        //Verifico que sea válido
        if (!$file->isValid()) {
            return redirect()->to('cargar_info_extra_view');
        }else{
            //obtengo el nombre del archivo
            $nameFile = $file->getName();

            //Muevo el archjivo del temporal a la carpeta
            $file->move($ruta);

            //Verifico que se haya movido
            if ($file->hasMoved()) {
                //Creo qel reader
                $reader = new XlsxReader();
                //$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                $reader->setReadDataOnly(true);

                //leo el archivo
                $spreadsheet = $reader->load($ruta.$nameFile);

                //Determino la pestaña 
                $sheet = $spreadsheet->getSheet(0);

                //Accedo a cada fila extrayendo los datos
                foreach ($sheet->getRowIterator(3) as $row) {
                    $amie = trim($sheet->getCell('B'.$row->getRowIndex()));
                    
                    $prod3 = array(
                        'amie' => trim($sheet->getCell('B'.$row->getRowIndex())),
                        'nombre' => trim($sheet->getCell('F'.$row->getRowIndex())).' '.trim($sheet->getCell('G'.$row->getRowIndex())),
                        'documento' => trim($sheet->getCell('H'.$row->getRowIndex())),
                        'nacionalidad' => trim($sheet->getCell('I'.$row->getRowIndex())),             
                        'genero' => trim($sheet->getCell('J'.$row->getRowIndex())),
                        'edad' => trim($sheet->getCell('K'.$row->getRowIndex())),
                        'etnia' => trim($sheet->getCell('L'.$row->getRowIndex())),
                        'discapacidad' => trim($sheet->getCell('M'.$row->getRowIndex())),
                        'tipo' => trim($sheet->getCell('N'.$row->getRowIndex())),
                        'especialidad' => trim($sheet->getCell('O'.$row->getRowIndex())),
                        'celular' => trim($sheet->getCell('P'.$row->getRowIndex())),
                        'email' => trim($sheet->getCell('Q'.$row->getRowIndex())),
                        'funcion' => trim($sheet->getCell('R'.$row->getRowIndex())),
                     );

                    $this->prod3Model->insert($prod3);
                    if ($amie == 'END') {
                        break;
                    }
                }
                return redirect()->to('cargar_info_extra_view');
            }
        } 
    }

    public function cargar_prod_4(){
        
        //Creo la ruta
        $ruta = './public/excel/';
        
        //Recibo el archivo excel
        $file = $this->request->getFile('hoja');

        //Verifico que sea válido
        if (!$file->isValid()) {
            return redirect()->to('cargar_info_extra_view');
        }else{
            //obtengo el nombre del archivo
            $nameFile = $file->getName();

            //Muevo el archjivo del temporal a la carpeta
            $file->move($ruta);

            //Verifico que se haya movido
            if ($file->hasMoved()) {
                //Creo qel reader
                $reader = new XlsxReader();
                //$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                $reader->setReadDataOnly(true);

                //leo el archivo
                $spreadsheet = $reader->load($ruta.$nameFile);

                //Determino la pestaña 
                $sheet = $spreadsheet->getSheet(0);

                //Accedo a cada fila extrayendo los datos
                foreach ($sheet->getRowIterator(3) as $row) {
                    $idcentro4 = trim($sheet->getCell('B'.$row->getRowIndex()));
                    
                    $prod4 = array(
                        'idcentro4' => trim($sheet->getCell('B'.$row->getRowIndex())),
                        'cohorte' => trim($sheet->getCell('C'.$row->getRowIndex())),
                        'fecha_inicio' => date("Y-m-d", strtotime(trim($sheet->getCell('D'.$row->getRowIndex())))),
                        'fecha_fin' => date("Y-m-d", strtotime(trim($sheet->getCell('E'.$row->getRowIndex())))),
                        'apellidos' => strtoupper(trim($sheet->getCell('F'.$row->getRowIndex()))),
                        'documento' => trim($sheet->getCell('G'.$row->getRowIndex())),
                        'nacionalidad' => strtoupper(trim($sheet->getCell('H'.$row->getRowIndex()))),  
                        'fecha_nac' => date("Y-m-d", strtotime(trim($sheet->getCell('I'.$row->getRowIndex())))),
                        'edad' => trim($sheet->getCell('J'.$row->getRowIndex())),
                        'discapacidad' => trim($sheet->getCell('K'.$row->getRowIndex())),    
                        'tipo_discapacidad' => trim($sheet->getCell('L'.$row->getRowIndex())),
                        'genero' => strtoupper(trim($sheet->getCell('M'.$row->getRowIndex()))),
                        'barrio' => trim($sheet->getCell('N'.$row->getRowIndex())),
                        'contacto_telf' => trim($sheet->getCell('O'.$row->getRowIndex())),
                        'email' => trim($sheet->getCell('P'.$row->getRowIndex())),
                        'num_hijos' => trim($sheet->getCell('Q'.$row->getRowIndex())),
                        'edad_hijo_1' => trim($sheet->getCell('R'.$row->getRowIndex())),
                        'edad_hijo_2' => trim($sheet->getCell('S'.$row->getRowIndex())),
                        'edad_hijo_3' => trim($sheet->getCell('T'.$row->getRowIndex())),
                        'estudia' => trim($sheet->getCell('U'.$row->getRowIndex())),
                        'tiempo_sin_estudiar' => trim($sheet->getCell('V'.$row->getRowIndex())),
                        'institucion' => strtoupper(trim($sheet->getCell('W'.$row->getRowIndex()))),
                        'anio_egb' => trim($sheet->getCell('X'.$row->getRowIndex())),
                        'embarazada' => trim($sheet->getCell('Y'.$row->getRowIndex())),
                        'semanas' => trim($sheet->getCell('Z'.$row->getRowIndex())),
                        'controles' => trim($sheet->getCell('AA'.$row->getRowIndex())),
                     );

                    $this->prod4Model->insert($prod4);
                    if ($idcentro4 == 'END') {
                        break;
                    }
                }
                return redirect()->to('cargar_info_extra_view');
            }
        } 
    }
}
