<select 
    class="form-select" 
    aria-label="Default select example" 
    name=<?= $campo;?> 
>
    <?php

        if ($valor != NULL) {
            if ($valor == 'SI') {
                echo '<option value="SI" selected>SI</option>
                        <option value="NO">NO</option>';
            }elseif ($valor == 'NO') {
                echo '<option value="SI">SI</option>
                        <option value="NO" selected>NO</option>';
            }elseif ($valor == NULL || $valor == '0') {
                echo '<option value="NULL" selected>-- Registrar dato --</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>';
            }
        }else{
            echo '<option value="NULL" selected>-- Registrar dato --</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>';
        }
        
    ?>
</select>