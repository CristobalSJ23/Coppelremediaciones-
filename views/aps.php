<br><br><br><br><br>
<table class="table">
<thead>
  <tr>
    <th scope="col">#</th>   
    <th scope="col">Nombre</th>
    <th scope="col">Estatus</th>
    <th scope="col">Registro</th>
    <th scope="col">Acciones</th>
  </tr>
</thead>
<tbody>
    
    <?php 
    foreach($res['id'] as $i => $r){
    ?>
    <tr>
    <th scope="row"><?php echo $i ?></th>
    <td class="nombreAps<?=$r?>"  data-id="<?=$r?>"> <?php echo $res['nombre'][$i] ?> </td>
    <td class="<?=$res['colores_aps'][$i];?> estatusAps<?= $r ?>" data-id="<?=$r?>" data-color="<?=$res['colores_aps'][$i];?>"><?php echo $res['estatus_aps'][$i] ?></td>
    <td class="fechaReg<?=$r?>"><?php echo $res['fecha_reg'][$i]?></td>
    <td>
          <div class="row editar_acciones_<?= $r ?>" style="width:100%;"> 
              <div class="col"><i class="bi bi-pencil-square editar btn" data-id="<?=$r?>"></i></div> 
              <div class="col"><i class="eliminar bi bi-trash btn" data-id="<?=$r?>"></i></div>
          </div> 
          <div class="row editar_acciones_cancelar_<?= $r ?>" style="display:none;"> 
              <div class="col">  <i class="bi bi-check2-circle btn save" data-id="<?= $r ?>"></i> </div> 
              <div class="col"><i class="bi bi-x-circle cancelar btn" data-id="<?=$r?>" data-nombre="<?= $res['nombre'][$i] ?>"
              data-estatus="<?= $res['estatus_aps'][$i];  ?>" data-color="<?= $res['colores_aps'][$i]; ?>"></i></div>
              <div class="col"><i class="eliminar bi bi-trash btn" data-id="<?=$r?>"></i></div>
            </div> 
      </td>
    </tr>
    <?php } ?>
</tbody>

</table>