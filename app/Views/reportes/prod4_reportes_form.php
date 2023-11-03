<style>
    #button-submit{
        width: 200px;
    }
    #resultados-reporte{
        height: auto;
        /* display: TRUE; */
    }
    #select_info_signo{
        width: 140px;
        margin-right: 1px;
    }
    #edad{
        text-align: right;
        width: 100px;
    }
</style>
<main class="container">
    <div class="container-fluid px-4">
        <h3 class="mt-4"><?= esc($title).' - REPORTES'; ?></h3>
        <div class="card mb-4 col-md-12">
            <div class="card-header">
                <i class="fa-solid fa-cash-register"></i>
                <?= esc("Reportes Producto 4"); ?>
            </div>
            <div class="card-body" id="card-reportes"> 
                <h4>Filtros</h4>
                <form action="<?php echo base_url().'/prod4-reporte';?>" method="post" id="form">
                    <div class="col-md-9 mb-3">
                        <label for="reporte">Nombre del reporte:</label>
                        <input type="text" class="form-control" id="reporte" name="reporte" placeholder="Reporte">
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4 mb-3">
                            <label for="idciudades">Ciudad:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="idciudades"
                                id="idciudades"  
                            >   
                                <option value="NULL" selected>--Seleccionar Ciudad--</option>
                                <?php
                                    if ($ciudades != NULL && isset($ciudades) ) {
                                        foreach ($ciudades as $key => $ciudad) {
                                            echo '<option value="'.$ciudad->idciudades.'">'.$ciudad->ciudad.'</option>'; 
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cohorte">Cohorte:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="cohorte"
                                id="cohorte"  
                            >   
                                <option value="NULL" selected>--Seleccionar cohorte--</option>
                                <?php
                                    if ($cohortes != NULL && isset($cohortes) ) {
                                        foreach ($cohortes as $key => $cohorte) {
                                            echo '<option value="'.$cohorte->id.'">'.$cohorte->id.' - '.$cohorte->cohorte.'</option>'; 
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3" id="select_info_signo">
                            <label for="signo"></label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="signo"
                                id="signo"  
                            >   
                                <option value="null" selected>--Signo--</option>
                                <option value="<">Menor a</option>
                                <option value="<=">Menor o igual a</option>
                                <option value=">">Mayor a</option>
                                <option value=">=">Mayor o igual a</option>
                            </select>
                        </div>
                        <div class="col-sm-2 mb-3">
                            <label for="edad">Edad:</label>
                            <input type="text" class="form-control number" id="edad" name="edad" placeholder="Edad">
                        </div>
                    </div>
                    <div class="row g-3">         
                        <h4>Variables</h4>
                        <div class="col-md-4 mb-3">
                            <label for="variable_1">Variable 1:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="variable_1"
                                id="variable_1"  
                            >   
                            <option value="NULL" selected>--Seleccionar Variable 1--</option>
                                <?php
                                    if ($variables != NULL && isset($variables) ) {
                                        foreach ($variables as $key => $variable) {
                                            echo '<option value="'.$key.'">'.$variable.'</option>'; 
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="variable_2">Variable 2:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="variable_2"
                                id="variable_2"  
                            >   
                            <option value="NULL" selected>--Seleccionar Variable 2--</option>
                                <?php
                                    if ($variables != NULL && isset($variables) ) {
                                        foreach ($variables as $key => $variable) {
                                            echo '<option value="'.$key.'">'.$variable.'</option>'; 
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="variable_3">Variable 3:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="variable_3"
                                id="variable_3"  
                            >   
                            <option value="NULL" selected>--Seleccionar Variable 3--</option>
                                <?php
                                    if ($variables != NULL && isset($variables) ) {
                                        foreach ($variables as $key => $variable) {
                                            echo '<option value="'.$key.'">'.$variable.'</option>'; 
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mt-3">
                        <h4>Ordenado por:</h4>
                        <div class="col-md-6 mb-3">
                            <label for="order_by">Ordenado por:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="order_by"
                                id="order_by"  
                            >   
                            <option value="NULL" selected>--Seleccionar Variable para ordenar--</option>
                            <option value="edad">Edad</option>
                                <?php
                                    if ($variables != NULL && isset($variables) ) {
                                        foreach ($variables as $key => $variable) {
                                            echo '<option value="'.$key.'">'.$variable.'</option>'; 
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" id="button-submit">Generar reporte</button>
                </form>
            </div>
            <section id="resultados-reporte">
            </section>
        </div>
    </div>
</main>

