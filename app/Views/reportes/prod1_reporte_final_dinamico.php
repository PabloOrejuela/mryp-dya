<style>
    #codigo_0{
        background-color:#ffffff;
        text-align: center;
    }
    #codigo_1{
        /*No aplica*/
        background-color:#edf0ee;
    }
    #codigo_2{
        background-color:#ed5c5c;
    }
    #codigo_3{
        background-color:#f5d5d9;
    }
    #codigo_4{
        background-color:#f1f5d5;
    }
    #codigo_5{
        background-color:#e8f7e1;
    }
    #cabecera{
        background-color:#dcedf5;
    }
</style>
<main class="container">
    <div class="container-fluid px-4">
        <h3 class="mt-4"><?= esc($title).' - REPORTE FINAL DINAMICO'; ?></h3>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-cash-register"></i>
                <?= esc("ANÁLISIS DE LA PRUEBA FINAL CON LA INTERVENCIÓN DEL PROGRAMA"); ?>
            </div>
            <div class="card-body" id="card-reportes"> 
                <form action="<?php echo base_url().'/reporte-final-dinamico';?>" method="post" id="form">
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
                                    <td id="codigo_3">1</td>
                                    <td id="codigo_3">Muy por debajo de lo esperado</td>
                                    <td id="codigo_3">Falta de mediación escolar para la enseñanza de la escritura</td>
                                </tr>
                                <tr>
                                    <td id="codigo_4">2</td>
                                    <td id="codigo_4">En proceso</td>
                                    <td id="codigo_4">Mediación escolar es básica para la enseñanza de la escritura de acuerdo con la edad</td>
                                </tr>
                                <tr>
                                    <td id="codigo_5">3</td>
                                    <td id="codigo_5">Adecuado</td>
                                    <td id="codigo_5">Mediación escolar es adecuada para la enseñanza de la escritura de acuerdo con la edad</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        <section>
            <h4>ANÁLISIS DE LA PRUEBA FINAL CON LA INTERVENCIÓN DEL PROGRAMA</h4>
            <h5 style="text-align:center">
                    <?php 
                        if (isset($nivel)) {
                            if ($nivel == 0) {
                                echo $ciudad_obj['ciudad'].' - Todos los niveles';
                            }elseif ($nivel == 1) {
                                echo $ciudad_obj['ciudad'].' - Nivel 1 (3do EGB - 4to EGB)';
                            }elseif ($nivel == 2) {
                                echo $ciudad_obj['ciudad'].' - Nivel 2 (5to EGB - 7mo EGB)'; 
                            }elseif ($nivel == 3) {
                                echo $ciudad_obj['ciudad'].' - Nivel 3 (8vo EGB - 10mo EGB)'; 
                            }elseif ($nivel == 4) {
                                echo $ciudad_obj['ciudad'].' - Nivel 4 (10mo EGB - 3ero BACH)';
                            }
                        }
                        
                    ?>
                </h5>
                <h5 style="text-align:center">
                    <?php 
                        if (isset($cohorte)) {
                            if ($cohorte == 1) {
                                echo 'Cohorte: PRIMERA COHORTE'; 
                            }elseif ($cohorte == 2) {
                                echo 'Cohorte: SEGUNDA COHORTE'; 
                            }elseif ($cohorte == 0) {
                                echo 'Cohorte: AMBAS COHORTES'; 
                            }
                        }
                        
                    ?>
                </h5>
            <div class="col-md-12" style="font-size:0.7em;text-align:center;" >
                <div class="contenedor mb-3 mt-3">
                    <?php
                        use App\Models\EvalFinalP1Model;
                        use App\Models\EvalMateFinalP1Model;
                        use App\Models\EvalMateFinalElementalP1Model;
                        $this->evalMateFinalP1 = new EvalMateFinalP1Model();
                        $this->evalMateFinalElemP1 = new EvalMateFinalElementalP1Model();
                        $this->evalFinalP1 = new EvalFinalP1Model();
                        $this->db = \Config\Database::connect();
                        

                        $num = 0;
                        $num_a = 0;
                        $num_b = 0;
                        $num_c = 0;
                        $num_d = 0;
                        $mate_a = 0;
                        $mate_b = 0;
                        $mate_c = 0;
                        $mate_d = 0;
                        $lect_a = 0;
                        $lect_b = 0;
                        $lect_c = 0;
                        $lect_d = 0;
                        $esc_b = 0;
                        $esc_c = 0;
                        $esc_d = 0;
                        $lec_b = 0;
                        $lec_c = 0;
                        $lec_d = 0;
                        $total_registros = 0;
                        if ($registros != NULL && isset($registros)) {
                            
                            foreach ($registros as $key => $value) {
                                $eval_final = $this->evalFinalP1->_getEvalFinal($value->id);
                                //$eval_final = $this->evalFinalP1->_getEvalFinal(1292);
                                $valor_escritura = 0;

                                    //Eval final de lectura y escritura
                                    if (isset($eval_final) && $eval_final != NULL) {
                                        //Diagnóstico MYRP Lectura
                                        
                                        //Si no necesitó apoyo le calculo
                                        $valor_lectura = 0;

                                        if ($eval_final->p1_comprension_lectora == 'A') {
                                            $valor_lectura += 0;
                                            $lect_a++;
                                        }else if($eval_final->p1_comprension_lectora == 'B'){
                                            $valor_lectura += 1;
                                            $lect_b++;
                                        }

                                        if ($eval_final->p2_comprension_lectora == 'A') {
                                            $valor_lectura += 0;
                                            $lect_a++;
                                        }else if($eval_final->p2_comprension_lectora == 'B'){
                                            $valor_lectura += 1;
                                            $lect_b++;
                                        }

                                        if ($eval_final->p3_comprension_lectora == 'A') {
                                            $valor_lectura += 0;
                                            $lect_a++;
                                        }else if($eval_final->p3_comprension_lectora == 'B'){
                                            $valor_lectura += 1;
                                            $lect_b++;
                                        }else if($eval_final->p3_comprension_lectora == 'C'){
                                            $valor_lectura += 2;
                                            $lect_c++;
                                        }

                                        if ($eval_final->p4_comprension_lectora == 'A') {
                                            $valor_lectura += 0;
                                            $lect_a++;
                                        }else if($eval_final->p4_comprension_lectora == 'B'){
                                            $valor_lectura += 1;
                                            $lect_b++;
                                        }else if($eval_final->p4_comprension_lectora == 'C'){
                                            $valor_lectura += 2;
                                            $lect_c++;
                                        }
                                        //echo '<pre>'.var_export($eval_final, true).'</pre>';exit;
                                        if ($eval_final->necesito_apoyo == 'SI') {
                                            if ($valor_lectura <= 2) {
                                                $lec_b++;
                                                
                                            }else if($valor_lectura > 2 && $valor_lectura <= 5){
                                                $lec_c++;
                                                
                                            }else if($valor_lectura > 5 && $valor_lectura <= 7){
                                                $lec_d++;     
                                            }
                                            $lect_a++;
                                            $lect_b++;
                                        }else{
                                            if ($valor_lectura <= 2) {
                                                $lec_b++;
                                                
                                            }else if($valor_lectura > 2 && $valor_lectura <= 5){
                                                $lec_c++;
                                                
                                            }else if($valor_lectura > 5 && $valor_lectura <= 7){
                                                $lec_d++;
                                                
                                            }
                                            $lect_c++;
                                            $lect_d++;
                                        }


                                        //Diagnóstico MYRP Escritura
                                        //Cálculo el valor de Escritura
                                        
                                        if ($eval_final->p1_inteligibilidad == 'A') {
                                            $valor_escritura += 0;
                                            $num_a++;
                                        }else if($eval_final->p1_inteligibilidad == 'B'){
                                            $valor_escritura += 1;
                                            $num_b++;
                                        }

                                        if ($eval_final->p3_inteligibilidad == 'A') {
                                            $valor_escritura += 0;
                                            $num_a++;
                                        }else if($eval_final->p3_inteligibilidad == 'B'){
                                            $valor_escritura += 1;
                                            $num_b++;
                                        }else if($eval_final->p3_inteligibilidad == 'C'){
                                            $valor_escritura += 2;
                                            $num_c++;
                                        }

                                        if ($eval_final->p3_coherencia == 'A') {
                                            $valor_escritura += 0;
                                            $num_a++;
                                        }else if($eval_final->p3_coherencia == 'B'){
                                            $valor_escritura += 1;
                                            $num_b++;
                                        }else if($eval_final->p3_coherencia == 'C'){
                                            $valor_escritura += 2;
                                            $num_c++;
                                        }else if($eval_final->p3_coherencia == 'D'){
                                            $valor_escritura += 3;
                                            $num_d++;
                                        }

                                        if ($eval_final->p3_sintaxis == 'A') {
                                            $valor_escritura += 0;
                                            $num_a++;
                                        }else if($eval_final->p3_sintaxis == 'B'){
                                            $valor_escritura += 1;
                                            $num_b++;
                                        }else if($eval_final->p3_sintaxis == 'C'){
                                            $valor_escritura += 2;
                                            $num_c++;
                                        }else if($eval_final->p3_sintaxis == 'D'){
                                            $valor_escritura += 3;
                                            $num_c++;
                                        }

                                        if ($eval_final->p3_estandares_egb_sub2y3 == 'A') {
                                            $valor_escritura += 0;
                                            $num_a++;
                                        }else if($eval_final->p3_estandares_egb_sub2y3 == 'B'){
                                            $valor_escritura += 1;
                                            $num_b++;                                                }

                                        if ($eval_final->p4_inteligibilidad == 'A') {
                                            $valor_escritura += 0;
                                            $num_a++;
                                        }else if($eval_final->p4_inteligibilidad == 'B'){
                                            $valor_escritura += 1;
                                            $num_b++;
                                        }

                                        if ($eval_final->p4_coherencia == 'A') {
                                            $valor_escritura += 0;
                                            $num_a++;
                                        }else if($eval_final->p4_coherencia == 'B'){
                                            $valor_escritura += 1;
                                            $num_b++;
                                        }else if($eval_final->p4_coherencia == 'C'){
                                            $valor_escritura += 2;
                                            $num_c++;
                                        }else if($eval_final->p4_coherencia == 'D'){
                                            $valor_escritura += 3;
                                            $num_d++;
                                        }

                                        if ($eval_final->p4_sintaxis == 'A') {
                                            $valor_escritura += 0;
                                            $num_a++;
                                        }else if($eval_final->p4_sintaxis == 'B'){
                                            $valor_escritura += 1;
                                            $num_b++;
                                        }else if($eval_final->p4_sintaxis == 'C'){
                                            $valor_escritura += 2;
                                            $num_c++;
                                        }else if($eval_final->p4_sintaxis == 'D'){
                                            $valor_escritura += 3;
                                            $num_d++;
                                        }

                                        if ($eval_final->p4_estandares_egb_sub2y3 == 'A') {
                                            $valor_escritura += 0;
                                            $num_a++;
                                        }else if($eval_final->p4_estandares_egb_sub2y3 == 'B'){
                                            $valor_escritura += 1;
                                            $num_b++;
                                        }

                                        $rango_escritura = ($valor_escritura * 100) / 18;

                                        if ($rango_escritura <= 33) {
                                            
                                            $esc_b++;
                                        }else if($rango_escritura > 33 && $rango_escritura <= 66){
                                            
                                            $esc_c++;
                                        }else if($rango_escritura > 66){
                                            
                                            $esc_d++;
                                        }

                                    }
                                    
                                    //Cálculo el valor de Matemática
                                    $superior = $this->evalMateFinalP1->_getEvalMateFinal($value->id);
                                    //echo $this->db->getLastQuery();
                                    $elemental = $this->evalMateFinalElemP1->_getEvalMateFinalElem($value->id);
                                    $valor_matematica = 0;

                                    if(isset($elemental) && $elemental != NULL) {
                                        $valor_matematica = $this->evalMateFinalElemP1->_getEvalFinalMateElementalP1($value->id);

                                        $rango_mate = ($valor_matematica * 100) / 20;

                                        if ($rango_mate <= 33) {
                                            
                                            $mate_b++;
                                        }else if($rango_mate > 33 && $rango_mate <= 66){
                                            
                                            $mate_c++;
                                        }else if($rango_mate > 66){
                                            
                                            $mate_d++;
                                        }else{
                                            
                                            $mate_a++;
                                        }

                                    }

                                    if (isset($superior) && $superior != NULL) {
                                        $valor_matematica_sup = $this->evalMateFinalP1->_getEvalMateFinalP1($value->id);

                                        $rango_mate_sup = ($valor_matematica_sup * 100) / 20;

                                        if ($rango_mate_sup <= 33) {
                                            
                                            $mate_b++;
                                        }else if($rango_mate_sup > 33 && $rango_mate_sup <= 66){
                                            
                                            $mate_c++;
                                        }else if($rango_mate_sup > 66){
                                            
                                            $mate_d++;
                                        }else{
                                            
                                            $mate_a++;
                                        }
                                    }
                                $num++;
                            }
                        }
                        
                        $total_registros_lect = $lec_b+$lec_c+$lec_d;
                        
                        //Lectura
                        //$etiquetas = ["Por debajo de lo esperado", "En proceso", "Adecuadas"];
                        if ($total_registros_lect == 0 ||$total_registros_lect == NULL) {
                            $datosGrafica[0] = number_format(($lec_b*100)/1,1);
                            $datosGrafica[1] = number_format(($lec_c*100)/1, 1);
                            $datosGrafica[2] = number_format(($lec_d*100)/1, 1);
                            $etiquetas = ("");
                        }else{
                            if (($lec_b*100)/$total_registros_lect != 0) {
                                $datosGrafica[] = number_format((($lec_b)*100)/$total_registros_lect,1);
                                $etiquetas[] = ("Por debajo de lo esperado");
                            }

                            if (($lec_c*100)/$total_registros_lect != 0) {
                                $datosGrafica[] = number_format(($lec_c*100)/$total_registros_lect, 1);
                                $etiquetas[] = ("En proceso");
                            }
                            
                            if (($lec_d*100)/$total_registros_lect != 0) {
                                $datosGrafica[] = number_format(($lec_d*100)/$total_registros_lect, 1);
                                $etiquetas[] = ("Adecuadas");
                            }
                            
                        }
                        //echo '<pre>'.var_export($total_registros_lect, true).'</pre>';exit;
                        $respuesta = [
                            "etiquetas" => $etiquetas,
                            "datos" => $datosGrafica,
                            "total" => $total_registros_lect,
                        ];
                        $chart_data =  json_encode($respuesta); 
                        
                        //Escritura
                        //echo $num_d;exit;
                        $total_registros_esc = $esc_b+$esc_c+$esc_d;
                        //$etiquetas_1 = ["Por debajo de lo esperado", "En proceso", "Adecuadas"];
                        if ($total_registros_esc == 0 || $total_registros_esc == NULL) {
                            $datosGrafica_1[0] = number_format(($esc_b*100)/1,1);//65
                            $datosGrafica_1[1] = number_format(($esc_c*100)/1,1);//23.80
                            $datosGrafica_1[2] = number_format(($esc_d*100)/1,1);//11.11
                            $etiquetas_1 = ("");
                        }else{
                            if (($esc_b*100)/$total_registros_esc != 0) {
                                $datosGrafica_1[] = number_format((($esc_b)*100)/$total_registros_esc, 1);//65
                                $etiquetas_1[] = ("Por debajo de lo esperado");
                            }

                            if (($esc_c*100)/$total_registros_esc != 0) {
                                $datosGrafica_1[] = number_format(($esc_c*100)/$total_registros_esc, 1);//23.80
                                $etiquetas_1[] = ("En proceso");
                            }
                            
                            if (($esc_d*100)/$total_registros_esc != 0) {
                                $datosGrafica_1[] = number_format(($esc_d*100)/$total_registros_esc, 1);//11.11
                                $etiquetas_1[] = ("Adecuadas");
                            }
                        
                        }
                        //echo '<pre>'.var_export($centro, true).'</pre>';exit;
                        
                        $respuesta_1 = [
                            "etiquetas" => $etiquetas_1,
                            "datos" => $datosGrafica_1,
                            "total" => $total_registros_esc,
                        ];
                        $chart_data_1 =  json_encode($respuesta_1); 

                        //Matemáticas
                        $total_registros_mate = $mate_b+$mate_c+$mate_d;
                        //echo '<pre>'.var_export(($mate_c*100)/$total_registros_mate, true).'</pre>';exit;
                        //$etiquetas_2 = ["Por debajo de lo esperado", "En proceso", "Adecuadas"];
                        if ($total_registros_mate == 0 || $total_registros_mate == NULL) {
                            $datosGrafica_2[0] = number_format(($mate_b*100)/1, 1);
                            $datosGrafica_2[1] = number_format(($mate_c*100)/1, 1);//23.80
                            $datosGrafica_2[2] = number_format(($mate_d*100)/1, 1);//23.80
                            $etiquetas_2 = ("");
                        }else{
                            if (($mate_b*100)/$total_registros_mate != 0) {
                                $datosGrafica_2[] = number_format(($mate_b*100)/$total_registros_mate, 1);
                                $etiquetas_2[] = ("Por debajo de lo esperado");
                            }

                            if (($mate_c*100)/$total_registros_mate != 0) {
                                $datosGrafica_2[] = number_format(($mate_c*100)/$total_registros_mate, 1);//23.80
                                $etiquetas_2[] = ("En proceso");
                            }
                            
                            if (($mate_d*100)/$total_registros_mate != 0) {
                                $datosGrafica_2[] = number_format(($mate_d*100)/$total_registros_mate, 1);//23.80
                                $etiquetas_2[] = ("Adecuadas");
                            }
                            
                        }
                        
                        $respuesta_2 = [
                            "etiquetas" => $etiquetas_2,
                            "datos" => $datosGrafica_2,
                            "total" => $total_registros_mate,
                        ];
                        //echo '<pre>'.var_export($respuesta_2, true).'</pre>';exit;
                        $chart_data_2 =  json_encode($respuesta_2); 
                    ?>
                </div>
                <section>
                    <div class="col-md-6"><canvas id="myChart"></canvas></div>
                    <div class="col-md-6"><canvas id="myChart_1"></canvas></div>
                    <div class="col-md-6"><canvas id="myChart_2"></canvas></div> 
                </section>
                <section>
                    <div class="row">
                        <div class="col-md-6">
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
            </div>
        </section>
    </div>
