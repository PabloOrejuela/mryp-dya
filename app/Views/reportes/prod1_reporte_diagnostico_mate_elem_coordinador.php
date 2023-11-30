<style>
    .grafica{
        max-width: 550px;
        min-width: 400px;
        margin-bottom: 50px;
        margin-top: 0px;
        padding-top: 0px;
    }
</style>
<main class="container">
    <div class="container-fluid px-4">
        <h3 class="mt-4"><?= esc($title).' - REPORTE ANALISIS - MATEMATICAS'; ?></h3>
        <div class="card mb-4">
        </div>
        <section>
            <h5 style="text-align:center;">ANALISIS DE LAS DESTREZAS DE MATEMATICA ELEMENTAL PROVINCIA:  <?= $provincia_datos->provincia;  ?></h5>

            <!-- Relación Figuras Geométricas -->
            <table class="mt-4">
                <thead>
                    <th colspan="4" style="text-align:center;"><h5>Relación Figuras Geométricas</h5></th>
                </thead>
                <thead>
                    <th colspan="3" style="text-align:center;"><h5>DIAGNOSTICO MATEMATICAS</h5></th>
                    <th style="text-align:center;"><h5>EVALUACION FINAL MATEMATICAS</h5></th>
                </thead>
                <tbody>
                    <tr>
                        <td><canvas id="myChartP1RelacionFiguras" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP1RelacionFigurasFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP2RelacionFiguras" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP2RelacionFigurasFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                </tbody>
            </table>

            <!-- Seriación 2 -->
            <table class="mt-4">
                <thead>
                    <th colspan="4" style="text-align:center;"><h5>Seriación 2</h5></th>
                </thead>
                <thead>
                    <th colspan="3" style="text-align:center;"><h5>DIAGNOSTICO MATEMATICAS</h5></th>
                    <th style="text-align:center;"><h5>EVALUACION FINAL MATEMATICAS</h5></th>
                </thead>
                <tbody>
                    <tr>
                        <td><canvas id="myChartP2Seriacion" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP2SeriacionFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP2Conjuntos" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP2ConjuntosFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP22Seriacion" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP22SeriacionFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                </tbody>
            </table>

            <!-- Orientación Espacial -->
            <table class="mt-4">
                <thead>
                    <th colspan="4" style="text-align:center;"><h5>Orientación Espacial</h5></th>
                </thead>
                <thead>
                    <th colspan="3" style="text-align:center;"><h5>DIAGNOSTICO MATEMATICAS</h5></th>
                    <th style="text-align:center;"><h5>EVALUACION FINAL MATEMATICAS</h5></th>
                </thead>
                <tbody>
                    <tr>
                        <td><canvas id="myChartP3OrientacionEspacial" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP3OrientacionEspacialFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP31OrientacionEspacial" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP31OrientacionEspacialFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP32OrientacionEspacial" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP32OrientacionEspacialFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                </tbody>
            </table>

            <!-- Esquema Corporal-->
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
                        <td><canvas id="myChartP33Esquema" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP33EsquemaFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP4Esquema" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP4EsquemaFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP41Esquema" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP41EsquemaFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP5Seriacion" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP5SeriacionFinal" class="grafica mb-2"></canvas></td>
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
                        <td><canvas id="myChartP6Suma" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP6SumaFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP7Suma" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP7SumaFinal" class="grafica mb-2"></canvas></td>
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
                        <td><canvas id="myChartP8Resta" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP8RestaFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP9Resta" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP9RestaFinal" class="grafica mb-2"></canvas></td>
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
                        <td><canvas id="myChartP10Multi" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP10MultiFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP11Multi" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP11MultiFinal" class="grafica mb-2"></canvas></td>
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
                        <td><canvas id="myChartP12Division" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP12DivisionFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                    <tr>
                        <td><canvas id="myChartP13Division" class="grafica mb-2"></canvas></td>
                        <td class="px-3"> </td>
                        <td class="px-3"> </td>
                        <td><canvas id="myChartP13DivisionFinal" class="grafica mb-2"></canvas></td>
                    </tr>
                </tbody>
            </table>

        </section>
    </div>
</main>

