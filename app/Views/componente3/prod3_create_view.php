<style>
    .form-control{
        font-size: 0.9em;
    }
    #error{
        color:red;
    }
</style>
<main class="container-sm px-2 mb-5">
    <div class="container-fluid px-0">
        <h4 class="mt-4"><?= esc($title); ?></h4>
        <form action="<?php echo base_url().'/prod-3-new';?>" method="post">
        <p><?= 'Los campos con asterisco con obligatorios. <span id="error">'.$this->session->form_error.'</span>'; ?></p>
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="nombre">Nombre *:</label>
                    <input type="text" id="nombre" name="nombre" value="<?= old('nombre'); ?>" class="form-control" placeholder="Nombre" aria-label="nombre" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="documento">Documento:</label>
                    <input type="text" id="documento" name="documento" value="<?= old('documento'); ?>" class="form-control" placeholder="Documento" aria-label="documento">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4 mb-3">
                    <label for="lectura">Género:</label>
                    <select 
                        class="form-select" 
                        aria-label="Default select example" 
                        name="genero" 
                        id="genero"  
                    >
                        <option value="NULL" selected>Registrar dato</option>
                        <option value="MASCULINO">MASCULINO</option>
                        <option value="FEMENINO">FEMENINO</option>
                    </select>
                    <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8S mb-3">
                    <label for="lectura">Centro educativo *:</label>
                    <select 
                        class="form-select" 
                        aria-label="Default select example" 
                        name="amie" 
                        id="amie"  
                    >
                    <option value="NULL" selected>Registrar dato</option>
                    <?php
                        foreach ($centros as $key => $ce) {
                            echo '<option value="'.$ce->amie.'">'.$ce->nombre.'</option>';
                        }
                        
                    ?>
                    </select>
                    <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                </div>
            </div>

            <button type="submit" class="btn btn-info mb-3">Crear</button>
        </form>
    </div>
    
</main>