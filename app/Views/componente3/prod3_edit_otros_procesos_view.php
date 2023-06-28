<style>
    .form-control{
        font-size: 0.8em;
    }
    .form-select{font-size: 0.9em;}
    #titulo-nombre{
        color: rgb(106, 145, 40);
    }
</style>
<main class="container-md px-2 mb-4">
    <div class="container-fluid px-0">
        <form action="<?php echo base_url().'/prod3-otros-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            
            <div class="card mb-4 mt-5">
                <div class="card-body mb-3">
                    <h3 class="mt-3"><?= esc (''); ?></h3>
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="grupo_interaprendizaje">Centro educativo:</label>
                            <div class="col-sm-6">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="centro_educativo" 
                                    id=""  
                                >
                                <option value="NULL" selected>-Centro educativo--</option>
                                <?php

                                    if ($centros != NULL && isset($centros)) {
                                        foreach ($centros as $key => $ce) {
                                            echo '<option value="'.$ce->amie.'" selected>'.$ce->amie.' - '.$ce->Centro.'</option>';                                           
                                        } 
                                        
                                    }else{
                                        echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                                    }
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                            <div class="col-sm-12">
                                <label for="biblioteca_viajera_num">Entrega Biblioteca viajera</label>
                                <div class="col-sm-2 mb-3">
                                    <select 
                                        class="form-select" 
                                        aria-label="Default select example" 
                                        name="encuentro_intercultural" 
                                        id=""  
                                    >
                                        <?php
                                            if ($prod3_otros != NULL) {
                                                if ($prod3_otros->encuentro_intercultural == '1') {
                                                    echo '<option value="1" selected>SI</option>
                                                            <option value="0">NO</option>';
                                                }elseif ($prod3_otros->encuentro_intercultural == '0') {
                                                    echo '<option value="1">SI</option>
                                                            <option value="0" selected>NO</option>';
                                                }elseif ($prod3_otros->encuentro_intercultural == NULL) {
                                                    echo '<option value="NULL" selected>Registrar</option>
                                                            <option value="1">SI</option>
                                                            <option value="0">NO</option>';
                                                }
                                            }else{
                                                echo '<option value="NULL" selected>Registrar</option>
                                                            <option value="1">SI</option>
                                                            <option value="0">NO</option>';
                                            }
                                        ?>
                                    </select>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">   
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <label for="encuentro_intercultural">Encuentro intercultural ():</label>
                        <div class="col-sm-8">
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="encuentro_intercultural" 
                                id=""  
                            >
                            
                            <?php
                                if ($prod3_otros != NULL) {
                                    if ($prod3_otros->encuentro_intercultural == '1') {
                                        echo '<option value="1" selected>SI</option>
                                                <option value="0">NO</option>';
                                    }elseif ($prod3_otros->encuentro_intercultural == '0') {
                                        echo '<option value="1">SI</option>
                                                <option value="0" selected>NO</option>';
                                    }elseif ($prod3_otros->encuentro_intercultural == NULL) {
                                        echo '<option value="NULL" selected>Registrar</option>
                                                <option value="1">SI</option>
                                                <option value="0">NO</option>';
                                    }
                                }else{
                                    echo '<option value="NULL" selected>Registrar</option>
                                                <option value="1">SI</option>
                                                <option value="0">NO</option>';
                                }
                                
                            ?>
                            </select>
                            <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                        </div>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label for="fecha_encuentro">Fecha del encuentro:</label>
                        <div class="col-sm-8">
                            <?php
                                if (isset($prod3_otros->fecha_encuentro) && $prod3_otros->fecha_encuentro != null && $prod3_otros->fecha_encuentro != '') {
                                    echo '<input type="date" id="fecha_encuentro" name="fecha_encuentro" value="'.$prod3_otros->fecha_encuentro.'" class="form-control" aria-label="fecha_encuentro">';
                                }else{
                                    echo '<input type="date" id="fecha_encuentro" name="fecha_encuentro" value=""  class="form-control" aria-label="fecha_encuentro">';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body mt-2 mb-3">   
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="encuentro_intercultural">:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                1. Exposición de trabajos
                            </label>
                            <form action="<?php echo base_url().'/prod3-exptrabajo-cargar-evidencia';?>" method="post" id="form-subir-evidencia" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="container mb-3" style="margin-top:20px;">
                                    <div class="col-sm-12 mb-3">
                                        <h5> </h5>
                                    </div>
                                    <div class="col-sm-5 mb-3">
                                        <label>Subir evidencia de Exposición de trabajos</label>
                                        <input class="form-control form-control-sm" type="file" name="hoja" id="formFile" value="Subir archivo excel">
                                    </div>
                                    <p id="error-message"><?= session('errors.cargar_info');?> </p>
                                    <div>
                                        
                                        <input type="submit" class="btn btn-outline-secondary" value="Subir archivo">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                2. Expresión oral
                            </label>
                            <form action="<?php echo base_url().'/prod3-exporal-cargar-evidencia';?>" method="post" id="form-subir-evidencia" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="container mb-3" style="margin-top:20px;">
                                    <div class="col-sm-12 mb-3">
                                        <h5> </h5>
                                    </div>
                                    <div class="col-sm-5 mb-3">
                                        <label>Subir evidencia de Expresión oral</label>
                                        <input class="form-control form-control-sm" type="file" name="hoja" id="formFile" value="Subir archivo excel">
                                    </div>
                                    <p id="error-message"><?= session('errors.cargar_info');?> </p>
                                    <div>
                                        <input type="submit" class="btn btn-outline-secondary" value="Subir archivo">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                3. Expresión escrita y gráfica
                            </label>
                            <form action="<?php echo base_url().'/prod3-expescrita-cargar-evidencia';?>" method="post" id="form-subir-evidencia" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="container mb-3" style="margin-top:20px;">
                                    <div class="col-sm-12 mb-3">
                                        <h5> </h5>
                                    </div>
                                    <div class="col-sm-5 mb-3">
                                        <label>Subir evidencia de Expresión escrita y gráfica</label>
                                        <input class="form-control form-control-sm" type="file" name="hoja" id="formFile" value="Subir archivo excel">
                                    </div>
                                    <p id="error-message"><?= session('errors.cargar_info');?> </p>
                                    <div>
                                        <input type="submit" class="btn btn-outline-secondary" value="Subir archivo">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                4. Participación de docentes
                            </label>
                            <form action="<?php echo base_url().'/prod3-participadocente-cargar-evidencia';?>" method="post" id="form-subir-evidencia" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="container mb-3" style="margin-top:20px;">
                                    <div class="col-sm-12 mb-3">
                                        <h5> </h5>
                                    </div>
                                    <div class="col-sm-5 mb-3">
                                        <label>Subir evidencia de Participación de docentes</label>
                                        <input class="form-control form-control-sm" type="file" name="hoja" id="formFile" value="Subir archivo excel">
                                    </div>
                                    <p id="error-message"><?= session('errors.cargar_info');?> </p>
                                    <div>
                                        <input type="submit" class="btn btn-outline-secondary" value="Subir archivo">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                4. Participación de padres y madres de familia
                            </label>
                            <form action="<?php echo base_url().'/prod3-participapadres-cargar-evidencia';?>" method="post" id="form-subir-evidencia" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="container mb-3" style="margin-top:20px;">
                                    <div class="col-sm-12 mb-3">
                                        <h5> </h5>
                                    </div>
                                    <div class="col-sm-5 mb-3">
                                        <label>Subir evidencia de Participación de padres y madres de familia</label>
                                        <input class="form-control form-control-sm" type="file" name="hoja" id="formFile" value="Subir archivo excel">
                                    </div>
                                    <p id="error-message"><?= session('errors.cargar_info');?> </p>
                                    <div>
                                        <input type="submit" class="btn btn-outline-secondary" value="Subir archivo">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <?= form_hidden('id_prod_3', $id);  ?>
            <button type="submit" class="btn btn-info mb-3">Actualizar</button>
        </form>
        <button onclick="history.back()" class="btn btn-success mb-3">Regresar</button>
        <a class="btn btn-success mb-3" href="<?php echo site_url().'prod_3_process'; ?>">Ir al menú del Componente 3</a>
    </div>
    
</main>
<script>
    $(document).ready(function(){

        jQuery('.number').keypress(function(tecla){
            if(tecla.charCode < 48 || tecla.charCode > 57){
                return false;
            }
        });
    });
</script>