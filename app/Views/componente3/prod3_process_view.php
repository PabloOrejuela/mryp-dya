<main class="container px-2">
    <div class="container-fluid px-0">
        <h3 class="mt-4"><?= esc($title); ?></h3>
                    
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-cash-register"></i>
                <?= esc("Componente 3 - Ingreso y edición de variables de proceso"); ?>
            </div>
            <div class="card-body"> 
                <table class="table table-bordered table-striped table-hover" id="table">
                    <thead>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Amie</th>
                        <th>Centro Educativo</th>
                        <th>Provincia</th>
                        <th>E. Arística</th>
                        <th>Lenguaje</th>
                        <th>Ciudadanía</th>
                        <th>Otros</th>
                    </thead>
                    <tbody>
                    <?php
                        //Llamo al modelo
                        use App\Models\CentroEducativoModel;
                        $this->centroEducativoModel = new CentroEducativoModel();

                        if (isset($componente_3) && $componente_3 != NULL) {
                            foreach ($componente_3 as $key => $value) {
                                $centro_educativo = $this->centroEducativoModel->find($value->amie);
                                $provincia = $this->centroEducativoModel->_getProvinciaCentro($centro_educativo->idparroquia);
                                echo '<tr>
                                    <td>'.$value->id.'</td>
                                    <td>'.$value->nombre.'</td>
                                    <td>'.$value->amie.'</td>
                                    <td>'.$centro_educativo->nombre.'</td>
                                    <td>'.$provincia->provincia.'</td>
                                    <td>
                                        <div class="contenedor">
                                            <a type="button" id="btn-register" href="'.site_url().'prod-3-arte/'.$value->id.'" class="edit">
                                                <img src="'.site_url().'public/images/exp-artistica.png" height="25" >
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="contenedor">
                                            <a type="button" id="btn-register" href="'.site_url().'prod-3-lenguaje/'.$value->id.'" class="edit">
                                                <img src="'.site_url().'public/images/taller.png" height="25" >
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="contenedor">
                                            <a type="button" id="btn-register" href="'.site_url().'prod-3-ciudadania/'.$value->id.'" class="edit">
                                                <img src="'.site_url().'public/images/ciudadania.png" height="25" >
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="contenedor">
                                            <a type="button" id="btn-register" href="'.site_url().'prod-3-otros/'.$value->id.'" class="edit">
                                                <img src="'.site_url().'public/images/test.png" height="25" >
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

    <script type="text/javascript">
        $(document).ready(function () {
            $('#table').DataTable({
                language: {
                    processing: 'Procesando...',
                    lengthMenu: 'Mostrando _MENU_ registros por página',
                    zeroRecords: 'No hay registros',
                    info: 'Mostrando _PAGE_ de _PAGES_',
                    infoEmpty: 'No hay registros disponibles',
                    infoFiltered: '(filtrando de _MAX_ total registros)',
                    search: 'Buscar',
                    paginate: {
                    first:      "Primero",
                    previous:   "Anterior",
                    next:       "Siguiente",
                    last:       "Último"
                        },
                        aria: {
                            sortAscending:  ": activar para ordenar ascendentemente",
                            sortDescending: ": activar para ordenar descendentemente"
                        }
                },
            });
        });
    </script>