<div class="container p-5 mt-20" aling="center" style="background-color: #ffffff;border-radius: 20px;">
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
        <div>
            <h4>Seleccione que permisos desea otorgar:</h4>
            <label for="selectMenu" class="form-label margin5pxLeft">Menús principales</label><br>
            <select name="menusPrincipales[]" class="selectpicker" multiple data-live-search="true" id="selectMenu">
                <option value="registrar">Registrar</option>
                <option value="vistas">Vistas</option>
            </select>
            <?php if (isset($datos['errorMenus'])) { ?>
                <div class="alert alert-danger"> <?= $datos['errorMenus'] ?></div>
            <?php } ?>
            <br>
            <label for="selectSubMenu" class="form-label margin5pxLeft">Menús secundarios</label><br>
            <select name="menusSecundarios[]" class="selectpicker" multiple data-live-search="true" id="selectSubMenu">
                <option value="aps">APS</option>
                <option value="rol">Rol</option>
                <option value="usuarios">Usuarios</option>
                <option value="indicadores">Indicadores</option>
                <option value="relaciones">Relaciones</option>
            </select>
            <?php if (isset($datos['errorSubMenus'])) { ?>
                <div class="alert alert-danger"> <?= $datos['errorSubMenus'] ?></div>
            <?php } ?>
            <br>
            <br>
            <button type="submit" VALUE="Enviar" class="btn btn-primary margin5pxLeft">GUARDAR</button>
        </div>
    </form>
</div>

