<?php
session_start();

include "conection.php";
validar();

$usuario = $_SESSION['usuario'];
$expediente = $_REQUEST['expediente'];
$tipoUsuario = $_SESSION['tipo'];
$participacion = $_REQUEST['participacion'];
$complement;

switch ($tipoUsuario) {
    case 'Usuario':
        $regresar = "usuario.php";
        break;
    case 'Corredor':
        $regresar = "corredor.php";

        break;
    case 'Eventas':
        $regresar = "eVentas.php";

        break;
    case 'Administrador':
        $regresar = "administrador.php";

        break;
    case 'Cobranza':
        $regresar = "cobranza.php";

        break;
    case 'Abogado':
        $regresar = "juridico.php";

        break;

    default:
        # code...
        break;
}

switch ($participacion) {
    case 'A':
        $titulo = 'Arrendadores';
        $idTipoParticipacionA = 3;
        $idTipoParticipacionB = 4;
        $fisico = 'Arrendador-Fisico';
        $moral = 'Arrendador-Moral';
        $complement = '';
        break;
    case 'Ao':
        $titulo = 'Arrendatarios';
        $idTipoParticipacionA = 1;
        $idTipoParticipacionB = 2;
        $fisico = 'Arrendatario-Fisico';
        $moral = 'Arrendatario-Moral';
        $complement = '';
        break;
    case 'Fi':
        $titulo = 'Fiadores';
        $idTipoParticipacionA = 5;
        $idTipoParticipacionB = 6;
        $fisico = 'Fiador-Fisico';
        $moral = 'Fiador-Moral';
        $complement = '';
        break;
    default:
        # code...
        break;
}

$consultaA = "SELECT * FROM relacionadosexpediente WHERE expediente = '$expediente' AND idTipoParticipacion =
'$idTipoParticipacionA' or expediente = '$expediente' AND idTipoParticipacion = '$idTipoParticipacionB'";
$resultadoA = mysqli_query($con, $consultaA);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Corredor</title>
</head>

<body>
    <?php include "navegacionG.php"; ?>

    <center>
        <h2><?php echo "$titulo"; ?></h2>
    </center>

    <div class="container">
        <div class="row">

            <div class="col-12">
                <h5>Registrados</h5>
                <table style="font-size: .7em" width="100%">
                    <tr>

                    </tr>
                    <tr>
                        <td>
                            Nombre
                        </td>
                        <td>
                            Documentos
                        </td>
                        <td colspan="1">
                            Formularios
                        </td>
                        <td>
                            <?php echo $complement; ?>
                        </td>

                    </tr>
                    <?php
                    while ($rowA = mysqli_fetch_array($resultadoA)) {
                        $usuarioC = $rowA[1];
                        $expedienteC = $rowA[2];
                        $idTipoParticipacionC = $rowA[4];

                        $consultaC = "SELECT * FROM datosusuarios WHERE usuario='$usuarioC'";
                        $resultadoC = mysqli_query($con, $consultaC);
                        $rowC = mysqli_fetch_array($resultadoC);
                        $nombre = $rowC[2];
                        $apPaterno = $rowC[3];
                        $apMaterno = $rowC[4];

                        $ncompletoA = $nombre . " " . $apPaterno . " " . $apMaterno;

                    ?>
                    <tr>
                        <td>
                            <?php echo $ncompletoA ?>
                        </td>
                        <td>
                            <a href="documentos.php?expediente=<?php echo $expedienteC ?>&usuario=<?php echo $usuarioC ?>&idTipoParticipacion=<?php echo $idTipoParticipacionC ?>"
                                style="font-size: .9em" class="btn btn-success">Documentos</a>
                        </td>
                        <td>
                            <a href="formularioCor.php?expediente=<?php echo $expedienteC ?>&usuario=<?php echo $usuarioC ?>"
                                style="font-size: .9em" class="btn btn-success">Formularios</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>

        </div>

    </div>
    <a href="<?php echo $regresar ?>" class="btn btn-success">Regresar</a>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>