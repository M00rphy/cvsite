<?php
session_start();
include("conection.php");
validar();
$id = $_REQUEST['id'];
$expediente = $_REQUEST['expediente'];

$consultaFechaF = "SElECT * FROM `expedientes` where `expedientes`.`idrelacion` = '$expediente'";
$resultadoFechaF = mysqli_query($con, $consultaFechaF);
$rowFechaF = mysqli_fetch_array($resultadoFechaF);

$fechaI = $rowFechaF[14];
$fechaF = $rowFechaF[15];
$fechaC = $rowFechaF[18];

$nuevaFechaF = date("Y-m-d", strtotime(date("Y-m-d", strtotime($fechaF)) . " + 1 year"));

$nuevaFechaC = date("Y-m-d", strtotime(date("Y-m-d", strtotime($fechaC)) . " + 1 year"));
$nuevaFechaI = date("Y-m-d", strtotime(date("Y-m-d", strtotime($fechaI)) . " + 1 year"));

$random = $random_number = intval("0" . rand(1, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9));
$expedienteN = "E-" . $random; //generador de expediente nuevo

$expedienteV = $expediente;

$sql = "UPDATE `expedientes` SET
        `vigenciaFinal` = '$nuevaFechaF',
        `vigenciaInicio` = '$nuevaFechaI',
        `fechaC` = '$nuevaFechaC',
        `estatus` = 'Asignado',
        `expedienteV`= '$expedienteV',
         `idrelacion`='$expedienteN'                
		 WHERE `expedientes` . `id` = '$id' ";
if ($con->query($sql) === TRUE) {
    header("location: eVentas.php");
} else {
    echo "Error updating record: " . $con->error;
}
