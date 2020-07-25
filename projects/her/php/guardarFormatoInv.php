<?php

include("conection.php");

$idTipoParticipacion = $_REQUEST['idTipoParticipacion'];
$expedienteP = $_REQUEST['expedienteP'];
$usuario = $_REQUEST['usuario'];
  
    

  	

		
				
	$consultaNUsuario= "INSERT INTO formatoinv (expediente,  usuario, idTipoParticipacion )
	VALUES ('$expedienteP','$usuario', '$idTipoParticipacion')";
	if ($con->query($consultaNUsuario) === TRUE) {
							
	header("location: usuario.php");
	} else {
	echo "Error updating record: " . $con->error;
	}

?>