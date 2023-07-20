<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use TCPDF;

class ReportesProd3 extends BaseController {

    public function index() {
        
    }

    public function prod3_reporte_certificados() {
        $data['idrol'] = $this->session->idrol;
        $data['id'] = $this->session->idusuario;
        $data['is_logged'] = $this->usuarioModel->_getLogStatus($data['id']);
        $data['nombre'] = $this->session->nombre;
        $data['componente_3'] = $this->session->componente_3;

        if ($data['is_logged'] == 1 && $data['componente_3'] == 1) {
            
            $data['componente_3'] = $this->prod3Model->_getMisRegistros($this->session->idusuario);
            $centros = $this->prod3Model->_getMisAmie($this->session->idusuario);

            $this->RepCertificadoPdf($data['componente_3'], $centros);

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
            $requisitos_certificado = $this->prod3CentroCertificadosModel->_getRequisitos($value->amie);
            //echo '<pre>'.var_export($requisitos_certificado, true).'</pre>';exit;
            $html .= '<h4>Centro: '.$value->nombre.'</h4>';

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

		
		//Generate HTML table data from MySQL - end
		// Print text using writeHTMLCell()
		// add a page
		$pdf->AddPage();
		
		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		
		// reset pointer to the last page
		$pdf->lastPage();

		//Close and output PDF document
		$pdf->Output("PDF de prueba-".md5(time()).'.pdf', 'I');
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
        
        return $talleres_arte + $talleres_lengua + $talleres_ciudad;
    }
}
