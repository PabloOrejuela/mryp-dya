<main class="container-sm px-2 mb-5">
    <div class="container-fluid px-0">
        <h4 class="mt-4" id="titulo-nombre"><?= esc($title).' - Resultados: '.$est->nombres; ?></h4>
        <form action="<?php echo base_url().'/prod4-resultados-update';?>" method="post" name="form-edit">
            <?= session()->getFlashdata('error'); ?>
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="estado">ESTADO:</label>
                    <select name="estado" class="form-control" id="estado" aria-label="estado">
                        <?php
                            if ($datos != NULL && isset($datos)) {
                                if ($datos->estado  == "1") {
                                    echo '<option value="1" selected>Activa</option>
                                            <option value="2">No participó</option>
                                            <option value="3">Retirada</option>
                                            <option value="4">Finalizada</option>
                                    ';
                                }elseif ($datos->estado  == "2") {
                                    echo '<option value="1">Activa</option>
                                            <option value="2" selected>No participó</option>
                                            <option value="3">Retirada</option>
                                            <option value="4">Finalizada</option>
                                    ';
                                }elseif ($datos->estado  == "3") {
                                    echo '<option value="1">Activa</option>
                                            <option value="2">No participó</option>
                                            <option value="3" selected>Retirada</option>
                                            <option value="4">Finalizada</option>
                                    ';
                                }elseif ($datos->estado  == "4") {
                                    echo '<option value="1">Activa</option>
                                            <option value="2">No participó</option>
                                            <option value="3">Retirada</option>
                                            <option value="4" selected>Finalizada</option>
                                    ';
                                }else {
                                    echo '<option value="1">Activa</option>
                                            <option value="2">No participó</option>
                                            <option value="3">Retirada</option>
                                            <option value="4">Finalizada</option>
                                            <option value="NULL" selected>-- Registrar datos --</option>
                                    ';
                                }
                            }else{
                                echo '<option value="1">Activa</option>
                                        <option value="2">No participó</option>
                                        <option value="3">Retirada</option>
                                        <option value="4">Finalizada</option>
                                        <option value="NULL" selected>-- Registrar datos --</option>
                                ';
                            }
                        ?>
                    
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="reinsercion">REINSERCIÓN:</label>
                    <select name="reinsercion" class="form-control" id="reinsercion" aria-label="reinsercion">
                        <?php
                            if ($datos != NULL && isset($datos)) {
                                if ($datos->reinsercion  == "SI") {
                                    echo '<option value="SI" selected>SI</option>
                                            <option value="NO">NO</option>
                                            <option value="CONTINUIDAD">CONTINUIDAD</option>
                                    ';
                                }elseif ($datos->reinsercion  == "NO") {
                                    echo '<option value="SI">SI</option>
                                        <option value="NO" selected>NO</option>
                                        <option value="CONTINUIDAD">CONTINUIDAD</option>
                                    ';
                                }elseif ($datos->reinsercion  == "CONTINUIDAD") {
                                    echo '<option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                        <option value="CONTINUIDAD" selected>CONTINUIDAD</option>
                                    ';
                                }else {
                                    echo '<option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                        <option value="CONTINUIDAD">CONTINUIDAD</option>
                                        <option value="NULL" selected>-- Registrar datos --</option>
                                    ';
                                }
                            }else{
                                echo '<option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                        <option value="CONTINUIDAD">CONTINUIDAD</option>
                                        <option value="NULL" selected>-- Registrar datos --</option>
                                ';
                            }
                        ?>
                    
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="motivo">MOTIVO:</label>
                    <select name="motivo" class="form-control" id="motivo" aria-label="motivo">
                        <?php
                            if ($datos != NULL && isset($datos)) {
                                if ($datos->motivo == "CAMBIO DOMICILIO") {
                                    echo '<option value="CAMBIO DOMICILIO" selected>CAMBIO DOMICILIO</option>
                                            <option value="PROBLEMAS DE DOCUMENTACIÓN">PROBLEMAS DE DOCUMENTACIÓN</option>
                                            <option value="PROBLEMAS FAMILIARES">PROBLEMAS FAMILIARES</option>
                                            <option value="PÉRDIDA DE INTERÉS">PÉRDIDA DE INTERÉS</option>
                                            <option value="RAZONES DE FUERZA MAYOR">RAZONES DE FUERZA MAYOR</option>
                                            <option value="PROBLEMAS ECONÓMICOS">PROBLEMAS ECONÓMICOS</option>
                                            <option value="EN PROCESO DE MOVILIDAD HUMANA">EN PROCESO DE MOVILIDAD HUMANA</option>
                                            <option value="EN TRÁMITE">EN TRÁMITE</option>
                                    ';
                                }elseif ($datos->motivo	== "PROBLEMAS DE DOCUMENTACIÓN") {
                                    echo '<option value="CAMBIO DOMICILIO">CAMBIO DOMICILIO</option>
                                        <option value="PROBLEMAS DE DOCUMENTACIÓN" selected>PROBLEMAS DE DOCUMENTACIÓN</option>
                                        <option value="PROBLEMAS FAMILIARES">PROBLEMAS FAMILIARES</option>
                                        <option value="PÉRDIDA DE INTERÉS">PÉRDIDA DE INTERÉS</option>
                                        <option value="RAZONES DE FUERZA MAYOR">RAZONES DE FUERZA MAYOR</option>
                                        <option value="PROBLEMAS ECONÓMICOS">PROBLEMAS ECONÓMICOS</option>
                                        <option value="EN PROCESO DE MOVILIDAD HUMANA">EN PROCESO DE MOVILIDAD HUMANA</option>
                                        <option value="EN TRÁMITE">EN TRÁMITE</option>
                                    ';
                                }elseif ($datos->motivo == "PROBLEMAS FAMILIARES") {
                                    echo '<option value="CAMBIO DOMICILIO">CAMBIO DOMICILIO</option>
                                        <option value="PROBLEMAS DE DOCUMENTACIÓN">PROBLEMAS DE DOCUMENTACIÓN</option>
                                        <option value="PROBLEMAS FAMILIARES" selected>PROBLEMAS FAMILIARES</option>
                                        <option value="PÉRDIDA DE INTERÉS">PÉRDIDA DE INTERÉS</option>
                                        <option value="RAZONES DE FUERZA MAYOR">RAZONES DE FUERZA MAYOR</option>
                                        <option value="PROBLEMAS ECONÓMICOS">PROBLEMAS ECONÓMICOS</option>
                                        <option value="EN PROCESO DE MOVILIDAD HUMANA">EN PROCESO DE MOVILIDAD HUMANA</option>
                                        <option value="EN TRÁMITE">EN TRÁMITE</option>
                                    ';
                                }elseif ($datos->motivo	== "PÉRDIDA DE INTERÉS") {
                                    echo '<option value="CAMBIO DOMICILIO">CAMBIO DOMICILIO</option>
                                        <option value="PROBLEMAS DE DOCUMENTACIÓN">PROBLEMAS DE DOCUMENTACIÓN</option>
                                        <option value="PROBLEMAS FAMILIARES">PROBLEMAS FAMILIARES</option>
                                        <option value="PÉRDIDA DE INTERÉS" selected>PÉRDIDA DE INTERÉS</option>
                                        <option value="RAZONES DE FUERZA MAYOR">RAZONES DE FUERZA MAYOR</option>
                                        <option value="PROBLEMAS ECONÓMICOS">PROBLEMAS ECONÓMICOS</option>
                                        <option value="EN PROCESO DE MOVILIDAD HUMANA">EN PROCESO DE MOVILIDAD HUMANA</option>
                                        <option value="EN TRÁMITE">EN TRÁMITE</option>
                                    ';
                                }elseif ($datos->motivo == "RAZONES DE FUERZA MAYOR") {
                                    echo '<option value="CAMBIO DOMICILIO">CAMBIO DOMICILIO</option>
                                        <option value="PROBLEMAS DE DOCUMENTACIÓN">PROBLEMAS DE DOCUMENTACIÓN</option>
                                        <option value="PROBLEMAS FAMILIARES">PROBLEMAS FAMILIARES</option>
                                        <option value="PÉRDIDA DE INTERÉS">PÉRDIDA DE INTERÉS</option>
                                        <option value="RAZONES DE FUERZA MAYOR" selected>RAZONES DE FUERZA MAYOR</option>
                                        <option value="PROBLEMAS ECONÓMICOS">PROBLEMAS ECONÓMICOS</option>
                                        <option value="EN PROCESO DE MOVILIDAD HUMANA">EN PROCESO DE MOVILIDAD HUMANA</option>
                                        <option value="EN TRÁMITE">EN TRÁMITE</option>
                                    ';
                                }elseif ($datos->motivo == "PROBLEMAS ECONÓMICOS") {
                                    echo '<option value="CAMBIO DOMICILIO">CAMBIO DOMICILIO</option>
                                        <option value="PROBLEMAS DE DOCUMENTACIÓN">PROBLEMAS DE DOCUMENTACIÓN</option>
                                        <option value="PROBLEMAS FAMILIARES">PROBLEMAS FAMILIARES</option>
                                        <option value="PÉRDIDA DE INTERÉS">PÉRDIDA DE INTERÉS</option>
                                        <option value="RAZONES DE FUERZA MAYOR">RAZONES DE FUERZA MAYOR</option>
                                        <option value="PROBLEMAS ECONÓMICOS" selected>PROBLEMAS ECONÓMICOS</option>
                                        <option value="EN PROCESO DE MOVILIDAD HUMANA">EN PROCESO DE MOVILIDAD HUMANA</option>
                                        <option value="EN TRÁMITE">EN TRÁMITE</option>
                                    ';
                                }elseif ($datos->motivo	== "EN PROCESO DE MOVILIDAD HUMANA") {
                                    echo '<option value="CAMBIO DOMICILIO">CAMBIO DOMICILIO</option>
                                        <option value="PROBLEMAS DE DOCUMENTACIÓN">PROBLEMAS DE DOCUMENTACIÓN</option>
                                        <option value="PROBLEMAS FAMILIARES">PROBLEMAS FAMILIARES</option>
                                        <option value="PÉRDIDA DE INTERÉS">PÉRDIDA DE INTERÉS</option>
                                        <option value="RAZONES DE FUERZA MAYOR">RAZONES DE FUERZA MAYOR</option>
                                        <option value="PROBLEMAS ECONÓMICOS">PROBLEMAS ECONÓMICOS</option>
                                        <option value="EN PROCESO DE MOVILIDAD HUMANA" selected>EN PROCESO DE MOVILIDAD HUMANA</option>
                                        <option value="EN TRÁMITE">EN TRÁMITE</option>
                                    ';
                                }elseif ($datos->motivo	== "EN TRÁMITE") {
                                    echo '<option value="CAMBIO DOMICILIO">CAMBIO DOMICILIO</option>
                                        <option value="PROBLEMAS DE DOCUMENTACIÓN">PROBLEMAS DE DOCUMENTACIÓN</option>
                                        <option value="PROBLEMAS FAMILIARES">PROBLEMAS FAMILIARES</option>
                                        <option value="PÉRDIDA DE INTERÉS">PÉRDIDA DE INTERÉS</option>
                                        <option value="RAZONES DE FUERZA MAYOR">RAZONES DE FUERZA MAYOR</option>
                                        <option value="PROBLEMAS ECONÓMICOS">PROBLEMAS ECONÓMICOS</option>
                                        <option value="EN PROCESO DE MOVILIDAD HUMANA">EN PROCESO DE MOVILIDAD HUMANA</option>
                                        <option value="EN TRÁMITE" selected>EN TRÁMITE</option>
                                    ';
                                }else {
                                    echo '<option value="CAMBIO DOMICILIO">CAMBIO DOMICILIO</option>
                                        <option value="PROBLEMAS DE DOCUMENTACIÓN">PROBLEMAS DE DOCUMENTACIÓN</option>
                                        <option value="PROBLEMAS FAMILIARES">PROBLEMAS FAMILIARES</option>
                                        <option value="PÉRDIDA DE INTERÉS">PÉRDIDA DE INTERÉS</option>
                                        <option value="RAZONES DE FUERZA MAYOR">RAZONES DE FUERZA MAYOR</option>
                                        <option value="PROBLEMAS ECONÓMICOS">PROBLEMAS ECONÓMICOS</option>
                                        <option value="EN PROCESO DE MOVILIDAD HUMANA">EN PROCESO DE MOVILIDAD HUMANA</option>
                                        <option value="EN TRÁMITE">EN TRÁMITE</option>
                                        <option value="NULL" selected>-- Registrar datos --</option>
                                    ';
                                }
                            }else{
                                echo '<option value="CAMBIO DOMICILIO">CAMBIO DOMICILIO</option>
                                        <option value="PROBLEMAS DE DOCUMENTACIÓN">PROBLEMAS DE DOCUMENTACIÓN</option>
                                        <option value="PROBLEMAS FAMILIARES">PROBLEMAS FAMILIARES</option>
                                        <option value="PÉRDIDA DE INTERÉS">PÉRDIDA DE INTERÉS</option>
                                        <option value="RAZONES DE FUERZA MAYOR">RAZONES DE FUERZA MAYOR</option>
                                        <option value="PROBLEMAS ECONÓMICOS">PROBLEMAS ECONÓMICOS</option>
                                        <option value="EN PROCESO DE MOVILIDAD HUMANA">EN PROCESO DE MOVILIDAD HUMANA</option>
                                        <option value="EN TRÁMITE">EN TRÁMITE</option>
                                        <option value="NULL" selected>-- Registrar datos --</option>
                                ';
                            }
                        ?>
                    
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="observacion">OBSERVACION:</label>
                    <?php
                        if (isset($datos->observacion) && $datos->observacion != null && $datos->observacion != '') {
                            echo '<textarea class="form-control" name="observacion" id="observacion" cols="30" rows="3">'.$datos->observacion.'</textarea>';
                        }else{
                            echo '<textarea class="form-control" name="observacion" id="observacion" cols="30" rows="3"></textarea>';
                        }
                    ?>
                </div>
            </div>
            

            <div class="row">
                <div class="col-md-5 mb-3">

                    <label for="amie">ELEGIR CENTRO EDUCATIVO (opcional):</label>
                    <select 
                        class="form-select" 
                        aria-label="Default select example" 
                        name="amie"
                        id="amie"  
                    >
                    <option value="NULL" selected>--Registrar dato--</option>
                    <?php
                        if ($datos) {
                            if ($centros != NULL && isset($centros) ) {
                                foreach ($centros as $key => $ce) {
                                    if ($ce->amie == $datos->amie) {
                                        echo '<option value="'.$ce->amie.'" selected>'.$ce->amie.' - '.$ce->nombre.'</option>';
                                    }else{
                                        echo '<option value="'.$ce->amie.'">'.$ce->amie.' - '.$ce->nombre.'</option>';
                                    }
                                }
                            }else{
                                echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                            }
                            
                        }else{
                            echo '<option value="NULL" selected>--Registrar dato--</option>';
                            foreach ($centros as $key => $ce) {
                                echo '<option value="'.$ce->amie.'">'.$ce->amie.' - '.$ce->nombre.'</option>';
                            }
                        }
                    ?>
                    </select>
                    
                </div>
            </div>
            <div class="row">
                <label for="nuevo-ce" id="lbl_opcional">Registrar un nuevo Centro Educativo (opcional):</label>
                <div class="col-sm-2 mb-3">
                    <input class="form-control" type="text" name="nuevo_amie" id="nuevo_amie" placeholder="AMIE">
                </div>
                <div class="col-sm-4 mb-3">
                    <input class="form-control" type="text" name="nuevo_centro_educativo" id="nuevo_centro_educativo" placeholder="NOMBRE">
                </div>
                <div class="col-sm-3 mb-3">
                    <select 
                        class="form-select" 
                        aria-label="Default select example" 
                        name="idciudades"
                        id="idciudades"
                        required  
                    >
                    <?php
                        if ($datos) {
                            if ($ciudades != NULL && isset($ciudades) ) {
                                foreach ($ciudades as $key => $ciudad) {
                                    if ($ciudad['idciudades'] == $datos->idciudades) {
                                        echo '<option value="'.$ciudad['idciudades'].'" selected>'.$ciudad['ciudad'].'</option>';
                                    }else{
                                        echo '<option value="'.$ciudad['idciudades'].'">'.$ciudad['ciudad'].'</option>';
                                    }
                                }
                            }else{
                                echo '<option value="NULL" selected>Hubo un errror, no se cargaron los datos</option>';
                            }
                        }else{
                            echo '<option value="NULL" selected>--Elegir una ciudad--</option>';
                            foreach ($ciudades as $key => $ciudad) {
                                echo '<option value="'.$ciudad['idciudades'].'">'.$ciudad['ciudad'].'</option>';
                            }
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="anio_egb">AÑO ESCOLAR:</label>
                    <select 
                        class="form-select" 
                        aria-label="Default select example" 
                        name="anio_egb" 
                        id="anio_egb"  
                    >
                    <option value="NULL" selected>Registrar dato</option>
                        <?php
                            if ($datos) {
                                foreach ($cursos as $key => $c) {
                                    echo '<option value="'.$c->id.'">'.$c->curso.'</option>';
                                    if ($c->id == $datos->anio_egb) {
                                        echo '<option value="'.$c->id.'" selected>'.$c->curso.'</option>';
                                    }else{
                                        echo '<option value="'.$c->id.'">'.$c->curso.'</option>';
                                    }
                                }
                            }else{
                                echo '<option value="NULL" selected>Registrar dato</option>';
                                foreach ($cursos as $key => $c) {
                                    echo '<option value="'.$c->id.'">'.$c->curso.'</option>';
                                }
                            }
                            
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="modalidad">MODALIDAD:</label>
                    <select name="modalidad" class="form-control" id="modalidad" aria-label="modalidad">
                        <?php
                            if ($datos != NULL && isset($datos)) {
                                if ($datos->modalidad == "EDUCACIÓN REGULAR") {
                                    echo '<option value="EDUCACIÓN REGULAR" selected>EDUCACIÓN REGULAR</option>
                                            <option value="EDUCACIÓN FLEXIBLE ACELERADA">EDUCACIÓN FLEXIBLE ACELERADA</option>
                                            <option value="DISTANCIA">DISTANCIA</option>

                                    ';
                                }elseif ($datos->modalidad	== "EDUCACIÓN FLEXIBLE ACELERADA") {
                                    echo '<option value="EDUCACIÓN REGULAR">EDUCACIÓN REGULAR</option>
                                        <option value="EDUCACIÓN FLEXIBLE ACELERADA" selected>EDUCACIÓN FLEXIBLE ACELERADA</option>
                                        <option value="DISTANCIA">DISTANCIA</option>
                                    ';
                                }elseif ($datos->modalidad == "DISTANCIA") {
                                    echo '<option value="EDUCACIÓN REGULAR">EDUCACIÓN REGULAR</option>
                                        <option value="EDUCACIÓN FLEXIBLE ACELERADA">EDUCACIÓN FLEXIBLE ACELERADA</option>
                                        <option value="DISTANCIA" selected>DISTANCIA</option>
                                    ';
                                }else {
                                    echo '<option value="EDUCACIÓN REGULAR">EDUCACIÓN REGULAR</option>
                                        <option value="EDUCACIÓN FLEXIBLE ACELERADA">EDUCACIÓN FLEXIBLE ACELERADA</option>
                                        <option value="DISTANCIA">DISTANCIA</option>
                                        <option value="NULL" selected>-- Registrar datos --</option>
                                    ';
                                }
                            }else{
                                echo '<option value="EDUCACIÓN REGULAR">EDUCACIÓN REGULAR</option>
                                        <option value="EDUCACIÓN FLEXIBLE ACELERADA">EDUCACIÓN FLEXIBLE ACELERADA</option>
                                        <option value="DISTANCIA">DISTANCIA</option>
                                        <option value="NULL" selected>-- Registrar datos --</option>
                                    ';
                            }
                        ?>
                    
                    </select>
                </div>
            </div>
            
            <?= form_hidden('idProd4', $id);  ?>
            <button type="submit" class="btn btn-info mb-3">Guardar</button>
        </form>
        <button onclick="history.back()" class="btn btn-success mb-3">Regresar</button>
    </div>
    
</main>
<script>
    $(document).ready(function(){
        jQuery('.number').keypress(function(tecla){
            if(tecla.charCode < 48 || tecla.charCode > 57){
                return false;
            }
        });
    });
</script>