<main class="container">
    <div class="container-fluid px-4">
        <h3 class="mt-4"><?= esc($title).' - REPORTE DIAGNOSTICO'; ?></h3>
        <div class="card mb-8">
            <div class="card-body" id="card-reportes">
                <form action="<?php echo base_url().'/reporte-diagnostico-dinamico';?>" method="post">
                    <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <section>
                        <select name="provincia" id="provincia" class="form-select" style="width: 40%">
                            <option value="0">--Seleccionar provincia--</option>
                            <?php
                                
                                foreach ($provincias as $key => $value) {
                                    if ($value->idprovincias == $provincia) {
                                        echo '<option value="'.$value->idprovincias.'" selected>'.$value->provincia.'</option>';
                                    }else{
                                        echo '<option value="'.$value->idprovincias.'">'.$value->provincia.'</option>';
                                    }
                                    
                                }
                            ?>
                        </select>
                        <div id="ciudades" class="mt-3"> </div>
                        <button type="submit" class="btn btn-success">Generar reporte</button>
                    </section>
                    
                </form>
            </div>
            <div class="card-body" id="card-reportes"> 
                    
                <!-- Reporte -->
                <div class="contenedor mb-3 mt-3 col-md-9">
                    <table class="table table-bordered tabla-codigos-eval">
                        <thead>
                            <th id="codigo_0">Puntaje</th>
                            <th id="codigo_0">Nivel de logro de acuerdo con la edad</th>
                            <th id="codigo_0">Descriptor</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="codigo_1">0</td>
                                <td id="codigo_1">No aplica</td>
                                <td id="codigo_1">No corresponde a la enseñanza de acuerdo con la edad</td>
                            </tr>
                            <tr>
                                <td id="codigo_2">1 - 10</td>
                                <td id="codigo_2">Muy por debajo de lo esperado</td>
                                <td id="codigo_2">Falta de mediación escolar para la enseñanza de la escritura</td>
                            </tr>
                            <tr>
                                <td id="codigo_3">11 - 20</td>
                                <td id="codigo_3">Por debajo de lo esperado</td>
                                <td id="codigo_3">Mediación escolar no es básica para la enseñanza de la escritura de acuerdo con la edad</td>
                            </tr>
                            <tr>
                                <td id="codigo_4">21 - 25</td>
                                <td id="codigo_4">En proceso</td>
                                <td id="codigo_4">Mediación escolar es básica para la enseñanza de la escritura de acuerdo con la edad</td>
                            </tr>
                            <tr>
                                <td id="codigo_5">26</td>
                                <td id="codigo_5">Adecuado</td>
                                <td id="codigo_5">Mediación escolar es adecuada para la enseñanza de la escritura de acuerdo con la edad</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <section>
                <h4 style="text-align:center">ANALISIS DE LA PRUEBA DE DIAGNÓSTICO DOCENTE</h4>
                <h5 style="text-align:center"><?= $ciudad_obj['ciudad'].' - Nivel: '.$nivel; ?></h5>
                <div class="col-md-12" style="font-size:0.7em;text-align:center;">
                    <div class="contenedor mb-3 mt-3">
                        
                        <?php
                        
                            use App\Models\DiagnosticoDocenteP1Model;
                            use App\Models\DiagnosticoMyrpP1Model;
                            use App\Models\EvalMateP1Model;
                            use App\Models\EvalMateElementalP1Model;
                            use App\Models\EvalFinalP1Model;
                            use App\Models\EvalMateFinalP1Model;
                            use App\Models\EvalMateFinalElementalP1Model;
                            $this->evalMateP1 = new EvalMateP1Model();
                            $this->evalMateElemP1 = new EvalMateElementalP1Model();
                            $this->diagDocenteP1 = new DiagnosticoDocenteP1Model();
                            $this->diagMyrpP1 = new DiagnosticoMyrpP1Model();
                            $this->evalMateFinalP1 = new EvalMateFinalP1Model();
                            $this->evalMateFinalElemP1 = new EvalMateFinalElementalP1Model();
                            $this->evalFinalP1 = new EvalFinalP1Model();

                            $esc_a = 0;
                            $esc_b = 0;
                            $esc_c = 0;
                            $esc_d = 0;
                            $mate_a = 0;
                            $mate_b = 0;
                            $mate_c = 0;
                            $mate_d = 0;
                            $lect_a = 0;
                            $lect_b = 0;
                            $lect_c = 0;
                            $lect_d = 0;

                            $esc_myrp_a = 0;
                            $esc_myrp_b = 0;
                            $esc_myrp_c = 0;
                            $esc_myrp_d = 0;
                            $mate_myrp_a = 0;
                            $mate_myrp_b = 0;
                            $mate_myrp_c = 0;
                            $mate_myrp_d = 0;
                            $lect_myrp_a = 0;
                            $lect_myrp_b = 0;
                            $lect_myrp_c = 0;
                            $lect_myrp_d = 0;
                            
                            $total_mate = 0;
                            $total_mate_bajo20 = 0;
                            $total_mate_elem_bajo20 = 0;
                            $total_esc_bajo20 = 0;
                            $total_lec_bajo20 = 0;
                            $total_esc = 0;
                            $total_lec = 0;
                            if ($registros > 0) {
                                $total_registros = count($registros);
                            }else{
                                $total_registros = 0;
                            }
                            
                            $num = 0;
                            $num_diag = 0;
                            $num_diag_myrp = 0;
                            if ($registros != NULL && isset($registros)) {
                                foreach ($registros as $key => $value) {
                                    $diag_docente = $this->diagDocenteP1->_getDiagDocente($value->id);
                                    $diag_myrp = $this->diagMyrpP1->_getDiagMyrpP1($value->id);
                                    
                                        if (isset($diag_docente) && $diag_docente != NULL) {
                                            $num_diag++;
                                            //Diagnóstico docente
                                            if ($diag_docente->lectura == 'SI') {
                                                $lect_a++;
                                            }else{
                                                $lect_d++;
                                            }

                                            if ($diag_docente->escritura == 'SI') {
                                                $esc_a++;
                                            }else{
                                                $esc_d++;
                                            }
                                            
                                            if ($diag_docente->matematica == 'SI') {
                                                $mate_a++;
                                            }else{
                                                $mate_d++;
                                            }
                                            
                                        }

                                        //DIAGNOSTICO MYRP
                                        //Eval final de lectura y escritura
                                        
                                        if (isset($diag_myrp) && $diag_myrp != NULL) {
                                            $num_diag_myrp++;
                                            $valor_lectura = 0;
                                            $valor_escritura = 0;
                                            
                                            if ($diag_myrp->p1_comprension_lectora == 'A') {
                                                $valor_lectura += 0;
                                                $lect_myrp_a++;
                                            }else if($diag_myrp->p1_comprension_lectora == 'B'){
                                                $valor_lectura += 1;
                                                $lect_myrp_b++;
                                            }
                                            
                                            if ($diag_myrp->p2_comprension_lectora == 'A') {
                                                $valor_lectura += 0;
                                                $lect_myrp_a++;
                                            }else if($diag_myrp->p2_comprension_lectora == 'B'){
                                                $valor_lectura += 1;
                                                $lect_myrp_b++;
                                            }
                                            
                                            if ($diag_myrp->p3_comprension_lectora == 'A') {
                                                $valor_lectura += 0;
                                                $lect_myrp_a++;
                                            }else if($diag_myrp->p3_comprension_lectora == 'B'){
                                                $valor_lectura += 1;
                                                $lect_myrp_b++;
                                            }else if($diag_myrp->p3_comprension_lectora == 'C'){
                                                $valor_lectura += 2;
                                                $lect_myrp_c++;
                                            }
                                            
                                            if ($diag_myrp->p4_comprension_lectora == 'A') {
                                                $valor_lectura += 0;
                                                $lect_myrp_a++;
                                            }else if($diag_myrp->p4_comprension_lectora == 'B'){
                                                $valor_lectura += 1;
                                                $lect_myrp_b++;
                                            }else if($diag_myrp->p4_comprension_lectora == 'C'){
                                                $valor_lectura += 2;
                                                $lect_myrp_c++;
                                            }
                                            
                                            if ($diag_myrp->necesito_apoyo == 'SI') {
                                                if ($valor_lectura <= 2) {
                                                    $lect_myrp_a++;
                                                    $total_lec_bajo20++;
                                                }else if($valor_lectura > 2 && $valor_lectura <= 5){
                                                    $lect_myrp_a++;
                                                    $total_lec_bajo20++;
                                                }else if($valor_lectura > 5 && $valor_lectura <= 7){
                                                    $lect_myrp_a++;
                                                    $total_lec_bajo20++;
                                                }else{
                                                    $lect_myrp_a++;
                                                    $total_lec_bajo20++;
                                                }
                                                
                                            }else{
                                                if ($valor_lectura <= 2) {
                                                    $lect_myrp_c++;
                                                }else if($valor_lectura > 2 && $valor_lectura <= 5){
                                                    $lect_myrp_c++;
                                                }else if($valor_lectura > 5 && $valor_lectura <= 7){
                                                    $lect_myrp_c++;
                                                }else{
                                                    $lect_myrp_c++;
                                                }
                                                
                                            }
                                            $total_lec += $valor_lectura;
                                            
                                            //Diagnóstico MYRP Escritura
                                            //Cálculo el valor de Escritura
                                            if ($diag_myrp->p1_inteligibilidad == 'A') {
                                                $valor_escritura += 0;
                                                $esc_myrp_a++;
                                            }else if($diag_myrp->p1_inteligibilidad == 'B'){
                                                $valor_escritura += 1;
                                                $esc_myrp_b++;
                                            }else{
                                                $valor_escritura += 0;
                                                $esc_myrp_a++;
                                            }
                                            
                                            if ($diag_myrp->p3_inteligibilidad == 'A') {
                                                $valor_escritura += 0;
                                                $esc_myrp_a++;
                                            }else if($diag_myrp->p3_inteligibilidad == 'B'){
                                                $valor_escritura += 1;
                                                $esc_myrp_b++;
                                            }else if($diag_myrp->p3_inteligibilidad == 'C'){
                                                $valor_escritura += 2;
                                                $esc_myrp_c++;
                                            }else{
                                                $valor_escritura += 0;
                                                $esc_myrp_a++;
                                            }
                                            
                                            if ($diag_myrp->p3_coherencia == 'A') {
                                                $valor_escritura += 0;
                                                $esc_myrp_a++;
                                            }else if($diag_myrp->p3_coherencia == 'B'){
                                                $valor_escritura += 1;
                                                $esc_myrp_b++;
                                            }else if($diag_myrp->p3_coherencia == 'C'){
                                                $valor_escritura += 2;
                                                $esc_myrp_c++;
                                            }else if($diag_myrp->p3_coherencia == 'D'){
                                                $valor_escritura += 3;
                                                $esc_myrp_d++;
                                            }else{
                                                $valor_escritura += 0;
                                                $esc_myrp_a++;
                                            }
                                            
                                            if ($diag_myrp->p3_sintaxis == 'A') {
                                                $valor_escritura += 0;
                                                $esc_myrp_a++;
                                            }else if($diag_myrp->p3_sintaxis == 'B'){
                                                $valor_escritura += 1;
                                                $esc_myrp_b++;
                                            }else if($diag_myrp->p3_sintaxis == 'C'){
                                                $valor_escritura += 2;
                                                $esc_myrp_c++;
                                            }else if($diag_myrp->p3_sintaxis == 'D'){
                                                $valor_escritura += 3;
                                                $esc_myrp_d++;
                                            }else{
                                                $valor_escritura += 0;
                                                $esc_myrp_a++;
                                            }
                                            
                                            if ($diag_myrp->p3_estandares_egb_sub2y3 == 'A') {
                                                $valor_escritura += 0;
                                                $esc_myrp_a++;
                                            }else if($diag_myrp->p3_estandares_egb_sub2y3 == 'B'){
                                                $valor_escritura += 1;
                                                $esc_myrp_b++;                                                
                                            }else{
                                                $valor_escritura += 0;
                                                $esc_myrp_a++;
                                            }
                                            
                                            if ($diag_myrp->p4_inteligibilidad == 'A') {
                                                $valor_escritura += 0;
                                                $esc_myrp_c++;
                                            }else if($diag_myrp->p4_inteligibilidad == 'B'){
                                                $valor_escritura += 1;
                                                $esc_myrp_d++;
                                            }else{
                                                $valor_escritura += 0;
                                                $esc_myrp_a++;
                                            }

                                            if ($diag_myrp->p4_coherencia == 'A') {
                                                $valor_escritura += 0;
                                                $esc_myrp_a++;
                                            }else if($diag_myrp->p4_coherencia == 'B'){
                                                $valor_escritura += 1;
                                                $esc_myrp_b++;
                                            }else if($diag_myrp->p4_coherencia == 'C'){
                                                $valor_escritura += 2;
                                                $esc_myrp_c++;
                                            }else if($diag_myrp->p4_coherencia == 'D'){
                                                $valor_escritura += 3;
                                                $esc_myrp_d++;
                                            }else{
                                                $valor_escritura += 0;
                                                $esc_myrp_a++;
                                            }

                                            if ($diag_myrp->p4_sintaxis == 'A') {
                                                $valor_escritura += 0;
                                                $esc_myrp_a++;
                                            }else if($diag_myrp->p4_sintaxis == 'B'){
                                                $valor_escritura += 1;
                                                $esc_myrp_b++;
                                            }else if($diag_myrp->p4_sintaxis == 'C'){
                                                $valor_escritura += 2;
                                                $esc_myrp_c++;
                                            }else if($diag_myrp->p4_sintaxis == 'D'){
                                                $valor_escritura += 3;
                                                $esc_myrp_d++;
                                            }else{
                                                $valor_escritura += 0;
                                                $esc_myrp_a++;
                                            }

                                            if ($diag_myrp->p4_estandares_egb_sub2y3 == 'A') {
                                                $valor_escritura += 0;
                                                $esc_myrp_a++;
                                            }else if($diag_myrp->p4_estandares_egb_sub2y3 == 'B'){
                                                $valor_escritura += 1;
                                                $esc_myrp_b++;
                                            }else{
                                                $valor_escritura += 0;
                                                $esc_myrp_a++;
                                            }

                                            $total_esc += $valor_escritura;
                                            
                                            //$rango_escritura = ($valor_escritura * 100) / 26;
                                            
                                            if ($valor_escritura <= 10) {
                                                $total_esc_bajo20++;
                                            }else if($valor_escritura > 10 && $valor_escritura <= 20){
                                                $total_esc_bajo20++;
                                            }else if($valor_escritura > 20 && $valor_escritura <= 26){
                                            }else if($valor_escritura > 26){
                                            }
                                            
                                        }
                                        //Cálculo el valor de Matemática
                                        $superior = $this->evalMateP1->_getEvalMateP1($value->id);
                                        //echo $this->db->getLastQuery();
                                        $elemental = $this->evalMateElemP1->_getEvalMateElementalP1($value->id);
                                        //echo '<pre>'.var_export($elemental, true).'</pre><br>';
                                        $valor_matematica = 0;

                                        if(isset($elemental) && $elemental != NULL) {
                                            $valor_matematica = $this->evalMateElemP1->_getEvalMateElementalP1($value->id);
                                            
                                            $total_mate += $valor_matematica;
                                            //$rango_mate = ($valor_matematica * 100) / 20;

                                            if ($valor_matematica <= 10) {
                                                $mate_myrp_a++;
                                                $total_mate_elem_bajo20++;
                                            }else if($valor_matematica > 10 && $valor_matematica <= 20){
                                                $mate_myrp_b++;
                                                $total_mate_elem_bajo20++;
                                            }else if($valor_matematica > 20 && $valor_matematica <= 26){
                                                $mate_myrp_c++;
                                            }else if($valor_matematica > 26){
                                                $mate_myrp_d++;
                                            }
                                        }

                                        if (isset($superior) && $superior != NULL) {
                                            $valor_matematica_sup = $this->evalMateP1->_getEvalMateP1($value->id);
                                            $total_mate += $valor_matematica_sup;
                                            //$rango_mate_sup = ($valor_matematica_sup * 100) / 20;

                                            if ($valor_matematica_sup <= 10) {
                                                $mate_myrp_a++;
                                                $total_mate_bajo20++;
                                            }else if($valor_matematica_sup > 10 && $valor_matematica_sup <= 20){
                                                $mate_myrp_b++;
                                                $total_mate_bajo20++;
                                            }else if($valor_matematica_sup > 20 && $valor_matematica_sup <= 26){
                                                $mate_myrp_c++;
                                            }else if($valor_matematica_sup > 26){
                                                $mate_myrp_d++;
                                            }
                                        }

                                    $num++;
                                }
                            }
                            
                        ?>
                    </div>
                </div>
                <?php
                    
                    $total_dificultades_lect = $lect_a;
                    $total_dificultades_esc = $esc_a;
                    $total_dificultades_mate = $mate_a;
                    
                    if ($num_diag > 0) {
                        $porcentaje_dificultades_lec = number_format(($total_dificultades_lect*100)/$num_diag);
                        $porcentaje_sin_dificultades_lec = 100 - $porcentaje_dificultades_lec;

                        $porcentaje_dificultades_esc = number_format(($total_dificultades_esc*100)/$num_diag);
                        $porcentaje_sin_dificultades_esc = 100 - $porcentaje_dificultades_esc;

                        $porcentaje_dificultades_mate = number_format(($total_dificultades_mate*100)/$num_diag);
                        $porcentaje_sin_dificultades_mate = 100 - $porcentaje_dificultades_mate;

                        //Dificultades encontradas por docentes LECTURA
                        $etiquetas = ["% Tiene problemas", "% No tiene problemas"];
                        
                        $datosGrafica_lec_doc[0] = $porcentaje_dificultades_lec;
                        $datosGrafica_lec_doc[1] = $porcentaje_sin_dificultades_lec;

                        $datosGrafica_esc_doc[0] = $porcentaje_dificultades_esc;
                        $datosGrafica_esc_doc[1] = $porcentaje_sin_dificultades_esc;

                        $datosGrafica_mate_doc[0] = $porcentaje_dificultades_mate;
                        $datosGrafica_mate_doc[1] = $porcentaje_sin_dificultades_mate;

                        $respuesta_lect_doc = [
                            "etiquetas" => $etiquetas,
                            "datos" => $datosGrafica_lec_doc,
                            "total" => $num_diag,
                        ];
    
                        $respuesta_esc_doc = [
                            "etiquetas" => $etiquetas,
                            "datos" => $datosGrafica_esc_doc,
                            "total" => $num_diag,
                        ];
    
                        $respuesta_mate_doc = [
                            "etiquetas" => $etiquetas,
                            "datos" => $datosGrafica_mate_doc,
                            "total" => $num_diag,
                        ];
    
                        //Lectura
                        if ($num != 0) {
                            if (($total_dificultades_lect*100)/$num > 0 && ($total_dificultades_lect*100)/$num <= 25) {
                                $respuesta_lect_doc['color_lectura_problemas'] = 'rgba(232, 247, 225, 1)';
                            }else if(($total_dificultades_lect*100)/$num > 25 && ($total_dificultades_lect*100)/$num <= 50){
                                $respuesta_lect_doc['color_lectura_problemas'] = 'rgba(241, 245, 213, 1)';
                            }else if(($total_dificultades_lect*100)/$num > 50 && ($total_dificultades_lect*100)/$num <= 75){
                                $respuesta_lect_doc['color_lectura_problemas'] = 'rgba(245, 213, 217, 1)';
                            }else if(($total_dificultades_lect*100)/$num > 75){
                                $respuesta_lect_doc['color_lectura_problemas'] = 'rgba(252, 101, 109, 1)';
                            }else{
                                $respuesta_lect_doc['color_lectura_problemas'] = 'rgba(255, 255, 255, 1)';
                            }
                            $respuesta_lect_doc['color_lectura_sin_problemas'] = 'rgba(241, 245, 213, 1)';
                        }
    
                        //ESCRITURA
                        if ($num != 0) {
                            if (($total_dificultades_esc*100)/$num > 0 && ($total_dificultades_esc*100)/$num <= 25) {
                                $respuesta_esc_doc['color_esc_problemas'] = 'rgba(232, 247, 225, 1)';
                            }else if(($total_dificultades_esc*100)/$num > 25 && ($total_dificultades_esc*100)/$num <= 50){
                                $respuesta_esc_doc['color_esc_problemas'] = 'rgba(241, 245, 213, 1)';
                            }else if(($total_dificultades_esc*100)/$num > 50 && ($total_dificultades_esc*100)/$num <= 75){
                                $respuesta_esc_doc['color_esc_problemas'] = 'rgba(245, 213, 217, 1)';
                            }else if(($total_dificultades_esc*100)/$num > 75){
                                $respuesta_esc_doc['color_esc_problemas'] = 'rgba(252, 101, 109, 1)';
                            }else{
                                $respuesta_esc_doc['color_esc_problemas'] = 'rgba(255, 255, 255, 1)';
                            }
                            $respuesta_esc_doc['color_esc_sin_problemas'] = 'rgba(241, 245, 213, 1)';
                        }
    
                        //MATEMATICAS
                        if ($num != 0) {
                            if (($total_dificultades_mate*100)/$num > 0 && ($total_dificultades_mate*100)/$num <= 25) {
                                $respuesta_mate_doc['color_mate_problemas'] = 'rgba(232, 247, 225, 1)';
                            }else if(($total_dificultades_mate*100)/$num > 25 && ($total_dificultades_mate*100)/$num <= 50){
                                $respuesta_mate_doc['color_mate_problemas'] = 'rgba(241, 245, 213, 1)';
                            }else if(($total_dificultades_mate*100)/$num > 50 && ($total_dificultades_mate*100)/$num <= 75){
                                $respuesta_mate_doc['color_mate_problemas'] = 'rgba(245, 213, 217, 1)';
                            }else if(($total_dificultades_mate*100)/$num > 75){
                                $respuesta_mate_doc['color_mate_problemas'] = 'rgba(252, 101, 109, 1)';
                            }else{
                                $respuesta_mate_doc['color_mate_problemas'] = 'rgba(255, 255, 255, 1)';
                            }
                            $respuesta_mate_doc['color_mate_sin_problemas'] = 'rgba(241, 245, 213, 1)';
                        }

                        $chart_data_lect_doc =  json_encode($respuesta_lect_doc); 
                        $chart_data_esc_doc =  json_encode($respuesta_esc_doc); 
                        $chart_data_mate_doc =  json_encode($respuesta_mate_doc); 

                        /********* MYRP *********/
                        //Dificultades de aprendizaje encontradas a partir de los diagnósticos aplicados MYRP
                        $total_dificultades_lect_myrp = $total_lec_bajo20;
                        $total_dificultades_esc_myrp = $total_esc_bajo20;


                        if ($total_mate_bajo20 > 0 && $total_mate_elem_bajo20 > 0) {
                            $total_dificultades_mate_myrp = ($total_mate_bajo20 + $total_mate_elem_bajo20)/2;
                        }elseif ($total_mate_bajo20 <= 0) {
                            $total_dificultades_mate_myrp = $total_mate_elem_bajo20;
                        }else{
                            $total_dificultades_mate_myrp = $total_mate_bajo20;
                        }


                        $porcentaje_dificultades_lec_myrp = number_format(($total_dificultades_lect_myrp*100)/$num_diag_myrp);
                        $porcentaje_sin_dificultades_lec_myrp = 100 - $porcentaje_dificultades_lec_myrp;

                        $porcentaje_dificultades_esc_myrp = number_format(($total_dificultades_esc_myrp*100)/$num_diag_myrp);
                        $porcentaje_sin_dificultades_esc_myrp = 100 - $porcentaje_dificultades_esc_myrp;

                        $porcentaje_dificultades_mate_myrp = number_format(($total_dificultades_mate_myrp*100)/$num_diag_myrp);
                        $porcentaje_sin_dificultades_mate_myrp = 100 - $porcentaje_dificultades_mate_myrp;


                        $datosGrafica_lec_myrp[0] = $porcentaje_dificultades_lec_myrp;
                        $datosGrafica_lec_myrp[1] = $porcentaje_sin_dificultades_lec_myrp;

                        $datosGrafica_esc_myrp[0] = $porcentaje_dificultades_esc_myrp;
                        $datosGrafica_esc_myrp[1] = $porcentaje_sin_dificultades_esc_myrp;

                        $datosGrafica_mate_myrp[0] = $porcentaje_dificultades_mate_myrp;
                        $datosGrafica_mate_myrp[1] = $porcentaje_sin_dificultades_mate_myrp;

                        $respuesta_lect_myrp = [
                            "etiquetas" => $etiquetas,
                            "datos" => $datosGrafica_lec_myrp,
                            "total" => $num_diag_myrp,
                        ];

                        $respuesta_esc_myrp = [
                            "etiquetas" => $etiquetas,
                            "datos" => $datosGrafica_esc_myrp,
                            "total" => $num_diag_myrp,
                        ];

                        $respuesta_mate_myrp = [
                            "etiquetas" => $etiquetas,
                            "datos" => $datosGrafica_mate_myrp,
                            "total" => $num_diag_myrp,
                        ];

                        //Lectura
                        if ($num != 0) {
                            if (($porcentaje_dificultades_lec_myrp*100)/$num > 0 && ($porcentaje_dificultades_lec_myrp*100)/$num <= 25) {
                                $respuesta_lect_myrp['color_lectura_problemas'] = 'rgba(232, 247, 225, 1)';
                            }else if(($porcentaje_dificultades_lec_myrp*100)/$num > 25 && ($porcentaje_dificultades_lec_myrp*100)/$num <= 50){
                                $respuesta_lect_myrp['color_lectura_problemas'] = 'rgba(241, 245, 213, 1)';
                            }else if(($porcentaje_dificultades_lec_myrp*100)/$num > 50 && ($porcentaje_dificultades_lec_myrp*100)/$num <= 75){
                                $respuesta_lect_myrp['color_lectura_problemas'] = 'rgba(245, 213, 217, 1)';
                            }else if(($porcentaje_dificultades_lec_myrp*100)/$num > 75){
                                $respuesta_lect_myrp['color_lectura_problemas'] = 'rgba(252, 101, 109, 1)';
                            }else{
                                $respuesta_lect_myrp['color_lectura_problemas'] = 'rgba(255, 255, 255, 1)';
                            }
                            $respuesta_lect_myrp['color_lectura_sin_problemas'] = 'rgba(241, 245, 213, 1)';
                        }

                        //ESCRITURA
                        if ($num != 0) {
                            if (($porcentaje_dificultades_esc_myrp*100)/$num > 0 && ($porcentaje_dificultades_esc_myrp*100)/$num <= 25) {
                                $respuesta_esc_myrp['color_esc_problemas'] = 'rgba(232, 247, 225, 1)';
                            }else if(($porcentaje_dificultades_esc_myrp*100)/$num > 25 && ($porcentaje_dificultades_esc_myrp*100)/$num <= 50){
                                $respuesta_esc_myrp['color_esc_problemas'] = 'rgba(241, 245, 213, 1)';
                            }else if(($porcentaje_dificultades_esc_myrp*100)/$num > 50 && ($porcentaje_dificultades_esc_myrp*100)/$num <= 75){
                                $respuesta_esc_myrp['color_esc_problemas'] = 'rgba(245, 213, 217, 1)';
                            }else if(($porcentaje_dificultades_esc_myrp*100)/$num > 75){
                                $respuesta_esc_myrp['color_esc_problemas'] = 'rgba(252, 101, 109, 1)';
                            }else{
                                $respuesta_esc_myrp['color_esc_problemas'] = 'rgba(255, 255, 255, 1)';
                            }
                            $respuesta_esc_myrp['color_esc_sin_problemas'] = 'rgba(241, 245, 213, 1)';
                        }

                        //MATEMATICAS
                        if ($num != 0) {
                            if (($porcentaje_dificultades_mate_myrp*100)/$num > 0 && ($porcentaje_dificultades_mate_myrp*100)/$num <= 25) {
                                $respuesta_mate_myrp['color_mate_problemas'] = 'rgba(232, 247, 225, 1)';
                            }else if(($porcentaje_dificultades_mate_myrp*100)/$num > 25 && ($porcentaje_dificultades_mate_myrp*100)/$num <= 50){
                                $respuesta_mate_myrp['color_mate_problemas'] = 'rgba(241, 245, 213, 1)';
                            }else if(($porcentaje_dificultades_mate_myrp*100)/$num > 50 && ($porcentaje_dificultades_mate_myrp*100)/$num <= 75){
                                $respuesta_mate_myrp['color_mate_problemas'] = 'rgba(245, 213, 217, 1)';
                            }else if(($porcentaje_dificultades_mate_myrp*100)/$num > 75){
                                $respuesta_mate_myrp['color_mate_problemas'] = 'rgba(252, 101, 109, 1)';
                            }else{
                                $respuesta_mate_myrp['color_mate_problemas'] = 'rgba(255, 255, 255, 1)';
                            }
                            $respuesta_mate_myrp['color_mate_sin_problemas'] = 'rgba(241, 245, 213, 1)';
                        }

                        $chart_data_lect_myrp =  json_encode($respuesta_lect_myrp); 
                        $chart_data_esc_myrp =  json_encode($respuesta_esc_myrp); 
                        $chart_data_mate_myrp =  json_encode($respuesta_mate_myrp); 



                    }else{
                        $chart_data_lect_doc =  json_encode(0); 
                        $chart_data_esc_doc =  json_encode(0); 
                        $chart_data_mate_doc =  json_encode(0); 

                        $chart_data_lect_myrp =  json_encode(0); 
                        $chart_data_esc_myrp =  json_encode(0); 
                        $chart_data_mate_myrp =  json_encode(0); 
                    }    
                ?>
            <div class="row">
                <div class="col-md-6"><canvas id="chartLecturaDocemnte"></canvas></div>
                <div class="col-md-6"><canvas id="chartEscrituraDocemnte"></canvas></div>
            </div>
            <div class="row">
                <div class="col-md-6"><canvas id="chartMateDocemnte"></canvas></div>
            </div>
        </section>                   
        <section>
            <h4 style="text-align:center;background-color:#B3C8B3">ANALISIS DE LA PRUEBA DE DIAGNÓSTICO MYRP</h4>
            <div class="row">
                <div class="col-md-6"><canvas id="chartLecturaMyrp"></canvas></div>
                <div class="col-md-6"><canvas id="chartEscrituraMyrp"></canvas></div>
            </div>
            <div class="row">
                <div class="col-md-6"><canvas id="chartMateMyrp"></canvas></div>
            </div>
        </section>
        <section>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered " style="text-align:center;">
                        <thead>
                            <th>TOTAL</th>
                            <th>CANT NIÑOS</th>
                            <th>CANT NIÑAS</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $total; ?></td>
                                <td><?= $masculino; ?></td>
                                <td><?= $femenino; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- <section>
            <div class="row">
                <div class="col-md-12">
                    <h4 style="text-align:center;background-color:#B3C8B3">EDADES</h4>
                    <table class="table table-striped table-bordered " style="text-align:center;">
                        <thead>
                            <th>EDAD</th>
                            <th>CANT ESTUDIANTES</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </section> -->
        </div>
    </div>      
