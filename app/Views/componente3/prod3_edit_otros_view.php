<main class="container-md px-2 mb-4">
    <div class="container-fluid px-0">
        <h4 class="mt-4" id="titulo-nombre"><?= esc($title).' - '.$datos->nombre; ?></h4>
        <form action="<?php echo base_url().'/prod3-otros-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            
            <div class="card mb-4">
                <div class="card-body mb-3">
                    <h3 class="mt-3"><?= esc ('OTROS'); ?></h3>
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="grupo_interaprendizaje">Grupo Inter - aprendizaje:</label>
                            <div class="col-sm-2">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="grupo_interaprendizaje" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_otros != NULL) {
                                        if ($prod3_otros->grupo_interaprendizaje == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_otros->grupo_interaprendizaje == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_otros->grupo_interaprendizaje == NULL) {
                                            echo '<option value="NULL" selected>Registrar</option>
                                                    <option value="1">SI</option>
                                                    <option value="0">NO</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar</option>
                                                    <option value="1">SI</option>
                                                    <option value="0">NO</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                            </div>
                            <div class="col-sm-12">
                                <label for="tema_grupo_inter">Tema:</label>
                                <div class="col-sm-8 mb-3">
                                    <?php
                                        if (isset($prod3_otros->tema_grupo_inter) && $prod3_otros->tema_grupo_inter != null && $prod3_otros->tema_grupo_inter != '') {
                                            echo '<input type="text" id="tema_grupo_inter" name="tema_grupo_inter" value="'.$prod3_otros->tema_grupo_inter.'" class="form-control" placeholder="" aria-label="tema_grupo_inter">';
                                        }else{
                                            echo '<input type="text" id="tema_grupo_inter" name="tema_grupo_inter" value="" class="form-control" placeholder="" aria-label="tema_grupo_inter">';
                                        }
                                    ?>
                                
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="fecha_grupo_inter">Fecha del Grupo Inter - aprendizaje:</label>
                                    <?php
                                        if (isset($prod3_otros->fecha_grupo_inter) && $prod3_otros->fecha_grupo_inter != null && $prod3_otros->fecha_grupo_inter != '') {
                                            echo '<input type="date" id="fecha_grupo_inter" name="fecha_grupo_inter" value="'.$prod3_otros->fecha_grupo_inter.'" class="form-control" aria-label="fecha_grupo_inter">';
                                        }else{
                                            echo '<input type="date" id="fecha_grupo_inter" name="fecha_grupo_inter" value=""  class="form-control" aria-label="fecha_grupo_inter">';
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body mb-3">
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="tema_1">Otros temas:</label>
                            <table class="table tabble-responsive">
                                <tr>
                                    <thead>
                                        <th></th>
                                        <th></th>
                                        <th>Fecha</th>
                                    </thead>
                                    <td><label for="tema_1">Tema 1:</label></td>
                                    <td>
                                        <?php
                                            if (isset($prod3_otros->tema_1) && $prod3_otros->tema_1 != null && $prod3_otros->tema_1 != '') {
                                                echo '<input type="text" id="tema_1" name="tema_1" value="'.$prod3_otros->tema_1.'" class="form-control" placeholder="" aria-label="tema_1">';
                                            }else{
                                                echo '<input type="text" id="tema_1" name="tema_1" value="" class="form-control" placeholder="" aria-label="tema_1">';
                                                
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if (isset($prod3_otros->fecha_tema_1) && $prod3_otros->fecha_tema_1 != null && $prod3_otros->fecha_tema_1 != '') {
                                                echo '<input type="date" id="fecha_tema_1" name="fecha_tema_1" value="'.$prod3_otros->fecha_tema_1.'" class="form-control" aria-label="fecha_tema_1">';
                                            }else{
                                                echo '<input type="date" id="fecha_tema_1" name="fecha_tema_1" value=""  class="form-control" aria-label="fecha_tema_1">';
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="tema_2">Tema 2:</label></td>
                                    <td>
                                        <?php
                                            if (isset($prod3_otros->tema_2) && $prod3_otros->tema_2 != null && $prod3_otros->tema_2 != '') {
                                                echo '<input type="text" id="tema_2" name="tema_2" value="'.$prod3_otros->tema_2.'" class="form-control" placeholder="" aria-label="tema_2">';
                                            }else{
                                                echo '<input type="text" id="tema_2" name="tema_2" value="" class="form-control" placeholder="" aria-label="tema_2">';
                                                
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if (isset($prod3_otros->fecha_tema_2) && $prod3_otros->fecha_tema_2 != null && $prod3_otros->fecha_tema_2 != '') {
                                                echo '<input type="date" id="fecha_tema_2" name="fecha_tema_2" value="'.$prod3_otros->fecha_tema_2.'" class="form-control" aria-label="fecha_tema_2">';
                                            }else{
                                                echo '<input type="date" id="fecha_tema_2" name="fecha_tema_2" value=""  class="form-control" aria-label="fecha_tema_2">';
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="tema_3">Tema 3:</label></td>
                                    <td>
                                        <?php
                                            if (isset($prod3_otros->tema_3) && $prod3_otros->tema_3 != null && $prod3_otros->tema_3 != '') {
                                                echo '<input type="text" id="tema_3" name="tema_3" value="'.$prod3_otros->tema_3.'" class="form-control" placeholder="" aria-label="tema_3">';
                                            }else{
                                                echo '<input type="text" id="tema_3" name="tema_3" value="" class="form-control" placeholder="" aria-label="tema_3">';
                                                
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if (isset($prod3_otros->fecha_tema_3) && $prod3_otros->fecha_tema_3 != null && $prod3_otros->fecha_tema_3 != '') {
                                                echo '<input type="date" id="fecha_tema_3" name="fecha_tema_3" value="'.$prod3_otros->fecha_tema_3.'" class="form-control" aria-label="fecha_tema_3">';
                                            }else{
                                                echo '<input type="date" id="fecha_tema_3" name="fecha_tema_3" value=""  class="form-control" aria-label="fecha_tema_3">';
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="tema_4">Tema 4:</label></td>
                                    <td>
                                        <?php
                                            if (isset($prod3_otros->tema_4) && $prod3_otros->tema_4 != null && $prod3_otros->tema_4 != '') {
                                                echo '<input type="text" id="tema_4" name="tema_4" value="'.$prod3_otros->tema_4.'" class="form-control" placeholder="" aria-label="tema_4">';
                                            }else{
                                                echo '<input type="text" id="tema_4" name="tema_4" value="" class="form-control" placeholder="" aria-label="tema_4">';
                                                
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if (isset($prod3_otros->fecha_tema_4) && $prod3_otros->fecha_tema_4 != null && $prod3_otros->fecha_tema_4 != '') {
                                                echo '<input type="date" id="fecha_tema_4" name="fecha_tema_4" value="'.$prod3_otros->fecha_tema_4.'" class="form-control" aria-label="fecha_tema_4">';
                                            }else{
                                                echo '<input type="date" id="fecha_tema_4" name="fecha_tema_4" value=""  class="form-control" aria-label="fecha_tema_4">';
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="tema_5">Tema 5:</label></td>
                                    <td>
                                        <?php
                                            if (isset($prod3_otros->tema_5) && $prod3_otros->tema_5 != null && $prod3_otros->tema_5 != '') {
                                                echo '<input type="text" id="tema_5" name="tema_5" value="'.$prod3_otros->tema_5.'" class="form-control" placeholder="" aria-label="tema_5">';
                                            }else{
                                                echo '<input type="text" id="tema_5" name="tema_5" value="" class="form-control" placeholder="" aria-label="tema_5">';
                                                
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if (isset($prod3_otros->fecha_tema_5) && $prod3_otros->fecha_tema_5 != null && $prod3_otros->fecha_tema_5 != '') {
                                                echo '<input type="date" id="fecha_tema_5" name="fecha_tema_5" value="'.$prod3_otros->fecha_tema_5.'" class="form-control" aria-label="fecha_tema_5">';
                                            }else{
                                                echo '<input type="date" id="fecha_tema_5" name="fecha_tema_5" value=""  class="form-control" aria-label="fecha_tema_5">';
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="tema_6">Tema 6:</label></td>
                                    <td>
                                        <?php
                                            if (isset($prod3_otros->tema_6) && $prod3_otros->tema_6 != null && $prod3_otros->tema_6 != '') {
                                                echo '<input type="text" id="tema_6" name="tema_6" value="'.$prod3_otros->tema_6.'" class="form-control" placeholder="" aria-label="tema_6">';
                                            }else{
                                                echo '<input type="text" id="tema_6" name="tema_6" value="" class="form-control" placeholder="" aria-label="tema_6">';
                                                
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if (isset($prod3_otros->fecha_tema_6) && $prod3_otros->fecha_tema_6 != null && $prod3_otros->fecha_tema_6 != '') {
                                                echo '<input type="date" id="fecha_tema_6" name="fecha_tema_6" value="'.$prod3_otros->fecha_tema_6.'" class="form-control" aria-label="fecha_tema_6">';
                                            }else{
                                                echo '<input type="date" id="fecha_tema_6" name="fecha_tema_6" value=""  class="form-control" aria-label="fecha_tema_6">';
                                            }
                                        ?>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>

                <div class="card-body mb-3">   
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="visita_biblioteca_viajera">Visita a la Biblioteca Viajera:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="visita_biblioteca_viajera" 
                                    id=""  
                                >
                                <?php
                                    if ($prod3_otros != NULL) {
                                        if ($prod3_otros->visita_biblioteca_viajera == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($prod3_otros->visita_biblioteca_viajera == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($prod3_otros->visita_biblioteca_viajera == NULL) {
                                            echo '<option value="NULL" selected>Registrar</option>
                                                    <option value="1">SI</option>
                                                    <option value="0">NO</option>';
                                        }
                                    }else{
                                        echo '<option value="NULL" selected>Registrar</option>
                                                    <option value="1">SI</option>
                                                    <option value="0">NO</option>';
                                    }
                                    
                                ?>
                                </select>
                                <p id="error-message"><?= session('errors.visita_biblioteca_viajera');?> </p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="fecha_visita_biblioteca_viajera">Fecha de la visita a la Biblioteca Viajera:</label>
                            <div class="col-sm-8">
                                <?php
                                    if (isset($prod3_otros->fecha_visita_biblioteca_viajera) && $prod3_otros->fecha_visita_biblioteca_viajera != null && $prod3_otros->fecha_visita_biblioteca_viajera != '') {
                                        echo '<input type="date" id="fecha_visita_biblioteca_viajera" name="fecha_visita_biblioteca_viajera" value="'.$prod3_otros->fecha_visita_biblioteca_viajera.'" class="form-control" aria-label="fecha_visita_biblioteca_viajera">';
                                    }else{
                                        echo '<input type="date" id="fecha_visita_biblioteca_viajera" name="fecha_visita_biblioteca_viajera" value=""  class="form-control" aria-label="fecha_visita_biblioteca_viajera">';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?= form_hidden('id_prod_3', $id);  ?>
            <button type="submit" class="btn btn-info mb-3">Actualizar</button>
        </form>
        <button onclick="history.back()" class="btn btn-success mb-3">Regresar</button>
        <a class="btn btn-success mb-3" href="<?php echo site_url().'prod_3_process'; ?>">Ir al menú del Componente 3</a>
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