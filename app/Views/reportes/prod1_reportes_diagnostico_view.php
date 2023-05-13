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
                                        echo '<option value="'.$ce->amie.'">'.$ce->amie.' - '.$ce->nombre.'</option>';
                                    }
                                }else{
                                    echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-check">
                        <input class="form-radio-input" type="radio" value="dif_docentes" name="diagnostico" id="flexCheckDefault">
                        <label class="form-radio-label" for="flexCheckDefault">Dificultades encontradas por docentes</label>
                        
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="dif_diag_aplicado" name="diagnostico" id="flexCheckDefault" disabled>
                        <label class="form-check-label" for="flexCheckDefault">Dificultades de aprendizaje encontradas a partir de los diagnósticos aplicados</label>
                    </div>
                    <div class="form-check mt-3">
                        <input class="form-radio-input" type="radio" value="pie" name="tipo_grafico" id="flexCheckDefault" checked>
                        <label class="form-radio-label" for="flexCheckDefault">Pastel</label>
                        <input class="form-radio-input" type="radio" value="bar" name="tipo_grafico" id="flexCheckDefault">
                        <label class="form-radio-label" for="flexCheckDefault">Barras</label>
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
                label:  'Num Datos',
                data: cData.datos,
                backgroundColor: [
                    'rgba(118, 168, 134, 0.5)',
                    'rgba(186, 209, 188, 0.5)',
                    'rgba(45, 107, 53, 0.5)',
                    'rgba(150, 158, 255, 0.5)',
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