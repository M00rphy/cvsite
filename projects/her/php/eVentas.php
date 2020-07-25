<?php
session_start();
include("conection.php");
validar();
//include_once("actualizarEstatusExp.php");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Her soluciones</title>
    <style type="text/css">
        footer {
            font-family: Arial;
            font-size: .9em;
            background-color: rgba(44, 44, 46, .3);
            color: white;
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body>
<?php include("navegacionG.php"); ?>
<?php include("cuerpoEventas.php"); ?>

<script src="../js/jquery-1.12.0.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>

</html>