<main class="container-md px-2 mb-2">
    <div class="container-fluid px-0">
        
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <form action="<?php echo base_url().'/prod3-biblioteca-update';?>" method="post" enctype="multipart/form-data">

            <div class="card mb-4 mt-5">
                <div class="card-body">
                    <h3 class="mt-3"><?= esc ('Datos'); ?></h3>
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="grupo_interaprendizaje">Centro educativo:</label>
                            <?php
                                if (isset($centro) && $centro != null && $centro != '') {
                                    echo '<input type="text" id="amie" name="amie" value="'.$centro->amie.' - '.$centro->nombre.'" class="form-control" aria-label="amie"  disabled>';
                                }else{
                                    echo '<input type="text" id="amie" name="amie" value=""  class="form-control" aria-label="amie">';
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body" id="datos">   
                <div class="row">
                    <div class="col-sm-12">
                        <label for="biblioteca_viajera_num">Entrega Biblioteca viajera</label>
                        
                        <div class="col-sm-2 mb-3">
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="entrega_biblioteca_viajera" 
                                id="entrega_biblioteca_viajera"  
                            >
                                <?php
                                    if ($datos != NULL) {
                                        if ($datos->entrega_biblioteca_viajera == '1') {
                                            echo '<option value="1" selected>SI</option>
                                                    <option value="0">NO</option>';
                                        }elseif ($datos->entrega_biblioteca_viajera == '0') {
                                            echo '<option value="1">SI</option>
                                                    <option value="0" selected>NO</option>';
                                        }elseif ($datos->entrega_biblioteca_viajera == NULL) {
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
                        
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="encuentro_intercultural">Encuentro intercultural:</label>
                        <div class="col-sm-8">
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="encuentro_intercultural" 
                                id=""  
                            >
                            
                            <?php
                                if ($datos != NULL) {
                                    if ($datos->encuentro_intercultural == '1') {
                                        echo '<option value="1" selected>SI</option>
                                                <option value="0">NO</option>';
                                    }elseif ($datos->encuentro_intercultural == '0') {
                                        echo '<option value="1">SI</option>
                                                <option value="0" selected>NO</option>';
                                    }elseif ($datos->encuentro_intercultural == NULL) {
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
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="fecha_encuentro">Fecha del encuentro:</label>
                        <div class="col-sm-8">
                            <?php
                                if (isset($datos->fecha_encuentro) && $datos->fecha_encuentro != null && $datos->fecha_encuentro != '') {
                                    echo '<input type="date" id="fecha_encuentro" name="fecha_encuentro" value="'.$datos->fecha_encuentro.'" class="form-control" aria-label="fecha_encuentro">';
                                }else{
                                    echo '<input type="date" id="fecha_encuentro" name="fecha_encuentro" value=""  class="form-control" aria-label="fecha_encuentro">';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="card-body mt-2 mb-3">   
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="expo_trabajos">Actividades:</label>
                        <div class="form-check">
                            <?php      
                                
                                if (isset($datos->expo_trabajos) && $datos->expo_trabajos != null && $datos->expo_trabajos != '' && $datos->expo_trabajos == 1) {
                                    echo '<input class="form-check-input" type="checkbox" value="1" name="expo_trabajos" id="expo_trabajos_chk" checked>';
                                }else{
                                    echo '<input class="form-check-input" type="checkbox" value="1" id="expo_trabajos_chk" name="expo_trabajos">';
                                }
                            ?>
                            <label class="form-check-label" for="flexCheckDefault">
                                1. Exposición de trabajos
                            </label>
                                <?= csrf_field(); ?>
                                <div class="container mb-3" style="margin-top:20px;">
                                    <div class="col-sm-4 mb-3">
                                        <h5> </h5>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label>Subir evidencia de Exposición de trabajos</label>
                                        <?php
                                            
                                            if (isset($datos->expo_trabajos_evidencia) && $datos->expo_trabajos_evidencia != null && $datos->expo_trabajos_evidencia != '') {
                                                echo '<input class="form-control form-control-sm" type="file" name="expo_trabajos_evidencia" id="expo_trabajos_evidencia_file">';
                                                echo '<div class="col-sm-5 mb-3 mt-1"><a href="'.site_url().'public/images/evidencias/'.$centro->amie.'/'.$datos->expo_trabajos_evidencia.'" target="_blank">Evidencia de Exposición de trabajos';
                                                echo '<img class="img-thumbnail" src="'.site_url().'public/images/evidencias/'.$centro->amie.'/'.$datos->expo_trabajos_evidencia.'" alt="Evidencia de Exposición de trabajos" width="100" download="true"></a></div>';
                                            }else{
                                                echo '<input class="form-control form-control-sm" type="file" name="expo_trabajos_evidencia" id="expo_trabajos_evidencia_file" value="Subir imagen">';
                                            }
                                        ?>
                                    </div>
                                    <p id="error-message"><?= session('errors.cargar_info');?></p>
                                </div>
                        </div>
                        <div class="form-check">
                            <?php          
                                if (isset($datos->exp_oral) && $datos->exp_oral != null && $datos->exp_oral != '') {
                                    echo '<input class="form-check-input" type="checkbox" value="1" id="exp_oral_chk" name="exp_oral" checked>';
                                }else{
                                    echo '<input class="form-check-input" type="checkbox" value="1" id="exp_oral_chk" name="exp_oral">';
                                }
                            ?>
                            <label class="form-check-label" for="flexCheckDefault">
                                2. Expresión oral
                            </label>
                                <?= csrf_field(); ?>
                                <div class="container mb-3" style="margin-top:20px;">
                                    <div class="col-sm-12 mb-3">
                                        <h5> </h5>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label>Subir evidencia de Expresión oral</label>
                                        <?php
                                            
                                            if (isset($datos->exp_oral_evidencia) && $datos->exp_oral_evidencia != null && $datos->exp_oral_evidencia != '') {
                                                echo '<input class="form-control form-control-sm" type="file" name="exp_oral_evidencia" id="exp_oral_evidencia_file" >';
                                                echo '<div class="col-sm-5 mb-3 mt-1"><a href="'.site_url().'public/images/evidencias/'.$centro->amie.'/'.$datos->exp_oral_evidencia.'" target="_blank">Evidencia de Expresión oral ';
                                                echo '<img class="img-thumbnail" src="'.site_url().'public/images/evidencias/'.$centro->amie.'/'.$datos->exp_oral_evidencia.'" alt="Evidencia de Exposición de trabajos" width="100" download="true"></a></div>';
                                            }else{
                                                echo '<input class="form-control form-control-sm" type="file" name="exp_oral_evidencia" id="exp_oral_evidencia_file" value="Subir imagen">';
                                            }
                                        ?>
                                    </div>
                                    <p id="error-message"><?= session('errors.cargar_info');?> </p>
                            </div>
                        </div>
                        <div class="form-check">
                            <?php          
                                if (isset($datos->exp_escr_grafica) && $datos->exp_escr_grafica != null && $datos->exp_escr_grafica != '') {
                                    echo '<input class="form-check-input" type="checkbox" value="1" id="exp_escr_grafica_chk" name="exp_escr_grafica" checked>';
                                }else{
                                    echo '<input class="form-check-input" type="checkbox" value="1" id="exp_escr_grafica_chk" name="exp_escr_grafica">';
                                }
                            ?>
                            <label class="form-check-label" for="exp_escr_grafica_chk">
                                3. Expresión escrita y gráfica
                            </label>
                                <?= csrf_field(); ?>
                                <div class="container mb-3" style="margin-top:20px;">
                                    <div class="col-sm-12 mb-3">
                                        <h5> </h5>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label>Subir evidencia de Expresión escrita y gráfica</label>
                                        <?php
                                            
                                            if (isset($datos->exp_escr_grafica_evidencia) && $datos->exp_escr_grafica_evidencia != null && $datos->exp_escr_grafica_evidencia != '') {
                                                echo '<input class="form-control form-control-sm" type="file" name="exp_escr_grafica_evidencia" id="exp_escr_grafica_evidencia_file" >';
                                                echo '<div class="col-sm-5 mb-3 mt-1"><a href="'.site_url().'public/images/evidencias/'.$centro->amie.'/'.$datos->exp_escr_grafica_evidencia.'" target="_blank">Evidencia de Expresión escrita y gráfica ';
                                                echo '<img class="img-thumbnail" src="'.site_url().'public/images/evidencias/'.$centro->amie.'/'.$datos->exp_escr_grafica_evidencia.'" alt="Evidencia de Exposición de trabajos" width="100" download="true"></a></div>';
                                            }else{
                                                echo '<input class="form-control form-control-sm" type="file" name="exp_escr_grafica_evidencia" id="exp_escr_grafica_evidencia_file" value="Subir imagen">';
                                            }
                                        ?>
                                    </div>
                                    <p id="error-message"><?= session('errors.cargar_info');?> </p>
                                </div>
                        </div>
                        <div class="form-check">
                            <?php          
                                if (isset($datos->part_docentes) && $datos->part_docentes != null && $datos->part_docentes != '') {
                                    echo '<input class="form-check-input" type="checkbox" value="1" id="part_docentes_chk" name="part_docentes" checked>';
                                }else{
                                    echo '<input class="form-check-input" type="checkbox" value="1" id="part_docentes_chk" name="part_docentes">';
                                }
                            ?>
                            <label class="form-check-label" for="part_docentes_chk">
                                4. Participación de docentes
                            </label>
                                <?= csrf_field(); ?>
                                <div class="container mb-3" style="margin-top:20px;">
                                    <div class="col-sm-12 mb-3">
                                        <h5> </h5>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label>Subir evidencia de Participación de docentes</label>
                                        <?php
                                            
                                            if (isset($datos->part_docentes_evidencia) && $datos->part_docentes_evidencia != null && $datos->part_docentes_evidencia != '') {
                                                echo '<input class="form-control form-control-sm" type="file" name="part_docentes_evidencia" id="part_docentes_evidencia_file" >';
                                                echo '<div class="col-sm-5 mb-3 mt-1"><a href="'.site_url().'public/images/evidencias/'.$centro->amie.'/'.$datos->part_docentes_evidencia.'" target="_blank">Evidencia de Participación de docentes ';
                                                echo '<img class="img-thumbnail" src="'.site_url().'public/images/evidencias/'.$centro->amie.'/'.$datos->part_docentes_evidencia.'" alt="Evidencia de Exposición de trabajos" width="100" download="true"></a></div>';
                                            }else{
                                                echo '<input class="form-control form-control-sm" type="file" name="part_docentes_evidencia" id="part_docentes_evidencia_file" value="Subir imagen">';
                                            }
                                        ?>
                                    </div>
                                    <p id="error-message"><?= session('errors.cargar_info');?> </p>
                                </div>
                        </div>
                        <div class="form-check">
                            <?php          
                                if (isset($datos->part_padres) && $datos->part_padres != null && $datos->part_padres != '') {
                                    echo '<input class="form-check-input" type="checkbox" value="1" id="part_padres_chk" name="part_padres" checked>';
                                }else{
                                    echo '<input class="form-check-input" type="checkbox" value="1" id="part_padres_chk" name="part_padres">';
                                }
                            ?>
                            <label class="form-check-label" for="part_padres_chk">
                                4. Participación de padres y madres de familia
                            </label>
                                <?= csrf_field(); ?>
                                <div class="container mb-3" style="margin-top:20px;">
                                    <div class="col-sm-12 mb-3">
                                        <h5> </h5>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label>Subir evidencia de Participación de padres y madres de familia</label>
                                        <?php
                                            
                                            if (isset($datos->part_padres_evidencia) && $datos->part_padres_evidencia != null && $datos->part_padres_evidencia != '') {echo 274;
                                                echo '<input class="form-control form-control-sm" type="file" name="part_padres_evidencia" id="part_padres_evidencia_file" >';
                                                echo '<div class="col-sm-5 mb-3 mt-1"><a href="'.site_url().'public/images/evidencias/'.$centro->amie.'/'.$datos->part_padres_evidencia.'" target="_blank">Evidencia de Participación de padres y madres de familia ';
                                                echo '<img class="img-thumbnail" src="'.site_url().'public/images/evidencias/'.$centro->amie.'/'.$datos->part_padres_evidencia.'" alt="Particiapación de Padres de familia" width="100" download="true"></a></div>';
                                            }else{echo 278;
                                                echo '<input class="form-control form-control-sm" type="file" name="part_padres_evidencia" id="part_padres_evidencia_file" value="Subir imagen">';
                                            }
                                        ?>
                                    </div>
                                    <p id="error-message"><?= session('errors.cargar_info');?> </p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= form_hidden('amie', $centro->amie);  ?>
            <button type="submit" class="btn btn-info mb-3">Actualizar</button>
        </form>
        <button onclick="history.back()" class="btn btn-success mb-3">Regresar</button>
        <a class="btn btn-success mb-3" href="<?php echo site_url().'prod-3-otros-procesos'; ?>">Ir al menú</a>
    </div>
    
</main>
<script>

    $(document).ready(function(){
        $("#expo_trabajos_evidencia_file").change(function(){
            if($("#expo_trabajos_evidencia_file").val() !=""){
                valor = $("#expo_trabajos_evidencia_file").val();
                if (valor != '') {

                    $("#expo_trabajos_chk").prop('checked', true);
                }else{
                    //$("#expo_trabajos_chk").prop('checked', false);
                }
                
            }else{
                valor = $("#expo_trabajos_evidencia_file").val();
            }
        })
    })

    $(document).ready(function(){
        $("#exp_oral_evidencia_file").change(function(){
            if($("#exp_oral_evidencia_file").val() !=""){
                valor = $("#exp_oral_evidencia_file").val();
                if (valor != '') {

                    $("#exp_oral_chk").prop('checked', true);
                }else{
                    //$("#expo_trabajos_chk").prop('checked', false);
                }
                
            }else{
                valor = $("#exp_oral_evidencia_file").val();
            }
        })
    })

    $(document).ready(function(){
        $("#exp_escr_grafica_evidencia_file").change(function(){
            if($("#exp_escr_grafica_evidencia_file").val() !=""){
                valor = $("#exp_escr_grafica_evidencia_file").val();
                if (valor != '') {

                    $("#exp_escr_grafica_chk").prop('checked', true);
                }else{
                    //$("#expo_trabajos_chk").prop('checked', false);
                }
                
            }else{
                valor = $("#exp_escr_grafica_evidencia_file").val();
            }
        })
    })

    $(document).ready(function(){
        $("#part_docentes_evidencia_file").change(function(){
            if($("#part_docentes_evidencia_file").val() !=""){
                valor = $("#part_docentes_evidencia_file").val();
                if (valor != '') {

                    $("#part_docentes_chk").prop('checked', true);
                }else{
                    //$("#expo_trabajos_chk").prop('checked', false);
                }
                
            }else{
                valor = $("#part_docentes_evidencia_file").val();
            }
        })
    })

    $(document).ready(function(){
        $("#part_padres_evidencia_file").change(function(){
            if($("#part_padres_evidencia_file").val() !=""){
                valor = $("#part_padres_evidencia_file").val();
                if (valor != '') {

                    $("#part_padres_chk").prop('checked', true);
                }else{
                    //$("#expo_trabajos_chk").prop('checked', false);
                }
                
            }else{
                valor = $("#part_padres_evidencia_file").val();
            }
        })
    })

    $(document).ready(function(){
        $("#centro_educativo").change(function(){
            if($("#centro_educativo").val() !=""){
                valor = $("#centro_educativo").val();console.log(valor);
                $.ajax({
                    type:"POST",
                    dataType:"html",
                    url: "<?php echo site_url(); ?>prod3/getDatosBiblioteca",
                    data:"amie="+valor,
                    beforeSend: function (f) {
                        $('#datos').html('Cargando ...');
                    },
                    success: function(data){
                        $('#datos').html(data);
                    }
                });
            }
        })
    })

</script>