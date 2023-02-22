
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      
      <th scope="col">Nombre</th>
      <th scope="col">Fecha De Registro</th>
      <th scope="col">Fecha De Actualizacion</th>
      <th scope="col">Fecha De Baja</th>
      <th scope="col">Estatus</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>

  <?php
  echo "<br><br><br><br><br>";
 
  //
  //exit;
// echo "<pre>";
//   var_dump($res);
//   echo "</pre>";
    foreach($res['id'] as $i=>$r ){ 
        // echo $r['nombre']; 
        // exit; 
        ?>
    
    <tr>
      <th scope="row"> <?php echo $i; ?> </th>
      <td><?php echo $res['nombre'][$i] ?></td>
      <td><?php echo $res['fecha_reg'][$i]; ?></td>
      <td><?php echo $res['fecha_up'][$i]; ?></td>
      <td><?php echo $res['fecha_de'][$i]; ?></td>
      <td class="<?=$res['bg'][$i];?>"><?php echo $res['estatus'][$i]; ?></td>
      <td><button class="editar" data-id="<?=$r?>">Editar</button><br/>
      <button class="eliminar" data-id="<?=$r?>">Eliminar</button></td>
    </tr>
    <?php } ?>



  </tbody>
</table>





<div class="modal fade bd-example-modal-lg editar_rol" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

