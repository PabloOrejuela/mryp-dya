<style>
    #titulo-nombre{
        color: rgb(106, 145, 40);
    }
</style>
<main class="container-md px-2 mb-4">
    <div class="container-fluid px-0">
        <h3 class="mt-4" id="titulo-nombre"><?= esc($title).' | Docentes MINEDUC Presencial'; ?></h3>
        <h4 class="mt-4" id="titulo-nombre"><?= 'NOMBRE: '.$est->apellidos.' '.$est->nombres ; ?></h4>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="mt-3"><?= esc ('ASISTENCIA A CAPACITACIONES VIRTUALES'); ?></h5>
                <form action="<?php echo base_url().'/nap5-process-update';?>" method="post">
                    <?= session()->getFlashdata('error'); ?>
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="lineamiento_nap">INDUCCIÓN LINEAMIENTOS NAP:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->lineamiento_nap;
                                    $dato['campo'] = 'lineamiento_nap';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'lineamiento_nap';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="avance_curricular">AVANCE CURRICULAR NAP:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->avance_curricular;
                                    $dato['campo'] = 'avance_curricular';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'avance_curricular';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="curriculo_competencias">CURRICULO PRIORIZADO CON ENFASIS EN COMPETENCIAS:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->curriculo_competencias;
                                    $dato['campo'] = 'curriculo_competencias';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'curriculo_competencias';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="plan_microcurricular_erca">PLANIFICACIÓN MICROCURRICULAR ERCA:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->plan_microcurricular_erca;
                                    $dato['campo'] = 'plan_microcurricular_erca';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'plan_microcurricular_erca';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="conciencia_linguistica">DESARROLLO DE LA CONCIENCIA LINGÜÍSTICA:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->conciencia_linguistica;
                                    $dato['campo'] = 'conciencia_linguistica';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'conciencia_linguistica';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="destrezas_desempeño">DESTREZAS CON CRITERIO DE DESEMPEÑO:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->destrezas_desempeño;
                                    $dato['campo'] = 'destrezas_desempeño';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'destrezas_desempeño';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="produccion_textos">PRODUCCIÓN DE TEXTOS:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->produccion_textos;
                                    $dato['campo'] = 'produccion_textos';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'produccion_textos';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="eval_metacognitiva">LINEAMIENTOS ELABORAR RÚBRICA DE EVALUACIÓN CON ÉNFASIS REFLEXIÓN METACOGNITIVA:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->eval_metacognitiva;
                                    $dato['campo'] = 'eval_metacognitiva';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'eval_metacognitiva';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="estrategias_didacticas">ESTRATEGIAS DIDÁCTICAS:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->estrategias_didacticas;
                                    $dato['campo'] = 'estrategias_didacticas';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'estrategias_didacticas';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="plan_microcurricular">PRÁCTICA DE PLANIFICACIÓN MICRO CURRICULAR:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->plan_microcurricular;
                                    $dato['campo'] = 'plan_microcurricular';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'plan_microcurricular';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="eval_promo_est">EVALUACIÓN Y PROMOCIÓN DE ESTUDIANTES NAP:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->eval_promo_est;
                                    $dato['campo'] = 'eval_promo_est';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'eval_promo_est';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="innova_aula">INNOVACIÓN EN EL AULA:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->innova_aula;
                                    $dato['campo'] = 'innova_aula';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'innova_aula';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="const_infor_aprendizaje">CONSTRUCCIÓN INFORMES APRENDIZAJE POR ASIGNATURAS Y POR CASOS:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->const_infor_aprendizaje;
                                    $dato['campo'] = 'const_infor_aprendizaje';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'const_infor_aprendizaje';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                        <label for="tecnico_virtual">TÉCNICO VIRTUAL:</label>
                               <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="tecnico_virtual"
                                 >
                                <?php

                                    if ($datos != NULL) {
                                        if ($datos->tecnico_virtual == 'ALEXANDRA GUAMÁN') {
                                            echo '<option value="ALEXANDRA GUAMÁN" selected>ALEXANDRA GUAMÁN</option>
                                                    <option value="CARLA UNTUÑA">CARLA UNTUÑA</option>
                                                    <option value="JESUS PILCO">JESUS PILCO</option>
                                                    <option value="NULL">-- Registrar dato --</option>
                                            ';
                                        }elseif ($datos->tecnico_virtual == 'CARLA UNTUÑA') {
                                            echo '<option value="ALEXANDRA GUAMÁN">ALEXANDRA GUAMÁN</option>
                                                    <option value="CARLA UNTUÑA" selected>CARLA UNTUÑA</option>
                                                    <option value="JESUS PILCO">JESUS PILCO</option>
                                                    <option value="NULL">-- Registrar dato --</option>
                                            ';
                                        }elseif ($datos->tecnico_virtual == 'JESUS PILCO') {
                                            echo '<option value="ALEXANDRA GUAMÁN">ALEXANDRA GUAMÁN</option>
                                                    <option value="CARLA UNTUÑA">CARLA UNTUÑA</option>
                                                    <option value="JESUS PILCO" selected>JESUS PILCO</option>
                                                    <option value="NULL">-- Registrar dato --</option>
                                            ';
                                        }elseif ($datos->tecnico_virtual == NULL || $datos->tecnico_virtual == '0') {
                                            echo '<option value="ALEXANDRA GUAMÁN">ALEXANDRA GUAMÁN</option>
                                                    <option value="CARLA UNTUÑA">CARLA UNTUÑA</option>
                                                    <option value="JESUS PILCO">JESUS PILCO</option>
                                                    <option value="NULL" selected>-- Registrar dato --</option>
                                            ';
                                        }
                                    }else{
                                        echo '<option value="ALEXANDRA GUAMÁN">ALEXANDRA GUAMÁN</option>
                                                    <option value="CARLA UNTUÑA">CARLA UNTUÑA</option>
                                                    <option value="JESUS PILCO">JESUS PILCO</option>
                                                    <option value="NULL" selected>-- Registrar dato --</option>
                                            ';
                                    }
                                    
                                ?>
                            </select>
                        </div>
                    </div>

                    
                    <h5 class="mt-3"><?= esc ('ACOMPAÑAMIENTOS TERRITORIALES'); ?></h5>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="reuniones_seguimiento_tec">REUNIONES DE SEGUIMIENTO TÉCNICO:</label>
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->reuniones_seguimiento_tec != NULL && isset($datos->reuniones_seguimiento_tec) && $datos->reuniones_seguimiento_tec != '' ) {
                                        echo '<input type="text" id="reuniones_seguimiento_tec" name="reuniones_seguimiento_tec" value="'.$datos->reuniones_seguimiento_tec.'" class="form-control number" step=".01" aria-label="reuniones_seguimiento_tec">';
                                    }else {
                                        echo '<input type="text" name="reuniones_seguimiento_tec" value="0" class="form-control number" placeholder="0" step=".01" aria-label="reuniones_seguimiento_tec">';
                                    }
                                    
                                }else{
                                    echo '<input type="text" id="number" name="reuniones_seguimiento_tec" value="0" class="form-control number" placeholder="0" step=".01" aria-label="reuniones_seguimiento_tec">';
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="coordinacion_autoridades">COORDINACIÓN CON AUTORIDADES INSTITUCIONALES:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->coordinacion_autoridades;
                                    $dato['campo'] = 'coordinacion_autoridades';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'coordinacion_autoridades';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="visita_aulica">VISITA DE OBSERVACIÓN AULICA:</label>
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->visita_aulica != NULL && isset($datos->visita_aulica) && $datos->visita_aulica != '' ) {
                                        echo '<input type="text" id="visita_aulica" name="visita_aulica" value="'.$datos->visita_aulica.'" class="form-control number" step=".01" aria-label="visita_aulica">';
                                    }else {
                                        echo '<input type="text" name="visita_aulica" value="0" class="form-control number" placeholder="0" step=".01" aria-label="visita_aulica">';
                                    }
                                    
                                }else{
                                    echo '<input type="text" id="number" name="visita_aulica" value="0" class="form-control number" placeholder="0" step=".01" aria-label="visita_aulica">';
                                }

                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="pres_plan_micro">PRESENTA PLANIFICACIONES MICROCURRICULARES:</label>
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->pres_plan_micro != NULL && isset($datos->pres_plan_micro) && $datos->pres_plan_micro != '' ) {
                                        echo '<input type="text" id="pres_plan_micro" name="pres_plan_micro" value="'.$datos->pres_plan_micro.'" class="form-control number" step=".01" aria-label="pres_plan_micro">';
                                    }else {
                                        echo '<input type="text" name="pres_plan_micro" value="0" class="form-control number" placeholder="0" step=".01" aria-label="pres_plan_micro">';
                                    }
                                    
                                }else{
                                    echo '<input type="text" id="number" name="pres_plan_micro" value="0" class="form-control number" placeholder="0" step=".01" aria-label="pres_plan_micro">';
                                }

                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="clase_demostrativa">CLASE DEMOSTRATIVA:</label>
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->clase_demostrativa != NULL && isset($datos->clase_demostrativa) && $datos->clase_demostrativa != '' ) {
                                        echo '<input type="text" id="clase_demostrativa" name="clase_demostrativa" value="'.$datos->clase_demostrativa.'" class="form-control number" step=".01" aria-label="clase_demostrativa">';
                                    }else {
                                        echo '<input type="text" name="clase_demostrativa" value="0" class="form-control number" placeholder="0" step=".01" aria-label="clase_demostrativa">';
                                    }
                                    
                                }else{
                                    echo '<input type="text" id="number" name="clase_demostrativa" value="0" class="form-control number" placeholder="0" step=".01" aria-label="clase_demostrativa">';
                                }

                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="entrega_reportes">ENTREGA DE REPORTES DE CALIFICACIONES:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->entrega_reportes;
                                    $dato['campo'] = 'entrega_reportes';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'entrega_reportes';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                        <label for="tecnico_territorial">NOMBRE DEL TÉCNICO A. TERRITORIAL:</label>
                               <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="tecnico_territorial"
                                 >
                                <?php

                                    if ($datos != NULL) {
                                        if ($datos->tecnico_territorial == 'MÓNICA GUAMANÍ') {
                                            echo '<option value="MÓNICA GUAMANÍ" selected>MÓNICA GUAMANÍ</option>
                                                    <option value="MARLON SIMBAÑA">MARLON SIMBAÑA</option>
                                                    <option value="DAVID MORETA">DAVID MORETA</option>
                                                    <option value="NULL">-- Registrar dato --</option>
                                            ';
                                        }elseif ($datos->tecnico_territorial == 'MARLON SIMBAÑA') {
                                            echo '<option value="MÓNICA GUAMANÍ">MÓNICA GUAMANÍ</option>
                                                    <option value="MARLON SIMBAÑA" selected>MARLON SIMBAÑA</option>
                                                    <option value="DAVID MORETA">DAVID MORETA</option>
                                                    <option value="NULL">-- Registrar dato --</option>
                                            ';
                                        }elseif ($datos->tecnico_territorial == 'DAVID MORETA') {
                                            echo '<option value="MÓNICA GUAMANÍ">MÓNICA GUAMANÍ</option>
                                                    <option value="MARLON SIMBAÑA">MARLON SIMBAÑA</option>
                                                    <option value="DAVID MORETA" selected>DAVID MORETA</option>
                                                    <option value="NULL">-- Registrar dato --</option>
                                            ';
                                        }elseif ($datos->tecnico_territorial == NULL || $datos->tecnico_territorial == '0') {
                                            echo '<option value="MÓNICA GUAMANÍ">MÓNICA GUAMANÍ</option>
                                                    <option value="MARLON SIMBAÑA">MARLON SIMBAÑA</option>
                                                    <option value="DAVID MORETA">DAVID MORETA</option>
                                                    <option value="NULL" selected>-- Registrar dato --</option>
                                            ';
                                        }
                                    }else{
                                        echo '<option value="MÓNICA GUAMANÍ">MÓNICA GUAMANÍ</option>
                                                    <option value="MARLON SIMBAÑA">MARLON SIMBAÑA</option>
                                                    <option value="DAVID MORETA">DAVID MORETA</option>
                                                    <option value="NULL" selected>-- Registrar dato --</option>
                                            ';
                                    }
                                    
                                ?>
                            </select>
                        </div>
                    </div>


                    <h5 class="mt-3"><?= esc ('CAPACITACIONES UNIVERSIDAD ANDINA (MÓDULO 2)'); ?></h5>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="induccion">INDUCCIÓN:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->induccion;
                                    $dato['campo'] = 'induccion';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'induccion';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="curriculo_mate">CURRÍCULO PRIORIZADO DE MATEMÁTICA:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->curriculo_mate;
                                    $dato['campo'] = 'curriculo_mate';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'curriculo_mate';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="congre_curriculo_mate">CONGRECIÓN DE CURRÍCULO PRIORIZADO DE MATEMÁTICA:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->congre_curriculo_mate;
                                    $dato['campo'] = 'congre_curriculo_mate';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'congre_curriculo_mate';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="crea_edu_mate_vida">CREATIVIDAD, EDUCACIÓN MATEMÁTICA PARA LA VIDA, EVALUACIÓN EN UN CONTEXTO DE PRIORIZACIÓN CURRICULAR:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->crea_edu_mate_vida;
                                    $dato['campo'] = 'crea_edu_mate_vida';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'crea_edu_mate_vida';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="habil_mate_trad_actual">HABILIDADES MATEMÁTICAS TRADICIONALES Y ACTUALES (E-M):</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->habil_mate_trad_actual;
                                    $dato['campo'] = 'habil_mate_trad_actual';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'habil_mate_trad_actual';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="habil_mate_nivel_sup">HABILIDADES MATEMÁTICA NIVEL SUPERIOR:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->habil_mate_nivel_sup;
                                    $dato['campo'] = 'habil_mate_nivel_sup';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'habil_mate_nivel_sup';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="aprendizaje_activo">APRENDIZAJES ACTIVOS:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->aprendizaje_activo;
                                    $dato['campo'] = 'aprendizaje_activo';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'aprendizaje_activo';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="metodologia_activa">METODOLOGÍAS ACTIVAS:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->metodologia_activa;
                                    $dato['campo'] = 'metodologia_activa';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'metodologia_activa';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="didactica_modela">"DIDÁCTICA TRANSPOSICIÓN MODELACIÓN":</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->didactica_modela;
                                    $dato['campo'] = 'didactica_modela';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'didactica_modela';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="trabajo_final">TRABAJO FINAL:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->trabajo_final;
                                    $dato['campo'] = 'trabajo_final';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'trabajo_final';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="resultado_curso">RESULTADO DEL CURSO:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="resultado_curso"
                            >
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->resultado_curso == 'APROBADO') {
                                        echo '<option value="APROBADO" selected>APROBADO</option>
                                                <option value="REPROBADO">REPROBADO</option>';
                                    }elseif ($datos->resultado_curso == 'REPROBADO') {
                                        echo '<option value="APROBADO">APROBADO</option>
                                                <option value="REPROBADO" selected>REPROBADO</option>';
                                    }elseif ($datos->resultado_curso == NULL || $datos->resultado_curso == '0') {
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
                        <div class="col-md-5 mb-3">
                            <label for="observaciones">OBSERVACIONES:</label>
                            <textarea 
                                class="form-control" 
                                name="observaciones"
                                placeholder="" 
                                id=""
                                style="height: 120px"

                            ><?php 
                                if (isset($datos) && $datos != NULL){
                                    echo $datos->observaciones.'</textarea>';
                                }else{
                                    echo '</textarea>';
                                }
                            ?>
                        </div>
                    </div>

                    <h5 class="mt-3"><?= esc ('CAPACITACIONES UNIVERSIDAD ANDINA (MÓDULO 3)'); ?></h5>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="tic_tecno_digital">Inducción/ Infraestructura TIC y base tecnológica de la era digital:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->tic_tecno_digital;
                                    $dato['campo'] = 'tic_tecno_digital';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'tic_tecno_digital';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="competencia_digital_docente">La competencia digital docente, marcos de referencia:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->competencia_digital_docente;
                                    $dato['campo'] = 'competencia_digital_docente';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'competencia_digital_docente';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="competencias_informacionales">Competencias informacionales: Herramientas de búsqueda en la web:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->competencias_informacionales;
                                    $dato['campo'] = 'competencias_informacionales';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'competencias_informacionales';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="gestion_datos">Gestión de datos, información y contenido digital:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->gestion_datos;
                                    $dato['campo'] = 'gestion_datos';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'gestion_datos';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="educomunicacion">Educomunicación:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->educomunicacion;
                                    $dato['campo'] = 'educomunicacion';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'educomunicacion';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="herramientas_compartir">Herramientas para compartir y colaborar:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->herramientas_compartir;
                                    $dato['campo'] = 'herramientas_compartir';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'herramientas_compartir';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="plataformas_web">Plataformas web que facilitan el trabajo colaborativo:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->plataformas_web;
                                    $dato['campo'] = 'plataformas_web';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'plataformas_web';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="rea_licencias">REA y licencias abiertas:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->rea_licencias;
                                    $dato['campo'] = 'rea_licencias';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'rea_licencias';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="contenido_interactivo">Diseño y creación de contenidos interactivo:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->contenido_interactivo;
                                    $dato['campo'] = 'contenido_interactivo';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'contenido_interactivo';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="contenido_audiovisual">Diseño y creación de contenido audiovisual:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->contenido_audiovisual;
                                    $dato['campo'] = 'contenido_audiovisual';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'contenido_audiovisual';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="resultado_curso_2">RESULTADO DEL CURSO (Mod 3):</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="resultado_curso_2"
                            >
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->resultado_curso_2 == 'APROBADO') {
                                        echo '<option value="APROBADO" selected>APROBADO</option>
                                                <option value="REPROBADO">REPROBADO</option>';
                                    }elseif ($datos->resultado_curso_2 == 'REPROBADO') {
                                        echo '<option value="APROBADO">APROBADO</option>
                                                <option value="REPROBADO" selected>REPROBADO</option>';
                                    }elseif ($datos->resultado_curso_2 == NULL || $datos->resultado_curso_2 == '0') {
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