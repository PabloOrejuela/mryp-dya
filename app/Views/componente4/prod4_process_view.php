<style>
    .contenedor{
        margin-left:20px;
        margin-right:20px;
        font-size: 0.75em;
    }
</style>
<main class="contenedor px-2">
    <div class="container-fluid px-0">
        <h3 class="mt-4"><?= esc($title); ?></h3>
                    
        <div class="card mb-4">
            <div class="card-header">
                <?php echo '<span id="titulo-componente">Componente 4 - Click en el NOMBRE para ver y editar datos del registro</span>'; ?>
            </div>
            <div class="card-body"> 
                <table class="table table-responsive table-stripped table-hovered" id="datatablesSimple">
                    <thead>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Cohorte</th>
                        <th>Documento</th>
                        <th>Estado</th>
                        <th>Lengua</th>
                        <th>Matemática</th>
                        <th>Psicoemocional</th>
                        <th>Sesiones pedagógicas</th>
                        <th>Otros procesos</th>
                        <th>Otras atenciones</th>
                        <th>Resultados</th>
                    </thead>
                    <tbody>
                    <?php
                        if (isset($componente_4) && $componente_4 != NULL) {
                            foreach ($componente_4 as $key => $value) {
                                
                                echo '<tr>
                                    <td>'.$value->id.'</td>
                                    <td><a href="'.site_url().'prod_4_edit/'.$value->id.'">'.$value->nombres.'</a></td>
                                    <td>'.$value->cohorte.'</td>
                                    <td>'.$value->documento.'</td>';
                                    if ($value->estado == 1) {
                                        echo '<td>Activa</td>';
                                    }else if($value->estado == 2){
                                        echo '<td>No participó</td>';
                                    }else if($value->estado == 3){
                                        echo '<td>Retirada</td>';
                                    }else if($value->estado == 4){
                                        echo '<td>Finalizada</td>';
                                    }else{
                                        echo '<td>Sin estado</td>';
                                    }
                                echo '<td>
                                        <div class="contenedor">
                                            <a type="button" id="btn-register" href="'.site_url().'prod4-reg-lengua/'.$value->id.'" class="edit">
                                                <img src="'.site_url().'public/images/test.png" width="30">
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="contenedor">
                                            <a type="button" id="btn-register" href="'.site_url().'prod4-reg-mate/'.$value->id.'" class="edit">
                                                <img src="'.site_url().'public/images/eval-mate.png" width="30" >
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="contenedor">
                                            <a type="button" id="btn-register" href="'.site_url().'prod4-reg-psico/'.$value->id.'" class="edit">
                                                <img src="'.site_url().'public/images/psico.png" width="30" >
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="contenedor">
                                            <a type="button" id="btn-register" href="'.site_url().'prod4-reg-pedagogica/'.$value->id.'" class="edit">
                                                <img src="'.site_url().'public/images/pedagogicas.png" width="30" >
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="contenedor">
                                            <a type="button" id="btn-register" href="'.site_url().'prod4-reg-otros/'.$value->id.'" class="edit">
                                                <img src="'.site_url().'public/images/reg-process.png" width="30" >
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="contenedor">
                                            <a type="button" id="btn-register" href="'.site_url().'prod4-reg-atenciones/'.$value->id.'" class="edit">
                                                <img src="'.site_url().'public/images/atenciones.png" width="30" >
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="contenedor">
                                            <a type="button" id="btn-register" href="'.site_url().'prod4-reg-resultados/'.$value->id.'" class="edit">
                                                <img src="'.site_url().'public/images/resultados.png" width="30" >
                                            </a>
                                        </div>
                                    </td>
                                    </tr>';
                            }
                        }
                        
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
