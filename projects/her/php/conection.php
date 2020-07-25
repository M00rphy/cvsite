<?php


// variable de sesion creada en Valid_Form contiene el usuario


$BBDD_host = "localhost";

$BBDD_user = "root";

$BBDD_pass = "";

$BBDD_bd = "her";

/*
$BBDD_host = "localhost";

$BBDD_user = "qcyeer9s9j3i";

$BBDD_pass = "L29edesma12?";

$BBDD_bd = "her";
*/

$con = mysqli_connect($BBDD_host, $BBDD_user, $BBDD_pass);
if (mysqli_connect_errno()) {
    echo "No se ha logrado conectar con el host";
}
mysqli_set_charset($con, "UTF8");
mysqli_select_db($con, $BBDD_bd) or die("Error al conectar con la bd");


function validar()

{

    if (!$_SESSION['inicio_sesion']) {

        header("location:../index.php");
    }
}