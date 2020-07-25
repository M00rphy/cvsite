<?php

include("conection.php");

  $usuario =$_POST['usuario'];
  $expediente =$_POST['expediente'];
  $tipoSol =$_POST['tipoSol'];
  $idTipoParticipacion =$_POST['idTipoParticipacion'];
  
    

  	

		
				
	$consultaNUsuario= "INSERT INTO tiposolvencias (expediente,  usuario, tipoSol, idTipoParticipacion )
	VALUES ('$expediente','$usuario', '$tipoSol', '$idTipoParticipacion')";
	if ($con->query($consultaNUsuario) === TRUE) {
							
	header("location: usuario.php");
	} else {
	echo "Error updating record: " . $con->error;
	}

?>