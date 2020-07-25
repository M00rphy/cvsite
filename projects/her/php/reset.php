<!doctype html>

<html lang="en">

<head>

    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <style type="text/css">
        body {
            background-image: url(../img/fondo2.jpg);
        }

        #contenedor {
            -webkit-border-radius: 50px;
            -moz-border-radius: 50px;
            border-radius: 50px;
            border-style: solid;
            border-color: #FFFFFF;
            background-color: rgba(255, 255, 255, 1);
            font-weight: bold;
        }

        .iniciar {
            width: 120px;
            height: 40px;
            margin-right: 30px;
            background-color: rgba(31, 207, 13, 0.5);
            border-color: white;
            border-style: dotted;
            color: white;
            border-radius: 10px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            font-size: .8em;

        }

        .iniciar:hover {
            background-color: rgba(31, 207, 13, 1);
        }

        #titulo {

            font-size: 1.5em
        }

        .white {
            color: #fff;
        }
    </style>
    <title>Recuperar tu contraseña</title>
</head>

<body style="background-image: url('../img/fondo4.jpg');">
<div align="right">
    <a class="btn btn-dark" href="ingreso.php" style="width: 200px">Regresar</a>
</div>

<br>
<br>


<div class="row justify-content-center">
    <div align="center" id="contenedor" class="col-10 col-md-4">
        <img src="../img/logo.jpeg" width="90%">
        <?php include("cuerpoReset.php"); ?>
    </div>
</div>

<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="../js/jquery-1.12.0.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>

</html>