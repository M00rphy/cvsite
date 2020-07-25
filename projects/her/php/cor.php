<?php
include("conection.php");


$consultaP1 = "SELECT * FROM relacionadosexpediente   ";
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
    $mensaje = "Estimado usuario: sssss$nombre $apP $apM \r\n Se le informa que su expediente $expediente ";
    mail($correo, "En vencimiento", $mensaje, $headers);

}
?>