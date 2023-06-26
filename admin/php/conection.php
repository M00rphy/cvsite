<?php

// DB credentials.
// define('DB_HOST','localhost');
// define('DB_USER','netxmcom');
// define('DB_PASS','iw7aTsS3mpTyZWL');
// define('DB_NAME','netxmcom_crm');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'lx');
# conectare la base de datos
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$con) {
    die("imposible conectarse: " . mysqli_error($con));
}
if (@mysqli_connect_errno()) {
    die("Conexión falló: " . mysqli_connect_errno() . " : " . mysqli_connect_error());
}
if (!mysqli_set_charset($con, "utf8")) {
    exit();
}
mysqli_query($con, 'SET sql_mode = ""');
