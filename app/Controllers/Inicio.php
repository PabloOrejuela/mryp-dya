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
        //echo '<pre>'.var_export($data, true).'</pre>';
        $this->validation->setRuleGroup('login');
        
        if (!$this->validation->withRequest($this->request)->run()) {
            //Depuración
            //dd($validation->getErrors());
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }else{ 

            $usuario = $this->usuarioModel->_getUsuario($data);
            if (isset($usuario) && $usuario != NULL) {
                //valido el login y pongo el id en sesion

                if ($usuario->is_logged == 1 && $usuario->id != 1) {
                    $mensaje = 'Ya está logueado en otro PC. por favor cierre la otra sesión y vuelva a intentarlo';
                    $this->session->setFlashdata('mensaje', $mensaje);
                    return redirect()->to('/');
                }else{
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
                        'componente_4' => $usuario->componente_4,
                    ];
    
                    $user = [
                        'id' => $usuario->id,
                        'is_logged' => 1
                    ];
                    
                    $this->usuarioModel->update($usuario->id, $user);
                    $this->session->set($sessiondata);
    
                    return redirect()->to('inicio');
                }
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
}
