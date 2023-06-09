<style>
    .form-control, .form-select{
        font-size: 0.8em;
    }
</style>
<main class="container-sm px-2 mb-5">
    <div class="container-fluid px-0">
        <h4 class="mt-4"><?= esc($title); ?></h4>
        <form action="<?php echo base_url().'/prod3_update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="card mb-4 col-md-8">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="amie">AMIE:</label>
                            <input type="text" id="amie" name="amie" value="<?= $datos->amie; ?>" class="form-control" placeholder="" aria-label="amie" disabled>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" value="<?= $datos->nombre; ?>" class="form-control" placeholder="" aria-label="nombre">
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
                            <label for="discapacidad">Discapacidad:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="discapacidad" 
                                id="discapacidad"  
                            >
                                <option value="SI">SI</option>
                                <option value="NO" selected>NO</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="tipo">Tipo de discapacidad:</label>
                            <input type="text" id="tipo" name="tipo" value="<?= $datos->tipo; ?>" class="form-control" placeholder="" aria-label="tipo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="<?= $datos->email; ?>" class="form-control" placeholder="Email" aria-label="email">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="celular">Celular:</label>
                            <input type="celular" id="celular" name="celular" value="<?= $datos->celular; ?>" class="form-control" placeholder="" aria-label="celular">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="especialidad">Especialidad:</label>
                            <input type="especialidad" id="especialidad" name="especialidad" value="<?= $datos->especialidad; ?>" class="form-control" placeholder="" aria-label="especialidad">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="funcion">Función:</label>
                            <input type="funcion" id="funcion" name="funcion" value="<?= $datos->funcion; ?>" class="form-control" placeholder="" aria-label="funcion">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4 col-md-6">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="funcion">Año /Curso:</label>
                            <div class="form-check">
                                <?php
                                    if ($datos->inicial_1 == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="inicial_1" value="1" id="defaultCheck1" checked>Inicial 1';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="inicial_1" value="1" id="defaultCheck1">Inicial 1';
                                    }
                                ?>
                                
                            </div>
                            <div class="form-check">
                                <?php
                                    if ($datos->inicial_2 == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="inicial_2" value="1" id="defaultCheck1" checked>Inicial 2';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="inicial_2" value="1" id="defaultCheck1">Inicial 2';
                                    }
                                ?>
                            </div>
                            <div class="form-check">
                                <?php
                                    if ($datos->pri_egb == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="pri_egb" value="1" id="defaultCheck1" checked>1ro EGB';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="pri_egb" value="1" id="defaultCheck1">1ro EGB';
                                    }
                                ?>
                            </div>
                            <div class="form-check">
                                <?php
                                    if ($datos->seg_egb == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="seg_egb" value="1" id="defaultCheck1" checked>2do EGB';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="seg_egb" value="1" id="defaultCheck1">2do EGB';
                                    }
                                ?>
                            </div>
                            <div class="form-check">
                                <?php
                                    if ($datos->ter_egb == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="ter_egb" value="1" id="defaultCheck1" checked>3ro EGB';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="ter_egb" value="1" id="defaultCheck1">3ro EGB';
                                    }
                                ?>
                            </div>
                            <div class="form-check">
                                <?php
                                    if ($datos->cuart_egb == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="cuart_egb" value="1" id="defaultCheck1" checked>4to EGB';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="cuart_egb" value="1" id="defaultCheck1">4to EGB';
                                    }
                                ?>
                            </div>
                            <div class="form-check">
                                <?php
                                    if ($datos->quin_egb == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="quin_egb" value="1" id="defaultCheck1" checked>5to EGB';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="quin_egb" value="1" id="defaultCheck1">5to EGB';
                                    }
                                ?>
                            </div>
                            <div class="form-check">
                                <?php
                                    if ($datos->sex_egb == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="sex_egb" value="1" id="defaultCheck1" checked>6to EGB';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="sex_egb" value="1" id="defaultCheck1">6to EGB';
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="funcion"></label>
                            <div class="form-check">
                                <?php
                                    if ($datos->sept_egb == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="sept_egb" value="1" id="defaultCheck1" checked>7mo EGB';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="sept_egb" value="1" id="defaultCheck1">7mo EGB';
                                    }
                                ?>
                            </div>
                            <div class="form-check">
                                <?php
                                    if ($datos->oct_egb == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="oct_egb" value="1" id="defaultCheck1" checked>8vo EGB';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="oct_egb" value="1" id="defaultCheck1">8vo EGB';
                                    }
                                ?>
                            </div>
                            <div class="form-check">
                                <?php
                                    if ($datos->nov_egb == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="nov_egb" value="1" id="defaultCheck1" checked>9no EGB';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="nov_egb" value="1" id="defaultCheck1">9no EGB';
                                    }
                                ?>
                            </div>
                            <div class="form-check">
                                <?php
                                    if ($datos->dec_egb == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="dec_egb" value="1" id="defaultCheck1" checked>10mo EGB';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="dec_egb" value="1" id="defaultCheck1">10mo EGB';
                                    }
                                ?>
                            </div>
                            <div class="form-check">
                                <?php
                                    if ($datos->pri_bach == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="pri_bach" value="1" id="defaultCheck1" checked>1ro bach';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="pri_bach" value="1" id="defaultCheck1">1ro bach';
                                    }
                                ?>
                            </div>
                            <div class="form-check">
                                <?php
                                    if ($datos->seg_bach == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="seg_bach" value="1" id="defaultCheck1" checked>2do bach';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="seg_bach" value="1" id="defaultCheck1">2do bach';
                                    }
                                ?>
                            </div>
                            <div class="form-check">
                                <?php
                                    if ($datos->ter_bach == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="ter_bach" value="1" id="defaultCheck1" checked>3ro Bach';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="ter_bach" value="1" id="defaultCheck1">3ro Bach';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
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