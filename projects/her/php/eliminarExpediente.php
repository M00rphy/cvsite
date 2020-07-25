<?php
session_start();

include("conection.php");
validar();

$id = $_REQUEST['id'];
$expediente = $_REQUEST['expediente'];
$estatusI = 'Eliminado';

$sql = "UPDATE `expedientes` SET
		  
		  `estatus` ='$estatusI'


		 WHERE `expedientes`.`id` = '$id' ";

				if ($con->query($sql) === TRUE) {
				    
				} else {
				    echo "Error updating record: " . $con->error;
				}

$sql = "UPDATE `relacionadosexpediente` SET
		  
		  `estatus` ='$estatusI'


		 WHERE `relacionadosexpediente`.`expediente` = '$expediente' ";

				if ($con->query($sql) === TRUE) {
				    header("location: corredor.php");
				} else {
				    echo "Error updating record: " . $con->error;
				}
?>