    <section id="login">
        <div id="wrap">
            <div class="row g-2mb-3">
                <div class="col-12 mt-3">
                    <div class="p-3 border bg-light" id="form-login">
                    <?= session()->getFlashdata('error'); ?>
                    <?= session()->getFlashdata('id'); ?>
                    <h4><?= esc($title); ?></h4>
                        
                        <form action="<?php echo base_url().'/validate_login';?>" method="post" autocomplete="nope">
                            <?= csrf_field(); ?>
                            <div class="mb-2 row">
                                <label for="user" class="col-sm-3 mr-10 col-form-label" id="label-login">Usuario:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="form-control" name="user" value="" placeholder="usuario" autocomplete="nope">
                                </div>
                                <p id="error-message"><?= session('errors.user');?> </p>
                            </div>
                            <div class="mb-2 row">
                                <label for="password" class="col-sm-3 mr-10 col-form-label" id="label-login" >Contraseña:</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="form-control" name="password" value="" placeholder="****" autocomplete="nope">
                                </div>
                                <p id="error-message"><?= session('errors.password');?> </p>
                            </div>
                            <div class="mb-2">
                                <button type="submit" class="btn btn-secondary" value="Enviar" id="btn-login">Enviar</button>
                            </div>
                            <div class="mb-2">
                                <?php
                                    
                                    if (isset($mensaje) && $mensaje != '' && $mensaje != NULL) {
                                        
                                        echo '<p id="warning-message" class="warning-login">'.$mensaje['mensaje'].'</p>';
                                        echo '<a type="button" id="btn-register" href="'.site_url().'sessions-close/'.$mensaje['id'].'" class="edit">Cerrar otras seiosnes';
                                    }else{
                                        echo '<p id="warning-message" class="warning-login">'.$mensaje.'</p>';
                                    }
                                ?>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>        