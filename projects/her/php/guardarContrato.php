<?php

include("conection.php");


$contrato = $_POST['txt-content'];
$expediente = $_POST['expediente'];
$tipo = $_POST['tipo'];
$usuario = $_POST['usuario'];



$consultaNContrato= "INSERT INTO contratos (expediente, tipo, contrato, usuario)
	VALUES ('$expediente', '$tipo', '$contrato', '$usuario'  )";
	if ($con->query($consultaNContrato) === TRUE) {
							
	header("location: eVentas.php");
	} else {
	echo "Error updating record: " . $con->error;
	}

 ?>