<main class="container">
    <div class="container-fluid px-4">
        <h3 class="mt-4"><?= esc($title).' - REPORTES'; ?></h3>
        <div class="card mb-6">
            <div class="card-body" id="card-reportes">
            <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <section>
                    <select name="provincia" id="provincia" class="form-select" style="width: 40%">
                        <option value="0">--Seleccionar provincia--</option>
                        <?php
                            
                            foreach ($provincias as $key => $value) {
                                echo '<option value="'.$value->idprovincias.'">'.$value->provincia.'</option>';
                            }
                        ?>
                    </select>
                    <div id="ciudades" class="mt-3"> </div>
                </section>

            </div>
            <section>
                <div class="col-md-03" style="width: 400px;">
                    <canvas id="myChart" width="300" height="300"></canvas>
                </div>
            </section>
        </div>
    </div>
</main>

<script>

$(document).ready(function(){
        $("#provincia").change(function(){
            if($("#provincia").val() !=""){
                valor = $("#provincia").val();
                $.ajax({
                    type:"POST",
                    dataType:"html",
                    url: "<?php echo site_url(); ?>reportes/ciudades_select",
                    data:"idprovincia="+valor,
                    beforeSend: function (f) {
                        $('#ciudades').html('Cargando ...');
                    },
                    success: function(data){
                        $('#ciudades').html(data);
                    }
                });
            }
        })
    })

</script>
