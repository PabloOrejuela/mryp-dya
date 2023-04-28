<style>
    .form-control{
        font-size: 0.7em;
    }
    #titulo-nombre{
        color: rgb(106, 145, 40);
    }
    #pregunta{
        font-weight: bold;
    }
    #select-pregunta{
        font-size: 0.8em;
    }

</style>
<main class="container-md px-2 mb-4">
    <div class="container-fluid px-0">
        <h5 class="mt-4" id="titulo-nombre"><?= esc($title).' - EVALUACION MATEMÁTICA (Elemental) AUN EN DESARROLLO: '.$datos->apellidos.' '.$datos->nombres; ?></h5>
        <form action="<?php echo base_url().'/prod1-evalMateElem-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <h4 class="mt-3"><?= esc ('Relación Figuras Geométricas'); ?></h4>
                        
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Pregunta 1</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="relacion_figuras_geo_1" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->relacion_figuras_geo_1 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->relacion_figuras_geo_1 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->relacion_figuras_geo_1 == NULL || $eval_mate->relacion_figuras_geo_1 == '') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Pregunta 1.1</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="relacion_figuras_geo_1_1" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->relacion_figuras_geo_1_1 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->relacion_figuras_geo_1_1 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->relacion_figuras_geo_1_1 == NULL || $eval_mate->relacion_figuras_geo_1_1 == '') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
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
                        <h4 class="mt-3"><?= esc ('Seriación 2'); ?></h4>
                        
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Seriación 2</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="seriacion_2" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->seriacion_2 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->seriacion_2 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->seriacion_2 == NULL || $eval_mate->seriacion_2 == '') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Conjuntos 2.1</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="conjuntos_2_1" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->conjuntos_2_1 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->conjuntos_2_1 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->conjuntos_2_1 == NULL || $eval_mate->conjuntos_2_1 == '') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Seriación 2.2</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="seriacion_2_2" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->seriacion_2_2 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->seriacion_2_2 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->seriacion_2_2 == NULL || $eval_mate->seriacion_2_2 == '') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
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
                        <h4 class="mt-3"><?= esc ('Orientación Espacial'); ?></h4>
                        
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Pregunta 3</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="orientacion_3" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->orientacion_3 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->orientacion_3 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->orientacion_3 == NULL || $eval_mate->orientacion_3 == '') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Pregunta 3.1</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="orientacion_3_1" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->orientacion_3_1 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->orientacion_3_1 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->orientacion_3_1 == NULL || $eval_mate->orientacion_3_1 == '') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Pregunta 3.2</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="orientacion_3_2" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->orientacion_3_2 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->orientacion_3_2 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->orientacion_3_2 == NULL || $eval_mate->orientacion_3_2 == '') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
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
                        <h4 class="mt-3"><?= esc ('Esquema Corporal'); ?></h4>
                        
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Pregunta 3.3</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="esquema_corporal_3_3" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->esquema_corporal_3_3 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->esquema_corporal_3_3 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->esquema_corporal_3_3 == NULL || $eval_mate->esquema_corporal_3_3 == '') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Pregunta 4</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="esquema_corporal_4" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->esquema_corporal_4 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->esquema_corporal_4 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->esquema_corporal_4 == NULL || $eval_mate->esquema_corporal_4 == '') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Pregunta 4.1</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="esquema_corporal_4_1" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->esquema_corporal_4_1 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->esquema_corporal_4_1 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->esquema_corporal_4_1 == NULL || $eval_mate->esquema_corporal_4_1 == '') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Seriación 5</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="seriacion_5" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->seriacion_5 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->seriacion_5 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->seriacion_5 == NULL || $eval_mate->seriacion_5 == '') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
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
                        <h4 class="mt-3"><?= esc ('Suma'); ?></h4>
                        
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Pregunta 6</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="suma_6" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->suma_6 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->suma_6 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->suma_6 == NULL || $eval_mate->suma_6 == '') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Pregunta 7</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="suma_7" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->suma_7 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->suma_7 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->suma_7 == NULL || $eval_mate->suma_7 == '') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
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
                        <h4 class="mt-3"><?= esc ('Resta'); ?></h4>
                        
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Pregunta 8</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="resta_8" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->resta_8 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->resta_8 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->resta_8 == NULL || $eval_mate->resta_8 == '') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Pregunta 9</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="resta_9" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->resta_9 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->resta_9 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->resta_9 == NULL || $eval_mate->resta_9 == '') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
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
                        <h4 class="mt-3"><?= esc ('Multiplicación'); ?></h4>
                        
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Pregunta 10</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="multiplica_10" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->multiplica_10 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->multiplica_10 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->multiplica_10 == NULL || $eval_mate->multiplica_10 == '') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Pregunta 11</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="multiplica_11" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->multiplica_11 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->multiplica_11 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->multiplica_11 == NULL || $eval_mate->multiplica_11 == '') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
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
                        <h4 class="mt-3"><?= esc ('División'); ?></h4>
                        
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Pregunta 12</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="divide_12" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->divide_12 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->divide_12 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->divide_12 == NULL || $eval_mate->divide_12 == '') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Pregunta 13</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="divide_13" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->divide_13 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->divide_13 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->divide_13 == NULL || $eval_mate->divide_13 == '') {
                                            echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>';
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
            <button type="submit" class="btn btn-info mb-3">Grabar</button>
        </form>
        <button onclick="history.back()" class="btn btn-success mb-3">Regresar</button>
    </div>
    
</main>