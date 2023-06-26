<style>
    #titulo-nombre{
        color: rgb(106, 145, 40);
    }
</style>
<main class="container-md px-2 mb-4">
    <div class="container-fluid px-0">
        <h3 class="mt-4" id="titulo-nombre"><?= esc($title).' | Estudiantes DYA'; ?></h3>
        <h4 class="mt-4" id="titulo-nombre"><?= 'NOMBRE: '.$est->apellidos.' '.$est->nombres ; ?></h4>
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="mt-3"><?= esc ('PROCESO'); ?></h3>
                <form action="<?php echo base_url().'/nap2-process-update';?>" method="post">
                    <?= session()->getFlashdata('error'); ?>
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="kit">ENTREGADO KIT DE MATERIALES:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->kit;
                                    $dato['campo'] = 'kit';
                                    echo view('componente2/nap2/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'kit';
                                    echo view('componente2/nap2/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="guias">ENTREGADO GUIAS:</label>
                            <?php
                                    if ($datos != NULL) {
                                        $dato['valor'] = $datos->guias;
                                        $dato['campo'] = 'guias';
                                        echo view('componente2/nap2/select-campo-view', $dato); 
                                        
                                    }else{
                                        $dato['valor'] = NULL;
                                        $dato['campo'] = 'guias';
                                        echo view('componente2/nap2/select-campo-view', $dato); 
                                    }
                                ?>
                        </div>
                    </div>
                    <!-- ASISTENCIA -->
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="asistencia_oct">% ASISTENCIA OCT:</label>
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->asistencia_oct != NULL && isset($datos->asistencia_oct) && $datos->asistencia_oct != '' ) {
                                        echo '<input 
                                                type="text" 
                                                id="asistencia_oct" 
                                                name="asistencia_oct" 
                                                value="'.$datos->asistencia_oct.'" 
                                                class="form-control number asistencia" 
                                                onchange="sumar();"  
                                                aria-label="asistencia_oct">';
                                    }else {
                                        echo '<input 
                                            type="text" 
                                            id="number" 
                                            name="asistencia_oct" 
                                            value="NULL" 
                                            class="form-control number asistencia"
                                            placeholder="0"
                                            onchange="sumar();" 
                                            aria-label="asistencia_oct">';
                                    }
                                    
                                }else{
                                    echo '<input 
                                            type="text" 
                                            id="number" 
                                            name="asistencia_oct" 
                                            value="0" 
                                            class="form-control number asistencia"
                                            placeholder="0"
                                            onchange="sumar();" 
                                            aria-label="asistencia_oct">';
                                }

                            ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="asistencia_nov">% ASISTENCIA NOV:</label>
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->asistencia_nov != NULL && isset($datos->asistencia_nov) && $datos->asistencia_nov != '' ) {
                                        echo '<input type="text" id="asistencia_nov" name="asistencia_nov" value="'.$datos->asistencia_nov.'" class="form-control number asistencia" onchange="sumar();"  aria-label="asistencia_nov">';
                                    }else {
                                        echo '<input type="text" id="number" name="asistencia_nov" value="0" class="form-control number asistencia" placeholder="0" onchange="sumar();"  aria-label="asistencia_nov">';
                                    }
                                    
                                }else{
                                    echo '<input type="text" id="number" name="asistencia_nov" value="0" class="form-control number asistencia" placeholder="0" onchange="sumar();"  aria-label="asistencia_nov">';
                                }

                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="asistencia_dic">% ASISTENCIA DIC:</label>
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->asistencia_dic != NULL && isset($datos->asistencia_dic) && $datos->asistencia_dic != '' ) {
                                        echo '<input type="text" id="asistencia_dic" name="asistencia_dic" value="'.$datos->asistencia_dic.'" class="form-control number asistencia" onchange="sumar();"  aria-label="asistencia_dic">';
                                    }else {
                                        echo '<input type="text" id="number" name="asistencia_dic" value="0" class="form-control number asistencia" placeholder="0" onchange="sumar();"  aria-label="asistencia_dic">';
                                    }
                                    
                                }else{
                                    echo '<input type="text" id="number" name="asistencia_dic" value="0" class="form-control number asistencia" placeholder="0" onchange="sumar();"  aria-label="asistencia_dic">';
                                }

                            ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="asistencia_ene">% ASISTENCIA ENE:</label>
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->asistencia_ene != NULL && isset($datos->asistencia_ene) && $datos->asistencia_ene != '' ) {
                                        echo '<input type="text" id="asistencia_ene" name="asistencia_ene" value="'.$datos->asistencia_ene.'" class="form-control number asistencia" onchange="sumar();"  aria-label="asistencia_ene">';
                                    }else {
                                        echo '<input type="text" id="number" name="asistencia_ene" value="0" class="form-control number asistencia" placeholder="0" onchange="sumar();"  aria-label="asistencia_ene">';
                                    }
                                    
                                }else{
                                    echo '<input type="text" id="number" name="asistencia_ene" value="0" class="form-control number asistencia" placeholder="0" onchange="sumar();"  aria-label="asistencia_ene">';
                                }

                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="asistencia_feb">% ASISTENCIA FEB:</label>
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->asistencia_feb != NULL && isset($datos->asistencia_feb) && $datos->asistencia_feb != '' ) {
                                        echo '<input type="text" id="asistencia_feb" name="asistencia_feb" value="'.$datos->asistencia_feb.'" class="form-control number asistencia" onchange="sumar();"  aria-label="asistencia_feb">';
                                    }else {
                                        echo '<input type="text" id="number" name="asistencia_feb" value="0" class="form-control number asistencia" placeholder="0" onchange="sumar();"  aria-label="asistencia_feb">';
                                    }
                                    
                                }else{
                                    echo '<input type="text" id="number" name="asistencia_feb" value="0" class="form-control number asistencia" placeholder="0" onchange="sumar();"  aria-label="asistencia_feb">';
                                }

                            ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="asistencia_mar">% ASISTENCIA MAR:</label>
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->asistencia_mar != NULL && isset($datos->asistencia_mar) && $datos->asistencia_mar != '' ) {
                                        echo '<input type="text" id="asistencia_mar" name="asistencia_mar" value="'.$datos->asistencia_mar.'" class="form-control number asistencia" placeholder="0" onchange="sumar();"  aria-label="asistencia_mar">';
                                    }else {
                                        echo '<input type="text" id="number" name="asistencia_mar" value="0" class="form-control number asistencia" placeholder="0" onchange="sumar();"  aria-label="asistencia_mar">';
                                    }
                                    
                                }else{
                                    echo '<input type="text" id="number" name="asistencia_mar" value="0" class="form-control number asistencia" placeholder="0" onchange="sumar();"   aria-label="asistencia_mar">';
                                }

                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="asistencia_abr">% ASISTENCIA ABR:</label>
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->asistencia_abr != NULL && isset($datos->asistencia_abr) && $datos->asistencia_abr != '' ) {
                                        echo '<input type="text" id="asistencia_abr" name="asistencia_abr" value="'.$datos->asistencia_abr.'" class="form-control number asistencia" onchange="sumar();"  aria-label="asistencia_abr">';
                                    }else {
                                        echo '<input type="text" id="number" name="asistencia_abr" value="0" class="form-control number asistencia" placeholder="0" onchange="sumar();"  aria-label="asistencia_abr">';
                                    }
                                    
                                }else{
                                    echo '<input type="text" id="number" name="asistencia_abr" value="0" class="form-control number asistencia" placeholder="0" onchange="sumar();"  aria-label="asistencia_abr">';
                                }

                            ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <?php
                                
                                if ($datos->regimen == 'SIERRA') {
                                    echo '<label for="asistencia_may">% ASISTENCIA MAY:</label>';
                                            if ($datos != NULL) {
                                                if ($datos->asistencia_may != NULL && isset($datos->asistencia_may) && $datos->asistencia_may != '' ) {
                                                    echo '<input type="text" id="asistencia_may" name="asistencia_may" value="'.$datos->asistencia_may.'" class="form-control number asistencia" onchange="sumar();"  aria-label="asistencia_may">';
                                                }else {
                                                    echo '<input type="text" id="number" name="asistencia_may" value="0" class="form-control number asistencia" placeholder="0" onchange="sumar();"  aria-label="asistencia_may">';
                                                }
                                                
                                            }else{
                                                echo '<input type="text" id="number" name="asistencia_may" value="0" class="form-control number asistencia" placeholder="0" onchange="sumar();"  aria-label="asistencia_may">';
                                            }
                                    
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <?php
                                
                                if ($datos->regimen == 'SIERRA') {
                                    echo '<label for="asistencia_jun">% ASISTENCIA JUN:</label>';
                                        if ($datos != NULL) {
                                            if ($datos->asistencia_jun != NULL && isset($datos->asistencia_jun) && $datos->asistencia_jun != '' ) {
                                                echo '<input type="text" id="asistencia_jun" name="asistencia_jun" value="'.$datos->asistencia_jun.'" class="form-control number asistencia" onchange="sumar();"  aria-label="asistencia_jun">';
                                            }else {
                                                echo '<input type="text" id="number" name="asistencia_jun" value="0" class="form-control number asistencia" placeholder="0" onchange="sumar();"  aria-label="asistencia_jun">';
                                            }
                                            
                                        }else{
                                            echo '<input type="text" id="number" name="asistencia_jun" value="0" class="form-control number asistencia" placeholder="0" onchange="sumar();"  aria-label="asistencia_jun">';
                                        }
                                }
                            ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="asistencia_total">% ASISTENCIA (TOTAL):</label>
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->asistencia_total != NULL && isset($datos->asistencia_total) && $datos->asistencia_total != '' ) {
                                        echo '<input type="text" id="asistencia_total" name="asistencia_total" value="'.$datos->asistencia_total.'" class="form-control number"  aria-label="asistencia_total">';
                                    }else {
                                        echo '<input type="text" id="number" name="asistencia_total" value="0" class="form-control number" placeholder="0"  aria-label="asistencia_total">';
                                    }
                                    
                                }else{
                                    echo '<input type="text" id="number" name="asistencia_total" value="0" class="form-control number" placeholder="0"  aria-label="asistencia_total">';
                                }

                            ?>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4 mb-3">
                            <label for="rendimiento_quim_1">RENDIMIENTO ACADÉMICO QUIMESTRE 1:</label>
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->rendimiento_quim_1 != NULL && isset($datos->rendimiento_quim_1) && $datos->rendimiento_quim_1 != '' ) {
                                        echo '<input type="text" id="rendimiento_quim_1" name="rendimiento_quim_1" value="'.$datos->rendimiento_quim_1.'" class="form-control number quimestre" onchange="promedioQuimestral();" step=".01" aria-label="rendimiento_quim_1">';
                                    }else {
                                        echo '<input type="text" name="rendimiento_quim_1" value="0" class="form-control number quimestre" placeholder="0" onchange="promedioQuimestral();" step=".01" aria-label="rendimiento_quim_1">';
                                    }
                                    
                                }else{
                                    echo '<input type="text" id="number" name="rendimiento_quim_1" value="0" class="form-control number quimestre" placeholder="0" onchange="promedioQuimestral();" step=".01" aria-label="rendimiento_quim_1">';
                                }

                            ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="rendimiento_quim_2">RENDIMIENTO ACADÉMICO QUIMESTRE 2:</label>
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->rendimiento_quim_2 != NULL && isset($datos->rendimiento_quim_2) && $datos->rendimiento_quim_2 != '' ) {
                                        echo '<input type="text"  id="rendimiento_quim_2" name="rendimiento_quim_2" value="'.$datos->rendimiento_quim_2.'" class="form-control number quimestre" onchange="promedioQuimestral();" step=".01" aria-label="rendimiento_quim_2">';
                                    }else {
                                        echo '<input type="text" name="rendimiento_quim_2" value="0" class="form-control number quimestre" placeholder="0" onchange="promedioQuimestral();" step=".01" aria-label="rendimiento_quim_2">';
                                    }
                                    
                                }else{
                                    echo '<input type="text" id="number" name="rendimiento_quim_2" value="0" class="form-control number quimestre" placeholder="0" onchange="promedioQuimestral();" step=".01" aria-label="rendimiento_quim_2">';
                                }

                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="expediente">EXPEDIENTE ACADÉMICO:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->expediente;
                                    $dato['campo'] = 'expediente';
                                    echo view('componente2/nap2/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'expediente';
                                    echo view('componente2/nap2/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="examen_ubicacion">EXAMEN DE UBICACIÓN :</label>
                            <?php
                                    if ($datos != NULL) {
                                        $dato['valor'] = $datos->examen_ubicacion;
                                        $dato['campo'] = 'examen_ubicacion';
                                        echo view('componente2/nap2/select-campo-view', $dato); 
                                        
                                    }else{
                                        $dato['valor'] = NULL;
                                        $dato['campo'] = 'examen_ubicacion';
                                        echo view('componente2/nap2/select-campo-view', $dato); 
                                    }
                                ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="resultado_ubicacion">RESULTADO EXAMEN DE UBICACIÓN:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="resultado_ubicacion"
                            >
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->resultado_ubicacion == 'APROBADO') {
                                        echo '<option value="APROBADO" selected>APROBADO</option>
                                                <option value="REPROBADO">REPROBADO</option>';
                                    }elseif ($datos->resultado_ubicacion == 'REPROBADO') {
                                        echo '<option value="APROBADO">APROBADO</option>
                                                <option value="REPROBADO" selected>REPROBADO</option>';
                                    }elseif ($datos->resultado_ubicacion == NULL || $datos->resultado_ubicacion == '0') {
                                        echo '<option value="NULL" selected>Registrar dato</option>
                                                <option value="APROBADO">APROBADO</option>
                                                <option value="REPROBADO">REPROBADO</option>';
                                    }
                                }else{
                                    echo '<option value="NULL" selected>Registrar dato</option>
                                            <option value="APROBADO">APROBADO</option>
                                            <option value="REPROBADO">REPROBADO</option>';
                                }
                                
                            ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="reporte_caso">REPORTE DE CASO:</label>
                            <?php
                                    if ($datos != NULL) {
                                        $dato['valor'] = $datos->reporte_caso;
                                        $dato['campo'] = 'reporte_caso';
                                        echo view('componente2/nap2/select-campo-view', $dato); 
                                        
                                    }else{
                                        $dato['valor'] = NULL;
                                        $dato['campo'] = 'reporte_caso';
                                        echo view('componente2/nap2/select-campo-view', $dato);
                                    }
                                ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
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
                        <div class="col-md-6 mb-3">
                            <label for="fecha_caso">FECHA IDENTIFICACIÓN DE CASO (DÍA/MES/AÑO):</label>
                            <?php
                                    if ($datos != NULL) {
                                        $dato['valor'] = $datos->fecha_caso;
                                        $dato['campo'] = 'fecha_caso';
                                        echo view('componente2/nap2/date-campo-view', $dato); 
                                        
                                    }else{
                                        $dato['valor'] = NULL;
                                        $dato['campo'] = 'fecha_caso';
                                        echo view('componente2/nap2/date-campo-view', $dato); 
                                    }
                                ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="seguimiento">SEGUIMIENTO DE CASO:</label>
                            <textarea 
                                class="form-control" 
                                name="seguimiento"
                                placeholder="Describir las acciones realizadas con los estudiantes (llamadas telefonicas, visita domiciliaria, reuniones con representantes, etc)" 
                                id=""
                                style="height: 120px"

                            ><?php 
                                if (isset($datos) && $datos != NULL){
                                    echo $datos->seguimiento.'</textarea>';;
                                }else{
                                    echo '</textarea>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="remision_caso">REMISION DE CASO:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="remision_caso"
                            >
                            <?php

                                if ($datos != NULL) {
                                    if ($datos->remision_caso == 'DECE') {
                                        echo '<option value="DECE" selected>DECE</option>
                                                <option value="JUNTA CANTONAL DE DERECHOS">JUNTA CANTONAL DE DERECHOS</option>
                                                <option value="FISCALIA">FISCALIA</option>
                                                <option value="UDAI">UDAI</option>
                                                <option value="NULL">-- Registrar dato --</option>
                                        ';
                                    }elseif ($datos->remision_caso == 'JUNTA CANTONAL DE DERECHOS') {
                                        echo '<option value="DECE">DECE</option>
                                                <option value="JUNTA CANTONAL DE DERECHOS" selected>JUNTA CANTONAL DE DERECHOS</option>
                                                <option value="FISCALIA">FISCALIA</option>
                                                <option value="UDAI">UDAI</option>
                                                <option value="NULL">-- Registrar dato --</option>
                                        ';
                                    }elseif ($datos->remision_caso == 'FISCALIA') {
                                        echo '<option value="DECE">DECE</option>
                                                <option value="JUNTA CANTONAL DE DERECHOS">JUNTA CANTONAL DE DERECHOS</option>
                                                <option value="FISCALIA" selected>FISCALIA</option>
                                                <option value="UDAI">UDAI</option>
                                                <option value="NULL">-- Registrar dato --</option>
                                        ';
                                    }elseif ($datos->remision_caso == 'UDAI') {
                                        echo '<option value="DECE">DECE</option>
                                                <option value="JUNTA CANTONAL DE DERECHOS">JUNTA CANTONAL DE DERECHOS</option>
                                                <option value="FISCALIA">FISCALIA</option>
                                                <option value="UDAI" selected>UDAI</option>
                                                <option value="NULL">-- Registrar dato --</option>
                                        ';
                                    }elseif ($datos->remision_caso == NULL || $datos->remision_caso == '0') {
                                        echo '<option value="DECE">DECE</option>
                                                <option value="JUNTA CANTONAL DE DERECHOS">JUNTA CANTONAL DE DERECHOS</option>
                                                <option value="FISCALIA">FISCALIA</option>
                                                <option value="UDAI">UDAI</option>
                                                <option value="NULL" selected>-- Registrar dato --</option>
                                        ';
                                    }
                                }else{
                                    echo '<option value="DECE">DECE</option>
                                            <option value="JUNTA CANTONAL DE DERECHOS">JUNTA CANTONAL DE DERECHOS</option>
                                            <option value="FISCALIA">FISCALIA</option>
                                            <option value="UDAI">UDAI</option>
                                            <option value="NULL" selected>-- Registrar dato --</option>
                                    ';
                                }
                                
                            ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="remision_caso_complementario">REMISION DE CASO COMPLEMENTARIO:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="remision_caso_complementario"
                            >
                            <?php

                                if ($datos != NULL) {
                                    if ($datos->remision_caso_complementario == 'DECE') {
                                        echo '<option value="DECE" selected>DECE</option>
                                                <option value="JUNTA CANTONAL DE DERECHOS">JUNTA CANTONAL DE DERECHOS</option>
                                                <option value="FISCALIA">FISCALIA</option>
                                                <option value="UDAI">UDAI</option>
                                                <option value="NULL">-- Registrar dato --</option>
                                        ';
                                    }elseif ($datos->remision_caso_complementario == 'JUNTA CANTONAL DE DERECHOS') {
                                        echo '<option value="DECE">DECE</option>
                                                <option value="JUNTA CANTONAL DE DERECHOS" selected>JUNTA CANTONAL DE DERECHOS</option>
                                                <option value="FISCALIA">FISCALIA</option>
                                                <option value="UDAI">UDAI</option>
                                                <option value="NULL">-- Registrar dato --</option>
                                        ';
                                    }elseif ($datos->remision_caso_complementario == 'FISCALIA') {
                                        echo '<option value="DECE">DECE</option>
                                                <option value="JUNTA CANTONAL DE DERECHOS">JUNTA CANTONAL DE DERECHOS</option>
                                                <option value="FISCALIA" selected>FISCALIA</option>
                                                <option value="UDAI">UDAI</option>
                                                <option value="NULL">-- Registrar dato --</option>
                                        ';
                                    }elseif ($datos->remision_caso_complementario == 'UDAI') {
                                        echo '<option value="DECE">DECE</option>
                                                <option value="JUNTA CANTONAL DE DERECHOS">JUNTA CANTONAL DE DERECHOS</option>
                                                <option value="FISCALIA">FISCALIA</option>
                                                <option value="UDAI" selected>UDAI</option>
                                                <option value="NULL">-- Registrar dato --</option>
                                        ';
                                    }elseif ($datos->remision_caso_complementario == NULL || $datos->remision_caso_complementario == '0') {
                                        echo '<option value="DECE">DECE</option>
                                                <option value="JUNTA CANTONAL DE DERECHOS">JUNTA CANTONAL DE DERECHOS</option>
                                                <option value="FISCALIA">FISCALIA</option>
                                                <option value="UDAI">UDAI</option>
                                                <option value="NULL" selected>-- Registrar dato --</option>
                                        ';
                                    }
                                }else{
                                    echo '<option value="DECE">DECE</option>
                                            <option value="JUNTA CANTONAL DE DERECHOS">JUNTA CANTONAL DE DERECHOS</option>
                                            <option value="FISCALIA">FISCALIA</option>
                                            <option value="UDAI">UDAI</option>
                                            <option value="NULL" selected>-- Registrar dato --</option>
                                    ';
                                }
                                
                            ?>
                            </select>
                        </div>
                    </div>
                    <h3 class="mt-5"><?= esc ('RESULTADOS'); ?></h3>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="prom_final">PROMEDIO DE CALIFICACIÓN FINAL:</label>
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->prom_final != NULL && isset($datos->prom_final) && $datos->prom_final != '' ) {
                                        echo '<input type="text" id="prom_final" name="prom_final" value="'.$datos->prom_final.'" class="form-control number" step=".01" aria-label="prom_final">';
                                    }else {
                                        echo '<input type="text" name="prom_final" value="0" class="form-control number" placeholder="0" step=".01" aria-label="prom_final">';
                                    }
                                    
                                }else{
                                    echo '<input type="text" id="number" name="prom_final" value="0" class="form-control number" placeholder="0" step=".01" aria-label="prom_final">';
                                }

                            ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="edu_regular">ENCADENADO A EDUCACIÓN REGULAR:</label>
                            <?php
                                    if ($datos != NULL) {
                                        $dato['valor'] = $datos->edu_regular;
                                        $dato['campo'] = 'edu_regular';
                                        echo view('componente2/nap2/select-campo-view', $dato); 
                                        
                                    }else{
                                        $dato['valor'] = NULL;
                                        $dato['campo'] = 'edu_regular';
                                        echo view('componente2/nap2/select-campo-view', $dato); 
                                    }
                                ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="nivel">NIVEL:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="nivel"
                            >
                            <?php

                                if ($datos != NULL) {
                                    if ($datos->nivel == 'DÉCIMO EGB') {
                                        echo '<option value="DÉCIMO EGB" selected>DÉCIMO EGB</option>
                                                <option value="PRIMER AÑO BGU">PRIMER AÑO BGU</option>
                                                <option value="PRIMER AÑO BT">PRIMER AÑO BT</option>
                                                <option value="NULL">-- Registrar dato --</option>
                                        ';
                                    }elseif ($datos->nivel == 'PRIMER AÑO BGU') {
                                        echo '<option value="DÉCIMO EGB">DÉCIMO EGB</option>
                                                <option value="PRIMER AÑO BGU" selected>PRIMER AÑO BGU</option>
                                                <option value="PRIMER AÑO BT">PRIMER AÑO BT</option>
                                                <option value="NULL">-- Registrar dato --</option>
                                        ';
                                    }elseif ($datos->nivel == 'PRIMER AÑO BT') {
                                        echo '<option value="DÉCIMO EGB">DÉCIMO EGB</option>
                                                <option value="PRIMER AÑO BGU">PRIMER AÑO BGU</option>
                                                <option value="PRIMER AÑO BT" selected>PRIMER AÑO BT</option>
                                                <option value="NULL">-- Registrar dato --</option>
                                        ';
                                    }elseif ($datos->nivel == NULL || $datos->nivel == '0') {
                                        echo '<option value="DÉCIMO EGB">DÉCIMO EGB</option>
                                                <option value="PRIMER AÑO BGU">PRIMER AÑO BGU</option>
                                                <option value="PRIMER AÑO BT">PRIMER AÑO BT</option>
                                                <option value="NULL" selected>-- Registrar dato --</option>
                                        ';
                                    }
                                }else{
                                    echo '<option value="DÉCIMO EGB">DÉCIMO EGB</option>
                                                <option value="PRIMER AÑO BGU">PRIMER AÑO BGU</option>
                                                <option value="PRIMER AÑO BT">PRIMER AÑO BT</option>
                                                <option value="NULL" selected>-- Registrar dato --</option>
                                        ';
                                }
                                
                            ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="institucion_destino">NOMBRE DE LA INSTITUCIÓN DE DESTINO:</label>
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->institucion_destino != NULL && isset($datos->institucion_destino) && $datos->institucion_destino != '' ) {
                                        echo '<input type="text"  id="institucion_destino" name="institucion_destino" value="'.$datos->institucion_destino.'" class="form-control" aria-label="institucion_destino">';
                                    }else {
                                        echo '<input type="text" name="institucion_destino" class="form-control" placeholder="" aria-label="institucion_destino">';
                                    }
                                    
                                }else{
                                    echo '<input type="text"  name="institucion_destino"  class="form-control" placeholder="" aria-label="institucion_destino">';
                                }
                            ?>
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
                //console.log(tecla.charCode);
                if (tecla.charCode == 46) {
                    return true;
                }else{
                    return false;
                }
            }
        });
    });
    
    function sumar(){
        const regimen = JSON.parse(`<?php echo $region; ?>`);
        const total = document.getElementById('asistencia_total');
        let subtotal = 0;
        [ ...document.getElementsByClassName( "asistencia" ) ].forEach( function ( element ) {
            if(element.value !== '') {
            subtotal += parseFloat(element.value);
            }
        });
        if (regimen == "SIERRA") {
            total.value = (subtotal/9).toFixed(2);
        }else{
            total.value = (subtotal/7).toFixed(2);
        }
        
    }

    function promedioQuimestral(){
        const promedio = document.getElementById('prom_final');
        var subtotal = 0;
        [ ...document.getElementsByClassName( "quimestre" ) ].forEach( function ( element ) {
            if(element.value !== '') {
            subtotal += parseFloat(element.value);
            }
        });
        
        promedio.value = (subtotal/2).toFixed(2);
    }
</script>