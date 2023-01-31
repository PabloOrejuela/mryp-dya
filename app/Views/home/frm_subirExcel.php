    <main class="container">
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?= esc($title); ?></h3>
                        
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-cash-register"></i>
                    <?= esc("Cargar información del componente desde una hoja de excel"); ?>
                </div>
                <div class="card-body"> 
                    <form action="<?php echo base_url().'/getExcelC'.$componente->idproducto;?>" method="post" id="form-subir-excel" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="container mb-3" style="margin-top:20px;">
                            <div class="col-sm-12 mb-3">
                                <h5><?= $componente->producto; ?> </h5>
                            </div>
                            <div class="col-sm-5 mb-3">
                                <label>Subir archivo de datos (.xls)</label>
                                <input class="form-control form-control-sm" type="file" name="hoja" id="formFile" value="Subir archivo excel">
                            </div>
                            <p id="error-message"><?= session('errors.tablaCartera');?> </p>
                            <div>
                                <?= form_hidden('idproducto', $componente->idproducto); ?>
                                <input type="submit" class="btn btn-outline-secondary" value="Subir archivo">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>