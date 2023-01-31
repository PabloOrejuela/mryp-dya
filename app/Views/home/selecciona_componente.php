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
                            echo '<div class="card" style="width: 18rem;" id="card-componente">
                                    <div class="card-body" >
                                        <h5 class="card-title">Componente 1</h5>
                                            <p class="card-text">Algún texto que desccriba el componente</p>
                                            <a href="'.site_url().'subirExcel_view/1" class="btn btn-primary">Cargar información</a>
                                    </div>
                                </div>';
                        }
                        if ($this->session->componente_2 == 1) {
                            echo '<div class="card" style="width: 18rem;" id="card-componente">
                                    <div class="card-body" >
                                        <h5 class="card-title">Componente 2</h5>
                                            <p class="card-text">Algún texto que desccriba el componente</p>
                                            <a href="'.site_url().'subirExcel_view/2" class="btn btn-primary">Cargar información</a>
                                    </div>
                                </div>';
                        }
                    ?>
                    
                
            </div>
        </div>
    </div>
</main>