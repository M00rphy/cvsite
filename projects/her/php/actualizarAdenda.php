<?php

session_start();
include("conection.php");
validar();
$expediente = $_POST['expediente'];
$renta = $_POST['renta'];
$cuota = $_POST['cuota'];
$vigenciaInicio = $_POST['vigenciaInicio'];
$vigenciaFinal = $_POST['vigenciaFinal'];
$estatus = "Por Autorizar";

$sql = "UPDATE `expedientes` SET
      `renta` ='$renta',
      `cuota` = '$cuota',
      `vigenciaInicio` = '$vigenciaInicio',
      `vigenciaFinal` = '$vigenciaFinal',
      `estatus` = '$estatus'
      
     WHERE  `expedientes`.`idrelacion` = '$expediente' ";
if ($con->query($sql) === TRUE) {
    //header("location: eVentas.php");
} else {
    echo "Error updating record: " . $con->error;
}