<?php
session_start();

include("conection.php");
validar();

$id = $_REQUEST['id'];
$usuario = $_REQUEST['usuario'];
$expediente = $_REQUEST['expediente'];
$estatusI = 'Asignar Firma';

$sql = "UPDATE `expedientes` SET
		  
		  `estatus` ='$estatusI',
		  `eVentas` ='$usuario'


		 WHERE `expedientes`.`id` = '$id' ";

				if ($con->query($sql) === TRUE) {
				    
				} else {
				    echo "Error updating record: " . $con->error;
				}
$sql = "UPDATE `relacionadosexpediente` SET
		  
		  `estatus` ='$estatusI'


		 WHERE `relacionadosexpediente`.`expediente` = '$expediente' ";

				if ($con->query($sql) === TRUE) {
				   header("location: eVentas.php");
				} else {
				    echo "Error updating record: " . $con->error;
				}
?>