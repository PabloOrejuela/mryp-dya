<style>
    #codigo_0{
        background-color:#ffffff;
        text-align: center;
    }
    #codigo_1{
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
                    <table class="table table-bordered tabla-codigos-eval col-md-6">
                        <thead>
                            <th colspan="10">
                                <?php
                                    if ($centro != NULL && isset($centro)) {
                                        echo 'Centro educativo '.$centro->nombre.' - '.$cohorte;
                                    }else{
                                        echo 'CENTRO EDUCATIVO';
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
                                $this->evalMateP1 = new EvalMateP1Model();
                                $this->evalMateElemP1 = new EvalMateElementalP1Model();
                                $this->diagDocenteP1 = new DiagnosticoDocenteP1Model();
                                $this->diagMyrpP1 = new DiagnosticoMyrpP1Model();
                                
                                $num = 1;
                                if ($registros != NULL && isset($registros)) {
                                    foreach ($registros as $key => $value) {
                                        $diag_docente = $this->diagDocenteP1->_getDiagDocente($value->id);
                                        $diag_myrp = $this->diagMyrpP1->_getDiagMyrpP1($value->id);
                                        
                                        echo '<tr>
                                            <td>'.$num.'</td>
                                            <td>'.$value->nombres.'</td>
                                            <td>'.$value->apellidos.' '.$value->id.'</td>';
    
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
                                                    echo '<td id="codigo_2">'.$diag_docente->lectura.'</td>';
                                                }else{
                                                    echo '<td id="codigo_3">'.$diag_docente->lectura.'</td>';
                                                }
                                                if ($diag_docente->escritura == 'SI') {
                                                    echo '<td id="codigo_2">'.$diag_docente->escritura.'</td>';
                                                }else{
                                                    echo '<td id="codigo_3">'.$diag_docente->escritura.'</td>';
                                                }
                                                if ($diag_docente->matematica == 'SI') {
                                                    echo '<td id="codigo_2">'.$diag_docente->matematica.'</td>';
                                                }else{
                                                    echo '<td id="codigo_3">'.$diag_docente->matematica.'</td>';
                                                }
                                            }else{
                                                echo '<td id="codigo_1">No aplica</td>';
                                                echo '<td id="codigo_1">No aplica</td>';
                                                echo '<td id="codigo_1">No aplica</td>';
                                            }
                                            
                                            if (isset($diag_myrp) && $diag_myrp != NULL) {
                                                //Diagnóstico MYRP Lectura
                                                if ($diag_myrp->necesito_apoyo == 'SI') {
                                                    echo '<td id="codigo_2">'.$diag_myrp->necesito_apoyo.'</td>';
                                                }else{
                                                    echo '<td id="codigo_3">'.$diag_myrp->necesito_apoyo.'</td>';
                                                }

                                                //Diagnóstico MYRP Escritura
                                                //Cálculo el valor de Escritura
                                                $valor_escritura = 0;
                                                if ($diag_myrp->p1_inteligibilidad == 'A') {
                                                    $valor_escritura += 0;
                                                }else if($diag_myrp->p1_inteligibilidad == 'B'){
                                                    $valor_escritura += 1;
                                                }

                                                if ($diag_myrp->p3_inteligibilidad == 'A') {
                                                    $valor_escritura += 0;
                                                }else if($diag_myrp->p3_inteligibilidad == 'B'){
                                                    $valor_escritura += 1;
                                                }else if($diag_myrp->p3_inteligibilidad == 'C'){
                                                    $valor_escritura += 2;
                                                }

                                                if ($diag_myrp->p3_coherencia == 'A') {
                                                    $valor_escritura += 0;
                                                }else if($diag_myrp->p3_coherencia == 'B'){
                                                    $valor_escritura += 1;
                                                }else if($diag_myrp->p3_coherencia == 'C'){
                                                    $valor_escritura += 2;
                                                }else if($diag_myrp->p3_coherencia == 'D'){
                                                    $valor_escritura += 3;
                                                }

                                                if ($diag_myrp->p3_sintaxis == 'A') {
                                                    $valor_escritura += 0;
                                                }else if($diag_myrp->p3_sintaxis == 'B'){
                                                    $valor_escritura += 1;
                                                }else if($diag_myrp->p3_sintaxis == 'C'){
                                                    $valor_escritura += 2;
                                                }else if($diag_myrp->p3_sintaxis == 'D'){
                                                    $valor_escritura += 3;
                                                }

                                                if ($diag_myrp->p3_estandares_egb_sub2y3 == 'A') {
                                                    $valor_escritura += 0;
                                                }else if($diag_myrp->p3_estandares_egb_sub2y3 == 'B'){
                                                    $valor_escritura += 1;
                                                }

                                                if ($diag_myrp->p4_inteligibilidad == 'A') {
                                                    $valor_escritura += 0;
                                                }else if($diag_myrp->p4_inteligibilidad == 'B'){
                                                    $valor_escritura += 1;
                                                }

                                                if ($diag_myrp->p4_coherencia == 'A') {
                                                    $valor_escritura += 0;
                                                }else if($diag_myrp->p4_coherencia == 'B'){
                                                    $valor_escritura += 1;
                                                }else if($diag_myrp->p4_coherencia == 'C'){
                                                    $valor_escritura += 2;
                                                }else if($diag_myrp->p4_coherencia == 'D'){
                                                    $valor_escritura += 3;
                                                }

                                                if ($diag_myrp->p4_sintaxis == 'A') {
                                                    $valor_escritura += 0;
                                                }else if($diag_myrp->p4_sintaxis == 'B'){
                                                    $valor_escritura += 1;
                                                }else if($diag_myrp->p4_sintaxis == 'C'){
                                                    $valor_escritura += 2;
                                                }else if($diag_myrp->p4_sintaxis == 'D'){
                                                    $valor_escritura += 3;
                                                }

                                                if ($diag_myrp->p4_estandares_egb_sub2y3 == 'A') {
                                                    $valor_escritura += 0;
                                                }else if($diag_myrp->p4_estandares_egb_sub2y3 == 'B'){
                                                    $valor_escritura += 1;
                                                }

                                                if ($valor_escritura > 0 && $valor_escritura <= 10) {
                                                    echo '<td id="codigo_2">'.$valor_escritura.'</td>';
                                                }else if($valor_escritura > 10 && $valor_escritura <= 20){
                                                    echo '<td id="codigo_3">'.$valor_escritura.'</td>';
                                                }else if($valor_escritura > 20 && $valor_escritura <= 25){
                                                    echo '<td id="codigo_4">'.$valor_escritura.'</td>';
                                                }else if($valor_escritura > 25){
                                                    echo '<td id="codigo_5">'.$valor_escritura.'</td>';
                                                }else{
                                                    echo '<td id="codigo_2">'.$valor_escritura.'</td>';
                                                }
                                            }else{
                                                echo '<td id="codigo_1"></td>';
                                                echo '<td id="codigo_1"></td>';
                                            }

                                            
    
                                            //Cálculo el valor de Matemática
                                            $superior = $this->evalMateP1->find($value->id);
                                            $elemental = $this->evalMateElemP1->find($value->id);
                                            //echo '<pre>'.var_export($elemental, true).'</pre>';exit;
                                            $valor_matematica = 0;
                                            if(isset($elemental) && $elemental != NULL) {
                                                $valor_matematica = $this->evalMateElemP1->_getEvalMateElementalP1($value->id);

                                                if ($valor_matematica > 0 && $valor_matematica <= 10) {
                                                    echo '<td id="codigo_2">'.$valor_matematica.'</td>';
                                                }else if($valor_matematica > 10 && $valor_matematica <= 20){
                                                    echo '<td id="codigo_3">'.$valor_matematica.'</td>';
                                                }else if($valor_matematica > 20 && $valor_matematica <= 25){
                                                    echo '<td id="codigo_4">'.$valor_matematica.'</td>';
                                                }else if($valor_matematica > 25){
                                                    echo '<td id="codigo_5">'.$valor_matematica.'</td>';
                                                }else{
                                                    echo '<td id="codigo_2">'.$valor_matematica.'</td>';
                                                }

                                            }else{
                                                echo '<td id="codigo_1">No aplica</td>';
                                            }

                                            if (isset($superior) && $superior != NULL) {
                                                $valor_matematica = $this->evalMateP1->_getEvalMateP1($value->id);

                                                if ($valor_matematica > 0 && $valor_matematica <= 10) {
                                                    echo '<td id="codigo_2">'.$valor_matematica.'</td>';
                                                }else if($valor_matematica > 10 && $valor_matematica <= 20){
                                                    echo '<td id="codigo_3">'.$valor_matematica.'</td>';
                                                }else if($valor_matematica > 20 && $valor_matematica <= 25){
                                                    echo '<td id="codigo_4">'.$valor_matematica.'</td>';
                                                }else if($valor_matematica > 25){
                                                    echo '<td id="codigo_5">'.$valor_matematica.'</td>';
                                                }else{
                                                    echo '<td id="codigo_2">'.$valor_matematica.'</td>';
                                                }

                                            }else{
                                                echo '<td id="codigo_1">No aplica</td>';
                                            }
                                            
                                            echo '</tr>';
                                        $num++;
                                    }
                                }else{
                                    echo '<tr><td colspan="10">AUN NO HAY REGISTROS QUE MOSTRAR</td></tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</main>
