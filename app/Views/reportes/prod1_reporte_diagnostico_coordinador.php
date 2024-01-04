<style>
    .grafica{
        max-width: 550px;
        min-width: 400px;
        margin-bottom: 50px;
        margin-top: 0px;
        padding-top: 0px;
    }

    #td-center{
        text-align:center;
    }
</style>
<main class="container">
    <div class="container-fluid px-4">
        <h3 class="mt-4"><?= esc($title).' - REPORTE ANALISIS - LENGUAJE'; ?></h3>
        <div class="card mb-4">
        </div>
        <section>
            <table class="table table-bordered mb-3">
                <thead class="table-light">
                    <th style="text-align:center;">Número Est. que riden prueba de diagnóstico</th>
                    <th style="text-align:center;">Número Est. que riden prueba final</th>
                </thead>
                <tbody>
                    <tr>
                        <td id="td-center"><?= count($datos_diagnostico_lenguaje);  ?> estudiantes riden prueba de diagnóstico</td>
                        <td id="td-center"><?= count($datos_evalfinal_lenguaje);  ?> estudiantes riden prueba final</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered mb-3">
                <thead class="table-light">
                    <th style="text-align:center;" colspan="2">RANGO DE EDADES PRUEBA DIAGNOSTICO</th>
                </thead>
                <thead class="table-light">
                    <th style="text-align:center;">Edad mínima</th>
                    <th style="text-align:center;">Edad máxima</th>
                </thead>
                <tbody>
                    <tr>
                        <td id="td-center"><?= $rangoEdadesDiagnostico['min']; ?> años de edad</td>
                        <td id="td-center" class="px-3"><?= $rangoEdadesDiagnostico['max'];  ?> años de edad</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered mb-3">
                <thead class="table-light">
                    <th style="text-align:center;" colspan="2">RANGO DE EDADES PRUEBA FINAL</th>
                </thead>
                <thead class="table-light">
                    <th style="text-align:center;">Edad mínima</th>
                    <th style="text-align:center;">Edad máxima</th>
                </thead>
                <tbody>
                    <tr>
                        <td id="td-center"><?= $rangoEdadesFinal['min']; ?> años de edad</td>
                        <td id="td-center" class="px-3"><?= $rangoEdadesFinal['max'];  ?> años de edad</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <table>
                <thead>
                    <th colspan="4" style="text-align:center;"><h5>GENERO</h5></th>
                </thead>
                <tbody>
                    <tr>
                        <td><canvas id="myChartGeneroDiagLengua" class="grafica"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td class="px-3"><canvas id="myChartGeneroFinalLengua" class="grafica"></canvas></td>
                    </tr>
                </tbody>
            </table>

            <table>
                <thead>
                    <th colspan="4" style="text-align:center;"><h5>Nacionalidad</h5></th>
                </thead>
                <tbody>
                    <tr>
                        <td><canvas id="myChartNacionalidadDiagLengua" class="grafica"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td class="px-3"><canvas id="myChartNacionalidadFinalLengua" class="grafica"></canvas></td>
                    </tr>
                </tbody>
            </table>

            <h5 style="text-align:center;">ANALISIS DE LAS DESTREZAS DE LENGUAJE PROVINCIA:  <?= $provincia_datos->provincia;  ?></h5>
            <table>
                <thead>
                    <th colspan="3" style="text-align:center;"><h5>DIAGNOSTICO</h5></th>
                    <th style="text-align:center;"><h5>EVALUACION FINAL MYRP</h5></th>
                </thead>
                <tbody>
                    <tr>
                        <td><canvas id="myChartNecsitoApoyo" class="grafica"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td class="px-3"><canvas id="myChartNecsitoApoyoFinal" class="grafica"></canvas></td>
                    </tr>
                </tbody>
            </table>

            <!-- Pregunta 1 -->
            <table class="mt-4">
                <thead>
                    <th colspan="4" style="text-align:center;"><h5>PREGUNTA 1</h5></th>
                </thead>
                <thead>
                    <th colspan="3" style="text-align:center;"><h5>DIAGNOSTICO</h5></th>
                    <th style="text-align:center;"><h5>EVALUACION FINAL MYRP</h5></th>
                </thead>
                <tbody>
                    <tr>
                        <td><canvas id="myChartP1CompLectora" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP1CompLectoraFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr style="padding-top: 30px;">
                        <td> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP1Inteligibilidad" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP1InteligibilidadFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                </tbody>
            </table>

            <!-- Pregunta 2 -->
            <table class="mt-4">
                <thead>
                    <th colspan="4" style="text-align:center;"><h5>PREGUNTA 2</h5></th>
                </thead>
                <thead>
                    <th colspan="3" style="text-align:center;"><h5>DIAGNOSTICO</h5></th>
                    <th style="text-align:center;"><h5>EVALUACION FINAL MYRP</h5></th>
                </thead>
                <tbody>
                    <tr>
                        <td><canvas id="myChartP2CompLectora" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP2CompLectoraFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                </tbody>
            </table>
            
            <!-- Pregunta 3 -->
            <table class="mt-4">
                <thead>
                    <th colspan="4" style="text-align:center;"><h5>PREGUNTA 3</h5></th>
                </thead>
                <thead>
                    <th colspan="3" style="text-align:center;"><h5>DIAGNOSTICO</h5></th>
                    <th style="text-align:center;"><h5>EVALUACION FINAL MYRP</h5></th>
                </thead>
                <tbody>
                    <tr>
                        <td><canvas id="myChartP3CompLectora" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP3CompLectoraFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP3Intel" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP3IntelFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP3Coher" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP3CoherFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP3Sintax" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP3SintaxFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP3Estandares" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP3EstandaresFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                </tbody>
            </table>

            <!-- PREGUNTA 4 -->
            <table class="mt-4">
                <thead>
                    <th colspan="4" style="text-align:center;"><h5>PREGUNTA 4</h5></th>
                </thead>
                <thead>
                    <th colspan="3" style="text-align:center;"><h5>DIAGNOSTICO</h5></th>
                    <th style="text-align:center;"><h5>EVALUACION FINAL MYRP</h5></th>
                </thead>
                <tbody>
                    <tr>
                        <td><canvas id="myChartP4CompLectora" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP4CompLectoraFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP4Intel" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP4IntelFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP4Coher" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP4CoherFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP4Sintax" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP4SintaxFinal" class="grafica mb-2"></canvas></td>
                    </tr>

                    <tr>
                        <td><canvas id="myChartP4Estandares" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP4EstandaresFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
