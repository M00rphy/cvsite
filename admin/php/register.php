<?php
include("conection.php");

extract($_POST);
$emailDomain = explode("@", $email)[1];
if($emailDomain != "lxmor.com.mx"){
    die("Necesitas un correo empresarial para registrarte");
}

$salts = ["$2e", "$37", "$73", "$3"];

if ($pass == $confirmPass) {
    shuffle($salts);

    $hashedPwd = hash("sha256", $salts[0] . "." . hash("sha256", $pass));

    $sqlCheck = "SELECT * FROM admin_login WHERE pass = '$pass' OR email = '$email' OR name LIKE %'$name'%";
    $resCheck = mysqli_query($con, $sqlCheck);
    if (!$resCheck) {
        $sql = "INSERT INTO admin_login (email, name, bday, pass) VALUES ('$email','$name', '$bday', '$hashedPwd')";
        $resInsert = mysqli_query($con, $sql);
        if ($resInsert) {
            header("location: ../main.php");
        } else {
            echo $con->error;
        }
    } else {
        echo "Se encontro un registro con el mismo dato";
    }
}