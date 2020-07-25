<?php
$consultaI = "SELECT * FROM invitaciones WHERE usuario='$usuario' AND estatus ='Nuevo'  ";
$resultadoI = mysqli_query($con, $consultaI);
$countI = mysqli_num_rows($resultadoI);

$consultaP = "SELECT * FROM relacionadosexpediente WHERE usuario='$usuario' ";
$resultadoP = mysqli_query($con, $consultaP);

?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <center>
                <h2 style="color: #39C9D7;">Mis Expedientes</h2>
            </center>
            <table class="table table-striped"" width=" 100%">
                <thead class="thead">
                    <tr align="center">
                        <th width="10%">
                            Expediente
                        </th>
                        <th width="30%">
                            Tipo de Participación
                        </th>
                        <th width="20%">
                            Estatus
                        </th width="40%">
                        <th>
                            Documentos Solicitados
                        </th>
                        <th>
                            Formularios Solicitados
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($rowP = mysqli_fetch_array($resultadoP)) {
                        $expedienteP = $rowP[2];
                        $tipoParticipacionP = $rowP[3];
                        $estausP = $rowP[5];
                        $idTipoParticipacion = $rowP[4];

                    ?>
                    <tr align="center">
                        <td><?php echo $expedienteP ?></td>
                        <td><?php echo $tipoParticipacionP ?></td>
                        <td><?php echo $estausP ?></td>
                        <td align="center"><a
                                href="documentacion.php?idTipoParticipacion=<?php echo $idTipoParticipacion ?>&expedienteP=<?php echo $expedienteP ?>&usuario=<?php echo $usuario ?>"><img
                                    src="../img/documentos.png" width="20%"></a></td>
                        <td align="center"><a
                                href="formulario.php?expedienteP=<?php echo $expedienteP ?>&usuario=<?php echo $usuario ?>"><img
                                    src="../img/formularios.png" width="20%"></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
        <div class="col-2" align="center">
            <div data-toggle="modal" data-target="#ModalM">
                <button type="button" class="btn btn-primary">
                    Invitaciones <span class="badge badge-light"><?php echo $countI; ?></span>
                </button>

            </div>


        </div>
    </div>
</div>




<div class="modal " id="ModalM">
    <div class="modal-dialog">
        <div class="modal-content " style="width: 800px">




            <div class="modal-header" align="right">
                Invitaciones

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body">


                <table class="table" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Corredor</th>
                            <th scope="col">Tipo Participación</th>
                            <th scope="col">Expediente</th>
                            <th scope="col" colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($rowI = mysqli_fetch_array($resultadoI)) {
                            $idI = $rowI[0];
                            $corredorI = $rowI[2];
                            $tipoInvitacionI = $rowI[3];
                            $expedienteI = $rowI[4];

                            $consultaI2 = "SELECT * FROM datosusuarios WHERE usuario='$corredorI'   ";
                            $resultadoI2 = mysqli_query($con, $consultaI2);
                            $datosR = mysqli_fetch_array($resultadoI2);
                            $nombre = $datosR[2];
                            $apPaterno = $datosR[3];
                            $apMaterno = $datosR[4];
                            $completo = $nombre . " " . $apPaterno . " " . $apMaterno;

                        ?>
                        <tr>
                            <td><?php echo $idI ?></td>
                            <td><?php echo $completo ?></td>
                            <td><?php echo $tipoInvitacionI ?></td>
                            <td><?php echo $expedienteI ?></td>
                            <td><a href="aceptarInvitacion.php?id=<?php echo $idI ?>"
                                    class="btn btn-success">Aceptar</a></td>
                            <td><a href="rechazarInvitacion.php?id=<?php echo $idI ?>"
                                    class="btn btn-danger">Rechazar</a></td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>







            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>