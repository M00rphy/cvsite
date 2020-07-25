<?php
session_start();

include("conection.php");
validar();


$id = $_REQUEST['id'];

 $sql = "DELETE FROM docsolvencia 	  
		   
		 WHERE id = '$id' ";

				if ($con->query($sql) === TRUE) {
		header("location: usuario.php");
				} else {
				    echo "Error updating record: " . $con->error;
				}
?>