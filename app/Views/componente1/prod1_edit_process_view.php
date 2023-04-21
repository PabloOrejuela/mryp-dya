<style>
    .form-control{
        font-size: 0.8em;
    }
</style>
<main class="container-md px-0 mb-4">
    <div class="container-fluid px-0">
        <h3 class="mt-4"><?= esc($title).''; ?></h3>
        <form action="<?php echo base_url().'/prod1-asistencia-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <h3 class="mt-3"><?= esc ('Procesos - Asistencia'); ?></h3>
                        <div class="col-md-2 mb-3">
                            <label for="dias_atencion">DIAS ATENCION:</label>
                        
                            <?php
                                if ($asistencia != NULL) {
                                    if ($asistencia->dias_atencion != NULL && isset($asistencia->dias_atencion) && $asistencia->dias_atencion != '' ) {
                                        echo '<input 
                                            type="text" 
                                            id="dias_atencion" 
                                            name="dias_atencion" 
                                            value="'.$asistencia->dias_atencion.'" 
                                            class="form-control number"
                                            aria-label="dias_atencion">';
                                    }else {
                                        echo '<input 
                                            type="text" 
                                            id="number" 
                                            name="dias_atencion" 
                                            value="" 
                                            class="form-control number" 
                                            placeholder="0" 
                                            aria-label="dias_atencion">';
                                    }
                                }else{
                                    echo '<input type="text" id="dias_atencion" name="dias_atencion" value=""  class="form-control number" placeholder="0" aria-label="dias_atencion">';
                                }
                                
                            ?>
                        </div>
                        <div class="col-md-2 mb-3">
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
                                            value="" 
                                            class="form-control number" 
                                            placeholder="0" 
                                            aria-label="horas_planificadas">';
                                    }
                                }else{
                                    echo '<input type="text" id="number" name="horas_planificadas" value=""  class="form-control number" placeholder="0" aria-label="horas_planificadas">';
                                }
                                
                            ?>
                        </div>
                        <div class="col-md-2 mb-3">
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
                                            value="" 
                                            class="form-control" 
                                            placeholder="0" 
                                            aria-label="horas_efectivas">';
                                    }
                                }else{
                                    echo '<input type="text" id="number" name="horas_efectivas" value=""  class="form-control number" placeholder="0" aria-label="horas_efectivas">';
                                }
                                
                            ?>
                        </div>
                        <div class="col-md-2 mb-3">
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
                                            value="" 
                                            class="form-control number" 
                                            placeholder="0" 
                                            aria-label="horas_perdidas">';
                                    }
                                }else{
                                    echo '<input type="text" id="number" name="horas_perdidas" value=""  class="form-control number" placeholder="0" aria-label="horas_perdidas">';
                                }
                                
                            ?>
                        </div>
                    </div>

                        <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                </div>
            </div>
            
        
            <?= form_hidden('id', $idprod);  ?>
            <button type="submit" class="btn btn-info mb-3">Actualizar</button>
            
            <button onclick="history.back()" class="btn btn-success mb-3">Regresar</button>
        </form>
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