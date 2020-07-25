<?php
session_start();
include "conection.php";
validar();
$id = $_REQUEST['id'];
$estatusI = 'Rechazado';

$sql = "UPDATE `invitaciones` SET

		  `estatus` ='$estatusI'


		 WHERE `invitaciones`.`id` = '$id' ";

if ($con->query($sql) === true) {
    header("location: usuario.php");
} else {
    echo "Error updating record: " . $con->error;
}