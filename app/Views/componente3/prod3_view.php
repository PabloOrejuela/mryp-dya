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
                <?php echo '<span id="titulo-componente">Componente 3 - Click en el NOMBRE para ver y editar datos del registro</span>'; ?>
            </div><div class="card-header">
                <a type="button" id="btn-register" href="<?= site_url().'prod-3-create/'; ?>" class="edit">
                    <img src="<?= site_url().'public/images/new.png'; ?>" >
                    <span id="title-link">Crear un nuevo registro</span>
                </a>
            </div>           
            <div class="card-body"> 
                <table class="table table-bordered table-striped table-hover" id="datatablesSimple">
                    <thead>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Amie</th>
                        <th>Centro educativo</th>
                        <th>Provincia</th>
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
                                    <td><a href="'.site_url().'prod_3_edit/'.$value->id.'">'.$value->nombre.'</a></td>
                                    <td>'.$value->documento.'</td>
                                    <td>'.$value->amie.'</td>
                                    <td>'.$centro_educativo->nombre.'</td>
                                    <td>'.$provincia->provincia.'</td>';
                            }
                        }
                        
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>