</main>
<script>
    //Le paso el JSON con los datos Chart 1
    var cData = JSON.parse(`<?php echo $chart_data; ?>`);
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Número de registros: '+ cData.total,
                data: cData.datos,
                backgroundColor: [

                    //Por debajo
                    'rgba(245, 213, 217, 1)',

                    //Proceso
                    'rgba(241, 245, 213, 1)',

                    //Adecuado
                    'rgba(232, 247, 225, 1)',

                ],
                borderColor: [
                'rgb(95, 96, 86)',
                ],
                borderWidth: 0.5
            
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
                    max: 20
                },
                y: {
                    min: 0,
                    max: 100
                }
            },
            plugins: {
                // Change options for ALL labels of THIS CHART
                datalabels: {
                    color: '#000000'
                },
                title: {
                    display: true,
                    text: 'Destrezas (Lectura) en porcentaje %'
                }
            }
        }
    });
</script>
<script>
    //Le paso el JSON con los datos Chart 1
    var cData = JSON.parse(`<?php echo $chart_data_1; ?>`);
    var ctx = document.getElementById('myChart_1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Número de registros: '+ cData.total,
                data: cData.datos,
                backgroundColor: [

                    //Por debajo
                    'rgba(245, 213, 217, 1)',

                    //Proceso
                    'rgba(241, 245, 213, 1)',

                    //Adecuado
                    'rgba(232, 247, 225, 1)',

                ],
                borderColor: [
                'rgb(95, 96, 86)',
                ],
                borderWidth: 0.5
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
                    max: 20
                },
                y: {
                    min: 0,
                    max: 100
                }
            },
            plugins: {
                // Change options for ALL labels of THIS CHART
                datalabels: {
                    color: '#000000'
                },
                title: {
                    display: true,
                    text: 'Destrezas (Escritura) en porcentaje %'
                }
            }
        }
    });
</script>
<script>
    //Le paso el JSON con los datos Chart 1
    var cData = JSON.parse(`<?php echo $chart_data_2; ?>`);
    var ctx = document.getElementById('myChart_2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Número de registros: '+ cData.total,
                data: cData.datos,
                backgroundColor: [

                    //Por debajo
                    'rgba(245, 213, 217, 1)',

                    //Proceso
                    'rgba(241, 245, 213, 1)',

                    //Adecuado
                    'rgba(232, 247, 225, 1)',

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
                    max: 20
                },
                y: {
                    min: 0,
                    max: 100
                }
            },
            plugins: {
                // Change options for ALL labels of THIS CHART
                datalabels: {
                    color: '#000000'
                },
                title: {
                    display: true,
                    text: 'Destrezas (Matemáticas) en porcentaje %'
                }
            }
        }
    });
</script>
