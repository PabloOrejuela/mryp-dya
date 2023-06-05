<style>
    #codigo_0{
        background-color:#ffffff;
        text-align: center;
    }
    #codigo_1{
        background-color:#edf0ee;
    }
    #codigo_2{
        background-color:#fc656d;
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
        <h3 class="mt-4"><?= esc($title).' - REPORTES'; ?></h3>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-cash-register"></i>
                <?= esc("ANÁLISIS DE LA PRUEBA DE DIAGNÓSTICO"); ?>
            </div>
            <div class="card-body" id="card-reportes"> 
                <form action="<?php echo base_url().'/recibe-eval-prueba-diagnostico-tab';?>" method="post" id="form">
                    <div class="col-md-8 mb-3">
                        <label for="amie">Centro educativo:</label>
                        <select 
                            class="form-select" 
                            aria-label="Default select example" 
                            name="amie"
                            id="select_info"  
                        >   
                            <option value="NULL" selected>Centro educativo</option>
                            <?php
                                if ($centros != NULL && isset($centros) ) {
                                    foreach ($centros as $key => $ce) {
                                        if ($ce->amie == $amie) {
                                            echo '<option value="'.$ce->amie.'" selected>'.$ce->amie.' - '.$ce->nombre.'</option>';
                                        }else{
                                            echo '<option value="'.$ce->amie.'">'.$ce->amie.' - '.$ce->nombre.'</option>';
                                        }
                                    }
                                }else{
                                    echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cohorte">Cohorte:</label>
                        <select 
                            class="form-select" 
                            aria-label="Default select example" 
                            name="cohorte"
                            id="select_info"  
                        >   
                            <?php
                                if ($cohorte == 'PRIMERA COHORTE') {
                                    echo '<option value="NULL">Elegir cohorte</option>';
                                    echo '<option value="PRIMERA COHORTE" selected>PRIMERA COHORTE</option>';
                                    echo '<option value="SEGUNDA COHORTE">SEGUNDA COHORTE</option>';
                                }else if($cohorte == 'SEGUNDA COHORTE'){
                                    echo '<option value="NULL">Elegir cohorte</option>';
                                    echo '<option value="PRIMERA COHORTE">PRIMERA COHORTE</option>';
                                    echo '<option value="SEGUNDA COHORTE" selected>SEGUNDA COHORTE</option>';

                                }else{
                                    echo '<option value="NULL" selected>Elegir cohorte</option>';
                                    echo '<option value="PRIMERA COHORTE">PRIMERA COHORTE</option>';
                                    echo '<option value="SEGUNDA COHORTE">SEGUNDA COHORTE</option>';
                                }
                            ?>
                        </select>
                    </div>
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
                    
                    <button type="submit" class="btn btn-success">Generar reporte</button>
                </form>
            </div>
        <section>
            <h4 style="text-align:center">ANALISIS DE LA PRUEBA DE DIAGNÓSTICO</h4>
            <div class="col-md-12" style="font-size:0.7em;text-align:center;">
                <div class="contenedor mb-3 mt-3">
                    <table class="table table-bordered tabla-codigos-eval col-md-6" id="contenedor">
                        <thead>
                            <th colspan="11">ANALISIS DE LA PRUEBA DE DIAGNÓSTICO</th>
                        </thead>
                        <thead>
                            <th colspan="11">
                                <?php
                                
                                    if ($centro != NULL && isset($centro)) {
                                        echo 'Centro educativo '.$centro->nombre.' - '.$cohorte;
                                        $nombre =  json_encode($centro->nombre); 
                                    }else{
                                        echo 'CENTRO EDUCATIVO';
                                        $nombre =  json_encode("Centro educativo"); 
                                    }
                                ?>
                            </th>
                        </thead>
                        <thead>
                            <th id="cabecera" colspan="4"></th>
                            <th id="cabecera" colspan="3">Dificultades en el aprendizaje seleccionado por docentes</th>
                            <th id="cabecera" colspan="4">Dificultades encontradas en las pruebas de diagnóstico aplicadas</th>
                        </thead>
                        <thead>
                            <th id="cabecera">No</th>
                            <th id="cabecera">Nombres del estudiante</th>
                            <th id="cabecera">Apellidos del estudiante</th>
                            <th id="cabecera">Año EGB</th>
                            <th id="cabecera">Lectura</th>
                            <th id="cabecera">Escritura</th>
                            <th id="cabecera">Matemáticas</th>
                            <th id="cabecera">Lectura</th>
                            <th id="cabecera">Escritura</th>
                            <th id="cabecera">Matemática Elemental</th>
                            <th id="cabecera">Matemáticas Superior</th>
                        </thead>
                        <tbody>
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
                                $total_esc_bajo20 = 0;
                                $total_lec_bajo20 = 0;
                                $total_esc = 0;
                                $total_lec = 0;
                                //$total_registros = count($registros);
                                
                                $num = 0;
                                if ($registros != NULL && isset($registros)) {
                                    foreach ($registros as $key => $value) {
                                        $diag_docente = $this->diagDocenteP1->_getDiagDocente($value->id);
                                        $diag_myrp = $this->diagMyrpP1->_getDiagMyrpP1($value->id);
                                        
                                        //echo '<pre>'.var_export($diag_docente, true).'</pre>';
                                        echo '<tr>
                                            <td>'.$num.'</td>
                                            <td>'.$value->nombres.'</td>
                                            <td>'.$value->apellidos.$value->id.'</td>';
    
                                            if ($value->anio_egb == '11') {
                                                echo '<td>1ro BTI</td>';
                                            }else if($value->anio_egb == '12'){
                                                echo '<td>2do BTI</td>';
                                            }else if($value->anio_egb == '13'){
                                                echo '<td>3ro BTI</td>';
                                            }else if($value->anio_egb == '14'){
                                                echo '<td>Analfabeta</td>';
                                            }else if($value->anio_egb <= '10' && $value->anio_egb != ''){
                                                echo '<td>'.$value->anio_egb.' EGB</td>';
                                            }else{
                                                echo '<td>'.$value->anio_egb.'</td>';
                                            }

                                            if (isset($diag_docente) && $diag_docente != NULL) {
                                                
                                                //Diagnóstico docente
                                                if ($diag_docente->lectura == 'SI') {
                                                    echo '<td id="codigo_3">'.$diag_docente->lectura.'</td>';
                                                    $lect_a++;
                                                }else{
                                                    echo '<td id="codigo_4">'.$diag_docente->lectura.'</td>';
                                                    $lect_d++;
                                                }

                                                if ($diag_docente->escritura == 'SI') {
                                                    echo '<td id="codigo_3">'.$diag_docente->escritura.'</td>';
                                                    $esc_a++;
                                                }else{
                                                    echo '<td id="codigo_4">'.$diag_docente->escritura.'</td>';
                                                    $esc_d++;
                                                }
                                                

                                                if ($diag_docente->matematica == 'SI') {
                                                    echo '<td id="codigo_3">'.$diag_docente->matematica.'</td>';
                                                    $mate_a++;
                                                }else{
                                                    echo '<td id="codigo_4">'.$diag_docente->matematica.'</td>';
                                                    $mate_d++;
                                                }
                                                
                                            }else{
                                                echo '<td id="codigo_1">No aplica</td>';
                                                echo '<td id="codigo_1">No aplica</td>';
                                                echo '<td id="codigo_1">No aplica</td>';
                                            }

                                            //DIAGNOSTICO MYRP
                                            //Eval final de lectura y escritura
                                            if (isset($diag_myrp) && $diag_myrp != NULL) {
                                                $valor_lectura = 0;
                                                
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
                                                        echo '<td id="codigo_2">SI</td>';
                                                        $lect_myrp_a++;
                                                        $total_lec_bajo20++;
                                                    }else if($valor_lectura > 2 && $valor_lectura <= 5){
                                                        echo '<td id="codigo_3">SI</td>';
                                                        $lect_myrp_a++;
                                                        $total_lec_bajo20++;
                                                    }else if($valor_lectura > 5 && $valor_lectura <= 7){
                                                        echo '<td id="codigo_4">SI</td>';
                                                        $lect_myrp_a++;
                                                        $total_lec_bajo20++;
                                                    }else{
                                                        echo '<td id="codigo_5">SI</td>';
                                                        $lect_myrp_a++;
                                                        $total_lec_bajo20++;
                                                    }
                                                    
                                                }else{
                                                    if ($valor_lectura <= 2) {
                                                        echo '<td id="codigo_2">NO</td>';
                                                        $lect_myrp_c++;
                                                    }else if($valor_lectura > 2 && $valor_lectura <= 5){
                                                        echo '<td id="codigo_3">NO</td>';
                                                        $lect_myrp_c++;
                                                    }else if($valor_lectura > 5 && $valor_lectura <= 7){
                                                        echo '<td id="codigo_4">NO</td>';
                                                        $lect_myrp_c++;
                                                    }else{
                                                        echo '<td id="codigo_5">NO</td>';
                                                        $lect_myrp_c++;
                                                    }
                                                    
                                                }
                                                $total_lec += $valor_lectura;
                                                
                                                $valor_escritura = 0;
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
                                                    echo '<td id="codigo_2">'.number_format($valor_escritura).'</td>';
                                                    $total_esc_bajo20++;
                                                }else if($valor_escritura > 10 && $valor_escritura <= 20){
                                                    echo '<td id="codigo_3">'.$valor_escritura.'</td>';
                                                    $total_esc_bajo20++;
                                                }else if($valor_escritura > 20 && $valor_escritura <= 26){
                                                    echo '<td id="codigo_4">'.$valor_escritura.'</td>';
                                                }else if($valor_escritura > 26){
                                                    echo '<td id="codigo_5">'.$valor_escritura.'</td>';
                                                }else{
                                                    echo '<td id="codigo_1">0</td>';
                                                }
                                                

                                            }else{
                                                echo '<td id="codigo_1"></td>';
                                                echo '<td id="codigo_1"></td>';
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
                                                    echo '<td id="codigo_2">'.$valor_matematica.'</td>';
                                                    $mate_myrp_a++;
                                                    $total_mate_bajo20++;
                                                }else if($valor_matematica > 10 && $valor_matematica <= 20){
                                                    echo '<td id="codigo_3">'.$valor_matematica.'</td>';
                                                    $mate_myrp_b++;
                                                    $total_mate_bajo20++;
                                                }else if($valor_matematica > 20 && $valor_matematica <= 26){
                                                    echo '<td id="codigo_4">'.$valor_matematica.'</td>';
                                                    $mate_myrp_c++;
                                                }else if($valor_matematica > 26){
                                                    echo '<td id="codigo_5">'.$valor_matematica.'</td>';
                                                    $mate_myrp_d++;
                                                }else{
                                                    echo '<td id="codigo_1">0</td>';
                                                }

                                            }else{
                                                echo '<td id="codigo_1">0</td>';
                                            }

                                            if (isset($superior) && $superior != NULL) {
                                                $valor_matematica_sup = $this->evalMateP1->_getEvalMateP1($value->id);
                                                $total_mate += $valor_matematica_sup;
                                                //$rango_mate_sup = ($valor_matematica_sup * 100) / 20;

                                                if ($valor_matematica_sup <= 10) {
                                                    echo '<td id="codigo_2">'.$valor_matematica_sup.'</td>';
                                                    $mate_myrp_a++;
                                                    $total_mate_bajo20++;
                                                }else if($valor_matematica_sup > 10 && $valor_matematica_sup <= 20){
                                                    echo '<td id="codigo_3">'.$valor_matematica_sup.'</td>';
                                                    $mate_myrp_b++;
                                                    $total_mate_bajo20++;
                                                }else if($valor_matematica_sup > 20 && $valor_matematica_sup <= 26){
                                                    echo '<td id="codigo_4">'.$valor_matematica_sup.'</td>';
                                                    $mate_myrp_c++;
                                                }else if($valor_matematica_sup > 26){
                                                    echo '<td id="codigo_5">'.$valor_matematica_sup.'</td>';
                                                    $mate_myrp_d++;
                                                }else{
                                                    echo '<td id="codigo_1">0</td>';
                                                }

                                            }else{
                                                echo '<td id="codigo_1">0</td>';
                                            }
                                            
                                            echo '</tr>';

                                        $num++;
                                    }
                                }
                                
                            ?>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-info mb-5" id="btnCapturar">Descargar cuadro</button>
            </div>
            
            <?php
                    
                    $total_dificultades_lect = $lect_a;
                    $total_buenas_lect = $lect_d;
                    $total_lect_doc = $total_dificultades_lect + $total_buenas_lect;

                    $total_dificultades_esc = $esc_a;
                    $total_buenas_esc = $esc_d;
                    $total_esc_doc = $total_dificultades_esc + $total_buenas_esc;

                    $total_dificultades_mate = $mate_a;
                    $total_buenas_mate = $mate_d;
                    $total_mate_doc = $total_dificultades_mate + $total_buenas_mate;


                    //echo '<pre>'.var_export($num_lectura, true).'</pre>';exit;
                    //Dificultades encontradas por docentes
                    $etiquetas = ["Lectura", "Escritura", "Matemáticas"];

                    if ($num != 0) {
                        $datosGrafica[0] = number_format(($total_dificultades_lect*100)/$num,1);
                    }else{
                        $datosGrafica[0] = number_format(($total_dificultades_lect*100)/1,1);
                    }

                    if ($num != 0) {
                        $datosGrafica[1] = number_format(($total_dificultades_esc*100)/$num, 1);
                    }else{
                        $datosGrafica[1] = number_format(($total_dificultades_esc*100)/1, 1);
                    }

                    if ($num != 0) {
                        $datosGrafica[2] = number_format(($total_dificultades_mate*100)/$num, 1);
                    }else{
                        $datosGrafica[2] = number_format(($total_dificultades_mate*100)/1, 1);
                    }
                    
                    $respuesta = [
                        "etiquetas" => $etiquetas,
                        "datos" => $datosGrafica,
                        "total" => $total_lect_doc+$total_esc_doc,
                    ];

                    //Lectura
                    if ($num != 0) {
                        if (($total_dificultades_lect*100)/$num > 0 && ($total_dificultades_lect*100)/$num <= 25) {
                            $respuesta['color_lectura'] = 'rgba(232, 247, 225, 1)';
                        }else if(($total_dificultades_lect*100)/$num > 25 && ($total_dificultades_lect*100)/$num <= 50){
                            $respuesta['color_lectura'] = 'rgba(241, 245, 213, 1)';
                        }else if(($total_dificultades_lect*100)/$num > 50 && ($total_dificultades_lect*100)/$num <= 75){
                            $respuesta['color_lectura'] = 'rgba(245, 213, 217, 1)';
                        }else if(($total_dificultades_lect*100)/$num > 75){
                            $respuesta['color_lectura'] = 'rgba(252, 101, 109, 1)';
                        }else{
                            $respuesta['color_lectura'] = 'rgba(255, 255, 255, 1)';
                        }
                        //echo '<pre>'.var_export($total_dificultades_lect, true).'</pre>';exit;
                        //Escritura
                        if (($total_dificultades_esc*100)/$num > 0 && (($total_dificultades_esc*100)/$num*100)/$num <= 25) {
                            $respuesta['color_escritura'] = 'rgba(232, 247, 225, 0.8)';
                        }else if(($total_dificultades_esc*100)/$num > 25 && ($total_dificultades_esc*100)/$num <= 50){
                            $respuesta['color_escritura'] = 'rgba(241, 245, 213, 0.8)';
                        }else if(($total_dificultades_esc*100)/$num > 50 && ($total_dificultades_esc*100)/$num <= 75){
                            $respuesta['color_escritura'] = 'rgba(245, 213, 217, 0.8)';
                        }else if(($total_dificultades_esc*100)/$num > 75){
                            $respuesta['color_escritura'] = 'rgba(252, 101, 109, 0.8)';
                        }else{
                            $respuesta['color_escritura'] = 'rgba(255, 255, 255, 0.8)';
                        }

                        //MATEMÁTICAS
                        if (($total_dificultades_mate*100)/$num > 0 && (($total_dificultades_mate*100)/$num*100)/$num <= 25) {
                            $respuesta['color_mate'] = 'rgba(232, 247, 225, 0.6)';
                        }else if(($total_dificultades_mate*100)/$num > 25 && ($total_dificultades_mate*100)/$num <= 50){
                            $respuesta['color_mate'] = 'rgba(241, 245, 213, 0.6)';
                        }else if(($total_dificultades_mate*100)/$num > 50 && ($total_dificultades_mate*100)/$num <= 75){
                            $respuesta['color_mate'] = 'rgba(245, 213, 217, 0.6)';
                        }else if(($total_dificultades_mate*100)/$num > 75){
                            $respuesta['color_mate'] = 'rgba(252, 101, 109, 0.6)';
                        }else{
                            $respuesta['color_mate'] = 'rgba(255, 255, 255, 0.6)';
                        }
                    }

                    $chart_data =  json_encode($respuesta); 

                    //Dificultades de aprendizaje encontradas a partir de los diagnósticos aplicados
                    $total_dificultades_myrp_lect = $total_lec_bajo20;
                    $total_buenas_myrp_lect = $lect_myrp_d;
                    $total_lect_myrp = $total_dificultades_myrp_lect + $total_buenas_myrp_lect;

                    $total_dificultades_myrp_esc = $esc_myrp_a + $esc_myrp_b;
                    $total_buenas_myrp_esc = $esc_myrp_d;
                    $total_esc_myrp = $total_dificultades_myrp_esc + $total_buenas_myrp_esc;

                    $total_dificultades_myrp_mate = $mate_myrp_a;
                    $total_buenas_myrp_mate = $mate_myrp_d;
                    $total_mate_myrp = $total_dificultades_myrp_mate + $total_buenas_myrp_mate;


                    // echo '<pre>'.var_export(($total_lec_bajo20*100)/$num, true).'</pre>';exit;
                    $etiquetas_1 = ["Lectura", "Escritura", "Matemáticas"];
                   
                    if ($num != 0) {
                        $datosGrafica_1[0] = number_format(($total_dificultades_myrp_lect*100)/$num,1);
                    }else{
                        $datosGrafica_1[0] = number_format(($total_dificultades_myrp_lect*100)/1,1);
                    }

                    if ($num != 0) {
                        $datosGrafica_1[1] = number_format(($total_esc_bajo20*100)/$num,1);
                    }else{
                        $datosGrafica_1[1] = number_format(($total_esc_bajo20*100)/1,1);
                    }

                    if ($num != 0) {
                        $datosGrafica_1[2] = number_format(($total_mate_bajo20*100)/$num,1);
                        
                    }else{
                        $datosGrafica_1[2] = number_format(($total_mate_bajo20*100)/1,1);
                    }


                    $respuesta_1 = [
                        "etiquetas" => $etiquetas_1,
                        "datos" => $datosGrafica_1,
                        "total" => $num,
                    ];

                    //Lectura
                    if ($num != 0) {
                        
                        if (($total_dificultades_myrp_lect*100)/$num > 0 && ($total_dificultades_myrp_lect*100)/$num <= 25) {
                            $respuesta_1['color_lectura'] = 'rgba(252, 101, 109, 1)';
                        }else if(($total_dificultades_myrp_lect*100)/$num > 25 && ($total_dificultades_myrp_lect*100)/$num <= 50){
                            $respuesta_1['color_lectura'] = 'rgba(245, 213, 217, 1)';
                        }else if(($total_dificultades_myrp_lect*100)/$num > 50 && ($total_dificultades_myrp_lect*100)/$num <= 75){
                            $respuesta_1['color_lectura'] = 'rgba(241, 245, 213, 1)';
                        }else if(($total_dificultades_myrp_lect*100)/$num > 75){
                            $respuesta_1['color_lectura'] = 'rgba(232, 247, 225, 1)';
                        }else{
                            $respuesta_1['color_lectura'] = '#dcedf5';
                        }
                    }else{
                        if (($total_dificultades_myrp_lect*100)/1 > 0 && ($total_dificultades_myrp_lect*100)/1 <= 25) {
                            $respuesta_1['color_lectura'] = 'rgba(252, 101, 109, 1)';
                        }else if(($total_dificultades_myrp_lect*100)/1 > 25 && ($total_dificultades_myrp_lect*100)/1 <= 50){
                            $respuesta_1['color_lectura'] = 'rgba(245, 213, 217, 1)';
                        }else if(($total_dificultades_myrp_lect*100)/1 > 50 && ($total_dificultades_myrp_lect*100)/1 <= 75){
                            $respuesta_1['color_lectura'] = 'rgba(241, 245, 213, 1)';
                        }else if(($total_dificultades_myrp_lect*100)/1 > 75){
                            $respuesta_1['color_lectura'] = 'rgba(232, 247, 225, 1)';
                        }else{
                            $respuesta_1['color_lectura'] = '#dcedf5';
                        }
                    }
                    

                    
                    //Escritura
                    if ($num != 0) {
                        
                        if (($total_esc_bajo20*100)/$num  > 0 && ($total_esc_bajo20*100)/$num  <=25) {
                            $respuesta_1['color_escritura'] = 'rgba(232, 247, 225, 0.8)';
                        }else if(($total_esc_bajo20*100)/$num  > 25 && ($total_esc_bajo20*100)/$num  <= 50){
                            $respuesta_1['color_escritura'] = 'rgba(241, 245, 213, 0.8)';
                        }else if(($total_esc_bajo20*100)/$num  > 50 && ($total_esc_bajo20*100)/$num  <= 75){
                            $respuesta_1['color_escritura'] = 'rgba(245, 213, 217, 0.8)';
                        }else if(($total_esc_bajo20*100)/$num  > 75){
                            $respuesta_1['color_escritura'] = 'rgba(252, 101, 109, 0.8)';
                        }else{
                            $respuesta_1['color_escritura'] = '#dcedf5';
                        }
                    }else{
                        if (($total_esc_bajo20*100)/1  > 0 && ($total_esc_bajo20*100)/1  <=25) {
                            $respuesta_1['color_escritura'] = 'rgba(232, 247, 225, 0.8)';
                        }else if(($total_esc_bajo20*100)/1  > 25 && ($total_esc_bajo20*100)/1  <= 50){
                            $respuesta_1['color_escritura'] = 'rgba(241, 245, 213, 0.8)';
                        }else if(($total_esc_bajo20*100)/1  > 50 && ($total_esc_bajo20*100)/1  <= 75){
                            $respuesta_1['color_escritura'] = 'rgba(245, 213, 217, 0.8)';
                        }else if(($total_esc_bajo20*100)/1  > 75){
                            $respuesta_1['color_escritura'] = 'rgba(252, 101, 109, 0.8)';
                        }else{
                            $respuesta_1['color_escritura'] = '#dcedf5';
                        }
                    }
                    

                    
                    //MATEMÁTICAS
                    if ($num != 0) {
                        
                        if (($total_mate_bajo20*100)/$num  > 0 && ($total_mate_bajo20*100)/$num  <=25) {
                            $respuesta_1['color_mate'] = 'rgba(232, 247, 225, 0.6)';
                        }else if(($total_mate_bajo20*100)/$num  > 25 && ($total_mate_bajo20*100)/$num  <= 50){
                            $respuesta_1['color_mate'] = 'rgba(241, 245, 213, 0.6)';
                        }else if(($total_mate_bajo20*100)/$num  > 50 && ($total_mate_bajo20*100)/$num  <= 75){
                            $respuesta_1['color_mate'] = 'rgba(245, 213, 217, 0.6)';
                        }else if(($total_mate_bajo20*100)/$num  > 75){
                            $respuesta_1['color_mate'] = 'rgba(252, 101, 109, 0.6)';
                        }else{
                            $respuesta_1['color_mate'] = '#dcedf5';
                        }
                    }else{
                        if (($total_mate_bajo20*100)/1  > 0 && ($total_mate_bajo20*100)/1  <=25) {
                            $respuesta_1['color_mate'] = 'rgba(232, 247, 225, 0.6)';
                        }else if(($total_mate_bajo20*100)/1  > 25 && ($total_mate_bajo20*100)/1  <= 50){
                            $respuesta_1['color_mate'] = 'rgba(241, 245, 213, 0.6)';
                        }else if(($total_mate_bajo20*100)/1  > 50 && ($total_mate_bajo20*100)/1  <= 75){
                            $respuesta_1['color_mate'] = 'rgba(245, 213, 217, 0.6)';
                        }else if(($total_mate_bajo20*100)/1  > 75){
                            $respuesta_1['color_mate'] = 'rgba(252, 101, 109, 0.6)';
                        }else{
                            $respuesta_1['color_mate'] = '#dcedf5';
                        }
                    }
                    

                    //echo '<pre>'.var_export($respuesta_1['color_mate'], true).'</pre>';exit;
                    $chart_data_1 =  json_encode($respuesta_1); 

                    
                ?>
            </div>
                <div class="col-md-6"><canvas id="myChart"></canvas></div>
                <div class="col-md-6 mt-5"><canvas id="myChart_1"></canvas></div>
        </section>
    </div>
