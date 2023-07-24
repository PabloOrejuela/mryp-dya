<main class="container-sm px-2 mb-5">
    <div class="container-fluid px-0">
        <h4 class="mt-4" id="titulo-nombre"><?= esc($title).' - Otros / Asistencia: '.$est->nombres; ?></h4>
        <form action="<?php echo base_url().'/prod4-otros-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="kit">RECIBIÓ KIT:</label>
                    <?php
                        //echo '<pre>'.var_export($datos->kit, true).'</pre>';exit;
                        if ($datos != NULL) {
                            $dato['valor'] = $datos->kit;
                            $dato['campo'] = 'kit';
                            echo view('componente4/select-campo2-view', $dato); 
                            
                        }else{
                            $dato['valor'] = NULL;
                            $dato['campo'] = 'kit';
                            echo view('componente4/select-campo2-view', $dato); 
                        }

                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="motivo">MOTIVO:</label>
                    <?php
                        if (isset($datos->motivo) && $datos->motivo != null && $datos->motivo != '') {
                            echo '<input type="text" class="form-control" name="motivo" value="'.$datos->motivo.'" id="motivo">';
                        }else{
                            echo '<input type="text" class="form-control" name="motivo" value="" id="motivo">';
                        }
                    ?>
                </div>
            </div>
            <H4>ASISTENCIA</H4>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="dias_asistencia">DÍAS ASISTENCIA:</label>
                    <?php
                        if (isset($datos) && $datos != NULL && $datos != NULL) {
                            echo '<input 
                                type="text" 
                                id="dias_asistencia" 
                                name="dias_asistencia" 
                                value="'.$datos->dias_asistencia.'" 
                                class="form-control number" 
                                placeholder="" 
                                aria-label="dias_asistencia"
                            >';
                        }else{
                            echo '<input 
                                type="text" 
                                id="dias_asistencia" 
                                name="dias_asistencia" 
                                value="0" 
                                class="form-control number" 
                                placeholder="" 
                                aria-label="dias_asistencia"
                            >';
                        }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="porcentaje">PORCENTAJE:</label>
                    <?php
                        if (isset($datos) && $datos != NULL && $datos != NULL) {
                            echo '<input 
                                type="text" 
                                id="porcentaje" 
                                name="porcentaje" 
                                value="'.$datos->porcentaje.'" 
                                class="form-control number" 
                                placeholder="" 
                                aria-label="porcentaje"
                            >';
                        }else{
                            echo '<input 
                                type="text" 
                                id="porcentaje" 
                                name="porcentaje" 
                                value="0" 
                                class="form-control number" 
                                placeholder="" 
                                aria-label="porcentaje"
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