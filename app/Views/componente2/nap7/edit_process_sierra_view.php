<style>
    #titulo-nombre{
        color: rgb(106, 145, 40);
    }
</style>
<main class="container-md px-2 mb-4">
    <div class="container-fluid px-0">
        <h3 class="mt-4" id="titulo-nombre"><?= esc($title).' | Docentes MINEDUC Virtual - Sierra'; ?></h3>
        <h4 class="mt-4" id="titulo-nombre"><?= 'NOMBRE: '.$docente->apellidos.' '.$docente->nombres ; ?></h4>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="mt-3"><?= esc ('ASISTENCIA A CAPACITACIONES VIRTUALES'); ?></h5>
                <form action="<?php echo base_url().'/nap7-process-sierra-update';?>" method="post">
                    <?= session()->getFlashdata('error'); ?>
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="lineamiento_rubrica">Lineamientos para elaborar la rúbrica de evaluación con énfasis en Reflexión Metacognitiva
:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->lineamiento_rubrica;
                                    $dato['campo'] = 'lineamiento_rubrica';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'lineamiento_rubrica';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="estrategia_didactica">Estrategias didácticas:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->estrategia_didactica;
                                    $dato['campo'] = 'estrategia_didactica';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'estrategia_didactica';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="curriculo_competencias">Práctica de planificación micro curricular utilizando el currículo priorizado con énfasis en competencias:</label>
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
                            <label for="innova_aula">Innovación en el aula:</label>
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
                            <label for="comple_inova_aula">Complemento de Innovación en el aula:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->comple_inova_aula;
                                    $dato['campo'] = 'comple_inova_aula';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'comple_inova_aula';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="tec_instrument_eval">Técnicas e instrumentos de evaluación:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->tec_instrument_eval;
                                    $dato['campo'] = 'tec_instrument_eval';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'tec_instrument_eval';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="pract_instr_eval">Práctica de planificación e instrumentos de evaluación:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->pract_instr_eval;
                                    $dato['campo'] = 'pract_instr_eval';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'pract_instr_eval';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="valor_arte_educa">El valor del arte en la educación:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->valor_arte_educa;
                                    $dato['campo'] = 'valor_arte_educa';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'valor_arte_educa';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="disciplina_positiva">Disciplina positiva:</label>
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
                        <div class="col-md-5 mb-3">
                            <label for="retro_lineamiento_instr">Retroalimentación sobre lineamientos de elaboración de instrumentos de evaluación con reflexión metacognitiva:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->retro_lineamiento_instr;
                                    $dato['campo'] = 'retro_lineamiento_instr';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'retro_lineamiento_instr';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="eval_prom_final">Elaboración de promedios finales:</label>
                            <?php
                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->eval_prom_final;
                                    $dato['campo'] = 'eval_prom_final';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'eval_prom_final';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="infor_apren_cierre">Revisión de informes de aprendizaje cierre de las capacitaciones:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->infor_apren_cierre;
                                    $dato['campo'] = 'infor_apren_cierre';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'infor_apren_cierre';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                    </div>
                    <div class="row">
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

                    <h5 class="mt-4"><?= esc ('CAPACITACIONES UNIVERSIDAD ANDINA (MÓDULO 2)'); ?></h5>
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
                            <label for="didactica_modela">DIDÁCTICA TRANSPOSICIÓN MODELACIÓN:</label>
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

                    <?= form_hidden('id', $id);  ?>
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