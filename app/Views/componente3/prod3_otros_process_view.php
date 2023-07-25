<main class="container px-2">
    <div class="container-fluid px-0">
        <h3 class="mt-4"><?= esc($title); ?></h3>
                    
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-cash-register"></i>
                <?= esc("Componente 3 - Ingreso y edición de - Biblioteca viajera y otras actividades"); ?>
            </div>
            <div class="card-body"> 
                <table class="table table-bordered table-striped table-hover" id="datatablesSimple">
                    <thead>
                        <th>No.</th>
                        <th>Amie</th>
                        <th>Centro Educativo</th>
                        <th>Editar Datos</th>
                    </thead>
                    <tbody>
                    <?php
                        //Llamo al modelo
                        use App\Models\CentroEducativoModel;
                        $this->centroEducativoModel = new CentroEducativoModel();
                        $num = 1;
                        
                        if (isset($centros) && $centros != NULL) {
                            foreach ($centros as $key => $value) {
                                echo '<tr>
                                    <td>'.$num.'</td>
                                    <td>'.$value->amie.'</td>
                                    <td>'.$value->nombre.'</td>
                                    <td>
                                        <div class="contenedor">
                                            <a type="button" id="btn-register" href="'.site_url().'prod3-form-biblioteca/'.$value->amie.'" class="edit">
                                                <img src="'.site_url().'public/images/test.png" height="25" >
                                            </a>
                                        </div>
                                    </td>
                                    </tr>';
                                    $num++;
                            }
                        }
                        
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>