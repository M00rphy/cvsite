<?php
extract($_POST);
// var_dump($_POST);
// die();

$salts = ["$2e", "$37", "$73", "$3"];

$sql = "SELECT pass FROM admin_login WHERE email = '$email'";
$user_pass = $this->CONN->Query($sql)[0]["client_pass"];

for ($i = 0; $i < count($salts); $i++) {
    var_dump(hash("sha256", $this->salts[$i] . "." . hash("sha256", $pwdString)));
    var_dump(hash("sha256", $this->salts[$i] . "." . hash("sha256", $pwdString)) == $user_pass);
    // if (hash("sha256", $salts[$i] . "." . hash("sha256", $pwdString)) == $user_pass) {
    //     return $user_pass;
    // }
}
?>