</main>

<script>

    $(document).ready(function(){
        $("#provincia").change(function(){
            if($("#provincia").val() !=""){
                valor = $("#provincia").val();
                $.ajax({
                    type:"POST",
                    dataType:"html",
                    url: "<?php echo site_url(); ?>reportes/ciudades_select",
                    data:"idprovincia="+valor,
                    beforeSend: function (f) {
                        $('#ciudades').html('Cargando ...');
                    },
                    success: function(data){
                        $('#ciudades').html(data);
                    }
                });
            }
        })
    })

</script>
<script>
    //LECTURA MYRP
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $chart_data_lect_myrp; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('chartLecturaMyrp').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Porcentaje de estudiantes con dificultades en lectura',
                data: cData.datos,
                backgroundColor: [
                    //Tiene problemas
                    cData.color_lectura_problemas,

                    //No tiene Problemas
                    cData.color_lectura_sin_problemas,

                ],
                borderColor: [
                'rgb(118, 168, 134)',
                ],
                borderWidth: 1
            }
        ]
        },
        plugins: [ChartDataLabels],
        options: {
            scales:{
                aspectRatio: 1,
                y:[{
                    ticks:{
                        beginAtZero:true
                    }
                }],
                x: {
                    max: 600
                },
                y: {
                    min: 0,
                    max: 100
                }
            },
            plugins: {
                // Change options for ALL labels of THIS CHART
                datalabels: {
                    color: '#000000',
                    anchor: "center",
                    formatter: (dato) => dato + "%",
                    color: "black",
                    font: {
                        family: '"Times New Roman", Times, serif',
                        size: "12",
                        weight: "bold",
                    },
                    
                    /* Formato de la caja contenedora */
                    //padding: "4",
                    //borderWidth: 2,
                    //borderColor: "darkblue",
                    //borderRadius: 8,
                    //backgroundColor: "lightblue"
                },
                title: {
                    display: true,
                    text: "Dificultades encontradas por docentes por debajo de lo esperado en Lectura"
                }
            }
        }
    });

    //ESCRITURA MYRP
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $chart_data_esc_myrp; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('chartEscrituraMyrp').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Porcentaje de estudiantes con dificultades en Escritura',
                data: cData.datos,
                backgroundColor: [
                    //Tiene problemas
                    cData.color_esc_problemas,

                    //No tiene Problemas
                    cData.color_esc_sin_problemas,

                ],
                borderColor: [
                'rgb(118, 168, 134)',
                ],
                borderWidth: 1
            }
        ]
        },
        plugins: [ChartDataLabels],
        options: {
            scales:{
                aspectRatio: 1,
                y:[{
                    ticks:{
                        beginAtZero:true
                    }
                }],
                x: {
                    max: 600
                },
                y: {
                    min: 0,
                    max: 100
                }
            },
            plugins: {
                // Change options for ALL labels of THIS CHART
                datalabels: {
                    color: '#000000',
                    anchor: "center",
                    formatter: (dato) => dato + "%",
                    color: "black",
                    font: {
                        family: '"Times New Roman", Times, serif',
                        size: "12",
                        weight: "bold",
                    },
                    
                    /* Formato de la caja contenedora */
                    //padding: "4",
                    //borderWidth: 2,
                    //borderColor: "darkblue",
                    //borderRadius: 8,
                    //backgroundColor: "lightblue"
                },
                title: {
                    display: true,
                    text: "Dificultades encontradas por docentes por debajo de lo esperado en Escritura"
                }
            }
        }
    });

    //MATEMATICA MYRP
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $chart_data_mate_myrp; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('chartMateMyrp').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Porcentaje de estudiantes con dificultades en Matemáticas',
                data: cData.datos,
                backgroundColor: [
                    //Tiene problemas
                    cData.color_mate_problemas,

                    //No tiene Problemas
                    cData.color_mate_sin_problemas,

                ],
                borderColor: [
                'rgb(118, 168, 134)',
                ],
                borderWidth: 1
            }
        ]
        },
        plugins: [ChartDataLabels],
        options: {
            scales:{
                aspectRatio: 1,
                y:[{
                    ticks:{
                        beginAtZero:true
                    }
                }],
                x: {
                    max: 600
                },
                y: {
                    min: 0,
                    max: 100
                }
            },
            plugins: {
                // Change options for ALL labels of THIS CHART
                datalabels: {
                    color: '#000000',
                    anchor: "center",
                    formatter: (dato) => dato + "%",
                    color: "black",
                    font: {
                        family: '"Times New Roman", Times, serif',
                        size: "12",
                        weight: "bold",
                    },
                    
                    /* Formato de la caja contenedora */
                    //padding: "4",
                    //borderWidth: 2,
                    //borderColor: "darkblue",
                    //borderRadius: 8,
                    //backgroundColor: "lightblue"
                },
                title: {
                    display: true,
                    text: "Dificultades encontradas por docentes por debajo de lo esperado en Matemáticas"
                }
            }
        }
    });

    

