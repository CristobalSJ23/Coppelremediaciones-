<div class="center">
    <h1>¡Bienvenido/a!</h1>
    <hr>
    <form method="post" action="validate">
        <div class="txt_field">
            <input type="text" name="usuario" <?php if(isset($datos['usuario'])){ ?> value="<?= $datos['usuario'] ?>" <?php } ?> >
            <?php
            if (isset($datos['errorUsuario'])) {
            ?>
                <div class="alert alert-danger"> <?= $datos['errorUsuario'] ?></div>
            <?php } ?>
            <label>Usuario</label>
        </div>
        <div class="txt_field">
            <input type="password" name="pass" <?php if(isset($datos['pass'])){ ?> value="<?= $datos['pass'] ?>" <?php } ?> >
            <?php
            if (isset($datos['errorPassword'])) {
            ?>
                <div class="alert alert-danger"> <?= $datos['errorPassword'] ?> </div>
            <?php } ?>
            
            <label>Contraseña</label>
        </div>

        <input type="submit" value="Ingresar">
        <?php
            if (isset($datos['errorLogin'])) {
            ?>
                <div class="alert alert-danger"> <?= $datos['errorLogin'] ?> </div>
            <?php } ?>
        <div class="signup_link">

        </div>
    </form>
</div>