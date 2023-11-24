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
        <form action="<?php echo base_url().'/nap5-insert';?>" method="post">
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
                        value="<?= set_value('nombres'); ?>" 
                        class="form-control" 
                        placeholder="Nombres" 
                        aria-label="nombres"
                    >
                    <p id="error-message"><?= session('errors.nombres');?> </p>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="apellidos">Apellidos:</label>
                    <input 
                        type="text" 
                        style="text-transform: uppercase" 
                        id="apellidos" 
                        name="apellidos" 
                        value="<?= set_value('apellidos'); ?>" 
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
                        value="<?= set_value('documento'); ?>" 
                        class="form-control" 
                        placeholder="Documento" 
                        aria-label="documento"
                    >
                </div>
                <div class="col-md-4 mb-3">
                    <label for="num_est">No. de estudiantes:</label>
                    <input 
                        type="text" 
                        id="num_est" 
                        name="num_est" 
                        value="<?= set_value('num_est'); ?>" 
                        class="form-control" 
                        placeholder="No. Estudiantes"
                        aria-label="num_est"
                    >
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="edad">Edad:</label>
                    <input 
                        type="text" 
                        id="edad" 
                        name="edad" 
                        value="<?= set_value('edad'); ?>" 
                        class="form-control number" 
                        placeholder="Edad" 
                        aria-label="edad"
                    >
                </div>
                <div class="col-md-4 mb-3">
                    <label for="titulo_pro">Título profesional:</label>
                    <input 
                        type="text" 
                        id="titulo_pro" 
                        name="titulo_pro" 
                        value="<?= set_value('titulo_pro'); ?>" 
                        class="form-control" 
                        placeholder="Título profesional" 
                        aria-label="titulo_pro"
                    >
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="celular">Teléfono:</label>
                    <input 
                        type="text" 
                        id="celular" 
                        name="celular" 
                        value="<?= set_value('celular'); ?>" 
                        class="form-control" 
                        placeholder="Celular" 
                        aria-label="celular"
                    >
                </div>
                <div class="col-md-4 mb-3">
                    <label for="email">Email:</label>
                    <input 
                        type="text" 
                        id="email" 
                        name="email" 
                        value="<?= set_value('email'); ?>" 
                        class="form-control" 
                        placeholder="Email" 
                        aria-label="email"
                    >
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="discapacidad">Discapacidad:</label>
                    <input 
                        type="text" 
                        id="discapacidad" 
                        name="discapacidad" 
                        value="<?= set_value('discapacidad'); ?>" 
                        class="form-control" 
                        placeholder="Discapacidad" 
                        aria-label="discapacidad"
                    >
                </div>
                <div class="col-md-4 mb-3">
                    <label for="tipo">Tipo de discapacidad:</label>
                    <input 
                        type="text" 
                        id="tipo" 
                        name="tipo" 
                        value="<?= set_value('tipo'); ?>" 
                        class="form-control" 
                        placeholder="Tipo de discapacidad" 
                        aria-label="tipo"
                    >
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="autoidentificacion">Etnia:</label>
                    <select name="autoidentificacion" class="form-control" id="autoidentificacion" aria-label="autoidentificacion">
                        <option value="" selected>--Seleccionar--</option>
                        <?php
                            if ($etnia) {
                                foreach ($etnia as $key => $value) {
                                    echo '<option value="'.$key.'" '.set_select('autoidentificacion', $key, false).' >'.$value.'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="genero">Género:</label>
                    <select name="genero" class="form-control" id="genero" aria-label="genero">
                        <option value="" selected>--Seleccionar--</option>
                        <option value="FEMENINO">FEMENINO</option>
                        <option value="MASCULINO">MASCULINO</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-1">
                    <label for="anio_lectivo">Año lectivo:</label>
                    <select 
                        class="form-select" 
                        aria-label="Default select example" 
                        name="anio_lectivo"
                        id="anio_lectivo"  
                    >
                    <option value="0" selected>--Seleccionar--</option>
                    <?php
                        
                        if ($anios_lectivos != NULL && isset($anios_lectivos) ) {
                            foreach ($anios_lectivos as $key => $anio) {
                                echo '<option value="'.$anio->id.'" '.set_select('anio_lectivo', $anio->id, false).' >'.$anio->anio_lectivo.'</option>';
                            }
                        }else{
                            echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                        }
                    ?>
                    </select>
                    <p id="error-message"><?= session('errors.anio_lectivo');?> </p>
                </div>
                <div class="col-md-4 mb-1">
                    <label for="amie">Centro educativo:</label>
                    <select 
                        name="amie"
                        data-style="form-control" 
                        class="form-select" 
                        aria-label="Default select example" 
                        id="amie"   
                        
                    >
                    <option value="" selected>--Seleccionar--</option>
                    <?php
                        if ($centros != NULL && isset($centros) ) {
                            foreach ($centros as $key => $ce) {
                                echo '<option value="'.$ce->amie.'" '.set_select('amie', $ce->amie, false).' >'.$ce->amie.' - '.$ce->centro.'</option>';
                            }
                        } 
                    ?>
                    </select>
                    <p id="error-message"><?= session('errors.amie');?> </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="subnivel">Subnivel:</label>
                    <input 
                        type="text" 
                        id="subnivel" 
                        name="subnivel" 
                        value="<?= set_value('subnivel'); ?>" 
                        class="form-control" 
                        placeholder="Subnivel" 
                        aria-label="subnivel"
                    >
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="observaciones">Observaciones:</label>
                    <textarea 
                        class="form-control" 
                        name="observaciones" 
                        id="observaciones" 
                        cols="30" 
                        rows="10"
                    ><?= set_value('observaciones'); ?></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-info mb-3">Guardar</button>
        </form>
        <button onclick="history.back()" class="btn btn-success mb-3">Regresar</button>
    </div>
</main>