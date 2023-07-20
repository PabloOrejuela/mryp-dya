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
                <?php echo '<span id="titulo-componente">Componente 4 - Click en el NOMBRE para ver y editar datos del registro</span>'; ?>
            </div>
            <div class="card-header">
                <a type="button" id="btn-register" href="<?= /*site_url().*/'prod-4-create/'; ?>" class="edit">
                    <img src="<?= site_url().'public/images/new.png'; ?>" >
                    <span id="title-link">Crear un nuevo registro</span>
                </a>
            </div>           
            <div class="card-body"> 
                <table class="table table-bordered table-striped table-hover" id="table">
                    <thead>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Documento</th>
                    </thead>
                    <tbody>
                    <?php
                        //Llamo al modelo
                        use App\Models\CentroEducativoModel;
                        $this->centroEducativoModel = new CentroEducativoModel();

                        if (isset($componente_4) && $componente_4 != NULL) {
                            foreach ($componente_4 as $key => $value) {

                                echo '<tr>
                                    <td>'.$value->id.'</td>
                                    <td><a href="'.site_url().'prod_4_edit/'.$value->id.'">'.$value->apellidos.' '.$value->nombres.'</a></td>
                                    <td>'.$value->documento.'</td>';
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
                    info: 'Mostrando desde _START_ hasta _END_ de _MAX_',
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