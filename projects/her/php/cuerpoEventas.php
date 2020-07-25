<?php
$consultaP = "SELECT * FROM expedientes WHERE  estatus = 'En Validacion'  ";
$resultadoP = mysqli_query($con, $consultaP);

$consultaPR = "SELECT * FROM expedientes WHERE  estatus = 'En renovacion'  ";
$resultadoPR = mysqli_query($con, $consultaPR);

$consultaP2 = "SELECT * FROM expedientes WHERE estatus = 'Por Autorizar' AND eVentas = '$usuario'";
$resultadoP2 = mysqli_query($con, $consultaP2);

$consultaP3 = "SELECT * FROM expedientes WHERE estatus = 'Expedicion Contrato' AND eVentas = '$usuario'";
$resultadoP3 = mysqli_query($con, $consultaP3);

$consultaP4 = "SELECT * FROM expedientes WHERE  estatus = 'Asignar Firma' AND eVentas = '$usuario'";
$resultadoP4 = mysqli_query($con, $consultaP4);

$consultaP5 = "SELECT * FROM expedientes WHERE  estatus = 'Asignado' AND eVentas = '$usuario' or estatus = 'Rechazado' AND eVentas = '$usuario' or estatus = 'En renovacion' AND eVentas = '$usuario'  ";
$resultadoP5 = mysqli_query($con, $consultaP5);

$consultaP6 = "SELECT * FROM expedientes WHERE  estatus = 'Cita' AND eVentas = '$usuario' ";
$resultadoP6 = mysqli_query($con, $consultaP6);
$countV = mysqli_num_rows($resultadoP6);

?>
<div>
    <table width="100%">
        <tr>
            <td width="50%"><a href="nuevoExpediente.php" class="btn btn-outline-info">Nuevo Expediente</a><a
                        href="corredor.php" class="btn btn-outline-info">Visión Corredor</a></td>
            <td width="50%">
                <div class="input-group mb-3">
                    <form action="buscarExpedientes.php" method="POST">
                        <input name="datoBus" type="text" class="form-control" placeholder="Ingresa un dato a Buscar"
                               aria-label="Ingresa un dato a Buscar" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <input type="submit" value="Buscar" class="btn btn-outline-secondary">
                    </form>
                </div>
