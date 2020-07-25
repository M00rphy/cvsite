<?php
session_start();
include "conection.php";
validar();


$id = $_REQUEST['id'];
$expediente = $_REQUEST['expediente'];
$estatusI = 'En Validacion';


$consultaI = "SELECT * FROM relacionadosexpediente WHERE expediente='$expediente'   ";
$resultadoI = mysqli_query($con, $consultaI);


while ($rowUsuarios = mysqli_fetch_array($resultadoI)) {

    $usuarioCh = $rowUsuarios[1];

    $consultaTer = "SELECT * FROM formulariosfisicos WHERE usuario='$usuarioCh'  AND expediente = '$expediente'  AND f3t = '1' AND f4t = '1' ";
    $resultadoT = mysqli_query($con, $consultaTer);
    $countT = mysqli_num_rows($resultadoT);

    $consultaTer2 = "SELECT * FROM identificaciones WHERE usuario='$usuarioCh' ";
    $resultadoT2 = mysqli_query($con, $consultaTer2);
    $countT2 = mysqli_num_rows($resultadoT2);

    $consultaTer3 = "SELECT * FROM formatoinv WHERE usuario='$usuarioCh' AND expediente = '$expediente'  ";
    $resultadoT3 = mysqli_query($con, $consultaTer3);
    $countT3 = mysqli_num_rows($resultadoT3);


    $consultaTer4 = "SELECT * FROM relacionadosexpediente WHERE usuario='$usuarioCh' AND expediente = '$expediente'  ";
    $resultadoT4 = mysqli_query($con, $consultaTer4);
    $rowUsuarios4 = mysqli_fetch_array($resultadoT4);

    $idtipo = $rowUsuarios4[4];


    if ($idtipo == '1' || $idtipo == '2') {


        $consultaTer5 = "SELECT * FROM tiposolvencias WHERE usuario='$usuarioCh' AND expediente = '$expediente'  ";
        $resultadoT5 = mysqli_query($con, $consultaTer5);
        $rowUsuarios5 = mysqli_fetch_array($resultadoT5);

        $tipoSol = $rowUsuarios5[3];

        $consultaTer6 = "SELECT * FROM docsolvencia WHERE usuario='$usuarioCh' AND expediente = '$expediente'  ";
        $resultadoT6 = mysqli_query($con, $consultaTer6);
        $countT6 = mysqli_num_rows($resultadoT6);


        switch ($tipoSol) {
            case 'RN':
                $totalS = 6;

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

            default:
                # code...
                break;
        }


        if ($countT6 == $totalS) {


            $total = $countT + $countT2 + $countT3;

            if ($total == 3) {

                $sql = "UPDATE `expedientes` SET
				`estatus` ='$estatusI'
				WHERE `expedientes`.`id` = '$id' ";

                if ($con->query($sql) === true) {
                } else {
                    echo "Error updating record: " . $con->error;
                }
                $sql = "UPDATE `relacionadosexpediente` SET

									  `estatus` ='$estatusI'


									 WHERE `relacionadosexpediente`.`expediente` = '$expediente' ";

                if ($con->query($sql) === true) {
                    header("location: corredor.php");
                } else {
                    echo "Error updating record: " . $con->error;
                }
            } else {
                $cuerpo = 'Falta Documentacion general por subir  ';
            }
        } else {
            $cuerpo = 'Falta Documentos de solvencia de un arrendatario ';
        }
    } else {

        $total = $countT + $countT2 + $countT3;

        if ($total == 3) {


            $sql = "UPDATE `expedientes` SET
			`estatus` ='$estatusI'
			WHERE `expedientes`.`id` = '$id' ";

            if ($con->query($sql) === true) {
            } else {
                echo "Error updating record: " . $con->error;
            }
            $sql = "UPDATE `relacionadosexpediente` SET

					  `estatus` ='$estatusI'


					 WHERE `relacionadosexpediente`.`expediente` = '$expediente' ";

            if ($con->query($sql) === true) {
                header("location: corredor.php");
            } else {
                echo "Error updating record: " . $con->error;
            }
        } else {
            $cuerpo = 'Falta Documentacion favor de validar' . 'total-' . $total . 'usuario-' . $usuarioCh . 'c1-' . $countT . 'c2-' . $countT2 . 'c3-' . $countT3;
        }
    }


    echo $cuerpo;
}


//TODO
//consulta si se encuenta el campor t2 t3 y t4  de los 3 usuarios

//arrendador fisico su identificacion
//arrendatario fisico su identificacion
//fiador fisico su identificacion
//arrendatario documentos de solvencia
//arrendador fisico aceptado el formato de investigacion
//arrendatario fisico aceptado el formato de investigacion
//fiador fisico aceptado el formato de investigacion


//arroja mensaje en el html con los faltantes