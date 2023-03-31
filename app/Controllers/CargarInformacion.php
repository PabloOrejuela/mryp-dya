<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;


class CargarInformacion extends BaseController {

    public function index(){
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $data['componentes'] = $this->productoModel->findAll();

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
            throw new RuntimeException($file->getErrorString());
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

    public function getExcelC1(){
        
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        if ($data['is_logged'] == 1) {

            //Creo la ruta
            $ruta = './public/excel/';
            
            //Recibo el archivo excel
            $file = $this->request->getFile('hoja');

            //Verifico que sea válido
            if (!$file->isValid()) {
                throw new RuntimeException($file->getErrorString());
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

                    //accedo a cada fila extrayendo los datos
                    foreach ($sheet->getRowIterator(2) as $row) {

                        $benefiario = array(
                            'nombre' => trim($sheet->getCellByColumnAndRow(1,$row->getRowIndex())),
                            'edad' => trim($sheet->getCellByColumnAndRow(2,$row->getRowIndex())),
                            'calificacion' => "E",
                            'direccion' => trim($datos[32]),
                            'dir_trabajo' => 'N/A',
                            'telefono_domicilio' => trim($datos[34]),
                            'telefono_trabajo' => 'N/A',
                        );

                        //Verifico si es que existe
                        $exist = $this->clienteModel->_getClienteId($cliente['cedula']);

                        //Logica del registro
                        if ($exist == 0) {
                            $this->clienteModel->save($cliente);
                            $idcliente = $this->db->insertID();
                            $registro = array(
                                'idcliente' => $idcliente,
                                'credito' => $datos[3],
                                'fecha_emision' => $datos[7],
                                'fecha_culminacion' => $datos[8],
                                'saldo_fecha' => $datos[19],
                                'valor_cuota' => "0.00",
                                'cuotas_cancelar' => $datos[21],
                                'cuotas_canceladas' => $datos[22],
                                'tasa_interes' => $datos[11],
                                'tasa_mora' => $datos[12],
                                'subtotal' => $datos[50],
                                'comision' => $datos[51],
                                'coactiva' => $datos[52],
                                'total' => $datos[53],
                                'idempresa' => $idempresa
                            );
                            //$this->carteraModel->save($registro);
                        }else{
                            $idcliente = $exist;
                            $registro = array(
                                'idcliente' => $idcliente,
                                'credito' => $datos[3],
                                'fecha_emision' => $datos[7],
                                'fecha_culminacion' => $datos[8],
                                'saldo_fecha' => $datos[19],
                                'valor_cuota' => "0.00",
                                'cuotas_cancelar' => $datos[21],
                                'cuotas_canceladas' => $datos[22],
                                'tasa_interes' => $datos[11],
                                'tasa_mora' => $datos[12],
                                'subtotal' => $datos[50],
                                'comision' => $datos[51],
                                'coactiva' => $datos[52],
                                'total' => $datos[53],
                                'idempresa' => $idempresa
                            );
                            //$this->carteraModel->save($registro);
                        }

                        //muestro los datos o los grabo en base de datos
                        echo '<pre>'.var_export($registro, true).'</pre>';
                    }
                    
                }
            }
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