</main>

<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $chart_data; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Porcentaje de estudiantes con dificultades',
                data: cData.datos,
                backgroundColor: [
                    //Por debajo
                    cData.color_lectura,

                    //Proceso
                    cData.color_escritura,

                    //Adecuado
                    cData.color_mate,

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
                    color: '#000000'
                },
                title: {
                    display: true,
                    text: "Dificultades encontradas por docentes por debajo de lo esperado"
                }
            }
        }
    });

</script>

<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $chart_data_1; ?>`);
    var ctx = document.getElementById('myChart_1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Porcentaje de estudiantes con dificultades',
                data: cData.datos,
                backgroundColor: [
                    //Por debajo
                    cData.color_lectura,

                    //Proceso
                    cData.color_escritura,

                    //Adecuado
                    cData.color_mate,
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
                    color: '#000000'
                },
                title: {
                    display: true,
                    text: "Dificultades de aprendizaje encontradas por debajo de lo esperado a partir de los diagnósticos aplicados"
                }
            }
        }
    });

</script>
<script>
    var nombre = JSON.parse(`<?php echo $nombre; ?>`);
    //Definimos el botón para escuchar su click
    const $boton = document.querySelector("#btnCapturar"), // El botón que desencadena
    $objetivo = document.getElementById("contenedor"); // A qué le tomamos la fotocanvas
    // Nota: no necesitamos contenedor, pues vamos a descargarla    

    // Agregar el listener al botón
    $boton.addEventListener("click", () => {
    html2canvas($objetivo) // Llamar a html2canvas y pasarle el elemento
        .then(canvas => {
        // Cuando se resuelva la promesa traerá el canvas
        // Crear un elemento <a>
        let enlace = document.createElement('a');
        enlace.download = "ANALISIS DE LA PRUEBA DE DIAGNÓSTICO - "+nombre+".png";
        
        // Convertir la imagen a Base64
        enlace.href = canvas.toDataURL();
        // Hacer click en él
        enlace.click();
        });
    });
</script>