<!-- Relación Figuras Geométricas -->
<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP1RelacionFiguras; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP1RelacionFiguras').getContext('2d');
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
    var cData = JSON.parse(`<?php echo $myChartP1RelacionFigurasFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP1RelacionFigurasFinal').getContext('2d');
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
    var cData = JSON.parse(`<?php echo $myChartP2RelacionFiguras; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP2RelacionFiguras').getContext('2d');
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
                    text: "Pregunta 1.1",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

     //Le paso el JSON con los datos
     var cData = JSON.parse(`<?php echo $myChartP2RelacionFigurasFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP2RelacionFigurasFinal').getContext('2d');
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
                    text: "Pregunta 1.1",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

</script>

<!-- Seriación 2-->
<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP2Seriacion; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP2Seriacion').getContext('2d');
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
                    text: "Seriación 2",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP2SeriacionFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP2SeriacionFinal').getContext('2d');
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
                    text: "Seriación 2",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP2Conjuntos; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP2Conjuntos').getContext('2d');
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
                    text: "Conjuntos 2.1",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP2ConjuntosFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP2ConjuntosFinal').getContext('2d');
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
                    text: "Conjuntos 2.1",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP22Seriacion; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP22Seriacion').getContext('2d');
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
                    text: "Seriación 2.2",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP22SeriacionFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP22SeriacionFinal').getContext('2d');
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
                    text: "Seriación 2.2",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });
</script>

<!-- Orientación Espacial -->
<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP3OrientacionEspacial; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP3OrientacionEspacial').getContext('2d');
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
    var cData = JSON.parse(`<?php echo $myChartP3OrientacionEspacialFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP3OrientacionEspacialFinal').getContext('2d');
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
    var cData = JSON.parse(`<?php echo $myChartP31OrientacionEspacial; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP31OrientacionEspacial').getContext('2d');
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
                    text: "Pregunta 3.1",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP31OrientacionEspacialFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP31OrientacionEspacialFinal').getContext('2d');
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
                    text: "Pregunta 3.1",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP32OrientacionEspacial; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP32OrientacionEspacial').getContext('2d');
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
                    text: "Pregunta 3.2",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP32OrientacionEspacialFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP32OrientacionEspacialFinal').getContext('2d');
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
                    text: "Pregunta 3.2",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });
</script>

<!-- Esquema Corporal -->
<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP33Esquema; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP33Esquema').getContext('2d');
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
                    text: "Pregunta 3.3",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP33EsquemaFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP33EsquemaFinal').getContext('2d');
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
                    text: "Pregunta 3.3",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP4Esquema; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP4Esquema').getContext('2d');
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
    var cData = JSON.parse(`<?php echo $myChartP4EsquemaFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP4EsquemaFinal').getContext('2d');
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
    var cData = JSON.parse(`<?php echo $myChartP41Esquema; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP41Esquema').getContext('2d');
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
                    text: "Pregunta 4.1",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP41EsquemaFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP41EsquemaFinal').getContext('2d');
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
                    text: "Pregunta 4.1",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP5Seriacion; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP5Seriacion').getContext('2d');
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
                    text: "Seriación 5",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP5SeriacionFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP5SeriacionFinal').getContext('2d');
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
                    text: "Seriación 5",
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
    var cData = JSON.parse(`<?php echo $myChartP6Suma; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP6Suma').getContext('2d');
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

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP6SumaFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP6SumaFinal').getContext('2d');
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

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP7Suma; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP7Suma').getContext('2d');
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
    var cData = JSON.parse(`<?php echo $myChartP7SumaFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP7SumaFinal').getContext('2d');
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

</script>

<!-- Resta -->
<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP8Resta; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP8Resta').getContext('2d');
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
    var cData = JSON.parse(`<?php echo $myChartP8RestaFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP8RestaFinal').getContext('2d');
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
    var cData = JSON.parse(`<?php echo $myChartP9Resta; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP9Resta').getContext('2d');
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

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP9RestaFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP9RestaFinal').getContext('2d');
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

<!-- Multiplicación -->
<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP10Multi; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP10Multi').getContext('2d');
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
    var cData = JSON.parse(`<?php echo $myChartP10MultiFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP10MultiFinal').getContext('2d');
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
    var cData = JSON.parse(`<?php echo $myChartP11Multi; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP11Multi').getContext('2d');
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

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP11MultiFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP11MultiFinal').getContext('2d');
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

<!-- División -->
<script>
    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP12Division; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP12Division').getContext('2d');
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
                    text: "Pregunta 12",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP12DivisionFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP12DivisionFinal').getContext('2d');
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
                    text: "Pregunta 12",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP13Division; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP13Division').getContext('2d');
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
                    text: "Pregunta 13",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

    //Le paso el JSON con los datos
    var cData = JSON.parse(`<?php echo $myChartP13DivisionFinal; ?>`);
    //console.log(cData.color_lectura);
    var ctx = document.getElementById('myChartP13DivisionFinal').getContext('2d');
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
                    text: "Pregunta 13",
                    font: {
                        size: 14
                    }
                }
            }
        }
    });

</script>



