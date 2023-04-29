<main class="container">
    <div class="container-fluid px-4">
        <h3 class="mt-4"><?= esc($title); ?></h3>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-cash-register"></i>
                <?= esc("Cargar información del componente"); ?>
            </div>
            <div class="card-body"> 
                
                    <!--- <img src="..." class="card-img-top" alt="..."> -->
                    <?php  
                        if ($this->session->componente_1 == 1) {
                            echo '<div class="card" style="width: 12rem;" id="card-componente">
                                    <img src="'.site_url().'public/images/card-01.jpg" class="card-img-top" alt="card1">
                                    <div class="card-body" >
                                        <h5 class="card-title">Componente 1</h5>
                                            <p class="card-text">Servicio de Apoyo Escolar implementado en tres provincias: Carchi, El Oro y Manabí (Manta) </p>
                                            <a href="'.site_url().'prod_1" class="btn btn-secondary mb-2">Ver y editar información de registro</a>
                                            <a href="'.site_url().'prod_1_process" class="btn btn-secondary mb-2">Ver y editar variables de Proceso</a>
                                    </div>
                                </div>';
                        }
                        if ($this->session->componente_2 == 1) {
                            echo '<div class="card" style="width: 12rem;" id="card-componente">
                                <img src="'.site_url().'public/images/card-02.jpg" class="card-img-top" alt="card2">
                                    <div class="card-body" >
                                        <h5 class="card-title">Componente 2</h5>
                                            <p class="card-text">Programa de Atención al Rezago Escolar de Adolescentes</p>';
                            
                                            //<a href="'.site_url().'subirExcel_view/2" class="btn btn-secondary" disabled>Ver información</a>
                                            echo '
                                    </div>
                                </div>';
                        }

                        if ($this->session->componente_3 == 1) {
                            echo '<div class="card" style="width: 12rem;" id="card-componente">
                                    <img src="'.site_url().'public/images/card-03.jpg" class="card-img-top" alt="card3">
                                    <div class="card-body" >
                                        <h5 class="card-title">Componente 3</h5>
                                            <p class="card-text">Programa de Acompañamiento Pedagógico</p>';
                                            //<a href="'.site_url().'subirExcel_view/3" class="btn btn-secondary" disabled>Cargar información</a>
                                            echo '
                                    </div>
                                </div>';
                        }

                        if ($this->session->componente_4 == 1) {
                            echo '<div class="card" style="width: 12rem;" id="card-componente">
                                    <img src="'.site_url().'public/images/card-04.jpg" class="card-img-top" alt="card4">
                                    <div class="card-body" >
                                        <h5 class="card-title">Programa de Apoyo Escolar a Madres Adolescentes</h5>
                                            <p class="card-text">Algún texto que desccriba el componente 4</p>';
                                            //<a href="'.site_url().'subirExcel_view/4" class="btn btn-secondary" disabled>Cargar información</a>
                                            echo '
                                    </div>
                                </div>';
                        }
                    ?>
                    
                
            </div>
        </div>
    </div>
</main>