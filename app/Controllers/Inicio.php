<?php

namespace App\Controllers;

use TCPDF;

class Inicio extends BaseController {

    public function index(){
    
        //echo '<pre>'.var_export($this->session->idusuario, true).'</pre>';
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1) {
            //echo '<pre>'.var_export($data, true).'</pre>';exit;
            $data['provincias'] = $this->provinciaModel->findAll();

            $data['title']='MYRP - DYA';
            $data['main_content']='inicio';
            return view('includes/template', $data);
        }else{
            $this->logout();
            return redirect()->to('/');
        }
    }

    public function corrije_regimen_centro(){
        $costa = array(
            7,8,9,12,13,20,23,24
        );

        $sierra = array(
            1,2,3,4,5,6,10,11,14,15,16,17,18,19,21,22
        );

        $centros = $this->centroEducativoModel->_getCentroRegionNull();
        if (isset($centros) && $centros != NULL) {
            foreach ($centros as $key => $value) {
                if (in_array($value->idprovincias, $costa)) {
                    //echo $value->idprovincias."COSTA<br>";
                    //Grabo el regimen COSTA
                    $this->centroEducativoModel->_updateRegimen($value, "COSTA");
                }else if(in_array($value->idprovincias, $sierra)){
                    //echo $value->idprovincias.'SIERRA <br>';
                    //Grabo el regimen SIERRA
                    $this->centroEducativoModel->_updateRegimen($value, "SIERRA");
                }
            }
        }
        
        echo 'Actualizados los regimen';
        //echo '<pre>'.var_export($centros, true).'</pre>';  
    }

    function ciudades_select(){
        $provincia = $this->request->getPostGet('idprovincia');
        $data['ciudades'] = $this->ciudadesModel->_obtenCiudades($provincia);
        //$data['ciudades'] = $this->ciudadModel->findAll();
        echo view('ciudades_select', $data);
    }

    public function login(){
        $this->session->destroy();
        $data['mensaje'] = $this->session->getFlashdata('mensaje');
        $data['title']='Acceso al sistema:';
        $data['main_content']='home/login';
        return view('includes/template_login', $data);
    }

    public function validate_login(){
        $data = array(
            'user' => $this->request->getPostGet('user'),
            'password' => $this->request->getPostGet('password'),
        );
        
        $this->validation->setRuleGroup('login');
        
        if (!$this->validation->withRequest($this->request)->run()) {
            //Depuración
            //dd($validation->getErrors());
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }else{ 

            $usuario = $this->usuarioModel->_getUsuario($data);
            $ip = $_SERVER['REMOTE_ADDR'];
            
            if (isset($usuario) && $usuario != NULL) {
                //valido el login y pongo el id en sesion  && $usuario->id != 1 
                //echo '<pre>'.var_export($usuario, true).'</pre>';
                if ($usuario->is_logged == 1 && $usuario->ip != $ip) {
                    //Está logueado así que lo deslogueo
                    $user = [
                        'id' => $usuario->id,
                        'is_logged' => 0,
                        'ip' => 0
                    ];
                    $this->usuarioModel->update($usuario->id, $user);
                }

                $sessiondata = [
                    //'is_logged' => 1,
                    'idusuario' => $usuario->id,
                    'nombre' => $usuario->nombre,
                    'idrol' => $usuario->idrol,
                    'rol' => $usuario->rol,
                    'centro_educativo' => $usuario->centro_educativo,
                    'editar' => $usuario->editar,
                    'cargar_info' => $usuario->cargar_info,
                    'reportes' => $usuario->reportes,
                    'reportes_dinamico' => $usuario->reportes_dinamico,
                    'ver_info' => $usuario->ver_info,
                    'descargar_info' => $usuario->descargar_info,
                    'componente_1' => $usuario->componente_1,
                    'componente_2' => $usuario->componente_2,
                    'componente_3' => $usuario->componente_3,
                    'prod3_biblioteca' => $usuario->prod3_biblioteca,
                    'componente_4' => $usuario->componente_4,
                ];
        
                $user = [
                    'id' => $usuario->id,
                    'is_logged' => 1,
                    'ip' => $ip
                ];
                
                $this->usuarioModel->update($usuario->id, $user);
                $this->session->set($sessiondata);
        
                return redirect()->to('inicio');

            }else{
                $this->logout();
                return redirect()->to('/');
            }
        }
        
    }

    public function generate_pdf() {

		$pdf = new TCPDF();
		
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('https://roytuts.com');
		$pdf->SetTitle('PDF de prueba');
		$pdf->SetSubject('Report generated using Codeigniter and TCPDF');
		$pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

		// set default header data
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        //IMPORTANTE ESTA LÍNEA
        $this->response->setHeader('Content-Type', 'application/pdf'); 
        

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set font
		$pdf->SetFont('helvetica', 'B', 14);
		
		
		
		$html = '<h1>Hola Mundo</h1>';
		//Generate HTML table data from MySQL - end
		
		// add a page
		$pdf->AddPage();
		
		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		
		// reset pointer to the last page
		$pdf->lastPage();

		//Close and output PDF document
		$pdf->Output("PDF de prueba-".md5(time()).'.pdf', 'I');
	}

    public function form_nuevo_anio(){
    
        //echo '<pre>'.var_export($this->session->idusuario, true).'</pre>';
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1 && $this->session->editar == 1) {
            //echo '<pre>'.var_export($data, true).'</pre>';exit;
            $data['anios_lectivos'] = $this->anioLectivoModel->findAll();
            $data['ultimo_anio'] = $this->anioLectivoModel->_getlast();
            $data['anio1']  = substr($data['ultimo_anio'], 0, 4);
            $data['anio2']  = substr($data['ultimo_anio'], -4, 4);

            //echo '<pre>'.var_export($data['anio2'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='home/frm-anio-crear';
            return view('includes/template', $data);
        }else{
            $this->logout();
            return redirect()->to('/');
        }
    }

    public function anio_lectivo_insert() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {

            $anio = array(
                'anio_lectivo_desde' => $this->request->getPostGet('anio_lectivo_desde'),
                'anio_lectivo_hasta' => $this->request->getPostGet('anio_lectivo_hasta'),
            );

            //echo '<pre>'.var_export($anio, true).'</pre>';exit;
            
            $this->anioLectivoModel->_insert($anio);
            
            return redirect()->to('form-nuevo-anio');
        }else{

            $this->logout();
        }
    }

    public function form_nueva_cohorte(){
    
        //echo '<pre>'.var_export($this->session->idusuario, true).'</pre>';
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;

        if ($data['is_logged'] == 1 && $this->session->editar == 1) {
            //echo '<pre>'.var_export($data, true).'</pre>';exit;
            $data['cohortes'] = $this->cohorteModel->findAll();

            //echo '<pre>'.var_export($data['anio2'], true).'</pre>';exit;

            $data['title']='MYRP - DYA';
            $data['main_content']='home/frm-cohorte-crear';
            return view('includes/template', $data);
        }else{
            $this->logout();
            return redirect()->to('/');
        }
    }

    public function cohorte_insert() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_4'] = $this->session->componente_4;

        if ($data['is_logged'] == 1 && $data['componente_4'] == 1) {

            $cohorte = array(
                'cohorte' => strtoupper($this->request->getPostGet('cohorte')),
            );

            //echo '<pre>'.var_export($cohorte, true).'</pre>';exit;
            
            $this->cohorteModel->insert($cohorte);
            
            return redirect()->to('form-nueva-cohorte');
        }else{

            $this->logout();
        }
    }

    public function logout(){
        //destruyo la session  y salgo
        
        $user = [
            'id' => $this->session->idusuario,
            'is_logged' => 0
        ];
        //echo '<pre>'.var_export($user, true).'</pre>';exit;
        $this->usuarioModel->_updateLoggin($user);
        $this->session->destroy();
        return redirect()->to('/');
    }

    public function cerrar_sesiones($id){
        //destruyo la session  y salgo
        $user = [
            'id' => $id,
        ];

        //echo '<pre>'.var_export($user, true).'</pre>';exit;
        $this->usuarioModel->_closeSession($user);
        $this->session->destroy();
        return redirect()->to('/');
    }
}
