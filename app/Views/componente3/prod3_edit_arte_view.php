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
        <h4 class="mt-4" id="titulo-nombre"><?= esc($title).' - Expresión Artística de: '.$datos->nombre; ?></h4>
        <form action="<?php echo base_url().'/prod3-process-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <h4 class="mt-3"><?= esc ('TALLERES'); ?></h4>
                        <div class="col-md-2 mb-2">
                            <label for="taller_1">Taller 1:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="taller_1" 
                                    id="taller_1"  
                                >
                                <?php
                                    if ($var_pro3 != NULL) {
                                        if ($var_pro3->taller_1 == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($var_pro3->taller_1 == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($var_pro3->taller_1 == NULL) {
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
                            <label for="taller_2">Taller 2:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="taller_2" 
                                    id=""  
                                >
                                <?php
                                    if ($var_pro3 != NULL) {
                                        if ($var_pro3->taller_2 == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($var_pro3->taller_2 == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($var_pro3->taller_2 == NULL) {
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
                            <label for="taller_3">Taller 3:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="taller_3" 
                                    id=""  
                                >
                                <?php
                                    if ($var_pro3 != NULL) {
                                        if ($var_pro3->taller_3 == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($var_pro3->taller_3 == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($var_pro3->taller_3 == NULL) {
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
                            <label for="taller_4">Taller 4:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="taller_4" 
                                    id=""  
                                >
                                <?php
                                    if ($var_pro3 != NULL) {
                                        if ($var_pro3->taller_4 == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($var_pro3->taller_4 == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($var_pro3->taller_4 == NULL) {
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
                            <label for="taller_5">Taller 5:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="taller_5" 
                                    id=""  
                                >
                                <?php
                                    if ($var_pro3 != NULL) {
                                        if ($var_pro3->taller_5 == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($var_pro3->taller_5 == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($var_pro3->taller_5 == NULL) {
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
                            <label for="taller_6">Taller 6:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="taller_6" 
                                    id=""  
                                >
                                <?php
                                    if ($var_pro3 != NULL) {
                                        if ($var_pro3->taller_6 == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($var_pro3->taller_6 == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($var_pro3->taller_6 == NULL) {
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
                            <label for="taller_7">Taller 7:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="taller_7" 
                                    id=""  
                                >
                                <?php
                                    if ($var_pro3 != NULL) {
                                        if ($var_pro3->taller_7 == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($var_pro3->taller_7 == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($var_pro3->taller_7 == NULL) {
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
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <h4 class="mt-3"><?= esc ('CLASES DEMOSTRATIVAS'); ?></h4>
                        <div class="col-md-2 mb-2">
                            <label for="clase_1">Clase 1:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="clase_1" 
                                    id="clase_1"  
                                >
                                <?php
                                    if ($var_pro3 != NULL) {
                                        if ($var_pro3->clase_1 == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($var_pro3->clase_1 == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($var_pro3->clase_1 == NULL) {
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
                            <label for="clase_2">Clase 2:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="clase_2" 
                                    id=""  
                                >
                                <?php
                                    if ($var_pro3 != NULL) {
                                        if ($var_pro3->clase_2 == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($var_pro3->clase_2 == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($var_pro3->clase_2 == NULL) {
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
                            <label for="clase_3">Clase 3:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="clase_3" 
                                    id=""  
                                >
                                <?php
                                    if ($var_pro3 != NULL) {
                                        if ($var_pro3->clase_3 == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($var_pro3->clase_3 == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($var_pro3->clase_3 == NULL) {
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
                            <label for="clase_4">Clase 4:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="clase_4" 
                                    id=""  
                                >
                                <?php
                                    if ($var_pro3 != NULL) {
                                        if ($var_pro3->clase_4 == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($var_pro3->clase_4 == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($var_pro3->clase_4 == NULL) {
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
                            <label for="clase_5">Clase 5:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="clase_5" 
                                    id=""  
                                >
                                <?php
                                    if ($var_pro3 != NULL) {
                                        if ($var_pro3->clase_5 == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($var_pro3->clase_5 == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($var_pro3->clase_5 == NULL) {
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
                            <label for="clase_6">Clase 6:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="clase_6" 
                                    id=""  
                                >
                                <?php
                                    if ($var_pro3 != NULL) {
                                        if ($var_pro3->clase_6 == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($var_pro3->clase_6 == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($var_pro3->clase_6 == NULL) {
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
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <h4 class="mt-3"><?= esc ('OTROS'); ?></h4>
                        <div class="col-md-2 mb-2">
                            <label for="otros">Otros:</label>
                            <div class="col-sm-8">
                                <?php
                                    if (isset($var_pro3->otros) && $var_pro3->otros != null && $var_pro3->otros != '') {
                                        echo '<textarea name="otros" id="otros" cols="30" rows="3">'.$var_pro3->otros.'</textarea>';
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
                                    if (isset($var_pro3->total_otros_temas) && $var_pro3->total_otros_temas != null && $var_pro3->total_otros_temas != '') {
                                        echo '<input type="number" id="total_otros_temas" name="total_otros_temas" value="'.$var_pro3->total_otros_temas.'" class="form-control" placeholder="" aria-label="total_otros_temas">';
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
                                    if ($var_pro3 != NULL) {
                                        if ($var_pro3->grupo_interaprendizaje == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($var_pro3->grupo_interaprendizaje == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($var_pro3->grupo_interaprendizaje == NULL) {
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
                                    if ($var_pro3 != NULL) {
                                        if ($var_pro3->encuentro_intercultural == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($var_pro3->encuentro_intercultural == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($var_pro3->encuentro_intercultural == NULL) {
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
                                    if (isset($var_pro3->fecha_encuentro) && $var_pro3->fecha_encuentro != null && $var_pro3->fecha_encuentro != '') {
                                        echo '<input type="date" id="fecha_encuentro" name="fecha_encuentro" value="'.$var_pro3->fecha_encuentro.'" class="form-control" aria-label="fecha_encuentro">';
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