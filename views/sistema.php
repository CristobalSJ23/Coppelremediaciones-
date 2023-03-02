<br><br><br><br><br>
<table class="table">
<thead>
  <tr>
    <th scope="col">#</th>   
    <th scope="col">Sistema</th>
    <th scope="col">URL</th>
    <th scope="col">Checkmarx</th>
    <th scope="col">Estatus</th>
    <th scope="col">Aprobado</th>
    <th scope="col">Fuente</th>
    <th scope="col">Observacion</th>
    <th scope="col">Acciones</th>
  </tr>
</thead>
<tbody>
    
    <?php 
    foreach($res['id'] as $i => $r){
    ?>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td class="nombreSistema<?=$r?>"  data-id="<?=$r?>"> <?php echo $res['nombre'][$i] ?> </td>
      <td class="url<?=$r?>"  data-id="<?=$r?>"> <?php echo $res['url'][$i] ?> </td>
      <td class="checkmarx<?=$r?>"  data-id="<?=$r?>"> <?php echo $res['checkmarx'][$i] ?> </td>
      <td class="estatus<?=$r?>"  data-id="<?=$r?>"> 
        
        <select class="estatusCat<?= $r ?>">
          <?php foreach($catalogosEstatus['id'] as $c => $catE) { ?>
          <option value="<?= $catE ?>" <?php if($catE == $res['id_catE'][$i]) { echo "selected"; } ?>> <?= $catalogosEstatus['estatus'][$c] ?> </option>
          <?php } ?>
        </select>

      </td>
      <td class="aprovado<?=$r?>"  data-id="<?=$r?>"> <?php echo $res['aprovado'][$i] ?> </td>
      <td class="fuente<?=$r?>"  data-id="<?=$r?>"> <?php echo $res['fuente'][$i] ?> </td>
      <td class="observacion<?=$r?>"  data-id="<?=$r?>"> <?php echo $res['observacion'][$i] ?> </td>
      <td>
          <div class="row editar_acciones_<?= $r ?>" style="width:100%;"> 
              <div class="col"><i class="bi bi-check2-circle editar btn" data-id="<?=$r?>"></i></div> 
          </div> 
      </td>
    </tr>
    <?php } ?>
</tbody>

</table>

