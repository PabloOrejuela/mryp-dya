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
                            <label for="nombre">nombre:</label>
                            <input type="text" id="nombre" name="nombre" value="<?= $datos->nombre; ?>" class="form-control" placeholder="" aria-label="nombre">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="documento">Documento:</label>
                            <input type="text" id="documento" name="documento" value="<?= $datos->documento; ?>" class="form-control" placeholder="" aria-label="documento">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="nacionalidad">Nacionalidad:</label>
                            <input type="text" id="nacionalidad" name="nacionalidad" value="<?= $datos->nacionalidad; ?>" class="form-control" placeholder="Nacionalidad" aria-label="nacionalidad">
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
                                        echo '<input class="form-check-input" type="checkbox" name="cuart_egb" value="1" id="defaultCheck1" checked>1ro EGB';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="cuart_egb" value="1" id="defaultCheck1">1ro EGB';
                                    }
                                ?>
                            </div>
                            <div class="form-check">
                                <?php
                                    if ($datos->quin_egb == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="quin_egb" value="1" id="defaultCheck1" checked>1ro EGB';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="quin_egb" value="1" id="defaultCheck1">1ro EGB';
                                    }
                                ?>
                            </div>
                            <div class="form-check">
                                <?php
                                    if ($datos->sex_egb == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="sex_egb" value="1" id="defaultCheck1" checked>1ro EGB';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="sex_egb" value="1" id="defaultCheck1">1ro EGB';
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="funcion"></label>
                            <div class="form-check">
                                <?php
                                    if ($datos->sept_egb == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="sept_egb" value="1" id="defaultCheck1" checked>1ro EGB';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="sept_egb" value="1" id="defaultCheck1">1ro EGB';
                                    }
                                ?>
                            </div>
                            <div class="form-check">
                                <?php
                                    if ($datos->oct_egb == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="oct_egb" value="1" id="defaultCheck1" checked>1ro EGB';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="oct_egb" value="1" id="defaultCheck1">1ro EGB';
                                    }
                                ?>
                            </div>
                            <div class="form-check">
                                <?php
                                    if ($datos->nov_egb == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="nov_egb" value="1" id="defaultCheck1" checked>1ro EGB';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="nov_egb" value="1" id="defaultCheck1">1ro EGB';
                                    }
                                ?>
                            </div>
                            <div class="form-check">
                                <?php
                                    if ($datos->dec_egb == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="dec_egb" value="1" id="defaultCheck1" checked>1ro EGB';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="dec_egb" value="1" id="defaultCheck1">1ro EGB';
                                    }
                                ?>
                            </div>
                            <div class="form-check">
                                <?php
                                    if ($datos->pri_bach == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="pri_bach" value="1" id="defaultCheck1" checked>1ro EGB';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="pri_bach" value="1" id="defaultCheck1">1ro EGB';
                                    }
                                ?>
                            </div>
                            <div class="form-check">
                                <?php
                                    if ($datos->seg_bach == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="seg_bach" value="1" id="defaultCheck1" checked>1ro EGB';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="seg_bach" value="1" id="defaultCheck1">1ro EGB';
                                    }
                                ?>
                            </div>
                            <div class="form-check">
                                <?php
                                    if ($datos->ter_bach == 1) {
                                        echo '<input class="form-check-input" type="checkbox" name="ter_bach" value="1" id="defaultCheck1" checked>1ro EGB';
                                    }else{
                                        echo '<input class="form-check-input" type="checkbox" name="ter_bach" value="1" id="defaultCheck1">1ro EGB';
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