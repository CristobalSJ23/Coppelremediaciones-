<br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-3">
            <form id="formPalabra">
                <div class="mb-3">
                    <label for="palabra" class="form-label">¿No encuentras la palabra en el listado? Agregala
                        aquí:</label>
                    <input name="palabraLenguaje" type="text" class="form-control" id="palabra">
                </div>
                <div class="mb-3">
                    <select name="selectorLenguaje" class="form-select" aria-label="Default select example">
                        <?php foreach ($resLenguajes['id'] as $i => $leng) { ?>
                            <option value="<?= $leng ?>"><?= $resLenguajes['nombre'][$i] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="guardar btn btn-primary">Guardar</button>
            </form>
        </div>
        <div class="col-9">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Palabras</th>
                        <th scope="col">Lenguaje</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resPalabras['id'] as $i => $pal) { ?>
                        <tr>
                            <th scope="row" value="<?= $pal ?>"><?= $pal ?></th>
                            <td class="nombrePal<?= $pal ?>" data-id="<?= $pal ?>"><?= $resPalabras['nombre'][$i] ?></td>
                            <td class="nombreLeng<?= $pal ?>" data-id="<?= $pal ?>"><?= $resPalabras['lenguaje'][$i] ?></td>
                            <td>
                                <div class="row editar_acciones_<?= $pal ?>" style="width:100%;">
                                    <div class="col"><i class="editar bi bi-pencil-square btn" data-id="<?= $pal ?>"></i>
                                    </div>
                                    <div class="col"><i class="eliminar bi bi-trash btn" data-id="<?= $pal ?>"></i></div>
                                </div>
                                <div class="row editar_acciones_cancelar<?= $pal ?>" style="display:none;">
                                    <div class="col"> <i class="save bi bi-check2-circle btn" data-id="<?= $pal ?>"></i>
                                    </div>
                                    <div class="col"><i class="cancelar bi bi-x-circle btn" data-id="<?= $pal ?>"
                                            data-nombre="<?= $res['nombre'][$i] ?>"
                                            data-estatus="<?= $res['estatus'][$i]; ?>"
                                            data-color="<?= $res['bg'][$i]; ?>"></i></div>
                                    <div class="col"><i class="eliminar bi bi-trash btn" data-id="<?= $pal ?>"></i></div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>