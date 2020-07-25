<?php


$expedienteP = $_REQUEST['expedienteP'];

$usuario = $_REQUEST['usuario'];


$idTipoParticipacion = $_REQUEST['idTipoParticipacion'];


$consultaR = "SELECT * FROM comprobantes WHERE expediente='$expedienteP' AND usuario ='$usuario'";


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
$tipoUsuario = $_SESSION['tipo'];

switch ($tipoUsuario) {
    case 'Usuario':
        $regresar = "usuario.php";
        $Send = '<input type="submit" value="Enviar" class="btn btn-primary">';
        $eliminar = '<a class="btn btn-danger" href="eliminarDocumentoF.php?id=' . $id . '">Eliminar</a>';
        $subir = '<input type="file" name="ebook" required="" style="font-size: .7em">';
        break;
    case 'Corredor':
        $regresar = "corredor.php";
        $eliminar = '';
        $Send = '';
        $subir = '';

        break;
    case 'Eventas':
        $regresar = "eVentas.php";
        $eliminar = '';
        $Send = '';
        $subir = '';

        break;
    case 'Administrador':
        $regresar = "administrador.php";
        $eliminar = '';
        $Send = '';
        $subir = '';

        break;
    case 'Cobranza':
        $regresar = "cobranza.php";
        $eliminar = '';
        $Send = '';
        $subir = '';

        break;
    case 'Abogado':
        $regresar = "juridico.php";
        $eliminar = '';
        $Send = '';
        $subir = '';

        break;

    default:
        # code...
        break;
}

?>


<div class="container">

    <div class="row">

        <div class="col-12">

            <h3 style="color: #2F777E">Subir los siguientes documentos solicitados.</h3>

            <table width="100%">

                <tr>


                    <td> Comprobante de Domicilio

                        <div>


                            <form action="../controladores/subirComprobanteDo.php" method="POST"
                                  enctype="multipart/form-data">


                                <?php echo $subir ?>

                                <input type="text" value="<?php echo $expedienteP ?>" name="expediente"
                                       style="display: none;">

                                <input type="text" value="<?php echo $usuario ?>" name="usuario" style="display: none;">


                                <input type="text" value="<?php echo $idTipoParticipacion ?>" name="idTipoParticipacion"
                                       style="display: none;">


                                <?php echo $Send ?>

                            </form>


                        </div>


                        <div style="display:<?php echo $sarchivo; ?>">


                            <p style="font-size: .7em">Este documento no a sido enviado por el usuario</p>


                        </div>

                        <div style="display:<?php echo $imarchivo; ?>">


                            <p style="font-size: .7em">Este archivo se encuentra en la plataforma</p>


                            <a class="btn btn-success" href="..<?php echo $ruta ?>"> Descargar</a>
                            <?php echo $eliminar ?>


                            </form>


                        </div>
                    </td>


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



