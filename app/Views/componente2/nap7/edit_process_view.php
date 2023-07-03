<style>
    #titulo-nombre{
        color: rgb(106, 145, 40);
    }
</style>
<main class="container-md px-2 mb-4">
    <div class="container-fluid px-0">
        <h3 class="mt-4" id="titulo-nombre"><?= esc($title).' | Docentes MINEDUC Virtual'; ?></h3>
        <h4 class="mt-4" id="titulo-nombre"><?= 'NOMBRE: '.$docente->apellidos.' '.$docente->nombres ; ?></h4>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="mt-3"><?= esc ('ASISTENCIA A CAPACITACIONES VIRTUALES'); ?></h5>
                <form action="<?php echo base_url().'/nap7-process-update';?>" method="post">
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