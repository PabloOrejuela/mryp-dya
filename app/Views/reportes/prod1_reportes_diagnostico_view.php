<main class="container">
    <div class="container-fluid px-4">
        <h3 class="mt-4"><?= esc($title).' - REPORTES'; ?></h3>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-cash-register"></i>
                <?= esc("Reportes"); ?>
            </div>
            <div class="card-body" id="card-reportes"> 
                
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
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
                                class="nav-link active" 
                                id="diagnostico-tab" 
                                data-bs-toggle="tab" 
                                data-bs-target="#diagnostico" 
                                type="button" 
                                role="tab" 
                                aria-controls="diagnostico" 
                                aria-selected="true">Diagnóstico
                            </button>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- ASISTENCIA -->
                        <div class="tab-pane fade show active" id="asistencia" role="tabpanel" aria-labelledby="asistencia-tab">
                        <form action="<?php echo base_url().'/recibe-asistencia-tab';?>" method="post" id="form">
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
                            <!-- Reporte -->
                            
                                <button type="submit" class="btn btn-success">Generar reporte</button>
                            </form> 
                        </div>

                        <div class="tab-pane fade" id="diagnostico" role="tabpanel" aria-labelledby="diagnostico-tab">
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
                                                    echo '<option value="'.$ce->amie.'">'.$ce->amie.' - '.$ce->nombre.'</option>';
                                                }
                                            }else{
                                                echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="dif_docentes" name="diagnostico" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Dificultades encontradas por docentes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="dif_diag_aplicado" name="diagnostico" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Dificultades de aprendizaje encontradas a partir de los diagnósticos aplicados</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="diagnostico" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Horas perdidas</label>
                            </div>
                            <button type="submit" class="btn btn-success">Generar reporte</button>
                            </form>
                        </div>
                    </div>    
            </div>
        </div>
        <section>
        
            <div class="col-md-06" style="width: 600px;">
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
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Num Datos',
                data: cData.datos,
                backgroundColor: [
                    'rgba(118, 168, 134, 0.5)',
                    'rgba(186, 209, 188, 0.5)',
                    'rgba(45, 107, 53, 0.5)',
                    'rgba(150, 158, 151, 0.5)',
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