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
        <h3 class="mt-4" id="titulo-nombre"><?= esc($title).' | Docentes MINEDUC Virtual'; ?></h3>
        <h4 class="mt-4" id="titulo-nombre"><?= 'NOMBRE: '.$est->apellidos.' '.$est->nombres ; ?></h4>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="mt-3"><?= esc ('RESULTADO'); ?></h5>
                <form action="<?php echo base_url().'/nap6-process-update';?>" method="post">
                    <?= session()->getFlashdata('error'); ?>
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="edu_regular">SE ENCUENTRA ENCADENADO A EDUCACIÓN REGULAR:</label>
                            <?php

                                if ($datos != NULL) {
                                    $dato['valor'] = $datos->edu_regular;
                                    $dato['campo'] = 'edu_regular';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                    
                                }else{
                                    $dato['valor'] = NULL;
                                    $dato['campo'] = 'edu_regular';
                                    echo view('componente2/nap3/select-campo-view', $dato); 
                                }

                                
                            ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="avance_curricular">NIVEL:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="nivel"
                            >
                            <?php

                                if ($datos != NULL) {

                                    foreach ($cursos as $key => $value) {
                                        if ($datos->nivel == $value->id) {
                                            echo '<option value="'.$value->id.'" selected>'.$value->curso.'</option>';
                                            
                                        }else{
                                            echo '<option value="'.$value->id.'">'.$value->curso.'</option>';
                                        }
                                        if ($value->id > 9) {
                                            break;
                                        }
                                    }
                                }else{
                                    echo '<option value="NULL" selected>-- Registrar dato --</option>';
                                    foreach ($cursos as $key => $value) {
                                        echo '<option value="'.$value->id.'">'.$value->curso.'</option>';

                                        if ($value->id > 9) {
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