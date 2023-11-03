<style>
    #span-error{
        color: #ed5c5c;
    }
    #anio_lectivo_slash{
        background: none;
        margin-left: 0px;
        margin-right: 0px;
        width: 50px;
        text-align: center;
        border: none;
    }

</style>
<main class="container-sm px-2 mb-3">
    <div class="container-fluid px-0">
        <h4 class="mt-4"><?= esc($title).' - Registrar una nueva Cohorte'; ?></h4>
        <form action="<?php echo base_url().'/cohorte-insert';?>" method="post">
            <?= csrf_field(); ?>
            <div class="card mb-3 col-md-8">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3 mx-1">
                            <label for="cohorte">Cohorte:</label>
                            <input 
                                type="text" 
                                id="cohorte" 
                                name="cohorte" 
                                value="<?= set_value('tiempo_sin_estudiar') ?>" 
                                class="form-control" 
                                placeholder="Cohorte" 
                                aria-label="cohorte"
                                style="text-transform: uppercase"
                                required
                            >
                            <p id="span-error"><?= session('errors.cohorte');?> </p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="idcentro4">Cohortes:</label>
                            <ul>
                                <?php
                                    foreach ($cohortes as $cohorte) {
                                        echo '<li>'.$cohorte->cohorte.'</li>';
                                    }
                                    
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info mb-3">Guardar</button>
        </form>
    </div>
</main>