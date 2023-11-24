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
        <form action="<?php echo base_url().'/nap4-insert';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="nombres">Nombres:</label>
                    <input type="text" style="text-transform: uppercase" id="nombres" name="nombres" value="<?= set_value('nombres'); ?>" class="form-control" placeholder="Nombres" aria-label="nombres">
                    <p id="error-message"><?= session('errors.nombres');?> </p>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nacionalidad">Apellidos:</label>
                    <input type="text" style="text-transform: uppercase" id="apellidos" name="apellidos" value="<?= set_value('apellidos'); ?>" class="form-control" placeholder="Apellidos" aria-label="apellidos">
                    <p id="error-message"><?= session('errors.apellidos');?> </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="documento">Documento:</label>
                    <input type="text" id="documento" name="documento" value="<?= set_value('documento'); ?>" class="form-control" placeholder="Documento" aria-label="documento">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nacionalidad">Nacionalidad:</label>
                    <select name="nacionalidad" class="form-control" id="nacionalidad" aria-label="nacionalidad">
                        <option value="" selected>--Seleccionar--</option>
                        <?php
                            if ($nacionalidad) {
                                foreach ($nacionalidad as $key => $value) {
                                    echo '<option value="'.$key.'" '.set_select('nacionalidad', $key, false).' >'.$value.'</option>';
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
                                    echo '<option value="'.$key.'" '.set_select('etnia', $key, false).' >'.$value.'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="fecha_nac">Fecha de nacimiento:</label>
                    <input type="date" id="fecha_nac" name="fecha_nac" value="<?= date('Y-m-d'); ?>" class="form-control" placeholder="fecha_nac" aria-label="fecha_nac">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="edad">Edad:</label>
                    <input type="text" id="edad" name="edad" value="<?= set_value('edad'); ?>" class="form-control number" placeholder="Edad" aria-label="edad">
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
                <div class="col-md-4 mb-3">
                    <label for="discapacidad">Discapacidad:</label>
                    <input type="text" id="discapacidad" name="discapacidad" value="<?= set_value('discapacidad'); ?>" class="form-control" placeholder="Discapacidad" aria-label="discapacidad">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="tipo_discapacidad">Tipo de discapacidad:</label>
                    <input type="text" id="tipo_discapacidad" name="tipo_discapacidad" value="<?= set_value('tipo_discapacidad'); ?>" class="form-control" placeholder="tipo_discapacidad" aria-label="tipo_discapacidad">
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
                                echo '<option value="'.$anio->id.'" '.set_select('anio_lectivo', $anio->id, false).' >'.$anio->anio_lectivo.'</option>';
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
                                echo '<option value="'.$ce->amie.'" '.set_select('amie', $ce->amie, false).' >'.$ce->centro.'</option>';
                            }
                        }
                        
                    ?>
                    </select>
                    <p id="error-message"><?= session('errors.amie');?> </p>
                </div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col-md-8 mt-3">
                    <h5>Datos del tutor</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="docente_tutor">Docente tutor:</label>
                    <input 
                        type="text" 
                        id="docente_tutor" 
                        style="text-transform: uppercase" 
                        name="docente_tutor" 
                        value="<?= set_value('docente_tutor'); ?>" 
                        class="form-control" 
                        placeholder="Tutor" 
                        aria-label="tutor"
                    >
                </div>
                <div class="col-md-2 mb-3">
                    <label for="doc_tutor">Doc. Tutor:</label>
                    <input 
                        type="text" 
                        id="doc_tutor" 
                        style="text-transform: uppercase" 
                        name="doc_tutor" 
                        value="<?= set_value('doc_tutor'); ?>"
                        class="form-control" 
                        placeholder="Doc tutor" 
                        aria-label="doc-tutor"
                    >
                </div>
                <div class="col-md-2 mb-3">
                    <label for="email_tutor">Email tutor:</label>
                    <input 
                        type="email" 
                        id="email_tutor" 
                        name="email_tutor" 
                        value="<?= set_value('email_tutor'); ?>"
                        class="form-control" 
                        placeholder="Email tutor" 
                        aria-label="email-tutor"
                    >
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="telf_tutor">Telefono tutor:</label>
                    <input 
                        type="text" 
                        id="telf_tutor" 
                        style="text-transform: uppercase" 
                        name="telf_tutor" 
                        value="<?= set_value('telf_tutor'); ?>" 
                        class="form-control" 
                        placeholder="teléfono tutor" 
                        aria-label="telf-tutor"
                    >
                </div>
                <div class="col-md-2 mb-3">
                    <label for="etnia_tutor">Etnia Tutor:</label>
                    <select name="etnia_tutor" class="form-control" id="etnia_tutor" aria-label="etnia_tutor">
                        <option value="" selected>--Seleccionar--</option>
                        <?php
                            if ($etnia) {
                                foreach ($etnia as $key => $value) {
                                    echo '<option value="'.$key.'" '.set_select('etnia', $key, false).' >'.$value.'</option>';
                                }
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
                    <input type="text" id="representante" style="text-transform: uppercase" name="representante" value="<?= set_value('representante'); ?>" class="form-control" placeholder="Representante" aria-label="representante">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="documento_rep">Doc. Representante:</label>
                    <input type="text" id="documento_rep" name="documento_rep" value="<?= set_value('documento_rep'); ?>" class="form-control" placeholder="Doc representante" aria-label="documento_rep">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="parentesto_rep">Parentesco:</label>
                    <input type="text" id="parentesto_rep" name="parentesto_rep" style="text-transform: uppercase" value="<?= set_value('parentesto_rep'); ?>" class="form-control" placeholder="Parentesto" aria-label="parentesto_rep">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="nacionalidad_rep">Nacionalidad Representante:</label>
                    <select name="nacionalidad_rep" class="form-control" id="nacionalidad_rep" aria-label="nacionalidad_rep">
                        <option value="" selected>--Seleccionar--</option>
                        <?php
                            if ($nacionalidad) {
                                foreach ($nacionalidad as $key => $value) {
                                    echo '<option value="'.$key.'" '.set_select('nacionalidad', $key, false).' >'.$value.'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="direccion_rep">Dirección Representante::</label>
                    <input type="text" id="direccion_rep" name="direccion_rep" style="text-transform: uppercase" value="<?= set_value('direccion_rep'); ?>" class="form-control" placeholder="Direccion" aria-label="direccion_rep">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="contacto_telf">Contacto Representante:</label>
                    <input type="text" id="contacto_telf" name="contacto_telf" value="<?= set_value('contacto_telf'); ?>" class="form-control" placeholder="Teléfono" aria-label="contacto_telf">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="email">Email de contacto:</label>
                    <input type="text" id="email" name="email" value="<?= set_value('contacto_telf'); ?>" class="form-control" placeholder="Email" aria-label="email">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="observaciones">Observaciones:</label>
                    <textarea name="observaciones" id="observaciones" cols="30" rows="10" value="<?= set_value('contacto_telf'); ?>"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-info mb-3">Guardar</button>
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
    

    /* Multiple Item Picker */
    $('.selectpicker').selectpicker({
        style: 'btn-default'
    });
</script>