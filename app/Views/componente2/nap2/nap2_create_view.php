<style>
    .form-control, .form-select{
        font-size: 0.8em;
    }
</style>
<main class="container px-1 mb-5">
    <div class="container-fluid px-0">
        <h4 class="mt-4"><?= esc($title); ?></h4>
        <form action="<?php echo base_url().'/nap2-insert';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="nombres">Nombres:</label>
                    <input type="text" style="text-transform: uppercase" id="nombres" name="nombres" value="<?= set_value('nombres'); ?>" class="form-control" placeholder="Nombres" aria-label="nombres">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nacionalidad">Apellidos:</label>
                    <input type="text" style="text-transform: uppercase" id="apellidos" name="apellidos" value="<?= set_value('apellidos'); ?>" class="form-control" placeholder="Apellidos" aria-label="apellidos">
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
                        <option value="0" selected>--Seleccionar--</option>
                        <option value="ECUATORIANA">ECUATORIANA</option>
                        <option value="VENEZOLANA">VENEZOLANA</option>
                        <option value="COLOMBIANA">COLOMBIANA</option>
                        <option value="PERUANA">PERUANA</option>
                        <option value="OTROS">OTROS</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="etnia">Etnia:</label>
                    <select name="etnia" class="form-control" id="etnia" aria-label="etnia">
                        <option value="0" selected>--Seleccionar--</option>
                        <option value="MESTIZA">MESTIZA</option>
                        <option value="INDIGENA">INDIGENA</option>
                        <option value="AFRODECENDIENTE">AFRODECENDIENTE</option>
                        <option value="AFROECUATORIANA">AFROECUATORIANA</option>
                        <option value="AFROVENEZOLANA">AFROVENEZOLANA</option>
                        <option value="BLANCA">BLANCA</option>
                        <option value="OTROS">OTROS</option>
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
                        <option value="0" selected>--Seleccionar--</option>
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
                    <label for="ingresado_sistema">Ingresado al sistema:</label>
                    <select name="ingresado_sistema" class="form-control" id="ingresado_sistema" aria-label="ingresado_sistema">
                        <option value="0" selected>--Seleccionar--</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                        
                    </select>
                </div>
                <div class="col-md-4 mb-3">

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
                                echo '<option value="'.$anio->id.'">'.$anio->anio_lectivo.'</option>';
                            }
                        }else{
                            echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                        }
                        
                    ?>
                    </select>
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
                    <option value="0" selected>--Seleccionar--</option>
                    <?php
                        
                        if ($centros != NULL && isset($centros) ) {
                            foreach ($centros as $key => $ce) {
                                echo '<option value="'.$ce->amie.'">'.$ce->amie.' - '.$ce->nombre.'</option>';
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
                        <option value="0" selected>--Seleccionar--</option>
                        <option value="MESTIZA">MESTIZA</option>
                        <option value="INDIGENA">INDIGENA</option>
                        <option value="AFRODECENDIENTE">AFRODECENDIENTE</option>
                        <option value="AFROECUATORIANA">AFROECUATORIANA</option>
                        <option value="AFROVENEZOLANA">AFROVENEZOLANA</option>
                        <option value="BLANCA">BLANCA</option>
                        <option value="OTROS">OTROS</option>
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