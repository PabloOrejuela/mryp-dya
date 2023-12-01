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
        <h3 class="mt-4"><?= esc($title).' - REPORTE ANALISIS - MATEMATICAS'; ?></h3>
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
                        <td id="td-center"><?= count($datos_mate);  ?> estudiantes riden prueba de diagnóstico</td>
                        <td id="td-center" class="px-3"><?= count($datos_mate_final);  ?> estudiantes riden prueba final</td>
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
                        <td><canvas id="myChartGeneroDiagMate" class="grafica"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td class="px-3"><canvas id="myChartGeneroFinalMate" class="grafica"></canvas></td>
                    </tr>
                </tbody>
            </table>

            <table>
                <thead>
                    <th colspan="4" style="text-align:center;"><h5>Nacionalidad</h5></th>
                </thead>
                <tbody>
                    <tr>
                        <td><canvas id="myChartNacionalidadDiagMate" class="grafica"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td class="px-3"><canvas id="myChartNacionalidadFinalMate" class="grafica"></canvas></td>
                    </tr>
                </tbody>
            </table>
            <h5 style="text-align:center;">ANALISIS DE LAS DESTREZAS DE MATEMATICA MEDIA / AVANZADA PROVINCIA:  <?= $provincia_datos->provincia;  ?></h5>

            <!-- Pregunta 1 -->
            <table class="mt-4">
                <thead>
                    <th colspan="4" style="text-align:center;"><h5>Orientación espacial</h5></th>
                </thead>
                <thead>
                    <th colspan="3" style="text-align:center;"><h5>DIAGNOSTICO MATEMATICAS</h5></th>
                    <th style="text-align:center;"><h5>EVALUACION FINAL MATEMATICAS</h5></th>
                </thead>
                <tbody>
                    <tr>
                        <td><canvas id="myChartP1Orientacion" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP1OrientacionFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr style="padding-top: 30px;">
                        <td> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP2Orientacion" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP2OrientacionFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP3Orientacion" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP3OrientacionFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP4Orientacion" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP4OrientacionFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                </tbody>
            </table>

            <!-- Clasificación -->
            <table class="mt-4">
                <thead>
                    <th colspan="4" style="text-align:center;"><h5>Clasificación</h5></th>
                </thead>
                <thead>
                    <th colspan="3" style="text-align:center;"><h5>DIAGNOSTICO MATEMATICAS</h5></th>
                    <th style="text-align:center;"><h5>EVALUACION FINAL MATEMATICAS</h5></th>
                </thead>
                <tbody>
                    <tr>
                        <td><canvas id="myChartP5Clasificacion" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP5ClasificacionFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP6Clasificacion" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP6ClasificacionFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                </tbody>
            </table>

            <!-- Seriación -->
            <table class="mt-4">
                <thead>
                    <th colspan="4" style="text-align:center;"><h5>Seriación</h5></th>
                </thead>
                <thead>
                    <th colspan="3" style="text-align:center;"><h5>DIAGNOSTICO MATEMATICAS</h5></th>
                    <th style="text-align:center;"><h5>EVALUACION FINAL MATEMATICAS</h5></th>
                </thead>
                <tbody>
                    <tr>
                        <td><canvas id="myChartP7Seriacion" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP7SeriacionFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP8Seriacion" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP8SeriacionFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP9Seriacion" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP9SeriacionFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                </tbody>
            </table>

            <!-- Esquema corporal -->
            <table class="mt-4">
                <thead>
                    <th colspan="4" style="text-align:center;"><h5>Esquema Corporal</h5></th>
                </thead>
                <thead>
                    <th colspan="3" style="text-align:center;"><h5>DIAGNOSTICO MATEMATICAS</h5></th>
                    <th style="text-align:center;"><h5>EVALUACION FINAL MATEMATICAS</h5></th>
                </thead>
                <tbody>
                    <tr>
                        <td><canvas id="myChartP10Esquema" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP10EsquemaFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP11Esquema" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP11EsquemaFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                </tbody>
            </table>

            <!-- Suma-->
            <table class="mt-4">
                <thead>
                    <th colspan="4" style="text-align:center;"><h5>Suma</h5></th>
                </thead>
                <thead>
                    <th colspan="3" style="text-align:center;"><h5>DIAGNOSTICO MATEMATICAS</h5></th>
                    <th style="text-align:center;"><h5>EVALUACION FINAL MATEMATICAS</h5></th>
                </thead>
                <tbody>
                    <tr>
                        <td><canvas id="myChartSumaDos" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartSumaDosFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartSumaCuatro" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartSumaCuatroFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartSumaCinco" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartSumaCincoFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                </tbody>
            </table>

            <!-- Resta-->
            <table class="mt-4">
                <thead>
                    <th colspan="4" style="text-align:center;"><h5>Resta</h5></th>
                </thead>
                <thead>
                    <th colspan="3" style="text-align:center;"><h5>DIAGNOSTICO MATEMATICAS</h5></th>
                    <th style="text-align:center;"><h5>EVALUACION FINAL MATEMATICAS</h5></th>
                </thead>
                <tbody>
                    <tr>
                        <td><canvas id="myChartRestaTres" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartRestaTresFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartRestaCuatro" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartRestaCuatroFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                </tbody>
            </table>

            <!-- Multiplicación-->
            <table class="mt-4">
                <thead>
                    <th colspan="4" style="text-align:center;"><h5>Multiplicación</h5></th>
                </thead>
                <thead>
                    <th colspan="3" style="text-align:center;"><h5>DIAGNOSTICO MATEMATICAS</h5></th>
                    <th style="text-align:center;"><h5>EVALUACION FINAL MATEMATICAS</h5></th>
                </thead>
                <tbody>
                    <tr>
                        <td><canvas id="myChartMultiUna" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartMultiUnaFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartMultiDos" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartMultiDossFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                </tbody>
            </table>

            <!-- División-->
            <table class="mt-4">
                <thead>
                    <th colspan="4" style="text-align:center;"><h5>División</h5></th>
                </thead>
                <thead>
                    <th colspan="3" style="text-align:center;"><h5>DIAGNOSTICO MATEMATICAS</h5></th>
                    <th style="text-align:center;"><h5>EVALUACION FINAL MATEMATICAS</h5></th>
                </thead>
                <tbody>
                    <tr>
                        <td><canvas id="myChartDiviUna" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartDiviUnaFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartDiviDos" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartDiviDossFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
