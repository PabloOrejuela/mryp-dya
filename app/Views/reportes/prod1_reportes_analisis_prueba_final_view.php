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
        <h3 class="mt-4"><?= esc($title).' - REPORTES'; ?></h3>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-cash-register"></i>
                <?= esc("ANÁLISIS DE LA PRUEBA FINAL CON LA INTERVENCIÓN DEL PROGRAMA"); ?>
            </div>
            <div class="card-body" id="card-reportes"> 
                <form action="<?php echo base_url().'/recibe-eval-prueba-final-tab';?>" method="post" id="form">
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
                    
                    <button type="submit" class="btn btn-success">Generar reporte</button>
                </form>
            </div>
        <section>
            <h4>ANÁLISIS DE LA PRUEBA FINAL CON LA INTERVENCIÓN DEL PROGRAMA</h4>
            <div class="col-md-12" style="font-size:0.7em;text-align:center;">
                <div class="contenedor mb-3 mt-3">
                    <table class="table table-bordered tabla-codigos-eval col-md-6">
                        <thead>
                            <th colspan="8">
                                <?php
                                    if ($centro != NULL && isset($centro)) {
                                        echo 'Centro educativo '.$centro->nombre;
                                    }else{
                                        echo 'CENTRO EDUCATIVO';
                                    }
                                ?>
                            </th>
                        </thead>
                        <thead>
                            <th id="cabecera">No</th>
                            <th id="cabecera">Nombres del estudiante</th>
                            <th id="cabecera">Apellidos del estudiante</th>
                            <th id="cabecera">Año EGB</th>
                            <th id="cabecera">Lectura</th>
                            <th id="cabecera">Escritura</th>
                            <th id="cabecera">Matemática Elemental</th>
                            <th id="cabecera">Matemáticas Superior</th>
                        </thead>
                        <tbody>
                            <?php
                                use App\Models\EvalFinalP1Model;
                                use App\Models\EvalMateFinalP1Model;
                                use App\Models\EvalMateFinalElementalP1Model;
                                $this->evalMateFinalP1 = new EvalMateFinalP1Model();
                                $this->evalMateFinalElemP1 = new EvalMateFinalElementalP1Model();
                                $this->evalFinalP1 = new EvalFinalP1Model();
                                $this->db = \Config\Database::connect();

                                $num = 1;
                                if ($registros != NULL && isset($registros)) {
                                    foreach ($registros as $key => $value) {
                                        $eval_final = $this->evalFinalP1->_getEvalFinal($value->id);
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
                                                echo '<td id="codigo_3">'.$value->anio_egb.'</td>';
                                            }

                                            //Eval final de lectura y escritura
                                            if (isset($eval_final) && $eval_final != NULL) {
                                                //Diagnóstico MYRP Lectura
                                                if ($eval_final->necesito_apoyo == 'SI') {
                                                    echo '<td id="codigo_3">SI</td>';
                                                }else{
                                                    echo '<td id="codigo_4">NO</td>';
                                                    //Si no necesitó apoyo le calculo
                                                    // $valor_lectura = 0;

                                                    // if ($eval_final->p1_comprension_lectora == 'A') {
                                                    //     $valor_lectura += 0;
                                                    // }else if($eval_final->p1_comprension_lectora == 'B'){
                                                    //     $valor_lectura += 1;
                                                    // }

                                                    // if ($eval_final->p2_comprension_lectora == 'A') {
                                                    //     $valor_lectura += 0;
                                                    // }else if($eval_final->p2_comprension_lectora == 'B'){
                                                    //     $valor_lectura += 1;
                                                    // }

                                                    // if ($eval_final->p3_comprension_lectora == 'A') {
                                                    //     $valor_lectura += 0;
                                                    // }else if($eval_final->p3_comprension_lectora == 'B'){
                                                    //     $valor_lectura += 1;
                                                    // }else if($eval_final->p3_comprension_lectora == 'C'){
                                                    //     $valor_lectura += 2;
                                                    // }

                                                    // if ($eval_final->p4_comprension_lectora == 'A') {
                                                    //     $valor_lectura += 0;
                                                    // }else if($eval_final->p4_comprension_lectora == 'B'){
                                                    //     $valor_lectura += 1;
                                                    // }else if($eval_final->p4_comprension_lectora == 'C'){
                                                    //     $valor_lectura += 2;
                                                    // }

                                                    // if ($valor_lectura > 0 && $valor_lectura <= 2) {
                                                    //     echo '<td id="codigo_3">'.$valor_lectura.'</td>';
                                                    // }else if($valor_lectura > 3 && $valor_lectura <= 5){
                                                    //     echo '<td id="codigo_4">'.$valor_lectura.'</td>';
                                                    // }else if($valor_lectura > 5 && $valor_lectura <= 7){
                                                    //     echo '<td id="codigo_5">'.$valor_lectura.'</td>';
                                                    // }else{
                                                    //     echo '<td id="codigo_1">'.$valor_lectura.'</td>';
                                                    // }

                                                }


                                                //Diagnóstico MYRP Escritura
                                                //Cálculo el valor de Escritura
                                                $valor_escritura = 0;
                                                if ($eval_final->p1_inteligibilidad == 'A') {
                                                    $valor_escritura += 0;
                                                }else if($eval_final->p1_inteligibilidad == 'B'){
                                                    $valor_escritura += 1;
                                                }

                                                if ($eval_final->p3_inteligibilidad == 'A') {
                                                    $valor_escritura += 0;
                                                }else if($eval_final->p3_inteligibilidad == 'B'){
                                                    $valor_escritura += 1;
                                                }else if($eval_final->p3_inteligibilidad == 'C'){
                                                    $valor_escritura += 2;
                                                }

                                                if ($eval_final->p3_coherencia == 'A') {
                                                    $valor_escritura += 0;
                                                }else if($eval_final->p3_coherencia == 'B'){
                                                    $valor_escritura += 1;
                                                }else if($eval_final->p3_coherencia == 'C'){
                                                    $valor_escritura += 2;
                                                }else if($eval_final->p3_coherencia == 'D'){
                                                    $valor_escritura += 3;
                                                }

                                                if ($eval_final->p3_sintaxis == 'A') {
                                                    $valor_escritura += 0;
                                                }else if($eval_final->p3_sintaxis == 'B'){
                                                    $valor_escritura += 1;
                                                }else if($eval_final->p3_sintaxis == 'C'){
                                                    $valor_escritura += 2;
                                                }else if($eval_final->p3_sintaxis == 'D'){
                                                    $valor_escritura += 3;
                                                }

                                                if ($eval_final->p3_estandares_egb_sub2y3 == 'A') {
                                                    $valor_escritura += 0;
                                                }else if($eval_final->p3_estandares_egb_sub2y3 == 'B'){
                                                    $valor_escritura += 1;
                                                }

                                                if ($eval_final->p4_inteligibilidad == 'A') {
                                                    $valor_escritura += 0;
                                                }else if($eval_final->p4_inteligibilidad == 'B'){
                                                    $valor_escritura += 1;
                                                }

                                                if ($eval_final->p4_coherencia == 'A') {
                                                    $valor_escritura += 0;
                                                }else if($eval_final->p4_coherencia == 'B'){
                                                    $valor_escritura += 1;
                                                }else if($eval_final->p4_coherencia == 'C'){
                                                    $valor_escritura += 2;
                                                }else if($eval_final->p4_coherencia == 'D'){
                                                    $valor_escritura += 3;
                                                }

                                                if ($eval_final->p4_sintaxis == 'A') {
                                                    $valor_escritura += 0;
                                                }else if($eval_final->p4_sintaxis == 'B'){
                                                    $valor_escritura += 1;
                                                }else if($eval_final->p4_sintaxis == 'C'){
                                                    $valor_escritura += 2;
                                                }else if($eval_final->p4_sintaxis == 'D'){
                                                    $valor_escritura += 3;
                                                }

                                                if ($eval_final->p4_estandares_egb_sub2y3 == 'A') {
                                                    $valor_escritura += 0;
                                                }else if($eval_final->p4_estandares_egb_sub2y3 == 'B'){
                                                    $valor_escritura += 1;
                                                }

                                                $rango_escritura = ($valor_escritura * 100) / 18;

                                                if ($rango_escritura > 0 && $rango_escritura <= 33) {
                                                    echo '<td id="codigo_3">1</td>';
                                                }else if($rango_escritura > 33 && $rango_escritura <= 66){
                                                    echo '<td id="codigo_4">2</td>';
                                                }else if($rango_escritura > 66){
                                                    echo '<td id="codigo_5">3</td>';
                                                }else{
                                                    echo '<td id="codigo_1">0</td>';
                                                }

                                            }else{
                                                echo '<td id="codigo_1"></td>';
                                                echo '<td id="codigo_1"></td>';
                                            }
                                            
                                            //Cálculo el valor de Matemática
                                            $superior = $this->evalMateFinalP1->_getEvalMateFinal($value->id);
                                            //echo $this->db->getLastQuery();
                                            $elemental = $this->evalMateFinalElemP1->_getEvalMateFinalElem($value->id);
                                            $valor_matematica = 0;

                                            if(isset($elemental) && $elemental != NULL) {
                                                $valor_matematica = $this->evalMateFinalElemP1->_getEvalFinalMateElementalP1($value->id);

                                                $rango_mate = ($valor_matematica * 100) / 20;

                                                if ($rango_mate > 0 && $rango_mate <= 33) {
                                                    echo '<td id="codigo_3">1</td>';
                                                }else if($rango_mate > 33 && $rango_mate <= 66){
                                                    echo '<td id="codigo_4">2</td>';
                                                }else if($rango_mate > 66){
                                                    echo '<td id="codigo_5">3</td>';
                                                }else{
                                                    echo '<td id="codigo_1">0</td>';
                                                }

                                            }else{
                                                echo '<td id="codigo_1"></td>';
                                            }

                                            if (isset($superior) && $superior != NULL) {
                                                $valor_matematica_sup = $this->evalMateFinalP1->_getEvalMateFinalP1($value->id);

                                                $rango_mate_sup = ($valor_matematica_sup * 100) / 20;

                                                if ($rango_mate_sup > 0 && $rango_mate_sup <= 33) {
                                                    echo '<td id="codigo_3">1</td>';
                                                }else if($rango_mate_sup > 33 && $rango_mate_sup <= 66){
                                                    echo '<td id="codigo_4">2</td>';
                                                }else if($rango_mate_sup > 66){
                                                    echo '<td id="codigo_5">3</td>';
                                                }else{
                                                    echo '<td id="codigo_1">0</td>';
                                                }

                                            }else{
                                                echo '<td id="codigo_1"></td>';
                                            }

                                            echo '</tr>';
                                        $num++;
                                    }
                                }else{
                                    echo '<tr><td colspan="8">AUN NO HAY REGISTROS QUE MOSTRAR</td></tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</main>
