<?php
include("conection.php");
extract($_POST);
session_start();
// var_dump($_POST);
// die();

$salts = ["$2e", "$37", "$73", "$3"];

$sql = "SELECT pass FROM admin_login WHERE email = '$email'";
$user_pass = mysqli_fetch_array(mysqli_query($con, $sql))[0];

for ($i = 0; $i < count($salts); $i++) {

     if (hash("sha256", $salts[$i] . "." . hash("sha256", $password)) == $user_pass) {
         $sqlUserData = "SELECT * FROM admin_login WHERE email = '$email' AND pass = '$user_pass'";
         $user = mysqli_fetch_assoc(mysqli_query($con, $sqlUserData));
         $_SESSION['id']= $user['id'];
         $_SESSION['name']= $user['name'];
//         echo json_encode($user);
         header("location: ../mng-admin/");
     }
}
die();