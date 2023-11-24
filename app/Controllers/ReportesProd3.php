<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use TCPDF;

class ReportesProd3 extends BaseController {

    public function index() {
        $this->prod3_reporte_certificados();
    }

    public function prod3_reporte_certificados() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;
        //echo $this->session->idusuario;
        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {
            
            if ($data['idrol'] == 1 || $data['idrol'] == 3 || $data['idrol'] == 10) {
                $data['componente_3'] = $this->prod3Model->_getAllRegistros();
                $data['centros'] = $this->usuariosCentrosProd3Model->_getAmiesProd3();
                
            }else if($data['idrol'] == 7){
                $data['componente_3'] = $this->prod3Model->_getMisRegistros($this->session->idusuario);
                $data['centros'] = $this->usuariosCentrosProd3Model->_getAmiesUsuarioProd3($this->session->idusuario);
            }
            //echo '<pre>'.var_export($data['componente_3'], true).'</pre>';exit;

            $this->RepCertificadoPdf($data['componente_3'], $data['centros']);

        }else{

            $this->logout();
        }
    }

    public function RepCertificadoPdf($data, $centros) {

		$pdf = new TCPDF();
		
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('https://appdvp.com');
		$pdf->SetTitle('Reporte');
		$pdf->SetSubject('Reporte de certificados');
		//$pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Certificados MYRP', PDF_HEADER_STRING);

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
		$pdf->SetFont('helvetica', 'B', 10);
        
        
        $html = '<h2>Especialista: '.$this->session->nombre.'</h2>';
        $html .= '<h4>Lista de docentes que cumplen con los requisitos para recibir certificado por talleres</h4>';

        foreach ($centros as $key => $value) {
            $num = 1;
            $docentes = $this->prod3Model->_getRegistrosAmie($value->amie);
            //$docentes = $this->prod3Model->_getRegistrosAmie('17H01403');
            $requisitos_certificado = $this->prod3CentroCertificadosModel->_getRequisitos($value->amie);
            //$requisitos_certificado = $this->prod3CentroCertificadosModel->_getRequisitos('17H01403');
            //echo '<pre>'.var_export($value->amie, true).'</pre>';exit;
                
            if ($requisitos_certificado != NULL) {
                $html .= '<h4>Centro: '.$value->amie.'-'.$value->nombre.'</h4>';
                $html .= '<table id="table-docentes" style="border: 1px solid #000;margin-bottom: 50px;margin-top 30px;">
                <tr>
                    <td style="border: 1px solid #000;text-align:center;width:10%;background-color:#d3eaf2;">No.</td>
                    <td style="border: 1px solid #000;width:50%;background-color:#d3eaf2;">Docente</td>
                    <td style="border: 1px solid #000;text-align:center;width:25%;background-color:#d3eaf2;">Talleres recibidos</td>
                    <td style="border: 1px solid #000;text-align:center;width:15%;background-color:#d3eaf2;">Horas</td>
                </tr>';
                
                foreach ($docentes as $key => $docente) {
                    $horas = 0;
                    $cant_talleres = $this->calcula_talleres($docente->id);
                    
                    if ($cant_talleres >= $requisitos_certificado->minimo) {
                        //echo $docente->id.' '.$docente->nombre.' '.$cant_talleres.' '.$requisitos_certificado->minimo.'<br>';
                        $html .= '<tr>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:10%;">'.$num.'</td>
                            <td style="border: 1px solid #000;font-weight:none;font-size:0.8em;width:50%;">'.$docente->nombre.'</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:25%;">'.$cant_talleres.' talleres</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:15%;">'.$requisitos_certificado->horas.' horas</td>
                        </tr>';
                        $num++;
                    }
                }
                $html .= '</table>';
                $html .= '<br pagebreak="true"/>';
            }
        }

		
		//Generate HTML table data from MySQL - end
		// Print text using writeHTMLCell()
		// add a page
		$pdf->AddPage();
		
		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		
		// reset pointer to the last page
		$pdf->lastPage();

		//Close and output PDF document
		$pdf->Output("Reporte Certificados-".$this->session->nombre.'.pdf', 'I');
	}

    /**
     * Calcula la cantidad de talleres tomados por un docente
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function calcula_talleres($id) {
        $total_talleres = 0;
        //Calcula talleres arte
        $talleres_arte = $this->arteProd3Model->_getTotalTalleresArte($id);

        //Calcula talleres lengua
        $talleres_lengua = $this->lenguaProd3Model->_getTotalTalleresLengua($id);

        //Calcula talleres ciudadania
        $talleres_ciudad = $this->ciudadProd3Model->_getTotalTalleresCiudad($id);

        //echo $talleres_arte + $talleres_lengua + $talleres_ciudad;
        return $talleres_arte + $talleres_lengua + $talleres_ciudad;
    }



    public function reporte_info_talleres() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;
        //echo $this->session->idusuario;
        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {

            $data['componente_3'] = $this->prod3Model->_getAllRegistros();
            $data['centros'] = $this->usuariosCentrosProd3Model->_getAmiesProd3();
                
            //echo '<pre>'.var_export($data['centros'], true).'</pre>';exit;

            $this->RepEstadisticoCentros($data['componente_3'], $data['centros']);

        }else{

            $this->logout();
        }
    }

    public function RepEstadisticoCentros($data, $centros) {

		$pdf = new TCPDF();
		
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('https://appdvp.com');
		$pdf->SetTitle('Reporte');
		$pdf->SetSubject('Reporte Estadistico general de Talleres por centros educativos');
		//$pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Reporte de Talleres por centros educativos', 'Reporte estadístico');

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
		$pdf->SetFont('helvetica', 'B', 8);
        
        
        $html = '<h2>Coordinador: '.$this->session->nombre.'</h2>';
        $html .= '<h4>Lista de Centros educativos</h4>';

        $html .= '<table id="table-docentes" style="border: 1px solid #000;margin-bottom: 50px;margin-top 30px;">
            <tr>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d3eaf2;">AMIE</td>
                <td style="border: 1px solid #000;text-align:center;width:55%;background-color:#d3eaf2;">Centro Educativo</td>
                <td style="border: 1px solid #000;text-align:center;width:10%;background-color:#d3eaf2;">Provincia</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Cant. Talleres</td>
                <td style="border: 1px solid #000;text-align:center;width:9%;background-color:#d3eaf2;">Total Docentes</td>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d3eaf2;">Aprueban</td>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d3eaf2;">% aprueban</td>
            </tr>';
        $pdf->SetFont('helvetica', 'P', 8);

        $totalDocentes = 0;
        $totalAprobados = 0;
        foreach ($centros as $key => $value) {
            $numAprobados = 0;
            $docentes = $this->prod3Model->_getRegistrosAmie($value->amie);
            $provincia = $this->centroEducativoModel->_getProvincia($value->amie);
            $encuentro = $this->prod3BibliotecaEncuentroModel->_getProd3BibliotecaEncuentro($value->amie);
            //$docentes = $this->prod3Model->_getRegistrosAmie('17H01403');
            $requisitos_certificado = $this->prod3CentroCertificadosModel->_getRequisitos($value->amie);
            //$requisitos_certificado = $this->prod3CentroCertificadosModel->_getRequisitos('17H01403');
            //echo '<pre>'.var_export($encuentro, true).'</pre>';

            if ($docentes) {
                foreach ($docentes as $key => $docente) {
                    $cant_talleres = $this->calcula_talleres($docente->id);
                    if ($cant_talleres >= $requisitos_certificado->minimo) {
                        $numAprobados++;
                    }
                }
                
                $porcentajeAprueban = round(($numAprobados * 100)/count($docentes));
                $totalDocentes += count($docentes);
                $html .= '<tr>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$value->amie.'</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:left;width:55%;">'.$value->nombre.'</td>';
                            if ($provincia) {
                                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:left;width:10%;">'.$provincia->provincia.'</td>';
                            }else{
                                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:left;width:10%;"> </td>';
                            }
                            
                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;font-size:0.8em;width:5%;">'.$requisitos_certificado->total_talleres.'</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:9%;">'.count($docentes).'</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$numAprobados.'</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$porcentajeAprueban.'%</td>
                        </tr>';
            }else{
                $html .= '<tr>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$value->amie.'</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:left;width:55%;">'.$value->nombre.'</td>';
                            if ($provincia) {
                                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:left;width:10%;">'.$provincia->provincia.'</td>';
                            }else{
                                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:left;width:10%;"> </td>';
                            }
                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;font-size:0.8em;width:5%;">0</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;font-size:0.8em;width:9%;">0</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">0</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">0 %</td>
                        </tr>';
            }
            $totalAprobados += $numAprobados;
            
        }
        $totalPorcentajeAprueban = round(($totalAprobados * 100)/$totalDocentes);
        $totalInstituciones = count($centros);
        $html .= '<tr style="font-weight:bold;font-size:1.1em;color:blue;">';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;">TOTALES:</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:55%;">'.$totalInstituciones.' INSTITUCIONES</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:10%;"> </td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;"> </td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:9%;">'.$totalDocentes.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;">'.$totalAprobados.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;">'.$totalPorcentajeAprueban.'%</td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '<br pagebreak="true"/>';
		
		//Generate HTML table data from MySQL - end
		// Print text using writeHTMLCell()
		// add a page
        

        $camposEstadistica = $this->prod3Model->_getCamposEstadistica();
        $totalMasculino = $this->prod3Model->_getTotalGeneros('MASCULINO');
        $totalFemenino = $this->prod3Model->_getTotalGeneros('FEMENINO');
        $totalSinDato = ($totalDocentes - $totalMasculino -$totalFemenino);
        //echo '<pre>'.var_export($camposEstadistica, true).'</pre>';exit;

        $html .= '<h2>Variables</h2>';
        $html .= '<table id="table-docentes" style="border: 1px solid #000;margin-bottom: 50px;margin-top 30px;font-size:1.2em;">
            <tr>
                <td style="border: 1px solid #000;text-align:left;width:30%;background-color:#d3eaf2;">Total Registros:</td>
                <td style="border: 1px solid #000;text-align:center;width:20%;">'.$totalDocentes.' Docentes registrados</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000;text-align:left;width:30%;background-color:#d3eaf2;">Edad Promedio de los docentes:</td>
                <td style="border: 1px solid #000;text-align:center;width:20%;">'.round($camposEstadistica[0]->promEdad).' Años</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000;text-align:left;width:50%;"></td>
            </tr>
            <tr>
                <td style="border: 1px solid #000;text-align:left;width:70%;background-color:#d3eaf2;font-weight:bold;">Porcentaje por Género:</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000;text-align:left;width:30%;background-color:#d3eaf2;">MASCULINO:</td>
                <td style="border: 1px solid #000;text-align:center;width:20%;">'.$totalMasculino.'</td>
                <td style="border: 1px solid #000;text-align:center;width:20%;">'.round(($totalMasculino * 100)/$totalDocentes).' %</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000;text-align:left;width:30%;background-color:#d3eaf2;">FEMENINO:</td>
                <td style="border: 1px solid #000;text-align:center;width:20%;">'.$totalFemenino.'</td>
                <td style="border: 1px solid #000;text-align:center;width:20%;">'.round(($totalFemenino * 100)/$totalDocentes).' %</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000;text-align:left;width:30%;background-color:#d3eaf2;">SIN DATO:</td>
                <td style="border: 1px solid #000;text-align:center;width:20%;">'.$totalSinDato.'</td>
                <td style="border: 1px solid #000;text-align:center;width:20%;">'.round(($totalSinDato * 100)/$totalDocentes).' %</td>
            </tr>';
        $html .= '</table>';
        $html .= '<br pagebreak="true"/>';


        $html .= '<table id="table-docentes" style="border: 1px solid #000;margin-bottom: 50px;margin-top 30px;font-size:0.7em;">
            <tr>
                <td style="border: 1px solid #000;text-align:center;width:100%;background-color:#d3eaf2;">NACIONALIDAD</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000;text-align:center;width:10%;background-color:#d3eaf2;">AMIE</td>
                <td style="border: 1px solid #000;text-align:center;width:45%;background-color:#d3eaf2;">Centro Educativo</td>
                <td style="border: 1px solid #000;text-align:center;width:10%;background-color:#d3eaf2;">Provincia</td>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d3eaf2;">ECUATORIANA</td>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d3eaf2;">VENEZOLANA</td>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d3eaf2;">COLOMBIANA</td>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d3eaf2;">PERUANA</td>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d3eaf2;">OTROS</td>
            </tr>';
        $pdf->SetFont('helvetica', 'P', 8);

        $totalInstituciones = count($centros);
        $totalEcuatoriano = 0;
        $totalVenezolano = 0;
        $totalColombiano = 0;
        $totalPeruano = 0;
        $totalOtros = 0;

        foreach ($centros as $key => $value) {
            $ecuatoriano = 0;
            $venezolano = 0;
            $colombiano = 0;
            $peruano = 0;
            $otros = 0;
            $docentes = $this->prod3Model->_getRegistrosAmie($value->amie);
            $provincia = $this->centroEducativoModel->_getProvincia($value->amie);
            if ($docentes) {
                foreach ($docentes as $key => $docente) {
                    $datos = $this->prod3Model->find($docente->id);
                    //echo '<pre>'.var_export($datos, true).'</pre>';exit;
                    if ($datos->nacionalidad == 'ECUATORIANA') {
                        $ecuatoriano += 1;
                    }else if ($datos->nacionalidad == 'VENEZOLANA') {
                        $venezolano += 1;
                    }else if ($datos->nacionalidad == 'COLOMBIANA') {
                        $colombiano += 1;
                    }else if ($datos->nacionalidad == 'PERUANA') {
                        $peruano += 1;
                    }else {
                        $otros += 1;
                    }
                    
                }
                
                $porcentajeAprueban = round(($numAprobados * 100)/count($docentes));
                $totalDocentes += count($docentes);
                $html .= '<tr>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:10%;">'.$value->amie.'</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:left;width:45%;">'.$value->nombre.'</td>';
                            if ($provincia) {
                                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:left;width:10%;">'.$provincia->provincia.'</td>';
                            }else{
                                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:left;width:10%;"> </td>';
                            }
                            
                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$ecuatoriano.'</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$venezolano.'</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$colombiano.'</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$peruano.'</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$otros.'</td>
                        </tr>';
            }else{
                $html .= '<tr>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:10%;">'.$value->amie.'</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:left;width:45%;">'.$value->nombre.'</td>';
                            if ($provincia) {
                                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:left;width:10%;">'.$provincia->provincia.'</td>';
                            }else{
                                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:left;width:10%;"> </td>';
                            }
                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">0</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">0</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">0</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">0</td>
                        </tr>';
            }
            $totalEcuatoriano += $ecuatoriano;
            $totalVenezolano += $venezolano;
            $totalColombiano += $colombiano;
            $totalPeruano += $peruano;
            $totalOtros += $otros;
        }

        $html .= '<tr style="font-weight:bold;font-size:1.2em;color:blue;">';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:10%;">TOTALES:</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:45%;">'.$totalInstituciones.' INSTITUCIONES</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:10%;"> </td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;">'.$totalEcuatoriano.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;">'.$totalVenezolano.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;">'.$totalColombiano.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;">'.$totalPeruano.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;">'.$totalOtros.'</td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '<br pagebreak="true"/>';

        $html .= '<table id="table-docentes" style="border: 1px solid #000;margin-bottom: 50px;margin-top 30px;font-size:0.7em;">
            <tr>
                <td style="border: 1px solid #000;font-weight:bold;text-align:center;width:100%;background-color:#d3eaf2;font-size:1em;">ETNIA</td>
            </tr>
            <tr>
                <td style="border: 1px solid #000;text-align:center;width:10%;background-color:#d3eaf2;">AMIE</td>
                <td style="border: 1px solid #000;text-align:center;width:41%;background-color:#d3eaf2;">Centro Educativo</td>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d3eaf2;">Provincia</td>
                <td style="border: 1px solid #000;text-align:center;width:6%;background-color:#d3eaf2;">MESTIZA</td>
                <td style="border: 1px solid #000;text-align:center;width:6%;background-color:#d3eaf2;">INDIGENA</td>
                <td style="border: 1px solid #000;text-align:center;width:6%;background-color:#d3eaf2;">AFRODECENDIENTE</td>
                <td style="border: 1px solid #000;text-align:center;width:6%;background-color:#d3eaf2;">MONTUBIO</td>
                <td style="border: 1px solid #000;text-align:center;width:6%;background-color:#d3eaf2;">BLANCA</td>
                <td style="border: 1px solid #000;text-align:center;width:6%;background-color:#d3eaf2;">OTROS</td>
            </tr>';
        $pdf->SetFont('helvetica', 'P', 8);

        $totalInstituciones = count($centros);
        $totalMestiza = 0;
        $totalIndigena = 0;
        $totalAfrodecendiente = 0;
        $totalMontubio = 0;
        $totalBlanco = 0;
        $totalOtros = 0;

        foreach ($centros as $key => $value) {
            $mestiza = 0;
            $indigena = 0;
            $afrodecendiente = 0;
            $montubio = 0;
            $blanco = 0;
            $otros = 0;

            $docentes = $this->prod3Model->_getRegistrosAmie($value->amie);
            $provincia = $this->centroEducativoModel->_getProvincia($value->amie);
            if ($docentes) {
                foreach ($docentes as $key => $docente) {
                    $datos = $this->prod3Model->find($docente->id);
                    //echo '<pre>'.var_export($datos, true).'</pre>';exit;
                    if ($datos->etnia == '1') {
                        $mestiza += 1;
                    }else if ($datos->etnia == '3') {
                        $indigena += 1;
                    }else if ($datos->etnia == '2') {
                        $afrodecendiente += 1;
                    }else if ($datos->etnia == '4') {
                        $blanco += 1;
                    }else if ($datos->etnia == '6') {
                        $montubio += 1;
                    }else {
                        $otros += 1;
                    }
                    
                }
                
                $totalDocentes += count($docentes);
                $html .= '<tr>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:10%;">'.$value->amie.'</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:left;width:41%;">'.$value->nombre.'</td>';
                            if ($provincia) {
                                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:left;width:7%;">'.$provincia->provincia.'</td>';
                            }else{
                                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:left;width:7%;"> </td>';
                            }
                            
                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:6%;">'.$mestiza.'</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:6%;">'.$indigena.'</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:6%;">'.$afrodecendiente.'</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:6%;">'.$montubio.'</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:6%;">'.$blanco.'</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:6%;">'.$otros.'</td>
                        </tr>';
            }else{
                $html .= '<tr>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:10%;">'.$value->amie.'</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:left;width:41%;">'.$value->nombre.'</td>';
                            if ($provincia) {
                                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:left;width:7%;">'.$provincia->provincia.'</td>';
                            }else{
                                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:left;width:7%;"> </td>';
                            }
                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:6%;">0</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:6%;">0</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:6%;">0</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:6%;">0</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:6%;">0</td>
                            <td style="border: 1px solid #000;font-weight:none;text-align:center;width:6%;">0</td>
                        </tr>';
            }
            
            $totalMestiza += $mestiza;
            $totalIndigena += $indigena;
            $totalAfrodecendiente += $afrodecendiente;
            $totalMontubio += $montubio;
            $totalBlanco += $blanco;
            $totalOtros += $otros;
        }

        $html .= '<tr style="font-weight:bold;font-size:1.2em;color:blue;">';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:10%;">TOTALES:</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:41%;">'.$totalInstituciones.' INSTITUCIONES</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;"> </td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:6%;">'.$totalMestiza.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:6%;">'.$totalIndigena.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:6%;">'.$totalAfrodecendiente.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:6%;">'.$totalMontubio.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:6%;">'.$totalBlanco.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:6%;">'.$totalOtros.'</td>';
        $html .= '</tr>';
        $html .= '</table>';
        //$html .= '<br pagebreak="true"/>';

        $pdf->AddPage("L");
        //$html .= '<br pagebreak="true"/>';
		
		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
        
		
		// reset pointer to the last page
		$pdf->lastPage();

		//Close and output PDF document
		$pdf->Output("Reporte talleres centros-".$this->session->nombre.'.pdf', 'I');
	}

    public function reporte_info_biblioteca() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;
        //echo $this->session->idusuario;
        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {

            //$data['componente_3'] = $this->prod3Model->_getAllRegistros();
            $data['centros'] = $this->usuariosCentrosProd3Model->_getAmiesProd3();
                
            //echo '<pre>'.var_export($data['centros'], true).'</pre>';exit;

            $this->RepEstadisticoBiblioteca($data['centros']);

        }else{

            $this->logout();
        }
    }

    public function RepEstadisticoBiblioteca($centros) {

		$pdf = new TCPDF();
		
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('https://appdvp.com');
		$pdf->SetTitle('Reporte');
		$pdf->SetSubject('Reporte Estadistico Biblioteca y encuentro');
		//$pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, ' ', 'Reporte Estadistico Biblioteca y encuentro');

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
		$pdf->SetFont('helvetica', 'B', 8);

        $html = '<h2>Coordinador: '.$this->session->nombre.'</h2>';
        $html .= '<h4>Biblioteca y encuentro intercultural por Centro educativo</h4>';

        $html .= '<table id="table-docentes" style="border: 1px solid #000;margin-bottom: 50px;margin-top 30px;font-size: 0.8em;">
            <tr>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d3eaf2;">AMIE</td>
                <td style="border: 1px solid #000;text-align:center;width:50%;background-color:#d3eaf2;">Centro Educativo</td>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d3eaf2;">Provincia</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Visitas Biblioteca</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Encuentro</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Expo. trabajos</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Exp. oral</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Exp. escrita</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">P. de docentes</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">P. padres y madres de familia</td>
            </tr>';
        $pdf->SetFont('helvetica', 'P', 8);

        $totalInstituciones = count($centros);
        $totalVisitas = 0;
        $totalEncuentros = 0;
        $totalTrabajos = 0;
        $totalOral = 0;
        $totalEscrito = 0;
        $totalDocentes = 0;
        $totalFamilia = 0;

        foreach ($centros as $key => $value) {
            //variables
            
            $visitasBiblioteca = 0;
            $encuentros = 0;
            $expTrabajos = 0;
            $expOral = 0;
            $expEscrita = 0;
            $partDocentes = 0;
            $partFamilia = 0;

            $provincia = $this->centroEducativoModel->_getProvincia($value->amie);
            //$visitasBiblioteca = 
            $encuentro = $this->prod3BibliotecaEncuentroModel->_getProd3BibliotecaEncuentro($value->amie);
            if ($encuentro) {
                $visitasBiblioteca = $encuentro->primera_visita + $encuentro->segunda_visita + $encuentro->tercera_visita;
                $encuentros = $encuentro->encuentro_intercultural;
                $expTrabajos = $encuentro->expo_trabajos;
                $expOral = $encuentro->exp_oral;
                $expEscrita = $encuentro->exp_escr_grafica;
                $partDocentes = $encuentro->part_docentes;
                $partFamilia = $encuentro->part_padres;
                
            }
            
            //echo '<pre>'.var_export($encuentro, true).'</pre>';

            $html .= '<tr>
                        <td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$value->amie.'</td>
                        <td style="border: 1px solid #000;font-weight:none;text-align:left;width:50%;">'.$value->nombre.'</td>';
                        if ($provincia) {
                            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$provincia->provincia.'</td>';
                        }else{
                            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;"> </td>';
                        }
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$visitasBiblioteca.'</td>';
            if (isset($encuentros) && $encuentros != null && $encuentros != 0) {
                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">SI</td>';
            }else{
                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">NO</td>';
            }

            if (isset($expTrabajos) && $expTrabajos != null && $expTrabajos != 0) {
                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">SI</td>';
            }else{
                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">NO</td>';
            }

            if (isset($expOral) && $expOral != null && $expOral != 0) {
                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">SI</td>';
            }else{
                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">NO</td>';
            }

            if (isset($expEscrita) && $expEscrita != null && $expEscrita != 0) {
                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">SI</td>';
            }else{
                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">NO</td>';
            }

            if (isset($partDocentes) && $partDocentes != null && $partDocentes != 0) {
                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">SI</td>';
            }else{
                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">NO</td>';
            }

            if (isset($partFamilia) && $partFamilia != null && $partFamilia != 0) {
                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">SI</td>';
            }else{
                $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">NO</td>';
            }
            
                            
            $html .= '</tr>';
            $totalVisitas += $visitasBiblioteca;
            $totalEncuentros += $encuentros;
            $totalTrabajos += $expTrabajos;
            $totalOral += $expOral;
            $totalEscrito += $expEscrita;
            $totalDocentes += $partDocentes;
            $totalFamilia += $partFamilia;
        }
        $html .= '<tr style="font-weight:bold;font-size:1.2em;color:blue;">';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;">TOTALES:</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:50%;">'.$totalInstituciones.' INSTITUCIONES</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;"> </td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalVisitas.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalEncuentros.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalTrabajos.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalOral.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalEscrito.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalDocentes.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalFamilia.'</td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '<br pagebreak="true"/>';
		
		//Generate HTML table data from MySQL - end
		// Print text using writeHTMLCell()
		// add a page
		$pdf->AddPage("L");
		
		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		
		// reset pointer to the last page
		$pdf->lastPage();

		//Close and output PDF document
		$pdf->Output("Reporte Biblioteca y encuentro-".$this->session->nombre.'.pdf', 'I');
	}

    public function reporte_info_arte() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;
        //echo $this->session->idusuario;
        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {

            //$data['componente_3'] = $this->prod3Model->_getAllRegistros();
            $data['centros'] = $this->usuariosCentrosProd3Model->_getAmiesProd3();
                
            //echo '<pre>'.var_export($data['centros'], true).'</pre>';exit;

            $this->RepModuloArte($data['centros']);

        }else{

            $this->logout();
        }
    }

    public function RepModuloArte($centros) {

		$pdf = new TCPDF();
		
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('https://appdvp.com');
		$pdf->SetTitle('Reporte');
		$pdf->SetSubject('Reporte Estadistico Módulos');
		//$pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, ' ', 'Reporte Estadistico Módulo Expresión Artística');

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
		$pdf->SetFont('helvetica', 'B', 8);

        $html = '<h2>Coordinador: '.$this->session->nombre.'</h2>';
        $html .= '<h4>Expresión artística - TALLERES (Cantidad de docentes que recibieron los talleres en cada institución)</h4>';

        $html .= '<table id="table-docentes" style="border: 1px solid #000;margin-bottom: 50px;margin-top 30px;font-size: 0.8em;">
            <tr>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d3eaf2;">AMIE</td>
                <td style="border: 1px solid #000;text-align:center;width:50%;background-color:#d3eaf2;">Centro Educativo</td>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d3eaf2;">Provincia</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Docente y Autoestima</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Arte y sus usos</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Creatividad</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Etapas de desarrollo artístico en los niños</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Clase de arte: Autorretrato</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Incluir el arte en nuestras clases</td>
            </tr>';
        $pdf->SetFont('helvetica', 'P', 8);

        $totalInstituciones = count($centros);
        $totalDocenteAutoestima = 0;
        $totalArteUsos = 0;
        $totalCreatividad = 0;
        $totalEtapas = 0;
        $totalClaseAutoretrato = 0;
        $totalArteEnClases = 0;

        foreach ($centros as $key => $value) {
            //variables
            $docentes = $this->prod3Model->_getRegistrosAmie($value->amie);
            $docenteAutoestima = 0;
            $arteUsos = 0;
            $creatividad = 0;
            $etapas = 0;
            $claseAutoretrato = 0;
            $arteEnClases = 0;


            $provincia = $this->centroEducativoModel->_getProvincia($value->amie);
            
            if ($docentes) {
                foreach ($docentes as $key => $docente) {
                    $talleres_arte_docente = $this->arteProd3Model->_getTalleresArte($docente->id);

                    $docenteAutoestima += $talleres_arte_docente['docente_autoestima'];
                    $arteUsos += $talleres_arte_docente['arte_usos'];
                    $creatividad += $talleres_arte_docente['creatividad'];
                    $etapas += $talleres_arte_docente['etapas'];
                    $claseAutoretrato += $talleres_arte_docente['autorretrato_taller'];
                    $arteEnClases += $talleres_arte_docente['incluir_clases'];
                    
                }
            }

            $html .= '<tr>
                        <td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$value->amie.'</td>
                        <td style="border: 1px solid #000;font-weight:none;text-align:left;width:50%;">'.$value->nombre.'</td>';
                        if ($provincia) {
                            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$provincia->provincia.'</td>';
                        }else{
                            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;"> </td>';
                        }
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$docenteAutoestima.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$arteUsos.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$creatividad.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$etapas.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$claseAutoretrato.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$arteEnClases.'</td>';
                            
            $html .= '</tr>';
            $totalDocenteAutoestima += $docenteAutoestima;
            $totalArteUsos += $arteUsos;
            $totalCreatividad += $creatividad;
            $totalEtapas += $etapas;
            $totalClaseAutoretrato += $claseAutoretrato;
            $totalArteEnClases += $arteEnClases;
        }
        $html .= '<tr style="font-weight:bold;font-size:1.2em;color:blue;">';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;">TOTALES:</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:50%;">'.$totalInstituciones.' INSTITUCIONES</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;"> </td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalDocenteAutoestima.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalArteUsos.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalCreatividad.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalEtapas.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalClaseAutoretrato.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalArteEnClases.'</td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '<br pagebreak="true"/>';
		
		//Generate HTML table data from MySQL - end
		// Print text using writeHTMLCell()
		// add a page
		$pdf->AddPage("L");

        $html .= '<h4>Expresión artística - CLASES (Cantidad de docentes que recibieron la clase demostrativa)</h4>';

        $html .= '<table id="table-docentes" style="border: 1px solid #000;margin-bottom: 50px;margin-top 30px;font-size: 0.8em;">
            <tr>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d2baf2;">AMIE</td>
                <td style="border: 1px solid #000;text-align:center;width:50%;background-color:#d2baf2;">Centro Educativo</td>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d2baf2;">Provincia</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d2baf2;">Autorretrato</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d2baf2;">Emociones</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d2baf2;">La familia</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d2baf2;">La camiseta</td>
            </tr>';
        $pdf->SetFont('helvetica', 'P', 8);

        $totalInstituciones = count($centros);
        $totalAutorretratoClase= 0;
        $totalEmociones = 0;
        $totalFamiliaClase = 0;
        $totalCamiseta = 0;

        foreach ($centros as $key => $value) {
            //variables
            $docentes = $this->prod3Model->_getRegistrosAmie($value->amie);
            $autorretratoClase = 0;
            $emociones = 0;
            $familiaClase= 0;
            $camiseta = 0;

            $provincia = $this->centroEducativoModel->_getProvincia($value->amie);
            
            if ($docentes) {
                foreach ($docentes as $key => $docente) {
                    $clases_arte_docente = $this->arteProd3Model->_getClasesArte($docente->id);

                    $autorretratoClase += $clases_arte_docente['autorretrato_clase'];
                    $emociones += $clases_arte_docente['emociones'];
                    $familiaClase += $clases_arte_docente['familia'];
                    $camiseta += $clases_arte_docente['camiseta'];
                }
            }

            $html .= '<tr>
                        <td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$value->amie.'</td>
                        <td style="border: 1px solid #000;font-weight:none;text-align:left;width:50%;">'.$value->nombre.'</td>';
                        if ($provincia) {
                            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$provincia->provincia.'</td>';
                        }else{
                            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;"> </td>';
                        }
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$autorretratoClase.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$emociones.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$familiaClase.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$camiseta.'</td>';
                            
            $html .= '</tr>';
            $totalInstituciones = count($centros);
            $totalAutorretratoClase += $autorretratoClase;
            $totalEmociones += $emociones;
            $totalFamiliaClase += $familiaClase;
            $totalCamiseta += $camiseta;
        }
        $html .= '<tr style="font-weight:bold;font-size:1.2em;color:blue;">';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;">TOTALES:</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:50%;">'.$totalInstituciones.' INSTITUCIONES</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;"> </td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalAutorretratoClase.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalEmociones.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalFamiliaClase.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalCamiseta.'</td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '<br pagebreak="true"/>';
		
		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		
		// reset pointer to the last page
		$pdf->lastPage();

		//Close and output PDF document
		$pdf->Output("Reporte estadistico Módulos-".$this->session->nombre.'.pdf', 'I');
	}

    public function reporte_info_lengua() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;
        //echo $this->session->idusuario;
        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {

            //$data['componente_3'] = $this->prod3Model->_getAllRegistros();
            $data['centros'] = $this->usuariosCentrosProd3Model->_getAmiesProd3();
                
            //echo '<pre>'.var_export($data['centros'], true).'</pre>';exit;

            $this->RepModuloLengua($data['centros']);

        }else{

            $this->logout();
        }
    }

    public function RepModuloLengua($centros) {

		$pdf = new TCPDF();
		
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('https://appdvp.com');
		$pdf->SetTitle('Reporte');
		$pdf->SetSubject('Reporte Estadistico Módulos');
		//$pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, ' ', 'Reporte Estadistico Módulo Lenguaje');

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
		$pdf->SetFont('helvetica', 'B', 8);

        $html = '<h2>Coordinador: '.$this->session->nombre.'</h2>';
        $html .= '<h4>Lenguaje - TALLERES (Cantidad de docentes que recibieron los talleres de lenguaje en cada institución)</h4>';

        $html .= '<table id="table-docentes" style="border: 1px solid #000;margin-bottom: 50px;margin-top 30px;font-size: 0.8em;">
            <tr>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d3eaf2;">AMIE</td>
                <td style="border: 1px solid #000;text-align:center;width:50%;background-color:#d3eaf2;">Centro Educativo</td>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d3eaf2;">Provincia</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Enfoque sociocultural para la enseñanza de la lectura y escritura</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Expresiones Dialectales</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Desarrollo de la expresión oral</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Comprensión Lectora</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Producción de textos</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Estrategias de producción de textos</td>
            </tr>';
        $pdf->SetFont('helvetica', 'P', 8);

        $totalInstituciones = count($centros);
        $totalEnfoque = 0;
        $totalExpresiones = 0;
        $totalDesarrollo = 0;
        $totalComprension = 0;
        $totalTextos = 0;
        $totalProdTextos = 0;

        foreach ($centros as $key => $value) {
            //variables
            $docentes = $this->prod3Model->_getRegistrosAmie($value->amie);
            $enfoque = 0;
            $expresiones = 0;
            $desarrollo = 0;
            $comprension = 0;
            $textos = 0;
            $prodTextos = 0;

            $provincia = $this->centroEducativoModel->_getProvincia($value->amie);
            
            if ($docentes) {
                foreach ($docentes as $key => $docente) {
                    $talleres = $this->lenguaProd3Model->_getTalleresLengua($docente->id);

                    $enfoque += $talleres['enfoque_sociocultural'];
                    $expresiones += $talleres['exp_dialectales'];
                    $desarrollo += $talleres['exp_oral'];
                    $comprension += $talleres['comp_lectora'];
                    $textos += $talleres['prod_textos'];
                    $prodTextos += $talleres['extrategia_prod_text'];
                }
            }

            $html .= '<tr>
                        <td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$value->amie.'</td>
                        <td style="border: 1px solid #000;font-weight:none;text-align:left;width:50%;">'.$value->nombre.'</td>';
                        if ($provincia) {
                            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$provincia->provincia.'</td>';
                        }else{
                            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;"> </td>';
                        }
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$enfoque.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$expresiones.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$desarrollo.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$comprension.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$textos.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$prodTextos.'</td>';
                            
            $html .= '</tr>';
            $totalEnfoque += $enfoque;
            $totalExpresiones += $expresiones;
            $totalDesarrollo += $desarrollo;
            $totalComprension += $comprension;
            $totalTextos += $textos;
            $totalProdTextos += $prodTextos;
        }
        $html .= '<tr style="font-weight:bold;font-size:1.2em;color:blue;">';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;">TOTALES:</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:50%;">'.$totalInstituciones.' INSTITUCIONES</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;"> </td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalEnfoque.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalExpresiones.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalDesarrollo.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalComprension.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalTextos.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalProdTextos.'</td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '<br pagebreak="true"/>';
		
		//Generate HTML table data from MySQL - end
		// Print text using writeHTMLCell()
		// add a page
		$pdf->AddPage("L");

        $html .= '<h4>Lenguaje - CLASES (Cantidad de docentes que recibieron la clase demostrativa)</h4>';

        $html .= '<table id="table-docentes" style="border: 1px solid #000;margin-bottom: 50px;margin-top 30px;font-size: 0.8em;">
            <tr>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d2baf2;">AMIE</td>
                <td style="border: 1px solid #000;text-align:center;width:45%;background-color:#d2baf2;">Centro Educativo</td>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d2baf2;">Provincia</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d2baf2;">Los zapatos</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d2baf2;">La noticia</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d2baf2;">La carta</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d2baf2;">La niña y la abeja</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d2baf2;">El cuento</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d2baf2;">Cuerdas</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d2baf2;">Los refranes</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d2baf2;">Juegos tradicionales</td>
            </tr>';
        $pdf->SetFont('helvetica', 'P', 8);

        $totalInstituciones = count($centros);
        $totalZapatos= 0;
        $totalNoticia = 0;
        $totalCarta = 0;
        $totalNinia = 0;
        $totalCuento = 0;
        $totalCuerdas = 0;
        $totalRefranes = 0;
        $totalJuegosTrad = 0;

        foreach ($centros as $key => $value) {
            //variables
            $docentes = $this->prod3Model->_getRegistrosAmie($value->amie);
            $zapatos= 0;
            $noticia = 0;
            $carta = 0;
            $ninia = 0;
            $cuento = 0;
            $cuerdas = 0;
            $refranes = 0;
            $juegosTrad = 0;

            $provincia = $this->centroEducativoModel->_getProvincia($value->amie);
            
            if ($docentes) {
                foreach ($docentes as $key => $docente) {
                    $clases = $this->lenguaProd3Model->_getClasesLengua($docente->id);
                    //echo '<pre>'.var_export($clases, true).'</pre>';exit;
                    if ($clases) {
                        $zapatos += $clases->zapatos;
                    $noticia += $clases->noticia;
                    $carta += $clases->carta;
                    $ninia += $clases->ninia_abeja;
                    $cuento += $clases->cuento;
                    $cuerdas += $clases->cuerdas;
                    $refranes += $clases->refranes;
                    $juegosTrad += $clases->juegos;
                    }
                    
                }
            }

            $html .= '<tr>
                        <td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$value->amie.'</td>
                        <td style="border: 1px solid #000;font-weight:none;text-align:left;width:45%;">'.$value->nombre.'</td>';
                        if ($provincia) {
                            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$provincia->provincia.'</td>';
                        }else{
                            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;"> </td>';
                        }
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$zapatos.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$noticia.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$carta.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$ninia.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$cuento.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$cuerdas.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$refranes.'</td>'; 
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$juegosTrad.'</td>';                           
            $html .= '</tr>';

            $totalInstituciones = count($centros);
            $totalZapatos += $zapatos;
            $totalNoticia += $noticia;
            $totalCarta += $carta;
            $totalNinia += $ninia;
            $totalCuento += $cuento;
            $totalCuerdas += $cuerdas;
            $totalRefranes += $refranes;
            $totalJuegosTrad += $juegosTrad;
        }
        $html .= '<tr style="font-weight:bold;font-size:1.2em;color:blue;">';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;">TOTALES:</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:45%;">'.$totalInstituciones.' INSTITUCIONES</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;"> </td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalZapatos.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalNoticia.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalCarta.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalNinia.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalCuento.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalCuerdas.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalRefranes.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalJuegosTrad.'</td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '<br pagebreak="true"/>';


        //$pdf->AddPage("L");

        $html .= '<h4>Lenguaje - CLASES (Cantidad de docentes que recibieron la clase demostrativa)</h4>';

        $html .= '<table id="table-docentes" style="border: 1px solid #000;margin-bottom: 50px;margin-top 30px;font-size: 0.8em;">
            <tr>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d2baf2;">AMIE</td>
                <td style="border: 1px solid #000;text-align:center;width:45%;background-color:#d2baf2;">Centro Educativo</td>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d2baf2;">Provincia</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d2baf2;">Los derechos humanos</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d2baf2;">El noticiero</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d2baf2;">El discurso</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d2baf2;">Influencers</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d2baf2;">Inferencias</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d2baf2;">El elefante</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d2baf2;">El pitch</td>
            </tr>';
        $pdf->SetFont('helvetica', 'P', 8);

        $totalInstituciones = count($centros);
        $totalDerechos = 0;
        $totalNoticiero = 0;
        $totalDiscurso = 0;
        $totalInfluencers = 0;
        $totalInferencias = 0;
        $totalElefante = 0;
        $totalPitch = 0;

        foreach ($centros as $key => $value) {
            //variables
            $docentes = $this->prod3Model->_getRegistrosAmie($value->amie);
            $derechos = 0;
            $noticiero = 0;
            $discurso = 0;
            $influencers = 0;
            $inferencias = 0;
            $elefante = 0;
            $pitch = 0;

            $provincia = $this->centroEducativoModel->_getProvincia($value->amie);
            
            if ($docentes) {
                foreach ($docentes as $key => $docente) {
                    $clases = $this->lenguaProd3Model->_getClasesLengua($docente->id);
                    //echo '<pre>'.var_export($clases, true).'</pre>';exit;
                    if ($clases) {
                        $derechos += $clases->derechos_humanos;
                        $noticiero += $clases->noticiero;
                        $discurso += $clases->discurso;
                        $influencers += $clases->influencers;
                        $inferencias += $clases->inferencias;
                        $elefante += $clases->elefante;
                        $pitch += $clases->pitch;
                    }
                    
                }
            }

            $html .= '<tr>
                        <td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$value->amie.'</td>
                        <td style="border: 1px solid #000;font-weight:none;text-align:left;width:45%;">'.$value->nombre.'</td>';
                        if ($provincia) {
                            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$provincia->provincia.'</td>';
                        }else{
                            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;"> </td>';
                        }
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$derechos.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$noticiero.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$discurso.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$influencers.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$inferencias.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$elefante.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$pitch.'</td>';                         
            $html .= '</tr>';

            $totalInstituciones = count($centros);
            $totalDerechos += $derechos;
            $totalNoticiero += $noticiero;
            $totalDiscurso += $discurso;
            $totalInfluencers += $influencers;
            $totalInferencias += $inferencias;
            $totalElefante += $elefante;
            $totalPitch += $pitch;
        }
        $html .= '<tr style="font-weight:bold;font-size:1.2em;color:blue;">';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;">TOTALES:</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:45%;">'.$totalInstituciones.' INSTITUCIONES</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;"> </td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalDerechos.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalNoticiero.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalDiscurso.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalInfluencers.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalInferencias.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalElefante.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalPitch.'</td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '<br pagebreak="true"/>';
		
		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		
		// reset pointer to the last page
		$pdf->lastPage();

		//Close and output PDF document
		$pdf->Output("Reporte estadistico Módulos-".$this->session->nombre.'.pdf', 'I');
	}

    public function reporte_info_ciudadania() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;
        //echo $this->session->idusuario;
        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {

            //$data['componente_3'] = $this->prod3Model->_getAllRegistros();
            $data['centros'] = $this->usuariosCentrosProd3Model->_getAmiesProd3();
                
            //echo '<pre>'.var_export($data['centros'], true).'</pre>';exit;

            $this->RepModuloCiudadania($data['centros']);

        }else{

            $this->logout();
        }
    }

    public function RepModuloCiudadania($centros) {

		$pdf = new TCPDF();
		
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('https://appdvp.com');
		$pdf->SetTitle('Reporte');
		$pdf->SetSubject('Reporte Estadistico Módulo Ciudadanía');
		//$pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, ' ', 'Reporte Estadistico Módulo Ciudadanía');

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
		$pdf->SetFont('helvetica', 'B', 8);

        $html = '<h2>Coordinador: '.$this->session->nombre.'</h2>';
        $html .= '<h4>Ciudadanía - TALLERES y CLASES (Cantidad de docentes que las recibieron)</h4>';

        $html .= '<table id="table-docentes" style="border: 1px solid #000;margin-bottom: 50px;margin-top 30px;font-size: 0.8em;">
            <tr>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d3eaf2;">AMIE</td>
                <td style="border: 1px solid #000;text-align:center;width:50%;background-color:#d3eaf2;">Centro Educativo</td>
                <td style="border: 1px solid #000;text-align:center;width:7%;background-color:#d3eaf2;">Provincia</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Ciudadanía y diversidad 1</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Ciudadanía y diversidad 2</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Diversidad de sexo / genéricas</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Violencias basadas en género y ciudadanía</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Diversidades estéticas</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d3eaf2;">Diversidades neurodivergentes y ciudadanía</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d2baf2;">La familia (clase)</td>
                <td style="border: 1px solid #000;text-align:center;width:5%;background-color:#d2baf2;">La camiseta (clase)</td>
            </tr>';
        $pdf->SetFont('helvetica', 'P', 8);

        $totalInstituciones = count($centros);
        $totalInterculturalidad  = 0;
        $totalMasculinidad  = 0;
        $totalSexo_genero  = 0;
        $totalViolencia_genero  = 0;
        $totalDiversidad_estetica  = 0;
        $totalDiversidad_neuro  = 0;
        $totalRacismoClase  = 0;
        $totalRechazoClase  = 0;

        foreach ($centros as $key => $value) {
            //variables
            $docentes = $this->prod3Model->_getRegistrosAmie($value->amie);
            $interculturalidad  = 0;
            $masculinidad  = 0;
            $sexo_genero = 0;
            $violencia_genero  = 0;
            $diversidad_estetica  = 0;
            $diversidad_neuro  = 0;
            $racismoClase = 0;
            $rechazoClase = 0;

            $provincia = $this->centroEducativoModel->_getProvincia($value->amie);
            
            if ($docentes) {
                foreach ($docentes as $key => $docente) {
                    $talleres = $this->ciudadProd3Model->_getTalleresCiudadania($docente->id);

                    if ($talleres) {
                        $interculturalidad += $talleres->interculturalidad;
                        $masculinidad += $talleres->masculinidad;
                        $sexo_genero += $talleres->sexo_genero;
                        $violencia_genero += $talleres->violencia_genero;
                        $diversidad_estetica += $talleres->diversidad_estetica;
                        $diversidad_neuro += $talleres->diversidad_neuro;
                        $racismoClase += $talleres->racismo_clase_ciu;
                        $rechazoClase += $talleres->rechazo_clase_ciu;
                    }
                }
            }

            $html .= '<tr>
                        <td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$value->amie.'</td>
                        <td style="border: 1px solid #000;font-weight:none;text-align:left;width:50%;">'.$value->nombre.'</td>';
                        if ($provincia) {
                            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;">'.$provincia->provincia.'</td>';
                        }else{
                            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:7%;"> </td>';
                        }
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$interculturalidad.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$masculinidad.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$sexo_genero.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$violencia_genero.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$diversidad_estetica.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$diversidad_neuro.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$racismoClase.'</td>';
            $html .= '<td style="border: 1px solid #000;font-weight:none;text-align:center;width:5%;">'.$rechazoClase.'</td>';
                            
            $html .= '</tr>';
            $totalInterculturalidad  += $interculturalidad;
            $totalMasculinidad  += $masculinidad;
            $totalSexo_genero  += $sexo_genero;
            $totalViolencia_genero  += $violencia_genero;
            $totalDiversidad_estetica  += $diversidad_estetica;
            $totalDiversidad_neuro  += $diversidad_neuro;
            $totalRacismoClase  += $racismoClase;
            $totalRechazoClase  += $rechazoClase;
        }
        $html .= '<tr style="font-weight:bold;font-size:1.2em;color:blue;">';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;">TOTALES:</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:50%;">'.$totalInstituciones.' INSTITUCIONES</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:7%;"> </td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalInterculturalidad.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalMasculinidad.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalSexo_genero.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalViolencia_genero.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalDiversidad_estetica.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalDiversidad_neuro.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalRacismoClase.'</td>';
        $html .= '<td style="border: 1px solid #000;text-align:center;width:5%;">'.$totalRechazoClase.'</td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '<br pagebreak="true"/>';
		
		//Generate HTML table data from MySQL - end
		// Print text using writeHTMLCell()
		// add a page
		$pdf->AddPage("L");

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		
		// reset pointer to the last page
		$pdf->lastPage();

		//Close and output PDF document
		$pdf->Output("Reporte estadistico Módulos-".$this->session->nombre.'.pdf', 'I');
	}
}
