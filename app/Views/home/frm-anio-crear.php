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
        <h4 class="mt-4"><?= esc($title).' - Registrar un nuevo año lectivo'; ?></h4>
        <form action="<?php echo base_url().'/anio-lectivo-insert';?>" method="post">
            <?= csrf_field(); ?>
            <div class="card mb-3 col-md-8">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 mb-3 mx-1">
                            <label for="anio_lectivo_desde">Año (Desde):</label>
                            <input 
                                type="text" 
                                id="anio_lectivo_desde" 
                                name="anio_lectivo_desde" 
                                value="<?= $anio1+1; ?>" 
                                class="form-control" 
                                placeholder="Año lectivo" 
                                aria-label="anio_lectivo_desde"
                                required
                            >
                            <p id="span-error"><?= session('errors.anio_lectivo_desde');?> </p>
                        </div>
                        <div class="col-md-1 mb-3 mx-0">
                        <label for="anio_lectivo_slash"></label>
                            <input 
                                type="text1" 
                                id="anio_lectivo_slash" 
                                name="anio_lectivo_slash" 
                                value="/" 
                                class="form-control" 
                                placeholder="Año lectivo" 
                                aria-label="anio_lectivo_slash"
                                disabled
                            >
                        </div>
                        <div class="col-md-2 mb-3 mx-0">
                            <label for="anio_lectivo_1">Año (Hasta):</label>
                            <input 
                                type="text" 
                                id="anio_lectivo_hasta" 
                                name="anio_lectivo_hasta" 
                                value="<?= $anio2+1; ?>" 
                                class="form-control" 
                                placeholder="Año lectivo" 
                                aria-label="anio_lectivo_hasta"
                                required
                            >
                            <p id="span-error"><?= session('errors.anio_lectivo_hasta');?> </p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="idcentro4">Años lectivos:</label>
                            <ul>
                                <?php
                                    foreach ($anios_lectivos as $anio) {
                                        echo '<li>'.$anio->anio_lectivo.'</li>';
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