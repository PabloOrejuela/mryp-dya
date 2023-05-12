<style>
    #codigo_0{
        background-color:#edf0ee;
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
                <?= esc("ANÁLISIS DE LA PRUEBA FINAL CON LA INTERVENCIÓN DEL PROGRAMA"); ?>
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
                                        echo '<option value="'.$ce->amie.'">'.$ce->amie.' - '.$ce->nombre.'</option>';
                                    }
                                }else{
                                    echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
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
                                    <td id="codigo_3">En proceso</td>
                                    <td id="codigo_3">Mediación escolar no es básica para la enseñanza de la escritura de acuerdo con la edad</td>
                                </tr>
                                <tr>
                                    <td id="codigo_4">21 - 25</td>
                                    <td id="codigo_4">Adecuado</td>
                                    <td id="codigo_4">Mediación escolar es adecuada para la enseñanza de la escritura de acuerdo con la edad</td>
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
            <h4>ANÁLISIS DE LA PRUEBA FINAL CON LA INTERVENCIÓN DEL PROGRAMA</h4>
            <div class="col-md-9" style="width: 800px;font-size:0.8em;text-align:center;">
                <div class="contenedor mb-3 mt-3">
                    <table class="table table-bordered tabla-codigos-eval col-md-6">
                        <thead>
                            <th colspan="7">
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
                            <th id="cabecera" colspan="4"></th>
                            <th id="cabecera" colspan="3">Dificultades en el aprendizaje seleccionado por docentes</th>
                            <th id="cabecera" colspan="3">Dificultades encontradas en las pruebas de diagnóstico aplicadas</th>
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
                            <th id="cabecera">Matemáticas</th>
                        </thead>
                        <tbody>
                            <?php
                                $num = 1;
                                if ($registros != NULL && isset($registros)) {
                                    foreach ($registros as $key => $value) {
                                        echo '<tr>
                                            <td>'.$num.'</td>
                                            <td>'.$value->nombres.'</td>
                                            <td>'.$value->apellidos.'</td>';
    
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
                                            
                                        echo '<td id="codigo_1"></td>
                                            <td id="codigo_1"></td>
                                            <td id="codigo_1"></td>

                                            <td id="codigo_1"></td>
                                            <td id="codigo_1"></td>
                                            <td id="codigo_1"></td>
                                        </tr>';
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
