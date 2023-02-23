<br>
<br>
<br>
<br>
<br>
<br>
<button type="button" class="btn btn-primary crear-rol">Crear nuevo rol</button>
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





<div class="modal fade  crear_rol_modal" tabindex="-1"  aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <form class="row g-3" method="POST" enctype="multipart/form-data">
        <h2 style="font-weight: bold;">Registro de un nuevo rol de usuario</h2>
        <div class="col-md-4">
                        <label for="inputNombre" class="form-label">Nombre del rol de usuario:</label>
                        <div class="d-flex">
                            <input type="text" class="form-control" id="imputNombre" /required name="nombre" maxlength="50" placeholder="Escriba el nombre">
                        </div>
                        <?php if (isset($datos['errorRol'])) { ?>
                            <div class="alert alert-danger"> <?= $datos['errorRol'] ?></div>
                        <?php } ?>
                    </div>

                    <!-- aco -->
                    <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Accordion Item #1
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>


              
            </div>
        <!-- aco -->
        
           </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary save-rol">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
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

