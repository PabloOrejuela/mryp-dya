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
        <form action="<?php echo base_url().'/prod-1-asistencia';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <h4 class="mt-3" id="titulo-nombre"><?= esc ('Procesos - Asistencia'); ?></h4>
                        <div class="col-md-8 mb-3">
                            <label for="amie">Centro educativo:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="amie"
                                id="select_info"  
                            >   
                                <option value="NULL" selected>Centro educativo</option>
                                <?php
                                    
                                    if ($centros != NULL && isset($centros)) {
                                        foreach ($centros as $key => $ce) {
                                            if ($ce->amie == $amie) {
                                                echo '<option value="'.$ce->amie.'" selected>'.$ce->amie.' - '.$ce->nombre.'</option>';
                                            }else{
                                                echo '<option value="'.$ce->amie.'">'.$ce->amie.' - '.$ce->nombre.'</option>';
                                            }                                            
                                        } 
                                        
                                    }else{
                                        echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cohorte">Cohorte:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="cohorte"
                                id="select_info"  
                            >   
                                <?php
                                    if ($cohorte == 'PRIMERA COHORTE') {
                                        echo '<option value="NULL">Elegir cohorte</option>';
                                        echo '<option value="PRIMERA COHORTE" selected>PRIMERA COHORTE</option>';
                                        echo '<option value="SEGUNDA COHORTE">SEGUNDA COHORTE</option>';
                                    }else if($cohorte == 'SEGUNDA COHORTE'){
                                        echo '<option value="NULL">Elegir cohorte</option>';
                                        echo '<option value="PRIMERA COHORTE">PRIMERA COHORTE</option>';
                                        echo '<option value="SEGUNDA COHORTE" selected>SEGUNDA COHORTE</option>';

                                    }else{
                                        echo '<option value="NULL" selected>Elegir cohorte</option>';
                                        echo '<option value="PRIMERA COHORTE">PRIMERA COHORTE</option>';
                                        echo '<option value="SEGUNDA COHORTE">SEGUNDA COHORTE</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info mb-3 mt-3">Enviar</button>
                </div>
                
            </div>
            
        </form>
        <form action="<?php echo base_url().'/prod1-asistencia-centro-update';?>" method="post">
            <table class="table table-bordered" id="table-asistencia">
                <thead>
                    <th colspan="4">Asistencia del Centro educativo <?= $amie; ?></th>
                </thead>
                <thead>
                    <th>Total Horas</th>
                    <th>Horas efectivas</th>            
                    <th>Horas perdidas</th>
                </thead>
                <tbody>
                    <?php 
                        if (isset($asistencia) && $asistencia != NULL && $asistencia != NULL) {
                            echo '<tr>
                                    <td>
                                        <input 
                                            type="text" 
                                            id="horas_atencion_total" 
                                            name="horas_atencion_total" 
                                            value="'.$asistencia->horas_atencion_total.'" 
                                            class="form-control number" 
                                            placeholder="" 
                                            aria-label="horas_atencion_total"
                                        >
                                    </td>
                                    <td>
                                        <input 
                                            type="text" 
                                            id="horas_efectivas" 
                                            name="horas_efectivas" 
                                            value="'.$asistencia->horas_efectivas.'" 
                                            class="form-control number" 
                                            placeholder="" 
                                            aria-label="horas_efectivas"
                                        >
                                    </td>
                                    <td>
                                        <input 
                                            type="text" 
                                            id="horas_perdidas" 
                                            name="horas_perdidas" 
                                            value="'.$asistencia->horas_perdidas.'" 
                                            class="form-control number" 
                                            placeholder="" 
                                            aria-label="horas_perdidas"
                                        >
                                    </td>
                                </tr>';
                        }else{
                            echo '<tr>
                                    <td>
                                        <input 
                                            type="text" 
                                            id="horas_atencion_total" 
                                            name="horas_atencion_total" 
                                            value="'.$horas_atencion_total.'" 
                                            class="form-control number" 
                                            placeholder="" 
                                            aria-label="horas_atencion_total"
                                        >
                                    </td>
                                    <td>
                                        <input 
                                            type="text" 
                                            id="horas_efectivas" 
                                            name="horas_efectivas" 
                                            value="'.$horas_efectivas.'" 
                                            class="form-control number" 
                                            placeholder="" 
                                            aria-label="horas_efectivas"
                                        >
                                    </td>
                                    <td>
                                        <input 
                                            type="text" 
                                            id="horas_perdidas" 
                                            name="horas_perdidas" 
                                            value="'.$horas_perdidas.'" 
                                            class="form-control number" 
                                            placeholder="" 
                                            aria-label="horas_perdidas"
                                        >
                                    </td>
                                </tr>';
                        }
                    ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-info mb-3 mt-3">Guardar</button>
            <?php echo form_hidden('amie', $amie); ?>
            <?php echo form_hidden('cohorte', $cohorte); ?>
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