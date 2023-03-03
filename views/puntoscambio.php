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
                            <i class="editar bi bi-pencil-square btn editar<?= $pal ?>"  data-id="<?= $pal ?>" data-idlenguaje="<?= $resPalabras['idLeng'][$i] ?>"></i>
                            <i class="eliminar bi bi-trash btn eliminar<?= $pal ?>" data-id="<?= $pal ?>"></i>
                            
                            <i class="save bi bi-check2-circle btn save<?= $pal ?>" data-id="<?= $pal ?>"  style="display:none"></i>
                            <i class="cancelar bi bi-x-circle btn cancelar<?= $pal ?>" data-id="<?= $pal ?>" style="display:none"
                                            data-nombre="<?= $resPalabras['nombre'][$i] ?>"
                                            data-lenguaje="<?= $resPalabras['lenguaje'][$i]; ?>"></i>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>