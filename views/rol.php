<div class="container p-5 mt-20" aling="center" style="background-color: #ffffff;border-radius: 20px;">
    <form class="row g-3" method="POST" enctype="multipart/form-data">
        <h2 style="font-weight: bold;">Registro de un nuevo rol de usuario</h2>
        <div class="col-md-4">
            <label for="inputNombre" class="form-label">Nombre del rol de usuario:</label>
            <div class="d-flex">
                <input type="text" class="form-control" id="imputNombre" /required name="nombre" maxlength="50" placeholder="Escriba el nombre">
                <button type="submit" VALUE="Enviar" class="btn btn-primary margin5pxLeft">GUARDAR</button>
            </div>
            <?php if (isset($datos['errorRol'])) { ?>
                <div class="alert alert-danger"> <?= $datos['errorRol'] ?></div>
            <?php } ?>
        </div>
    </form>
</div>