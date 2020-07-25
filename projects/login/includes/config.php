<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('Europe/London');

//Init db
$db = parse_ini_file('style/db.ini'); //REMEMBER: Change to the corresponding DB

//database credentials
define('DBHOST', $db['host']);
define('DBUSER', $db['user']);
define('DBPASS', $db['pass']);
define('DBNAME', $db['name']);

//application address
define('DIR', 'https://lxbytecv.000webhostapp.com/');
define('SITEEMAIL', 'acbot@erised.x10host.com');

$BBDD_host = DBHOST;
$BBDD_user = DBUSER;
$BBDD_pass = DBPASS;
$BBDD_DB = DBNAME;

$con = mysqli_connect($BBDD_host, $BBDD_user, $BBDD_pass);

try {

    //create PDO connection
    $db = new PDO("mysql:host=" . $BBDD_host . ";charset=utf8mb4;dbname=" . $BBDD_DB, $BBDD_user, $BBDD_pass);
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);//Suggested to uncomment on production websites
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Suggested to comment on production websites
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    //show error
    echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
    exit;
}

//include the user class, pass in the database connection
include('classes/user.php');
include('classes/phpmailer/mail.php');
$user = new User($db);