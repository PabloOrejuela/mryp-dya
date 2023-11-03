<style>
    #span-error{
        color: #ed5c5c;
    }

</style>
<main class="container-sm px-2 mb-5">
    <div class="container-fluid px-0">
        <h4 class="mt-4"><?= esc($title); ?></h4>
        <form action="<?php echo base_url().'/prod-4-new';?>" method="post">
            
            <?= csrf_field(); ?>
            <div class="card mb-4 col-md-12">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="nombres">Nombres:</label>
                            <input type="text" id="nombres" name="nombres" value="<?= set_value('nombres') ?>" class="form-control" placeholder="nombre" aria-label="nombres">
                            <p id="span-error"><?= session('errors.nombres');?> </p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="documento">Documento de identidad:</label>
                            <input type="text" id="documento" name="documento" value="<?= set_value('documento') ?>" class="form-control" placeholder="documento" aria-label="documento">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="nacionalidad">Nacionalidad:</label>
                            <select name="nacionalidad" class="form-control" id="nacionalidad" aria-label="nacionalidad">
                                <option value="" selected>-Seleccionar-</option>
                                <option value="ECUATORIANA">ECUATORIANA</option>
                                <option value="VENEZOLANA">VENEZOLANA</option>
                                <option value="COLOMBIANA">COLOMBIANA</option>
                                <option value="PERUANA">PERUANA</option>
                                <option value="OTROS">OTROS</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="genero">Género:</label>
                            <select name="genero" class="form-control" id="genero" aria-label="genero">
                                <option value="">-Seleccionar-</option>
                                <option value="MASCULINO">MASCULINO</option>
                                <option value="FEMENINO" selected>FEMENINO</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="idcentro4">Centro:</label>
                            <select name="idcentro4" class="form-control" id="idcentro4" aria-label="idcentro4">
                                <option value="">--Seleccione una opción--</option>
                                <?php
                                    foreach ($centros as $key => $value) {
                                        echo '<option value="'.$value->id.'">'.$value->centro.'</option>';
                                    }
                                    
                                ?>
                            </select>
                            <p id="span-error"><?= session('errors.idcentro4');?> </p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cohorte">Cohorte:</label>
                            <select name="cohorte" class="form-control" id="cohorte" aria-label="cohorte">
                                <option value="">--Seleccione una opción--</option>
                                <?php
                                    foreach ($cohortes as $key => $value) {
                                        echo '<option value="'.$value->id.'">'.$value->cohorte.'</option>';
                                    }
                                    
                                ?>
                            </select>
                            <p id="span-error"><?= session('errors.cohorte');?> </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="fecha_nac">Fecha de nacimiento:</label>
                            <input type="date" id="fecha_nac" name="fecha_nac"  class="form-control" placeholder="fecha_nac" aria-label="fecha_nac">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="edad">EDAD:</label>
                            <input type="text" id="edad" name="edad" value="<?= set_value('edad') ?>"  class="form-control" placeholder="" aria-label="edad">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="discapacidad">Discapacidad:</label>
                            <input type="text" id="discapacidad" name="discapacidad" value="<?= set_value('discapacidad') ?>"  class="form-control" placeholder="" aria-label="discapacidad">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="tipo_discapacidad">Tipo de discapacidad:</label>
                            <input type="text" id="tipo_discapacidad" name="tipo_discapacidad" value="<?= set_value('tipo_discapacidad') ?>"  class="form-control" placeholder="" aria-label="tipo_discapacidad">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="barrio">Barrio:</label>
                            <input type="text" id="barrio" name="barrio" value="<?= set_value('barrio') ?>"  class="form-control" placeholder="barrio" aria-label="barrio">
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="contacto_telf">Contacto telefónico:</label>
                            <input type="text" id="contacto_telf" name="contacto_telf" value="<?= set_value('contacto_telf') ?>"  class="form-control" placeholder="contacto_telf" aria-label="contacto_telf">
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email"  value="<?= set_value('email') ?>" class="form-control" placeholder="Email" aria-label="email">
                        </div>
                    </div>
                </div>
                <div class="card-body mt-3">
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="estudia">Estudia:</label>
                            <select name="estudia" class="form-control" id="estudia" aria-label="estudia">
                                <option value="" selected>-Seleccionar-</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="tiempo_sin_estudiar">Tiempo sin estudiar:</label>
                            <input type="text" id="tiempo_sin_estudiar" name="tiempo_sin_estudiar" value="<?= set_value('tiempo_sin_estudiar') ?>"  class="form-control" placeholder="tiempo_sin_estudiar" aria-label="tiempo_sin_estudiar">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="anio_egb">Ultimo grado aprobado:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="anio_egb" 
                                id="anio_egb"  
                            >
                            <option value="NULL" selected>--Seleccionar--</option>
                                <?php
                                    foreach ($cursos as $key => $c) {
                                        echo '<option value="'.$c->id.'">'.$c->curso.'</option>';
                                    }
                                    
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9 mb-3">
                                <label for="institucion">Institución:</label>
                                <input type="text" id="institucion" name="institucion"  class="form-control" placeholder="institucion" aria-label="institucion">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body mt-3 mb-3">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="num_hijos">Num. hijos:</label>
                            <input type="text" id="num_hijos" name="num_hijos" value="<?= set_value('num_hijos') ?>"  class="form-control" placeholder="num_hijos" aria-label="num_hijos">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="edad_hijo_1">Edad 1er hijo:</label>
                            <input type="text" id="edad_hijo_1" name="edad_hijo_1" value="<?= set_value('edad_hijo_1') ?>"  class="form-control" placeholder="edad_hijo_1" aria-label="edad_hijo_1">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="edad_hijo_2">Edad 2do hijo:</label>
                            <input type="text" id="edad_hijo_2" name="edad_hijo_2" value="<?= set_value('edad_hijo_2') ?>" class="form-control" placeholder="edad_hijo_2" aria-label="edad_hijo_2">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="edad_hijo_3">Edad 3er hijo:</label>
                            <input type="text" id="edad_hijo_3" name="edad_hijo_3" value="<?= set_value('edad_hijo_3') ?>" class="form-control" placeholder="edad_hijo_3" aria-label="edad_hijo_3">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="embarazada">Embarazada:</label>
                            <select name="embarazada" class="form-control" id="embarazada" aria-label="embarazada">
                                <option value="NULL" selected>-Seleccionar-</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="semanas">Semanas:</label>
                            <input type="text" id="semanas" name="semanas" value="<?= set_value('semanas') ?>" class="form-control" placeholder="semanas" aria-label="semanas">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="controles">Controles:</label>
                            <input type="text" id="controles" name="controles" value="<?= set_value('controles') ?>" class="form-control" placeholder="controles" aria-label="controles">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info mb-3">Guardar</button>
        </form>
        <button onclick="history.back()" class="btn btn-success mb-3">Regresar</button>
    </div>
    
</main>