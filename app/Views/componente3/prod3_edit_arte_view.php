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
        <h4 class="mt-4" id="titulo-nombre"><?= esc($title).' - Arte y Expresión de: '.$datos->nombre; ?></h4>
        <form action="<?php echo base_url().'/prod3-arte-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <h4 class="mt-3"><?= esc ('TALLERES'); ?></h4>
                        <div class="col-md-2 mb-2">
                            <label for="docente_autoestima">Docente y Autoestima:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="docente_autoestima" 
                                    id="docente_autoestima"  
                                >
                                <?php
                                    if ($prod3_arte != NULL) {
                                        if ($prod3_arte->docente_autoestima == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_arte->docente_autoestima == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_arte->docente_autoestima == NULL) {
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
                                    if ($prod3_arte != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_arte->docente_autoestima_mes;
                                        $dato['campo'] = 'docente_autoestima_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'docente_autoestima_mes';
                                        echo view('componente3/select_meses_1', $dato);
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="arte_usos">Arte y sus usos:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="arte_usos" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_arte != NULL) {
                                        if ($prod3_arte->arte_usos == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_arte->arte_usos == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_arte->arte_usos == NULL) {
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
                                    if ($prod3_arte != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_arte->arte_usos_mes;
                                        $dato['campo'] = 'arte_usos_mes';
                                        echo view('componente3/select_meses', $dato); 
                                    }else{
                                        $dato['campo'] = 'arte_usos_mes';
                                        echo view('componente3/select_meses_1', $dato); 
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="creatividad">Creatividad:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="creatividad" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_arte != NULL) {
                                        if ($prod3_arte->creatividad == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_arte->creatividad == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_arte->creatividad == NULL) {
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
                                    if ($prod3_arte != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_arte->creatividad_mes;
                                        $dato['campo'] = 'creatividad_mes';
                                        echo view('componente3/select_meses', $dato); 
                                    }else{
                                        $dato['campo'] = 'creatividad_mes';
                                        echo view('componente3/select_meses_1', $dato); 
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="etapas">Etapas de desarrollo artístico en los niños:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="etapas" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_arte != NULL) {
                                        if ($prod3_arte->etapas == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_arte->etapas == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_arte->etapas == NULL) {
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
                                    if ($prod3_arte != NULL) {
                                        $dato['valor'] = $prod3_arte->etapas_mes;
                                        $dato['campo'] = 'etapas_mes';
                                        $dato['meses'] = $meses;
                                        echo view('componente3/select_meses', $dato); 
                                    }else{
                                        $dato['campo'] = 'etapas_mes';
                                        echo view('componente3/select_meses_1', $dato); 
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="autorretrato_taller">Clase de arte: Autorretrato:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="autorretrato_taller" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_arte != NULL) {
                                        if ($prod3_arte->autorretrato_taller == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_arte->autorretrato_taller == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_arte->autorretrato_taller == NULL) {
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
                                    if ($prod3_arte != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_arte->autorretrato_taller_mes;
                                        $dato['campo'] = 'autorretrato_taller_mes';
                                        echo view('componente3/select_meses', $dato); 
                                    }else{
                                        $dato['campo'] = 'autorretrato_taller_mes';
                                        echo view('componente3/select_meses_1', $dato); 
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="incluir_clases">Incluir el arte en nuestras clases:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="incluir_clases" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_arte != NULL) {
                                        if ($prod3_arte->incluir_clases == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_arte->incluir_clases == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_arte->incluir_clases == NULL) {
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
                                    if ($prod3_arte != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_arte->incluir_clases_mes;
                                        $dato['campo'] = 'incluir_clases_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'incluir_clases_mes';
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
                            <label for="autorretrato_clase">Autorretrato:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="autorretrato_clase" 
                                    id="autorretrato_clase"  
                                >
                                <?php
                                    if ($prod3_arte != NULL) {
                                        if ($prod3_arte->autorretrato_clase == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_arte->autorretrato_clase == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_arte->autorretrato_clase == NULL) {
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
                                    if ($prod3_arte != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_arte->autorretrato_clase_mes;
                                        $dato['campo'] = 'autorretrato_clase_mes';
                                        echo view('componente3/select_meses', $dato); 
                                    }else{
                                        $dato['campo'] = 'autorretrato_clase_mes';
                                        echo view('componente3/select_meses_1', $dato); 
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="emociones">Emociones:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="emociones" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_arte != NULL) {
                                        if ($prod3_arte->emociones == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_arte->emociones == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_arte->emociones == NULL) {
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
                                    if ($prod3_arte != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_arte->emociones_mes;
                                        $dato['campo'] = 'emociones_mes';
                                        echo view('componente3/select_meses', $dato); 
                                    }else{
                                        $dato['campo'] = 'emociones_mes';
                                        echo view('componente3/select_meses_1', $dato); 
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="familia">La familia:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="familia" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_arte != NULL) {
                                        if ($prod3_arte->familia == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_arte->familia == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_arte->familia == NULL) {
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
                                    if ($prod3_arte != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_arte->familia_mes;
                                        $dato['campo'] = 'familia_mes';
                                        echo view('componente3/select_meses', $dato); 
                                    }else{
                                        $dato['campo'] = 'familia_mes';
                                        echo view('componente3/select_meses_1', $dato); 
                                    }
                                ?>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="camiseta">La camiseta:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="camiseta" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_arte != NULL) {
                                        if ($prod3_arte->camiseta == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_arte->camiseta == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_arte->camiseta == NULL) {
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
                                    if ($prod3_arte != NULL) {
                                        $dato['meses'] = $meses;
                                        $dato['valor'] = $prod3_arte->camiseta_mes;
                                        $dato['campo'] = 'camiseta_mes';
                                        echo view('componente3/select_meses', $dato);
                                    }else{
                                        $dato['campo'] = 'camiseta_mes';
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