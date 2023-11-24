<main class="container">
    <div class="container-fluid px-4">
        <h3 class="mt-4"><?= esc($title).' - REPORTES POR PROVINCIA'; ?></h3>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-cash-register"></i>
                <?= esc("Reporte de asistencia por provincia"); ?>
            </div>
            <div class="card-body" id="card-reportes"> 
                <form action="<?php echo base_url().'/recibe-asistencia-tab';?>" method="post" id="form">
                    <div class="col-md-8 mb-3">
                        <label for="amie">Provincia:</label>
                        <select 
                            class="form-select" 
                            aria-label="Default select example" 
                            name="amie"
                            id="select_info"  
                        >   
                            <option value="NULL" selected>Centro educativo</option>
                            <?php
                                if ($centros != NULL && isset($centros) ) {
                                    foreach ($centros as $key => $ce) {
                                        if ($ce->amie == $amie) {
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
                    <div class="col-md-3 mb-3">
                        <label for="cohorte">Cohorte:</label>
                        <select 
                            class="form-select" 
                            aria-label="Default select example" 
                            name="cohorte"
                            id="select_info"  
                        >   
                            <?php
                                if ($cohorte == 'PRIMERA COHORTE') {
                                    echo '<option value="NULL">Elegir cohorte</option>';
                                    echo '<option value="PRIMERA COHORTE" selected>PRIMERA COHORTE</option>';
                                    echo '<option value="SEGUNDA COHORTE">SEGUNDA COHORTE</option>';
                                }else if($cohorte == 'SEGUNDA COHORTE'){
                                    echo '<option value="NULL">Elegir cohorte</option>';
                                    echo '<option value="PRIMERA COHORTE">PRIMERA COHORTE</option>';
                                    echo '<option value="SEGUNDA COHORTE" selected>SEGUNDA COHORTE</option>';

                                }else{
                                    echo '<option value="NULL" selected>Elegir cohorte</option>';
                                    echo '<option value="PRIMERA COHORTE">PRIMERA COHORTE</option>';
                                    echo '<option value="SEGUNDA COHORTE">SEGUNDA COHORTE</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Generar reporte</button>
                </form>
            </div>
        <section>
        
            <div class="col-md-7" style="width: 700px;">
                <div class="contenedor mb-3 mt-3" id="table-asistencia">
                    <table class="table table-bordered table-stripped tabla-asistencia col-md-6">
                        <thead>
                            <th colspan="4">
                                <?php
                                    if ($centro != NULL && isset($centro)) {
                                        echo 'CENTRO EDUCATIVO '.$centro->nombre;
                                    }else{
                                        echo 'CENTRO EDUCATIVO';
                                    }
                                ?>
                            </th>
                        </thead>
                        <thead>
                            <th id="th-dias">Total horas</th>
                            <th id="th-hefect">Horas efectivas</th>
                            <th id="th-perdidas">Horas perdidas</th>
                        </thead>
                        <tbody>
                            <?php 
                                if (isset($asistencia) && $asistencia != NULL) {
                                    echo'
                                        <tr>
                                            <td id="td-dias">'.number_format($asistencia->horas_atencion_total, 0).'</td>
                                            <td id="td-hefect">'.number_format($asistencia->horas_efectivas, 0).'</td>
                                            <td id="td-perdidas">'.number_format($asistencia->horas_perdidas, 0).'</td>
                                        </tr>
                                    ';
                                }else{
                                    echo'
                                        <tr>
                                            <td id="td-dias">0</td>
                                            <td id="td-hefect">0</td>
                                            <td id="td-perdidas">0</td>
                                        </tr>
                                    ';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</main>
