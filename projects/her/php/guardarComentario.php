<?php

	session_start();
	include("conection.php");
	validar();
	
 
	$expediente = $_POST['expediente'];
	$tipoUsuario = $_POST['tipoUsuario'];
	$nombre = $_POST['nombreC'];
	$comentario = $_POST['comentario'];
	$tipoUsuarioB = $_SESSION['tipo'];


echo $tipoUsuarioB;

	switch ($tipoUsuarioB) {
	case 'Corredor':
	$fechaCompromiso = date("Y-m-d H:i:s"); 
		
		break;
	case 'Administrador':
	$fechaCompromiso = $_POST['fechaCompromiso']; 
		
		break;
	case 'Cobranza':
	$fechaCompromiso = $_POST['fechaCompromiso']; 
		
		break;
	case 'Eventas':
		$fechaCompromiso = $_POST['fechaCompromiso'];
		break;
	
	default:
		# code...
		break;
}
	



 $consultaNComentario= "INSERT INTO bitacora (expediente,  tipoUsuario, nombre, comentario, usuario, fechaCompromiso )
	VALUES ('$expediente','$tipoUsuarioB', '$nombre', '$comentario', '$usuario', '$fechaCompromiso' )";
	if ($con->query($consultaNComentario) === TRUE) {
						
	switch ($tipoUsuarioB) {
						case 'Usuario':
							header("location: usuario.php");
							break;
						case 'Corredor':
							header("location: corredor.php");
							break;
						case 'Eventas':
							header("location: eVentas.php");
							break;
						case 'Administrador':
							header("location: administrador.php");
							break;
						case 'Cobranza':
							header("location: cobranza.php");
							break;
						
						default:
							# code...
							break;
					}

	} else {
	echo "Error updating record: " . $con->error;
	}

  ?>