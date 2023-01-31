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
