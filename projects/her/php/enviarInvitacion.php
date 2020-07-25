<?php
include("conection.php");
$usuario = $_REQUEST['usuarioI'];
$corredor = $_REQUEST['usuarioCo'];
$tipoInvitacion = $_REQUEST['tipoInvitacion'];
$expediente = $_REQUEST['expediente'];
$estatus = 'Nuevo';

$consultaNInvitacion = "INSERT INTO invitaciones (usuario,  corredor, tipoInvitacion, expediente, estatus)
	VALUES ('$usuario','$corredor', '$tipoInvitacion', '$expediente', '$estatus')";
if ($con->query($consultaNInvitacion) === TRUE) {

    header("location: corredor.php");
} else {
    echo "Error updating record: " . $con->error;
}

?>