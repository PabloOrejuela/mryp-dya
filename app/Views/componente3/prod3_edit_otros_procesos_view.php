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
            
            <div class="card mb-4">
                <div class="card-body mb-3">
                    <h3 class="mt-3"><?= esc (''); ?></h3>
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="grupo_interaprendizaje">Biblioteca viajera:</label>
                            <div class="col-sm-6">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="centro_educativo" 
                                    id=""  
                                >
                                <option value="NULL" selected>--Centro educativo</option>
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
                                <label for="tema_grupo_inter"></label>
                                <div class="col-sm-8 mb-3">
                                    
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="card-body">   
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <label for="encuentro_intercultural">Encuentro intercultural:</label>
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
            </div> -->
            
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