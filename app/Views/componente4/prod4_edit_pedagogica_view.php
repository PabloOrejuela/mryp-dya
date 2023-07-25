<main class="container-sm px-2 mb-5">
    <div class="container-fluid px-0">
        <h4 class="mt-4" id="titulo-nombre"><?= esc($title).' - SESIONES PEDAGÓGICAS Y PSICOEMOCIONALES: '.$est->nombres; ?></h4>
        <form action="<?php echo base_url().'/prod4-pedagogica-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="leng_prescencial">SESION LENG PRESE:</label>
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
                <div class="col-md-4 mb-3">
                    <label for="leng_distancia">SESIONES LENG DISTAN:</label>
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
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
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
                <div class="col-md-4 mb-3">
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
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
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