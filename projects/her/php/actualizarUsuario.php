<?php	session_start();	include("conection.php");	validar();	$usuario = $_SESSION['usuario'];	$tipoUsuario = $_SESSION['tipo'];	$nombre = $_POST['nombre'];	$apPaterno = $_POST['apPaterno'];	$apMaterno = $_POST['apMaterno'];	$correo = $_POST['correo']; $sql = "UPDATE `datosusuarios` SET		  		  `nombre` ='$nombre', 		  `apPaterno` ='$apPaterno' ,		  `apMaterno` ='$apMaterno' ,		  `correo` ='$correo' 		 WHERE `datosusuarios`.`usuario` = '$usuario' ";				if ($con->query($sql) === TRUE) {					switch ($tipoUsuario) {						case 'Usuario':							header("location: usuario.php");							break;						case 'Corredor':							header("location: corredor.php");							break;						case 'Eventas':							header("location: eVentas.php");							break;						case 'Administrador':							header("location: administrador.php");							break;												default:							# code...							break;					}				    				} else {				    echo "Error updating record: " . $con->error;				}  ?>