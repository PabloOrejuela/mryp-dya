<style>
    .form-control{
        font-size: 1em;
    }
    #titulo-nombre{
        color: rgb(106, 145, 40);
    }
</style>
<main class="container-md px-2 mb-4">
    <div class="container-fluid px-0">
        <h4 class="mt-4"><?= esc($title).' : Componente 1'; ?></h4>
        <form action="<?php echo base_url().'/prod1-asistencia-centro-update';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <h4 class="mt-3" id="titulo-nombre"><?= esc ('Procesos - Asistencia'); ?></h4>
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
                        <div class="col-md-3 mb-3">
                            <label for="cohorte">Cohorte:</label>
                            <select 
                                class="form-select" 
                                aria-label="Default select example" 
                                name="cohorte"
                                id="select_info"  
                            >   
                                <option value="NULL">Elegir cohorte</option>
                                <option value="PRIMERA COHORTE">PRIMERA COHORTE</option>
                                <option value="SEGUNDA COHORTE">SEGUNDA COHORTE</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="horas_atencion_total">TOTAL HORAS:</label>
                            <input 
                                type="text" 
                                id="horas_atencion_total" 
                                name="horas_atencion_total" 
                                value="" 
                                class="form-control" 
                                placeholder="" 
                                aria-label="horas_atencion_total"
                            >
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="amie">HORAS PLANIFICADAS:</label>
                            <input 
                                type="text" 
                                id="horas_planificadas" 
                                name="horas_planificadas" 
                                value="" 
                                class="form-control" 
                                placeholder="" 
                                aria-label="horas_planificadas"
                            >
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="amie">HORAS EFECTIVAS:</label>
                            <input 
                                type="text" 
                                id="horas_efectivas" 
                                name="horas_efectivas" 
                                value="" 
                                class="form-control" 
                                placeholder="" 
                                aria-label="horas_efectivas"
                            >
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="amie">HORAS PERDIDAS:</label>
                            <input 
                                type="text" 
                                id="horas_perdidas" 
                                name="horas_perdidas" 
                                value="" 
                                class="form-control" 
                                placeholder="" 
                                aria-label="horas_perdidas"
                            >
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info mb-3 mt-3">Enviar</button>
        </form>
    </div>
    
</main>