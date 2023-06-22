<?php
    if ($valor != NULL) {
        echo '<input type="date" name="'.$campo.'" value="'.$valor.'" class="form-control" aria-label="'.$campo.'" >';
    }else{
        echo '<input type="date" name="'.$campo.'" value="0" class="form-control" aria-label="'.$campo.'" >';
    }
?>
