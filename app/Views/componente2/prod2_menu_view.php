<style>
    .card-img-top{
        width: 100%;
    }
    #card-componente{
        float: left;
        margin: 3px;
    }

    #btn-dya {
        background-color: rgb(26, 138, 84, 0.9);
        text-align:left;
    }

    #btn-mineduc {
        background-color: rgb(1, 152, 201, 0.8);
        text-align:left;
    }
</style>
<main class="container">
    <div class="container-fluid px-4">
        <h3 class="mt-4"><?= esc($title); ?></h3>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-cash-register"></i>
                <?= esc("Seleccionar componente"); ?>
            </div>
            <div class="card-body"> 
                
                    <!--- <img src="..." class="card-img-top" alt="..."> -->
                    <?php  
                        if ($this->session->componente_2 == 1) {
                            echo '<div class="card col-md-6"  id="card-componente">
                                <img src="'.site_url().'public/images/card-02.jpg" class="card-img-top" alt="card2">
                                    <div class="card-body" >
                                        <h5 class="card-title">Componente 2</h5>
                                            <p class="card-text">Servicio educativo NAP </p>
                                            <a href="'.site_url().'prod2-nap2-menu" id="btn-dya" class="btn btn-info mb-2">NAP 2 - Estudiantes DYA</a>
                                            <a href="'.site_url().'prod2-nap3-menu" id="btn-dya" class="btn btn-info mb-2">NAP 3 - Docentes DYA</a>
                                            <a href="'.site_url().'prod2-nap4-menu" id="btn-mineduc" class="btn btn-info mb-2">NAP 4 - Estudiantes MINEDUC Presencial</a>
                                            <a href="'.site_url().'prod2-nap5-menu" id="btn-mineduc" class="btn btn-info mb-2">NAP 5 - Docentes MINEDUC Presencial</a>
                                            <a href="'.site_url().'prod2-nap6-menu" id="btn-nap" class="btn btn-info mb-2">NAP 6 - Estudiantes MINEDUC Virtual</a>
                                            <a href="'.site_url().'prod2-nap7-menu" id="btn-nap" class="btn btn-info mb-2">NAP 7 - Docentes MINEDUC Virtual</a>
                                    </div>
                                </div>';
                        }
                    ?>
            </div>
        </div>
    </div>
</main>