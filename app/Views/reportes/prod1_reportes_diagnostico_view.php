<main class="container">
    <div class="container-fluid px-4">
        <h3 class="mt-4"><?= esc($title).' - REPORTES'; ?></h3>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-cash-register"></i>
                <?= esc("Reporte de Diagnóstico Docente"); ?>
            </div>
            <div class="card-body" id="card-reportes"> 
                <form action="<?php echo base_url().'/recibe-diagnostico-tab';?>" method="post" id="form">
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
                    <?php
                        if ($diagnostico == 'dif_docentes') {
                            echo '
                                <div class="form-check">
                                    <input class="form-radio-input" type="radio" value="dif_docentes" name="diagnostico" id="flexRadioDefault" checked>
                                    <label class="form-radio-label" for="flexRadioDefault">Dificultades encontradas por docentes</label>
                                    
                                </div>
                                <div class="form-check">
                                    <input class="form-radio-input" type="radio" value="dif_diag_aplicado" name="diagnostico" id="flexRadioDefault">
                                    <label class="form-radio-label" for="flexRadioDefault">Dificultades de aprendizaje encontradas a partir de los diagnósticos aplicados</label>
                                </div>
                            ';

                        }else{
                            echo '
                                <div class="form-check">
                                    <input class="form-radio-input" type="radio" value="dif_docentes" name="diagnostico" id="flexRadioDefault">
                                    <label class="form-radio-label" for="flexRadioDefault">Dificultades encontradas por docentes</label>
                                    
                                </div>
                                <div class="form-check">
                                    <input class="form-radio-input" type="radio" value="dif_diag_aplicado" name="diagnostico" id="flexRadioDefault" checked>
                                    <label class="form-radio-label" for="flexRadioDefault">Dificultades de aprendizaje encontradas a partir de los diagnósticos aplicados</label>
                                </div>
                            ';
                        }
                    ?>
                    <div class="form-check mt-3">
                        <input class="form-radio-input" type="radio" value="pie" name="tipo_grafico" id="flexRadioDefault" checked>
                        <label class="form-radio-label" for="flexRadioDefault">Pastel</label>
                        <input class="form-radio-input" type="radio" value="bar" name="tipo_grafico" id="flexRadioDefault">
                        <label class="form-radio-label" for="flexRadioDefault">Barras</label>
                    </div>
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
                    <button type="submit" class="btn btn-success mt-3">Generar reporte</button>
                </form>   
            </div>
        </div>
        <section>
        
            <div class="col-md-06" style="width: 600px;">
                <label style="text-align:center;" for="myChart">Centro educativo: 
                    <?php
                        if ($centro != NULL && isset($centro)) {
                            echo $centro->nombre. ' ' .$centro->amie ;
                        }else{
                            echo "CENTRO EDUCATIVO";
                        }
                    ?>
                </label>
                <canvas id="myChart"></canvas>
            </div>
        </section>
    </div>
</main>
<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $chart_data; ?>`);
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: ""+cData.tipoGrafico,
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Porcentaje de estudiantes con dificultades',
                data: cData.datos,
                backgroundColor: [
                    'rgba(118, 168, 134, 0.5)',
                    'rgba(186, 209, 188, 0.5)',
                    'rgba(145, 107, 53, 0.5)',
                    'rgba(5, 17, 3, 0.2)',
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
                    text: 'Dificultades encontradas por docentes (% en porcentajes)'
                }
            }
        }
    });

</script>