<style>
    .form-control, .form-select{
        font-size: 0.8em;
    }
    #error-message{
        color:red;
    }
</style>
<main class="container px-1 mb-5">
    <div class="container-fluid px-0">
        <h4 class="mt-4"><?= esc($title); ?></h4>
        <form action="<?php echo base_url().'/nap6-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="nombres">Nombres:</label>
                    <input 
                        type="text" 
                        style="text-transform: uppercase" 
                        id="nombres" 
                        name="nombres" 
                        value="<?= $datos->nombres_est; ?>" 
                        class="form-control" 
                        placeholder="Nombres" 
                        aria-label="nombres"
                    >
                    <p id="error-message"><?= session('errors.nombres');?> </p>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nacionalidad">Apellidos:</label>
                    <input 
                        type="text" 
                        style="text-transform: uppercase" 
                        id="apellidos" 
                        name="apellidos" 
                        value="<?= $datos->apellidos_est; ?>" 
                        class="form-control" 
                        placeholder="Apellidos" 
                        aria-label="apellidos"
                    >
                    <p id="error-message"><?= session('errors.apellidos');?> </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="documento">Documento:</label>
                    <input 
                        type="text" 
                        id="documento" 
                        name="documento" 
                        value="<?= $datos->documento; ?>" 
                        class="form-control" 
                        placeholder="Documento" 
                        aria-label="documento"
                    >
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nacionalidad">Nacionalidad:</label>
                    <select name="nacionalidad" class="form-control" id="nacionalidad" aria-label="nacionalidad">
                        <option value="" selected>--Seleccionar--</option>
                        <?php
                            if ($datos->nacionalidad) {
                                foreach ($nacionalidad as $key => $value) {
                                    if ($datos->nacionalidad == $value) {
                                        echo '<option value="'.$key.'" '.set_select('nacionalidad', $key, false).' selected>'.$value.'</option>';
                                    }else{
                                        echo '<option value="'.$key.'" '.set_select('nacionalidad', $key, false).'>'.$value.'</option>';
                                    }
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="etnia">Etnia:</label>
                    <select name="etnia" class="form-control" id="etnia" aria-label="etnia">
                        <option value="" selected>--Seleccionar--</option>
                        <?php
                            if ($etnia) {
                                foreach ($etnia as $key => $value) {
                                    if ($datos->etnia == $value) {
                                        echo '<option value="'.$key.'" '.set_select('etnia', $key, false).' selected>'.$value.'</option>';
                                    }else{
                                        echo '<option value="'.$key.'" '.set_select('etnia', $key, false).'>'.$value.'</option>';
                                    }
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="fecha_nac">Fecha de nacimiento:</label>
                    <input type="date" id="fecha_nac" name="fecha_nac" value="<?= $datos->fecha_nac; ?>" class="form-control" placeholder="fecha_nac" aria-label="fecha_nac">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="edad">Edad:</label>
                    <input type="text" id="edad" name="edad" value="<?= $datos->edad; ?>" class="form-control number" placeholder="Edad" aria-label="edad">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="genero">Género:</label>
                    <select name="genero" class="form-control" id="genero" aria-label="genero">
                        <?php
                            if ($datos->genero == "FEMENINO") {
                                echo '<option value="FEMENINO" selected>FEMENINO</option>
                                        <option value="MASCULINO">MASCULINO</option>
                                ';
                            }elseif ($datos->genero == "MASCULINO") {
                                echo '<option value="FEMENINO">FEMENINO</option>
                                        <option value="MASCULINO" selected>MASCULINO</option>
                                ';
                            }else {
                                echo '<option value="FEMENINO">FEMENINO</option>
                                        <option value="MASCULINO">MASCULINO</option>
                                        <option value="NULL">--Registrar--</option>
                                ';
                            }
                        ?>
                    </select>
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
                    <label for="anio_lectivo">Año lectivo:</label>
                    <select 
                        class="form-select" 
                        aria-label="Default select example" 
                        name="anio_lectivo"
                        id="select_info"
                    >
                    <option value="0" selected>--Seleccionar--</option>
                    <?php
                        if ($anios_lectivos != NULL && isset($anios_lectivos) ) {
                            foreach ($anios_lectivos as $key => $anio) {
                                if ($anio->id == $datos->anio_lectivo) {
                                    echo '<option value="'.$anio->id.'" selected>'.$anio->anio_lectivo.'</option>';
                                }else{
                                    echo '<option value="'.$anio->id.'" >'.$anio->anio_lectivo.'</option>';
                                }
                            }
                        }else{
                            echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                        }
                    ?>
                    </select>
                    <p id="error-message"><?= session('errors.anio_lectivo');?> </p>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="amie">Centro educativo:</label>
                    <select 
                        name="amie"
                        data-style="form-control" 
                        class="form-select" 
                        aria-label="Default select example" 
                        id="select_info"   
                        
                    >
                    <option value="NULL" selected>--Seleccionar--</option>
                    <?php
                        if ($centros != NULL && isset($centros) ) {
                            foreach ($centros as $key => $ce) {
                                if ($ce->amie == $datos->amie) {
                                    echo '<option value="'.$ce->amie.'" selected>'.$ce->amie.' - '.$ce->centro.'</option>';
                                }else{
                                    echo '<option value="'.$ce->amie.'">'.$ce->amie.' - '.$ce->centro.'</option>';
                                }
                            }
                        }else{
                            echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                        }
                        
                    ?>
                    </select>
                    <p id="error-message"><?= session('errors.amie');?> </p>
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
                    <input 
                        type="text" 
                        id="representante" 
                        style="text-transform: uppercase" 
                        name="representante" 
                        value="<?= $datos->representante; ?>" 
                        class="form-control" 
                        placeholder="Representante" 
                        aria-label="representante"
                    >
                </div>
                <div class="col-md-2 mb-3">
                    <label for="documento_rep">Doc. Representante:</label>
                    <input 
                        type="text" 
                        id="documento_rep" 
                        name="documento_rep" 
                        value="<?= $datos->documento_rep; ?>" 
                        class="form-control" 
                        placeholder="Doc representante" 
                        aria-label="documento_rep"
                    >
                </div>
                <div class="col-md-2 mb-3">
                    <label for="parentesto_rep">Parentesco:</label>
                    <input 
                        type="text" 
                        id="parentesto_rep" 
                        name="parentesto_rep" 
                        style="text-transform: uppercase" 
                        value="<?= $datos->parentesto_rep; ?>" 
                        class="form-control" 
                        placeholder="Parentesto" 
                        aria-label="parentesto_rep"
                    >
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="nacionalidad_rep">Nacionalidad Representante:</label>
                    <select name="nacionalidad_rep" class="form-control" id="nacionalidad_rep" aria-label="nacionalidad_rep">
                        <option value="" selected>--Seleccionar--</option>
                        <?php
                            if ($datos->nacionalidad_rep) {
                                foreach ($nacionalidad as $key => $value) {
                                    if ($datos->nacionalidad_rep == $value) {
                                        echo '<option value="'.$key.'" '.set_select('nacionalidad', $key, false).' selected>'.$value.'</option>';
                                    }else{
                                        echo '<option value="'.$key.'" '.set_select('nacionalidad', $key, false).'>'.$value.'</option>';
                                    }
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="direccion_rep">Dirección Representante::</label>
                    <input 
                        type="text" 
                        id="direccion_rep" 
                        name="direccion_rep" 
                        style="text-transform: uppercase" 
                        value="<?= $datos->direccion_rep; ?>" 
                        class="form-control" 
                        placeholder="Direccion" 
                        aria-label="direccion_rep"
                    >
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="contacto_telf">Contacto Representante:</label>
                    <input 
                        type="text" 
                        id="contacto_telf" 
                        name="contacto_telf" 
                        value="<?= $datos->contacto_telf; ?>" 
                        class="form-control" 
                        placeholder="Teléfono" 
                        aria-label="contacto_telf"
                    >
                </div>
                <div class="col-md-4 mb-3">
                    <label for="email">Email de contacto:</label>
                    <input 
                        type="text" 
                        id="email" 
                        name="email" 
                        value="<?= $datos->email; ?>" 
                        class="form-control" 
                        placeholder="Email" 
                        aria-label="email"
                    >
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="observaciones">Observaciones:</label>
                    <textarea 
                        name="observaciones" 
                        id="observaciones" 
                        cols="30" 
                        rows="10" 
                    ><?= $datos->observaciones; ?></textarea>
                </div>
            </div>
            <?= form_hidden('id', $datos->id);  ?>
            <button type="submit" class="btn btn-info mb-3">Actualizar</button>
        </form>
        <button onclick="history.back()" class="btn btn-success mb-3">Regresar</button>
    </div>
</main>