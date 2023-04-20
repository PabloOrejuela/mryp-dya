<main class="container px-0">
    <div class="container-fluid px-0">
        <h3 class="mt-4"><?= esc($title); ?></h3>
                    
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-cash-register"></i>
                <?= esc("Componente 1 - Click en el NOMBRE para ver y editar datos del registro"); ?>
            </div>
            <div class="card-body"> 
            <table class="table table-bordered table-striped table-hover" id="table">
                    <thead>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Edad</th>
                        <th>Género</th>
                        <th>Discapacidad</th>
                        <th>Fecha Nac</th>
                        <th>Amie</th>
                        <th>Año EGB</th>
                        <th>Representante</th>
                        <th>Registrar proceso</th>
                    </thead>
                <?php
                    if (isset($componente_1) && $componente_1 != NULL) {
                        foreach ($componente_1 as $key => $value) {
                            echo '<tr>
                                <td>'.$value->id.'</td>
                                <td><a href="'.site_url().'prod_1_edit/'.$value->id.'">'.$value->nombres.' '.$value->apellidos.'</a></td>
                                <td>'.$value->documento.'</td>
                                <td>'.$value->edad.'</td>
                                <td>'.$value->genero.'</td>
                                <td>'.$value->discapacidad.'</td>
                                <td>'.$value->fecha_nac.'</td>
                                <td>'.$value->amie.'</td>
                                <td>'.$value->anio_egb.'</td>
                                <td>'.$value->representante.'</td>
                                <td>
                                    <div class="contenedor">
                                        <a type="button" id="btn-register" href="'.site_url().'prod-1-reg-proceso/'.$value->id.'" class="edit">
                                            <img src="'.site_url().'public/images/reg-process.png" >
                                        </a>
                                    </div>
                                </td>';
                        }
                    }
                    
                ?>
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