</main>

<!-- Género -->
<script>

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartGeneroDiagMate; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartGeneroDiagMate').getContext('2d');
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
    var cData = JSON.parse(`<?php echo $myChartGeneroFinalMate; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartGeneroFinalMate').getContext('2d');
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
    var cData = JSON.parse(`<?php echo $myChartNacionalidadDiagMate; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartNacionalidadDiagMate').getContext('2d');
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
    var cData = JSON.parse(`<?php echo $myChartNacionalidadFinalMate; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartNacionalidadFinalMate').getContext('2d');
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

<!-- Orientacion -->
<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP1Orientacion; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP1Orientacion').getContext('2d');
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
                    text: "Pregunta 1",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP1OrientacionFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP1OrientacionFinal').getContext('2d');
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
                    text: "Pregunta 1",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP2Orientacion; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP2Orientacion').getContext('2d');
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
                    text: "Pregunta 2",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP2OrientacionFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP2OrientacionFinal').getContext('2d');
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
                    text: "Pregunta 2",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP3Orientacion; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP3Orientacion').getContext('2d');
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
                    text: "Pregunta 3",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP3OrientacionFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP3OrientacionFinal').getContext('2d');
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
                    text: "Pregunta 3",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP4Orientacion; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP4Orientacion').getContext('2d');
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
                    text: "Pregunta 4",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP4OrientacionFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP4OrientacionFinal').getContext('2d');
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
                    text: "Pregunta 4",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });
</script>

<!-- Orientacion -->
<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP5Clasificacion; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP5Clasificacion').getContext('2d');
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
                    text: "Pregunta 5",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP5ClasificacionFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP5ClasificacionFinal').getContext('2d');
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
                    text: "Pregunta 5",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP6Clasificacion; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP6Clasificacion').getContext('2d');
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
                    text: "Pregunta 6",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP6ClasificacionFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP6ClasificacionFinal').getContext('2d');
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
                    text: "Pregunta 6",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

</script>

<!-- Seriación -->
<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP7Seriacion; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP7Seriacion').getContext('2d');
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
                    text: "Pregunta 7",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP7SeriacionFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP7SeriacionFinal').getContext('2d');
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
                    text: "Pregunta 7",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP8Seriacion; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP8Seriacion').getContext('2d');
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
                    text: "Pregunta 8",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP8SeriacionFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP8SeriacionFinal').getContext('2d');
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
                    text: "Pregunta 8",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP9Seriacion; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP9Seriacion').getContext('2d');
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
                    text: "Pregunta 9",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP9SeriacionFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP9SeriacionFinal').getContext('2d');
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
                    text: "Pregunta 9",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

</script>

<!-- Esq corporal -->
<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP10Esquema; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP10Esquema').getContext('2d');
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
                    text: "Pregunta 10",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP10EsquemaFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP10EsquemaFinal').getContext('2d');
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
                    text: "Pregunta 10",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP11Esquema; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP11Esquema').getContext('2d');
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
                    text: "Pregunta 11",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP11EsquemaFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP11EsquemaFinal').getContext('2d');
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
                    text: "Pregunta 11",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });
</script>

<!-- Suma -->
<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartSumaDos; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartSumaDos').getContext('2d');
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
                    text: "Suma de dos cifras",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartSumaDosFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartSumaDosFinal').getContext('2d');
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
                    text: "Suma de dos cifras",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartSumaCuatro; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartSumaCuatro').getContext('2d');
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
                    text: "Suma de cuatro cifras",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartSumaCuatroFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartSumaCuatroFinal').getContext('2d');
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
                    text: "Suma de cuatro cifras",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartSumaCinco; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartSumaCinco').getContext('2d');
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
                    text: "Suma de cinco o mas cifras",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartSumaCincoFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartSumaCincoFinal').getContext('2d');
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
                    text: "Suma de cinco o mas cifras",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });
</script>

<!-- Resta -->
<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartRestaTres; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartRestaTres').getContext('2d');
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
                    text: "Resta de tres cifras",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartRestaTresFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartRestaTresFinal').getContext('2d');
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
                    text: "Resta de tres cifras",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartRestaCuatro; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartRestaCuatro').getContext('2d');
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
                    text: "Resta de cuatro cifras",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartRestaCuatroFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartRestaCuatroFinal').getContext('2d');
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
                    text: "Resta de cuatro cifras",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

</script>

<!-- Multiplicación -->
<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartMultiUna; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartMultiUna').getContext('2d');
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
                    text: "Multiplicación una cifra",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartMultiUnaFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartMultiUnaFinal').getContext('2d');
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
                    text: "Multiplicación una cifra",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartMultiDos; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartMultiDos').getContext('2d');
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
                    text: "Multiplicación dos cifras",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartMultiDossFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartMultiDossFinal').getContext('2d');
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
                    text: "Multiplicación dos cifras",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

</script>

<!-- División -->
<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartDiviUna; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartDiviUna').getContext('2d');
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
                    text: "División una cifra",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartDiviUnaFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartDiviUnaFinal').getContext('2d');
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
                    text: "División una cifra",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartDiviDos; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartDiviDos').getContext('2d');
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
                    text: "División dos cifras",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartDiviDossFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartDiviDossFinal').getContext('2d');
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
                    text: "División dos cifras",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

</script>


