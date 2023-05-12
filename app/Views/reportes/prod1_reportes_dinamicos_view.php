<main class="container">
    <div class="container-fluid px-4">
        <h3 class="mt-4"><?= esc($title).' - REPORTES'; ?></h3>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-cash-register"></i>
                <?= esc("Reportes"); ?>
            </div>
            <div class="card-body" id="card-reportes"> 
                <form action="<?php echo base_url().'/recibe-tab';?>" method="post" id="form-subir-excel" enctype="multipart/form-data">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button 
                                class="nav-link active" 
                                id="registro-tab" 
                                data-bs-toggle="tab" 
                                data-bs-target="#registro" 
                                type="button" 
                                role="tab" 
                                aria-controls="registro" 
                                aria-selected="true">Registro
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button 
                                class="nav-link" 
                                id="docente-tab" 
                                data-bs-toggle="tab" 
                                data-bs-target="#docente" 
                                type="button" 
                                role="tab" 
                                aria-controls="docente" 
                                aria-selected="false">Diagnóstico docente
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button 
                                class="nav-link" 
                                id="asistencia-tab" 
                                data-bs-toggle="tab" 
                                data-bs-target="#asistencia" 
                                type="button" 
                                role="tab" 
                                aria-controls="asistencia" 
                                aria-selected="false">Asistencia
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button 
                                class="nav-link" 
                                id="myrp-tab" 
                                data-bs-toggle="tab" 
                                data-bs-target="#myrp" 
                                type="button" 
                                role="tab" 
                                aria-controls="myrp" 
                                aria-selected="false">Diagnóstico Lenguaje
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button 
                                class="nav-link" 
                                id="myrp-tab" 
                                data-bs-toggle="tab" 
                                data-bs-target="#myrp" 
                                type="button" 
                                role="tab" 
                                aria-controls="myrp" 
                                aria-selected="false">Evaluación Matemáticas
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button 
                                class="nav-link" 
                                id="myrp-tab" 
                                data-bs-toggle="tab" 
                                data-bs-target="#myrp" 
                                type="button" 
                                role="tab" 
                                aria-controls="myrp" 
                                aria-selected="false">Evaluación Matemáticas Final
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- REGISTRO -->
                        <div class="tab-pane fade show active" id="registro" role="tabpanel" aria-labelledby="registro-tab">
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
                            <div class="col-md-2 mb-3">
                                <label for="amie">Centro educativo:</label>
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="cohorte"
                                    id="select_info"  
                                >   
                                    <option value="NULL" selected>Cohorte</option>
                                    <option value="PRIMERA COHORTE" >PRIMERA COHORTE</option>
                                    <option value="SEGUNDA COHORTE" >SEGUNDA COHORTE</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="amie">Nacionalidad:</label>
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="nacionalidad"
                                    id="select_info"  
                                >   
                                    <option value="NULL" selected>Nacionalidad</option>
                                    <?php
                                        if ($nacionalidades != NULL && isset($nacionalidades) ) {
                                            foreach ($nacionalidades as $key => $nacionalidad) {
                                                echo '<option value="'.$nacionalidad->nacionalidad.'">'.$nacionalidad->nacionalidad.'</option>';
                                            }
                                        }else{
                                            echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="etnia" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Etnia</label>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="amie">Género:</label>
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="genero"
                                    id="select_info"  
                                >   
                                    <option value="NULL" selected>Género</option>
                                    <?php
                                        if ($genero != NULL && isset($genero) ) {
                                            foreach ($genero as $key => $g) {
                                                echo '<option value="'.$g->genero.'">'.$g->genero.'</option>';
                                            }
                                        }else{
                                            echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="amie">Centro educativo:</label>
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="cohorte"
                                    id="select_info"  
                                >   
                                    <option value="NULL" selected>Cohorte</option>
                                    <option value="PRIMERA COHORTE" >PRIMERA COHORTE</option>
                                    <option value="SEGUNDA COHORTE" >SEGUNDA COHORTE</option>
                                </select>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="discapacidad" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Discapacidad</label>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="amie">Añio EGB:</label>
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="cursos"
                                    id="select_info"  
                                >  
                                    <option value="NULL" selected>Año de EGB</option>
                                    <?php
                                        if ($cursos != NULL && isset($cursos) ) {
                                            foreach ($cursos as $key => $curso) {
                                                echo '<option value="'.$curso->id.'">'.$curso->curso.'</option>';
                                            }
                                        }else{
                                            echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- DIAGNOSTICO DOCENTE -->
                        <div class="tab-pane fade" id="docente" role="tabpanel" aria-labelledby="docente-tab">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="escritura" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Escritura</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="lectura" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Lectura</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="matematica" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Matemáticas</label>
                            </div>
                        </div>

                        <!-- ASISTENCIA -->
                        <div class="tab-pane fade" id="asistencia" role="tabpanel" aria-labelledby="asistencia-tab">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="dias_atencion" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Días atención</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="horas_planificadas" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Horas planificadas</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="horas_efectivas" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Horas efectivas</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="horas_perdidas" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Horas perdidas</label>
                            </div>
                        </div>

                        <!-- DIAGNOSTICO LENGUAJE -->
                        <div class="tab-pane fade" id="myrp" role="tabpanel" aria-labelledby="myrp-tab">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="necesito_apoyo" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Necesitó apoyo</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="p1_comprension_lectora" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">P1 - Comprensión consigna lectora</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="p1_inteligibilidad" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">P1 - Significado de la escritura y la Inteligibilidad</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="p2_comprension_lectora" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">P2 - Comprensión consigna lectora:</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="p3_comprension_lectora" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">P3 - Comprensión consigna lectora:</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="p3_inteligibilidad" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">P3 - Inteligibilidad:</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="p3_coherencia" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">P3 - Coherencia:</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="p3_coherencia" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">P3 - Coherencia:</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="p3_sintaxis" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">P3 - Sintáxis:</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="p3_estandares_egb_sub2y3" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">P3 - Estándares EGB Subnivel 2 y 3:</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="p4_comprension_lectora" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">P4 - Comprensión consigna lectora:</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="p4_inteligibilidad" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">P4 - Inteligibilidad:</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="p4_coherencia" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">P4 - Coherencia:</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="p4_sintaxis" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">P4 - Sintáxis:</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="p4_estandares_egb_sub2y3" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">P4 - Estándares EGB Subnivel 2 y 3:</label>
                            </div>
                        </div>

                        <!-- DIAGNOSTICO MATEMÁTICAS -->
                        <div class="tab-pane fade" id="myrp" role="tabpanel" aria-labelledby="myrp-tab">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="dato3" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Evaluación Matemáticas
                                </label>
                            </div>
                        </div>

                        <!-- DIAGNOSTICO MATEMÁTICAS FINAL -->
                        <div class="tab-pane fade" id="myrp" role="tabpanel" aria-labelledby="myrp-tab">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="dato3" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Evaluación Matemáticas Final
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Generar reporte</button>
                </form>         
            </div>
            <section>
                <div class="col-md-03" style="width: 400px;">
                    <canvas id="myChart" width="300" height="300"></canvas>
                </div>
            </section>
        </div>
    </div>
</main>
<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $chart_data; ?>`);
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Num Datos',
                data: cData.datos,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }
        ]
        },
        options: {
            scales:{
                aspectRatio: 1,
                y:[{
                    ticks:{
                        beginAtZero:true
                    }
                }],
                x: {
                    
                    max: 300
                },
                y: {
                    min: 0,
                    max: 100
                }
            }
        }
    });
    
</script>