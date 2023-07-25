<main class="container-sm px-2 mb-5">
    <div class="container-fluid px-0">
        <h4 class="mt-4" id="titulo-nombre"><?= esc($title).' - Diagnóstico Psicoemocional: '.$est->nombres; ?></h4>
        <form action="<?php echo base_url().'/prod4-psico-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="reconoce_caract_fisicas">RECONOCE SUS CARACTERÍSTICAS FÍSICAS:</label>
                    <?php
                        //echo '<pre>'.var_export($datos->reconoce_caract_fisicas, true).'</pre>';exit;
                        if ($datos != NULL) {
                            $dato['valor'] = $datos->reconoce_caract_fisicas;
                            $dato['campo'] = 'reconoce_caract_fisicas';
                            echo view('componente4/select-campo-view', $dato); 
                            
                        }else{
                            $dato['valor'] = NULL;
                            $dato['campo'] = 'reconoce_caract_fisicas';
                            echo view('componente4/select-campo-view', $dato); 
                        }

                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="reconoce_fortalezas">RECONOCE SUS FORTALEZAS Y HABILIDADES:</label>
                    <?php
                            if ($datos != NULL) {
                                $dato['valor'] = $datos->reconoce_fortalezas;
                                $dato['campo'] = 'reconoce_fortalezas';
                                echo view('componente4/select-campo-view', $dato); 
                                
                            }else{
                                $dato['valor'] = NULL;
                                $dato['campo'] = 'reconoce_fortalezas';
                                echo view('componente4/select-campo-view', $dato); 
                            }
                        ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="reconoce_caract_personales">RECONOCE SUS CARACTERÍSTICAS PERSONALES:</label>
                    <?php

                        if ($datos != NULL) {
                            $dato['valor'] = $datos->reconoce_caract_personales;
                            $dato['campo'] = 'reconoce_caract_personales';
                            echo view('componente4/select-campo-view', $dato); 
                            
                        }else{
                            $dato['valor'] = NULL;
                            $dato['campo'] = 'reconoce_caract_personales';
                            echo view('componente4/select-campo-view', $dato); 
                        }

                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="prioriza_aspectos">PRIORIZA ASPECTOS IMPORTANTES EN SU VIDA:</label>
                    <?php
                            if ($datos != NULL) {
                                $dato['valor'] = $datos->prioriza_aspectos;
                                $dato['campo'] = 'prioriza_aspectos';
                                echo view('componente4/select-campo-view', $dato); 
                                
                            }else{
                                $dato['valor'] = NULL;
                                $dato['campo'] = 'prioriza_aspectos';
                                echo view('componente4/select-campo-view', $dato); 
                            }
                        ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="identifica_apoyo">IDENTIFICA RED DE APOYO PRIMARIA:</label>
                    <?php

                        if ($datos != NULL) {
                            $dato['valor'] = $datos->identifica_apoyo;
                            $dato['campo'] = 'identifica_apoyo';
                            echo view('componente4/select-campo-view', $dato); 
                            
                        }else{
                            $dato['valor'] = NULL;
                            $dato['campo'] = 'identifica_apoyo';
                            echo view('componente4/select-campo-view', $dato); 
                        }

                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="reconoce_debilidades">RECONOCE SUS DEBILIDADES:</label>
                    <?php

                        if ($datos != NULL) {
                            $dato['valor'] = $datos->reconoce_debilidades;
                            $dato['campo'] = 'reconoce_debilidades';
                            echo view('componente4/select-campo-view', $dato); 
                            
                        }else{
                            $dato['valor'] = NULL;
                            $dato['campo'] = 'reconoce_debilidades';
                            echo view('componente4/select-campo-view', $dato); 
                        }

                    ?>
                </div>
            </div>
            <br>
            <h4>SE PROPONE METAS</h4>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="metas_corto">CORTO PLAZO:</label>
                    <?php

                        if ($datos != NULL) {
                            $dato['valor'] = $datos->metas_corto;
                            $dato['campo'] = 'metas_corto';
                            echo view('componente4/select-campo-view', $dato); 
                            
                        }else{
                            $dato['valor'] = NULL;
                            $dato['campo'] = 'metas_corto';
                            echo view('componente4/select-campo-view', $dato); 
                        }

                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="metas_largo">LARGO PLAZO:</label>
                    <?php

                        if ($datos != NULL) {
                            $dato['valor'] = $datos->metas_largo;
                            $dato['campo'] = 'metas_largo';
                            echo view('componente4/select-campo-view', $dato); 
                            
                        }else{
                            $dato['valor'] = NULL;
                            $dato['campo'] = 'metas_largo';
                            echo view('componente4/select-campo-view', $dato); 
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