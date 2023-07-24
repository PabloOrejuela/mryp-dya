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
        <form action="<?php echo base_url().'/prod-1-new';?>" method="post">
        <p><?= 'Los campos con asterisco con obligatorios. <span id="error">'.$this->session->form_error.'</span>'; ?></p>
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="nombres">Nombres *:</label>
                    <input type="text" id="nombres" name="nombres" value="<?= old('nombres'); ?>" class="form-control" placeholder="Nombres" aria-label="nombres" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nacionalidad">Apellidos *:</label>
                    <input type="text" id="apellidos" name="apellidos" value="<?= old('apellidos'); ?>" class="form-control" placeholder="Apellidos" aria-label="apellidos" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="documento">Documento:</label>
                    <input type="text" id="documento" name="documento" value="<?= old('documento'); ?>" class="form-control" placeholder="Documento" aria-label="documento">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="genero">Fecha de nacimiento:</label>
                    <input type="date" id="fecha_nac" name="fecha_nac" value="<?= date('Y-m-d', strtotime('0000-00-00')); ?>" class="form-control" placeholder="fecha_nac" aria-label="fecha_nac">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4 mb-3">
                    <label for="anio_egb">Año EGB *:</label>
                    <select 
                        class="form-select" 
                        aria-label="Default select example" 
                        name="anio_egb" 
                        id="anio_egb"  
                    >
                    <option value="NULL" selected>Registrar dato</option>
                    <?php
                        foreach ($cursos as $key => $c) {
                            echo '<option value="'.$c->id.'">'.$c->curso.'</option>';
                        }
                        
                    ?>
                    </select>
                    <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="tutor_apoyo">Tutor de apoyo *:</label>
                    <input 
                        type="text" 
                        id="tutor_apoyo" 
                        name="tutor_apoyo" 
                        value="<?= $this->session->nombre ?>" 
                        class="form-control" 
                        placeholder="Tutor apoyo" 
                        aria-label="tutor_apoyo"
                        disabled
                    >
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
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
                <div class="col-sm-3 mb-3">
                    <label for="lectura">Cohorte *:</label>
                    <select 
                        class="form-select" 
                        aria-label="Default select example" 
                        name="cohorte" 
                        id="cohorte"  
                    >
                        <option value="NULL" selected>Registrar dato</option>
                        <option value="PRIMERA COHORTE">PRIMERA COHORTE</option>
                        <option value="SEGUNDA COHORTE">SEGUNDA COHORTE</option>
                    </select>
                    <p id="error-message"><?= session('errors.idmetodo_pago');?> </p>
                </div>
            </div>

            <button type="submit" class="btn btn-info mb-3">Crear</button>
        </form>
    </div>
    
</main>