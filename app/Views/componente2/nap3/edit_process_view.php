<style>
    #titulo-nombre{
        color: rgb(106, 145, 40);
    }
</style>
<main class="container-md px-2 mb-4">
    <div class="container-fluid px-0">
        <h3 class="mt-4" id="titulo-nombre"><?= esc($title).' | Docentes DYA'; ?></h3>
        <h4 class="mt-4" id="titulo-nombre"><?= 'NOMBRE: '.$est->apellidos.' '.$est->nombres ; ?></h4>
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="mt-3"><?= esc ('ACOMPAÑAMIENTOS Y CAPACITACIONES'); ?></h3>
                <h5 class="mt-3"><?= esc ('ACOMPAÑAMIENTO VIRTUAL'); ?></h5>
                <form action="<?php echo base_url().'/nap3-process-update';?>" method="post">
                    <?= session()->getFlashdata('error'); ?>
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="kit">ENTREGADO KIT DE MATERIALES:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->kit;
                                    $dato['campo'] = 'kit';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'kit';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="guias">ENTREGADO GUIAS:</label>
                            <?php
                                    if ($datos != NULL) {
                                        $dato['valor'] = $datos->guias;
                                        $dato['campo'] = 'guias';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                        
                                    }else{
                                        $dato['valor'] = NULL;
                                        $dato['campo'] = 'guias';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                    }
                                ?>
                        </div>
                    </div>
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
                            <label for="protocolo_violencia">RUTAS Y PROTOCOLOS DE CASOS DE VIOLENCIA:</label>
                            <?php
                                    if ($datos != NULL) {
                                        $dato['valor'] = $datos->protocolo_violencia;
                                        $dato['campo'] = 'protocolo_violencia';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                        
                                    }else{
                                        $dato['valor'] = NULL;
                                        $dato['campo'] = 'protocolo_violencia';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                    }
                                ?>
                        </div>
                    </div>
                    <div class="row">
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
                        <div class="col-md-6 mb-3">
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
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="plan_microcurricular">PLANIFICACIÓN MICROCURRICULAR ERCA:</label>
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
                    </div>
                    <div class="row">
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
                        <div class="col-md-5 mb-3">
                            <label for="planificacion_matematica">ELAB. DE PLAN. ASIGNATURA DE MATEMÁTICA:</label>
                            <?php
                                    if ($datos != NULL) {
                                        $dato['valor'] = $datos->planificacion_matematica;
                                        $dato['campo'] = 'planificacion_matematica';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                        
                                    }else{
                                        $dato['valor'] = NULL;
                                        $dato['campo'] = 'planificacion_matematica';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                    }
                                ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="planificacion_lengua">ELAB. PLAN. ASIGNATURA DE LENGUA Y LITERATURA:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->planificacion_lengua;
                                    $dato['campo'] = 'planificacion_lengua';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'planificacion_lengua';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="planificacion_naturales">ELAB. DE PLAN. ASIGNATURA DE CIENCIAS NATURALES:</label>
                            <?php
                                    if ($datos != NULL) {
                                        $dato['valor'] = $datos->planificacion_naturales;
                                        $dato['campo'] = 'planificacion_naturales';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                        
                                    }else{
                                        $dato['valor'] = NULL;
                                        $dato['campo'] = 'planificacion_naturales';
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
                            <label for="informe_aprendizaje">ELABORACIÓN DE INFORMES DE APRENDIZAJE:</label>
                            <?php
                                    if ($datos != NULL) {
                                        $dato['valor'] = $datos->informe_aprendizaje;
                                        $dato['campo'] = 'informe_aprendizaje';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                        
                                    }else{
                                        $dato['valor'] = NULL;
                                        $dato['campo'] = 'informe_aprendizaje';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                    }
                                ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="eval_metacognitiva">EVALUACIÓN METACOGNITIVA:</label>
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
                        <div class="col-md-5 mb-3">
                            <label for="disciplina_positiva">DISCIPLINA POSITIVA:</label>
                            <?php
                                    if ($datos != NULL) {
                                        $dato['valor'] = $datos->disciplina_positiva;
                                        $dato['campo'] = 'disciplina_positiva';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                        
                                    }else{
                                        $dato['valor'] = NULL;
                                        $dato['campo'] = 'disciplina_positiva';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                    }
                                ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="tec_inst_evaluacion">TÉCNICAS E INSTRUMENTOS DE EVALUACIÓN:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->tec_inst_evaluacion;
                                    $dato['campo'] = 'tec_inst_evaluacion';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'tec_inst_evaluacion';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="practica_inst_evaluacion">PRACT. PLANIFICACIÓN E INST. DE EVALUACIÓN :</label>
                            <?php
                                    if ($datos != NULL) {
                                        $dato['valor'] = $datos->practica_inst_evaluacion;
                                        $dato['campo'] = 'practica_inst_evaluacion';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                        
                                    }else{
                                        $dato['valor'] = NULL;
                                        $dato['campo'] = 'practica_inst_evaluacion';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                    }
                                ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="valor_arte">EL VALOR DEL ARTE EN EL PROCESO EDUCATIVO:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->valor_arte;
                                    $dato['campo'] = 'valor_arte';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'valor_arte';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="habil_multiples">DESARROLLO DE HABILIDADES MÚLTIPLES:</label>
                            <?php
                                    if ($datos != NULL) {
                                        $dato['valor'] = $datos->habil_multiples;
                                        $dato['campo'] = 'habil_multiples';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                        
                                    }else{
                                        $dato['valor'] = NULL;
                                        $dato['campo'] = 'habil_multiples';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                    }
                                ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="func_ejecutiva">FUNCIONES EJECUTIVAS:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->func_ejecutiva;
                                    $dato['campo'] = 'func_ejecutiva';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'func_ejecutiva';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="elabora_recursos">ELABORACIÓN DE RECURSOS:</label>
                            <?php
                                    if ($datos != NULL) {
                                        $dato['valor'] = $datos->elabora_recursos;
                                        $dato['campo'] = 'elabora_recursos';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                        
                                    }else{
                                        $dato['valor'] = NULL;
                                        $dato['campo'] = 'elabora_recursos';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                    }
                                ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="revista_aula">REVISTA PARA EL AULA:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->revista_aula;
                                    $dato['campo'] = 'revista_aula';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'revista_aula';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="innova_educativa">INNOVACIÓN EDUCATIVA :</label>
                            <?php
                                    if ($datos != NULL) {
                                        $dato['valor'] = $datos->innova_educativa;
                                        $dato['campo'] = 'innova_educativa';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                        
                                    }else{
                                        $dato['valor'] = NULL;
                                        $dato['campo'] = 'innova_educativa';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                    }
                                ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="retro_rubrica">RETROALIMENTACIÓN INSTRUMENTO Y RÚBRICA DE EVALUACIÓN :</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->retro_rubrica;
                                    $dato['campo'] = 'retro_rubrica';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'retro_rubrica';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="revisa_inst_rubrica">REUNIÓN EXTRA.-REVISIÓN INST. Y RÚBRICAS DE EVALUACIÓN:</label>
                            <?php
                                    if ($datos != NULL) {
                                        $dato['valor'] = $datos->revisa_inst_rubrica;
                                        $dato['campo'] = 'revisa_inst_rubrica';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                        
                                    }else{
                                        $dato['valor'] = NULL;
                                        $dato['campo'] = 'revisa_inst_rubrica';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                    }
                                ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="revisa_inst_lengua_mate">REVISIÓN INST. EVAL. LENGUA Y LITERATURA - MATEMÁTICA: </label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->revisa_inst_lengua_mate;
                                    $dato['campo'] = 'revisa_inst_lengua_mate';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'revisa_inst_lengua_mate';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="extrategias_didacticas">ESTRATEGIAS DIDÁCTICAS:</label>
                            <?php
                                    if ($datos != NULL) {
                                        $dato['valor'] = $datos->extrategias_didacticas;
                                        $dato['campo'] = 'extrategias_didacticas';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                        
                                    }else{
                                        $dato['valor'] = NULL;
                                        $dato['campo'] = 'extrategias_didacticas';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                    }
                                ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="educomunicacion">EDUCOMUNICACIÓN: </label>
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
                            <label for="proyecto_vida">PROYECTO DE VIDA:</label>
                            <?php
                                    if ($datos != NULL) {
                                        $dato['valor'] = $datos->proyecto_vida;
                                        $dato['campo'] = 'proyecto_vida';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                        
                                    }else{
                                        $dato['valor'] = NULL;
                                        $dato['campo'] = 'proyecto_vida';
                                        echo view('componente2/nap3/select-campo-view', $dato); 
                                    }
                                ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="neuro_educacion">NEUROEDUCACIÓN: </label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->neuro_educacion;
                                    $dato['campo'] = 'neuro_educacion';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'neuro_educacion';
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

                    <h5 class="mt-3"><?= esc ('ACOMPAÑAMIENTO PRESENCIAL'); ?></h5>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="reuniones_segui_tec">REUNIONES DE SEGUIMIENTO TÉCNICO:</label>
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->reuniones_segui_tec != NULL && isset($datos->reuniones_segui_tec) && $datos->reuniones_segui_tec != '' ) {
                                        echo '<input type="text" id="reuniones_segui_tec" name="reuniones_segui_tec" value="'.$datos->reuniones_segui_tec.'" class="form-control number" step=".01" aria-label="reuniones_segui_tec">';
                                    }else {
                                        echo '<input type="text" name="reuniones_segui_tec" value="0" class="form-control number" placeholder="0" step=".01" aria-label="reuniones_segui_tec">';
                                    }
                                    
                                }else{
                                    echo '<input type="text" id="number" name="reuniones_segui_tec" value="0" class="form-control number" placeholder="0" step=".01" aria-label="reuniones_segui_tec">';
                                }

                            ?>
                        </div>
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
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="visita_domiciliaria">VISITAS DOMICILIARIAS:</label>
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->visita_domiciliaria != NULL && isset($datos->visita_domiciliaria) && $datos->visita_domiciliaria != '' ) {
                                        echo '<input type="text" id="visita_domiciliaria" name="visita_domiciliaria" value="'.$datos->visita_domiciliaria.'" class="form-control number" step=".01" aria-label="visita_domiciliaria">';
                                    }else {
                                        echo '<input type="text" name="visita_domiciliaria" value="0" class="form-control number" placeholder="0" step=".01" aria-label="visita_domiciliaria">';
                                    }
                                    
                                }else{
                                    echo '<input type="text" id="number" name="visita_domiciliaria" value="0" class="form-control number" placeholder="0" step=".01" aria-label="visita_domiciliaria">';
                                }

                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="casos_remitidos">CASOS REMITIDOS:</label>
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->casos_remitidos != NULL && isset($datos->casos_remitidos) && $datos->casos_remitidos != '' ) {
                                        echo '<input type="text" id="casos_remitidos" name="casos_remitidos" value="'.$datos->casos_remitidos.'" class="form-control number" step=".01" aria-label="casos_remitidos">';
                                    }else {
                                        echo '<input type="text" name="casos_remitidos" value="0" class="form-control number" placeholder="0" step=".01" aria-label="casos_remitidos">';
                                    }
                                    
                                }else{
                                    echo '<input type="text" id="number" name="casos_remitidos" value="0" class="form-control number" placeholder="0" step=".01" aria-label="casos_remitidos">';
                                }

                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="seguimiento_caso">SEGUIMIENTO DE CASO:</label>
                            <textarea 
                                class="form-control" 
                                name="seguimiento_caso"
                                placeholder="Llamadas telefónicas, mensajes al WhatAPP, visita domiciliaria, establecimiento de acuerdos, reuniones con el/la representante." 
                                id=""
                                style="height: 120px"

                            ><?php 
                                if (isset($datos) && $datos != NULL){
                                    echo $datos->seguimiento_caso.'</textarea>';
                                }else{
                                    echo '</textarea>';
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="rep_legales">ATENCIÓN A REPRESENTANTES LEGALES:</label>
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->rep_legales != NULL && isset($datos->rep_legales) && $datos->rep_legales != '' ) {
                                        echo '<input type="text" id="rep_legales" name="rep_legales" value="'.$datos->rep_legales.'" class="form-control number" step=".01" aria-label="rep_legales">';
                                    }else {
                                        echo '<input type="text" name="rep_legales" value="0" class="form-control number" placeholder="0" step=".01" aria-label="rep_legales">';
                                    }
                                    
                                }else{
                                    echo '<input type="text" id="number" name="rep_legales" value="0" class="form-control number" placeholder="0" step=".01" aria-label="rep_legales">';
                                }

                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="refuerzo_academico">REALIZA REFUERZO ACADEMICO: </label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->refuerzo_academico;
                                    $dato['campo'] = 'refuerzo_academico';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'refuerzo_academico';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="tecnico_local">NOMBRE DEL TÉCNICO A. LOCAL:</label>
                               <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="tecnico_local"
                                 >
                                <?php

                                    if ($datos != NULL) {
                                        if ($datos->tecnico_local == 'ALEJANDRO ENDARA') {
                                            echo '<option value="ALEJANDRO ENDARA" selected>ALEJANDRO ENDARA</option>
                                                    <option value="LUIS RODRÍGUEZ">LUIS RODRÍGUEZ</option>
                                                    <option value="MAYRA SUAREZ">MAYRA SUAREZ</option>
                                                    <option value="NULL">-- Registrar dato --</option>
                                            ';
                                        }elseif ($datos->tecnico_local == 'LUIS RODRÍGUEZ') {
                                            echo '<option value="ALEJANDRO ENDARA">ALEJANDRO ENDARA</option>
                                                    <option value="LUIS RODRÍGUEZ" selected>LUIS RODRÍGUEZ</option>
                                                    <option value="MAYRA SUAREZ">MAYRA SUAREZ</option>
                                                    <option value="NULL">-- Registrar dato --</option>
                                            ';
                                        }elseif ($datos->tecnico_local == 'MAYRA SUAREZ') {
                                            echo '<option value="ALEJANDRO ENDARA">ALEJANDRO ENDARA</option>
                                                    <option value="LUIS RODRÍGUEZ">LUIS RODRÍGUEZ</option>
                                                    <option value="MAYRA SUAREZ" selected>MAYRA SUAREZ</option>
                                                    <option value="NULL">-- Registrar dato --</option>
                                            ';
                                        }elseif ($datos->tecnico_local == NULL || $datos->tecnico_local == '0') {
                                            echo '<option value="ALEJANDRO ENDARA">ALEJANDRO ENDARA</option>
                                                    <option value="LUIS RODRÍGUEZ">LUIS RODRÍGUEZ</option>
                                                    <option value="MAYRA SUAREZ">MAYRA SUAREZ</option>
                                                    <option value="NULL" selected>-- Registrar dato --</option>
                                            ';
                                        }
                                    }else{
                                        echo '<option value="ALEJANDRO ENDARA">ALEJANDRO ENDARA</option>
                                                    <option value="LUIS RODRÍGUEZ">LUIS RODRÍGUEZ</option>
                                                    <option value="MAYRA SUAREZ">MAYRA SUAREZ</option>
                                                    <option value="NULL" selected>-- Registrar dato --</option>
                                            ';
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