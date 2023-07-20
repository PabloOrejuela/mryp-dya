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
                                            <p class="card-text">Apoyo escolar</p>
                                            <a href="'.site_url().'prod_1" class="btn btn-info mb-2">Ver y editar información de registro</a>
                                            <a href="'.site_url().'prod_1_process" class="btn btn-info mb-2">Ver y editar variables de Proceso</a>
                                            <a href="'.site_url().'prod-1-asistencia" class="btn btn-info mb-2">Registrar asistencia</a>';
                                            if ($this->session->descargar_info == 1) {
                                                echo'<a href="'.site_url().'prod-1-descargar-registros" class="btn btn-info mb-2">Descargar registros (.xlsx)</a>';
                                            }
                            echo'   </div>
                                </div>';
                        }
                        if ($this->session->componente_2 == 1) {
                            echo '<div class="card" style="width: 12rem;" id="card-componente">
                                <img src="'.site_url().'public/images/card-02.jpg" class="card-img-top" alt="card2">
                                    <div class="card-body" >
                                        <h5 class="card-title">Componente 2</h5>
                                            <p class="card-text">Servicio educativo NAP </p>
                                            <a href="'.site_url().'prod-2-menu" class="btn btn-info mb-2">Ir al menu NAP</a>
                                    </div>
                                </div>';
                        }

                        if ($this->session->componente_3 == 1) {
                            echo '<div class="card" style="width: 12rem;" id="card-componente">
                                    <img src="'.site_url().'public/images/card-03.jpg" class="card-img-top" alt="card3">
                                    <div class="card-body" >
                                        <h5 class="card-title">Componente 3</h5>
                                            <p class="card-text">Acompañamiento Pedagógico </p>
                                            <a href="'.site_url().'prod_3" class="btn btn-info mb-2">Ver y editar información de registro</a>
                                            <a href="'.site_url().'prod_3_process" class="btn btn-info mb-2">Editar variables de Proceso</a>';
                                            if ($this->session->prod3_biblioteca == 1) {
                                                echo '<a href="'.site_url().'prod-3-otros-procesos" class="btn btn-info mb-2">Editar Biblioteca y Encuentro</a>';
                                            }
                                
                            echo    '</div>
                                </div>';
                        }

                        if ($this->session->componente_4 == 1) {
                            echo '<div class="card" style="width: 12rem;" id="card-componente">
                                    <img src="'.site_url().'public/images/card-04.jpg" class="card-img-top" alt="card4">
                                    <div class="card-body" >
                                        <h5 class="card-title">Componente 4</h5>
                                            <p class="card-text">Apoyo escolar a adolescentes madres y embarazadas</p>
                                            <a href="'.site_url().'prod_4" class="btn btn-info mb-2">Ver y editar información de registro y procesos</a>
                                    </div>
                                </div>';
                        }

                    ?>
                
            </div>
        </div>
    </div>
</main>