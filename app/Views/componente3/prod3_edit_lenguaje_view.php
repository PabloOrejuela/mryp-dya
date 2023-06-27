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
        <h4 class="mt-4" id="titulo-nombre"><?= esc($title).' - Lenguaje de: '.$datos->nombre; ?></h4>
        <form action="<?php echo base_url().'/prod3-lengua-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <h4 class="mt-3"><?= esc ('TALLERES'); ?></h4>
                        <div class="col-md-2 mb-2">
                            <label for="enfoque_sociocultural">Enfoque sociocultural para la enseñanza de la lectura y escritura:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="enfoque_sociocultural" 
                                    id="enfoque_sociocultural"  
                                >
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        if ($prod3_lenguaje->enfoque_sociocultural == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_lenguaje->enfoque_sociocultural == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_lenguaje->enfoque_sociocultural == NULL) {
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
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_lenguaje->enfoque_sociocultural_mes;
                                        $dato['campo'] = 'enfoque_sociocultural_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'enfoque_sociocultural_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="exp_dialectales">Comunicación Oral: Expresiones Dialectales.:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="exp_dialectales" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        if ($prod3_lenguaje->exp_dialectales == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_lenguaje->exp_dialectales == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_lenguaje->exp_dialectales == NULL) {
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
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_lenguaje->exp_dialectales_mes;
                                        $dato['campo'] = 'exp_dialectales_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'exp_dialectales_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="exp_oral">Comunicación Oral: Desarrollo de la expresión oral:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="exp_oral" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        if ($prod3_lenguaje->exp_oral == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_lenguaje->exp_oral == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_lenguaje->exp_oral == NULL) {
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
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_lenguaje->exp_oral_mes;
                                        $dato['campo'] = 'exp_oral_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'exp_oral_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="comp_lectora">Comprensión Lectora:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="comp_lectora" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        if ($prod3_lenguaje->comp_lectora == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_lenguaje->comp_lectora == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_lenguaje->comp_lectora == NULL) {
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
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_lenguaje->comp_lectora_mes;
                                        $dato['campo'] = 'comp_lectora_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'comp_lectora_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="prod_textos">Producción de textos:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="prod_textos" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        if ($prod3_lenguaje->prod_textos == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_lenguaje->prod_textos == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_lenguaje->prod_textos == NULL) {
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
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_lenguaje->prod_textos_mes;
                                        $dato['campo'] = 'prod_textos_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'prod_textos_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="extrategia_prod_text">Estrategias de producción de textos:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="extrategia_prod_text" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        if ($prod3_lenguaje->extrategia_prod_text == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_lenguaje->extrategia_prod_text == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_lenguaje->extrategia_prod_text == NULL) {
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
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_lenguaje->extrategia_prod_text_mes;
                                        $dato['campo'] = 'extrategia_prod_text_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'extrategia_prod_text_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
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
                            <label for="zapatos">Los zapatos:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="zapatos" 
                                    id="zapatos"  
                                >
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        if ($prod3_lenguaje->zapatos == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_lenguaje->zapatos == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_lenguaje->zapatos == NULL) {
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
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_lenguaje->zapatos_mes;
                                        $dato['campo'] = 'zapatos_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'zapatos_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="noticia">La noticia:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="noticia" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        if ($prod3_lenguaje->noticia == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_lenguaje->noticia == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_lenguaje->noticia == NULL) {
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
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_lenguaje->noticia_mes;
                                        $dato['campo'] = 'noticia_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'noticia_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="carta">La carta:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="carta" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        if ($prod3_lenguaje->carta == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_lenguaje->carta == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_lenguaje->carta == NULL) {
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
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_lenguaje->carta_mes;
                                        $dato['campo'] = 'carta_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'carta_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="ninia_abeja">La niña y la abeja:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="ninia_abeja" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        if ($prod3_lenguaje->ninia_abeja == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_lenguaje->ninia_abeja == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_lenguaje->ninia_abeja == NULL) {
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
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_lenguaje->ninia_abeja_mes;
                                        $dato['campo'] = 'ninia_abeja_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'ninia_abeja_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="cuento">El cuento:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="cuento" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        if ($prod3_lenguaje->cuento == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_lenguaje->cuento == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_lenguaje->cuento == NULL) {
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
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_lenguaje->cuento_mes;
                                        $dato['campo'] = 'cuento_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'cuento_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="cuerdas">Cuerdas:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="cuerdas" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        if ($prod3_lenguaje->cuerdas == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_lenguaje->cuerdas == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_lenguaje->cuerdas == NULL) {
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
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_lenguaje->cuerdas_mes;
                                        $dato['campo'] = 'cuerdas_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'cuerdas_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 mb-2">
                            <label for="refranes">Los refranes:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="refranes" 
                                    id="refranes"  
                                >
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        if ($prod3_lenguaje->refranes == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_lenguaje->refranes == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_lenguaje->refranes == NULL) {
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
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_lenguaje->refranes_mes;
                                        $dato['campo'] = 'refranes_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'refranes_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="juegos">Juegos tradicionales:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="juegos" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        if ($prod3_lenguaje->juegos == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_lenguaje->juegos == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_lenguaje->juegos == NULL) {
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
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_lenguaje->juegos_mes;
                                        $dato['campo'] = 'juegos_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'juegos_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="derechos_humanos">Los derechos humanos:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="derechos_humanos" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        if ($prod3_lenguaje->derechos_humanos == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_lenguaje->derechos_humanos == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_lenguaje->derechos_humanos == NULL) {
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
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_lenguaje->derechos_humanos_mes;
                                        $dato['campo'] = 'derechos_humanos_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'derechos_humanos_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="noticiero">El noticiero:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="noticiero" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        if ($prod3_lenguaje->noticiero == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_lenguaje->noticiero == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_lenguaje->noticiero == NULL) {
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
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_lenguaje->noticiero_mes;
                                        $dato['campo'] = 'noticiero_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'noticiero_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="discurso">El discurso:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="discurso" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        if ($prod3_lenguaje->discurso == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_lenguaje->discurso == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_lenguaje->discurso == NULL) {
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
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_lenguaje->discurso_mes;
                                        $dato['campo'] = 'discurso_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'discurso_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="influencers">Influencers:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="influencers" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        if ($prod3_lenguaje->influencers == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_lenguaje->influencers == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_lenguaje->influencers == NULL) {
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
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_lenguaje->influencers_mes;
                                        $dato['campo'] = 'influencers_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'influencers_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 mb-2">
                            <label for="inferencias">Inferencias:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="inferencias" 
                                    id="inferencias"  
                                >
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        if ($prod3_lenguaje->inferencias == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_lenguaje->inferencias == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_lenguaje->inferencias == NULL) {
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
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_lenguaje->inferencias_mes;
                                        $dato['campo'] = 'inferencias_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'inferencias_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="elefante">El elefante:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="elefante" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        if ($prod3_lenguaje->elefante == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_lenguaje->elefante == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_lenguaje->elefante == NULL) {
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
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_lenguaje->elefante_mes;
                                        $dato['campo'] = 'elefante_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'elefante_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="pitch">El pitch:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="pitch" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        if ($prod3_lenguaje->pitch == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_lenguaje->pitch == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_lenguaje->pitch == NULL) {
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
                                <?php
                                    if ($prod3_lenguaje != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_lenguaje->pitch_mes;
                                        $dato['campo'] = 'pitch_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'pitch_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
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
        <a class="btn btn-success mb-3" href="<?php echo site_url().'prod_3_process'; ?>">Ir al menú del Componente 3</a>
    </div>
    
</main>