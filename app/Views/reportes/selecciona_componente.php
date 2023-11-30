<style>
    #btn-dya {
        background-color: rgb(26, 138, 84, 0.9);
        text-align:center;
    }
</style>
<main class="container">
    <div class="container-fluid px-4">
        <h3 class="mt-4"><?= esc($title).' - REPORTES'; ?></h3>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-cash-register"></i>
                <?= esc("Reportes"); ?>
            </div>
            <div class="card-body"> 
                
                    <!--- <img src="..." class="card-img-top" alt="..."> -->
                    <?php  
                        if ($this->session->componente_1 == 1 && $this->session->reportes == 1) {
                            echo '<div class="card" style="width: 12rem;" id="card-componente">
                                    <img src="'.site_url().'public/images/card-01.jpg" class="card-img-top" alt="card1">
                                    <div class="card-body" >
                                        <h5 class="card-title">Componente 1</h5>
                                            <p class="card-text">Servicio de Apoyo Escolar implementado en tres provincias: Carchi, El Oro y Manabí (Manta) </p>';
                                            if ($this->session->idrol == 1 || $this->session->idrol == 3 || $this->session->idrol == 10) {
                                                echo '<a href="'.site_url().'prod1-reportes-coordinacion-menu" class="btn btn-info mb-2" target="_blank" id="btn-dya">Reportes Coordinación</a>';

                                            }
                                                echo '<a href="'.site_url().'reportes-p1" class="btn btn-info mb-2">Reportes por centro educativo</a>
                                    </div>
                                </div>';
                        }
                        if ($this->session->componente_2 == 1 && $this->session->reportes == 1) {
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

                        if ($this->session->componente_3 == 1 && $this->session->reportes == 1) {
                            echo '<div class="card" style="width: 12rem;" id="card-componente">
                                    <img src="'.site_url().'public/images/card-03.jpg" class="card-img-top" alt="card3">
                                    <div class="card-body" >
                                        <h5 class="card-title">Componente 3</h5>
                                            <p class="card-text">Programa de Acompañamiento Pedagógico</p>';
                                        if ($this->session->idrol == 1 || $this->session->idrol == 3 || $this->session->idrol == 10) {
                                            echo '<a href="'.site_url().'reporte-info-talleres" class="btn btn-info mb-2" target="_blank">Reporte Talleres, Nacionalidad, Edad, Género, Etnia</a>';
                                            echo '<a href="'.site_url().'reporte-info-biblioteca" class="btn btn-info mb-2" target="_blank">Reporte Biblioteca y encuentro</a>';
                                            echo '<a href="'.site_url().'reporte-info-arte" class="btn btn-info mb-2" target="_blank">Reporte Módulo Exp. Artística</a>';
                                            echo '<a href="'.site_url().'reporte-info-lengua" class="btn btn-info mb-2" target="_blank">Reporte Módulo Lenguaje</a>';
                                            echo '<a href="'.site_url().'reporte-info-ciudadania" class="btn btn-info mb-2" target="_blank">Reporte Módulo Ciudadanía</a>';
                                        }
                                            echo '<a href="'.site_url().'prod3-reporte-certificados" class="btn btn-info mb-2" target="_blank">APRUEBA CERTIFICADOS</a>
                                    </div>
                                </div>';
                        }

                        if ($this->session->componente_4 == 1 && $this->session->reportes == 1) {
                            echo '<div class="card" style="width: 12rem;" id="card-componente">
                                    <img src="'.site_url().'public/images/card-04.jpg" class="card-img-top" alt="card4">
                                    <div class="card-body" >
                                        <h5 class="card-title">Componente 4</h5>
                                            <p class="card-text">Programa de Apoyo Escolar a Madres Adolescentes</p>
                                            <a href="'.site_url().'prod4-reportes-form" class="btn btn-info mb-2" target="_self">GENERADOR DE REPORTES</a>
                                    </div>
                                </div>';
                        }
                    ?>
                    
                
            </div>
        </div>
    </div>
</main>