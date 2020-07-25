<?php

$id = $_REQUEST['id'];
$usuario = $_SESSION['usuario'];
$tipoUsuario = $_SESSION['tipo'];

$consultaP = "SELECT * FROM expedientes WHERE  id = '$id'  ";
$resultadoP = mysqli_query($con, $consultaP);
$rowP = mysqli_fetch_array($resultadoP);

$expediente = $rowP[1];
$eVentas = $rowP[19];
$corredor = $rowP[16];

$consultaD = "SELECT * FROM datosusuarios WHERE  usuario = '$usuario'  ";
$resultadoD = mysqli_query($con, $consultaD);
$rowD = mysqli_fetch_array($resultadoD);

$nombre = $rowD[2];
$apPaterno = $rowD[3];
$apMaterno = $rowD[4];

$nombreC = $nombre . " " . $apPaterno . " " . $apMaterno;



$consultaB = "SELECT * FROM bitacora WHERE  expediente = '$expediente'  ";
$resultadoB = mysqli_query($con, $consultaB);
$countV = mysqli_num_rows($resultadoB);

switch ($tipoUsuario) {
    case 'Corredor':
        $btn = 'corredor';
        break;
    case 'Eventas':
        $btn = 'eVentas';
        break;
    case 'Administrador':
        $btn = 'administrador';
        break;
    case 'Cobranza':
        $btn = "cobranza";

        break;

    default:
        # code...
        break;
}

?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php echo $countV ?>
            <table width="100%">
                <tr>
                    <td style="font-weight: bold;">Ejecutivo de Ventas</td>
                    <td><?php echo $eVentas ?></td>
                    <td style="font-weight: bold;">Corredor</td>
                    <td><?php echo $corredor ?></td>
                    <td style="font-weight: bold;">Expediente</td>
                    <td><?php echo $expediente ?></td>
                </tr>
                <tr>
                    <td>
                        <a href="<?php echo $btn ?>.php" class="btn btn-success">Regresar</a>
                    </td>
                    <td align="right" colspan="5">

                        <div data-toggle="modal" data-target="#Modal<?php echo $btn ?>">
                            <button class="btn btn-primary">Nuevo Comentario</button>
                        </div>
                    </td>

                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="10%">Tipo de Usuario</td>
                    <td width="20%">Nombre</td>
                    <td width="40%">Comentario</td>
                    <td width="15%">Fecha de registro</td>
                    <td width="15%">Fecha Compromiso</td>
                </tr>
                <?php
while ($rowB = mysqli_fetch_array($resultadoB)) {
    $tipoUsuario = $rowB[2];
    $nombre = $rowB[3];
    $comentario = $rowB[4];
    $fechaRegistro = $rowB[5];
    $fechaCompromiso = $rowB[6];
    ?>
                <tr>
                    <td><?php echo $tipoUsuario ?></td>
                    <td><?php echo $nombre ?></td>
                    <td><?php echo $comentario ?></td>
                    <td><?php echo $fechaRegistro ?></td>
                    <td><?php echo $fechaCompromiso ?></td>
                </tr>
                <?php }?>
            </table>

        </div>
    </div>

</div>





<div class="modal " id="Modalcorredor">
    <div class="modal-dialog">
        <div class="modal-content ">


            <div class="modal-header" align="right">
                Nuevo Comentario

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body">

                <form action="guardarComentario.php" method="POST">
                    <input name="comentario" class="form-control form-control-sm" type="text"
                        placeholder="Ingresa tu comentario" required>
                    <input style="display: none" name="expediente" value="<?php echo $expediente ?>">
                    <input style="display: none" name="tipoUsuario" value="<?php echo $tipoUsuario ?>">
                    <input style="display: none" name="nombreC" value="<?php echo $nombreC ?>">
                    <input style="display: none" name="usuario" value="<?php echo $usuario ?>">






            </div>


            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Guardar" onsubmit="return validarForm();">
                </form>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>



<div class="modal " id="ModaleVentas">
    <div class="modal-dialog">
        <div class="modal-content ">


            <div class="modal-header" align="right">
                Nuevo Comentario

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body">

                <form action="guardarComentario.php" method="POST">
                    <input name="comentario" class="form-control form-control-sm" type="text"
                        placeholder="Ingresa tu comentario" required> <br>
                    Fecha Compromiso : <input type="date" name="fechaCompromiso">
                    <input style="display: none" name="expediente" value="<?php echo $expediente ?>">
                    <input style="display: none" name="tipoUsuario" value="<?php echo $tipoUsuario ?>">
                    <input style="display: none" name="nombreC" value="<?php echo $nombreC ?>">
                    <input style="display: none" name="usuario" value="<?php echo $usuario ?>">






            </div>


            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Guardar" onsubmit="return validarForm();">
                </form>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>






<div class="modal " id="Modaladministrador">
    <div class="modal-dialog">
        <div class="modal-content ">


            <div class="modal-header" align="right">
                Nuevo Comentario

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body">

                <form action="guardarComentario.php" method="POST">
                    <input name="comentario" class="form-control form-control-sm" type="text"
                        placeholder="Ingresa tu comentario" required> <br>
                    Fecha Compromiso : <input type="date" name="fechaCompromiso">
                    <input style="display: none" name="expediente" value="<?php echo $expediente ?>">
                    <input style="display: none" name="tipoUsuario" value="<?php echo $tipoUsuario ?>">
                    <input style="display: none" name="nombreC" value="<?php echo $nombreC ?>">
                    <input style="display: none" name="usuario" value="<?php echo $usuario ?>">






            </div>


            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Guardar" onsubmit="return validarForm();">
                </form>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>


<div class="modal " id="Modalcobranza">
    <div class="modal-dialog">
        <div class="modal-content ">


            <div class="modal-header" align="right">
                Nuevo Comentario

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body">

                <form action="guardarComentario.php" method="POST">
                    <input name="comentario" class="form-control form-control-sm" type="text"
                        placeholder="Ingresa tu comentario" required> <br>
                    Fecha Compromiso : <input type="date" name="fechaCompromiso">
                    <input style="display: none" name="expediente" value="<?php echo $expediente ?>">
                    <input style="display: none" name="tipoUsuario" value="<?php echo $tipoUsuario ?>">
                    <input style="display: none" name="nombreC" value="<?php echo $nombreC ?>">
                    <input style="display: none" name="usuario" value="<?php echo $usuario ?>">






            </div>


            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Guardar" onsubmit="return validarForm();">
                </form>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>