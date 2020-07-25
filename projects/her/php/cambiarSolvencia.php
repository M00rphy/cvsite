<?php

	session_start();
	include("conection.php");
	validar();

	$tipoSol =$_POST['tipoSol'];
	$usuario =$_POST['usuario'];
  	$expediente =$_POST['expediente'];
	

 $sql = "UPDATE `tiposolvencias` SET
		  
		  `tipoSol` ='$tipoSol'


		 WHERE `tiposolvencias`.`usuario` = '$usuario' AND `tiposolvencias`.`expediente` = '$expediente' ";

				if ($con->query($sql) === TRUE) {
				   
				} else {
				    echo "Error updating record: " . $con->error;

				}




 $sql2 = "DELETE FROM docsolvencia 	  
		   
		 WHERE expediente = '$expediente' AND usuario = '$usuario' ";

				if ($con->query($sql2) === TRUE) {
								  	 	 header("location: ../php/usuario.php");

				} else {
				    echo "Error updating record: " . $con->error;
				}



  ?>