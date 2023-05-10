<main class="container">
    <div class="container-fluid px-4">
        <h3 class="mt-4"><?= esc($title).' - REPORTES'; ?></h3>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-cash-register"></i>
                <?= esc("Reportes"); ?>
            </div>
            <div class="card-body"> 
                <form action="<?php echo base_url().'/recibe-tab';?>" method="post" id="form-subir-excel" enctype="multipart/form-data">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                    </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="dato1" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Dato 1
                                </label>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="dato2" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Dato 2
                                </label>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="dato3" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Dato 3
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-light">Enviar</button>
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