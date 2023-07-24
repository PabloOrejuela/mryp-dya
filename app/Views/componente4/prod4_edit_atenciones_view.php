<main class="container-sm px-2 mb-5">
    <div class="container-fluid px-0">
        <h4 class="mt-4" id="titulo-nombre"><?= esc($title).' - Otras atenciones: '.$est->nombres; ?></h4>
        <form action="<?php echo base_url().'/prod4-atenciones-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="motivo_inasistencia">MOTIVOS INASISTENCIA:</label>
                    <select name="motivo_inasistencia" class="form-control" id="motivo_inasistencia" aria-label="motivo_inasistencia">
                        <?php
                            if ($datos != NULL && isset($datos)) {
                                if ($datos->motivo_inasistencia  == "MALESTARES POR EMBARAZO") {
                                    echo '<option value="MALESTARES POR EMBARAZO" selected>MALESTARES POR EMBARAZO</option>
                                            <option value="ENFERMEDAD BENEFICIARIA">ENFERMEDAD BENEFICIARIA</option>
                                            <option value="ENFERMEDAD HIJO/A">ENFERMEDAD HIJO/A</option>
                                            <option value="ENFERMEDAD OTRO FAMILIAR">ENFERMEDAD OTRO FAMILIAR</option>
                                            <option value="CALAMIDAD DOMÉSTICA">CALAMIDAD DOMÉSTICA</option>
                                            <option value="DILIGENCIA PERSONAL">DILIGENCIA PERSONAL</option>
                                            <option value="MOVILIZACIÓN">MOVILIZACIÓN</option>
                                            <option value="PROBLEMAS ECONÓMICOS">PROBLEMAS ECONÓMICOS</option>
                                            <option value="REPOSO POSTPARTO">REPOSO POSTPARTO</option>
                                            <option value="REPOSO MÉDICO POR EMBARAZO">REPOSO MÉDICO POR EMBARAZO</option>
                                            <option value="CONTROL O CITA MÉDICA">CONTROL O CITA MÉDICA</option>
                                    ';
                                }elseif ($datos->motivo_inasistencia  == "ENFERMEDAD BENEFICIARIA") {
                                    echo '<option value="MALESTARES POR EMBARAZO">MALESTARES POR EMBARAZO</option>
                                        <option value="ENFERMEDAD BENEFICIARIA" selected>ENFERMEDAD BENEFICIARIA</option>
                                        <option value="ENFERMEDAD HIJO/A">ENFERMEDAD HIJO/A</option>
                                        <option value="ENFERMEDAD OTRO FAMILIAR">ENFERMEDAD OTRO FAMILIAR</option>
                                        <option value="CALAMIDAD DOMÉSTICA">CALAMIDAD DOMÉSTICA</option>
                                        <option value="DILIGENCIA PERSONAL">DILIGENCIA PERSONAL</option>
                                        <option value="MOVILIZACIÓN">MOVILIZACIÓN</option>
                                        <option value="PROBLEMAS ECONÓMICOS">PROBLEMAS ECONÓMICOS</option>
                                        <option value="REPOSO POSTPARTO">REPOSO POSTPARTO</option>
                                        <option value="REPOSO MÉDICO POR EMBARAZO">REPOSO MÉDICO POR EMBARAZO</option>
                                        <option value="CONTROL O CITA MÉDICA">CONTROL O CITA MÉDICA</option>
                                    ';
                                }elseif ($datos->motivo_inasistencia  == "ENFERMEDAD HIJO/A") {
                                    echo '<option value="MALESTARES POR EMBARAZO">MALESTARES POR EMBARAZO</option>
                                        <option value="ENFERMEDAD BENEFICIARIA">ENFERMEDAD BENEFICIARIA</option>
                                        <option value="ENFERMEDAD HIJO/A" selected>ENFERMEDAD HIJO/A</option>
                                        <option value="ENFERMEDAD OTRO FAMILIAR">ENFERMEDAD OTRO FAMILIAR</option>
                                        <option value="CALAMIDAD DOMÉSTICA">CALAMIDAD DOMÉSTICA</option>
                                        <option value="DILIGENCIA PERSONAL">DILIGENCIA PERSONAL</option>
                                        <option value="MOVILIZACIÓN">MOVILIZACIÓN</option>
                                        <option value="PROBLEMAS ECONÓMICOS">PROBLEMAS ECONÓMICOS</option>
                                        <option value="REPOSO POSTPARTO">REPOSO POSTPARTO</option>
                                        <option value="REPOSO MÉDICO POR EMBARAZO">REPOSO MÉDICO POR EMBARAZO</option>
                                        <option value="CONTROL O CITA MÉDICA">CONTROL O CITA MÉDICA</option>
                                    ';
                                }elseif ($datos->motivo_inasistencia  == "ENFERMEDAD OTRO FAMILIAR") {
                                    echo '<option value="MALESTARES POR EMBARAZO">MALESTARES POR EMBARAZO</option>
                                        <option value="ENFERMEDAD BENEFICIARIA">ENFERMEDAD BENEFICIARIA</option>
                                        <option value="ENFERMEDAD HIJO/A">ENFERMEDAD HIJO/A</option>
                                        <option value="ENFERMEDAD OTRO FAMILIAR" selected>ENFERMEDAD OTRO FAMILIAR</option>
                                        <option value="CALAMIDAD DOMÉSTICA">CALAMIDAD DOMÉSTICA</option>
                                        <option value="DILIGENCIA PERSONAL">DILIGENCIA PERSONAL</option>
                                        <option value="MOVILIZACIÓN">MOVILIZACIÓN</option>
                                        <option value="PROBLEMAS ECONÓMICOS">PROBLEMAS ECONÓMICOS</option>
                                        <option value="REPOSO POSTPARTO">REPOSO POSTPARTO</option>
                                        <option value="REPOSO MÉDICO POR EMBARAZO">REPOSO MÉDICO POR EMBARAZO</option>
                                        <option value="CONTROL O CITA MÉDICA">CONTROL O CITA MÉDICA</option>
                                    ';
                                }elseif ($datos->motivo_inasistencia  == "CALAMIDAD DOMÉSTICA") {
                                    echo '<option value="MALESTARES POR EMBARAZO">MALESTARES POR EMBARAZO</option>
                                        <option value="ENFERMEDAD BENEFICIARIA">ENFERMEDAD BENEFICIARIA</option>
                                        <option value="ENFERMEDAD HIJO/A">ENFERMEDAD HIJO/A</option>
                                        <option value="ENFERMEDAD OTRO FAMILIAR">ENFERMEDAD OTRO FAMILIAR</option>
                                        <option value="CALAMIDAD DOMÉSTICA" selected>CALAMIDAD DOMÉSTICA</option>
                                        <option value="DILIGENCIA PERSONAL">DILIGENCIA PERSONAL</option>
                                        <option value="MOVILIZACIÓN">MOVILIZACIÓN</option>
                                        <option value="PROBLEMAS ECONÓMICOS">PROBLEMAS ECONÓMICOS</option>
                                        <option value="REPOSO POSTPARTO">REPOSO POSTPARTO</option>
                                        <option value="REPOSO MÉDICO POR EMBARAZO">REPOSO MÉDICO POR EMBARAZO</option>
                                        <option value="CONTROL O CITA MÉDICA">CONTROL O CITA MÉDICA</option>
                                    ';
                                }elseif ($datos->motivo_inasistencia  == "DILIGENCIA PERSONAL") {
                                    echo '<option value="MALESTARES POR EMBARAZO">MALESTARES POR EMBARAZO</option>
                                        <option value="ENFERMEDAD BENEFICIARIA">ENFERMEDAD BENEFICIARIA</option>
                                        <option value="ENFERMEDAD HIJO/A">ENFERMEDAD HIJO/A</option>
                                        <option value="ENFERMEDAD OTRO FAMILIAR">ENFERMEDAD OTRO FAMILIAR</option>
                                        <option value="CALAMIDAD DOMÉSTICA">CALAMIDAD DOMÉSTICA</option>
                                        <option value="DILIGENCIA PERSONAL" selected>DILIGENCIA PERSONAL</option>
                                        <option value="MOVILIZACIÓN">MOVILIZACIÓN</option>
                                        <option value="PROBLEMAS ECONÓMICOS">PROBLEMAS ECONÓMICOS</option>
                                        <option value="REPOSO POSTPARTO">REPOSO POSTPARTO</option>
                                        <option value="REPOSO MÉDICO POR EMBARAZO">REPOSO MÉDICO POR EMBARAZO</option>
                                        <option value="CONTROL O CITA MÉDICA">CONTROL O CITA MÉDICA</option>
                                    ';
                                }elseif ($datos->motivo_inasistencia  == "MOVILIZACIÓN") {
                                    echo '<option value="MALESTARES POR EMBARAZO">MALESTARES POR EMBARAZO</option>
                                        <option value="ENFERMEDAD BENEFICIARIA">ENFERMEDAD BENEFICIARIA</option>
                                        <option value="ENFERMEDAD HIJO/A">ENFERMEDAD HIJO/A</option>
                                        <option value="ENFERMEDAD OTRO FAMILIAR">ENFERMEDAD OTRO FAMILIAR</option>
                                        <option value="CALAMIDAD DOMÉSTICA">CALAMIDAD DOMÉSTICA</option>
                                        <option value="DILIGENCIA PERSONAL">DILIGENCIA PERSONAL</option>
                                        <option value="MOVILIZACIÓN" selected>MOVILIZACIÓN</option>
                                        <option value="PROBLEMAS ECONÓMICOS">PROBLEMAS ECONÓMICOS</option>
                                        <option value="REPOSO POSTPARTO">REPOSO POSTPARTO</option>
                                        <option value="REPOSO MÉDICO POR EMBARAZO">REPOSO MÉDICO POR EMBARAZO</option>
                                        <option value="CONTROL O CITA MÉDICA">CONTROL O CITA MÉDICA</option>
                                    ';
                                }elseif ($datos->motivo_inasistencia  == "PROBLEMAS ECONÓMICOS") {
                                    echo '<option value="MALESTARES POR EMBARAZO">MALESTARES POR EMBARAZO</option>
                                        <option value="ENFERMEDAD BENEFICIARIA">ENFERMEDAD BENEFICIARIA</option>
                                        <option value="ENFERMEDAD HIJO/A">ENFERMEDAD HIJO/A</option>
                                        <option value="ENFERMEDAD OTRO FAMILIAR">ENFERMEDAD OTRO FAMILIAR</option>
                                        <option value="CALAMIDAD DOMÉSTICA">CALAMIDAD DOMÉSTICA</option>
                                        <option value="DILIGENCIA PERSONAL">DILIGENCIA PERSONAL</option>
                                        <option value="MOVILIZACIÓN">MOVILIZACIÓN</option>
                                        <option value="PROBLEMAS ECONÓMICOS" selected>PROBLEMAS ECONÓMICOS</option>
                                        <option value="REPOSO POSTPARTO">REPOSO POSTPARTO</option>
                                        <option value="REPOSO MÉDICO POR EMBARAZO">REPOSO MÉDICO POR EMBARAZO</option>
                                        <option value="CONTROL O CITA MÉDICA">CONTROL O CITA MÉDICA</option>
                                    ';
                                }elseif ($datos->motivo_inasistencia  == "REPOSO POSTPARTO") {
                                    echo '<option value="MALESTARES POR EMBARAZO">MALESTARES POR EMBARAZO</option>
                                        <option value="ENFERMEDAD BENEFICIARIA">ENFERMEDAD BENEFICIARIA</option>
                                        <option value="ENFERMEDAD HIJO/A">ENFERMEDAD HIJO/A</option>
                                        <option value="ENFERMEDAD OTRO FAMILIAR">ENFERMEDAD OTRO FAMILIAR</option>
                                        <option value="CALAMIDAD DOMÉSTICA">CALAMIDAD DOMÉSTICA</option>
                                        <option value="DILIGENCIA PERSONAL">DILIGENCIA PERSONAL</option>
                                        <option value="MOVILIZACIÓN">MOVILIZACIÓN</option>
                                        <option value="PROBLEMAS ECONÓMICOS">PROBLEMAS ECONÓMICOS</option>
                                        <option value="REPOSO POSTPARTO" selected>REPOSO POSTPARTO</option>
                                        <option value="REPOSO MÉDICO POR EMBARAZO">REPOSO MÉDICO POR EMBARAZO</option>
                                        <option value="CONTROL O CITA MÉDICA">CONTROL O CITA MÉDICA</option>
                                    ';
                                }elseif ($datos->motivo_inasistencia  == "REPOSO MÉDICO POR EMBARAZO") {
                                    echo '<option value="MALESTARES POR EMBARAZO">MALESTARES POR EMBARAZO</option>
                                        <option value="ENFERMEDAD BENEFICIARIA">ENFERMEDAD BENEFICIARIA</option>
                                        <option value="ENFERMEDAD HIJO/A">ENFERMEDAD HIJO/A</option>
                                        <option value="ENFERMEDAD OTRO FAMILIAR">ENFERMEDAD OTRO FAMILIAR</option>
                                        <option value="CALAMIDAD DOMÉSTICA">CALAMIDAD DOMÉSTICA</option>
                                        <option value="DILIGENCIA PERSONAL">DILIGENCIA PERSONAL</option>
                                        <option value="MOVILIZACIÓN">MOVILIZACIÓN</option>
                                        <option value="PROBLEMAS ECONÓMICOS">PROBLEMAS ECONÓMICOS</option>
                                        <option value="REPOSO POSTPARTO">REPOSO POSTPARTO</option>
                                        <option value="REPOSO MÉDICO POR EMBARAZO" selected>REPOSO MÉDICO POR EMBARAZO</option>
                                        <option value="CONTROL O CITA MÉDICA">CONTROL O CITA MÉDICA</option>
                                    ';
                                }elseif ($datos->motivo_inasistencia  == "CONTROL O CITA MÉDICA") {
                                    echo '<option value="MALESTARES POR EMBARAZO">MALESTARES POR EMBARAZO</option>
                                        <option value="ENFERMEDAD BENEFICIARIA">ENFERMEDAD BENEFICIARIA</option>
                                        <option value="ENFERMEDAD HIJO/A">ENFERMEDAD HIJO/A</option>
                                        <option value="ENFERMEDAD OTRO FAMILIAR">ENFERMEDAD OTRO FAMILIAR</option>
                                        <option value="CALAMIDAD DOMÉSTICA">CALAMIDAD DOMÉSTICA</option>
                                        <option value="DILIGENCIA PERSONAL">DILIGENCIA PERSONAL</option>
                                        <option value="MOVILIZACIÓN">MOVILIZACIÓN</option>
                                        <option value="PROBLEMAS ECONÓMICOS">PROBLEMAS ECONÓMICOS</option>
                                        <option value="REPOSO POSTPARTO">REPOSO POSTPARTO</option>
                                        <option value="REPOSO MÉDICO POR EMBARAZO">REPOSO MÉDICO POR EMBARAZO</option>
                                        <option value="CONTROL O CITA MÉDICA" selected>CONTROL O CITA MÉDICA</option>
                                    ';
                                }else {
                                    echo '<option value="MALESTARES POR EMBARAZO">MALESTARES POR EMBARAZO</option>
                                        <option value="ENFERMEDAD BENEFICIARIA">ENFERMEDAD BENEFICIARIA</option>
                                        <option value="ENFERMEDAD HIJO/A">ENFERMEDAD HIJO/A</option>
                                        <option value="ENFERMEDAD OTRO FAMILIAR">ENFERMEDAD OTRO FAMILIAR</option>
                                        <option value="CALAMIDAD DOMÉSTICA">CALAMIDAD DOMÉSTICA</option>
                                        <option value="DILIGENCIA PERSONAL">DILIGENCIA PERSONAL</option>
                                        <option value="MOVILIZACIÓN">MOVILIZACIÓN</option>
                                        <option value="PROBLEMAS ECONÓMICOS">PROBLEMAS ECONÓMICOS</option>
                                        <option value="REPOSO POSTPARTO">REPOSO POSTPARTO</option>
                                        <option value="REPOSO MÉDICO POR EMBARAZO">REPOSO MÉDICO POR EMBARAZO</option>
                                        <option value="CONTROL O CITA MÉDICA">CONTROL O CITA MÉDICA</option>
                                        <option value="NULL" selected>-- Registrar datos --</option>
                                    ';
                                }
                            }else{
                                echo '<option value="MALESTARES POR EMBARAZO">MALESTARES POR EMBARAZO</option>
                                        <option value="ENFERMEDAD BENEFICIARIA">ENFERMEDAD BENEFICIARIA</option>
                                        <option value="ENFERMEDAD HIJO/A">ENFERMEDAD HIJO/A</option>
                                        <option value="ENFERMEDAD OTRO FAMILIAR">ENFERMEDAD OTRO FAMILIAR</option>
                                        <option value="CALAMIDAD DOMÉSTICA">CALAMIDAD DOMÉSTICA</option>
                                        <option value="DILIGENCIA PERSONAL">DILIGENCIA PERSONAL</option>
                                        <option value="MOVILIZACIÓN">MOVILIZACIÓN</option>
                                        <option value="PROBLEMAS ECONÓMICOS">PROBLEMAS ECONÓMICOS</option>
                                        <option value="REPOSO POSTPARTO">REPOSO POSTPARTO</option>
                                        <option value="REPOSO MÉDICO POR EMBARAZO">REPOSO MÉDICO POR EMBARAZO</option>
                                        <option value="CONTROL O CITA MÉDICA">CONTROL O CITA MÉDICA</option>
                                        <option value="NULL" selected>-- Registrar datos --</option>
                                    ';
                            }
                        ?>
                    
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="encuentros">ENCUENTROS:</label>
                    <?php
                        if (isset($datos) && $datos != NULL && $datos != NULL) {
                            echo '<input 
                                type="text" 
                                id="encuentros" 
                                name="encuentros" 
                                value="'.$datos->encuentros.'" 
                                class="form-control number" 
                                placeholder="" 
                                aria-label="encuentros"
                            >';
                        }else{
                            echo '<input 
                                type="text" 
                                id="encuentros" 
                                name="encuentros" 
                                value="0" 
                                class="form-control number" 
                                placeholder="" 
                                aria-label="encuentros"
                            >';
                        }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="cuidado_infantil">ASIST CUIDADO INFANTIL:</label>
                    <?php
                        if (isset($datos) && $datos != NULL && $datos != NULL) {
                            echo '<input 
                                type="text" 
                                id="cuidado_infantil" 
                                name="cuidado_infantil" 
                                value="'.$datos->cuidado_infantil.'" 
                                class="form-control number" 
                                placeholder="" 
                                aria-label="cuidado_infantil"
                            >';
                        }else{
                            echo '<input 
                                type="text" 
                                id="cuidado_infantil" 
                                name="cuidado_infantil" 
                                value="0" 
                                class="form-control number" 
                                placeholder="" 
                                aria-label="cuidado_infantil"
                            >';
                        }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="anticoncetivo">ANTICONCEPT:</label>
                    <?php
                        if (isset($datos) && $datos != NULL && $datos != NULL) {
                            echo '<input 
                                type="text" 
                                id="anticoncetivo" 
                                name="anticoncetivo" 
                                value="'.$datos->anticoncetivo.'" 
                                class="form-control number" 
                                placeholder="" 
                                aria-label="anticoncetivo"
                            >';
                        }else{
                            echo '<input 
                                type="text" 
                                id="anticoncetivo" 
                                name="anticoncetivo" 
                                value="0" 
                                class="form-control number" 
                                placeholder="" 
                                aria-label="anticoncetivo"
                            >';
                        }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="control_ninio_sano">CONTROL NIÑO SANO:</label>
                    <?php
                        if (isset($datos) && $datos != NULL && $datos != NULL) {
                            echo '<input 
                                type="text" 
                                id="control_ninio_sano" 
                                name="control_ninio_sano" 
                                value="'.$datos->control_ninio_sano.'" 
                                class="form-control number" 
                                placeholder="" 
                                aria-label="control_ninio_sano"
                            >';
                        }else{
                            echo '<input 
                                type="text" 
                                id="control_ninio_sano" 
                                name="control_ninio_sano" 
                                value="0" 
                                class="form-control number" 
                                placeholder="" 
                                aria-label="control_ninio_sano"
                            >';
                        }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="atencion_medica">ATENCIÓN MÉDICA GENERAL:</label>
                    <?php
                        if (isset($datos) && $datos != NULL && $datos != NULL) {
                            echo '<input 
                                type="text" 
                                id="atencion_medica" 
                                name="atencion_medica" 
                                value="'.$datos->atencion_medica.'" 
                                class="form-control number" 
                                placeholder="" 
                                aria-label="atencion_medica"
                            >';
                        }else{
                            echo '<input 
                                type="text" 
                                id="atencion_medica" 
                                name="atencion_medica" 
                                value="0" 
                                class="form-control number" 
                                placeholder="" 
                                aria-label="atencion_medica"
                            >';
                        }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="derivaciones">DERIVACIONES:</label>
                    <?php
                        if (isset($datos) && $datos != NULL && $datos != NULL) {
                            echo '<input 
                                type="text" 
                                id="derivaciones" 
                                name="derivaciones" 
                                value="'.$datos->derivaciones.'" 
                                class="form-control number" 
                                placeholder="" 
                                aria-label="derivaciones"
                            >';
                        }else{
                            echo '<input 
                                type="text" 
                                id="derivaciones" 
                                name="derivaciones" 
                                value="0" 
                                class="form-control number" 
                                placeholder="" 
                                aria-label="derivaciones"
                            >';
                        }
                    ?>
                </div>
            </div>
            
            <?= form_hidden('idProd4', $id);  ?>
            <button type="submit" class="btn btn-info mb-3">Guardar</button>
        </form>
        <button onclick="history.back()" class="btn btn-success mb-3">Regresar</button>
        <a class="btn btn-success mb-3" href="<?php echo site_url().'prod_3_process'; ?>">Ir al menú del Componente 3</a>
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