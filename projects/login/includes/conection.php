<?php

$BBDD_host = "localhost";
$BBDD_user = "root";
$BBDD_pass = "";
$BBDD_bd = "TheSource";

$con = mysqli_connect($BBDD_host, $BBDD_user, $BBDD_pass);
if (mysqli_connect_errno()) {
    echo "No se ha logrado conectar con el host";
}
mysqli_set_charset($con, "UTF8");
mysqli_select_db($con, $BBDD_bd) or die("Error al conectar con la bd");