</script>
<script>
    //LECTURA DOCENTE
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $chart_data_lect_doc; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('chartLecturaDocemnte').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Porcentaje de estudiantes con dificultades en lectura',
                data: cData.datos,
                backgroundColor: [
                    //Tiene problemas
                    cData.color_lectura_problemas,

                    //No tiene Problemas
                    cData.color_lectura_sin_problemas,

                ],
                borderColor: [
                'rgb(118, 168, 134)',
                ],
                borderWidth: 1
            }
        ]
        },
        plugins: [ChartDataLabels],
        options: {
            scales:{
                aspectRatio: 1,
                y:[{
                    ticks:{
                        beginAtZero:true
                    }
                }],
                x: {
                    max: 600
                },
                y: {
                    min: 0,
                    max: 100
                }
            },
            plugins: {
                // Change options for ALL labels of THIS CHART
                datalabels: {
                    color: '#000000',
                    anchor: "center",
                    formatter: (dato) => dato + "%",
                    color: "black",
                    font: {
                        family: '"Times New Roman", Times, serif',
                        size: "12",
                        weight: "bold",
                    },
                    
                    /* Formato de la caja contenedora */
                    //padding: "4",
                    //borderWidth: 2,
                    //borderColor: "darkblue",
                    //borderRadius: 8,
                    //backgroundColor: "lightblue"
                },
                title: {
                    display: true,
                    text: "Dificultades encontradas por docentes por debajo de lo esperado en Lectura"
                }
            }
        }
    });

    //ESCRITURA DOCENTE
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $chart_data_esc_doc; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('chartEscrituraDocemnte').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Porcentaje de estudiantes con dificultades en Escritura',
                data: cData.datos,
                backgroundColor: [
                    //Tiene problemas
                    cData.color_esc_problemas,

                    //No tiene Problemas
                    cData.color_esc_sin_problemas,

                ],
                borderColor: [
                'rgb(118, 168, 134)',
                ],
                borderWidth: 1
            }
        ]
        },
        plugins: [ChartDataLabels],
        options: {
            scales:{
                aspectRatio: 1,
                y:[{
                    ticks:{
                        beginAtZero:true
                    }
                }],
                x: {
                    max: 600
                },
                y: {
                    min: 0,
                    max: 100
                }
            },
            plugins: {
                // Change options for ALL labels of THIS CHART
                datalabels: {
                    color: '#000000',
                    anchor: "center",
                    formatter: (dato) => dato + "%",
                    color: "black",
                    font: {
                        family: '"Times New Roman", Times, serif',
                        size: "12",
                        weight: "bold",
                    },
                    
                    /* Formato de la caja contenedora */
                    //padding: "4",
                    //borderWidth: 2,
                    //borderColor: "darkblue",
                    //borderRadius: 8,
                    //backgroundColor: "lightblue"
                },
                title: {
                    display: true,
                    text: "Dificultades encontradas por docentes por debajo de lo esperado en Escritura"
                }
            }
        }
    });

    //MATEMATICA DOCENTE
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $chart_data_mate_doc; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('chartMateDocemnte').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Porcentaje de estudiantes con dificultades en Matemáticas',
                data: cData.datos,
                backgroundColor: [
                    //Tiene problemas
                    cData.color_mate_problemas,

                    //No tiene Problemas
                    cData.color_mate_sin_problemas,

                ],
                borderColor: [
                'rgb(118, 168, 134)',
                ],
                borderWidth: 1
            }
        ]
        },
        plugins: [ChartDataLabels],
        options: {
            scales:{
                aspectRatio: 1,
                y:[{
                    ticks:{
                        beginAtZero:true
                    }
                }],
                x: {
                    max: 600
                },
                y: {
                    min: 0,
                    max: 100
                }
            },
            plugins: {
                // Change options for ALL labels of THIS CHART
                datalabels: {
                    color: '#000000',
                    anchor: "center",
                    formatter: (dato) => dato + "%",
                    color: "black",
                    font: {
                        family: '"Times New Roman", Times, serif',
                        size: "12",
                        weight: "bold",
                    },
                    
                    /* Formato de la caja contenedora */
                    //padding: "4",
                    //borderWidth: 2,
                    //borderColor: "darkblue",
                    //borderRadius: 8,
                    //backgroundColor: "lightblue"
                },
                title: {
                    display: true,
                    text: "Dificultades encontradas por docentes por debajo de lo esperado en Matemáticas"
                }
            }
        }
    });

</script>
