<style>
    .form-control{
        font-size: 0.8em;
    }
    #titulo-nombre{
        color: rgb(106, 145, 40);
    }
</style>
<main class="container-md px-2 mb-4">
    <div class="container-fluid px-0">
        <h4 class="mt-4" id="titulo-nombre"><?= esc($title).' : '.$prod->apellidos.' '.$prod->nombres ; ?></h4>
        <form action="<?php echo base_url().'/prod1-diagnostico-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <h4 class="mt-3"><?= esc ('Diagnóstico Docente'); ?></h4>
                        <div class="col-md-4 mb-2">
                            <label for="escritura">Escritura:</label>
                            <div class="col-sm-6">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="escritura" 
                                    id="escritura"  
                                >
                                <?php
                                    if ($datos != NULL) {
                                        if ($datos->escritura == 'SI') {
                                            echo '<option value="SI" selected>SI</option>
                                                    <option value="NO">NO</option>';
                                        }elseif ($datos->escritura == 'NO') {
                                            echo '<option value="SI">SI</option>
                                                    <option value="NO" selected>NO</option>';
                                        }elseif ($datos->escritura == NULL || $datos->escritura == '0') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>  
                        <div class="col-md-4 mb-2">
                            <label for="lectura">Lectura:</label>
                            <div class="col-sm-6">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="lectura" 
                                    id="lectura"  
                                >
                                <?php
                                    if ($datos != NULL) {
                                        if ($datos->lectura == 'SI') {
                                            echo '<option value="SI" selected>SI</option>
                                                    <option value="NO">NO</option>';
                                        }elseif ($datos->lectura == 'NO') {
                                            echo '<option value="SI">SI</option>
                                                    <option value="NO" selected>NO</option>';
                                        }elseif ($datos->lectura == NULL || $datos->lectura == '0') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="SI">SI</option>
                                                    <option value="NO">NO</option>';
                                        }

                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                <div class="col-md-4 mb-2">
                    <label for="lectura">Matemática:</label>
                    <div class="col-sm-6">
                        <select 
                            class="form-select" 
                            aria-label="Default select example" 
                            name="matematica" 
                            id="matematica"  
                        >
                        <?php
                            if ($datos != NULL) {
                                if ($datos->matematica == 'SI') {
                                    echo '<option value="SI" selected>SI</option>
                                            <option value="NO">NO</option>';
                                }elseif ($datos->matematica == 'NO') {
                                    echo '<option value="SI">SI</option>
                                            <option value="NO" selected>NO</option>';
                                }elseif($datos->matematica == NULL || $datos->matematica == '0'){
                                    echo '<option value="NULL" selected>Registrar dato</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>';
                                }
                            }else{
                                echo '<option value="NULL" selected>Registrar dato</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>';
                            }
                            
                        ?>
                        </select>
                        <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    
                </div>
            </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <h4 class="mt-3"><?= esc ('Diagnóstico MYRP'); ?></h4>
                        
                        <div class="col-md-4 mb-2">
                            <label for="apoyo">Necesitó apoyo consigna lectora (S,N):</label>
                            <div class="col-sm-6">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="necesito_apoyo" 
                                    id="necesito_apoyo"  
                                >
                                <?php
                                    if ($datos_diag_myrp != NULL) {
                                        if ($datos_diag_myrp->necesito_apoyo == 'SI') {
                                            echo '<option value="SI" selected>SI</option>
                                                    <option value="NO">NO</option>';
                                        }elseif ($datos_diag_myrp->necesito_apoyo == 'NO') {
                                            echo '<option value="SI">SI</option>
                                                    <option value="NO" selected>NO</option>';
                                        }elseif ($datos_diag_myrp->necesito_apoyo == NULL || $datos_diag_myrp->necesito_apoyo == '0') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="SI">SI</option>
                                                    <option value="NO">NO</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="observacion">Observación durante la aplicación:</label>
                            <div class="col-sm-6">
                                <?php
                                    if (isset($datos_diag_myrp->observacion) && $datos_diag_myrp->observacion != null && $datos_diag_myrp->observacion != '') {
                                        echo '<textarea name="observacion" id="observacion" cols="30" rows="3">'.$datos_diag_myrp->observacion.'</textarea>';
                                    }else{
                                        echo '<textarea name="observacion" id="observacion" cols="30" rows="3"></textarea>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <h4 class="mt-3"><?= esc ('Pregunta 1'); ?></h4>
                        <div class="col-md-4 mb-2">
                            <label for="p1_comprension_lectora">Comprensión consigna lectora (A,B):</label>
                            <div class="col-sm-6">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="p1_comprension_lectora" 
                                    id="p1_comprension_lectora"  
                                >
                                <?php
                                    if ($datos_diag_myrp != NULL) {
                                        if ($datos_diag_myrp->p1_comprension_lectora == 'A') {
                                            echo '<option value="A" selected>A</option>
                                                    <option value="B">B</option>';
                                        }elseif ($datos_diag_myrp->p1_comprension_lectora == 'B') {
                                            echo '<option value="A">A</option>
                                                    <option value="B" selected>B</option>';
                                        }elseif ($datos_diag_myrp->p1_comprension_lectora == NULL || $datos_diag_myrp->p1_comprension_lectora == '0') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="p1_inteligibilidad">Significado de la escritura y la Inteligibilidad (A,B):</label>
                            <div class="col-sm-6">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="p1_inteligibilidad" 
                                    id="p1_inteligibilidad"  
                                >
                                <?php
                                    if ($datos_diag_myrp != NULL) {
                                        if ($datos_diag_myrp->p1_inteligibilidad == 'A') {
                                            echo '<option value="A" selected>A</option>
                                                    <option value="B">B</option>';
                                        }elseif ($datos_diag_myrp->p1_inteligibilidad == 'B') {
                                            echo '<option value="A">A</option>
                                                    <option value="B" selected>B</option>';
                                        }elseif ($datos_diag_myrp->p1_inteligibilidad == NULL || $datos_diag_myrp->p1_inteligibilidad == '0') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>';
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
                        <h4 class="mt-3"><?= esc ('Pregunta 2'); ?></h4>
                        <div class="col-md-4 mb-3">
                            <label for="p2_comprension_lectora">Comprensión consigna lectora (A,B):</label>
                            <div class="col-sm-6">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="p2_comprension_lectora" 
                                    id="p2_comprension_lectora"  
                                >
                                <?php
                                    if ($datos_diag_myrp != NULL) {
                                        if ($datos_diag_myrp->p2_comprension_lectora == 'A') {
                                            echo '<option value="A" selected>A</option>
                                                    <option value="B">B</option>';
                                        }elseif ($datos_diag_myrp->p2_comprension_lectora == 'B') {
                                            echo '<option value="A">A</option>
                                                    <option value="B" selected>B</option>';
                                        }elseif ($datos_diag_myrp->p2_comprension_lectora == NULL || $datos_diag_myrp->p2_comprension_lectora == '0') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="p2_descripcion_dibujo">Descripción del dibujo:</label>
                            <div class="col-sm-6">
                                <?php
                                    if (isset($datos_diag_myrp->p2_descripcion_dibujo) && $datos_diag_myrp->p2_descripcion_dibujo != null && $datos_diag_myrp->p2_descripcion_dibujo != '') {
                                        echo '<textarea name="p2_descripcion_dibujo" id="" cols="30" rows="3">'.$datos_diag_myrp->p2_descripcion_dibujo.'</textarea>';
                                    }else{
                                        echo '<textarea name="p2_descripcion_dibujo" id="" cols="30" rows="3"></textarea>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <h4 class="mt-3"><?= esc ('Pregunta 3'); ?></h4>
                        <div class="col-md-4 mb-2">
                            <label for="p3_comprension_lectora">Comprensión consigna lectora (A,B,C):</label>
                            <div class="col-sm-6">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="p3_comprension_lectora" 
                                    id="p3_comprension_lectora"  
                                >
                                <?php
                                    if ($datos_diag_myrp != NULL) {
                                        if ($datos_diag_myrp->p3_comprension_lectora == 'A') {
                                            echo '<option value="A" selected>A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>';
                                        }elseif ($datos_diag_myrp->p3_comprension_lectora == 'B') {
                                            echo '<option value="A">A</option>
                                                    <option value="B" selected>B</option>
                                                    <option value="C">C</option>';
                                        }elseif ($datos_diag_myrp->p3_comprension_lectora == 'C') {
                                            echo '<option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C" selected>C</option>';
                                        }elseif ($datos_diag_myrp->p3_comprension_lectora == NULL || $datos_diag_myrp->p3_comprension_lectora == '0') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="p3_inteligibilidad">Inteligibilidad (A, B, C):</label>
                            <div class="col-sm-6">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="p3_inteligibilidad" 
                                    id="p3_inteligibilidad"  
                                >
                                <?php
                                    if ($datos_diag_myrp != NULL) {
                                        if ($datos_diag_myrp->p3_inteligibilidad == 'A') {
                                            echo '<option value="A" selected>A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>';
                                        }elseif ($datos_diag_myrp->p3_inteligibilidad == 'B') {
                                            echo '<option value="A">A</option>
                                                    <option value="B" selected>B</option>
                                                    <option value="C">C</option>';
                                        }elseif ($datos_diag_myrp->p3_inteligibilidad == 'C') {
                                            echo '<option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C" selected>C</option>';
                                        }elseif ($datos_diag_myrp->p3_inteligibilidad == NULL || $datos_diag_myrp->p3_inteligibilidad == '0') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="p3_coherencia">Coherencia (A,B,C,D):</label>
                            <div class="col-sm-6">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="p3_coherencia" 
                                    id="p3_coherencia"  
                                >
                                <?php
                                    if ($datos_diag_myrp != NULL) {
                                        if ($datos_diag_myrp->p3_coherencia == 'A') {
                                            echo '<option value="A" selected>A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>';
                                        }elseif ($datos_diag_myrp->p3_coherencia == 'B') {
                                            echo '<option value="A">A</option>
                                                    <option value="B" selected>B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>';
                                        }elseif ($datos_diag_myrp->p3_coherencia == 'C') {
                                            echo '<option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C" selected>C</option>
                                                    <option value="D" >D</option>';
                                        }elseif ($datos_diag_myrp->p3_coherencia == 'D') {
                                            echo '<option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C" >C</option>
                                                    <option value="D" selected>D</option>';
                                        }elseif ($datos_diag_myrp->p3_coherencia == NULL || $datos_diag_myrp->p3_coherencia == '0') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="p3_sintaxis">Sintáxis (A,B,C,D):</label>
                            <div class="col-sm-6">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="p3_sintaxis" 
                                    id="p3_sintaxis"  
                                >
                                <?php
                                    if ($datos_diag_myrp != NULL) {
                                        if ($datos_diag_myrp->p3_sintaxis == 'A') {
                                            echo '<option value="A" selected>A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>';
                                        }elseif ($datos_diag_myrp->p3_sintaxis == 'B') {
                                            echo '<option value="A">A</option>
                                                    <option value="B" selected>B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>';
                                        }elseif ($datos_diag_myrp->p3_sintaxis == 'C') {
                                            echo '<option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C" selected>C</option>
                                                    <option value="D" >D</option>';
                                        }elseif ($datos_diag_myrp->p3_sintaxis == 'D') {
                                            echo '<option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C" >C</option>
                                                    <option value="D" selected>D</option>';
                                        }elseif ($datos_diag_myrp->p3_sintaxis == NULL || $datos_diag_myrp->p3_sintaxis == '0') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="p3_estandares_egb_sub2y3">Estándares EGB Subnivel 2 y 3 (A,B):</label>
                            <div class="col-sm-6">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="p3_estandares_egb_sub2y3" 
                                    id="p3_estandares_egb_sub2y3"  
                                >
                                <?php
                                    if ($datos_diag_myrp != NULL) {
                                        if ($datos_diag_myrp->p3_estandares_egb_sub2y3 == 'A') {
                                            echo '<option value="A" selected>A</option>
                                                    <option value="B">B</option>';
                                        }elseif ($datos_diag_myrp->p3_estandares_egb_sub2y3 == 'B') {
                                            echo '<option value="A">A</option>
                                                    <option value="B" selected>B</option>';
                                        }elseif ($datos_diag_myrp->p3_estandares_egb_sub2y3 == NULL || $datos_diag_myrp->p3_estandares_egb_sub2y3 == '0') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>';
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
                        <h4 class="mt-3"><?= esc ('Pregunta 4'); ?></h4>
                        <div class="col-md-4 mb-2">
                            <label for="p4_comprension_lectora">Comprensión consigna lectora (A,B,C):</label>
                            <div class="col-sm-6">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="p4_comprension_lectora" 
                                    id="p4_comprension_lectora"  
                                >
                                <?php
                                    if ($datos_diag_myrp != NULL) {
                                        if ($datos_diag_myrp->p4_comprension_lectora == 'A') {
                                            echo '<option value="A" selected>A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>';
                                        }elseif ($datos_diag_myrp->p4_comprension_lectora == 'B') {
                                            echo '<option value="A">A</option>
                                                    <option value="B" selected>B</option>
                                                    <option value="C">C</option>';
                                        }elseif ($datos_diag_myrp->p4_comprension_lectora == 'C') {
                                            echo '<option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C" selected>C</option>';
                                        }elseif ($datos_diag_myrp->p4_comprension_lectora == NULL || $datos_diag_myrp->p4_comprension_lectora == '0') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="p4_inteligibilidad">Inteligibilidad (A, B, C):</label>
                            <div class="col-sm-6">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="p4_inteligibilidad" 
                                    id="p4_inteligibilidad"  
                                >
                                <?php
                                    if ($datos_diag_myrp != NULL) {
                                        if ($datos_diag_myrp->p4_inteligibilidad == 'A') {
                                            echo '<option value="A" selected>A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>';
                                        }elseif ($datos_diag_myrp->p4_inteligibilidad == 'B') {
                                            echo '<option value="A">A</option>
                                                    <option value="B" selected>B</option>
                                                    <option value="C">C</option>';
                                        }elseif ($datos_diag_myrp->p4_inteligibilidad == 'C') {
                                            echo '<option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C" selected>C</option>';
                                        }elseif ($datos_diag_myrp->p4_inteligibilidad == NULL || $datos_diag_myrp->p4_inteligibilidad == '0') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="p4_coherencia">Coherencia (A,B,C,D):</label>
                            <div class="col-sm-6">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="p4_coherencia" 
                                    id="p4_coherencia"  
                                >
                                <?php
                                    if ($datos_diag_myrp != NULL) {
                                        if ($datos_diag_myrp->p4_coherencia == 'A') {
                                            echo '<option value="A" selected>A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>';
                                        }elseif ($datos_diag_myrp->p4_coherencia == 'B') {
                                            echo '<option value="A">A</option>
                                                    <option value="B" selected>B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>';
                                        }elseif ($datos_diag_myrp->p4_coherencia == 'C') {
                                            echo '<option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C" selected>C</option>
                                                    <option value="D" >D</option>';
                                        }elseif ($datos_diag_myrp->p4_coherencia == 'D') {
                                            echo '<option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C" >C</option>
                                                    <option value="D" selected>D</option>';
                                        }elseif ($datos_diag_myrp->p4_coherencia == NULL || $datos_diag_myrp->p4_coherencia == '0') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="p4_sintaxis">Sintáxis (A,B,C,D):</label>
                            <div class="col-sm-6">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="p4_sintaxis" 
                                    id="p4_sintaxis"  
                                >
                                <?php
                                    if ($datos_diag_myrp != NULL) {
                                        if ($datos_diag_myrp->p4_sintaxis == 'A') {
                                            echo '<option value="A" selected>A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>';
                                        }elseif ($datos_diag_myrp->p4_sintaxis == 'B') {
                                            echo '<option value="A">A</option>
                                                    <option value="B" selected>B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>';
                                        }elseif ($datos_diag_myrp->p4_sintaxis == 'C') {
                                            echo '<option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C" selected>C</option>
                                                    <option value="D" >D</option>';
                                        }elseif ($datos_diag_myrp->p4_sintaxis == 'D') {
                                            echo '<option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C" >C</option>
                                                    <option value="D" selected>D</option>';
                                        }elseif ($datos_diag_myrp->p4_sintaxis == NULL || $datos_diag_myrp->p4_sintaxis == '0') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="p4_estandares_egb_sub2y3">Estándares EGB Subnivel 2 y 3 (A,B):</label>
                            <div class="col-sm-6">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="p4_estandares_egb_sub2y3" 
                                    id="p4_estandares_egb_sub2y3"  
                                >
                                <?php
                                    if ($datos_diag_myrp != NULL) {
                                        if ($datos_diag_myrp->p4_estandares_egb_sub2y3 == 'A') {
                                            echo '<option value="A" selected>A</option>
                                                    <option value="B">B</option>';
                                        }elseif ($datos_diag_myrp->p4_estandares_egb_sub2y3 == 'B') {
                                            echo '<option value="A">A</option>
                                                    <option value="B" selected>B</option>';
                                        }elseif ($datos_diag_myrp->p4_estandares_egb_sub2y3 == NULL || $datos_diag_myrp->p4_estandares_egb_sub2y3 == '0') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?= form_hidden('id', $idprod);  ?>
            <?= form_hidden('idtipo', 1);  ?>
            <button type="submit" class="btn btn-info mb-3">Actualizar</button>
            
            
        </form>
        <button onclick="history.back()" class="btn btn-success mb-3">Regresar</button>
    </div>
    
</main>