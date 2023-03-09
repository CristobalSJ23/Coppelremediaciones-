<br><br><br><br><br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Estatus</th>
      <th scope="col">APS</th>
      <th scope="col">Descripcion</th>
      <th scope="col">URL</th>
      <th scope="col">Arquitecto</th>
      <th scope="col">Programador</th>
      <th scope="col">Tester</th>
      <th scope="col">Gerente</th>
      <th scope="col">Usuario</th>
      <th scope="col">Jefe de Area</th>
      <th scope="col">Fecha y Hora</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($res['idpdp'] as $i => $id) {
      ?>
      <tr>
        <th scope="row">
          <?php echo $i + 1 ?>
        </th>
        <td class="estatus<?=$id?>"> 
          <?php echo $res['estatus'][$i] ?>
        </td>
        <td class="nombre<?=$id?>">
          <?php echo $res['nombre'][$i] ?>
        </td>
        <td class="descripcion<?=$id?>">
          <?php echo $res['descripcion'][$i] ?>
        </td>
        <td class="url<?=$id?>">
          <?php echo $res['url'][$i] ?>
        </td>
        <td class="arquitecto<?=$id?>">
          <?php echo $res['arquitecto'][$i] ?>
        </td>
        <td class="programador<?=$id?>">
          <?php echo $res['programador'][$i] ?>
        </td>
        <td class="tester<?=$id?>">
          <?php echo $res['tester'][$i] ?>
        </td>
        <td class="gerente<?=$id?>">
          <?php echo $res['gerente'][$i] ?>
        </td>
        <td class="usuario<?=$id?>">
          <?php echo $res['usuario'][$i] ?>
        </td>
        <td class="jefeArea<?=$id?>">
          <?php echo $res['jefeArea'][$i] ?>
        </td>
        <td class="fechapdp<?=$id?>">
          <?php echo $res['fecha_pdp'][$i] ?>
        </td>
        <td>
          <i class="editar bi bi-pencil-square btn  " data-id="<?= $id ?>"></i>
          <i class="eliminar bi bi-trash btn eliminar<?= $id ?>" data-id="<?= $id ?>"></i>

          <i class="save bi bi-check2-circle btn save<?= $id ?>" data-id="<?= $id ?>" style="display:none"></i>
          <i class="cancelar bi bi-x-circle btn cancelar<?= $id ?>" data-id="<?= $id ?>" style="display:none"></i>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<div class="modal fade editar_pdp_modal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edicion de Registro</h5>
        <button type="button" class="close cerrarModal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="formulario" id="formulario" method="POST">
          <div class="row">
            <div class="col-lg-4 col-xs-12">
              <h4 class="text-center">Informacion del sistema</h4>
              <div class="form-group">
                <label>Estatus:</label>
                  <!-- <input type="text" class="form-control" name="estatus_sis" id="estatus_sis" maxlength="50"> -->
                  <select>
                    <?php foreach($catalogosEstatus['id'] as $i => $id) { ?>
                      <option value="<?= $id ?>"><?= $catalogosEstatus['estatus'][$i] ?></option>
                    <?php } ?>
                  </select>
              </div>
              <div class="form-group">
                <label>APS:</label>
                <input type="text" class="form-control" name="nombre_aps" id="nombre_aps">
              </div>
              <div class="form-group">
                <label>URL del proyecto trabajado:</label>
                <input type="text" class="form-control" name="url_sis" id="url_sis" maxlength="256">
              </div>
              <div class="form-group">
                <label>Descripción (Antes niveles):</label>
                <input type="text" class="form-control" name="descripcion_pdc" id="descripcion_pdc" maxlength="256">
              </div>
            </div>
            <div class="col-lg-4 col-xs-12">
              <h4 class="text-center">Fechas y horas</h4>
              <div class="form-group">
                <label>Fecha y hora agendada para pruebas:</label>
                  <input type="datetime-local" class="form-control" name="fecha_pdp" id="fecha_pdp">
              </div>
              <div class="form-group">
                <label>Fecha y hora en que se realizaron las pruebas:</label>
                  <input type="datetime-local" class="form-control" name="fecha_pruebas_pdp" id="fecha_pruebas_pdp">
              </div>
              <div class="form-group">
                <label>Fecha y hora de aprobación:</label>
                  <input type="datetime-local" class="form-control" name="fecha_aprobacion_pdp" id="fecha_aprobacion_pdp">
              </div>
            </div>
            <div class="col-lg-4 col-xs-12">
              <h4 class="text-center">Estatus de pruebas</h4>
              <div class="form-group">
                <label>Nueva versión:</label>
                  <input type="text" class="form-control" name="nueva_version_pdp" id="nueva_version_pdp" maxlength="256">
              </div>
              <div class="form-group">
                <label>Versión anterior:</label>
                  <input type="text" class="form-control" name="version_anterior_pdp" id="version_anterior_pdp"
                    maxlength="256">
              </div>
              <div class="form-group">
                <label>Resultado de pruebas:</label>
                <textarea class="form-control" id="resutado_pdp" name="resutado_pdp" rows="3"
                  cols="50"> </textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-xs-12">
              <h4 class="text-center">Asignación</h4>
              <div class="form-group">
                <label>Arquitecto:</label>
                  <input type="text" class="form-control" name="nombre_per_arq" id="nombre_per_arq" maxlength="256">
              </div>
              <div class="form-group">
                <label>Programador:</label>
                <input type="text" class="form-control" name="nombre_per_prog" id="nombre_per_prog" maxlength="256">
              </div>
              <div class="form-group">
                <label>Tester:</label>
                  <input type="text" class="form-control" name="nombre_per_tester" id="nombre_per_tester" maxlength="256">
              </div>
              <div class="form-group">
                <label>Gerente:</label>
                  <input type="text" class="form-control" name="nombre_per_gerente" id="nombre_per_gerente" maxlength="256">
              </div>
              <div class="form-group">
                <label>Usuario:</label>
                  <input type="text" class="form-control" name="nombre_per_usuario" id="nombre_per_usuario" maxlength="256">
              </div>
              <div class="form-group">
                <label>Jefe de Area:</label>
                  <input type="text" class="form-control" name="nombre_per_jefe_area" id="nombre_per_jefe_area" maxlength="256">
              </div>
            </div>
            <div class="col-lg-4 col-xs-12">
              <h4 class="text-center">Notas</h4>
              <div class="form-group">
                <label>Notas referentes a la asignación:</label>
                  <input type="text" class="form-control" name="notas_asignacion_pdp" id="notas_asignacion_pdp"
                    maxlength="256">
              </div>
            </div>
            <div class="col-lg-4 col-xs-12">
              <h4 class="text-center">Bitacora</h4>
              <div class="form-group">
                  <textarea class="form-control" id="bitacora_pdp" name="bitacora_pdp" rows="8"
                    cols="50"></textarea>
              </div>
              <div class="form-group text-center py-2">
                <input type="hidden" id="version_historial_pdp" name="version_historial_pdp">
              </div>
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary save_pdp">Guardar</button>
        <button type="button" class="btn btn-secondary cerrarModal" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>