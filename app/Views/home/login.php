    <section id="login">
        <div id="wrap">
            <div class="row g-2">
                <div class="col-12 mt-3">
                    <div class="p-3 border bg-light" id="form-login">
                    <?= session()->getFlashdata('error'); ?>
                    <h4><?= esc($title); ?></h4>
                        
                        <form action="<?php echo base_url().'/validate_login';?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="mb-2 row">
                                <label for="user" class="col-sm-3 mr-10 col-form-label" id="label-login">Usuario:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="form-control" name="user" value="wolf" placeholder="usuario" autocomplete="off">
                                </div>
                                <p id="error-message"><?= session('errors.user');?> </p>
                            </div>
                            <div class="mb-2 row">
                                <label for="password" class="col-sm-3 mr-10 col-form-label" id="label-login" >Contraseña:</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="form-control" name="password" value="wolfabadon" placeholder="****" autocomplete="off">
                                </div>
                                <p id="error-message"><?= session('errors.password');?> </p>
                            </div>
                            <div class="mb-2">
                                <button type="submit" class="btn btn-secondary" value="Enviar" id="btn-login">Enviar</button>
                            </div>
                        </form>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </section>        