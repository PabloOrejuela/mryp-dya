<main class="container-sm px-2 mb-5">
    <div class="container-fluid px-0">
        <h4 class="mt-4" id="titulo-nombre"><?= esc($title).' - Diagnóstico de Matemática: '.$est->nombres; ?></h4>
        <form action="<?php echo base_url().'/prod4-mate-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="reconoce_numeros">RECONOCE CORRECTAMENTE NÚMEROS NATURALES:</label>
                    <?php
                        //echo '<pre>'.var_export($datos->reconoce_numeros, true).'</pre>';exit;
                        if ($datos != NULL) {
                            $dato['valor'] = $datos->reconoce_numeros;
                            $dato['campo'] = 'reconoce_numeros';
                            echo view('componente4/select-campo-view', $dato); 
                            
                        }else{
                            $dato['valor'] = NULL;
                            $dato['campo'] = 'reconoce_numeros';
                            echo view('componente4/select-campo-view', $dato); 
                        }

                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="identifica_operaciones">IDENTIFICA OPERACIONES MATEMÁTICAS BÁSICAS:</label>
                    <?php
                            if ($datos != NULL) {
                                $dato['valor'] = $datos->identifica_operaciones;
                                $dato['campo'] = 'identifica_operaciones';
                                echo view('componente4/select-campo-view', $dato); 
                                
                            }else{
                                $dato['valor'] = NULL;
                                $dato['campo'] = 'identifica_operaciones';
                                echo view('componente4/select-campo-view', $dato); 
                            }
                        ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="resuelve_operaciones">RESUELVE OPERACIONES MATEMÁTICAS BÁSICAS:</label>
                    <?php

                        if ($datos != NULL) {
                            $dato['valor'] = $datos->resuelve_operaciones;
                            $dato['campo'] = 'resuelve_operaciones';
                            echo view('componente4/select-campo-view', $dato); 
                            
                        }else{
                            $dato['valor'] = NULL;
                            $dato['campo'] = 'resuelve_operaciones';
                            echo view('componente4/select-campo-view', $dato); 
                        }

                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="reconoce_problermas">RECONOCE PROBLEMAS MATEMÁTICOS:</label>
                    <?php
                            if ($datos != NULL) {
                                $dato['valor'] = $datos->reconoce_problermas;
                                $dato['campo'] = 'reconoce_problermas';
                                echo view('componente4/select-campo-view', $dato); 
                                
                            }else{
                                $dato['valor'] = NULL;
                                $dato['campo'] = 'reconoce_problermas';
                                echo view('componente4/select-campo-view', $dato); 
                            }
                        ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="resuelve_problemas">RESUELVE PROBLEMAS MATEMÁTICOS:</label>
                    <?php

                        if ($datos != NULL) {
                            $dato['valor'] = $datos->resuelve_problemas;
                            $dato['campo'] = 'resuelve_problemas';
                            echo view('componente4/select-campo-view', $dato); 
                            
                        }else{
                            $dato['valor'] = NULL;
                            $dato['campo'] = 'resuelve_problemas';
                            echo view('componente4/select-campo-view', $dato); 
                        }

                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="resuelve_operaciones_decimales">RESUELVE OPERACIONES MATEMÁTICAS BÁSICAS CON NÚMEROS DECIMALES:</label>
                    <?php

                        if ($datos != NULL) {
                            $dato['valor'] = $datos->resuelve_operaciones_decimales;
                            $dato['campo'] = 'resuelve_operaciones_decimales';
                            echo view('componente4/select-campo-view', $dato); 
                            
                        }else{
                            $dato['valor'] = NULL;
                            $dato['campo'] = 'resuelve_operaciones_decimales';
                            echo view('componente4/select-campo-view', $dato); 
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