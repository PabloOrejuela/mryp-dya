<style>
    .form-control{
        font-size: 0.9em;
    }
    #titulo-nombre{
        color: rgb(106, 145, 40);
    }
    #pregunta{
        font-weight: bold;
    }
    #select-pregunta{
        font-size: 1em;
    }
    #error{
        color:red;
    }

</style>
<main class="container-md px-2 mb-4">
    <div class="container-fluid px-0">
        <h5 class="mt-4" id="titulo-nombre"><?= esc($title).' - ELEGIR TIPO DE EVALUACION MATEMÁTICA'; ?></h5>
        <form action="<?php echo base_url().'/prod1-elije-evalMate';?>" method="post">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <h5 class="mt-3"><?= esc ('Tutor: '.$datos->tutor_apoyo); ?></h5>
                        <h5 class="mt-3"><?= esc ('Estudiante: '.$datos->apellidos.' '.$datos->nombres); ?></h5>
                        <p><?= 'Debe elegir un tipo de prueba. <span id="error">'.$this->session->form_error.'</span>'; ?></p>
                        <div class="col-md-8 mb-2">
                            <label for="apoyo" class="mb-2">Tipo de prueba:</label>
                            <div class="col-sm-8">
                                <select 
                                    class="form-select" 
                                    aria-label="Default select example" 
                                    name="tipo_prueba" 
                                    id="select-pregunta"  
                                >
                                    <option value="0" selected>Elija una prueba para registrar los datos</option>
                                    <option value="1">Prueba Elemental</option>
                                    <option value="2">Prueba Media/Superior</option>
                                </select>
                                <p id="error-message"><?= session('errors.tipo_prueba_mate');?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= form_hidden('id', $idprod);  ?>
            <button type="submit" class="btn btn-info mb-3">Ir a la prueba</button>
        </form>
        <button onclick="history.back()" class="btn btn-success mb-3">Regresar</button>
    </div>
    
</main>