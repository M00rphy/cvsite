<?php

session_start();


include "conection.php";

validar();

$usuario = $_SESSION['usuario'];

$tipoUsuario = $_SESSION['tipo'];

$expediente = $_REQUEST['expediente'];

$participacion = $_REQUEST['participacion'];

$paginacion = $_REQUEST['paginacion'];

$estatus = $_REQUEST['estatus'];


$limite = 2;

switch ($participacion) {

    case 'A':

        $titulo = 'Arrendadores';

        $idTipoParticipacionA = 3;

        $idTipoParticipacionB = 4;

        $fisico = 'Arrendador-Fisico';

        $moral = 'Arrendador-Moral';

        break;

    case 'Ao':

        $titulo = 'Arrendatarios';

        $idTipoParticipacionA = 1;

        $idTipoParticipacionB = 2;

        $fisico = 'Arrendatario-Fisico';

        $moral = 'Arrendatario-Moral';

        break;

    case 'Fi':

        $titulo = 'Fiadores';

        $idTipoParticipacionA = 5;

        $idTipoParticipacionB = 6;

        $fisico = 'Fiador-Fisico';

        $moral = 'Fiador-Moral';

        break;

    default:

        # code...

        break;
}


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


    default:

        # code...

        break;
}


$consultaU2 = "SELECT * FROM datosusuarios WHERE tipoUsuario = 'Usuario' ";

$resultadoU2 = mysqli_query($con, $consultaU2);
$countR = mysqli_num_rows($resultadoU2);
$paginas = $countR / $limite;
$test = ceil($paginas);
$b = $paginacion * $limite;
$a = $b - $limite;


$consultaU = "SELECT * FROM datosusuarios WHERE tipoUsuario = 'Usuario' LIMIT $a ,$b";

$resultadoU = mysqli_query($con, $consultaU);
$countR2 = mysqli_num_rows($resultadoU);


$consultaA = "SELECT * FROM relacionadosexpediente WHERE corredor='$usuario'AND expediente = '$expediente' AND
idTipoParticipacion = '$idTipoParticipacionA' or corredor='$usuario'AND expediente = '$expediente' AND
idTipoParticipacion = '$idTipoParticipacionB'";

$resultadoA = mysqli_query($con, $consultaA);


$consultaB = "SELECT * FROM invitaciones WHERE corredor='$usuario'AND expediente = '$expediente' AND tipoInvitacion =
'$fisico'AND estatus !='Aceptado' or corredor='$usuario'AND expediente = '$expediente' AND tipoInvitacion = '$moral' AND
estatus!='Aceptado'";

$resultadoB = mysqli_query($con, $consultaB);


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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>
    // Write on keyup event of keyword input element

    $(document).ready(function () {

        $("#search").keyup(function () {

            _this = this;

            // Show only matching TR, hide rest of them

            $.each($("#mytable tbody tr"), function () {

                if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)

                    $(this).hide();

                else

                    $(this).show();

            });

        });

    });
</script>

<center>

    <h2><?php echo "$titulo"; ?></h2>

</center>


