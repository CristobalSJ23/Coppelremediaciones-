<br><br><br><br><br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Programador</th>
      <th scope="col">Total PDC</th>
      <th scope="col">Resueltos</th>
      <th scope="col">Aprobados</th>
      <th scope="col">Resueltos(%)</th>
      <th scope="col">Aprobados(%)</th>
    </tr>
  </thead>
  <tbody>
     <?php
      foreach ($res['nombre'] as $i => $r) {
      ?>
      <tr>
        <th scope="row">
          <?php echo $i ?>
        </th>
        <td> <?php echo $res['nombre'][$i] ?> </td>
        <td> <?php echo $res['total'][$i] ?> </td>
        <td> <?php echo $res['resuelto'][$i] ?> </td>
        <td> <?php echo $res['aprobados'][$i] ?> </td>
        <td> <?php echo $res['pResuelto'][$i] ?> </td>
        <td> <?php echo $res['pAprobados'][$i] ?> </td>
        <?php
        }
        ?>
  </tbody>
</table>