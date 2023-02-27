<br><br><br><br><br>
<table class="table">
<thead>
  <tr>
    <th scope="col">#</th>   
    <th scope="col">Nombre</th>
    <th scope="col">A. Paterno</th>
    <th scope="col">A. Materno</th>
    <th scope="col">Usuario</th>
    <th scope="col">Correo</th>
    <th scope="col">Registro</th>
    <th scope="col">Baja</th>
    <th scope="col">Estatus</th>
    <th scope="col">Acciones</th>
  </tr>
</thead>
<tbody>
<?php
foreach($res['id_usuario'] as $i => $r){
    ?>


<tr>
      <th scope="row"> <?php echo $i; ?> </th>
      <td class="editar_nombre_<?= $r ?>" data-id="<?=$r?>"><?php echo $res['nombre'][$i] ?></td>
      <td class="apt_pat<?= $r ?>"><?php echo $res['apt_pat'][$i]; ?></td>
      <td class="apt_mat<?= $r ?>"><?php echo $res['apt_mat'][$i]; ?></td>
      <td class="tipo_usuario<?= $r ?>"><?php echo $res['tipo_usuario'][$i]; ?></td>
      <td class="correo<?= $r ?>"><?php echo $res['correo'][$i]; ?></td>
      <td class="fecha_reg<?= $r ?>"><?php echo $res['fecha_reg'][$i]; ?></td>
      <td><?php echo $res['fecha_de'][$i]; ?></td>
      <td class="<?=$res['bg'][$i];?> editar_estatus_<?= $r ?>" data-id="<?=$r?>" data-color="<?=$res['bg'][$i];?>"><?php echo $res['estatusUser'][$i]; ?></td>
      <td>
          <div class="row editar_acciones_<?= $r ?>" style="width:100%;"> 
              <div class="col"><i class="bi bi-pencil-square editar btn" data-id="<?=$r?>"></i></div> 
              <div class="col"><i class="eliminar bi bi-trash btn" data-id="<?=$r?>"></i></div>
          </div> 
          <div class="row editar_acciones_cancelar<?= $r ?>" style="display:none;"> 
              <div class="col">  <i class="bi bi-check2-circle btn save" data-id="<?= $r ?>"></i> </div> 
              <div class="col"><i class="bi bi-x-circle cancelar btn" data-id="<?=$r?>" data-nombre="<?= $res['nombre'][$i] ?>" data-paterno="<?=$res['apt_pat'][$i] ?>" 
              data-materno="<?=$res['apt_mat'][$i] ?>" data-tipousuario="<?=$res['tipo_usuario'][$i] ?>" data-correo="<?=$res['correo'][$i] ?>" data-estatus="<?= $res['estatusUser'][$i];  ?>" data-color="<?= $res['bg'][$i]; ?>"></i></div>
              <div class="col"><i class="eliminar bi bi-trash btn" data-id="<?=$r?>"></i></div>
            </div> 
      </td>
    </tr>
<?php }?>
</tbody>
</table>

