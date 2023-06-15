<?php
include("conection.php");

$sqlUserData = "SELECT bday FROM admin_login WHERE id = '666'";
$bday = mysqli_fetch_assoc(mysqli_query($con, $sqlUserData));