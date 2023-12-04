<style>
    #title-link{
    text-decoration: none;
}
</style>
<main class="container px-2">
    <div class="container-fluid px-0">
        <h3 class="mt-4"><?= esc($title); ?></h3>
                    
        <div class="card mb-4">
            <div class="card-header">
                <?php echo '<span id="titulo-componente">Componente 1 - Click en el NOMBRE para ver y editar datos del registro</span>'; ?>
            </div>
            <div class="card-header">
                <a type="button" id="btn-register" href="<?= site_url().'prod-1-create/'; ?>" class="edit">
                    <img src="<?= site_url().'public/images/new.png'; ?>" >
                    <span id="title-link">Registrar un nuevo estudiante</span>
                </a>
            </div>           
            <div class="card-body"> 
                <table class="table table-bordered table-striped table-hover" id="table">
                    <thead>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Amie</th>
                        <th>Centro educativo</th>
                        <th>Cohorte</th>
                        <th>Fecha Nac</th>
                        <th>Tutor</th>
                        <th>Tutor 2</th>
                    </thead>
                    <tbody>
                    <?php
                        //Llamo al modelo
                        use App\Models\CentroEducativoModel;
                        $this->centroEducativoModel = new CentroEducativoModel();

                        if (isset($componente_1) && $componente_1 != NULL) {
                            foreach ($componente_1 as $key => $value) {
                                $centro_educativo = $this->centroEducativoModel->find($value->amie);
                                echo '<tr>
                                    <td>'.$value->id.'</td>
                                    <td><a href="'.site_url().'prod_1_edit/'.$value->id.'">'.$value->nombres.' '.$value->apellidos.'</a></td>
                                    <td>'.$value->amie.'</td>
                                    <td>'.$centro_educativo->nombre.'</td>
                                    <td>'.$value->cohorte.'</td>
                                    <td>'.$value->fecha_nac.'</td>
                                    <td>'.$value->tutor_apoyo.'</td>
                                    <td>'.$value->tutor_apoyo_2.'</td>
                                    </td>';
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