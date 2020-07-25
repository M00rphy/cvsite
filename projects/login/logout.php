<?php require('includes/config.php');

//logout
$user->logout();


if (isset($_SESSION['username'])) {
    session_destroy();
    setcookie("username", "", time() - 3600); 
}
unset($_SESSION['username']);
$_SESSION = array();


//logged in return to index page
header('Location: login.php', true);
exit;