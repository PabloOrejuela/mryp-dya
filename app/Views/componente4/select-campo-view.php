<select 
    class="form-select" 
    aria-label="Default select example" 
    name=<?= $campo;?> 
>
    <?php

        if ($valor != NULL) {
            if ($valor == 'A') {
                echo '<option value="A" selected>EXCELENTE</option>
                        <option value="B">BUENA</option>
                        <option value="C">REGULAR</option>
                        <option value="D">EN PROCESO</option>
                ';
            }elseif ($valor == 'B') {
                echo '<option value="A">EXCELENTE</option>
                        <option value="B" selected>BUENA</option>
                        <option value="C">REGULAR</option>
                        <option value="D">EN PROCESO</option>
                ';
            }elseif ($valor == 'C') {
                echo '<option value="A">EXCELENTE</option>
                        <option value="B">BUENA</option>
                        <option value="C" selected>REGULAR</option>
                        <option value="D">EN PROCESO</option>
                ';
            }elseif ($valor == 'D') {
                echo '<option value="A">EXCELENTE</option>
                        <option value="B">BUENA</option>
                        <option value="C">REGULAR</option>
                        <option value="D" selected>EN PROCESO</option>
                ';
            }elseif ($valor == NULL || $valor == '0') {
                echo '<option value="NULL" selected>-- Registrar dato --</option>
                    <option value="A">EXCELENTE</option>
                    <option value="B">BUENA</option>
                    <option value="C">REGULAR</option>
                    <option value="D">EN PROCESO</option>
                ';
            }
        }else{
            echo '<option value="NULL" selected>-- Registrar dato --</option>
                <option value="A">EXCELENTE</option>
                <option value="B">BUENA</option>
                <option value="C">REGULAR</option>
                <option value="D">EN PROCESO</option>
            ';
        }
        
    ?>
</select>