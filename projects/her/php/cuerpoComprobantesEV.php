<?php
$tipoUsuario = $_SESSION['tipo'];
$expedienteP = $_REQUEST['expedienteP'];
$usuario = $_REQUEST['usuario'];
$idTipoParticipacion = $_REQUEST['idTipoParticipacion'];


$consultaP2 = "SELECT * FROM expedientes WHERE idrelacion='$expedienteP'";
$resultadoP2 = mysqli_query($con, $consultaP2);
$rowP2 = mysqli_fetch_array($resultadoP2);
$renta = $rowP2[11];


$consultaDocumentos = "SELECT * FROM tiposolvencias WHERE usuario='$usuario' AND expediente='$expedienteP'";
$resultadoDocumentos = mysqli_query($con, $consultaDocumentos);
$registroD = mysqli_fetch_array($resultadoDocumentos);
$tipoSol = $registroD[3];


switch ($tipoUsuario) {
    case 'Usuario':
        $regresar = "usuario.php";
        break;
    case 'Corredor':
        $regresar = "corredor.php";

        break;
    case 'Eventas':
        $regresar = "eVentas.php";
        $desactivar = '';
        break;
    case 'Administrador':
        $regresar = "administrador.php";
        $desactivar = 'style="display: none"';
        break;
    case 'Abogado':
        $regresar = "juridico.php";

        break;


    default:
        # code...
        break;
}


switch ($tipoSol) {

    case 'RN':
        $inicialb = 3;
        $limitea = 3;
        $limiteb = 5;
        $inicialc = 5;
        $limitec = 7;
        break;

    case 'DI':
        $inicialb = 0;
        $limitea = 4;
        $limiteb = 0;
        $inicialc = 0;
        $limitec = 0;
        break;

    case 'EC':
        $inicialb = 0;
        $limitea = 4;
        $limiteb = 0;
        $inicialc = 0;
        $limitec = 0;
        break;

    case 'EF':
        $inicialb = 0;
        $limitea = 2;
        $limiteb = 0;
        $inicialc = 0;
        $limitec = 0;
        break;

    case 'DG':
        $inicialb = 0;
        $limitea = 2;
        $limiteb = 0;
        $inicialc = 0;
        $limitec = 0;
        break;

    default:
        $inicialb = 0;
        $limitea = 2;
        $limiteb = 0;
        $inicialc = 0;
        $limitec = 0;
        break;
}


switch ($tipoSol) {
    case 'RN':
        $titulo = "RECIBO DE NÓMINA ";
        break;
    case 'DI':
        $titulo = "DECLARACION";
        break;
    case 'EC':
        $titulo = "ESTADOS DE CUENTA";
        break;
    case 'EF':
        $titulo = "ESTADO FINANCIERO";
        break;
    case 'DG':
        $titulo = "DEPÓSITO EN GARANTÍA";
        break;

    default:
        $titulo = "Bien Inmueble";
        break;
}


