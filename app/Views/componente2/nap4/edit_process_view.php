<style>
    .form-control{
        font-size: 0.8em;
    }
    #titulo-nombre{
        color: rgb(106, 145, 40);
    }
</style>
<main class="container-md px-2 mb-4">
    <div class="container-fluid px-0">
        <h4 class="mt-4" id="titulo-nombre"><?= esc($title).' : '.$est->apellidos.' '.$est->nombres ; ?></h4>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="mt-3"><?= esc ('PROCESO'); ?></h5>
                <form action="<?php echo base_url().'/nap4-process-update';?>" method="post">
                    <?= session()->getFlashdata('error'); ?>
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="kit">ENTREGADO KIT DE MATERIALES:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->kit;
                                    $dato['campo'] = 'kit';
                                    echo view('componente2/nap4/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'kit';
                                    echo view('componente2/nap4/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="reporte_caso">REPORTE DE CASO:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->reporte_caso;
                                    $dato['campo'] = 'reporte_caso';
                                    echo view('componente2/nap4/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'reporte_caso';
                                    echo view('componente2/nap4/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="tipo_caso">TIPO DE CASO:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="tipo_caso"
                            >
                            <?php

                                if ($datos != NULL) {
                                    if ($datos->tipo_caso == 'ASISTENCIA') {
                                        echo '<option value="ASISTENCIA" selected>ASISTENCIA</option>
                                                <option value="HECHO DE VIOLENCIA">HECHO DE VIOLENCIA</option>
                                                <option value="NEGLIGENCIA">NEGLIGENCIA</option>
                                                <option value="RENDIMIENTO ESCOLAR">RENDIMIENTO ESCOLAR</option>
                                                <option value="NULL">-- Registrar dato --</option>
                                        ';
                                    }elseif ($datos->tipo_caso == 'HECHO DE VIOLENCIA') {
                                        echo '<option value="ASISTENCIA">ASISTENCIA</option>
                                                <option value="HECHO DE VIOLENCIA" selected>HECHO DE VIOLENCIA</option>
                                                <option value="NEGLIGENCIA">NEGLIGENCIA</option>
                                                <option value="RENDIMIENTO ESCOLAR">RENDIMIENTO ESCOLAR</option>
                                                <option value="NULL">-- Registrar dato --</option>
                                        ';
                                    }elseif ($datos->tipo_caso == 'NEGLIGENCIA') {
                                        echo '<option value="ASISTENCIA">ASISTENCIA</option>
                                                <option value="HECHO DE VIOLENCIA">HECHO DE VIOLENCIA</option>
                                                <option value="NEGLIGENCIA" selected>NEGLIGENCIA</option>
                                                <option value="RENDIMIENTO ESCOLAR">RENDIMIENTO ESCOLAR</option>
                                                <option value="NULL">-- Registrar dato --</option>
                                        ';
                                    }elseif ($datos->tipo_caso == 'RENDIMIENTO ESCOLAR') {
                                        echo '<option value="ASISTENCIA">ASISTENCIA</option>
                                                <option value="HECHO DE VIOLENCIA">HECHO DE VIOLENCIA</option>
                                                <option value="NEGLIGENCIA">NEGLIGENCIA</option>
                                                <option value="RENDIMIENTO ESCOLAR" selected>RENDIMIENTO ESCOLAR</option>
                                                <option value="NULL">-- Registrar dato --</option>
                                        ';
                                    }elseif ($datos->tipo_caso == NULL || $datos->tipo_caso == '0') {
                                        echo '<option value="ASISTENCIA">ASISTENCIA</option>
                                                <option value="HECHO DE VIOLENCIA">HECHO DE VIOLENCIA</option>
                                                <option value="NEGLIGENCIA">NEGLIGENCIA</option>
                                                <option value="RENDIMIENTO ESCOLAR">RENDIMIENTO ESCOLAR</option>
                                                <option value="NULL" selected>-- Registrar dato --</option>
                                        ';
                                    }
                                }else{
                                    echo '<option value="ASISTENCIA">ASISTENCIA</option>
                                            <option value="HECHO DE VIOLENCIA">HECHO DE VIOLENCIA</option>
                                            <option value="NEGLIGENCIA">NEGLIGENCIA</option>
                                            <option value="RENDIMIENTO ESCOLAR">RENDIMIENTO ESCOLAR</option>
                                            <option value="NULL" selected>-- Registrar dato --</option>
                                    ';
                                }
                                
                            ?>
                            </select>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="seguimiento_caso">SEGUIMIENTO DE CASO:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="seguimiento_caso"
                            >
                            <?php

                                if ($datos != NULL) {
                                    if ($datos->seguimiento_caso == 'DECE') {
                                        echo '<option value="DECE" selected>DECE</option>
                                                <option value="JUNTA CANTONAL DE DERECHOS">JUNTA CANTONAL DE DERECHOS</option>
                                                <option value="FISCALIA">FISCALIA</option>
                                                <option value="NULL">-- Registrar dato --</option>
                                        ';
                                    }elseif ($datos->seguimiento_caso == 'JUNTA CANTONAL DE DERECHOS') {
                                        echo '<option value="DECE">DECE</option>
                                                <option value="JUNTA CANTONAL DE DERECHOS" selected>JUNTA CANTONAL DE DERECHOS</option>
                                                <option value="FISCALIA">FISCALIA</option>
                                                <option value="NULL">-- Registrar dato --</option>
                                        ';
                                    }elseif ($datos->seguimiento_caso == 'FISCALIA') {
                                        echo '<option value="DECE">DECE</option>
                                                <option value="JUNTA CANTONAL DE DERECHOS">JUNTA CANTONAL DE DERECHOS</option>
                                                <option value="FISCALIA" selected>FISCALIA</option>
                                                <option value="NULL">-- Registrar dato --</option>
                                        ';
                                    }elseif ($datos->seguimiento_caso == 'UDAI') {
                                        echo '<option value="DECE">DECE</option>
                                                <option value="JUNTA CANTONAL DE DERECHOS">JUNTA CANTONAL DE DERECHOS</option>
                                                <option value="FISCALIA">FISCALIA</option>
                                                <option value="NULL">-- Registrar dato --</option>
                                        ';
                                    }elseif ($datos->seguimiento_caso == NULL || $datos->seguimiento_caso == '0') {
                                        echo '<option value="DECE">DECE</option>
                                                <option value="JUNTA CANTONAL DE DERECHOS">JUNTA CANTONAL DE DERECHOS</option>
                                                <option value="FISCALIA">FISCALIA</option>
                                                <option value="NULL" selected>-- Registrar dato --</option>
                                        ';
                                    }
                                }else{
                                    echo '<option value="DECE">DECE</option>
                                            <option value="JUNTA CANTONAL DE DERECHOS">JUNTA CANTONAL DE DERECHOS</option>
                                            <option value="FISCALIA">FISCALIA</option>
                                            <option value="NULL" selected>-- Registrar dato --</option>
                                    ';
                                }
                                
                            ?>
                            </select>
                        </div>
                    </div>
                    

                    <h5 class="mt-3"><?= esc ('RESULTADOS'); ?></h5>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="edu_regular">SE ENCUENTRA ENCADENADO A EDUCACIÓN REGULAR:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->edu_regular;
                                    $dato['campo'] = 'edu_regular';
                                    echo view('componente2/nap4/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'edu_regular';
                                    echo view('componente2/nap4/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="nivel">NIVEL:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="nivel"
                            >
                            <?php

                                if ($datos != NULL) {

                                    foreach ($cursos as $key => $value) {
                                        if ($datos->nivel == $value->id) {
                                            if ($value->id == 11) {
                                                echo '<option value="'.$value->id.'" selected>PRIMERO BGU</option>';
                                            }else{
                                                echo '<option value="'.$value->id.'" selected>'.$value->curso.'</option>';
                                            }
                                            
                                        }else{
                                            if ($value->id == 11) {
                                                echo '<option value="'.$value->id.'">PRIMERO BGU</option>';
                                            }else{
                                                echo '<option value="'.$value->id.'">'.$value->curso.'</option>';
                                            }
                                        }
                                        if ($value->id > 10) {
                                            break;
                                        }
                                    }
                                }else{
                                    echo '<option value="NULL" selected>-- Registrar dato --</option>';
                                    foreach ($cursos as $key => $value) {
                                        if ($value->id == 11) {
                                            echo '<option value="'.$value->id.'">PRIMERO BGU</option>';
                                        }else{
                                            echo '<option value="'.$value->id.'">'.$value->curso.'</option>';
                                        }
                                        if ($value->id > 10) {
                                            break;
                                        }
                                    }
                                    
                                }
                                
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="institucion">NOMBRE DE LA INSTITUCIÓN DE DESTINO:</label>
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->institucion != NULL && isset($datos->institucion) && $datos->institucion != '' ) {
                                        echo '<input type="text" id="institucion" name="institucion" value="'.$datos->institucion.'" class="form-control" aria-label="institucion">';
                                    }else {
                                        echo '<input type="text" name="institucion" class="form-control" placeholder="Institución de destino" aria-label="institucion">';
                                    }
                                    
                                }else{
                                    echo '<input type="text"  name="institucion" class="form-control" placeholder="Institución de destino" aria-label="institucion">';
                                }

                            ?>
                        </div>
                        <div class="col-md-5 mb-3">  
                        </div>
                    </div>
                    <?= form_hidden('id', $idest);  ?>
                    <button type="submit" class="btn btn-info mb-3">Actualizar</button>  
                </form>         
            </div>
        </div>
                
        <button onclick="history.back()" class="btn btn-success mb-3">Regresar</button>
        <a class="btn btn-success mb-3" href="<?php echo site_url().'prod-2-menu'; ?>">Ir al menú del NAP 2</a>
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