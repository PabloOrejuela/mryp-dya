<main class="container px-2">
    <div class="container-fluid px-0">
        <h3 class="mt-4"><?= esc($title).' - Estudiantes DYA'; ?></h3>
                    
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-cash-register"></i>
                <?= esc("Componente 2 - Ingreso y edición de variables de Proceso"); ?>
            </div>
            <div class="card-body"> 
                <table class="table table-bordered table-striped table-hover" id="table">
                    <thead>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Amie</th>
                        <th>Centro educativo</th>
                        <th>Régimen</th>
                        <th>Documento</th>
                        <th>Registro de procesos</th>
                    </thead>
                    <tbody>
                    <?php
                        if (isset($nap2) && $nap2 != NULL) {
                            foreach ($nap2 as $key => $value) {
                                echo '<tr>
                                        <td>'.$value->id.'</td>
                                        <td><a href="'.site_url().'prod2-nap2-frm-edit/'.$value->id.'">'.$value->nombres.' '.$value->apellidos.'</a></td>
                                        <td>'.$value->amie.'</td>
                                        <td>'.$value->nombre.'</td>
                                        <td>'.$value->regimen.'</td>
                                        <td>'.$value->documento.'</td>
                                        <td>
                                            <div class="contenedor">
                                                <a type="button" id="btn-register" href="'.site_url().'nap2-reg-procesos-form/'.$value->id.'" class="edit">
                                                    <img src="'.site_url().'public/images/test.png" >
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