?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 style="color: #2F777E">Subir los siguientes documentos solicitados.</h3>
            <table width="100%">
                <tr>


                    <?php
                    for ($i = 1; $i < $limitea; $i++) {

                        $consultaExp = "SELECT * FROM docsolvencia WHERE usuario='$usuario' AND expediente='$expedienteP' AND numero ='$i'";
                        $resultadoExp = mysqli_query($con, $consultaExp);
                        $rowExp = mysqli_fetch_array($resultadoExp);
                        $ingreso = $rowExp[9];
                        $deducibles = $rowExp[10];
                        $ingresosNetos = $rowExp[11];
                        $ingresosRenta = $rowExp[12];
                        $rentaF = $rowExp[13];
                        $estatusV = $rowExp[14];

                        if ($rentaF > 0) {
                            $boton = "Actualizar";
                        } else {
                            $boton = "Guardar";
                        }

                        if ($idTipoParticipacion == 5 || $idTipoParticipacion == 6) {
                            $consultaR = "SELECT * FROM inmueble WHERE expediente='$expedienteP' AND usuario ='$usuario' ";

                            $resultadoR = mysqli_query($con, $consultaR);
                            $countR = mysqli_num_rows($resultadoR);
                            $registroR = mysqli_fetch_array($resultadoR);

                            $id = $registroR[0];
                            $ruta = $registroR[3];


                            if ($countR > 0) {
                                $sarchivo = "none";
                                $imarchivo = "block";
                            } else {
                                $sarchivo = "block";
                                $imarchivo = "none";
                            }
                        } else {


                            $consultaR = "SELECT * FROM docsolvencia WHERE expediente='$expedienteP' AND usuario ='$usuario' AND numero = '$i'";

                            $resultadoR = mysqli_query($con, $consultaR);
                            $countR = mysqli_num_rows($resultadoR);
                            $registroR = mysqli_fetch_array($resultadoR);

                            $id = $registroR[0];
                            $ruta = $registroR[4];

                            if ($countR > 0) {
                                $sarchivo = "none";
                                $imarchivo = "block";
                            } else {
                                $sarchivo = "block";
                                $imarchivo = "none";
                            }
                        }

                        ?>

                        <td>
                            <?php echo $titulo . ' ' . $i ?>
                            <div style="display:<?php echo $sarchivo; ?>">

                                <p style="font-size: .7em">Este documento no a sido enviado por el usuario</p>


                            </div>
                            <div style="display:<?php echo $imarchivo; ?>">

                                <p style="font-size: .7em">Este archivo se encuentra en la plataforma</p>
                                <a class="btn btn-success" href="..<?php echo $ruta ?>"> Descargar</a>
                                <br>
                                <br>

                                <form action="actualizarSolvencia.php" method="POST">

                                    <input type="number" name="contI" value="<?php echo $i ?>" id="contI"
                                           style="display: none" readonly>

                                    <input type="number" name="limiteCont" value="<?php echo $limitea ?>"
                                           id="limiteCont"
                                           style="display: none" readonly>

                                    <input type="text" name="expediente" value="<?php echo $expedienteP ?>"
                                           id="expediente"
                                           style="display: none" readonly>

                                    <input type="number" name="idTipoParticipacion"
                                           value="<?php echo $idTipoParticipacion ?>" id="idTipoParticipacion"
                                           style="display: none" readonly>

                                    <input type="text" name="usuario" value="<?php echo $usuario ?>" id="usuario"
                                           style="display: none" readonly>

                                    <!--Fin de vars-->
                                    <input type="number" name="ingresosMensuales" placeholder="Ingresos"
                                           id="ingresosMensuales<?php echo $i ?>" value="<?php echo $ingreso ?>"
                                           onchange="ingresoDeRenta<?php echo $i ?>()">
                                    <label>
                                        Ingresos
                                    </label>
                                    <br>
                                    <input type="number" name="deducibles" placeholder="Deducibles"
                                           id="deducibles<?php echo $i ?>" value="<?php echo $deducibles ?>"
                                           onchange="ingresoDeRenta<?php echo $i ?>()">
                                    <label>
                                        Deducibles
                                    </label>
                                    <br>

                                    <input type="number" name="ingresosNetos" placeholder="Ingresos Netos"
                                           id="ingresosNetos<?php echo $i ?>" value="<?php echo $ingresosNetos ?>"
                                           onchange="ingresoDeRenta<?php echo $i ?>()" readonly>
                                    <label>
                                        Ingresos Netos
                                    </label>
                                    <br>

                                    <input type="number" name="ingresosRenta" placeholder="Ingresos Renta"
                                           id="ingresoRenta<?php echo $i ?>" value="<?php echo $ingresosRenta ?>"
                                           onchange="ingresoDeRenta<?php echo $i ?>()" readonly>

                                    <label>
                                        Ingresos Renta
                                    </label>
                                    <br>

                                    <input type="number" name="Renta" placeholder="Renta" id="renta<?php echo $i ?>"
                                           value="<?php echo $renta ?>" readonly>
                                    <label>
                                        Renta
                                    </label>
                                    <br>

                                    <input type="text" name="estatus" placeholder="Estatus"
                                           value="<?php echo $estatusV ?>"
                                           id="estatusV<?php echo $i ?>" readonly>
                                    <label>
                                        Estatus
                                    </label>
                                    <br>
                                    <script src="../js/ingresorenta.js"></script>
                                    <input type="submit" class="btn btn-success" value="<?php echo $boton ?>"
                                           onsubmit="return validarForm();">
                                </form>
                            </div>
                        </td>

                    <?php } ?>


                </tr>

                <tr>

                    <?php
                    for ($i = $inicialb; $i < $limiteb; $i++) {

                        $consultaR = "SELECT * FROM docsolvencia WHERE expediente='$expedienteP' AND usuario ='$usuario' AND numero = '$i'";

                        $resultadoR = mysqli_query($con, $consultaR);
                        $countR = mysqli_num_rows($resultadoR);
                        $registroR = mysqli_fetch_array($resultadoR);

                        $id = $registroR[0];
                        $ruta = $registroR[4];

                        if ($countR > 0) {
                            $sarchivo = "none";
                            $imarchivo = "block";
                        } else {
                            $sarchivo = "block";
                            $imarchivo = "none";
                        }


                        ?>
                        <td><?php echo $titulo . ' ' . $i ?>
                            <div style="display:<?php echo $sarchivo; ?>">

                                <p style="font-size: .7em">Este documento no a sido enviado por el usuario</p>


                            </div>
                            <div style="display:<?php echo $imarchivo; ?>">

                                <p style="font-size: .7em">Este archivo se encuentra en la plataforma</p>

                                <a class="btn btn-success" href="..<?php echo $ruta ?>"> Descargar</a>


                                </form>

                            </div>
                        </td>

                    <?php } ?>


                </tr>

                <tr>

                    <?php
                    for ($i = $inicialc; $i < $limitec; $i++) {

                        $consultaR = "SELECT * FROM docsolvencia WHERE expediente='$expedienteP' AND usuario ='$usuario' AND numero = '$i'";

                        $resultadoR = mysqli_query($con, $consultaR);
                        $countR = mysqli_num_rows($resultadoR);
                        $registroR = mysqli_fetch_array($resultadoR);

                        $id = $registroR[0];
                        $ruta = $registroR[4];

                        if ($countR > 0) {
                            $sarchivo = "none";
                            $imarchivo = "block";
                        } else {
                            $sarchivo = "block";
                            $imarchivo = "none";
                        }


                        ?>
                        <td><?php echo $titulo . ' ' . $i ?>
                            <div style="display:<?php echo $sarchivo; ?>">

                                <p style="font-size: .7em">Este documento no a sido enviado por el usuario</p>


                            </div>
                            <div style="display:<?php echo $imarchivo; ?>">

                                <p style="font-size: .7em">Este archivo se encuentra en la plataforma</p>

                                <a class="btn btn-success" href="..<?php echo $ruta ?>"> Descargar</a>


                                </form>

                            </div>
                        </td>

                    <?php } ?>


                </tr>


            </table>


        </div>
    </div>
</div>

<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-12" align="right">
            <a href="<?php echo $regresar ?>" class="btn btn-success">Regresar</a>


        </div>

    </div>

</div>