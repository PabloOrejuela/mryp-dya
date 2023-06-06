<style>
    .form-control{
        font-size: 0.8em;
    }
    .form-select{font-size: 0.8em;}
    #titulo-nombre{
        color: rgb(106, 145, 40);
    }
</style>
<main class="container-md px-2 mb-4">
    <div class="container-fluid px-0">
        <h4 class="mt-4" id="titulo-nombre"><?= esc($title).' - Cuidadanía de: '.$datos->nombre; ?></h4>
        <form action="<?php echo base_url().'/prod3-otros-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <h4 class="mt-3"><?= esc ('OTROS'); ?></h4>
                        <div class="col-md-2 mb-2">
                            <label for="otros">Otros:</label>
                            <div class="col-sm-8">
                                <?php
                                    if (isset($prod3_otros->otros) && $prod3_otros->otros != null && $prod3_otros->otros != '') {
                                        echo '<textarea name="otros" id="otros" cols="30" rows="3">'.$prod3_otros->otros.'</textarea>';
                                    }else{
                                        echo '<textarea name="otros" id="otros" cols="30" rows="3"></textarea>';
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="total_otros_temas">Total otros temas:</label>
                            <div class="col-sm-8">
                                <?php
                                    if (isset($prod3_otros->total_otros_temas) && $prod3_otros->total_otros_temas != null && $prod3_otros->total_otros_temas != '') {
                                        echo '<input type="number" id="total_otros_temas" name="total_otros_temas" value="'.$prod3_otros->total_otros_temas.'" class="form-control" placeholder="" aria-label="total_otros_temas">';
                                    }else{
                                        echo '<input type="number" id="total_otros_temas" name="total_otros_temas" value="" class="form-control" placeholder="" aria-label="total_otros_temas">';
                                    }
                                ?>
                                
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="grupo_interaprendizaje">Grupo Inter - aprendizaje:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="grupo_interaprendizaje" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_otros != NULL) {
                                        if ($prod3_otros->grupo_interaprendizaje == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_otros->grupo_interaprendizaje == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_otros->grupo_interaprendizaje == NULL) {
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
                </div>
            </div>
            
            <?= form_hidden('id', $id);  ?>
            <button type="submit" class="btn btn-info mb-3">Actualizar</button>
        </form>
        <button onclick="history.back()" class="btn btn-success mb-3">Regresar</button>
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