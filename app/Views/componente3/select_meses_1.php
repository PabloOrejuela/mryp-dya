<select 
    class="form-select" 
    aria-label="Default select example" 
    name=<?= $campo;?> 
>
    <?php
        echo '<option value="1">Enero</option>
        <option value="2">Febrero</option>
        <option value="3">Marzo</option>
        <option value="4">Abril</option>
        <option value="5">Mayo</option>
        <option value="6">Junio</option>
        <option value="7">Julio</option>
        <option value="8">Agosto</option>
        <option value="9">Septiembre</option>
        <option value="10">Octubre</option>
        <option value="11">Noviembre</option>
        <option value="12">Diciembre</option>
        <option value="0" selected>-MES-</option>
        ';
    ?>
</select>