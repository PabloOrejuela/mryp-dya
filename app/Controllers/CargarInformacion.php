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
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $data['componentes'] = array('1','2','3','4','5');

            $data['title']='MYRP - DYA';
            $data['main_content']='home/selecciona_componente';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
        
    }

    public function carga_extra(){
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            
            //echo '<pre>'.var_export($mensaje, true).'</pre>';exit;
            $data['title']='MYRP - DYA';
            $data['main_content']='home/frm_cargar_info_extra';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
        
    }

    public function frm_subir_excel($componente = null){
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $data['idproducto'] = $componente;
            $data['componente'] = $this->productoModel->find($componente);
            //echo '<pre>'.var_export($data['componente'], true).'</pre>';
            $data['title']='MYRP - DYA';
            $data['main_content']='home/frm_subirExcel';
            return view('includes/template', $data);
        }else{
            $this->logout();
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
                        'cod_parroquia' => trim($sheet->getCell('H'.$row->getRowIndex())),
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
                        'prioridad' =>trim($sheet->getCell('AD'.$row->getRowIndex()))

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
                foreach ($sheet->getRowIterator(4) as $row) {

                    $docente = array(
                        'documento' => trim($sheet->getCell('H'.$row->getRowIndex())),
                        'apellidos' => trim($sheet->getCell('I'.$row->getRowIndex())),
                        'nombres' => trim($sheet->getCell('J'.$row->getRowIndex())),
                        'email' => trim($sheet->getCell('K'.$row->getRowIndex())),
                        'celular' => trim($sheet->getCell('L'.$row->getRowIndex())),
                        'autoidentificacion' => trim($sheet->getCell('M'.$row->getRowIndex())),
                        'genero' => trim($sheet->getCell('N'.$row->getRowIndex())),
                        'discapacidad'=> trim($sheet->getCell('O'.$row->getRowIndex())),
                        'tipo' => trim($sheet->getCell('P'.$row->getRowIndex())),
                        'amie' => trim($sheet->getCell('B'.$row->getRowIndex())),

                    );
                    
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

                //leo el archivo
                $spreadsheet = $reader->load($ruta.$nameFile);

                //Determino la pestaña 
                $sheet = $spreadsheet->getSheet(0);

                //Accedo a cada fila extrayendo los datos
                foreach ($sheet->getRowIterator(2) as $row) {

                    $centro = array(
                        'amie' => trim($sheet->getCell('B'.$row->getRowIndex())),

                    );
                    
                    //Verifico si existe
                    $exist = $this->centroEducativoModel->find($centro['amie']);
                    
                    if (!isset($exist) || $exist == NULL) {
                        //muestro los datos o los grabo en base de datos
                        echo "existe";
                        //$this->centroEducativoModel->save($centro);
                    }else{
                        echo "NO existe";
                    }
                    $fecha_actual = date('Y-m-d');

                    if (trim($sheet->getCell('G'.$row->getRowIndex())) != '') {
                        $fecha_inicio = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(trim($sheet->getCell('G'.$row->getRowIndex())))->format('Y-m-d');
                    }else{
                        $fecha_inicio = '0000-00-00';
                    }

                    if (trim($sheet->getCell('H'.$row->getRowIndex())) != '') {
                        $fecha_fin = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(trim($sheet->getCell('H'.$row->getRowIndex())))->format('Y-m-d');
                    }else{
                        $fecha_fin = '0000-00-00';
                    }

                    if (trim($sheet->getCell('N'.$row->getRowIndex())) != '') {
                        $fecha_nac = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(trim($sheet->getCell('N'.$row->getRowIndex())))->format('Y-m-d');
                        $anio_nac = Time::parse($fecha_nac);
                        $anio_actual = Time::parse($fecha_actual);
                        $edad = $anio_actual->getYear() - $anio_nac->getYear();
                    }else{
                        $fecha_nac = '0000-00-00';
                        $edad = 0;
                    }
                    
                    $prod = array(
                        
                        'amie' => trim($sheet->getCell('B'.$row->getRowIndex())),
                        'cohorte' => trim($sheet->getCell('F'.$row->getRowIndex())),
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
                    echo '<pre>'.var_export($prod, true).'</pre>';exit;
                    //Verifico si existe
                    $exist = $this->nap3Model->find($docente['documento']);
                    if (!isset($exist) || $exist == NULL) {
                        //muestro los datos o los grabo en base de datos
                        //$this->nap3Model->save($docente);
                    } 
                }
                return redirect()->to('cargar_info_extra_view');
            }
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
