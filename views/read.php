
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
      <td class="editar_nombre_<?= $r ?>" data-id="<?=$r?>"><?php echo $res['nombre'][$i] ?></td>
      <td><?php echo $res['fecha_reg'][$i]; ?></td>
      <td><?php echo $res['fecha_up'][$i]; ?></td>
      <td><?php echo $res['fecha_de'][$i]; ?></td>
      <td class="<?=$res['bg'][$i];?> editar_estatus_<?= $r ?>" data-id="<?=$r?>" data-color="<?=$res['bg'][$i];?>"><?php echo $res['estatus'][$i]; ?></td>
      <td>
          <div class="row editar_acciones_<?= $r ?>" style="width:100%;"> 
              <div class="col"><i class="bi bi-pencil-square editar btn" data-id="<?=$r?>"></i></div> 
              <div class="col"><i class="eliminar bi bi-trash btn" data-id="<?=$r?>"></i></div>
          </div> 
          <div class="row editar_acciones_cancelar<?= $r ?>" style="display:none;"> 
              <div class="col">  <i class="bi bi-check2-circle btn save" data-id="<?= $r ?>"></i> </div> 
              <div class="col"><i class="bi bi-x-circle cancelar btn" data-id="<?=$r?>" data-nombre="<?= $res['nombre'][$i] ?>" data-estatus="<?= $res['estatus'][$i];  ?>" data-color="<?= $res['bg'][$i]; ?>"></i></div>
              <div class="col"><i class="eliminar bi bi-trash btn" data-id="<?=$r?>"></i></div>
            </div> 
      </td>
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

<div class="container text-center"> 
  <div class="row"> 
      <div class="col">Column</div> 
      <div class="col">Column</div>
    </div> 
</div>
<!-- Modal -->
<div class="modal fade" id="mensajeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje de sistema</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mensaje_sistema">
        ...
      </div>
    </div>
  </div>
</div>