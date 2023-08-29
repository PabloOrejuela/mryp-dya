<main class="container-sm px-2 mb-5">
    <div class="container-fluid px-0">
        <h4 class="mt-4" id="titulo-nombre"><?= esc($title).' - SESIONES PEDAGÓGICAS Y PSICOEMOCIONALES: '.$est->nombres; ?></h4>
        <form action="<?php echo base_url().'/prod4-pedagogica-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="row mt-2">
                <div class="col-md-2 mb-3">
                    <label for="leng_prescencial">SESION LENG PRES:</label>
                    <?php
                        if (isset($datos) && $datos != null && $datos != '') {
                            echo '<input 
                                    type="text" 
                                    id="leng_prescencial" 
                                    name="leng_prescencial" 
                                    value="'.$datos->leng_prescencial.'" 
                                    class="form-control number"
                                    aria-label="leng_prescencial"
                            >';
                        }else{
                            echo '<input 
                                    type="text" 
                                    id="leng_prescencial" 
                                    name="leng_prescencial" 
                                    value="0" 
                                    class="form-control number"
                                    aria-label="leng_prescencial"
                            >';
                        }
                    ?>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="leng_prescencial_in">INASISTENCIAS:</label>
                    <?php
                        if (isset($datos) && $datos != null && $datos != '') {
                            echo '<input 
                                    type="text" 
                                    id="leng_prescencial_in" 
                                    name="leng_prescencial_in" 
                                    value="'.$datos->leng_prescencial_in.'" 
                                    class="form-control number"
                                    aria-label="leng_prescencial_in"
                            >';
                        }else{
                            echo '<input 
                                    type="text" 
                                    id="leng_prescencial_in" 
                                    name="leng_prescencial_in" 
                                    value="0" 
                                    class="form-control number"
                                    aria-label="leng_prescencial_in"
                            >';
                        }
                    ?>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="leng_prescencial_in_motivo">MOTIVOS INASISTENCIA:</label>
                    <select name="leng_prescencial_in_motivo" class="form-control" id="leng_prescencial_in_motivo" aria-label="leng_prescencial_in_motivo">
                        <?php
                            if ($datos != NULL && isset($datos)) {
                                if ($datos->leng_prescencial_in_motivo  == "MALESTARES POR EMBARAZO") {
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
                                }elseif ($datos->leng_prescencial_in_motivo  == "ENFERMEDAD BENEFICIARIA") {
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
                                }elseif ($datos->leng_prescencial_in_motivo  == "ENFERMEDAD HIJO/A") {
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
                                }elseif ($datos->leng_prescencial_in_motivo  == "ENFERMEDAD OTRO FAMILIAR") {
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
                                }elseif ($datos->leng_prescencial_in_motivo  == "CALAMIDAD DOMÉSTICA") {
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
                                }elseif ($datos->leng_prescencial_in_motivo  == "DILIGENCIA PERSONAL") {
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
                                }elseif ($datos->leng_prescencial_in_motivo  == "MOVILIZACIÓN") {
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
                                }elseif ($datos->leng_prescencial_in_motivo  == "PROBLEMAS ECONÓMICOS") {
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
                                }elseif ($datos->leng_prescencial_in_motivo  == "REPOSO POSTPARTO") {
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
                                }elseif ($datos->leng_prescencial_in_motivo  == "REPOSO MÉDICO POR EMBARAZO") {
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
                                }elseif ($datos->leng_prescencial_in_motivo  == "CONTROL O CITA MÉDICA") {
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
            <div class="row mt-3">
                <div class="col-md-2 mb-3">
                    <label for="leng_distancia">SESION LENG DIST:</label>
                    <?php
                        if (isset($datos) && $datos != null && $datos != '') {
                            echo '<input 
                                    type="text" 
                                    id="leng_distancia" 
                                    name="leng_distancia" 
                                    value="'.$datos->leng_distancia.'" 
                                    class="form-control number"
                                    aria-label="leng_distancia"
                            >';
                        }else{
                            echo '<input 
                                    type="text" 
                                    id="leng_distancia" 
                                    name="leng_distancia" 
                                    value="0" 
                                    class="form-control number"
                                    aria-label="leng_distancia"
                            >';
                        }
                    ?>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="leng_distancia_in">INASISTENCIAS:</label>
                    <?php
                        if (isset($datos) && $datos != null && $datos != '') {
                            echo '<input 
                                    type="text" 
                                    id="leng_distancia_in" 
                                    name="leng_distancia_in" 
                                    value="'.$datos->leng_distancia_in.'" 
                                    class="form-control number"
                                    aria-label="leng_distancia_in"
                            >';
                        }else{
                            echo '<input 
                                    type="text" 
                                    id="leng_distancia_in" 
                                    name="leng_distancia_in" 
                                    value="0" 
                                    class="form-control number"
                                    aria-label="leng_distancia_in"
                            >';
                        }
                    ?>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="leng_distancia_in_motivo">MOTIVOS INASISTENCIA:</label>
                    <select name="leng_distancia_in_motivo" class="form-control" id="leng_distancia_in_motivo" aria-label="leng_distancia_in_motivo">
                        <?php
                            if ($datos != NULL && isset($datos)) {
                                if ($datos->leng_distancia_in_motivo  == "MALESTARES POR EMBARAZO") {
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
                                }elseif ($datos->leng_distancia_in_motivo  == "ENFERMEDAD BENEFICIARIA") {
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
                                }elseif ($datos->leng_distancia_in_motivo  == "ENFERMEDAD HIJO/A") {
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
                                }elseif ($datos->leng_distancia_in_motivo  == "ENFERMEDAD OTRO FAMILIAR") {
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
                                }elseif ($datos->leng_distancia_in_motivo  == "CALAMIDAD DOMÉSTICA") {
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
                                }elseif ($datos->leng_distancia_in_motivo  == "DILIGENCIA PERSONAL") {
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
                                }elseif ($datos->leng_distancia_in_motivo  == "MOVILIZACIÓN") {
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
                                }elseif ($datos->leng_distancia_in_motivo  == "PROBLEMAS ECONÓMICOS") {
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
                                }elseif ($datos->leng_distancia_in_motivo  == "REPOSO POSTPARTO") {
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
                                }elseif ($datos->leng_distancia_in_motivo  == "REPOSO MÉDICO POR EMBARAZO") {
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
                                }elseif ($datos->leng_distancia_in_motivo  == "CONTROL O CITA MÉDICA") {
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
            <div class="row mt-3">
                <div class="col-md-2 mb-3">
                    <label for="mate_prescencial">SESIONES MATE PRES:</label>
                    <?php
                        if (isset($datos) && $datos != null && $datos != '') {
                            echo '<input 
                                    type="text" 
                                    id="mate_prescencial" 
                                    name="mate_prescencial" 
                                    value="'.$datos->mate_prescencial.'" 
                                    class="form-control number"
                                    aria-label="mate_prescencial"
                            >';
                        }else{
                            echo '<input 
                                    type="text" 
                                    id="mate_prescencial" 
                                    name="mate_prescencial" 
                                    value="0" 
                                    class="form-control number"
                                    aria-label="mate_prescencial"
                            >';
                        }
                    ?>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="mate_prescencial_in">INASISTENCIAS:</label>
                    <?php
                        if (isset($datos) && $datos != null && $datos != '') {
                            echo '<input 
                                    type="text" 
                                    id="mate_prescencial_in" 
                                    name="mate_prescencial_in" 
                                    value="'.$datos->mate_prescencial_in.'" 
                                    class="form-control number"
                                    aria-label="mate_prescencial_in"
                            >';
                        }else{
                            echo '<input 
                                    type="text" 
                                    id="mate_prescencial_in" 
                                    name="mate_prescencial_in" 
                                    value="0" 
                                    class="form-control number"
                                    aria-label="mate_prescencial_in"
                            >';
                        }
                    ?>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="mate_prescencial_in_motivo">MOTIVOS INASISTENCIA:</label>
                    <select name="mate_prescencial_in_motivo" class="form-control" id="mate_prescencial_in_motivo" aria-label="mate_prescencial_in_motivo">
                        <?php
                            if ($datos != NULL && isset($datos)) {
                                if ($datos->mate_prescencial_in_motivo  == "MALESTARES POR EMBARAZO") {
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
                                }elseif ($datos->mate_prescencial_in_motivo  == "ENFERMEDAD BENEFICIARIA") {
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
                                }elseif ($datos->mate_prescencial_in_motivo  == "ENFERMEDAD HIJO/A") {
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
                                }elseif ($datos->mate_prescencial_in_motivo  == "ENFERMEDAD OTRO FAMILIAR") {
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
                                }elseif ($datos->mate_prescencial_in_motivo  == "CALAMIDAD DOMÉSTICA") {
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
                                }elseif ($datos->mate_prescencial_in_motivo  == "DILIGENCIA PERSONAL") {
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
                                }elseif ($datos->mate_prescencial_in_motivo  == "MOVILIZACIÓN") {
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
                                }elseif ($datos->mate_prescencial_in_motivo  == "PROBLEMAS ECONÓMICOS") {
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
                                }elseif ($datos->mate_prescencial_in_motivo  == "REPOSO POSTPARTO") {
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
                                }elseif ($datos->mate_prescencial_in_motivo  == "REPOSO MÉDICO POR EMBARAZO") {
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
                                }elseif ($datos->mate_prescencial_in_motivo  == "CONTROL O CITA MÉDICA") {
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
            <div class="row mt-3">
                <div class="col-md-2 mb-3">
                    <label for="mate_distancia">SESIONES MATE DIST:</label>
                    <?php
                        if (isset($datos) && $datos != null && $datos != '') {
                            echo '<input 
                                    type="text" 
                                    id="mate_distancia" 
                                    name="mate_distancia" 
                                    value="'.$datos->mate_distancia.'" 
                                    class="form-control number"
                                    aria-label="mate_distancia"
                            >';
                        }else{
                            echo '<input 
                                    type="text" 
                                    id="mate_distancia" 
                                    name="mate_distancia" 
                                    value="0" 
                                    class="form-control number"
                                    aria-label="mate_distancia"
                            >';
                        }
                    ?>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="mate_distancia_in">INASISTENCIAS:</label>
                    <?php
                        if (isset($datos) && $datos != null && $datos != '') {
                            echo '<input 
                                    type="text" 
                                    id="mate_distancia_in" 
                                    name="mate_distancia_in" 
                                    value="'.$datos->mate_distancia_in.'" 
                                    class="form-control number"
                                    aria-label="mate_distancia_in"
                            >';
                        }else{
                            echo '<input 
                                    type="text" 
                                    id="mate_distancia_in" 
                                    name="mate_distancia_in" 
                                    value="0" 
                                    class="form-control number"
                                    aria-label="mate_distancia_in"
                            >';
                        }
                    ?>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="mate_distancia_in_motivo">MOTIVOS INASISTENCIA:</label>
                    <select name="mate_distancia_in_motivo" class="form-control" id="mate_distancia_in_motivo" aria-label="mate_distancia_in_motivo">
                        <?php
                            if ($datos != NULL && isset($datos)) {
                                if ($datos->mate_distancia_in_motivo  == "MALESTARES POR EMBARAZO") {
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
                                }elseif ($datos->mate_distancia_in_motivo  == "ENFERMEDAD BENEFICIARIA") {
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
                                }elseif ($datos->mate_distancia_in_motivo  == "ENFERMEDAD HIJO/A") {
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
                                }elseif ($datos->mate_distancia_in_motivo  == "ENFERMEDAD OTRO FAMILIAR") {
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
                                }elseif ($datos->mate_distancia_in_motivo  == "CALAMIDAD DOMÉSTICA") {
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
                                }elseif ($datos->mate_distancia_in_motivo  == "DILIGENCIA PERSONAL") {
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
                                }elseif ($datos->mate_distancia_in_motivo  == "MOVILIZACIÓN") {
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
                                }elseif ($datos->mate_distancia_in_motivo  == "PROBLEMAS ECONÓMICOS") {
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
                                }elseif ($datos->mate_distancia_in_motivo  == "REPOSO POSTPARTO") {
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
                                }elseif ($datos->mate_distancia_in_motivo  == "REPOSO MÉDICO POR EMBARAZO") {
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
                                }elseif ($datos->mate_distancia_in_motivo  == "CONTROL O CITA MÉDICA") {
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
            <div class="row mt-3">
                <div class="col-md-2 mb-3">
                    <label for="psicoemocionales">SESIONES PSICOEMOCIONALES:</label>
                    <?php
                        if (isset($datos) && $datos != null && $datos != '') {
                            echo '<input 
                                    type="text" 
                                    id="psicoemocionales" 
                                    name="psicoemocionales" 
                                    value="'.$datos->psicoemocionales.'" 
                                    class="form-control number"
                                    aria-label="psicoemocionales"
                            >';
                        }else{
                            echo '<input 
                                    type="text" 
                                    id="psicoemocionales" 
                                    name="psicoemocionales" 
                                    value="0" 
                                    class="form-control number"
                                    aria-label="psicoemocionales"
                            >';
                        }
                    ?>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="psicoemocionales_in">INASISTENCIAS:</label>
                    <?php
                        if (isset($datos) && $datos != null && $datos != '') {
                            echo '<input 
                                    type="text" 
                                    id="psicoemocionales_in" 
                                    name="psicoemocionales_in" 
                                    value="'.$datos->psicoemocionales_in.'" 
                                    class="form-control number"
                                    aria-label="psicoemocionales_in"
                            >';
                        }else{
                            echo '<input 
                                    type="text" 
                                    id="psicoemocionales_in" 
                                    name="psicoemocionales_in" 
                                    value="0" 
                                    class="form-control number"
                                    aria-label="psicoemocionales_in"
                            >';
                        }
                    ?>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="psicoemocionales_in_motivo">MOTIVOS INASISTENCIA:</label>
                    <select name="psicoemocionales_in_motivo" class="form-control" id="psicoemocionales_in_motivo" aria-label="psicoemocionales_in_motivo">
                        <?php
                            if ($datos != NULL && isset($datos)) {
                                if ($datos->psicoemocionales_in_motivo  == "MALESTARES POR EMBARAZO") {
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
                                }elseif ($datos->psicoemocionales_in_motivo  == "ENFERMEDAD BENEFICIARIA") {
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
                                }elseif ($datos->psicoemocionales_in_motivo  == "ENFERMEDAD HIJO/A") {
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
                                }elseif ($datos->psicoemocionales_in_motivo  == "ENFERMEDAD OTRO FAMILIAR") {
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
                                }elseif ($datos->psicoemocionales_in_motivo  == "CALAMIDAD DOMÉSTICA") {
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
                                }elseif ($datos->psicoemocionales_in_motivo  == "DILIGENCIA PERSONAL") {
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
                                }elseif ($datos->psicoemocionales_in_motivo  == "MOVILIZACIÓN") {
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
                                }elseif ($datos->psicoemocionales_in_motivo  == "PROBLEMAS ECONÓMICOS") {
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
                                }elseif ($datos->psicoemocionales_in_motivo  == "REPOSO POSTPARTO") {
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
                                }elseif ($datos->psicoemocionales_in_motivo  == "REPOSO MÉDICO POR EMBARAZO") {
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
                                }elseif ($datos->psicoemocionales_in_motivo  == "CONTROL O CITA MÉDICA") {
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
            <div class="row mt-3">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="resultado">RESULTADO / OBSERVACION DE SESION PSICO:</label>
                    <?php
                        if (isset($datos->resultado) && $datos->resultado != null && $datos->resultado != '') {
                            echo '<textarea class="form-control" name="resultado" id="resultado" cols="30" rows="3">'.$datos->resultado.'</textarea>';
                        }else{
                            echo '<textarea class="form-control" name="resultado" id="resultado" cols="30" rows="3"></textarea>';
                        }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 mb-3">
                    <label for="funcion">OYENTE:</label>
                    <div class="form-check">
                        <?php
                            if (isset($oyente) && $oyente->cohorte_1 == 1) {
                                echo '<input class="form-check-input" type="checkbox" name="cohorte_1" value="1" id="defaultCheck1" checked>Cohorte 1';
                            }else{
                                echo '<input class="form-check-input" type="checkbox" name="cohorte_1" value="1" id="defaultCheck1">Cohorte 1';
                            }
                        ?>
                        
                    </div>
                    <div class="form-check">
                        <?php
                            if (isset($oyente) && $oyente->cohorte_2 == 1) {
                                echo '<input class="form-check-input" type="checkbox" name="cohorte_2" value="1" id="defaultCheck1" checked>Cohorte 2';
                            }else{
                                echo '<input class="form-check-input" type="checkbox" name="cohorte_2" value="1" id="defaultCheck1">Cohorte 2';
                            }
                        ?>
                    </div>
                    <div class="form-check">
                        <?php
                            if (isset($oyente) && $oyente->cohorte_3 == 1) {
                                echo '<input class="form-check-input" type="checkbox" name="cohorte_3" value="1" id="defaultCheck1" checked>Cohorte 3';
                            }else{
                                echo '<input class="form-check-input" type="checkbox" name="cohorte_3" value="1" id="defaultCheck1">Cohorte 3';
                            }
                        ?>
                    </div>
                    <div class="form-check">
                        <?php
                            if (isset($oyente) && $oyente->cohorte_4 == 1) {
                                echo '<input class="form-check-input" type="checkbox" name="cohorte_4" value="1" id="defaultCheck1" checked>Cohorte 4';
                            }else{
                                echo '<input class="form-check-input" type="checkbox" name="cohorte_4" value="1" id="defaultCheck1">Cohorte 4';
                            }
                        ?>
                    </div>
                    <div class="form-check">
                        <?php
                            if (isset($oyente) && $oyente->cohorte_5 == 1) {
                                echo '<input class="form-check-input" type="checkbox" name="cohorte_5" value="1" id="defaultCheck1" checked>Cohorte 5';
                            }else{
                                echo '<input class="form-check-input" type="checkbox" name="cohorte_5" value="1" id="defaultCheck1">Cohorte 5';
                            }
                        ?>
                    </div>
                    <div class="form-check">
                        <?php
                            if (isset($oyente) && $oyente->cohorte_6 == 1) {
                                echo '<input class="form-check-input" type="checkbox" name="cohorte_6" value="1" id="defaultCheck1" checked>Cohorte 6';
                            }else{
                                echo '<input class="form-check-input" type="checkbox" name="cohorte_6" value="1" id="defaultCheck1">Cohorte 6';
                            }
                        ?>
                    </div>
                </div>
            </div>

            
            <?= form_hidden('idProd4', $id);  ?>
            <button type="submit" class="btn btn-info mb-3">Guardar</button>
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