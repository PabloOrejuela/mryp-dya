<style>
    .form-control, .form-select{
        font-size: 0.8em;
    }
</style>
<main class="container-sm px-2 mb-5">
    <div class="container-fluid px-0">
        <h4 class="mt-4"><?= esc($title); ?></h4>
        <form action="<?php echo base_url().'/prod2-nap2-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="nombres">Nombres:</label>
                    <input type="text" id="nombres" name="nombres" value="<?= $datos->nombres; ?>" class="form-control" placeholder="Nombres" aria-label="nombres">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nacionalidad">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" value="<?= $datos->apellidos; ?>" class="form-control" placeholder="Apellidos" aria-label="apellidos">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="documento">Documento:</label>
                    <input type="text" id="documento" name="documento" value="<?= $datos->documento; ?>" class="form-control" placeholder="Documento" aria-label="documento">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nacionalidad">Nacionalidad:</label>
                    <select name="nacionalidad" class="form-control" id="nacionalidad" aria-label="nacionalidad">
                        <?php
                            if ($datos->nacionalidad == "ECUATORIANA") {
                                echo '<option value="ECUATORIANA" selected>ECUATORIANA</option>
                                        <option value="VENEZOLANA">VENEZOLANA</option>
                                        <option value="COLOMBIANA">COLOMBIANA</option>
                                        <option value="PERUANA">PERUANA</option>
                                        <option value="OTROS">OTROS</option>
                                ';
                            }elseif ($datos->nacionalidad == "VENEZOLANA") {
                                echo '<option value="ECUATORIANA">ECUATORIANA</option>
                                        <option value="VENEZOLANA" selected>VENEZOLANA</option>
                                        <option value="COLOMBIANA">COLOMBIANA</option>
                                        <option value="PERUANA">PERUANA</option>
                                        <option value="OTROS">OTROS</option>
                                ';
                            }elseif ($datos->nacionalidad == "COLOMBIANA") {
                                echo '<option value="ECUATORIANA">ECUATORIANA</option>
                                        <option value="VENEZOLANA">VENEZOLANA</option>
                                        <option value="COLOMBIANA" selected>COLOMBIANA</option>
                                        <option value="PERUANA">PERUANA</option>
                                        <option value="OTROS">OTROS</option>
                                ';
                            }elseif ($datos->nacionalidad == "PERUANA") {
                                echo '<option value="ECUATORIANA">ECUATORIANA</option>
                                        <option value="VENEZOLANA">VENEZOLANA</option>
                                        <option value="COLOMBIANA">COLOMBIANA</option>
                                        <option value="PERUANA" selected>PERUANA</option>
                                        <option value="OTROS">OTROS</option>
                                ';
                            }else {
                                echo '<option value="ECUATORIANA">ECUATORIANA</option>
                                        <option value="VENEZOLANA">VENEZOLANA</option>
                                        <option value="COLOMBIANA">COLOMBIANA</option>
                                        <option value="PERUANA">PERUANA</option>
                                        <option value="OTROS" selected>OTROS</option>
                                ';
                            }
                        ?>
                        
                        
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="etnia">Etnia:</label>
                    <select name="etnia" class="form-control" id="etnia" aria-label="etnia">
                        <?php
                            if ($datos->etnia == "MESTIZA") {
                                echo '<option value="MESTIZA" selected>MESTIZA</option>
                                        <option value="INDIGENA">INDIGENA</option>
                                        <option value="AFRODECENDIENTE">AFRODECENDIENTE</option>
                                        <option value="AFROECUATORIANA">AFROECUATORIANA</option>
                                        <option value="AFROVENEZOLANA">AFROVENEZOLANA</option>
                                        <option value="BLANCA">BLANCA</option>
                                        <option value="OTROS">OTROS</option>
                                ';
                            }elseif ($datos->etnia == "INDIGENA") {
                                echo '<option value="MESTIZA">MESTIZA</option>
                                        <option value="INDIGENA" selected>INDIGENA</option>
                                        <option value="AFRODECENDIENTE">AFRODECENDIENTE</option>
                                        <option value="AFROECUATORIANA">AFROECUATORIANA</option>
                                        <option value="AFROVENEZOLANA">AFROVENEZOLANA</option>
                                        <option value="BLANCA">BLANCA</option>
                                        <option value="OTROS">OTROS</option>
                                ';
                            }elseif ($datos->etnia == "AFRODECENDIENTE") {
                                echo '<option value="MESTIZA">MESTIZA</option>
                                        <option value="INDIGENA">INDIGENA</option>
                                        <option value="AFRODECENDIENTE" selected>AFRODECENDIENTE</option>
                                        <option value="AFROECUATORIANA">AFROECUATORIANA</option>
                                        <option value="AFROVENEZOLANA">AFROVENEZOLANA</option>
                                        <option value="BLANCA">BLANCA</option>
                                        <option value="OTROS">OTROS</option>    
                                ';
                            }elseif ($datos->etnia == "AFROECUATORIANA") {
                                echo '<option value="ECUATORIANA">ECUATORIANA</option>
                                        <option value="INDIGENA">INDIGENA</option>
                                        <option value="AFRODECENDIENTE">AFRODECENDIENTE</option>
                                        <option value="AFROECUATORIANA" selected>AFROECUATORIANA</option>
                                        <option value="AFROVENEZOLANA">AFROVENEZOLANA</option>
                                        <option value="BLANCA">BLANCA</option>
                                        <option value="OTROS">OTROS</option>    
                                ';
                                
                            }elseif ($datos->etnia == "AFROVENEZOLANA") {
                                echo '<option value="ECUATORIANA">ECUATORIANA</option>
                                        <option value="INDIGENA">INDIGENA</option>
                                        <option value="AFRODECENDIENTE">AFRODECENDIENTE</option>
                                        <option value="AFROECUATORIANA">AFROECUATORIANA</option>
                                        <option value="AFROVENEZOLANA" selected>AFROVENEZOLANA</option>
                                        <option value="BLANCA">BLANCA</option>
                                        <option value="OTROS">OTROS</option>    
                                ';
                                
                            }elseif ($datos->etnia == "BLANCA") {
                                echo '<option value="ECUATORIANA">ECUATORIANA</option>
                                        <option value="INDIGENA">INDIGENA</option>
                                        <option value="AFRODECENDIENTE">AFRODECENDIENTE</option>
                                        <option value="AFROECUATORIANA">AFROECUATORIANA</option>
                                        <option value="AFROVENEZOLANA">AFROVENEZOLANA</option>
                                        <option value="BLANCA" selected>BLANCA</option>
                                        <option value="OTROS">OTROS</option>    
                                ';
                                
                            }else {
                                echo '<option value="ECUATORIANA">ECUATORIANA</option>
                                        <option value="INDIGENA">INDIGENA</option>
                                        <option value="AFRODECENDIENTE">AFRODECENDIENTE</option>
                                        <option value="AFROECUATORIANA">AFROECUATORIANA</option>
                                        <option value="AFROVENEZOLANA">AFROVENEZOLANA</option>
                                        <option value="BLANCA">BLANCA</option>
                                        <option value="OTRA" selected>OTROS</option>    
                                ';
                            }
                        ?>
                        
                        
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="genero">Fecha de nacimiento:</label>
                    <input type="date" id="fecha_nac" name="fecha_nac" value="<?= date('Y-m-d', strtotime($datos->fecha_nac)); ?>" class="form-control" placeholder="fecha_nac" aria-label="fecha_nac">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="edad">Edad:</label>
                    <input type="number" id="edad" name="edad" value="<?= $datos->edad; ?>" class="form-control" placeholder="Edad" aria-label="edad">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="genero">Género:</label>
                    <input type="text" id="genero" name="genero" value="<?= $datos->genero; ?>" class="form-control" placeholder="Género" aria-label="genero">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="discapacidad">Discapacidad:</label>
                    <input type="text" id="discapacidad" name="discapacidad" value="<?= $datos->discapacidad; ?>" class="form-control" placeholder="Discapacidad" aria-label="discapacidad">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="tipo_discapacidad">Tipo de discapacidad:</label>
                    <input type="text" id="tipo_discapacidad" name="tipo_discapacidad" value="<?= $datos->tipo_discapacidad; ?>" class="form-control" placeholder="tipo_discapacidad" aria-label="tipo_discapacidad">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="amie">Técnico:</label>
                    
                </div>
                <div class="col-md-4 mb-3">
                    <label for="amie">Centro educativo:</label>
                    
                    <select 
                        class="form-select" 
                        aria-label="Default select example" 
                        name="amie"
                        id="select_info"  
                        disabled
                    >
                    <?php
                        
                        if ($centros != NULL && isset($centros) ) {
                            foreach ($centros as $key => $ce) {
                                if ($ce->amie == $datos->amie) {
                                    echo '<option value="'.$ce->amie.'" selected>'.$ce->amie.' - '.$ce->nombre.'</option>';
                                }else{
                                    echo '<option value="'.$ce->amie.'">'.$ce->amie.' - '.$ce->nombre.'</option>';
                                }
                            }
                        }else{
                            echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                        }
                        
                    ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mt-3">
                    <h5>Datos del representante</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="representante">Representante:</label>
                    <input type="text" id="representante" name="representante" value="<?= $datos->representante; ?>" class="form-control" placeholder="Representante" aria-label="representante">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="documento_rep">Doc. Representante:</label>
                    <input type="text" id="documento_rep" name="documento_rep" value="<?= $datos->documento_rep; ?>" class="form-control" placeholder="Doc representante" aria-label="documento_rep">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="parentesto_rep">Parentesco:</label>
                    <input type="text" id="parentesto_rep" name="parentesto_rep" value="<?= $datos->parentesto_rep; ?>" class="form-control" placeholder="Parentesto" aria-label="parentesto_rep">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="nacionalidad_rep">Nacionalidad Representante:</label>
                    <input type="text" id="nacionalidad_rep" name="nacionalidad_rep" value="<?= $datos->nacionalidad_rep; ?>" class="form-control" placeholder="Nacionalidad" aria-label="nacionalidad_rep">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="direccion_rep">Dirección Representante::</label>
                    <input type="text" id="direccion_rep" name="direccion_rep" value="<?= $datos->direccion_rep; ?>" class="form-control" placeholder="Direccion" aria-label="direccion_rep">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="contacto_telf">Contacto Representante:</label>
                    <input type="text" id="contacto_telf" name="contacto_telf" value="<?= $datos->contacto_telf; ?>" class="form-control" placeholder="Teléfono" aria-label="contacto_telf">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="email">Email de contacto:</label>
                    <input type="text" id="email" name="email" value="<?= $datos->email; ?>" class="form-control" placeholder="Email" aria-label="email">
                </div>
            </div>
            <?= form_hidden('id', $datos->id);  ?>
            <button type="submit" class="btn btn-info mb-3">Actualizar</button>
        </form>
        <button onclick="history.back()" class="btn btn-success mb-3">Regresar</button>
    </div>
    
</main>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#table').DataTable({
                language: {
                    processing: 'Procesando...',
                    lengthMenu: 'Mostrando _MENU_ registros por página',
                    zeroRecords: 'No hay registros',
                    info: 'Mostrando _PAGE_ de _PAGES_',
                    infoEmpty: 'No hay registros disponibles',
                    infoFiltered: '(filtrando de _MAX_ total registros)',
                    search: 'Buscar',
                    paginate: {
                    first:      "Primero",
                    previous:   "Anterior",
                    next:       "Siguiente",
                    last:       "Último"
                        },
                        aria: {
                            sortAscending:  ": activar para ordenar ascendentemente",
                            sortDescending: ": activar para ordenar descendentemente"
                        }
                },
            });
        });
    </script>