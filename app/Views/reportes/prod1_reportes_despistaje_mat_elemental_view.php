<main class="container">
    <div class="container-fluid px-4">
        <h3 class="mt-4"><?= esc($title).' - REPORTES'; ?></h3>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-cash-register"></i>
                <?= esc("Prueba Despistaje Matemáticas"); ?>
            </div>
            <div class="card-body" id="card-reportes"> 
                <form action="<?php echo base_url().'/recibe-despistaje-mat-tab';?>" method="post" id="form">
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
                    <div class="col-md-4 mb-2">
                        <label for="apoyo" class="mb-2">Tipo de prueba:</label>
                        <div class="col-sm-8">
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="tipo_prueba" 
                                id="select-pregunta"  
                            >
                            
                                <?php
                                    if ($tipo_prueba == 1) {
                                        echo '<option value="0">Elija un tipo de prueba</option>';
                                        echo '<option value="1" selected>Prueba Elemental</option>';
                                        echo '<option value="2">Prueba Media/Superior</option>';
                                    }else if($tipo_prueba == 2){
                                        echo '<option value="0">Elija un tipo de prueba</option>';
                                        echo '<option value="1">Prueba Elemental</option>';
                                        echo '<option value="2" selected>Prueba Media/Superior</option>';

                                    }else{
                                        echo '<option value="0" selected>Elija un tipo de prueba</option>';
                                        echo '<option value="1">Prueba Elemental</option>';
                                        echo '<option value="2">Prueba Media/Superior</option>';
                                    }
                                ?>
                            
                            </select>
                            <p id="error-message"><?= session('errors.tipo_prueba_mate');?> </p>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Generar reporte</button>
                </form>   
            </div>
        </div>
        <section>
            <div class="col-md-08" style="width: 900px;">
            <label 
                    style="text-align:center;" 
                    for="myChart">Centro educativo:
                        <?php
                            if ($centro != NULL && isset($centro)) {
                                echo $centro->nombre. ' ' .$centro->amie ;
                            }else{
                                echo "CENTRO EDUCATIVO";
                            }
                        ?>
                </label>
                <table class="table table-bordered" >
                    <thead>
                        <th>Relación Figuras Geométricas</th>
                        <th>Seriación</th>
                        <th>Conjuntos</th>
                        <th>Seriación</th>
                        <th>Orientación Espacial</th>
                        <th>Esquema Corporal</th>
                        <th>Seriación</th>
                        <th>Suma</th>
                        <th>Resta</th>
                        <th>Multiplicación</th>
                        <th>División</th>
                        <th>Sin dato</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background-color:rgba(118, 168, 134, 0.5);"></td>
                            <td style="background-color:rgba(130, 108, 134, 0.5);"></td>
                            <td style="background-color:rgba(130, 108, 64, 0.5);"></td>
                            <td style="background-color:rgba(100, 108, 194, 0.5);"></td>
                            <td style="background-color:rgba(50, 255, 64, 0.5);"></td>
                            <td style="background-color:rgba(150, 205, 64, 0.5);"></td>
                            <td style="background-color:rgba(100, 108, 104, 0.5);"></td>
                            <td style="background-color:rgba(100, 65, 64, 0.5);"></td>
                            <td style="background-color:rgba(100, 205, 164, 0.5);"></td>
                            <td style="background-color:rgba(100, 205, 4, 0.5);"></td>
                            <td style="background-color:rgba(110, 45, 40, 0.5);"></td>
                            <td style="background-color:rgba(100, 100, 100, 0.5);"></td>
                        </tr>
                    </tbody>
                </table>
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
        type: "bar",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Número de registros: '+ cData.total,
                data: cData.datos,
                backgroundColor: [

                    //Relación Figuras Geométricas
                    'rgba(118, 168, 134, 0.5)',
                    'rgba(118, 168, 134, 0.5)',

                    //Seriación
                    'rgba(130, 108, 134, 0.5)',

                    //Conjuntos
                    'rgba(130, 108, 64, 0.5)',

                    //Seriación
                    'rgba(100, 108, 194, 0.5)',

                    //Orientación Espacial
                    'rgba(50, 255, 64, 0.5)',
                    'rgba(50, 255, 64, 0.5)',
                    'rgba(50, 255, 64, 0.5)',

                    //Esquema Corporal
                    'rgba(150, 205, 64, 0.5)',
                    'rgba(150, 205, 64, 0.5)',
                    'rgba(150, 205, 64, 0.5)',

                    //Seriación
                    'rgba(100, 108, 104, 0.5)',

                    //Suma
                    'rgba(100, 65, 64, 0.5)',
                    'rgba(100, 65, 64, 0.5)',

                    //Resta
                    'rgba(100, 205, 164, 0.5)',
                    'rgba(100, 205, 164, 0.5)',

                    //Multiplicación
                    'rgba(100, 205, 4, 0.5)',
                    'rgba(100, 205, 4, 0.5)',

                    //División
                    'rgba(110, 45, 40, 0.5)',
                    'rgba(110, 45, 40, 0.5)',

                    'rgba(100, 100, 100, 0.5)',


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
                    max: 30
                }
            },
            plugins: {
                // Change options for ALL labels of THIS CHART
                datalabels: {
                    color: '#000000'
                },
                title: {
                    display: true,
                    text: 'Prueba Despistaje Matemáticas. Errores frecuentes. Programa de Apoyo Escolar (Cantidad)'
                }
            }
        }
    });

</script>