<?php

session_start();
include("conection.php");
validar();

$tipoUsuarioB = $_SESSION['tipo'];
$usuarioP = $_SESSION['usuario'];
$usuario = $_POST['usuario'];
$expedienteP = $_POST['expediente'];
$idTipoParticipacion = $_POST['idTipoParticipacion'];

$i = $_POST['contI'];

$ingresosMensuales = $_POST['ingresosMensuales'];
$deducibles = $_POST['deducibles'];
$ingresosNetos = $_POST['ingresosNetos'];
$ingresosRenta = $_POST['ingresosRenta'];
$renta = $_POST['Renta'];

$location = 'comprobantesEV.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion;


if ($ingresosNetos > $renta) {
    $estatus = "Aceptado";
} else {
    $estatus = "Rechazado";
}
$sql = "UPDATE `docsolvencia` SET
  

  `deducibles` ='$deducibles' ,
  `ingresosNetos` ='$ingresosNetos' ,
  `ingresosRenta` ='$ingresosRenta',
  `estatus` ='$estatus',
  `renta` ='$renta',
  `ingreso` ='$ingresosMensuales'


 WHERE `docsolvencia`.`usuario` = '$usuario' AND `docsolvencia`.`expediente` = '$expedienteP' AND `docsolvencia`.`numero` = $i";

if ($con->query($sql) === TRUE) {
    header("location: $location");
} else {
    echo "Error updating record: " . $con->error;
}