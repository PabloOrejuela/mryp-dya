<div class="container">
  <div class="row">
    <div class="col-md-4  mt-6">
      <p>
          <a href="#" id="marcarTodo" onclick="seleccionarTodo()">Marcar todos los CE</a> |
          <a href="#" id="desmarcarTodo" onclick="deseleccionarTodo()">Desmarcar todos los CE</a>
      </p>
      <div class="container-md mt-3">
        <?php 
          foreach($centros as $data) {
            echo ' 
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="'.$data->amie.'" id="centro-check" name="centros[]">
                <label class="form-check-label" for="flexCheckDefault">
                  '.$data->amie.'-'.$data->nombre.'
                </label>
              </div>
              ';
          } 
        ?>
      </div>
    </div>
    <div class="col-md-4 mt-6">
      <div class="container-md mt-3"> 
        <p>
            <label>NIVELES (No seleccionar para obtener todos)</label>
        </p>
        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="nivel">
          <option value="0" selected>-- Todos los niveles--</option>
          <option value="1">Nivel 1 (3do EGB - 4to EGB)</option>
          <option value="2">Nivel 2 (5to EGB - 7mo EGB)</option>
          <option value="3">Nivel 3 (8vo EGB - 10mo EGB)</option>
          <option value="4">Nivel 4 (10mo EGB - 3ero BACH)</option>
        </select>
      </div>
    </div>
  </div>
</div>

<script>

  function seleccionarTodo() {
      document.querySelectorAll('#centro-check').forEach(function(checkElement) {
          checkElement.checked = true;
      });
  }

  function deseleccionarTodo() {
      document.querySelectorAll('#centro-check').forEach(function(checkElement) {
          checkElement.checked = false;
      });
  }
</script>


