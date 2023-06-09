<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Ciudad</th>
        <th>Provincia</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($ciudades as $data) {  ?>
      <tr></tr>
        <td><?php echo $data->idciudades; ?></td>
        <td><?php echo $data->ciudad; ?></td>
        <td><?php echo $data->idprovincias; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>