<?php
session_start();
include("conection.php");
validar();
$id = $_REQUEST['id'];
$usuario = $_REQUEST['usuario'];
$expediente = $_REQUEST['expediente'];


$sql = "UPDATE `expedientes` SET
		  `eVentas` ='$usuario' 
		 WHERE `expedientes`.`id` = '$id' ";
if ($con->query($sql) === TRUE) {
    header("location: eVentas.php");
} else {
    echo "Error updating record: " . $con->error;
}

