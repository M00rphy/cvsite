<header style="background-color: rgba(0,50,138,0.5); color: white">
    <?php
    $tipo = $_SESSION['tipo'];
    $usuario = $_SESSION['usuario'];
    $consultaD = "SELECT * FROM datosusuarios WHERE usuario='$usuario' ";
    $resultadoD = mysqli_query($con, $consultaD);
    $registroD = mysqli_fetch_array($resultadoD);
    $nombre = $registroD[2];
    $apPaterno = $registroD[3];
    $apMaterno = $registroD[4];
    $correo = $registroD[5];
    $completo = $nombre . " " . $apPaterno . " " . $apMaterno;
    ?>
    <div align="right">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <table width="100%">
                    <tr>
                        <td width="30%">
                            Nombre del usuario:
                        </td>
                        <td width="40%">
                            <?php echo $completo ?>
                        </td>
                        <td rowspan="2">
                            <div data-toggle="modal" data-target="#Modal1">
                                <img src="../img/engrane2.png" width="20%">
                                Ajustes
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Usuario
                        </td>
                        <td>
                            <?php echo $usuario ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-4" align="right">
                <a href="cerrar_sesion.php"><img src="../img/salir.png" width="10%"></a>
                Cerrar Sesión
            </div>
        </div>
    </div>
</header>
<br>
<div class="modal " id="Modal1">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header" align="right">
                Actualizacion de información
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="actualizarUsuario.php" method="POST">
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
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Actualizar" onsubmit="return validarForm();">
                </form>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>