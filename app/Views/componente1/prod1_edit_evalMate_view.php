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
        <h5 class="mt-4" id="titulo-nombre"><?= esc($title).' - EVALUACION MATEMÁTICA (Media/Superior): '.$datos->apellidos.' '.$datos->nombres; ?></h5>
        <form action="<?php echo base_url().'/prod1-evalMate-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <h4 class="mt-3"><?= esc ('Orientación espacial'); ?></h4>
                        
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Pregunta 1</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="orientacion_espacial_1" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->orientacion_espacial_1 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->orientacion_espacial_1 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->orientacion_espacial_1 == NULL || $eval_mate->orientacion_espacial_1 == '') {
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
                            <label for="apoyo"><span id="pregunta">Pregunta 2</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="orientacion_espacial_2" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->orientacion_espacial_2 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->orientacion_espacial_2 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->orientacion_espacial_2 == NULL || $eval_mate->orientacion_espacial_2 == '') {
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
                            <label for="apoyo"><span id="pregunta">Pregunta 3</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="orientacion_espacial_3" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->orientacion_espacial_3 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->orientacion_espacial_3 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->orientacion_espacial_3 == NULL || $eval_mate->orientacion_espacial_3 == '') {
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
                                    name="orientacion_espacial_4" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->orientacion_espacial_4 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->orientacion_espacial_4 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->orientacion_espacial_4 == NULL || $eval_mate->orientacion_espacial_4 == '') {
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
                        <h4 class="mt-3"><?= esc ('Clasificación'); ?></h4>
                        
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Pregunta 5</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="clasificacion_5" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->clasificacion_5 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->clasificacion_5 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->clasificacion_5 == NULL || $eval_mate->clasificacion_5 == '') {
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
                            <label for="apoyo"><span id="pregunta">Pregunta 6</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="clasificacion_6" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->clasificacion_6 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->clasificacion_6 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->clasificacion_6 == NULL || $eval_mate->clasificacion_6 == '') {
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
                        <h4 class="mt-3"><?= esc ('Seriación'); ?></h4>
                        
                        <div class="col-md-3 mb-2">
                            <label for="apoyo"><span id="pregunta">Pregunta 7</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="seriacion_7" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->seriacion_7 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->seriacion_7 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->seriacion_7 == NULL || $eval_mate->seriacion_7 == '') {
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
                            <label for="apoyo"><span id="pregunta">Pregunta 8</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="seriacion_8" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->seriacion_8 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->seriacion_8 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->seriacion_8 == NULL || $eval_mate->seriacion_8 == '') {
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
                                    name="seriacion_9" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->seriacion_9 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->seriacion_9 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->seriacion_9 == NULL || $eval_mate->seriacion_9 == '') {
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
                            <label for="apoyo"><span id="pregunta">Pregunta 10</span>:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="esquema_corporal_10" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->esquema_corporal_10 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->esquema_corporal_10 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->esquema_corporal_10 == NULL || $eval_mate->esquema_corporal_10 == '') {
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
                                    name="esquema_corporal_11" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->esquema_corporal_11 == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->esquema_corporal_11 == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->esquema_corporal_11 == NULL || $eval_mate->esquema_corporal_11 == '') {
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
                            <label for="apoyo"><span id="pregunta"></span>12.Suma de dos cifras:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="suma_dos_cifras" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->suma_dos_cifras == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->suma_dos_cifras == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->suma_dos_cifras == NULL || $eval_mate->suma_dos_cifras == '') {
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
                            <label for="apoyo"><span id="pregunta"></span>13.Suma de cuatro cifras:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="suma_cuatro_cifras" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->suma_cuatro_cifras == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->suma_cuatro_cifras == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->suma_cuatro_cifras == NULL || $eval_mate->suma_cuatro_cifras == '') {
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
                            <label for="apoyo"><span id="pregunta"></span>14.Suma de cinco o mas cifras:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="suma_cinco_mas" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->suma_cinco_mas == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->suma_cinco_mas == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->suma_cinco_mas == NULL || $eval_mate->suma_cinco_mas == '') {
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
                            <label for="apoyo"><span id="pregunta"></span>15.Resta de tres cifras:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="resta_tres_cifras" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->resta_tres_cifras == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->resta_tres_cifras == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->resta_tres_cifras == NULL || $eval_mate->resta_tres_cifras == '') {
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
                            <label for="apoyo"><span id="pregunta"></span>16.Resta de cuatro cifras:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="resta_cuatro_cifras" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->resta_cuatro_cifras == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->resta_cuatro_cifras == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->resta_cuatro_cifras == NULL || $eval_mate->resta_cuatro_cifras == '') {
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
                            <label for="apoyo"><span id="pregunta"></span>17.Multiplicación una cifra:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="multiplicacion_una_cifra" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->multiplicacion_una_cifra == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->multiplicacion_una_cifra == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->multiplicacion_una_cifra == NULL || $eval_mate->multiplicacion_una_cifra == '') {
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
                            <label for="apoyo"><span id="pregunta"></span>18.Multiplicación dos cifras:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="multiplicacion_dos_cifras" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->multiplicacion_dos_cifras == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->multiplicacion_dos_cifras == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->multiplicacion_dos_cifras == NULL || $eval_mate->multiplicacion_dos_cifras == '') {
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
                            <label for="apoyo"><span id="pregunta"></span>19.División una cifra:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="division_una_cifra" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->division_una_cifra == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->division_una_cifra == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->division_una_cifra == NULL || $eval_mate->division_una_cifra == '') {
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
                            <label for="apoyo"><span id="pregunta"></span>20.División dos cifras:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="division_dos_cifras" 
                                    id="select-pregunta"  
                                >
                                <?php
                                    if ($eval_mate != NULL) {
                                        if ($eval_mate->division_dos_cifras == '0') {
                                            echo '<option value="0" selected>0</option>
                                                    <option value="1">1</option>';
                                        }elseif ($eval_mate->division_dos_cifras == '1') {
                                            echo '<option value="0">0</option>
                                                    <option value="1" selected>1</option>';
                                        }elseif ($eval_mate->division_dos_cifras == NULL || $eval_mate->division_dos_cifras == '') {
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