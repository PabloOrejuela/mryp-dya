<select name="ciudad" id="ciudad" class="form-select" style="width: 40%">
    <option value="NULL">--Seleccionar ciudad--</option>
    <?php 
      foreach($ciudades as $data) {
        echo '<option value="'.$data->idciudades.'">'.$data->ciudad.'</option>';
      } 
    ?>
</select>

<div id="centros" class="mt-3">
  
</div>
<script>
  $(document).ready(function(){
        $("#ciudad").change(function(){
            if($("#ciudad").val() !=""){
                valor = $("#ciudad").val();
                $.ajax({
                    type:"POST",
                    dataType:"html",
                    url: "<?php echo site_url(); ?>reportes/centros_ciudades_select",
                    data:"idciudades="+valor,
                    beforeSend: function (f) {
                        $('#centros').html('Cargando ...');
                    },
                    success: function(data){
                        $('#centros').html(data);
                    }
                });
            }
        })
    })

</script>
