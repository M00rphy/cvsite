<?php
if (empty($_GET)) {
    $m = "";
    $usuario = "";
    $nombre = "";
    $apPaterno = "";
    $apMaterno = "";
    $correo = "";
    $activo = "hidden;";
} else {
    $activo = "visibility;";
    $m = $_REQUEST['m'];
    $usuario = $_REQUEST['usuario'];
    $nombre = $_REQUEST['nombre'];
    $apMaterno = $_REQUEST['apMaterno'];
    $apPaterno = $_REQUEST['apPaterno'];
    $correo = $_REQUEST['correo'];
}
?>
<div class="alert alert-primary alert-dismissible fade show" role="alert" align="center"
     style="visibility: <?php echo $activo ?>  ">
    <?php echo $m ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="container">
    <div class="row">
        <div class="col-9">
            <img src="img/fondo3.jpg" width="100%">
        </div>
        <div class="col-3">
            Noticias relevantes
        </div>
    </div>
</div>
<div class="modal " id="Modal1">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header" align="right">
                Registro de Corredor
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="php/agregarCorredor.php" method="POST">
                    <input name="usuario" class="form-control form-control-sm" type="text"
                           placeholder="Nombre de usuario" required>
                    <small class="form-text text-muted">
                        Ingresa un nombre de Usuario, el cual utilizaras en el sistema.
                    </small>
                    <input name="inmobiliaria" class="form-control form-control-sm" type="text"
                           placeholder="Nombre de la inmobiliaria" required>
                    <br>
                    <input name="claveBancaria" class="form-control form-control-sm" type="number"
                           placeholder="Numero de clabe interbancaria" required>
                    <br>
                    <input name="cuentaBancaria" class="form-control form-control-sm" type="number"
                           placeholder="Numero de cuenta bancaria" required>
                    <br>
                    <input name="banco" class="form-control form-control-sm" type="text" placeholder="Nombre del Banco"
                           required>
                    <br>
                    <input name="nombre" class="form-control form-control-sm" type="text" placeholder="Nombre" required>
                    <br>
                    <input name="apPaterno" class="form-control form-control-sm" type="text"
                           placeholder="Apellido Paterno" required>
                    <br>
                    <input name="apMaterno" class="form-control form-control-sm" type="text"
                           placeholder="Apellido Materno" required>
                    <br>
                    <input name="correo" class="form-control form-control-sm" type="mail"
                           placeholder="Correo Electrónico" required>
                    <br>
                    <input name="telefono" class="form-control form-control-sm" type="number" placeholder="Telefono"
                           required>
                    <br>
                    <input name="password" class="form-control form-control-sm" type="text" placeholder="Contraseña"
                           aria-describedby="passwordHelp" required>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        Escribe una contraseña, la cual utilizaras en el sistema.
                    </small>
                    <br>
                    <input name="password2" class="form-control form-control-sm" type="text" placeholder="Contraseña"
                           aria-describedby="passwordHelp" required>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        Repite la contraseña, ingresada
                    </small>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Solicitar">
                </form>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Termina el modal -->
<div class="modal " id="Modal2">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header" align="right">
                Registro de Usuario
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="php/agregarUsuario.php" method="POST">
                    <input name="usuario" class="form-control form-control-sm" type="text"
                           placeholder="Nombre de usuario" required value="<?php echo $usuario ?>">
                    <small class="form-text text-muted">
                        Ingresa un nombre de Usuario, el cual utilizaras en el sistema.
                    </small>
                    <br>
                    <input name="nombre" class="form-control form-control-sm" type="text" placeholder="Nombre" required
                           value="<?php echo $nombre ?>">
                    <br>
                    <input name="apPaterno" class="form-control form-control-sm" type="text"
                           placeholder="Apellido Paterno" required value="<?php echo $apPaterno ?>">
                    <br>
                    <input name="apMaterno" class="form-control form-control-sm" type="text"
                           placeholder="Apellido Materno" required value="<?php echo $apMaterno ?>">
                    <br>
                    <input name="correo" class="form-control form-control-sm" type="mail"
                           placeholder="Correo Electrónico" required value="<?php echo $correo ?>">
                    <br>
                    <input name="password" class="form-control form-control-sm" type="text" placeholder="Contraseña"
                           aria-describedby="passwordHelp" required>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        Escribe una contraseña, la cual utilizaras en el sistema.
                    </small>
                    <br>
                    <input name="password2" class="form-control form-control-sm" type="text" placeholder="Contraseña"
                           aria-describedby="passwordHelp" required>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        Repite la contraseña, ingresada
                    </small>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Solicitar" onsubmit="return validarForm();">
                </form>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Termina el modal -->