</main>

<!-- Género -->
<script>

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartGeneroDiagLengua; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartGeneroDiagLengua').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [

                    //Masculino
                    cData.color_A,
                    //Fem
                    cData.color_B,
                    //Sin dato
                    cData.color_C,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Est. rinden prueba diágnostico",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartGeneroFinalLengua; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartGeneroFinalLengua').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //SI
                    cData.color_A,

                    //NO
                    cData.color_B,

                    //NO
                    cData.color_C,
                    //NO
                    cData.color_D,


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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Est. rinden prueba final",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });
</script>

<!-- Nacionalidad -->
<script>

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartNacionalidadDiagLengua; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartNacionalidadDiagLengua').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [

                     //SI
                     cData.color_A,

                    //NO
                    cData.color_B,

                    //NO
                    cData.color_C,
                    //NO
                    cData.color_D,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Est. rinden prueba diágnostico",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartNacionalidadFinalLengua; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartNacionalidadFinalLengua').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //SI
                    cData.color_A,

                    //NO
                    cData.color_B,

                    //NO
                    cData.color_C,
                    //NO
                    cData.color_D,


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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Est. rinden prueba final",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });
</script>

<!-- Apoyo -->
<script>

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $chart_data_necesita_apoyo; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartNecsitoApoyo').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [

                    //SI
                    cData.color_necesita,
                    //NO
                    cData.color_noNecesita,
                    cData.color_C,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Necesitó apoyo consigna lectora",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $chart_data_necesita_apoyo_final; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartNecsitoApoyoFinal').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //SI
                    cData.color_necesita,

                    //NO
                    cData.color_noNecesita,
                    cData.color_C,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Necesitó apoyo consigna lectora",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });
</script>

<!-- Pregunta 1 -->
<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP1CompLectora; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP1CompLectora').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //A
                    cData.color_A,
                    //B
                    cData.color_B,
                    cData.color_C,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Comprensión consigna lectora",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP1CompLectoraFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP1CompLectoraFinal').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //SI
                    cData.color_A,

                    //NO
                    cData.color_B,
                    cData.color_C,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Comprensión consigna lectora",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP1Inteligibilidad; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP1Inteligibilidad').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //SI
                    cData.color_A,

                    //NO
                    cData.color_B,
                    cData.color_C,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Significado de la escritura y la Inteligibilidad",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP1InteligibilidadFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP1InteligibilidadFinal').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //SI
                    cData.color_A,

                    //NO
                    cData.color_B,
                    cData.color_C,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Significado de la escritura y la Inteligibilidad",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });
</script>

<!-- Pregunta 2 -->
<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP2CompLectora; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP2CompLectora').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //SI
                    cData.color_A,

                    //NO
                    cData.color_B,
                    cData.color_C,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Comprensión consigna lectora",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP2CompLectoraFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP2CompLectoraFinal').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //SI
                    cData.color_A,

                    //NO
                    cData.color_B,
                    cData.color_C,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Comprensión consigna lectora",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });
</script>

