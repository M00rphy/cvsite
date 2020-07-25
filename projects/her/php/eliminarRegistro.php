<?php
session_start();

include("conection.php");
validar();


$expediente = $_REQUEST['expediente'];
$usuario = $_REQUEST['usuario'];

 $sql = "DELETE FROM relacionadosexpediente 	  
		   
		 WHERE expediente = '$expediente' AND usuario = '$usuario'  ";

				if ($con->query($sql) === TRUE) {
		header("location: corredor.php");
				} else {
				    echo "Error updating record: " . $con->error;
				}

$sql2 = "DELETE FROM formulariosFisicos 	  
		   
		 WHERE expediente = '$expediente' AND usuario = '$usuario'  ";

				if ($con->query($sql2) === TRUE) {
		header("location: corredor.php");
				} else {
				    echo "Error updating record: " . $con->error;
				}
?>