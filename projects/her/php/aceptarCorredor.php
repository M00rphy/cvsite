<?php
	session_start();
	include("conection.php");
	validar();
	$id = $_REQUEST['id'];

		

$sql = "UPDATE `usuarios` SET
		  
		  `estatus` ='Aprobado'


		 WHERE `usuarios`.`id` = '$id' ";

				if ($con->query($sql) === TRUE) {
				    header("location: administrador.php");
				} else {
				    echo "Error updating record: " . $con->error;
				}

















  ?>