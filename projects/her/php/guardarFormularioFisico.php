<?php
session_start();

include "conection.php";
validar();

$tipoUsuario = $_SESSION['tipo'];

$usuario = $_POST['usuario'];
$expediente = $_POST['expediente'];

$nacionalidad = $_POST['nacionalidad'];
$originario = $_POST['originario'];
$calle = $_POST['calle'];
$exterior = $_POST['exterior'];
$interior = $_POST['interior'];
$colonia = $_POST['colonia'];
$alcaldia = $_POST['alcaldia'];
$cp = $_POST['cp'];
$ciudad = $_POST['ciudad'];
$tel1 = $_POST['tel1'];
$tel2 = $_POST['tel2'];
$correo = $_POST['correo'];
$rfc = $_POST['rfc'];
$curp = $_POST['curp'];
$estadoCivil = $_POST['estadoCivil'];

$consultaNExpediente = "INSERT INTO formulariosfisicos (usuario,  expediente, nacionalidad, originario, calle, NumeroExterior, Numerointerior, colonia, alcaldia, cp, ciudad, telefono1, telefono2, correoElectronico, rfc, curp, estadoCivil )
  VALUES ('$usuario','$expediente', '$nacionalidad', '$originario', '$calle', '$exterior', '$interior', '$colonia', '$alcaldia', '$cp', '$ciudad', '$tel1', '$tel2', '$correo', '$rfc', '$curp', '$estadoCivil')";
if ($con->query($consultaNExpediente) === true) {
    header("location: usuario.php");
} else {
    echo "Error updating record: " . $con->error;
}