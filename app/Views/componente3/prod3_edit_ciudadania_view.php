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
        <form action="<?php echo base_url().'/prod3-ciudad-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <h4 class="mt-3"><?= esc ('TALLERES'); ?></h4>
                        <div class="col-md-3 mb-2">
                            <label for="interculturalidad">Interculturalidad y ciudadanía:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="interculturalidad" 
                                    id="interculturalidad"  
                                >
                                <?php
                                    if ($prod3_ciudad != NULL) {
                                        if ($prod3_ciudad->interculturalidad == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_ciudad->interculturalidad == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_ciudad->interculturalidad == NULL) {
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
                        <div class="col-md-3 mb-2">
                            <label for="masculinidad">Masculinidades y ciudadanía:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="masculinidad" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_ciudad != NULL) {
                                        if ($prod3_ciudad->masculinidad == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_ciudad->masculinidad == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_ciudad->masculinidad == NULL) {
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
                        <div class="col-md-3 mb-2">
                            <label for="sexo_genero">Diversidad de sexo / genéricas:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="sexo_genero" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_ciudad != NULL) {
                                        if ($prod3_ciudad->sexo_genero == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_ciudad->sexo_genero == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_ciudad->sexo_genero == NULL) {
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
                        <div class="col-md-3 mb-2">
                            <label for="violencia_genero">Violencias basadas en género y ciudadanía:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="violencia_genero" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_ciudad != NULL) {
                                        if ($prod3_ciudad->violencia_genero == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_ciudad->violencia_genero == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_ciudad->violencia_genero == NULL) {
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

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="diversidad_estetica">Diversidades estéticas :</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="diversidad_estetica" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_ciudad != NULL) {
                                        if ($prod3_ciudad->diversidad_estetica == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_ciudad->diversidad_estetica == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_ciudad->diversidad_estetica == NULL) {
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
                        <div class="col-md-4 mb-2">
                            <label for="diversidad_neuro">Diversidades neurodivergentes y ciudadanía:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="diversidad_neuro" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_ciudad != NULL) {
                                        if ($prod3_ciudad->diversidad_neuro == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_ciudad->diversidad_neuro == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_ciudad->diversidad_neuro == NULL) {
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
            <?= form_hidden('id_prod_3', $id);  ?>
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