</div>
</td>
</tr>
</table>
</div>
<div class="container">
    <div class="row">
        <div class="col-6">
            <center>Expedientes sin Asignar</center>
            <table class="table table-striped" style="font-size: .6em" width="100%">
                <tr>
                    <th scope="col">
                        Expediente
                    </th>
                    <th scope="col">
                        Tipo
                    </th>
                    <th scope="col">
                        Corredor
                    </th>
                    <th scope="col">
                        Fecha
                    </th>
                    <th scope="col">
                        Estatus
                    </th>
                    <th scope="col">
                        Acciones
                    </th>
                </tr>
                <?php
                while ($rowP = mysqli_fetch_array($resultadoP)) {
                    $idE = $rowP[0];
                    $expedienteP = $rowP[1];
                    $tipo = $rowP[2];
                    $corredor = $rowP[16];
                    $fecha = $rowP[18];
                    $estatus = $rowP[17];
                    ?>
                    <tr>
                        <td>
                            <?php echo $expedienteP ?>
                        </td>
                        <td>
                            <?php echo $tipo ?>
                        </td>
                        <td>
                            <?php echo $corredor ?>
                        </td>
                        <td>
                            <?php echo $fecha ?>
                        </td>
                        <td>
                            <?php echo $estatus ?>
                        </td>
                        <td>
                            <a style="font-size: .8em"
                               href="asignarExpediente.php?id=<?php echo $idE ?>&usuario=<?php echo $usuarioC ?>&expediente=<?php echo $expedienteP ?>"
                               class="btn btn-primary">Asignar</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>

            <hr>
            <center>
                <label>
                    En renovación
                </label>
            </center>
            <table class="table table-striped" style="font-size: .6em" width="100%">
                <tr>
                    <th scope="col">
                        Expediente
                    </th>
                    <th scope="col">
                        Tipo
                    </th>
                    <th scope="col">
                        Corredor
                    </th>
                    <th scope="col">
                        Fecha de creacion
                    </th>
                    <th scope="col">
                        Estatus
                    </th>
                    <th scope="col">
                        Acciones
                    </th>
                </tr>

                <?php
                while ($rowPR = mysqli_fetch_array($resultadoPR)) {
                    $idER = $rowPR[0];
                    $expedientePR = $rowPR[1];
                    $tipoR = $rowPR[2];
                    $corredorR = $rowPR[16];
                    $fechaR = $rowPR[18];
                    $estatusR = $rowPR[17];
                    ?>
                    <tr>
                        <td>
                            <?php echo $expedientePR ?>
                        </td>
                        <td>
                            <?php echo $tipoR ?>
                        </td>
                        <td>
                            <?php echo $corredorR ?>
                        </td>
                        <td>
                            <?php echo $fechaR ?>
                        </td>
                        <td>
                            <?php echo $estatusR ?>
                        </td>
                        <td>
                            <a style="font-size: .8em"
                               href="asignar2.php?id=<?php echo $idER ?>&usuario=<?php echo $usuario ?>&expediente=<?php echo $expedientePR ?>"
                               class="btn btn-primary">Asignar</a>
                        </td>
                    </tr>


                <?php } ?>
            </table>
        </div>
        <div class="col-6">
            <center>Expedientes por Autorizar</center>
            <table class="table table-striped" style="font-size: .6em" width="100%">
                <tr>
                    <th scope="col">
                        Expediente
                    </th>
                    <th scope="col">
                        Tipo
                    </th>
                    <th scope="col">
                        Corredor
                    </th>
                    <th scope="col">
                        Fecha
                    </th>
                    <th scope="col">
                        Estatus
                    </th>
                </tr>
                <?php
                while ($rowP2 = mysqli_fetch_array($resultadoP2)) {
                    $idE2 = $rowP2[0];
                    $expedienteP2 = $rowP2[1];
                    $tipo2 = $rowP2[2];
                    $corredor2 = $rowP2[16];
                    $fecha2 = $rowP2[18];
                    $estatus2 = $rowP2[17];
                    ?>
                    <tr>
                        <td>
                            <?php echo $expedienteP2 ?>
                        </td>
                        <td>
                            <?php echo $tipo2 ?>
                        </td>
                        <td>
                            <?php echo $corredor2 ?>
                        </td>
                        <td>
                            <?php echo $fecha2 ?>
                        </td>
                        <td>
                            <?php echo $estatus2 ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-6">
            <center>Expedientes para Expedición de Contrato</center>
            <table class="table table-striped" style="font-size: .6em" width="100%">
                <tr>
                    <th scope="col">
                        Expediente
                    </th>
                    <th scope="col">
                        Tipo
                    </th>
                    <th scope="col">
                        Corredor
                    </th>
                    <th scope="col">
                        Fecha
                    </th>
                    <th scope="col">
                        Estatus
                    </th>
                    <th scope="col">
                        Contratos
                    </th>
                </tr>
                <?php

                while ($rowP3 = mysqli_fetch_array($resultadoP3)) {
                    $idE3 = $rowP3[0];
                    $expedienteP3 = $rowP3[1];
                    $tipo3 = $rowP3[2];
                    $corredor3 = $rowP3[16];
                    $fecha3 = $rowP3[18];
                    $estatus3 = $rowP3[17];
                    ?>
                    <?php
                    $consultaUsuario = "SELECT * FROM relacionadosexpediente WHERE  expediente = '$expedienteP3'  ";
                    $resultadoUs = mysqli_query($con, $consultaUsuario);
                    $rowU = mysqli_fetch_array($resultadoUs);
                    $usuarioC = $rowU[1];

                    $consultaUsuarios = "SELECT * FROM relacionadosexpediente WHERE  expediente = '$expedienteP3' ";
                    $resultadoUsuarios = mysqli_query($con, $consultaUsuarios);

                    $consultaContratos = "SELECT * FROM contratos WHERE  expediente = '$expedienteP3' ";
                    $resultadoContratos = mysqli_query($con, $consultaContratos);


                    ?>
                    <tr>
                        <td>
                            <?php echo $expedienteP3 ?>
                        </td>
                        <td>
                            <?php echo $tipo3 ?>
                        </td>
                        <td>
                            <?php echo $corredor3 ?>
                        </td>
                        <td>
                            <?php echo $fecha3 ?>
                        </td>
                        <td>
                            <?php echo $estatus3 ?>
                        </td>
                        <td>
                            <?php
                            while ($rowUsuarios = mysqli_fetch_array($resultadoUsuarios)) {
                                $usuario = $rowUsuarios[1];
                                $participacion = $rowUsuarios[3];
                                $id = $rowUsuarios[4];
                                echo "<a style=\"font-size: .8em\"
                               href=\"editor.php?id=" . $id . "&usuario=" . $usuario . "&expediente=" . $expedienteP3 . "\"
                               class=\"btn btn-primary\">Contrato de " . $participacion . "</a>";
                            };
                            ?>
                            <br>
                            <?php
                            while ($rowContratos = mysqli_fetch_array($resultadoContratos)) {
                                $Usuario = $rowContratos[4];
                                $consultaTP = "SELECT * from relacionadosexpediente where expediente= '$expedienteP3' AND usuario='$Usuario'";
                                $resultadoTP = mysqli_query($con, $consultaTP);
                                $rowTP = mysqli_fetch_array($resultadoTP);
                                $part = $rowTP[3];
                                echo "<a style=\"font-size: .8em\"
                               href=\"impContrato.php?expediente=" . $expedienteP3 . "&usuario=" . $Usuario . "\"
                               class=\"btn btn-warning\">Imprimir contrato de " . $part . "</a>";
                            };
                            ?>
                            <a style="font-size: .9em"
                               href="asignarFirma.php?id=<?php echo $idE3 ?>&usuario=<?php echo $usuarioC ?>&expediente=<?php echo $expedienteP3 ?>"
                               class="btn btn-success">Asignar para Firma</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <div class="col-6">
            <center>Expedientes para Asignar Firma</center>
            <table class="table table-striped" style="font-size: .6em" width="100%">
                <tr>
                    <th scope="col">
                        Expediente
                    </th>
                    <th scope="col">
                        Tipo
                    </th>
                    <th scope="col">
                        Corredor
                    </th>
                    <th scope="col">
                        Fecha
                    </th>
                    <th scope="col">
                        Estatus
                    </th>
                    <th scope="col">
                        Fecha
                    </th>
                    <th scope="col">
                        Acciones
                    </th>
                </tr>
                <?php
                while ($rowP4 = mysqli_fetch_array($resultadoP4)) {
                    $idE4 = $rowP4[0];
                    $expedienteP4 = $rowP4[1];
                    $tipo4 = $rowP4[2];
                    $corredor4 = $rowP4[16];
                    $fecha4 = $rowP4[18];
                    $estatus4 = $rowP4[17];
                    ?>
                    <tr>
                        <form action="asignarCita.php" method="POST">
                            <input type="text" name="id" style="display: none;" value=" <?php echo $idE4; ?>">
                            <input type="text" name="usuario" style="display: none;" value="<?php echo $usuarioC; ?>">
                            <input type="text" name="expediente" style="display: none;"
                                   value=" <?php echo $expedienteP4; ?>">
                            <td>
                                <?php echo $expedienteP4 ?>
                            </td>
                            <td>
                                <?php echo $tipo4 ?>
                            </td>
                            <td>
                                <?php echo $corredor4 ?>
                            </td>
                            <td>
                                <?php echo $fecha4 ?>
                            </td>
                            <td>
                                <?php echo $estatus4 ?>
                            </td>
                            <td>
                                <input type="text" name="lugar" placeholder="Lugar">
                                <input type="date" name="fechainvitacion">
                                <input type="time" name="hora">
                                <select name="usuario2">
                                    <option selected="">-</option>
                                    <?php
                                    $consultalumnos = "SELECT * FROM datosusuarios WHERE sucursal='Oficinas Centrales' ORDER BY nombre";
                                    $resultadoal = mysqli_query($con, $consultalumnos);
                                    while ($registroalu = mysqli_fetch_array($resultadoal)) {
                                        ?>
                                        <option value="<?php echo $registroalu[1]; ?>">
                                            <?php echo $registroalu[2] . " " . $registroalu[3] . " " . $registroalu[4]; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <input style="font-size: .9em" class="btn btn-success" type="submit" value="Citar">
                            </td>
                        </form>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<div class="container">
    <div class=" row">
        <div class="col-12">
            <center>Expedientes en Cita</center>
            <table class="table table-striped" style="font-size: .6em" width="100%">
                <tr>
                    <th scope="col">
                        Expediente
                    </th>
                    <th scope="col">
                        Tipo
                    </th>
                    <th scope="col">
                        Corredor
                    </th>
                    <th scope="col">
                        Usuario a Firma
                    </th>
                    <th scope="col">
                        Fecha
                    </th>
                    <th scope="col">
                        Hora
                    </th>
                    <th scope="col">
                        Estatus
                    </th>
                    <th scope="col">
                        Lugar
                    </th>
                    <th scope="col">
                        Contratos
                    </th>
                </tr>
                <?php
                while ($rowP6 = mysqli_fetch_array($resultadoP6)) {
                    $idE6 = $rowP6[0];
                    $expedienteP6 = $rowP6[1];
                    $tipo6 = $rowP6[2];
                    $corredor6 = $rowP6[16];
                    $fecha6 = $rowP6[20];
                    $hora6 = $rowP6[27];
                    $estatus6 = $rowP6[17];
                    $lugar6 = $rowP6[26];
                    $usuarioFirma = $rowP6[21];
                    $consultaDtos = "SELECT * FROM datosusuarios WHERE usuario='$corredor6'   ";
                    $resultadoDatos = mysqli_query($con, $consultaDtos);
                    $datosRa = mysqli_fetch_array($resultadoDatos);
                    $nombreR = $datosRa[2];
                    $apPaternoR = $datosRa[3];
                    $apMaternoR = $datosRa[4];
                    $completoCorredor = $nombreR . " " . $apPaternoR . " " . $apMaternoR;
                    $consultaDtos2 = "SELECT * FROM datosusuarios WHERE usuario='$usuarioFirma'   ";
                    $resultadoDatos2 = mysqli_query($con, $consultaDtos2);
                    $datosRa2 = mysqli_fetch_array($resultadoDatos2);
                    $nombreR2 = $datosRa2[2];
                    $apPaternoR2 = $datosRa2[3];
                    $apMaternoR2 = $datosRa2[4];
                    $completoUsuarioF = $nombreR2 . " " . $apPaternoR2 . " " . $apMaternoR2;
                    ?>
                    <tr>
                        <td>
                            <?php echo $expedienteP6 ?>
                        </td>
                        <td>
                            <?php echo $tipo6 ?>
                        </td>
                        <td>
                            <?php echo $completoCorredor ?>
                        </td>
                        <td>
                            <?php echo $completoUsuarioF ?>
                        </td>
                        <td>
                            <?php echo $fecha6 ?>
                        </td>
                        <td>
                            <?php echo $hora6 ?>
                        </td>
                        <td>
                            <?php echo $estatus6 ?>
                        </td>
                        <td>
                            <?php echo $lugar6 ?>
                        </td>
                        <td>
                            <a style="font-size: .9em" href="impContrato.php?expediente=<?php echo $expedienteP6 ?>"
                               class="btn btn-warning">Imp C1</a>
                            <a style="font-size: .9em" href="impContrato.php?expediente=<?php echo $expedienteP6 ?>"
                               class="btn btn-warning">Imp C2</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<div class="container">
    <div class=" row">
        <div class="col-12">
            <center>Expedientes asignados</center>
            <table width="100%">
                <?php
                while ($rowP5 = mysqli_fetch_array($resultadoP5)) {
                    $idE5 = $rowP5[0];
                    $expedienteP5 = $rowP5[1];
                    $estatus5 = $rowP5[17];

                    if ($estatus5 == "En renovacion") {
                        $display = '';
                    } else {
                        $display = 'style = "display: none"';
                    }

                    ?>
                    <tr>
                        <td>
                            <?php echo $expedienteP5 ?>
                        </td>
                        <td>
                            <?php echo $estatus5 ?>
                        </td>
                        <td align="center">
                            <div>
                                <a href="buscadorInvitacionesEV.php?expediente=<?php echo $expedienteP5 ?>&participacion=A"
                                   class="btn btn-success">Arrendador(es)</a>
                            </div>
                            <p style="color: green">Estatus</p>
                        </td>
                        <td align="center">
                            <div>
                                <a href="buscadorInvitacionesEV.php?expediente=<?php echo $expedienteP5 ?>&participacion=Ao"
                                   class="btn btn-success">Arrendatario(es)</a>
                            </div>
                            <p style="color: green">Estatus</p>
                        </td>
                        <td align="center">
                            <div>
                                <a href="buscadorInvitacionesEV.php?expediente=<?php echo $expedienteP5 ?>&participacion=Fi"
                                   class="btn btn-success">Fiador(es)</a>
                            </div>
                            <p style="color: green">Estatus</p>
                        </td>
                        <td align="center">
                            <a href="informacionExpediente.php?expediente=<?php echo $expedienteP5 ?>"
                               class="btn btn-success">Informacion</a>
                        </td>
                        <td align="center">
                            <a href="bitacora.php?id=<?php echo $idE5 ?>&expediente=<?php echo $expedienteP5 ?>"
                               class="btn btn-primary">Bitacora</a>
                        </td>
                        <td align="center">
                            <a href="soExpediente.php?id=<?php echo $idE5 ?>&usuario=<?php echo $usuarioC ?>&expediente=<?php echo $expedienteP5 ?>"
                               class="btn btn-primary">So.Autorización</a>
                        </td>
                        <td align="center">
                            <a href="rechazarExpedienteEventas.php?id=<?php echo $idE5 ?>&expediente=<?php echo $expedienteP5 ?>"
                               class="btn btn-danger">Rechazar</a>
                        </td>
                        <td <?php echo $display ?> align="center">
                            <div data-toggle="modal" data-target="#ModalR<?php echo $idE5 ?>">
                                <button class="btn btn-warning">Acciones</button>
                            </div>
                            <div class="modal " id="ModalR<?php echo $idE5 ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content ">
                                        <div class="modal-header" align="right">
                                            Expediente
                                            <?php echo $expedienteP5 ?>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <table width="100%">
                                                <tr>
                                                    <td>
                                                        <a href="adenda.php?expediente=<?php echo $expedienteP5 ?>"
                                                           class="btn btn-success">Adenda</a>
                                                    </td>
                                                    <td>
                                                        <a href="renovaciones.php?id=<?php echo $idE5 ?>&expediente=<?php echo $expedienteP5 ?>"
                                                           class="btn btn-success">Renovación</a>
                                                    </td>
                                                    <td>
                                                        <a href="cancelaciones.php"
                                                           class="btn btn-success">Cancelación</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-outline-danger"
                                                    data-dismiss="modal">Cerrar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <?php
                } ?>
            </table>
        </div>
    </div>
</div>