<main class="container-sm px-2 mb-5">
    <div class="container-fluid px-0">
        <h4 class="mt-4" id="titulo-nombre"><?= esc($title).' - Diagnóstico de lengua: '.$est->nombres; ?></h4>
        <form action="<?php echo base_url().'/prod4-lengua-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="conoce_letras">RECONOCE E IDENTIFICA LAS LETRAS:</label>
                    <?php

                        if ($datos != NULL) {
                            $dato['valor'] = $datos->conoce_letras;
                            $dato['campo'] = 'conoce_letras';
                            echo view('componente4/select-campo-view', $dato); 
                            
                        }else{
                            $dato['valor'] = NULL;
                            $dato['campo'] = 'conoce_letras';
                            echo view('componente4/select-campo-view', $dato); 
                        }

                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="escribe_textos">ESCRIBE TEXTOS LITERARIOS:</label>
                    <?php
                            if ($datos != NULL) {
                                $dato['valor'] = $datos->escribe_textos;
                                $dato['campo'] = 'escribe_textos';
                                echo view('componente4/select-campo-view', $dato); 
                                
                            }else{
                                $dato['valor'] = NULL;
                                $dato['campo'] = 'escribe_textos';
                                echo view('componente4/select-campo-view', $dato); 
                            }
                        ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="compreende_lee">COMPRENDE LO QUE LEE:</label>
                    <?php

                        if ($datos != NULL) {
                            $dato['valor'] = $datos->compreende_lee;
                            $dato['campo'] = 'compreende_lee';
                            echo view('componente4/select-campo-view', $dato); 
                            
                        }else{
                            $dato['valor'] = NULL;
                            $dato['campo'] = 'compreende_lee';
                            echo view('componente4/select-campo-view', $dato); 
                        }

                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="uso_formal_escritura">HACE USO CORRECTO DE LOS ASPECTOS FORMALES DE LA ESCRITURA:</label>
                    <?php
                            if ($datos != NULL) {
                                $dato['valor'] = $datos->uso_formal_escritura;
                                $dato['campo'] = 'uso_formal_escritura';
                                echo view('componente4/select-campo-view', $dato); 
                                
                            }else{
                                $dato['valor'] = NULL;
                                $dato['campo'] = 'uso_formal_escritura';
                                echo view('componente4/select-campo-view', $dato); 
                            }
                        ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="expresa_ideas">EXPRESA IDEAS, OPINIONES Y EMOCIONES MEDIANTE LA ESCRITURA:</label>
                    <?php

                        if ($datos != NULL) {
                            $dato['valor'] = $datos->expresa_ideas;
                            $dato['campo'] = 'expresa_ideas';
                            echo view('componente4/select-campo-view', $dato); 
                            
                        }else{
                            $dato['valor'] = NULL;
                            $dato['campo'] = 'expresa_ideas';
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