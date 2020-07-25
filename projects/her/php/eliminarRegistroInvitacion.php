<?php
session_start();

include("conection.php");
validar();


$expediente = $_REQUEST['expediente'];
$usuario = $_REQUEST['usuario'];

 $sql = "DELETE FROM invitaciones 	  
		   
		 WHERE expediente = '$expediente' AND usuario = '$usuario'  ";

				if ($con->query($sql) === TRUE) {
		header("location: corredor.php");
				} else {
				    echo "Error updating record: " . $con->error;
				}


?>