<div class="container">

    <div class="row">

        <div class="col-4">

            <h5>Usuarios para asignar</h5>

            <input type="text" class="form-control pull-right" id="search" placeholder="Buscar">

            <table style="font-size: .7em" width="100%" id="mytable">


                <tr>

                    <td>

                        Nombre

                    </td>


                    <td>

                        Agregar Fisico

                    </td>

                    <td>

                        Agregar Moral

                    </td>


                </tr>

                <?php

                while ($rowU = mysqli_fetch_array($resultadoU)) {

                    $id = $rowU[0];

                    $usuarioI = $rowU[1];

                    $nombre = $rowU[2];

                    $apPaterno = $rowU[3];

                    $apMaterno = $rowU[4];


                    $expedienteI = $expediente;


                    $ncompleto = $nombre . " " . $apPaterno . " " . $apMaterno;


                    ?>

                    <tr>

                        <td>

                            <?php echo $ncompleto ?>

                        </td>


                        <td>

                            <a href="enviarInvitacion.php?usuarioI=<?php echo $usuarioI ?>&usuarioCo=<?php echo $usuario ?>&tipoInvitacion=<?php echo $fisico ?>&expediente=<?php echo $expediente ?>"
                               style="font-size: 1.2em" class="btn btn-success">+</a>

                        </td>

                        <td>

                            <a href="enviarInvitacion.php?usuarioI=<?php echo $usuarioI ?>&usuarioCo=<?php echo $usuario ?>&tipoInvitacion=<?php echo $moral ?>&expediente=<?php echo $expediente ?>"
                               style="font-size: 1.2em" class="btn btn-success">+</a>

                        </td>

                    </tr>

                <?php } ?>

            </table>

            <nav aria-label="...">
                <ul class="pagination">
                    <?php
                    if ($paginacion == 1) {
                        $activador = "disabled";
                    } ?>
                    <li class="page-item <?php echo $activador ?>">


                        <a class="page-link "
                           href="buscadorInvitaciones.php?expediente=<?php echo $expediente ?>&participacion=<?php echo $participacion ?>&estatus=<?php echo $estatus ?>&paginacion=<?php echo $paginacion - 1 ?>">Previous</a>

                    </li>

                    <?php for ($i = 0; $i < $test; $i++) {
                        $l = $i + 1;
                        echo '

   
    <li class="page-item " ><a class="page-link" href="buscadorInvitaciones.php?expediente=' . $expediente . '&participacion=' . $participacion . '&paginacion=' . $l . '">' . $l . '</a></li>
   
    
 ';
                    } ?>

                    <?php

                    if ($paginacion == $test) {
                        $activador2 = "disabled";
                    } ?>
                    <li class="page-item <?php echo $activador2 ?>">
                        <a class="page-link"
                           href="buscadorInvitaciones.php?expediente=<?php echo $expediente ?>&participacion=<?php echo $participacion ?>&estatus=<?php echo $estatus ?>&paginacion=<?php echo $paginacion + 1 ?>">Next</a>
                    </li>
                </ul>
            </nav>

        </div>

        <div class="col-8">

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

                        <br>

                    </td>

                    <td colspan="2">

                        Formularios

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

                    switch ($estatus) {
                        case 'Nuevo':
                            $btnEliminar = '<a href="eliminarRegistro.php?expediente=' . $expedienteC . '&usuario=' . $usuarioC . '"
style="font-size: 1.2em" class="btn btn-danger">-</a>';
                            break;

                        default:
                            $btnEliminar = '';
                            break;
                    }


                    ?>

                    <?php //Banderas

                    //Consulta formato

                    $consultaFormato = "SELECT * FROM formatoinv WHERE usuario='$usuarioC' AND expediente ='$expedienteC' ";
                    $resultadoFormato = mysqli_query($con, $consultaFormato);
                    $cantidadF = mysqli_num_rows($resultadoFormato);

                    //Consulta Identificaciones

                    $consultaIdentificacion = "SELECT * FROM identificaciones WHERE usuario='$usuarioC' ";
                    $resultadoIdentificacion = mysqli_query($con, $consultaIdentificacion);
                    $cantidadI = mysqli_num_rows($resultadoIdentificacion);


                    //Consulta de poderes
                    $consultaPoderes = "SELECT * FROM poderes WHERE usuario='$usuarioC' AND expediente ='$expedienteC' ";
                    $resultadoPoderes = mysqli_query($con, $consultaPoderes);
                    $cantidadPod = mysqli_num_rows($resultadoPoderes);

                    //Consulta de solvencia
                    $consultaSolv = "SELECT * FROM docsolvencia WHERE usuario='$usuarioC' AND expediente ='$expedienteC' ";
                    $resultadoSolv = mysqli_query($con, $consultaSolv);
                    $cantidadSolv = mysqli_num_rows($resultadoSolv);


                    //Consulta de actas
                    $consultaActas = "SELECT * FROM actas WHERE usuario='$usuarioC' AND expediente ='$expedienteC' ";
                    $resultadoActas = mysqli_query($con, $consultaActas);
                    $cantidadAct = mysqli_num_rows($resultadoActas);


                    //Consulta de comprobantes
                    $consultaComp = "SELECT * FROM comprobantes WHERE usuario='$usuarioC' AND expediente ='$expedienteC' ";
                    $resultadoComp = mysqli_query($con, $consultaComp);
                    $cantidadComp = mysqli_num_rows($resultadoComp);

                    //Consulta de Inmueble
                    $consultaIn = "SELECT * FROM inmueble WHERE usuario='$usuarioC' AND expediente ='$expedienteC' ";
                    $resultadoIn = mysqli_query($con, $consultaIn);
                    $cantidadIn = mysqli_num_rows($resultadoIn);

                    //Consulta tipoParticipacion

                    $consultaTipo = "SELECT * FROM relacionadosexpediente WHERE usuario='$usuarioC' AND expediente ='$expedienteC' ";
                    $resultadoTipo = mysqli_query($con, $consultaTipo);
                    $rowTipo = mysqli_fetch_array($resultadoTipo);


                    //Consulta tipoSolvencia

                    $consultaTipoS = "SELECT * FROM tiposolvencias WHERE usuario='$usuarioC' AND expediente ='$expedienteC' ";
                    $resultadoTipoS = mysqli_query($con, $consultaTipoS);
                    $rowTipoS = mysqli_fetch_array($resultadoTipoS);
                    $TipoSolvencia = $rowTipoS[3];

                    //Sumatoria contadores

                    /*
                     switch ($TipoSolvencia) { //FIXME
                         case 'RN':
                             $consultaTSolv = "SELECT * FROM docsolvencia WHERE usuario='$usuarioC' AND expediente ='$expedienteC' AND tipoSol = '$TipoSolvencia' ";
                             $resultadoTSolv = mysqli_query($con, $consultaTSolv);
                             $cantidadTSolv = mysqli_num_rows($resultadoTSolv);
                             echo $cantidadTSolv;
                             break;
                         case 'DI':

                             $totalS = 3;
                             break;
                         case 'EC':

                             $totalS = 3;
                             break;
                         case 'EF':
                             $totalS = 1;
                             break;
                             break;
                         case 'DG':
                             $totalS = 1;
                             break;
                     }
                    */

                    switch ($idTipoParticipacionC) {
                        case '1':
                            $sumatoriaContadores = $cantidadF + $cantidadI + $cantidadComp + $cantidadSolv;

                            switch ($sumatoriaContadores) {

                                case 1:

                                    $bandera = 'amarilla';
                                    break;


                                case 2:

                                    $bandera = 'amarilla';
                                    break;

                                case 3:

                                    $bandera = 'amarilla';
                                    break;

                                case 4:

                                    $bandera = 'verde';
                                    break;

                                default:

                                    $bandera = 'roja';
                                    break;
                            }

                            break;
                        case '2':
                            $sumatoriaContadores = $cantidadI + $cantidadF + $cantidadAct + $cantidadComp + $cantidadSolv + $cantidadPod;

                            switch ($sumatoriaContadores) {

                                case 1:

                                    $bandera = 'amarilla';
                                    break;


                                case 2:

                                    $bandera = 'amarilla';
                                    break;

                                case 3:

                                    $bandera = 'amarilla';
                                    break;

                                case 4:

                                    $bandera = 'amarilla';
                                    break;

                                case 5:

                                    $bandera = 'amarilla';
                                    break;

                                case 6:

                                    $bandera = 'amarilla';
                                    break;

                                case 7:
                                    $bandera = 'amarilla';
                                    break;

                                case 8:

                                    $bandera = 'verde';
                                    break;


                                default:

                                    $bandera = 'roja';
                                    break;
                            }

                            break;
                        case '3':
                            $sumatoriaContadores = $cantidadF + $cantidadI + $cantidadComp;

                            switch ($sumatoriaContadores) {

                                case 1:

                                    $bandera = 'amarilla';
                                    break;


                                case 2:

                                    $bandera = 'amarilla';
                                    break;

                                case 3:

                                    $bandera = 'verde';
                                    break;

                                default:

                                    $bandera = 'roja';
                                    break;
                            }

                            break;
                        case '4':
                            $sumatoriaContadores = $cantidadF + $cantidadI + $cantidadComp;

                            switch ($sumatoriaContadores) {

                                case 1:

                                    $bandera = 'amarilla';
                                    break;


                                case 2:

                                    $bandera = 'amarilla';
                                    break;

                                case 3:

                                    $bandera = 'verde';
                                    break;

                                default:

                                    $bandera = 'roja';
                                    break;
                            }

                            break;
                        case '5':
                            $sumatoriaContadores = $cantidadF + $cantidadI + $cantidadComp + $cantidadIn;

                            switch ($sumatoriaContadores) {

                                case 1:

                                    $bandera = 'amarilla';
                                    break;


                                case 2:

                                    $bandera = 'amarilla';
                                    break;

                                case 3:

                                    $bandera = 'amarilla';
                                    break;

                                case 4:

                                    $bandera = 'verde';
                                    break;

                                default:

                                    $bandera = 'roja';
                                    break;
                            }

                            break;
                        case '6':
                            $sumatoriaContadores = $cantidadF + $cantidadI + $cantidadPod + $cantidadAct + $cantidadComp + $cantidadIn;

                            switch ($sumatoriaContadores) {

                                case 1:

                                    $bandera = 'amarilla';
                                    break;


                                case 2:

                                    $bandera = 'amarilla';
                                    break;

                                case 3:

                                    $bandera = 'amarilla';
                                    break;

                                case 4:

                                    $bandera = 'amarilla';
                                    break;

                                case 5:

                                    $bandera = 'amarilla';
                                    break;

                                case 6:

                                    $bandera = 'verde';
                                    break;


                                default:

                                    $bandera = 'roja';
                                    break;
                            }

                            break;

                        default:
                            $bandera = 'roja';
                            break;
                    }


                    ?>


                    <?php


                    // Formulario Fisico


                    $consultaFormularioFisico = "SELECT * FROM formulariosfisicos WHERE usuario='$usuarioC' AND expediente ='$expedienteC' ";

                    $resultadoFormulario = mysqli_query($con, $consultaFormularioFisico);

                    $rowFormularioFisico = mysqli_fetch_array($resultadoFormulario);

                    $formulario2Term = $rowFormularioFisico[25];

                    $formulario3Term = $rowFormularioFisico[38];

                    $formulario4Term = $rowFormularioFisico[84];

                    $cantidadForm = mysqli_num_rows($resultadoFormulario);


                    $sumatoriaContadoresForm = $formulario3Term + $formulario4Term;


                    switch ($sumatoriaContadoresForm) {

                        case 1:

                            $banderaF = 'amarilla';

                            break;

                        case 2:

                            $banderaF = 'verde';

                            break;


                        default:

                            $banderaF = 'roja';

                            break;
                    }


                    ?>


                    <tr>

                        <td>

                            <?php echo $ncompletoA ?>

                        </td>

                        <td>

                            <a href="documentos.php?expediente=<?php echo $expedienteC ?>&usuario=<?php echo $usuarioC ?>&idTipoParticipacion=<?php echo $idTipoParticipacionC ?>"
                               style="font-size: .9em" class="btn btn-success">Documentos</a><img
                                    src="../img/bandera_<?php echo $bandera ?>.png" style="width: 5%">

                        </td>

                        <td>

                            <a href="formularioCor.php?expediente=<?php echo $expedienteC ?>&usuario=<?php echo $usuarioC ?>"
                               style="font-size: .9em" class="btn btn-success">Formularios</a><img
                                    src="../img/bandera_<?php echo $banderaF ?>.png" style="width: 5%">

                        </td>

                        <td>

                            <?php echo $btnEliminar ?>

                        </td>

                    </tr>

                <?php } ?>

            </table>


            <h5>Invitados/Rechazados</h5>

            <table style="font-size: .7em" width="100%">


                <tr>

                    <td>

                        Nombre

                    </td>

                    <td>

                        Tipo Invitacion


                    </td>

                    <td>

                        Expediente

                    </td>

                    <td>

                        Estatus

                    </td>

                    <td>

                        Acciones

                    </td>


                </tr>

                <?php

                while ($rowB = mysqli_fetch_array($resultadoB)) {

                    $usuarioD = $rowB[1];

                    $expedienteD = $rowB[4];

                    $idTipoParticipacionD = $rowB[3];

                    $estatusD = $rowB[5];


                    $consultaD = "SELECT * FROM datosusuarios WHERE usuario='$usuarioD'";

                    $resultadoD = mysqli_query($con, $consultaD);

                    $rowD = mysqli_fetch_array($resultadoD);

                    $nombre = $rowD[2];

                    $apPaterno = $rowD[3];

                    $apMaterno = $rowD[4];


                    $ncompletoD = $nombre . " " . $apPaterno . " " . $apMaterno;


                    ?>

                    <tr>

                        <td>

                            <?php echo $ncompletoD ?>

                        </td>

                        <td>

                            <?php echo $idTipoParticipacionD ?>

                        </td>

                        <td>

                            <?php echo $expedienteD ?>

                        </td>

                        <td>

                            <?php echo $estatusD ?>

                        </td>

                        <td>

                            <!-- Falta eliminar registro -->


                            <a href="eliminarRegistroInvitacion.php?expediente=<?php echo $expedienteD ?>&usuario=<?php echo $usuarioD ?>"
                               style="font-size: 1.2em" class="btn btn-danger">-</a>

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