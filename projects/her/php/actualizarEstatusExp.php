<?php

$mes = date('m') + 1;
$año = date('y');
$fechaInicioCorte = "2020-01-01";
$fechaFinal = $año . "-" . $mes . "-31";


//Consulta que actualiza a "En renovacion " los estatus de los expedientes en "Cartera"
$sql = "UPDATE `expedientes` SET
`estatus` ='En renovacion'
WHERE `expedientes`.`vigenciaFinal` BETWEEN '$fechaInicioCorte' AND '$fechaFinal' AND `expedientes`.`estatus` = 'Cartera' ";


if ($con->query($sql) === TRUE) {

    $consultaP = "SELECT * FROM expedientes WHERE  vigenciaFinal BETWEEN '$fechaInicioCorte' AND '$fechaFinal'AND `expedientes`.`estatus` = 'En renovacion'";
    $resultadoP = mysqli_query($con, $consultaP);

    while ($rowP = mysqli_fetch_array($resultadoP)) {

        $expedienteT = $rowP[1];

        $consultaP1 = "SELECT * FROM relacionadosexpediente WHERE  expediente = '$expedienteT'  ";
        $resultadoP1 = mysqli_query($con, $consultaP1);

        while ($rowPT = mysqli_fetch_array($resultadoP1)) {

            $usuarioT = $rowPT[1];


            $consultaP2 = "SELECT * FROM datosusuarios WHERE  usuario = '$usuarioT'  ";
            $resultadoP2 = mysqli_query($con, $consultaP2);
            $rowP2 = mysqli_fetch_array($resultadoP2);


            $nombre = $rowP2[2];
            $apP = $rowP2[3];
            $apM = $rowP2[4];
            $correo = $rowP2[5];

            $headers = "From: contacto@her.site.com";
            $mensaje = "Estimado usuario: $nombre $apP $apM \r\n Se le informa que su expediente $expedienteT está por vencer, \n le sugerimos renovarlo a la brevedad.";
            mail($correo, "En vencimiento", $mensaje, $headers);
        }
    }
    //header("location: eVentas.php");
} else {
    echo "Error updating record: " . $con->error;
}