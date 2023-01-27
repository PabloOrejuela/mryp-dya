<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CargarInformacion extends BaseController {

    public function index(){
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $data['componentes'] = $this->productoModel->findAll();

            $data['title']='MYRP - DYA';
            $data['main_content']='home/frm_subirExcel';
            return view('includes/template', $data);
        }else{

            $this->logout();
        }
        
    }

    public function frm_subir_excel(){
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {

            $data['title']='MYRP - DYA';
            $data['main_content']='home/frm_subirExcel';
            return view('includes/template', $data);
        }else{
            $this->logout();
        }
    }

    public function getExcel(){
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->session->is_logged;
        $data['nombre'] = $this->session->nombre;
        if ($data['logged_in'] == 1) {

            $data['title']='MYRP - DYA';
            $idempresa = $this->request->getPostGet('idproducto');

            $tipo = $_FILES['tablaDatos']['type'];
            $size = $_FILES['tablaDatos']['size'];
            $fileTemp = $_FILES['tablaDatos']['tmp_name'];
            
            $this->validation->setRuleGroup('uploadFile');
        
            if (!$this->validation->withRequest($this->request)->run()) {
                //Depuración
                //dd($validation->getErrors());
                return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
            }else{
                $filas = file($fileTemp);
                $num_registros = count($filas)-1;
                //echo '<pre>'.var_export($filas[1], true).'</pre>';exit;
                foreach ($filas as $key => $fila) {
                    if ($key != 0) {
                        $datos = explode(";", $fila);
                        
                        if ($datos[6] == 'SOLTERO') {
                            $idestado_civil = 1;
                        }else if ($datos[6] == 'CASADO') {
                            $idestado_civil = 2;
                        }else if ($datos[6] == 'DIVORCIADO') {
                            $idestado_civil = 3;
                        }else{
                            $idestado_civil = 4;
                        }
                        
                        $cliente = array(
                            'nombre' => trim($datos[4]),
                            'cedula' => trim($datos[2]),
                            'idestado_civil' => $idestado_civil,
                            'calificacion' => "E",
                            'direccion' => trim($datos[32]),
                            'dir_trabajo' => 'N/A',
                            'telefono_domicilio' => trim($datos[34]),
                            'telefono_trabajo' => 'N/A',
                        );
                        
                        $exist = $this->clienteModel->_getClienteId($cliente['cedula']);
                        //echo '<pre>'.var_export($exist, true).'</pre>';exit;
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
                            $this->carteraModel->save($registro);
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
                            $this->carteraModel->save($registro);
                        }
                        

                        //echo '<pre>'.var_export($cliente, true).'</pre>';
                    }
                    
                }       
            return redirect()->to('/cartera');
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
