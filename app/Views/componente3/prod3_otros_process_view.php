<main class="container px-2">
    <div class="container-fluid px-0">
        <h3 class="mt-4"><?= esc($title); ?></h3>
                    
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-cash-register"></i>
                <?= esc("Componente 3 - Ingreso y edición de - Biblioteca viajera y otras actividades"); ?>
            </div>
            <div class="card-body"> 
                <table class="table table-bordered table-striped table-hover" id="table">
                    <thead>
                        <th>No.</th>
                        <th>Amie</th>
                        <th>Centro Educativo</th>
                        <th>Provincia</th>
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
                                $provincia = $this->centroEducativoModel->_getProvinciaCentro($value->idparroquia);
                                echo '<tr>
                                    <td>'.$num.'</td>
                                    <td>'.$value->amie.'</td>
                                    <td>'.$value->nombre.'</td>
                                    <td>'.$value->provincia.'</td>
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