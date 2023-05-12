<main class="container">
    <div class="container-fluid px-4">
        <h3 class="mt-4"><?= esc($title).' - REPORTES'; ?></h3>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-cash-register"></i>
                <?= esc("Reporte de asistencia"); ?>
            </div>
            <div class="card-body" id="card-reportes"> 
                <form action="<?php echo base_url().'/recibe-asistencia-tab';?>" method="post" id="form">
                    <div class="col-md-8 mb-3">
                        <label for="amie">Centro educativo:</label>
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
                                        echo '<option value="'.$ce->amie.'">'.$ce->amie.' - '.$ce->nombre.'</option>';
                                    }
                                }else{
                                    echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="dias_atencion" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Días atención</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="horas_planificadas" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Horas planificadas</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="horas_efectivas" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Horas efectivas</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="horas_perdidas" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Horas perdidas</label>
                    </div>
                    <!-- Reporte -->
                    
                    <button type="submit" class="btn btn-success">Generar reporte</button>
                </form>
            </div>
        <section>
        
            <div class="col-md-06" style="width: 600px;">
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
                            <th id="th-dias">Días atención</th>
                            <th id="th-hplan">Horas planificadas</th>
                            <th id="th-hefect">Horas efectivas</th>
                            <th id="th-perdidas">Horas perdidas</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="td-dias"><?php echo number_format($dias_atencion, 0); ?></td>
                                <td id="td-hplan"><?php echo number_format($horas_planificadas, 0); ?></td>
                                <td id="td-hefect"><?php echo number_format($horas_efectivas, 0); ?></td>
                                <td id="td-perdidas"><?php echo number_format($horas_perdidas, 0); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</main>
