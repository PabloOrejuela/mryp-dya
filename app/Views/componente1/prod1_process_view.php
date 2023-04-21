<main class="container px-0">
    <div class="container-fluid px-0">
        <h3 class="mt-4"><?= esc($title); ?></h3>
                    
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-cash-register"></i>
                <?= esc("Componente 1 - Ingreso y edición de variables de diagnóstico, proceso y evaluación"); ?>
            </div>
            <div class="card-body"> 
                <table class="table table-bordered table-striped table-hover" id="table">
                    <thead>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Amie</th>
                        <th>Registro de Diagnosticos</th>
                        <th>Registro de Procesos</th>
                        <th>Evaluación</th>
                    </thead>
                    <tbody>
                    <?php
                        if (isset($componente_1) && $componente_1 != NULL) {
                            foreach ($componente_1 as $key => $value) {
                                echo '<tr>
                                    <td>'.$value->id.'</td>
                                    <td>'.$value->nombres.' '.$value->apellidos.'</td>
                                    <td>'.$value->documento.'</td>
                                    <td>'.$value->amie.'</td>
                                    <td>
                                        <div class="contenedor">
                                            <a type="button" id="btn-register" href="'.site_url().'prod-1-reg-diagnostico/'.$value->id.'" class="edit">
                                                <img src="'.site_url().'public/images/test.png" >
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="contenedor">
                                            <a type="button" id="btn-register" href="'.site_url().'prod-1-reg-proceso/'.$value->id.'" class="edit">
                                                <img src="'.site_url().'public/images/reg-process.png" >
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="contenedor">
                                            <a type="button" id="btn-register" href="'.site_url().'prod-1-reg-eval-final/'.$value->id.'" class="edit">
                                                <img src="'.site_url().'public/images/eval-final.png" >
                                            </a>
                                        </div>
                                    </td></tr>';
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