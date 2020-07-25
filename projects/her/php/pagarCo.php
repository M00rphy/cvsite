<?php 
session_start();
	include("conection.php");
	validar();

$id = $_POST['id'];
$saldo = $_POST['comisionCo3'];
$referencia = $_POST['referenciaCo'];
$estatusI = 'Facturado y Cartera';

$sql = "UPDATE `expedientes` SET
		  
		  `estatus` ='$estatusI',
		  `ref1` ='$referencia',
		  `comisionCorredor` ='$saldo'


		 WHERE `expedientes`.`id` = '$id' ";

				if ($con->query($sql) === TRUE) {
				    
				} else {
				    echo "Error updating record: " . $con->error;
				}

$sql = "UPDATE `relacionadosexpediente` SET
		  
		  `estatus` ='$estatusI'


		 WHERE `relacionadosexpediente`.`expediente` = '$expediente' ";

				if ($con->query($sql) === TRUE) {
				    header("location: cobranza.php");
				} else {
				    echo "Error updating record: " . $con->error;
				}


 ?>