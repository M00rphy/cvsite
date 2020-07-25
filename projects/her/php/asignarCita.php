<?php
session_start();

include("conection.php");
validar();

$id = $_POST['id'];
$usuario = $_POST['usuario'];
$usuario2 = $_POST['usuario2'];
$fechainvitacion = $_POST['fechainvitacion'];
$hora = $_POST['hora'];
$expediente = $_POST['expediente'];
$lugar = $_POST['lugar'];

$estatusI = 'Cita';

$sql = "UPDATE `expedientes` SET
		  
		  `estatus` ='$estatusI',
		  `fechaFirma` ='$fechainvitacion',
		  `horaFirma` ='$hora',
		  `usuarioFirma` ='$usuario2',
		  `lugar` ='$lugar',
		  `eVentas` ='$usuario'


		 WHERE `expedientes`.`id` = '$id' ";

				if ($con->query($sql) === TRUE) {
				    header("location: eVentas.php");
				} else {
				    echo "Error updating record: " . $con->error;
				}
$sql = "UPDATE `relacionadosexpediente` SET
		  
		  `estatus` ='$estatusI'


		 WHERE `relacionadosexpediente`.`expediente` = '$expediente' ";

				if ($con->query($sql) === TRUE) {
				  
				} else {
				    echo "Error updating record: " . $con->error;
				}



	$tipoUsuario = 'Sistema';
	$nombre = 'Sistema';
	$comentario = 'El lugar de la cita sera en:'.$lugar;

 $consultaNComentario= "INSERT INTO bitacora (expediente,  tipoUsuario, nombre, comentario, usuario )
	VALUES ('$expediente','$tipoUsuario', '$nombre', '$comentario', '$usuario' )";
	if ($con->query($consultaNComentario) === TRUE) {
							
	 header("location: eVentas.php");
	} else {
	echo "Error updating record: " . $con->error;
	}
?>