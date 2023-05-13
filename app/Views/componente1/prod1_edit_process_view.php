<style>
    .form-control{
        font-size: 1em;
    }
    #titulo-nombre{
        color: rgb(106, 145, 40);
    }
</style>
<main class="container-md px-2 mb-4">
    <div class="container-fluid px-0">
        <h4 class="mt-4"><?= esc($title).' : Componente 1'; ?></h4>
        <form action="<?php echo base_url().'/prod1-asistencia-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                    <h4 class="mt-3" id="titulo-nombre"><?= esc ('Procesos - '.$datos->nombre.' '.$datos->amie); ?></h4>
                    <h4>Asistencia</h4>
                        
                        <div class="col-md-3 mb-3">
                            <label for="dias_atencion">HORAS TOTAL ATENCION:</label>
                        
                            <?php
                            exit;
                                if ($asistencia != NULL) {
                                    if ($asistencia->dias_atencion != NULL && isset($asistencia->dias_atencion) && $asistencia->dias_atencion != '' ) {
                                        echo '<input 
                                            type="text" 
                                            id="dias_atencion" 
                                            name="dias_atencion" 
                                            value="'.$asistencia->dias_atencion.'" 
                                            class="form-control number"
                                            aria-label="dias_atencion">';
                                    }else {echo 29;
                                        echo '<input 
                                            type="text" 
                                            id="number" 
                                            name="dias_atencion" 
                                            value="NULL" 
                                            class="form-control number" 
                                            placeholder="0" 
                                            aria-label="dias_atencion">';
                                    }
                                }else{
                                    echo '<input type="text" id="dias_atencion" name="dias_atencion" value="0"  class="form-control number" placeholder="0" aria-label="dias_atencion">';
                                }
                                
                            ?>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="horas_planificadas">HORAS PLANIFICADAS:</label>
                        
                            <?php
                                if ($asistencia != NULL) {
                                    if ($asistencia->horas_planificadas != NULL && isset($asistencia->horas_planificadas) && $asistencia->horas_planificadas != '' ) {
                                        echo '<input 
                                            type="text" 
                                            id="horas_planificadas" 
                                            name="horas_planificadas" 
                                            value="'.$asistencia->horas_planificadas.'" 
                                            class="form-control number"
                                            aria-label="horas_planificadas">';
                                    }else {
                                        echo '<input 
                                            type="text" 
                                            id="horas_planificadas" 
                                            name="horas_planificadas" 
                                            value="NULL" 
                                            class="form-control number" 
                                            placeholder="0" 
                                            aria-label="horas_planificadas">';
                                    }
                                }else{
                                    echo '<input type="text" id="number" name="horas_planificadas" value="0"  class="form-control number" placeholder="0" aria-label="horas_planificadas">';
                                }
                                
                            ?>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="horas_efectivas">HORAS EFECTIVAS:</label>
                        
                            <?php
                                if ($asistencia != NULL) {
                                    if ($asistencia->horas_efectivas != NULL && isset($asistencia->horas_efectivas) && $asistencia->horas_efectivas != '' ) {
                                        echo '<input 
                                            type="text" 
                                            id="number" 
                                            name="horas_efectivas" 
                                            value="'.$asistencia->horas_efectivas.'" 
                                            class="form-control"
                                            aria-label="horas_efectivas">';
                                    }else {
                                        echo '<input 
                                            type="text" 
                                            id="number" 
                                            name="horas_efectivas" 
                                            value="NULL" 
                                            class="form-control" 
                                            placeholder="0" 
                                            aria-label="horas_efectivas">';
                                    }
                                }else{
                                    echo '<input type="text" id="number" name="horas_efectivas" value="0"  class="form-control number" placeholder="0" aria-label="horas_efectivas">';
                                }
                                
                            ?>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="horas_perdidas">HORAS PERDIDAS:</label>
                        
                            <?php
                                if ($asistencia != NULL) {
                                    if ($asistencia->horas_perdidas != NULL && isset($asistencia->horas_perdidas) && $asistencia->horas_perdidas != '' ) {
                                        echo '<input 
                                            type="text" 
                                            id="number" 
                                            name="horas_perdidas" 
                                            value="'.$asistencia->horas_perdidas.'" 
                                            class="form-control"
                                            aria-label="horas_perdidas">';
                                    }else {
                                        echo '<input 
                                            type="text" 
                                            id="number" 
                                            name="horas_perdidas" 
                                            value="NULL" 
                                            class="form-control number" 
                                            placeholder="0" 
                                            aria-label="horas_perdidas">';
                                    }
                                }else{
                                    echo '<input type="text" id="number" name="horas_perdidas" value="0"  class="form-control number" placeholder="0" aria-label="horas_perdidas">';
                                }
                                
                            ?>
                        </div>
                    </div>

                        <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                    <h4>Cohorte</h4>
                        <div class="col-md-3 mb-3">
                            
                            <label for="dias_atencion">COHORTE:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="cohorte" 
                                id="cohorte"  
                            >
                        
                            <?php   
                                
                                if ($datos != NULL) {
                                    if ($datos->cohorte == 'PRIMERA COHORTE' || $datos->cohorte == 'PRIMERA' || $datos->cohorte == 'PRIMERA CORTE') {
                                        echo '<option value="PRIMERA COHORTE" selected>PRIMERA COHORTE</option>
                                                <option value="SEGUNDA COHORTE">SEGUNDA COHORTE</option>';
                                    }elseif ($datos->cohorte == 'SEGUNDA COHORTE' || $datos->cohorte == 'SEGUNDA' || $datos->cohorte == 'SEGUNDA CORTE') {
                                        echo '<option value="PRIMERA COHORTE">PRIMERA COHORTE</option>
                                                <option value="SEGUNDA COHORTE" selected>SEGUNDA COHORTE</option>';
                                    }elseif($datos->cohorte == ''){
                                        echo '<option value="" selected>Registrar dato</option>
                                            <option value="PRIMERA COHORTE">PRIMERA COHORTE</option>
                                            <option value="SEGUNDA COHORTE">SEGUNDA COHORTE</option>';
                                    }
                                }else{
                                    echo '<option value="" selected>Registrar dato</option>
                                            <option value="PRIMERA COHORTE">PRIMERA COHORTE</option>
                                            <option value="SEGUNDA COHORTE">SEGUNDA COHORTE</option>';
                                }
                                
                            ?>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            
                            <label for="fecha_inicio">FECHA INICIO:</label>
                            <?php   
                                
                                if ($datos != NULL) {
                                    if ($datos->fecha_inicio != '' && isset($datos->fecha_inicio)) {
                                        echo '<input 
                                            type="date" 
                                            id="fecha_inicio" 
                                            name="fecha_inicio" 
                                            value="'.date('Y-m-d', strtotime($datos->fecha_inicio)).'" 
                                            class="form-control" 
                                            placeholder="fecha_inicio" 
                                            aria-label="fecha_inicio"
                                            >';
                                    }else{
                                        echo '<input 
                                            type="date" 
                                            id="fecha_inicio" 
                                            name="fecha_inicio" 
                                            value="'.date('Y-m-d', strtotime('0-0-0000')).'" 
                                            class="form-control" 
                                            placeholder="fecha_inicio" 
                                            aria-label="fecha_inicio"
                                            >';
                                    }
                                }else{
                                    echo '<input 
                                            type="date" 
                                            id="fecha_inicio" 
                                            name="fecha_inicio" 
                                            value="'.date('Y-m-d', strtotime('0-0-0000')).'" 
                                            class="form-control" 
                                            placeholder="fecha_inicio" 
                                            aria-label="fecha_inicio"
                                            >';
                                }
                                
                            ?>
                        </div>
                        <div class="col-md-3 mb-3">
                            
                            <label for="fecha_fin">FECHA DE FIN:</label>
                            <?php   
                                
                                if ($datos != NULL) {
                                    if ($datos->fecha_fin != '' && isset($datos->fecha_fin)) {
                                        echo '<input 
                                            type="date" 
                                            id="fecha_fin" 
                                            name="fecha_fin" 
                                            value="'.date('Y-m-d', strtotime($datos->fecha_fin)).'" 
                                            class="form-control" 
                                            placeholder="fecha_fin" 
                                            aria-label="fecha_fin"
                                            >';
                                    }else{
                                        echo '<input 
                                            type="date" 
                                            id="fecha_fin" 
                                            name="fecha_fin" 
                                            value="'.date('Y-m-d', strtotime('0-0-0000')).'" 
                                            class="form-control" 
                                            placeholder="fecha_fin" 
                                            aria-label="fecha_fin"
                                            >';
                                    }
                                }else{
                                    echo '<input 
                                            type="date" 
                                            id="fecha_fin" 
                                            name="fecha_fin" 
                                            value="'.date('Y-m-d', strtotime('0-0-0000')).'" 
                                            class="form-control" 
                                            placeholder="fecha_fin" 
                                            aria-label="fecha_fin"
                                            >';
                                }
                                
                            ?>
                        </div>
                        <div class="col-md-3 mt-3">
                            
                            <label for="retirado">SE RETIRÓ:</label>
                            <?php   
                                
                                if ($asistencia != NULL) {
                                    if ($asistencia->retirado != null && isset($asistencia->retirado)) {
                                        if ($asistencia->retirado == 1) {
                                            echo '<input class="form-check-input" name="retirado" type="checkbox" value="1" id="flexCheckDefault" checked>';
                                        }else{
                                            echo '<input class="form-check-input" name="retirado" type="checkbox" value="1" id="flexCheckDefault">';
                                        }
                                        
                                    }else{
                                        echo '<input class="form-check-input" name="retirado" type="checkbox" value="1" id="flexCheckDefault">';
                                    }
                                }else{
                                    echo '<input class="form-check-input" name="retirado" type="checkbox" value="1" id="flexCheckDefault">';
                                }
                            ?>
                        </div>
                        
                    </div>

                        <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                    <h4>Entrega de Kits</h4>
                        <div class="col-md-3 mb-3">
                            <label for="dias_atencion">Se entregó KIT:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="kit" 
                                id="kit"  
                            >
                        
                            <?php   
                                
                                if ($asistencia != NULL) {
                                    if ($asistencia->kit == 'SI') {
                                        echo '<option value="SI" selected>SI</option>
                                                <option value="NO">NO</option>';
                                    }elseif ($asistencia->kit == 'NO') {
                                        echo '<option value="SI">SI</option>
                                                <option value="NO" selected>NO</option>';
                                    }elseif($asistencia->kit == ''){
                                        echo '<option value="" selected>Registrar dato</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>';
                                    }
                                }else{
                                    echo '<option value="" selected>Registrar dato</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>';
                                }
                                
                            ?>
                            </select>
                        </div>
                    </div>

                        <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                </div>
            </div>
            <?= form_hidden('id', $idprod);  ?>
            <button type="submit" class="btn btn-info mb-3 mt-3">Actualizar</button>
        </form>
        <button onclick="history.back()" class="btn btn-success mb-3 mt-3">Regresar</button>
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