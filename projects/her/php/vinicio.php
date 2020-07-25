<?php
session_start();
include("conection.php");
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$passInCript = md5($password);
$consultaV = "SELECT * FROM usuarios WHERE usuario='$usuario' AND encriptada = '$passInCript'";
$resultadoV = mysqli_query($con, $consultaV);
$countV = mysqli_num_rows($resultadoV);
$registroV = mysqli_fetch_array($resultadoV);
if ($countV == 1) {

    $tipoUsuario = $registroV[3];
    $estatus = $registroV[4];

    if ($estatus == 'Baja') {
        header("location: ../index.php");
    } else {
        switch ($tipoUsuario) {
            case 'Usuario':
                echo "inicio";
                $_SESSION['inicio_sesion'] = $registroV[0];
                $_SESSION['usuario'] = $registroV[1];
                $_SESSION['tipo'] = $registroV[3];
                header("location: usuario.php");
                break;
            case 'Corredor':
                if ($estatus == 'Aprobado') {
                    $_SESSION['inicio_sesion'] = $registroV[0];
                    $_SESSION['usuario'] = $registroV[1];
                    $_SESSION['tipo'] = $registroV[3];

                    header("location: corredor.php");
                } else {
                    header("location: ../index.php");
                }

                break;
            case 'Eventas':

                $_SESSION['inicio_sesion'] = $registroV[0];
                $_SESSION['usuario'] = $registroV[1];
                $_SESSION['tipo'] = $registroV[3];

                header("location: eVentas.php");
                break;
            case 'Administrador':

                $_SESSION['inicio_sesion'] = $registroV[0];
                $_SESSION['usuario'] = $registroV[1];
                $_SESSION['tipo'] = $registroV[3];

                header("location: administrador.php");
                break;
            case 'Cobranza':

                $_SESSION['inicio_sesion'] = $registroV[0];
                $_SESSION['usuario'] = $registroV[1];
                $_SESSION['tipo'] = $registroV[3];

                header("location: cobranza.php");
                break;
            case 'Abogado':

                $_SESSION['inicio_sesion'] = $registroV[0];
                $_SESSION['usuario'] = $registroV[1];
                $_SESSION['tipo'] = $registroV[3];

                header("location: Juridico.php");
                break;

            case 'baja':
                header("location: ../index.php");
                break;

            default:

                break;
        }
    }
} else {
    header("location: ../index.php");
}