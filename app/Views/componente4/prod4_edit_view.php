<main class="container-sm px-2 mb-5">
    <div class="container-fluid px-0">
        <h4 class="mt-4"><?= esc($title); ?></h4>
        <form action="<?php echo base_url().'/prod4_update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="card mb-4 col-md-12">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="nombres">Nombres:</label>
                            <input type="text" id="nombres" name="nombres" value="<?= $datos->nombres; ?>" class="form-control" placeholder="" aria-label="nombres">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="documento">Documento de identidad:</label>
                            <input type="text" id="documento" name="documento" value="<?= $datos->documento; ?>" class="form-control" placeholder="" aria-label="documento">
                        </div>
                    </div>
                    <div class="row">
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
                        <div class="col-md-4 mb-3">
                            <label for="genero">Género:</label>
                            <select name="genero" class="form-control" id="genero" aria-label="genero">
                                <?php
                                    if ($datos->genero == "MASCULINO") {
                                        echo '<option value="MASCULINO" selected>MASCULINO</option>
                                                <option value="FEMENINO">FEMENINO</option>
                                                <option value="OTRO">OTRO</option>
                                        ';
                                    }elseif ($datos->genero == "FEMENINO") {
                                        echo '<option value="MASCULINO">MASCULINO</option>
                                                <option value="FEMENINO" selected>FEMENINO</option>
                                                <option value="OTRO">OTRO</option>
                                        ';
                                    }elseif ($datos->genero == "OTRO") {
                                        echo '<option value="MASCULINO">MASCULINO</option>
                                                <option value="FEMENINO">FEMENINO</option>
                                                <option value="OTRO" selected>OTRO</option>
                                        ';
                                    }else {
                                        echo '<option value="MASCULINO">MASCULINO</option>
                                                <option value="FEMENINO">FEMENINO</option>
                                                <option value="OTRO" selected>OTRO</option>
                                                <option value="NULL" selected>Registrar dato</option>
                                        ';
                                    }
                                ?>
                            </select>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="cohorte">Cohorte:</label>
                            <select name="cohorte" class="form-control" id="cohorte" aria-label="cohorte">
                                <option value="NULL">--Seleccione una opción--</option>
                                <?php
                                    foreach ($cohortes as $key => $value) {
                                        if ($datos->cohorte == $value->id) {
                                            echo '<option value="'.$value->id.'" selected>'.$value->cohorte.'</option>';
                                        }else {
                                            echo '<option value="'.$value->id.'">'.$value->cohorte.'</option>';
                                        }
                                    }
                                    
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="fecha_nac">Fecha de nacimiento:</label>
                            <input type="date" id="fecha_nac" name="fecha_nac" value="<?= date('Y-m-d', strtotime($datos->fecha_nac)); ?>" class="form-control" placeholder="fecha_nac" aria-label="fecha_nac">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="edad">EDAD:</label>
                            <input type="text" id="edad" name="edad" value="<?= $datos->edad; ?>" class="form-control" placeholder="" aria-label="edad">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="discapacidad">Discapacidad:</label>
                            <input type="text" id="discapacidad" name="discapacidad" value="<?= $datos->discapacidad; ?>" class="form-control" placeholder="" aria-label="discapacidad">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="tipo_discapacidad">Tipo de discapacidad:</label>
                            <input type="text" id="tipo_discapacidad" name="tipo_discapacidad" value="<?= $datos->tipo_discapacidad; ?>" class="form-control" placeholder="" aria-label="tipo_discapacidad">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="barrio">Barrio:</label>
                            <input type="text" id="barrio" name="barrio" value="<?= $datos->barrio; ?>" class="form-control" placeholder="barrio" aria-label="barrio">
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="contacto_telf">Contacto telefónico:</label>
                            <input type="text" id="contacto_telf" name="contacto_telf" value="<?= $datos->contacto_telf; ?>" class="form-control" placeholder="contacto_telf" aria-label="contacto_telf">
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="<?= $datos->email; ?>" class="form-control" placeholder="Email" aria-label="email">
                        </div>
                    </div>
                </div>
                <div class="card-body mt-3">
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="estudia">Estudia:</label>
                            <input type="text" id="estudia" name="estudia" value="<?= $datos->estudia; ?>" class="form-control" placeholder="estudia" aria-label="estudia">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="tiempo_sin_estudiar">Tiempo sin estudiar:</label>
                            <input type="text" id="tiempo_sin_estudiar" name="tiempo_sin_estudiar" value="<?= $datos->tiempo_sin_estudiar; ?>" class="form-control" placeholder="tiempo_sin_estudiar" aria-label="tiempo_sin_estudiar">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="anio_egb">Ultimo grado aprobado:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="anio_egb" 
                                id="anio_egb"  
                            >
                            <option value="NULL" selected>Registrar dato</option>
                                <?php
                                    foreach ($cursos as $key => $c) {
                                        if ($datos->anio_egb == $c->id) {
                                            echo '<option value="'.$c->id.'" selected>'.$c->curso.'</option>';
                                        }else{
                                            echo '<option value="'.$c->id.'">'.$c->curso.'</option>';
                                        }
                                        
                                    }
                                    
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9 mb-3">
                                <label for="institucion">Institución:</label>
                                <input type="text" id="institucion" name="institucion" value="<?= $datos->institucion; ?>" class="form-control" placeholder="institucion" aria-label="institucion">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body mt-3 mb-3">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="num_hijos">Num. hijos:</label>
                            <input type="text" id="num_hijos" name="num_hijos" value="<?= $datos->num_hijos; ?>" class="form-control" placeholder="num_hijos" aria-label="num_hijos">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="edad_hijo_1">Edad 1er hijo:</label>
                            <input type="text" id="edad_hijo_1" name="edad_hijo_1" value="<?= $datos->edad_hijo_1; ?>" class="form-control" placeholder="edad_hijo_1" aria-label="edad_hijo_1">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="edad_hijo_2">Edad 2do hijo:</label>
                            <input type="text" id="edad_hijo_2" name="edad_hijo_2" value="<?= $datos->edad_hijo_2; ?>" class="form-control" placeholder="edad_hijo_2" aria-label="edad_hijo_2">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="edad_hijo_3">Edad 3er hijo:</label>
                            <input type="text" id="edad_hijo_3" name="edad_hijo_3" value="<?= $datos->edad_hijo_3; ?>" class="form-control" placeholder="edad_hijo_3" aria-label="edad_hijo_3">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="embarazada">Embarazada:</label>
                            <input type="text" id="embarazada" name="embarazada" value="<?= $datos->embarazada; ?>" class="form-control" placeholder="embarazada" aria-label="embarazada">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="semanas">Semanas:</label>
                            <input type="text" id="semanas" name="semanas" value="<?= $datos->semanas; ?>" class="form-control" placeholder="semanas" aria-label="semanas">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="controles">Controles:</label>
                            <input type="text" id="controles" name="controles" value="<?= $datos->controles; ?>" class="form-control" placeholder="controles" aria-label="controles">
                        </div>
                    </div>
                </div>
            </div>
            
            <?= form_hidden('id', $datos->id);  ?>
            <button type="submit" class="btn btn-info mb-3">Guardar</button>
        </form>
        <button onclick="history.back()" class="btn btn-success mb-3">Regresar</button>
        <a href="<?= site_url()?>prod4-reporte-individual" class="btn btn-info mb-2" target="_blank">Descargar reporte individual de resultados</a>
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