<!-- Pregunta 3 -->
<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP3CompLectora; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP3CompLectora').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //A
                    cData.color_A,

                    //B
                    cData.color_B,

                    //C
                    cData.color_C,
                    cData.color_D,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Comprensión consigna lectora",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP3CompLectoraFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP3CompLectoraFinal').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //A
                    cData.color_A,

                    //B
                    cData.color_B,

                    //C
                    cData.color_C,
                    cData.color_D,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Comprensión consigna lectora",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP3Intel; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP3Intel').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //A
                    cData.color_A,

                    //B
                    cData.color_B,

                    //C
                    cData.color_C,
                    cData.color_D,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Inteligibilidad",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP3IntelFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP3IntelFinal').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //A
                    cData.color_A,

                    //B
                    cData.color_B,

                    //C
                    cData.color_C,
                    cData.color_D,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Inteligibilidad",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP3Coher; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP3Coher').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //A
                    cData.color_A,

                    //B
                    cData.color_B,

                    //C
                    cData.color_C,

                    //C
                    cData.color_D,
                    cData.color_E,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Coherencia",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP3CoherFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP3CoherFinal').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //A
                    cData.color_A,

                    //B
                    cData.color_B,

                    //C
                    cData.color_C,

                    //D
                    cData.color_D,
                    cData.color_E,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Coherencia",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP3Sintax; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP3Sintax').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //A
                    cData.color_A,

                    //B
                    cData.color_B,

                    //C
                    cData.color_C,

                    //C
                    cData.color_D,
                    cData.color_E,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Sintaxis",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP3SintaxFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP3SintaxFinal').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //A
                    cData.color_A,

                    //B
                    cData.color_B,

                    //C
                    cData.color_C,

                    //D
                    cData.color_D,
                    cData.color_E,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Sintaxis",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP3Estandares; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP3Estandares').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //A
                    cData.color_A,

                    //B
                    cData.color_B,
                    cData.color_C,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Estándares EGB Subnivel 2 y 3",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP3EstandaresFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP3EstandaresFinal').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //A
                    cData.color_A,

                    //B
                    cData.color_B,
                    cData.color_C,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Estándares EGB Subnivel 2 y 3",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });
</script>

<!-- Pregunta 4 -->
<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP4CompLectora; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP4CompLectora').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //A
                    cData.color_A,

                    //B
                    cData.color_B,

                    //C
                    cData.color_C,
                    cData.color_D,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Comprensión consigna lectora",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP4CompLectoraFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP4CompLectoraFinal').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //A
                    cData.color_A,

                    //B
                    cData.color_B,

                    //C
                    cData.color_C,
                    cData.color_D,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Comprensión consigna lectora",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP4Intel; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP4Intel').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //A
                    cData.color_A,

                    //B
                    cData.color_B,

                    //C
                    cData.color_C,
                    cData.color_D,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Inteligibilidad",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP4IntelFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP4IntelFinal').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //A
                    cData.color_A,

                    //B
                    cData.color_B,

                    //C
                    cData.color_C,
                    cData.color_D,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Inteligibilidad",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP4Coher; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP4Coher').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //A
                    cData.color_A,

                    //B
                    cData.color_B,

                    //C
                    cData.color_C,

                    //C
                    cData.color_D,
                    cData.color_E,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Coherencia",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP4CoherFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP4CoherFinal').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //A
                    cData.color_A,

                    //B
                    cData.color_B,

                    //C
                    cData.color_C,

                    //D
                    cData.color_D,
                    cData.color_E,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Coherencia",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP4Sintax; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP4Sintax').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //A
                    cData.color_A,

                    //B
                    cData.color_B,

                    //C
                    cData.color_C,

                    //C
                    cData.color_D,
                    cData.color_E,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Sintaxis",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP4SintaxFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP4SintaxFinal').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //A
                    cData.color_A,

                    //B
                    cData.color_B,

                    //C
                    cData.color_C,

                    //D
                    cData.color_D,
                    cData.color_E,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Sintaxis",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP4Estandares; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP4Estandares').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //A
                    cData.color_A,

                    //B
                    cData.color_B,
                    cData.color_C,

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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Estándares EGB Subnivel 2 y 3",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP4EstandaresFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP4EstandaresFinal').getContext('2d');
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cData.etiquetas,
            datasets: [{
                label:  'Resultados de las evaluaciones',
                data: cData.datos,
                backgroundColor: [
                    //A
                    cData.color_A,

                    //B
                    cData.color_B,
                    cData.color_C,
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
                    formatter: (value, ctx) => {
                        return value + "%";
                    },
                    color: '#000000',
                    anchor: 'left',
                    align: 'end',
                    offset: 10,
                    labels: {
                        title: {
                            font: {
                                weight: 'bold',
                                size:14
                            }
                        }
                    }
                },
                title: {
                    display: true,
                    text: "Estándares EGB Subnivel 2 y 3",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });
</script>
